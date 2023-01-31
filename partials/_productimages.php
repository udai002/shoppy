<?php

$prod_id=$_GET['prod_id'];
include "_dbconnect.php";
    if (isset($_POST['submit']) && isset($_FILES['pro_image'])) {

        $img_name = $_FILES['pro_image']['name'];
        $img_size = $_FILES['pro_image']['size'];
        $img_type = $_FILES['pro_image']['type'];
        $img_tmp = $_FILES['pro_image']['tmp_name'];
        $img_error = $_FILES['pro_image']['error'];
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
                $new_img_name = uniqid("PROIMG-", true) . '.' . $img_ex_ic;
                $img_upload_path = '../productimage/' . $new_img_name;
                move_uploaded_file($img_tmp, $img_upload_path);
            $sql1="INSERT INTO `prod_image` ( `prod_id`, `img_name`) VALUES ( '$prod_id' ,'$new_img_name')";
            $result1=mysqli_query($con,$sql1);
                header("location:/shoppyproject/proview.php?prodid=$prod_id");

            }
        }
    } 

    }else{
        echo "you are not ready";
    }

?>