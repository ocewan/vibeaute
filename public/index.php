<?php
// chargement de l'autoload 
require_once __DIR__ . '/../vendor/autoload.php';

// expiration de la session après 15 minutes d'inactivité
ini_set('session.gc_maxlifetime', 900);

// démarrage de la session avec des paramètres sécurisés
session_start([
    'cookie_httponly' => true,
    'cookie_secure' => isset($_SERVER['HTTPS']), // true si HTTPS
    'cookie_samesite' => 'Lax',
]);

// définition de la constante APP_ROOT pour le chemin de l'app 
define('APP_ROOT', dirname(__DIR__));
define('APP_ENV', ".env");

// chargement des variables d'environnement à partir du fichier .env
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// chargement de la configuration du routeur
use App\Routing\Router;

$router = new Router();
$router->handleRequest($_SERVER['REQUEST_URI']);
