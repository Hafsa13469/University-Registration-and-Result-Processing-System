<html>
<head>
</head>
<body>
<?php
if (isset($_POST['sbmt']))
	{
		//$_POST['id']=$_POST['hide'];
		//$_POST['semester']=$_POST['hide1'];
		//$sme=$_POST['hide2'];
		$dd=$_POST['alu'];
		
	}
?>
<br />
<br />
<br />
<div style="position:absolute;left:280px;top:500px;">
<table align="center" cellpadding="3" bgcolor="" width="900" border="0" colspan="3">
  <tr>
  <td width="1050" height="215" bgcolor="#6cf"><h1 align="center" class="heading"><font size="5px">!!Registered Student Id!!</font></h1>
  <p align="center">
<?php
$host = "localhost";
	$db = "UniRegistration";
	$dbu = "root";
	
	$con = mysql_connect ($host,$dbu, "");
	mysql_select_db ("$db",$con);
$rgs=mysql_query("select distinct StudId FROM std_registration WHERE EnSem='$dd' AND confirmation='1'");
echo "
		<table align=\"center\" border=\"0\" width=\"30%\">
		<tr>
		<td><b>Student Id</b></td>
		<td><b>Click</b></td>
		</tr> ";
while ($rgs1 = mysql_fetch_array($rgs))
{
	
	echo "<tr><td><b>".$rgs1[0]."</b></td>
	<td><a href=\"res_cal.php?StudId=".$rgs1[0]."\"><b>Result Process</b></a>
	</td></tr>";
}

?>
</p>
  </td>    
  </tr>
</table>
</div>

<div id="Layer2" style="position:absolute; width:306px; height:108px; z-index:2; left: 28p0x; top:-70px;font-size:22px;">
<form name="form2" action="reslt_id.php" method="post">
<b><font color="#33CC00">Enter Semester:</font><b>
<input type="text" name="alu" value="<?php echo $dd;?>"><br/>


<!--<input type="hidden" name="hide1" value="<?php echo $nf2;?>">
<input type="hidden" name="hide2" value="<?php echo $dd;?>">-->
<div style="position:relative; width:70px; height:40px; z-index:2; left: 320px; top: -22px;">
  <input type="submit" name="sbmt" value="   CLICK    " />
</div>
</form>
</div>
</body>
</html>
