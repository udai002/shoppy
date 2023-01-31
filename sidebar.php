<?php
session_start();

// error_reporting(0);

?>



<div class="body">
    <div class="nvbar">
        <div class="logo ">
            <div class="mt-2 py-2">
        <img src="titan logo.webp" alt="not found" width="30px" height="40px" class="my-1 mr-1"></div><span class="ml-1">Shoppy <span class="closetop"
                    onclick="openNav()">&Cross;
        </div>
        <div class="nvcontent">
            <ul> <?php
                if(isset($_SESSION['loggedin'])){
                    if($_SESSION['useremail']=='owner@1' or $_SESSION['userid']==15){
                        echo '<a href="/shoppyproject/controlpanel.php">
                        <li><i class="bx bxs-box"></i>Dashboard</li>
                    </a>';
                    }
               }
                ?>
                <a href="/shoppyproject/index.php">
                    <li><i class='bx bxs-home'></i> Home</li>
                </a>
                <a href="/shoppyproject/products.php">
                    <li><i class='bx bxl-product-hunt'></i> Products</li>
                </a>
                <a href="/shoppyproject/contact.php">
                    <li><i class='bx bxs-chat'></i>Message us</li>
                </a>
                <a href="/shoppyproject/orders.php">
                    <li><i class='bx bx-copy-alt'></i>My orders</li>
                </a>
               
                <a href="/shoppyproject/cart.php">
                    <li><i class='bx bxs-cart'></i>Cart</li>
                </a>
               
                <?php  
                  if(isset($_SESSION['loggedin'])){
                       echo '<a href="/shoppyproject/logout.php">
                       <li><i class="bx bx-log-out"></i> logout</li>
                   </a>';
                  }
                  else{
                     echo ' <a id="modopen" >
                     <li><i class="bx bx-log-in"></i>Signin</li>
                 </a>';
                }
                ?>
                
                <a onclick="openNav()">
                    <li id="closeside"><i class='bx bx-window-close '></i>close</li>
                </a>
            </ul>
        </div>
    </div>
</div>
<div class="containerbody">
    <div class="badycontent">
        <div class="topbar">
            <div class="logotop">
                <div class="openbtn" id="opennav" onclick="openNav()">
                    <i class='bx bx-menu text-dark'></i>
                </div>
                <div class="headmain text-dark">Shoppy</div>
                <div class="searchlap"> </div>
                <div class="searchhead">

                
                </div>
                <div class="userimg"><a href="settings.php"><i class='bx bxs-user-circle'></i></a></div>

            </div>
            
        </div>
    </div>
    <div class="searchm">
      <form action="search.php" method="get">
        <div class="searchma">
        <input type="search" name="search" placeholder="search">
        </div>
        <div class="searchkot">
        <button type="submit"> <i class='bx bx-search-alt'></i></button>
        </div>
      </form>
      </div>

    <div class="modl" id="mymodal">
          <div class="modlcon">
            <h1>WatchCollection </h1><div class="closemod" id="closem">&times;</div>
            <form action="partials/_loginhandles.php" method="POST">
                            <div class="form-group my-4 mx-2">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="logmail" name="logmail"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group my-4 mx-2">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="signInput" name="logpassword"
                                    placeholder="Password">
                            </div>
                            <div class="form-check my-4 mx-2">
                                <input type="checkbox" onclick="mypass()" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" onclick="mypass()" for="exampleCheck1">Show
                                    Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary ">Login</button>
                            <hr>
                            <a href="/shoppyproject/signup.php"><div class="btn btn-primary ">Signup</div></a>
                        </form>
          </div>
         
           
            
                  </div>
                  


                   <div class="modl" id="mymodal">
          <div class="modlcon bg-dark">
            <h1 class="text-light">Footwear </h1><div class="closemod" id="closem">&times;</div>
            <form action="partials/_loginhandles.php" method="POST">
                            <div class="form-group my-4 mx-2">
                                <label for="exampleInputEmail1" class="text-light">Email address</label>
                                <input type="email" class="form-control" id="logmail" name="logmail"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group my-4 mx-2">
                                <label for="exampleInputPassword1" class="text-light">Password</label>
                                <input type="password" class="form-control" id="signInput" name="logpassword"
                                    placeholder="Password">
                            </div>
                            <div class="form-check my-4 mx-2">
                                <input type="checkbox" onclick="mypass()" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label text-light"  onclick="mypass()" for="exampleCheck1">Show
                                    Password</label>
                            </div>
                            <button type="submit" class="btn btn-warning" >Login</button>
                            <hr>
                            <a href="/shoppyproject/signup.php"><div class="btn btn-warning ">Signup</div></a>
                        </form>
          </div>
         
           
            
                  </div>
