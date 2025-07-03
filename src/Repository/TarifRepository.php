<?php

namespace App\Repository;

class TarifRepository extends Repository
{
    public function getAllTarifs(): array
    {
        $query = $this->pdo->prepare("SELECT * FROM tarifs ORDER BY created_at DESC");
        $query->execute();

        $tarifs = $query->fetchAll($this->pdo::FETCH_ASSOC);
        return $tarifs;
    }
}
