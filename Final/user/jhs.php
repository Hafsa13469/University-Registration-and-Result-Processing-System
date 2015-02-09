<?php
session_start();
//echo $_SESSION['userid'];

	$host = "localhost";
	$db = "UniRegistration";
	$dbu = "root";
	$dd=$_REQUEST['Ad'];
	$con = mysql_connect ($host,$dbu, "");
	mysql_select_db ("$db",$con);
	
	$nf = mysql_query("SELECT EnSem FROM student_info WHERE StudId='$_SESSION[userid]'"); 
	$nf1 = mysql_fetch_array($nf);
	$nf2 = $nf1['EnSem'];

	$rgs=mysql_query("select distinct StudId,confirmation,EnSem FROM std_registration WHERE StudId='$_SESSION[userid]' AND EnSem='$nf2'");
	
	while ($rgs1 = mysql_fetch_array($rgs))
	{
	$rgs2 = $rgs1['EnSem'];
	$rgs3 = $rgs1["StudId"];
	$conf = $rgs1["confirmation"];
	//echo $conf;
	}
	if (isset($_POST['sbmt']))
	{
		if($conf == '1')
		{
				$errorc="<tr>";
						$errorc.="You can't add any COURSE because you are already REGISTERED";
						$errorc.="</tr>";
						$errorc.="<br\>";
		}
		else
		{
		//$dd=$_REQUEST['Ad'];
		$_POST['id']=$_POST['hide'];
		//$_POST['semester']=$_POST['hide1'];
		$nf2=$_POST['hide1'];
		//$sme=$_POST['hide2'];
		$dd=$_POST['alu'];
		/*****************************REPEAT*****************************/
$result=mysql_query("SELECT CrsCode,PrereqCourseId FROM course WHERE SemCode='$nf2'"); 
while($line1=mysql_fetch_array($result))
{
		$ccd = $line1["CrsCode"];
		$pre = $line1["PrereqCourseId"];
		
		$gd=mysql_query("SELECT CrsCode FROM record_gpa WHERE StudId= '$_SESSION[userid]' AND CrsCode='$pre' ");
	
		while ($line2 = mysql_fetch_array($gd)) 
		{
			$rec = $line2["CrsCode"];
	
			$fl=mysql_query("SELECT CrsCode FROM record_gpa WHERE StudId= '$_SESSION[userid]' ");
	
			while($s = mysql_fetch_array($fl))
			{
				$fc = $s["CrsCode"];
				$cnfd=mysql_query("SELECT CrsCode FROM std_registration WHERE StudId='$_SESSION[userid]' && EnSem='$nf2'"); 
				while($cnfd1=mysql_fetch_array($cnfd))
				{
					$cnfcd = $cnfd1["CrsCode"];
					if(($dd == $ccd) || ($dd == $rec) || ($dd == $fc) || ($dd == $cnfcd))
					{
						$rpt="<tr>";
						$rpt.=" $dd already Exist in the Suggessted Courses";
						$rpt.="</tr>";
						$rpt.="<br\>";
					}
		/***************************REPEATEND****************************/
				}/****************1**************/
		}/****************2**************/	
	
	}/****************3**************/
}/****************4**************/

		$sql2=mysql_query("INSERT INTO temp_add(CrsCode,flag) VALUES ('$dd','1')");
		/*if($dd==$ccd)
		{
			echo "already exist!";
		}*/
		/*else
		{*/
		$tmp=mysql_query(" SELECT CrsCode,flag FROM temp_add");
		while($tmp1= mysql_fetch_array($tmp))
		{
			$tmp2 = $tmp1['CrsCode'];
			$tmp3 = $tmp1['flag'];
			if($tmp3 == '1')
			{
					
				$im =mysql_query("SELECT record_gpa.StudId,record_gpa.CrsCode,record_gpa.CrdHour,record_gpa.EnSem,record_gpa.Grade,course.CrsTitle FROM record_gpa,course WHERE record_gpa.StudId='$_SESSION[userid]' AND record_gpa.CrsCode='$tmp2' AND record_gpa.CrsCode=course.CrsCode ");
				while ($im1 = mysql_fetch_array($im)) 
				{
					$st = $im1['StudId'];
					$de = $im1['CrsCode'];
					$le = $im1['CrsTitle'];
					$ur = $im1['CrdHour'];
					$me = $im1['EnSem'];
					$ed = $im1['Grade'];
				}
			
				$thestates.="<tr>";
				if($de==$tmp2)
				{
					if (($ed == 'D') || ($ed == 'C') || ($ed == 'C+') ||($ed == 'B-') || ($ed == 'B'))
					{
						$tws=mysql_query("SELECT SemCode FROM course WHERE CrsCode='$tmp2'");
						$tws1= mysql_fetch_array($tws);
						$tws2 = $tws1['SemCode'];
						$tws3 = $tws2+1;
						$tws4 = $tws2+2;
						//echo $tws3;
						//echo $tws4;
						if(($nf2 == $tws3) ||($nf2 == $tws4))
						{
							$thestates.="<td align=\"center\">";
							$thestates.=$de;
							$thestates.="</td>"; 
							$thestates.="<td align=\"center\">";
							$thestates.=$le;
							$thestates.="</td>"; 	
							$thestates.="<td align=\"center\">";
							$thestates.=$ur;
							$thestates.="</td>"; 
							$thestates.="<td align=\"center\">";
			
							$thestates.="</td>";
							$thestates.="<td align=\"center\">";
							$thestates.="</td>";
							$thestates.="<td align=\"center\">";		
							$thestates.="<input type=checkbox name=chk[] value= $de|$ur  >";	
							$thestates.="</td>";
			

						}
						else
						{
							$errori="<tr>";
							$errori.="Maximum semester limit for improvement of &nbsp $tmp2 &nbsp  has been expired!!";
							$errori.="</tr>";
							$errori.="<br\>";
						}
					}
		
					else if(($ed == 'A+') || ($ed == 'A') || ($ed == 'A-') ||($ed == 'B+'))
					{
						$error="<tr>";
						$error.="$de can not be taken Because its Grade is more than 'B'";
						$error.="</tr>";
						$error.="<br\>";
					
					}
				
			
					
					
				}
				else
				{
					$adc =mysql_query("SELECT CrsCode,CrsTitle,CrdHour,PrereqCourseId FROM course WHERE CrsCode='$tmp2' ");
					while ($adc1 = mysql_fetch_array($adc))
					{
						$de1 = $adc1["CrsCode"];
						$le1 = $adc1["CrsTitle"];
						$ur1 = $adc1["CrdHour"];
						$pre1 = $adc1["PrereqCourseId"];
					
						$thestates.="<tr>";
		
						if($pre1 == NULL)
						{
							$thestates.="<td align=\"center\">";
							$thestates.=$de1;
							$thestates.="</td>"; 
							$thestates.="<td>";
							$thestates.=$le1;
							$thestates.="</td>"; 
							$thestates.="<td align=\"center\">";
							$thestates.=$ur1;
		
							$thestates.="</td>"; 
							$thestates.="<td align=\"center\">";
							$thestates.="</td>";
							$thestates.="<td align=\"center\">";
							$thestates.="</td>";
							$thestates.="<td align=\"center\">";		
							$thestates.="<input type=checkbox name=chk[] value= $de1|$ur1  >";	
							$thestates.="</td>";

						}
		
		
						else
						{
							$adp=mysql_query("SELECT record_gpa.StudId,record_gpa.CrsCode,record_gpa.CrdHour,record_gpa.Grade,course.CrsTitle FROM record_gpa,course  WHERE record_gpa.StudId= '$_SESSION[userid]' AND record_gpa.CrsCode='$pre1' AND record_gpa.CrsCode=course.CrsCode ");
	
							while ($adp2 = mysql_fetch_array($adp)) 
							{
								$ade = $adp2["Grade"];
	
								$ads = $adp2["CrsCode"];
	
								$adr = $adp2["CrsTitle"];

								$adh = $adp2["CrdHour"];

								$adi = $adp2["SudId"];
							
							}
							if (($ade == 'A+') || ($ade == 'A') ||($ade =='A-') || ($ade =='B+') || ($ade =='B') || ($ade =='B-') || ($ade =='C') || ($ade =='C+') || ($ade=='D'))
							{
								$thestates.="<td align=\"center\">";
								$thestates.=$de1;
								$thestates.="</td>"; 
								$thestates.="<td>";
								$thestates.=$le1;
								$thestates.="</td>"; 
								$thestates.="<td align=\"center\">";
								$thestates.=$ur1;
								$thestates.="</td>";
								$thestates.="<td align=\"center\">";
								$thestates.=$pre1;		
								$thestates.="</td>";
								$thestates.="<td align=\"center\">";
								$thestates.="</td>";
								$thestates.="<td align=\"center\">";		
								$thestates.="<input type=checkbox name=chk[] value= $ads|$adh  >";	
								$thestates.="</td>";
							}
	
		
							else
							{
								
								$error1="<tr>";
								$error1.="$de1 can not be taken Because its Prerequisite Course is not Completed!!";
								$error1.="</tr>";
								$error1.="<br\>";
							}
						
						}	
	
		
					}
		
		
				}
			}/****f=1*/
		}/****t****/
		$thestates.="</tr>";
		$thestates.="\n";
		/*}***reptelse***/
				
		}/***else***/
	}
	
