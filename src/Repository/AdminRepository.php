<?php

namespace App\Repository;

use App\Entity\Admin;

class AdminRepository extends Repository
{
    public function findByUsername(string $username): ?Admin
    {
        $query = $this->pdo->prepare("SELECT * FROM admin WHERE username = :username");
        $query->execute(['username' => $username]);
        $row = $query->fetch(\PDO::FETCH_ASSOC);

        if (!$row) return null;

        $admin = new Admin();
        $admin->setId((int) $row['id']);
        $admin->setUsername($row['username']);
        $admin->setPassword($row['password']);

        return $admin;
    }
}
