<?php 
	include '../breadcrumb.php'; 
?>
<html>
<head>
<meta charset="utf-8">
<script>
function displayStockInfo(id)
{
		$.ajax({
		type: 'GET',
		contentType: 'application/json',
		url: apiurl+'stock.php/getstock/'+id,
		dataType: "json",
		success: function(data){
			//alert(JSON.stringify(data));
		JSONtoform(data[0]);	
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('displaystock error: ' + textStatus+errorThrown);
		}
	});
}
function frm_editstock(id)
{
displaystockInfo(id);	
}
function frm_stockInfo(id)
{
	displaystockInfo(id);
	enabledisableform(true);
}
function enabledisableform(isdisable)
{
	$("#txtname").attr("disabled", isdisable);
	$("#txtalias").attr("disabled", isdisable);
	
}
function JSONtoform(data)
{
		$('#txtname').val(data.name);
		$("#txtalias").val(data.alias);
}	
</script> 
</head>
<body>
	
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
		<legend>Stock Categories
			<?php 
			if($id>-1)
				if($isedit) echo 'Edit Stock';
				else echo 'Stock Info';
			else echo'Create Stock';
			?></legend>

  			
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
			<?php 
			if($id>-1)
				if($isedit)//Edit company 
					{
						echo '<div id="submit_btn_container"style="float:left" onclick="formSubmit(true,'.$id.');">
			    	<label id="btn_label">Update</label>
				</div>';
				echo '<script>frm_editstock('.$_GET['ID'].');</script>';
					}
				else//Display Company Info
					{//no accept btn
					echo '<script>frm_stockInfo('.$_GET['ID'].');</script>';
					}
			else //Create Company
				{
					echo '<div id="submit_btn_container"style="float:left" onclick="formSubmit(false,-1);">
			    	<label id="btn_label">Accept</label>
				</div>';
				}
			?>
			
			<!--div id="submit_btn_container"style="float:left" onclick="addstockcategory();">
			    <label id="btn_label">Accept</label>
			</div---->
			
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
//////////////////////////////////////////////////////////////////////////
// i dont know how this work
function formSubmit(frmedit,id)
{
	
	$("#addstockcategory").validate({
				rules:{
					txtname:{
      					required: true,
      					minlength: 3
    			},
					txtalias:{
						required: true,
						number: true
					},
					
				},
				errorClass: "help-inline"
				
			});
			
			
		if ( $("#addstockcategory").valid())
		{
			if(frmedit)//update
			{
				updatestock(id);
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
function formtoJSON()
{
	var q=JSON.stringify({
		'name':$("input#txtname").val(),
		'address':$("#txtaddress").val(),
		  });
	 return q;	
}
//////////////////////////////////////////////////////////////

function updatestock(id) 
{
	var q=formtoJSON();
	//alert(q);
	$.ajax({
		type: 'PUT',
		contentType: 'application/json',
		url: apiurl+'stock.php/updatestock/'+id,
		dataType: "json",
		data:q,
		success: function(data){
			alert('Updated!');
			//location.reload();
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('updatestock error: ' + textStatus+errorThrown);
		}
	});  
}

function addstockcategories()
{
	var q=formtoJSON();
	$.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: apiurl+'stock.php/addstockcategory',
		dataType: "json",
		data:q,
		success: function(data){
			
	        if(JSON.stringify(data) == '"-1"')
	        {
	        	alert('Try Again');
	        }
	        else
	        {
	        	alert('Inserted!');
	        	$('#addstock')[0].reset();
	        }
						   
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('addstock error: ' + textStatus+errorThrown);
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
function checkUniquestock()
{	
	var found = false;
	$.ajax({
			type: 'GET',
			async: false, 
			contentType: 'application/json',
			url: apiurl+'stock.php/getstock',
			dataType: "json",
			success: function(data){
						    $.each(data, function(i, option) {
						        if(option.name == document.getElementById('txtname').value)
						        {
						        	found = true;
						        	alert("stock already exist");
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


/*function addstockcategory()
{
var name=document.getElementById('txtname').value;
var alias=document.getElementById('txtalias').value;
var companyid = readCookie("ca_companyid");
var createdby=1;
var modifiedby=1;
var q=JSON.stringify
	({
	'name':name,
	'alias':alias,
	'companyid':companyid,
	'createdby':createdby,
	'modifiedby':modifiedby
        });
		//alert(q);
	$.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: apiurl+'stockcategory.php/addstockcategory',
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
}*/
</script>
</body>
</html>
