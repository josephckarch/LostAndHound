<?php
    //uncomment these
    // $config = parse_ini_file("../../../../database/db3_config.ini");
    // $conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
    $servername = "localhost";
    $username = "test_user";
    $password = "test_password";
    $dbname = "lost_and_hound";

    // Establish database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $fname . $lname;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, phone_number) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $phone_number);
    $stmt->execute();
    $conn->close();

    header("Location: index.php")
?>