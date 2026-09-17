@extends('layouts.admin.base', [
    'page_title' => 'Articles | Création',
])

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Ajouter un Article</h1>
                <p class="text-xs text-slate-500 mt-1">Renseignez les détails du nouveau produit à mettre en vente.</p>
            </div>
            <a href="{{ route('admin.articles.index') }}" class="secondary-button">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Retour à la liste</span>
            </a>
        </div>

        <!-- Form Card Container -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
            <form action="{{ route('admin.articles.store') }}" method="post" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Libellé -->
                    <div class="sm:col-span-2">
                        <label for="label" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Libellé de l'article *</label>
                        <input type="text" name="label" id="label" value="{{ old('label') }}" required placeholder="Ex: T-Shirt Premium Coton"
                            class="input-premium" />
                        @error('label')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Prix -->
                    <div>
                        <label for="prix" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Prix (FCFA) *</label>
                        <input type="number" name="prix" id="prix" value="{{ old('prix') }}" required placeholder="Ex: 15000"
                            class="input-premium" />
                        @error('prix')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Quantité -->
                    <div>
                        <label for="quantity" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Quantité en stock *</label>
                        <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" required placeholder="Ex: 50"
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
                                <option value="{{ $categorie->id }}" {{ old('category') == $categorie->id ? 'selected' : '' }}>
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
                        <textarea name="description" id="description" rows="4" placeholder="Description détaillée du produit..."
                            class="input-premium py-3">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Cover -->
                    <div class="sm:col-span-2">
                        <label for="image" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Image de couverture</label>
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
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Enregistrer l'article</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
