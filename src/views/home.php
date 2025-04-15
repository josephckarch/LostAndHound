<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Hound - Home</title>
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
    }

    .right-half {
        width: 50%;
        float: right;
        text-align: center;
        padding: 20px;
        flex: 1;
        background-color: white;
    }

    .landing-image {
        max-width: 30%;
    }
</style>

<script>
        
    </script>

<body>
    <div style="margin-bottom: 50px;">
        <div class="home-container">
            <h1 class="heading">Connecting Pets and Owners<br>Across Gainesville</h1>

            <div class="left-half">
                <img class="landing-image" src="https://media.istockphoto.com/id/494059175/vector/sad-dog-cartoon-illustration.jpg?s=612x612&w=0&k=20&c=9MYYpNMUimD0S8oasq34WcceEpOXBcsMG7s6EKcdnOU=" alt="Sad dog cartoon" />
                <p>I can't find my pet</p>
                <a href="/create-post.php" class="button">Create a Post</a>
            </div>
            
            <div class="right-half">
                <img class="landing-image" src="https://static.vecteezy.com/system/resources/previews/026/419/516/non_2x/kawaii-cute-happy-cat-in-clipart-generative-ai-png.png" />
                <p>I found someone's pet!</p>
                <a href="/lost-pets-page.php" class="button">Browse Posts</a>
            </div>
        </div>
    </div>
</body>
</html>