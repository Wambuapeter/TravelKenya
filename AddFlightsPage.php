<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Add Flights</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" href="css/home.css">
  <script src="js/home.js"></script>
 
  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<nav class="navbar navbar-default navbar-fixed-top" style="background-color: black;">
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
        <li><a href="updateFlightsPage.php">HOME</a></li>
		<?php
		if(isset($_SESSION['admin_email']))
		{
			echo("<li><a href='updateFlightsPage.php'>UPDATE FLIGHTS</a></li>");
			echo("<li><a href='AdminLogout.php'>LOG OUT</a></li>");			
		}
		else
		{
			header("Location : Admin_signInPage.php");
		}
		?>
      </ul>
    </div>
  </div>
</nav>


<div class="jumbotron text-center" style="background-color: aqua;">
<h1>Add Flight</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-sm-offset-4 col-xs-offset-2 col-md-offset-4" >
            <form class="form" role="form" action="AddFlights.php" method ="POST">
            <table>
            <tr>
            
            <td> <label for = "flight_no">Flight Number: </label><input class="form-control" name="flight_no" id = "flight_no" placeholder="Flight Number" /></td>
            <td><label for = "flight_Instance">Flight Instance: </label><input class="form-control" name="flight_Instance" id= "flight_Instance" placeholder="Flight Instance"  /></td>
			</tr>
			<tr>
			<td><label for = "from">From Airport Id: </label><input class="form-control" name="from" id = "from" placeholder="From Airport Id"  /> </td>
            <td> <label for = "to">To Airport Id: </label><input class="form-control" name="to" id= "to" placeholder="To Airport Id"  /></td>
			 </tr>
			 <tr>
			<td><label for = "fromCity">From City: </label><input class="form-control" name="fromCity" id = "fromCity" placeholder="From City"  /> </td>
            <td> <label for = "toCity">To City: </label><input class="form-control" name="toCity" id= "toCity" placeholder="To City"  /></td>
			 </tr>
			 <tr>
			<td><label for = "fromState">From State: </label><input class="form-control" name="fromState" id = "fromState" placeholder="From State"  /> </td>
            <td> <label for = "toState">To State: </label><input class="form-control" name="toState" id= "toState" placeholder="To State"  /></td>
			 </tr>
			 <tr>
			 <td><label for = "category">Category: </label><input class="form-control" name="category" id = "category" placeholder="Category"  /></td>
			<td><label for = "seats">seat Availability: </label><input class="form-control" name="seats" id = "seats" placeholder="Available Seats"  /></td>
			</tr>
			<tr>
			<td><label for = "depart_time">Departure Time: </label><input class="form-control" name="depart_time" id = "depart_time" type="time"/></td>
             <td><label for = "arrive_time">Arrival Time: </label><input class="form-control" name="arrive_time" id= "arrive_time" placeholder="Arrival Time" type="time"/></td>
			  </tr>
			  <tr>
			<td> <label for = "arrive_date">Arrival Date: </label><input class="form-control" name="arrive_date" id= "arrive_date" placeholder="Arrival Date"  type="date"/></td>
            <td> <label for = "depart_date">Departure Date: </label><input class="form-control" name="depart_date" id= "depart_date" placeholder="Departure Date"  type="date"/></td>
			  </tr>
			 <tr>
			<td> <label for = "arrive_date">Fare: </label><input class="form-control" name="fare" id= "fare" placeholder="Fare"  type="number" min="0"/></td>
			  </tr>
			  </table>
			  
			 <br/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
            </form>
        </div>
 </div>   
</div>

</body>
</html>