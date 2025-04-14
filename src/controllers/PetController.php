
<?php

include "../src/models/Pet.php";

class PetController {
    private $db;

    //temporary constructor before database is integrated
    public function __construct() {
        // Initialize the database connection here
        $this->db = null; // Replace with actual database connection
    }

    //uncomment the other one
    /*
    public function __construct($_db) {
        $this->db = $_db;
    }
        */

    //opens up the home page
    public function showHomePage() {
        include '../src/views/home.php';
    }

    public function showCreatePostPage() {
        include '../public/create-post.php';
    }

    public function showLostPetsPage() {
        include '../public/lost-pets-page.php';
    }

    public function showLoginPage() {
        include '../public/login.php';
    }

    public function showCreateAccountPage() {
        include '../public/create_account.php';
    }

    public function addPet($id, $name, $breed, $age, $description, $image) {
        // Logic to add a new pet to the database
        // Example: Prepare and execute an SQL statement to insert pet data

        // ID will be auto generated somehow
        // not implementing image stuff yet for simplicity
        $newPet = new Pet(null, $name, $breed, $age, $description, null);
        $success = $newPet->create($this->db);
        
        // if pet creation did not work. echo failure
        if (!$success)
            echo "Failed to create pet.";
    }

    public function updatePet($petId, $petData) {
        // Logic to update an existing pet's information in the database
        // Example: Prepare and execute an SQL statement to update pet data
    }

    public function getPet($petId) {
        // Logic to retrieve a pet's information from the database
        // Example: Prepare and execute an SQL statement to select pet data
    }

    public function getAllPets() {
        // Logic to retrieve all pets from the database
        // Example: Prepare and execute an SQL statement to select all pet data
    }
}
