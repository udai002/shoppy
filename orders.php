<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="shoppy1.css">

  <title>orders</title>
</head>

<body onload="lood()">
  <div class="lodder-wrap" id="loadingDiv">
    <div class="loader"></div>
  </div>
  <?php include "sidebar.php" ?>


  <div class="container procont my-5">
    <!-- card for Products -->
    <?php
    $_SESSION['url'] = $_SERVER['REQUEST_URI'] . "?";

    include "partials/_dbconnect.php";
    if (isset($_SESSION['loggedin'])) {
      $userid = $_SESSION['userid'];
      $sql11 = "select * from `orders` where user_id ='$userid'";
      $result11 = mysqli_query($con, $sql11);
      echo '<h1 class="mb-3">Items you ordered</h1>';


      while ($row11 = mysqli_fetch_assoc($result11)) {
        $proId = $row11['product_id'];
        $pro_price=$row11['prod_price'];
        $main = "select * from `products` where prod_uniq='$proId'";
        $query = mysqli_query($con, $main);

        while ($row12 = mysqli_fetch_assoc($query)) {
          $pro_name = $row12['pro_title'];
          // $pro_price = $row12['prod_price'];
          $pro_descrip = $row12['product_descrip'];
          $pro_uniq = $row12['prod_uniq'];
          $pro_image = $row12['prod_image'];
          $pro_quant = $row12['pro_quant'];
          $prod_category = $row12['prod_category'];
          $prodcode =base64_encode($proId);
          echo '<div class="media mediacart ">
            <img class="align-self-center mr-3" src="products/'.$pro_image.'" alt="Generic placeholder image">
            <div class="media-body">
               <h5 class="mt-0">'.$pro_name.'</h5>
               <p>'.substr($pro_descrip,10).'</p>
               <p class="mb-0 my-2"><b>&#8377;'.$pro_price.'</b></p>
               <button class="btn btn-warning"><a href="/shoppyproject/orderDetails.php?prod='.$prodcode.'" class="text-light">views Details</a></button>
               <!-- <button class="btn btn-danger"><a href="#" class="text-light">Cancel Order</a></button> -->
             </div>
           </div>';

           echo '';
        }
      }
    } else {
      echo '<div class="container lognot">';
      echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">You are not logged in</h1>
              <p class="lead">Please login to  your account to add items to the cart .</p>
            </div>
          </div> </div>';
    }
    ?>

    

  </div>
  <?php include "footer.php" ?>

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