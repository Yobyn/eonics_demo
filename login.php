<?php
// Include the config.php file
require_once 'config.php';

// Create connection
try {
    $conn = new mysqli($servername, $username, $password, $database, $port);
} catch (mysqli_sql_exception $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// Initialize PDO
$pdo = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);

// Now you can use the $pdo variable from db.php
// For example, to query the users table
//$stmt = $pdo->query('SELECT * FROM user');
//while ($row = $stmt->fetch())
//{
  //  echo $row['username'].'<br>';
//}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted username and password

    $username = $_POST['namefield'];
    $password = $_POST['password'];

    echo 'Username: '.$username.'<br>';

    $sql = 'SELECT * FROM user WHERE username = "' . $username . '" AND password = "' . $password . '"';

    echo $sql;

    $stmt = $pdo->prepare('SELECT * FROM user WHERE username = "" OR 1=1; -- " AND password = "password"');
    $stmt->execute();
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
    <label >Username:</label><br>
    <input type="text" name="namefield" required><br>
    <label >Password:</label><br>
    <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
