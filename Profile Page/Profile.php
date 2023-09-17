<?php

    session_start();

    $con = mysqli_connect('localhost','root','','rent-it');
    $sql = "SELECT * FROM product where Customer_id='".$_SESSION['cid']."'";
    $query = mysqli_query($con,$sql);
    $total = mysqli_num_rows($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile 👤</title>
  <link rel="icon" href="../favicon.ico" type="image/ico"> 
  <link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/4.0.0-beta/iso_bootstrap4.0.0min.css">
  <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
  <link href="Profile.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="../Footer/footer.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
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
<div class="bootstrap">
  <div class="jumbotron" style="background:#fff; margin-bottom:0;  padding: 2rem 1rem;">
    </div>
</div>

  <div id="header" class="primary-colors">
    <div class="profile-pic">
        <img src="img/profile5.png" alt="">
    </div>
    <div class="profile-summary">
      <h1><?php echo $_SESSION['name']; ?></h1>
      <h3><a href="editprofile.php" type="button" class="header-btn"><i class="fas fa-info-circle"></i>Account settings</a></h3>
    </div>
  </div>

  <!-- <div id="contacts" class="secondary-colors">
    <a href="#">
        <i class="fas fa-mobile-alt"></i>+91-9898098078
      </a>
    <a href="mailto:johnbaba@email.com">
        <i class="fas fa-envelope"></i>bhavya@gmail.com
      </a>
    <a href="https://maps.google.com/?q=O-8,Hare-Krishna FLATS,NAYAN NAGAR,KRISHNA NAGAR,ahmedabad,gujrat" target="_blank">
        <i class="fas fa-map-marker-alt"></i>O-8,Hare-Krishna FLATS,NAYAN NAGAR,KRISHNA NAGAR,S..
      </a>
  </div> -->

  <div id="main">
    <div class="long-details">

        <!-- Item Added -->

      <h3 class="primary-colors section-head Item-add-title">
        <i class="fas fa-check-square"></i> Items Added : <?php echo $total; ?>
      </h3>
     
      <div class="bootstrap">
        <div class="row">
        <?php
                        
                        if($total>0)
                        {
                            while($product = mysqli_fetch_array($query))
                            {
                                $query1 = "select * from images where Product_id= ".$product['Product_id']."";
                                $sql1 = mysqli_query($con,$query1);
                                
                                while($row = mysqli_fetch_assoc($sql1))
                                {
                                    $imageURL = '../uploads/'.$row["file_name"];
                                    
                        ?>
            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="single-product">
                    <div class="product-thumb">
                        <img class="pro-img" src="<?php echo $imageURL; ?>" alt="">

                    </div>
                    <?php break; }?>
                    <div class="product-btn">
                        <h5><a href="../folder/file.html?id=<?php echo $product['Product_id'];?>" type="button" class="btn btn-outline-danger btn-small">Edit Item</a></h5>
                        <h5><a href="delete.php?id=<?php echo $product['Product_id'];?>" type="button" class="btn btn-outline-primary btn-small">Delete Item</a></h5>
                    </div>    
                                    
                </div>
            </div>
            <?php
        
                }
                // mysqli_close($con);

            ?>
            <?php }

            else{ echo "You Have'nt Added Any Item";
            ?>
            <a href="../Add Item/additem.php">Add Item </a>
            <?php }

            

            ?>
            
        </div>
        
      </div>
            </div>
            </div>
        <!-- Item Added -->

        <!-- Your Order -->
            <div class="mid">
      <h3 class="primary-colors section-head Item-add-title">
        <i class="fas fa-truck"></i> Your Order
      </h3>

      <div class="bootstrap">
        <div class="row">

            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="single-product">
                    <div class="product-thumb">
                        <img class="pro-img" src="img/1.png" alt="">
                    </div>
                    <div class="product-btn">
                      <h5><a href="#" type="button" class="btn-small" >Order details</a></h5>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="single-product">
                    <div class="product-thumb">
                        <img class="pro-img" src="img/tv.jpeg" alt="">
                    </div>
                    <div class="product-btn">
                      <h5><a href="#" type="button" class="btn-small">Order details</a></h5>
                    </div>
            </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-4">
              <div class="single-product">
                  <div class="product-thumb">
                      <img class="pro-img" src="img/moniter.png" alt="">
                  </div>
                  <div class="product-btn">
                    <h5><a href="#" type="button" class="btn-small">Order details</a></h5>
                  </div>
          </div>
          </div>

        
      </div>
      
    </div> 
            </div>

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