<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\Photo;
use App\Repository\TarifRepository;
use App\Repository\AdminRepository;
use App\Repository\CategoryRepository;
use App\Repository\MessageRepository;
use App\Repository\PhotoRepository;

class PageController extends Controller
{

    // action pour afficher la page d'accueil
    public function home(): void
    {
        $photos = (new PhotoRepository())->getAll();

        $this->render("pages/home", [
            'photos' => $photos
        ]);
    }

    // action pour afficher la page des prestations
    public function prestations(): void
    {
        $this->render("pages/prestations");
    }

    // action pour afficher la page des tarifs
    public function tarifs(): void
    {
        $tarifRepository = new TarifRepository();
        $tarifs = $tarifRepository->getAllTarifs();

        $groupedTarifs = [];
        foreach ($tarifs as $tarif) {
            $groupedTarifs[$tarif->getCategoryName()][] = $tarif;
        }

        $this->render("pages/tarifs", ["groupedTarifs" => $groupedTarifs]);
    }

    // action pour afficher la page de contact
    public function contact()
    {
        $this->render("pages/contact");
    }

    // action pour afficher la page de connexion
    public function login(): void
    {
        // Vérification de l'authentification
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $repo = new AdminRepository();
            $admin = $repo->findByUsername($username);

            if ($admin && password_verify($password, $admin->getPassword())) {
                $_SESSION['admin_id'] = $admin->getId();
                header('Location: /dashboard/');
                exit;
            }

            $error = "Identifiants incorrects.";
        }

        $this->render("pages/login", ['error' => $error ?? null]);
    }

    // action pour déconnecter l'administrateur
    public function logout(): void
    {
        session_destroy();
        header('Location: /login/');
        exit;
    }

    // action pour afficher le tableau de bord de l'administrateur
    public function dashboard(): void
    {
        $this->checkAuth();

        // récupère tous les tarifs
        $tarifRepo = new TarifRepository();
        $tarifs = $tarifRepo->getAllTarifs();

        // récupère toutes les catégories
        $catRepo = new CategoryRepository();
        $categories = $catRepo->getAll();

        //récupère tous les messages
        $messages = new MessageRepository();
        $messages = $messages->getAll();

        // récupère les photos
        $photos = new PhotoRepository();
        $photos = $photos->getAll();

        $this->render("pages/dashboard", [
            'tarifs' => $tarifs,
            'categories' => $categories,
            'messages' => $messages,
            'photos' => $photos
        ]);
    }
}
