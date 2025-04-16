<?php
session_start();
if (!isset($_SESSION['valid']) || $_SESSION['valid'] !== true) {
    header("Location: login.php");
    exit();
}

// Include database configuration
require_once '../src/config/database.php';

// Get user data
$userId = $_SESSION['user_id'];
$userStmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$userStmt->execute([$userId]);
$user = $userStmt->fetch(PDO::FETCH_ASSOC);

// Get user's posts/reports
$postStmt = $pdo->prepare("
    SELECT r.*, p.name as pet_name, p.breed, p.status 
    FROM reports r 
    JOIN pets p ON r.pet_id = p.id 
    WHERE r.user_id = ? 
    ORDER BY r.update_date DESC
");
$postStmt->execute([$userId]);
$posts = $postStmt->fetchAll(PDO::FETCH_ASSOC);

// Include the profile view
include '../src/views/profile.php';
?>