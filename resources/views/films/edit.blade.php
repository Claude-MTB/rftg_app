@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Modifier le film</h2>
    <form action="{{ route('films.update', $film->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label class="block">Titre :</label>
        <input type="text" name="title" value="{{ $film->title }}" required class="border p-2 w-full">

        <label class="block mt-2">Description :</label>
        <textarea name="description" class="border p-2 w-full">{{ $film->description }}</textarea>

        <label class="block mt-2">Année de sortie :</label>
        <input type="number" name="release_year" value="{{ $film->release_year }}" required class="border p-2 w-full">

        <label class="block mt-2">Durée (minutes) :</label>
        <input type="number" name="length" value="{{ $film->length }}" class="border p-2 w-full">

        <label class="block mt-2">Langue :</label>
        <input type="text" name="language_id" value="{{ $film->language_id }}" required class="border p-2 w-full">

        <button type="submit" class="mt-4 bg-yellow-500 text-white px-4 py-2 rounded">
            Modifier
        </button>
    </form>
</div>
@endsection
