<?php
include 'conn.php';
mysql_select_db("UniRegistration", $con);
$se=$_POST["semester"];
$d=$_POST["deptcd"];


$sql2="INSERT INTO course(CrsCode,CrsTitle,CrsType,CrdHour,DeptCode,SemCode,PrereqCourseId) VALUES ('$_POST[crc1]','$_POST[crt1]','$_POST[crtp1]','$_POST[crh1]','$d','$se','$_POST[prc1]')";
mysql_query($sql2,$con);

$sql21="INSERT INTO course(CrsCode,CrsTitle,CrsType,CrdHour,DeptCode,SemCode,PrereqCourseId) VALUES ('$_POST[crc2]','$_POST[crt2]','$_POST[crtp2]','$_POST[crh2]','$d','$se','$_POST[prc2]')";
mysql_query($sql21,$con);

$sql3="INSERT INTO course(CrsCode,CrsTitle,CrsType,CrdHour,DeptCode,SemCode,PrereqCourseId) VALUES ('$_POST[crc3]','$_POST[crt3]','$_POST[crtp3]','$_POST[crh3]','$d','$se','$_POST[prc3]')";
mysql_query($sql3,$con);

$sql4="INSERT INTO course(CrsCode,CrsTitle,CrsType,CrdHour,DeptCode,SemCode,PrereqCourseId) VALUES ('$_POST[crc4]','$_POST[crt4]','$_POST[crtp4]','$_POST[crh4]','$d','$se','$_POST[prc4]')";
mysql_query($sql4,$con);

$sql5="INSERT INTO course(CrsCode,CrsTitle,CrsType,CrdHour,DeptCode,SemCode,PrereqCourseId) VALUES ('$_POST[crc5]','$_POST[crt5]','$_POST[crtp5]','$_POST[crh5]','$d','$se','$_POST[prc5]')";
mysql_query($sql5,$con);

$sql6="INSERT INTO course(CrsCode,CrsTitle,CrsType,CrdHour,DeptCode,SemCode,PrereqCourseId) VALUES ('$_POST[crc6]','$_POST[crt6]','$_POST[crtp6]','$_POST[crh6]','$d','$se','$_POST[prc6]')";
mysql_query($sql6,$con);

$sql7="INSERT INTO course(CrsCode,CrsTitle,CrsType,CrdHour,DeptCode,SemCode,PrereqCourseId) VALUES ('$_POST[crc7]','$_POST[crt7]','$_POST[crtp7]','$_POST[crh7]','$d','$se','$_POST[prc7]')";
mysql_query($sql7,$con);

$sql8="INSERT INTO course(CrsCode,CrsTitle,CrsType,CrdHour,DeptCode,SemCode,PrereqCourseId) VALUES ('$_POST[crc8]','$_POST[crt8]','$_POST[crtp8]','$_POST[crh8]','$d','$se','$_POST[prc8]')";
mysql_query($sql8,$con);

$sql9="INSERT INTO course(CrsCode,CrsTitle,CrsType,CrdHour,DeptCode,SemCode,PrereqCourseId) VALUES ('$_POST[crc9]','$_POST[crt9]','$_POST[crtp9]','$_POST[crh9]','$d','$se','$_POST[prc9]')";
mysql_query($sql9,$con);

$sql10="INSERT INTO course(CrsCode,CrsTitle,CrsType,CrdHour,DeptCode,SemCode,PrereqCourseId) VALUES ('$_POST[crc10]','$_POST[crt10]','$_POST[crtp10]','$_POST[crh10]','$d','$se','$_POST[prc10]')";
mysql_query($sql10,$con);

$sql11="INSERT INTO course(CrsCode,CrsTitle,CrsType,CrdHour,DeptCode,SemCode,PrereqCourseId) VALUES ('$_POST[crc11]','$_POST[crt11]','$_POST[crtp11]','$_POST[crh11]','$d','$se','$_POST[prc11]')";
mysql_query($sql11,$con);

$sql12="INSERT INTO course(CrsCode,CrsTitle,CrsType,CrdHour,DeptCode,SemCode,PrereqCourseId) VALUES ('$_POST[crc12]','$_POST[crt12]','$_POST[crtp12]','$_POST[crh12]','$d','$se','$_POST[prc12]')";
mysql_query($sql12,$con);

$sql13="INSERT INTO course(CrsCode,CrsTitle,CrsType,CrdHour,DeptCode,SemCode,PrereqCourseId) VALUES ('$_POST[crc13]','$_POST[crt13]','$_POST[crtp13]','$_POST[crh13]','$d','$se','$_POST[prc13]')";
mysql_query($sql13,$con);

echo "Saved Successfully!!!"
?>