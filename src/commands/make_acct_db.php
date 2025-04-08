#!/usr/local/bin/php
<?php
	//lock page behind session variable
        session_start();
        if(empty($_SESSION['valid'])){
	  header('Location: index.php');
	}

	// Include config file
	$config = parse_ini_file("../../../../../database/db3_config.ini");

	//Database connection
	$conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $cpassword = htmlspecialchars($_POST['cpassword']);

    // TODO: Check that passwords match


	// Prepare and bind the statement
	$stmt = $conn->prepare("INSERT INTO Users (username, email, password, phone_number) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("ssss",$fname, $lname, $email, $password);

	// Execute query
	$stmt->execute();

	//close access to mysql
	$conn->close();

	header('Location: ../public/index.php');
?>
