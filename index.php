<?php include('header.php'); 
session_start();
?>
<html>
<head>
	<title>Restaurant</title>

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v4.7.0/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


		
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	
	<style type="text/css">
		.center{
		width: 150px;
		  margin: 40px auto;
		  
		}
	</style>


</head>
<body>

<nav class="" style="background-color: white;padding: 2vw;">
	  <a class= "col-lg-2" href="home.php" style=""><img src="img/foodz_logo.png" style="height: 4vw;"></a>
	  <ul class="nav nav-pills" style="float: right;">
	    <li class="nav-item">
	      <a class="nav-link" href="home.php" style="color: #D70F64; font-weight: bold; font-size: 1vw;">HOME</a>
	    </li> 
	    <li class="nav-item">
	     <a class="nav-link active" href="viewcart.php" style="background-color: #D70F64;color: white;font-weight: bold;font-size:1vw;"><i class="fas fa-cart-plus" style="color:white; font-size:1vw;"></i>   CART</a>
	    </li>
	    <?php
	    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
	    echo "<a class='nav-link' href='logout.php' style='color: #D70F64;font-weight:bold; padding-top:0.5vw; font-size:1vw'>LOGOUT</a>";
	    else
	    echo "<a class='nav-link' href='login.php' style='color: #D70F64;font-weight:bold;padding-top:0.5vw; font-size:1vw;'><i class='far fa-user' style='font-size:1vw;'></i><b> LOGIN</b></a>";
	    
	    ?>
	  </ul>
</nav>


<div class="res_bg" style="position: relative; padding-top: 2vw;">
<img src="img\res_bg.jpg" style="width:99.5vw;height: 29vw; filter: blur(7px);-webkit-filter: blur(7px); position: relative;">
<div style="position: absolute;top: 12vw; left: 47vw;"><a href="home.php"><img src="img\foodz_logo.png"></a></div>
<div style="position: absolute; top: 18.7vw; left:30vw"><b><h1 style="font-family: Roboto,sans-serif ;color:White;">Enjoy the best Dishes and Drinks Around You</h1></b>
  </div>
</div>



<div class="card mb-3" style="width: 100%; padding-top: 3.6vw;padding-left: 5vw;">
  <div class="row no-gutters">
    <div class="col-md-4">
    	<?php
    	$r_id=$_GET['r_id'];
    	$conn=mysqli_connect("localhost","root","","foodsys");
		$query=mysqli_query($conn,"SELECT * FROM restaurant NATURAL JOIN restaurant_norm where r_id= '".$r_id."'  ");
		$row=mysqli_fetch_assoc($query);
      echo "
      <img src='".$row['photo']."' class='card-img' alt='...' style='width:26vw; border-radius:5%;'>
    </div>
    <div class='col-md-8'>
      <div class='card-body'>
        <h1 class='card-title' style='font-size:4vw;font-weight: bold;'>".$row['name']."</h1>
        <p class='card-text'><i class='fas fa-map-marker-alt' style='size:1vw;'></i> ".$row['address']."</p>
        <div class='rating' style='background-color:white; width:6vw; height:3vw; text-align: center; padding: 0.5vw; background-color: #D70F64;color:white; margin-bottom:1vw;font-size:1.5vw;letter-spacing:0.1vw;border-radius:5%;'><b>4.5/<span style='font-size:1.2vw;'>5</span></div>
      </div>
    </div>";
    ?>
  </div>
</div><br><br>



	<?php
	$r_id=$_GET['r_id'];
	$conn=mysqli_connect("localhost","root","","foodsys");
	$sql=mysqli_query($conn,"SELECT * FROM menu where r_id='".$r_id."'");
	$i=1;
	while ($row=mysqli_fetch_assoc($sql)) 
	{
		if($i%3==1)
		echo "<div class='card-group'>";
		echo "<div class='card' style='margin:2vw;'>
		<div style='background-color: #D70F64; padding:0.8vw; width:29vw;'><h2 style='color:white; width:30vw;'>".$row['name']."</h2></div>
    	<img src='".$row['photo']."' class='card-img-top' style='height:19vw; margin:1vw;width:27vw; margin-bottom:0vw;'>
    	<div class='card-body'>
     	 <h2 class='card-title'></h2>
      	<b><h3 class='card-text' style='font-family:Roboto;'>".$row['description']."</h3></b><br>
      	<span>
      	<div><h3><i class='fas fa-rupee-sign' style='color:#D70F64;font-size:30px;'></i> ".$row['price']."</h3></div>
      	<div>
      	<form action ='addtocart.php' method='POST'>
      	<input type='text' value='".$row['i_id']."' name='item' style='display:none;'>
      		<i class='fas fa-cart-plus' style='color:#D70F64; font-size:2vw;'></i> <b><input type='submit' class='addtocart'value='ADD' style='width:5vw; padding:0.5vw; font-size:1vw; color:white; background-color:#D70F64; border:none; border-radius:0.3rem;'></b>
      	</form>
      	</div>
      	</span>
      	</div>
    	</div>";
   		 $i++;
		if($i%3==1)
		echo "</div>";
	}
 
    ?>
  </div>


<!-- Footer -->
<footer class="page-footer font-small indigo" style="width: 100vw; background-color: #D70F64;margin-top: 3vw; height: 18vw;">

    <!-- Footer Links -->
    <div class="container">

      <!-- Grid row-->
      <div class="row text-center d-flex justify-content-center pt-5 mb-3">

        <!-- Grid column -->
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold" style="font-size: 1vw;">
            <a href="our_team.php" style="color: white;">About us</a>
          </h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold"style="font-size: 1vw;">
            <a href="#!" style="color: white;">Help</a>
          </h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold"style="font-size: 1vw;">
            <a href="contactus.php" style="color: white;">Contact</a>
          </h6>
        </div>
        <!-- Grid column -->
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold"style="font-size: 1vw;">
            <a href="restaurant_login.php" style="color: white;">FOR RESTAURANT</a>
          </h6>
        </div>

      </div>
      <!-- Grid row-->
      <hr class="rgba-white-light" style="margin: 0 10%; background-color:white; ">

      <!-- Grid row-->
      <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

        <!-- Grid column -->
        <div class="col-md-8 col-12 mt-5">
          <p style="line-height: 1.7rem; color: white; font-size: 1vw; font-weight: normal; word-spacing: 0.2vw;">Bringing good food into your everyday. That's our mission.<br>

That means we don't just deliver we bring it, always going the extra mile to make your experience memorable.<br>

And it means this is delicious food you can enjoy everyday: from vibrant salads for healthy office lunches, to indulgent family-sized pizzas, to fresh sushi for a romantic night in. Whatever you crave, we can help.</p>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->
      <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

      <!-- Grid row-->
      
      <!-- Grid row-->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->

    <!-- Copyright -->

  </footer>
  <!-- Footer -->




<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 

