<?php include 'company_breadcrumb.php'; ?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Select Company</title>
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
				<div class="input-append">
				  <label for="selectbasic">Select Company </label>
				  	<select id="selectbasic" name="selectbasic" class="form-control" size="5">
				    </select>
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
			 		 	<li><a href="#" onclick="gotocreatecompany();">Create Company</a></li>
			 		 	<li><a href="#">Shut Company</a></li>
			 		 	<li><a href="#">Company Info</a></li>
			 		 	<li><a href="#">Features</a></li>
			 		 	<li><a href="#">Configure</a></li>
					</ul>   
				</div>
			</div>
	  	</div>
	  	</div>
	  	<!-- test yamini -->
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
								        $('#selectbasic').append($('<option/>').attr("value", option.id).text(option.name));
								    });
					//				})
					},
					error: function(jqXHR, textStatus, errorThrown){
						alert(generalerror);
					}
			});
			function setCompany()
			{
				var e = document.getElementById("selectbasic");
				var str = e.options[e.selectedIndex].text;
				document.cookie="ca_companyname =" + str;
				document.cookie="ca_companyid =" + e.value;
			}
		</script>
	</body>
</html>
