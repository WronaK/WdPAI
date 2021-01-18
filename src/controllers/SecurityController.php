<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__ . '/../repository/AdvertisementRepository.php';


class SecurityController extends AppController
{
    private $userRepository;
    private $advertisementRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->advertisementRepository = new AdvertisementRepository();
    }

    public function login()
    {
        if(!$this->isPost())
        {
            return $this->render('login-page');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userRepository->getUser($email);
        $salt = $user->getSalt();

        $password = md5(md5($password.$salt));


        if(!$user) {
            return $this->render('login-page', ['messages' => ['Użytkownik nie istnieje!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login-page', ['messages' => ['Uzytkownik o takim emailu nie istnieje!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login-page', ['messages' => ['Złe hasło']]);
        }

        $cookie = $this->generateToken();
        setcookie("id", $cookie, time()+3600*24);

        if($user->getRole() === 2) {
            setcookie("isAdmin", true, time()+3600*24);
        }
        $this->userRepository->setCookie($email, $cookie);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }

    public function registration()  {
        if(!$this->isPost())
        {
            return $this->render('registration-page');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];
        $salt = $this->generateToken();

        if ($password !== $confirmedPassword) {
            return $this->render('registration-page', ['messages' => ['Podane hasła nie sa takie same']]);
        }

        $user = new User($email, md5(md5($password.$salt)), $name, $surname, $phone, $salt);

        $this->userRepository->addUser($user);

        return $this->render('login-page', ['messages' => ["Poprawna rejestracja"]]);
    }

    public function logout() {
        if(isset($_COOKIE['id'])) {
            setcookie('id', '', time() - 3600);
        }
        if(isset($_COOKIE['isAdmin'])) {
            setcookie('isAdmin', '', time() - 3600);
        }
    }

    private function generateToken() {
        return bin2hex(random_bytes(50));
    }

    public function settings() {
        if(!isset($_COOKIE['id'])) {
            return $this->render('login-page');
        }

        return $this->render('settings');
    }

    public function disableAccount() {
        if(!isset($_COOKIE['id'])) {
            return $this->render('login-page');
        }
        return $this->render('disable-account');
    }

    public function updateSettings() {
        if(!$this->isPost())
        {
            return $this->render('settings');
        }

        $oldPassword = $_POST['old-password'];
        $newPassword = $_POST['new-password'];
        $newConfirmedPassword = $_POST['confirm-password'];
        $newSalt = $this->generateToken();

        $oldPasswordDataBased = $this->userRepository->getOldPassword($_COOKIE['id'])[0];
        $oldSalt = $this->userRepository->getOldPassword($_COOKIE['id'])[1];

        if (md5(md5($oldPassword.$oldSalt)) !== $oldPasswordDataBased) {
            return $this->render('settings', ['messages' => ['Podaj poprawne hasło']]);
        }

        if ($newPassword !== $newConfirmedPassword) {
            return $this->render('settings', ['messages' => ['Złe hasła']]);
        }

        $this->userRepository->updatePassword($_COOKIE['id'], md5(md5($newPassword.$newSalt)), $newSalt);

        return $this->render('settings', ['messages' => ["Udana zmiana hasła"]]);
    }

    public function disable() {
        if(!$this->isPost())
        {
            return $this->render('disable-account');
        }

        $password = $_POST['password'];

        $passwordDataBased = $this->userRepository->getOldPassword($_COOKIE['id'])[0];
        $salt = $this->userRepository->getOldPassword($_COOKIE['id'])[1];

        if (md5(md5($password.$salt)) !== $passwordDataBased) {
            return $this->render('disable-account', ['messages' => ['Podaj poprawne hasło']]);
        }

        $this->userRepository->disableAccount($_COOKIE['id']);
        $idUser = $this->userRepository->getUserIdByCookie($_COOKIE['id']);
        $this->advertisementRepository->disabledAd($idUser);

        return $this->render('login-page', ['messages' => ["Udana dezaktywacja konta"]]);
    }
}