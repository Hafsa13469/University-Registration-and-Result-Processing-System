<?php
include 'conn.php';
mysql_select_db("UniRegistration", $con);

$passed_array1 = unserialize($_POST['id']);
$passed_array2 = unserialize($_POST['cc']);
$passed_array3 = unserialize($_POST['sem']);
$a=$passed_array1;

//$b=$_POST['cr'];
$i=count($passed_array1);

$c=$_POST['marks'];
$i=0;

foreach( $c as $key => $n)
{

	$sql2="INSERT INTO std_marks(StudId,EnSem,CrsCode,Marks) VALUES ('$passed_array1[$i]','$passed_array3[$i]','$passed_array2[$i]','$n')";
	mysql_query($sql2,$con);
	$i++;
	
}
echo "Registered successfully!";
?>