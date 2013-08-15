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
				<div class="form-group">
				  <div class="col-lg-2"  onclick="setCompany();">
				  	Select
				    <!--button id="btnselect" name="btnselect" class="btn btn-info"">Select</button-->
				  </div>
				  
				  <div class="col-lg-2" onclick="local_gotodisplaycompany();">
				    <!--button id="btninfo" name="btninfo" class="btn btn-info" onclick="local_gotodisplaycompany();">Info</button-->
				    Info
				  </div>
				  
				  <div class="col-lg-2" onclick="local_gotoupdatecompany();">
				    <!--button id="btnedit" name="btnedit" class="btn btn-info" onclick="local_gotoupdatecompany();">Edit</button-->
				    Edit
				  </div>
				  
				  <div class="col-lg-2"  onclick="local_gotodeletecompany();">
				  	Delete
				    <!--button id="btndelete" name="btndelete" class="btn btn-info" onclick="setCompany();">Delete</button-->
				  </div>
				  <!------------------------------------------->
				 
<div class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Modal header</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn">Close</a>
    <a href="#" class="btn btn-primary">Save changes</a>
  </div>
</div>
				  <!------------------------------------------->
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
			function local_gotoupdatecompany()
			{
				var selcomp=document.getElementById("selectbasic").value;
				gotoupdatecompany(selcomp);
			}
			function local_gotodeletecompany()
			{
				var selcomp=document.getElementById("selectbasic").value;
				gotodeletecompany(selcomp);
			}
			function local_gotodisplaycompany()
			{
				var selcomp=document.getElementById("selectbasic").value;
				gotodisplaycompany(selcomp);
			}
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
