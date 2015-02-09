<?php

include 'conn.php';
mysql_select_db("UniRegistration", $con);
$a=$_POST['studentid'];
$x = "SELECT studentid,password FROM st_insert WHERE studentid='$a' AND password='$_POST[password]'";
$y=mysql_query($x,$con);
$line2 = mysql_fetch_array($y);
$_SESSION['userid'] = $line2['studentid'];
echo $_SESSION['userid'];
?>
