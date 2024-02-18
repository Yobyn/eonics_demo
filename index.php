<?php
// Start the session
session_start();

// Check if the username is not set in the session
if (!isset($_SESSION['username'])) {
    // Redirect to login.php
    header('Location: login.php');
    exit;
}

echo 'Welcome, '.$_SESSION['username'] . ' you are logged in!';

// Check if the logout button is clicked
if (isset($_POST['logout'])) {
    // Clear the username session
    unset($_SESSION['username']);
    // Redirect to login.php
    header('Location: login.php');
    exit;
}
?>
<form method="post">
    <input type="submit" name="logout" value="Logout">
</form>



?>
