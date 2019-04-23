<?php
$conn=mysqli_connect("localhost","root","","foodsys");
$query=mysqli_query($conn,"DELETE FROM cart");
$c_id=$_GET['c_id'];

$sql=mysqli_query($conn,"INSERT INTO order(c_id) VALUES ('$c_id')");

if($query)
header('Location:home.php');
