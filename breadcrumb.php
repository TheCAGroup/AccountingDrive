<?php
include 'userauthenticate.php';
require_once 'newmodal.php';
//$selcompanyid=isset($_SESSION['ca_selcompanyid'])?$_SESSION['ca_selcompanyid']:"Company Not Selected";
$selcompanyname=isset($_SESSION['ca_selcompanyname'])?$_SESSION['ca_selcompanyname']:"Company Not Selected";
$period=isset($_SESSION['ca_selperiod'])?$_SESSION['ca_selperiod']:"Period Not Selected";
makemodal_alert("mymodalid", "Error", "generalerror");
?>
<html>
	<body>
		<div style="width: 100%">
			<ul class="nav nav-pills pull-left">
			  <li><a href="#"><?php echo $selcompanyname; ?></a></li>
			  <li><a href="#"><?php echo $period; ?></a></li>
			</ul>
			<ul class="nav nav-pills pull-right">
			  <li><a href="#" onclick="logout();"><?php echo $_SESSION["ca_loginusername"]." (logout)";?></a></li>
			</ul>
		</div>
<script>
	function logout()
			{
				window.location=home+'/login/userlogin.php';
			}
</script>
	<!--test --->
</body></html>
