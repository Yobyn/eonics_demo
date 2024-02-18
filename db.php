<?php
// Create a file-based SQLite database
$pdo = new PDO('sqlite:db/database.db');

// Enable error reporting for debugging purposes
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if the 'users' table exists
$query = "SELECT name FROM sqlite_master WHERE type='table' AND name='users'";
$result = $pdo->query($query);

if ($result->fetchColumn() === false) {
    // The 'users' table does not exist, so create it
    $query = "CREATE TABLE users (
        id INTEGER PRIMARY KEY,
        username TEXT NOT NULL,
        password TEXT NOT NULL,
        name TEXT NOT NULL,
        surname TEXT NOT NULL
    )";
    $pdo->exec($query);
}

// Perform database operations here...

// Create a user with details
$username = 'admin';
$password = 'admin';
$name = 'John';
$surname = 'Doe';

// Check if the username already exists
$stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user) {
    // The username already exists
    // echo 'Username already exists.';
} else {
    // The username does not exist, so add the user
    $stmt = $pdo->prepare('INSERT INTO users (username, password, name, surname) VALUES (?, ?, ?, ?)');
    $stmt->execute([$username, $password, $name, $surname]);
    echo 'User added successfully';
}

// Close the database connection
$pdo = null;
?>