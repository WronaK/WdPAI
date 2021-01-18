<header>
    <div class="logo">
        <img src="public/img/logo.svg">
    </div>
    <nav>
        <button>
            <i class="fas fa-bars"></i>
        </button>
        <ul>
            <?php if(isset($_COOKIE['id'])): ?>
            <li id="myAccount"><a>MOJE KONTO</a>
                <ul>
                    <li><a href="saveAdvertisements">ZAPISANE OGŁOSZENIA</a></li>
                    <li><a href="yourAdvertisements">MOJE OGŁOSZENIA</a></li>
                    <li><a href="settings">USTAWIENIA</a></li>
                    <li><a href="#" class="logout">WYLOGUJ SIĘ</a></li>
                </ul>
            </li>
            <?php else: ?>
            <li><a href="login">ZALOGUJ SIĘ</a></li>
            <?php endif; ?>
            <li><a href="firstForm">DODAJ OGŁOSZENIE</a></li>
            <li><a href="advertisements">PRZEGLĄDAJ OGŁOSZENIA</a></li>
        </ul>
    </nav>
</header>