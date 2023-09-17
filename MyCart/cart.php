<?php

    // echo '<script>alert("Product Added To Cart Succesfully")</script>'; 
    session_start();

    // if(isset($_GET['id'])){

    //     $pid = $_GET['id'];
    //     $con = mysqli_connect("localhost","root","","rent-it");

    //     $sql0 = "select * from product where Product_id =$pid";
    //     $query0 = mysqli_query($con,$sql0);
    //     $values = mysqli_fetch_array($query0);

    //     $pname = $values['Product_Name'];
    //     $rent = $values['Rent'];
    //     $sql = "INSERT INTO `cart`(`Product_id`, `Product_title`, `Rent`) VALUES ($pid,'$pname',$rent)";
    //     $query = mysqli_query($con,$sql);
        
    //     if($query){
    //       echo count($check3);
    //         echo "<script>  
    //             alert('Product Is added to 🛒');
    //             window.location.href='electronics.php';
    //             </script>";
    //     }
    // }


    if(isset($_GET['Remove_id'])){
      $rid = $_GET['Remove_id'];
      $conn = mysqli_connect("localhost","root","","rent-it");

      $sqlremove = "DELETE FROM `cart` WHERE Product_id=$rid && Customer_id=".$_SESSION['cid']."";
      $queryremove = mysqli_query($conn,$sqlremove);
      if($queryremove){
      header("Location: cart.php");
      }
    }

    if(isset($_GET['Remove_All'])){
      $conn = mysqli_connect("localhost","root","","rent-it");
      $sqlremoveall = "DELETE FROM `cart` where Customer_id=".$_SESSION['cid']."";
      $queryremoveall = mysqli_query($conn,$sqlremoveall);
      if($queryremoveall){
        header("Location: cart.php");
        }
    }

 
?>
<?php 
    //session_start();
    $con = mysqli_connect("localhost","root","","rent-it");
    $sqldata = "SELECT * FROM `cart` where Customer_id=".$_SESSION['cid']."";
    $querydata = mysqli_query($con,$sqldata);
    $total = mysqli_num_rows($querydata);
    if($total<=0)
    {
        // header("location:http://localhost/project/product%20detail/category.php?category=Home_Furniture");
    }
   
    // while($product = mysqli_fetch_array($querydata)){


    ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="cart.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <script src="cart.js"></script> -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <title>MyCart</title>

  <!-- CSS -->
<!--  -->
<link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/4.0.0-beta/iso_bootstrap4.0.0min.css">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Neuton&display=swap" rel="stylesheet"> -->
  
</head>

<body>

  <!-- navbar start -->
  <nav>
    <div class="menu-icon" id="menuicon"><span class="fas fa-bars"></span></div>
    <div class="logo"><a class="nav" href="">Rent It</a></div>
    <div class="nav-items">
      <li><a href="../Add Item/additem.php"> <i class="fa fa-plus-circle"></i> Add Items</a></li>
      <li><a href="../MyCart/cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
      <li><a href="../MyWishlist/wishlist.php"><i class="fa fa-heart"></i> Wishlist</a></li>
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
  
  <!-- <div class= "emptycart">
    <img src="Photo/no_order.png" class="empty-Cart-img" alt="Empty_Cart">
        <p class="cart-subtitle-1">Your cart is empty</p>
        <div class = "cart-subtitle-2">
        <p >You have no item in your shopping cart </p>
        <p >Let's go buy something </p>
      </div>
        <button class="cart-btn">Shop Now  <i class="fas fa-shopping-basket"></i></button>
  </div> -->

  <!-- Cart-Product -->
