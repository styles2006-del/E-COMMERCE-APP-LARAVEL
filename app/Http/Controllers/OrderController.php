<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Order;
use FedaPay\FedaPay;
use FedaPay\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
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

    public function checkOutPage(Request $request)
    {
        //paie
        //supprime la session
        //enrégistrer la commande dans une session
        $transaction = Transaction::create([
            'description' => 'paiement de la comande id_commande',
            'amount' => 1000,
            'currency' => ['iso' => 'XOF'],
            'callback_url' => route('order.callback'),
            'mode' => 'mtn_open',
            'customer' => [
                "firstname" => "John",
                "lastname" => "Doe",
                "email" => "John.doe@gmail.com",
                "phone_number" => [
                    "number" => "+22966000001",
                    "country" => 'bj'
                ]
            ]
        ]);
        return redirect($transaction->payment_url);
    }

    public function callback(Request $request)
    {
        //enrégistrer la commande si le paiement est passer
        $transactionId = $request->input('id');
        $statut = $request->input("status");
        if ($transactionId) {
            switch ($statut) {
                case 'approved':
                    //confirmer le paiement chez fedapay
                    // enrégistrer la commande puis retourner sur la page d'acceuil
                    return to_route('homePage');
                default:
                    dump('paiement échouer');
                    break;
            }
        } else {
            return to_route('homePage');
        }
    }
}
