<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.js', 'resources/css/app.css'])
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
                            <button
                                class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-400 hover:bg-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
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
