<h1>Ajouter un film</h1>

<form action="{{ route('films.store') }}" method="POST">
    @csrf

    <label for="titre">Titre :</label>
    <input type="text" name="titre" id="titre" required>

    <label for="description">Description :</label>
    <textarea name="description" id="description" required></textarea>

    <label for="realisateur">Réalisateur :</label>
    <input type="text" name="realisateur" id="realisateur" required>

    <label for="annee">Année :</label>
    <input type="number" name="annee" id="annee" required>

    <button type="submit">Enregistrer</button>
</form>