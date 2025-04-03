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
    public function createReport($user_id, $pet_id, $description, $location) {
        $sql = "INSERT INTO reports (user_id, pet_id, description, location) 
        VALUES ('$user_id', '$pet_id', '$description', '$location')";

        return $this->db->exec($sql);
    }

    public function getReportById($id) {
        $sql = "SELECT * FROM reports WHERE id = '$id'";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
?>