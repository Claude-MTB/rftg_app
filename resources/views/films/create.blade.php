@extends('layouts.app')

@section('content')
<h1>Ajouter un film</h1>

<form action="{{ route('films.store') }}" method="POST">
    @csrf

    <label for="titre">Titre :</label>
    <input type="text" name="titre" id="titre" value="{{ old('titre') }}" required>
    @error('titre')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <label for="description">Description :</label>
    <textarea name="description" id="description">{{ old('description') }}</textarea>

    <label for="realisateur">Réalisateur :</label>
    <input type="text" name="realisateur" id="realisateur" value="{{ old('realisateur') }}" required>

    <label for="annee">Année :</label>
    <input type="number" name="annee" id="annee" value="{{ old('annee') }}" required>

    <button type="submit">Enregistrer</button>
</form>
@endsection
