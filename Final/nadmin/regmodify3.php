<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control Panel :: Student Information Panel:: Institute of Information Technology, BZU</title>
<style type="text/css">
<!--
.heading {
	color: #000000;
	font-family: "Comic Sans MS", cursive;
}
.options {
	font-family: "Comic Sans MS", cursive;
	font-size: 16px;
	font-style: oblique;
	color: #F93;
}
-->
</style>
</head>

<body >


<br />
<br />
<br />
<table align="center" cellpadding="0" bgcolor="#FF9999" width="800" border="0">
  <tr>
    <td><h1 align="center" class="heading"><!--<img src="images/cooltext457948700.png" width="747" height="58" alt="!Student Information System!" />-->!! Student Information System !!</h1>
  <p align="center">
    <?php 
	 
	
	 $g=$_REQUEST['name']; 
	 $r=$_REQUEST['fname'];
	
	 
	 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
	 mysql_select_db("UniRegistration",$link) or die ("Cannot select the database!");
	 $query="UPDATE reg_deadline SET startdate='".$g."', deadline='".$r."' ";
		
		  if(!mysql_query($query,$link))
		  {die ("An unexpected error occured while saving the record, Please try again!");}
		  else
		 {
		  echo "<b>Record updated successfully!</b>";}
	 ?>

      </p>
      <p align="center"><a href="./regmodify1.php"><img border="0" src="images/back.png" onmouseover="this.src='images/backover.png';" onmouseout="this.src='images/back.png';" /></a><!--<a href="../"><img border="0" src="images/cooltext457951615.png" onmouseover="this.src='images/cooltext457951615MouseOver.png';" onmouseout="this.src='images/cooltext457951615.png';" /></a>--></p>
      <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p></td>
  </tr>
</table>
<h1 align="center" class="heading">&nbsp;</h1>


</body>
</html>