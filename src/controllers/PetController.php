<?php

class PetController {
    private $db;

    public function __construct() {
    }

    //opens up the home page
    public function showHomePage() {
        include '../views/home.php';
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

    public function addPet($petData) {
        // Logic to add a new pet to the database
        // Example: Prepare and execute an SQL statement to insert pet data
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