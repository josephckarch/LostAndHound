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

        $pets['name'] = $_POST['name'];
        $pets['breed'] = $_POST['breed'];
        $pets['age'] = $_POST['age'];
        $pets['description'] = $_POST['description'];
        $pets['status'] =$_POST['status'];
        $reports['description'] =$_POST['description'];
        $reports['location'] =$_POST['location'];


            // need to get the pet id from the report 
        $stmt = $conn->prepare("SELECT pet_id FROM reports WHERE id=?");
        $stmt-> bind_param("i",$postId);
        $stmt ->execute();
        $stmt->bind_result($petId);
        $stmt->fetch();
        $stmt->close();

           // now update the report table 
        $stmt = $conn->prepare("UPDATE reports SET  description =?, location = ? WHERE id = ?");
        $stmt ->bind_param("ssi", $reports['description'],$reports['location'],$postId);
        $stmt -> execute();
        $stmt -> close();
           // update the pet table 
        $stmt = $conn->prepare("UPDATE pets SET name = ?, breed = ?,age =? , desciption =? , status =? WHERE id =?");
        $stmt -> bind_param("sssssi",$pets['name'],$pets['breed'], $pets['age'],$pets['description'], $pets['status'], $petId);
        $stmt -> execute();
        $stmt -> close();
    }
   $conn->close();

 header("Location: profile.php");
?>