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
	<div id="Layer1" style="position:absolute; top:467px; left:115px; width: 910px; height: 1136px;">
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




<!----***********************************************php**********************************---->
<?php
include 'conn.php';
mysql_select_db("UniRegistration",$con);
$e=$_POST['dept'];
$x = "SELECT PrgmCode,DeptCode FROM program WHERE DeptCode='$e'";
$re=mysql_query($x,$con);
if (!$re)
{
echo "An error occurred ".mysql_error();
exit;
}
while ($line = mysql_fetch_array($re)) {
$dp = $line["DeptCode"];

$pc = $line["PrgmCode"];

}
$y = "SELECT SesnCode FROM session";
$re1=mysql_query($y,$con);
if (!$re)
{
echo "An error occurred ".mysql_error();
exit;
}
while ($line = mysql_fetch_array($re1)) {

$sc = $line["SesnCode"];
}
?>

<!--<h2 style="text-align:center"><b>Student Information</b></h2><br>-->
<form name="form1" action="viewinfo.php" onsubmit="return validateFormOnSubmit(this)" method="post">
<div>
<div style="position:absolute;left:167px;top:688px;font-size:20px">
	<td>Session Code:&nbsp&nbsp&nbsp&nbsp<input name="ses" type="text" size="40" value="<?php echo $sc;?>"></td>
</div>
<div style="position:absolute;left:164px;top:727px;font-size:20px "> 
	Student id : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<input type="text" name="studid" size="40"></br></br>
</div>

<div style="position:absolute;left:163px;top:769px;font-size:20px" >
   Student Name :&nbsp&nbsp 
   <input type="text" name="studname" size="40"></br></br>
</div>
<div style="position:absolute; left:166px; top:803px; font-size:20px; width: 446px; height: 33px;" >
   Father's Name :&nbsp 
   <input type="text" name="faname" size="40"></br></br>
</div>
<div style="position:absolute; left:166px; top:848px; font-size:20px; width: 429px;" >
   Mother's Name : 
     <input type="text" name="momname" size="40"></br></br>
</div>

<div style="position:absolute;left:165px;top:886px;font-size:20px" >
   Address :&nbsp&nbsp&nbsp&nbsp  
   <input type="text" name="adres" size="80"></br></br>
</div>

<div style="position:absolute; left:584px; top:684px; font-size:20px; width: 500px;" >
   Enrolled Semester :&nbsp&nbsp&nbsp&nbsp  
   <input type="text" name="ensem" size="20" />
   </br>
   </br>
</div>



<div style="position:absolute; left:585px; top:771px; font-size:20px; width: 444px;">
	 <td>Department Code:<input name="dep" type="text" size="40" value="<?php echo $dp;?>"></td>
</div>

<div style="position:absolute; left:596px; top:724px; font-size:20px; width: 418px; height: 19px;">
 	<td>Program Code:<input name="pro" type="text" size="40" value="<?php echo $pc;?>"></td>
</div>



<div style="position:absolute; left:562px; top:982px; font-size:20px; width: 351px; height: 25px;">
	Academic year  : 
	  <input type="year" name="ac"></br> </br> 
</div>

<div style="position:absolute; left:525px; top:927px; font-size:20px; width: 249px;">
	Gender  : 
	  <input type="text" name="gender"></br> </br>
</div>
<div style="position:absolute;left:165px;top:929px;font-size:20px">
	Contact No  : 
	  <input type="text" name="num" id="num2" size="30"></br> </br>
</div>

<div style="position:absolute;left:163px;top:982px;font-size:20px">
	Campus Code  :&nbsp&nbsp&nbsp
	<input type="text" name="camp"></br> </br>
</div>

<div style="position:absolute;left:164px;top:1024px;font-size:20px">
	Email  :&nbsp&nbsp&nbsp
	<input type="text" name="email"></br> </br>
</div>







<div style="position:absolute;left:873px;top:1125px;font-size:20px">
       <input type="submit" name="submit" value="Submit"  />
 </div>	
 
</form>
<div>
</div>

	
</body>
</html>