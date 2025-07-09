<?php

namespace App\Repository;

use App\Entity\Tarif;

class TarifRepository extends Repository
{
    public function getAllTarifs(): array
    {
        $query = $this->pdo->prepare("
        SELECT t.*, c.name AS category_name
        FROM tarifs t
        JOIN category c ON t.category_id = c.id
        ORDER BY t.created_at DESC
        ");
        $query->execute();

        $rows = $query->fetchAll($this->pdo::FETCH_ASSOC);
        $tarifs = [];
        // Méthode d'hydratation des données
        // On crée un tableau de Tarif à partir des données récupérées
        foreach ($rows as $row) {
            $tarif = new Tarif();
            $tarif->setId($row['id']);
            $tarif->setCategoryId($row['category_id']);
            $tarif->setCategoryName($row['category_name']);
            $tarif->setTitle($row['title']);
            $tarif->setPrice((float)$row['price']);
            $tarif->setCreatedAt(new \DateTime($row['created_at']));

            $tarifs[] = $tarif;
        }

        return $tarifs;
    }

    public function create(string $title, float $price, int $category_id): void
    {
        $stmt = $this->pdo->prepare("
        INSERT INTO tarifs (title, price, category_id, created_at)
        VALUES (:title, :price, :category_id, NOW())
    ");
        $stmt->execute([
            'title' => $title,
            'price' => $price,
            'category_id' => $category_id,
        ]);
    }

    public function updatePrice(int $id, float $newPrice): void
    {
        $stmt = $this->pdo->prepare("UPDATE tarifs SET price = :price WHERE id = :id");
        $stmt->execute([
            'price' => $newPrice,
            'id' => $id
        ]);
    }


    public function deleteById(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM tarifs WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
