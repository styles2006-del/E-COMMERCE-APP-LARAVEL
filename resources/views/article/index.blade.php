@extends('layouts.admin.base', [
    'page_title' => 'Articles | Liste',
])

@section('content')
    <div class="space-y-8">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-indigo-600">Administration</span>
                <h1 class="font-display text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mt-0.5">Gestion des Articles</h1>
                <p class="text-xs text-slate-500 mt-1">Gérez votre catalogue de produits, tarifs, stocks et descriptions.</p>
            </div>
            @can('article.create')
                <a href="{{ route('admin.articles.create') }}" class="primary-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Ajouter un article</span>
                </a>
            @endcan
        </div>

        <!-- Metric KPI Cards -->
        <div data-aos="fade-up" class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-3 hover-lift">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Articles</span>
                    <div class="size-10 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold">
                        📦
                    </div>
                </div>
                <div class="font-display text-3xl font-extrabold text-slate-900">{{ count($articles) }}</div>
                <span class="text-[11px] text-slate-400 font-medium">Produits enregistrés au catalogue</span>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-3 hover-lift">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Articles en Stock</span>
                    <div class="size-10 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold">
                        ✅
                    </div>
                </div>
                <div class="font-display text-3xl font-extrabold text-emerald-600">
                    {{ $articles->where('quantity', '>', 0)->count() }}
                </div>
                <span class="text-[11px] text-slate-400 font-medium">Disponibles pour la vente</span>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-3 hover-lift">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Ruptures de Stock</span>
                    <div class="size-10 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center font-bold">
                        ⚠️
                    </div>
                </div>
                <div class="font-display text-3xl font-extrabold text-rose-600">
                    {{ $articles->where('quantity', '<=', 0)->count() }}
                </div>
                <span class="text-[11px] text-slate-400 font-medium">Nécessite un réapprovisionnement</span>
            </div>
        </div>

        <!-- Table Card Container -->
        <div data-aos="fade-up" data-aos-delay="100" class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Aperçu</th>
                            <th>Libellé & Catégorie</th>
                            <th>Prix Unitaire</th>
                            <th>État du Stock</th>
                            <th>Description</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $index => $article)
                            <tr data-aos="fade-up" data-aos-delay="{{ ($index % 10) * 50 }}" class="hover:bg-indigo-50/30 transition-colors">
                                <td class="font-bold text-slate-400">#{{ $article->id }}</td>
                                <td>
                                    <div class="size-12 rounded-2xl bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center shadow-xs">
                                        @if ($article->cover)
                                            <img src="{{ asset('/storage/' . $article->cover) }}" alt="{{ $article->label }}"
                                                class="size-full object-cover" />
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="font-extrabold text-slate-900 text-base">{{ $article->label }}</div>
                                    <div class="text-[11px] font-semibold text-indigo-600">
                                        {{ $article->category ? $article->category->label : 'Général' }}
                                    </div>
                                </td>
                                <td class="font-black text-indigo-600 text-base">
                                    {{ number_format($article->current_price, 0, ',', ' ') }} FCFA
                                </td>
                                <td>
                                    @if ($article->quantity <= 0)
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-50 text-rose-700 text-xs font-bold border border-rose-200/60">
                                            <span class="size-1.5 rounded-full bg-rose-500"></span>
                                            Épuisé
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold border border-emerald-200/60">
                                            <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                            {{ $article->quantity }} unités
                                        </span>
                                    @endif
                                </td>
                                <td class="max-w-xs text-slate-500 text-xs truncate">
                                    {{ $article->description ?? '—' }}
                                </td>
                                <td class="text-right">
                                    <div class="inline-flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.articles.show', $article->id) }}"
                                            class="p-2.5 rounded-xl text-slate-600 bg-slate-100 hover:bg-slate-200 transition-all"
                                            title="Voir détails">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        @can('article.update')
                                            <a href="{{ route('admin.articles.edit', $article->id) }}"
                                                class="p-2.5 rounded-xl text-indigo-600 bg-indigo-50 hover:bg-indigo-100 transition-all"
                                                title="Modifier">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                        @endcan

                                        @can('article.delete')
                                            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="post" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')"
                                                    class="p-2.5 rounded-xl text-rose-600 bg-rose-50 hover:bg-rose-100 transition-all cursor-pointer"
                                                    title="Supprimer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-16 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <div class="size-16 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 border border-slate-100 shadow-inner">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-bold text-slate-700">Aucun article enregistré</h4>
                                            <p class="text-xs text-slate-500 mt-1">Commencez par ajouter votre premier produit au catalogue.</p>
                                        </div>
                                        @can('article.create')
                                            <a href="{{ route('admin.articles.create') }}" class="primary-button text-xs mt-2 hover-lift">
                                                Ajouter un article
                                            </a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
