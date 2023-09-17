<?php

// echo '<script>alert("Product Added To Cart Succesfully")</script>'; 

// if(isset($_GET['id'])){

//     $pid = $_GET['id'];
//     $con = mysqli_connect("localhost","root","","rent-it");

//     $sql0 = "select * from product where Product_id =$pid";
//     $query0 = mysqli_query($con,$sql0);
//     $values = mysqli_fetch_array($query0);

//     $pname = $values['Product_Name'];
//     $rent = $values['Rent'];
//     $sql = "INSERT INTO `wishlist`(`product_id`, `Product_title`, `Rent`) VALUES ($pid,'$pname',$rent)";
//     $query = mysqli_query($con,$sql);
    
//     if($query){
//         echo "<script>
//             alert('Product Is added to ❤');
//             window.location.href='electronics.php';
//             </script>";
//     }
// }

session_start();
if(isset($_GET['Remove_id'])){
  $rid = $_GET['Remove_id'];
  $conn = mysqli_connect("localhost","root","","rent-it");

  $sqlremove = "DELETE FROM `wishlist` WHERE Product_id=$rid && Customer_id=".$_SESSION['cid']."";
  $queryremove = mysqli_query($conn,$sqlremove);
  if($queryremove){
      echo "done";
//   header("Location: Wishlist.php");
  }
  else{ echo "not done";}
}



?>
 
 <html lang="en">

     <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Wishlist</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="Homepage/dropdown.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
        <!-- CSS -->
        <!--  -->
        <link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/4.0.0-beta/iso_bootstrap4.0.0min.css">
        <link rel="stylesheet" href="wishlist.css?v=<?php echo time(); ?>">
     </head>

     <body>
           <!-- navbar start -->
  <nav>
    <div class="menu-icon" id="menuicon"><span class="fas fa-bars"></span></div>
    <div class="logo"><a class="nav" href="">Rent It</a></div>
    <div class="nav-items">
      <li><a href="../Add Item/additem.php"> <i class="fa fa-plus-circle"></i> Add Items</a></li>
      <li><a href="../MyCart/cart2.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
      <li><a href="../MyWishlist/wishlist2.php"><i class="fa fa-heart"></i> Wishlist</a></li>
      <li><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> Profile</a></li>
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

            <div class="container top-buffer">

                <div class="row wishlist">
                    <a class="Ptitle">Wishlist</a>  
                </div>


                <div class="row top-buffer">
                    <div class="col-lg-4 col-md-4 col-sm-4">Photo</div>
                    <div class="col-lg-4 col-md-3 col-sm-4">Name</div>
                    <div class="col-lg-2 col-md-3 col-sm-2">Price</div>
                    <div class="col-lg-2 col-md-2 col-sm-2">Remove</div>
                </div>


                <?php 
    
                    $con = mysqli_connect("localhost","root","","rent-it");
                    $sqldata = "SELECT * FROM `wishlist` where Customer_id=".$_SESSION['cid']."";
                    $querydata = mysqli_query($con,$sqldata);

                    while($product = mysqli_fetch_array($querydata)){


                    ?>



                <div class="row top-buffer">

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        
                    <?php 

                        $query = "select * from images where Product_id= ".$product['product_id']."";
                        $sql = mysqli_query($con,$query);

                        while($row = mysqli_fetch_assoc($sql))
                        {
                            $imageURL = '../uploads/'.$row["file_name"];
                        
                        ?>

                        <a href=""><img  src="<?php echo $imageURL; ?>" alt="Product-images" class="imagephone"></a>
                        <?php break; }?>

                    </div>

                    <div class="col-lg-4 col-md-3 col-sm-4 cart-Product-title" id="name"> 
                    <a href="#" style="color: #292b2c; text-decoration: none;">
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

                    <div class="col-lg-2 col-md-3 col-sm-2" id="rent">
                    <a href="" style="color: #292b2c; text-decoration: none;">₹<?php echo $rent; ?>/m</a> 
                    </div> 
                    
                    <div class="col-lg-2 col-md-2 col-sm-2" id="remove">
                    <a href="wishlist.php?Remove_id=<?php echo $product['product_id'];?>"><i class="fas fa-trash lastimg"></i></a>
                    </div>
                </div>
                            <hr id="line">
                <?php
                }
                ?>
            </div>
        
        </div>

     </body>
     <script src="wishlist.js" ></script>

 </html>
