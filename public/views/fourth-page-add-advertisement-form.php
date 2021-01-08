<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-menu.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-add-form.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-fourth-page-add-advertisments.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Page</title>
    </head>
    <body>
        <div class="base-container">
            <?php include 'templates/header.php'; ?>
            <main>
                <?php include 'templates/bookmarks.php'; ?>
                <form id="form-add" action="fourthForm" method="POST">
                    <label for="name">IMIĘ</label>
                    <input name="name" type="text" id="name" placeholder="Adam">
                    <label for="email">EMAIL</label>
                    <input name="email" type="email" id="email" placeholder="adam@gmail.com">
                    <label for="number-phone">TELEFON KONTAKTOWY</label>
                    <input name="number-phone" type="text" id="number-phone" placeholder="639467267">
                    <button type="submit">DALEJ</button>
                </form>
            </main>
        </div>
    </body>
</html>