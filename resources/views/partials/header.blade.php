<header class="main-header">
    <nav class="navbar">
        <div class="navbar-brand">
            <a href="{{ route('pages.index') }}">Larafilm</a>
        </div>

        <div class="hamburger hamburger--criss-cross navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="inner">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>

      <ul class="nav-items">
        <li class="nav-item">
            <a href="{{ route('pages.index') }}">
                Home
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('movie.index') }}">
                Releases
            </a>
        </li>
        @guest
            <li class="nav-item">
                <a href="{{ route('login') }}">
                    Login
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register') }}">
                    Register
                </a>
            </li>
        @endguest
        @auth
            <li class="nav-item">
                <a href="/profile">
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <form class="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn" type="submit">
                        Logout
                    </button>
                </form>
            </li>
        @endauth
      </ul>
    </nav>
</header>
<div class="pos-f-">
    <div class="collapse" id="navbarToggleExternalContent">
        <ul class="mobile-nav nav">
            <a href="{{ route('pages.index') }}">
                <li class="nav-item">
                    Home
                </li>
            </a>
            <a href="{{ route('movie.index') }}">
                <li class="nav-item">
                    Releases
                </li>
            </a>
            @guest
                <a href="{{ route('login') }}">
                    <li class="nav-item">
                        Login
                    </li>
                </a>
                <a href="{{ route('register') }}">
                    <li class="nav-item">
                        Register
                    </li>
                </a>
            @endguest
            @auth
                <a href="/profile">
                    <li class="nav-item">
                        Profile
                    </li>
                </a>
                <form class="logout-form" method="POST" action="{{ route('logout') }}">
                    <a href="/logout">
                        <li class="nav-item">
                            <button type="submit">Logout</button>
                        </li>
                    </a>
                </form>
            @endauth
        </ul>
    </div>
</div>


