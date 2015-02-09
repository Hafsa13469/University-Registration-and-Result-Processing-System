<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<title></title>
<script language="JavaScript" type="text/JavaScript">
function validateFormOnSubmit(theForm) {
var reason = "";

  reason += validateUsername(theForm.studname);
  reason += validateFathername(theForm.faname);
  reason += validateMothername(theForm.momname);
  reason += validateEmail(theForm.email);
  reason += validatePhone(theForm.num);
  
      
  if (reason != "") {
    alert("Some fields need correction:\n\n" + reason);
    return false;
  }

  return true;
}
/*function validateEmpty(fld) {
   var error = "";
  
    if (fld.value.length == 0) {
        fld.style.background = 'Yellow'; 
        error = "The required field has not been filled in.\n"
    } else {
        fld.style.background = 'White';
    }
    return error;   
}*/
function validateUsername(fld) {
    var error = "";
    var illegalChars = /\ W/; // allow letters, numbers, and underscores
 
    if (fld.value == "") {
        fld.style.background = 'White'; 
        error = "You didn't enter a name.\n";
    } else if ((fld.value.length < 4) || (fld.value.length > 30)) {
        fld.style.background = 'White'; 
        error = "The student name is the wrong length.\n";
    } else if (illegalChars.test(fld.value)) {
        fld.style.background = 'White'; 
        error = "The student name contains illegal characters.\n";
    } else {
        fld.style.background = 'White';
    } 
    return error;
}
function validateFathername(fld) {
    var error = "";
    var illegalChars = /\ W/; // allow letters, numbers, and underscores
 
    if (fld.value == "") {
        fld.style.background = 'White'; 
        error = "You didn't enter a name.\n";
    } else if ((fld.value.length < 4) || (fld.value.length > 30)) {
        fld.style.background = 'White'; 
        error = "The  father name is the wrong length.\n";
    } else if (illegalChars.test(fld.value)) {
        fld.style.background = 'White'; 
        error = "The father name contains illegal characters.\n";
    } else {
        fld.style.background = 'White';
    } 
    return error;
}
function validateMothername(fld) {
    var error = "";
    var illegalChars = /\ W/; // allow letters, numbers, and underscores
 
    if (fld.value == "") {
        fld.style.background = 'White'; 
        error = "You didn't enter a name.\n";
    } else if ((fld.value.length < 4) || (fld.value.length > 30)) {
        fld.style.background = 'White'; 
        error = "The mother name is the wrong length.\n";
    } else if (illegalChars.test(fld.value)) {
        fld.style.background = 'White'; 
        error = "The mother name contains illegal characters.\n";
    } else {
        fld.style.background = 'White';
    } 
    return error;
}

function validatePhone(fld) {
    var error = "";
    var stripped = fld.value.replace(/[\(\)\.\-\ ]/g, '');     

   if (fld.value == "") {
        error = "You didn't enter a phone number.\n";
        fld.style.background = 'White';
    } else if (isNaN(parseInt(stripped))) {
        error = "The phone number contains illegal characters.\n";
        fld.style.background = 'White';
    } else if (!(stripped.length == 11)) {
        error = "The phone number is the wrong length. Make sure you included an area code.\n";
        fld.style.background = 'White';
    } 
    return error;
}

function trim(s)
{
  return s.replace(/^\s+|\s+$/, '');
} 

function validateEmail(fld) {
    var error="";
    var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
    
    if (fld.value == "") {
        fld.style.background = 'White';
        error = "You didn't enter an email address.\n";
    } else if (!emailFilter.test(tfld)) {              //test email for illegal characters
        fld.style.background = 'White';
        error = "Please enter a valid email address.\n";
    } else if (fld.value.match(illegalChars)) {
        fld.style.background = 'White';
        error = "The email address contains illegal characters.\n";
    } else {
        fld.style.background = 'White';
    }
    return error;
}

</script>
<style type="text/css">

body,td,th {
	color: #990000;
}
body {
	background-image: url(image/images%20(7).jpg);
	background-image: url(image/ab.jpg);
}
</style>
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
	
	<!--<div id="Layer1" style="position:absolute; background-color:#ffffff; width:1549px; height:93px; z-index:1; left: 4px; top: -21px;">-->
	<div id="Layer3" style="position:absolute; font-color:#fff; font-size:40px; font-family:; left: 259px; top: 19px;"Courier New", Courier, mono"; left:101px; top:6px;  width: 536px; height: 74px;><i>Student Management System</i></div>
	<div id="Layer4" style="position:absolute; width:128px; height:99px; z-index:3; left: 118px; top: 3px;"><img src="logo.jpg" width="127" height="100" />
	</div>
	<div id="Layer2" style="position:absolute; width:112px; height:102px; z-index:2; left: 1122px; top: 2px;"><img src="13.jpg" width="114" height="99" /></div>
<!--</div>-->
	   
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
	<div id="Layer1" style="position:absolute; top:467px; left:115px; width: 920px; height: 209px;">
	  <div class="example">
    <ul id="nav">
        <li><a href="home.php">Home</a></li>
         <li><a href="">Settings</a>
            <ul>
                <li><a href="all_insert.php">Insert</a></li>
                
                <li><a href="modify_search.php">Modify</a>
                
                    
                </li>
                
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

   
    <div id="Layer5" style="position:absolute; width:116px; height:1353px; z-index:4; border: 1px none #000000; top: 2px;"><img src="hm2.jpg" width="116" height="1628" /></div>
      <div id="Layer6" style="position:absolute; width:180px; height:1129px; z-index:1; left: 1237px; top: 0px; border: 1px none #000000;"><img src="hm2.jpg" width="178" height="1149" /></div>



<div style="position:absolute;left:201px;top:723px;">
<table align="center" cellpadding="3" bgcolor="" width="900" border="0" colspan="3">
  <tr>
  <td width="1050" height="215" bgcolor="#6cf"><h1 align="center" class="heading"><font size="5px">!!Registration Requested Student Id!!</font></h1>
  <p align="center">
<?php
$host = "localhost";
	$db = "UniRegistration";
	$dbu = "root";
	
	$con = mysql_connect ($host,$dbu, "");
	mysql_select_db ("$db",$con);
$rgs=mysql_query("select StudId,EnSem,Email FROM student_info WHERE EnSem='1'");
echo "
		<table align=\"center\" border=\"0\" width=\"30%\">
		<tr>
		<td><b>Student Id</b></td>
		<td><b>Click</b></td>
		</tr> ";
while ($rgs1 = mysql_fetch_array($rgs))
{
	
	echo "<tr><td><b>".$rgs1[0]."</b></td>
	<td><a href=\"pass_get.php?StudId=".$rgs1[0]."&Email=".$rgs1[13]."\"><b>Send Mail</b></a>
	</td></tr>";
}
?>
</p>
  </td>    
  </tr>
</table>
</div>
</body>
</html>
