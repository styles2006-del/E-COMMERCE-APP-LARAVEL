@extends('layouts.admin.base', [
    'page_title' => 'Staff | details',
])
@section('content')
    <div>
        <h1>Détails de l'Employé</h1>
        <div class="border border-gray-300 rounded-2xl p-8 w-100">
            <div class="bg-gray-300 rounded-xl flex flex-col items-center">
                <div>ID</div>
                <div>{{ $staff->id }}</div>
            </div>
            <div class="flex">
                <div class="bg-gray-300 rounded-xl flex flex-col items-center">
                    <div>Nom</div>
                    <div>{{ $staff->user->firstname }}</div>
                </div>
                <div class="bg-gray-300 rounded-xl flex flex-col items-center">
                    <div>Prénom</div>
                    <div>{{ $staff->user->lastname }}</div>
                </div>
            </div>
            <div class="flex">
                <div class="bg-gray-300 rounded-xl flex flex-col items-center">
                    <div>Sexe</div>
                    <div>{{ $staff->user->gender }}</div>
                </div>
                <div class="bg-gray-300 rounded-xl flex flex-col items-center">
                    <div>Date de naissance</div>
                    <div>{{ $staff->user->birth_day }}</div>
                </div>
            </div>
            <div class="flex">
                <div class="bg-gray-300 rounded-xl flex flex-col items-center">
                    <div>Téléphone</div>
                    <div>{{ $staff->user->phone }}</div>
                </div>
                <div class="bg-gray-300 rounded-xl flex flex-col items-center">
                    <div>Email</div>
                    <div>{{ $staff->user->email }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
