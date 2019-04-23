<?php
require 'PHPMailerAutoload.php';
session_start();
if(isset($_POST["submit"]))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=nl2br($_POST['message']);
    $conn=mysqli_connect("localhost","root","","foodsys");
    $query=mysqli_query($conn,"INSERT INTO complaint(name,email,complaint) VALUES('$name','$email','$message')");
    if($query)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'foodz.eatmail@gmail.com';                 // SMTP username
        $mail->Password = 'p@ssword@321';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('foodz.eatmail@gmail.com', 'FOODZ!');
        $mail->addAddress('foodz.eatmail@gmail.com');     // Add a recipient
        
        $mail->addReplyTo('foodz.eatmail@gmail.com', 'Information');
        
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Complaint!!';
        $mail->Body    = '<b><h1>You have a new complaint.</br> Please Login And resolve it.<h1></b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send())
        {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } 
        else
             header('Location:home.php');
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<nav class="navbar " style="background-color: white;">
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
<br><br><br>
<h1 style="color: #D70F64;"><strong><center>Contact Us!</center></strong></h1>

        <div class="container" style="margin-top:3vw; ">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-danger text-white" style="background:#D70F64;"><i class="fa fa-envelope"></i> Contact us.
                        </div>
                        <div class="card-body">
                            <form action="contactus.php" method="POST">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" name="message" rows="6" required></textarea>
                                </div>
                                <div class="mx-auto">
                                <button type="submit" class="btn btn-danger text-right" name="submit">Submit</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="card bg-light mb-3">
                        <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                        <div class="card-body">
                            <p>Room No: 242 Nilgiri Hostel</p>
                            <p>ABV-IIITM Gwalior</p>
                            <p>(MP) India</p>
                            <p>Email : foodz.eatmail@gmail.com</p>
                            <p>Tel. +91 6387547833</p>

                        </div>

                    </div>
                </div>
            </div>
        </div>


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



</body>
</html>


