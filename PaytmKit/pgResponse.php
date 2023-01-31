<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
require "../partials/_dbconnect.php";


$paytmChecksum = "";


$transtatus=false;
$paramList = array();
$isValidChecksum = "FALSE";
$pk = $_GET['cart'];


$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if ($isValidChecksum == "TRUE") {
	
	if ($_POST["STATUS"] == "TXN_SUCCESS") {

		$userId = base64_decode($_REQUEST['userId']);
		$trans = base64_decode($_REQUEST['transid']);

		$sql21 = "select * from `usersdata` where user_id = '$userId'";
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

		require '../partials/Fetcher.php';
		$discount = new DiscountAdder;


		if (isset($pk) && $pk==true) {

			$sql23 = "select * from `cart` where user_id ='$userId' ";
			$result23 = mysqli_query($con, $sql23);
			while ($row23 = mysqli_fetch_assoc($result23)) {
				$prodId = $row23['prod_id'];
				$prodqunt = $row23['prod_qunt'];
				$totaPrice = 0;
				$sql19 = "select * from `products` where prod_id = '$prodId'";
				$result19 = mysqli_query($con, $sql19);
				while ($row = mysqli_fetch_assoc($result19)) {
					$pro_name = $row['pro_title'];
					$pro_price = $row['prod_price'];
					$pro_descrip = $row['product_descrip'];
					$pro_uniq = $row['prod_uniq'];
					$pro_image = $row['prod_image'];
					$pro_quant = $row['pro_quant'];
					$prod_category = $row['prod_category'];
					$prod_status = $row['status'];

					if($prod_status=="Out of stock"){
						continue;
					}else{
                    $pro_price = $discount->DiscountFetcher($pro_uniq,'discount');
					$totaPrice = $pro_price * $prodqunt;
					$main = "INSERT INTO `orders` (`order_id`, `prod_name`, `prod_image`, `product_id`, `prod_price`, `prod_quanti`, `total_price`, `user_id`, `user_name`, `user_mobile`, `user_address`, `user_city`, `user_navt`, `user_pin`, `user_dist`,`userstate`, `date`) VALUES ('$trans', '$pro_name', '$pro_image', '$pro_uniq', '$pro_price', '$prodqunt', '$totaPrice', '$userId', '$user_name', '$user_mobile', '$user_address', '$city', '$usernav', '$user_pincode', '$disctic','$user_state', current_timestamp()); ";
					$query = mysqli_query($con, $main);
					}
				}
			}
			$transtatus=true;
			
			
		} else{
			$prodId = base64_decode($_REQUEST['prodId']);
			// echo $prodId;
			$prodqunt = base64_decode($_REQUEST['prodqunt']);
			$totaprice = base64_decode($_REQUEST['totaprice']);
			// echo $totaprice;
			$sql = "select * from `products` where prod_id = '$prodId'";
			$resutl = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_assoc($resutl)) {
				$pro_name = $row['pro_title'];
				$pro_price = $row['prod_price'];
				$pro_descrip = $row['product_descrip'];
				$pro_uniq = $row['prod_uniq'];
				$pro_image = $row['prod_image'];
				$pro_quant = $row['pro_quant'];
				$prod_category = $row['prod_category'];

				$pro_price = $discount->DiscountFetcher($pro_uniq,'discount');
			

			// 89680001
			//inserting the order information into database
			$main = "INSERT INTO `orders` (`order_id`, `prod_name`, `prod_image`, `product_id`, `prod_price`, `prod_quanti`, `total_price`, `user_id`, `user_name`, `user_mobile`, `user_address`, `user_city`, `user_navt`, `user_pin`, `user_dist`,`userstate`, `date`) VALUES ('$trans', '$pro_name', '$pro_image', '$pro_uniq', '$pro_price', '$prodqunt', '$totaprice', '$userId', '$user_name', '$user_mobile', '$user_address', '$city', '$usernav', '$user_pincode', '$disctic','$user_state', current_timestamp()); ";
			$query = mysqli_query($con, $main);
			$transtatus=true;
			}
		}
		}

		// if ($query) {
			
		// 	exit();
		// }
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	} else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	// if (isset($_POST) && count($_POST)>0 )
	// { 
	// 	foreach($_POST as $paramName => $paramValue) {
	// 			echo "<br/>" . $paramName . " = " . $paramValue;
	// 	}
	// }




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>order status</title>
	<style>
		.gifordered{
			width: 270px;
			height: 250px;
			margin: auto;
			text-align: center;
			align-items: center;
			/* border: 2px solid black; */
			justify-content: center;
			margin-top: 100px;
			font-weight: bold;
			font-size: 20px;
		}
		.gifordered lottie-player{
			margin-left: 35px;
		}
		.gifordered1{
			width: 270px;
			height: 250px;
			margin: auto;
			text-align: center;
			align-items: center;
			/* border: 2px solid black; */
			justify-content: center;
			margin-top: 100px;
			font-weight: bold;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<?php
     if($transtatus){
		echo '<div class="gifordered">';
			echo '<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
			<lottie-player src="https://assets9.lottiefiles.com/packages/lf20_fsn177vt.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px; "    autoplay></lottie-player>';
			echo "your order placed succesfully ";
			// echo '<a href="../index.php">Home page</a>';
			echo 'You are redirecting to the order order page . please wait...';
			
 			header("Refresh:10;url=/shoppyproject/orders.php");
			echo '</div>';
			die();

	 }
	
	 else{
		echo '<div class="gifordered1">';
		echo ' <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
		<lottie-player src="https://assets10.lottiefiles.com/packages/lf20_pqpmxbxp.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"    autoplay></lottie-player>';
		 echo '<b>your order is not placed please try again</b>';
		 echo '</div>';
		 die();
	 }
	?>

</body>
</html>