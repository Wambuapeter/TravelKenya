<?php
session_start();
//Retrieve form parameters
$email = $_POST['email'];
$password = $_POST['password'];
//echo $fname. " ". $lname. " ". $email. " ". $password. " ". $bdate[2];
// connect to the mysql database
$link = mysqli_connect('localhost', 'root', '', 'AirlineDatabase');
//check if user with same username exists in db
$sql = "SELECT * FROM admin WHERE UserName = '".$email."';";
$result = mysqli_query($link,$sql);

if(mysqli_fetch_row($result)!=null)
{
	$_SESSION['error_msg'] =  "User with this username already exists. Please sign up with a different username";
	header("Location: errorPage.php");
	session_write_close();
}
else
{
$sql = "INSERT INTO admin (UserName, Password) VALUES ('".$email."', '" .$password . "');";

// excecute SQL statement
$result = mysqli_query($link,$sql);
 
// die if SQL statement failed
if (!$result){ 
	//echo("SQL Error");
	$_SESSION['error_msg'] = "There was a problem while signing up. Please try again.";
	header("Location: errorPage");
  	die(mysqli_error());
}
else
{
	$_SESSION['user_fname'] = $fname;
	$_SESSION['user_lastname'] = $lname;
	$_SESSION['username'] = $email;
	header("Location: updateFlightsPage.php");
}
}

?>
