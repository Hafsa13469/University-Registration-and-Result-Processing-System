!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<title></title>
<script language="JavaScript" type="text/JavaScript">
</script>
<style type="text/css">

body {
	background-color:#FFFFFF;
	        
}
body,td,th {
	color: #000099;
}
</style>
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

<div id="Layer1" style="position:absolute; background-color:#ffffff; width:1129px; height:121px; z-index:1; left: 118px; top: -25px;">
	<div id="Layer3" style="position:absolute;font-color:#fff;font-size:40px;left:262px;top:30px;font-family:"Times New Roman", Times, serif;" ><i>Student Management System</i></div>
	<div id="Layer4" style="position:absolute; width:160px; height:56px; z-index:1; left: 961px; top: 24px;font-color:#fff;font-size:20px;font-family:"Times New Roman", Times, serif;"><b><i>Advisor Panel</i></b>
	</div>
</div>




<div id="Layer2" style="position:absolute; z-index:5; left: 90px; top:475px; width: 1115px; height:123px; background-color: #FFFFFF; layer-background-color: #FFFFFF; border: 1px none #000000;">
<div class="example">
    <ul id="nav">
        <li><a href="home.php">Home</a></li>
        <li><a href="">Registration</a>
              <ul>
                  <li><a href="advsr_getid.php">Confirm Registration</a></li>
		          
                    
                
                
                
            </ul>
        </li>
        <li><a href="">Result</a>
            <ul>
                <li><a href="">View</a>
                    
               
            </ul>
        </li>
        
        
    
<li><a href="logout.php">Log Out</a></li>
</ul>

</div>
</div>



<div id="Layer6" style="position:absolute; width:1158px; height:374px; z-index:7; left: 91px; top: 91px;"><img src="3.jpg" width="404" height="367" />
  <div id="Layer9" style="position:absolute; width:325px; height:368px; z-index:1; left: 404px; top: 0px;"><img src="4.jpg" width="404" height="368" /></div>
  <div id="Layer10" style="position:absolute; width:361px; height:371px; z-index:2; left: 793px; top: 0px;"><img src="5.jpg" width="365" height="369" /></div>
</div>
<div id="Layer7" style="position:absolute; width:276px; height:107px; z-index:8; left: 91px; top: -17px;"><img src="adv.jpg" width="255" height="108" />
</div>
<div id="Layer8" style="position:absolute; width:193px; height:2014px; z-index:9; left: -104px; top: 0px;"><img src="hm1.jpg" width="195" height="2054" /></div>
<div id="Layer5" style="position:absolute; width:184px; height:2534px; z-index:10; left: 1248px; top: 1px;"><img src="hm1.jpg" width="202" height="2014" />
</div>

