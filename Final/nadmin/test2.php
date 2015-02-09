<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="" />
    <meta name="keywords" content=""/>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/Aller.font.js" type="text/javascript"></script>
    <script type="text/javascript">
			Cufon.replace('ul.oe_menu div a',{hover: true});
			Cufon.replace('h1,h2,.oe_heading');
		</script>
    <style type="text/css">
			span.reference{
				position:fixed;
				left:0px;
				bottom:0px;
				background:#000;
				width:100%;
				font-size:10px;
				line-height:20px;
				text-align:right;
				height:20px;
				-moz-box-shadow:-1px 0px 10px #000;
				-webkit-box-shadow:-1px 0px 10px #000;
				box-shadow:-1px 0px 10px #000;
			}
			span.reference a{
				color:#aaa;
				text-transform:uppercase;
				text-decoration:none;
				margin-right:10px;
				
			}
			span.reference a:hover{
				color:#ddd;
			}
			.bg_img img{
				width:100%;
				position:fixed;
				top:0px;
				left:0px;
				z-index:-1;
			}
			h1{
				font-size:75px;
				text-align:right;
				position:absolute;
				right:40px;
				top:20px;
				font-weight:normal;
				/*text-shadow:  0 0 3px #0096ff, 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #0096ff, 0 0 70px #0096ff, 0 0 80px #0096ff, 0 0 100px #0096ff, 0 0 150px #0096ff;
			*/}
			h1 span{
				display:block;
				font-size:15px;
				font-weight:bold;
			}
			h2{
				position:absolute;
				top:220px;
				left:50px;
				font-size:40px;
				font-weight:normal;
				/*text-shadow:  0 0 3px #f6ff00, 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #f6ff00, 0 0 70px #f6ff00, 0 0 80px #f6ff00, 0 0 100px #f6ff00, 0 0 150px #f6ff00;
*/}
		</style>
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
body,td,th {
	color: #330000;
}
-->
</style></head>




<body>

	
		<div class="bg_img"><!--<img src="images/1" alt="" />-->
		<div>
<img src="book1.jpg" width="1460" height="800">
</div>


		
		<!--<h1>ADMIN</span></h1>-->
		
			<!--<h2>
<div style="font-size:50px;top:600px;"><b><strong>STUDENT INFORMATION SYSTEM</strong></b></div></h2>-->

		

		<div class="oe_wrapper">
			<div id="oe_overlay" class="oe_overlay"></div>
			<ul id="oe_menu" class="oe_menu">
				<li><a href="">About Us</a>
					<div>
					<ul>
							
							<li class="oe_heading">OPTIONS</li>
							
							
							
							<li><a href="pa.php">About US</a></br></li>
							<li><a href="mailform.php">Send Mail</a></br></li>
							<li><a href="logout.php">logout</a></br></li>





					</ul>
				</div>
		
					
				</li>
				<li><a href="">Insert</a>
                                    
                                
                                      
                                
					<div style="left:-111px;"><!-- -112px -->
						<ul>
							
							<li class="oe_heading">OPTIONS</li>
							
							
							
							<li><a href="ldesign.php">Info Insert</a></br></li>

							
							<li><a href="adpass.php">Password Insert</a></br></li>
						</ul>
						
					</div>
				</li>
				<li><a href="">search</a>
					
                                 
                                  
                                 <div style="left:-223px;">
					<ul class="oe_full">
							<li class="oe_heading">Options</li>
							<li><a href="led.php">Individual Search</a></br></li>
							<li><a href="sea1.php">All Search</a></li>
							<li><a href="psearch.php">Password Search</a></br></li>
					</ul>
						
					</div>
				</li>
				<li><a href="">Update</a>
					<div style="left:-335px;">
						<ul>
							<li class="oe_heading">OPTIONS</li>
							<li><a href="modify1.php">All Modify</a></li>
							<li><a href="md.php">Individual Modify</a></br></li>
							
						</ul>
						
					</div>
				</li>
				<li><a href="">Result</a>
					<div style="left:-447px;">
						<ul>
							<li class="oe_heading">Options</li>
							<li><a href="res2.php">Result Insert</a></br></li>
							<li><a href="resld.php">Result Search</a></br></li>
						</ul>	
					</div>
				</li>
			</ul>	
		</div>
        <div>
            <span class="reference">
                
            </span>
		</div>

        <!-- The JavaScript -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(function() {
				var $oe_menu		= $('#oe_menu');
				var $oe_menu_items	= $oe_menu.children('li');
				var $oe_overlay		= $('#oe_overlay');

                $oe_menu_items.bind('mouseenter',function(){
					var $this = $(this);
					$this.addClass('slided selected');
					$this.children('div').css('z-index','9999').stop(true,true).slideDown(200,function(){
						$oe_menu_items.not('.slided').children('div').hide();
						$this.removeClass('slided');
					});
				}).bind('mouseleave',function(){
					var $this = $(this);
					$this.removeClass('selected').children('div').css('z-index','1');
				});

				$oe_menu.bind('mouseenter',function(){
					var $this = $(this);
					$oe_overlay.stop(true,true).fadeTo(200, 0.6);
					$this.addClass('hovered');
				}).bind('mouseleave',function(){
					var $this = $(this);
					$this.removeClass('hovered');
					$oe_overlay.stop(true,true).fadeTo(200, 0);
					$oe_menu_items.children('div').hide();
				})
            });
        </script>
	

<div id="Layer1" style="position:absolute; width:660px; height:181px; z-index:1; left: 625px; top: 217px;font-size:30px; border: 1px none #000000; visibility: visible;"><b></b>

<?php
$subject="Test mail";
$to="$_POST[address]";
$body="$_POST[password]";
if (mail($to,$subject,$body))
	
	echo"Mail sent Successfully!";
else
echo"Mail not sent!";
?>

</div>


</body>
</html>
