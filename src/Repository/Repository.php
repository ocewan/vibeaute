<?php

namespace App\Repository;

use App\Db\Mysql;

class Repository
{
    protected \PDO $pdo;

    public function __construct()
    {
        $this->pdo = Mysql::getInstance()->getPDO();
    }

    /**
     * Execute a query and return the result set
     *
     * @param string $query
     * @param array $params
     * @return \PDOStatement
     */
    protected function executeQuery(string $query, array $params = []): \PDOStatement
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
}
