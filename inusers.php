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
  if ($_SESSION['userid']==15 or $_SESSION['useremail']=='owner@1') {
    echo '
   <table class="table" id="Table1">
         <thead>
           <tr>
             <th >Sno</th>
             <th >user</th>
             <th >usermail</th>
             <th >user mobile</th>
             <th >user address</th>
             <th >City</th>
             <th >District</th>
           </tr>
         </thead>
         <tbody>';
    include "partials/_dbconnect.php";
    $sql16 = "select * from `usersdata`";
    $result16 = mysqli_query($con, $sql16);
    while ($row16 = mysqli_fetch_assoc($result16)) {
      $user_id = $row16['user_id'];
      $user_name = $row16['user_name'];
      $user_phno = $row16['user_mobile'];
      $user_mail = $row16['user_mail'];
      $user_address = $row16['user_address'];
      $user_city = $row16['usercity'];
      $user_district = $row16['userdist'];

      echo ' <tr>
          <td>' . $user_id . '</td>
          <td>' .$user_name . '</td>
          <td>' . $user_mail . '</td>
          <td>' . $user_phno . '</td>
          <td>' . $user_address . '</td>
          <td>'.$user_city.'</td>
          <td>'.$user_district.'</td>
        </tr>
        '
        ;
    }
    
  }else{
    echo 'you are not authorised';
  }

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
  </script>
 
  
</body>

</html>