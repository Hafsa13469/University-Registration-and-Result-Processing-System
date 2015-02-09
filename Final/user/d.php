<html>
<head>
<style>

div.ex1
{
float:left;
width:3px;
padding:10px;
border:1px solid gray;
margin:0px;
}
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
};
MM_reloadPage(true);
//-->
</script>
</head>
<body>

 

<?php
include 'conn.php';
mysql_select_db("UniRegistration", $con);
$x = "SELECT Starting_Date from confrm_deadline";
$re=mysql_query($x,$con);
while ($line = mysql_fetch_array($re)) {
$st = $line["Starting_Date"];
echo $new=date('d-m-Y',strtotime($st));
}
$a=strlen($new);
for($i=0;$i<$a;$i++)
{
if($new[$i] != '-')
{
?>
<div class="ex1">

<?php 
echo $new[$i];
?>

</div>
<?php
}
}
?>
<div>
<p style="position:absolute;left:18px;top:35px;">D</p>
<p style="position:absolute;left:40px;top:35px;">D</p>
<p style="position:absolute;left:66px;top:35px;">M</p>
<p style="position:absolute;left:92px;top:35px;">M</p>
<p style="position:absolute;left:118px;top:35px;">Y</p>
<p style="position:absolute;left:142px;top:35px;">Y</p>
<p style="position:absolute;left:168px;top:35px;">Y</p>
<p style="position:absolute;left:188px;top:35px;">Y</p>
</div>
</body>
</html>