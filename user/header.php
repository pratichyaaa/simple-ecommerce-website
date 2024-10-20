<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="header.css">
    <script src="https://kit.fontawesome.com/cee04f8a65.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php
  session_start();
  $count = 0;
  if(isset($_SESSION['cart'])){
   $count = count($_SESSION['cart']);
  }
  ?>
<!-- <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
  <a href="#"><img src="userimage/logo.png" class="logo" alt=""></a>
    <a class="navbar-brand"><img src="userimage/logo.png" class="logo" alt=""></a>
 <a href="" class="home">Home</a> </div>
</nav> -->
<section id="header">
        <a href="#"><img src="userimage/logo.png" class="logo" alt=""></a>
         <div> 
            <ul id="navbar">
            <!-- <li><a class="active" href="">Home</a></li> -->
                <li><a href="../login.php"><i class="fa-solid fa-user"></i>&nbsp;Hello, Sign in</a></li>
                <!-- <li><a href="#">Product</a></li> -->
                <li><a href="#">Contact</a></li>
                <!-- <li><a href="login.php">Login</a></li> -->
                <li><a href="Insertcart.php"><a><i class="fa fa-cart-arrow-down" aria-hidden="true"  style="color: #0866FF; font-size: 20px;"></i></a><?php echo$count ?></a></li>

            </ul>
         </div>
    </section>
    <div class="bg-primary">
      <ul class="list-unstyled d-flex justify-content-center">
        <li><a href="Sales.php" class="text-decoration-none text-white fs-7 px-4 fw-bold">Today's sales</a></li>
        <li><a href="Apple.php" class="text-decoration-none text-white fs-7 px-4 fw-bold">Apple</a></li>
        <li><a href="Printer.php" class="text-decoration-none text-white fs-7 px-4 fw-bold">Printer</a></li>
        <li><a href="Laptop.php" class="text-decoration-none text-white fs-7 px-4 fw-bold">Laptop</a></li>
        <li><a href="Adapter.php" class="text-decoration-none text-white fs-7 px-4 fw-bold">Adapter</a></li>
        <li><a href="Monitor.php" class="text-decoration-none text-white fs-7 px-4 fw-bold">Monitor</a></li>
        <li><a href="Bag.php" class="text-decoration-none text-white fs-7 px-4 fw-bold">Bag</a></li>
        <li><a href="Mouse.php" class="text-decoration-none text-white fs-7 px-4 fw-bold">Mouse</a></li>
        <li><a href="Headsets.php" class="text-decoration-none text-white fs-7 px-4 fw-bold">Headsets</a></li>
        <li><a href="Keyboard.php" class="text-decoration-none text-white fs-7 px-4 fw-bold">Keyboard</a></li>



      </ul>
    </div>

</body>
</html>