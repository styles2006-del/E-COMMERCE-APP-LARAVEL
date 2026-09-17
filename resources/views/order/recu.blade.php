<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reçu de commande #{{ $order->id }} - STILES SHOP</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-display {
            font-family: 'Outfit', sans-serif;
        }
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background: white !important;
                padding: 0 !important;
            }
            .invoice-card {
                box-shadow: none !important;
                border: none !important;
                padding: 0 !important;
                margin: 0 !important;
                max-width: 100% !important;
            }
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen py-12 px-4 sm:px-6 lg:px-8 font-sans antialiased text-slate-800">

    <!-- Print Action Bar -->
    <div class="max-w-3xl mx-auto mb-8 flex items-center justify-between no-print">
        <a href="{{ route('client.my-orders') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl font-bold text-xs text-slate-600 bg-white hover:bg-slate-100 border border-slate-200 transition-all cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span>Retour à mes commandes</span>
        </a>
        <button onclick="window.print()" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-bold text-xs text-white bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-500 hover:to-violet-500 shadow-lg shadow-indigo-600/20 active:scale-98 transition-all cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
            <span>Imprimer le reçu</span>
        </button>
    </div>

    <!-- Invoice Card Container -->
    <div class="invoice-card max-w-3xl mx-auto bg-white rounded-3xl shadow-[0_20px_50px_rgba(15,23,42,0.06)] border border-slate-100 p-8 sm:p-14 space-y-10 relative overflow-hidden">
        
        <!-- Premium Accent Top Bar -->
        <div class="absolute top-0 inset-x-0 h-2 bg-gradient-to-r from-indigo-500 via-violet-500 to-pink-500"></div>

        <!-- Header: Brand & Document Meta -->
        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-6 pb-8 border-b border-slate-100">
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="size-12 rounded-2xl bg-gradient-to-tr from-indigo-600 to-violet-600 flex items-center justify-center text-white shadow-lg shadow-indigo-600/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-display font-extrabold text-2xl tracking-tight text-slate-900 leading-none">STILES<span class="text-indigo-600">SHOP</span></h1>
                        <span class="text-[10px] text-slate-400 font-extrabold uppercase tracking-widest block mt-1">E-Commerce Boutique de Luxe</span>
                    </div>
                </div>
                <div class="text-xs text-slate-500 space-y-0.5">
                    <p class="font-medium text-slate-600">STILES SHOP S.A.S</p>
                    <p>Cocody, Boulevard de la République</p>
                    <p>Abidjan, Côte d'Ivoire</p>
                </div>
            </div>

            <div class="sm:text-right space-y-3">
                <div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-600 text-xs font-black tracking-wider uppercase">
                    <span class="size-1.5 rounded-full bg-emerald-500"></span>
                    Reçu Payé
                </div>
                <div class="space-y-0.5">
                    <div class="text-xs text-slate-500 font-medium">Facture N°: <span class="font-bold text-slate-950">#CMD-{{ $order->id }}</span></div>
                    <div class="text-xs text-slate-400">Date d'émission: {{ $order->created_at ? $order->created_at->format('d/m/Y H:i') : now()->format('d/m/Y H:i') }}</div>
                    <div class="text-xs text-slate-400">Mode de règlement: Mobile Money / FedaPay</div>
                </div>
            </div>
        </div>

        <!-- Client Info Block -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 bg-slate-50/50 p-6 rounded-2xl border border-slate-100">
            <div>
                <span class="block text-[9px] font-black uppercase tracking-widest text-slate-400 mb-2">Destinataire / Client</span>
                <div class="font-bold text-slate-900 text-base leading-tight">
                    {{ $order->client && $order->client->user ? $order->client->user->firstname . ' ' . $order->client->user->lastname : 'Client Exclusif' }}
                </div>
                <div class="text-xs text-slate-500 mt-2 space-y-1 font-light">
                    <p class="flex items-center gap-1.5">
                        <span class="text-slate-400">📞</span> {{ $order->client && $order->client->user ? $order->client->user->phone : 'N/A' }}
                    </p>
                    <p class="flex items-center gap-1.5">
                        <span class="text-slate-400">✉️</span> {{ $order->client && $order->client->user ? $order->client->user->email : 'N/A' }}
                    </p>
                </div>
            </div>

            <div class="sm:text-right flex flex-col justify-between items-start sm:items-end">
                <div>
                    <span class="block text-[9px] font-black uppercase tracking-widest text-slate-400 mb-2">Statut de Livraison</span>
                    @if ($order->delivery_status == 'DELIVERED')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-600 font-bold text-xs">
                            <span class="size-1.5 rounded-full bg-emerald-500"></span>
                            Livrée
                        </span>
                    @elseif ($order->delivery_status == 'START')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-xl bg-blue-500/10 border border-blue-500/30 text-blue-600 font-bold text-xs">
                            <span class="size-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                            En cours
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-xl bg-amber-500/10 border border-amber-500/30 text-amber-600 font-bold text-xs">
                            <span class="size-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                            En attente
                        </span>
                    @endif
                </div>
                <div class="text-xs text-slate-400 mt-3 sm:mt-0">
                    <p>Adresse de livraison: Adresse du client</p>
                </div>
            </div>
        </div>

        <!-- Articles Table Breakdown -->
        <div class="overflow-hidden border border-slate-100 rounded-2xl">
            <table class="w-full border-collapse text-left">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-[10px] font-black uppercase tracking-widest text-slate-400">
                        <th class="py-4 px-6">Description du produit</th>
                        <th class="py-4 px-4 text-center">Qté</th>
                        <th class="py-4 px-4 text-right">Prix Unitaire</th>
                        <th class="py-4 px-6 text-right">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @foreach ($order->articles as $article)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-800">{{ $article->label }}</div>
                                <span class="text-[10px] text-slate-400 font-semibold">{{ $article->category ? $article->category->label : 'Exclusif' }}</span>
                            </td>
                            <td class="py-4 px-4 text-center font-extrabold text-slate-600">{{ $article->pivot->quantity }}</td>
                            <td class="py-4 px-4 text-right font-medium text-slate-500">
                                {{ number_format($article->current_price, 0, ',', ' ') }} FCFA
                            </td>
                            <td class="py-4 px-6 text-right font-black text-slate-900">
                                {{ number_format($article->pivot->quantity * $article->current_price, 0, ',', ' ') }} FCFA
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Total Calculation Footer -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-6 pt-6 border-t border-slate-100">
            <!-- Digital Validation / QR & Signature Placeholder -->
            <div class="flex items-center gap-3">
                <!-- Decorative Barcode / Security Seal -->
                <div class="opacity-75 flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-32 h-8 text-slate-700" fill="currentColor" viewBox="0 0 100 20">
                        <!-- Barcode bars -->
                        <rect x="5" y="2" width="2" height="16" />
                        <rect x="8" y="2" width="1" height="16" />
                        <rect x="10" y="2" width="3" height="16" />
                        <rect x="15" y="2" width="1" height="16" />
                        <rect x="17" y="2" width="2" height="16" />
                        <rect x="21" y="2" width="4" height="16" />
                        <rect x="27" y="2" width="1" height="16" />
                        <rect x="30" y="2" width="2" height="16" />
                        <rect x="34" y="2" width="3" height="16" />
                        <rect x="38" y="2" width="1" height="16" />
                        <rect x="40" y="2" width="2" height="16" />
                        <rect x="44" y="2" width="4" height="16" />
                        <rect x="50" y="2" width="1" height="16" />
                        <rect x="53" y="2" width="2" height="16" />
                        <rect x="57" y="2" width="3" height="16" />
                        <rect x="62" y="2" width="1" height="16" />
                        <rect x="65" y="2" width="4" height="16" />
                        <rect x="71" y="2" width="1" height="16" />
                        <rect x="74" y="2" width="2" height="16" />
                        <rect x="78" y="2" width="3" height="16" />
                        <rect x="83" y="2" width="1" height="16" />
                        <rect x="86" y="2" width="2" height="16" />
                        <rect x="90" y="2" width="4" height="16" />
                    </svg>
                    <span class="text-[8px] font-black text-slate-400 uppercase tracking-widest mt-1">Signature Numérique STILES</span>
                </div>
            </div>

            <!-- Total Price Box -->
            <div class="w-full sm:w-80 bg-slate-950 text-white rounded-3xl p-6 space-y-2 border border-slate-800 shadow-xl">
                <div class="flex items-center justify-between text-xs text-slate-400 font-bold uppercase tracking-wider">
                    <span>Sous-total</span>
                    <span class="text-white">{{ number_format($order->amount, 0, ',', ' ') }} FCFA</span>
                </div>
                <div class="flex items-center justify-between text-xs text-slate-400 font-bold uppercase tracking-wider pb-3 border-b border-slate-800">
                    <span>Frais de livraison</span>
                    <span class="text-emerald-400">Gratuit</span>
                </div>
                <div class="flex items-center justify-between pt-3">
                    <span class="text-xs uppercase tracking-widest font-black text-slate-400">Total Réglé</span>
                    <span class="text-2xl font-black text-indigo-400 font-display">
                        {{ number_format($order->amount, 0, ',', ' ') }} FCFA
                    </span>
                </div>
            </div>
        </div>

        <!-- Footer Thank You Note -->
        <div class="pt-8 border-t border-slate-100 text-center space-y-1">
            <p class="text-xs font-bold text-slate-600">Merci d'avoir choisi STILES SHOP !</p>
            <p class="text-[10px] text-slate-400 font-medium">Pour toute question relative à cette facture, veuillez contacter support@stilesshop.com</p>
        </div>

    </div>

</body>

</html>
