@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-indigo-50 to-white">
    <main class="max-w-7xl mx-auto px-6 py-10">

        <!-- Titre principal centré -->
        <h1 class="text-5xl font-extrabold text-center text-indigo-700 mb-10">
            🎬 RFTG
        </h1>

            <a href="{{ route('films.create') }}"
               class="px-5 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow">
                ➕ Ajouter un film
            </a>
        </div>

        <!-- Barre de recherche et affichage -->
        <div class="mb-10 flex flex-col md:flex-row items-center justify-center gap-4">
            <div class="w-full md:w-1/2 relative">
                <input
                    type="text"
                    placeholder="Rechercher un film..."
                    class="w-full pl-12 pr-4 py-2 border border-gray-300 rounded-full shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                />
            </div>
        </div>

        <!-- Liste des films -->
        <div id="movies-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($films as $film)
                <div class="movie-card flex flex-col justify-between p-6 bg-white rounded-2xl shadow-md hover:shadow-xl transition-all">
                    <div>
                        <h3 class="text-xl font-bold text-indigo-800 mb-1">{{ $film['title'] }}</h3>
                        <p class="text-sm text-gray-500 mb-3">{{ $film['description'] }}</p>
                        <ul class="text-sm text-gray-700 space-y-1">
                            <li><strong>📅 Date :</strong> {{ $film['releaseYear'] }}</li>
                            <li><strong>⏱ Durée :</strong> {{ $film['length'] }} minutes</li>
                            <li><strong>🎞 Thèmes :</strong> {{ $film['specialFeatures'] }}</li>
                        </ul>
                    </div>
                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('films.edit', $film['filmId']) }}"
                           class="w-1/2 text-center py-2 bg-yellow-400 text-gray-900 font-semibold rounded-lg hover:bg-yellow-500 transition">
                            ✏️ Modifier
                        </a>
                        <form method="POST" action="{{ route('films.destroy', $film['filmId']) }}" class="w-1/2">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition">
                                🗑 Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    </main>
</div>
@endsection

<style>
body {
    font-family: 'Inter', sans-serif;
    background-color: #f9fafb;
    color: #1f2937;
}

.movie-card {
    min-height: 280px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
</style>

@push('scripts')
<script>
function setViewMode(mode) {
    const container = document.getElementById('movies-container');
    const buttons = document.querySelectorAll('[data-mode]');

    buttons.forEach(btn => {
        btn.classList.toggle('bg-indigo-200', btn.dataset.mode === mode);
        btn.classList.toggle('text-white', btn.dataset.mode === mode);
    });

    if (mode === 'grid') {
        container.className = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8';
    } else {
        container.className = 'space-y-4';
    }
}
</script>
@endpush