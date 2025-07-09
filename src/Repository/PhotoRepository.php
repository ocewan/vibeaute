<?php

namespace App\Repository;

use App\Entity\Photo;

class PhotoRepository extends Repository
{
    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM photos ORDER BY uploaded_at DESC");
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $photos = [];
        foreach ($rows as $row) {
            $p = new Photo();
            $p->setId((int)$row['id']);
            $p->setAlt($row['alt']);
            $p->setUrl($row['url']);
            $p->setUploadedAt(new \DateTime($row['uploaded_at']));
            $photos[] = $p;
        }

        return $photos;
    }

    public function count(): int
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM photos");
        return (int)$stmt->fetchColumn();
    }


    public function save(string $alt, string $url): void
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO photos (alt, url, uploaded_at)
            VALUES (:alt, :url, NOW())
        ");
        $stmt->execute([
            'alt' => $alt,
            'url' => $url
        ]);
    }

    public function deleteById(int $id): void
    {
        // Récupérer l'URL du fichier
        $stmt = $this->pdo->prepare("SELECT url FROM photos WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $url = $stmt->fetchColumn();

        // Supprimer le fichier physique s'il existe
        if ($url) {
            $filePath = APP_ROOT . '/public' . $url;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Supprimer l'entrée de la BDD
        $stmt = $this->pdo->prepare("DELETE FROM photos WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
