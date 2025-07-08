<?php

namespace App\Repository;

use App\Db\Mongo;
use MongoDB\BSON\UTCDateTime;

class ReviewRepository
{
    private $collection;

    public function __construct()
    {
        $client = Mongo::getInstance()->getClient();
        $this->collection = $client->vibeaute->reviews;
    }

    public function getAll(): array
    {
        $cursor = $this->collection->find([], ['sort' => ['rating' => -1]]);
        $reviews = [];

        foreach ($cursor as $document) {
            $reviews[] = $document->getArrayCopy();
        }

        return $reviews;
    }

    public function insert(array $review): void
    {
        $this->collection->insertOne($review);
    }
}
