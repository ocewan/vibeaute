<?php

namespace App\Routing;

class Router 
{
    private $routes;
    /*Constructeur de la classe Router.
    Charge les routes depuis le fichier de configuration */
    public function __construct()
    {
        $this->routes = require_once APP_ROOT . '/config/routes.php';
    }

    public function handleRequest (string $uri)
    {
        $path = $this->normalizePath($uri);
    }

    public static function normalizePath(string $path) : string
    {
        // Normalise le chemin en supprimant les paramètres et en ajoutant un slash final
        $path = parse_url($uri, PHP_URL_PATH);
        $path = rtrim($path, "/") . "/";
        return $path;
    }
}