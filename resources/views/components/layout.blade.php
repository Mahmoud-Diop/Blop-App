<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <x-header />
    <div class="side-bar-container">
        <!-- Conteneur pour les icônes principales -->
        <div class="sidebar-icons">
            <!-- home -->
            <div class="icone-svg {{ request()->routeIs('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                    <svg class="icon" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M3 10.5L12 3L21 10.5V20C21 20.55 20.55 21 20 21H15V15H9V21H4C3.45 21 3 20.55 3 20V10.5Z"
                            stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="tooltip-text">Home</span>
                </a>
            </div>

            <!-- notifications -->
            <div class="icone-svg {{ request()->routeIs('notifications*') ? 'active' : '' }}">
                <a href="#">
                    <svg class="icon" viewBox="0 0 24 24" fill="none">
                        <path d="M18 8C18 5.238 15.761 3 13 3H11C8.239 3 6 5.238 6 8V14L4 16V17H20V16L18 14V8Z"
                            stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 21H15" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                    </svg>
                    <span class="tooltip-text">Notifications</span>
                </a>
            </div>

            <!-- favorites -->
            <div class="icone-svg {{ request()->routeIs('favorites*') ? 'active' : '' }}">
                <a href="#">
                    <svg class="icon" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M12 21C12 21 4 14.5 4 9.5C4 7 6 5 8.5 5C10 5 11.5 6 12 7C12.5 6 14 5 15.5 5C18 5 20 7 20 9.5C20 14.5 12 21 12 21Z"
                            stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="tooltip-text">Favorites</span>
                </a>
            </div>

            <!-- dashboard -->
            <div class="icone-svg {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                <a href="#">
                    <svg class="icon" viewBox="0 0 24 24" fill="none">
                        <rect x="3" y="3" width="8" height="8" rx="1.5" stroke="currentColor"
                            stroke-width="1.8" />
                        <rect x="13" y="3" width="8" height="5" rx="1.5" stroke="currentColor"
                            stroke-width="1.8" />
                        <rect x="13" y="10" width="8" height="11" rx="1.5" stroke="currentColor"
                            stroke-width="1.8" />
                        <rect x="3" y="13" width="8" height="8" rx="1.5" stroke="currentColor"
                            stroke-width="1.8" />
                    </svg>
                    <span class="tooltip-text">Dashboard</span>
                </a>
            </div>
        </div>

        <!-- Bouton de création de poste -->
        <div class="create-post-container">
            @auth
                <a href="javascript:void(0)" onclick="openModal()" class="create-post-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-linecap="round" />
                    </svg>
                </a>
            @else
                <a href="{{ route('login') }}" class="create-post-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-linecap="round" />
                    </svg>
                </a>
            @endauth
        </div>

    </div>

    <main class="container">
        {{ $slot }}

    </main>
     <!-- Inclusion du modal -->
    @auth
        <x-modal-window :categories="$categories ?? []" />
    @endauth
</body>
