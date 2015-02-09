<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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



<style type="text/css">
<!--
.style1 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-style: italic;
}
.style8 {font-family: Georgia, "Times New Roman", Times, serif}
-->

body,td,th {
	color: #990000;
}

body {
	background-color: #FFFFFF;
}
</style>

<body>
<script>
function validateFormOnSubmit(theForm) {
var reason = "";

  reason += validatePassword(theForm.password);
 if (reason != "") {
    alert("Some fields need correction:\n" + reason);
    return false;
  }

  return true;
}
function validatePassword(fld) {
    var error = "";
    var illegalChars = /[\W_]/; // allow only letters and numbers 
 
    if (fld.value == "") {
        fld.style.background = 'Yellow';
        error = "You didn't enter a password.\n";
    } else if ((fld.value.length < 5) || (fld.value.length > 10)) {
        error = "The password is the wrong length. \n";
        fld.style.background = 'Yellow';
    } else if (illegalChars.test(fld.value)) {
        error = "The password contains illegal characters.\n";
        fld.style.background = 'Yellow';
    } else if (!((fld.value.search(/(a-z)+/)) && (fld.value.search(/(0-9)+/)))) {
        error = "The password must contain at least one numeral.\n";
        fld.style.background = 'Yellow';
    } else {
        fld.style.background = 'White';
    }
   return error;
}  
</script>
<div id="Layer2" style="position:absolute;background-color:#fff; width:1435px; height:146px; z-index:1; left: -19px; top: -16px;">
	<div style="position:absolute; font-color:#fff; font-size:40px; left:328px; top:59px; font-family:serif; width: 634px; height: 53px;" ><b><i>Online Student Management System</i></b></div>

<div id="Layer4" style="position:absolute; width:173px; height:130px; z-index:3; left: 1197px; top: 12px;"><img src="13.jpg" width="173" height="127">
</div>
<div id="Layer5" style="position:absolute; width:255px; height:142px; z-index:4; left: 20px; top: 21px;"><img src="2350675-281796-.jpg" width="251" height="138"></div>
</div>
<div id="Layer3" style="position:absolute; width:848px; height:591px; z-index:3; left: 254px; top: 130px; background-color: #FFFFFF; layer-background-color: #FFFFFF; border: 1px none #000000;">
  <img src="login.jpg" width="460" height="454">
  <div id="Layer2" style="position:absolute; width:164px; height:54px; z-index:2; font-size:60px; left: 560px; top: 140px;">
<img src="new.jpg" width="260" height="154"></div>
<div id="Layer1" style="position:absolute; width:353px; height:171px; z-index:1; left: 489px; top: 294px; background-color: #fff; layer-background-color: #330033; border: 1px none #000000; visibility: visible;">

<form action="insert.php" onsubmit="return validateFormOnSubmit(this)" method="post">

<div style="position:absolute; left:3px; top:11px; font-size:30px; visibility: visible; width: 350px;"> 
	<span class="style8"><font color="#CC0000"><b><i>User name</i>:</b></font></span>	
	<input type="text" name="username"></br></br>
</div>
<div style="position:absolute; left:15px; top:60px; font-size:30px; visibility: visible;" >
 	<span class="style8"><font color="#CC0000"><b><i>Password</i>:</b></font></span><input type="password" name="password"></br></br>
</div>
<div style="position:absolute; left:152px; top:130px; font-size:50px;">         
 	<input name="submit" value="SIGN-IN" type="submit">
</div>
</form>
</div>
</div> 

</body>
</html>
