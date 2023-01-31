

<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    $userId = $_SESSION['userid'];
    $prodId = $_GET['prod_id'];
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        require "_dbconnect.php";
        $question1 = $_POST['prodQuest'];
        // echo $question1;
        if($question1==''){
            $errorinsub=true;
            header("location:http://localhost/shoppyproject/proview.php?prodid=$prodId&errorinsub=$errorinsub");
        }
        else{

            $sql13 = "INSERT INTO `prodquestion` (`user_id`, `prod_id`, `Question`, `Answer`) VALUES ('$userId', '$prodId', '$question1', '');";
            $result13 = mysqli_query($con, $sql13);
            if ($result13) {
                // echo "successfullly submitted";
                header("location:http://localhost/shoppyproject/proview.php?prodid=$prodId");
            } else {
                echo "not inserted";
            }
        }
    }
}else{
    echo "your are not logged in";
}

?>