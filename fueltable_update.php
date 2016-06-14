<?php
ob_start( );
include("connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
		$vol=$_POST['vol'];
		$sql="update fuel_table set fuel_left='$vol' where car_no='test123';";
		$result=mysqli_query($db,$sql);

		if($result)
		{
			$message="Successful";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("location: http://127.0.0.1/fuelzz/fueltable.html");
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