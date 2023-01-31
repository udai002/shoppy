<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    include '_dbconnect.php';
    $usermail=$_POST['Email'];
    $usermob=$_POST['Mobile_number'];
    $userselect=$_POST['selected'];
    $usermessage=$_POST['messagesus'];

    if($usermail=="" or $usermob=="" or $usermail==" "){
        header("location:../contact.php?enquire=unsuccessfull");
    }else{

    $sql17="INSERT INTO `user_message` (`user_mail`, `user_mobile`, `user_selected`, `user_message`) VALUES ('$usermail', '$usermob', '$userselect', '$usermessage');";
    $result17=mysqli_query($con,$sql17);
    if($result17){
        header("location:../contact.php?enquire=success");
    }
    }

}

?>