<?php

namespace App\Controller;

use App\Repository\TarifRepository;
use App\Repository\MessageRepository;
use App\Repository\PhotoRepository;

class Controller
{
    // méthode pour rendre un template avec des paramètres
    protected function render(string $path, array $params = []): void
    {
        // définition de la variable $filePath pour le chemin du fichier de template
        $filePath = APP_ROOT . "/templates/$path.php";

        if (!file_exists($filePath)) {
            echo "Fichier n'existe pas: $filePath";
        } else {
            // transforme chaque clé du tableau en variable
            extract($params);
            require_once $filePath;
        }
    }

    // méthode pour vérifier l'authentification de l'administrateur
    protected function checkAuth(): void
    {
        // expiration de la session après 15 minutes d'inactivité
        if (isset($_SESSION['LAST_ACTIVITY']) && time() - $_SESSION['LAST_ACTIVITY'] > 900) {
            session_unset();
            session_destroy();
            header('Location: /login/');
            exit;
        }
        $_SESSION['LAST_ACTIVITY'] = time();

        // si l'ID de l'administrateur n'est pas défini dans la session, redirige vers la page de connexion
        if (empty($_SESSION['admin_id'])) {
            $this->render("pages/login");
            exit;
        }
    }

    public function addTarif(): void
    {
        $this->checkAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $price = floatval($_POST['price'] ?? 0);
            $category_id = intval($_POST['category_id'] ?? 0);

            if ($title && $price > 0 && $category_id) {
                $repo = new TarifRepository();
                $repo->create($title, $price, $category_id);
            }
        }

        header('Location: /dashboard/');
        exit;
    }

    public function updateTarif(): void
    {
        $this->checkAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = intval($_POST['id'] ?? 0);
            $newPrice = floatval($_POST['new_price'] ?? 0);

            if ($id > 0 && $newPrice > 0) {
                $repo = new TarifRepository();
                $repo->updatePrice($id, $newPrice);
            }
        }

        header('Location: /dashboard/');
        exit;
    }


    public function deleteTarif(): void
    {
        $this->checkAuth();

        $id = intval($_POST['id'] ?? 0);
        if ($id > 0) {
            $repo = new TarifRepository();
            $repo->deleteById($id);
        }

        header('Location: /dashboard/');
        exit;
    }

    public function submitContactForm(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $message = trim($_POST['message'] ?? '');

            if ($name && $email && $message) {
                $repo = new MessageRepository();
                $repo->save($name, $email, $phone, $message);
            }

            header('Location: /contact?success=1');
            exit;
        }

        header('Location: /contact?error=1');
        exit;
    }

    public function markMessageAsRead(): void
    {
        $this->checkAuth();
        $id = intval($_POST['id'] ?? 0);
        if ($id > 0) {
            (new MessageRepository())->markAsRead($id);
        }
        header('Location: /dashboard/');
        exit;
    }

    public function deleteMessage(): void
    {
        $this->checkAuth();
        $id = intval($_POST['id'] ?? 0);
        if ($id > 0) {
            (new MessageRepository())->deleteById($id);
        }
        header('Location: /dashboard/');
        exit;
    }

    public function uploadPhoto(): void
    {
        $this->checkAuth();

        $repo = new PhotoRepository();

        // Stoppe si on a déjà 6 photos
        if ($repo->count() >= 6) {
            header('Location: /dashboard/?error=too_many_photos');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
            $alt = trim($_POST['alt'] ?? '');
            $file = $_FILES['photo'];

            if ($file['error'] === UPLOAD_ERR_OK) {
                $fileName = uniqid('img_') . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
                $uploadPath = APP_ROOT . '/public/uploads/' . $fileName;

                if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                    $url = '/uploads/' . $fileName;
                    $repo->save($alt, $url);
                }
            }
        }

        header('Location: /dashboard/');
        exit;
    }

    public function deletePhoto(): void
    {
        $this->checkAuth();
        $id = intval($_POST['id'] ?? 0);

        if ($id > 0) {
            (new PhotoRepository())->deleteById($id);
        }

        header('Location: /dashboard/');
        exit;
    }
}
