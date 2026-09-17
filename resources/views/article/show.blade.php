@extends('layouts.admin.base', [
    'page_title' => 'Articles | Détails',
])

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Header Nav -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Fiche Produit #{{ $article->id }}</h1>
                <p class="text-xs text-slate-500 mt-1">Consultez les informations détaillées sur cet article.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.articles.index') }}" class="secondary-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Retour</span>
                </a>
                @can('article.update')
                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="primary-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <span>Modifier</span>
                    </a>
                @endcan
            </div>
        </div>

        <!-- Detail Card -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden grid grid-cols-1 md:grid-cols-3">
            <!-- Cover Image Column -->
            <div class="bg-slate-100 p-8 flex items-center justify-center border-b md:border-b-0 md:border-r border-slate-200">
                @if ($article->cover)
                    <img src="{{ asset('/storage/' . $article->cover) }}" alt="{{ $article->label }}"
                        class="w-full max-h-64 object-cover rounded-2xl shadow-md" />
                @else
                    <div class="size-32 rounded-2xl bg-slate-200 flex flex-col items-center justify-center text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-xs mt-2 font-medium">Sans image</span>
                    </div>
                @endif
            </div>

            <!-- Details Content Column -->
            <div class="md:col-span-2 p-6 sm:p-8 space-y-6">
                <div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 text-xs font-semibold uppercase tracking-wider mb-2">
                        {{ $article->category ? $article->category->label : 'Sans catégorie' }}
                    </span>
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">{{ $article->label }}</h2>
                </div>

                <div class="grid grid-cols-2 gap-4 py-4 border-y border-slate-100">
                    <div>
                        <span class="block text-xs font-bold uppercase tracking-wider text-slate-400">Prix unitaire</span>
                        <span class="text-2xl font-black text-indigo-600 mt-1 block">
                            {{ number_format($article->current_price, 0, ',', ' ') }} FCFA
                        </span>
                    </div>

                    <div>
                        <span class="block text-xs font-bold uppercase tracking-wider text-slate-400">Quantité en stock</span>
                        <span class="mt-1 inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold {{ $article->quantity > 0 ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-700' }}">
                            <span class="size-2 rounded-full {{ $article->quantity > 0 ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                            {{ $article->quantity > 0 ? $article->quantity . ' unités' : 'Rupture' }}
                        </span>
                    </div>
                </div>

                <div class="space-y-2">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">Description du produit</h3>
                    <p class="text-sm text-slate-600 leading-relaxed bg-slate-50 p-4 rounded-xl border border-slate-100">
                        {{ $article->description ?? 'Aucune description fournie pour cet article.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
