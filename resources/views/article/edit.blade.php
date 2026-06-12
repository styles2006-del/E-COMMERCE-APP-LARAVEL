@extends('layouts.admin.base')
@section('content')
    <div>
        <h1 class="text-3xl text-center py-3">Formulaire de modification d'un article</h1>
        <div class="p-6 space-y-6">
            <form action="{{ route('admin.articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="label" class="text-sm font-medium text-gray-900 block mb-2">Libellé : </label>
                        <input type="text" name="label" id="label" value="{{ old('label', $article->label) }}"class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                        @error('label')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="prix" class="text-sm font-medium text-gray-900 block mb-2">Prix : </label>
                        <input type="number" name="prix" id="prix"
                            value="{{ old('prix', $article->current_price) }}"class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                        @error('prix')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="quantity" class="text-sm font-medium text-gray-900 block mb-2">Quantité : </label>
                        <input type="number" name="quantity" id="quantity"
                            value="{{ old('quantity', $article->quantity) }}"class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                        @error('quantity')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="category" class="text-sm font-medium text-gray-900 block mb-2">Categorie : </label>
                        <select name="category" id="category" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                            @forelse ($categories as $categorie)
                                <option value="{{ $categorie->id }}" @selected(old("category",$article->category_id) == $categorie->id)>{{ $categorie->label }}</option>
                            @empty
                                <option value="">Aucune catégorie disponibles</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-span-full">
                        <label for="description" class="text-sm font-medium text-gray-900 block mb-2">Description : </label>
                        <textarea name="description" id="description" cols="30" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4">{{ old('description', $article->description) }}</textarea><br>
                        @error('description')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="image" class="text-sm font-medium text-gray-900 block mb-2">Image : </label>
                        <input name="cover_field" id="image" type="file"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"><br>
                        @error('cover_field')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <button type="submit" class="primary-button justify-center">
                    Update
                </button>
            </form>
        </div>
    </div>
@endsection
