<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-menu.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-add-form.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-second-page-add-advertisement.css">
        <script type="text/javascript" src="public/js/logout.js" defer></script>
        <script type="text/javascript" src="public/js/home.js" defer></script>
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
                    <form id="form-add" action="secondForm" method="POST" enctype="multipart/form-data">
                        <label for="image-add">DODAJ ZDJĘCIA</label>
                        <div id="add-file">
                            <label for="file-input">
                                <i class="far fa-images"></i>
                            </label>
                            <input name="image-input" id="file-input" type="file" accept="image/png, image/jpeg">
                        </div>
                        <label for="description">DODAJ OPIS</label>
                        <textarea name="description"
                                  id="description"
                                  placeholder="Tutaj możesz krótko opisać mieszkanie/pokój które chcesz wynająć.">
                        </textarea>
                        <button type="submit">Dalej</button>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>