<?php

$id = $_GET['id'];
$con = mysqli_connect('localhost','root','','rent-it');

$sql = "delete from product where Product_id=".$id."";
$query = mysqli_query($con,$sql);
if($con)
{
    echo '<script>alert("Selected Item Deleted Succesfully")</script>';
    
    header("location:profile.php");
}
else
{
    echo '<script>alert("Something went wrong !! please try again.")</script>';
    
    header("location:profile.php");
}

?>