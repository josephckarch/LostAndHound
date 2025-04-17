#!/usr/local/bin/php
<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        function sanitize($value) {
            return htmlspecialchars(trim($value));
        }

        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            echo "You must be logged in to create a post.";
            exit;
        }
        $userId = $_SESSION['user_id'];

        // Collect and sanitize data TODO
        $petType = sanitize($_POST['petType'] ?? '');
        $breed = sanitize($_POST['breed'] ?? '');
        $petName = sanitize($_POST['petName'] ?? '');
        $petDesc = sanitize($_POST['petDesc'] ?? '');
        $age = sanitize($_POST['age'] ?? '');
        $gender = sanitize($_POST['gender'] ?? '');
        $location = sanitize($_POST['location'] ?? '');
        $lastSeen = sanitize($_POST['lastSeen'] ?? '');
        $contactInfo = sanitize($_POST['contactInfo'] ?? '');
        $status = sanitize($_POST['status'] ?? '');
        $postText = sanitize($_POST['postText'] ?? '');


        $config = parse_ini_file("../../../../database/db3_config.ini");
        $conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);

        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        //Check if the pet exists
        $sql = "SELECT id FROM pets WHERE name = ? AND breed = ? AND age = ? AND description = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $petName, $breed, $age, $petDesc);
        $stmt->execute();
        $stmt->store_result();

        $petId = null;
            
        //if so, use its id
        if($stmt->num_rows > 0){
            $stmt->bind_result($petId);
            $stmt->fetch();
        } 
        //if not, make a new pet and use that id
        else {
            $sql = "INSERT INTO pets (name, breed, age, description, status) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $petName, $breed, $age, $petDesc, $status);
            $stmt->execute();
            $petId = $stmt->insert_id; // Get the newly created pet ID
        }

        $stmt->close();

        //create report for the pet
        $sql = "INSERT INTO reports (description, pet_id, user_id, location) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siis", $postText, $petId, $userId, $location);
        $stmt->execute();
        $reportId = $stmt->insert_id; // Get the newly created report ID
        
        $stmt->close();

        //handle picture uploads
        if (isset($_FILES['images']) && count($_FILES['images']['name']) > 0) {
            $allowedTypes = ['image/jpeg'];
        
            foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
                if (!is_uploaded_file($tmpName)) continue;
        
                $fileType = mime_content_type($tmpName);
                if (!in_array($fileType, $allowedTypes)) {
                    echo "Only JPEG images are allowed.";
                    exit;
                }
        
                // Start making file name
                $sanitizedName = preg_replace('/[^a-zA-Z0-9]/', '_', $petName);
                $sanitizedBreed = preg_replace('/[^a-zA-Z0-9]/', '_', $breed);
                $sanitizedAge = preg_replace('/[^a-zA-Z0-9]/', '_', $age);
        
                // Get file extension
                $ext = pathinfo($_FILES['images']['name'][$key], PATHINFO_EXTENSION);
        
                // Make name
                $uniqueName = "{$sanitizedName}_{$sanitizedBreed}_{$sanitizedAge}_" . uniqid() . ".{$ext}";
                $targetPath = './images/' . $uniqueName;
        
                if (!move_uploaded_file($tmpName, $targetPath)) {
                    echo "Failed to upload image.";
                    exit;
                }
        
                // Save to pet_pictures
                $sql = "INSERT INTO pet_pictures (pet_id, image_url) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("is", $petId, $targetPath);
                $stmt->execute();
                $stmt->close();
            }
        }

        $conn->close();
        header("Location: index.php");
        exit;
    } else {
        echo "An unexpected error has occurred. Please try again.";
    }
?>
