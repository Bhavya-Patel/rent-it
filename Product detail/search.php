
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searched Item</title>

<!--===================bootstrap======================-->
<link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/4.0.0-beta/iso_bootstrap4.0.0min.css">


<link rel="stylesheet" href="category.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>
<body>

 <!-- navbar start -->
<nav>
  <div class="menu-icon" id="menuicon"><span class="fas fa-bars"></span></div>
  <div class="logo"><a class="nav" href="../Homepage/dropdown.php">Rent It</a></div>
  <div class="nav-items">
    <li><a href="../Add Item/additem.php"> <i class="fa fa-plus-circle"></i> Add Items</a></li>
    <li><a href="../MyCart/cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
    <li><a href="../MyWishlist/wishlist.php"><i class="fa fa-heart"></i> Wishlist</a></li>
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
                    <h2><?php echo $_GET['search']; ?></h2>
                </div>
            </div>
        </div>

        <div class="row">

        <?php
          $con = mysqli_connect("localhost","root","","rent-it");
        //   if($con){
        //     echo "Connection Successful";
        //   }

        $search = $_GET['search'];

          $productqy = "SELECT * FROM product where Product_Name='".$search."'";

          $productqy2 = mysqli_query($con,$productqy);

        if(mysqli_num_rows($productqy2))
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
                        <a href="addtocart.php?id=<?php echo $product['Product_id'];?>&name=<?php echo $product['Product_Name']; ?>" class="btn-round mr-2 "><i class="fa fa-shopping-cart cart-product"></i></a>
                        <a href="wishlist.php?id=<?php echo $product['Product_id'];?>&name=<?php echo $product['Product_Name']; ?>" class="btn-round"><i class="fa fa-heart Wishlist-product"></i></a>
                    </div>
            </div>
        </div>
  

        <?php
        
                }
                // mysqli_close($con);

        ?>
        <?php }

         else{ echo "<h3 > "."Searched Result not found"."</h3> "; }
         
         ?> 


        

    

        </div>
     </div>
 </section>

</div>

  <!-- category-product -->

</body>

<script src="category.js" ></script>
</html>