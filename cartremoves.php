<?php
include 'partials/_dbconnect.php';
session_start();
$userId=$_SESSION['userid'];
$prodId=$_GET['ProdId'];
$sql12="DELETE FROM `cart` WHERE `user_id` = $userId and `cart_id`=$prodId";
$result12=mysqli_query($con,$sql12);
if($result12){
    header("location:cart.php");
}else{
    echo "not done ";
}
echo $userId;

?>