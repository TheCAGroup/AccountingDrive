<?php
if(isset($_SESSION['ca_userid']))
	header("Location:../index.html");
else
	{
		//checking if postback
		$isPostBack = false;
		$referer = "";
		$thisPage = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		if (isset($_SERVER['HTTP_REFERER'])){
		    $referer = $_SERVER['HTTP_REFERER'];
		}
		if ($referer == $thisPage){
		    $isPostBack = true;
		} 
		//end of checking if ispostback
	}
session_start();
$message="";
if(count($_POST)>0) {
$conn = mysql_connect("localhost","root","");
mysql_select_db("phppot_examples",$conn);
$result = mysql_query("SELECT * FROM users WHERE user_name='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
$row  = mysql_fetch_array($result);
if(is_array($row)) {
$_SESSION["user_id"] = $row[user_id];
$_SESSION["user_name"] = $row[user_name];
} else {
 	echo '<script>
 	document.getElementById("res").style.display = "block";
 	</script>';
		}
}
if(isset($_SESSION["user_id"])) {
header("Location:user_dashboard.php");
}
?>
<html>
<head>
	    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
<link rel="stylesheet" type="text/css" href="../css/button.css">

</head>
<body>
	<div class="col-4">
	<div class="form-group">
	<form name="frmUser" method="post" action="">
 	 <fieldset>
    <legend>User Login</legend>
    	
    <label>Username</label>
    <input type="text" name="txt_username" id="txt_username" placeholder="User Name" class="form-control"/>
    <label>Password</label>
    <input type="password" name="txt_password" id="txt_password" placeholder="Password" class="form-control" />
  </label><br>
  <div id="res" class="alert alert-block" style="display: none">Wrong Password!<button type="button" class="close" data-dismiss="alert">&times;</button><h4>Warning!</h4>Please Check</div>
  
    <button type="submit" class="btn">Submit</button>
  </fieldset>
	</form>
	</div>
	</div><!--col-4 -->
	
	<script>

function validatelogin()
{
var username=document.getElementById('txt_username').value;
var password=document.getElementById('txt_password').value;
var q=JSON.stringify
	({
	'username':username,
	'password':password,
        });
	$.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: apiurl+'user.php/checkuser',
		dataType: "json",
		data:q,
		success: function(data){
			alert('inserted!');
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert(generalerror);
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

