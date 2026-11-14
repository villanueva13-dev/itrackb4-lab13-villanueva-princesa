
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="{{ route('home') }}">
            BookTracker
        </a>

        <!-- Toggle Button for Small Screens -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">

                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold' : '' }}"
                       href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <!-- Books -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('books.*') ? 'active fw-bold' : '' }}"
                       href="{{ route('books.index') }}">
                        Books
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
