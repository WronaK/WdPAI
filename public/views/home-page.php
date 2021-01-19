<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-menu.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-advertisements-section.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-home-page.css">
        <script type="text/javascript" src="public/js/likes.js" defer></script>
        <script type="text/javascript" src="public/js/logout.js" defer></script>
        <script type="text/javascript" src="public/js/advertisement.js" defer></script>
        <script type="text/javaScript" src="./public/js/delete-adver.js" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
    </head>
    <body>
        <div class="base-container">
            <?php include 'templates/header.php'; ?>
            <main>
                <form class="search-panel" action="searchNextPage" method="post">
                    <?php include 'templates/search-panel.php'; ?>
                    <button id="button-search" type="submit">WYSZUKAJ</button>
                </form>
                <section class="advertisements">
                    <div id="title-section">
                        NOWE OGŁOSZENIA
                    </div>
                    <section class="advertisements">
                        <?php include 'templates/advertisement.php'; ?>
                    </section>
                </section>
            </main>
        </div>
    </body>
</html>