<!-- CREATED BY COPILOT. WILL DELETE LATER -->

<?php
// pet-details.php

require_once '../config/database.php';
require_once '../models/Pet.php';

$database = new Database();
$db = $database->getConnection();

$pet = new Pet($db);

if (isset($_GET['id'])) {
    $pet->id = $_GET['id'];
    $pet->readOne();
} else {
    // Redirect to home if no ID is provided
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pet->name); ?> - LostAndHound</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body>
    <?php include 'layout/header.php'; ?>

    <div class="container">
        <h1><?php echo htmlspecialchars($pet->name); ?></h1>
        <img src="../../public/uploads/<?php echo htmlspecialchars($pet->image); ?>" alt="<?php echo htmlspecialchars($pet->name); ?>" class="pet-image">
        <p><strong>Description:</strong> <?php echo htmlspecialchars($pet->description); ?></p>
        <p><strong>Last Seen:</strong> <?php echo htmlspecialchars($pet->last_seen); ?></p>
        <p><strong>Contact:</strong> <?php echo htmlspecialchars($pet->contact_info); ?></p>
    </div>

    <script src="../../public/js/scripts.js"></script>
</body>
</html>