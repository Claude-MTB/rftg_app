<h1>Modifier le film</h1>

<form action="{{ route('films.update', $film->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="titre">Titre :</label>
    <input type="text" name="titre" id="titre" value="{{ $film->titre }}" required>

    <label for="description">Description :</label>
    <textarea name="description" id="description" required>{{ $film->description }}</textarea>

    <label for="realisateur">Réalisateur :</label>
    <input type="text" name="realisateur" id="realisateur" value="{{ $film->realisateur }}" required>

    <label for="annee">Année :</label>
    <input type="number" name="annee" id="annee" value="{{ $film->annee }}" required>

    <button type="submit">Mettre à jour</button>
</form>