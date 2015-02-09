<?php
//if (isset($_POST['submit']))
	
		$host = "localhost";
		$db = "UniRegistration";
		$dbu = "root";
	
		$con = mysql_connect ($host,$dbu, "");
		mysql_select_db ("$db",$con);
		$dd=$_REQUEST['StudId'];
		$sem=$_REQUEST['EnSem'];
		$m1=mysql_query("SELECT distinct StudId,EnSem FROM record_gpa WHERE StudId='$dd' AND EnSem='$sem' ");
	
		$dl = mysql_fetch_array($m1);
		$s1 = $dl['StudId'];
		$s2 = $dl['EnSem'];
		if(($s1==$dd) && ($s2==$sem))
		{
			?>
			<div style="position:absolute; top:350px; left:400px;">

			<b><font size="5px">Result Already Processed!!</font></b>
			</div>
			<?php
		}
		else
		{
		$h.= "<tr>";
			$h.="<th bgcolor=\"#9CF\">"; $h.="<b>CourseCode</b>"; $h.="</th>"; 
			$h.= "<th bgcolor=\"#9CF\">"; $h.="<b>CreditHour</b>"; $h.="</th>";
			$h.= "<th bgcolor=\"#9CF\">"; $h.="<b>Marks</b>";      $h.="</th>";
			$h.= "<th bgcolor=\"#9CF\">"; $h.="<b>Grade</b>";      $h.="</th>";
			$h.= "<th bgcolor=\"#9CF\">"; $h.="<b>Point</b>"; $h.="</th>";
			$h.= "<th bgcolor=\"#9CF\">"; $h.="<b>GradePoint</b>"; $h.="</th>";
		$h.="</tr>";
		$total='0';
		$total1='0';
		$total2='0';
		$j=0;
		$i=0;
		$k=0;
		$res=mysql_query("SELECT course.CrsCode,course.CrsTitle,course.CrdHour,studentmarks.marks,studentmarks.StudId,studentmarks.CrsCode,studentmarks.EnSem FROM course,studentmarks WHERE studentmarks.StudId='$dd' && studentmarks.EnSem='$sem' && studentmarks.CrsCode=course.CrsCode "); 
		while ($line = mysql_fetch_array($res))
		{
		$ccd = $line["CrsCode"];
		$ct = $line["CrsTitle"];
		$ch = $line["CrdHour"];
		$mr = $line["marks"];
        $d = $line["StudId"];
		$en = $line["EnSem"];
		$total=$total+$ch;
		
		$n=mysql_query("SELECT Ulimit,Llimit,Grade,GrPoint FROM GradingSystem ");
	
		while ($line1 = mysql_fetch_array($n)) {
 
		$u = $line1["Ulimit"];
		$l = $line1["Llimit"];
	
		$gd = $line1["Grade"];
		$gp = $line1["GrPoint"];
		$c=0;

		if($mr>=$l && $mr<=$u)
		{
			$a=$gd;
			$b=$gp;
			
			$c=$ch*$gp;
			$f5array[$k]=$c;
		$k++;
			$total1=$total1+$c;
			$total2=$total1/$total;
			
			$h.="<tr>";
			$h.="<td bgcolor=\"#9CF\" align=\"center\">"; $h.="<b>$ccd</b>"; $h.="</td>";
			$h.="<td bgcolor=\"#9CF\" align=\"center\">"; $h.="<b>$ch</b>"; $h.="</td>";
			$h.="<td bgcolor=\"#9CF\" align=\"center\">"; $h.="<b>$mr</b>"; $h.="</td>";
			$h.="<td bgcolor=\"#9CF\" align=\"center\">"; $h.="<b>$a</b>"; $h.="</td>";
			$h.="<td bgcolor=\"#9CF\" align=\"center\">"; $h.="<b>$b</b>"; $h.="</td>";
			$h.="<td bgcolor=\"#9CF\" align=\"center\">"; $h.="<b>$c</b>"; $h.="</td>";
			$h.="</tr>";
			
		
		}
		
		}
		
$f3array[$j]=$a;
$f4array[$j]=$b;
$j++;
$farray[$i]=$d;
$f1array[$i]=$ccd;
$f2array[$i]=$ch;
$i++;	
}
}

?>
<html>
<body>


<div id="Layer2" style="position:absolute; z-index:1; font-size:18px; width:1200px;height:800px; left: 100px; top:420px; border: 1px none #000000; visibility: visible;">
<form name="form2" method="post" action="marks_cal.php">
<div style="position:absolute; z-index:1; font-size:18px; width:300px;height:100px; left: 120px; top:20px;">
<b><i>Student Id</i>:</b><input type="text" name="stid" value="<?php echo $d;?>"/>
</div>
<br/>
<br/>
<br/>
<table  border="1" align="center" width="80%" height="87" border="0" align="center" cellpadding="0" cellspacing="0">
<?php echo $h;?>
</table>


<input type='hidden' name='id' value="<?php echo htmlentities(serialize($farray)); ?>" />
<input type='hidden' name='crcd' value="<?php echo htmlentities(serialize($f1array)); ?>" />
<input type='hidden' name='crh' value="<?php echo htmlentities(serialize($f2array)); ?>" />
<input type='hidden' name='grade' value="<?php echo htmlentities(serialize($f3array)); ?>" />
<input type='hidden' name='point' value="<?php echo htmlentities(serialize($f4array)); ?>" />
<input type='hidden' name='gpoint' value="<?php echo htmlentities(serialize($f5array)); ?>" />
<input type='hidden' name='sem' value="<?php echo $en; ?>" />

<!--**************gpa calculate***********-->
<input type='hidden' name='tcredit' value="<?php echo $total; ?>" />
<input type='hidden' name='qpoint' value="<?php echo $total1; ?>" />
<input type='hidden' name='stid' value="<?php echo $d; ?>" />
<input type='hidden' name='gpa' value="<?php echo $total2; ?>" />

<div style="position:absolute; z-index:1; font-size:18px; width:300px;height:100px; left: 944px; top:620px;">

<td><b>Total Credit Hours:</b><input name="avail" type="text" size="10" value="<?php echo $total;?>"></td>
</div>
<div style="position:absolute; z-index:1; font-size:18px; width:300px;height:50px; left: 220px; top:620px;">
<td><b>Total Quality Point:</b><input name="avail1" type="text" size="10" value="<?php echo $total1;?>"></td>
</div>
<div style="position:absolute; z-index:1; font-size:18px; width:300px;height:100px; left: 220px; top:655px;">
<td><b>Grade Point Average:</b><input name="avail2" type="text" size="10" value="<?php echo $total2;?>"></td>
</td>
</div>
<input type="submit" name="submit" value="submit">
</form>
</div>
</body>
</html>