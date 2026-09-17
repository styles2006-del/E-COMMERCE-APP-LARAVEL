<!DOCTYPE html>
<html lang="fr" class="h-full scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique de mes commandes - STILES SHOP</title>
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="bg-slate-950 text-slate-100 font-sans antialiased min-h-screen flex flex-col selection:bg-indigo-500 selection:text-white">
    
    <!-- Top Header -->
    <header class="bg-slate-950/80 backdrop-blur-2xl border-b border-slate-800/80 py-4 px-6 sticky top-0 z-40 transition-all">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <a href="{{ route('homePage') }}" class="flex items-center gap-3 group">
                <div class="size-10 rounded-xl bg-gradient-to-tr from-indigo-500 via-violet-500 to-pink-500 flex items-center justify-center text-white shadow-lg shadow-indigo-500/30 group-hover:scale-105 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <span class="font-display font-extrabold text-xl tracking-tight text-white">STILES<span class="text-indigo-400">SHOP</span></span>
            </a>
            <a href="{{ route('homePage') }}" class="secondary-dark-button text-xs animated-underline hover-lift">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Retour à la boutique</span>
            </a>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-1 w-full space-y-8 relative z-10">
        <!-- Ambient Background Orbs -->
        <div class="absolute -top-20 -left-20 size-80 rounded-full bg-indigo-600/10 blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 size-80 rounded-full bg-violet-600/10 blur-3xl pointer-events-none"></div>

        <div data-aos="fade-down" class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 glass-panel-dark p-6 rounded-3xl border border-slate-800 shadow-2xl">
            <div>
                <h1 class="font-display text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Historique de mes Commandes</h1>
                <p class="text-xs text-slate-400 mt-1">Retrouvez le récapitulatif et le suivi de toutes vos commandes passées.</p>
            </div>
            <div class="flex items-center gap-2 px-4 py-2 bg-slate-900 rounded-xl border border-slate-700/80">
                <span class="text-2xl font-black text-indigo-400">{{ count($orders) }}</span>
                <span class="text-[10px] uppercase font-bold text-slate-500 tracking-wider leading-tight">Commandes<br>Totales</span>
            </div>
        </div>

        <!-- Orders Table Card -->
        <div data-aos="fade-up" data-aos-delay="100" class="premium-card-dark overflow-hidden relative">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="px-6 py-4 bg-slate-900/90 text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-800">N° Commande</th>
                            <th class="px-6 py-4 bg-slate-900/90 text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-800">Date</th>
                            <th class="px-6 py-4 bg-slate-900/90 text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-800">Statut</th>
                            <th class="px-6 py-4 bg-slate-900/90 text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-800 text-right">Montant Total</th>
                            <th class="px-6 py-4 bg-slate-900/90 text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-800 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        @forelse ($orders as $order)
                            <tr class="hover:bg-slate-800/40 transition-colors duration-200">
                                <td class="px-6 py-4 font-bold text-slate-300">#CMD-{{ $order->id }}</td>
                                <td class="px-6 py-4 text-slate-400 text-xs font-medium">{{ $order->date }}</td>
                                <td class="px-6 py-4">
                                    @if ($order->delivery_status === 'PENDING')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/10 text-amber-400 text-[10px] font-bold border border-amber-500/30 backdrop-blur-sm">
                                            <span class="size-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                                            En attente
                                        </span>
                                    @elseif ($order->delivery_status === 'START')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-500/10 text-blue-400 text-[10px] font-bold border border-blue-500/30 backdrop-blur-sm">
                                            <span class="size-1.5 rounded-full bg-blue-400 animate-pulse"></span>
                                            En livraison
                                        </span>
                                    @elseif ($order->delivery_status === 'DELIVERED')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 text-[10px] font-bold border border-emerald-500/30 backdrop-blur-sm">
                                            <span class="size-1.5 rounded-full bg-emerald-400"></span>
                                            Livrée
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-slate-800 text-slate-300 text-[10px] font-bold border border-slate-700">
                                            {{ $order->delivery_status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right font-display font-extrabold text-white text-base">
                                    {{ number_format($order->amount, 0, ',', ' ') }} <span class="text-xs text-indigo-400">FCFA</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form action="{{ route('recu', $order->id) }}" method="post" class="inline" target="_blank">
                                        @csrf
                                        <button type="submit" class="secondary-dark-button py-2 px-3 text-xs font-bold hover:text-indigo-400 hover:border-indigo-500/50 hover-lift">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5 inline mr-1 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <span>Reçu PDF</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <div class="size-16 rounded-full bg-slate-900 flex items-center justify-center text-slate-600 border border-slate-800 shadow-inner">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-bold text-slate-300">Aucune commande</h4>
                                            <p class="text-xs text-slate-500 mt-1">Vous n'avez pas encore passé de commande sur notre boutique.</p>
                                        </div>
                                        <a href="{{ route('homePage') }}" class="primary-button text-xs mt-2 hover-lift">
                                            Commencer mon shopping
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 20,
        });
    </script>
</body>

</html>
