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

    <div class="container whole-input">
        <h1 style="font-family: 'Spartan', sans-serif;">Create a Post</h1>

        <form action="/submit-post.php" method="POST" enctype="multipart/form-data">
        <div class="left-input">
            <div class="form-group">
                <label for="petType">Type of Pet</label>
                <input type="text" class="form-control" id="petType" name="petType" placeholder="e.g., Dog, Cat" required>
            </div>

            <div class="form-group">
                <label for="breed">Breed</label>
                <input type="text" class="form-control" id="breed" name="breed" placeholder="e.g., Golden Retriever" required>
            </div>

            <div class="form-group">
                <label for="petName">Pet Name</label>
                <input type="text" class="form-control" id="petName" name="petName" placeholder="e.g. Buddy" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" placeholder="e.g. Male, Female" required>
            </div>

            <div class="form-group">
                <label for="location">Most Recent Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="e.g. Gainesville, FL" required>
            </div>

            <div class="form-group">
                <label for="lastSeen">Last Seen On</label>
                <input type="date" class="form-control" id="lastSeen" name="lastSeen" required>
            </div>

            <div class="form-group">
                <label for="contactInfo">Contact Information</label>
                <input type="text" class="form-control" id="contactInfo" name="contactInfo" placeholder="e.g. Phone number or email" required>
            </div>

            <div class="form-group">
                <label for="images">Upload Images</label>
                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
            </div>
        </div>
        <div class="right-input">
            <label for="postText">Post Text</label>
            <input type="text" class="form-control" id="postText" name="postText" placeholder="e.g. Pet physical description" rows="5" required>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="button">Post</button>
        </div>
        </form>
        </div>

        
        
    
    <script>

    </script>
</body>
</html>