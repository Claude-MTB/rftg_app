@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Films</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($films as $film)
        <tr>
            <td>{{ $film->titre }}</td>
            <td>
                <!-- Lien vers la page de détail -->
                <a href="{{ route('films.show', $film->id) }}" class="btn btn-info">Détails</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
