<?php

class fetcher{
    
    function fetch($con ,$wanted , $what , $where){
         
        $Sql2="SELECT $wanted FROM `feedbac` where $what = '$where'";
        $Query2=mysqli_query($con,$Sql2);
        $numrow = mysqli_num_rows($Query2);
        return $numrow;

    }

    function fetchdata($con,$row,$reference,$enter){
        $Sql = "SELECT $row FROM `usersdata` WHERE $reference = '$enter'";
        $query = mysqli_query($con,$Sql);
        $result= mysqli_fetch_row($query);
        return $result[0];
    }

    function fetchpro($con,$row,$reference,$enter){
        $Sql = "SELECT $row FROM `products` WHERE $reference = '$enter'";
        $query = mysqli_query($con,$Sql);
        $result= mysqli_fetch_row($query);
        return $result[0];
    }

    function Fetchnumof($table,$reference,$data){
        include "_dbconnect.php";
        $SQL = "SELECT * FROM `$table` WHERE $reference = '$data'";
        $QUERY = mysqli_query($con ,$SQL );
        $RESULT = mysqli_num_rows($QUERY);
        return $RESULT;
    }




}

class DiscountAdder {

    public $udiray=array();
    

    function DiscountFetcher($prod_unq ,$value2){
        include '_dbconnect.php';
        $fetchRows = new fetcher;
        $NoOfRows=$fetchRows->Fetchnumof('prod_discount','Prod_uniq',$prod_unq);
        if($NoOfRows>0){
            $sqller = "SELECT dicount_percent,Discount_price FROM `prod_discount` WHERE Prod_uniq='$prod_unq'";
            $Connecter = mysqli_query($con , $sqller);
            $rower = mysqli_fetch_row($Connecter);
            $udiray = array('Percentage'=>$rower[0],'discount'=>$rower[1]);
             return $udiray[$value2];
            
        }else{
            $fetchRows = new fetcher;
            $price = $fetchRows->fetchpro($con,'prod_price','prod_uniq',$prod_unq);
            return $price;
        }

    }

    

}


?>