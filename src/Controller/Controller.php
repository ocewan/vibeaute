<?php 

namespace App\Controller;

class Controller 
{
        protected function render(string $path) : void
    {
        // définition de la variable $filePath pour le chemin du fichier de template
        $filePath = APP_ROOT . "/templates/$path.php";

        if (!file_exists ($filePath)) {
            echo "Fichier n'existe pas: $filePath";
        } else {
            require_once $filePath;
        }

    }
}