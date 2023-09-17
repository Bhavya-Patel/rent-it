<?php 

session_start();

if(isset($_GET['rent-it']))
{
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $_SESSION['queries'] = $queries;
    $i=1;
    $random = rand(100,999);
    $_SESSION['random'] = $random;
    
    // echo $tenure ."Tenure <br>";
    // echo $quantity ."Quantity <br>";

    $con = mysqli_connect("localhost","root","","rent-it");
    $sql = "SELECT * FROM `cart` where Customer_id=".$_SESSION['cid']."";
    $query = mysqli_query($con,$sql);

    $totalrent=0;
    
    while($product1 = mysqli_fetch_array($query)){ 

        
        $tenure = $_GET['Duration'.$i.''];
        $quantity = $_GET['Quantity'.$i.''];
        $pr_id = $product1['Product_id'];

        $sql2 = "INSERT INTO `temp`(`random_no`, `tenure`, `quantity`,`product_id`) VALUES ($random,$tenure,$quantity,$pr_id)";
        // echo $sql2;
        $query2 = mysqli_query($con,$sql2);

        $sql1 = "SELECT Rent from product where Product_id = ".$product1['Product_id']."";
        $query1 = mysqli_query($con,$sql1);
        $result = mysqli_fetch_row($query1);
        $rent = $result[0];
        $totalrent = $totalrent + ($rent*$tenure*$quantity);
        $i++;
    }
    $_SESSION['totalrent'] = $totalrent;
}

?>
<?php 

if(isset($_GET['checkout']))
{

$i=1;
    
    // echo $tenure ."Tenure <br>";
    // echo $quantity ."Quantity <br>";

    $con = mysqli_connect("localhost","root","","rent-it");
    $sqldata = "SELECT tenure,quantity,product_id FROM `temp` WHERE random_no = ".$_SESSION['random']."";
    $querydata = mysqli_query($con,$sqldata);
    
    while($product = mysqli_fetch_array($querydata)){ 
        

        // $sql4 = "SELECT * FROM `temp` WHERE random_no = ".$random."";
        // $query4 = mysqli_query($con,$sql4);   
        // $product4 = mysqli_fetch_row($query4);

        $date = date('Y-m-d');
        // echo $date;
        $tenure = $product['tenure'];
        $quantity = $product['quantity'];
        $product_id = $product['product_id'];
        
        
        $sql= "INSERT INTO `order_detail`(`order_id`,`customer_id`, `product_id`, `tenure`, `quantity`,`date`) VALUES (".$_SESSION['random'].",".$_SESSION['cid'].",".$product_id.",".$tenure.",".$quantity.",'".$date."')";
        // echo $sql;
        $query = mysqli_query($con,$sql);
        if($query)
        {
            $sql1 = "SELECT Customer_id,Product_Name from product where Product_id = ".$product_id."";
            $query1 = mysqli_query($con,$sql1);
            $result = mysqli_fetch_row($query1);
            $cid = $result[0];
            $pr_name = $result[1];
            $sql2 = "SELECT email from userdata where c_id = ".$cid."";
            $query2 = mysqli_query($con,$sql2);
            $result1 = mysqli_fetch_row($query2);
            $to_mail = $result1[0];

            $sub = "Your Item is being Rented";

            $body = "Hello, \nYour Product named $pr_name is being Rented by one of our user for $tenure months for total $quantity quantity. \n
            Please make it available within 2 days we will pick-up your product within 2 days so make it available \nThankyou ";

            $header = "From: official.rent.it@gmail.com";
            // echo $body;
            mail($to_mail,$sub,$body,$header);
        
        }

        $i++;
    }

    $con = mysqli_connect("localhost","root","","rent-it");
    $sqldata = "SELECT * FROM `order_detail` where order_id=".$_SESSION['random']."";
    $querydata = mysqli_query($con,$sqldata);
    $total = mysqli_num_rows($querydata);
    $j=0;
    while($product = mysqli_fetch_array($querydata)){

        $sql = "select * from product where Product_id = ".$product['product_id']."";
        $query = mysqli_query($con,$sql);
        $res = mysqli_fetch_array($query);
        $item[$j] = $res['Product_Name'];
        $rent[$j] = $res['Rent'];
        $j++;

        }  

    $to = $_SESSION['email'];

    $subject = "Your Rent-it Order of $total Item";

    error_reporting(0);
    $txt = "Hello ".$_SESSION['name'].", \nThank You for your order.You have ordered total $total Item and your total amount is ". $_SESSION['totalrent'].".\nThe Rented Items are :n      $item[0]\n      $item[1]\n      $item[2]\n      $item[3]\n      $item[4]\n      $item[5]\n
            ";
    error_reporting(E_ALL);

    $headers = "From: official.rent.it@gmail.com";

    if(mail($to,$subject,$txt,$headers))
    {
        echo '<script>alert("Items Rented Succesfully")</script>';
        $sql3 = "DELETE from cart where Customer_id=".$_SESSION['cid']."";
        $query3 = mysqli_query($con,$sql3);
    }
    else
    {
        echo '<script>alert("Something Went Wrong !!")</script>';
    }

    header("Refresh:0; url=http://localhost/project/homepage/dropdown.php");
}

