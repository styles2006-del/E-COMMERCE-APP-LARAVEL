@extends('layouts.admin.base', [
    'page_title' => 'Catégories | Création',
])

@section('content')
    <div class="max-w-2xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Créer une Catégorie</h1>
                <p class="text-xs text-slate-500 mt-1">Ajoutez un nouveau groupe de produits à votre catalogue.</p>
            </div>
            <a href="{{ route('admin.categories.index') }}" class="secondary-button">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Retour</span>
            </a>
        </div>

        <!-- Form Card Container -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
            <form action="{{ route('admin.categories.store') }}" method="post" class="space-y-6">
                @csrf

                <div>
                    <label for="label" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Libellé de la catégorie *</label>
                    <input type="text" name="label" id="label" value="{{ old('label') }}" required placeholder="Ex: Électronique, Vêtements..."
                        class="input-premium" />
                    @error('label')
                        <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="5" placeholder="Description sommaire de cette catégorie..."
                        class="input-premium py-3">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                    <a href="{{ route('admin.categories.index') }}" class="secondary-button">Annuler</a>
                    <button type="submit" class="primary-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Enregistrer</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
