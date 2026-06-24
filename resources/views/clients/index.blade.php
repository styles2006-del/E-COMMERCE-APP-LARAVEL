<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/js/card.js'])
</head>

<body>
    <div class="flex flex-col space-y-6 py-5">
        <div class="flex justify-center">
            <h1 class="text-3xl">ARTICLES</h1>
        </div>
        <div class="flex flex-row gap-5 justify-center">
            @forelse ($articles as $article)
                <div class="max-w-60 rounded-md overflow-hidden shadow-md hover:shadow-lg">
                    <div class="relative">
                        <img class="w-full" src="https://images.unsplash.com/photo-1523275335684-37898b6baf30"
                            alt="Product Image">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-medium mb-2">{{ $article->label }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $article->description }}</p>
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-lg">{{ $article->current_price . ' FCFA' }}</span>
                            <button id="{{ $article->id }}"
                                class="flex items-center justify-center rounded-sm bg-blue-400 hover:bg-blue-600 add-to-card">
                                ajouter
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <p>Pas d'articles disponibles.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
