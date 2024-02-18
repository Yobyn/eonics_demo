<?php
// Start output buffering
ob_start();
// Start the session
session_start();

// Check if the username is not set in the session
if (!isset($_SESSION['username'])) {
    // Redirect to login.php
    header('Location: login.php');
    exit;
}

// End output buffering and send the output
ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="center">
        <?php echo 'Welcome, '.$_SESSION['username'] . ' you are logged in!'; ?>
        <br><br>

        <form method="post">
            <input type="submit" name="logout" value="Logout">
        </form>
    </div>
</body>
</html>
<?php
// Start output buffering
ob_start();
// Check if the logout button is clicked
if (isset($_POST['logout'])) {
    // Clear the username session
    unset($_SESSION['username']);
    // Redirect to login.php
    header('Location: login.php');
    exit;
}
// End output buffering and send the output
ob_end_flush();
?>