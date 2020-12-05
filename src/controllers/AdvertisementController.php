<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Advertisement.php';
require_once __DIR__.'/../models/ContactDetails.php';

class AdvertisementController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];

    public function firstForm() {
        if(!$this->isPost())
        {
            return $this->render('first-page-add-advertisement-form');
        }

        session_start();

        $_SESSION['property-type'] = $_POST['property-type'];
        $_SESSION['area'] = $_POST['area'];
        $_SESSION['number-rooms'] = $_POST['number-rooms'];
        $_SESSION['price'] = $_POST['price'];

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/secondForm");
    }

    public function secondForm()
    {
        if($this->isPost() && is_uploaded_file($_FILES['image-input']['tmp_name']) && $this->validate($_FILES['image-input'])) {

            move_uploaded_file(
                $_FILES['image-input']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['image-input']['name']
            );

            session_start();

            $_SESSION['image-input'] = $_FILES['image-input']['name'];
            $_SESSION['description'] = $_POST['description'];

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/thirdForm");

        } else {
            $this->render("second-page-add-advertisement-form");
        }
    }

    public function thirdForm() {
        if(!$this->isPost())
        {
            return $this->render('third-page-add-advertisement-form');
        }

        session_start();

        $_SESSION['city'] = $_POST['city'];
        $_SESSION['street'] = $_POST['street'];
        $_SESSION['number-house'] = $_POST['number-house'];
        $_SESSION['code'] = $_POST['code'];

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/fourthForm");
    }

    public function fourthForm() {
        if(!$this->isPost())
        {
            return $this->render('fourth-page-add-advertisement-form');
        }

        session_start();

        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['number-phone'] = $_POST['number-phone'];

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/fifthForm");
    }

    public function fifthForm() {
        if(!$this->isPost())
        {
            return $this->render('fifth-page-add-advertisement-form');
        }

        session_start();

        $advertisement = new Advertisement();
        $advertisement->setPropertyType($_SESSION['property-type']);
        $advertisement->setArea($_SESSION['area']);
        $advertisement->setNumberOfRooms($_SESSION['number-rooms']);
        $advertisement->setPrice($_SESSION['price']);
        $advertisement->setImage($_SESSION['image-input']);
        $advertisement->setDescription($_SESSION['description']);
        $advertisement->setCity($_SESSION['city']);
        $advertisement->setStreet($_SESSION['street']);
        $advertisement->setNumberOfHouse($_SESSION['number-house']);
        $advertisement->setPostcode($_SESSION['code']);
        $advertisement->setContactDetails(new ContactDetails($_SESSION['name'], $_SESSION['email'], $_SESSION['number-phone']));
        $advertisement->setDescriptionOfTargetGroup($_POST['description-group']);

        session_destroy();
        return $this->render('advertisement-page', ['messages' => $this->messages, 'advertisement' => $advertisement]);
    }

    private function validate(array $files): bool
    {
        if($files['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'Za duży rozmiar pliku';
            return false;
        }
        if(!isset($files['type']) && !in_array($files['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'Plik o nieodpowiednim typie';
            return false;
        }
        return true;
    }
}