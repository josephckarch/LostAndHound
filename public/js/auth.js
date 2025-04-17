// google email authentication WIP 


// firebase 
//<script type="module">
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
  const provider = new GoogleAuthProvider();
  const auth = getAuth(app);

window.addEventListener("DOMContentLoaded", () =>{
    const gmailBtn = document.getElementById("gmail-btn");

  gmailBtn.addEventListener('click', (e)=>{
    signInWithPopup(auth,provider)
    .then((result) => {
    // This gives you a Google Access Token. You can use it to access the Google API.
    const credential = GoogleAuthProvider.credentialFromResult(result);
    const token = credential.accessToken;
    // The signed-in user info.
    const user = result.user;
    // IdP data available using getAdditionalUserInfo(result)
    //name
    alert(user.displayName);

    
  }).catch((error) => {
    // Handle Errors here.
    const errorCode = error.code;
    const errorMessage = error.message;
    // The email of the user's account used.
    const email = error.customData.email;
    // The AuthCredential type that was used.
    const credential = GoogleAuthProvider.credentialFromError(error);
    alert(errorMessage);
  });
  });
})
//</script>