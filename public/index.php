<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost & Hound - Main Page</title>
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    <?php
    /*
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
        */
    ?>
    <body>
        <header>
            <h1>Lost & Hound</h1>
        </header>
    
        <nav>
            <a href="login.php">Login</a>
            <a href="create_account.php">Create Account</a>
        </nav>
    
        <div class="container">
            <div class="hero">
                <h2>Connecting Pets and Owners Across Gainesville</h2>
                <p>Helping to reunite lost pets with their loving families.</p>
            </div>
    
            <div class="actions">
                <a href="report_lost.php">I can't find my pet</a><br>
                <a href="report_found.php">I found someone's pet!</a><br>
                 <a href="browse_posts.php">Browse Posts</a>
            </div>
        </div>
    </body>
</html>
