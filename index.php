<?php

declare(strict_types=1);

use Andrejus\ProductsReservation\Controller\AdsController;
use Andrejus\ProductsReservation\Router;

require 'vendor/autoload.php';

$router = new Router();

$router->add('GET', '/', function () {
    (new AdsController())->showPage();
});

$router->add('POST', '/', function () {
    (new AdsController())->checkInventor($_POST['name'], (int)$_POST['quantity']);
});

$router->route($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
