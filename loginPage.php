<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Travel Kenya | LogIn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" href="css/home.css">
  <script src = "js/home.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" class="shortPage">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.html"><img src="img/logo.png" alt="JustFly"/></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.html">HOME</a></li>
        <li><a href="#services">FLIGHTS</a></li>
        <li><a href="viewReservations.php">RESERVATIONS</a></li>
        <li><a href="loginPage.php">LOG IN</a></li>
        <li><a href="signUp.html">SIGN UP</a></li>
      </ul>
    </div>
  </div>
</nav>

<!--Login-->
<div class="jumbotron text-center">
<h1>Log In </h1>
			<div class="row">
			<form action="login.php" method="post" class="form" role="form">
			<input type="hidden" name="redirurl" value="<? echo $_SERVER['HTTP_REFERER']; ?>" />
			
			 <div class="col-xs-12 col-sm-12 col-md-4 col-sm-offset-4 col-xs-offset-2 col-md-offset-4" >
                    <label for = "firstname">Username: </label><input class="form-control" name="username" id = "username" placeholder="Userame" type="text" required autofocus />
                   <label for = "lasttname">Password: </label><input class="form-control" name="password" id = "password" placeholder="Password" type="password" required />
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Log In</button>
			</div>
            </form>
			</div>
</div>



<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>&copy; Travel Kenya. All Rights Reserved </p>
</footer>


</body>
</html>

