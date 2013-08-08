<?php include 'company_breadcrumb.php'; ?>
<html>
<head>
<script src="config.js"></script>
<title>Add a new Company</title>
	
<meta charset="utf-8"> 
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">


<link rel="stylesheet" type="text/css" href="xbootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/button.css">
<link href="xbootstrap/css/datepicker.css" rel="stylesheet">
<script src="xbootstrap/js/jquery.js"></script>
<script src="xbootstrap/js/bootstrap-datepicker.js"></script>
<script src="xbootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="jquery_validation/dist/jquery.validate.js"></script>

<style>body { font-family: Ubuntu, sans-serif; }</style>
<!--script src="js/ent_company.js"></script-->
</head>
<body>
	
<form id="addcompany" class="form-horizontal" method="post"><!--action="trycompanyinsert.php" -->
<fieldset>



<div class = "container">
	<div class="row show-grid">
  		<div class="col-lg-8">
			<div class="well">

		<!-- Form Name -->
		<legend>Create Company</legend>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txtname">Name</label>
		  <div class="controls">
		    <input id="txtname" name="txtname" placeholder="Name of the Company" class="input-large" type="text" onblur="checkUniqueCompany();">
		    
		  </div>
		</div>
		
		<!-- Textarea -->
		<div class="control-group">
		  <label class="control-label" for="txtaddress">Address</label>
		  <div class="controls">                     
		    <textarea id="txtaddress" name="txtaddress"></textarea>
		  </div>
		</div>
		
		<!-- Select Basic -->
		<div class="control-group">
		  <label class="control-label" for="cmbstate">State</label>
		  <div class="controls">
		    <select id="cmbstate" name="cmbstate" class="input-large">
		      <option>Tamil Nadu</option>
		    </select>
		  </div>
		</div>
		
		<!-- Select Basic -->
		<div class="control-group">
		  <label class="control-label" for="cmbcountry">Country</label>
		  <div class="controls">
		    <select id="cmbcountry" name="cmbcountry" class="input-large">
		      <option>India</option>
		    </select>
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txtpincode">Pincode</label>
		  <div class="controls">
		    <input id="txtpincode" name="txtpincode" placeholder="Pincode" class="input-large" type="text">
		    
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txttelephone">Telephone</label>
		  <div class="controls">
		    <input id="txttelephone" name="txttelephone" placeholder="Telephone Number" class="input-large" type="text">
		    
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txtemail">Email</label>
		  <div class="controls">
		    <input id="txtemail" name="txtemail" placeholder="email" class="input-large" type="text">
		    
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txtfinancialyear">Financial Year Beginning From</label>
		  <div class="controls">
		    <input id="txtfinancialyear" name="txtfinancialyear" placeholder="Financial Start of Year" value="2010-04-01" type="text" class="datepicker" readonly/>
		  </div>
		</div>
		
		
		<!-- Select Basic -->
		<div class="control-group">
		  <label class="control-label" for="cmbadministrator">Administrator</label>
		  <div class="controls">
		    <select id="cmbadministrator" name="cmbadministrator" class="input-large">
		      
		    </select>
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txtcurrency">Currency Name</label>
		  <div class="controls">
		    <input id="txtcurrency" name="txtcurrency" placeholder="Currency Name" class="input-large" type="text">
		    
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txtcurrencysymbol">Currency Symbol</label>
		  <div class="controls">
		    <input id="txtcurrencysymbol" name="txtcurrencysymbol" placeholder="Currency Symbol" class="input-large" type="text">
		    
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txtdecplaces">Decimal Places</label>
		  <div class="controls">
		    <input id="txtdecplaces" name="txtdecplaces" type="number" class="input-large">
		    
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txtdecsymbol">Symbol for Decimal</label>
		  <div class="controls">
		    <input id="txtdecsymbol" name="txtdecsymbol" type="text" placeholder="eg: Paise" class="input-large">
		    
		  </div>
		</div>
		
		<!-- Multiple Radios (inline) -->
		<div class="control-group">
		  <label class="control-label" for="rdshowinmillioins">Show in Millions</label>
		  <div class="controls">
		    <label class="radio inline" for="rdshowinmillioins-0">
		      <input name="rdshowinmillioins" id="rdshowinmillioins-0" value="True" checked="checked" type="radio">
		      True
		    </label>
		    <label class="radio inline" for="rdshowinmillioins-1">
		      <input name="rdshowinmillioins" id="rdshowinmillioins-1" value="False" type="radio">
		      False
		    </label>
		  </div>
		</div>
		
		<!-- Multiple Radios (inline) -->
		<div class="control-group">
		  <label class="control-label" for="rdspacebtwamountandsymbol">Space between Amount &amp; Symbol</label>
		  <div class="controls">
		    <label class="radio inline" for="rdspacebtwamountandsymbol-0">
		      <input name="rdspacebtwamountandsymbol" id="rdspacebtwamountandsymbol-0" value="True" checked="checked" type="radio">
		      True
		    </label>
		    <label class="radio inline" for="rdspacebtwamountandsymbol-1">
		      <input name="rdspacebtwamountandsymbol" id="rdspacebtwamountandsymbol-1" value="False" type="radio">
		      False
		    </label>
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txtdecimalplacesforprint">Decimal Places for Printing</label>
		  <div class="controls">
		    <input id="txtdecimalplacesforprint" name="txtdecimalplacesforprint" class="input-large" type="number">    
		  </div>
		</div>
		
		<div style="width:50%; height:100px; padding-left: 5%;">
			<!--Submit Button-->
			<div id="submit_btn_container"style="float:left" onclick="formSubmit();">
			    <label id="btn_label">Accept</label>
			</div>
			
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
			 		 	<li><a href="#">Select Company</a></li>
			 		 	<li><a href="#">Shut Company</a></li>
			 		 	<li><a href="#">Company Info</a></li>
			 		 	<li><a href="#">Features</a></li>
			 		 	<li><a href="#">Configure</a></li>
					</ul>   
				</div>
			</div>

	  	</div>
	</div><!--/row-->	
	<!--/div--> <!--/Well-->
