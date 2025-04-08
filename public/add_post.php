#!/usr/local/bin/php
<?php

    session_start();
    if (!isset($_SESSION["username"]) || !($_SESSION['valid'] !== true)) {
        header("Location: login.php");
        exit();    
    }
    
    $config = parse_ini_file("../../../../database/db3_config.ini");

    $conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // 1.1: get user info from session
    $username = $_SESSION['username'];
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $user_id = $user['id'];

    // 1.2: get info from post making form
    $pet_type = $_POST['petType'];
    $pet_breed = $_POST['breed'];
    $pet_name = $_POST['petName'];
    $pet_gender = $_POST['gender'];
    $pet_age = ''; //TODO: ADD FORM FOR PET AGE
    $pet_location = $_POST['location'];
    $last_seen = $_POST['lastSeen'];
    $contactInfo = $_POST['contactInfo'];
    $status ='lost'; //TODO: MAKE STATUSES DIFFERENT
    $pet_description = ''; //TODO: MAKE PET DESCRIPTION MATTER
    $postText = $_POST['postText'];

    // 2.1: Make pet entry
    $stmt = $conn->prepare('INSERT INTO pets (name, breed, age, description, status) VALUES (?, ?, ?, ?, ?)');
    $stmt->bind_param('sssss', $pet_name, $pet_breed, $pet_age, $pet_description, $status);
    $stmt->execute();
    $pet_id = $stmt->insert_id;

    // 2.2: create report
    $stmt = $conn->prepare("INSERT INTO reports (description, pet_id, user_id, location) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siis", $postText, $pet_id, $user_id, $pet_location);
    $stmt->execute();
    $report_id = $stmt->insert_id;
    
    // 2.3: upload pet pictures
    $upload_dir = "./images/";
    if(!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    if(isset($_FILES['images'])) {
        foreach($_FILES['images']['tmp_name'] as $index => $tmp_name) {
            if($_FILES['images']['error'][$index] === 0) {
                $filename = basename($_FILES['images']['name'][$index]);
                $target_path = $upload_dir . uniqid() . '_' . $filename;

                if(move_uploaded_file($tmp_name, $target_path)) {
                    //put images into pictures table
                    $stmt = $conn->prepare('INSERT INTO pictures (report_id, image_url) VALUES (?, ?)');
                    $stmt->bind_param('is', $report_id, $target_path);
                    $stmt->execute();
                }
    
                $stmt = $conn->prepare("INSERT INTO pet_pictures (pet_id, image_url) VALUES (?, ?)");
                $stmt->bind_param("is", $pet_id, $target_path);
                $stmt->execute();
            }
        }
    }


    header("Location: lost-pets-page.php");
?>