<?php

session_start();

  if($category=$_GET['category'])
  {
   $var=1;
  }
  else{
    $var=0;
  }
    
  $con = mysqli_connect("localhost","root","","rent-it");
  $sql = "insert into cart (Customer_id, Product_id, tenure) values (".$_SESSION['cid'].",".$_GET['id'].",1)";
  $query = mysqli_query($con,$sql);
  if($query)
  {
    echo '<script>alert("Product Added To Cart Succesfully")</script>'; 
    // header("location:category.php?category=".$category."");
    if($var==1){
        header("Refresh:0; url=category.php?category=".$_GET['category']."");
    }
    else{
        header("Refresh:0; url=search.php?search=".$_GET['name']."");   
    }  }


?>