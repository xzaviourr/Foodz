<?php
	session_start();
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
	{
			$id=$_POST["item"];
			$conn=mysqli_connect("localhost","root","","foodsys");
			$query=mysqli_query($conn,"SELECT * FROM menu where i_id='".$id."'");
			$row=mysqli_fetch_assoc($query);
			$i_id=$row['i_id'];
			$r_id=$row['r_id'];
			$price=$row['price'];
			$photo=$row['photo'];
			$name=$row['name'];

			$query2=mysqli_query($conn,"SELECT COUNT(*) AS RID from cart WHERE r_id!='".$r_id."' ");
			$num2=mysqli_fetch_assoc($query2);

			$query3=mysqli_query($conn,"SELECT COUNT(*) AS EMPTY FROM cart");
			$num3=mysqli_fetch_assoc($query3);


		/*
			echo $num2['RID'];
			echo $num3['EMPTY'];*/
			
			if($num2['RID']=='0' OR $num3['EMPTY']=='0')
			{
				$query=mysqli_query($conn,"INSERT INTO cart(i_id,r_id,price,photo,name) VALUES('$i_id','$r_id','$price','$photo','$name')");
				if($query)
				{
					header('Location:index.php?r_id='.$r_id.'');
					/*include("index.php?r_id='".$r_id."'");*/

				}
					
					
			}
			else
			{
				echo "<script>window.alert('First Clear the Cart');</script>";
			}
	}
	else
		
		echo "<script>window.alert('You Must Login First to add items to your cart')</script>";
	

?>