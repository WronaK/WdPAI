<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], "/");
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('registration', 'DefaultController');
Routing::get('search', 'DefaultController');
Routing::get('advertisement', 'DefaultController');
Routing::get('firstForm', 'DefaultController');
Routing::get('secondForm', 'DefaultController');
Routing::get('thirdForm', 'DefaultController');
Routing::get('fourthForm', 'DefaultController');
Routing::get('fifthForm', 'DefaultController');

Routing::post('login', 'SecurityController');

Routing::run($path);
