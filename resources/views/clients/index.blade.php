<!DOCTYPE html>
<html lang="fr" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue - STILES SHOP</title>
    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/js/card.js'])
</head>

<body class="bg-slate-50 text-slate-800 font-sans antialiased min-h-screen flex flex-col">
    <!-- Top Header -->
    <header class="bg-white border-b border-slate-200 py-4 px-6 sticky top-0 z-30 shadow-xs">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <a href="{{ route('homePage') }}" class="font-extrabold text-xl tracking-tight text-slate-900">
                STILES<span class="text-indigo-600">SHOP</span>
            </a>
            <a href="{{ route('homePage') }}" class="secondary-button text-xs">
                <span>Retour à l'accueil</span>
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-1 w-full space-y-8">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Catalogue des Articles</h1>
            <p class="text-xs text-slate-500 mt-1">Découvrez tous nos produits disponibles à la vente.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($articles as $article)
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col overflow-hidden group">
                    <div class="relative aspect-4/3 bg-slate-100 overflow-hidden">
                        @if ($article->cover)
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                src="{{ asset('/storage/' . $article->cover) }}" alt="{{ $article->label }}">
                        @else
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=600&auto=format&fit=crop" alt="{{ $article->label }}">
                        @endif
                        <div class="absolute top-3 right-3 px-3 py-1 rounded-full bg-slate-900/80 text-white font-extrabold text-xs">
                            {{ number_format($article->current_price, 0, ',', ' ') }} FCFA
                        </div>
                    </div>

                    <div class="p-5 flex flex-col flex-1 justify-between space-y-4">
                        <div>
                            <h3 class="font-bold text-slate-900 text-lg line-clamp-1">{{ $article->label }}</h3>
                            <p class="text-xs text-slate-500 line-clamp-2 mt-1">{{ $article->description }}</p>
                        </div>

                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                            <span class="font-extrabold text-indigo-600 text-base">{{ number_format($article->current_price, 0, ',', ' ') }} FCFA</span>
                            <button id="{{ $article->id }}" 
                                data-label="{{ $article->label }}"
                                data-price="{{ $article->current_price }}"
                                data-cover="{{ $article->cover ? asset('/storage/' . $article->cover) : '' }}"
                                class="add-to-cart inline-flex items-center gap-1 px-3.5 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold text-xs shadow-md shadow-indigo-600/20 transition-all cursor-pointer">
                                <span>+ Ajouter au panier</span>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center text-slate-400">
                    Pas d'articles disponibles.
                </div>
            @endforelse
        </div>
    </main>
</body>

</html>