//$current_id=$_POST['id'];


$x = mysql_query("SELECT StudId,PrgmCode,DeptCode,CampCode,EnSem FROM student_info WHERE StudId='$_SESSION[userid]'");
	
if (!$x)
{
	echo "An error occurred ".mysql_error();
	exit;
}
while ($line = mysql_fetch_array($x)) 
{
	$st = $line["StudId"];
	$pr = $line["PrgmCode"];
	$dep = $line["DeptCode"];
	$cam = $line["CampCode"];
	$sem= $line["EnSem"];
}
$ssl = mysql_query("SELECT SesnCode FROM session");
$ssl1 = mysql_fetch_array($ssl);
$ssl2 = $ssl1['SesnCode'];

if($conf == '1')
{ 
	$reg= "REGISTERED";
	$cnfd=mysql_query("SELECT std_registration.CrsCode,course.CrsTitle,course.CrdHour,course.PrereqCourseId FROM std_registration,course WHERE course.CrsCode=std_registration.CrsCode && std_registration.EnSem='$nf2' && std_registration.StudId='$_SESSION[userid]'"); 
	$confirm ="<tr>"; 
		$confirm.="<td align=\"center\">"; $confirm.="<b>CourseCode</b>"; $confirm.="</td>";
		$confirm.="<td align=\"center\">"; $confirm.="<b>Coursetitle</b>"; $confirm.="</td>";
		$confirm.="<td align=\"center\">"; $confirm.="<b>Credithour</b>"; $confirm.="</td>";
		$confirm.="<td align=\"center\">"; $confirm.="<b>PrerequisiteCourses</b>"; $confirm.="</td>";
		$confirm.="</tr>";
	$i=0;
	
	while($cnfd1=mysql_fetch_array($cnfd))
	{
		$ccd = $cnfd1["CrsCode"];

		$ct = $cnfd1["CrsTitle"];

		$ch = $cnfd1["CrdHour"];

		$pre = $cnfd1["PrereqCourseId"];

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
	$cnfd=mysql_query("SELECT std_registration.CrsCode,std_registration.EnSem,std_registration.StudId,course.CrsTitle,course.CrdHour,course.PrereqCourseId FROM std_registration,course WHERE course.CrsCode=std_registration.CrsCode && std_registration.EnSem='$nf2' && std_registration.StudId='$_SESSION[userid]'"); 
	$wt ="<tr>"; 
		$wt.="<td align=\"center\">"; $wt.="<b>CourseCode</b>"; $wt.="</td>";
		$wt.="<td align=\"center\">"; $wt.="<b>Coursetitle</b>"; $wt.="</td>";
		$wt.="<td align=\"center\">"; $wt.="<b>Credithour</b>"; $wt.="</td>";
		$wt.="<td align=\"center\">"; $wt.="<b>PrerequisiteCourses</b>"; $wt.="</td>";
		$wt.="<td align=\"center\">"; $wt.="<b>Remarks</b>"; $wt.="</td>";
		$wt.="<td align=\"center\">"; $wt.="<b>Select</b>"; $wt.="</td>";
	$wt.="</tr>";
	$i=0;
	
	while($cnfd1=mysql_fetch_array($cnfd))
	{
		$ccd = $cnfd1["CrsCode"];

		
		$ct = $cnfd1["CrsTitle"];

		$ch = $cnfd1["CrdHour"];

		$pre = $cnfd1["PrereqCourseId"];
		
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
			$wt.=$pre;
			$wt.="</td>";
			$wt.="<td align=\"center\">";
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
	$reg ="NOT REGISTERED";
	$result=mysql_query("SELECT CrsCode,CrsTitle,CrdHour,PrereqCourseId FROM course WHERE SemCode='$nf2'"); 
	if (!$result)
	{
		echo "An error occurred ".mysql_error();
		exit;
	}
	$thestates6 ="<tr>"; 
		$thestates6.="<td align=\"center\">"; $thestates6.="<b>CourseCode</b>"; $thestates6.="</td>";
		$thestates6.="<td align=\"center\">"; $thestates6.="<b>Coursetitle</b>"; $thestates6.="</td>";
		$thestates6.="<td align=\"center\">"; $thestates6.="<b>Credithour</b>"; $thestates6.="</td>";
		$thestates6.="<td align=\"center\">"; $thestates6.="<b>PrerequisiteCourses</b>"; $thestates6.="</td>";
		$thestates6.="<td align=\"center\">"; $thestates6.="<b>Remarks</b>"; $thestates6.="</td>";
		$thestates6.="<td align=\"center\">"; $thestates6.="<b>Select</b>"; $thestates6.="</td>";
	$thestates6.="</tr>";
	
	$i=0;
	
	while($line1=mysql_fetch_array($result))
	{
		$ccd = $line1["CrsCode"];

		$ct = $line1["CrsTitle"];

		$ch = $line1["CrdHour"];

		$pre = $line1["PrereqCourseId"];

		//$d = $line1["StudId"];

	
		//$farray[$i]=$d;
 
	
		$thestates6.="<tr>";
		
		if($pre == NULL)
		{
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
			$thestates6.="</td>";
			$thestates6.="<td align=\"center\">";
			$thestates6.="</td>";
			$thestates6.="<td align=\"center\">";		
			$thestates6.="<input type=checkbox  name=chk[] value= $ccd|$ch >";	
			$thestates6.="</td>";

        }
		
		
		else
		{
			$gd=mysql_query("SELECT record_gpa.StudId,record_gpa.CrsCode,record_gpa.CrdHour,record_gpa.Grade,course.CrsTitle FROM record_gpa,course WHERE record_gpa.StudId= '$_SESSION[userid]' AND record_gpa.CrsCode='$pre' AND record_gpa.CrsCode=course.CrsCode");
	
			while ($line2 = mysql_fetch_array($gd)) 
			{
				$re3 = $line2["Grade"];
	
				$rec = $line2["CrsCode"];
	
				$ret = $line2["CrsTitle"];

				$reh = $line2["CrdHour"];

				$rid = $line2["SudId"];
	
			}
			if (($re3 == 'A+') || ($re3 == 'A') ||($re3 =='A-') || ($re3 =='B+') || ($re3 =='B') || ($re3 =='B-') || ($re3 =='C') || ($re3 =='C+') || ($re3=='D'))
			{
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
				$thestates6.=$pre;		
				$thestates6.="</td>";
				$thestates6.="<td align=\"center\">";
				$thestates6.="</td>";
				$thestates6.="<td align=\"center\">";		
				$thestates6.="<input type=checkbox name=chk[] value= $ccd|$ch  >";	
				$thestates6.="</td>";
			}
		}	

		$thestates6.="</tr>";
		$thestates6.="\n";
		$farray[$i]=$_SESSION['userid'];
		$i++;
	
	}

	$fl=mysql_query("SELECT record_gpa.StudId,record_gpa.CrsCode,record_gpa.CrdHour,record_gpa.Grade,course.CrsTitle FROM record_gpa,course WHERE record_gpa.StudId= '$_SESSION[userid]' AND record_gpa.CrsCode=course.CrsCode  ");
	
	while($s = mysql_fetch_array($fl)) 
	{
 
		$fg = $s["Grade"];
		$fc = $s["CrsCode"];
		
		$ft = $s["CrsTitle"];

		$fh = $s["CrdHour"];

		$fid = $s["StudId"];
		$thestates6.="<tr>";

		if (($fg == 'F')|| ($fg == 'I'))
		{
			$thestates6.="<td align=\"center\">";
			$thestates6.=$fc;
			$thestates6.="</td>"; 
			$thestates6.="<td>";
			$thestates6.=$ft;
			$thestates6.="</td>"; 
			$thestates6.="<td align=\"center\">";
			$thestates6.=$fh;
			$thestates6.="</td>"; 
			$thestates6.="<td align=\"center\">";
			$thestates6.="</td>";
			$thestates6.="<td align=\"center\">";
			$thestates6.="  R";
			$thestates6.="</td>";
			$thestates6.="<td align=\"center\">";		
			$thestates6.="<input type=checkbox name=chk[] value= $fc|$fh  >";	
			$thestates6.="</td>";
		}
		if ($fg == 'W')
		{ 
			$thestates6.="<td align=\"center\">";
			$thestates6.=$fc;
			$thestates6.="</td>"; 
			$thestates6.="<td>";
			$thestates6.=$ft;
			$thestates6.="</td>"; 
			$thestates6.="<td align=\"center\">";
			$thestates6.=$fh;
			$thestates6.="</td>"; 
			$thestates6.="<td align=\"center\">";
			$thestates6.="</td>";
			$thestates6.="<td align=\"center\">";
			$thestates6.="</td>";
			$thestates6.="<td align=\"center\">";		
			$thestates6.="<input type=checkbox name=chk[] value= $fc|$fh  >";	
			$thestates6.="</td>";
		}
		$thestates6.="<tr>";
		$thestates6.="\n";
	}
}
$nsem=$sem-1;
$m=mysql_query("SELECT StudId,GPA,EnSem FROM std_gpa WHERE StudId= '$_SESSION[userid]' AND EnSem='$nsem'  ");
	
	while ($line = mysql_fetch_array($m)) {
 
	$stdid = $line["StudID"];
	$scode = $line["EnSem"];
	$gpa = $line["GPA"];


}
$n=mysql_query("SELECT GPALlimit,GPAUlimit,MaxLd,MinLd FROM CreditLimit ");
	
	while ($line = mysql_fetch_array($n)) {
 
	$u = $line["GPAUlimit"];
	$l = $line["GPALlimit"];
	
	$mx = $line["MaxLd"];
	$mn = $line["MinLd"];

if($gpa>=$l && $gpa<=$u)
{
	$a=$mx;
	$mi=$mn;
}


}

$m1=mysql_query("SELECT startdate,deadline FROM reg_deadline ");
	
	while ($dl = mysql_fetch_array($m1)) {
 
	$s1 = $dl["startdate"];
	$d1 = $dl["deadline"];
}	
	

?>


<html>
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<!--/**************design*****************/-->
<div id="Layer1" style="position:absolute; background-color:#ffffff; width:1145px; height:105px; z-index:1; left: 102px; top: 0px;">
	<img src="03.gif" width="100" height="102" />
	<div id="Layer3" style="position:absolute;font-color:#fff;font-size:40px;left:141px;top:15px;font-family:sans-serif;" ><i>Student Management System</i></div>
	<div id="Layer2" style="position:absolute; width:199px; height:106px; z-index:4; left: 942px; top: -4px;"><img src="images1.jpg" width="200" height="105" align="center" /></div>
</div>



<div style="position:absolute; left:102px; top:106px; width: 1139px; height: 350px;" > 

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

<div id="Layer2" style="position:absolute; z-index:5; left: 101px; top:456px; width: 1093px; height: 149px;">
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
                <li><a href="st_reseid.php">View</a>
                    
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
  <div id="Layer10" style="position:absolute; width:205px; height:3553px; z-index:1; left: 1249px; top: -4px;"><img src="hm2.jpg" width="201" height="2543" /></div>
<!--***************end design**********-->
<script type="text/javascript">
var check;   
 check=document.getElementById("cr");
function checkbox_changed() {
        check.checked =true;
}
function validateFormOnSubmit(theForm) {
var reason = "";

  
  reason += validateAddCourse(theForm.alu);
  
  if (reason != "") {
    alert("Some fields need correction:\n" + reason);
    return false;
  }

  return true;
}
function validateAddCourse(fld) {
    var error = "";
    
	var illegalCharsq = /[\(a-z)/]/; // allow only letters and numbers 
	 var illegalChars= /[\_\)\<\>\,\;\:\\\"\[\]]/ ;
	  //var illegalCharsq= /(a-z)+/ ;
    if (fld.value == "") {
        fld.style.background = 'White';
        error = "You didn't enter a coursecode \n";
    } else if ((fld.value.length <7) || (fld.value.length >10)) {
        error = "The coursecode is the wrong length. \n";
        fld.style.background = 'White';
    } else if (fld.value.match(illegalChars)) {
        fld.style.background = 'Yellow';
        error = "The CourseCode contains illegal characters.\n";
    }
	else if (fld.value.match(illegalCharsq)) {
        fld.style.background = 'Red';
        error = "The  CourseCode contains lowercase letters.\n";
    }
	else if (!((fld.value.search(/(A-Z)+/)) && (fld.value.search(/(0-9)+/)))) {
        error = "The password must contain at least one numeral.\n";
        fld.style.background = 'Yellow';
    }
	 else {
        fld.style.background = 'White';
    }
   return error;
}  
</script>
<div id="Layer7" style="position:absolute; width:743px; height:140px; z-index:3; left: 174px; top: 1376px; font-size:22px;">
<b><font color="#33CC00">Error Messages!!</font><b>
<br/>
<b><?php echo $error;?></b>
<br/>

<b><?php echo $error1;?></b>
<br/>
<b><?php echo $errori;?></b>
<br/>
<b><?php echo $errorc;?></b>
<br/>
<b><?php echo $rpt;?></b></div>
<div style="position:absolute; font-size:20px; left: 138px; top:897px; width:1044px;height:706px;">

<form name="form2"  action="2semt.php" method="post">
<div id="Layer6" style="position:absolute; top:49px; left:27px; width:857px; height:380px;">
<table width="120%" height="51" border="3" align="center" cellpadding="0" cellspacing="0"  bgcolor="#9DF" left="100px">

  <?php echo $thestates6;?>

 <!--<?php //echo $addcr;?>-->
   <?php echo $confirm;?>
    <?php echo $wt;?>
	 <?php echo $thestates;?>
</table>
</div>

<div id="Layer4" style="position:absolute; top:-280px; left:844px; width:278px; height: 38px;">
<td><b><i>Reg Starting Date</i>:</b>&nbsp&nbsp<input name="rsd" type="text" size="10" value="<?php echo $s1;?>"></td>
</div>

<div id="Layer5" style="position:absolute; top:-241px; left:847px; width:276px; height: 43px;">
<td><b><i>Reg Ending Date</i>:</b>&nbsp&nbsp<input name="rse" type="text" size="10" value="<?php echo $d1;?>"></td>
</div>

<div id="Layer3" style="position:absolute; top:-197px; left:845px; width:276px; height: 49px;">
<td><b><i>Max Credit Limit</i>:</b>&nbsp&nbsp<input name="cr" type="text" size="10" value="<?php echo $a;?>"></td>
</div>

<div id="Layer3" style="position:absolute; top:-154px; left:843px; width:269px; height: 44px;">
<td><b><i>Min Credit Limit</i>:</b>&nbsp&nbsp<input name="cr1" type="text" size="10" value="<?php echo $mi;?>"></td>
</div>


<input type='hidden' name='id' value="<?php echo htmlentities(serialize($farray)); ?>" />

<input type='hidden' name='sem' value="<?php echo $nf2; ?>" />
<input type='hidden' name='ssn' value="<?php echo $ssl2; ?>" />
<input type='hidden' name='gpa' value="<?php echo $gpa; ?>" />
<input type='hidden' name='semcode' value="<?php echo $scode; ?>" />
<input type='hidden' name='sid' value="<?php echo $st; ?>" />

<input type='hidden' name='sgc' value="<?php echo $sg ?>" />
<input type='hidden' name='com' value="<?php echo $co ?>" />
<input type='hidden' name='prev' value="<?php echo $pvs ?>" />
<div id="Layer4" style="position:absolute; top:444px; left:716px; width:176px; height: 25px;">
<input name="submit" value="    SUBMIT     "  type="submit">
</div>
</form>
</div>

<div id="Layer2" style="position:absolute; width:292px; height:85px; z-index:2; left: 969px; top: 792px;font-size:22px;">
<form name="form2" onsubmit="return validateFormOnSubmit(this)" action="jhs.php" method="post">
<b><font color="#33CC00">Add Course:</font><b>
<input type="text" name="alu" value="<?php echo $dd;?>"><br/>

<input type="hidden" name="hide" value="<?php echo $_SESSION['userid'];?>">
<input type="hidden" name="hide1" value="<?php echo $nf2;?>">
<input type="hidden" name="hide2" value="<?php echo $dd;?>">
<div style="position:relative; width:70px; height:40px; z-index:2; left: 180px; top: 10px;">
  <input type="submit" name="sbmt" value="   ADD    " />
</div>
</form>
</div>
<div id="Layer1" style="position:absolute; width:760px; height:196px; z-index:1; left: 154px; top:730px;font-size:20px; border: 1px none #000000; visibility: visible;">
<table width="391" border="0"cellpadding="4" cellspacing="0" >
	<tr>
        <td><strong><i>Reg Status</i>:</strong>&nbsp&nbsp<?php echo $reg ?></td>
    </tr>
	<tr>
        <td><strong><i>Studentid</i>:</strong>&nbsp&nbsp<?php echo $st ?></td>
    </tr>
	
	<tr>
	<td><strong><i>Semester</i>:</strong>&nbsp&nbsp<?php echo $sem ?></td>
    </tr>
     
	<tr>
         <td><strong><i>Program</i>:</strong>&nbsp&nbsp<?php echo $pr ?></td>
    </tr>
	
	<tr>
        <td><strong><i>Department</i>:</strong>&nbsp&nbsp<?php echo $dep ?></td>
    </tr>
	<tr>
        <td><strong><i>Session</i>:</strong>&nbsp&nbsp<?php echo $ssl2 ?></td>
    </tr>
    <tr>   
        <td><strong><i>Campus<i>:</strong>&nbsp&nbsp<?php echo $cam ?></td>
    </tr>
</table>
</div>

<!--************design*********************8-->





</body>

</html>
