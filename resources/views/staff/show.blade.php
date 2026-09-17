@extends('layouts.admin.base', [
    'page_title' => 'Staff | Détails',
])

@section('content')
    <div class="max-w-3xl mx-auto space-y-6">
        <!-- Header Nav -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Fiche Employé #{{ $staff->id }}</h1>
                <p class="text-xs text-slate-500 mt-1">Informations personnelles et rôle système.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.staff.index') }}" class="secondary-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Retour</span>
                </a>
                <a href="{{ route('admin.staff.edit', $staff->id) }}" class="primary-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>Modifier</span>
                </a>
            </div>
        </div>

        <!-- Detail Card -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8 space-y-8">
            <!-- Profile Avatar Badge -->
            <div class="flex items-center gap-4 pb-6 border-b border-slate-100">
                <div class="size-16 rounded-2xl bg-gradient-to-tr from-indigo-600 to-violet-500 text-white font-black text-xl flex items-center justify-center shadow-lg shadow-indigo-500/20">
                    {{ strtoupper(substr($staff->user->firstname ?? 'E', 0, 1) . substr($staff->user->lastname ?? 'M', 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                        {{ $staff->user->firstname }} {{ $staff->user->lastname }}
                    </h2>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 font-bold text-xs mt-1">
                        Rôle: {{ $staff->user->role ?? 'Staff' }}
                    </span>
                </div>
            </div>

            <!-- Profile Info Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-sm">
                <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 space-y-1">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">Sexe</span>
                    <span class="font-bold text-slate-800">
                        {{ $staff->user->gender == 'M' ? 'Homme (M)' : ($staff->user->gender == 'F' ? 'Femme (F)' : $staff->user->gender) }}
                    </span>
                </div>

                <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 space-y-1">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">Date de naissance</span>
                    <span class="font-bold text-slate-800">{{ $staff->user->birth_day ?? '—' }}</span>
                </div>

                <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 space-y-1">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">Téléphone</span>
                    <span class="font-bold text-slate-800">{{ $staff->user->phone ?? '—' }}</span>
                </div>

                <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 space-y-1">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">Email</span>
                    <span class="font-bold text-slate-800">{{ $staff->user->email ?? '—' }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