<?php

	$id=$_REQUEST['StudId'];
	//$_REQUEST['StudId']=$_POST['hide1'];
	$host = "localhost";
	$db = "UniRegistration";
	$dbu = "root";
	
	$con = mysql_connect ($host,$dbu, "");
	mysql_select_db ("$db",$con);
	$dateBefore = date("Y-m-d");
	$dl = "SELECT Starting_Date,Ending_Date FROM confrm_deadline";
	$dl1=mysql_query($dl,$con);
	if (!$dl1)
	{
		echo "An error occurred ".mysql_error();
		exit;
	}
	while ($condt = mysql_fetch_array($dl1))
	{
		$dl2 = $condt["Ending_Date"];
		$dl3 = $condt["Starting_Date"];
	}
	$dateAfter =$dl2;
	$datestart =$dl3;
	if( strtotime($dateBefore) >= strtotime($datestart) && strtotime($dateBefore) <= strtotime($dateAfter))
	{
		if (isset($_POST['sbmt']))
		{
			$id=$_POST['hide'];
			$_POST['semester']=$_POST['hide1'];
		
			$dd=$_POST['alu'];
		
			$sql2=mysql_query("INSERT INTO temp_add(CrsCode,flag) VALUES ('$dd','1')");
		
			$tmp=mysql_query(" SELECT CrsCode,flag FROM temp_add");
			while($tmp1= mysql_fetch_array($tmp))
			{
				$tmp2 = $tmp1['CrsCode'];
				$tmp3 = $tmp1['flag'];
				if($tmp3 == '1')
				{
		
					$im =mysql_query("SELECT StudId,CrsCode,CrsTitle,CrdHour,EnSem,Grade FROM resultdetails WHERE StudId='$id' AND CrsCode='$tmp2'");
					while ($im1 = mysql_fetch_array($im))
					{
						$st = $im1['StudId'];
						$de = $im1['CrsCode'];
						$le = $im1['CrsTitle'];
						$ur = $im1['CrdHour'];
						$me = $im1['EnSem'];
						$ed = $im1['Grade'];
			
					}
			
					$ta.="<tr>";
					if($de==$tmp2)
					{
						if (($ed == 'D') || ($ed == 'C') || ($ed == 'C+') ||($ed == 'B-') || ($ed == 'B'))
		
						{	
							$ta.="<td align=\"center\">";
							$ta.=$de;
							$ta.="</td>"; 
							$ta.="<td align=\"center\">";
							$ta.=$le;
							$ta.="</td>"; 	
							$ta.="<td align=\"center\">";
							$ta.=$ur;
							$ta.="</td>"; 
							$ta.="<td align=\"center\">";		
							$ta.="<input type=checkbox name=chk[] value= $de|$ur  >";	
							$ta.="</td>";
					
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
								$ta.="<td align=\"center\">";
								$ta.=$de1;
								$ta.="</td>"; 
								$ta.="<td>";
								$ta.=$le1;
								$ta.="</td>"; 
								$ta.="<td align=\"center\">";
								$ta.=$ur1;
		
								$ta.="</td>"; 
								$ta.="<td align=\"center\">";
								$ta.="<input type=checkbox name=chk[] value= $de1|$ur1  >";	
								$ta.="</td>";
							}
							else
							{
								$adp=mysql_query("SELECT StudId,CrsCode,CrsTitle,CrdHour,Grade FROM resultdetails  WHERE StudId= '$id' AND CrsCode='$pre1' ");
	
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
									$ta.="<td align=\"center\">";
									$ta.=$de1;
									$ta.="</td>"; 
									$ta.="<td>";
									$ta.=$le1;
									$ta.="</td>"; 
									$ta.="<td align=\"center\">";
									$ta.=$ur1;
									$ta.="</td>";
							
									$ta.="<td align=\"center\">";
									$ta.="<input type=checkbox name=chk[] value= $de1|$ur1  >";
									$ta.="</td>";
							
								}
	
		
								else
								{
									//$addcr.="Prerequisite course of ".$de1." is not Complete!";
									//echo '<script>alert("error");</script>';
									$error1="<tr>";
									//$error.="</td>";
									$error1.="$de1 can not be taken Because its Prerequisite Course is not Completed!!";
									//$error.="</td>";
									$error1.="</tr>";
									$error1.="<br\>";
								}
						
							}	
	
		
						}
		
		
					}
				}/****f=1*/
			}/****t****/
			$ta.="</tr>";
			$ta.="\n";
	
	

		}	

		$x = mysql_query("SELECT StudId,PrgmCode,DeptCode,CampCode,EnSem FROM Student_info WHERE StudId='".$id."'");
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
		$y = mysql_query("SELECT StudId,SemCode,GPA,MaxLd,MinLd,T_CrdHour FROM reg_info WHERE StudId='".$id."'");
		while ($line2 = mysql_fetch_array($y)) 
		{
			//$st = $line2["StudId"];
			$scode = $line2["SemCode"];
			$gpa = $line2["GPA"];
			$mx = $line2["MaxLd"];
			$mn = $line2["MinLd"];
			$hour = $line2["T_CrdHour"];
		}
		$query=mysql_query("SELECT distinct StudId FROM std_registration WHERE StudId='".$id."'");
		while($result=mysql_fetch_array($query))
		{
			$r= $result['StudId'];
		}
	
		$fl=mysql_query("SELECT std_registration.StudId,std_registration.CrsCode,std_registration.EnSem,std_registration.SesnCode,std_registration.regdate,course.CrsTitle,course.CrdHour FROM std_registration,course WHERE std_registration.StudId= '$id' AND course.CrsCode=std_registration.CrsCode AND std_registration.confirmation='0'");
		$tbl ="<tr>"; 
		$tbl.="<td align=\"center\">"; $tbl.="<b>CourseCode</b>"; $tbl.="</td>";
		$tbl.="<td align=\"center\">"; $tbl.="<b>Coursetitle</b>"; $tbl.="</td>";
		$tbl.="<td align=\"center\">"; $tbl.="<b>Credithour</b>"; $tbl.="</td>";
		$tbl.="<td align=\"center\">"; $tbl.="<b>Click</b>"; $tbl.="</td>";
		$tbl.="</tr>";
	
		while($s = mysql_fetch_array($fl))
		{
 
			$ccd = $s["CrsCode"];
			$en = $s["EnSem"];
			$rg = $s["regdate"];
			$sn = $s["SesnCode"];
			$ct = $s["CrsTitle"];
			$ch = $s["CrdHour"];
			$sid = $s["StudId"];
			//echo "<form action=advsr_confirm.php  method=post>";
			$tbl.="<tr>";

	
			$tbl.="<td align=\"center\">";
			$tbl.=$ccd;
			$tbl.="</td>"; 
			$tbl.="<td>";
			$tbl.=$ct;
			$tbl.="</td>"; 
			$tbl.="<td align=\"center\">";
			$tbl.=$ch;
			$tbl.="</td>"; 
		
			$tbl.="<td align=\"center\">";
			$tbl.="<a href=\"advsr.php?StudId=".$sid."&CrsCode=".$ccd."&CrdHour=".$ch."&EnSem=".$en."\">";		
			$tbl.="<input type=submit name=submit value= Remove  >";
			$tbl.="</a>";   
			$tbl.="</td>";
		
			$tbl.="<tr>";
			$tbl.="\n";
		
		}
	}
	else
	{
		?>
		<div style="position:absolute; top:350px; left:400px;">

		<b><font size="5px">Confirmation Time Expired !!!</font></b>
		</div>

		<?php
	}
