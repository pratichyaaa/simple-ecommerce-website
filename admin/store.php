<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="store-style.css">
    <script src="https://kit.fontawesome.com/cee04f8a65.js" crossorigin="anonymous"></script>

</head>
<?php 
session_start();
if(!$_SESSION['admin']){
  header("location:form/login.php");
}
?>

<body>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand"><h1>Store</h1></a>
    <span>
    Hello, <i class="fa-solid fa-user"></i> <?php echo $_SESSION['admin']; ?>
<a href="form/logout.php" class="text-decoration-none">Logout</a>
<a href="" class="text-decoration-none">Userpanel</a>
    </span>
  </div>
</nav>
<div>
    <h2 class="text-center">Dashboard</h2>
</div>
<div class="col-md-6 bg-primary text-center m-auto" style="border-radius: 6px;">
    <a href="product/product.php" class="bg-primary text-white text-decoration-none fs4 fw-bold px-5"> Add Post</a>
    <a href="" class="bg-primary text-white text-decoration-none fs4 fw-bold px-5">Users</a>
</div>

</body>
</html>