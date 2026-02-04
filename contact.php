<?php 
session_start();
include_once 'classes/Database.php';

$msg = "";
if($_POST) {
    $database = new Database();
    $db = $database->getConnection();
    
    $query = "INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)";
    $stmt = $db->prepare($query);
    
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':message', $_POST['message']);
    
    if($stmt->execute()) {
        $msg = "Message sent successfully!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Culler Bank</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="form-container">
        <h2 style="color:darkblue; text-align:center;">Contact Us</h2>
        <form method="POST" class="form-box">
            <?php if($msg) echo "<p style='color:green'>$msg</p>"; ?>
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" rows="5" style="padding:10px; width:100%;" required></textarea>
            <button type="submit" class="butoni_bg">Send Message</button>
        </form>
    </main>
    
   <?php include 'includes/footer.php'; ?>
</body>
</html>