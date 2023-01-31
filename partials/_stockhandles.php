<?php
include '_dbconnect.php';

$prod_id=$_GET['prodid'];

$query="SELECT * from `products` where prod_id='$prod_id'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($result);
$data_status=$row['status'];

if($data_status==NULL or $data_status=='stock' or $data_status==" "){
    
    $query2="UPDATE `products` SET `status` = 'Out of stock' WHERE `products`.`prod_id` ='$prod_id'";
    $result2=mysqli_query($con,$query2);
    header("location:../inproducts.php");
    
    
}else{
    
    $query2="UPDATE `products` SET `status` = 'stock' WHERE `products`.`prod_id` ='$prod_id'";
    $result2=mysqli_query($con,$query2);
    header("location:../inproducts.php");
}

?>