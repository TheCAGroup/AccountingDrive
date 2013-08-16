<?php 
include 'company_breadcrumb.php';
?>
<html>
<head>
	
<meta charset="utf-8"> 


<style>body { font-family: Ubuntu, sans-serif; }</style>

<script>
function displayCompanyInfo(id)
{
		$.ajax({
		type: 'GET',
		contentType: 'application/json',
		url: apiurl+'company.php/companydetails/'+id,
		dataType: "json",
		success: function(data){
			//alert(JSON.stringify(data));
		JSONtoform(data[0]);	
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('displaycompany error: ' + textStatus+errorThrown);
		}
	});
}
function frm_editCompany(id)
{
displayCompanyInfo(id);	
}
function frm_companyInfo(id)
{
	displayCompanyInfo(id);
	enabledisableform(true);
}
function enabledisableform(isdisable)
{
	$("#txtname").attr("disabled", isdisable);
	$("#txtaddress").attr("disabled", isdisable);
	$("#cmbcountry").attr("disabled", isdisable);
	$("#cmbstate").attr("disabled", isdisable);
	$("#txtpincode").attr("disabled", isdisable);
	$("#txttelephone").attr("disabled", isdisable);
	$("#txtemail").attr("disabled", isdisable);
	$("#txtcurrencysymbol").attr("disabled", isdisable);
	$("#txtfinancialyear").attr("disabled", isdisable);
	$("#cmbadministrator").attr("disabled", isdisable);
	$("#txtcurrency").attr("disabled", isdisable);
	$("#txtdecplaces").attr("disabled", isdisable);
	$("#txtdecsymbol").attr("disabled", isdisable);
	$("#rdshowinmillioins-0").attr("disabled", isdisable);
	$("#rdspacebtwamountandsymbol-0").attr("disabled", isdisable);
	$("#txtdecimalplacesforprint").attr("disabled", isdisable);
}
function JSONtoform(data)
{
		$('#txtname').val(data.name);
		$("#txtaddress").val(data.address);
		$("#cmbcountry").val(data.country);
		$("#cmbstate").val(data.state);
		$("#txtpincode").val(data.pincode);
		$("#txttelephone").val(data.telephoneno);
		$("#txtemail").val(data.email);
		$("#txtcurrencysymbol").val(data.currencysymbol);
		$("#txtfinancialyear").val(data.financialyear);
		$("#cmbadministrator").val(data.administrator);
		$("#txtcurrency").val(data.currencyname);
		$("#txtdecplaces").val(data.decimalplaces);
		$("#txtdecsymbol").val(data.symbolfordecimal);
		$("#rdshowinmillioins-0").val(data.amountsinmillions);
		$("#rdspacebtwamountandsymbol-0").val(data.spacebtwamountandsymbol);
		$("#txtdecimalplacesforprint").val(data.decimalplacsforprint);
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
		    <label for="txtname" class="col-lg-4 control-label">Name</label>
		    <div class="col-lg-4">
		      <input type="text" class="form-control" id="txtname" placeholder="Name">
		   </div>
		</div>
  
		<!-- Textarea -->
		<div class="form-group">
		  <label class="col-lg-4 control-label" for="txtaddress">Address</label>
		  <div class="col-lg-4">
		  	<textarea class="form-control" rows="3" id="txtaddress" name="txtaddress"></textarea>                     
		  </div>
		</div>
		
		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-lg-4 control-label" for="cmbstate">State</label>
		  <div class="col-lg-4">
		    <select id="cmbstate" name="cmbstate" class="form-control">
		      <option>Tamil Nadu</option>
		    </select>
		  </div>
		</div>
		
		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-lg-4 control-label" for="cmbcountry">Country</label>
		  <div class="col-lg-4">
		    <select id="cmbcountry" name="cmbcountry" class="form-control">
		      <option>India</option>
		    </select>
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-lg-4 control-label" for="txtpincode">Pincode</label>
		  <div class="col-lg-4">
		  	<input type="text" class="form-control" id="txtpincode" name="txtpincode" placeholder="Pincode">
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-lg-4 control-label" for="txttelephone">Telephone</label>
		  <div class="col-lg-4">
		  	<input type="text" class="form-control" id="txttelephone" name="txttelephone" placeholder="Telephone Number">
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-lg-4 control-label" for="txtemail">Email</label>
		  <div class="col-lg-4">
		  	<input type="text" class="form-control" id="txtemail" name="txtemail" placeholder="email">
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-lg-4 control-label" for="txtfinancialyear">Financial Year Beginning From</label>
		  <div class="col-lg-4">
		  	<input type="text" class="form-control" value="01/04/13" data-date-format="dd/mm/yy" id="txtfinancialyear" name="txtfinancialyear" readonly />
		    <!--input id="txtfinancialyear" name="txtfinancialyear" placeholder="Financial Start of Year" value="2010-04-01" type="text" class="datepicker" readonly/-->
		  </div>
		</div>
		
		
		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-lg-4 control-label" for="cmbadministrator">Administrator</label>
		  <div class="col-lg-4">
		    <select id="cmbadministrator" name="cmbadministrator" class="form-control">
		      
		    </select>
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-lg-4 control-label" for="txtcurrency">Currency Name</label>
		  <div class="col-lg-4">
		  	<input type="text" class="form-control" id="txtcurrency" name="txtcurrency" placeholder="Currency Name">
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-lg-4 control-label" for="txtcurrencysymbol">Currency Symbol</label>
		  <div class="col-lg-4">
		  	<input type="text" class="form-control" id="txtcurrencysymbol" name="txtcurrencysymbol" placeholder="Currency Symbol">
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-lg-4 control-label" for="txtdecplaces">Decimal Places</label>
		  <div class="col-lg-4">
		  	<input type="number" class="form-control" id="txtdecplaces" name="txtdecplaces" >
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-lg-4 control-label" for="txtdecsymbol">Symbol for Decimal</label>
		  <div class="col-lg-4">
		  	<input type="text" class="form-control" id="txtdecsymbol" name="txtdecsymbol" placeholder="eg: Paise" >
		  </div>
		</div>
		
		<!-- Multiple Radios (inline) -->
		<div class="form-group">
		  <label class="col-lg-4 control-label" for="rdshowinmillioins">Show in Millions</label>
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
		  <label class="col-lg-4 control-label" for="rdspacebtwamountandsymbol">Space between Amount &amp; Symbol</label>
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
		  <label class="col-lg-4 control-label" for="txtdecimalplacesforprint">Decimal Places for Printing</label>
		  <div class="col-lg-4">
		  	<input type="number" class="form-control" id="txtdecimalplacesforprint" name="txtdecimalplacesforprint" >
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

document.getElementById("mtitle").innerHTML="Loading...";
document.getElementById("mbody").innerHTML="<div class=\"progress progress-striped active\">"+
        "<div class=\"progress-bar\" style=\"width: 100%;\"> </div>"+
    "</div>";
document.getElementById("mfooter").innerHTML="";
$('#myModal').modal();

//Datepicker
$('#txtfinancialyear').datepicker();


//Form Validation
function formSubmit(frmedit,id)
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
				updateCompany(id);
			}
			else//create
			{
				var alreadyexist = checkUniqueCompany();
				if (alreadyexist == false)
				{
					document.getElementById("mtitle").innerHTML="Inserting Record...";
					document.getElementById("mbody").innerHTML="<div class=\"progress progress-striped active\">"+
					        "<div class=\"progress-bar\" style=\"width: 100%;\"> </div>"+
					    "</div>";
					document.getElementById("mfooter").innerHTML="";
					$('#myModal').modal();
					addCompany();
				}
			}
		}
}
function formtoJSON()
{
	var q=JSON.stringify({
		'name':$("input#txtname").val(),
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
		'decimalplacsforprint':$("input#txtdecimalplacesforprint").val()
	        });
	 return q;	
}


