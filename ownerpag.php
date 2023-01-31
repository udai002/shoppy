<?php

   include "partials/_dbconnect.php";
    if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
        $pro_cat=$_POST['pro_cat'];
        $pro_name=$_POST['pro_name'];
        $pro_descript=$_POST['pro_descrip'];
        $pro_price=$_POST['pro_price'];
        $pro_quant=$_POST['pro_quant'];
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $img_type = $_FILES['my_image']['type'];
        $img_tmp = $_FILES['my_image']['tmp_name'];
        $img_error = $_FILES['my_image']['error'];
        $prod_uniq = uniqid("PRO-", true) ;
        
        
        
        if ($img_error === 0) {
            echo "you entered with zero errors";
            if ($img_size > 225000) {
                echo "you can not upload image sorry its too large";
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_ic = strtolower($img_ex);
            $allow_ex = array("jpg", "jpeg", "png","jfif");
            
            if (in_array($img_ex_ic, $allow_ex)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_ic;
                $img_upload_path = 'products/' . $new_img_name;
                move_uploaded_file($img_tmp, $img_upload_path);
            $sql1="INSERT INTO `products` ( `prod_category`, `prod_uniq`,`prod_image`, `pro_title`, `product_descrip`, `prod_price`,`pro_quant`, `date`) VALUES ( '$pro_cat', '$prod_uniq' ,'$new_img_name', '$pro_name', '$pro_descript', '$pro_price','$pro_quant', current_timestamp())";
            $result1=mysqli_query($con,$sql1);
                header("location:/shoppyproject/products.php");

            }
        }
    } else {
        echo "please enter image";
    }
}


?>




