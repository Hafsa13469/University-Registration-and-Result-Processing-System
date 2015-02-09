<html>
<head>
</head>
<body>
<?php
include 'conn.php';
mysql_select_db("UniRegistration", $con);
$sid=$_POST['stid'];
$tc=$_POST['tcredit'];
$tq=$_POST['qpoint'];
$gp=$_POST['gpa'];
$en=$_POST['sem'];
$passed_array1 = unserialize($_POST['id']);
$passed_array2 = unserialize($_POST['crcd']);
$passed_array3 = unserialize($_POST['crh']);
$passed_array4 = unserialize($_POST['grade']);
$passed_array5 = unserialize($_POST['point']);
$passed_array6 = unserialize($_POST['gpoint']);
$i=count($passed_array1);
$k=count($passed_array3);
$l=count($passed_array4);
$m=count($passed_array5);
$n=count($passed_array6);
$i=0;
$k=0;
$m=0;
$n=0;
$l=0;
foreach($passed_array2 as $key => $val)
{
	$sql2="INSERT INTO record_gpa(StudId,EnSem,CrsCode,CrdHour,grade,point,gpoint) VALUES ('$passed_array1[$i]','$en','$val','$passed_array3[$k]','$passed_array4[$l]','$passed_array5[$m]','$passed_array6[$n]')";
	mysql_query($sql2,$con);
	$i++;
	$k++;
	$m++;
	$n++;
	$l++;
}

$sql3="INSERT INTO std_gpa(StudId,EnSem,Total_CrdHour,TQ_Point,GPA) VALUES ('$sid','$en','$tc','$tq','$gp')";
mysql_query($sql3,$con);


$im =mysql_query("SELECT EnSem FROM Student_info WHERE StudId='$sid'");
$im1 = mysql_fetch_array($im);
$str = $im1["EnSem"];
$tr='1';
$str=$str+$tr;
$query=mysql_query("UPDATE Student_info SET EnSem='$str' WHERE StudId='$sid' ");
?>
</body>
</html>