<?php


$prod_Id=$_GET['prodid'];
$Prod_Quant=$_GET['qaunt'];

include "_dbconnect.php";
$sql = "UPDATE `CART` SET prod_qunt='$Prod_Quant' where prod_id='$prod_Id'";
$result=mysqli_query($con,$sql);
if($result){
    header("location:../cart.php?action=true");

}
else{
    header("location:../cart.php?action=false");
}
 

?>