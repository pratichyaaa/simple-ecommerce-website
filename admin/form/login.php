<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
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
        <form action="loginvalue.php" class="sign-in-form" method="POST" enctype="multipart/form-data">
            <h2 class="title"> Admin Sign in </h2>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="username" id="username">
        
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password" id="password">
               
            </div>
            <input type="submit" value="Login" class="btn solid" onclick="validateForm()">
            <!-- <div class="social-text">
            <i class="fa-solid fa-user fa-xl" style="color: #e0e3e6;"></i>
            </div> -->
            <!-- <p class="social-text"> Don't have an account? <a href="register.php">Register</a></p> -->
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
        var password = document.getElementById("password").value;
        var errorMessageContainer = document.getElementById("error-message-container");
        errorMessageContainer.innerHTML = ""; // Clear previous error messages

        // Simple validation for username
        if (username.trim() == "") {
            errorMessageContainer.innerHTML += "<p class='error-message'>Please enter your username</p>";
            return false;
        }

        // Password validation
        if (password.trim() == "") {
            errorMessageContainer.innerHTML += "<p class='error-message'>Please enter your password</p>";
            return false;
        }
        return true;
    }
</script>
</body>
</html>