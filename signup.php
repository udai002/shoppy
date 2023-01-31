<?php
require "partials/_dbconnect.php";
error_reporting(0);
$showalert = false;
$showempty=false;
$SHOWmail=false;
// INSERT INTO `usersdata` (`user_id`, `user_mail`, `user_name`, `user_mobile`, `user_address`, `user_password`, `date`) VALUES ('1', 'udai@123', 'udai', '909494057', 'vuuyuru public school back side road', 'udai@123', current_timestamp());
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $usermail = $_POST['usermail'];
  $username = $_POST['username'];
  $usermobile = $_POST['usermobile'];
  $useraddress = $_POST['useraddress'];
  $usercity = $_POST['usercity'];
  $usernat = $_POST['usernat'];
  $userpin = $_POST['userpin'];
  $userdis = $_POST['userdist'];
  $userstate = $_POST['userstate'];
  $spassword = $_POST['spassword'];
  $cpassword = $_POST['cpassword'];

  if(empty($usermail)){
    $showempty=true;
  }elseif(!filter_var($usermail, FILTER_VALIDATE_EMAIL)){
    $SHOWmail=true;
  }else{
  $sql = "select * from `usersdata` where user_mail='$usermail'";
  $result = mysqli_query($con, $sql);
  $numrow = mysqli_num_rows($result);
  if ($numrow > 0) {
    $error = "you are have a account with this email ";
    header("location:/shoppyproject/index.php?logun=$error");
  } else {
    if ($spassword == $cpassword) {
      $hash = password_hash($cpassword, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `usersdata` ( `user_mail`, `user_name`, `user_mobile`, `user_address`, `usercity`, `usernavt`,`user_pincode`, `userdist`,`user_state`, `user_password`, `date`) VALUES ( '$usermail', '$username', '$usermobile', '$useraddress', ' $usercity', '$usernat','$userpin', '$userdis','$userstate', '$hash', current_timestamp())";
      $result = mysqli_query($con, $sql);
    } else {
      $showalert = true;
      echo "password not matched ";
    }
  }
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="shoppy1.css">
</head>

<body onload="lood()">
<div class="lodder-wrap" id="loadingDiv">
  <div class="loader"></div>
  </div >
  <div class=body>
    <?php require "sidebar.php" ?>
  </div>
  <div class="container my-4">
    <?php
      if($showempty){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Please Enter all details to submit
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }elseif($SHOWmail){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Please Enter a valid email address
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }

    ?>
    <form action="/shoppyproject/signup.php" method="POST">
      <div class="form-group">
        <label for="usermail">Email address</label>
        <input type="email" class="form-control" id="usermail" name="usermail" ; placeholder="Enter email" require>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="username">Name</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Name" require>

      </div>
      <div class="form-group">
        <label for="usermobile">Mobile number</label>
        <input type="number" class="form-control" id="usermobile" name="usermobile"  placeholder="Mobile number" require>

      </div>
      <div class="form-group">
        <label for="useraddress">Address</label>
        <textarea class="form-control" id="useraddress" name="useraddress" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="usercity">City</label>
        <input type="text" class="form-control" id="usercity" name="usercity" placeholder="Enter city" require>

      </div>
      <div class="form-check form-check-inline my-3">
        <input class="form-check-input" type="radio" name="usernat" id="usernat" value="urban">
        <label class="form-check-label" for="inlineRadio1">Urban</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="usernat" id="inlineRadio2" value="rural">
        <label class="form-check-label" for="inlineRadio2">Rural</label>
      </div>
      <div class="form-group">
        <label for="userpin">Pincode</label>
        <input type="text" class="form-control" id="userpin" name="userpin" placeholder="Enter pincode" require>

      </div>
      <div class="form-group">
        <label for="userdist">District</label>
        <input type="text" class="form-control" id="userdist" name="userdist" placeholder="Enter district" require>

      </div>
      <div class="form-group">
        <label for="userdist">State</label>
        <input type="text" class="form-control" id="userstate" name="userstate" placeholder="Enter district" require>

      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Set password</label>
        <input type="password" class="form-control" id="myInput" name="spassword"  placeholder="Set password" require>

      </div>
      <div class="form-check my-2">
        <input type="checkbox" onclick="myFunction()" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" onclick="myFunction()" for="exampleCheck1">Show Password</label>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" require>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <script src="shopping.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>