<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../favicon.ico" type="image/ico"> 
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Add Item</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
          <!-- <form action="newuser.php" method="post" autocomplete="off">
            <h1 id="text1">Create Account</h1><br><br>   
           
            <input type="text" name="name" placeholder="Name" />
            <input type="email" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Password" />
            <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" placeholder="Phone no." required>
            <textarea rows="3" cols="37" placeholder="Address" name="address"></textarea>
            <button id="signup1">Sign Up</button>
          </form> -->
        </div>
        <div class="form-container sign-in-container">
            <h2 id="text">Add-Item</h2>
            <form id="myform" method="POST" action="upload.php" autocomplete="off" enctype="multipart/form-data">
            
                
                <input type="text" name="pname" id="pname" placeholder="Product Name" required>
    
                <input type="number" min="1" name="rent" id="rent" placeholder="Rent / Month" required>
                
                    <select name = "category" id="Category" placeholder="Category">
                    <option value = "Home_Furniture" selected>Home & Furniture</option>
                    <option value = "Sports" >Sports</option>
                    <option value = "Electronics" >Electronics</option>
                    <option value = "Books" >Books</option>
                    <option value = "Vehicles" >Vehicles</option>
                    <option value = "Men_Women" >Men & Women</option>
                    <option value = "Kids_Toys" >Kids & Toys</option>
                    <option value = "More" >More</option>
                    
                 </select>
    
                <textarea placeholder="Product_description" name="product_desc" id="Product_description"  required cols="49" rows="3"></textarea>
                <!-- <label>Upload Photos</label>  -->
                <input type="file" name="files[]" id="image_file" multiple >   
                
                <input type="submit" id="AddIt" class="button" name="AddIt" value="Add It">

                <!-- <button id="signup1" name="AddIt">Add It</button> -->
    
    
            </form>
        </div>
        <div class="overlay-container" id="right">
          <div class="overlay">
            
            <div class="overlay-panel overlay-right">
              <h1>Welcome Back!</h1>
              <p>To lend your product with us please enter your product's info as asked.<br><br>Lorem ipsum dolor sit amet.</p>
            </div>
          </div>
        </div>
            
    </div>
      
</body>
</html>