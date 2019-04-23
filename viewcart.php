<?php
session_start();
if(!isset($_SESSION['logged_in']))
	{
		echo "<script>window.alert('You Must First Login To Add Items to Your Cart')</script>";
		exit(1);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
		
	<link rel="stylesheet" type="text/css" href="style\addtocart.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">



</head>
<body>

	<nav class="navbar " style="background-color: white; ">
	  <a class="navbar-brand col-lg-2" href="#" ><img src="img/foodz_logo.png" style="height: 4vw;"></a>
	  <ul class="nav nav-pills">
	    <li class="nav-item">
	      <a class="nav-link active" href="home.php" style="color: white; background-color: #D70F64;font-weight: bold;">HOME</a>
	    </li> 
	    <li class="nav-item">
	      <a class="nav-link" href="#" style="color: #D70F64;font-weight: bold;">ABOUT</a>
	    </li>
	    <?php
	    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
	    echo "<a class='nav-link' href='logout.php' style='color: #D70F64;font-weight:bold;'>LOGOUT</a>";
	    else
	    echo "<a class='nav-link' href='login.php' style='color: #D70F64;font-weight:bold;'><i class='far fa-user'></i> LOGIN</a>";
	    
	    ?>
	  </ul>
	</nav>
	<center><h1 style="color: #D70F64; padding-top: 2vw; font-size: 4vw;"><b>Food Cart</b></h1></center> 


	<div class="container" style="padding-top: 3vw;">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:10%">Remove</th>
						</tr>
					</thead>
	<tbody>
						
							
					<?php
					$conn=mysqli_connect("localhost","root","","foodsys");
					$query=mysqli_query($conn,"SELECT * FROM cart");
					$i=0;
					$j=1000;
					$sum=0;
					while($row=mysqli_fetch_assoc($query))
	{					$i=$i+1;
						$j=$j+1;
							echo "<tr>	<td data-th='Product'>
								  			<div class='row'>
								          	<div class='col-sm-2 hidden-xs'><img src='".$row['photo']."' style='width:300px; height: 150px;' class='img-responsive'/></div>
											 	<div class='col-sm-10'>
													<h3 class='nomargin' style='padding-left:14vw;'>".$row['name']."</h3>
													
												</div>
											</div>
										</td>

										<td data-th='Price' id='p".$j."' value=".$row['price'].">".$row['price']."</td>
										<td data-th='Quantity'>
											<input type='text' class='form-control text-center' value='1' id='q".$i."'>
										</td>
										<td class='actions' data-th=''>
											<a href='removeproduct.php?id=".$row['id']."' class='btn btn-danger btn-sm' style='width: 3vw;'><i class='fas fa-window-close' style='font-size: 1.6vw;'></i></a>								
										</td>
							      </tr>
	</tbody>";
							
	}
								
	?>
						<tfoot>
							<tr class='visible-xs'>
							
							</tr>
						<tr>
							<td><a href='home.php' class="btn btn-warning" style="color: white;"><i class="fas fa-chevron-left"></i><b> Continue Shopping</b></a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg" style="width: 10vw;"> <b>Checkout</b> 
							<i class="fas fa-chevron-right"></i></button>
								<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  									<div class="modal-dialog modal-lg">
   										<div class="modal-content" style="border-style: solid;border-color: #D70F64; border-width: 3px; border-radius: 3px;">
   											<h1 style="color: #D70F64; padding: 1vw; font-family:Ubuntu;"><center>Your Order has been confirmed!</center></h1>
   											<?php 
   											$conn=mysqli_connect("localhost","root","","foodsys");
   											$email=$_SESSION['email'];
   											$query=mysqli_query($conn,"SELECT * from users NATURAL JOIN users_norm WHERE email='".$email."'");
   											$row=mysqli_fetch_assoc($query);
   											echo "<h3 style='float: right; padding-left: 20vw; padding-top:2vw;color:#D70F64;'>".$row['name']."</h3>";
   											echo "<h5 style='float: right; padding-left: 20vw; padding-top: 1vw; color:#D70F64;'><i class='fas fa-map-marked-alt' style='font-size:2vw;'></i> ".$row['address']."</h5>";
   											echo "<h5 style='float: right; margin-left: 20vw; padding-top: 1vw; color:#D70F64;'>Delivery Boy: Gaurav Kumar</h5> ";
   											echo "<h5 style='padding-left:20vw; padding-top:1vw;color:#D70F64;'><i class='fas fa-mobile-alt' style='font-size:2vw;'></i>  9450555845</h5>";
   											echo "<h5 style='padding-left:20vw; padding-top:1vw;color:#D70F64;'><i class='fas fa-rupee-sign' style='color:#D70F64;font-size:30px;'></i> 650/-</h5><br>";
   											echo "<h6 style='padding-left:20vw;color:#D70F64;'>Thanks for shopping with us</br> Have a happy fooding!</h6>";
   											echo "<a href='clearcart.php?c_id=".$row['u_id']."'style='color:white;'><button type='button' class='btn btn-warning' style=' margin-left:10vw; width:8vw;margin-top:2vw;'><b>LET's FOODZ</button><b></a><img src='img/delivery.png' style='position: relative; height: 300px;align-self: baseline;padding: 1vw;'>";


   											?>



   										</div>
  								    </div>
								</div>


						</td>
						</tr>
					</tfoot>
	</table>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>

