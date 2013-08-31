<?php
include '../breadcrumb.php';
 ?>
<html>
	<head>
		<style>
			
		</style>
	</head>
	<body>
		
		
		<div class = "container">
		<div class="row show-grid">
  		<div class="col-lg-9">
		<div class="well">
		<h4 align="center">Transfer of Materials</h4>
		
			<div class="my-class" align="center" style=" border: 1px #0D3349 solid; background: #EFF8FB;  width: 100%; height: 35%; overflow: auto">
				<div style="border-bottom: 1px #0D3349 dotted; width: 100%">
					Source (Consumption)
				</div>
				<div>
					<table id="mysource" class="table" >
						<thead>
							<tr style="font-size: 14px;">
								<td style="width:65%; min-width:65%;">Name of Item</td>
								<td style="width:10%; min-width:10%;">Quantity</td>
								<td style="width:10%; min-width:10%;">Rate</td>
								<td style="width:15%; min-width:15%;">Amount</td>
							</tr>
						</thead>
					</table>
				</div>
			</div><br>
			<div class="my-class" align="center" style=" border: 1px #0D3349 solid; background: #EFF8FB; width: 100%; height: 35%; overflow: auto">
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
		</div>
		<div class="col-lg-3">

			<div class="span3 sb-fixed">
		   		<div class="well sidebar-nav">
					<ul class="nav nav-pills nav-stacked">
			 		 	<li><a href="#">Stock Journal</a></li>
			 		 	<li><a href="#">Rej In</a></li>
			 		 	<li><a href="#">Rej Out</a></li>
			 		 	<li><a href="#">Indent</a></li>
			 		 	<li><a href="#">Receipt Note</a></li>
			 		 	<li><a href="#">Physical Stock</a></li>
			 		 	<li><a href="#">Material Out</a></li>
			 		 	<li><a href="#">Material In</a></li>
					</ul>   
				</div>
			</div>

	  	</div>
		</div>
		</div>
		<script>
		createCell("mysource","name");
		 
			function createCell(tblname, colname)
			{
			 	var table = document.getElementById(tblname);
			 	
			 	//var rowCount = table.rows.length;
			 	
				//var cellCount = table.rows[rowCount].cells.length;
				//alert(cellCount);
				var dyndiv = document.createElement("div");
				var rowCount = table.rows.length;
				switch(colname)
				{
				case 'name':
				  	var row=table.insertRow(-1);
					var cell = row.insertCell(-1);
					row.insertCell(-1);row.insertCell(-1);row.insertCell(-1);
					rowid = rowCount;
					dyndivid="div_" + rowid + "1";
					dyndiv.id = dyndivid;
					dyndiv.innerHTML="<input type= text id='txt_"+ rowid +"1' class='form-control' onkeydown=\"nameKeydown('"+rowid+"','"+dyndivid+"');\" style='width:100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box' />";
				  break;
				case 'qty':
					var cell = table.rows[rowCount-1].cells[1];
					rowid= rowCount-1;
					dyndivid="div_" + rowid + "2";
					dyndiv.id = dyndivid;
					dyndiv.innerHTML="<input type= text id='txt_"+ rowid +"2' class='form-control' onkeydown=\"qtyKeydown('"+rowid+"','"+dyndivid+"');\" style='width:100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box' />";
				  break;
				case 'rate':
					var cell = table.rows[rowCount-1].cells[2];
					rowid= rowCount-1;
					dyndivid="div_" + rowid + "3";
					dyndiv.id = dyndivid;
					dyndiv.innerHTML="<input type= text id='txt_"+ rowid +"3' class='form-control' style='width:100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box' />";
				  break;
				case 'amt':
					var cell = table.rows[rowCount-1].cells[2];
					rowid= rowCount-1;
					dyndivid="div_" + rowid + "4";
					dyndiv.id = dyndivid;
					dyndiv.innerHTML="<input type= text id='txt_"+ rowid +"4' class='form-control' style='width:100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box' />";
				  break;

				default:
				  //code to be executed if n is different from case 1 and 2
				}
				
				cell.appendChild(dyndiv);

			}
			
			function nameKeydown(rowno,divid)
			{
  				var name_textboxid = "txt_" + rowno + "1";
  				var name_value = document.getElementById(name_textboxid).value;
				var qty_textboxid = "txt_"+rowno +"2"; 	
  				
  				//||(event.keyCode == 9) || (event.keyCode == 39)
  				
				if((event.keyCode == 13)||(event.keyCode == 9))//13 is enter key, 9 is tab, 
  				{
  					if (name_value!=null && name_value.trim()!="") 
  					{
  						qty_tb = document.getElementById(qty_textboxid);
	  					if (qty_tb != null)
	  					{
	  						
	  						qty_tb.focus();
	  						currentdiv = document.getElementById(divid);
	  						currentdiv.innerHTML="<label id='lbl_"+rowno+"1'>"+name_value+"</label>";
	  					}
	  					else
	  					{
	  						createCell("mysource","qty");		
							qty_tb = document.getElementById(qty_textboxid);
	  						qty_tb.focus();
	  						currentdiv = document.getElementById(divid);
	  						currentdiv.innerHTML="<label id='lbl["+rowno+"][1]'>"+name_value.trim()+"</label>";
	  					}
	  				}
  				}
  			}
  			
  			function qtyKeydown(rowno,divid)
			{
				
  			}
		</script>
	</body>
</html>