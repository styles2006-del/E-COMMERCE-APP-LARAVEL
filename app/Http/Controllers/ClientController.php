<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
class ClientController extends Controller
{
    public function registerPage() {
        return view('clients.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|min:3',
            'lastname' => 'required|string|min:3',
            'gender' => 'required',
            'phone' => 'required|string|max:30|unique:users,phone',
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|alpha_num:ascii',
            'confirmPassword' => 'required|min:8|alpha_num:ascii|same:password',
        ]);

        DB::transaction(function () use ($validated) {
            $user = User::create([
                'firstname' => $validated['firstname'],
                'lastname' => $validated['lastname'],
                'gender' => $validated['gender'],
                'phone' => $validated['phone'],
                'birth_day' => $validated['birth_date'],
                'email' => $validated['email'],
                'password' => $validated['password'],
            ]);

            Client::create([
                'user_id' => $user->id,
            ]);

            $user->assignRole('client');
        });

        return redirect()->route('auth.login');
    }

    public function myOrders()
    {
        $user_id = Auth::user()->id;
        $orders = DB::table('orders')
            ->where('clients.user_id', $user_id)
            ->select('orders.*')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->get();
        return view('clients.ordersHistory',compact('orders'));
    }
}
