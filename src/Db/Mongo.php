<?php

namespace App\Db;

use MongoDB\Client;

class Mongo
{
    private string $uri;
    private ?Client $client = null;
    private static ?self $_instance = null;

    private function __construct()
    {
        $this->uri = $_ENV['MONGODB_URI'] ?? '';
    }

    public static function getInstance(): self
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Mongo();
        }
        return self::$_instance;
    }

    public function getClient(): Client
    {
        if (is_null($this->client)) {
            $this->client = new Client($this->uri);
        }
        return $this->client;
    }
}
