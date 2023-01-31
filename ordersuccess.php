<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>Watch collection</title>
</head>

<?php
$userid = $_SESSION['userid'];

$proId = $_POST['prodid'];
$proqaunt = $_POST['prodqunt'];
$TransId = $_POST['transid'];
$totaprice = $_POST['totaprice'];


require "partials/_dbconnect.php";
$sql21 = "select * from `usersdata` where user_id = '$userid'";
$result = mysqli_query($con, $sql21);
while ($row21 = mysqli_fetch_assoc($result)) {
    $user_name = $row21['user_name'];
    $user_mobile = $row21['user_mobile'];
    $user_address = $row21['user_address'];
    $user_mail = $row21['user_mail'];
    $city = $row21['usercity'];
    $disctic = $row21['userdist'];
    $usernav = $row21['usernavt'];
    $user_state = $row21['user_state'];
    $user_pincode = $row21['user_pincode'];
}

$sql22 = "select * from `products` where prod_id = '$proId'";
$resutl22 = mysqli_query($con, $sql22);
while ($row22 = mysqli_fetch_assoc($resutl22)) {
    $pro_name = $row22['pro_title'];
    $pro_price = $row22['prod_price'];
    $pro_descrip = $row22['product_descrip'];
    $pro_uniq = $row22['prod_uniq'];
    $pro_image = $row22['prod_image'];
    $pro_quant = $row22['pro_quant'];
    $prod_category = $row22['prod_category'];
}
// 8968022001
//inserting the order information into database
$main = "INSERT INTO `orders` (`order_id`, `prod_name`, `prod_image`, `product_id`, `prod_price`, `prod_quanti`, `total_price`, `user_id`, `user_name`, `user_mobile`, `user_address`, `user_city`, `user_navt`, `user_pin`, `user_dist`,`userstate`, `date`) VALUES ('$TransId', '$pro_name', '$pro_image', '$pro_uniq', '$pro_price', '$proqaunt', '$totaprice', '$userid', '$user_name', '$user_mobile', '$user_address', '$city', '$usernav', '$user_pincode', '$disctic','$user_state', current_timestamp()); ";
$query = mysqli_query($con, $main);

if ($query) {
    echo "your order succesfully placed view detials";
    exit();
}

?>

<body onload="lood()">
<div class="lodder-wrap" id="loadingDiv">
  <div class="loader"></div>
  </div>

</body>

</html>