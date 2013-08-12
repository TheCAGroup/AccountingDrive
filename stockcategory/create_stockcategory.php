<?php 
	include '../company/company_breadcrumb.php'; 
?>
<html>
<head>
<meta charset="utf-8"> 
</head>
<body>
	
<form id="addcompany" class="form-horizontal" method="post"><!--action="trycompanyinsert.php" -->
 <fieldset>
<div class = "container">
	<div class="row show-grid">
  		<div class="col-lg-8">
			<div class="well">

		<!-- Form Name -->
		<legend>Stock Categories</legend>

  			
		<div class="form-group">
    <label for="txtname" class="col-lg-2 control-label">Name</label>
    <div class="col-lg-4">
      <input type="text" class="form-control" id="txtname" placeholder="Name">
    </div>
  </div>
  
  <div class="form-group">
    <label for="txtalias" class="col-lg-2 control-label">Alias</label>
    <div class="col-lg-4">
      <input type="text" class="form-control" id="txtalias" placeholder="Alias">
    </div>
  </div>
  
		
		<div style="width:50%; height:100px; padding-left: 5%;">
			<!--Submit Button-->
			<div id="submit_btn_container"style="float:left" onclick="addstockcategory();">
			    <label id="btn_label">Accept</label>
			</div>
			
			<!--Cancel Button-->
			<div id="cancel_btn_container" style="float:right" onclick="formCancel();">
			    <label id="btn_label_cancel">Cancel</label>
			</div>	
			</div>
		</div>
		</div>
	 	<div class="col-lg-4">

			<div class="span3 sb-fixed">
		   		<div class="well sidebar-nav">
					<ul class="nav nav-pills nav-stacked">
			 		 	<li><a href="#">Select Stock Catergory</a></li>
			 		 	<li><a href="#">Delete Stock Category</a></li>
			 		 	<li><a href="#">Stock Category Info</a></li>
			 		 	<li><a href="#">Features</a></li>
			 		 	<li><a href="#">Configure</a></li>
					</ul>   
				</div>
			</div>

	  	</div>
	</div><!--/row-->	
	<!--/div--> <!--/Well-->
	</div>
	</fieldset>
	</form>
<!--/div---> <!--/Container-->



<script>

function addstockcategory()
{
var name=document.getElementById('txtname').value;
var alias=document.getElementById('txtalias').value;
var createdby=1;
var modifiedby=1;
var q=JSON.stringify
	({
	'name':name,
	'alias':alias,
	'createdby':createdby,
	'modifiedby':modifiedby
        });
		//alert(q);
	$.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: 'http://localhost/ca/api/stock.php/addstock',
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
