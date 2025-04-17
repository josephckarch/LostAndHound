#!/usr/local/bin/php
<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Account</title>
        <link rel="stylesheet" href="./css/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="./js/scripts.js"></script>
    </head>
    
    <body>
        <?php include '../src/views/layout/header.php'; ?>
      
        <div class="container">
            <!-- Display validation errors -->
            <?php
            if (isset($_SESSION['signup_errors'])) {
                echo '<div class="alert alert-danger">';
                foreach ($_SESSION['signup_errors'] as $error) {
                    echo htmlspecialchars($error) . '<br>';
                }
                echo '</div>';
                unset($_SESSION['signup_errors']);
            }
            ?>
            
            <!-- Add onsubmit handler for client-side validation -->
            <form method="post" action="./add_account.php" onsubmit="return validateRegistrationForm()">
                <h1 style="font-family: 'Spartan', sans-serif;text-align: center;"> Create Account</h1><br>
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" 
                           value="<?php echo isset($_SESSION['form_data']['fname']) ? htmlspecialchars($_SESSION['form_data']['fname']) : ''; ?>" required>
                </div>
              
                <div class="form-group">  
                    <label for="lname">Last Name:</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" 
                           value="<?php echo isset($_SESSION['form_data']['lname']) ? htmlspecialchars($_SESSION['form_data']['lname']) : ''; ?>" required>
                </div>
                
                <div class="form-group">  
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" 
                           value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>" required>
                </div>
                  
                <div class="form-group">  
                    <label for="phone_number">Phone Number:</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" 
                           value="<?php echo isset($_SESSION['form_data']['phone_number']) ? htmlspecialchars($_SESSION['form_data']['phone_number']) : ''; ?>">
                </div>
                  
                <div class="form-group">  
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <small class="form-text text-muted">Password must be at least 8 characters long</small>
                </div>
                
                <div class="form-group">  
                    <label for="cpassword">Confirm Password:</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Re-Enter Your Password" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Sign Up</button>

                <p class="mt-3">Already have an account? <a href="/login.php">Login Here</a></p>
            </div>

            </form>
        </div>
        
        <?php
        // Clear form data after displaying
        if (isset($_SESSION['form_data'])) {
            unset($_SESSION['form_data']);
        }
        ?>
    </body>
</html>