<?php

include "../models/Report.php";

class ReportController {
    private $db;

    public function __construct($_db) {
        $db = $_db;
    }
    
    // this function needs a pet to already be created because it requires the pet_id
    public function createReport() {
        $pet_id = $_POST['pet_id'];
        $user_id = $_POST['user_id'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        // $date = $_POST['date'];
        
        $image_path = null;
        // Handle image upload - implement later?
        // if (isset($_FILES['pet_image'])) {
        //     $target_dir = "uploads/";
        //     $target_file = $target_dir . basename($_FILES["pet_image"]["name"]);
        //     move_uploaded_file($_FILES["pet_image"]["tmp_name"], $target_file);
        //     $image_path = $target_file;
        // }

        // initialize the model from models/Report.php
        $report = new Report($this->db);
        // Call the model's create function
        $report->createReport($description, $pet_id, $user_id, $location);

        // This redirects the user to the homepage after submitting the report, 
        //  so they don’t resubmit if they refresh the page.
        header('Location: /home');
    }

}



?>