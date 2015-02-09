

<?php
$subject="Test mail";
$to="$_POST[address]";
$body="$_POST[password]";
if (mail($to,$subject,$body))
	
	echo"Mail sent Successfully!";
else
echo"Mail not sent!";
?>



