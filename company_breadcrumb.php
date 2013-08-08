<?php
$company=isset($_COOKIE['companyname'])?$_COOKIE['companyname']:"Company Not Selected";
$period=isset($_COOKIE['period'])?$_COOKIE['period']:"Period Not Selected";
?>
<html><body>
<ul class="nav nav-pills">
	  <li><a href="#"><?php echo $company; ?></a></li>
	  <li><a href="#"><?php echo $period; ?></a></li>
	</ul>
</body></html>
