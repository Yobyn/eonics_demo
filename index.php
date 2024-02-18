<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$hostname = $_ENV['DB_HOST'];
$database = $_ENV['DB_DATABASE'];

$port = "3306";



// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";


?>
