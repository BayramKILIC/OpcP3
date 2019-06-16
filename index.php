<?php
namespace P3;
require_once  ('config.php');
require_once ("Autoloader.php");

use Autoloader;
use P3\Framework\Router;


Autoloader::register();

session_start();

$router = new Router();
$router->run();




