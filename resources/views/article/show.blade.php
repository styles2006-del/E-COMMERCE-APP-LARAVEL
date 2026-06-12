@extends('layouts.admin.base')
@section('content')
    <h1>Détails de l'article : {{$article->label}}</h1>
    <p>Prix : {{$article->current_price}}</p>
    <p>Quantité : {{$article->quantity}}</p>
    <p>Description : {{$article->description}}</p>
    <p>Catégorie : {{($article->category ? $article->category->label : 'Pas de catégorie disponible pour cette article')}}</p>
@endsection
