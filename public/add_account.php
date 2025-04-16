#!/usr/local/bin/php
<?php
    $config = parse_ini_file("../../../../database/db3_config.ini");

    $conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // Sanitize inputs
    $fname = htmlspecialchars(trim($_POST['fname']));
    $lname = htmlspecialchars(trim($_POST['lname']));
    $username = htmlspecialchars(trim($fname . $lname));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // Will be hashed
    $phone_number = htmlspecialchars(trim($_POST['phone_number']));
    
    // Server-side validation
    $errors = array();
    
    if (empty($fname) || empty($lname)) {
        $errors[] = "First and last name are required";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    
    if (empty($password) || strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters";
    }
    
    // Check if email already exists
    $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();
    
    if ($checkStmt->num_rows > 0) {
        $errors[] = "Email is already registered";
    }
    
    // If there are validation errors, redirect back to signup
    if (!empty($errors)) {
        session_start();
        $_SESSION['signup_errors'] = $errors;
        $_SESSION['form_data'] = array(
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phone_number' => $phone_number
        );
        header("Location: create_account.php");
        exit();
    }
    
    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, phone_number) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $hashedPassword, $phone_number);
    
    if ($stmt->execute()) {
        // Set session variables for auto-login
        session_start();
        $_SESSION['valid'] = true;
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['email'] = $email;
        
        $conn->close();
        header("Location: index.php");
        exit();
    } else {
        session_start();
        $_SESSION['signup_errors'] = array("Database error: " . $conn->error);
        $conn->close();
        header("Location: create_account.php");
        exit();
    }
?>