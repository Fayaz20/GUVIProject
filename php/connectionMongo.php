<?php
use MongoDB\Client;
require_once '../vendor/autoload.php';
$mongoUri = "mongodb://localhost:27017";
$databaseName = "users";
$collectionName = "profile";

$mongoClient = new MongoDB\Client($mongoUri);

$database = $mongoClient->$databaseName;
$collection = $database->$collectionName;

if (!$database) {
    die("MongoDB Connection failed: ");
} 

?>
