<?php

$servername = "localhost";

$username = "id16402470_name";

$password = "GJ3s}KHJlPE(d4%Z";

$db = "id16402470_rentit";



// Create connection

$conn = mysqli_connect($servername, $username, $password,$db);



// Check connection

if (!$conn) {

   die("Connection failed: " . mysqli_connect_error());

}

echo "Connected successfully";

?>