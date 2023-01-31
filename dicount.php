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

  <div class="container2 my-3">
    <?php

    include "partials/Fetcher.php";
    $DIscount = new DiscountAdder;
    if ($_SESSION['userid'] == 15 or $_SESSION['useremail'] == 'owner@1') {
      echo '
   <table class="table" id="Table1">
         <thead>
           <tr>
             <th >Sno</th>
             <th >Product</th>
             <th >Description</th>
             <th >product id</th>
             <th >price</th>
             <th >Added discount</th>
             <th >Dicount amount</th>
             <th >Dicount</th>
             <th >link</th>
           </tr>
         </thead>
         <tbody>';
      include "partials/_dbconnect.php";
      $sql16 = "select * from `products`";
      $result16 = mysqli_query($con, $sql16);
      while ($row16 = mysqli_fetch_assoc($result16)) {
        $prod_id = $row16['prod_id'];
        $prod_image = $row16['prod_image'];
        $prod_name = $row16['pro_title'];
        $prod_descrip = $row16['product_descrip'];
        $prod_price = $row16['prod_price'];
        $prod_uid = $row16['prod_uniq'];
        $prod_status = $row16['status'];

        if ($prod_status == NULL or $prod_status == ' ' or $prod_status == 'stock') {
          $sta_change = "out of stock";
        } else {
          $sta_change = "in stock";
        }


        $percent = $DIscount->DiscountFetcher($prod_uid, "Percentage");
        $dicount_amount = $DIscount->DiscountFetcher($prod_uid, "discount");

        if ($percent != $dicount_amount) {
          $percent = $percent . '%';
        } else {
          $percent = "No Discount added to this product";
        }

        echo ' <tr>
          <td>' . $prod_id . '</td>
          <td>' . $prod_name . '</td>
          <td>' . $prod_descrip . '</td>
          <td>' . $prod_uid . '</td>
          <td>' . $prod_price . '</td>
          <td class="text-danger" >' . $percent . '</td>
          <td>' . $dicount_amount . '</td>
          <td><form action="partials/_adddiscount.php?prodid=' . $prod_uid . '" method="post"><input type="text" name="discount" required><button class="btn btn-primary">Add discount</button></form></td>
          <td><a href="proview.php?prodid=' . $prod_id . '">View product</a></td>
        </tr>
        
        ';
      }
    } else {
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