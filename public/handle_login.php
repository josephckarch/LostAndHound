<?php
    //replaced db setup and commented out /vendor/autoload for local dev
    session_start();
    //uncomment these
    // $config = parse_ini_file("../../../../database/db3_config.ini"); 
    // $conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);

    //testuser, testuser@gmail.com, testpassword

    $servername = "localhost";
    $username = "test_user";
    $password = "test_password";
    $dbname = "lost_and_hound";

    // Establish database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if the email exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $stored_email, $stored_password);
        $stmt->fetch();

        //if password is correct
        //TODO: USE HASHING
        if($password == $stored_password){
            //start the session
            $_SESSION['valid'] = true;
            $_SESSION['email'] = $stored_email;
            $_SESSION['user_id'] = $id;
            header("Location: index.php");
            exit();
        }
        else {
            echo "<p>Invalid email or password.</p>";
        }
    }
    else {
        echo "<p>Invalid email or password.</p>";
    }
    $conn->close();
?>