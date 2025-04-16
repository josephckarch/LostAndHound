function validateRegistrationForm() {
    const password = document.getElementById('password').value;
    const cpassword = document.getElementById('cpassword').value;
    const email = document.getElementById('email').value;
    
    if (password !== cpassword) {
        alert('Passwords do not match!');
        return false;
    }
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address!');
        return false;
    }
    
    if (password.length < 6) {
        alert('Password must be at least 6 characters long!');
        return false;
    }
    
    return true;
}