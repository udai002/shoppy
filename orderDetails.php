<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="shoppy1.css">
    <title>Order Details</title>
    <style>
        .card img{
            float: right;
        }
        .cardcont{
            float: left;
            text-align: left;
            justify-content: center;
            justify-items: center;
            font-size: 17px;

        }
        .cardcont i{
            margin: 3px 3px;
            font-weight: bold;

        }
        .rw-ui-container{
            font-size: 40px;
            height: 40px;
            width: 40px;
        }
        .modal-body .Starcont {
          display: flex;
          flex-direction: row-reverse;
          align-items: center;
          justify-content: center;

         
            /* display: none; */
        }
        .modal-body .Starcont input{
          display: none;
        }
        .modal-body .Starcont .rate{
            /* font-size: 30px; */
            font-size: 40px;
            color: #444;
            padding: 10px;
            /* float: right; */
            transition: all 0.2s ease;
        }
        .Starcont input:not(:checked) ~ label:hover
        , .Starcont :not(:checked) ~ label:hover ~ label {
          color: #fd4;
        }
        .Starcont input:checked ~ .rate{
          color:#fd4;
        }
        .cntr{
            justify-content: center;
            align-items: center;
            align-content: center;
        }
        #feedprod{
          font-size: 18px
        }
        .checked{
          color: #fd4;
        }
        .rated{
          float: left;
            text-align: left;
            justify-content: center;
            
            font-size: 17px;
        }
        .feedbacked{
          float : left;
            text-align: left;
            justify-content: center;
            justify-items: center;
            font-size: 17px;


        }
    </style>
    <link rel="stylesheet" href="css/all.css">
</head>

