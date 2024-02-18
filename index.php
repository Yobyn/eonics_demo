<?php
$servername = "154.0.166.203";
$username = "yobynrur_demo";
$password = "6,9g[eM89hb{";
$database = "yobynrur_demo";
$port = "3306";


// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";


?>
