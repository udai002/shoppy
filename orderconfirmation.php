<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="shoppy1.css">

  <title>Watch collection</title>
</head>

<body onload="lood()">
  <div class="lodder-wrap" id="loadingDiv">
    <div class="loader"></div>
  </div>
  <?php include "sidebar.php" ?>


  <?php
  // $pro_quanti=$_GET['pro_quanti'];
  // session_start();
  include "partials/_dbconnect.php";
  require 'partials/Fetcher.php';
  error_reporting(0);
  $pk = $_GET['pk'];
  $Apikey = "rzp_test_4DFn1ZgZScqEae";
  $tran_id = 'ORD' . rand(10000, 999999);

  $Discount = new DiscountAdder;




  $totaPrice = 0;

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $user_id = $_SESSION['userid'];

    $sql20 = "select * from `usersdata` where user_id='$user_id'";
    $result20 = mysqli_query($con, $sql20);
    while ($row20 = mysqli_fetch_assoc($result20)) {
      $user_name = $row20['user_name'];
      $user_num = $row20['user_mobile'];
      $user_email = $row20['user_mail'];
      $userAdd = $row20['user_address'];
      $userPin = $row20['user_pincode'];
      $userCity = $row20['usercity'];
      $userDist = $row20['userdist'];
      $userState = $row20['user_state'];
    }



    echo '<div class="ordercontainer">
    <div class="orderitems  " >
    <table class="table2">
      <thead>
        <tr>
          <th>Product</th>
          <th>Product name</th>
          <th>Product price</th>
          <th>Quantity</th>
        </tr>
      </thead>';


    if ($pk == true) {

     
      $sql23 = "select * from `cart` where user_id ='$user_id' ";
      $result23 = mysqli_query($con, $sql23);
      while ($row23 = mysqli_fetch_assoc($result23)) {
        $prod_id = $row23['prod_id'];
        $prod_qunt = $row23['prod_qunt'];

        $sql19 = "select * from `products` where prod_id = '$prod_id'";
        $result19 = mysqli_query($con, $sql19);
        while ($row = mysqli_fetch_assoc($result19)) {
          $price = $row['prod_price'];
          $prod_name = $row['pro_title'];
          $prod_image = $row['prod_image'];
          $prod_status = $row['status'];
          $prod_und = $row['prod_uniq'];
        }

        $price=$Discount->DiscountFetcher($prod_und,'discount');
        // echo $price*$prod_qunt;
        if ($prod_status == "Out of stock") {
          continue;
        } else {
          $totaPrice += ($price * $prod_qunt);

          echo '
    <tbody>
      <tr>
        <td><img height="50px" width="50px" src="products/' . $prod_image . '" alt="not" srcset=""></td>
        <td>' . $prod_name . '</td>
        <td>' . $price . '</td>
        <td>' . $prod_qunt . '</td> 
      </tr>
     
      
    
';
        }
      }

      // echo $totaPrice;
    } else {



      $pro_id = $_POST['pro_id'];
      $prod_qunt = $_POST['quntity'];






      $sql19 = "select * from `products` where prod_id = '$pro_id'";
      $result19 = mysqli_query($con, $sql19);
      while ($row = mysqli_fetch_assoc($result19)) {
        $price = $row['prod_price'];
        $prod_name = $row['pro_title'];
        $prod_image = $row['prod_image'];
        $prod_und = $row['prod_uniq'];

      }

      $price=$Discount->DiscountFetcher($prod_und,'discount');
      // echo $price*$prod_qunt;

      $totaPrice = $price * $prod_qunt;
      

      echo '
    <tbody>
      <tr>
        <td><img height="50px" width="50px" src="products/' . $prod_image . '" alt="not" srcset=""></td>
        <td>' . $prod_name . '</td>
        <td>' . $price . '</td>
        <td>' . $prod_qunt . '</td>
      </tr>
 
';
    }
  } else {
    echo '<div class="container my-5">';
    echo '<div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">You are not logged in</h1>
            <p class="lead">Please <a href="#">Login</a> or <a href="#">create account</a> to Buy an item .</p>
          </div>
        </div> </div>';


    exit();
  }
  

  ?>
  </tbody>
