
<html>
	<head>
		<style>
		
			.tab_col_50
			{
				width:50%;
				min-width:50%;
			}
			.tab_col_15
			{
				width:15%;
				min-width:15%;
			}
			.tab_col_10
			{
				width:10%;
				min-width:10%;
			}
			.tab_col_7
			{
				width:7%;
				min-width:7%;
			}
			.tab_col_5{
				width:5%;
				min-width:5%;
			}
			.tab_col_3{
				width:3%;
				min-width:3%;
			}
		</style>
	</head>
	<body>
		
		
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap-modal.js"></script>
		<script type="text/javascript" src="js/config.js"></script>
		<?php
/*include 'breadcrumb.php';
makemodal_confirm("modalacceptchange","Accept","");
echo $callbackvalue;*/
?>
		<div class="container">
		<div class="row show-grid">
  		<div class="col-lg-10">
		<div class="well">
		<h4 align="center">Transfer of Materials</h4>
		
		<!--div class="my-class" style=" border: 1px #0D3349 solid; background: #EFF8FB;  width: 100%; height: 35%;">
			<table width="100%" height="100%" border="1">
				<tr>
					<td height="5%" colspan="7"><center><b>Source(Consumption)</b></center></td>
				</tr>
				
				<tr style="font-size: 0.875em;border: 0px;">
					<td height="5%" style="border-bottom: 1px #0D3349 dotted;" class="tab_col_5"></td>
					<td height="5%" style="border-bottom: 1px #0D3349 dotted;" class="tab_col_50"><b>Name of Item</b></td>
					<td height="5%" style="border-bottom: 1px #0D3349 dotted;" class="tab_col_7"><b>Qty</b></td>
					<td height="5%" style="border-bottom: 1px #0D3349 dotted;" class="tab_col_10"><b>Units</b></td>
					<td height="5%" style="border-bottom: 1px #0D3349 dotted;" class="tab_col_7"><b>Rate</b></td>
					<td height="5%" style="border-bottom: 1px #0D3349 dotted;" class="tab_col_10"><b>Amount</b></td>
					<td height="5%" style="border-bottom: 1px #0D3349 dotted;" class="tab_col_10"></td>
				</tr>
				
				<tr>
					<td height="70%" colspan="7">
					<div style="overflow: auto;height:'70%'">
						<table id="mysource" class="table" style="border: 0px">
							
						</table>
					</div>
					</td>
				</tr>
				
				<tr>
					<td height="10%"><a href="#" onclick="addRow('mysource')" class="btn btn-default-sm"> + Add Row</a></td>
					<td height="10%"><a href="#" onclick="deleteSelectedRows('mysource')" class="btn btn-default-sm"> X Delete Rows</a></td>
					<td height="10%"></td>
					<td height="10%"></td>
					<td height="10%"></td>
					<td height="10%"></td>
					<td height="10%"><a href="#" onclick="endList('mysource')" class="btn btn-default-sm"> End List</a></td>	
					
				</tr>
			</table>
		</div-->
		
		
		<div class="my-class" style=" border: 1px #0D3349 solid; background: #EFF8FB;  width: 100%; height: 35%;">
			
			<div style="width: 100%;float:left; height:20%">
				<b><center>Source (Consumption)</center></b>
				<table style="width:100%;">
					<thead>
						<tr style="font-size: 0.875em;border: 0px">
							<td style="border-bottom: 1px #0D3349 dotted;" class="tab_col_5"></td>
							<td style="border-bottom: 1px #0D3349 dotted;" class="tab_col_50"><b>Name of Item</b></td>
							<td style="border-bottom: 1px #0D3349 dotted;" class="tab_col_7"><b>Qty</b></td>
							<td style="border-bottom: 1px #0D3349 dotted;" class="tab_col_10"><b>Units</b></td>
							<td style="border-bottom: 1px #0D3349 dotted;" class="tab_col_7"><b>Rate</b></td>
							<td style="border-bottom: 1px #0D3349 dotted;" class="tab_col_10"><b>Amount</b></td>
							<td style="border-bottom: 1px #0D3349 dotted;" class="tab_col_10"></td>
						</tr>
					</thead>
				</table>
			</div>
			
			<div style="overflow: auto;float:left;height:60%; width:100%; margin-top: 10px;">
				<table id="mysource" class="table" style="border: 0px">
					
				</table>
			</div>
			
			<div style="height:20%;float:left; margin-bottom: 5px; width:100%;">
                            <table style="width:100%;">
                                <thead>
                                    <tr style="font-size: 0.875em;border: 0px">
                                        <td class="tab_col_5"></td>
                                        <td align="center" class="tab_col_50">
                                            <table style="width:70%">
                                                <tr>
                                                    <td><a href="#" onclick="addRow('mysource')" class="btn btn-primary btn-sm"> + Add Row</a></td>
                                                    <td><a href="#" onclick="deleteSelectedRows('mysource')" class="btn btn-primary btn-sm"> X Delete Rows</a></td>
                                                    <td><a href="#" onclick="endListAndDisplayTotal('mysource')" class="btn btn-primary btn-sm"> End List</a></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td align="center" class="tab_col_7">
                                            <span id="mysourcefinal_qty" class="badge badge-info">0</span>
                                        </td>
                                        <td class="tab_col_10"></td>
                                        <td class="tab_col_7"></td>
                                        <td align="center" class="tab_col_10">
                                            <span id="mysourcefinal_amt" class="badge badge-info">0.00</span>
                                        </td>
                                        <td class="tab_col_10"></td>
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
		<div class="col-lg-2">

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
	<!--script type="text/javascript" src="test.js"></script-->
		<script>
		
			var temp_txt_name;
			var temp_txt_qty;
			var temp_txt_units;
			var temp_txt_rate;
			var temp_txt_amt;
                        
                        var current_rowID;
			var edit_flag = false;
                        //alert("hi");
                        
			addRow("mysource");
			
			function addRow(tableID) {
                                console.log(tableID);
				var table = document.getElementById(tableID);
				var rowCount = table.rows.length;
				
				
				//alert(rowCount);	
				if (rowCount>0)
				{
					if(document.getElementsByName(tableID +"name")[rowCount-1].value!==undefined)
					{
						if((document.getElementsByName(tableID +"name")[rowCount-1].value!=="") && (document.getElementsByName(tableID +"amt")[rowCount-1].value!==""))
						{ 
							tbToLbl(tableID,rowCount,"new");
						}
						else
						{
							alert("Please Fill the current row");
							return;
						}
					}
				}
				
				var row = table.insertRow(rowCount);
	
				var cell1 = row.insertCell(0);
				cell1.className="tab_col_5";
				var element1 = document.createElement("input");
				element1.type = "checkbox";
				element1.name=tableID +"chkbox[]";
				element1.className="form-control";
				cell1.appendChild(element1);
	
				var cell2 = row.insertCell(1);
				cell2.className="tab_col_50";
				var element2 = document.createElement("input");
				element2.type = "text";
				element2.name=tableID +"name";
				element2.className="form-control";
				cell2.appendChild(element2);
	
				var cell3 = row.insertCell(2);
				cell3.className="tab_col_7";
				var element3 = document.createElement("input");
				element3.type = "text";
				element3.name = tableID +"qty";
                                //element3.setAttribute('onkeydown','isNumberKey(event)');
				element3.className="form-control";
				cell3.appendChild(element3);
				
				var cell4 = row.insertCell(3);
				cell4.className="tab_col_10";
				var element4 = document.createElement("input");
				element4.type = "text";
				element4.name = tableID +"units";
				element4.className="form-control";
				cell4.appendChild(element4);
	
				var cell5 = row.insertCell(4);
				cell5.className="tab_col_7";
				var element5 = document.createElement("input");
				element5.type = "text";
				element5.name = tableID +"rate";
				element5.className="form-control";
				cell5.appendChild(element5);	
			
				var cell6 = row.insertCell(5);
				cell6.className="tab_col_10";
				var element6 = document.createElement("input");
				element6.type = "text";
				element6.name = tableID +"amt";
				element6.className="form-control";
				cell6.appendChild(element6);
				
				var cell7 = row.insertCell(6);
				cell7.className="tab_col_10";
                                
                                edit_flag = true;
                           	window.current_rowID = rowCount + 1;

			}
                        
                        function calcTotal(tableID)
                        {
                            var final_qty=0;
                            var final_amt=0;
                            
                            var qty = document.getElementsByName(tableID +"qty");
                            var amt = document.getElementsByName(tableID +"amt");
                            
                            //alert(qty.length);
                            //alert(amt.length);
                            
                            for(var i=0 ; i<qty.length ; i++)
                            {
                                if(qty[i].innerText!=="")
                                final_qty = final_qty + parseInt(qty[i].innerText);
                            }
                            
                            for(var i=0 ; i<amt.length ; i++)
                            {
                                if(amt[i].innerText!=="")
                                final_amt = final_amt + parseFloat(amt[i].innerText);
                            }
                            
                            document.getElementById(tableID +"final_qty").innerText = final_qty;
                            document.getElementById(tableID +"final_amt").innerText = final_amt;
                            
                        }
			
			function endList(tableID,rowID)
			{
                            //alert("inside endlist");
				//var table = document.getElementById(tableID);
				//var rowCount = table.rows.length;
				if(document.getElementsByName(tableID+"name")[rowID-1].value !== undefined)
                                {
                                    //alert("inside if 1");
                                    if ((document.getElementsByName(tableID +"name")[rowID-1].value!=="") && (document.getElementsByName(tableID +"amt")[rowID-1].value!==""))
                                    {
                                        //  alert("inside if 2");
                                            tbToLbl(tableID,rowID,"new");
                                    }
                                    else
                                    {
                              //            alert("inside else");
                                            deleteRow(tableID,rowID);
                                    }
                                    window.current_rowID = "";
                                    window.edit_flag = false;
                                }
                        }
                        
                        function endListAndDisplayTotal(tableID)
                        {
                            //alert("edit flag ---- "+window.edit_flag);
                            //alert("edit rowID ---- "+window.current_rowID);
                            if (edit_flag ===true)
                                endList(tableID,window.current_rowID);
                            calcTotal(tableID);
                        }
			
			function tbToLbl(tableID,rowID,action)
			{
                            alert("inside tbtolbl fn");
				var table = document.getElementById(tableID);
				
				var txt_name = document.getElementsByName(tableID +'name')[rowID-1].value;
				var txt_qty = document.getElementsByName(tableID +'qty')[rowID-1].value;
				var txt_units = document.getElementsByName(tableID +'units')[rowID-1].value;
				var txt_rate = document.getElementsByName(tableID +'rate')[rowID-1].value;
				var txt_amt = document.getElementsByName(tableID +'amt')[rowID-1].value;
				alert(txt_name);
                        
                                //if ((isNaN(txt_qty) === false) && (isNaN(txt_rate) === false) && (isNaN(txt_amt) === false))
				//{
                                    if ((action === "new") || (action === "edit"))
                                    {
                                            table.rows[rowID-1].cells[1].innerHTML="<label name='"+tableID+"name'><font size=2>"+txt_name+"</font></label>";
                                            table.rows[rowID-1].cells[2].innerHTML="<label name='"+tableID+"qty'><font size=2>"+txt_qty+"</font></label>";
                                            table.rows[rowID-1].cells[3].innerHTML="<label name='"+tableID+"units'><font size=2>"+txt_units+"</font></label>";
                                            table.rows[rowID-1].cells[4].innerHTML="<label name='"+tableID+"rate'><font size=2>"+txt_rate+"</font></label>";
                                            table.rows[rowID-1].cells[5].innerHTML="<label name='"+tableID+"amt'><font size=2>"+txt_amt+"</font></label>";
                                            table.rows[rowID-1].cells[6].innerHTML="<input type='image' src='img/edit.png' height='20px' width='20px' onclick='editRow(\""+tableID+"\",\""+rowID+"\")' alt='Edit' title='Edit Row'>";
                                            window.edit_flag = false;
                                            window.current_rowID = "";
                                            calcTotal(tableID);
                                    }
                                    else if(action === "cancel")
                                    {
                                            table.rows[rowID-1].cells[1].innerHTML="<label name='"+tableID+"name'><font size=2>"+temp_txt_name+"</font></label>";
                                            table.rows[rowID-1].cells[2].innerHTML="<label name='"+tableID+"qty'><font size=2>"+temp_txt_qty+"</font></label>";
                                            table.rows[rowID-1].cells[3].innerHTML="<label name='"+tableID+"units'><font size=2>"+temp_txt_units+"</font></label>";
                                            table.rows[rowID-1].cells[4].innerHTML="<label name='"+tableID+"rate'><font size=2>"+temp_txt_rate+"</font></label>";
                                            table.rows[rowID-1].cells[5].innerHTML="<label name='"+tableID+"amt'><font size=2>"+temp_txt_amt+"</font></label>";
                                            table.rows[rowID-1].cells[6].innerHTML="<input type='image' src='img/edit.png' height='20px' width='20px' onclick='editRow(\""+tableID+"\",\""+rowID+"\")' alt='Edit' title='Edit Row'>";
                                            window.edit_flag = false;
                                            window.current_rowID = "";
                                    }
                                    else
                                    {
                                            alert("invalid option");
                                    }   
                                //}
                                /*
                                else
                                {
                                    alert("Please enter a numeric value");
                                }*/
			}
			
			function lblToTb(tableID,rowID)
			{
				//alert(tableID);
				var table = document.getElementById(tableID);
				
				var txt_name = document.getElementsByName(tableID+'name')[rowID-1].innerText;
				var txt_qty = document.getElementsByName(tableID+'qty')[rowID-1].innerText;
				var txt_units = document.getElementsByName(tableID+'units')[rowID-1].innerText;
				var txt_rate = document.getElementsByName(tableID+'rate')[rowID-1].innerText;
				var txt_amt = document.getElementsByName(tableID+'amt')[rowID-1].innerText;
				//alert(txt_name);
				table.rows[rowID-1].cells[1].innerHTML="<input type='text' name='"+tableID+"name' class='form-control' value='"+txt_name+"'/>";
				table.rows[rowID-1].cells[2].innerHTML="<input type='text' name='"+tableID+"qty' onkeypress='return validate(event,this,\"int\");' class='form-control' value='"+txt_qty+"'/>";
				table.rows[rowID-1].cells[3].innerHTML="<input type='text' name='"+tableID+"units' class='form-control' value='"+txt_units+"'/>";
				table.rows[rowID-1].cells[4].innerHTML="<input type='text' name='"+tableID+"rate' onkeypress='return validate(event,this,\"dec\");' class='form-control' value='"+txt_rate+"'/>";
				table.rows[rowID-1].cells[5].innerHTML="<input type='text' name='"+tableID+"amt' onkeypress='return validate(event,this,\"dec\");' class='form-control' value='"+txt_amt+"'/>";
				table.rows[rowID-1].cells[6].innerHTML="<input type='image' src='img/tick.png' height='20px' width='20px' onclick='doneEdit(\""+tableID+"\",\""+rowID+"\")' alt='Done Editing' title='Done Editing'>&nbsp<input type='image' src='img/cross.png' height='20px' width='20px' onclick='cancelEdit(\""+tableID+"\",\""+rowID+"\")' alt='Cancel Editing' title='Cancel Editing'>";
                                window.edit_flag = true;
                                window.current_rowID = rowID;
                        }
                        
                        function doneEdit(tableID,rowID)
                        {
                            window.edit_flag = false;
                            tbToLbl(tableID,rowID,"edit");
                        }
                        
                        function cancelEdit(tableID,rowID)
                        {
                            window.edit_flag = false;
                            tbToLbl(tableID,rowID,"cancel");
                        }
			
			function editRow(tableID,rowID)
			{
                                alert("edit rowid : "+window.current_rowID);
                                alert("edit flag : "+window.edit_flag);
        
                                var table = document.getElementById(tableID);
                                var rowCount = table.rows.length;
                                
                                alert("row count : "+rowCount);
                                alert("row id : "+rowID);
                                if((window.current_rowID === rowCount))
                                {
                                    //alert("inside if");
                                    endList(tableID,rowCount);
                                    window.edit_flag = true;
                                }
                                else if(window.current_rowID === "")
                                {
                                    //Do nothing
                                }
                                else if(window.current_rowID === rowID)
                                {
                                    //Do nothing
                                }
                                else
                                {
                                    //alert('inside else - flag val'+window.edit_flag);
                                    if (window.edit_flag === true)
                                    {
                                        //alert("inside else - if");
                                        //alert(window.current_rowID);
                                        tbToLbl(tableID,window.current_rowID,"edit");
                                    }
                                    window.edit_flag = true;
                                }
                            
                                window.current_rowID = rowID;
				var table = document.getElementById(tableID);
				var rowCount = table.rows.length;
				
				//endList(tableID);
				
				temp_txt_name = document.getElementsByName(tableID+'name')[rowID-1].innerText;
				temp_txt_qty = document.getElementsByName(tableID+'qty')[rowID-1].innerText;
				temp_txt_units = document.getElementsByName(tableID+'units')[rowID-1].innerText;
				temp_txt_rate = document.getElementsByName(tableID+'rate')[rowID-1].innerText;
				temp_txt_amt = document.getElementsByName(tableID+'amt')[rowID-1].innerText;
			
				lblToTb(tableID,rowID);	
			}
			
			function deleteRow(tableID,rowID)
			{
				var table = document.getElementById(tableID);
				table.deleteRow(rowID-1);
			}
	
			function deleteSelectedRows(tableID) {
				try {
				var table = document.getElementById(tableID);
				var rowCount = table.rows.length;
	
				for(var i=0; i<rowCount; i++) {
					var row = table.rows[i];
					var chkbox = row.cells[0].childNodes[0];
					if(null !== chkbox && true === chkbox.checked) {
						table.deleteRow(i);
						rowCount--;
						i--;
					}
	
	
				}
				}catch(e) {
					alert(e);
				}
			}
                        
                        function validate(evt,thisobj,validation)
                        {
                           var charCode = (evt.which) ? evt.which : event.keyCode;
                           
                           /*
                            * dec - Numbers and .
                            * int - Only numbers
                            */
                           
                               if (validation === "dec")
                               {
                                    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 46)
                                         return false;
                                    else
                                    {
                                         //Prevent from entering more than one '.'
                                         if (thisobj.value.concat(evt.which).indexOf('.') !== -1)
                                         {
                                             if (charCode === 46)
                                                return false;
                                         }
                                         return true;
                                    }
                                }
                                else if(validation === "int")
                                {
                                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                                         return false;
                                    else
                                        return true;
                                }
                        }
			
		/*
			function loadledger()
			{
				var res;
				$.ajax({
						type: 'GET',
						contentType: 'application/json',
						async: false,
						url: apiurl+'stockjournal.php/stockitemlist',
						dataType: "json",
						success: function(data){
							res = data;
						},
						error: function(jqXHR, textStatus, errorThrown){
						}
				});
				return res;
			}
			
			var data=loadledger();
			makeconfobject("Name of Item",50,"list",data,"divlist","","",false);//Company Name
			makeconfobject("Qty",4,"number","","","Amount=Qty*Rate","Qty=Amount/Rate",true);//Quantity
			makeconfobject("Units",4,"list",data,"divlist","","",true);//Units
			makeconfobject("Rate",4,"list",data,"divlist","Amount=Qty*Rate","Rate=Amount/Qty",true);//Rate
			makeconfobject("Amount",4,"list",data,"divlist","Rate=Amount/Qty","Qty=Amount/Rate",false);//Amount
			//starthere(confarray);
			var list=loadledger();
			starthere(list);
		*/
		</script>
		
	</body>
</html>
