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

  <title>Cart</title>
</head>

<body onload="lood()">
  <div class="lodder-wrap" id="loadingDiv">
    <div class="loader"></div>
  </div>
  <?php include "sidebar.php" ;
  error_reporting(0) 
   ?>


  <div class="container porcart my-5">

    <!-- card for Products -->

    <?php

    require 'partials/Fetcher.php';
    $dicount = new DiscountAdder;

    $_SESSION['url'] = $_SERVER['REQUEST_URI'] . "?em=1";

    function statusRead($status, $prodprice, $Prod_uniq, $Discount)
    {
      if ($status == "Out of stock") {
        return '<div style="color: red;" >' . $status . '</div>';
      } else {

        $discount_percent = $Discount->DiscountFetcher($Prod_uniq, 'Percentage');
        $discount_amount = $Discount->DiscountFetcher($Prod_uniq, 'discount');
        if ($discount_amount != $discount_percent) {
          $discount_percent = $discount_percent . '% <p class="mb-0" style="margin-bottom:0em;">M.R.P:<strike>'.$prodprice.'</strike></p>';
        } else {
          $discount_percent = null;
        }

        return '&#8377;' . $discount_amount . '</b> <small class="text-danger" > ' . $discount_percent . '</small> ';
      }
    }

    if (isset($_SESSION['loggedin'])) {
      $user = $_SESSION['userid'];

      $sum = 0;


      include "partials/_dbconnect.php";
      $sql7 = "select * from  `cart` where user_id='$user'";
      $result7 = mysqli_query($con, $sql7);
      while ($row7 = mysqli_fetch_assoc($result7)) {
        $prodname = $row7['prod_name'];
        $proddescrip = $row7['prod_descrp'];
        $prodprice = $row7['prod_price'];
        $prodimage = $row7['prod_image'];
        $prodid = $row7['prod_id'];
        $prod_quant = $row7['prod_qunt'];
        $cart_id = $row7['cart_id'];

        $SQL = "SELECT status,prod_uniq from `products` where prod_id='$prodid' ";
        $query = mysqli_query($con, $SQL);
        while ($fetch =  mysqli_fetch_row($query)) {
          $prod_status = $fetch[0];
          $prod_und = $fetch[1];
        }



        echo '<div class="media mediacart  my-2">
           <a href="/shoppyproject/proview.php?prodid=' . $prodid . '" ><img class="align-self-center mr-3" src="products/' . $prodimage . '" alt="Generic placeholder image"></a>
            <div class="media-body">
            <h5 class="mt-0">' . $prodname . '</h5>
              <p>' . substr($proddescrip, 0, 40) . '</p>
              <p class="mb-0 "><b>' . statusRead($prod_status, $prodprice, $prod_und, $dicount) . '</b></p>

              <div class="qunter">
              <button type="button" name="quntity" class="btn btn-light" data-toggle="modal" data-target="#MYModal' . $prodid . '">Qty:' . $prod_quant . '</button>
              </div><span>



              <button class="btn btn-dark"><a href="cartremoves.php?ProdId=' . $cart_id . '" class="text-light">Remove</a></button>
              </span>
              </div>
              </div>';



        // modal 
        echo '
              
              <!-- Modal -->
              <div class="modal fade" id="MYModal' . $prodid . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Select Quatity</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <div id="list-example" class="list-group">
                      <a class="list-group-item list-group-item-action" href="partials/_addquantity.php?prodid=' . $prodid . '&qaunt=1"> 1</a>
                      <a class="list-group-item list-group-item-action" href="partials/_addquantity.php?prodid=' . $prodid . '&qaunt=2"> 2</a>
                      <a class="list-group-item list-group-item-action" href="partials/_addquantity.php?prodid=' . $prodid . '&qaunt=3"> 3</a>
                      <a class="list-group-item list-group-item-action" href="partials/_addquantity.php?prodid=' . $prodid . '&qaunt=4"> 4</a>
                      <a class="list-group-item list-group-item-action" href="partials/_addquantity.php?prodid=' . $prodid . '&qaunt=5"> 5</a>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              ';


        if ($prod_status == "Out of stock") {
          continue;
        } else {
          $prod_price =$dicount->DiscountFetcher($prod_und,"discount");
          $prodprice =  $prod_price * $prod_quant;
          $sum = $prodprice + $sum;
        }
      }
      echo '<b>Note :</b> <p> If you buy more items at a time it will reduce delivery charges.</p> ';
      echo '</div>';
      echo '<div class="cartbuy " >
            <div class="container">
            <h3>Total price :&#8377;' . $sum . '</h3> 
            <form action="orderconfirmation.php?pk=true" method="post"><div class="btnpro my-4">
                <button type="submit" class="btn btn-warning but1">Buy all items in cart</button>
                </div></form>
                </div></div>';



      echo '<div class="cartspace"> </div>';
    } else {
      echo '<div class="container">';
      echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">You are not logged in</h1>
              <p class="lead">Please login to  your account to add items to the cart .</p>
            </div>
          </div> </div>';
    }



    ?>


    <!-- <div class="cartbuy mediacart" >
        <h3>Total price :&#8377;'.$sum.'</h3> 
        <b>Note :</b> <p> If you book more items at a time it will reduce delivery charges.</p> 
        <form action="#"><div class="btnpro my-4">
            <button type="submit" class="btn btn-warning but1">Buy all items in cart</button>
            </div></form>
            </div> -->
    <!-- <div class="media mediacart my-2">
  <img class="align-self-center mr-3" src="Ytal Orange.jpeg" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0">Center-aligned media</h5>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, impedit.</p>
    <p class="mb-0 my-2"><b>&#8377;889</b></p>
    <button class="btn btn-success"><a href="#" class="text-light">Buy Now</a></button>
    <button class="btn btn-danger"><a href="#" class="text-light">Remove</a></button>
  </div>
</div>
        <div class="media mediacart my-2">
  <img class="align-self-center mr-3" src="Ytal Orange.jpeg" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0">Center-aligned media</h5>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, impedit.</p>
    <p class="mb-0 my-2"><b>&#8377;889</b></p>
    <button class="btn btn-success"><a href="#" class="text-light">Buy Now</a></button>
    <button class="btn btn-danger"><a href="#" class="text-light">Remove</a></button>
  </div>
</div>
        <div class="media mediacart my-2">
  <img class="align-self-center mr-3" src="Ytal Orange.jpeg" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0">Center-aligned media</h5>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, impedit.</p>
    <p class="mb-0 my-2"><b>&#8377;889</b></p>
    <button class="btn btn-success"><a href="#" class="text-light">Buy Now</a></button>
    <button class="btn btn-danger"><a href="#" class="text-light">Remove</a></button>
  </div>
</div>
        <div class="media mediacart my-2">
  <img class="align-self-center mr-3" src="Ytal Orange.jpeg" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0">Center-aligned media</h5>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, impedit.</p>
    <p class="mb-0 my-2"><b>&#8377;889</b></p>
    <button class="btn btn-success"><a href="#" class="text-light">Buy Now</a></button>
    <button class="btn btn-danger"><a href="#" class="text-light">Remove</a></button>
  </div>
</div>
         -->
         

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
  </form>
</body>

</html>