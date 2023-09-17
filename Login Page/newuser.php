<?php

    
    $con = mysqli_connect("localhost","root","","rent-it");
    

        
        
        $Name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $Phone = $_POST['phone'];
        $Address = $_POST['address'];
        
        if(isset($Name) && isset($email) && isset($password) && isset($Phone) && isset($Address))
        {
            
            $query="insert into userdata (name, email, Password, PhoneNo, Address) values ('$Name','$email','$password',$Phone,'$Address');";
            mysqli_query($con,$query);
            if($query)
            {
                echo '<script>alert("Sign Up Succesfully")</script>'; 
                header("Location: index.html"); 
            }
            else
            {    
                echo '<script>alert("Something Went wrong ,please try again ")</script>'; 
            }
        }
        else{
            echo "variable not  set";
        }
            

    // mysqli_close($con);
    
	// header("Location: index.php"); 

?>

<!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, placeat! -->