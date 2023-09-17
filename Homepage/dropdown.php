<?php

    session_start();
?>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Rent-It</title>
  <link rel="icon" href="../favicon.ico" type="image/ico"> 
  <link rel="stylesheet" href="dropdown.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/4.0.0-beta/iso_bootstrap4.0.0min.css">

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  
  <link rel="stylesheet" href="../ideal-image-slider.css">
	<link rel="stylesheet" href="../themes/default/default.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- <link href="style.css?v=<?php echo time(); ?>"  rel="stylesheet" type="text/css" /> -->
	<style media="screen">
	#slider {
		max-width: 1200px;
    margin: 2px auto;
    height: 450px !important;
    margin-bottom:20px;
  }
  @media (max-width:425px){
    #slider {
    height: 250px !important;
  }
  }
  
  </style>

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

  <!-- ImageSlider Start -->
  
  <div id="slider">
		<img class="imgslider" src="img/s1.jpeg"  alt="Slide 1" />
		<img class="imgslider" src="img/s2.jpeg" alt="Slide 2" />
	  <img class="imgslider" src="img/s3.jpeg" alt="Slide 3" /></a>
		<img class="imgslider" src="img/s4.jpeg" alt="Slide 4" />
	</div>

  <!-- ImageSlider Ends -->
<!-- <center>
<hr width="1000px">
</center> -->
  <!-- Top Product Section Start -->
    <div class="bootstrap">

      <section class="section-bg">
        <div class="container">
           
           <div class="row">
               <div class="col-xl-12">
                   <div class="top-product-section-title">
                       <h2>Top Rental Products of The Week. What’s yours?</h2>
                   </div>
               </div>
           </div>
   
           <div class="row">
   
               <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                   <div class="top-product">
                       <div class="top-product-thumb">
                           <img class="top-product-imgs" src="img/1.png" alt="">
                       </div>
                       <div class="top-product-btns">
                        <button type="button" class="btn btn-outline-danger">Oneplus 8T 64GB</button>
                       </div>
                   </div>
               </div>
   
               <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                   <div class="top-product">
                       <div class="top-product-thumb">
                           <img class="top-product-imgs" src="img/washingM.jpg" alt="">
                       </div>
                       <div class="top-product-btns">
                        <button type="button" class="btn btn-outline-danger">LG 7L Washing machine</button>
                       </div>
                   </div>
               </div>
   
               <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                   <div class="top-product">
                       <div class="top-product-thumb">
                           <img class="top-product-imgs" src="img/dtable.jpg" alt="">
                       </div>
                       <div class="top-product-btns">
                        <button type="button" class="btn btn-outline-danger">Dining table 4P</button>
                       </div>
                   </div>
               </div>
   
               <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                   <div class="top-product">
                       <div class="top-product-thumb">
                           <img class="top-product-imgs" src="img/bed.jpg" alt="">
                       </div>
                       <div class="top-product-btns">
                        <button type="button" class="btn btn-outline-danger">Double Bed (6.6x6)</button>
                       </div>
                   </div>
               </div>
   
   
               <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                   <div class="top-product">
                       <div class="top-product-thumb">
                           <img class="top-product-imgs" src="img/bike.jpg" alt="">
                       </div>
                       <div class="top-product-btns">
                        <button type="button" class="btn btn-outline-danger">Hero HF DELUXE BS6</button>
                       </div>
                   </div>
               </div>
   
               <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                   <div class="top-product">
                       <div class="top-product-thumb">
                           <img class="top-product-imgs" src="img/activa.jpg" alt="">
                       </div>
                       <div class="top-product-btns">
                        <button type="button" class="btn btn-outline-danger">Honda activa</button>
                       </div>
                   </div>
               </div>
   
               <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                   <div class="top-product">
                       <div class="top-product-thumb">
                           <img class="top-product-imgs" src="img/11.png" alt="">
                       </div>
                       <div class="top-product-btns">
                        <button type="button" class="btn btn-outline-danger">Samsung Smart Watch</button>
                       </div>
                   </div>
               </div>
   
               <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                   <div class="top-product">
                       <div class="top-product-thumb">
                           <img class="top-product-imgs" src="img/10.png" alt="">
                       </div>
                       <div class="top-product-btns">
                        <button type="button" class="btn btn-outline-danger">Nokia-NK1 Core-i5 8GB</button>
                       </div>
                   </div>
               </div>
   
           </div>
   
   
        </div>
    </section>

</div>

<!-- Top Product Section End -->


