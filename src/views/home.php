<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Hound - Home</title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/scripts.js"></script>
</head>
<body>
    <?php include 'layout/header.php'; ?>

    <div class="container">
        <h1>Connecting Pets and Owners Across Gainesville</h1>
        <p>Your go-to place for posting and finding lost pets!</p>

        <h2>Lost Pets</h2>
        <div id="pet-list">
            <!-- Dynamic content will be loaded here via jQuery -->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Fetch and display lost pets
            $.ajax({
                url: '/api/pets', // Adjust the URL as needed
                method: 'GET',
                success: function(data) {
                    // Populate the pet list
                    data.forEach(function(pet) {
                        $('#pet-list').append('<div class="pet-item">' +
                            '<h3>' + pet.name + '</h3>' +
                            '<p>' + pet.description + '</p>' +
                            '<img src="/uploads/' + pet.image + '" alt="' + pet.name + '">' +
                            '</div>');
                    });
                },
                error: function() {
                    $('#pet-list').append('<p>Error loading pet data.</p>');
                }
            });
        });
    </script>
</body>
</html>