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
      
      <nav class="navbar navbar-expand-lg navbar-dark addcolor bg-dark">
  <a class="navbar-brand" href="#">Settings</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#EDIT">Edit profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#FOOTER"> Contact us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Delete account</a>
      </li>
     
     
    </ul>

  </div>
</nav>
     <div class="container">
       <div class="userimg">
         <img src="user5.png" alt="" width="90px" height="90px">
         <div class="userName">udai</div>
         <h2 class="py-2">User Analysis</h2>
<p></p>
<br>

<div class="row" style="justify-content:center">
  <div class="column">
    <div class="card">
      <p><i class="fa fa-user"></i></p>
      <h3>10</h3>
      <p>items added to carts</p>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <p><i class="fa fa-check"></i></p>
      <h3>55+</h3>
      <p>Items Ordered</p>
    </div>
  </div>
    
  <div class="column">
    <div class="card">
      <p><i class="fa fa-coffee"></i></p>
      <h3>100+</h3>
      <p>Amount Spent</p>
    </div>
  </div>
</div>
       </div>

       <?php

        $user_id = $_SESSION['user_id'];
       include "partials/Fetcher.php";
       $FETCHDATA = new fetcher;
       $user_name = $FETCHDATA->fetchdata($con,'user_title','user_id' ,$user_id);



?>
       
     </div>
     <div class="cantain2 margner"></div>
     <div class="container my-2">
       <div class="settcontact my-2" id="EDIT">
         <h4>Edit Details</h4>
       <form class="my-4">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="USERMAIL">Email</label>
      <input type="email" class="form-control" id="USERMAIL" >
    </div>
    <div class="form-group col-md-6">
      <label for="USERNAME">Name</label>
      <input type="text" class="form-control" id="USERNAME" value='<?php echo $user_name  ?>' >
    </div>
  </div>
  <div class="form-group">
    <label for="USER_NUMBER">Mobile Number</label>
    <input type="number" class="form-control" id="USER_NUMBER" >
  </div>
  <div class="form-group">
    <label for="USER_ADDRESS">Address</label>
    <input type="text" class="form-control" id="USER_ADDRESS">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="USERCITY">City</label>
      <input type="text" class="form-control" id="USERCITY">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <input type="text" class="form-control" id="USERSTATE">
    </div>
    <div class="form-group col-md-2">
      <label for="USERZIP">Zip</label>
      <input type="text" class="form-control" id="USERZIP">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
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