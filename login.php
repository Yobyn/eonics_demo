<?php
// Include the db.php file
include 'db.php';

// Create a file-based SQLite database
$pdo = new PDO('sqlite:db/database.db');

// Now you can use the $pdo variable from db.php
// For example, to query the users table
$stmt = $pdo->query('SELECT * FROM users');
while ($row = $stmt->fetch())
{
    echo $row['username'].'<br>';
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted username and password

    $username = $_POST['username'];
    $password = $_POST['password'];

    echo 'Username: '.$username.'<br>';

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user) {
        echo 'User logged in with username: ' . $user;
    } else {
        // The username does not exist, so add the user
        echo 'Unable to login in';
    }

    // TODO: Validate the username and password

    // TODO: Perform authentication logic

    // TODO: Redirect to the appropriate page
}

// Close the database connection
$pdo = null;

?>

<form action="login.php" method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
