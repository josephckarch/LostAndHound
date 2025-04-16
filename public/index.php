#!/usr/local/bin/php
<?php

    function getPhotoApiKey($path) {
        if (!file_exists($path)) {
            error_log("File does not exist: " . $path);
            return null;
        }
    
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            error_log("Reading line: " . $line);
            if (strpos($line, 'PHOTO_API_KEY=') === 0) {
                return trim(substr($line, strlen('PHOTO_API_KEY=')));
            }
        }
        error_log('PHOTO_API_KEY not found in file');
        return null;
    }

    $apiKey = getPhotoApiKey('/cise/homes/millerz/database/.env');
    if ($apiKey === null) {
        error_log('API key not found or invalid.');
    }

    function fetchImage($apiUrl, $apiKey) {
        $context = stream_context_create([
            "http" => [
                "method" => "GET",
                "header" => "x-api-key: $apiKey\r\n" .
                            "Content-Type: application/json\r\n"
            ]
        ]);

        $response = file_get_contents($apiUrl, false, $context);

        if ($response === false) {
            error_log('API call failed for: ' . $apiUrl);
            return '';
        }

        $data = json_decode($response, true);
        if (isset($data[0]['url'])) {
            return $data[0]['url'];
        } else {
            error_log('Unexpected API response: ' . $response);
            return '';
        }
    }

    $catImage = fetchImage('https://api.thecatapi.com/v1/images/search', $apiKey);
    $dogImage = fetchImage('https://api.thedogapi.com/v1/images/search', $apiKey);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost & Hound - Main Page</title>
        <link rel="stylesheet" href="./css/styles.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="/js/scripts.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <?php include '../src/views/layout/header.php'; ?>
        
        <div class="container">
            <h2>Cat Image</h2>
            <?php if ($catImage): ?>
                <img src="<?php echo $catImage; ?>" alt="Random Cat Image" class="img-fluid">
            <?php else: ?>
                <p>No cat image available.</p>
            <?php endif; ?>

            <h2>Dog Image</h2>
            <?php if ($dogImage): ?>
                <img src="<?php echo $dogImage; ?>" alt="Random Dog Image" class="img-fluid">
            <?php else: ?>
                <p>No dog image available.</p>
            <?php endif; ?>
        </div>
    </body>
</html>
