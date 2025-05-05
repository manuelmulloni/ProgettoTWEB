<header>
    <a href="{{route('primaview')}}" class="logo">Sito Minimal</a> <!-- Logo/Nome sito -->

    <div class ="container">
        <a href="{{route('dipartimenti')}}"> Dipartimenti</a>
    </div>

    <!-- Icona Hamburger (sempre visibile) -->
    <button class="hamburger-icon" aria-label="Apri menu" aria-expanded="false">
        ≡
    </button>

    <!-- Menu -->
    <nav class="mobile-menu">
        <ul>
            <li><a href="{{route('login')}}">Login</a></li>
            <li><a href="{{route('registrazione')}}">Registrazione</a></li>
        </ul>
    </nav>
</header>
