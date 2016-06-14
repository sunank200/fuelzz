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
$bus_number=$_POST['bus_number'];
$bs_id=$_POST['bs_id'];
$l_id=$_POST['l_id'];
$distance=$_POST['distance'];
$time=$_POST['time'];
$price=$_POST['price'];
$source_flag=$_POST['source_flag'];
$destination_flag=$_POST['destination_flag'];
$sql="Insert into bus_table_static(b_id,bus_number,bs_id,l_id,distance,time,price,source_flag,destination_flag) values('$b_id','$bus_number','$bs_id','$l_id','$distance','$time','$price','$source_flag','$destination_flag');";
//  echo "$name".'<br/>';
//  echo "$username".'<br/>';
// echo "$email".'<br/>';
// echo "$password";
if(mysql_query($sql))
{
	$message="Registration Successful";
	echo "<script type='text/javascript'>alert('$message');</script>";
	//header('Location:http://trackthisbus.com/bus_table.html');
	
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