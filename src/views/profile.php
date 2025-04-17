<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Lost & Hound</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: "Spartan", sans-serif;
            background-color: #f5e1dc;
        }

        header {
            background-color: #f5e1dc;
            color: #DA6274;
            padding: 15px 0;
            text-align: center;
        }

        .card {
            margin-bottom: 20px;
        }

        .post-card {
            border-radius: 10px;
            background-color: white;
            padding: 15px;
        }

        .my-posts-title {
            margin-top: 30px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <header>
        <h2>My Profile</h2>
    </header>

    <div class="container my-4">
        <div class="row">

        
            <!-- Profile Info -->
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Profile Information</h3>
                        <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
                        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                        <p><strong>Phone:</strong> <?= htmlspecialchars($user['phone_number'] ?? 'Not provided') ?></p>
                        <?php if (isset($user['created_at'])): ?>
                            <p><strong>Member Since:</strong> <?= date('F j, Y', strtotime($user['created_at'])) ?></p>
                        <?php endif; ?>
                        <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>



            <!-- User Posts -->
            <div class="col-12 col-md-8">
                <h3 class="text-center my-posts-title">My Posts</h3>
                <?php if (count($posts) > 0): ?>
                    <div class="row">
                        <?php foreach ($posts as $post): ?>
                            <div class="col-md-6">
                                <div class="post-card shadow-sm">
                                    <div class="card-body">
                                        <!-- DISPLAY PET IMAGE -->

                                        <?php if (!empty($post['image_url'])): ?>
                                            <img src="<?= htmlspecialchars($post['image_url']) ?>" alt="Pet Image" class="img-fluid mb-2" style="max-height: 200px; object-fit: cover;">
                                        <?php endif; ?>

                                        <h5 class="card-title"><?= htmlspecialchars($post['pet_name']) ?></h5>
                                        <p class="card-text">
                                            <span class="badge badge-<?= $post['status'] === 'lost' ? 'danger' : 'success' ?>">
                                                <?= ucfirst(htmlspecialchars($post['status'])) ?>
                                            </span>
                                            <small class="text-muted"><?= date('M j, Y', strtotime($post['update_date'])) ?></small>
                                        </p>
                                        <p class="card-text"><?= htmlspecialchars($post['description']) ?></p>
                                        <p class="card-text"><small>Location: <?= htmlspecialchars($post['location']) ?></small></p>
                                        <div class="btn-group">
                                            <a href="edit_post.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="delete_post.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
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
