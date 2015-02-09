<html>
<head>
</head>
<body>
<?php
include 'conn.php';
mysql_select_db("UniRegistration", $con);
$passed_array1 = unserialize($_POST['id']);
$i=count($passed_array1);
$b=$_POST['cr']; //n
$z=$_POST['cr1'];
$g=$_POST['gpa'];
$sid=$_POST['sid'];
$scode=$_POST['semcode'];
$c=$_POST[chk];
$sm=$_POST['sem'];
$sn=$_POST['ssn'];
$sgc=$_POST['sgc'];
$com=$_POST['com'];
$pvs=$_POST['prev'];
$i=0;
echo $sgc;
echo $com;
echo $pvs;
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

foreach($c as $value)
{
	$va=explode("|",$value);
	//$x1=$va[0];
	$y1=$va[1];
	$sum=$sum+$y1;
}
/*if(($sm==3) || ($sm==4) || ($sm==5) || ($sm==6) || ($sm==7) || ($sm==8))
{
	if($sgc == $com)
	{

		if( strtotime($dateBefore) >= strtotime($datestart) && strtotime($dateBefore) <= strtotime($dateAfter))
		{
			if($sum<=$b && $sum>=$z)

			{
				foreach($c as $value)
				{
					$va=explode("|",$value);
					$x1=$va[0];
					$sql2="INSERT INTO Std_registration(StudId,Ensem,SesnCode,Crscode,regdate) VALUES ('$passed_array1[$i]','$sm','$sn','$x1','$dateBefore')";
					mysql_query($sql2,$con);
					$i++;
	 				$query=mysql_query("UPDATE temp_add SET flag='0'");
				}
				?>
				<div style="position:absolute; top:350px; left:400px;">
	
				<b><font size="5px">Successfully Submitted for Advisor Approval!</font></b>	
				</div>
				<?php
			}


			else if($sum>$b)
			{
				?>
				<div style="position:absolute; top:350px; left:400px;">

				<b><font size="5px">exceed your credit limit!!</font></b>
				</div>

				<?php
			}
			else if($sum<$z)
			{
				?>
				<div style="position:absolute; top:350px; left:400px;">

				<b><font size="5px">minimum credit limit is not satisfied!!</font></b>
				</div>
				<?php
			}
		}
		else
		{
			?>
			<div style="position:absolute; top:350px; left:400px;">

			<b><font size="5px">Registration Time Expired !!!</font></b>
			</div>

			<?php
		}
		$sql3="INSERT INTO reg_info(StudId,SemCode,GPA,MaxLd,MinLd,T_CrdHour) VALUES ('$sid','$scode','$g','$b','$z','$sum')";
		mysql_query($sql3,$con);

	}
	else
	{
		?>
		<div style="position:absolute; top:350px; left:400px;">

		<b><font size="5px">You didn't complete the whole course of Semester <?php echo $pvs ?>!!</font></b>
		</div>
		<?php
	}

	
}

else
{*/
	if( strtotime($dateBefore) >= strtotime($datestart) && strtotime($dateBefore) <= strtotime($dateAfter))
	{
		if($sum<=$b && $sum>=$z)

		{
			foreach($c as $value)
			{
				$va=explode("|",$value);
				$x1=$va[0];
				$sql2="INSERT INTO Std_registration(StudId,Ensem,SesnCode,Crscode,regdate) VALUES ('$passed_array1[$i]','$sm','$sn','$x1','$dateBefore')";
				mysql_query($sql2,$con);
				$i++;
	 			$query=mysql_query("UPDATE temp_add SET flag='0'");
			}
			?>
			<div style="position:absolute; top:350px; left:400px;">
	
			<b><font size="5px">Successfully Submitted for Advisor Approval!</font></b>	
			</div>
			<?php
		}


		else if($sum>$b)
		{
			?>
			<div style="position:absolute; top:350px; left:400px;">

			<b><font size="5px">exceed your credit limit!!</font></b>
			</div>

			<?php
		}
		else if($sum<$z)
		{
			?>
			<div style="position:absolute; top:350px; left:400px;">

			<b><font size="5px">minimum credit limit is not satisfied!!</font></b>
			</div>
			<?php
		}
	}
	else
	{
		?>
		<div style="position:absolute; top:350px; left:400px;">

		<b><font size="5px">Registration Time Expired !!!</font></b>
		</div>

		<?php
	}
	$sql3="INSERT INTO reg_info(StudId,SemCode,GPA,MaxLd,MinLd,T_CrdHour) VALUES ('$sid','$scode','$g','$b','$z','$sum')";
	mysql_query($sql3,$con);

?>
</body>
</html>