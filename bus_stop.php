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
$bs_id=$_POST['bs_id'];
$bus_stop_name=$_POST['bus_stop_name'];
$l_id=$_POST['l_id'];
$sql="Insert into bus_stop_table(bs_id,bus_stop_name,l_id) values('$bs_id','$bus_stop_name','$l_id');";
//  echo "$name".'<br/>';
//  echo "$username".'<br/>';
// echo "$email".'<br/>';
// echo "$password";
if(mysql_query($sql))
{
	$message="Registration Successful";
	echo "<script type='text/javascript'>alert('$message');</script>";
	header('Location:http://trackthisbus.com/bus_stop.html');
	
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