?>
<html>
<body>
		
<div id="Layer1" style="position:absolute; width:660px; height:196px; z-index:1; left: 154px; top:690px;font-size:20px; border: 1px none #000000; visibility: visible;">
<table width="291" border="0"cellpadding="4" cellspacing="0" >
		<tr>
        <td><strong><i>Studentid</i>:</strong>&nbsp&nbsp<?php echo $r ?></td>
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


		<div id="Layer6" style="position:absolute; top:372px; left:-14px; width:918px; height:380px;">
			
		
	<form action ="flg.php" method="post">
	<table width="120%" height="51" border="3" align="center" cellpadding="0" cellspacing="0"  bgcolor="#9DF" left="100px">
		<?php echo $tbl;?>
		<?php echo $ta;?>
	  </table>
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="sem" value="<?php echo $sem;?>">
		<input type="hidden" name="sen" value="<?php echo $ssl2;?>">
		<div id="Layer7" style="position:absolute; top:401px; left:715px; width:70px; height:48px;">
		<input type="submit" name="submit" value="submit">
	  </div>
		</form>
  </div>
</div>
		
<div id="Layer2" style="position:absolute; width:306px; height:108px; z-index:2; left: 851px; top: 925px;font-size:22px;">
<form name="form2" action="advsr_confirm.php" method="post">
<b><font color="#33CC00">Add Course:</font><b>
<input type="text" name="alu" value="<?php echo $dd;?>"><br/>

<input type="hidden" name="hide" value="<?php echo $id;?>">

<input type="hidden" name="hide1" value="<?php echo $nf2;?>">
<input type="hidden" name="hide2" value="<?php echo $dd;?>">
<div style="position:relative; width:70px; height:40px; z-index:2; left: 180px; top: 10px;">
  <input type="submit" name="sbmt" value="   ADD    " />
</div>
</form>
</div>
		<div id="Layer1" style="position:absolute; width:373px; height:196px; z-index:1; left: 825px; top:690px;font-size:20px; border: 1px none #000000; visibility: visible;">
<table width="291" border="0"cellpadding="4" cellspacing="0" >
	<tr>
        <td><strong><i>Registration Date</i>:</strong>&nbsp&nbsp<?php echo $rg ?></td>
    </tr>
	<tr>
        <td><strong><i>Previous Semmester</i>:</strong>&nbsp&nbsp<?php echo $scode ?></td>
    </tr>
	
	<tr>
	<td><strong><i>Prev Semter GPA</i>:</strong>&nbsp&nbsp<?php echo $gpa ?></td>
    </tr>
     
	<tr>
         <td><strong><i>Max Credit Limit</i>:</strong>&nbsp&nbsp<?php echo $mx ?></td>
    </tr>
	
	<tr>
        <td><strong><i>Min Credit Limit</i>:</strong>&nbsp&nbsp<?php echo $mn ?></td>
    </tr>
	<tr>
        <td><strong><i>Total Credit</i>:</strong>&nbsp&nbsp<?php echo $hour ?></td>
    </tr>
    
</table>
</div>
</body>
</html>