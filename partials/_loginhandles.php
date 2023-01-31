<?php
$showalert = false;
$showresult = false;


// INSERT INTO `usersdata` (`user_id`, `user_mail`, `user_name`, `user_mobile`, `user_address`, `user_password`, `date`) VALUES ('1', 'udai@123', 'udai', '909494057', 'vuuyuru public school back side road', 'udai@123', current_timestamp());
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  require "_dbconnect.php";

  $logmail = $_POST['logmail'];
  $logpassword = $_POST['logpassword'];
  $sql = "select * from `usersdata` where user_mail='$logmail'";
  $result = mysqli_query($con, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $hashed = $row['user_password'];
    if (password_verify($logpassword, $hashed)) {
      $showresult = true;
      session_start();
       $_SESSION['loggedin']=true;
       $_SESSION['userid']=$row['user_id'];
       $_SESSION['useremail']=$row['user_mail'];
       $url=$_SESSION['url'];
       if(isset($_SESSION['url'])){
         header("location:$url&login=true");
       }else{
         header("location:/shoppyproject/index.php?login=true");
       }
    } else {
      $showalert = true;
      echo "invalid crediantials ";
    }
  }
}
