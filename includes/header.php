<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culler Bank</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="headeri">
            <div class="logo"> 
                <a href="index.php">
                    <p>Culler Bank</p>
                </a>
            </div>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php if(isset($_SESSION['user_id'])): ?>
                <?php if($_SESSION['role'] == 'admin'): ?>
                    <li><a href="dashboard.php" style="color:red;">Dashboard</a></li>
                <?php endif; ?>
                <li><a href="logout.php">Logout (<?php echo $_SESSION['username']; ?>)</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </header>