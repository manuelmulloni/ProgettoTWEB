<header>
    <div>
        <a href="{{ route('primaview') }}" class="logo">Poliambulatorio Salus</a> <!-- Logo/Nome sito -->
    </div>

    <div class ="container">
        <i class="fa-solid fa-arrow-left notification-close" style="margin-right: 5px" id="historyBack"></i>
        <i class="fa-solid fa-arrow-right notification-close" style="margin-right: 15px" id="historyForward"></i>
        <a href="{{ route('dipartimenti') }}"> Dipartimenti</a>
        @can('isUser')
            <a href="{{ route('cliente') }}">Area Utente</a>
        @endcan
        @can('isStaff')
            <a href="{{ route('agenda') }}">Gestione Agenda</a>
        @endcan
        @can('isAdmin')
            <a href="{{ route('admin') }}">Area Admin</a>
        @endcan
    </div>

    @if (Auth::check())
        <div class="user-info">
            @include('utenti.user_notification')
            <span class="username">{{ Auth::user()->username }}</span>
            <img src="{{ Auth::user()->profile_picture() }}" alt="User Icon" class="profile-image">

            <form id="logout-form" action="{{ route('logout') }}" method="GET">
                <button type="submit" class="button-style delete-button">Logout</button>
            </form>
        </div>
    @else
        <!-- Icona Hamburger (sempre visibile) -->
        <button class="hamburger-icon" aria-label="Apri menu" aria-expanded="false">
            ≡
        </button>

        <!-- Menu -->
        <nav class="mobile-menu">
            <ul>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Registrazione</a></li>
            </ul>
        </nav>
    @endif
</header>
