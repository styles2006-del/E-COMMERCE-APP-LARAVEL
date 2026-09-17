@extends('layouts.admin.base', [
    'page_title' => 'Commandes | Liste',
])

@section('content')
    <div class="space-y-8">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-indigo-600">Administration</span>
                <h1 class="font-display text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mt-0.5">Gestion des Commandes</h1>
                <p class="text-xs text-slate-500 mt-1">Suivez les commandes passées par vos clients et leur état de livraison.</p>
            </div>
        </div>

        <!-- Metric KPI Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-2">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Commandes</span>
                <div class="font-display text-3xl font-extrabold text-slate-900">{{ count($orders) }}</div>
                <span class="text-[11px] text-slate-400 font-medium">Nombre total de ventes</span>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-2">
                <span class="text-xs font-bold uppercase tracking-wider text-amber-600">En Attente (PENDING)</span>
                <div class="font-display text-3xl font-extrabold text-amber-600">
                    {{ $orders->where('delivery_status', 'PENDING')->count() }}
                </div>
                <span class="text-[11px] text-slate-400 font-medium">À préparer pour la livraison</span>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-2">
                <span class="text-xs font-bold uppercase tracking-wider text-blue-600">En Cours (START)</span>
                <div class="font-display text-3xl font-extrabold text-blue-600">
                    {{ $orders->where('delivery_status', 'START')->count() }}
                </div>
                <span class="text-[11px] text-slate-400 font-medium">En cours d'acheminement</span>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-2">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-600">Livrées (DELIVERED)</span>
                <div class="font-display text-3xl font-extrabold text-emerald-600">
                    {{ $orders->where('delivery_status', 'DELIVERED')->count() }}
                </div>
                <span class="text-[11px] text-slate-400 font-medium">Livrées avec succès</span>
            </div>
        </div>

        <!-- Orders Table Card Container -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>N° Commande</th>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Montant Total</th>
                            <th>Statut de livraison</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td class="font-bold text-slate-400">#CMD-{{ $order->id }}</td>
                                <td class="text-slate-600 text-xs font-medium">{{ $order->date }}</td>
                                <td>
                                    <div class="font-extrabold text-slate-900">
                                        {{ $order->client && $order->client->user ? $order->client->user->firstname . ' ' . $order->client->user->lastname : 'Client Inconnu' }}
                                    </div>
                                    <div class="text-[11px] text-slate-400">{{ $order->client->user->email ?? '' }}</div>
                                </td>
                                <td class="font-black text-indigo-600 text-base">
                                    {{ number_format($order->amount, 0, ',', ' ') }} FCFA
                                </td>
                                <td>
                                    @if ($order->delivery_status === 'PENDING')
                                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-amber-50 text-amber-700 text-xs font-bold border border-amber-200/60">
                                            <span class="size-2 rounded-full bg-amber-500 animate-pulse"></span>
                                            En attente (PENDING)
                                        </span>
                                    @elseif ($order->delivery_status === 'START')
                                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold border border-blue-200/60">
                                            <span class="size-2 rounded-full bg-blue-500 animate-pulse"></span>
                                            En livraison (START)
                                        </span>
                                    @elseif ($order->delivery_status === 'DELIVERED')
                                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold border border-emerald-200/60">
                                            <span class="size-2 rounded-full bg-emerald-500"></span>
                                            Livrée (DELIVERED)
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3.5 py-1 rounded-full bg-slate-100 text-slate-600 text-xs font-bold">
                                            {{ $order->delivery_status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="inline-flex items-center justify-end gap-2">
                                        @if ($order->delivery_status === 'PENDING')
                                            <form action="{{ route('orders.start', $order->id) }}" method="post" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="warning-button py-2 px-3.5 text-xs">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                    </svg>
                                                    <span>Démarrer livraison</span>
                                                </button>
                                            </form>
                                        @elseif ($order->delivery_status === 'START')
                                            <form action="{{ route('orders.delivered', $order->id) }}" method="post" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="success-button py-2 px-3.5 text-xs">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    <span>Confirmer livraison</span>
                                                </button>
                                            </form>
                                        @elseif ($order->delivery_status === 'DELIVERED')
                                            <form action="{{ route('recu', $order->id) }}" method="post" class="inline" target="_blank">
                                                @csrf
                                                <button type="submit" class="secondary-button py-2 px-3.5 text-xs font-bold text-indigo-700 bg-indigo-50 border-indigo-100 hover:bg-indigo-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                    <span>Générer Reçu PDF</span>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-slate-400">
                                    Aucune commande n'a été passée pour l'instant.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