</div> <!--/Container-->
</fieldset>
</form>

<!--div id="a"><p id="abc" onclick="formSubmit();">Submit</p></div-->

<!-- Javascript placed at the end of the file to make the  page load faster -->

<script type="text/javascript">

//Datepicker
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
});

//Form Validation
/*
$(document).ready(function(){
			
			$("#addcompany").validate({
				rules:{
					txtname:{
      					required: true,
      					minlength: 3
    			},
					txtpincode:"number",
					txttelephone:"number",
					txtemail:"email",
				},
				errorClass: "help-inline"
				
			});
});

jQuery("#addcompany").submit(function() {
    if($(this).data("valid")) {
        alert("Valid");
    }
    // Rest of your code
});

$("#addcompany").data("valid", true).aa();
*/

//Form Validation
function formSubmit()
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
			//alert("Return value: f- add t-no"+checkUniqueCompany());
			
			var alreadyexist = checkUniqueCompany();
			//alert("1. "+alreadyexist);
			
			if (alreadyexist == false)
			{
				addCompany();
			}
			
		}
}
function addCompany()
{
	var name=document.getElementById('txtname').value;
	var mailingname=document.getElementById('txtname').value;
	var address=document.getElementById('txtaddress').value;
	var country=document.getElementById('cmbcountry').value;
	var state=document.getElementById('cmbstate').value;
	var pincode=document.getElementById('txtpincode').value;
	var telephoneno=document.getElementById('txttelephone').value;
	var email=document.getElementById('txtemail').value;
	var currencysymbol=document.getElementById('txtcurrencysymbol').value;
	var financialyear=document.getElementById('txtfinancialyear').value;
	var administrator=document.getElementById('cmbadministrator').value;
	var currencyname=document.getElementById('txtcurrency').value;
	var decimalplaces=document.getElementById('txtdecplaces').value;
	var symbolfordecimal=document.getElementById('txtdecsymbol').value;
	var amountsinmillions=document.getElementById('rdshowinmillioins-0').checked;
	var spacebtwamountandsymbol=document.getElementById('rdspacebtwamountandsymbol-0').checked;
	var decimalplacsforprint=document.getElementById('txtdecimalplacesforprint').value;
	var createdby=1;
	var modifiedby=1;
	var q=JSON.stringify({
		'name':name,
		'mailingname':mailingname,
		'address':address,
		'country':country,
		'state':state,
		'pincode':pincode,
		'telephoneno':telephoneno,
		'email':email,
		'currencysymbol':currencysymbol,
		'financialyear':financialyear,
		'administrator':administrator,
		'currencyname':currencyname,
		'decimalplaces':decimalplaces,
		'symbolfordecimal':symbolfordecimal,
		'amountsinmillions':amountsinmillions,
		'spacebtwamountandsymbol':spacebtwamountandsymbol,
		'decimalplacsforprint':decimalplacsforprint,
		'createdby':createdby,
		'modifiedby':modifiedby
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
			contentType: 'application/json',
			url: apiurl+'company.php/companylist',
			dataType: "json",
			success: function(data){
						    $.each(data, function(i, option) {
						    	alert(option.name);
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
