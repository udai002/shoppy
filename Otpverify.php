<?php
$sent=$_GET['sent'];
$numenter=$_POST['Otpnum'];
if($numenter==$_COOKIE['otp']){
    echo "otp you entered is correct";
}else{
    echo "you entered a  wrong otp";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap CSS -->
     <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="shoppy1.css">

    <title>Sign in with OTP</title>
</head>
<body>
    <?php
        if($sent){
            echo "otp successfully sent";

        }
    ?>
  <div class="bodysig">
    <div class="userarea">
    <div class=" container ">
      <h1 class="text-center">Shoppy</h1>
      <form action="Otpverify.php" method="post">
        <div class="contentnum">
          <div class="numb">
        <label for="numberin">Enter  OTP</label>
        </div>
        <input type="number" name="Otpnum" class="numberin " placeholder="Enter OTP">
        </div>
        <div class="subnum verifyin">
        <button type="submit">verify OTP</button>
        </div>
      </form>    
      <div class="Later"><a href="">Do it Later</a></div>
    </div>
    </div>
    </div>



  <script src="shopping.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->
  
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>