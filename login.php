<?php
session_start();
include_once 'classes/Database.php';
include_once 'classes/User.php';

$error = "";

if ($_POST) {
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);

    $user->username = $_POST['username'];
    $user->password = $_POST['password'];

    if($user->login()){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['role'] = $user->role;
        header("Location: index.php");
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Culler Bank</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="form-container">
        <h2 style="color:darkblue; text-align:center;">Login</h2>
        <form method="POST" action="login.php" class="form-box">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <?php if($error) echo "<p class='error-msg'>$error</p>"; ?>
            <button type="submit" class="butoni_bg">Login</button>
        </form>
    </main>

   <?php include 'includes/footer.php'; ?>
</body>
</html>