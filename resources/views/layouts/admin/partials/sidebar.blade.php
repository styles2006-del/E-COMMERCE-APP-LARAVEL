<aside class="w-64 bg-slate-950 text-slate-300 flex flex-col shrink-0 border-r border-slate-800/80 min-h-screen">
    
    <!-- Brand Logo Header -->
    <div class="h-20 px-6 flex items-center justify-between border-b border-slate-800/80">
        <a href="{{ route('homePage') }}" class="flex items-center gap-3 group">
            <div class="size-10 rounded-2xl bg-gradient-to-tr from-indigo-500 via-violet-500 to-pink-500 flex items-center justify-center text-white shadow-lg shadow-indigo-500/30 group-hover:scale-105 transition-transform duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <span class="font-display font-extrabold text-xl tracking-tight text-white">STILES<span class="text-indigo-400">ADMIN</span></span>
        </a>
    </div>

    <!-- Navigation List -->
    <nav class="flex-1 px-4 py-6 space-y-6 overflow-y-auto">
        
        <!-- Section: Catalogue -->
        <div class="space-y-1">
            <span class="px-3 text-[10px] font-bold uppercase tracking-wider text-slate-500 block mb-2">Catalogue & Produits</span>
            
            <a href="{{ route('admin.articles.index') }}"
                class="flex items-center gap-3 px-3.5 py-3 rounded-2xl text-xs font-bold transition-all duration-200 {{ request()->routeIs('admin.articles.*') ? 'bg-gradient-to-r from-indigo-600 to-violet-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-900' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <span>Articles & Stock</span>
            </a>

            <a href="{{ route('admin.categories.index') }}"
                class="flex items-center gap-3 px-3.5 py-3 rounded-2xl text-xs font-bold transition-all duration-200 {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-r from-indigo-600 to-violet-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-900' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                <span>Catégories</span>
            </a>
        </div>

        <!-- Section: Ventes & Commandes -->
        <div class="space-y-1">
            <span class="px-3 text-[10px] font-bold uppercase tracking-wider text-slate-500 block mb-2">Ventes & Suivi</span>

            <a href="{{ route('orders.index') }}"
                class="flex items-center gap-3 px-3.5 py-3 rounded-2xl text-xs font-bold transition-all duration-200 {{ request()->routeIs('orders.*') ? 'bg-gradient-to-r from-indigo-600 to-violet-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-900' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span>Commandes Clients</span>
            </a>
        </div>

        <!-- Section: Équipe & Staff -->
        <div class="space-y-1">
            <span class="px-3 text-[10px] font-bold uppercase tracking-wider text-slate-500 block mb-2">Administration</span>

            <a href="{{ route('admin.staff.index') }}"
                class="flex items-center gap-3 px-3.5 py-3 rounded-2xl text-xs font-bold transition-all duration-200 {{ request()->routeIs('admin.staff.*') ? 'bg-gradient-to-r from-indigo-600 to-violet-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-900' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span>Personnel (Staff)</span>
            </a>

            <a href="{{ route('admin.settings.index') }}"
                class="flex items-center gap-3 px-3.5 py-3 rounded-2xl text-xs font-bold transition-all duration-200 {{ request()->routeIs('admin.settings.*') ? 'bg-gradient-to-r from-indigo-600 to-violet-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-900' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Apparence & Paramètres</span>
            </a>
        </div>

    </nav>

    <!-- Footer Action: Storefront Direct Access -->
    <div class="p-4 border-t border-slate-800/80">
        <a href="{{ route('homePage') }}" target="_blank"
            class="flex items-center justify-center gap-2 w-full py-2.5 px-3 rounded-xl bg-slate-900 hover:bg-slate-800 text-slate-300 text-xs font-semibold border border-slate-800 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
            </svg>
            <span>Voir la Vitrine Publique</span>
        </a>
    </div>

</aside>
