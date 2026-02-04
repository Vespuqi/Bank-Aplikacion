<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");
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
    <header id="main-header">
        <div class="headeri">
            <div class="logo"> 
                <a href="index.php">
                    <p>Culler Bank</p>
                </a>
            </div>
        </div>
        <div class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="nav-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php if(isset($_SESSION['user_id'])): ?>
                <?php if($_SESSION['role'] == 'admin'): ?>
                    <li><a href="dashboard.php" class="dashboard-link">Dashboard</a></li>
                <?php endif; ?>
                <li><a href="logout.php">Logout (<?php echo $_SESSION['username']; ?>)</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </header>
    <script>
    function toggleMenu() {
        var header = document.getElementById('main-header');
        if (header) {
            header.classList.toggle('active');
        }
    }
    
    window.addEventListener('storage', function(e) {
        if (e.key === 'logout') {
            window.location.reload(true);
        }
    });
    </script>