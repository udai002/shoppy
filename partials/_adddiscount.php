<?php





include "_dbconnect.php";
$EnterData=$_POST['discount'];

$prod_unq=$_GET['prodid'];

$sql="SELECT * FROM `products` WHERE prod_uniq='$prod_unq'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
    $prod_price=$row['prod_price'];
}


class AddDiscount{
    public $discountAmount;
    public $productAmount;
    public $percentage;

    function Addingdiscount($EnterData , $prod_price ){ 
          $discount=100-($EnterData/$prod_price)*100;
          $disountint = ceil($discount);
          return $disountint;
}
}


$obj = new AddDiscount();
$udai = $obj->Addingdiscount($EnterData,$prod_price);

include "Fetcher.php";

$fetctNoOf = new fetcher;
$Noofrows=$fetctNoOf->Fetchnumof("Prod_discount",'prod_uniq',$prod_unq);
echo $Noofrows;

if($Noofrows>0){
    $UPDATER = "UPDATE `Prod_discount`  SET 
    dicount_percent = '$udai',
    Discount_price = '$EnterData'
    WHERE
     prod_uniq = '$prod_unq'";
    $QUERER = mysqli_query($con , $UPDATER);
}else{
    $INSERT = "INSERT INTO `prod_discount` ( `dicount_percent`, `Discount_price`, `Prod_uniq`) VALUES ('$udai', '$EnterData', '$prod_unq')";
    $QUERER=mysqli_query($con ,$INSERT);
}

if($QUERER){
    header("location:../dicount.php");
}
