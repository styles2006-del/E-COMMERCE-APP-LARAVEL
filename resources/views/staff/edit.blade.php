@extends('layouts.admin.base', [
    'page_title' => 'Staff | edit',
])
@section('content')
    <div>
        <div>
            <h1 class="text-3xl text-center py-3">Modifier un Employé</h1>
        </div>
        <div>
            <form action="{{ route('admin.staff.update', $staff->id) }}" method="POST"
                class="border border-gray-100 p-6 rounded-2xl shadow-2xl space-y-3 p-8">
                @csrf
                @method('PUT')
                <div class="flex flex-col">
                    <label for="firstname">Nom:</label>
                    <input type="text" id="firstname" name="firstname"
                        value="{{ old('firstname', $staff->user->firstname) }}"
                        class="border border-gray-200 px-2 py-1 rounded rounded-lg">
                    @error('firstname')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="lastname">Prénom:</label>
                    <input type="text" id="lastname" name="lastname"
                        value="{{ old('lastname', $staff->user->lastname) }}"
                        class="border border-gray-200 px-2 py-1 rounded rounded-lg">
                    @error('lastname')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div>Sexe:</div>
                    <div class="flex space-x-5">
                        <div>
                            <input type="radio" id="masculin" name="gender" value="M"
                                {{ old('gender', $staff->user->gender) == 'M' ? 'checked' : '' }}>
                            <label for="masculin">Homme</label>
                        </div>
                        <div>
                            <input type="radio" id="feminin" name="gender" value="F"
                                {{ old('gender', $staff->user->gender) == 'F' ? 'checked' : '' }}>
                            <label for="feminin">Femme</label>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="birth_date">Date de naissance:</label>
                    <input type="date" id="birth_date" name="birth_date"
                        value="{{ old('birth_date', $staff->user->birth_day) }}"
                        class="border border-gray-200 px-2 py-1 rounded rounded-lg">
                    @error('birth_date')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="phone">Téléphone:</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $staff->user->phone) }}"
                        class="border border-gray-200 px-2 py-1 rounded rounded-lg">
                    @error('phone')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $staff->user->email) }}"
                        class="border border-gray-200 px-2 py-1 rounded rounded-lg">
                    @error('email')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="role">Role:</label>
                    <select name="role" id="role"
                        class="border border-gray-200 px-2 py-1 rounded rounded-lg w-full">
                        @forelse ($roles as $role)
                            <option value="{{ $role->id }}">{{$role->name}}</option>
                        @empty
                            aucun role disponible
                        @endforelse
                    </select>
                    @error('role')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="password">Mot de passe:</label>
                    <input type="password" id="password" name="password"
                        class="border border-gray-200 px-2 py-1 rounded rounded-lg">
                    @error('password')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="primary-button justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                    </svg>
                    Modifier
                </button>
            </form>
        </div>
    </div>
@endsection
