<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control Panel :: Student Information Panel:: Institute of Information Technology, BZU</title>
<style type="text/css">
<!--
.heading {
	color: #F90;
	font-family: "Comic Sans MS", cursive;
}
.options {
	font-family: "Comic Sans MS", cursive;
	font-size: 16px;
	font-style: oblique;
	color: #F93;
}
-->
</style>
</head>


<br />
<br />
<br />
<div style="position:absolute;left:100px;top:300px;">
<table align="center" cellpadding="0"  width="800" border="0">
  <tr>
    <td><h1 align="center" class="heading">!! Student Management System !!</h1>
  
    <?php 
	 $g=$_REQUEST['startdate']; 
	 
	 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
	 mysql_select_db("UniRegistration",$link) or die ("Cannot select the database!");
	 $query="SELECT * FROM reg_deadline ";
		
	$resource=mysql_query($query,$link) or die ("An unexpected error occured while <b>deleting</b> the record, Please try again!");
	$result=mysql_fetch_array($resource);
	  
	 ?>
     	<form StudIdd="form1"name="form1" method="get" action="regmodify3.php">
        <table align="center" width="311" border="0">
	<!--<input type="hidden" name="gr" value="<?php echo $result[0] ?>"  />--> 
          <tr>
		 
            <td width="129"><strong>Starting Date:</strong></td></br>
            <td width="142">
           
              <input name="name" type="text" id="textfield" size="30" value="<?php echo $result[0] ?>" />
            </td>
          </tr></br>
	
          <tr>
            <td><strong>Ending Date:</strong></td>
            <td><input name="fname" type="text" id="textfield2" size="30" value="<?php echo $result[1] ?>" /></td>
          </tr>
          

	
        </table>
        <p align="center">
          <label>
            <input type="submit" name="button" id="button" value="Modify" />
          </label>
        </p>
        <p align="center"><a href="./grmodify1.php"><img  border="0" src="images/back.png" alt="Go Back" onmouseover="this.src='images/backover.png';" onmouseout="this.src='images/back.png';" /></a></p>
        
      </form>

      
  </tr>
</table>
</div>

</body>
</html>