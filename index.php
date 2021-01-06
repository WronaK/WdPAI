<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], "/");
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'AdvertisementController');
Routing::get('advertisements', 'AdvertisementController');
Routing::get('advertisement', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::get('registration', 'SecurityController');
Routing::post('firstForm', 'AdvertisementController');
Routing::post('secondForm', 'AdvertisementController');
Routing::post('thirdForm', 'AdvertisementController');
Routing::post('fourthForm', 'AdvertisementController');
Routing::post('fifthForm', 'AdvertisementController');
Routing::post('search', 'AdvertisementController');
Routing::run($path);
