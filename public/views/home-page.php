<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-menu.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-advertisements-section.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-home-page.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
    </head>
    <body>
        <div class="base-container">
            <?php include 'templates/header.php'; ?>
            <main>
                <form class="search-panel">
                    <input type="text" placeholder="Lokalizacja">
                    <select name="propertyType">
                        <option selected disabled>Rodzaj nieruchomości</option>
                        <option>Mieszkanie</option>
                        <option>Pokój</option>
                    </select>
                    <input type="number" step="any" placeholder="Cena od">
                    <input type="number" step="any" placeholder="Cena do">
                    <input type="number" step="any" placeholder="Powierzchnia od">
                    <input type="number" step="any" placeholder="Powierzchnia do">
                    <button id="button-search">Wyszukaj</button>
                </form>
                <section class="advertisements">
                    <div id="title-section">
                        NOWE OGŁOSZENIA
                    </div>
                    <section>
                        <?php foreach($advertisements as $advertisement): ?>
                            <div class="advertisement">
                                <img src="public/uploads/<?= $advertisement->getImage(); ?>">
                                <div class="description">
                                    <div>Lokalizacja: <?= $advertisement->getCity(); ?></div>
                                    <div>Powierzchnia: <?= $advertisement->getArea(); ?></div>
                                    <div>Cena: <?= $advertisement->getPrice(); ?></div>
                                    <div>Krótki opis: <?= $advertisement->getDescription(); ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </section>
                </section>
            </main>
        </div>
    </body>
</html>