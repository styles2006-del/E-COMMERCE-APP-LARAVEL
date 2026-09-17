@extends('layouts.admin.base', [
    'page_title' => 'Paramètres & Apparence',
])

@section('content')
    <div class="space-y-8 max-w-4xl mx-auto">
        <!-- Page Header -->
        <div data-aos="fade-down" class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-indigo-600">Administration</span>
                <h1 class="font-display text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mt-0.5">Apparence & Paramètres</h1>
                <p class="text-xs text-slate-500 mt-1">Personnalisez le nom du site et les textes de présentation de la boutique.</p>
            </div>
            <div class="size-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </div>

        <!-- Settings Form -->
        <div data-aos="fade-up" class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 sm:p-8">
            <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
                @csrf

                <div class="space-y-5">
                    <h3 class="text-sm font-bold text-slate-800 border-b border-slate-100 pb-2">Informations Générales</h3>
                    
                    <div>
                        <label for="site_name" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Nom de la boutique</label>
                        <input type="text" name="site_name" id="site_name" value="{{ $settings['site_name'] ?? 'STILES SHOP' }}"
                            class="input-premium" placeholder="Ex: Ma Super Boutique" required />
                    </div>

                    <h3 class="text-sm font-bold text-slate-800 border-b border-slate-100 pb-2 pt-4">Bannière Accueil (Hero Section)</h3>

                    <div>
                        <label for="hero_title" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Titre Principal</label>
                        <input type="text" name="hero_title" id="hero_title" value="{{ $settings['hero_title'] ?? 'L\'Élégance Redéfinie. Le Luxe À Votre Portée.' }}"
                            class="input-premium" placeholder="Texte accrocheur en gros..." required />
                    </div>

                    <div>
                        <label for="hero_subtitle" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Sous-titre / Description</label>
                        <textarea name="hero_subtitle" id="hero_subtitle" rows="3"
                            class="input-premium py-3" placeholder="Description de la boutique..." required>{{ $settings['hero_subtitle'] ?? 'Explorez une sélection triée sur le volet de vêtements et d\'accessoires de qualité supérieure.' }}</textarea>
                    </div>

                    <div>
                        <label for="announcement_text" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Barre d'annonce (Top Bar)</label>
                        <input type="text" name="announcement_text" id="announcement_text" value="{{ $settings['announcement_text'] ?? '⚡ Livraison Express offerte pour toute commande dès 50 000 FCFA !' }}"
                            class="input-premium" placeholder="Message d'offre spéciale..." />
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-100 flex justify-end">
                    <button type="submit" class="primary-button hover-lift">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Enregistrer les paramètres</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
