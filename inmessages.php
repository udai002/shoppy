<?php

function fetch_Value($data, $table_name, $name, $refer,)
{
  include 'partials/_dbconnect.php';
  $query = "select * from `$table_name` where $name=$refer ";
  $result = mysqli_query($con, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    return $row[$data];
  }
}

function check_null($prod_Answer, $prod_quest)
{
  if ($prod_Answer == NULL or $prod_Answer == " ") {
    $form = '<form action="partials/_answerhandles.php?Question=' . $prod_quest . '" method="POST"><input type="text" name="answers" id="answers"> <div class="btn"><button class="btn btn-primary" type="submit">Submit</button></div></form>';
    return $form;
  } else {
    return $prod_Answer;
  }
}


?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="shoppy1.css">

  <title>shoppy</title>
</head>

<body>
  <?php include "sidebar.php" ?>
  <?php include "controlnavs.php" ?>

  <div class="container2 my-3">
  <?php
  if ($_SESSION['userid'] == 15 or $_SESSION['useremail'] == 'owner@1') {
    echo '
   <table class="table" id="Table1">
         <thead>
           <tr>
             <th >Sno</th>
             <th >Product</th>
             <th >Question</th>
             <th >Answer</th>
             <th >user</th>
             <th >link</th>
           </tr>
         </thead>
         <tbody>';
    include "partials/_dbconnect.php";
    $sql16 = "select * from `prodquestion`";
    $result16 = mysqli_query($con, $sql16);
    while ($row16 = mysqli_fetch_assoc($result16)) {
      $user_id = $row16['user_id'];
      $prod_id = $row16['prod_id'];
      $prod_quest = $row16['Question'];
      $prod_Answer = $row16['Answer'];
      $User_name = fetch_Value('user_name', 'usersdata', 'user_id', $user_id);
      $prod_name = fetch_Value('pro_title', 'products', 'prod_id', $prod_id);


      echo ' <tr>
          <td>' . $prod_id . '</td>
          <td>' . $prod_name . '</td>
          <td>' . $prod_quest . '</td>
          <td>' . check_null($prod_Answer, $prod_quest) . '</td>
          <td>' . $User_name . '</td>
          <td><a href="proview.php?prodid=' . $prod_id . '">View product</a></td>
        </tr>
        
        ';
    }
    echo '</tbody>
    </table>';
  } else {
    echo 'you are not authorised';
  }
 ;

  echo '<div class="cantain2"><hr></div>';


 

  
  // if ($_SESSION['userid'] == 15 or $_SESSION['useremail'] == 'owner@1') {
  //   echo '
  //  <table class="table" id="Table2">
  //        <thead>
  //          <tr>
  //            <th >Sno</th>
  //            <th >Mail</th>
  //            <th >Phno</th>
  //            <th >About</th>
  //            <th >Message</th>
  //          </tr>
  //        </thead>
  //        <tbody>';
  //   include "partials/_dbconnect.php";
  //   $sql17 = "select * from `user_message`";
  //   $result17 = mysqli_query($con, $sql17);
  //   while ($row17 = mysqli_fetch_assoc($result17)) {
  //     $user_mail = $row17['user_mail'];
  //     $phno = $row17['user_mobile'];
  //     $selected = $row17['user_selected'];
  //     $Message = $row17['user_message'];
      


  //     echo ' <tr>
  //         <td>1</td>
  //         <td>' . $user_mail . '</td>
  //         <td>' . $phno . '</td>
  //         <td>' . $selected . '</td>
  //         <td>' . $Message . '</td>
  //       </tr>
        
  //       ';
  //   }
  // } else {
  //   echo 'you are not authorised';
  // }


  ?>
  </tbody>
  </table>

  </div>
  <?php
  include 'footer.php'
  ?>




  <script src="shopping.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#Table1').DataTable();

    });


    $(document).ready(function() {
      $('#Table2').DataTable();

    });
  </script>


</body>

</html>