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
