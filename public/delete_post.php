#!/usr/local/bin/php
<?php

    session_start();

    $config = parse_ini_file("../../../../database/db3_config.ini");

    $conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
   
    // * Deletion ->
    //     * Check if the image is used anymore
    //         * If not, delete it
    //             * Delete entry from pictures, then from pet_pictures
    //     * Check if the pet is used anymore
    //         * If not, delete it
    //     * Delete the report

    //get pet id 
    $postId = intval($_GET['id']);

    $stmt =$conn->prepare("SELECT pet_id FROM reports WHERE id =?");
    $stmt->bind_param("i",$postId);
    $stmt->execute();
    $stmt->bind_result($petId);
    $stmt->fetch();
    $stmt->close();

    // delete post associated with the pet 
    $stmt = $conn->prepare("DELETE FROM posts WHERE id=?");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $stmt->close();

    //delete pet_picture for the pet 
    $stmt = $conn->prepare("DELETE FROM pet_pictures WHERE pet_id =?");
    $stmt ->bind_param("i",$petId);
    $stmt->execute();
    $conn->close();

    // now delete the pet 
    $stmt = $conn->prepare("DELETE FROM pets WHERE id =?");
    $stmt->bind_param("i",$petId);
    $stmt->execute();
    $stmt->close();

    $conn->close();

    header("Location: profile.php");
?>
