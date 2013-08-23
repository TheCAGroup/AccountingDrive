<?php
include '../breadcrumb.php';
 ?>
<html>
	<head>
		<style>
			
		</style>
	</head>
	<body>
		<script type="text/javascript" src="../js/jquery.js"></script>
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
		<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
		
		
		
		<div align="center">
		<h4 align="center">Transfer of Materials</h4>
		
			<div class="my-class" align="center" style=" border: 1px #0D3349 solid; background: #EFF8FB;  width: 100%; height: 40%; overflow: auto">
				<div style="border-bottom: 1px #0D3349 dotted; width: 100%">
					Source (Consumption)
				</div>
				<div>
					<table id="mysource" class="table" >
						<thead>
							<tr style="font-size: 15px;">
								<td style="width:65%; min-width:65%;">Name of Item</td>
								<td style="width:10%; min-width:10%;">Quantity</td>
								<td style="width:10%; min-width:10%;">Rate</td>
								<td style="width:15%; min-width:15%;">Amount</td>
							</tr>
						</thead>
					</table>
				</div>
			</div><br>
			<div class="my-class" align="center" style=" border: 1px #0D3349 solid; background: #EFF8FB; width: 100%; height: 40%; overflow: auto">
				<div style="border-bottom: 1px #0D3349 dotted;">
					Destination (Production)
				</div>
				<div style="padding-top: 2%;">
					<div style="width:60%;float: left;border-bottom: 1px #0D3349 solid;">
						Name of Item
					</div>
					<div style="width:10%;float: left;border-bottom: 1px #0D3349 solid;">
						Quantity
					</div>
					<div style="width:15%;float: left;border-bottom: 1px #0D3349 solid;">
						Rate
					</div>
					<div style="width:15%;float: left;border-bottom: 1px #0D3349 solid;">
						Amount
					</div>
				</div>
			</div>
		</div>
		<script>
		createCell("mysource","name");
		createCell("mysource","rate");
		createCell("mysource","name");
		createCell("mysource","rate");
		 
			function createCell(tblname, colname)
			{
			 	var table = document.getElementById(tblname);
			 	
			 	//var rowCount = table.rows.length;
			 	
				//var cellCount = table.rows[rowCount].cells.length;
				//alert(cellCount);
				var dyndiv = document.createElement("div");
				switch(colname)
				{
				case 'name':
				  	var row=table.insertRow(-1);
					var cell = row.insertCell(-1);
					row.insertCell(-1);row.insertCell(-1);row.insertCell(-1);
					dyndiv.innerHTML="<input type= text class='form-control' style='width:100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box' />";
				  	break;
				case 'qty':
					var rowCount = table.rows.length;
					var cell = table.rows[rowCount-1].cells[1];
					dyndiv.innerHTML="<input type= text class='form-control' style='width:100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box' />";
				  //execute code block 2
				  break;
				case 'rate':
					var rowCount = table.rows.length;
					var cell = table.rows[rowCount-1].cells[2];
					var dyndiv = document.createElement("div");
					dyndiv.innerHTML="<input type= text class='form-control' style='width:100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box' />";
				  //execute code block 2
				  break;
				case 'amt':
					var rowCount = table.rows.length;
					var cell = table.rows[rowCount-1].cells[2];
					var dyndiv = document.createElement("div");
					dyndiv.innerHTML="<input type= text class='form-control' style='width:100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box' />";
				  //execute code block 2
				  break;

				default:
				  //code to be executed if n is different from case 1 and 2
				}
				
				cell.appendChild(dyndiv);

			}
		</script>
	</body>
</html>