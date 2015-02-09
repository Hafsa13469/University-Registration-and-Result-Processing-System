<?php
if(isset($_POST['ext'])){
		$location = "MyPage.php";
  		header("Location: $location");
  		exit;
}
	
$databasehost = "localhost";
$databasename = "UniRegistration";
$databasetable1 = "studentmarks_raw";
$databaseusername ="root";
$databasepassword = "";
$fieldseparator = ",";
$lineseparator = "\n";

$f1 = "uploads1/fname1.txt";
$handle = fopen($f1, "r");
$csvfile1 = fread($handle, filesize($f1));
fclose($handle);

//$addauto = 0;

$save = 1;
$outputfile1 = "output.sql";

/********************************************************************************************/

if(!file_exists($csvfile1)) {
	echo "File not found. Make sure you specified the correct path.\n";
	exit;
}

$file1 = fopen($csvfile1,"r");

if(!$file1) {
	echo "Error opening data file.\n";
	exit;
}

$size1 = filesize($csvfile1);

if(!$size1) {
	echo "File is empty.\n";
	exit;
}

$csvcontent1 = fread($file1,$size1);

fclose($file1);

$con = @mysql_connect($databasehost,$databaseusername,$databasepassword) or die(mysql_error());
@mysql_select_db($databasename) or die(mysql_error());


$lines1 = 0;
$queries1 = "";
$linearray1 = array();

//delete current raw data if exist
$sql0 = "delete from $databasetable1";
@mysql_query($sql0);

foreach(split($lineseparator,$csvcontent1) as $line1) {

	$lines1++;

	$line1 = trim($line1," \t");
	
	$line1 = str_replace("\r","",$line1);
	
	
	$linearray1 = explode($fieldseparator,$line1);
	
	$linemysql1 = implode("','",$linearray1);
	
	
		$query1 = "insert into $databasetable1 values('$linemysql1');";
	
	$queries1 .= $query1 . "\n";

	@mysql_query($query1);
}

/* Remove the first garbase record */
$sql3 = "delete from $databasetable1 where StudId = 'StudId' or StudId = 'Student ID' or StudId = 'StudentID'";
@mysql_query($sql3);

//Add if any new record found
$sql3 = "insert into studentmarks(StudId,EnSem,CrsCode,marks) select StudId,EnSem,CrsCode,marks from studentmarks_raw where (StudId,EnSem) not in (select StudId,EnSem from studentmarks)";
@mysql_query($sql3);

@mysql_close($con);

if($save) {
	
		$file1 = fopen($outputfile1,"w");
		
		if(!$file1) {
			//echo "Error writing to the output file.\n";
		}
		else {
			fwrite($file1,$queries1);
			fclose($file1);
		}
}
echo "<br>Result : <br>Records Updated in the database.\n";
?>
<html>
<body>
<form name="form1" action="processor1.php" method="post">
	<input type="submit" name="ext" value="Return Back">
</form>
</body>
</html>
