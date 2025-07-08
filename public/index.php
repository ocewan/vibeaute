<?php
// chargement de l'autoload 
require_once __DIR__ . '/../vendor/autoload.php';

// définition de la constante APP_ROOT pour le chemin de l'app 
define('APP_ROOT', dirname(__DIR__));
define('APP_ENV', ".env");

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use App\Routing\Router;

$router = new Router();
$router->handleRequest($_SERVER['REQUEST_URI']);

// use App\Controller\PageController;

// $pageController = new PageController();
// $pageController->home();
