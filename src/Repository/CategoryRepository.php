<?php

namespace App\Repository;

use App\Entity\Category;

class CategoryRepository extends Repository
{
    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM category ORDER BY name ASC");
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $categories = [];

        foreach ($rows as $row) {
            $cat = new Category();
            $cat->setId((int) $row['id']);
            $cat->setName($row['name']);
            $categories[] = $cat;
        }

        return $categories;
    }
}
