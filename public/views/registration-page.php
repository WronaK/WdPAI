<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-menu.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-form.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-registration-page.css">
        <script type="text/javaScript" src="./public/js/script.js" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Page</title>
    </head>
    <body>
        <div class="base-container">
            <?php include 'templates/header.php'; ?>
            <main>
                <div id="login">LOGOWANIE</div>
                <div id="registration">REJESTRACJA</div>
                <form id="form-login" action="registration" method="POST">
                    <input name="name" type="text" placeholder="Imię">
                    <input name="surname" type="text" placeholder="Nazwisko">
                    <input name="email" type="text" placeholder="Email">
                    <input name="password" type="text" placeholder="Hasło">
                    <input name="confirmedPassword" type="text" placeholder="Powtórz hasło">
                    <button type="sumbit">ZAREJESTRUJ SIĘ</button>
                </form>
            </main>
        </div>
    </body>
</html>