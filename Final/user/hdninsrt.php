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

<div id="Layer2" style="position:absolute; z-index:5; left: 103px; top:458px; width: 1118px; height: 165px;">
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

<div style="position:absolute; width:548px; height:574px; top:726px; left: 280px;">
<?php
include 'conn.php';
mysql_select_db("UniRegistration", $con);

$passed_array1 = unserialize($_POST['id']);
$b=$_POST['sem'];
$clm=$_POST['crl'];
$sid=$_POST['sid'];
$ssn=$_POST['session'];
$i=count($passed_array1);
$c=$_POST[chk];
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
foreach($c as $value)
{
$va=explode("|",$value);
$y1=$va[1];
$sum=$sum+$y1;
}

if( strtotime($dateBefore) >= strtotime($datestart) && strtotime($dateBefore) <= strtotime($dateAfter))
{
	if($sum>=12 && $sum<=$clm)
	{
		foreach($c as $value)
		{
			$va=explode("|",$value);
			$x1=$va[0];
			$sql2="INSERT INTO Std_registration(StudId,Ensem,SesnCode,Crscode,regdate) VALUES ('$passed_array1[$i]','$b','$ssn','$x1','$dateBefore')";
			mysql_query($sql2,$con);
			$i++;
	
		}
		?>
		<div style="position:absolute; top:75px; left:22px; width: 501px; height: 45px;">
		<b><font size="5px">Successfully Submited for Advisor Approval!</font></b>	
	
		</div>
		<?php
	}


	else if($sum<12)
	{
		
	?>
	<div style="position:absolute; top:140px; left:127px;">

	<b><font size="5px">Minimum credit limit is not Satisfied!!</font></b>
	</div>
	<?php
	
	}
	else if($sum>$clm)
	{
	?>
	<div style="position:absolute; top:140px; left:127px;">

	<b><font size="5px">exceed your credit limit!!</font></b>
	</div>
	<?php
	}
}
else
{
?>
		<div style="position:absolute; top:201px; left:124px;">

		<b><font size="5px">Registration Time Expired !!!</font></b>
		</div>

		<?php
}
	$sql3="INSERT INTO reg_info(StudId,SemCode,GPA,MaxLd,MinLd,T_CrdHour) VALUES ('$sid','$b','$g','$clm','12','$sum')";
	mysql_query($sql3,$con);
?>
</div>
</body>
</html>
