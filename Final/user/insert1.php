<?php
/*
session_start();
include 'conn.php';
mysql_select_db("UniRegistration", $con);
$a=$_POST['studentid'];
$x = "SELECT studentid,password FROM st_insert WHERE studentid='$a' AND password='$_POST[password]'";
$y=mysql_query($x,$con);
$line2 = mysql_fetch_array($y)
 
$_SESSION['userid'] = $line2["studentid"];

	*/
	session_start();
	include('header.php'); 

if (mysql_num_rows($y)==1) 


	{

		include 'home.php';

	}
else if (mysql_num_rows($y)==0) 

	{
		include 'index.php';


		
	}
//}
//if (mysql_num_rows($y)==0) 
	//{		
	//$sql="INSERT INTO admin (username,password) VALUES ('$_POST[username]','$_POST[password]')";
	//mysql_query($sql,$con);
	//echo "registration completed!!";
	//include 'home.php';
	//}
// username and password sent from form---------------------------------------------------------------------
//$myusername=$_POST['username' ];
//$mypassword=$_POST['password'];
// To protect MySQL injection -----------------------------------------------------------------------------
//$myusername = stripslashes($myusername);
//$mypassword = stripslashes($mypassword);
//$myusername = mysql_real_escape_string($myusername);
//$mypassword = mysql_real_escape_string($mypassword);
//start checking-------------------------------------------------------------------------------------------
//$sql1="SELECT * FROM admin WHERE username='$myusername' and password='$mypassword'";
//$result=mysql_query($sql1);
//$count=mysql_num_rows($result);
//if($count==1&&(!session_is_registered(username))){
	//session_register("username");
	//session_register("password");
	//include 'log_succ.php';
//}
//else {
	//include 'index.php';
//}
//mysql_close($con);
?>

