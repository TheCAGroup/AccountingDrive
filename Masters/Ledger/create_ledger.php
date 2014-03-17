<?php include '../breadcrumb.php'; ?>
<html>
<head>
<title>Create Ledger</title>
	
<meta charset="utf-8"> 

<script type="text/javascript" src="./jquery_validation/dist/jquery.validate.js"></script>

<style>body { font-family: Ubuntu, sans-serif; }</style>
</head>
<body>
<!--CHECK FOR PARAMETERS
	--NO PARAMS - CREATE
	--ID - DISPLAY
	--ID, ISEDIT(TRUE) - EDIT
-->
<?php
$id=-1;
$isedit=FALSE;
if(isset($_GET['ID']))
	$id=$_GET['ID'];
if(isset($_GET['ISEDIT']))
	$isedit=$_GET['ISEDIT'];
?> 	
<form id="addledger" class="form-horizontal" method="post"><!--action="trycompanyinsert.php" -->
<fieldset>
<div class = "container">
	<div class="row show-grid">
  		<div class="col-lg-8">
			<div class="well">
  			
  				<!-- Form Name -->
  				<legend>
					<?php 
						if($id>-1)
							if($isedit) echo 'Edit Ledger';
							else echo 'Ledger Info';
						else echo'Create Ledger';
					?>
				</legend>
				
  				<!-- Textbox -->
				<div class="form-group">
		    		<label for="txtname" class="col-lg-2 control-label">Name</label>
    				<div class="col-lg-4">
      					<input type="text" class="form-control" id="txtname" placeholder="Ledger Name">
    				</div>
  				</div>
  
				<!-- Textbox -->
				<div class="form-group">
				  <label class="col-lg-2 control-label" for="txtalias">Alias</label>
				  <div class="col-lg-4">
					<input type="text" class="form-control" id="txtalias" placeholder="Alias name for Ledger">                     
				  </div>
				</div>
				
				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-lg-2 control-label" for="cmbgroup">Group</label>
				  <div class="col-lg-4">
				    <select id="cmbgroup" name="cmbgroup" class="form-control">
				    </select>
				  </div>
				</div>
				
				<!-- Multiple Radios (inline) -->
				<div class="form-group">
				  <label class="col-lg-2 control-label" for="rdmaintainbill">Maintain Bill</label>
				  <div class="col-lg-4">
				  		<label class="radio-inline">
					  	<input type="radio" id="rdmaintainbill-0" name="rdmaintainbill" value="Yes" checked="checked"> Yes
						</label>
						<label class="radio-inline">
		  				<input type="radio" id="rdmaintainbill-1" name="rdmaintainbill" value="No"> No
						</label>
				  </div>
				</div>
				
				<!-- Textarea -->
				<div class="form-group">
				  <label class="col-lg-2 control-label" for="txtaddress">Address</label>
				  <div class="col-lg-4">
				  	<textarea class="form-control" rows="3" id="txtaddress" name="txtaddress"></textarea>                     
				  </div>
				</div>
				
				<!-- Selectbox -->
				<div class="form-group">
				  <label class="col-lg-2 control-label" for="cmbstate">State</label>
				  <div class="col-lg-4">
				    <select id="cmbstate" name="cmbstate" class="form-control">
				      <option>Tamil Nadu</option>
				    </select>
				  </div>
				</div>
				
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-lg-2 control-label" for="txtpincode">Pincode</label>
				  <div class="col-lg-4">
				  	<input type="text" class="form-control" id="txtpincode" name="txtpincode" placeholder="Name">
				  </div>
				</div>
				
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-lg-2 control-label" for="txtpanno">Pan No.</label>
				  <div class="col-lg-4">
				  	<input type="text" class="form-control" id="txtpanno" name="txtpanno" placeholder="Pan Number">
				  </div>
				</div>
				
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-lg-2 control-label" for="txtsalestaxno">Sales Tax No.</label>
				  <div class="col-lg-4">
				  	<input type="text" class="form-control" id="txtsalestaxno" name="txtsalestaxno" placeholder="Sales Tax Number">
				  </div>
				</div>
				
				
		
				<div style="width:50%; height:100px; padding-left: 5%;">
					<!--Submit Button-->
					<?php 
					if($id>-1)
						if($isedit)//Edit Ledger 
							{
								echo '<div id="submit_btn_container" style="float:left" onclick="formSubmit(true);">
					    				<label id="btn_label">Update</label>
									  </div>';
							}
						else//Display Ledger Info
							{//no accept btn
							}
					else //Create Ledger
						{
							echo '<div id="submit_btn_container" style="float:left" onclick="formSubmit(false);">
					    			<label id="btn_label">Accept</label>
								  </div>';
						}
					?>
					
					<!--Cancel Button-->
					<div id="cancel_btn_container" style="float:right" onclick="formCancel();">
					    <label id="btn_label">Cancel</label>
					</div>	
				</div>
			</div>
		</div>
		
		<div class="col-lg-4">
			<div class="span3 sb-fixed">
		   		<div class="well sidebar-nav">
					<ul class="nav nav-pills nav-stacked">
			 		 	<li><a href="#">Features</a></li>
			 		 	<li><a href="#">Configure</a></li>
					</ul>   
				</div>
			</div>
		</div>
	</div><!--/row-->	
	<!--/div--> <!--/Well-->
