<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Payment</title>
</head>
<body>
<!-- <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-warning shadow">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
        <i class="bi bi-bus-front">
        </i> Online Bus service</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="customeredit.php"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../rootdisplay.php">Route View</a>
            </li>
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                more
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="contactAS.php">contact</a></li>
                <li><a class="dropdown-item" href="#about">About</a></li>
              </ul>
            </li>
            
            
            

          </ul>
          <li class="nav-item dropdown d-flex">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Account
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="login.php">login</a></li>
                <li><a class="dropdown-item" href="register.php">Register</a></li>
              </ul>
            </li>
          <form class="d-flex">

            <button class="btn btn-outline-dark"><a href="logout.php">logout</a></button>
          </form>
        </div>
      </div>
</nav> -->

    
   
<?php
session_start();
$error_message = "";
$amount ="";
$uniqueProductId = "";
$uniqueUrl = "";
$uniqueProductName = "";
$successRedirect = "";
$khalti_public_key = "test_public_key_b0c99c8807db4e9a9d8e16e4ff84170c";

// Run your code here to get your amount and product id and product url. Change this dynamically.
// ------------------------------------------------------------------------
//  CHANGE THE CODE BELOW  eg. you can get product price and id from here and set these variables.
// Donot change variables name unless you can change everything below
// ------------------------------------------------------------------------


include("conn.php");
// $id= $_SESSION['id'];

//echo"$b_num";
$q =  "SELECT * FROM `productdetails` WHERE  id = '$id'";
// $q="SELECT * FROM `root` where b_number='$b_num' ";
$result=mysqli_query($conn,$q);
while ($res=mysqli_fetch_assoc($result)){
$amount = $res["pprice"];
$uniqueProductId = $res['id'];
$uniqueUrl = "http://localhost/summerproject/index.php";
$uniqueProductName = $res['pname'];
$successRedirect = "http://localhost/summerproject/user/transaction.php"; // change this url , it will be the page user will be redirected after successful payment

}
// ------------------------------------------------------------------------
// HINT : just change price above and redirect user to this page. It will handel everything automatically.
// ------------------------------------------------------------------------

function checkValid($data)
{
    $verifyAmount = ""; // get amount from database and multiply by 100
    // $data contains khalti response. you can print it to view more details.
    // eg. $data["token] will give token & $data["amount] will give amount and more. see khalti docs for response format
  //  $error_message="";
    // show error from above message
    if ((float) $data["pprice"] == $verifyAmount) {
        return 1;
    } else {
        return 0;
    }

    // use your extra function for checking price & all again. You can perform more action here. 
    // 1= success, 0 = error, 

    //
}
// ------------------------------------------------------------------------
// DONOT CHANGE THE CODE BELOW UNLESS YOU KNOW WHAT YOU ARE DOING
// ------------------------------------------------------------------------



// declaring some global variables
$token = "";
$price = $amount;
$mpin = "";
// send otp
if (isset($_POST["mobile"]) && isset($_POST["mpin"])) {
    try {
        $mobile = $_POST["mobile"];
        $mpin = $_POST["mpin"];
        $price = (float) $amount;

        $amount = (float) $amount * 100;


        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://khalti.com/api/v2/payment/initiate/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
            "public_key": "' . $khalti_public_key . '",
            "mobile": ' . $mobile . ',
            "transaction_pin": ' . $mpin . ',
            "amount": ' . ($amount) . ',
            "product_identity": "' . $uniqueProductId . '",
            "product_name": "' . $uniqueProductName . '",
            "product_url": "' . $uniqueUrl . '"
    }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            )
        );

        $response = curl_exec($curl);

        curl_close($curl);
        $parsed = json_decode($response, true);


        if (key_exists("token", $parsed)) {
            $token = $parsed["token"];

        } else {
            $error_message = "incorrect mobile or mpin";




        }
    } catch (Exception $e) {
        $error_message = "incorrect mobile or mpin";

    }


}

// otp verification
if (isset($_POST["otp"]) && isset($_POST["token"]) && isset($_POST["mpin"])) {
    try {
        $otp = $_POST["otp"];
        $token = $_POST["token"];
        $mpin = $_POST["mpin"];


        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://khalti.com/api/v2/payment/confirm/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
            "public_key": "' . $khalti_public_key . '",
            "transaction_pin": ' . $mpin . ',
            "confirmation_code": ' . $otp . ',
            "token": "' . $token . '"
    }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            )
        );

        $response = curl_exec($curl);

        curl_close($curl);
        $parsed = json_decode($response, true);

        if (key_exists("token", $parsed)) {
            $isvalid = checkValid($parsed);
            if ($isvalid) {
                $error_message = "<span style='color:green'>payment success</span> <script> window.location='" . $successRedirect . "'; </script>";
            }


        } else {
            $error_message = "couldnot process the transaction at the moment.";
            if (key_exists("detail", $parsed)) {
                $error_message = $parsed["detail"];
            }

        }
    } catch (Exception $e) {
        $error_message = "couldnot process the transaction at the moment.";

    }


}
?>

<div class="khalticontainer">

    <center>
        <div><img src="khalti.png" alt="khalti" width="200"></div>
    </center>
    <?php
    if ($token == "") {

        ?>
    <form action="pay.php" method="post">
        <small>Mobile Number:</small> <br>
        <input type="number" class="number" minlength="10" maxlength="10" name="mobile" placeholder="98xxxxxxxx">
        <small>Khalti Mpin:</small> <br>
        <input type="password" class="mpin" name="mpin" minlength="4" maxlength="6" placeholder="xxxx">
        <small>Price:</small> <br>

        <input type="text" class="price" Value="Rs. <?php echo $price; ?>" disabled>
        <input type="hidden" class="price" name="amount" Value="<?php echo $price; ?>">
        <br>
        <span style="display:block;color:red;">
            <?php echo $error_message; ?>
        </span>
        <button>Pay Rs.
            <?php echo $price; ?>
        </button>
        <br>
        <small>We dont store your credientials for some security reasons. You will have to reenter your details
            everytime.</small>
    </form>
    <?php }
    if ($token != "") {
        ?>
    <form action="pay.php" method="post">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <input type="hidden" name="mpin" value="<?php echo $mpin; ?>">
        <small>OTP:</small> <br>
        <input type="number" value="" name="otp" placeholder="xxxx">
        <?php

            ?>
        <span style="display:block;color:red;">
            <?php echo $error_message; ?>
        </span>
        <button>pay RS.
            <?php echo $price; ?>

        </button>
    </form>
    <?php
    } ?>
</div>
<style>
.khalticontainer {
    width: 300px;
    border: 2px solid #5C2D91;
    margin: 0 auto;
    padding: 8px;
    padding-top: 90px;
}

input {
    display: block;
    width: 98%;
    padding: 8px;
    margin: 2px;
}

button {
    display: block;
    background-color: #5C2D91;
    border: none;
    color: white;
    cursor: pointer;

    width: 98%;
    padding: 8px;
    margin: 2px;
}

button:hover {
    opacity: 0.8;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>