@extends('layouts.admin.base', [
    'page_title' => 'Staff | Liste',
])

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Gestion du Personnel (Staff)</h1>
                <p class="text-xs text-slate-500 mt-1">Gérez les membres de votre équipe, leurs rôles et autorisations.</p>
            </div>
            <a href="{{ route('admin.staff.create') }}" class="primary-button">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                <span>Ajouter un employé</span>
            </a>
        </div>

        <!-- Staff Table Container -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>Nom & Prénom</th>
                            <th>Genre</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($staffs as $staff)
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="size-10 rounded-full bg-gradient-to-tr from-indigo-600 to-violet-500 text-white font-bold text-xs flex items-center justify-center shadow-xs">
                                            {{ strtoupper(substr($staff->user->firstname ?? 'E', 0, 1) . substr($staff->user->lastname ?? 'M', 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-900">{{ $staff->user->firstname }} {{ $staff->user->lastname }}</div>
                                            <div class="text-[11px] text-slate-400">ID: #{{ $staff->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-semibold">
                                        {{ $staff->user->gender == 'M' ? 'Homme (M)' : ($staff->user->gender == 'F' ? 'Femme (F)' : $staff->user->gender) }}
                                    </span>
                                </td>
                                <td class="text-slate-600 font-medium text-xs">{{ $staff->user->phone ?? '—' }}</td>
                                <td class="text-slate-600 text-xs">{{ $staff->user->email }}</td>
                                <td>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 font-bold text-xs">
                                        {{ $staff->user->role ?? 'Staff' }}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="inline-flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.staff.show', $staff->id) }}"
                                            class="p-2 rounded-lg text-slate-600 bg-slate-100 hover:bg-slate-200 transition-all"
                                            title="Voir fiche">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        
                                        <a href="{{ route('admin.staff.edit', $staff->id) }}"
                                            class="p-2 rounded-lg text-indigo-600 bg-indigo-50 hover:bg-indigo-100 transition-all"
                                            title="Modifier">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <form action="{{ route('admin.staff.destroy', $staff->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?')"
                                                class="p-2 rounded-lg text-rose-600 bg-rose-50 hover:bg-rose-100 transition-all cursor-pointer"
                                                title="Supprimer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-slate-400">
                                    Aucun membre du personnel enregistré.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