function updateCompany(id) 
{
	var q=formtoJSON();
	//alert(q);
	$.ajax({
		type: 'PUT',
		contentType: 'application/json',
		url: apiurl+'company.php/updatecompany/'+id,
		dataType: "json",
		data:q,
		success: function(data){
			document.getElementById("mtitle").innerHTML="Updated Record";
			document.getElementById("mbody").innerHTML="Company Updated Successfully";
			document.getElementById("mfooter").innerHTML="<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
			$('#myModal').modal();
			//location.reload();
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('updatecompany error: ' + textStatus+errorThrown);
		}
	});  
}

function addCompany()
{
	var q=formtoJSON();
	$.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: apiurl+'company.php/addcompany',
		dataType: "json",
		data:q,
		success: function(data){
			
	        if(JSON.stringify(data) == '"-1"')
	        {
	        	document.getElementById("mtitle").innerHTML="Alert";
				document.getElementById("mbody").innerHTML="Try Again";
				document.getElementById("mfooter").innerHTML="<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
	        }
	        else
	        {
	        	
	        	document.getElementById("mtitle").innerHTML="Inserted Record";
				document.getElementById("mbody").innerHTML="Company Added Successfully";
				document.getElementById("mfooter").innerHTML="<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
	        	//$('#myModal').modal('hide');
	        	//$('#myModal1').modal();
	        	//alert('Inserted!');
	        	$('#addcompany')[0].reset();
	        }
						   
		},
		error: function(jqXHR, textStatus, errorThrown){
				document.getElementById("mtitle").innerHTML="Error";
				document.getElementById("mbody").innerHTML=generalerror;
				document.getElementById("mfooter").innerHTML="<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
			//alert('addcompany error: ' + textStatus+errorThrown);
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
					     $('#myModal').modal('hide');
		//				})
		},
		error: function(jqXHR, textStatus, errorThrown){
			document.getElementById("mtitle").innerHTML="Error";
			document.getElementById("mbody").innerHTML=generalerror;
			document.getElementById("mfooter").innerHTML="<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
			$('#myModal').modal();
			//alert(generalerror);
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
						        	document.getElementById("mtitle").innerHTML="Insert Failed !!!";
									document.getElementById("mbody").innerHTML="Company Already Exist";
									document.getElementById("mfooter").innerHTML="<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
									$('#myModal').modal();
						        	document.getElementById('txtname').value="";
						        	$('#txtname').focus();
						        }
						    });
			},
			error: function(jqXHR, textStatus, errorThrown){
				document.getElementById("mtitle").innerHTML="Error";
				document.getElementById("mbody").innerHTML=generalerror;
				document.getElementById("mfooter").innerHTML="<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
				$('#myModal').modal();
			}
		});
		
		return found;
}	

</script>
</body>
</html>
