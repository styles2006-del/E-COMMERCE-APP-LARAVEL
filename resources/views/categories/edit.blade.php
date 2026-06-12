@extends('layouts.admin.base')
@section('content')
<form action="{{route('admin.categories.update', $category->id)}}" method="post" class="border border-gray-100 p-6 rounded-2xl shadow-2xl">
        @method('PUT')
        @csrf
        <h1 class="text-3xl text-center py-3">Modification d'une Catégorie</h1>
        <div class="flex flex-col space-y-2">
            <label for="label" class="text-sm">Libellé : </label>
            <input type="text" name="label" id="label" value="{{old('label',$category->label)}}" class="border border-gray-200 px-2 py-1 rounded rounded-lg"><br>
            @error('label')
                {{ $message }}
            @enderror
        </div><br>
        <div class="flex flex-col space-y-2">
            <label for="description" class="text-sm">Description : </label>
            <textarea name="description" id="description" cols="30" rows="10" class="border border-gray-200 px-2 py-1 rounded rounded-lg">{{old('description',$category->description)}}</textarea><br>
            @error('description')
                {{ $message }}
            @enderror
        </div><br>
            <button type="submit" class="primary-button justify-center">
                Update
            </button>
</form>
@endsection
