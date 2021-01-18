<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-menu.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-advertisements-section.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-search-page.css">
        <script type="text/javascript" src="public/js/search.js" defer></script>
        <script type="text/javascript" src="public/js/likes.js" defer></script>
        <script type="text/javaScript" src="./public/js/delete-adver.js" defer></script>
        <script type="text/javascript" src="public/js/logout.js" defer></script>
        <script type="text/javascript" src="public/js/advertisement.js" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Page</title>
    </head>
    <body>
        <div class="base-container">
            <?php include 'templates/header.php'; ?>
            <main>
                <?php include 'templates/search-panel.php'; ?>
                <section class="advertisements">
                    <?php include 'templates/advertisement.php'; ?>
                </section>
            </main>
        </div>
    </body>

<template id="advertisement-template">
    <div class="advertisement">
        <img src="">
        <div class="description">
            <div>
                <span>Lokalizacja:</span>
                <span id="city">city</span>
            </div>
            <div>
                <span>Powierzchnia:</span>
                <span id="area">area</span>
            </div>
            <div>
                <span>Cena:</span>
                <span id="price">price</span>
            </div>
            <div>
                <span>Krótki opis:</span>
                <p>description</p>
            </div>
            <div class="likes">
                <i class="fas fa-heart"></i>
            </div>
        </div>
    </div>
</template>
</html>