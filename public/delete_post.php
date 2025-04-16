<?php

    session_start();

    $config = parse_ini_file("../../../../database/db3_config.ini");

    $conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
    // needs to be tested 
    $stmt = $conn->prepare("DELETE FROM posts WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $conn->close();

    header("Location: profile.php");
?>
