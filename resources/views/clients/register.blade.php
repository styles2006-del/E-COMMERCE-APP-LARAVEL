<!DOCTYPE html>
<html lang="fr" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte - STILES SHOP</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="min-h-screen font-sans antialiased text-slate-100 selection:bg-indigo-500 selection:text-white">

    <div class="min-h-screen w-full bg-slate-950 flex items-center justify-center p-4 sm:p-6 relative overflow-hidden">
        <!-- Background Decorators -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -left-40 size-96 rounded-full bg-indigo-600/20 blur-3xl"></div>
            <div class="absolute -bottom-40 -right-40 size-96 rounded-full bg-violet-600/20 blur-3xl"></div>
        </div>

        <main class="w-full max-w-2xl relative z-10 my-8">
            <!-- Brand Header -->
            <div class="text-center mb-8 space-y-3">
                <a href="{{ route('homePage') }}" class="inline-flex items-center gap-3 group">
                    <div class="size-12 rounded-2xl bg-gradient-to-tr from-indigo-500 to-violet-500 flex items-center justify-center text-white shadow-xl shadow-indigo-500/30 group-hover:scale-105 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <span class="font-display font-extrabold text-2xl tracking-tight text-white">STILES<span class="text-indigo-400">SHOP</span></span>
                </a>
                <h1 class="text-2xl sm:text-3xl font-bold text-white tracking-tight">Créer votre Compte Client</h1>
                <p class="text-xs sm:text-sm text-slate-400">Rejoignez-nous pour effectuer et suivre vos commandes facilement</p>
            </div>

            <!-- Glass Form Card -->
            <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-800 rounded-3xl p-6 sm:p-10 shadow-2xl space-y-6">
                <form class="space-y-6" action="{{ route('client.register') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <!-- Firstname (Nom) -->
                        <div>
                            <label for="firstname" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">Nom</label>
                            <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" required
                                placeholder="Votre nom"
                                class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-white text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all" />
                            @error('firstname')
                                <p class="text-rose-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Lastname (Prénom) -->
                        <div>
                            <label for="lastname" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">Prénom</label>
                            <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required
                                placeholder="Votre prénom"
                                class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-white text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all" />
                            @error('lastname')
                                <p class="text-rose-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Gender (Genre) -->
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">Genre</label>
                            <div class="flex items-center gap-6 py-2">
                                <label class="flex items-center gap-2 cursor-pointer text-sm font-medium text-slate-300">
                                    <input type="radio" id="masculin" name="gender" value="M" class="size-4 text-indigo-600 bg-slate-950 border-slate-800 focus:ring-indigo-500" {{ old('gender') == 'M' ? 'checked' : '' }} />
                                    <span>Masculin (M)</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer text-sm font-medium text-slate-300">
                                    <input type="radio" id="feminin" name="gender" value="F" class="size-4 text-indigo-600 bg-slate-950 border-slate-800 focus:ring-indigo-500" {{ old('gender') == 'F' ? 'checked' : '' }} />
                                    <span>Féminin (F)</span>
                                </label>
                            </div>
                            @error('gender')
                                <p class="text-rose-400 text-xs mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Birth Date -->
                        <div>
                            <label for="birth_date" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">Date de naissance</label>
                            <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required
                                class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all" />
                            @error('birth_date')
                                <p class="text-rose-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">Téléphone</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required
                                placeholder="+225 0700000000"
                                class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-white text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all" />
                            @error('phone')
                                <p class="text-rose-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                placeholder="nom@exemple.com"
                                class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-white text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all" />
                            @error('email')
                                <p class="text-rose-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">Mot de passe</label>
                            <input type="password" id="password" name="password" required
                                placeholder="••••••••"
                                class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-white text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all" />
                            @error('password')
                                <p class="text-rose-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="confirmPassword" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">Confirmer mot de passe</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" required
                                placeholder="••••••••"
                                class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-white text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all" />
                            @error('confirmPassword')
                                <p class="text-rose-400 text-xs mt-1.5 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full py-4 px-4 rounded-xl font-bold text-sm text-white bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 shadow-lg shadow-indigo-600/35 transition-all duration-200 cursor-pointer mt-4">
                        Créer mon compte
                    </button>
                </form>

                <div class="pt-4 border-t border-slate-800/80 text-center text-xs text-slate-400">
                    Vous possédez déjà un compte ? 
                    <a href="{{ route('auth.login') }}" class="text-indigo-400 font-bold hover:underline ml-1">Connectez-vous ici</a>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
