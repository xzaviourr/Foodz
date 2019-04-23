<?php
$id=$_GET['id'];
$conn=mysqli_connect("localhost","root","","foodsys");
$query=mysqli_query($conn,"DELETE FROM cart where id='".$id."'");
if($query)
	header('Location:viewcart.php');
?>