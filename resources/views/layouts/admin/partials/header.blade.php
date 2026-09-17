<header class="sticky top-0 z-30 bg-white/80 backdrop-blur-md border-b border-slate-200/80 px-4 md:px-8 py-3.5 flex items-center justify-between transition-all">
    <div class="flex items-center gap-3">
        <!-- Mobile Sidebar Toggle button indicator / Title -->
        <div class="flex items-center gap-2 text-slate-500 text-sm font-medium">
            <span class="inline-flex items-center justify-center size-8 rounded-lg bg-indigo-50 text-indigo-600 font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </span>
            <span class="hidden sm:inline-block text-slate-400">Admin /</span>
            <span class="font-semibold text-slate-800">{{ $page_title ?? 'Dashboard' }}</span>
        </div>
    </div>

    <div class="flex items-center gap-4">
        @auth
            <div class="hidden sm:flex items-center gap-3 pl-4 border-l border-slate-200">
                <div class="size-9 rounded-full bg-gradient-to-tr from-indigo-600 to-violet-500 text-white font-bold text-xs flex items-center justify-center shadow-sm">
                    {{ strtoupper(substr(Auth::user()->firstname ?? Auth::user()->email ?? 'A', 0, 2)) }}
                </div>
                <div class="text-left text-xs">
                    <div class="font-bold text-slate-800">{{ Auth::user()->firstname ?? 'Admin' }} {{ Auth::user()->lastname ?? '' }}</div>
                    <div class="text-slate-400 capitalize">{{ Auth::user()->role ?? 'Gestionnaire' }}</div>
                </div>
            </div>
            
            <form action="{{ route('auth.logout') }}" method="post" class="m-0">
                @csrf
                <button type="submit"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-rose-600 bg-rose-50 hover:bg-rose-100 border border-rose-200/60 transition-all cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Déconnexion</span>
                </button>
            </form>
        @endauth
    </div>
</header>
