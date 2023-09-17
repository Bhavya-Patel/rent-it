<?php

    
    $con = mysqli_connect("localhost","root");
    if ($con) {
        echo "successful connection"."<br>";
    }
    else{
        die("fail connection");
    }

    $dbs = mysqli_select_db($con,"rent-It");
    if ($dbs) {
        echo "successful connection with database"."<br>";
    }
    else{
        die("fail connection with database");
    }

        
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $Phone = $_POST['phone'];
        $Address = $_POST['address'];
        
        if(isset($firstName) && isset($email) && isset($password) && isset($Phone) && isset($Address))
        {
            
            $query="insert into userdata (Fname, email, Password, PhoneNo, Address) values ('$firstName','$lastName','$email','$password',$Phone,'$Address');";
            mysqli_query($con,$query);
        }
        else{
            echo "variable not  set";
        }
            

    mysqli_close($con);
    
	header("Location: index.php"); 

?>