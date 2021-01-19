<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/style-menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/style-advertisements-section.css">
    <link rel="stylesheet" type="text/css" href="public/css/style-your-advertisement.css">
    <script type="text/javascript" src="public/js/logout.js" defer></script>
    <script type="text/javascript" src="public/js/home.js" defer></script>
    <script type="text/javascript" src="public/js/advertisement.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Advertisement</title>
</head>
<body>
<div class="base-container">
    <?php include 'templates/header.php'; ?>
    <main>
        <div id="title-section">
            ZAPISANE OGŁOSZENIA
        </div>
        <section class="advertisements">
            <?php include 'templates/advertisement.php'; ?>
        </section>
    </main>
</div>
</body>

</html>