</table>
  
  

 

  </div>

  <?php 
  // include "partials/Fetcher.php";
  $user = new fetcher;
  $User_Name = $user->fetchdata($con,'user_name','user_id' , $user_id);
  $User_mobile = $user->fetchdata($con,'user_mobile','user_id' , $user_id);
  $User_Email = $user->fetchdata($con,'user_mail','user_id' , $user_id);
  $User_City = $user->fetchdata($con,'usercity','user_id' , $user_id);
  $User_state = $user->fetchdata($con,'userdist','user_id' , $user_id);
  $User_pincode = $user->fetchdata($con,'user_pincode','user_id' , $user_id);
  $User_address = $user->fetchdata($con,'user_address','user_id' , $user_id);

  ?>

  <div class="detailscon">
    <h4>Delivery Details</h4>
    <div class="confirmcon">
      <form action="">
        <div class="flexer">
      <div class="my-1">
        <label for="UserName">Name</label><div>
          <input type="text" name="UserName" value="<?php echo $User_Name ?>" id="UserName" disabled>
        </div>
      </div>
      <div class="my-1 pl-1" >
        <label for="UserMobile">Mobile NO</label><div>
          <input type="number" name="UserMobile" value="<?php echo $User_mobile ?>" id="UserMobile" disabled>
        </div>
      </div>
      <div class="my-1 pl-1" >
        <label for="UserEmail">Email</label><div>
          <input type="email" name="UserEmail" value="<?php echo $User_Email ?>" id="UserEmail" disabled>

        </div>
      </div>
      <div class="my-1 pl-1" >
        <label for="UserCity">City</label><div>
          <input type="text" name="UseCity" value="<?php echo $User_City ?>" id="UserCity" disabled>
        </div>
      </div>
      <div class="my-1 pl-1" >
        <label for="UserDistric">State</label><div>
          <input type="text" name="UserDistric" value="<?php echo $User_state ?>" id="UserDistric" disabled>
        </div>
      </div>
      <div class="my-1 pl-1" >
        <label for="UserPincode">pincode</label><div>
          <input type="text" name="UserPincode" value="<?php echo $User_pincode ?>" id="UserPincode " disabled>
        </div>
      </div>
      <hr>
      <div class="my-1">
        <label for="Addresss">Address</label><div>
          <textarea name="Addresss" id="Addresss"  cols="30" disabled><?php echo $User_address ?></textarea>
        </div>
      </div>
    </div>
    <div>
    <button type="submit" class="btn btn-primary" >Edit Details</button>
    </div>
      </form>
    </div>
  </div>

 

  

</div>
<div class="ordercontainer">
  <form action="PaytmKit/pgRedirect.php" method="POST">
    <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  $tran_id; ?>">

    <input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $user_id; ?>">

    <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">

    <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">

    <input type="hidden" title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php echo $totaPrice;  ?>">

    <input type="hidden" name="hidden">
    <input type="hidden" value="<?php echo $pro_id ?>" name="prodid">
    <input type="hidden" value="<?php echo $prod_qunt ?>" name="prodqunt">
    <input type="hidden" value="<?php echo $tran_id ?>" name="transid">
    <input type="hidden" value="<?php echo $user_id ?>" name="userID">
    <input type="hidden" value="<?php echo $totaPrice ?>" name="totaprice">
    <?php
    if ($pk == true) {
      echo '<input type="hidden" value="true" name="pk" >';
    }
    ?>

    <input class="btn btn-warning my-3" value="Place your order" type="submit" style="width: 300px;">




  </form>
</div>

<?php include "footer.php"   ?>
</body>
  <script src="shopping.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>