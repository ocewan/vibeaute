<?php

namespace App\Controller;

class ErrorController extends Controller
{

    // méthode pour afficher une erreur
    public function show(string $errorMessage): void
    {
        // On utilise la méthode render de la classe Controller pour afficher le template d'erreur
        $this->render("errors/default", [
            "errorMessage" => $errorMessage
        ]);
    }
}
