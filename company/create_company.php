<?php include 'company_breadcrumb.php'; ?>
<html>
<head>
<title>Add Company</title>
	
<meta charset="utf-8"> 


<!--link href="css/datepicker.css" rel="stylesheet"-->

<style>body { font-family: Ubuntu, sans-serif; }</style>

<!----TESTING ---->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/config.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../jquery_validation/dist/jquery.validate.js"></script>
<!--- END OF TESTING ----->

<script>
	function displayCompany(id)
{
		$.ajax({
		type: 'GET',
		contentType: 'application/json',
		url: apiurl+'company.php/companydetails/'+id,
		dataType: "json",
		success: function(data){
			//alert(data[0].mailingname);
			
		$('#txtname').val(data[0].name);
		$("#txtaddress").val(data[0].address);
		$("#cmbcountry").val(data[0].country);
		$("#cmbstate").val(data[0].state);
		$("#txtpincode").val(data[0].pincode);
		$("#txttelephone").val(data[0].telephoneno);
		$("#txtemail").val(data[0].email);
		$("#txtcurrencysymbol").val(data[0].currencysymbol);
		$("#txtfinancialyear").val(data[0].financialyear);
		$("#cmbadministrator").val(data[0].administrator);
		$("#txtcurrency").val(data[0].currencyname);
		$("#txtdecplaces").val(data[0].decimalplaces);
		$("#txtdecsymbol").val(data[0].symbolfordecimal);
		$("#rdshowinmillioins-0").val(data[0].amountsinmillions);
		$("#rdspacebtwamountandsymbol-0").val(data[0].spacebtwamountandsymbol);
		$("#txtdecimalplacesforprint").val(data[0].decimalplacsforprint);
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('displaycompany error: ' + textStatus+errorThrown);
		}
	});
}	
</script>
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
<form id="addcompany" class="form-horizontal" method="post"><!--action="trycompanyinsert.php" -->
<fieldset>
<div class = "container">
	<div class="row show-grid">
  		<div class="col-lg-8">
			<div class="well">

		<!-- Form Name -->
		<legend>
			<?php 
			if($id>-1)
				if($isedit) echo 'Edit Company';
				else echo 'Company Info';
			else echo'Create Company';
			?>
		</legend>

  			
		<div class="form-group">
    <label for="txtname" class="col-lg-2 control-label">Name</label>
    <div class="col-lg-4">
      <input type="text" class="form-control" id="txtname" placeholder="Name">
    </div>
  </div>
  
		<!-- Textarea -->
		<div class="form-group">
		  <label class="col-lg-2 control-label" for="txtaddress">Address</label>
		  <div class="col-lg-4">
		  	<textarea class="form-control" rows="3" id="txtaddress" name="txtaddress"></textarea>                     
		  </div>
		</div>
		
		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-lg-2 control-label" for="cmbstate">State</label>
		  <div class="col-lg-4">
		    <select id="cmbstate" name="cmbstate" class="form-control">
		      <option>Tamil Nadu</option>
		    </select>
		  </div>
		</div>
		
		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-lg-2 control-label" for="cmbcountry">Country</label>
		  <div class="col-lg-4">
		    <select id="cmbcountry" name="cmbcountry" class="form-control">
		      <option>India</option>
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
		  <label class="col-lg-2 control-label" for="txttelephone">Telephone</label>
		  <div class="col-lg-4">
		  	<input type="text" class="form-control" id="txttelephone" name="txttelephone" placeholder="Telephone Number">
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-lg-2 control-label" for="txtemail">Email</label>
		  <div class="col-lg-4">
		  	<input type="text" class="form-control" id="txtemail" name="txtemail" placeholder="email">
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-lg-2 control-label" for="txtfinancialyear">Financial Year Beginning From</label>
		  <div class="col-lg-4">
		  	<input type="text" class="form-control" value="01/04/13" data-date-format="dd/mm/yy" id="txtfinancialyear" name="txtfinancialyear" readonly />
		    <!--input id="txtfinancialyear" name="txtfinancialyear" placeholder="Financial Start of Year" value="2010-04-01" type="text" class="datepicker" readonly/-->
		  </div>
		</div>
		
		
		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-lg-2 control-label" for="cmbadministrator">Administrator</label>
		  <div class="col-lg-4">
		    <select id="cmbadministrator" name="cmbadministrator" class="form-control">
		      
		    </select>
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-lg-2 control-label" for="txtcurrency">Currency Name</label>
		  <div class="col-lg-4">
		  	<input type="text" class="form-control" id="txtcurrency" name="txtcurrency" placeholder="Currency Name">
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-lg-2 control-label" for="txtcurrencysymbol">Currency Symbol</label>
		  <div class="col-lg-4">
		  	<input type="text" class="form-control" id="txtcurrencysymbol" name="txtcurrencysymbol" placeholder="Currency Symbol">
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-lg-2 control-label" for="txtdecplaces">Decimal Places</label>
		  <div class="col-lg-4">
		  	<input type="number" class="form-control" id="txtdecplaces" name="txtdecplaces" >
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-lg-2 control-label" for="txtdecsymbol">Symbol for Decimal</label>
		  <div class="col-lg-4">
		  	<input type="text" class="form-control" id="txtdecsymbol" name="txtdecsymbol" placeholder="eg: Paise" >
		  </div>
		</div>
		
		<!-- Multiple Radios (inline) -->
		<div class="form-group">
		  <label class="col-lg-2 control-label" for="rdshowinmillioins">Show in Millions</label>
		  <div class="col-lg-4">
		  		<label class="radio-inline">
			  	<input type="radio" id="rdshowinmillioins-0" name="rdshowinmillioins" value="True" checked="checked"> True
				</label>
				<label class="radio-inline">
  				<input type="radio" id="rdshowinmillioins-1" name="rdshowinmillioins" value="False"> False
				</label>
		  </div>
		</div>
		
		<!-- Multiple Radios (inline) -->
		<div class="form-group">
		  <label class="col-lg-2 control-label" for="rdspacebtwamountandsymbol">Space between Amount &amp; Symbol</label>
		  <div class="col-lg-4">
		  		<label class="radio-inline">
			  	<input type="radio" id="rdspacebtwamountandsymbol-0" name="rdspacebtwamountandsymbol" value="True" checked="checked"> True
				</label>
				<label class="radio-inline">
  				<input type="radio" id="rdspacebtwamountandsymbol-1" name="rdspacebtwamountandsymbol" value="False"> False
				</label>
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-lg-2 control-label" for="txtdecimalplacesforprint">Decimal Places for Printing</label>
		  <div class="col-lg-4">
		  	<input type="number" class="form-control" id="txtdecimalplacesforprint" name="txtdecimalplacesforprint" >
		  </div>
		</div>
		
		<div style="width:50%; height:100px; padding-left: 5%;">
			<!--Submit Button-->
			<?php 
			if($id>-1)
				if($isedit)//Edit company 
					{
						echo '<div id="submit_btn_container"style="float:left" onclick="formSubmit(true);">
			    	<label id="btn_label">Update</label>
				</div>';
				echo '<script>displayCompany(4);</script>';
					}
				else//Display Company Info
					{//no accept btn
					}
			else //Create Company
				{
					echo '<div id="submit_btn_container"style="float:left" onclick="formSubmit(false);">
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
			 		 	<li><a href="#" onclick="gotoselectcompany();">Select Company</a></li>
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
	</div></form>
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
