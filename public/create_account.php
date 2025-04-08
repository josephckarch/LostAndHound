#!/usr/local/bin/php
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Account</title>
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    
    <body>
        <?php include '../src/views/layout/header.php'; ?>
        <div class="container">
            <form method ="post" action='add_account.php'>
                <p id="create_account">Create An Account</p>
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname"><br><br>
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname"><br><br>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email"><br><br>
                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number"><br><br>
                <label for="Password">Password:</label>
                <input type="text" id="password" name="password"><br><br>
                <label for="cpassword">Confirm Password:</label>
                <input type="password" id="cpassword" name="cpassword"><br><br>
                <input type="submit" value="Sign Up">
                <p>Already have an account? <a href="/login.php">Login Here</a></p>

            </form>
            
        </div>
    </body>
</html>
