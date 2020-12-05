<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index() {
        $this->render('home-page');
    }

    public function login() {
        $this->render('login-page');
    }

    public function registration() {
        $this->render('registration-page');
    }

    public function search() {
        $this->render('search-page');
    }

    public function advertisement() {
        $this->render('advertisement-page');
    }
}