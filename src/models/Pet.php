<?php
class Pet {
    private $id;
    private $name;
    private $breed;
    private $age;
    private $description;
    private $image;
    private $status; // lost or found

    public function __construct($id, $name, $breed, $age, $description, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->breed = $breed;
        $this->age = $age;
        $this->description = $description;
        $this->image = $image;
    }

    // Getters and Setters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getBreed() {
        return $this->breed;
    }

    public function getAge() {
        return $this->age;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage() {
        return $this->image;
    }


    public function setName($name) {
        $this->name = $name;
    }

    public function setBreed($breed) {
        $this->breed = $breed;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setImage($image) {
        $this->image = $image;
    }


    // Method to save a pet to the database
    public function create($db) {
        $query = "INSERT INTO pets (name, breed, age, description)
                  VALUES (:name, :breed, :age, :description)";
        
        $stmt = $db->prepare($query);
        return $stmt->execute([
            ':name' => $this->name,
            ':breed' => $this->breed,
            ':age' => $this->age,
            ':description' => $this->description
        ]);
    }

    // Method to update pet information
    public function update() {
        // Database interaction logic to update the pet
    }

    // Method to delete pet
    public function delete() {
        // Database interaction logic to delete the pet
    }

    // Method to find a pet by ID
    public static function findById($id) {
        // Database interaction logic to find a pet by ID
    }

    // Method to get all pets
    public static function getAll() {
        // Database interaction logic to get all pets
    }
}
?>