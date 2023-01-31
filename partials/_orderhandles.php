

  <?php
  session_start();
  include "_dbconnect.php";
  $prod_quanti=$_GET['pro_quanti'];
  $prodid=$_GET['pro_id'];
  $sql3 = "select * from `products` where prod_id='$prodid' ";
  $result3 = mysqli_query($con, $sql3);
  while ($row3 = mysqli_fetch_assoc($result3)) {
    $prod_image = $row3['prod_image'];
    $prod_name = $row3['pro_title'];
    $prod_price = $row3['prod_price'];
    $prod_uni=$row3['prod_uniq'];
    

  }
 $totprice=$prod_quanti*$prod_price;
 $userord=$_SESSION['userid'];

 $sql8 = "select * from `usersdata` where user_id='$userord'";
 $result8 = mysqli_query($con, $sql8);
 while($row8=mysqli_fetch_assoc($result8)){
    $username=$row8['user_name'];
    $usermob=$row8['user_mobile'];
    $useraddress=$row8['user_address'];
    $usercity=$row8['usercity'];
    $usernav=$row8['usernavt'];
    $userdist=$row8['userdist'];
 }
 $order_uniq = uniqid("ORD-", true) ;
 $sql9="INSERT INTO `orders` (`order_id`, `prod_name`, `prod_image`, `product_id`, `prod_price`, `prod_quanti`,`total_price`,`user_id`, `user_name`, `user_mobile`, `user_address`, `user_city`, `user_navt`, `user_dist`, `date`) VALUES ('$order_uniq', '$prod_name', '$prod_image', '$prod_uni', '$prod_price', '$prod_quanti','$totprice','$userord', '$username', '$usermob', '$useraddress', '$usercity', '$usernav', '$userdist', current_timestamp());";
 $result9=mysqli_query($con,$sql9);
?>

