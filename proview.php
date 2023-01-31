<?php
include 'partials/Fetcher.php';
$Discount = new DiscountAdder;
function stock_check($prod_status, $prod_price, $prod_quant, $Prod_uniq ,$Discount)
{
  if ($prod_status == "Out of stock") {
    $changer = '<div class="stockcont">Out of stock.</div>';
    return $changer;
  } else {

    $discount_percent = $Discount->DiscountFetcher($Prod_uniq, 'Percentage');
    $discount_amount = $Discount->DiscountFetcher($Prod_uniq, 'discount');
    if ($discount_amount != $discount_percent) {
      $discount_percent = $discount_percent . '% <p aria-hidden="true" >M.R.P:<strike>'.$prod_price.'</strike></p>';
    } else {
      $discount_percent = null;
    }

    $changer = '<b>&#8377;' .$discount_amount . '</b> <small class="text-danger" > ' . $discount_percent . '</small>';
    return $changer;
  }
}

function stock_check2($prod_status)
{
  if ($prod_status == "Out of stock") {
    $buychange = '';
    return $buychange;
  } else {
    $buychange = ' <button type="submit" class="btn btn-warning but1 ">Buy Now</button>';
    return $buychange;
  }
}



?>


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

  <title>Watch collection</title>
</head>

<body onload="lood()">
  <div class="lodder-wrap" id="loadingDiv">
    <div class="loader"></div>
  </div>

  <?php include "sidebar.php" ?>
  <div class="flexer">
    <div class="container my-3 ">
      <?php
      $_SESSION['url'] = $_SERVER['REQUEST_URI'];

      error_reporting(0);
      $errorinsub = false;
      $errorinsub = $_GET['errorinsub'];
      if ($errorinsub) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      Please ask a valid question
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
      }



      $viewid = $_GET['prodid'];
      include "partials/_dbconnect.php";
      $sql3 = "select * from `products` where prod_id='$viewid' ";
      $result3 = mysqli_query($con, $sql3);
      while ($row3 = mysqli_fetch_assoc($result3)) {
        $prod_image = $row3['prod_image'];
        $prod_name = $row3['pro_title'];
        $prod_decrip = $row3['product_descrip'];
        $prod_price = $row3['prod_price'];
        $prod_quant = $row3['pro_quant'];
        $prod_cat = $row3['prod_category'];
        $prod_status = $row3['status'];
        $prod_und = $row3['prod_uniq'];



        echo '<div class="imgadj"><img src="products/' . $prod_image . '" class="img-fluid imgview" alt="Responsive image"></div>
                <div class="descrip my-3">
                    <h3>' . $prod_name . '</h3>
                    ' . $prod_decrip . '
                    <div class="rate my-3">' .
          stock_check($prod_status, $prod_price, $prod_quant,$prod_und,$Discount) . '
                    </div>';
      }
      ?>

      <div class="orderpro my-3">
        <form action="/shoppyproject/orderconfirmation.php" method="POST">
          <div class="quantity">
            <div class="input-group mb-3">
              <div class="input-group-prepend">

                <label class="input-group-text" for="inputGroupSelect01">Qty</label>
              </div>
              <div class="outbutton btn btn-dark" onclick="decrement()"> - </div><input type="number" class="quant" name="quntity" value=1 min="1" max="10">
              <div class="inbutton btn btn-dark" onclick="increment()"> + </div>
            </div>
          </div>
          <input type="hidden" name="pro_id" value="<?php echo $_GET['prodid'] ?>">
          <div class="btnpro">

            <?php echo stock_check2($prod_status) ?>
          </div>
        </form>
        <form action="carthandles.php?prodid=<?php echo $viewid ?>" method="POST">
          <input type="hidden" class="quant1" name="quntity" id="quntity" value=1 min="1" max="10">
          <!-- <input type="hidden" value="" name="prodid"> -->
          <button class="btn btn-dark but1" type="submit">Add to cart</button>
        </form>
        <script>
          var getdoc = document.getElementById("quntity");
          console.log(getdoc.value)
        </script>
      </div>
    </div>
  </div>
  <div class="cantain2"></div>
  <div class="container">
    <h4>Ask a Question</h4>
    <div class="QuestAsk">
      <form action="partials/_Questionhandles.php?prod_id=<?php echo $viewid ?>" method="post">
        <input type="text" name="prodQuest" id="prodQuest" placeholder="Ask a Question"><span><button type="submit" class="btn btn-dark">Submit</button></span>
      </form>
    </div>

    <?php

    $query = "SELECT Question , Answer FROM `prodquestion`  WHERE prod_id='$viewid' ORDER BY question_id DESC";
    $SQL = mysqli_query($con, $query);
    $count = 0;
    while ($fetch = mysqli_fetch_row($SQL)) {
      $Question = $fetch[0];
      $Answer = $fetch[1];


      if ($count < 3) {
        echo '
        <div class="py-2">
        <div class="quetHead"><b>' . $Question . '</b></div>
          <p>' . $Answer . '</p> </div>';

        $count++;
      }
    }

    ?>

    <?php
    // require "partials/Fetcher.php";
    echo '</div>
    <div class="cantain2"></div>
    <div class="container">';

    ?>
    <h4>Product images</h4>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      if ($_SESSION['useremail'] == "owner@1"  or $_SESSION['useremail'] == "Admin@1") {
        echo '<form action="partials/_productimages.php?prod_id=' . $viewid . '" method="POST" enctype="multipart/form-data" >
        <div class="input-group mb-3">
        <div class="input-group-prepend">
        <span class="input-group-text">Upload</span>
        </div>
        <div class="custom-file">
        <input type="file" name="pro_image" id="pro_image">
        </div>
        </div>
        <button type="submit" name="submit" class="btn btn-dark">Submit</button>
        
        </form>';
      }
    }
    echo '<div class="rowimg">';
    $sql14 = "select * from `prod_image` where prod_id=$viewid";
    $result14 = mysqli_query($con, $sql14);
    while ($row14 = mysqli_fetch_assoc($result14)) {
      $prod_name = $row14['img_name'];
      echo '<div class="colimg"><img src="productimage/' . $prod_name . '" alt="" srcset=""></div>';
    }



    echo '</div>';
    echo '  </div>
    <div class="cantain2">
    </div>
    <div class="container">';

    // echo '</div>';
    $rownum = new fetcher;
    $RowNum = $rownum->fetch($con, "*", "prod_id", $prod_und);

    if ($RowNum > 0) {
      echo '<h3 class=" mt-2" >Customer review</h3>';
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if ($_SESSION['useremail'] == "owner@1"  or $_SESSION['useremail'] == "Admin@1") {
        }
      }


      $k = 0;
      $sumRate = 0;
      $Sql2 = "SELECT user_id , Rating, Feedback FROM `feedbac` where prod_id = '$prod_und' order by Feed_id desc";
      $Query2 = mysqli_query($con, $Sql2);
      while ($ROW = mysqli_fetch_row($Query2)) {
        $usernum = $ROW[0];
        $Rate = $ROW[1];
        $Feed = $ROW[2];

        $Sql3 = "SELECT user_name from `usersdata` WHERE user_id = '$usernum'";
        $REsult = mysqli_query($con, $Sql3);
        $Name = mysqli_fetch_row($REsult);
        $NAME = $Name[0];





        if ($k < 3) {

          echo '<div class="reviewers">
      
            <div class="userhead">
              <i class="bx bxs-user-circle"></i><span class="user-name ">' . $NAME . '</span>
            </div>
            <div class="star-outer">
      
              <div class="star-inner ">';


          for ($i = 0; $i < $Rate; $i++) {
            echo '<i class="bx bxs-star checked"></i>';
          }
          for ($j = $Rate; $j < 5; $j++) {
            echo  '<i class="bx bxs-star"></i>';
          }
          echo '
              </div>
              <span class="number-rating"></span>
            </div>
            <p class="reviews">' . $Feed . '</p>
          </div>';
        }

        $sumRate = $Rate + $sumRate;



        $k++;
      }

      //   echo '<h3>Overall rating</h3>';

      // $avgRate = $sumRate/$RowNum;


      //  for($i=0 ; $i<$avgRate ; $i++){
      //   echo '<i class="bx bxs-star checked over"></i>';
      // }
      // for($j=$avgRate; $j<5 ; $j++){
      //   echo  '<i class="bx bxs-star over"></i>';
      // }
      // echo '<span>'.$avgRate.'/5.0</span>';
      // echo '</div>
      echo '</div>
    <div class="cantain2"></div>
    ';
    }

   $occur=0;
    echo '</div>
    <div class="container">';
    echo '<h3>Similar products</h3>';
    echo '<div class="mediapro">';
    $sql15 = "select * from `products` where prod_category = '$prod_cat'";
    $result15 = mysqli_query($con, $sql15);
    while ($row15 = mysqli_fetch_assoc($result15)) {
      $prod_id = $row15['prod_id'];
      $prod_image = $row15['prod_image'];
      $prod_name = $row15['pro_title'];
      $prod_descrip = $row15['product_descrip'];
      $prod_price = $row15['prod_price'];
      $occur++;
      if($occur<=3){

      echo ' <div class="media my-3 ">
      <a href="/shoppyproject/proview.php?prodid=' . $prod_id . '"><img class="align-self-center mr-3 mt-2" src="products/' . $prod_image . '"
              alt="Generic placeholder image"></a>
      <div class="media-body">
          <h5 class="mt-0"><a href="/shoppyproject/proview.php?prodid=' . $prod_id . '">' . $prod_name . '</a> </h5>
          <p>' . substr($prod_descrip, 0, 20) . '</p>
          <div class="mb-2">
              <b>&#8377;' . $prod_price . '</b><br>
          </div>
          <div ><form action="/shoppyproject/carthandles.php?prodid=' . $prod_id . ' " method="post">
          <input type="hidden" name="quntity" value="1">
          <button class="btn btn-dark text-light" type="submit">Add to cart</button>
      </form> </div>
      </div>
  </div>';
    }


    
  }
  
  echo '</div>';

    ?>


  </div>


  </div>


  <?php include "footer.php" ?>
</body>







<!-- <div class="rate">
                    <b>&#8377;889</b>
                </div> -->


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


</html>