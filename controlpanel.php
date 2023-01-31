<?php

function Noof_rows($Table_name){
  include 'partials/_dbconnect.php';
  $sql="select * from `$Table_name`";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_num_rows($result);
  return $rows;

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
  <?php include "controlnavs.php"?>
    <div class="container my-2">
    <div class="statics">
        <div class="statbox">
            <div class="imgcont"><img src="user5.png" alt="not found" srcset=""></div>
            <div class="content"><h3>Users</h3><p><?php echo Noof_rows('usersdata')  ?></p></div>
        </div>
        <div class="statbox">
            <div class="imgcont"><img src="p1.jfif" alt="not found" srcset=""></div>
            <div class="content"><h3>Products</h3><p><?php echo Noof_rows('products')  ?></p></div>
        </div>
        <div class="statbox">
            <div class="imgcont"><img src="order1.jfif" alt="not found" srcset=""></div>
            <div class="content"><h3>Orders</h3><p><?php echo Noof_rows('orders')  ?></p></div>
        </div>
        <div class="statbox">
            <div class="imgcont"><img src="message1.png" alt="not found" srcset=""></div>
            <div class="content"><h3>Messages</h3><p><?php echo Noof_rows('prodquestion')?></p></div>
        </div>
        <div class="statbox">
            <div class="imgcont"><img src="delivered.jfif" alt="not found" srcset=""></div>
            <div class="content"><h3>Delivered</h3><p>100</p></div>
        </div>
        <div class="statbox">
            <div class="imgcont"><img src="cancelled.jfif" alt="not found" srcset=""></div>
            <div class="content"><h3>Cancelled</h3><p>100</p></div>
        </div>
    </div>
    </div>

    <div class="cantain2"></div>

    <?php
    echo '<div class="container my-2>';
       if (isset($_SESSION['loggedin'])) {
        if ($_SESSION['useremail'] == "owner@1" or $_SESSION['userid']==15) {

            echo  '<div class="container my-3">
            <h2>Add product to sale</h2>
            <form action="ownerpag.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputEmail1">Enter product category</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Options</label>
                </div>
                <select class="custom-select" id="pro_cat" name="pro_cat">
                  <option selected>Choose Category</option>
                  <option value="Fashion">Fashion</option>
                  <option value="Mobiles and Tablets">Mobiles and Tablets </option>
                  <option value="Consumer Electronics">Consumer Electronics</option>
                  <option value="other Products">other Products.</option>
                  <option value="Groceries">Groceries</option>
                </select>
              </div>
              </div>

            
              <div class="form-group">
                <label for="exampleInputPassword1">Product name</label>
                <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="Product name">
              </div>
               <div class="form-group">
                <label for="pro_descrip">product description</label>
                <textarea class="form-control" id="pro_descrip" name="pro_descrip" rows="3"></textarea>
            </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Product price </label>
                <input type="number" class="form-control" id="pro_price" name="pro_price" placeholder="Product price">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">product Quantity</label>
                <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Options</label>
  </div>
  <select class="custom-select" id="pro_quant" name="pro_quant">
    <option selected>Choose quantity</option>
    <option value="/Case">Case</option>
    <option value="/Pieces">Pieces</option>
    <option value="/Kg">Kg</option>
    <option value="/Litres">Litres</option>
    <option value="/grams">grams</option>
    <option value=" "> </option>
  </select>
</div>
              </div>
            
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                       <input type="file" name="my_image" id="my_image">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>';
        }else{
          echo 'not found ';
        }
    } 
    echo '</div>';
    
    ?>
    
  
    <?php include "footer.php" ?>

    <script src="shopping.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>