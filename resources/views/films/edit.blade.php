@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow mt-8">
    <h2 class="text-2xl font-bold mb-6">Modifier le film</h2>

    <form action="{{ route('films.update', $film->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Titre :</label>
            <input type="text" name="title" value="{{ $film->title }}" required class="border p-2 w-full rounded">
        </div>

        <div>
            <label class="block font-semibold">Description :</label>
            <textarea name="description" class="border p-2 w-full rounded">{{ $film->description }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Année de sortie :</label>
                <input type="number" name="release_year" value="{{ $film->release_year }}" required class="border p-2 w-full rounded">
            </div>
            <div>
                <label class="block font-semibold">Durée (minutes) :</label>
                <input type="number" name="length" value="{{ $film->length }}" class="border p-2 w-full rounded">
            </div>
        </div>

        <div>
            <label class="block font-semibold">Langue :</label>
            <input type="text" name="language_id" value="{{ $film->language_id }}" required class="border p-2 w-full rounded">
        </div>

        <div>
            <label class="block font-semibold">Caractéristiques spéciales :</label>
            <input type="text" name="special_features" value="{{ $film->special_features }}" class="border p-2 w-full rounded">
        </div>

        <div class="flex items-center justify-between pt-4">
            <a href="{{ route('films.index') }}" class="text-gray-600 hover:underline">Annuler</a>
            <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">
                Modifier
            </button>
        </div>
    </form>
</div>
@endsection
