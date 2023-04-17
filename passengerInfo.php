<?php
session_start();
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$dob = $_POST['dob'];
$guests = $_POST['guests'];
$onInstance = $_POST['onInstance'];
$returnInstance = $_POST['returnInstance'];
echo($fname." ".$lname ." ".$dob. " ". $guests );
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Travel Kenya | Passenger Information</title>
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
<body style=color:green; id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" class="shortPage">

<nav class="navbar navbar-default navbar-fixed-top" style="background-color:black">
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
        <li><a href="Signed_in.html">HOME</a></li>
        <li><a href="viewFlights.php">FLIGHTS</a></li>
		<?php
		if(isset($_SESSION['user_fname']))
		{
			echo("<li><a href='viewReservations.php'>RESERVATIONS</a></li>");
			echo("<li><a href='logout.php'>LOG OUT</a></li>");			
		}
		else
		{
			echo('<li><a href="loginPage.php">LOG IN</a></li>');
			echo('<li><a href="signUp.html">SIGN UP</a></li>');
		}
		?>
      </ul>
    </div>
  </div>
</nav>

<!--Login-->
<div class="jumbotron text-center" style="background-color:orange;">
<h1>Passenger Information </h1>
			<div class="row">
			<form action="makeReservation.php" method="post" class="form" role="form">
			<!-- Send flight instance, number of guests, category to reservation page -->
			<input type="hidden" name="redirurl" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
			<p>Primary Traveller</p>
			<div class="col-xs-4 col-xs-offset-4">
			<select name="mealpref" class="form-control" placeholder="Meal Preference">
				<option value="Vegetarian">Vegetarian</option>
				<option value="Vegan">Vegan</option>
				<option value="NonVegetarian">Non-Vegetarian</option>
				<option value="GlutenFree">Gluten Free</option>
			</select>
			</div>
			<br />
			<br />
			<?phpphp
				for ($i = 1; $i <= $guests; $i++) {
			?>
			 <label for = "firstname">Traveller: <?php echo $i?> </label>
				<div  class = "form-inline">
					<input class="form-control" name="firstname<?php echo($i)?>" id = "firstname" placeholder="First Name" type="text" required autofocus />
                    <input class="form-control" name="lastname<?php echo($i)?>" id = "lastname" placeholder="Last Name" type="text" required />

				</div>
			<br/>
			<div  class = "form-inline">
			<select name="mealpref<?php echo($i) ?>" class="form-control" placeholder="Meal Preference">
				<option value="Vegetarian">Vegetarian</option>
				<option value="Vegan">Vegan</option>
				<option value="NonVegetarian">Non-Vegetarian</option>
				<option value="GlutenFree">Gluten Free</option>
			</select>
			<input class="form-control" name="age<?php echo($i)?>" id = "age" placeholder="age" type="text" required />
				</div>
			<br>
			<div class="form-inline">
			<input class="form-control" name="passengerId<?php echo($passengerId)?>" id = "passengerId" placeholder="your id" type="text" required />
			<!--<input class="form-control" name="onInstance<?php echo($onInstance)?>" id = "onInstance" placeholder="onInstance" type="text" required />-->
			<input class="form-control" name="youremail<?php echo($returnInstance)?>" id = "youremail" placeholder="Enter your email" type="email" required />
			<input class="form-control" name="returnInstance<?php echo($returnInstance)?>" id = "returnInstance" placeholder="plane class" type="text" required />
			<!-- <input class="form-control" name="dob<?php echo($dob)?>" id = "dob" placeholder="dob" type="text" required /> -->
           <input class="form-control" name="guest<?php echo("guest")?>" id = "guest" placeholder="guest" type="text" required />
		   <input class="form-control" name="seatNo<?php echo("enter seat between 1 and 100")?>" id = "seatNo" placeholder="seat number" type="text" required />

			</div>
		
			<br>
			<div class = "row" style="text-align:'center'">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Confirm Booking</button>
			</div>
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

