<?php

namespace P3;

use Autoloader;
use P3\Framework\Router;

require_once ("Autoloader.php");
Autoloader::register();

session_start();

$router = new Router();
$router->run();




