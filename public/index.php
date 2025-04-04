#!/usr/local/bin/php
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
            <div class="container">
                <form action="add.php">
                    username: <input type='text' name='username'>
                    email: <input type='text' name='email'>
                    password: <input type='text' name='password'>
                    phone number: <input type='text' name='phone_number'>
                    <input type="submit" value="add">
                </form>
            </div>
            <?php
                $config = parse_ini_file("../../../database/db3_config.ini");
                $conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                echo "<table border ='1'>";
                while($row = $result->fetch_assoc() ) {
                    $id = $row["id"];
                    $username = $row["username"];
                    $email = $row["email"];
                    $password = $row["password"];
                    $phone_number = $row["phone_number"];
                    $created_at = $row["created_at"];

                    echo "<tr>";
                    echo "<td>{$id}</td>";
                    echo "<td>{$username}</td>";
                    echo "<td>{$email}</td>";
                    echo "<td>{$password}</td>";
                    echo "<td>{$phone_number}</td>";
                    echo "<td>{$created_at}</td>";
                    echo "</tr>";
                }
                echo "</table>";
                $conn->close();
            ?>
        </div>
    </body>
</html>
