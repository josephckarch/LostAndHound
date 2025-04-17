#!/usr/local/bin/php
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


// google email authentication WIP 

$email-btn= $_POST['email-btn']

// firebase 
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-analytics.js";
  import { getAuth, signInWithPopup ,GoogleAuthProvider } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js";


  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyDtczkJ6XbpsYW2Wv1G6xU3QHJApN02pkw",
    authDomain: "lost-and-hound-5c2b1.firebaseapp.com",
    projectId: "lost-and-hound-5c2b1",
    storageBucket: "lost-and-hound-5c2b1.firebasestorage.app",
    messagingSenderId: "267842685822",
    appId: "1:267842685822:web:5b97c6595f56b49ef4c12f",
    measurementId: "G-MENGG6VVJ9"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
  const provider = new GoogleAuthProvider(app);
  const auth = getAuth(app);


  email-btn.addEventListener('click', (e)=>{
    .then((result) => {
    // This gives you a Google Access Token. You can use it to access the Google API.
    const credential = GoogleAuthProvider.credentialFromResult(result);
    const token = credential.accessToken;
    // The signed-in user info.
    const user = result.user;
    // IdP data available using getAdditionalUserInfo(result)
    //name
  }).catch((error) => {
    // Handle Errors here.
    const errorCode = error.code;
    const errorMessage = error.message;
    // The email of the user's account used.
    const email = error.customData.email;
    // The AuthCredential type that was used.
    const credential = GoogleAuthProvider.credentialFromError(error);
    // ...
  });
  });
</script>