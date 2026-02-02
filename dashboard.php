<?php 
session_start();
include_once 'classes/Database.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$database = new Database();
$db = $database->getConnection();

if(isset($_POST['add_service'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $user_id = $_SESSION['user_id'];
    
    $query = "INSERT INTO services (title, description, created_by) VALUES (:title, :desc, :uid)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':desc', $desc);
    $stmt->bindParam(':uid', $user_id);
    $stmt->execute();
}

$msgQuery = "SELECT * FROM messages ORDER BY created_at DESC";
$msgs = $db->query($msgQuery);
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
    <?php include 'includes/header.php'; ?>

    <main class="content-padding">
        <h1 style="color:darkblue;">Admin Dashboard</h1>
        <p>Welcome, Admin <strong><?php echo $_SESSION['username']; ?></strong>.</p>
        <hr>
        
        <div style="margin-top: 20px;">
            <div style="margin-bottom: 20px; text-align: center;">
                <h3 style="font-size: 1.1rem; margin-bottom: 10px;">Add New Service/Product</h3>
                <form method="POST" class="form-box" style="width: 100%; max-width: 500px; margin: 0 auto;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                        <input type="text" name="title" placeholder="Service Title" required style="padding: 8px; font-size: 0.9rem;">
                        <button type="submit" name="add_service" class="butoni_bg" style="padding: 8px 15px; font-size: 0.9rem;">Add Service</button>
                    </div>
                    <textarea name="description" placeholder="Description" rows="3" style="width:100%; margin-top: 10px; padding: 8px; font-size: 0.9rem;" required></textarea>
                </form>
            </div>

            <div>
                <h3>Incoming User Messages</h3>
                <table border="1" cellpadding="10" style="width:100%; border-collapse: collapse; background:white;">
                    <tr style="background:aliceblue;">
                        <th>Name</th>
                        <th>Message</th>
                    </tr>
                    <?php while($m = $msgs->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($m['name']); ?></td>
                        <td><?php echo htmlspecialchars($m['message']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>