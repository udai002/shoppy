<?php

include '_dbconnect.php';
$prod_uniq=$_GET['prodid'];
$updated=false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    error_reporting(0);
    $prode_name=$_POST['Prod_name'];
    $prode_descrip=$_POST['proddesp'];
    $prode_price=$_POST['Prod_price'];
    $sql2="UPDATE `products` 
         SET
            pro_title='$prode_name',
            product_descrip='$prode_descrip',
            prod_price='$prode_price'
        WHERE
            prod_uniq='$prod_uniq'
            ";
    $result2=mysqli_query($con,$sql2);
    if($result2){
        $updated=true;
    }else{
        $updated=false;
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
  <link rel="stylesheet" href="../shoppy1.css">

  <title>shoppy</title>
</head>

<body>
  <?php include "../sidebar.php" ?>
  <?php include "../controlnavs.php" ?>
  
  <div class="container my-3">
  <?php

if($updated){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>success!</strong> Successfully updated 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}



    $query1="select * from `products` where prod_uniq='$prod_uniq'";
    $result=mysqli_query($con,$query1);
    while($row=mysqli_fetch_assoc($result)){
        $prod_name=$row['pro_title'];
        $prod_descrip=$row['product_descrip'];
        $prod_price=$row['prod_price'];
        $prod_category=$row['prod_category'];
    }


?>


  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?prodid=<?php echo $prod_uniq ?>" method="POST">
  <div class="form-group">
    <label for="Prod_name">Product Name</label>
    <input type="text" class="form-control" id="Prod_name" name="Prod_name" value="<?php echo $prod_name ?>" aria-describedby="emailHelp" placeholder="Product Name">
  </div>
  <div class="form-group">
    <label for="proddesp">Description</label>
    <textarea class="form-control" id="proddesp" name="proddesp" onfocus="this.innerHTML='<?php echo $prod_descrip ?>'" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="Prod_price">Product price</label>
    <input type="number" class="form-control" id="Prod_price" name="Prod_price" value="<?php echo $prod_price ?>" aria-describedby="emailHelp" placeholder="Product price">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>

  <?php include "../footer.php" ?>
  <script src="../shopping.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

  </body>

</html>



