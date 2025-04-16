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

// // Get user's posts/reports
$postStmt = $pdo->prepare("
    SELECT r.*, p.name as pet_name, p.breed, p.status 
    FROM reports r 
    JOIN pets p ON r.pet_id = p.id 
    WHERE r.user_id = ? 
    ORDER BY r.update_date DESC
");
$postStmt->execute([$userId]);
$posts = $postStmt->fetchAll(PDO::FETCH_ASSOC);

// hardcode info 
// $user = [
//     'username' => 'DemoUser',
//     'email' => 'demo@example.com',
//     'phone_number' => '123-456-7890',
//     'created_at' => '2023-08-15'
// ];

// $posts = [
//     [
//         'id' => 1,
//         'pet_name' => 'Buddy',
//         'status' => 'lost',
//         'update_date' => '2024-04-01',
//         'description' => 'Small brown dog with a red collar',
//         'location' => 'Gainesville, FL'
//     ],
//     [
//         'id' => 2,
//         'pet_name' => 'Whiskers',
//         'status' => 'found',
//         'update_date' => '2024-03-28',
//         'description' => 'Grey cat with green eyes',
//         'location' => 'UF Campus'
//     ]
// ];

// Include the profile view
include '../src/views/profile.php';
?>