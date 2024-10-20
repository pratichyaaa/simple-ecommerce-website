<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View cart</title>
    <style>
        .btnn{
            border-radius: 5px;
            background-color: lightgray;
            /* font-weight: 5px; */
        }
    </style>
    

</head>
<body>
    <?php
    include'header.php';
    ?>
    <div class="container">
        <div class="row">
         <div class="col-lg-12 text-center bg-light mb-5 rounded">
            <h1 >My Cart</h1>
         </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-sm-12 col-md-6 col-lg-9">
                <table class="table table-bordered text-center">
                    <thead class="bg-primary text-white fs-5">
                        <th>SN</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Total Price</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
<?php
// session_start();
$total = 0;
$checkout = 0;
$i = 0;
if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $key=>$value){
        $total = $value['productPrice'] * $value['productQuantity'];
        $checkout += $value['productPrice'] * $value['productQuantity']; $checkout = $value['productPrice']* $value['productQuantity'];
        $i = $key +1;
        echo"
        <form action ='Insertcart.php' method = 'POST'>
    <tr>
    <td>$i</td>
    <td><input type='text' name='pname' value='$value[productName]'>$value[productName]</td>
    <td><input type='text' name='pprice' value='$value[productPrice]'>$value[productPrice]</td>
    <td><input type='number' name='pquantity' value='$value[productQuantity]'>$value[productQuantity]</td>
    <td>$total</td>
    <td><button class='btn' name='update'>Update</button></td>
    <td><button name='remove' class='btn'>Delete</button></td>
    <td><input type='hidden' name='item' value='$value[productName]'></td>
    </tr>
    </form>

    ";
    }
}
?>

                    </tbody>
                </table>
            </div>
            <div class="col-lg-3">
                <h3> Total</h3>
                <h2 class="bg-primary text-white"> <?php echo number_format($checkout,2) ?></h2>

        </div>

    </div>
</body>
</html>