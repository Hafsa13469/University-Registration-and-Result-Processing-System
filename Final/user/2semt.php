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
<div id="Layer1" style="position:absolute; background-color:#ffffff; width:1145px; height:105px; z-index:1; left: 102px; top: 0px;">
	<img src="03.gif" width="100" height="102" />
	<div id="Layer3" style="position:absolute;font-color:#fff;font-size:40px;left:101px;top:15px;font-family:sans-serif;" ><i>Student Management System</i></div>
	<div id="Layer2" style="position:absolute; width:199px; height:106px; z-index:4; left: 944px; top: -2px;"><img src="images1.jpg" width="200" height="105" align="center" /></div>
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

<div id="Layer2" style="position:absolute; z-index:5; left: 103px; top:460px; width: 1095px; height: 301px;">
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
  <div id="Layer10" style="position:absolute; width:205px; height:3553px; z-index:1; left: 1249px; top: -4px;"><img src="hm2.jpg" width="159" height="2507" /></div>
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
$sum=0;
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

$result=mysql_query("select distinct StudId,confirmation,EnSem FROM std_registration WHERE StudId='$sid' AND EnSem='$sm'");
$result1 = mysql_fetch_array($result);
$rgs2 = $result1['confirmation'];
if($rgs2=='0')
{
	$reg=mysql_query("select T_CrdHour FROM reg_info WHERE StudId='$sid' AND SemCode='$sm'");
	$reg1 = mysql_fetch_array($reg);
	$reg2 = $reg1['T_CrdHour'];
	foreach($c as $value)
	{
		$va=explode("|",$value);
		//$x1=$va[0];
		$y1=$va[1];
		$reg2=$reg2+$y1;
	}
	if( strtotime($dateBefore) >= strtotime($datestart) && strtotime($dateBefore) <= strtotime($dateAfter))
	{
		if($reg2<=$b && $reg2>=$z)

		{
			foreach($c as $value)
			{
				$va=explode("|",$value);
				$x1=$va[0];
				$sql2="INSERT INTO Std_registration(StudId,Ensem,SesnCode,Crscode,regdate) VALUES ('$passed_array1[$i]','$sm','$sn','$x1','$dateBefore')";
				mysql_query($sql2,$con);
				$i++;
	 			$query=mysql_query("UPDATE temp_add SET flag='0'");
				$query1=mysql_query("UPDATE reg_info SET T_CrdHour= '".$reg2."' WHERE StudId='$sid' && SemCode='$sm' ");
			}
			?>
			<div style="position:absolute; top:350px; left:400px;">
	
				<b><font size="5px">Successfully Submitted for Advisor Approval!</font></b>	
</div>
				<?php
		}
		else if($reg2>$b)
		{
			?>
			<div style="position:absolute; top:350px; left:400px;">
			<b><font size="5px">exceed your credit limit!!</font></b>
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
}

else if($rgs2=='1')
{
		?>
		<div style="position:absolute; top:926px; left:442px;">
	
		<b><font size="5px">You can't request any  because you are already REGISTERED!</font></b>	
		</div>
		<?php
}
else
{
	foreach($c as $value)
	{
		$va=explode("|",$value);
		//$x1=$va[0];
		$y1=$va[1];
		$sum=$sum+$y1;
	}
	if( strtotime($dateBefore) >= strtotime($datestart) && strtotime($dateBefore) <= strtotime($dateAfter))
	{
		if($sum<=$b && $sum>=$z)

		{
			foreach($c as $value)
			{
				$va=explode("|",$value);
				$x1=$va[0];
				
				
				$fl=mysql_query("SELECT CrsCode FROM record_gpa WHERE StudId= '$sid' AND Grade='F' ");
	
				while($s = mysql_fetch_array($fl)) {
				$fc = $s["CrsCode"];
				 
				if($fc==$x1)
				{
					echo $fc;
					$query1=mysql_query("UPDATE record_gpa  SET Grade='R' WHERE StudId='$sid' AND Grade='F' AND CrsCode='$x1'");
				}
				}	
				$sql2="INSERT INTO Std_registration(StudId,Ensem,SesnCode,Crscode,regdate) VALUES ('$passed_array1[$i]','$sm','$sn','$x1','$dateBefore')";
				mysql_query($sql2,$con);
				$i++;
	 			$query=mysql_query("UPDATE temp_add SET flag='0'");
			}
			?>
			<div style="position:absolute; top:1007px; left:451px;">
	
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
			<div style="position:absolute; top:816px; left:434px; width: 475px; height: 29px;">

			<b><font size="5px">minimum credit limit is not satisfied!!</font></b>
			</div>
			<?php
		}
	}
	else
	{
		?>
		<div style="position:absolute; top:874px; left:405px;">

		<b><font size="5px">Registration Time Expired !!!</font></b>
		</div>

		<?php
	}
	$sql3="INSERT INTO reg_info(StudId,SemCode,GPA,MaxLd,MinLd,T_CrdHour) VALUES ('$sid','$scode','$g','$b','$z','$sum')";
	mysql_query($sql3,$con);
}
?>
</body>
</html>