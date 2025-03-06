<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $film['title'] }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        .container { max-width: 600px; margin: auto; }
        .back-link { display: inline-block; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ url('/films') }}" class="back-link">⬅ Retour à la liste des films</a>
        <h1>{{ $film['title'] }}</h1>
        <p><strong>Description :</strong> {{ $film['description'] ?? 'Pas de description disponible' }}</p>
        <p><strong>Date de sortie :</strong> {{ $film['release_date'] ?? 'Inconnue' }}</p>
        <p><strong>Réalisateur :</strong> {{ $film['director'] ?? 'Non spécifié' }}</p>
    </div>
    <h1>{{ $film->titre }}</h1>
    <p><strong>Description :</strong> {{ $film->description }}</p>
    <p><strong>Réalisateur :</strong> {{ $film->realisateur }}</p>
    <p><strong>Année :</strong> {{ $film->annee }}</p>
<a href="{{ route('films.index') }}">Retour à la liste</a>
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails du Film</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $film->titre }}</h5>
            <p>Date de sortie : {{ $film->date_sortie }}</p>
        </div>
    </div>
</div>
@endsection
</body>
</html>
