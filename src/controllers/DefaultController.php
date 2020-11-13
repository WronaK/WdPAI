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

    public function firstForm() {
        $this->render('first-page-add-advertisement-form');
    }

    public function secondForm() {
        $this->render('second-page-add-advertisement-form');
    }

    public function thirdForm() {
        $this->render('third-page-add-advertisement-form');
    }

    public function fourthForm() {
        $this->render('fourth-page-add-advertisement-form');
    }

    public function fifthForm() {
        $this->render('fifth-page-add-advertisement-form');
    }
}