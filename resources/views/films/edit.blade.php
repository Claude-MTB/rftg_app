@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <h2 class="text-2xl font-bold text-gray-900">Modifier le film : {{ $film->title }}</h2>

        <!-- Formulaire de modification -->
        <form action="{{ route('films.update', $film->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" name="title" id="title" value="{{ old('title', $film->title) }}" class="mt-2 p-2 w-full border border-gray-300 rounded-md" required>
            </div>

            <div class="mt-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" class="mt-2 p-2 w-full border border-gray-300 rounded-md">{{ old('description', $film->description) }}</textarea>
            </div>

            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                    Enregistrer les modifications
                </button>
            </div>
        </form>

        <!-- Ajouter un bouton pour revenir à la liste -->
        <a href="{{ route('films.index') }}" class="mt-4 inline-block px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
            Annuler
        </a>
    </div>
</div>
@endsection
