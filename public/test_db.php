#!/usr/local/bin/php
<?php
$config = parse_ini_file("../../../database/db3_config.ini");
$conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"], 3306);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";

echo "<table border ='1'>";
                while($row = $result->fetch_assoc() ) {
                    $id = $row["id"];
                    $username = $row["username"];
                    $email = $row["email"];
                    $password = $row["password"];
                    $phone_number = $row["phone_number"];
                    $created_at = $row["created_at"];

                    echo "<tr>";
                    echo "<td>{$id}</td>";
                    echo "<td>{$username}</td>";
                    echo "<td>{$email}</td>";
                    echo "<td>{$password}</td>";
                    echo "<td>{$phone_number}</td>";
                    echo "<td>{$created_at}</td>";
                    echo "</tr>";
                }
                echo "</table>";
?>
