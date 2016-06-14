<?php
// echo "dallo1";
//return;
ob_start( );
include("connect.php");
 // echo "sano dallo";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
//username and password sent from Form
// 	echo $_POST['name'].'<br/>';
// 	echo $_POST['username'].'<br/>';
// 	echo $_POST['email'].'<br/>';
// 	echo $_POST['password'].'<br/>';
// if($db==NULL)
// {
// 	echo "tait mula";
// }
// else
// {
// 	echo "sahi ho";
// }
$b_id=$_POST['b_id'];
$last_stop_bsid=$_POST['last_stop_bsid'];
$distance_travelled=$_POST['distance_travelled'];
$flag=$_POST['flag'];	
$sql="Insert into bus_distance_dynamic(b_id,last_stop_bsid,distance_travelled,flag) values('$b_id','$last_stop_bsid','$distance_travelled','$flag');";
//  echo "$name".'<br/>';
//  echo "$username".'<br/>';
// echo "$email".'<br/>';
// echo "$password";
if(mysql_query($sql))
{
	$message="Registration Successful";
	echo "<script type='text/javascript'>alert('$message');</script>";
	header('Location:http://trackthisbus.com/bus_dynamic.html');
	
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
	header('Location:http://trackthisbus.com');
	exit();
	// echo "gopya dallo";
}
?>