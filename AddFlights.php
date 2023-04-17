<?php
session_start();
$con= mysqli_connect("localhost","root","","airlineData");
	
	if(!$con){
		die("Connection failed : ".mysqli_connect_error());
	}
	
	$flight_no = $_POST['flight_no'];
	$depart_time  = $_POST['depart_time'];
	$arrive_time = $_POST['arrive_time'];
	$from = $_POST['from'];
	$to = $_POST['to'];
	$flight_Instance = $_POST['flight_Instance'];
	$UserName = $_SESSION['email'];
	$seats = $_POST['seats'];
	$arrive_date = $_POST['arrive_date'];
	$depart_date = $_POST['depart_date'];
	$fromCity = $_POST['fromCity'];
	$toCity = $_POST['toCity'];
	$fromState = $_POST['fromState'];
	$toState = $_POST['toState'];
	$category = $_POST['category'];
	$availability = $seats;
	$fare = $_POST['fare'];
	
	
		
	if(empty($flight_no) || empty($depart_time) || empty($arrive_time) || empty($from)|| empty($to) 
	|| empty($flight_Instance) || empty($seats) || empty($depart_date) || empty($arrive_date) || empty($fromCity) 
	|| empty($toCity) || empty($fromState) || empty($toState) || empty($category) || empty($fare))
	{
		header('Location: errorPage.php');
	}
	else{
	
	
		//Check if flight exists in the flight table
		$sql = "SELECT * FROM flight WHERE flight_no = $flight_no";
		$result = mysqli_query($con, $sql);
		
		$flightExists = false;
	
		/*if(mysqli_num_rows($query) > 0)
		{
			$flightExists = true;
		}*/
		$query = mysqli_query($con, "SELECT * FROM airport WHERE AirportId='".$from."'");
		if(mysqli_num_rows($query) > 0)
		{
			if(!$flightExists)
    		{
				$sql3 = "INSERT INTO flight(flight_no, SheduledDeparture, ScheduledArrival, From_Airport_id, To_Airport_id) values ('$flight_no', '$depart_time', '$arrive_time', '$from', '$to');";
				if(!mysqli_query($con, $sql3))
					header('Location: errorPage.php');
			}
			$sql4 = "INSERT INTO flight_instance(InstanceId, ArriveTime, DepartTime, ArrivalDate, DepartureDate, Flight_no, fare) values ('$flight_Instance', '$arrive_time', '$depart_time', '$arrive_date', '$depart_date', '$flight_no', '$fare');";
			$sql5 = "INSERT INTO available_seats(CategoryId, InstanceId, Availability, Total_Seats) values ('$category', '$flight_Instance',$availability, $seats);"; 
			
			if (mysqli_query($con, $sql4) && mysqli_query($con, $sql5)) 
				{
					header('Location: SuccessPage.php');
				}
			else
				{
					$_SESSION['error_msg'] = "Unable to add flight";
					header('Location: errorPage.php');
				}
		
		}	
		else
		{
		$sql1 = "INSERT INTO airport(AirportId, CityName, State) values ('$from', '$fromCity', '$fromState');";
		$sql2 = "INSERT INTO airport(AirportId, CityName, State) values ('$to', '$toCity', '$toState');";
		$sql3 = "INSERT INTO flight(flight_no, SheduledDeparture, ScheduledArrival, From_Airport_id, To_Airport_id) values ('$flight_no', '$depart_time', '$arrive_time', '$from', '$to');";
		$sql4 = "INSERT INTO flight_instance(InstanceId, ArriveTime, DepartTime, ArrivalDate, DepartureDate, Flight_no) values ('$flight_Instance', '$arrive_time', '$depart_time', '$arrive_date', '$depart_date', '$flight_no');";
		$sql5 = "INSERT INTO available_seats(CategoryId, InstanceId, Availability, Total_Seats) values ('$category', '$flight_Instance',$availability, $seats);"; 
		if (mysqli_query($con, $sql1) && mysqli_query($con, $sql2) && mysqli_query($con, $sql3) && mysqli_query($con, $sql4) && mysqli_query($con, $sql5)) 
		{
			header('Location: SuccessPage.php');
		}
		else
		{
			$_SESSION['error_msg'] = "Unable to add flight";
			header('Location: errorPage.php');
		}
		
		}
	}
	header('Location: SuccessPage.php');
	mysqli_close($con);	
?>