<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel='stylesheet' type='text/css' media='screen' href='register.css'>
    <script src="https://kit.fontawesome.com/cee04f8a65.js" crossorigin="anonymous"></script>
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
<div class="container"> 
    <div class="forms-container">
        <div class="signin-signup">
        <form action=" " class="sign-in-form" method="POST">
            <h2 class="title"> Sign Up </h2>
            <!-- <div class="social-text">
            <i class="fa-solid fa-user fa-xl" style="color: #e0e3e6;"></i>
            </div> -->
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="username" id="username">
        
            </div>
            <div class="input-field">
            <i class="fa-solid fa-envelope" style="color: #c4c4c5;"></i>
                <input type="text" placeholder="Email" name="email" id="email">
        
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password" id="password">
               
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Re-enter your password" name="password" id="password">
               
            </div>
            <!-- <div class="input-field3">
            <input type="checkbox" name="save_password"> Remember me?
            </div> -->
            <input type="submit" value="Create a new account" class="btn solid" onclick="validateForm()">
            <!-- <div class="social-text">
            <i class="fa-solid fa-user fa-xl" style="color: #e0e3e6;"></i>
            </div> -->
        
            <!-- <div class="social-media">
            <a href="https://www.facebook.com/" class="social-icon">
            <i class="fab fa-facebook-f"></i></a>
            <a href="https://www.google.com/" class="social-icon">
                <i class="fab fa-google"></i>
            </a>
            </div> -->
          <small><div id="error-message-container"></div></small>
         

</div>
</div>
</div></form>
<script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var errorMessageContainer = document.getElementById("error-message-container");
        errorMessageContainer.innerHTML = ""; // Clear previous error messages

        // Simple validation for username
        if (username.trim() == "") {
            errorMessageContainer.innerHTML += "<p class='error-message'>Please enter your username</p>";
            return false;
        }
        if(email.trim()==""){
            errorMessageContainer.innerHTML += "<p class='error-message'>Please enter your email</p>";
            return false;
        }

        // Password validation
        if (password.trim() == "") {
            errorMessageContainer.innerHTML += "<p class='error-message'>Please enter your password</p>";
            return false;
        }
        if(!/[0-9][a-z]@/).test(email){
            errorMessageContainer.innerHTML += "<p class='error-message'>Email must contain @ </p>";
            return false;  
        }
        if (password.length < 8) {
            errorMessageContainer.innerHTML += "<p class='error-message'>Password must be at least 8 characters long</p>";
            return false;
        }
        if (!/[!@#$%^&*()\-_=+{};:,<.>]/.test(password)) {
            errorMessageContainer.innerHTML += "<p class='error-message'>Password must contain at least one special character</p>";
            return false;
        }
        if (!/[A-Z]/.test(password)) {
            errorMessageContainer.innerHTML += "<p class='error-message'>Password must contain at least one uppercase letter</p>";
            return false;
        }
        return true;
    }
</script>
</body>
</html>