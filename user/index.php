<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="index.css">
</head>
<?php
include'header.php';
?> 
<body>
    <div class="container-fluid">
        <div class="colmd-12">
        <div class="row">
        
    <!-- <h1 class="text-center"></h1> -->
    <?php 
    include'conn.php';
    $Record = mysqli_query($conn,'SELECT * FROM productdetails');
    while($row = mysqli_fetch_array($Record)){
        $check_page = $row['pcategory'];
        if( $check_page ==='Home'){ 
            
echo"
<div class='col-md-6 col-lg-4 mb-3'>
<form action='Insertcart.php' method='POST'>
<div class='card' style='width: 18rem;'>
  <img src='../admin/product/$row[pimage]' class='card-img-top' alt='...'>
  <div class='card-body text-center'>
    <h5 class='card-title'>$row[pname]</h5>
    <p class='card-text'>Rs: $row[pprice]</p>
    <p class=''>Product Details: $row[pdetails]</p>
    <input type='hidden' name='pname' value='$row[pname]'>
    <input type='hidden' name='pprice' value='$row[pprice]'>

    <input type='number'  name='pquantity'value='min=1'max='10' placeholder='Quantity'><br><br>
    <input type='submit'name='addcart' class='btn btn-primary text-white w-100' value='Add to cart'>

</div>
</div>
</form>
</div>

";
    }}
?>
        </div>
        </div>
    </div>
</body>
</html>