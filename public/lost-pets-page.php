#!/usr/local/bin/php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Hound - Home</title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/scripts.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>


<body>
    <?php include '../src/views/layout/header.php'; ?>
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
     ?>

    <div class="container">
        <div class="header-lost-pets">
            <h1 style="font-family: 'Spartan', sans-serif;">Lost Pets</h1>
        </div>

        <div class="container lost-pets-list">
            <div class="row">
                <?php foreach ($lostPets as $pet): ?>
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
            </div>
        </div>
    <script>

    </script>
</body>
</html>