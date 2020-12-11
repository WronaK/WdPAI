<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();

        if(!$this->isPost())
        {
            return $this->render('login-page');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

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

}