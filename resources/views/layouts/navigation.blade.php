<!DOCTYPE html>

<nav x-data="{ open: false }" class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <!-- Logo de taille normale -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                    </svg>
                    <span class="ml-2 text-lg font-semibold text-gray-900">RFTG - Location de DVD</span>
                </a>
            </div>

            <!-- Navigation pour les écrans de bureau -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-indigo-600 font-medium">Accueil</a>
                <a href="{{ route('films.index') }}" class="text-gray-700 hover:text-indigo-600 font-medium">Films</a>

                <!-- Menu utilisateur simple -->
                <div class="flex items-center space-x-2">
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        <button type="submit" class="text-gray-700 hover:text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <div class="md:hidden flex items-center">
                <button @click="open = !open">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu mobile -->
    <div x-show="open" class="md:hidden" style="display: none;">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-md">Accueil</a>
            <a href="{{ route('films.index') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-md">Films</a>
            <div class="border-t border-gray-200 mt-2 pt-2">
                <span class="block px-3 py-2 text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    <button type="submit" class="block w-full text-left px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-md">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
nav {
    background-color: #ffffff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.navbar-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 4rem;
    padding: 0 1rem;
}

.navbar-logo {
    display: flex;
    align-items: center;
}

.navbar-logo svg {
    height: 2rem;  /* Taille normale pour le logo */
    width: 2rem;   /* Taille normale pour le logo */
    color: #4F46E5;
}

.navbar-logo span {
    margin-left: 0.5rem;
    font-size: 1.25rem;
    font-weight: 600;
    color: #1F2937;
}

.navbar-links {
    display: flex;
    gap: 2rem;
}

.navbar-links a {
    text-decoration: none;
    font-size: 1rem;
    font-weight: 500;
    color: #4B5563;
    transition: color 0.2s ease;
}

.navbar-links a:hover {
    color: #4F46E5;
}

.navbar-profile {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1rem;
    color: #4B5563;
}

.navbar-profile button {
    background: none;
    border: none;
    cursor: pointer;
}

.menu-mobile {
    display: none;
}

.menu-mobile.open {
    display: block;
}

.menu-mobile a {
    display: block;
    padding: 1rem;
    text-decoration: none;
    color: #4B5563;
    transition: background-color 0.2s ease;
}

.menu-mobile a:hover {
    background-color: #F3F4F6;
}

.navbar-toggler {
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.navbar-toggler svg {
    height: 1rem;
    width: 1rem;
}

@media (max-width: 768px) {
    .navbar-links {
        display: none;
    }

    .menu-mobile {
        display: none;
    }

    .menu-mobile.open {
        display: block;
    }

    .navbar-toggler {
        display: flex;
    }
}

.menu-mobile a {
    margin-top: 1rem;
}

.text-gray-700 {
    color: #4B5563;
}

.text-gray-900 {
    color: #1F2937;
}

.bg-indigo-600 {
    background-color: #4F46E5;
}

.text-indigo-600 {
    color: #4F46E5;
}

.text-indigo-700 {
    color: #373B67;
}
</style>