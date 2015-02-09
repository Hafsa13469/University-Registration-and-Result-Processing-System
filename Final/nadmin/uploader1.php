<?php

if(isset($_POST['ext'])){
		$location = "MyPage.php";
  		header("Location: $location");
  		exit;
}


$strFilename=$_FILES['uploadedfile1']['tmp_name'];
    $strRealname=$_FILES['uploadedfile1']['name'];
    $file_name=$strRealname;
    if(is_uploaded_file($strFilename))
    {   
        if(move_uploaded_file($strFilename,"uploads1/$strRealname"))
        {
        }
    }
?>

<html>
<body>
<form name="form1" action="uploader1.php" method="post">
	<input type="submit" name="ext" value="Return Back">
</form>
</body>
</html>