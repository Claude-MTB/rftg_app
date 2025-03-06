@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <main class="max-w-7xl mx-auto px-4 py-8">
        <!-- Dashboard Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Tableau de Bord des Films</h1>
            <div class="mt-4 flex flex-wrap gap-4 items-center justify-between">
                <!-- Search Bar -->
                <div class="relative">
                    <input
                        type="text"
                        placeholder="Rechercher un film..."
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                    />
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <!-- View Mode Buttons -->
                <div class="flex items-center gap-2">
                    <button
                        onclick="setViewMode('grid')"
                        class="p-2 rounded-lg view-mode-btn"
                        data-mode="grid"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                    </button>
                    <button
                        onclick="setViewMode('list')"
                        class="p-2 rounded-lg view-mode-btn"
                        data-mode="list"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Movies Display -->
        <div id="movies-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($recentFilms as $film)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="aspect-video bg-gray-200">
                    <img
                        src="{{ $film->image_url }}" 
                        alt="{{ $film->title }}"
                        class="w-full h-full object-cover"
                    />
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $film->title }}</h3>
                    <div class="mt-2 flex items-center gap-2">
                        <span class="px-2 py-1 bg-indigo-100 text-indigo-700 text-sm rounded-full">
                            {{ $film->rating }}
                        </span>
                        <span class="text-gray-600">{{ $film->release_year }}</span>
                    </div>
                    <p class="mt-2 text-gray-600">{{ $film->genre }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Statistics -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-sm font-medium text-gray-500">Total des Films</h3>
                <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $totalFilms }}</p>
            </div>
            @foreach($ratingStats as $rating => $count)
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-sm font-medium text-gray-500">Films {{ $rating }}</h3>
                <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $count }}</p>
            </div>
            @endforeach
        </div>
    </main>
</div>

@push('scripts')
<script>
function setViewMode(mode) {
    const container = document.getElementById('movies-container');
    const buttons = document.querySelectorAll('.view-mode-btn');
    
    // Style buttons based on selected mode
    buttons.forEach(btn => {
        if (btn.dataset.mode === mode) {
            btn.classList.add('bg-indigo-100', 'text-indigo-600');
            btn.classList.remove('text-gray-600');
        } else {
            btn.classList.remove('bg-indigo-100', 'text-indigo-600');
            btn.classList.add('text-gray-600');
        }
    });

    // Toggle grid and list view
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
