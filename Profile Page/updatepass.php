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


$p1 = $_POST['n1pass'];
$p2 = $_POST['n2pass'];
$cid =$_SESSION['cid'] ;
$password = $_SESSION['password'];
$l1 = strlen($p1);
$l2 = strlen($p2);

// if($l1==0 || $l2==0){
//     // echo $l1;
//     // echo $l2;
//     echo '<script>alert("Enter Password Minimum of 6 Character")</script>';
//     header( "refresh:0.5; url=http://localhost/Project/Profile Page/editprofile.php" );
// }

    if($p1 == $p2){
        $password = $p2;
        $sql = "UPDATE `userdata` SET `Password`='$password' WHERE `c_id`=$cid";

        $result = mysqli_query($connection,$sql);

        if($result) {
            echo '<script>alert("Information Updated Successfully")</script>';
            header("refresh:0.5; url=http://localhost/Project/Profile Page/editprofile.php");
        } 

    }
    
    if($p1 != $p2){
        echo '<script>alert("Both password is different Enter Same Password")</script>';
        header("refresh:0.5; url=http://localhost/Project/Profile Page/editprofile.php");
    }





?>