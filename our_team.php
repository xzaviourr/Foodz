<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Our Team</title>
	<link rel="stylesheet" type="text/css" href="style/our_team.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar " style="background-color: white;">
	  <a class="navbar-brand col-lg-2" href="#" ><img src="img/foodz_logo.png" style="height: 4vw;"></a>
	  <ul class="nav nav-pills">
	    <li class="nav-item">
	      <a class="nav-link" href="home.php" style="color: #D70F64; font-weight: bold; font-size: 1vw;">HOME</a>
	    </li> 
	    <li class="nav-item">
	      <a class="nav-link" href="#" style="background-color: #D70F64;color: white;font-weight: bold;font-size:1vw;">ABOUT</a>
	    </li>
	    <?php
	    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
	    echo "<a class='nav-link' href='logout.php' style='color: #D70F64;font-weight:bold;'>LOGOUT</a>";
	    else
	    echo "<a class='nav-link' href='login.php' style='color: #D70F64;font-weight:bold;'><i class='far fa-user'></i> LOGIN</a>";
	    
	    ?>
	  </ul>
	</nav>
<br><br>
	<div class="main_container">
		<section>
			<img src="img/about_us.jpg" class="img1">
			<div style="position: absolute; left: 40%;top: 40%;color: white;font-size: 4.5vw;">ABOUT US</div>
		</section>
		<section>
			<h1 style="color:#D70F64; padding-top:3vw;">Meet our developers who have taken countless efforts to make your experience smooth</h1>
		</section>
		<section>
			<div class="team_members">
				<div class="member">
					<img src="img/shivansh.png" alt="Shivansh Srivastava" class="mem">
					<div class="social">
						<div><a href="https://www.facebook.com/sastava007"><img src="img/fb.png"></a></div>
						<div><a href="https://www.instagram.com/sastava007/?hl=en"><img src="img/insta.png"></a></div>
						<div><a href="https://www.linkedin.com/in/shivansh-srivastava-524824169/"><img src="img/linkedin.png"></a></div>
					</div>
				</div>
				<div class="info">
					<div style="font-size: 4vw;">Shivansh Srivastava</div>
						<b>Creative Techie | Ambivert | IIITian</b><br><br>
						Hi, I am a CS undergrad at IIIT Gwalior. I love building beautiful user interfaces and designing experiences. What motivates is the belief that Computer Science has great power to make positive impacts in people's lives. I am passionate about creating technology products and designing experiences. I strive for excellence in each task I do while learning as much as possible during the process. I have empowered this site with my  backened development skills and UI design.
					</div>
			</div><br>
			<div class="team_members">
				<div class="info">
					<div style="font-size: 4vw;">Deep Shah</div>
						<b>Pythonistas | Critical Thinker | IIITian</b><br><br>
						Hello, I am a BCS student at IIIT Gwalior. I am such a person who can't be understood easily, and should not be judged immediately. I gear up differently for different situations making me adaptable and bring out the best.I believe every problem has a solution and so love to think solutions for social issues. Wish to become an employer instead of an employee someday.<br>A lot of things yet to come.
						
 				</div>
				<div class="member">
					<img src="img/deep.jpeg" alt="Deep Shah" class="mem">
					<div class="social">
						<div><a href="https://www.facebook.com/profile.php?id=100027839473724"><img src="img/fb.png"></a></div>
						<div><a href="https://www.instagram.com/balajipathange/"><img src="img/insta.png"></a></div>
						<div><a href="https://www.linkedin.com/in/pathange-balaji-rao-17406a16a/"><img src="img/linkedin.png"></a></div>
					</div>
				</div>
			</div><br>
			<div class="team_members">
				<div class="member">
					<img src="img/anshul.jpg" alt="Anshul Sanghi" class="mem">
					<div class="social">
						<div><a href="https://www.facebook.com/anshul.sanghi.3"><img src="img/fb.png"></a></div>
						<div><a href="https://www.instagram.com/anshul_sanghi_1/"><img src="img/insta.png"></a></div>
						<div><a href="https://www.linkedin.com/in/anshul-sanghi-1a0147167/"><img src="img/linkedin.png"></a></div>
					</div>
				</div>
				<div class="info">
					<div style="font-size: 4vw;">Anshul Sanghi</div>
					<b>Funny | Friendzoned | IIITian</b><br><br>
					Hey, I am a passionate guy who like to explore all the fields that I possibly can. Hacking is my passion and surprising people is my happiness. I seek people's attention, encouragement and appriciation. Starting my own company is my dream. I like to lead people with an example so trying my best to become a great leader whom people will follow with their full trust. Hope you loved my work in this website. Thanks for visiting :)
				</div>
			</div>
		</section>
	</div>

<center><h1 style="color: #D70F64; font-family: Tangerine; font-size: 4.3vw;"><b>This Project Has Been Done under the Supreme Guidance Of Prof. Neetesh Kumar</b></h1>
	<img src="img/neetesh.jpg" height="400px" width="350px;" style="margin-top: 0vw;">
<br> </center>







	<footer class="page-footer font-small indigo" style="width: 100vw; background-color: #D70F64;margin-top: 3vw;">

    <!-- Footer Links -->
    <div class="container">

      <!-- Grid row-->
      <div class="row text-center d-flex justify-content-center pt-5 mb-3">

        <!-- Grid column -->
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="our_team.php" style="color: white;">About us</a>
          </h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="#!" style="color: white;">Help</a>
          </h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="contactus.php" style="color: white;">Contact</a>
          </h6>
        </div>
        <!-- Grid column -->
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
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
          <p style="line-height: 1.7rem; color: white;">Bringing good food into your everyday. That's our mission.<br>

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

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
