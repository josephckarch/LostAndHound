<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost & Hound - Main Page</title>
        <link rel="stylesheet" href="./css/styles.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="/js/scripts.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        require_once '../vendor/autoload.php';

        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../src');
        $dotenv->load();

        $PHOTO_API = $_ENV['PHOTO_API_KEY'];
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
        <?php include '../src/views/layout/header.php'; ?>

    <?php
        $requestUri = $_SERVER['REQUEST_URI'];
        require_once '../src/controllers/PetController.php';
        $petController = new PetController();

        if ($requestUri === '/' || $requestUri === '/index.php') {
            // Show the home page for both / and /index.php
            $petController->showHomePage();
        }
        elseif ($requestUri === '/create-post') {
            $petController->showCreatePostPage();
        }
        elseif ($requestUri === '/sign-up') {
            $petController->showCreateAccountPage();
        }
        elseif ($requestUri === '/login') {
            $petController->showLoginPage();
        }
        elseif ($requestUri === '/lost-pets-page') {
            $petController->showLostPetsPage();
        }
        else {
            //show home page by default for unmatched routes
            $petController->showHomePage();
        }
    ?>

    </div>
</body>
</html>

