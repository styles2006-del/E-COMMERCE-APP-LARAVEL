@extends('layouts.admin.base', [
    'page_title' => 'Articles | liste',
])
@section('content')
    <div class="min-w-6xl max-w-7xl space-y-12">
        <div class="flex justify-between">
            <h1 class="text-3xl">Liste des Articles</h1>
            @can('article.create')
                <a href="{{ route('admin.articles.create') }}">
                    <button class="primary-button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Ajouter
                    </button>
                </a>
            @endcan
        </div>
        <div class="border border-gray-200">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-300 bg-gray-300">
                        <th class="text-left text-sm px-3 py-2">ID</th>
                        <th class="text-left text-sm px-3 py-2">Image</th>
                        <th class="text-left text-sm px-3 py-2">Label</th>
                        <th class="text-left text-sm px-3 py-2">Prix</th>
                        <th class="text-left text-sm px-3 py-2">Quantité</th>
                        <th class="text-left text-sm px-3 py-2">Description</th>
                        <th class="text-left text-sm px-3 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articles as $article)
                        <tr class="border-t border-gray-300 hover:bg-gray-200">
                            <td class="text-left text-sm px-3 py-2">{{ $article->id }}</td>
                            <td class="text-left text-sm px-3 py-2">
                                <img src="{{ asset('/storage/' . $article->cover) }}" alt=""
                                    class="size-6 rounded-full">
                            </td>
                            <td class="text-left text-sm px-3 py-2">{{ $article->label }}</td>
                            <td class="text-left text-sm px-3 py-2">{{ $article->current_price }}</td>
                            <td>
                                @if ($article->quantity === 0)
                                    Aucun article
                                @else
                                    {{ $article->quantity }} articles
                                @endif
                            </td>
                            <td class="text-left text-sm px-3 py-2">{{ $article->description }}</td>
                            <td class="flex space-x-3 py-1">
                                @can('article.update')
                                    <a href="{{ route('admin.articles.edit', $article->id) }}">
                                        <button class="primary-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                            </svg>
                                            Edit
                                        </button>
                                    </a>
                                @endcan
                                @can('article.delete')
                                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="">
                                            <button class="danger-button">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                                Delete
                                            </button>
                                        </a>
                                    </form>
                                @endcan
                                <a href="{{ route('admin.articles.show', $article->id) }}">
                                    <button
                                        class="bg-brown-600 text-white py-1 px-3 hover:bg-yellow-500 w-full rounded rounded-lg sm:bg-yellow-600 flex gap-3 items-center cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                        </svg>
                                        Show
                                    </button>
                                </a>
                            </td>
                            </td>
                        @empty
                        <tr>Aucune catégorie trouver</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
