<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if(!$this->isPost())
        {
            return $this->render('login-page');
        }

        $email = $_POST['email'];
        $password = md5(md5($_POST['password']));

        $user = $this->userRepository->getUser($email);

        if(!$user) {
            return $this->render('login-page', ['messages' => ['Użytkownik nie istnieje!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login-page', ['messages' => ['Uzytkownik o takim emailu nie istnieje!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login-page', ['messages' => ['Złe hasło']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/firstForm");
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

        if ($password !== $confirmedPassword) {
            return $this->render('registration-page', ['messages' => ['Podaj poprawne hasło']]);
        }

        $user = new User($email, md5(md5($password)), $name, $surname);

        $this->userRepository->addUser($user);

        return $this->render('login-page', ['messages' => ["Poprawna rejestracja"]]);
    }

}