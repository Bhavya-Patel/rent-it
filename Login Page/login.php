<?php

    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $hostname = "localhost";
    $user = "root";
    $pwd = "";
    $databasename = "rent-It";

    $connection = mysqli_connect($hostname,$user ,$pwd,$databasename);
    if (!$connection){
        die("connection failed".mysqli_connect_error());
    }


    $sql = "SELECT * FROM userdata WHERE email='" . $email . "' && Password ='". $password."' ";
    $result = mysqli_query($connection,$sql);
    $count  = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
	if($count==0) {
        //echo '<script>alert("Invalid Username or Password!")</script>'; 
        echo "Invalid Username or Password!";
        
    } 
    else 
    {
        echo "You are successfully authenticated!";
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['cid'] = $row['c_id'];
        $_SESSION['name'] = $row['Name'];
        $_SESSION['address'] = $row['Address'];
        $_SESSION['Phone_No'] = $row['PhoneNo'];

        // echo  $_SESSION['cid'];
        header("location: http://localhost/project/homepage/dropdown.php");
	}
    
    
?>
