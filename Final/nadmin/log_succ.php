<?php
//session_start();
if(!session_is_registered(username))
{
include 'index.php';
}
else{
include 'home.php';
}

?>