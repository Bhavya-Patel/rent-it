<?php

session_start();

$hostname = "localhost";
$user = "root";
$pwd = "";
$databasename = "rent-It";

$connection = mysqli_connect($hostname,$user ,$pwd,$databasename);
if (!$connection){
    die("connection failed".mysqli_connect_error());
}

$name = $_POST['uname'];
$phone = $_POST['uphone'];
$email = $_POST['uemail'];
$address = $_POST['utextarea'];
$cid =$_SESSION['cid'] ;


  if($name!=$_SESSION['name'] || $phone!=$_SESSION['Phone_No'] || $email!=$_SESSION['email'] || $address!=$_SESSION['address']){
        $sql = "UPDATE `userdata` SET `Name`='$name',`email`='$email',`PhoneNo`=$phone,`Address`='$address' WHERE `c_id`=$cid";

        $result = mysqli_query($connection,$sql);

        if($result) {
            echo '<script>alert("Information Updated Successfully")</script>';
            header("Location :http://localhost/Project/Profile Page/Profile.php");
        } 

    }
    else {
        echo '<script>alert("Information is Same ")</script>';
            header("refresh:0.5; url=http://localhost/Project/Profile Page/editprofile.php");
    }
?>
