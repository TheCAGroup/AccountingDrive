<?php
//include '../breadcrumb.php';
 ?>
<html>
	<head>
		<style>
			
		</style>
	</head>
	<body>
		
		
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
		<script type="text/javascript" src="js/config.js"></script>
		<div class="container">
		<div class="row show-grid">
  		<div class="col-lg-9">
		<div class="well">
		<h4 align="center">Transfer of Materials</h4>
		
			<div class="my-class" align="center" style=" border: 1px #0D3349 solid; background: #EFF8FB;  width: 100%; height: 35%; overflow: auto">
				<div style="border-bottom: 1px #0D3349 dotted; width: 100%">
					<b>Source (Consumption)</b>
				</div>
				<div>
					<table id="mysource" class="table" style="border: 0px">
						<thead>
							<tr style="font-size: 0.875em;border: 0px">
								<td style="width:65%; min-width:55%;"><b>Name of Item</b></td>
								<td style="width:10%; min-width:10%;"><b>Qty</b></td>
								<td style="width:10%; min-width:10%;"><b>Units</b></td>
								<td style="width:10%; min-width:10%;"><b>Rate</b></td>
								<td style="width:15%; min-width:15%;"><b>Amount</b></td>
							</tr>
						</thead>
					</table>
				</div>
			</div><br>
			<div class="my-class" align="center" style=" border: 1px #0D3349 solid; background: #EFF8FB; width: 100%; height: 35%; overflow: auto">
				<div style="border-bottom: 1px #0D3349 dotted;">
					Destination (Production)
				</div>
				<div>
					<table id="mydest" class="table" style="border: 0px">
						<thead>
							<tr style="font-size: 0.875em;border: 0px">
								<td style="width:65%; min-width:55%;"><b>Name of Item</b></td>
								<td style="width:10%; min-width:10%;"><b>Qty</b></td>
								<td style="width:10%; min-width:10%;"><b>Units</b></td>
								<td style="width:10%; min-width:10%;"><b>Rate</b></td>
								<td style="width:15%; min-width:15%;"><b>Amount</b></td>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
		</div>
		<div class="col-lg-3">

			<!--div class="span3 sb-fixed"-->
		   		<div class="well">
		   			<div id="divlist" style="height: 80%;overflow: auto"> 
		   				
		   			
					<!--ul class="nav nav-pills nav-stacked">
			 		 	<li><a href="#">Stock Journal</a></li>
			 		 	<li><a href="#">Rej In</a></li>
			 		 	<li><a href="#">Rej Out</a></li>
			 		 	<li><a href="#">Indent</a></li>
			 		 	<li><a href="#">Receipt Note</a></li>
			 		 	<li><a href="#">Physical Stock</a></li>
			 		 	<li><a href="#">Material Out</a></li>
			 		 	<li><a href="#">Material In</a></li>
					</ul-->
					</div>   
				<!--/div-->
			</div>

	  	</div>
	  	
		</div>
		
	</div>
	<script type="text/javascript" src="test.js"></script>
		<script>
			function loadcompany()
			{
				var res;
				$.ajax({
						type: 'GET',
						contentType: 'application/json',
						async: false,
						url: apiurl+'company.php/companylist',
						dataType: "json",
						success: function(data){
							res = data;
						},
						error: function(jqXHR, textStatus, errorThrown){
						}
				});
				return res;
			}
			
			var data=loadcompany();
			makeconfobject("Name of Item",50,"list",data,"divlist","","",false);//Company Name
			makeconfobject("Qty",4,"number","","","Amount=Qty*Rate","Qty=Amount/Rate",true);//Quantity
			makeconfobject("Units",4,"list",data,"divlist","","",true);//Units
			makeconfobject("Rate",4,"list",data,"divlist","Amount=Qty*Rate","Rate=Amount/Qty",true);//Rate
			makeconfobject("Amount",4,"list",data,"divlist","Rate=Amount/Qty","Qty=Amount/Rate",false);//Amount
			//starthere(confarray);
			var list=loadcompany();
			starthere(list);
		</script>
		
	</body>
</html>