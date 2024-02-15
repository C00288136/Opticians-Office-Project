<?php

//use this file to as a class to connect to the sever instead of typing the info out every time 

$hostname = "localhost";
$username = "clearvision";
$password = "Ey3;Care!";
$dbname = "Optician_Project";


$con = mysqli_connect($hostname,$username,$password,$dbname);

if (!$con)
{
die("Failed to connect to MYSQL: " . mysqli_connect_error());
}
?>
