<!DOCTYPE html>
<html lang="fr" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Template E-commerce</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>

    <div class="drawer drawer-end">
        <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />

        <div class="drawer-content flex flex-col">

            <nav class="navbar bg-base-100 shadow-sm sticky top-0 z-50">
                <div class="flex-1">
                    <a class="btn btn-ghost text-xl">E-commerce Tp</a>
                </div>

                <div class="flex-none gap-2">
                    <label for="my-drawer-4" class="btn btn-ghost btn-circle">
                        <div class="indicator">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="badge badge-sm indicator-item">3</span>
                        </div>
                    </label>

                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 rounded-full">
                                <img alt="Profile"
                                    src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                            </div>
                        </div>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                            <li><a class="justify-between">Profile <span class="badge">New</span></a></li>
                            <li><a>Settings</a></li>
                            <li><a>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="container mx-auto max-w-7xl p-6">
                <h1 class="text-3xl font-bold py-6">Nos Articles</h1>
                <div class="mb-12">
                    <form action="{{ route('homePage') }}" method="get">
                        <label class="input">
                            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                                    stroke="currentColor">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </g>
                            </svg>
                            <input type="search" class="grow" placeholder="Rechercher un article" name="search"
                                value="{{ $search }}" />
                        </label>
                        <select class="select">
                            <option disabled selected>Pick a color</option>
                            <option>Crimson</option>
                            <option>Amber</option>
                            <option>Velvet</option>
                        </select>
                        <button class="btn btn-neutral" type="submit">Rechercher</button>
                    </form>
                </div>
                <div class="mb-12">
                    {{ $articles->links() }}
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($articles as $article)
                        <div class="card bg-base-100 shadow-sm">
                            <figure>
                                <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                                    alt="BlackShoes" />
                            </figure>
                            <div class="card-body">
                                <h2 class="card-title">{{ $article->label }}</h2>
                                <p>{{ $article->description }}</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-primary">Ajouter au panier</button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>pas d'article</p>
                    @endforelse
                </div>
            </main>

            <footer class="footer footer-horizontal footer-center text-base-content p-12 border-t border-gray-200">
                <p>Copyright © 2025 - All right reserved by ACME Industries Ltd</p>
            </footer>
        </div>

        <div class="drawer-side z-50">
            <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
            <div class="menu bg-base-100 text-base-content min-h-full w-80 p-4">
                <h2 class="text-xl font-bold mb-4">Votre Panier</h2>
                <div class="bg-red-500">
                    <span>Article 1</span>
                    <input type="number" placeholder="Type here" class="input" />
                </div>
                <form action="{{ route('order.checkout') }}" method="post">
                    @csrf
                    <button class="btn btn-primary w-full">Commander</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
