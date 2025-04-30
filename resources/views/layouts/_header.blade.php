<header>
    <a href="#" class="logo">Sito Minimal</a> <!-- Logo/Nome sito -->

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
            <li><a href="#">Login</a></li>
            <li><a href="#" id="openRegisterModal">Registrazione</a></li> <!-- cambiato per modal-->
        </ul>
    </nav>
</header>

<script src="assets/javascript/script.js"></script>