<?php
$hostname="localhost";
$mysql_login="root";
$mysql_password="";
$database="fuelzz";
$db = null;
if (!($db = mysqli_connect($hostname, $mysql_login , $mysql_password)))
{
  die("Can't connect to mysql.");    
}
else
{
  if (!(mysqli_select_db($db,"$database"))) 
  {
    die("Can't connect to db.");
  }
}
?>