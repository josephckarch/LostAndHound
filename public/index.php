<?php
// Start the session
session_start();

// Include the database configuration
require_once '../src/config/database.php';

// Include the PetController
require_once '../src/controllers/PetController.php';

// Create an instance of PetController
$petController = new PetController();

// Route the request to the appropriate method
$requestUri = $_SERVER['REQUEST_URI'];

if ($requestUri === '/') {
    // Show the home page
    $petController->showHomePage();
} elseif (preg_match('/^\/pet\/(\d+)$/', $requestUri, $matches)) {
    // Show pet details
    $petId = $matches[1];
    $petController->showPetDetails($petId);
} else {
    // Handle 404 Not Found
    http_response_code(404);
    echo "404 Not Found";
}
?>