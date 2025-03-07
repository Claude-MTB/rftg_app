@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <h2 class="text-2xl font-bold text-gray-900">{{ $film->title }}</h2>
        <p class="mt-2 text-gray-600">{{ $film->description ?? 'Aucune description disponible' }}</p>
        <p class="mt-2 text-gray-600"><strong>Année de sortie :</strong> {{ $film->release_year }}</p>
        <p class="mt-2 text-gray-600"><strong>Durée :</strong> {{ $film->length }} min</p>
        <p class="mt-2 text-gray-600"><strong>Langue :</strong> {{ $film->language_id }}</p>
        <p class="mt-2 text-gray-600"><strong>Classification :</strong> {{ $film->rating ?? 'N/A' }}</p>

        <!-- Ajouter un bouton pour revenir à la liste -->
        <a href="{{ route('films.index') }}" class="mt-4 inline-block px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
            Retour à la liste
        </a>
    </div>
</div>
@endsection
