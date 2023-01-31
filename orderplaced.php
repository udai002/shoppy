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

  <title>Watch collection</title>
</head>

<body>

  <?php include "sidebar.php" ?>
  <?php include "controlnavs.php" ?>

  <?php
  if (isset($_SESSION['loggedin']) && $_SESSION['useremail'] = "ownerr@1") {
    echo '
<table class="table" id="myTable">
      <thead>
        <tr>
          <th >Sno</th>
          <th >Product</th>
          <th >Costumer</th>
          <th >city</th>
          <th >district</th>
          <th >total price</th>
          <th >Order time</th>
          <th >Order id</th>
          <th >more</th>
        </tr>
      </thead>
      <tbody>';
    include "partials/_dbconnect.php";
    $sql10 = "SELECT * FROM `orders`";
    $result10 = mysqli_query($con, $sql10);
    $sno = 0;
    while ($row10 = mysqli_fetch_assoc($result10)) {
      $sno = $sno + 1;
      $prod_name = $row10['prod_name'];
      $username = $row10['user_name'];
      $city = $row10['user_city'];
      $userdist = $row10['user_dist'];
      $totalprice = $row10['total_price'];
      $ordertime = $row10['date'];
      $orderid = $row10['order_id'];
      $prod_und = $row10['product_id'];
      $User_id = $row10['user_id'];

      $orderCode = base64_encode($orderid);
      $prod_code = base64_encode($prod_und);
      $userCode = base64_encode($User_id);

      echo '<tr>
  <td>' . $sno . '</td>                        
  <td>' . $prod_name . '</td>
  <td>' . $username . '</td>
  <td>' . $city . '</td>
  <td>' . $userdist . '</td>
  <td>' . $totalprice . '</td>
  <td>' . $ordertime . '</td>
  <td>' . $orderid . '</td>
  <td><a href="deliverdetails.php?usr='.$userCode.'&pro='.$prod_code.'&ord='.$orderCode.'">More info</a></td>
</tr>';
    }
  } else {
    echo 'you are not authorised';
  }
  ?>

  <!-- <tr>
         <td>1</td>
         <td>juice</td>
         <td>mango juice</td>
         <td>600</td>
         <td>600</td>
         <td>ORD-jeriughg56ngit</td>
         <td>more info</td>
       </tr> -->
  </tbody>
  </table>


  
  <?php include "footer.php" ?>

  <script src="shopping.js"></script>
  <!-- Optional JavaScript; choose one of the two! -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();

    });
  </script>
  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>