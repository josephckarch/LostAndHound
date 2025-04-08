#!/usr/local/bin/php
<?php
    $config = parse_ini_file("../../../../database/db3_config.ini");

    $conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    //report table
    $report_description = "";
    $pet_id = "";
    $user_id = "";
    $location = "";

    //pet table
    $name = "";
    $breed = "";
    $age = "";
    $pet_description = "";
    $status = "";


    $stmt = $conn->prepare("INSERT INTO users (username, email, password, phone_number) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $phone_number);
    $stmt->execute();
    $conn->close();

    header("Location: index.php")
?>