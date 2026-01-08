<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="welcome">Welcome to Admin Dashboard</h2>
        <div class="dashboard-content">
            <p>Hello, <?php echo $_SESSION['username']; ?>!</p>
            <p>This is the admin page. You have full administrative access.</p>
            <a href="logout.php" class="logout-link">Logout</a>
        </div>
    </div>
</body>
</html>