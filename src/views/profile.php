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

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            function getSelectedPostRadio() {
                return document.querySelector('input[name="selectedPost"]:checked');
            }

            document.getElementById('editSelectedPost').addEventListener('click', () => {
                const selected = getSelectedPostRadio();
                if (!selected) {
                    alert("Select a post first.");
                    return;
                }

                // Show the edit form container
                document.getElementById('editFormContainer').style.display = 'block';

                // Pre-fill the form fields if data exists
                document.getElementById('editPostId').value = selected.value;
                document.getElementById('editPetType').value = selected.dataset.petType || '';
                document.getElementById('editBreed').value = selected.dataset.breed || '';
                document.getElementById('editPetName').value = selected.dataset.petName || '';
                document.getElementById('editPetDesc').value = selected.dataset.petDesc || '';
                document.getElementById('editAge').value = selected.dataset.age || '';
                document.getElementById('editGender').value = selected.dataset.gender || '';
                document.getElementById('editLocation').value = selected.dataset.location || '';
                document.getElementById('editLastSeen').value = selected.dataset.lastSeen || '';
                document.getElementById('editContactInfo').value = selected.dataset.contactInfo || '';
                document.getElementById('editStatus').value = selected.dataset.status || '';
                document.getElementById('editPostText').value = selected.dataset.postText || '';

                // Scroll to the edit form
                document.getElementById('editFormContainer').scrollIntoView({ behavior: 'smooth' });
            });

            document.getElementById('deleteForm').addEventListener('submit', (e) => {
                const selected = getSelectedPostRadio();
                if (!selected) {
                    e.preventDefault();
                    alert("Select a post to delete.");
                    return;
                }
                document.getElementById('deletePostId').value = selected.value;
            });
        });
    </script>

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
                        <!-- We aren't done with this
                        <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
                        -->
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
                                        <!-- Radio button for selection -->
                                        <input type="radio" name="selectedPost" 
                                               value="<?= htmlspecialchars($post['id']) ?>"
                                               data-pet-type="<?= htmlspecialchars($post['pet_type']) ?>"
                                               data-breed="<?= htmlspecialchars($post['breed']) ?>"
                                               data-pet-name="<?= htmlspecialchars($post['pet_name']) ?>"
                                               data-pet-desc="<?= htmlspecialchars($post['description']) ?>"
                                               data-age="<?= htmlspecialchars($post['age']) ?>"
                                               data-gender="<?= htmlspecialchars($post['gender']) ?>"
                                               data-location="<?= htmlspecialchars($post['location']) ?>"
                                               data-last-seen="<?= htmlspecialchars($post['last_seen']) ?>"
                                               data-contact-info="<?= htmlspecialchars($post['contact_info']) ?>"
                                               data-status="<?= htmlspecialchars($post['status']) ?>"
                                               data-post-text="<?= htmlspecialchars($post['post_text']) ?>"
                                               class="post-radio">

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
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="editFormContainer" style="display: none;">
                        <h2>Edit Post</h2>
                        <form action="./edit_post.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="post_id" id="editPostId">
                            <div class="form-group">
                                <label for="editPetType">Type of Pet</label>
                                <input type="text" id="editPetType" name="petType">
                            </div>
                            <div class="form-group">
                                <label for="editBreed">Breed</label>
                                <input type="text" id="editBreed" name="breed">
                            </div>
                            <div class="form-group">
                                <label for="editPetName">Pet Name</label>
                                <input type="text" id="editPetName" name="petName">
                            </div>
                            <div class="form-group">
                                <label for="editPetDesc">Pet Description</label>
                                <input type="text" id="editPetDesc" name="petDesc">
                            </div>
                            <div class="form-group">
                                <label for="editAge">Pet Age</label>
                                <input type="text" id="editAge" name="age">
                            </div>
                            <div class="form-group">
                                <label for="editGender">Gender</label>
                                <input type="text" id="editGender" name="gender">
                            </div>
                            <div class="form-group">
                                <label for="editLocation">Most Recent Location</label>
                                <input type="text" id="editLocation" name="location">
                            </div>
                            <div class="form-group">
                                <label for="editLastSeen">Last Seen On</label>
                                <input type="date" id="editLastSeen" name="lastSeen">
                            </div>
                            <div class="form-group">
                                <label for="editContactInfo">Contact Information</label>
                                <input type="text" id="editContactInfo" name="contactInfo">
                            </div>
                            <div class="form-group">
                                <label for="images">Upload New Images</label>
                                <input type="file" id="images" name="images[]" multiple accept=".jpg,.jpeg,image/jpeg">
                            </div>
                            <div class="form-group">
                                <label for="editStatus">Status</label>
                                <select id="editStatus" name="status">
                                    <option value="">-- Select Status --</option>
                                    <option value="lost">Lost</option>
                                    <option value="found">Found</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editPostText">Post Text</label>
                                <input type="text" id="editPostText" name="postText">
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit">Update Post</button>
                            </div>
                        </form>
                    </div>
                    <div class="action-buttons">
                        <button id="editSelectedPost">Edit Selected Post</button>
                        <form id="deleteForm" action="./delete_post.php" method="POST" style="display:inline;">
                            <input type="hidden" name="post_id" id="deletePostId">
                            <button type="submit">Delete Selected Post</button>
                        </form>
                    </div>
                <?php else: ?>
                    <p>No posts found. Create one to get started!</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
