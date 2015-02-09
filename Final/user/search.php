<?php
session_start();
//echo $_SESSION['userid'];
include 'conn.php';
mysql_select_db("", $con);
$x = "SELECT StudId,PrgmCode,DeptCode,CampCode,EnSem FROM student_info WHERE StudId='$_SESSION[userid]'";
$re=mysql_query($x,$con);
if (!$re)
{
echo "An error occurred ".mysql_error();
exit;
}
while ($line = mysql_fetch_array($re)) {
$st = $line["StudId"];
$pr = $line["PrgmCode"];
$dep = $line["DeptCode"];
$cam = $line["CampCode"];
$sem = $line["EnSem"];
}
$ssl = mysql_query("SELECT SesnCode FROM session");
$ssl1 = mysql_fetch_array($ssl);
$ssl2 = $ssl1['SesnCode'];

$m1=mysql_query("SELECT startdate,deadline FROM reg_deadline ");
	
	while ($dl = mysql_fetch_array($m1)) {
 
	$s1 = $dl["startdate"];
	$d1 = $dl["deadline"];
}	

$rgs=mysql_query("select distinct StudId,confirmation,EnSem FROM std_registration WHERE StudId='$_SESSION[userid]' AND EnSem='$sem'");
	
while ($rgs1 = mysql_fetch_array($rgs))
{
	$rgs2 = $rgs1['EnSem'];
	$rgs3 = $rgs1["StudId"];
	$conf = $rgs1["confirmation"];
}

if($conf == '1')
{ 
	$reg= "REGISTERED";
	$cnfd=mysql_query("SELECT std_registration.CrsCode,course.CrsTitle,course.CrdHour,course.PrereqCourseId FROM std_registration,course WHERE course.CrsCode=std_registration.CrsCode && std_registration.EnSem='$sem' && std_registration.StudId='$_SESSION[userid]'"); 
	$confirm ="<tr>"; 
		$confirm.="<td align=\"center\">"; $confirm.="<b>CourseCode</b>"; $confirm.="</td>";
		$confirm.="<td align=\"center\">"; $confirm.="<b>Coursetitle</b>"; $confirm.="</td>";
		$confirm.="<td align=\"center\">"; $confirm.="<b>Credithour</b>"; $confirm.="</td>";
		
		$confirm.="</tr>";
	$i=0;
	
	while($cnfd1=mysql_fetch_array($cnfd))
	{
		$ccd = $cnfd1["CrsCode"];

		$ct = $cnfd1["CrsTitle"];

		$ch = $cnfd1["CrdHour"];

		

		//$d = $cnfd1["StudId"];

	
		//$farray[$i]=$d;
 
	
		$confirm.="<tr>";
		
		
			$confirm.="<td align=\"center\">";
			$confirm.=$ccd;
			$confirm.="</td>"; 
			$confirm.="<td>";
			$confirm.=$ct;
			$confirm.="</td>"; 
			$confirm.="<td align=\"center\">";
			$confirm.=$ch;
			$confirm.="</td>"; 
			$confirm.="<td align=\"center\">";
			$confirm.=$pre;
			$confirm.="</td>";
			
		$confirm.="</tr>";
        $confirm.="\n";
		$farray[$i]=$_SESSION['userid'];
		$i++;
		
	}
}

