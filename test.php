<html><head>
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="bootstrap/css/datepicker.css" rel="stylesheet">
		<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
		<script type="text/javascript" src="jquery_validation/dist/jquery.validate.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap-datepicker.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap-modal.js"></script>
	</head>
<?php
require 'newmodal.php';
makemodal_btnclose('modalid1','modaltitle','modalbody');
?>
<script>
$('#modalid1').modal();
</script>