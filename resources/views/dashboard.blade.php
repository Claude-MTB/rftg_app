<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Films</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .film-card { margin-bottom: 20px; padding: 10px; background: #f4f4f4; border-radius: 8px; }
        .film-title { font-size: 18px; font-weight: bold; }
    </style>
</head>
<body>
    </div>
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Films') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tableau de Bord des Films</h1>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total des Films</h5>
                    <h2>{{ $totalFilms }}</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Films par Genre</h5>
                    <ul class="list-unstyled">
                        @foreach($genreStats as $genre => $count)
                            <li>{{ $genre }}: {{ $count }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Derniers Films Ajoutés</h5>
                    @foreach($recentFilms as $film)
                        <p>{{ $film->titre }} ({{ $film->created_at->format('d/m/Y') }})</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    </div>
</body>
</html>