<div class="bootstrap">
  <div class="container top-buffer">

    <div class="row cart">
      <a class="Ptitle">My Cart(<?php echo $total; ?> Products)</a>
      <div class="col" >
       </div>
        <a href="cart.php?Remove_All=<?php echo 'Remove';?>" type="button" class="btn btn-default btn-danger float-right trash-btn">Remove All <i class="fas fa-trash-alt"></i></a>
   </div> 
  
    <div class="row top-buffer">
      <div class="col-lg-3 col-md-4 col-sm-6">Photo</div>
      <div class="col-lg-3 col-md-2 col-sm-1">Name</div>
      <div class="col-lg-2 col-md-2 col-sm-1">Price</div>
      <div class="col-lg-2 col-md-2 col-sm-1">Months</div>
      <div class="col-lg-1 col-md-1 col-sm-1">Qantity</div>
      <div class="col-lg-1 col-md-1 col-sm-1">Remove</div>
    </div>

    <?php 

        $con = mysqli_connect("localhost","root","","rent-it");
        $sqldata = "SELECT * FROM `cart` where Customer_id=".$_SESSION['cid']."";
        $querydata = mysqli_query($con,$sqldata);
        
        while($product = mysqli_fetch_array($querydata)){ 
          
    ?>
        


    <div class="row top-buffer">


       <!-- Product Image -->
      <div class="col-lg-3 col-md-4 col-sm-6">

      <?php 

          $query = "select * from images where Product_id= ".$product['Product_id']."";
          $sql = mysqli_query($con,$query);

          while($row = mysqli_fetch_assoc($sql))
          {
              $imageURL = '../uploads/'.$row["file_name"];
            
        ?>

        <img  src="<?php echo $imageURL; ?>" alt="" class="imagephone">
        <?php break; }?>

      </div>


      <!-- Product Name -->
      <div class="col-lg-3 col-md-2 col-sm-1 cart-Product-title" id="name"> 
        <?php 
        
        $sql = "select * from product where Product_id = ".$product['Product_id']."";
        $query = mysqli_query($con,$sql);
        $res = mysqli_fetch_array($query);
        $pname = $res['Product_Name'];
        $rent=$res['Rent'];
        
        echo $pname; 
        ?>
      </div>


            <!-- rent -->
      <div class="col-lg-2 col-md-2 col-sm-1" id="rent">
          ₹<?php echo $rent; ?>/m
      </div>


      <div class="col-lg-2 col-md-2 col-sm-1" id="tenure">
        <select name="Duration" >
          <option value="3" selected>3 Months</option>
          <option value="6">6 Months</option>
          <option value="3">9 Months</option>
          <option value="3">12 Months</option>
          <option value="3">24 Months</option>
        </select>
      </div>


      <div class="col-lg-1 col-md-1 col-sm-1" id="quantity">
        <select name="qyt" >
          <option value="1" selected>1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
        </select>
      </div>


      <div class="col-lg-1 col-md-1 col-sm-1" id="remove">
        <a href="cart.php?Remove_id=<?php echo $product['Product_id'];?>"><i class="fas fa-trash lastimg"></i></a>
      </div>
  </div>

      <hr id="line">
      
      <?php
    }

    ?>


      <!-- <div class="row top-buffer">
        <div class="col-lg-3 col-md-4 col-sm-6">
          <img  src="Photo/phone2.jpeg" alt="" class="imagephone">
        </div>
        <div class="col-lg-3 col-md-2 col-sm-1 cart-Product-title"> 
          
        </div>
        <div class="col-lg-2 col-md-2 col-sm-1">₹100</div>
        <div class="col-lg-2 col-md-2 col-sm-1">
          <select name="Duration" id="">
            <option value="3" selected>3 Months</option>
            <option value="6">6 Months</option>
            <option value="3">9 Months</option>
            <option value="3">12 Months</option>
            <option value="3">24 Months</option>
          </select>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1">
          <select name="qyt" id="">
            <option value="1" selected>1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
          </select>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1">
          <a href=""><i class="fas fa-trash lastimg"></i></a>
        </div>
      </div> -->
    
      <div class="row">
        <div class="col"></div>
            <button type="button" style="margin-top:10px ; margin-bottom:20px" class="btn btn-success btn-lg float-right">Rent Now <i class="fas fa-arrow-right"></i></button>
    </div>

  </div>
</div>

  <!-- Cart-Product -->

</body>
<script src="cart.js" ></script>

 </html>
