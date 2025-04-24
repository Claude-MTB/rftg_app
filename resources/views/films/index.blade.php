@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Liste des films</h2>
    
    @foreach($films as $film)
    <div class="p-4 mb-4 border rounded-lg shadow">
        <h3 class="text-xl font-bold">{{ $film->title }}</h3>
        <p class="text-gray-600">{{ $film->description ?? 'Aucune description disponible' }}</p>
        <p><strong>Année :</strong> {{ $film->release_year }}</p>
        <p><strong>Durée :</strong> {{ $film->length }} min</p>
        <p><strong>Langue :</strong> {{ $film->language_id }}</p>

        <div class="mt-4 flex gap-4">
            <a href="{{ route('films.show', $film->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Détails
            </a>
            <a href="{{ route('films.edit', $film->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                Modifier
            </a>
            <form action="{{ route('films.destroy', $film->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce film ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
