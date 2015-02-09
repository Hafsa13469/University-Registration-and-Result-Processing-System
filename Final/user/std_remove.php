<html>
<body>
<br />
<br />
<br />
<div style="position:absolute;left:280px;top:500px;">
<table align="center" cellpadding="0" bgcolor="" width="900" border="0">
  <tr>
  <td width="1050" height="215" bgcolor="#6cf"><h1 align="center" class="heading"></h1>
  <p align="center">
<?php

	
	
	$host = "localhost";
	$db = "UniRegistration";
	$dbu = "root";
	
	$con = mysql_connect ($host,$dbu, "");
	mysql_select_db ("$db",$con);
	$dateBefore = date("Y-m-d");
	$dl = "SELECT deadline FROM reg_deadline";
	$dl1=mysql_query($dl,$con);
	if (!$dl1)
	{
		echo "An error occurred ".mysql_error();
		exit;
	}
	while ($line = mysql_fetch_array($dl1))
	{
		$dl2 = $line["deadline"];
		$dl3 = $line["startdate"];
	}
	$dateAfter =$dl2;
	$datestart =$dl3;
	
	$id=$_REQUEST['StudId'];
	$cd=$_REQUEST['CrsCode'];
	$crh=$_REQUEST['CrdHour'];
	$es=$_REQUEST['EnSem'];
	$cor=$_REQUEST['Ad'];
	echo $cor;
	//echo $cd;
	if( strtotime($dateBefore) >= strtotime($datestart) && strtotime($dateBefore) <= strtotime($dateAfter))
	{
		$reg=mysql_query("select T_CrdHour FROM reg_info WHERE StudId='$id' AND SemCode='$es'");
		$reg1 = mysql_fetch_array($reg);
		$reg2 = $reg1['T_CrdHour'];
		$reg2=$reg2-$crh;
	
		$del=mysql_query("DELETE FROM std_registration WHERE StudId='".$id."' AND CrsCode='".$cd."' ");
		$query1=mysql_query("UPDATE reg_info SET T_CrdHour= '".$reg2."' WHERE StudId='$id' && SemCode='$es' ");
		
		echo "<font size=5px><b>Record of    ".$cd."    removed successfully!</font></b>";
		  
		  
		echo "<table>";
		echo "<tr><br/><br/><br/><br/>
		<td><a href=\"jhs.php?StudId=".$id."\"><img border=\"0\" src=\"images/back.png\"/></a></td>
		</tr>";
		echo "</table>";
	}
	else
	{
		echo "<font size=5px><b>You can't Remove  ".$cd."  because Registration Time Expired !</font></b>";
		echo "<table>";
		echo "<tr><br/><br/><br/><br/>
		<td><a href=\"jhs.php?StudId=".$id."&Ad=".$cor."\"><img border=\"0\" src=\"images/back.png\"/></a></td>
		</tr>";
		echo "</table>";
	}
	
?>
</p>
  </td>    
  </tr>
</table>
</div>
</body>
</html>