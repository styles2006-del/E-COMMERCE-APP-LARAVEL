<?php

namespace App\Http\Controllers;

session_start();
use App\Http\Middleware\WatchMiddleware;
use App\Models\Article;
use App\Models\Client;
use App\Models\Order;
use App\Models\OrderLine;
use FedaPay\FedaPay;
use FedaPay\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelPdf\Facades\Pdf;

class OrderController extends Controller implements HasMiddleware
{
    public function __construct()
    {
        FedaPay::setApiKey(env('FEDAPAY_SECRET_KEY'));
        FedaPay::setEnvironment(env('FEDAPAY_ENVIRONMENT'));
    }

    public function startDelivery(Order $order)
    {
        $order->update([
            'delivery_status' => 'START',
        ]);

        return redirect()->route('orders.index');
    }

    public function deliveryConfirmed(Order $order)
    {
        $order->update([
            'delivery_status' => 'DELIVERED',
        ]);

        return redirect()->route('orders.index');
    }

    public function index()
    {
        $orders = Order::with('client')->get();

        return view('order.index', compact('orders'));
    }

    public function genererRecu(Order $order)
    {
        // Optionnel : sauvegarde d'archivage sur le serveur
        try {
            $filename = now()->format('Y-m-d_H-i-s') . '-recu-' . str_replace(' ', '_', $order->client->user->firstname) . '.pdf';
            Pdf::view('order.recu', compact('order'))->save('/home/stiles/Images/' . $filename);
        } catch (\Exception $e) {
            // Silence en cas d'erreur de permission d'écriture locale
        }

        // Retourne le PDF en flux (inline) pour affichage et impression directs dans le navigateur
        return Pdf::view('order.recu', compact('order'))
            ->name('recu-commande-' . $order->id . '.pdf');
    }

    public function checkout(Request $request)
    {
        // paie
        // supprime la session
        // enrégistrer la commande dans une session
        $_SESSION['temp_order'] = json_decode($request->input('order'), true);
        $total_amount = 0;
        foreach ($_SESSION['temp_order'] as $line) {
            $article = Article::where('id', $line['id'])->first();
            $total_amount += $line['quantity'] * $article->current_price;
        }
        $transaction = Transaction::create([
            'description' => 'paiement de la comande id_commande',
            'amount' => $total_amount,
            'currency' => ['iso' => 'XOF'],
            'callback_url' => route('order.callback'),
            'mode' => 'mtn_open',
            'customer' => [
                'firstname' => Auth::user()->firstname,
                'lastname' => Auth::user()->lastname,
                'email' => Auth::user()->email,
                'phone_number' => [
                    'number' => '64000001',
                    'country' => 'bj',
                ],
            ],
        ]);

        return redirect($transaction->payment_url);
    }

    public function callback(Request $request)
    {
        // enrégistrer la commande si le paiement est passer
        $transactionId = $request->input('id');
        $statut = $request->input('status');
        if ($transactionId) {
            switch ($statut) {
                case 'approved':
                    // confirmer le paiement chez fedapay
                    // enrégistrer la commande puis retourner sur la page d'acceuil
                    return to_route('homePage');
                default:
                    DB::transaction(function () {
                        $total_amount = 0;
                        foreach ($_SESSION['temp_order'] as $line) {
                            $article = Article::where('id', $line['id'])->first();
                            $total_amount += $line['quantity'] * $article->current_price;
                        }
                        $order = Order::create([
                            'date' => now(),
                            'client_id' => Auth::user()->client->id,
                            'amount' => $total_amount,
                            'delivery_status' => 'PENDING',
                        ]);
                        foreach ($_SESSION['temp_order'] as $line) {
                            $article = Article::where('id', $line['id'])->first();
                            OrderLine::create([
                                'order_id' => $order->id,
                                'article_id' => $line['id'],
                                'quantity' => $line['quantity'],
                                'price' => $article->current_price,
                                'amount' => $line['quantity'] * $article->current_price,
                            ]);
                        }
                        unset($_SESSION['temp_order']);
                    });

                    return to_route('homePage');
                    break;
            }
        } else {
            return to_route('homePage');
        }
    }

    public static function middleware(): array
    {
        return [
            new Middleware('permission:orders.view', only: ['index']),
            new Middleware('permission:orders.confirm', only: ['deliveryConfirmed']),
            new Middleware('permission:orders.reject', only: ['reject']),
            new Middleware('permission:orders.start', only: ['startDelivery']),
            // new Middleware(WatchMiddleware::class, only:['checkout']),
            new Middleware('permission:order.checkout', only: ['checkout']),
            new Middleware('permission:order.callback', only: ['callback']),
        ];
    }
}
