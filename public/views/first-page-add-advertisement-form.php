<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-menu.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-add-form.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-first-page-add-advertisement.css">
        <script type="text/javascript" src="public/js/logout.js" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Page</title>
    </head>
    <body>
        <div class="base-container">
            <?php include 'templates/header.php'; ?>
            <main>
                <div id="form-page">
                    <?php include 'templates/bookmarks.php'; ?>
                    <form id="form-add" action="firstForm" method="POST">
                        <label for="type">RODZAJ NIERUCHOMOŚCI</label>
                        <select name="property-type" id="type">
                            <option selected disabled>Wybierz rodzaj nieruchomości</option>
                            <option>Mieszkanie</option>
                            <option>Pokój</option>
                        </select>
                        <label for="area">POWIERZCHNIA (w m<sup>2</sup>)</label>
                        <input name="area" type="number" id="area"  step="any" placeholder="39,50">
                        <label for="number-rooms">LICZBA POKOI</label>
                        <input name="number-rooms" type="number" id="number-rooms" placeholder="2">
                        <label for="price">CENA (w zł)</label>
                        <input name="price" type="number" id="price" step="any" placeholder="1200">
                        <button type="submit">DALEJ</button>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>