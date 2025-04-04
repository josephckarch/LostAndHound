<?php

/*  Report.php contains the Report model that can be used to
    store a new Report. You must input a Pet when creating a Report.
    
    I'm using the word Report instead of Post because that's what 
    Zach called it in schema.sql
*/

include 'Pet.php';

class Report {
    private $db;

    // Constructor
    public function __construct($db) {
        $this->db = $db;
    }

    // Create new Report
    public function createReport($description, $pet_id, $user_id, $location) {
        $query = "INSERT INTO reports (description, pet_id, user_id, location) 
        VALUES (:description, :pet_id, :user_id, :location)";

        $stmt = $this->db->prepare($query);
        // Execute the query with the parameter inputs
        return $stmt->execute([
            ':description' => $description,
            ':pet_id' => $pet_id,
            ':user_id' => $user_id,
            ':location' => $location
        ]);
    }

}
?>