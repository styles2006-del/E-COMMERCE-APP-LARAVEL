<!DOCTYPE html>
<html lang="fr" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - STILES SHOP</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full font-sans antialiased text-slate-100 selection:bg-indigo-500 selection:text-white">
    
    <div class="min-h-screen w-full bg-slate-950 flex items-center justify-center p-4 relative overflow-hidden">
        <!-- Background Decorator Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -left-40 size-96 rounded-full bg-indigo-600/20 blur-3xl"></div>
            <div class="absolute -bottom-40 -right-40 size-96 rounded-full bg-violet-600/20 blur-3xl"></div>
        </div>

        <main class="w-full max-w-md relative z-10 my-8">
            <!-- Logo Header -->
            <div class="text-center mb-8 space-y-3">
                <a href="{{ route('homePage') }}" class="inline-flex items-center gap-3 group">
                    <div class="size-12 rounded-2xl bg-gradient-to-tr from-indigo-500 to-violet-500 flex items-center justify-center text-white shadow-xl shadow-indigo-500/30 group-hover:scale-105 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <span class="font-display font-extrabold text-2xl tracking-tight text-white">STILES<span class="text-indigo-400">SHOP</span></span>
                </a>
                <h1 class="text-2xl font-bold text-white tracking-tight">Espace Connexion</h1>
                <p class="text-xs text-slate-400">Connectez-vous pour accéder à votre compte</p>
            </div>

            <!-- Glass Card -->
            <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 shadow-2xl space-y-6">
                
                @if (session('error'))
                    <div class="p-4 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-400 text-xs font-semibold">
                        {{ session('error') }}
                    </div>
                @endif

                <form class="space-y-5" action="{{ route('auth.login') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">Adresse Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="email" id="email" name="email" required placeholder="nom@exemple.com" value="{{ old('email') }}"
                                class="w-full pl-11 pr-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-white text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all" />
                        </div>
                        @error('email')
                            <p class="text-rose-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300">Mot de passe</label>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" required placeholder="••••••••"
                                class="w-full pl-11 pr-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-white text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all" />
                        </div>
                        @error('password')
                            <p class="text-rose-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full py-3.5 px-4 rounded-xl font-bold text-sm text-white bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 shadow-lg shadow-indigo-600/35 transition-all duration-200 cursor-pointer">
                        Se connecter
                    </button>
                </form>

                <div class="pt-4 border-t border-slate-800/80 text-center text-xs text-slate-400">
                    Vous n'avez pas encore de compte client ? 
                    <a href="{{ route('client.register') }}" class="text-indigo-400 font-bold hover:underline ml-1">S'inscrire ici</a>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