<!-- Categories start -->
    <div class="bootstrap">

      <section class="categories-bg">

        <div class="row">
          <div class="col-xl-12">
              <div class="top-categories-section-title">
                  <h2>Categories</h2>
              </div>
          </div>
      </div>

        <div class="row">

              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="top-categories">
                  <div class="categories-thumb">
                      <img class="categories-imgs" src="img/laptop.png" alt="Category-icon">
                  </div>
                  <div class="categories-btns-section">
                    <button type="button" onclick="document.location.href='../product detail/category.php?category=Electronics';" class="btn btn-outline-danger categories-btns">Electronics</button>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="top-categories">
                  <div class="categories-thumb">
                      <img class="categories-imgs" src="img/car.png" alt="Category-icon">
                  </div>
                  <div class="categories-btns-section">
                    <button type="button" onclick="document.location.href='../product detail/category.php?category=Vehicles';" class="btn btn-outline-danger categories-btns">Vehicles</button>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="top-categories">
                  <div class="categories-thumb">
                      <img class="categories-imgs" src="img/washing-machine.png" alt="Category-icon">
                  </div>
                  <div class="categories-btns-section">
                    <button type="button" onclick="document.location.href='../product detail/category.php?category=Home_Furniture';" class="btn btn-outline-danger categories-btns">Home&Furniture</button>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="top-categories">
                  <div class="categories-thumb">
                      <img class="categories-imgs" src="img/treadmill.png" alt="Category-icon">
                  </div>
                  <div class="categories-btns-section">
                    <button type="button" onclick="document.location.href='../product detail/category.php?category=Sports';" class="btn btn-outline-danger categories-btns">Sports</button>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="top-categories">
                  <div class="categories-thumb">
                      <img class="categories-imgs" src="img/wristwatch.png" alt="Category-icon">
                  </div>
                  <div class="categories-btns-section">
                    <button type="button" onclick="document.location.href='../product detail/category.php?category=Men_Women';" class="btn btn-outline-danger categories-btns">Fashion</button>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="top-categories">
                  <div class="categories-thumb">
                      <img class="categories-imgs" src="img/toys.png" alt="Category-icon">
                  </div>
                  <div class="categories-btns-section">
                    <button type="button" onclick="document.location.href='../product detail/category.php?category=Kids_Toys';" class="btn btn-outline-danger categories-btns">Kids&Toy</button>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="top-categories">
                  <div class="categories-thumb">
                      <img class="categories-imgs" src="img/books.png" alt="Category-icon">
                  </div>
                  <div class="categories-btns-section">
                    <button type="button" onclick="document.location.href='../product detail/category.php?category=Books';" class="btn btn-outline-danger categories-btns">Books</button>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="top-categories">
                  <div class="categories-thumb">
                      <img class="categories-imgs" src="img/more.png" alt="Category-icon">
                  </div>
                  <div class="categories-btns-section">
                    <button type="button" onclick="document.location.href='../product detail/category.php?category=More';" class="btn btn-outline-danger categories-btns">More</button>
                  </div>
                </div>
              </div>

        </div>

     </section>
  </div>


  <!--Categories end -->


   <!-- Deal of the day Section Starts -->
    <div class="bootstrap">
      <section class="section-bg">
          <div class="container">
             
             <div class="row">
                 <div class="col-xl-12">
                     <div class="section-title">
                         <h2>Deal Of Day</h2>
                     </div>
                 </div>
             </div>

                <div class="row">

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="single-product">
                                <div class="product-thumb">
                                    <img class="deal-of-day-img" src="img/1.png" alt="">
                                </div>
                                <div class="product-title">
                                    <h3><a href="#">Oneplus 6T pro (128 GB)</a></h3>
                                </div>
                                <div class="product-btns">
                                    <label class="btn-small mr-2">₹970/m</label>
                                    <button class="btn btn-outline-danger">See More</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                          <div class="single-product">
                              <div class="product-thumb">
                                  <img class="deal-of-day-img" src="img/10.png" alt="">
                              </div>
                              <div class="product-title">
                                  <h3><a href="#">Apple Macbook Air (128 GB)</a></h3>
                              </div>
                              <div class="product-btns">
                                  <label class="btn-small mr-2">₹970/m</label>
                                  <button class="btn btn-outline-danger">See More</button>
                              </div>
                          </div>
                      </div>

                      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-product">
                            <div class="product-thumb">
                                <img class="deal-of-day-img" src="img/activa.jpg" alt="">
                            </div>
                            <div class="product-title">
                                <h3><a href="#">Honda Activa (109.19 cc)</a></h3>
                            </div>
                            <div class="product-btns">
                                <label class="btn-small mr-2">₹970/m</label>
                                <button class="btn btn-outline-danger">See More</button>
                            </div>
                        </div>
                    </div>


                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                      <div class="single-product">
                          <div class="product-thumb">
                              <img class="deal-of-day-img" src="img/bike.jpg" alt="">
                          </div>
                          <div class="product-title">
                              <h3><a href="#">Hero HF DELUXE BS6</a></h3>
                          </div>
                          <div class="product-btns">
                              <label class="btn-small mr-2">₹970/m</label>
                              <button class="btn btn-outline-danger">See More</button>
                          </div>
                      </div>
                  </div>
                    
                </div>

            </div>
        </section>
    </div>

            
             <!-- Deal of the day Section End -->

             <!-- footer start -->

             <footer class="footer">
  	 <div class="container">
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

<script src="dropdown.js" ></script>
<script src="../ideal-image-slider.js"></script>
	<script src="../extensions/bullet-nav/iis-bullet-nav.js"></script>
	<script>
	var slider = new IdealImageSlider.Slider('#slider');
	slider.addBulletNav();
	slider.start();
	</script>
</html>


