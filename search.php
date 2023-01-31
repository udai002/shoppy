

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

    <title>shoppy</title>
  </head>
  <body onload="lood()">
    <div class="lodder-wrap" id="loadingDiv">
  <div class="loader"></div>
  </div>
  
  <?php include "sidebar.php" ?>   
  <div class="container procont mt-5">
      <?php
      include "partials/_dbconnect.php";
        $query=$_GET['search'];
        $noresults=true;
        
        $sql="SELECT * FROM products WHERE MATCH(pro_title) AGAINST('$query') OR MATCH(product_descrip) AGAINST('$query');";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $prod_id = $row['prod_id'];
            $prod_image = $row['prod_image'];
            $prod_name = $row['pro_title'];
            $prod_descrip = $row['product_descrip'];
            $prod_price = $row['prod_price'];
            

            echo '<div class="media">
               <a href="/shoppyproject/proview.php?prodid=' . $prod_id . '"><img class="align-self-center mr-3 mt-2" src="products/' . $prod_image . '"
                       alt="Generic placeholder image"></a>
               <div class="media-body">
                   <h5 class="mt-0"><a href="/shoppyproject/proview.php?prodid=' . $prod_id . '">' . $prod_name . '</a> </h5>
                   <p>' .substr($prod_descrip,0,20). '</p>
                   <div class="mb-2">
                       <b>&#8377;' . $prod_price . '</b><br>
                   </div>
                   <div ><form action="/shoppyproject/carthandles.php?prodid='.$prod_id.' " method="post">
                   <input type="hidden" name="quntity" value="1">
                   <button class="btn btn-dark text-light" type="submit">Add to cart</button>
               </form> </div>
               </div>
           </div>';
        
        }
      ?>
  </div>
<?php   include "footer.php"?>



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