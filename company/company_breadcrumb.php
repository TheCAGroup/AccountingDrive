<?php
$company=isset($_COOKIE['ca_companyname'])?$_COOKIE['ca_companyname']:"Company Not Selected";
$period=isset($_COOKIE['ca_period'])?$_COOKIE['ca_period']:"Period Not Selected";
?>
<html><body>
<ul class="nav nav-pills">
	  <li><a href="#"><?php echo $company; ?></a></li>
	  <li><a href="#"><?php echo $period; ?></a></li>
	</ul>
	<!--test --->
</body></html>
