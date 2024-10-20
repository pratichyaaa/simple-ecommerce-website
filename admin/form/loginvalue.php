
      <!-- ADMIN LOGIN BACKEND -->

<?php
$con = mysqli_connect('localhost','root','','website');

$username = $_POST['username'];
$password = $_POST['password'];
$result = mysqli_query($con,"SELECT * FROM `admin` WHERE username='$username' AND password = '$password'");
session_start();
if(mysqli_num_rows($result)){

    $_SESSION['admin'] = $username;

    echo"
    <script>
    alert('Login successfully');
    window.location.href='../store.php'
    </script>
    ";

} 
else{
    echo"
    <script>
    alert('Invalid username or password');
    window.location.href = 'login.php'
    </script>
    ";
}
?>

