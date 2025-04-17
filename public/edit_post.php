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

    $postId = intval($_POST['post_id']);


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $postId = intval($_POST['post_id']);
        //pet
        $petName = $_POST['petName'];
        $petBreed = $_POST['breed'];
        $petAge = $_POST['age'];
        $petDesc = $_POST['petDesc'];
        $petType = $_POST['petType'];

        //report
        $petGender = $_POST['gender'];
        $reportLocation = $_POST['location'];
        $lastSeen = $_POST['lastSeen'];
        $contactInfo = $_POST['contactInfo'];
        $status = $_POST['status'];
        $reportDesc = $_POST['postText'];

        $stmt = $conn->prepare("SELECT pet_id FROM reports WHERE id = ?");
        $stmt->bind_param("i", $postId);
        $stmt->execute();
        $stmt->bind_result($petId);
        $stmt->fetch();
        $stmt->close();

        // Step 2: Update the 'pets' table
        $stmt = $conn->prepare("UPDATE pets SET name = ?, breed = ?, age = ?, description = ?, status = ?, type = ?, gender = ? WHERE id = ?");
        $stmt->bind_param("sssssssi", $petName, $petBreed, $petAge, $petDesc, $status, $petType, $petGender, $petId);
        $stmt->execute();
        $stmt->close();

        // Step 3: Update the 'reports' table
        $stmt = $conn->prepare("UPDATE reports SET description = ?, location = ?, last_seen = ?, contact_info = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $petDesc, $reportLocation, $lastSeen, $contactInfo, $postId);
        $stmt->execute();
        $stmt->close();
    }

    // Redirect to a confirmation page or the profile page
    header("Location: profile.php");
?>