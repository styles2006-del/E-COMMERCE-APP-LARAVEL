@extends('layouts.admin.base', [
    'page_title' => 'Staff | Modification',
])

@section('content')
    <div class="max-w-3xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Modifier l'Employé #{{ $staff->id }}</h1>
                <p class="text-xs text-slate-500 mt-1">Mettez à jour les informations et autorisations de cet employé.</p>
            </div>
            <a href="{{ route('admin.staff.index') }}" class="secondary-button">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Retour</span>
            </a>
        </div>

        <!-- Form Card Container -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
            <form action="{{ route('admin.staff.update', $staff->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Nom -->
                    <div>
                        <label for="firstname" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Nom *</label>
                        <input type="text" id="firstname" name="firstname" value="{{ old('firstname', $staff->user->firstname) }}" required
                            class="input-premium" />
                        @error('firstname')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Prénom -->
                    <div>
                        <label for="lastname" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Prénom *</label>
                        <input type="text" id="lastname" name="lastname" value="{{ old('lastname', $staff->user->lastname) }}" required
                            class="input-premium" />
                        @error('lastname')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Genre -->
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Genre *</label>
                        <div class="flex items-center gap-6 py-2">
                            <label class="flex items-center gap-2 cursor-pointer text-sm font-medium text-slate-700">
                                <input type="radio" id="masculin" name="gender" value="M" class="size-4 text-indigo-600 focus:ring-indigo-500" {{ old('gender', $staff->user->gender) == 'M' ? 'checked' : '' }} />
                                <span>Homme (M)</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer text-sm font-medium text-slate-700">
                                <input type="radio" id="feminin" name="gender" value="F" class="size-4 text-indigo-600 focus:ring-indigo-500" {{ old('gender', $staff->user->gender) == 'F' ? 'checked' : '' }} />
                                <span>Femme (F)</span>
                            </label>
                        </div>
                        @error('gender')
                            <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date de naissance -->
                    <div>
                        <label for="birth_date" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Date de naissance *</label>
                        <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $staff->user->birth_day) }}" required
                            class="input-premium" />
                        @error('birth_date')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Téléphone -->
                    <div>
                        <label for="phone" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Téléphone *</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $staff->user->phone) }}" required
                            class="input-premium" />
                        @error('phone')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Email *</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $staff->user->email) }}" required
                            class="input-premium" />
                        @error('email')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div class="sm:col-span-2">
                        <label for="role" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Rôle / Attribution *</label>
                        <select name="role" id="role" class="input-premium">
                            @forelse ($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @empty
                                <option value="">Aucun rôle disponible</option>
                            @endforelse
                        </select>
                        @error('role')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="sm:col-span-2">
                        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-2">Nouveau mot de passe (laisser vide pour ne pas modifier)</label>
                        <input type="password" id="password" name="password" placeholder="••••••••"
                            class="input-premium" />
                        @error('password')
                            <p class="text-rose-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                    <a href="{{ route('admin.staff.index') }}" class="secondary-button">Annuler</a>
                    <button type="submit" class="primary-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        <span>Mettre à jour</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
