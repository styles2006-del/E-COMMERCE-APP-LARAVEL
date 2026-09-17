@extends('layouts.admin.base', [
    'page_title' => 'Articles | Modification',
])

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Modifier l'Article #{{ $article->id }}</h1>
                <p class="text-xs text-slate-500 mt-1">Mettez à jour les informations relatives à ce produit.</p>
            </div>
            <a href="{{ route('admin.articles.index') }}" class="secondary-button">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Retour</span>
            </a>
        </div>

        <!-- Form Card Container -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
            <form action="{{ route('admin.articles.update', $article->id) }}" method="post" enctype="multipart/form-data" class="space-y-6">
                @method('PUT')
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Libellé -->
                    <div class="sm:col-span-2">
                        <label for="label" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Libellé de l'article *</label>
                        <input type="text" name="label" id="label" value="{{ old('label', $article->label) }}" required
                            class="input-premium" />
                        @error('label')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Prix -->
                    <div>
                        <label for="prix" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Prix (FCFA) *</label>
                        <input type="number" name="prix" id="prix" value="{{ old('prix', $article->current_price) }}" required
                            class="input-premium" />
                        @error('prix')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Quantité -->
                    <div>
                        <label for="quantity" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Quantité en stock *</label>
                        <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $article->quantity) }}" required
                            class="input-premium" />
                        @error('quantity')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Catégorie -->
                    <div class="sm:col-span-2">
                        <label for="category" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Catégorie</label>
                        <select name="category" id="category" class="input-premium">
                            @forelse ($categories as $categorie)
                                <option value="{{ $categorie->id }}" @selected(old('category', $article->category_id) == $categorie->id)>
                                    {{ $categorie->label }}
                                </option>
                            @empty
                                <option value="">Aucune catégorie disponible</option>
                            @endforelse
                        </select>
                        @error('category')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="sm:col-span-2">
                        <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="input-premium py-3">{{ old('description', $article->description) }}</textarea>
                        @error('description')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Cover Field & Current Image Preview -->
                    <div class="sm:col-span-2 space-y-3">
                        <label for="image" class="block text-xs font-semibold uppercase tracking-wider text-slate-700">Image de couverture</label>
                        
                        @if ($article->cover)
                            <div class="flex items-center gap-4 p-3 rounded-xl bg-slate-50 border border-slate-200 w-fit">
                                <img src="{{ asset('/storage/' . $article->cover) }}" alt="Cover" class="size-16 object-cover rounded-lg shadow-xs" />
                                <span class="text-xs text-slate-500">Image actuelle</span>
                            </div>
                        @endif

                        <input name="cover_field" id="image" type="file"
                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer transition-all" />
                        @error('cover_field')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                    <a href="{{ route('admin.articles.index') }}" class="secondary-button">Annuler</a>
                    <button type="submit" class="primary-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        <span>Mettre à jour</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
