<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Advertisement.php';
require_once __DIR__ . '/../repository/AdvertisementRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';


class AdvertisementController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $advertismentRepository;
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->advertismentRepository = new AdvertisementRepository();
        $this->userRepository = new UserRepository();
    }

    public function firstForm() {
        if(!isset($_COOKIE['id'])) {
           return $this->render('login-page');
        }

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
        if(!isset($_COOKIE['id'])) {
            return $this->render('login-page');
        }

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
        if(!isset($_COOKIE['id'])) {
            return $this->render('login-page');
        }

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
        if(!isset($_COOKIE['id'])) {
            return $this->render('login-page');
        }

        if(!$this->isPost())
        {
            return $this->render('fourth-page-add-advertisement-form');
        }

        session_start();

        $advertisement = new Advertisement();
        $advertisement->setPropertyType($_SESSION['property-type'])
            ->setArea($_SESSION['area'])
            ->setNumberOfRooms($_SESSION['number-rooms'])
            ->setPrice($_SESSION['price'])
            ->setImage($_SESSION['image-input'])
            ->setDescription($_SESSION['description'])
            ->setCity($_SESSION['city'])
            ->setStreet($_SESSION['street'])
            ->setNumberOfHouse($_SESSION['number-house'])
            ->setPostcode($_SESSION['code'])
            ->setDescriptionOfTargetGroup($_POST['description-group'])
            ->setIdCreator($this->userRepository->getUserIdByCookie($_COOKIE['id']));
        $this->advertismentRepository->addAdvertisement($advertisement);
        session_destroy();


        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}");
    }

    public function search() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->advertismentRepository->getAdvertisementsBySearchParameters(
                $decoded['city'],
                $decoded['propertyType'],
                $decoded['priceFrom'],
                $decoded['priceTo'],
                $decoded['areaFrom'],
                $decoded['areaTo'])
            );
        }
    }

    public function searchNextPage() {
        $location = $_POST['location'];
        $propertyType = $_POST['propertyType'];
        $priceFrom = $_POST['priceFrom'];
        $priceTo = $_POST['priceTo'];
        $areaFrom = $_POST['areaFrom'];
        $areaTo = $_POST['areaTo'];

        $advertisements = $this->advertismentRepository->getAdvertisementsBySearchParam($location,
                                            $propertyType,
                                            $priceFrom,
                                            $priceTo,
                                            $areaFrom,
                                            $areaTo);
        $this->render('search-page', ['advertisements' => $advertisements]);
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

    public function index() {
        $advertisements = $this->advertismentRepository->getNewAdvertisements();
        $this->render('home-page', ['advertisements' => $advertisements]);
    }

    public function advertisements() {
        $advertisements = $this->advertismentRepository->getAdvertisements();
        $this->render('search-page', ['advertisements' => $advertisements]);
    }

    public function like(int $id) {
        $idUser = $this->userRepository->getUserIdByCookie($_COOKIE['id']);
        $this->advertismentRepository->like($id, $idUser);
        http_response_code(200);
    }

    public function delete(int $id) {
        $this->advertismentRepository->deleteAdver($id);
        http_response_code(200);
    }

    public function save(int $id) {
        $idUser = $this->userRepository->getUserIdByCookie($_COOKIE['id']);
        $this->advertismentRepository->save($id, $idUser);
        http_response_code(200);
    }

    public function adver(int $id) {
        echo json_encode($this->advertismentRepository->getAdvertisementById($id));
    }

    public function yourAdvertisements() {
        if(!isset($_COOKIE['id'])) {
            return $this->render('login-page');
        }

        $idUser = $this->userRepository->getUserIdByCookie($_COOKIE['id']);
        $advertisements = $this->advertismentRepository->getYourAdvertisements($idUser);
        $this->render('your-advertisement', ['advertisements' => $advertisements]);
    }

    public function saveAdvertisements() {
        if(!isset($_COOKIE['id'])) {
            return $this->render('login-page');
        }

        $idUser = $this->userRepository->getUserIdByCookie($_COOKIE['id']);
        $advertisements = $this->advertismentRepository->getSaveAdvertisements($idUser);
        $this->render('save-advertisement', ['advertisements' => $advertisements]);
    }
}