<!DOCTYPE html>
<html lang="fr" class="h-full scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STILES SHOP - Boutique & Mode Ultra Premium</title>
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/card.js'])
</head>

<body class="bg-slate-950 font-sans antialiased text-slate-100 selection:bg-indigo-500 selection:text-white min-h-screen flex flex-col">

    <!-- Top Announcement Bar -->
    <div class="bg-gradient-to-r from-indigo-900 via-violet-800 to-indigo-900 border-b border-indigo-700/50 py-2.5 px-4 text-center text-xs font-semibold text-indigo-100 relative z-50 overflow-hidden">
        <div class="max-w-7xl mx-auto flex items-center justify-center gap-2">
            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-indigo-500/30 border border-indigo-400/40 text-[10px] uppercase font-bold tracking-wider text-white">
                <span class="size-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                Offre Spéciale
            </span>
            <span>⚡ Livraison Express offerte pour toute commande dès 50 000 FCFA !</span>
        </div>
    </div>

    <!-- Drawer Container for Shopping Cart -->
    <div class="drawer drawer-end">
        <input id="panier-drawer" type="checkbox" class="drawer-toggle" />

        <div class="drawer-content flex flex-col min-h-screen">

            <!-- Sticky Navigation Header -->
            <header class="sticky top-0 z-40 bg-slate-950/85 backdrop-blur-2xl border-b border-slate-800/80 transition-all">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-4">

                    <!-- Brand Logo -->
                    <a href="{{ route('homePage') }}" class="flex items-center gap-3 group">
                        <div class="size-11 rounded-2xl bg-gradient-to-tr from-indigo-500 via-violet-500 to-pink-500 flex items-center justify-center text-white shadow-lg shadow-indigo-500/30 group-hover:scale-105 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <span class="font-display font-extrabold text-2xl tracking-tight text-white">STILES<span class="text-indigo-400">SHOP</span></span>
                    </a>

                    <!-- Navigation Links & User Actions -->
                    <div class="flex items-center gap-3 sm:gap-4">
                        @auth
                            <div class="hidden md:flex items-center gap-3 pr-3 border-r border-slate-800">
                                <span class="text-xs font-semibold text-slate-300">Bonjour, <span class="text-indigo-400 font-bold">{{ Auth::user()->firstname }}</span></span>
                                @can('orders.view')
                                    <a href="{{ route('orders.index') }}" class="secondary-dark-button text-xs py-2 px-3">
                                        Administration
                                    </a>
                                @endcan
                                <a href="{{ route('client.my-orders') }}" class="secondary-dark-button text-xs py-2 px-3">
                                    Mes Commandes
                                </a>
                            </div>

                            <form action="{{ route('auth.logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-xs font-semibold text-slate-400 hover:text-rose-400 transition-colors py-2 px-3 cursor-pointer">
                                    Déconnexion
                                </button>
                            </form>
                        @else
                            <a href="{{ route('auth.login') }}" class="secondary-dark-button text-xs py-2 px-3">
                                Connexion
                            </a>
                            <a href="{{ route('client.register') }}" class="primary-button text-xs py-2 px-3">
                                S'inscrire
                            </a>
                        @endauth

                        <!-- Cart Drawer Trigger Button with Badge -->
                        <label for="panier-drawer"
                            class="drawer-button relative p-2.5 rounded-2xl bg-slate-900 hover:bg-slate-800 text-slate-200 border border-slate-800 shadow-lg shadow-indigo-500/5 transition-all duration-200 cursor-pointer flex items-center justify-center group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-indigo-400 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <span class="cart-count-badge hidden absolute -top-1.5 -right-1.5 size-5 rounded-full bg-gradient-to-tr from-indigo-500 to-pink-500 text-white font-black text-[10px] flex items-center justify-center ring-2 ring-slate-950 shadow-md">
                                0
                            </span>
                        </label>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1">

                <!-- Hero Showcase Section -->
                <section class="relative overflow-hidden py-20 sm:py-28 bg-gradient-to-b from-slate-900 via-slate-950 to-slate-950 border-b border-slate-800/80">
                    <!-- Glowing Background Ambient Orbs -->
                    <div class="absolute -top-40 -left-40 size-96 rounded-full bg-indigo-600/20 blur-3xl pointer-events-none"></div>
                    <div class="absolute top-1/2 -right-40 size-96 rounded-full bg-violet-600/20 blur-3xl pointer-events-none"></div>
                    <div class="absolute bottom-0 left-1/3 size-80 rounded-full bg-pink-600/10 blur-3xl pointer-events-none"></div>

                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-8">

                        <!-- Badge Tag -->
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-900/90 border border-slate-700/80 shadow-xl backdrop-blur-md text-xs font-semibold text-slate-300">
                            <span class="size-2 rounded-full bg-indigo-400 animate-pulse"></span>
                            <span>Collection Ultra Luxe & Tendance 2026</span>
                        </div>

                        <!-- Main Headline -->
                        <h1 data-aos="fade-up" data-aos-duration="1000" class="font-display text-4xl sm:text-7xl font-black text-white tracking-tight leading-tight max-w-5xl mx-auto">
                            L'Élégance Redéfinie. <br />
                            <span class="gradient-text">Le Luxe À Votre Portée.</span>
                        </h1>

                        <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" class="text-base sm:text-xl text-slate-400 max-w-3xl mx-auto leading-relaxed font-light">
                            Explorez une sélection triée sur le volet de vêtements et d'accessoires de qualité supérieure. Style affirmé, authenticité garantie et livraison express.
                        </p>

                        <!-- Key Metrics Bar -->
                        <div class="pt-4 flex flex-wrap items-center justify-center gap-8 sm:gap-16 text-slate-400">
                            <div class="text-center">
                                <div class="font-display text-2xl sm:text-3xl font-extrabold text-white">15 000+</div>
                                <div class="text-xs text-slate-500 font-medium">Articles Livrés</div>
                            </div>
                            <div class="h-8 w-px bg-slate-800 hidden sm:block"></div>
                            <div class="text-center">
                                <div class="font-display text-2xl sm:text-3xl font-extrabold text-amber-400 flex items-center justify-center gap-1">
                                    4.9 <span class="text-base">★</span>
                                </div>
                                <div class="text-xs text-slate-500 font-medium">Avis Clients</div>
                            </div>
                            <div class="h-8 w-px bg-slate-800 hidden sm:block"></div>
                            <div class="text-center">
                                <div class="font-display text-2xl sm:text-3xl font-extrabold text-indigo-400">100%</div>
                                <div class="text-xs text-slate-500 font-medium">Produits Authentiques</div>
                            </div>
                        </div>

                        <!-- Search Bar -->
                        <div data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="400" class="pt-6 max-w-2xl mx-auto">
                            <form action="{{ route('homePage') }}" method="GET" class="glass-panel-dark p-2.5 rounded-2xl flex items-center gap-2 shadow-2xl border border-slate-800">
                                <div class="relative flex-1">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Que recherchez-vous aujourd'hui (T-shirt, Chaussures...) ?"
                                        class="w-full pl-12 pr-4 py-3.5 rounded-xl bg-slate-900/90 border border-slate-700/80 text-white text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all" />
                                </div>
                                <button type="submit" class="primary-button py-3.5 px-6 text-sm">
                                    Rechercher
                                </button>
                            </form>
                        </div>

                    </div>
                </section>

                <!-- Catalog & Ultra-Luxe Product Showcase -->
                <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 space-y-12">

                    <!-- Category Pills Filter Bar -->
                    <div class="flex items-center gap-3 overflow-x-auto pb-4 scrollbar-none">
                        <a href="{{ route('homePage') }}"
                            class="px-5 py-2.5 rounded-2xl text-xs font-bold whitespace-nowrap transition-all duration-200 border {{ !request('category') ? 'bg-gradient-to-r from-indigo-600 to-violet-600 text-white border-transparent shadow-lg shadow-indigo-600/30' : 'bg-slate-900 text-slate-400 border-slate-800 hover:bg-slate-800 hover:text-white' }}">
                            ✨ Tous les produits
                        </a>
                        @foreach ($categories as $cat)
                            <a href="{{ route('homePage', ['category' => $cat->id]) }}"
                                class="px-5 py-2.5 rounded-2xl text-xs font-bold whitespace-nowrap transition-all duration-200 border {{ request('category') == $cat->id ? 'bg-gradient-to-r from-indigo-600 to-violet-600 text-white border-transparent shadow-lg shadow-indigo-600/30' : 'bg-slate-900 text-slate-400 border-slate-800 hover:bg-slate-800 hover:text-white' }}">
                                {{ $cat->label }}
                            </a>
                        @endforeach
                    </div>

                    <!-- Section Header -->
                    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 border-b border-slate-800/80 pb-6">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-indigo-400">Collection d'Exception</span>
                            <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-white tracking-tight mt-1">Nos Articles en Vedette</h2>
                        </div>
                        <span class="text-xs font-semibold text-slate-400 bg-slate-900 px-4 py-2 rounded-full border border-slate-800">
                            {{ count($articles) }} produit(s) disponible(s)
                        </span>
                    </div>

                    <!-- High-End Product Grid -->
                    @php
                        $fallbackImages = [
                            'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=800&auto=format&fit=crop',
                            'https://images.unsplash.com/photo-1549298916-b41d501d3772?w=800&auto=format&fit=crop',
                            'https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?w=800&auto=format&fit=crop',
                            'https://images.unsplash.com/photo-1539109136881-3be0616acf4b?w=800&auto=format&fit=crop',
                            'https://images.unsplash.com/photo-1509631179647-0177331693ae?w=800&auto=format&fit=crop',
                            'https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=800&auto=format&fit=crop',
                        ];
                    @endphp

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                        @forelse ($articles as $index => $article)
                            @php
                                $imgSrc = $article->cover
                                    ? asset('/storage/' . $article->cover)
                                    : $fallbackImages[$index % count($fallbackImages)];
                                $originalPrice = $article->current_price * 1.35;
                            @endphp

                            <div data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 100 }}" data-aos-duration="800" class="group relative bg-slate-900/40 backdrop-blur-md border border-slate-800/80 hover:border-indigo-500/40 rounded-3xl overflow-hidden shadow-2xl hover:shadow-[0_0_50px_-12px_rgba(99,102,241,0.25)] hover:-translate-y-2 transition-all duration-500 ease-out flex flex-col">

                                <!-- Product Image Stage (Aspect 4/5 portrait) -->
                                <div class="relative aspect-[4/5] bg-slate-950 overflow-hidden">
                                    <img src="{{ $imgSrc }}" alt="{{ $article->label }}"
                                        class="size-full object-cover group-hover:scale-108 transition-transform duration-1000 ease-out" />

                                    <!-- Elegant Dark Radial Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent opacity-80 group-hover:opacity-50 transition-opacity duration-300"></div>

                                    <!-- Top Left Brand Label Tag -->
                                    <div class="absolute top-4 left-4 z-10">
                                        <span class="inline-flex items-center px-3 py-1 rounded-xl bg-slate-950/80 backdrop-blur-md border border-slate-800 text-[9px] font-black uppercase tracking-widest text-slate-300 shadow-md">
                                            {{ $article->category ? $article->category->label : 'Exclusif' }}
                                        </span>
                                    </div>

                                    <!-- Top Right Stock Status -->
                                    <div class="absolute top-4 right-4 z-10">
                                        @if ($article->quantity > 0)
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-[10px] font-bold backdrop-blur-md">
                                                <span class="size-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                                En stock
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-400 text-[10px] font-bold backdrop-blur-md">
                                                Rupture
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Desktop Slide-Up Quick Add Button -->
                                    <div class="absolute inset-x-4 bottom-4 z-20 opacity-0 group-hover:opacity-100 translate-y-4 group-hover:translate-y-0 transition-all duration-500 ease-out">
                                        <button id="{{ $article->id }}"
                                            data-label="{{ $article->label }}"
                                            data-price="{{ $article->current_price }}"
                                            data-cover="{{ $imgSrc }}"
                                            class="add-to-cart w-full py-3.5 px-4 rounded-2xl font-bold text-xs text-slate-950 bg-white/95 hover:bg-white shadow-2xl flex items-center justify-center gap-2 cursor-pointer active:scale-98 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                            <span>Ajouter au Panier</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Card Metadata & Content -->
                                <div class="p-6 flex flex-col flex-1 justify-between gap-5">
                                    <div class="space-y-2.5">
                                        <!-- Rating Stars & Stock Alert -->
                                        <div class="flex items-center justify-between text-[11px] font-bold">
                                            <div class="flex items-center gap-1 text-amber-400">
                                                <span class="tracking-widest">★★★★★</span>
                                                <span class="text-slate-500 font-semibold">(4.9)</span>
                                            </div>
                                            @if ($article->quantity > 0 && $article->quantity <= 5)
                                                <span class="text-amber-500 animate-pulse tracking-wide">⚡ Plus que {{ $article->quantity }} restants</span>
                                            @endif
                                        </div>

                                        <!-- Title -->
                                        <h3 class="font-display font-bold text-white text-lg tracking-tight group-hover:text-indigo-400 transition-colors line-clamp-1 leading-snug">
                                            {{ $article->label }}
                                        </h3>

                                        <!-- Description -->
                                        <p class="text-xs text-slate-400 line-clamp-2 leading-relaxed font-light">
                                            {{ $article->description ?? 'Une création iconique alliant style contemporain et matériaux haut de gamme.' }}
                                        </p>
                                    </div>

                                    <!-- Price Display & Mobile Add Button -->
                                    <div class="pt-4 border-t border-slate-800/60 flex items-center justify-between gap-3">
                                        <div>
                                            <div class="text-[9px] font-extrabold uppercase tracking-widest text-slate-500 mb-0.5">Tarif Privilège</div>
                                            <div class="flex items-center gap-2">
                                                <span class="text-2xl font-black text-white font-display">
                                                    {{ number_format($article->current_price, 0, ',', ' ') }}
                                                </span>
                                                <span class="text-xs font-bold text-indigo-400">FCFA</span>
                                            </div>
                                            <div class="text-[10px] text-slate-500 line-through">
                                                {{ number_format($originalPrice, 0, ',', ' ') }} FCFA
                                            </div>
                                        </div>

                                        <!-- Mobile-friendly add icon -->
                                        <button id="{{ $article->id }}"
                                            data-label="{{ $article->label }}"
                                            data-price="{{ $article->current_price }}"
                                            data-cover="{{ $imgSrc }}"
                                            class="add-to-cart size-11 rounded-2xl bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 text-white flex items-center justify-center shadow-lg shadow-indigo-600/35 transition-all cursor-pointer shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                            </svg>
                                        </button>
                                    </div>

                                </div>

                            </div>
                        @empty
                            <div class="col-span-full py-20 text-center text-slate-500 space-y-4 bg-slate-900/40 rounded-3xl border border-slate-800">
                                <div class="size-16 rounded-full bg-slate-800 flex items-center justify-center mx-auto text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-white">Aucun article trouvé</h4>
                                    <p class="text-xs text-slate-400 mt-1">Essayez une autre recherche ou parcourez nos catégories.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </section>

                <!-- Trust Features Grid -->
                <section class="border-t border-slate-800/80 bg-slate-900/60 py-16">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        <div data-aos="fade-up" data-aos-delay="0" class="flex items-start gap-4 p-5 rounded-3xl bg-slate-900/80 border border-slate-800">
                            <div class="size-12 rounded-2xl bg-indigo-600/20 text-indigo-400 flex items-center justify-center font-bold text-xl shrink-0">
                                🚀
                            </div>
                            <div>
                                <h4 class="font-bold text-white text-sm">Livraison Express</h4>
                                <p class="text-xs text-slate-400 mt-1">Expédition rapide et suivie partout en Côte d'Ivoire.</p>
                            </div>
                        </div>

                        <div data-aos="fade-up" data-aos-delay="100" class="flex items-start gap-4 p-5 rounded-3xl bg-slate-900/80 border border-slate-800">
                            <div class="size-12 rounded-2xl bg-violet-600/20 text-violet-400 flex items-center justify-center font-bold text-xl shrink-0">
                                🔒
                            </div>
                            <div>
                                <h4 class="font-bold text-white text-sm">Paiement 100% Sécurisé</h4>
                                <p class="text-xs text-slate-400 mt-1">Payez par Mobile Money (MTN, Wave, Orange) ou Carte.</p>
                            </div>
                        </div>

                        <div data-aos="fade-up" data-aos-delay="200" class="flex items-start gap-4 p-5 rounded-3xl bg-slate-900/80 border border-slate-800">
                            <div class="size-12 rounded-2xl bg-emerald-600/20 text-emerald-400 flex items-center justify-center font-bold text-xl shrink-0">
                                ✨
                            </div>
                            <div>
                                <h4 class="font-bold text-white text-sm">Qualité Premium</h4>
                                <p class="text-xs text-slate-400 mt-1">Tous nos produits sont vérifiés et garantis authentiques.</p>
                            </div>
                        </div>

                        <div data-aos="fade-up" data-aos-delay="300" class="flex items-start gap-4 p-5 rounded-3xl bg-slate-900/80 border border-slate-800">
                            <div class="size-12 rounded-2xl bg-pink-600/20 text-pink-400 flex items-center justify-center font-bold text-xl shrink-0">
                                🎧
                            </div>
                            <div>
                                <h4 class="font-bold text-white text-sm">Service Client 24/7</h4>
                                <p class="text-xs text-slate-400 mt-1">Une équipe dédiée pour répondre à toutes vos questions.</p>
                            </div>
                        </div>
                    </div>
                </section>

            </main>

            <!-- Footer -->
            <footer class="bg-slate-950 border-t border-slate-800/80 py-12 text-center text-xs text-slate-500">
                <div class="max-w-7xl mx-auto px-4 space-y-4">
                    <div class="flex items-center justify-center gap-3">
                        <div class="size-8 rounded-xl bg-gradient-to-tr from-indigo-500 to-violet-500 flex items-center justify-center text-white font-bold text-sm">
                            S
                        </div>
                        <span class="font-display font-extrabold text-xl tracking-tight text-white">STILES<span class="text-indigo-400">SHOP</span></span>
                    </div>
                    <p class="max-w-md mx-auto text-slate-400">Votre destination incontournable pour le prêt-à-porter et les accessoires haut de gamme.</p>
                    <p class="pt-4 border-t border-slate-900 font-medium text-slate-600">STILES SHOP &copy; 2026. Tous droits réservés.</p>
                </div>
            </footer>
        </div>

        <!-- Premium Cart Drawer Side Panel -->
        <div class="drawer-side z-50">
            <label for="panier-drawer" aria-label="close sidebar" class="drawer-overlay bg-slate-950/75 backdrop-blur-xs"></label>

            <div class="menu bg-white text-slate-800 min-h-full w-80 sm:w-96 p-0 flex flex-col shadow-2xl">
                <!-- Drawer Header -->
                <div class="p-5 border-b border-slate-200 flex items-center justify-between bg-slate-50 shrink-0">
                    <div class="flex items-center gap-3">
                        <div class="size-10 rounded-xl bg-gradient-to-tr from-indigo-600 to-violet-600 text-white flex items-center justify-center font-bold text-base shadow-md shadow-indigo-600/20">
                            🛒
                        </div>
                        <div>
                            <h3 class="font-display font-extrabold text-base text-slate-900 leading-tight">Mon Panier</h3>
                            <p class="text-xs text-slate-500"><span class="cart-count-badge font-bold text-indigo-600">0</span> article(s) dans le panier</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <button id="clear-cart-btn" class="text-xs text-rose-600 hover:text-rose-700 font-semibold px-2 py-1 rounded-lg hover:bg-rose-50 transition-all cursor-pointer" title="Vider le panier">
                            Vider
                        </button>
                        <label for="panier-drawer" class="btn btn-sm btn-circle btn-ghost text-slate-400 hover:text-slate-700 cursor-pointer">✕</label>
                    </div>
                </div>

                <!-- Scrollable Item List Container -->
                <div id="panier" class="flex-1 overflow-y-auto p-4 space-y-3">
                    <!-- Dynamic Cart Items rendered by card.js -->
                </div>

                <!-- Fixed Footer Summary & Checkout Action -->
                <div class="p-5 border-t border-slate-200 bg-slate-50 space-y-4 shrink-0">
                    <div class="space-y-2 text-xs">
                        <div class="flex items-center justify-between text-slate-500">
                            <span>Sous-total</span>
                            <span id="cart-subtotal-price" class="font-bold text-slate-800">0 FCFA</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-500">
                            <span>Frais de livraison</span>
                            <span class="font-medium text-slate-400">Calculés à la caisse</span>
                        </div>
                        <div class="flex items-center justify-between text-sm font-extrabold text-slate-900 pt-2.5 border-t border-slate-200">
                            <span>Total estimé</span>
                            <span id="cart-total-price" class="text-indigo-600 text-base">0 FCFA</span>
                        </div>
                    </div>

                    <form id="form" action="{{ route('order.checkout') }}" method="post">
                        @csrf
                        <input type="hidden" name="order" value="" />
                        <button id="checkout-submit-btn" type="submit"
                            class="w-full py-4 px-4 rounded-xl font-bold text-sm text-white bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-500 hover:to-violet-500 active:from-indigo-700 active:to-violet-700 shadow-lg shadow-indigo-600/30 transition-all flex items-center justify-center gap-2 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
                            <span>Passer la commande</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 50,
        });
    </script>
</body>

</html>
