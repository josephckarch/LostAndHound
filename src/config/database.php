#!/usr/local/bin/php
<?php

    $config = parse_ini_file("../../../../../database/db3_config.ini");

    // Database configuration
    $host = $config["servername"]; // Database host
    $dbname = $config["dbname"]; // Database name
    $username = $config["username"]; // Database username
    $password = $config["password"]; // Database password

    try {
        // Create a new PDO instance
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Handle connection error
        echo "Connection failed: " . $e->getMessage();
    }
?>