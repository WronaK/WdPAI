<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-menu.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-advertisements-section.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-search-page.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Page</title>
    </head>
    <body>
        <div class="base-container">
            <header>
                <div class="logo">
                    <img src="public/img/logo.svg">
                </div>
                <nav>
                    <button>
                        <i class="fas fa-bars">
                    </i></button>
                    <ul>
                        <li><a href="#">MOJE KONTO</a></li>
                        <li><a href="#">DODAJ OGŁOSZENIE</a></li>
                        <li><a href="#">PRZEGLĄDAJ OGŁOSZENIA</a></li>
                    </ul>
                </nav>
            </header>
            <main>
                <form class="search-panel">
                    <input type="text" placeholder="LOKALIZACJA">
                    <select>
                        <option selected disabled>RODZAJ NIERUCHOMOŚCI</option>
                        <option>Mieszkanie</option>
                        <option>Pokój</option>
                    </select>
                    <input type="number" step="any" placeholder="CENA OD">
                    <input type="number" step="any" placeholder="CENA DO">
                    <input type="number" step="any" placeholder="POWIERZCHNIA OD">
                    <input type="number" step="any" placeholder="POWIERZCHNIA DO">
                    <button id="button-search">WYSZUKAJ</button>
                </form>
                <section class="advertisements">
                    <div class="advertisement">
                        <img src="public/img/room.jpg">
                        <div class="description">
                            Lokalizacja<br/>
                            Powierzchnia<br/>
                            Cena<br/>
                            Krótki opis<br/>
                        </div>
                    </div>
                    <div class="advertisement">
                        <img src="public/img/room.jpg">
                        <div class="description">
                            Lokalizacja<br/>
                            Powierzchnia<br/>
                            Cena<br/>
                            Krótki opis<br/>
                        </div>
                    </div>
                    <div class="advertisement">
                        <img src="public/img/room.jpg">
                        <div class="description">
                            Lokalizacja<br/>
                            Powierzchnia<br/>
                            Cena<br/>
                            Krótki opis<br/>
                        </div>
                    </div>
                    <div class="advertisement">
                        <img src="public/img/room.jpg">
                        <div class="description">
                            Lokalizacja<br/>
                            Powierzchnia<br/>
                            Cena<br/>
                            Krótki opis<br/>
                        </div>
                    </div>
                    <div class="advertisement">
                        <img src="public/img/room.jpg">
                        <div class="description">
                            Lokalizacja<br/>
                            Powierzchnia<br/>
                            Cena<br/>
                            Krótki opis<br/>
                        </div>
                    </div>
                    <div class="advertisement">
                        <img src="public/img/room.jpg">
                        <div class="description">
                            Lokalizacja<br/>
                            Powierzchnia<br/>
                            Cena<br/>
                            Krótki opis<br/>
                        </div>
                    </div>
                    <div class="advertisement">
                        <img src="public/img/room.jpg">
                        <div class="description">
                            Lokalizacja<br/>
                            Powierzchnia<br/>
                            Cena<br/>
                            Krótki opis<br/>
                        </div>
                    </div>
                    <div class="advertisement">
                        <img src="public/img/room.jpg">
                        <div class="description">
                            Lokalizacja<br/>
                            Powierzchnia<br/>
                            Cena<br/>
                            Krótki opis<br/>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>