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
        try{
        $path = $this->normalizePath($uri);
        if (!isset($this->routes[$path])) {
            // Gérer le cas où la route n'existe pas en lançant une exception
            throw new \Exception("Route non trouvée pour le chemin: $path");
        }
        $route = $this->routes[$path];

        $controllerPath = $route['controller'];
        $action = $route['action'];

        $controller = new $controllerPath();
        $controller->$action();
        } catch (\Exception $e) {
            // Gérer l'erreur en affichant un message d'erreur
            echo $e->getMessage();
        }
    }

    public static function normalizePath(string $uri) : string
    {
        // Normalise le chemin en supprimant les paramètres et en ajoutant un slash final
        $path = parse_url($uri, PHP_URL_PATH);
        $path = rtrim($path, "/") . "/";
        return $path;
    }
}