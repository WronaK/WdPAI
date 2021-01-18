<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/style-menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/style-form.css">
    <script type="text/javascript" src="public/js/logout.js" defer></script>
    <script type="text/javaScript" src="./public/js/settings.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting Page</title>
</head>
<body>
<div class="base-container">
    <?php include 'templates/header.php'; ?>
    <main>
        <div id="form-page">
            <?php include 'templates/settings.php'; ?>
            <form id="form-login" action="updateSettings" method="POST">
                <div class="messages">
                    <?php
                    if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="old-password" type="password" placeholder="Wprowadź stare hasło">
                <input name="new-password" type="password" placeholder="Wprowadź nowe hasło">
                <input name="confirm-password" type="password" placeholder="Powtórz hasło">
                <button type="sumbit">ZMIEŃ HASŁO</button>
            </form>
        </div>
    </main>
</div>
</body>
</html>