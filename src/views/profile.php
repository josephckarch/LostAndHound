
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Lost & Hound</title>
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    
    header {
        background-color: #f5e1dc;
        color: #DA6274;
        padding: 10px;
        text-align: center;
        font-family: "Spartan", sans-serif;
    }

    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: #f5e1dc;
        align-items: center;
        width: 600px;
        margin: 0 auto;
        padding: 20px;
        font-family: "Spartan", sans-serif;
    }

    h2, h3 {
        text-align: center;
        font-family: "Spartan", sans-serif;
        font-weight: bold;
    }

    .profile-wrapper {
        width: 100%;
    }

    .card {
        margin-bottom: 20px;
    }

    .my-posts-title {
        margin-top: 20px;
    }

    .post-card {
        border-radius: 10px;
        background-color: white;
        padding: 15px;
        font-family: "Spartan", sans-serif;
    }
</style>

        

<body>
        <?php include 'layout/header.php'; ?>
        

    <div class="container my-4">
    <div class = "profile-wrapper"><h2>My Profile</h2></div><br><br>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body" >
                        <h3 class="card-title">Profile Information</h3>
                        <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                        <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone_number'] ?? 'Not provided'); ?></p>
                        <?php if(isset($user['created_at'])): ?>
                            <p><strong>Member Since:</strong> <?php echo date('F j, Y', strtotime($user['created_at'])); ?></p>
                        <?php endif; ?>
                        <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <h3 class = "text-center">My Posts</h3>
                <?php if (count($posts) > 0): ?>
                    <div class="row">
                        <?php foreach ($posts as $post): ?>
                            <div class="col-md-6 mb-4">
                                <div class="post-card, shadow-sm p-3 mb-5 bg-white rounded ">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($post['pet_name']); ?></h5>
                                        <p class="card-text">
                                            <span class="badge badge-<?php echo $post['status'] === 'lost' ? 'danger' : 'success'; ?>">
                                                <?php echo ucfirst(htmlspecialchars($post['status'])); ?>
                                            </span>
                                            <small class="text-muted"><?php echo date('M j, Y', strtotime($post['update_date'])); ?></small>
                                        </p>
                                        <p class="card-text"><?php echo htmlspecialchars($post['description']); ?></p>
                                        <p class="card-text"><small>Location: <?php echo htmlspecialchars($post['location']); ?></small></p>
                                        <div class="btn-group">
                                            <a href="edit_post.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="delete_post.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info">You haven't created any posts yet.</div>
                    <a href="create-post.php" class="btn btn-primary">Create Your First Post</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>