<?php 

namespace App\Controller;

class Controller 
{
        protected function render(string $path, array $params = []) : void
    {
        // définition de la variable $filePath pour le chemin du fichier de template
        $filePath = APP_ROOT . "/templates/$path.php";

        if (!file_exists ($filePath)) {
            echo "Fichier n'existe pas: $filePath";
        } else {
            // transforme chaque clé du tableau en variable
            extract ($params);
            require_once $filePath;
        }

    }
}