?>
<html>
<head>
  <title>Cart</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/4.0.0-beta/iso_bootstrap4.0.0min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
  <link href="cart.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
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

<div class="container-fluid">
    
    <div class="row">
      <div class="col-md-10 col-11 mx-auto">
        <div class="row mt-5 mb-5 gx-3 pt-5">
<!-- right side div -->
          <div class="col-md-12 col-lg-4 col-11  mx-auto mt-lg-0 mt-md-5" >
              
            <div class="right_side p-3 shadow bg-white" style="width:700px">
              <h2 class="product_name mb-5">Total Amount Payable.</h2>
              <div class="price_indiv d-flex justify-content-between">
                <p>Product amount</p>
                <p>₹<span id="product_total_amt"><?php echo $totalrent; ?>.00</span></p>
              </div>
              <div class="price_indiv d-flex justify-content-between">
                <p>Shipping Charge</p>
                <p>₹<span id="shipping_charge">100.00</span></p>
              </div>
              <hr />
              <div class="total-amt d-flex justify-content-between font-weight-bold">
                <p>The total amount of (including GST) </p>
                <p>₹<span id="total_cart_amt"><?php $totalrent=$totalrent+100; echo $totalrent; ?>.00</span></p>
              </div>
              <form action="../Payment/payment.html" method="get">
                <button name="checkout" type="Submit" class="btn btn-success text-uppercase">Checkout<i class="fas fa-arrow-right"></i></button>
              </form>
            </div> 

             
            <!-- <div class="right_side p-3 mt-3 shadow bg-white">
                <h2 class="product_name mb-5">Total amount For Each Month</h2>
                <table class="table">
                  <thead>
                    <tr>

                      <th scope="col">Product Name</th>
                      <th scope="col">Quantity * Months</th>
                      <th scope="col">Final Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                      <td scope="row">Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit, sed do eiusmod.</td>
                      <td>10 Months(1 Piece only)</td>
                      <td>₹3500</td>
                    </tr>
                    <tr>

                      <td scope="row">Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>

                      <td scope="row">Larry</td>
                      <td>the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
                </table>
              </div> -->

            <div class="mt-3 shadow p-3 bg-white" style="width:700px">
              <div class="pt-4">
                <h5 class="mb-4">Expected delivery date</h5>
                <p>
                <?php 
                $Date1 = date('Y-m-d');
                $Date2 = date('M d Y', strtotime($Date1 . " + 2 day"));
                $Date3 = date('M d Y', strtotime($Date1 . " + 4 day"));
                echo $Date2." - ".$Date3;
                
                ?>
                </p>
              </div>
            </div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="cart.js"></script>

    </body>

</html>

<!-- April 27th 2021 - April 29th 2021 -->