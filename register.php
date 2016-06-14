<?php
ob_start( );
include("connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
		$name=mysqli_real_escape_string($db,$_POST['name']);
		$username=mysqli_real_escape_string($db,$_POST['username']); // here username is car number
		$password=mysqli_real_escape_string($db,$_POST['password']); 
		$password=md5($password); // Encrypted Password
		$sql="Insert into users(username,password,name) values('$username','$password','$name');";
		$result=mysqli_query($db,$sql);

		if($result)
		{
			$message="Registration Successful";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("location: http://127.0.0.1/fuelzz/details/index.php");
		}

		else
		 {
		 	$message="error while registering you...";
		 	echo "<script type='text/javascript'>alert('$message');</script>";
		 }
}
else
{
		$message="You can't directly open Registration page. Sorry!";
	 	echo "$message";
}	
?>