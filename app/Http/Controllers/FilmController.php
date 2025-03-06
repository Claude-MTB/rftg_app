<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    public function create()
    {
        return view('films.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'nullable',
            'date_sortie' => 'nullable|date',
            'genre' => 'nullable|max:100',
            'note' => 'nullable|numeric|between:0,10'
        ]);

        Film::create($validatedData);

        return redirect()->route('films.index')
            ->with('success', 'Film ajouté avec succès.');
    }

    public function show($id)
    {
        $film = Film::findOrFail($id);
        return view('films.show', compact('film'));
    }

    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    public function update(Request $request, Film $film)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'nullable',
            'date_sortie' => 'nullable|date',
            'genre' => 'nullable|max:100',
            'note' => 'nullable|numeric|between:0,10'
        ]);

        $film->update($validatedData);

        return redirect()->route('films.index')
            ->with('success', 'Film modifié avec succès.');
    }

    public function destroy(Film $film)
    {
        $film->delete();

        return redirect()->route('films.index')
            ->with('success', 'Film supprimé avec succès.');
    }
}