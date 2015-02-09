<?php
session_start();
include 'conn.php';
mysql_select_db("UniRegistration", $con);
$x = "SELECT * FROM advisor";
$y=mysql_query($x,$con);
if (mysql_num_rows($y)==0) 
	{		
	$sql="INSERT INTO advisor (username,password) VALUES ('$_POST[username]','$_POST[password]')";
	mysql_query($sql,$con);
	//echo "registration completed!!";
	include 'home.php';
	}
// username and password sent from form---------------------------------------------------------------------
$myusername=$_POST['username' ];
$mypassword=$_POST['password'];
// To protect MySQL injection -----------------------------------------------------------------------------
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
//start checking-------------------------------------------------------------------------------------------
$sql1="SELECT * FROM advisor WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql1);
$count=mysql_num_rows($result);
if($count==1&&(!session_is_registered(username))){
	session_register("username");
	session_register("password");
	include 'log_succ.php';
}
else {
	include 'index.php';
}
//mysql_close($con);
?>

