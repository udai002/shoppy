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

    <title>Home</title>
  </head>
  <body onload="lood()">
    <div class="lodder-wrap" id="loadingDiv">
  <div class="loader"></div>
  </div>

  <?php
  include 'sidebar.php'

  ?>

  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Footers</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">cart</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link " href="#">About us</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> -->


      <?php
      //  include "sidebar.php" 
      ?>   
      <?php
      error_reporting(0);
        $logun=$_GET['logun'];
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
        //    echo '<div class="container"><div class="alert alert-success alert-dismissible fade show" role="alert"  style="position:absolute;">
        //    <strong>welocome!</strong> you are successfully logged into your account
        //    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //      <span aria-hidden="true">&times;</span>
        //    </button>
        //  </div></div>';
        }

        if(isset($logun)){
          echo '<div class="container"><div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Failed!</strong> '.$logun.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div></div>';
        }

       
      ?>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="footware slide 3.webp" alt="First slide" class="slidetop">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="footware slide2.jpg" alt="Second slide" class="slidetop">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="footware slide 3.webp" alt="Third slide" class="slidetop">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


     
        <!-- card for Products -->
      
      
    
        

<!-- categories -->
<div class="container my-2">
<h2>Brands</h2>

<div class="flexer  branders mt-2">
  <div class="imgcat py-3">
    <a href="products.php"><img src="bata logo.png" alt="Not Found" width="100px" height="100px">
    <div class=" catname my-2 text-center ">Bata</div>
    </a>
  </div>
  <div class="imgcat py-3">
    <a href="products.php"><img src="paragon logo.jpg" alt="Not Found" width="100px" height="100px">
    <div class=" catname my-2 text-center ">Paragon</div>
    </a>
  </div>
  <div class="imgcat py-3">
    <a href="products.php"><img src="walkmate logo.png" alt="Not Found" width="100px" height="100px">
    <div class=" catname my-2 text-center ">Walkmate</div>
    </a>
  </div>
  <div class="imgcat py-3">
    <a href="products.php"><img src="nike logo.jpg" alt="Not Found" width="100px" height="100px">
    <div class=" catname my-2 text-center ">Nike</div>
    </a>
  </div>
  
</div>

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