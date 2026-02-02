<?php 
session_start();
include_once 'classes/Database.php';


$database = new Database();
$db = $database->getConnection();


$query = "SELECT * FROM services ORDER BY created_at DESC";
$stmt = $db->prepare($query);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Culler Bank</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <?php include 'includes/header.php'; ?>


    <main>
        <div class="section-title">
            <h3>Our Services</h3>
        </div>


        <div class="fotografit">
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <div class="rubrika">
                    <div class="img-placeholder"></div>
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
    
   <?php include 'includes/footer.php'; ?>
</body>
</html>
