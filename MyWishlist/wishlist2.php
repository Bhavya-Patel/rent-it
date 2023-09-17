<?php

session_start();
if(isset($_GET['Remove_id'])){
  $rid = $_GET['Remove_id'];
  $conn = mysqli_connect("localhost","root","","rent-it");

  $sqlremove = "DELETE FROM `wishlist` WHERE Product_id=$rid && Customer_id=".$_SESSION['cid']."";
  $queryremove = mysqli_query($conn,$sqlremove);
  if($queryremove){
    echo '<script>alert("Product is Deleted 🗑")</script>';
//   header("Location: Wishlist.php");
  }
  else{ echo "not done";}
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Wishlist ♥</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../favicon.ico" type="image/ico"> 
    <!-- <link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/4.0.0-beta/iso_bootstrap4.0.0min.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <link href="wishlist2.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </head>
  <body class="section-bg">
    
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


  <div class="jumbotron mb-0" style="background:#f1f1f1">
</div>
    <div class="container">
    
<div class="page-header mt-0">
   
    <h1 class="h2">My Wishlist(
      <?php
       $con = mysqli_connect("localhost","root","","rent-it");
       $check = "select product_id from wishlist";
       $query1 = mysqli_query($con,$check);
       $num_rows = mysqli_num_rows($query1);
        echo $num_rows 
      ?>
     items)</h1>
 
</div>
    
            <?php 
    
                $con = mysqli_connect("localhost","root","","rent-it");
                $sqldata = "SELECT * FROM `wishlist` where Customer_id=".$_SESSION['cid']."";
                $querydata = mysqli_query($con,$sqldata);

                while($product = mysqli_fetch_array($querydata)){


                ?>

           
            
  
              <!-- 1st product -->
              <div class="card p-4">
                
                <div class="row mt-5">

                  <!-- Wishlist images div -->
                  <div class="col-md-5 col-11 mx-auto bg-light d-flex justify-content-center align-items-center shadow product_img">




                  <?php 

                        $query = "select * from images where Product_id= ".$product['product_id']."";
                        $sql = mysqli_query($con,$query);

                        while($row = mysqli_fetch_assoc($sql))
                        {
                            $imageURL = '../uploads/'.$row["file_name"];

                        ?>
                    <img src="<?php echo $imageURL; ?>" class="img-fluid" alt="cart img" />
                    <?php break; }?>

                  </div>




                  <!-- cart product details -->
                  <div class="col-md-7 col-11 mx-auto px-4 mt-2">
                    <div class="row">
                      <!-- product name  -->
                      <div class=" card-title">
                        <a href="#" class="label product_name ml-4" id="det-class">
                        <?php
                    
                            $sql = "select * from product where Product_id = ".$product['product_id']."";
                            $query = mysqli_query($con,$sql);
                            $res = mysqli_fetch_array($query);
                            $pname = $res['Product_Name'];
                            $rent=$res['Rent'];
                            
                            echo $pname; 
                        ?> 
                        </a>
                      </div>
  
                    </div>
  
                    <hr>
  
                    <!-- Prodcut price -->
                    <div class="row">
                      <div class="ml-4 d-flex justify-content-end price_money">
                        <h3>₹<h4 id="itemval"><?php echo $rent; ?><h5>/Month</h5></h4></h3>
                          
                        
                      </div>
                    </div>
  
                    <hr>
  
                    <!-- //remover move -->
                    <div class="row">
                     
                      <button class="btn btn-success mx-auto "> <i class="fas fa-shopping-cart"></i> Add to cart </button>
                    
                        <a href="wishlist2.php?Remove_id=<?php echo $product['product_id'];?>" class="btn btn-danger mx-auto "> <i class="fas fa-trash-alt"></i> Remove </a>
                     
                    </div>
  
            
                  </div>
                </div>
              </div>
              
              <hr />
              <?php
                }
                ?>
              
  

         
    </div>
    
             <!-- footer start -->

             <footer class="footer">
  	 <div class="foot">
  	 	<div class="row">
        <div class="footer-col">
          <h4>👨🏻‍💻Developed By</h4>
          <ul>
            <b></b><li><a href="https://www.instagram.com/shah_zeal_/"><i class="fab fa-instagram"></i> Zeal Shah</a></li>
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