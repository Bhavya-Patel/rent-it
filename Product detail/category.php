
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>

<!--===================bootstrap======================-->
<link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/4.0.0-beta/iso_bootstrap4.0.0min.css">

<link rel="icon" href="../favicon.ico" type="image/ico"> 
<link rel="stylesheet" href="category.css">
<link rel="stylesheet" href="../Footer/footer.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>
<body>

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

  <!-- category-product -->

<div class="bootstrap">
  <section class="section-bg">
     <div class="container">
        
        <div class="row">
            <div class="col-xl-12">
                <div class="section-title">
                    <h2><?php echo $_GET['category']; ?></h2>
                </div>
            </div>
        </div>

        <div class="row">

        <?php
          $con = mysqli_connect("localhost","root","","rent-it");
        //   if($con){
        //     echo "Connection Successful";
        //   }

        $category = $_GET['category'];

          $productqy = "SELECT * FROM product where Category='".$category."'";

          $productqy2 = mysqli_query($con,$productqy);

          if(mysqli_num_rows($productqy2)>0)
      {
          
         while($product = mysqli_fetch_array($productqy2)){
             
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

                            <img src="<?php echo $imageURL; ?>" width="200px" height="200px" alt="">
                            <?php break; }?>
                    
                      
                  </div>

                    <div class="product-title">
                        <h3><a href="product_detail.php?id=<?php echo $product['Product_id'];?>"><?php echo $product['Product_Name']; ?></a></h3>
                    </div>

                    <div class="product-btns">
                        <a href="product_detail.php?id=<?php echo $product['Product_id'];?>" class="btn-small mr-2" ><span class="rent"><?php echo $product['Rent']."/month"; ?></span></a>
                        <a href="addtocart.php?id=<?php echo $product['Product_id'];?>&category=<?php echo $category;?>" class="btn-round mr-2 "><i class="fa fa-shopping-cart cart-product"></i></a>
                        <a href="wishlist.php?id=<?php echo $product['Product_id'];?>&category=<?php echo $category;?>" class="btn-round"><i class="fa fa-heart Wishlist-product"></i></a>
                    </div>
            </div>
        </div>


        <?php
        
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

  <!-- category-product -->

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

</body>

<script src="../Menu/Smenu.js"></script>
</html>