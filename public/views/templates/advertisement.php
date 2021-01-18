<?php foreach($advertisements as $advertisement): ?>
    <div class="advertisement" id="<?= $advertisement->getId(); ?>">
        <img class="loadAdver" src="public/uploads/<?= $advertisement->getImage(); ?>">
        <?php if(isset($_COOKIE['isAdmin'])): ?>
        <div class="buttonDelete">Usuń ogłoszenie</div>
        <?php endif; ?>
        <div class="description">
            <div>Lokalizacja: <?= $advertisement->getCity(); ?></div>
            <div>Powierzchnia: <?= $advertisement->getArea(); ?></div>
            <div>Cena: <?= $advertisement->getPrice(); ?></div>
            <div>Krótki opis: <?= $advertisement->getDescription(); ?></div>
            <div class="likes">
                <i class="fas fa-heart"><?= $advertisement->getLike(); ?></i>
            </div>
        </div>
    </div>
<?php endforeach; ?>