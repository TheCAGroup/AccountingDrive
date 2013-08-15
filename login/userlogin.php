
<html>
<head>
	    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/config.js"></script>

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
  
   <div id="submit_btn_container"style="float:left" onclick="validatelogin();">
			    	<label id="btn_label">Login</label>
				</div>
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
			alert('Invalid login');
			else
			window.location=home+'/index.php';
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