</div>
</form>
</div> <!--/Container-->
</fieldset>
</form>
<!-- Javascript placed at the end of the file to make the  page load faster -->

<script type="text/javascript">

//Datepicker
$('#txtfinancialyear').datepicker();


//Form Validation
function formSubmit(frmedit)
{
	
	$("#addcompany").validate({
				rules:{
					txtname:{
      					required: true,
      					minlength: 3
    			},
					txtpincode:{
						required: true,
						number: true
					},
					txttelephone:{
						required: true,
						number: true
					},
					txtemail:"email",
					txtaddress:"required",
					txtcurrencysymbol:"required",
					txtcurrency:"required",
					txtdecplaces:"required",
					txtdecsymbol:"required",
					txtdecimalplacesforprint:"required",
				},
				errorClass: "help-inline"
				
			});
			
			
		if ( $("#addcompany").valid())
		{
			if(frmedit)//update
			{
				updateCompany();
			}
			else//create
			{
				var alreadyexist = checkUniqueCompany();
				if (alreadyexist == false)
				{
					addCompany();
				}
			}
		}
}
function addCompany()
{
	var q=JSON.stringify({
		'name':$("input#txtname").val(),
		'mailingname':$("input#txtname").val(),
		'address':$("#txtaddress").val(),
		'country':$("#cmbcountry").val(),
		'state':$("#cmbstate").val(),
		'pincode':$("input#txtpincode").val(),
		'telephoneno':$("input#txttelephone").val(),
		'email':$("input#txtemail").val(),
		'currencysymbol':$("input#txtcurrencysymbol").val(),
		'financialyear':$("input#txtfinancialyear").val(),
		'administrator':$("#cmbadministrator").val(),
		'currencyname':$("input#txtcurrency").val(),
		'decimalplaces':$("input#txtdecplaces").val(),
		'symbolfordecimal':$("input#txtdecsymbol").val(),
		'amountsinmillions':$("input#rdshowinmillioins-0").val(),
		'spacebtwamountandsymbol':$("input#rdspacebtwamountandsymbol-0").val(),
		'decimalplacsforprint':$("input#txtdecimalplacesforprint").val(),
		'createdby':1,
		'modifiedby':1
	        });

	$.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: apiurl+'company.php/addcompany',
		dataType: "json",
		data:q,
		success: function(data){
			alert('Inserted!');
			//location.reload();
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('addcompany error: ' + textStatus+errorThrown);
		}
	});
}


function formCancel()
{
	$("#maindiv").load("entrypage.php");
}

//Load Values for the select box  (user list)
$.ajax({
		type: 'GET',
		contentType: 'application/json',
		url: apiurl+'user.php/userlist',
		dataType: "json",
		success: function(data){
			//alert(data.d);
			//$(function() {
					    
					    $.each(data, function(i, option) {
					        $('#cmbadministrator').append($('<option/>').attr("value", option.id).text(option.username));
					    });
		//				})
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert(generalerror);
		}
});

//Get company list and check if the company name entered is already in the company list 
function checkUniqueCompany()
{	
	var found = false;
	$.ajax({
			type: 'GET',
			async: false, 
			contentType: 'application/json',
			url: apiurl+'company.php/companylist',
			dataType: "json",
			success: function(data){
						    $.each(data, function(i, option) {
						        if(option.name == document.getElementById('txtname').value)
						        {
						        	found = true;
						        	alert("Company already exist");
						        	document.getElementById('txtname').value="";
						        	$('#txtname').focus();
						        }
						    });
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(generalerror);
			}
		});
		
		return found;
}	

</script>
</body>
</html>
