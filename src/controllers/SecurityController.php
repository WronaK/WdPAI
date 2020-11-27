<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login()
    {
        $user = new User('jsnow@pk.edu.pl', 'admin', 'John', 'Snow');

        if(!$this->isPost())
        {
            return $this->render('login-page');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($user->getEmail() !== $email) {
            return $this->render('login-page', ['messages' => ['Uzywtkonik o takim emailu nie istnieje!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login-page', ['messages' => ['Złe hasło']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/firstForm");
    }

}