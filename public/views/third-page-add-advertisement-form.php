<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-menu.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-add-form.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-third-page-add-advertisement.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Page</title>
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
                <div id="first-page">
                    <span class="phone">1</span>
                    <span class="web">INFORMACJE PODSTAWOWE</span>
                </div>
                <div id="second-page">
                    <span class="phone">2</span>
                    <span class="web">INFORMACJE SZCZEGÓŁOWE</span>
                </div>
                <div id="third-page">
                    <span class="phone">3</span>
                    <span class="web">LOKALIZACJA</span>
                </div>
                <div id="fourth-page">
                    <span class="phone">4</span>
                    <span class="web">DANE KONTAKTOWE</span>
                </div>
                <div id="fifth-page">
                    <span class="phone">5</span>
                    <span class="web">DANE DODATKOWE</span>
                </div>
                <form id="form-add" action="thirdForm" method="POST">
                    <label for="city">MIASTO</label>
                    <input name="city" type="text" id="city" placeholder="Kraków">
                    <label for="street">ULICA</label>
                    <input name="street" type="text" id="street" placeholder="Siewna">
                    <label for="number-house">NUMER BUDYNKU</label>
                    <input name="number-house" type="number" id="number-house" placeholder="34">
                    <label for="code">KOD POCZTOWY</label>
                    <input name="code" type="text" id="code" placeholder="55-237">
                    <button type="submit">DALEJ</button>
                </form>
            </main>
        </div>
    </body>
</html>