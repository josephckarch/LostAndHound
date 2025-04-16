#!/usr/local/bin/php
<?php
    session_start();
    $config = parse_ini_file("../../../../database/db3_config.ini");
    $conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $searchQuery = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';

    // sql query for every pet info piece
    $sql = "
        SELECT 
            pets.id AS pet_id,
            pets.name,
            pets.breed,
            pets.age,
            pets.description,
            pets.status,
            reports.location,
            reports.description AS report_description,
            reports.update_date,
            pet_pictures.image_url
        FROM reports
        INNER JOIN pets ON reports.pet_id = pets.id
        LEFT JOIN (
            SELECT pet_id, MIN(id) as min_pic_id
            FROM pet_pictures
            GROUP BY pet_id
        ) pic_select ON pets.id = pic_select.pet_id
        LEFT JOIN pet_pictures ON pet_pictures.id = pic_select.min_pic_id
        ORDER BY reports.update_date DESC
    ";

    $result = $conn->query($sql);

    $filteredPets = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($searchQuery === '' || (
                strpos(strtolower($row['name']), $searchQuery) !== false ||
                strpos(strtolower($row['breed']), $searchQuery) !== false ||
                strpos(strtolower($row['description']), $searchQuery) !== false ||
                strpos(strtolower($row['age']), $searchQuery) !== false ||
                strpos(strtolower($row['location']), $searchQuery) !== false ||
                strpos(strtolower($row['report_description']), $searchQuery) !== false
            )) {
                $filteredPets[] = $row;
            }
        }
    }

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

    <div class="container mt-4">
        <h1 class="mb-4">Lost and Found Pets</h1>

        <form method="GET" action="" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search pets..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <div class="row">
            <?php if (count($filteredPets) > 0): ?>
                <?php foreach ($filteredPets as $pet): ?>
                    <div class="col-md-4">
                        <div class="pet-card card mb-4">
                            <img src="<?php echo htmlspecialchars($pet['image_url'] ?? './images/default.jpg'); ?>" alt="Pet Image" class="card-img-top pet-image">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo htmlspecialchars($pet['name']); ?></h2>
                                <p class="card-text">Breed: <?php echo htmlspecialchars($pet['breed']); ?></p>
                                <p class="card-text">Age: <?php echo htmlspecialchars($pet['age']); ?></p>
                                <p class="card-text">Description: <?php echo htmlspecialchars($pet['description']); ?></p>
                                <p class="card-text">Status: <?php echo htmlspecialchars($pet['status']); ?></p>
                                <p class="card-text">Last Seen At: <?php echo htmlspecialchars($pet['location']); ?></p>
                                <p class="card-text">Notes: <?php echo htmlspecialchars($pet['report_description']); ?></p>
                                <p class="card-text"><small class="text-muted">Last Updated: <?php echo htmlspecialchars($pet['update_date']); ?></small></p>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No pets found matching your search criteria.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>