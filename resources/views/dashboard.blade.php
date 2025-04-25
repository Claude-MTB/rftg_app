@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <main class="max-w-7xl mx-auto px-4 py-8">

        <!-- Dashboard Header -->
        <div class="mb-8">
            <div class="mt-4 flex flex-wrap gap-4 items-center justify-between">
                <!-- Search Bar -->
                <div class="relative">
                    <input
                        type="text"
                        placeholder="Rechercher un film..."
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                    />
                </div>

                <!-- View Mode Buttons -->
                <div class="flex items-center gap-2">
                    <button onclick="setViewMode('grid')" class="p-2 rounded-lg view-mode-btn" data-mode="grid">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                    </button>
                    <button onclick="setViewMode('list')" class="p-2 rounded-lg view-mode-btn" data-mode="list">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Create Movie Button -->
        <a href="{{ route('films.create') }}"
        class="inline-block px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
        + Ajouter un film
        </a>

        <!-- Movies Display -->
        <div id="movies-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($films as $film)
                <div class="p-4 mb-4 border rounded-lg shadow">
                    <h4 class="text-xl font-bold">{{ $film['filmId'] }}</h4>
                    <h3 class="text-lg font-semibold text-gray-900">{{ $film['title'] }}</h3>
                    <p class="text-sm text-gray-600">{{ $film['description'] }}</p>
                    <p class="text-gray-600"><strong>Date de sortie :</strong> {{ $film['releaseYear'] }}</span>
                    <p class="mt-2 text-gray-600"><strong>Durée :</strong> {{ $film['length'] }} minutes</p>
                    <p class="mt-2 text-gray-600"><strong>Thème :</strong> {{ $film['specialFeatures'] }}</p>
                </div>
                @method('UPDATE')
                <button type="submit" class="px-4 py-2 bg-red-300 text-white rounded-lg hover:bg-red-500">
                    Modifier
                </button>
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                    Supprimer
                </button>
                @endforeach
                </a>

        </div>
    </main>
</div>

@push('scripts')
<script>
function setViewMode(mode) {
    const container = document.getElementById('movies-container');
    const buttons = document.querySelectorAll('.view-mode-btn');

    buttons.forEach(btn => {
        btn.classList.toggle('bg-indigo-100', btn.dataset.mode === mode);
        btn.classList.toggle('text-indigo-600', btn.dataset.mode === mode);
        btn.classList.toggle('text-gray-600', btn.dataset.mode !== mode);
    });

    if (mode === 'grid') {
        container.classList.remove('space-y-4');
        container.classList.add('grid', 'grid-cols-1', 'md:grid-cols-2', 'lg:grid-cols-3', 'gap-6');
    } else {
        container.classList.remove('grid', 'grid-cols-1', 'md:grid-cols-2', 'lg:grid-cols-3', 'gap-6');
        container.classList.add('space-y-4');
    }
}
</script>
@endpush
@endsection

<style>
body {
    font-family: 'Inter', sans-serif;
    background-color: #f9fafb;
}

input[type="text"] {
    font-size: 1rem;
    width: 100%;
    padding: 0.5rem 2.5rem 0.5rem 1rem;
    border-radius: 0.375rem;
    border: 1px solid #e5e7eb;
    background-color: #fff;
}

input[type="text"]:focus {
    outline: none;
    border-color: #4f46e5;
    box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
}

input[type="text"] + svg {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
    height: 1.25rem;
    width: 1.25rem;
}

.view-mode-btn svg {
    height: 1rem;
    width: 1rem;
}

#movies-container {
    display: grid;
    gap: 1.5rem;
}

#movies-container .bg-white {
    border-radius: 0.5rem;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

#movies-container .aspect-video {
    background-color: #e5e7eb;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 200px;
}

#movies-container .p-4 {
    padding: 1rem;
}

#movies-container h3 {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

#movies-container p {
    font-size: 0.875rem;
    color: #4b5563;
    line-height: 1.5;
}

#movies-container .text-indigo-700 {
    background-color:rgb(55, 75, 139);
    color: #4f46e5;
}

#movies-container .rounded-full {
    padding: 0.25rem 0.75rem;
}

/* Mode d'affichage - Grid et List */
.view-mode-btn {
    background-color: transparent;
    border: 1px solid #e5e7eb;
    padding: 0.5rem;
    border-radius: 0.375rem;
    cursor: pointer;
    transition: background-color 0.2s, color 0.2s;
}

.view-mode-btn:hover {
    background-color: #f3f4f6;
}

</style>

