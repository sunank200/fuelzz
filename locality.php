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
$l_id=$_POST['l_id'];
$locality_name=$_POST['locality_name'];
$sql="Insert into locality(l_id,locality_name) values('$l_id','$locality_name');";
//  echo "$name".'<br/>';
//  echo "$username".'<br/>';
// echo "$email".'<br/>';
// echo "$password";
if(mysql_query($sql))
{
	$message="Registration Successful";
	echo "<script type='text/javascript'>alert('$message');</script>";
	header('Location:http://trackthisbus.com/locality.html');
	
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