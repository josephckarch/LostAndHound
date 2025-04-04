#!/usr/local/bin/php
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Account</title>
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    <style>
        header{
            background-color: #f5e1dc;
            color:#DA6274;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: #f5e1dc;
            height: 600px;
            width: 600px;
            align-items:center;
                   
                }
        .container input{
            align-items:"center";
            font-family: "Spartan", sans-serif;
        }
        #create_account{
            text-align: center;
            font-size:20px;
            font-family: "Spartan", sans-serif;
            font-weight:bold;

        }
    </style>
    
    <body>
        <header>
            <h1>Lost & Hound</h1>
        </header>

    
        <div class="container">
            <form action=/>
                <p id="create_account">Create An Account</p>
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname"><br><br>
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname"><br><br>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email"><br><br>
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
