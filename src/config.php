<?php

require 'vendor/autoload.php';

// MySQL
$mysqlHost = 'mysql'; // nom du service dans docker-compose
$mysqlDb   = getenv('MYSQL_DATABASE');
$mysqlUser = getenv('MYSQL_USER');
$mysqlPass = getenv('MYSQL_PASSWORD');

try {
    $pdo = new PDO("mysql:host=$mysqlHost;dbname=$mysqlDb;charset=utf8", $mysqlUser, $mysqlPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion MySQL réussie.";
} catch (PDOException $e) {
    echo "Pas de connexion MySQL : " . $e->getMessage();
}

// MongoDB
$mongoHost = 'mongodb'; // nom du service dans docker-compose
$mongoPort = 27017;
$mongoUser = getenv('MONGO_ROOT_USERNAME');
$mongoPass = getenv('MONGO_ROOT_PASSWORD');

// try {
//     $mongoUri = "mongodb://$mongoUser:$mongoPass@$mongoHost:$mongoPort";
//     $mongoClient = new MongoDB\Client($mongoUri);
//     $mongoDb = $mongoClient->selectDatabase('vibeaute');
//     // echo "Connexion MongoDB réussie.";
// } catch (Exception $e) {
//     echo "Pas de connexion MongoDB : " . $e->getMessage();
// }
