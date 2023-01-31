<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="shoppy1.css">

    <title>Delivery Details</title>
</head>
<body>

<?php

$dk=$_GET['dk'];
$URL = $_SERVER['REQUEST_URL'];

echo $URL;

require "partials/_dbconnect.php";
$prodid =  base64_decode( $_REQUEST['pro']);
$Userid =  base64_decode( $_REQUEST['usr']);
$OrderID =  base64_decode( $_REQUEST['ord']);

if($dk==1){
    $SQLLER = "UPDATE  `orders` SET
    order_status = 1 
    WHERE order_id = '$OrderID' AND product_id='$prodid' ";
    $QUERER= mysqli_query($con,$SQLLER);
}elseif($dk=2){

}

require 'partials/Fetcher.php';


$sqller = "SELECT * FROM `usersdata`  where user_id = '$Userid'";
$querer = mysqli_query($con,$sqller);
while($rower = mysqli_fetch_assoc($querer)){
    $user_name = $rower['user_name'];
    $mobile = $rower['user_mobile'];
    $Address = $rower['user_address'];
    $City = $rower['usercity'];
    $user_pincode = $rower['user_pincode'];
    $distric = $rower['userdist'];
    $State = $rower['user_state'];
    $email = $rower['user_mail'];
}

$sqller2 = "SELECT * FROM `orders` WHERE user_id='$Userid' AND order_id ='$OrderID' ";
$querer2=mysqli_query($con,$sqller2);
while($rower2 = mysqli_fetch_assoc($querer2)){
    $ProdImage = $rower2['prod_image'];
    $prodName = $rower2['prod_name'];
    $prodPrice = $rower2['prod_price'];
    $prodQunt = $rower2['prod_quanti'];
    $total = $rower2['total_price'];
}




?>
    
<div class="container4 px-3">
    <h4>Buy's name and address</h4>
    <h2><?php echo $user_name  ?></h2>
    <p><?php echo $Address  ?> <br>,<?php echo $City  ?> ,<?php echo $State  ?> ,<?php echo $user_pincode  ?></p>

    <div class="mob">
        mobile number : <?php echo $mobile  ?>
    </div>
    <div class="mob">
        email : <?php echo $email  ?>
    </div>

    <div class="mob">
        Amount paid : <?php echo $total  ?>
    </div>

    <hr>

    if not deliverable return to

    <p><p>vuyyuru public school back side road , near AG and Sg college <br>,Dno 14/200,vuyyuru ,andhra pradesh ,521165</p></p>

    <hr>



    <h2>Product details</h2>
    <img src="products/<?php echo $ProdImage  ?>" alt="Not found" width="100px" height="100px"><br>
    <?php echo $prodName  ?> <br>
    Qty:<?php echo $prodQunt  ?> <br>
    price:<?php echo $prodPrice  ?><br>
    payment status : paid<br>
    <a href="#">View product</a>

    <div class="botCont my-2">
        <?php

       $SQLLER2= "SELECT order_status from `orders` WHERE order_id = '$OrderID' AND product_id='$prodid'";
       $QUERER2 = mysqli_query($con,$SQLLER2);
       $row = mysqli_fetch_row($QUERER2);
        $STATUS = $row[0];

        if($STATUS==1){
            echo '<button class="btn btn-dark"><a href="'.$URL.'?dk=2&alert=1" class="text-light"> Shipped</a></button>';
        }else{
            echo '<button class="btn btn-primary"><a href="'.$URL.'?dk=1&alert=1" class="text-light"> Shipped</a></button>';
        }
?>
        
    </div>



</div>

<script src="shopping.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->
  
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>
</html>