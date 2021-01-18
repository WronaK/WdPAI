<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function advertisement() {
       $this->render('advertisement-page');
    }
}