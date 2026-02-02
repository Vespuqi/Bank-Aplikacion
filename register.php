<?php
session_start();
include_once 'classes/Database.php';
include_once 'classes/User.php';


$message = "";


if ($_POST) {
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);


    $user->username = $_POST['username'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];


    if($_POST['password'] !== $_POST['confirm_password']){
        $message = "Passwords do not match!";
    } else {
        if($user->register()){
            $message = "Registration successful! <a href='login.php'>Login here</a>";
        } else {
            $message = "Unable to register. Email might be taken.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Culler Bank</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>


    <main class="form-container">
        <h2 style="color:darkblue; text-align:center;">Create Account</h2>
        <form method="POST" action="register.php" class="form-box">
            <?php if($message) echo "<p class='error-msg' style='color:blue;'>$message</p>"; ?>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit" class="butoni_bg">Register</button>
        </form>
    </main>


    <?php include 'includes/footer.php'; ?>
</body>
</html>
