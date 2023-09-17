<?php

session_start();
if(isset($_GET['id']))
{
  $_SESSION['pid'] = $_GET['id'];
}

$con = mysqli_connect("localhost","root","","rent-it");

$sql = "select * from product where Product_id = ".$_SESSION['pid']."";
$query = mysqli_query($con,$sql);
$res = mysqli_fetch_array($query);
$pname = $res['Product_Name'];
// $pid = $res['Product_id'];
$p_desc = $res['Product_Desc'];
$rent = $res['Rent'];
$category = $res['Category']


?>

<?php

// session_start();

if(isset($_GET['addtocart']))
{ 

  $con = mysqli_connect("localhost","root","","rent-it");
  $sql1 = "insert into cart (Customer_id, Product_id, tenure) values (".$_SESSION['cid'].",".$_SESSION['pid'].",'".$_GET['tenure']."')";
  $query1 = mysqli_query($con,$sql1);
  if($query1)
  {
    echo '<script>alert("Product Added To Cart Succesfully")</script>'; 
    header("Refresh:0; url=product_detail.php");
  }

}
?>

<?php

// session_start();

if(isset($_GET['wishlist']))
{ 

  // $con = mysqli_connect("localhost","root","","rent-it");
  $sql1 = "insert into wishlist (Product_id, customer_id) values (".$_SESSION['pid'].",".$_SESSION['cid'].")";
  $query1 = mysqli_query($con,$sql1);
  if($query1)
  {
    echo '<script>alert("Product Added To Wishlist Succesfully")</script>'; 
    header("Refresh:0; url=product_detail.php");
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Card/Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../favicon.ico" type="image/ico"> 
    
    <link href="product_detail.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../Footer/footer.css">
    <link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/4.0.0-beta/iso_bootstrap4.0.0min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  </head>
  <body>
    
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
  
  
    <!-- Category-list Start -->
    <div class="dropdown">
      <ul>
  
        <li><a href="../product detail/category.php?category=Home_Furniture" class="stylea h_f">Home&Furniture</a></li>
        <li><a href="../product detail/category.php?category=Sports" class="stylea sports">Sports</a></li>
        <li><a href="../product detail/category.php?category=Electronics" class="stylea electronics">Electronics</a></li>
        <li><a href="../product detail/category.php?category=Books" class="stylea books">Books</a></li>
        <li><a href="../product detail/category.php?category=Vehicles" class="stylea vehicles">Vehicles</a></li>
        <li><a href="../product detail/category.php?category=Men_Women" class="stylea fashion">Fashion</a></li>
        <li><a href="../product detail/category.php?category=Kids_Toys" class="stylea k_t">Kids & Toys</a></li>
        <li><a href="../product detail/category.php?category=More" class="stylea more">More</a></li>
  
      </ul>
    </div>
    <!-- Category-list End -->

    <!-- Product Detail Section Text -->
    <div class="product-text">
      <h2 class="text-product"><center>Product Detail</center></h2>
    </div>
    <!-- Product Detail Section Text -->

    <!-- Product Detail -->
    <div class = "card-wrapper">
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
            <?php
                    $con = mysqli_connect("localhost","root","","rent-it");
                    $query = $con->query("select * from images where Product_id=".$_SESSION['pid']."");

                    $num = mysqli_num_rows($query);
                    // echo $num;
                    if($num > 0){
                        while($row = $query->fetch_assoc()){
                            $imageURL = '../uploads/'.$row["file_name"];
                            
                    ?>
              <img src = "<?php echo $imageURL; ?>">
              <?php 
                     }
                    }
            ?>
              
            </div>
          </div>
          <div class = "img-select">
          <?php
                    $con = mysqli_connect("localhost","root","","rent-it");
                    $query = $con->query("select * from images where Product_id=".$_SESSION['pid']."");

                    $num = mysqli_num_rows($query);
                    // echo $num;
                    if($num > 0){
                        $i=0;
                        while($row = $query->fetch_assoc()){
                            $i++;
                            $imageURL = '../uploads/'.$row["file_name"];
                            
                    ?>
            <div class = "img-item">
              <a href = "#" data-id = "<?php echo $i; ?>">
                <img src = "<?php echo $imageURL; ?>">
              </a>
            </div>
            <?php 
                     }
                    }
            ?>
            
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title"><?php echo $pname; ?></h2>
          <!-- <a href = "#" class = "product-link">visit nike store</a> -->
          <div class = "product-rating">
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star-half-alt"></i>
            <!-- <span>4.7(21)</span> -->
          </div>

          <div class = "product-price">
            
            <p class = "last-price">Old Price : <span><?php   $temp= $rent/10;
                                                              $oldprice = $rent + $temp;
                                                             echo " ₹".$oldprice."/Month";  
                                                     ?>                                   </span></p>
            <p class = "new-price">New Price  : <span><?php echo " ₹".$rent."/Month (10% off)";  ?></span></p>
          </div>

          <div class = "product-detail">
            <h2>about this item: </h2>
            <p><?php echo $p_desc;  ?></p>
            <ul>
              <li>Available: <span>in stock</span></li>
              <li>Category: <span><?php echo $category;  ?></span></li>
              <li>Shipping Area: <span>All over the world</span></li>
              <li>Shipping Fee: <span>Free</span></li>
            </ul>
          </div>

          <form action="" method="GET">
            <p> <span style=" font-size: 20px; font-weight: bold;">Tenure</span>
              <span class="month">
                <select name="tenure"  style=" color: #ff9f1a; font-weight:bold; border: ff9f1a;">
                  <option id="opt_month" value="3">3 Months</option>
                  <option id="opt_month" value="6">6 Months</option>
                  <option id="opt_month" value="9">9 Months</option>
                  <option id="opt_month" value="12">12 Months</option>
                  <option id="opt_month" value="15">15 Months</option>
                  <option id="opt_month" value="18">18 Months</option>
                  <option id="opt_month" value="21">21 Months</option>
                  <option id="opt_month" value="24">24 Months</option>
                  

                </select>
              </span>
            </p>
            
          <div class = "purchase-info">
            <button type = "submit" class = "btn" name="addtocart">
              Add to Cart <i class = "fas fa-shopping-cart"></i>
            </button>
            <button type = "submit" class = "btn" name="wishlist">Wishlist <i class = "fas fa-heart"></i></button>
          </div>
          </form>

          <div class = "social-links">
            <p>Share At: </p>
            <a href = "#">
              <i class = "fab fa-facebook-f"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-twitter"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-instagram"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-whatsapp"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

  <!-- Product Detail -->
  

  <!-- Related-product -->

<div class="bootstrap">
  <section class="section-bg">
     <div class="container">
     <div class="row">
            <div class="col-xl-12">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
     

        <div class="row">

        <?php
          $con = mysqli_connect("localhost","root","","rent-it");
        //   if($con){
        //     echo "Connection Successful";
        //   }

       

          $productqy = "SELECT * FROM product where Category='".$category."'";

          $productqy2 = mysqli_query($con,$productqy);

          if(mysqli_num_rows($productqy2)>0)
      {
          $i=0;
         while($product = mysqli_fetch_array($productqy2)){

            
                if($_SESSION['pid']==$product['Product_id'])
                {
                  continue;
                }
                $i++;
             ?>
        

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6"> 
            <div class="single-product">
                  <div class="product-thumb">
                    <?php 

                        $query = "select * from images where Product_id= ".$product['Product_id']."";
                        $sql = mysqli_query($con,$query);
                        
                        while($row = mysqli_fetch_assoc($sql))
                        {
                            $imageURL = '../uploads/'.$row["file_name"];
                             
                    ?>

                            <img src="<?php echo $imageURL; ?>" class="rel-img" width="200px" height="200px" alt="">
                            <?php break; }?>
                    
                      
                  </div>

                    <div class="product-title-1">
                        <h3><a href="product_detail.php?id=<?php echo $product['Product_id'];?>"><?php echo $product['Product_Name']; ?></a></h3>
                    </div>

            </div>
        </div>


        <?php

                if($i>3)
                {
                  break;
                }
        
                }
                // mysqli_close($con);

        ?>
    <?php }

    else{ echo "<h3 > "."Selected Category Does'nt Have Any Product"."</h3> "; }

    ?>

        

    

        </div>


        
     </div>
  </section>

</div>

  <!-- Related-product -->

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

    
    <script src="product_detail.js"></script>
  </body>
</html>