<?php
session_start();
//echo $_SESSION['userid'];
include 'conn.php';
mysql_select_db("UniRegistration", $con);
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
/*$f1array[$i]=$ccd;
$f2array[$i]=$ct;
$f3array[$i]=$ch;
$f4array[$i]=$rem;*/

//$t=$t+$line1["credithour"];
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




<div id="Layer1" style="position:absolute; background-color:#ffffff; width:1145px; height:105px; z-index:1; left: 102px; top: 0px;">
	<img src="03.gif" width="100" height="102" />
	<div id="Layer3" style="position:absolute;font-color:#fff;font-size:40px;left:101px;top:15px;font-family:sans-serif;" ><i>Student Management System</i></div>
	<div id="Layer2" style="position:absolute; width:199px; height:106px; z-index:4; left: 944px; top: -4px;"><img src="images1.jpg" width="200" height="105" align="center" /></div>
</div>

<!--<div id="Layer6" style="position:absolute;background-color:#ffffff; width:788px; height:265px; z-index:3; left: 153px; top: 97px;">

        <div id="Layer5" style="position:absolute;background-color:#ffffff; width:412px; height:273px; z-index:2; left: -26px; top: 1px;"><img src="index_08.gif" width="410" height="270" align="center" /></div>
        
  <div id="Layer7" style="position:absolute;background-color:#ffffff; width:400px; height:274px; z-index:3; left: 290px; top: 1px;"><img src="index_09.gif" width="404" height="269" align="center" />  </div>
</div>


<div id="Layer4" style="position:absolute;background-color:#ffffff; width:448px; height:296px; z-index:4; left: 830px; top:65px;">
 <img src="index_06.gif" width="449" height="302" align="center" />
 <div id="Layer8" style="position:absolute;background-color:#ffffff; width:123px; height:97px;left: 119px; top:69px;" >
  <img src="images1.jpg" width="122" height="125" align="center" />
 </div>
</div>-->

<div style="position:absolute; left:102px; top:106px; width: 1139px; height: 385px;" > 

    <header>
	 <img src="images/main.jpg" name="slide" width="1147" height="348" />
	<script>
        <!--
        //variable that will increment through the images
        var step=1
        function slideit(){
        //if browser does not support the image object, exit.
        if (!document.images)
        return
        document.images.slide.src=eval("image"+step+".src")
        if (step<4)
        step++
        else
        step=1
        //call function "slideit()" every 3 seconds
        setTimeout("slideit()",3000)
        }
        slideit()
        //-->
    <!--    </script> 
</header></div>   

<div id="Layer2" style="position:absolute; z-index:5; left: 103px; top:460px; width: 1135px; height: 155px;">
<div class="example">
    <ul id="nav">
        <li><a href="home.php">Home</a></li>
        <li><a>Registration</a>
            <ul>
                <li><a href="1sem_regdisplay.php">New Registration</a> </li>
		<li><a href="jhs.php">2nd-8th Registration</a>	</li>
		
              <li><a href="reg_view.php">View Registration</a></li>
                
                    
                
               
                
            </ul>
        </li>
        <li><a href="">Result</a>
            <ul>
                <li><a href="">View</a>
                    
                </li>
                <li><a href="">Search</a>
                    
                </li>
            </ul>
        </li>
        
        <li><a href="">View Information</a></li>
		<li><a href="logout.php">Logout</a></li>
    </ul>

</div>
</div>
   

<div id="Layer9" style="position:absolute; width:148px; height:3561px; z-index:6; top: 0px; left: -47px;"><img src="hm2.jpg" width="150" height="2608" /></div>
  <div id="Layer10" style="position:absolute; width:205px; height:3553px; z-index:1; left: 1249px; top: -4px;"><img src="hm2.jpg" width="159" height="2507" /></div>




<div id="Layer1" style="position:absolute; width:762px; height:264px; z-index:1; left: 125px; top:680px;font size:45px; border: 1px none #000000; visibility: visible;">
<table width="754" border="0"cellpadding="4" cellspacing="0" >
	<tr>
        <td><font size="5px"><b><i>Reg Status</i>:</b>&nbsp&nbsp<strong><?php echo $reg ?></strong></font></td>
    </tr>
	<tr>
        <td><font size="5px"><b><i>Session</i>:</b>&nbsp&nbsp<strong><?php echo $ssl2 ?></strong></font></td>
    </tr>
	<tr>
        <td><font size="5px"><b><i>Studentid</i>:</b>&nbsp&nbsp<strong><?php echo $st ?></strong></font></td>
    </tr>
	
	<tr>
	<td><font size="5px"><b><i>Semester</i>:</b>&nbsp&nbsp<strong><?php echo $sem ?></strong></font></td>
    </tr>
     
	<tr>
         <td><font size="5px"><b><i>Program</i>:</b>&nbsp&nbsp<strong><?php echo $pr ?></strong></font></td>
    </tr>
	
	<tr>
        <td><font size="5px"><b><i>Department</i>:</b>&nbsp&nbsp<strong><?php echo $dep ?></strong></font></td>
    </tr>
	
    <tr>   
        <td><font size="5px"><b>Campus<i>:</b>&nbsp&nbsp<strong><?php echo $cam ?></strong></font></td>
    </tr>
</table>
</div>


<div style="position:absolute; font-size:20px; left: 113px; top:935px; width:1056px;height:489px;">

<form name="form2" action="hdninsrt.php" method="post">
<div id="Layer6" style="position:absolute; top:79px; left:45px; width:802px; height:374px;">
<table width="120%" height="51" border="3" align="center" cellpadding="0" cellspacing="0"  bgcolor="#9DF" left="100px">

  <?php echo $thestates6;?>
  <?php echo $wt;?>
  <?php echo $confirm;?>
 
</table>
</div>
<div id="Layer4" style="position:absolute; top:-209px; left:802px; width:278px; height: 38px;">
<td><b><i>Reg Starting Date</i>:</b>&nbsp&nbsp<?php echo $s1;?></td>
</div>

<div id="Layer5" style="position:absolute; top:-163px; left:803px; width:276px; height: 43px;">
<td><b><i>Reg Ending Date</i>:</b>&nbsp&nbsp<?php echo $d1;?></td>
</div>
<div id="Layer5" style="position:absolute; top:-117px; left:803px; width:276px; height: 43px;">
<td><b><i>Min Credit Limit</i>:</b>&nbsp&nbsp12</td>
</div>

<input type='hidden' name='id' value="<?php echo htmlentities(serialize($farray)); ?>" />
<input type='hidden' name='sem' value="<?php echo $sem; ?>" />
<input type='hidden' name='crl' value="<?php echo $chl; ?>" />
<input type='hidden' name='session' value="<?php echo $ssl2; ?>" />
<input type='hidden' name='sid' value="<?php echo $st; ?>" />
<!--<input type='hidden' name='code' value="<?php echo htmlentities(serialize($f1array)); ?>" />
<input type='hidden' name='title' value="<?php echo htmlentities(serialize($f2array)); ?>" />
<input type='hidden' name='hour' value="<?php echo htmlentities(serialize($f3array)); ?>" />
<input type='hidden' name='remarks' value="<?php echo htmlentities(serialize($f4array)); ?>" />-->


<div style="position:absolute;top:460px;left:871px;">
<input name='submit' value='submit' type='submit'>
</div> 
</form>
</div>






<img src="index_06.gif" width="404" height="292" align="center" />
</body>
</html>





