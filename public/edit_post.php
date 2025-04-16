<?php

$config = parse_ini_file("../../../../database/db3_config.ini");

$conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
 

// needs to be tested 
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
    $postId = intval($_GET['id']);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $posts = [];
        $posts['pet_name'] = $_POST['pet_name'];
        $posts['status'] =$_POST['status'];
        $posts['update_date'] =$_POST['update_date'];
        $posts['description'] =$_POST['description'];
        $posts['location'] =$_POST['location'];
    }

 $stmt = $conn->prepare("UPDATE posts SET pet_name =?, status =? ,update_date =?, description =?, location = ? WHERE id = ?");
 $stmt ->bind_param("sssi", $posts['pet_name'],$posts['status'],$posts['update_date'], $posts['description'],$posts['location']);
 $stmt -> execute();
 $stmt -> close();

 header("Location: profile.php")
?>