#!/usr/local/bin/php
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Account</title>
        <link rel="stylesheet" href="./css/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
   
    
    <body>

        <?php include '../src/views/layout/header.php'; ?>
        <div class="container ">
            <form action=/home.php class=sign-up-form>

            <h1 style="font-family: 'Spartan', sans-serif;text-align: center;"> Create Account</h1><br>

            <div class=form-group>
                <label for="fname">First Name</label>
                <input type="text" class ="form-control" id="fname" name="fname" placeholder= "First Name" required><br><br>
            </div>
            <div class=form-group>
                <label for="lname">Last Name</label>
                <input type="text" class= "form-control" id="lname" name="lname" placeholder ="Last Name" required><br><br>
            </div>
            <div class=form-group>
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder= "Email" required><br><br>
            </div>
            <div class= form-group>
                <label for="Password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Password" required><br><br>
            </div>
            <div>
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Re-Enter Your Password "><br>
            </div>
            <div class="text-center mt-3">
                <input type="submit" class="button" value="Sign Up"><br><br>
            </div>
            <div class= "text-center mt-3" >
                <p>Already have an account? <a href="/login.php">Login Here</a></p>
            </div>

            </form>
            
        </div>
    </body>
</html>
