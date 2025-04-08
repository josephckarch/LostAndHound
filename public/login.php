#!/usr/local/bin/php
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log in</title>
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    
    <body>
        <?php include '../src/views/layout/header.php'; ?>
        <div class="container">
         
            <form method="post" action="./handle_login.php">
            <!--
            <center> <button type="button">Login with UFL</button></center>
            <br>
            <center><button type="button">Login with Email</button></center>
            <br>
            -->
            <hr>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email"><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Login">
            <p>Don't have an account? <a href="./create_account.php">Sign Up Here</a></p>

            </form>
            
        </div>
    </body>
</html>
