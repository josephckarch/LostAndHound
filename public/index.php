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

    <style>
    .home-container {
        font-family: 'Spartan', sans-serif;
        background-color: white;
        margin: 0;
        padding: 0;
        flex: 1;
    }

    .heading {
        text-align: center;
        margin: 80px 0;
        background-color: white;
    }

    .left-half {
        width: 50%;
        float: left;
        text-align: center;
        padding: 20px;
        flex: 1;
        background-color: white;
        margin-bottom: 50px;
    }

    .right-half {
        width: 50%;
        float: right;
        text-align: center;
        padding: 20px;
        flex: 1;
        background-color: white;
        margin-bottom: 50px;
    }

    .landing-image {
        max-width: 30%;
        max-height: 100px;
        margin-bottom: 20px;
    }
</style>

    <body>
        <?php include '../src/views/layout/header.php'; ?>
        <div>
        <div class="home-container">
            <h1 class="heading">Connecting Pets and Owners<br>Across Gainesville</h1>

            <div class="left-half">
                <?php if ($dogImage): ?>
                    <div class="landing-image">
                        <img src="<?php echo $dogImage; ?>" alt="Random Dog Image">
                    </div>
                <?php else: ?>
                    <p>No dog image available.</p>
                <?php endif; ?>
                <p>I can't find my pet</p>
                <a href="/create-post.php" class="button">Create a Post</a>
            </div>

            
            
            <div class="right-half">
                <?php if ($catImage): ?>
                    <div class="landing-image">
                        <img src="<?php echo $catImage; ?>" alt="Random Cat Image">
                    </div>
                <?php else: ?>
                    <p>No cat image available.</p>
                <?php endif; ?>
                <p>I found someone's pet!</p>
                <a href="/lost-pets-page.php" class="button">Browse Posts</a>
            </div>
        </div>
    </div>

    </body>
</html>
