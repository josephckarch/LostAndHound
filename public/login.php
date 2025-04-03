<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log in</title>
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    
    <body>
        <header>
            <h1>Lost & Hound</h1>
            <style>
                header{
                    background-color: #f5e1dc;
                    color:#DA6274;
                }
                .container {
                    background-color: #f5e1dc;
                    height: 600px;
                    width: 600px;
                    align-items:center;
                   
                }
                .container input{
                    width: 90%; 
                      max-width: 300px; 
                      padding: 10px;
                      margin: 5px 0;
                      font-size: 16px; 
                      background-color:;
                }
                .container button {
                    background-color:white;
                      width: 50%; 
                      padding: 5px;
                      margin: 5px 0;
                      font-size: 15px; 
                      border-radius: 10px;

                    }
                .container p{
                    font-size: 12px;
                    color:black;
                }    
            </style>
            

            
        </header>

        <div class="container">
         
            <form action=/>
            <center> <button type="button">Login with UFL</button><center>
            <br>
            <center><button type="button">Login with Email</button></center>
            <br>
            <hr>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email"><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Login">
            <p>Do not have an account? <a href="/create_account.php">Sign Up Here</a></p>

            </form>
            
        </div>
    </body>
</html>
