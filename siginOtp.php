<?php

if(isset($_POST['sendopt'])) {
      //   require('textlocal.class.php');
      // define("API_KEY","MzI2OTYzNmI1MTMxMzUzMzc0NjE0ZDY5MzY1NTc1NTA=");
        // $textlocal = new Textlocal(false, false, API_KEY);

                // You can access MOBILE from credential.php
        // $numbers = array(MOBILE);
                // Access enter mobile number in input box
       
        require('Textlocal.class.php');
 
	$Textlocal = new Textlocal(false, false, 'NjkzNTc5Njc3ODUyNDE2YTU4NWEzMTMxNDM0ZDcyNTY=');
 
	$numbers = array(918897558177);
	$sender = 'TXTSHPY';
	$message = 'This is your message';
 
	$response = $Textlocal->sendSms($numbers, $message, $sender);
	print_r($response);

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
  <div class="bodysig">
    <div class="userarea">
    <div class=" container ">
      <h1 class="text-center">Shoppy</h1>
      <form action="siginOtp.php" method="post">
        <div class="contentnum">
          <small>Please Enter your number to verify</small>
          <div class="numb">
        <label for="numberin">Enter your number</label>
        </div>
        <input type="number" name="sendopt" class="numberin" placeholder="Enter your 10 digit number">
        </div>
        <div class="subnum">
        <button type="submit">Send OTP</button>
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