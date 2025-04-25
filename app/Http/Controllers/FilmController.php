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
        'description' => 'nullable|string',
        'release_year' => 'required|integer',
        'length' => 'nullable|integer',
        'language_id' => 'required|string',
        'special_features' => 'nullable|string',
        'genre' => 'nullable|string',
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable|string',
            'release_year' => 'required|integer',
            'length' => 'nullable|integer',
            'language_id' => 'required|string',
            'special_features' => 'nullable|string',
            'genre' => 'nullable|string',
        ]);
    
        $port = env('TOAD_PORT');
        $serveur = env('TOAD_SERVER');
        $apiUrl = "http://".$serveur.$port."/toad/film/update/{$id}";
    
        $filmData = json_encode($request->all());
    
        $options = [
            'http' => [
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'PUT',
                'content' => $filmData,
            ],
        ];
    
        $context = stream_context_create($options);
        $result = file_get_contents($apiUrl, false, $context);
    
        if ($result === false) {
            return back()->with('error', 'Erreur lors de la mise à jour du film.');
        }
    
        return redirect()->route('films.index')->with('success', 'Film mis à jour avec succès.');
    }

    public function destroy($id)
{
    $port = env('TOAD_PORT');
    $serveur = env('TOAD_SERVER');
    $apiUrl = "http://".$serveur.$port."/toad/film/delete/{$id}";

    $options = [
        'http' => [
            'method' => 'DELETE',
        ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($apiUrl, false, $context);

    if ($result === false) {
        return back()->with('error', 'Erreur lors de la suppression du film.');
    }

    return redirect()->route('films.index')->with('success', 'Film supprimé avec succès.');
}

}
