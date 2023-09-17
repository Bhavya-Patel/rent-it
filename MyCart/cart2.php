<?php

    session_start();

    if(isset($_GET['Remove_id'])){
      $rid = $_GET['Remove_id'];
      $conn = mysqli_connect("localhost","root","","rent-it");

      $sqlremove = "DELETE FROM `cart` WHERE Product_id=$rid && Customer_id=".$_SESSION['cid']."";
      $queryremove = mysqli_query($conn,$sqlremove);
      if($queryremove){
      header("Location: cart2.php");
      }
    }

    if(isset($_GET['Remove_All'])){
      $conn = mysqli_connect("localhost","root","","rent-it");
      $sqlremoveall = "DELETE FROM `cart` where Customer_id=".$_SESSION['cid']."";
      $queryremoveall = mysqli_query($conn,$sqlremoveall);
      if($queryremoveall){
        header("Location: cart2.php");
        }
    }

 
?>
<html>

<head>
  <title>Cart</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="../favicon.ico" type="image/ico"> 
  <link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/4.0.0-beta/iso_bootstrap4.0.0min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
  <link href="cart2.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>

<body class="bg-light">

<!-- navbar start -->
<nav>
  <div class="menu-icon" id="menuicon"><span class="fas fa-bars"></span></div>
  <div class="logo"><a class="nav" href="../Homepage/dropdown.php">Rent It</a></div>
  <div class="nav-items">
    <li><a href="../Add Item/additem.php"> <i class="fa fa-plus-circle"></i> Add Items</a></li>
    <li><a href="../MyCart/cart2.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
    <li><a href="../MyWishlist/wishlist2.php"><i class="fa fa-heart"></i> Wishlist</a></li>
    <li><a href="../profile page/profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Profile</a></li>
  </div>
  <div class="search-icon"><span class="fas fa-search"></span></div>
  <div class="cancel-icon"><span class="fas fa-times"></span></div>
  <form action="../product detail/search.php" method="GET">

    <input type="text" name="search" class="search-data" placeholder="Search" required>
    <button type="submit" class="fas fa-search"></button>
  </form>
