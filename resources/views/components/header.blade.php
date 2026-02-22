<header>
    <div class="header-container">
        <div class="logo">
            <h1>Blog</h1>
        </div>
        <div class="login-logout">
            @guest
                <a href="{{ route('login') }}" class="header-link">login</a>
                <a href="{{ route('register') }}" class="header-link">register</a>
            @endguest
            @auth
                <a href="{{ route('profile.edit') }}">
                    <img src="{{ auth()->user()->profile_image
                        ? asset('storage/' . auth()->user()->profile_image)
                        : asset('storage/profile.png') }}"
                        alt="Profile Image" class="profile">
                </a> 
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="header-link" style="border:none; cursor:pointer;">
                        Logout
                    </button>
                </form>

            @endauth
        </div>

        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <div class="menu">

            <a href="#" class="menu-link">
                <div class="svg-icon">
                    <svg class="icon" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M3 10.5L12 3L21 10.5V20C21 20.55 20.55 21 20 21H15V15H9V21H4C3.45 21 3 20.55 3 20V10.5Z"
                            stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>

                <h3>Home</h3>
            </a>

            <a href="#" class="menu-link">
                <div class="svg-icon">
                    <svg class="icon" viewBox="0 0 24 24" fill="none">
                        <path d="M18 8C18 5.238 15.761 3 13 3H11C8.239 3 6 5.238 6 8V14L4 16V17H20V16L18 14V8Z"
                            stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 21H15" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                    </svg>

                </div>

                <h3>Notifications</h3>
            </a>

            <a href="#" class="menu-link">
                <div class="svg-icon">
                    <svg class="icon" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M12 21C12 21 4 14.5 4 9.5C4 7 6 5 8.5 5C10 5 11.5 6 12 7C12.5 6 14 5 15.5 5C18 5 20 7 20 9.5C20 14.5 12 21 12 21Z"
                            stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <h3>Subscribe</h3>
            </a>


            <a href="#" class="menu-link">
                <div class="svg-icon">
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

                </div>

                <h3>Dashboard</h3>
            </a>

        </div>
</header>
