<?php
ob_start( );
include("connect.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$username=mysqli_real_escape_string($db, $_POST['username']); // here username is car number
	$password=mysqli_real_escape_string($db, $_POST['password']); 
	$password=md5($password); // Encrypted Password
	$sql="SELECT username FROM users WHERE username='$username' and password='$password'";
	$result=mysqli_query($db, $sql);
	$count=mysqli_num_rows($result);

	// If result matched $username and $password, table row must be 1 row
	if($count==1)
	{
		
		$message="logged in successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("location: http://127.0.0.1/fuelzz/details/index.php?uname=$username");
	}
	else 
	{
		$error="Your Login Name or Password is invalid";
		echo "<script type='text/javascript'>alert('$error');</script>";
		exit();

	}
}
else
{
	echo "dallai dallo";
}
?>