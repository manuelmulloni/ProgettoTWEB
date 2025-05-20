<header>
    <a href="{{route('primaview')}}" class="logo">Sito Minimal</a> <!-- Logo/Nome sito -->

    <div class ="container">
        <a href="{{route('dipartimenti')}}"> Dipartimenti</a>
    </div>

    @if (Auth::check())
        <div class="user-info">
            <span class="username">{{ Auth::user()->username }}</span>
            <a href="{{ route('logout') }}" class="logout-button">Logout</a>
        </div>
    @endif


    <!-- Icona Hamburger (sempre visibile) -->
    <button class="hamburger-icon" aria-label="Apri menu" aria-expanded="false">
        ≡
    </button>

    <!-- Menu -->
    <nav class="mobile-menu">
        <ul>
            <li><a href="{{route('login')}}">Login</a></li>
            <li><a href="{{route('register')}}">Registrazione</a></li>
        </ul>
    </nav>
</header>
