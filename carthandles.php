<?php  

include "partials/_dbconnect.php";
 session_start();
 if (isset($_SESSION['loggedin'])){
$productid=$_GET['prodid'];
$productqunt=$_POST['quntity'];

$sql4="select * from  `products` where prod_id ='$productid'";
$result4=mysqli_query($con,$sql4);
while($row4=mysqli_fetch_assoc($result4)){
    $prod_name=$row4['pro_title'];
    $prod_descrip=$row4['product_descrip'];
    $prod_price=$row4['prod_price'];
    $prod_cat=$row4['prod_category'];
    $prod_image=$row4['prod_image'];
    
    $user=$_SESSION['userid'];

    $sql6="INSERT INTO `cart` (`cart_id`, `prod_cat`, `prod_name`, `prod_descrp`, `user_id`, `prod_price`, `prod_image`, `prod_id` , `prod_qunt`) VALUES (NULL, '$prod_cat', '$prod_name', '$prod_descrip', '$user', '$prod_price', '$prod_image', '$productid' , '$productqunt');";
    $result6=mysqli_query($con,$sql6);
    if($result6){   
        $result="successfully added to cart";
        header("location:/shoppyproject/products.php?result=$result");
    }

}
}else{
    header("location:products.php?result=please login to add products to the cart");
    die;
}
?>