else if($conf == '0') 
{
	$reg= "Waiting for advisor approval!";
	$cnfd=mysql_query("SELECT std_registration.CrsCode,std_registration.EnSem,std_registration.StudId,course.CrsTitle,course.CrdHour FROM std_registration,course WHERE course.CrsCode=std_registration.CrsCode && std_registration.EnSem='$sem' && std_registration.StudId='$_SESSION[userid]'"); 
	$wt ="<tr>"; 
		$wt.="<td align=\"center\">"; $wt.="<b>CourseCode</b>"; $wt.="</td>";
		$wt.="<td align=\"center\">"; $wt.="<b>Coursetitle</b>"; $wt.="</td>";
		$wt.="<td align=\"center\">"; $wt.="<b>Credithour</b>"; $wt.="</td>";
		
		$wt.="<td align=\"center\">"; $wt.="<b>Select</b>"; $wt.="</td>";
	$wt.="</tr>";
	$i=0;
	
	while($cnfd1=mysql_fetch_array($cnfd))
	{
		$ccd = $cnfd1["CrsCode"];

		
		$ct = $cnfd1["CrsTitle"];

		$ch = $cnfd1["CrdHour"];

		//$pre = $cnfd1["PrereqCourseId"];
		
		$enrl = $cnfd1["EnSem"];

		$d = $cnfd1["StudId"];

	
		//$farray[$i]=$d;
 
	
		$wt.="<tr>";
		
		
			$wt.="<td align=\"center\">";
			$wt.=$ccd;
			$wt.="</td>"; 
			$wt.="<td>";
			$wt.=$ct;
			$wt.="</td>"; 
			$wt.="<td align=\"center\">";
			$wt.=$ch;
			$wt.="</td>"; 
			
			$wt.="<td align=\"center\">";
			$wt.="<a href=\"std_remove.php?StudId=".$d."&CrsCode=".$ccd."&CrdHour=".$ch."&EnSem=".$enrl."&Ad=".$dd."\">";		
			$wt.="REMOVE";
			$wt.="</a>"; 
			$wt.="</td>";
		$wt.="</tr>";
        $wt.="\n";
		$farray[$i]=$_SESSION['userid'];
		$i++;
		
	}
}




else
{
$reg= "Not Registered!!";
$nf = mysql_query("SELECT EnSem FROM student_info WHERE StudId='$_SESSION[userid]'"); 
$nf1 = mysql_fetch_array($nf);
$nf2 = $nf1['EnSem'];
$y = mysql_query("SELECT CrsCode,CrsTitle,CrdHour FROM course WHERE SemCode='$nf2'");

if (!$y)
{
echo "An error occurred ".mysql_error();
exit;
}
$t='0';
$thestates6 ="<tr>"; 
		$thestates6.="<td align=\"center\">"; $thestates6.="<b>CourseCode</b>"; $thestates6.="</td>";
		$thestates6.="<td align=\"center\">"; $thestates6.="<b>Coursetitle</b>"; $thestates6.="</td>";
		$thestates6.="<td align=\"center\">"; $thestates6.="<b>Credithour</b>"; $thestates6.="</td>";
		$thestates6.="<td align=\"center\">"; $thestates6.="<b>Select</b>"; $thestates6.="</td>";
	$thestates6.="</tr>";
$chl=0;
$i=0;
while ($line1 = mysql_fetch_array($y)) {

$ccd = $line1['CrsCode'];  

$ct = $line1['CrsTitle'];

$ch = $line1['CrdHour'];
$chl=$chl+$ch;
$thestates6.="<tr>";
$thestates6.="<td align=\"center\">";
			$thestates6.=$ccd;
			$thestates6.="</td>"; 
			$thestates6.="<td>";
			$thestates6.=$ct;
			$thestates6.="</td>"; 
			$thestates6.="<td align=\"center\">";
			$thestates6.=$ch;
			$thestates6.="</td>"; 
			$thestates6.="<td align=\"center\">";		
			$thestates6.="<input type=checkbox  name=chk[] value= $ccd|$ch >";	
			$thestates6.="</td>";
$thestates6.="</tr>";
$farray[$i]=$_SESSION['userid'];
$i++;

	}
}

?>

<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta charset="utf-8" />
<title>Student Management System</title>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>
<body>

<script language="JavaScript" type="text/JavaScript">
var image1=new Image()
image1.src="images/main.jpg"
var image2=new Image()
image2.src="images/main1.jpg"
var image3=new Image()
image3.src="images/main2.jpg"
var image4=new Image()
image4.src="images/main3.jpg"

</script>
<script language="JavaScript" type="text/JavaScript">

</script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body>

<div style="position:absolute; left:102px; top:106px; width: 1139px; height: 385px;" > 

    <header>
	 <img src="images/main.jpg" name="slide" width="1147" height="348" />
	<script>
        
        var step=1
        function slideit(){
        
        if (!document.images)
        return
        document.images.slide.src=eval("image"+step+".src")
        if (step<4)
        step++
        else
        step=1
        
        setTimeout("slideit()",3000)
        }
        slideit()
        
      </script> 
</header></div>   

<div style="position:absolute;top:460px;left:871px;">
<input name='submit' value='submit' type='submit'>
</div> 
</form>
</div>






<img src="index_06.gif" width="404" height="292" align="center" />
</body>
</html>





