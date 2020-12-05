<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], "/");
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('registration', 'DefaultController');
Routing::get('search', 'DefaultController');
Routing::get('advertisement', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('firstForm', 'AdvertisementController');
Routing::post('secondForm', 'AdvertisementController');
Routing::post('thirdForm', 'AdvertisementController');
Routing::post('fourthForm', 'AdvertisementController');
Routing::post('fifthForm', 'AdvertisementController');

Routing::run($path);
