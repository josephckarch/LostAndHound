<?php
// Database configuration
$host = 'mysql.cise.ufl.edu'; // Database host
$dbname = 'lost_and_hound'; // Database name
$username = 'waugustin'; // Database username
$password = 'l33Jaewook1.'; // Database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection error
    echo "Connection failed: " . $e->getMessage();
}
?>