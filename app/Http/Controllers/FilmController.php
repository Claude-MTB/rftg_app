<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Exception;

class FilmController extends Controller
{
    public function afficherFilms()
    {
        {
            $port = env('TOAD_PORT');
            $serveur = env('TOAD_SERVER');
            $apiUrl = "http://".$serveur.$port."/toad/film/all";
           
            try {
                $response = file_get_contents($apiUrl);
           
                if ($response === false) {
                    throw new Exception("Erreur lors de l'appel de l'API.");
                }
           
                $films = json_decode($response, true);
               
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new Exception("Erreur de décodage JSON : " . json_last_error_msg());
                }
     
                // Transmet les données à la vue 'films'
                return view('films.index', compact('films'));
           
            } catch (Exception $e) {
                // En cas d'erreur, retournez un message d'erreur à la vue
                return view('films.index', ['error' => $e->getMessage()]);
            }
        }
    }

    public function create()
    {
        return view('films.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'release_year' => 'required|integer',
            'length' => 'nullable|integer',
            'language_id' => 'required',
        ]);

        Film::create($request->all());

        return redirect()->route('films.index')->with('success', 'Film ajouté avec succès.');
    }

    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    public function update(Request $request, Film $film)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'release_year' => 'required|integer',
            'length' => 'nullable|integer',
            'language_id' => 'required',
        ]);

        $film->update($request->all());

        return redirect()->route('films.index')->with('success', 'Film mis à jour avec succès.');
    }

    public function destroy(Film $film)
    {
        $film->delete();

        return redirect()->route('films.index')->with('success', 'Film supprimé avec succès.');
    }
}
