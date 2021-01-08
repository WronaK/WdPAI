<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-menu.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-advertisement-page.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Advertisement Page</title>
    </head>
    <body>
        <div class="base-container">
            <?php include 'templates/header.php'; ?>
            <main>
                <section id="basic-information">
                    <h3>Informacje podstawowe </h3>
                    Rodzaj nieruchomości: <?= $advertisement->getPropertyType() ?><br/>
                    Powierzchnia: <?= $advertisement->getArea() ?><br/>
                    Liczba pokoi: <?= $advertisement->getNumberOfRooms() ?><br/>
                    Cena: <?= $advertisement->getPrice() ?><br/>
                </section>
                <img src="public/uploads/<?= $advertisement->getImage() ?>" id="first-image">
                <section id="description">
                    <h3>Krótki opis </h3>
                    <p><?= $advertisement->getDescription() ?></p>
                </section>
                <section id="location">
                    <h3>Lokalizacja </h3>
                    Miasto: <?= $advertisement->getCity() ?><br/>
                    Ulica: <?= $advertisement->getStreet() ?> <br/>
                    Numer budynku: <?= $advertisement->getNumberOfHouse() ?> <br/>
                    Kod pocztowy: <?= $advertisement->getPostCode() ?><br/>
                </section>
                <img src="public/img/room.jpg" id="second-image">
                <section id="contact-info">
                    <h3>Informacje kontaktowe </h3>
                    <i class="fas fa-user"></i>
                    Imię: <?= $advertisement->getContactDetails()->getName() ?><br/>
                    <i class="fas fa-at"></i>
                    Email:  <?= $advertisement->getContactDetails()->getEmail() ?><br/>
                    <i class="fas fa-phone-square-alt"></i>
                    Numer telefonu:  <?= $advertisement->getContactDetails()->getPhoneNumber() ?><br/>
                </section>
                <section id="other-information">
                    <h3>Informacje dodatkowe</h3>
                    <p> <?= $advertisement->getDescriptionOfTargetGroup() ?></p>
                </section>
                <div id="like">
                    <i class="fas fa-heart"></i>
                    ZAPAMIĘTAJ
                </div>
                <div id="dislike">
                    <i class="fas fa-thumbs-down"></i>
                    NIE POKAZUJ WIĘCEJ
                </div>
            </main>
        </div>
    </body>
</html>