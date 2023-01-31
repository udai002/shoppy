<?php
$answer = $_POST['answers'];
include '_dbconnect.php';
$prod_question = $_GET['Question'];
$sql = "UPDATE  prodquestion
    SET
        Answer='$answer'
     WHERE 
        Question='$prod_question' ";

$result = mysqli_query($con, $sql);
if ($result) {
    header('location:../inmessages.php');
} else {
    echo 'not uploaded';
}
