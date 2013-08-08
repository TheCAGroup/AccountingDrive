<?php include 'company_breadcrumb.php'; ?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Stock Category</title>
		
		<script src="config.js"></script>
		
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" type="text/css" href="xbootstrap/css/bootstrap.css">
		<script src="xbootstrap/js/jquery.js"></script>
		<script src="xbootstrap/js/bootstrap.js"></script>
		
		<meta name="author" content="Yamini Bala" />
		<!-- Date: 2013-08-02 -->
	</head>
	<body>
		<div class="container">
		<div class="row show-grid">
  		<div class="col-lg-8">
			<div class="well">
			<form class="form-horizontal" method="post" action="#">
				<fieldset>
				
				<!-- Form Name -->
				<legend>Select Company</legend>
				<!-- Select Basic -->
				<div class="control-group">
				  <label class="control-label" for="selectbasic">Select Company</label>
				  <div class="controls">
				  	<select id="selectbasic" name="selectbasic" class="input-large">
				    </select>
				  </div>
				</div>
				<br>
				<!-- Button -->
				<div class="control-group">
				  <div class="controls">
				    <button id="btnsubmit" name="btnsubmit" class="btn btn-info" onclick="setCompany();">Submit</button>
				  </div>
				</div>
				
				</fieldset>
			</form>
		</div>
		</div>
	 	<div class="col-lg-4">
			<div class="span3 sb-fixed">
		   		<div class="well sidebar-nav">
					<ul class="nav nav-pills nav-stacked">
			 		 	<li><a href="#">Create Company</a></li>
			 		 	<li><a href="#">Shut Company</a></li>
			 		 	<li><a href="#">Company Info</a></li>
			 		 	<li><a href="#">Features</a></li>
			 		 	<li><a href="#">Configure</a></li>
					</ul>   
				</div>
			</div>
	  	</div>
	  	</div>
		<script>
			
			$.ajax({
					type: 'GET',
					contentType: 'application/json',
					url: apiurl+'company.php/companylist',
					dataType: "json",
					success: function(data){
						//alert(data.d);
						//$(function() {
								    
								    $.each(data, function(i, option) {
								        $('#selectbasic').append($('<option/>').attr("value", option.name).text(option.name));
								    });
					//				})
					},
					error: function(jqXHR, textStatus, errorThrown){
						alert(generalerror);
					}
			});
			function setCompany()
			{
				document.cookie="companyname =" + document.getElementById('selectbasic').value;
			}
		</script>
	</body>
</html>
