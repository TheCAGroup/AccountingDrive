<?php 
session_start();
session_unset();
session_destroy();
if(isset($_COOKIE['ca_companyname']))
{unset($_COOKIE['ca_companyname']);
setcookie($_COOKIE['ca_companyname'],"",time()-60*60*24*365);}
include '../modal.php'; 

?>
<html>
<head>
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/config.js"></script>

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">

</head>
<body>
	<div class="col-5">
	<form name="frmUser" method="post" class="form-horizontal" action="">
 	 <fieldset>
    <legend><center>User Login</center></legend>
    <div class="form-group">
    	<label class="col-lg-2">Username</label>
    	 <div class="col-lg-8">
    	<input type="text" name="txt_username" id="txt_username" placeholder="User Name" class="form-control"/>
    	</div>
    </div>
    <div class="form-group">	
    	<label class="col-lg-2">Password</label>
    	 <div class="col-lg-8">
    	<input type="password" name="txt_password" id="txt_password" placeholder="Password" class="form-control" />
  	</div>
  	</div><br>
  <div align="center">
  	<a href="#" class="btn btn-primary btn-small"  onclick="validatelogin();">Login</a>
  </div>
  </fieldset>
	</form>
	
	</div><!--col-4 -->
	
	<script>

function validatelogin()
{
var username=document.getElementById('txt_username').value;
var password=document.getElementById('txt_password').value;
var q=JSON.stringify
	({
	'name':username,
	'password':password
        });
	$.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: apiurl+'user.php/checkuser',
		dataType: "json",
		data:q,
		success: function(data){
			
			if(JSON.stringify(data) == '-1')
			{
				document.getElementById("mtitle").innerHTML="Alert";
				document.getElementById("mbody").innerHTML="Invalid Login";
				document.getElementById("mfooter").innerHTML="<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
				$('#myModal').modal();
			}
			else
			window.location=home+'/index.php';
		},
		error: function(jqXHR, textStatus, errorThrown){
			document.getElementById("mtitle").innerHTML="Error";
			document.getElementById("mbody").innerHTML=generalerror;
			document.getElementById("mfooter").innerHTML="<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
			$('#myModal').modal();
		}
	});
}

function formCancel()
{
	$("#maindiv").load("entrypage.php");
}
</script>

</body>
</html>

