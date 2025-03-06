<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class FilmService
{
    // Méthode pour récupérer tous les films
    public function getAllFilms()
    {
        // Appel à l'API pour récupérer la liste des films
        $response = Http::get('http://localhost:8080/toad/film/all');
        
        // Si l'API renvoie un succès
        if ($response->successful()) {
            return $response->json(); // Retourne la réponse sous forme de tableau
        }
        
        // Sinon, retourne un tableau vide
        return [];
    }

    // Méthode pour récupérer un film par son ID
    public function getFilmById($id)
    {
        $response = Http::get("http://localhost:8080/toad/film/{$id}");
        
        if ($response->successful()) {
            return $response->json();
        }
        
        return null;
    }
}