<?php foreach($advertisements as $advertisement): ?>
    <div class="advertisement" id="<?= $advertisement->getId(); ?>">
        <img class="loadAdver" src="public/uploads/<?= $advertisement->getImage(); ?>">
        <?php if(isset($_COOKIE['isAdmin'])): ?>
        <div class="buttonDelete">Usuń ogłoszenie</div>
        <?php endif; ?>
        <div class="description">
            <div>
                <span>Lokalizacja: </span>
                <span><?= $advertisement->getCity(); ?></span>
            </div>
            <div>
                <span>Powierzchnia: </span>
                <span><?= $advertisement->getArea(); ?></span>
                <span>m<sup>2</sup></span>
            </div>
            <div>
                <span>Cena: </span>
                <span><?= $advertisement->getPrice(); ?></span>
                <span>zł</span>
            </div>
            <div>
                <span>Krótki opis: </span>
                <p><?= $advertisement->getDescription(); ?></p>
            </div>
            <div class="likes">
                <i class="fas fa-heart"><?= $advertisement->getLike(); ?></i>
            </div>
        </div>
    </div>
<?php endforeach; ?>