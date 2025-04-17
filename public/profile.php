#!/usr/local/bin/php
<?php
    session_start();
    if (!isset($_SESSION['valid']) || $_SESSION['valid'] !== true) {
        header("Location: login.php");
        exit();
    }

    $config = parse_ini_file("../../../../database/db3_config.ini");
    $conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user data
    $userId = $_SESSION['user_id'];
    $userStmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $userStmt->bind_param("i", $userId);
    $userStmt->execute();
    $userResult = $userStmt->get_result();
    $user = $userResult->fetch_assoc();
    $userStmt->close();

    $postStmt = $conn->prepare("
        SELECT r.*, p.name as pet_name, p.breed, p.status, pic.image_url
        FROM reports r
        JOIN pets p ON r.pet_id = p.id
        LEFT JOIN (
            SELECT pet_id, MIN(image_url) as image_url
            FROM pet_pictures
            GROUP BY pet_id
        ) pic ON p.id = pic.pet_id
        WHERE r.user_id = ?
        ORDER BY r.update_date DESC
    ");
    $postStmt->bind_param("i", $userId);
    $postStmt->execute();
    $postsResult = $postStmt->get_result();
    $posts = [];
    while ($row = $postsResult->fetch_assoc()) {
        $posts[] = $row;
    }
    $postStmt->close();
    include '../src/views/layout/header.php';
    include '../src/views/profile.php';
?>