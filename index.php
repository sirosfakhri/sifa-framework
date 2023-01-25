<?php

/**
 * Include Composer Autoloader
 */


include './vendor/autoload.php';

include "bootstrap/app.php";

$router = new \Sifa\App\Core\Routing\Router();
$router->run();


