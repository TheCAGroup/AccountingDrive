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
					<!--form id="f1"-->
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
					<!--/form-->
				</div>
			</div><br>
			<div class="my-class" align="center" style=" border: 1px #0D3349 solid; background: #EFF8FB; width: 100%; height: 35%; overflow: auto">
				<div style="border-bottom: 1px #0D3349 dotted;">
					Destination (Production)
				</div>
				<div>
					<table id="mydest" class="table" >
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
			</div>
		</div>
		</div>
		<div class="col-lg-3">

			<div class="span3 sb-fixed">
		   		<div id="divlist" class="well sidebar-nav">
		   			
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
			</div>

	  	</div>
		</div>
		
	</div>
		
		<script>
		
		var isSelected = "false";
		var mylist;
		
		loadcompany();
		createOption(window.mylist,"");
		createCell("mysource",1,1);
		
  		
		
			function createCell(tblname, rowid, colid)
			{
				//alert (tblname + "," + rowid + "," + colid);
				var table = document.getElementById(tblname);
				
				if(document.getElementById("mydiv[" + (rowid) + "]["+(colid)+"]") == null)
				{
					//NO DIV
					//check if row exists
					if(table.rows[rowid] == null)
					{//row does not exist
						//create row & columns
						var row=table.insertRow(-1);
						var colCount = table.rows[0].cells.length;
						for(i=0;i<colCount;i++)
							row.insertCell(-1);
					}
					var dyndiv = document.createElement("div");
					var rowCount = table.rows.length;
					var cell = table.rows[rowCount-1].cells[colid-1];
					dyndiv.id = "mydiv[" + (rowCount-1) + "]["+(colid)+"]";
					//alert(colid);
					dyndiv.innerHTML=maketextbox(tblname,rowid,colid);
													
					cell.appendChild(dyndiv);
					$('#txtbx').focus();	
				}
				else
				{//div exist - change label to textbox(make cell editable)
					lblToTb(tblname,rowid,colid);
					
				}
				

			}
						
			function itemKeydown(tblname,rowno,colno)
			{
				
				//Validation
				if (colno == 2 || colno == 4 || colno == 5)
				{
					if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
		                event.preventDefault(); 
		            }  
				}
				//End Validation
				
				
				
				var table = document.getElementById(tblname);
  				
				if((event.keyCode == 13)||(event.keyCode == 9))//13 is enter key, 9 is tab, 
  				{
  					//check if end of list reached
  					if ((colno == 1 ) && ($('#txtbx').val().trim().length<=0))
  					{
  						
  						tbToLbl(rowno,colno);
  						document.getElementById("lbl["+rowno+"]["+colno+"]").innerText="*End of List";
  						return;
  					}
  					
  					//if amount is entered do nothing
  					if ((colno == 5 ) && ($('#txtbx').val().trim().length<=0))
  					{
  						return;
  					}
  					//Do the processing	
  					tbToLbl(rowno,colno);
  					if (colno >= table.rows[0].cells.length)
  					{
  						createCell(tblname,rowno+1,1);
  					}
  					else
  					{
  						createCell(tblname,rowno,colno+1);
  					}
  					
  					//Rate entered

  					if (colno == 4)
					{
						var qty = document.getElementById("lbl["+rowno+"]["+(colno-2)+"]");
						var rate = document.getElementById("lbl["+rowno+"]["+colno+"]");
						
						if((qty.innerText!="") && (rate.innerText!=""))
							$('#txtbx').val(parseInt(qty.innerText)*parseInt(rate.innerText));
					}
					
					//Amount entered
					if (colno == 5)
					{
						var qty = document.getElementById("lbl["+rowno+"]["+(colno-3)+"]");
						var rate = document.getElementById("lbl["+rowno+"]["+(colno-1)+"]");
						var amt = document.getElementById("lbl["+rowno+"]["+colno+"]");
						
						
						if((qty.innerText!="") && (amt.innerText!=""))
							rate.innerText=(parseInt(amt.innerText)/parseInt(qty.innerText)).toFixed(2);
						if((rate.innerText!="") && (amt.innerText!=""))
							qty.innerText=(parseInt(amt.innerText)/parseInt(rate.innerText)).toFixed(2);
					}
					
					if (colno == 2)
  					{
  						var qty = document.getElementById("lbl["+rowno+"]["+(colno)+"]");
						var rate = document.getElementById("lbl["+rowno+"]["+(colno+2)+"]");
						var amt = document.getElementById("lbl["+rowno+"]["+(colno+3)+"]");
						
						if((rate!=null))
						{
							if((qty.innerText!="") && (rate.innerText!=""))
							amt.innerText=(parseInt(qty.innerText)*parseInt(rate.innerText)).toFixed(2);
						}
						
  					}
  					
  				}
  				
  				else if(((event.keyCode == 8) && ($('#txtbx').val().trim().length == 0)) || ((event.keyCode == 8) && (window.isSelected == "true"))) // 8 - backspace
  				{
  					//window.isSelected = "false";
  					//alert("Inside prevent default");
  					//if($('#txtbx').val().trim().length<=0)
  					 event.preventDefault();
  					//check if first column
  						//if so, check if first row
  							//if so, do nothing
  						//else move to prev row
  					//if not, move to prev col
  					
  					//alert (colno + "," + rowno);
  					//if(document.getElementById('txtbx').value!="")
  						//z	return;
  					if (colno == 1)
  					{ 
  						if(rowno != 1)
  						{
  							tbToLbl(rowno,colno);
  							colLength = table.rows[0].cells.length;
  							createCell(tblname,rowno-1,colLength);
  						}
  					}
  					else
  					{
  						tbToLbl(rowno,colno);
  						createCell(tblname,rowno,colno-1);
  					}
  				}
  				else if ((event.keyCode == 27) && (window.isSelected == "true")) // 27 - ESC
  				{
  					$('#txtbx').val("");
  				}
  				else if(((event.keyCode == 38) || (event.keyCode == 40)) && (colno==1)) //38 - Up arrow, 40 - Down arrow
  				{
  					event.preventDefault();
  					$('#selectbasic').focus();
  					$('#selectbasic').prop("selectedIndex",0);
  					
  				}
  				else
  				{
  					window.isSelected = "false";
  				}
  				
  				
  				if(colno==1)
				{
					
					var searchpattern="";
					if(event.keyCode==8 && $('#txtbx').val().length>0)
						searchpattern=$('#txtbx').val().substring(0,$('#txtbx').val().length-1);
					else
						searchpattern=$('#txtbx').val()+String.fromCharCode(event.keyCode);
					//alert(searchpattern);
					var filteredlist=getfilteredlist(window.mylist,searchpattern);
					//alert(searchpattern);return;
					if ((filteredlist.length==0) && (event.keyCode!=8))
					{
						
						event.preventDefault();
					}
					else
					{
						createOption(filteredlist,"");
					}
				}
				//else
				//{
				//	loadSideLink();
				//}
  				//$('#txtbx').focus();
  				
  			}
  			function tbToLbl(rowno,colno)
  			{
  				var txt_val = document.getElementById('txtbx').value;
  				var divid = "mydiv[" + (rowno) + "]["+(colno)+"]";
				currentdiv = document.getElementById(divid);
				currentdiv.innerHTML="<label id='lbl["+rowno+"]["+colno+"]'><font size='3px'>"+txt_val+"</font></label>";
  			}
  			function lblToTb(tblname,rowno,colno)
  			{
  				var lbl_val = document.getElementById("lbl["+rowno+"]["+colno+"]").innerText;
  				var divid = "mydiv[" + rowno + "]["+ colno +"]";
				currentdiv = document.getElementById(divid);
				currentdiv.innerHTML=maketextbox(tblname,rowno,colno);
  				$('#txtbx').focus();
  				$('#txtbx').val(lbl_val);
  				$('#txtbx').select();
  				window.isSelected = "true";
  				
  				//if (colno!=1)
  				//{
  				//	loadSideLink();
  				//}
  			}
  			
  			function maketextbox(tblname,rowno,colno)
  			{
  				//return "<input type='text' id='txtbx' onkeyup='changeSideBar("+colno+")' onkeydown=\"itemKeydown('"+tblname+"',"+rowno+","+colno+");\" class='form-control' style='width:100%;' />"; 
  				return "<input type='text' id='txtbx' onkeydown=\"itemKeydown('"+tblname+"',"+rowno+","+colno+");\" class='form-control' style='width:100%;' />";
  			}
  			
  			function getSelectedValue(event)
  			{
  				var chCode = ('charCode' in event) ? event.charCode : event.keyCode;
  				if(chCode == 13)
  				{
  					$('#txtbx').val($('#selectbasic').find(':selected').text());
  					$('#txtbx').focus();
  					loadSideLink();
  				}
  			}
  			
  			function loadSideLink()
  			{
  				document.getElementById("divlist").innerHTML = "";
  			}
  			
  			
  			function changeSideBar(colno)
  			{
  				if (colno == 1)
  				{
  					//Display listbox
  					document.getElementById("divlist").innerHTML = "<select id='selectbasic' onkeypress='getSelectedValue(event); ' style='width:100%;' size=35% class='form-control'></select>";
	  				var searchvalue=document.getElementById('txtbx').value;
	  				createOption(window.mylist,searchvalue)
	  				/*
	  				if(createOption(window.mylist,searchvalue))
	  					{
	  						
	  					}//allow
	  				else
	  					{
	  						//alert('ddd');
	  						var str=$('#txtbx').val();
	  						str=str.substring(0,str.length-1);
	  						$('#txtbx').val(str);
	  						
	  					}//disallow
	  					*/
  					
  				}
  				else
  				{
  					loadSideLink();
  				}
  			}
				
			function createOption(list,searchvalue)
			{
				var filteredlist;
				if(searchvalue=="")
				{
					filteredlist = list.slice(0);
					document.getElementById("divlist").innerHTML = "<select id='selectbasic' onkeypress='getSelectedValue(event); ' style='width:100%;' size=35% class='form-control'></select>";
				}
					
				else
					filteredlist = getfilteredlist(list,searchvalue);
				/*
				var result=true;
				if(filteredlist.length<1)
				{	//wrong entry
					filteredlist = getfilteredlist(list,searchvalue.substring(0,searchvalue.length-1));//list.slice(0);
					result=false;
				}*/
					
				var combo = document.getElementById("selectbasic");
			    $.each(filteredlist, function(i, option) {
					var myoption = document.createElement("option");
				    myoption.text = option.name;
				    myoption.value = option.id;
				    try {
				        combo.add(myoption, null); //Standard 
				    }catch(error) {
				        combo.add(myoption); // IE only
					}	
				 });
				 //return result;
				 return true;
			}
  			
  			
  			function loadcompany()
			{
				$.ajax({
						type: 'GET',
						contentType: 'application/json',
						async: false,
						url: apiurl+'company.php/companylist',
						dataType: "json",
						success: function(data){
							window.mylist = data;
						},
						error: function(jqXHR, textStatus, errorThrown){
						}
				});
			}
  			

			function getfilteredlist(fulllist,searchpattern)
			{
				//alert("filterdata: "+searchpattern);
				var result = fulllist.slice(0);
				var index=0;					
				var removed=0;
				$.each(fulllist, function(i, option) {
					var str = option.name;
					var l_str = str.toLowerCase();
					var l_searchpattern = searchpattern.toLowerCase();
					if(l_str.indexOf(l_searchpattern)==-1)//not matched
					{
						result.splice( index-removed , 1 );
						removed++;
					}
					index=index+1;	
				 });
				return result;	
			}
			
		</script>
	</body>
</html>