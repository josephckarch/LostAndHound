#!/usr/local/bin/php
<?php

    $config = parse_ini_file("../../../../database/db3_config.ini");

    $conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
    

    // needs to be tested 
    // * Update ->
    //   * Update fields that are actually filled out

    // need to update the both the report and the pet table 

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $postId = intval($_GET['id']);


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $petName = $_POST['name'];
        $petBreed = $_POST['breed'];
        $petAge = $_POST['age'];
        $petDesc = $_POST['description'];
        $petStatus = $_POST['status'];
        $reportDesc = $_POST['description'];  
        $reportLocation = $_POST['location'];


        // Get pet id from report
        $stmt = $conn->prepare("SELECT pet_id FROM reports WHERE id = ?");
        $stmt->bind_param("i", $postId);
        $stmt->execute();
        $stmt->bind_result($petId);
        $stmt->fetch();
        $stmt->close();

        // Update posts
        $stmt = $conn->prepare("UPDATE reports SET description = ?, location = ? WHERE id = ?");
        $stmt->bind_param("ssi", $reportDesc, $reportLocation, $postId);
        $stmt->execute();
        $stmt->close();

        // Update pets
        $stmt = $conn->prepare("UPDATE pets SET name = ?, breed = ?, age = ?, description = ?, status = ? WHERE id = ?");
        $stmt->bind_param("sssssi", $petName, $petBreed, $petAge, $petDesc, $petStatus, $petId);
        $stmt->execute();
        $stmt->close();
    }

    $conn->close();

    header("Location: profile.php");
?>