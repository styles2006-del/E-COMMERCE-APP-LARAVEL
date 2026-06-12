@extends('layouts.admin.base')
@section('content')
    <form action="{{ route('admin.categories.store') }}" method="post" class="border border-gray-100 p-6 rounded-2xl shadow-2xl">
        @csrf
        <h1 class="text-3xl text-center py-3">Création d'une catégorie</h1>
        <div class="flex flex-col">
            <label for="label" class="text-sm">Libellé : </label>
            <input type="text" name="label" id="label"
                value="{{ old('label') }}"class="border border-gray-200 px-2 py-1 rounded rounded-lg"><br>
            @error('label')
                {{ $message }}
            @enderror
        </div><br>
        <div class="flex flex-col">
            <label for="description" class="text-sm">Description : </label>
            <textarea name="description" id="description" cols="30" rows="10"
                class="border border-gray-200 px-2 py-1 rounded rounded-lg"></textarea><br>
            @error('description')
                {{ $message }}
            @enderror
        </div><br>
        <button type="submit" class="primary-button justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
            </svg>
            Enrégistrer
        </button>
    </form>
@endsection
