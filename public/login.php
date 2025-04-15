<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log in</title>
        <link rel="stylesheet" href="./css/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    
    <body>
        <?php include '../src/views/layout/header.php'; ?>

   

        <div class="container">

            <form method="post" action="./handle_login.php" class ="login-form">
            <div class="text-center mb-3">
                 <button type="button" class="ufl-btn">Login with UFL</button> <br><br>
                <button type="button" class="email-btn">Login with Email</button>
            </div>
            <br><hr>
            <div class= "form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder= "Email" required><br>
            </div>
            <div class= "form-group; text-align: center">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder ="Password" required><br><br>
            </div>
            <div class= text-center mt-3>
                <input type="submit" class="button" value="Login"><br><br>
            </div>
            <p class="text-center mt-3">Don't have an account? <a href="/create_account.php">Sign Up Here</a></p>

            </form>
            
        </div>
    </body>
</html>
