@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow mt-8">
    <h2 class="text-2xl font-bold mb-6">Ajouter un film</h2>

    <form action="{{ route('films.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold">Titre :</label>
            <input type="text" name="title" required class="border p-2 w-full rounded">
        </div>

        <div>
            <label class="block font-semibold">Description :</label>
            <textarea name="description" class="border p-2 w-full rounded" rows="4"></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Année de sortie :</label>
                <input type="number" name="release_year" required class="border p-2 w-full rounded">
            </div>
            <div>
                <label class="block font-semibold">Durée (minutes) :</label>
                <input type="number" name="length" class="border p-2 w-full rounded">
            </div>
        </div>

        <div>
            <label class="block font-semibold">Langue :</label>
            <input type="text" name="language_id" required class="border p-2 w-full rounded">
        </div>

        <div>
            <label class="block font-semibold">Caractéristiques spéciales :</label>
            <input type="text" name="special_features" placeholder="Ex: Making-of, Bande-annonce, etc." class="border p-2 w-full rounded">
        </div>

        <div class="flex items-center justify-between pt-4">
            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:underline">Annuler</a>
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">
                Ajouter
            </button>
        </div>
    </form>
</div>
@endsection
