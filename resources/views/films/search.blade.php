extends('layouts.app')

@section('content')
<div class="container">
    <h1>Recherche Avancée de Films</h1>
    
    <form action="{{ route('films.search') }}" method="GET">
        <div class="row">
            <div class="col-md-4">
                <label>Titre</label>
                <input type="text" name="titre" class="form-control" value="{{ request('titre') }}">
            </div>
            
            <div class="col-md-4">
                <label>Note Minimale</label>
                <input type="number" name="note_min" class="form-control" min="0" max="10" value="{{ request('note_min') }}">
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-6">
                <label>Date de Sortie (De)</label>
                <input type="date" name="date_debut" class="form-control" value="{{ request('date_debut') }}">
            </div>
            
            <div class="col-md-6">
                <label>Date de Sortie (À)</label>
                <input type="date" name="date_fin" class="form-control" value="{{ request('date_fin') }}">
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Rechercher</button>
    </form>

    @if(isset($films))
        <div class="mt-4">
            <h2>Résultats de la Recherche</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Genre</th>
                        <th>Note</th>
                        <th>Date de Sortie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($films as $film)
                    <tr>
                        <td>{{ $film['titre'] }}</td>
                        <td>{{ $film['genre'] }}</td>
                        <td>{{ $film['note'] }}/10</td>
                        <td>{{ $film->date_sortie->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('dashboard', $film) }}" class="btn btn-sm btn-info">Détails</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection