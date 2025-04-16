#!/usr/local/bin/php
<?php
    $config = parse_ini_file("../../../../database/db3_config.ini");
    $conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
    echo "Connection successful.";
    $conn->close();
?>
