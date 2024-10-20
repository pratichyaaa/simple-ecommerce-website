<?php
// login_process.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash the password for security (use a stronger hashing method in production)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if the "Save password" checkbox is checked
    $savePassword = isset($_POST["save_password"]) ? 1 : 0;

    // Replace the following with your database connection code
    $servername = "localhost";
    $username_db = "root";
    $password_db = " ";
    $dbname = "save_password ";

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>