<?php

session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style1.css">
    <title>Login-Page</title>
</head>
<body>
    <div id="mydiv">
        <h2 id="heading">Registration Form</h2>
        <form id="myform" action="newuser.php" method="post" autocomplete="off">
            
            <label>Name</label> <br>
            <input type="text" name="fname" id="fname" placeholder="First Name" required >
            <input type="text" name="lname" id="lname" placeholder="Last Name" required >

            <label>E-mail</label><br>
            <input type="email" name="email" id="email" placeholder="Email-id" required ><br>
            
            <label>Password</label><br>
            <input type="password" name="password" id="pass" placeholder="Password" required ><br>

            <label>Phone</label><br>
            <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" placeholder="Phone no." required><br>

            <label>Address</label><br>
            <textarea placeholder="Address" name="address" id="address"  required cols="49" rows="3"></textarea>
            <input type="submit" id="sub" name="register" value="Register"><br>

        </form>
    </div>
</body>
</html>

