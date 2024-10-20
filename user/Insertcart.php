<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();

if(isset($_POST['addcart'])){
    $product_name = $_POST['pname'];
    $product_price = $_POST['pprice'];
    $product_quantity = $_POST['pquantity'];

    // Initialize cart array if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the product is already in the cart
    if (!empty($_SESSION['cart'])) {
        $check_product = array_column($_SESSION['cart'], 'productName');
    } else {
        $check_product = array();
    }

    if (in_array($product_name, $check_product)) {
        echo "
        <script>
        alert('Product already added');
        window.location.href = 'index.php';
        </script>
        ";
    } else {
        $_SESSION['cart'][] = array(
            'productName' => $product_name,
            'productPrice' => $product_price,
            'productQuantity' => $product_quantity
        );
        header("location: viewcart.php");
    }
}

// Remove product
if (isset($_POST['remove'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['productName'] === $_POST['item']) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            header('location:viewcart.php');
        }
    }
}

// Update product
if (isset($_POST['update'])) {
    $product_name = $_POST['pname'];
    $product_price = $_POST['pprice'];
    $product_quantity = $_POST['pquantity'];
    
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['productName'] === $_POST['item']) {
            $_SESSION['cart'][$key] = array(
                'productName' => $product_name,
                'productPrice' => $product_price,
                'productQuantity' => $product_quantity
            );
            header("location: viewcart.php");
        }
    }
}
?>
