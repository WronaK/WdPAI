<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-menu.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-advertisement-page.css">
        <script type="text/javascript" src="public/js/logout.js" defer></script>
        <script type="text/javascript" src="public/js/load-adver.js" defer></script>
        <script type="text/javascript" src="public/js/action-users.js" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Advertisement Page</title>
    </head>
    <body>
        <div class="base-container">
            <?php include 'templates/header.php'; ?>
            <main>
                <div class="advertisement">
                <section id="basic-information">
                    <h3>Informacje podstawowe </h3>
                    <span>Rodzaj nieruchomości:</span>
                    <span id="property-type"></span><br/>
                    <span>Powierzchnia:</span>
                    <span id="area"></span><br/>
                    <span>Liczba pokoi:</span>
                    <span id="number-of-rooms"></span><br/>
                    <span>Cena:</span>
                    <span id="price"></span><br/>
                </section>
                <img src="" id="first-image">
                <section id="description">
                    <h3>Krótki opis </h3>
                    <p></p>
                </section>
                <section id="location">
                    <h3>Lokalizacja </h3>
                    <span>Miasto:</span><span id="city"></span><br/>
                    <span>Ulica:</span><span id="street"></span><br/>
                    <span>Numer budynku:</span><span id="number-of-house"></span><br/>
                    <span>Kod pocztowy:</span><span id="post-code"></span><br/>
                </section>
                <img src="" id="second-image">
                <section id="contact-info">
                    <h3>Informacje kontaktowe </h3>
                    <i class="fas fa-user"></i>
                    <span>Imię:</span><span id="name"></span><br/>
                    <i class="fas fa-at"></i>
                    <span>Email:</span><span id="email"></span><br/>
                    <i class="fas fa-phone-square-alt"></i>
                    <span>Numer telefonu:</span><span id="phone-number"></span><br/>
                </section>
                <section id="other-information">
                    <h3>Informacje dodatkowe</h3>
                    <p id="description-of-target-group"></p>
                </section>
                <div id="like">
                    <i class="fas fa-heart"></i>
                    PODOBA MI SIĘ
                </div>
                <div id="save">
                    <i class="far fa-bookmark"></i>
                    ZAPAMIĘTAJ
                </div>
                </div>
            </main>
        </div>
    </body>
</html>