<body onload="lood()">
    <div class="lodder-wrap" id="loadingDiv">
        <div class="loader"></div>
    </div>
    <?php include "sidebar.php" ?>
    <?php
    require "partials/_dbconnect.php";
        // session_start();
        $userId=$_SESSION['userid'];
        $prodId=base64_decode($_REQUEST['prod']);
        $main = "SELECT * FROM `orders` WHERE user_id='$userId' AND product_id='$prodId'  ";
        $query=mysqli_query($con , $main);
        while($rowder = mysqli_fetch_assoc($query)){
            $orderId=$rowder['order_id'];
            $prodName=$rowder['prod_name'];
            $prodImage=$rowder['prod_image'];
            $prod_qaunt=$rowder['prod_quanti'];
            $prodprice=$rowder['prod_price'];
            $tota=$rowder['total_price'];
            $username=$rowder['user_name'];
            $userMob=$rowder['user_mobile'];
            $userAdd=$rowder['user_address'];
            $userCity=$rowder['user_city'];
            $userPin=$rowder['user_pin'];
            $userDist=$rowder['user_dist'];
            $userState=$rowder['userstate'];
        }
        

    ?>
    <div class="container my-3">
        <h1>Fetching details...</h1>
        <div class="card text-dark bg-white mt-1">
            <h5 class="card-header">Order#:<?php echo $orderId ?></h5>
            <!-- <div class="card-body ">
                
                
            </div> -->
        </div>
        <div class="card text-dark bg-white mt-1">
            <h5 class="card-header">Contact details</h5>
            <div class="cardcont my-1"><i class='bx bxs-user-rectangle'></i><?php echo $username ?></div>
            <div class="cardcont my-1"><i class='bx bxs-phone'></i><?php echo $userMob ?></div>
            <div class="cardcont my-1"><i class='bx bx-envelope' ></i><?php echo 'ewuhber2@' ?>@002</div>
            <div class="cardcont my-1"><i class='bx bx-navigation'></i><?php echo $userAdd ?> ,<?php echo $userPin ?>,<?php echo $userCity ?> ,<?php echo $userDist ?>, <?php echo $userState ?></div>
            
        </div>
        <div class="card text-dark bg-white mt-1">
            <h5 class="card-header">item ordered</h5>
            <div class="cardcont my-1"><img src="products/<?php echo $prodImage ?>" alt="#####" height="130px" width="100px"></div>
            <div class="cardcont my-1" style="position:absolute; left:18px; top:70px;"><?php echo $prodName ?><div class="my-2">QTY:<?php echo $prod_qaunt ?></div><div class="my-2">Price:<?php echo $prodprice ?></div><div class="my-2">Total price :<?php echo $tota ?></div></div>
            
            
        </div>
        <div class="card text-dark bg-white mt-1">
            <div class="cardcont my-1"><i class='bx bx-wallet'></i>payment</div>           
        </div>
        <div id="accordion">
  <div class="card text-dark bg-white">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Track your order
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  
    </div>
       
   
    <?php
    
    $Sql2="SELECT * FROM `feedbac` where order_id = '$orderId' and prod_id ='$prodId'";
    $Query2=mysqli_query($con,$Sql2);
    $noofrows= mysqli_num_rows($Query2);

    if($noofrows > 0){
      echo ' <div class="card text-dark bg-white mt-1">
      <div class="card-header">
        You rating of this product 
      </div>
      <div class="rated">';

      $mysql = "SELECT Rating , feedback FROM `feedbac` where order_id = '$orderId' and prod_id ='$prodId'";
        $sqli =  mysqli_query($con , $mysql);
        while($fetch = mysqli_fetch_row($sqli)){
          $rating  = $fetch[0];
          $opp  = $fetch[1];
          echo ' <div class="card text-dark bg-white mt-1">
          <div class="rated">';
          
          for($i=0 ; $i<$rating ; $i++){
            echo '<i class="bx bxs-star checked"></i>';
          }
          for($j=$rating; $j<5 ; $j++){
            echo  '<i class="bx bxs-star"></i>';
          }

          echo '</div>
          <div class="feedbacked">
              <p>'.$opp.'</p>
          </div>
        </div>
        </div>';

        }
    }else{
        echo ' <div class="card text-dark bg-white">
        <div class="card-header" id="headingOne">
        <div class="cntr"><button type="button" class="btn btn-warning my-3" data-toggle="modal" data-target="#exampleModalCenter" >
      Rate the product
    </button></div>
    
    
         </div>
        <!-- Button trigger modal -->
        
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Thank you for rating the product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="partials/FeedBackhandles.php" method="POST">
          <div class="Starcont">
            <input type="radio" value="5" name="radio1" id="rate1">
            <label for="rate1"  class="bx bxs-star rate"></label>
            <input type="radio" value="4" name="radio1" id="rate2">
            <label for="rate2" class="bx bxs-star rate"></label>
            <input type="radio" value="3" name="radio1" id="rate3">
            <label for="rate3" class="bx bxs-star rate"></label>
            <input type="radio" value="2" name="radio1" id="rate4">
            <label for="rate4" class="bx bxs-star rate"></label>
            <input type="radio" value="1" name="radio1" id="rate5">
            <label for="rate5" class="bx bxs-star rate"></label>
        </div>
        <div class="feedbox">
          <textarea name="feedprod" class="py-1 px-1" id="feedprod" cols="30" rows="5" placeholder="How is the product ?" ></textarea>
          <input type="hidden" name="prodid" value="'. $prodId .'">
          <input type="hidden" name="userid" value="'. $userId  .'">
          <input type="hidden" name="orderId" value="'. $orderId .'">
        </div>
        <div class="feedSub">
          <button type="submit" class="btn btn-primary my-2">Submit</button>
        </div>
        </form>
          </div>
          </div>
        
        </div>
      </div>
    </div>';
    }
        
    ?>
    </div>
   

</body>
<?php include "footer.php" ?>
<script>
    $('.collapse').collapse('toggle')
    const rate = document.querySelectorAll(".rate");
    rate.foreach( (star,i)=>{
      star.onclick = function(){
        console.log(star);
      }
    })
</script>
<script src="shopping.js"></script>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>

</html>