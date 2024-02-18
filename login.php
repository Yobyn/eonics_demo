<?php
// Include the db.php file
include 'db.php';

// Now you can use the $pdo variable from db.php
// For example, to query the users table
$stmt = $pdo->query('SELECT * FROM users');
while ($row = $stmt->fetch())
{
    echo $row['username'].'<br>';
}
?>