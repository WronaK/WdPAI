<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-menu.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-form.css">
        <script type="text/javaScript" src="./public/js/script.js" defer></script>
        <script type="text/javaScript" src="./public/js/registration.js" defer></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Page</title>
    </head>
    <body>
        <div class="base-container">
            <?php include 'templates/header.php'; ?>
            <main>
                <div id="form-page">
                    <?php include 'templates/login.php'; ?>
                    <form id="form-login" action="registration" method="POST">
                        <input name="name" type="text" placeholder="Imię">
                        <input name="surname" type="text" placeholder="Nazwisko">
                        <input name="email" type="email" placeholder="Email">
                        <input name="phone" type="text" placeholder="Numer telefonu">
                        <input name="password" type="password" placeholder="Hasło">
                        <input name="confirmedPassword" type="password" placeholder="Powtórz hasło">
                        <button type="sumbit">ZAREJESTRUJ SIĘ</button>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>