@extends('layouts.admin.base', ['page_title' => 'Orders | Listes'])
@section('content')
    <div class="min-w-6xl max-w-7xl space-y-12">
        <div class="flex justify-between">
            <h1 class="text-3xl">Liste des Commandes</h1>
        </div>
        <div class="border border-gray-200 px-6">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-300">
                        <th class="text-left text-sm px-3 py-2">Date</th>
                        <th class="text-left text-sm px-3 py-2">Amount</th>
                        <th class="text-left text-sm px-3 py-2">Delivery Status</th>
                        <th class="text-left text-sm px-3 py-2">Client Name</th>
                        <th class="text-left text-sm px-3 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-t border-gray-300 hover:bg-gray-200">
                            <td class="text-left text-sm px-3 py-2">{{ $order->date }}</td>
                            <td class="text-left text-sm px-3 py-2">{{ $order->amount }}</td>
                            <td class="text-left text-sm px-3 py-2">{{ $order->delivery_status }}</td>
                            <td class="text-left text-sm px-3 py-2">{{ $order->client->user->firstname }}</td>
                            <td class="flex space-x-3 py-1">
                                @if ($order->delivery_status === 'PENDING')
                                    <form action="{{ route('orders.start', $order->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="primary-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                            </svg>
                                            Start
                                        </button>
                                    </form>
                                    <button class="danger-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        Reject
                                    </button>
                                    </form>
                                @elseif ($order->delivery_status === 'START')
                                    <form action="{{ route('orders.delivered', $order->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="primary-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                            </svg>
                                            Confirm
                                        </button>
                                    </form>
                                @else
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
