#!/usr/local/bin/php
<?php
    // Start the session
    session_start();

    // Database connection configuration
    $config = parse_ini_file("../../../../database/db3_config.ini");

    // Connect to the database
    $conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);

    // Check for connection error
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // Fetch all pets from the database
    $sql = "SELECT * FROM pets ORDER BY created_at DESC";
    $result = $conn->query($sql);

    // Check if search is set
    $searchQuery = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
    $filteredPets = [];
    
    if ($searchQuery !== '') {
        while ($row = $result->fetch_assoc()) {
            if (
                strpos(strtolower($row['name']), $searchQuery) !== false ||
                strpos(strtolower($row['breed']), $searchQuery) !== false ||
                strpos(strtolower($row['description']), $searchQuery) !== false ||
                strpos(strtolower($row['age']), $searchQuery) !== false
            ) {
                $filteredPets[] = $row;
            }
        }
    } else {
        // If no search query, just use all pets
        $filteredPets = [];
        while ($row = $result->fetch_assoc()) {
            $filteredPets[] = $row;
        }
    }
    
    // Close database connection
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Hound - Home</title>
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/scripts.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>


<body>
    <?php include '../src/views/layout/header.php'; ?>
    <h1>Pet Listings</h1>
    <?php
    $lostPets = [
        [
            'id' => 1,
            'name' => 'Buddy',
            'breed' => 'Golden Retriever',
            'age' => 'pretty young',
            'description' => 'Buddy is a friendly golden retriever that responds to his namme. He was last found at Marston.',
            'status' => 'lost',
            'image' => './images/buddy.jpeg'
        ],
        [
            'id' => 2,
            'name' => 'Max',
            'breed' => 'Bulldog',
            'age' => 'old and chill',
            'description' => 'Max was found lying by Gator Corner hanging out with Tenders.',
            'status' => 'found',
            'image' => './images/max.jpeg'
        ],
        [
            'id' => 3,
            'name' => 'Bella',
            'breed' => 'Beagle',
            'age' => 'unknown',
            'description' => 'Bella disappeared from my apartment! She is white and black. Pretty small.',
            'status' => 'lost',
            'image' => './images/bella.jpeg'
        ]
        ];


        $searchQuery = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
        $filteredPets = [];

        if ($searchQuery !== '') {
            foreach ($lostPets as $pet) {
                if (
                    strpos(strtolower($pet['name']), $searchQuery) !== false ||
                    strpos(strtolower($pet['breed']), $searchQuery) !== false ||
                    strpos(strtolower($pet['description']), $searchQuery) !== false ||
                    strpos(strtolower($pet['age']), $searchQuery) !== false

                ) {
                    $filteredPets[] = $pet;
                }
            }
        } else {
            $filteredPets = $lostPets;
        }
     ?>

    <div class="container">
        <div class="header-lost-pets">
            <h1 style="font-family: 'Spartan', sans-serif;">Lost Pets</h1>
        </div>

        <form method="GET" action="" class="mb-4" style="margin-top: 20px;">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name, breed, or description..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>

        <div class="container lost-pets-list">
            <div class="row">
                <?php if (count($filteredPets) > 0): ?>
                        <?php foreach ($filteredPets as $pet): ?>
                            <div class="col-md-4">
                                <div class="pet-card card mb-4">
                                    <img src="<?php echo htmlspecialchars($pet['image']); ?>" alt="Pet Image" class="card-img-top pet-image">
                                    <div class="card-body">
                                        <h2 class="card-title"><?php echo htmlspecialchars($pet['name']); ?></h2>
                                        <p class="card-text">Breed: <?php echo htmlspecialchars($pet['breed']); ?></p>
                                        <p class="card-text">Age: <?php echo htmlspecialchars($pet['age']); ?></p>
                                        <p class="card-text">Description: <?php echo htmlspecialchars($pet['description']); ?></p>
                                        <p class="card-text">Status: <?php echo htmlspecialchars($pet['status']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No pets found matching your search criteria.</p>
                    <?php endif; ?>
            </div>
        </div>
    <script>

    </script>
</body>
</html>