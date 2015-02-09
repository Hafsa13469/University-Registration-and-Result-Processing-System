<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<title></title>
<script language="JavaScript" type="text/JavaScript">
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-image: url(image/ab.jpg);
}
-->
</style></head>
<body>
<script language="JavaScript" type="text/JavaScript">
var image1=new Image()
image1.src="image/main.jpg"
var image2=new Image()
image2.src="image/main1.jpg"
var image3=new Image()
image3.src="image/main2.jpg"
var image4=new Image()
image4.src="image/main3.jpg"
var image5=new Image()
image5.src="image/main4.jpg"
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
	
	
	<div id="Layer3" style="position:absolute; font-color:#fff; font-size:40px; font-family:; left: 259px; top: 19px;"Courier New", Courier, mono"; left:101px; top:6px;  width: 536px; height: 74px;><i>Student Management System</i></div>
	<div id="Layer4" style="position:absolute; width:128px; height:99px; z-index:3; left: 118px; top: 3px;"><img src="logo.jpg" width="127" height="100" />
	</div>
	<div id="Layer2" style="position:absolute; width:112px; height:102px; z-index:2; left: 1122px; top: 2px;"><img src="13.jpg" width="114" height="99" /></div>

	   
<div style="position:absolute; left:117px; top:103px; width: 1118px; height: 385px;" > 

    <header>
	 <img src="image/main.jpg" name="slide" width="1121" height="348" />
	<script>
        <!--
        //variable that will increment through the images
        var step=1
        function slideit(){
        //if browser does not support the image object, exit.
        if (!document.images)
        return
        document.images.slide.src=eval("image"+step+".src")
        if (step<5)
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
	<div id="Layer1" style="position:absolute; top:467px; left:115px; width: 903px; height: 322px;">
	  <div class="example">
    <ul id="nav">
        <li><a href="home.php">Home</a></li>
        <li><a href="all_insert.php">Settings</a>
            <ul>
                <li><a href="all_insert.php">Insert</a></li>
                
                <li><a href="modify_search.php">Modify</a>
                
                    
                </li>
                <li><a href="mail_id.php.php">Send Password</a></li>
                    
            </ul>
        </li>
        <li><a href="">Result</a>
            <ul>
                <li><a href="MyPage.php">Marks Entry</a>
                    
                </li>
                <li><a href="reg_getid.php">Result Process</a>
                    
                </li>

                


            </ul>
        </li>
        
       <li><a href="">Courses</a>
            <ul>
                <li><a href="ab.php">Insert</a>
                 
                </li>
                <li><a href="course_srcform.php">Search</a>
                  
                </li>
         </ul>
    
      </li>    
<li><a href="">Information</a>
		<ul>
                        <li><a href="dep.php">Insert</a></li>
                        <li><a href="src_infoform.php">View</a></li>
		</ul>
    
</li>
<li><a href="">Search</a>
		<ul>
                        <li><a href="grading_view.php">GradingSystem</a></li>
                        <li><a href="">View</a></li>
		</ul>
    
</li>
<li><a href="logout.php">Log Out</a></li>
</ul>
</div>
</div>

   
    <div id="Layer5" style="position:absolute; width:116px; height:1123px; z-index:4;  border: 1px none #000000; top: 2px;"><img src="hm2.jpg" width="116" height="1125" /></div>
      <div id="Layer6" style="position:absolute; width:180px; height:1129px; z-index:1; left: 1237px; top: 0px;  border: 1px none #000000;"><img src="hm2.jpg" width="178" height="1156" /></div>

<div id="Layer1" style="position:absolute; width:660px; height:181px; z-index:1; left: 205px; top:770px;font-size:20px; border: 1px none #000000; visibility: visible;">
<?php
include 'conn.php';
mysql_select_db("UniRegistration", $con);
$x = "SELECT * FROM Student_info WHERE StudId='$_POST[id]'";
$re=mysql_query($x,$con);
if (!$re)
{
echo "An error occurred ".mysql_error();
exit;
}
while ($line = mysql_fetch_array($re)) {
$d = $line["StudId"];

$sn = $line["StudName"];

$pr = $line["PrgmCode"];

$dep = $line["DeptCode"];



$fn = $line["FName"];

$mn = $line["MName"];

$ad = $line["adres"];

$se = $line["SesnCode"];

$en = $line["EnSem"];

$ac = $line["acyear"];

$cn=$line["ContNo"];

$ca = $line["CampCode"];
$ge = $line["Gender"];
$eml = $line["Email"];
}
?>
<table width="291" border="0">
	<tr>
        <td width="129"><strong>Student id:</strong></td>
        <td width="142">
	<input name="id" type="text" id="textfield1" value="<?php echo $d ?>"/>
        </td>
	</tr>

	<tr width="490">
        <td width="460"><strong>Student Name:</strong></td>
        <td width="442">
	<input name="name" type="text" id="textfield1" value="<?php echo $sn ?>"/>
        </td>
	</tr>

	<tr>
	<td><strong>Father Name:</strong></td>
        <td><input name="fname" type="text" id="textfield6" value="<?php echo $fn ?>"/>
	</td>
	</tr>
	
         <tr>
         <td><strong>Mother Name:</strong></td>
         <td><input name="mname" type="text" id="textfield4" value="<?php echo $mn ?>"/>
	  </td>
	</tr>
      <tr>
        <td width="129"><strong>Address:</strong></td>
        <td width="142">
	<input name="address" type="text" id="textfield1" value="<?php echo $ad ?>"/>
        </td>



	<tr>
	<td><strong>Program:</strong></td>
        <td><input name="pro" type="text" id="textfield6" value="<?php echo $pr ?>"/>
	</td>
       
         
	<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong>Department:</strong></td>
         <td><input name="dept" type="text" id="textfield4" value="<?php echo $dep ?>"/>
	  </td>
	

	<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong>Session:</strong></td>
        <td><input name="session" type="text" id="textfield6" value="<?php echo $se ?>"/>
	</td>
        </tr>
       
         
	<td><strong>Enrolled Semester:</strong></td>
         <td><input name="program" type="text" id="textfield4" value="<?php echo $en ?>"/>
	  </td>

	<td><strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGender:</strong></td>
         <td><input name="gen" type="text" id="textfield4" value="<?php echo $ge ?>"/>
	  </td>
	
	<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong>Campus:</strong></td>
        <td><input name="campus" type="text" id="textfield8" value="<?php echo $ca ?>"/>
	</td>
        
    </tr>

        <td><strong>Contactno:</strong></td>
        <td><input name="cno" type="text" id="textfield8" value="<?php echo $cn ?>"/>
	</td>

	<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong>AcademicYear:</strong>&nbsp&nbsp&nbsp</td>
        <td><input type="text" name="year" id="textfield5" value="<?php echo $ac ?>"/>
	</td>
	<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong>Email:</strong>&nbsp&nbsp&nbsp</td>
        <td><input type="text" name="email" id="textfield9" value="<?php echo $ac ?>"/>
	</td>
       </tr>
</table>
</div>
</body>
</html>