</nav>
<!-- navbar End -->
        <?php 
                //session_start();
                $con = mysqli_connect("localhost","root","","rent-it");
                $sqldata = "SELECT * FROM `cart` where Customer_id=".$_SESSION['cid']."";
                $querydata = mysqli_query($con,$sqldata);
                $total = mysqli_num_rows($querydata);
                if($total<=0)
                {

        ?>
            <div class= "emptycart">
                <img src="empty-cart.png" class="empty-Cart-img" alt="Empty_Cart">
                    <!-- <p class="cart-subtitle-1">Your cart is empty</p>
                    <div class = "cart-subtitle-2">
                    <p >You have no item in your shopping cart </p>
                    <p >Let's go buy something </p> -->
                <!-- </div> -->
                    <button class="cart-btn">Shop Now  <i class="fas fa-shopping-basket"></i></button>
            </div>

            <?php
                }
                else{ $_SESSION['total'] = $total;
            ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-11 mx-auto">
        <div class="row mt-5 mb-5 gx-3 pt-5">

          <!-- left side div -->
          <div class="col-md-12 col-lg-8 col-11 mx-auto main_cart mb-lg-0 mb-5 shadow">

       

            <div class="py-4 px-3 row cart">
                <a class="Ptitle"><h4 class="font-weight-bold text-dark">My Cart(<?php echo $total; ?> Products)</h4></a>
                <div class="col removeall" >
                </div>
                    <a href="cart.php?Remove_All=<?php echo 'Remove';?>" type="button" class="btn btn-default btn-danger float-right trash-btn">Remove All <i class="fas fa-trash-alt"></i></a>
            </div>

            <?php 

                $con = mysqli_connect("localhost","root","","rent-it");
                $sqldata = "SELECT * FROM `cart` where Customer_id=".$_SESSION['cid']."";
                $querydata = mysqli_query($con,$sqldata);
                $i=1;
                while($product = mysqli_fetch_array($querydata)){ 
                $tenure=$product['tenure'];
                
            ?>

            <!-- 1st product -->
            <div class="card p-4">
            
              
            
        

            <form action="final_price.php" method="get">
              <div class="row">
                <!-- cart images div -->
                <div class="col-md-5 col-11 mx-auto bg-light d-flex justify-content-center align-items-center shadow product_img">
                <a href="../Product detail/product_detail.php?id=<?php echo $product['Product_id'];?>" style="text-decoration:none;">
                
                <?php 

                    $query = "select * from images where Product_id= ".$product['Product_id']."";
                    $sql = mysqli_query($con,$query);
                    
                    while($row = mysqli_fetch_assoc($sql))
                    {
                        $imageURL = '../uploads/'.$row["file_name"];
                        
                ?>

                  <img src="<?php echo $imageURL; ?>" class="img-fluid" alt="cart img" />
                  <?php break; }?>
                </div>
                <!-- cart product details -->
                <div class="col-md-7 col-11   mt-2">
                  <div class="row">
                    <!-- product name  -->
                    <div class=" card-title">
                      <label class="label product_name ml-4" id="det-class">
                    <a href="../Product detail/product_detail.php?id=<?php echo $product['Product_id'];?>"   style="color: #292b2c; text-decoration:none;">
                    <h3 class="px-3" style="color:blue">
                    <?php 
                    
                    $sql = "select * from product where Product_id = ".$product['Product_id']."";
                    $query = mysqli_query($con,$sql);
                    $res = mysqli_fetch_array($query);
                    $pname = $res['Product_Name'];
                    $rent=$res['Rent'];
                    
                    
                    echo $pname; 
                    ?></h3>
                    </a>
                      </label>
                    </div>

                  </div>

                  <!-- <hr> -->

                  <!-- Prodcut price -->
                  <div class="row">
                    <div class="ml-4 d-flex justify-content-end price_money">
                      &nbsp;&nbsp;&nbsp;₹<h4><?php echo $rent; ?></h4><h5 style="padding-bottom:10px">/Month</h5>
                        </h4>
                      </h3>
                    </div>
                  </div>

                  <hr >

                  <!-- Prodcut Quantity and Tenure -->
                  <!-- <div class="row"> -->
                  <div class="form-group mx-auto">
                      <label for="op-class" class="h5">Quantity</label>
                      <select class="form-control" name="Quantity<?php echo $i; ?>" id="op-class">
                      <option value="1" selected>1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      </select>
                    </div>

                    <div class="form-group mx-auto">
                      <label for="op-class" class="h5">Product Tenure</label>
                      <select class="form-control" name="Duration<?php echo $i; ?>" id="op-class">
                      <option value="<?php echo $tenure; ?>" selected><?php echo $tenure; ?> Months</option>
                      <option value="3">3 Months</option>
                      <option value="6">6 Months</option>
                      <option value="9">9 Months</option>
                      <option value="12">12 Months</option>
                      <option value="15">15 Months</option>
                      <option value="18">18 Months</option>
                      <option value="21">21 Months</option>
                      <option value="24">24 Months</option>
                      </select>
                    </div>
                  <!-- </div> -->

                  <!-- <hr> -->

                  <!-- //remover move -->
                  <div class="row">
                  <div class="col removeall" >
                    </div>
                        <a href="cart.php?Remove_id=<?php echo $product['Product_id'];?>"class="btn btn-default btn-danger float-right trash-btn">Remove&nbsp;&nbsp;<i class="fas fa-trash lastimg"></i></a>
                    </div>

                </div>
              </div>
            </div>
            <hr>
            <!-- 1st product End -->
            <?php
                $i++;

            }

            ?>
        <div class="row px-4">
            <div class="col"></div>
                <button name="rent-it" value="rent-it" type="Submit" style="margin-top:10px ; margin-bottom:20px" class="btn btn-success btn-lg float-right">Rent Now <i class="fas fa-arrow-right"></i></button>
        </div>
    
      </div>
            

           
        </form>
        
          </div>
          <?php
                }
            ?>
            
          <!-- left side div ends -->


          
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    var product_total_amt = document.getElementById("product_total_amt");
    var shipping_charge = document.getElementById("shipping_charge");
    var total_cart_amt = document.getElementById("total_cart_amt");

    var one = document.getElementById("itemval").innerHTML;
    var two = document.getElementById("itemval1").innerHTML;
    var three = document.getElementById("itemval2").innerHTML;
    var four = document.getElementById("shipping_charge").innerHTML;

    var total = +one + +two + +three;

    product_total_amt.innerHTML = total;
    total_cart_amt.innerHTML = total + +four;

    const decreaseNumber = (incdec, itemprice) => {
      var itemval = document.getElementById(incdec);
      var itemprice = document.getElementById(itemprice);
      console.log(itemprice.innerHTML);
      // console.log(itemval.value);
      if (itemval.value <= 1) {
        itemval.value = 1;
        alert("Minimum Product quantity is 1");
      } else {
        itemval.value = parseInt(itemval.value) - 1;
        itemval.style.background = "#fff";
        itemval.style.color = "#000";
        // itemprice.innerHTML = parseInt(itemprice.innerHTML) - 15;
        product_total_amt.innerHTML =
          parseInt(product_total_amt.innerHTML) - parseInt(itemprice.innerHTML);
        total_cart_amt.innerHTML =
          parseInt(product_total_amt.innerHTML) +
          parseInt(shipping_charge.innerHTML);
      }
    };
    const increaseNumber = (incdec, itemprice) => {
      var itemval = document.getElementById(incdec);
      var itemprice = document.getElementById(itemprice);
      // console.log(itemval.value);
      if (itemval.value >= 5) {
        itemval.value = 5;
        alert("max 5 allowed");
        itemval.style.background = "red";
        itemval.style.color = "#fff";
      } else {
        itemval.value = parseInt(itemval.value) + 1;
        // itemprice.innerHTML = parseInt(itemprice.innerHTML) + 15;

        product_total_amt.innerHTML =
          parseInt(product_total_amt.innerHTML) + parseInt(itemprice.innerHTML);
        total_cart_amt.innerHTML =
          parseInt(product_total_amt.innerHTML) +
          parseInt(shipping_charge.innerHTML);
      }
    };
  </script>

     <!-- footer start -->

   <footer class="footer">
      <div class="foot">
        <div class="row">
        <div class="footer-col">
           <h4>👨🏻‍💻Developed By</h4>
           <ul>
             <li><a href="https://www.instagram.com/shah_zeal_/"><i class="fab fa-instagram"></i> Zeal Shah</a></li>
             <li><a href="https://www.instagram.com/thenameisbhavya/"><i class="fab fa-instagram"></i> Bhavya Patel</a></li>
             <li><a href="https://www.instagram.com/___.__adi/"><i class="fab fa-instagram"></i> Aditya Kansara</a></li>
             
           </ul>
         </div>
          <div class="footer-col">
            <h4>👋🏻get help</h4>
            <ul>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">shipping</a></li>
              <li><a href="#">returns</a></li>
              <li><a href="#">order status</a></li>
              <li><a href="#">payment options</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>🤳🏻Contact Us</h4>
            <ul>
              <li><a href="#"><i class="fas fa-map-marker-alt"></i> VPMP Polytechnic Gandhinagar , Gujarat, India</a></li>
              <li><a href="#"><i class="fas fa-phone-alt"></i> +91-999999999</a></li>
              <li><a href="#"><i class="fas fa-envelope"></i> official.rent.it</a></li>
              <li><a href="#"></a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>😎follow us</h4>
            <div class="social-links">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
      </div>
   </footer>
 
              <!-- footer ends -->
              <script src="../Menu/Smenu.js"></script>

</body>

</html>
