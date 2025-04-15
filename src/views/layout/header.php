<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Hound</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="py-3" style="background-color: #F5E1DC;">
        <div class="container" style="font-family: 'Spartan', sans-serif;">
            <h1 class="text-center" style="font-family: 'Spartan', sans-serif; color: #DA6274; font-weight: 700;">Lost & Hound</h1>
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="./">Home</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <?php
                        $current_page = $_SERVER['REQUEST_URI'];
                        ?>
                        <li class="nav-item <?php echo $current_page == '/login.php' ? 'active' : ''; ?>">
                            <a class="nav-link" href="./login.php">Login</a>
                        </li>
                        <li class="nav-item <?php echo $current_page == '/create_account.php' ? 'active' : ''; ?>">
                            <a class="nav-link" href="./create_account.php">Sign Up</a>
                        </li>
                        <li class="nav-item <?php echo $current_page == '/lost-pets-page.php' ? 'active' : ''; ?>">
                            <a class="nav-link" href="./lost-pets-page.php">Browse</a>
                        </li>
                        <li class="nav-item <?php echo $current_page == '/create-post.php' ? 'active' : ''; ?>">
                            <a class="nav-link" href="./create-post.php">Create Post</a>
                        </li>
                    </ul>
                </div>
                <!-- <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./create_account.php">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./lost-pets-page.php">Browse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./create-post.php">Create Post</a>
                        </li>
                    </ul>
                </div> -->
            </nav>
        </div>
    </header>