<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="product-style.css">
    <script src="https://kit.fontawesome.com/cee04f8a65.js" crossorigin="anonymous"></script>
</head>
<body>

<?php

if(isset($_POST['submit'])){
    include'conn.php';
    $product_name = $_POST['pname'];
    $product_price = $_POST['pprice'];
    $product_image = $_FILES['pimage'];
    $image_loc= $_FILES['pimage'] ['tmp_name'];
    $image_name= $_FILES['pimage'] ['name'];
    $img_des = "uploadimage/".$image_name;
    move_uploaded_file($image_loc,"uploadimage/".$image_name);
    $product_details = $_POST['pdetails'];
    $product_category = $_POST['pages'];


}
// INSERT PRODUCT 
mysqli_query($conn,"INSERT INTO `productdetails`(`pname`, `pprice`, `pimage`, `pdetails`, `pcategory`) VALUES
 ('$product_name','$product_price','$img_des','$product_details','$product_category')");
?>

             <!-- Display data -->
             <div class="container">
              <div class="row">
                <div class="col-md-8 m-auto">

             <table class="table table-hover border my-5">
  <thead class="bg-primary text-light fs-7 font-monospace text-center">
    <th>Id</th>
    <th>Name</th>
    <th>Price </th>
    <th>Image</th>
    <th>Details</th>
    <th>Category</th>
    <th>Update</th>
    <th>Delete</th>
</thead>

<tbody>
  <?php 
  include'conn.php';
$Record = mysqli_query($conn,"SELECT * FROM `productdetails`");
while($row = mysqli_fetch_array($Record))
echo"
<tr>
  <td>$row[id]</td>
  <td>$row[pname]</td>
  <td>$row[pprice]</td>
  <td><img src='$row[pimage]' height='100px' width='150px'></td>
  <td>$row[pdetails]</td>
  <td>$row[pcategory]</td>
  <td> <a href=''class='btn-success rounded btn-sm text-decoration-none text-light '>Update </a></td>
  <td> <a href=''class='btn-success rounded btn-sm text-decoration-none'>Delete </a></td>
</tr>
";
  ?>
</tbody>
</table>
</div>
              </div>
             </div>
             <!-- Display data
             <div class="container">
              <div class="row">
                <div class="col-md-8 m-auto">

             <table class="table border border-primary table-hover border my-5">
  <thead> -->
    <!-- <th>Id</th>
    <th>Name</th>
    <th>Price </th>
    <th>Image</th>
    <th>Details</th>
    <th>Category</th>
    <th>Update</th>
    <th>Delete</th>
</thead>

<tbody> -->
  <?php 
  // include'conn.php';
// $Record = mysqli_query($conn,"SELECT * FROM `productdetails`");
// while($row = mysqli_fetch_array($Record))
// echo"
// <tr>
//   <td>$row[id]</td>
//   <td>$row[pname]</td>
//   <td>$row[pprice]</td>
//   <td><img src='$row[pimage]' height='100px' width='150px'></td>
//   <td>$row[pdetails]</td>
//   <td>$row[pcategory]</td>
// </tr>
// ";
//   ?>
<!-- // </tbody>
// </table>
// </div> -->
<!-- //               </div>
             </div> -->
       
</body>
</html>