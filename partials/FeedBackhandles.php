<?php

    $rating = $_POST['radio1'];
    $feedback = $_POST['feedprod'];
    $prod_id = $_POST['prodid'];
    $user_id = $_POST['userid'];
    $Order_id = $_POST['orderId'];
    echo $prod_id;
    $procode=base64_encode($prod_id);
    include "_dbconnect.php";
class feedBackTaker{
    
    function Insertor($rating, $feedback , $prod_id , $user_id, $Order_id , $con){
        $Sql = "INSERT INTO `feedbac` (`prod_id`, `user_id`, `Rating`, `Feedback`, `order_id`) VALUES ('$prod_id', '$user_id', '$rating', '$feedback', '$Order_id')";
        $Query=mysqli_query($con, $Sql);
        if($Query){
            return true;
        }
    
}
}



$feed = new feedBackTaker;
$result = $feed->Insertor($rating,$feedback,$prod_id,$user_id, $Order_id, $con);
if($result){
    header("location:../orderDetails.php?prod=$procode&status=true");
}else{
    header("location:../orderDetails.php?prod=$procode&status=false");
}

?>