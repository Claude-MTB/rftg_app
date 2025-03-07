<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{

    public function show($id)
    {
        $film = Film::findOrFail($id);
        return view('films.show', compact('film'));
    }
    
    public function edit($id)
    {
        $film = Film::findOrFail($id);
        return view('films.edit', compact('film'));
    }
    public function update(Request $request, $id)
{
    $film = Film::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'rating' => 'nullable|string|max:10',
        'release_year' => 'nullable|integer',
        'length' => 'nullable|integer',
        'language_id' => 'nullable|string|max:10',
    ]);

    $film->update($validated);

    return redirect()->route('films.index')->with('success', 'Film mis à jour avec succès');
    }

    public function index() {
        $totalFilms = Film::all(); 
        return view('films.index', compact('totalFilms'));
    }
}