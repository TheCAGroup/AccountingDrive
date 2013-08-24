<?php 
include '../breadcrumb.php';

makemodal_progress("modalprogress_inserting", "Inserting...");
makemodal_alert("modalinsertedvoucher", "Inserted voucher", "Inserted!");
makemodal_alert("modaltryagain","Alert","Try again");
makemodal_alert("modalgeneralerror","Error","<script>generalerror</script>");
?>
<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Voucher</title>
	</head>
	<body>
		<div class="container">
		<div class="row show-grid">
  		<div class="col-lg-8">
			<div class="well">
			<form class="form-horizontal" method="post" action="#">
				<fieldset>
				
				<!-- Form Name -->
				<legend>Voucher</legend>
				<!-- Select Basic -->
				<div class="input-append">
					
					<div class="col-lg-5">
						<label for="date">Date</label>
				  <input type="text" class="form-control" value="01/04/13" data-date-format="dd/mm/yy" id="txt_date" name="txt_date"/>
				  <label for="fromledger">From</label>
				  <input type="text" id="txt_from" name="txt_from" class="form-control"/><br>
				  <label for="toledger">To</label>
				  <input type="text" id="txt_to" name="txt_to" class="form-control"/>
				  	<label for="amount">Amount</label>
				  	<input type="text" id="txt_toamount" name="txt_toamount" class="form-control"/><br>
				  <br>
				  	<label for="narration">Narration</label></div>
				  	<textarea id="txt_narration" name="txt_narration" class="form-control"/><br>
				  </div>
				<br>
			
				<!-- Button -->
				<div align="center">
				  	<a href="#" class="btn btn-success btn-small"  onclick="insertVoucher();">OK</a>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#" class="btn btn-primary btn-small"  onclick="formCancel();">Cancel</a>
				    		</div>
				
				</fieldset>
			</form>
		</div>
		</div>
	 	
		</body>
		</html>
		<script>
function formtoJSON()
{
	var q=JSON.stringify({
		'date':$("#txt_date").val(),
		'from':$("input#txt_from").val(),
		'to':$("#txt_to").val(),
		'toamount':$("#txt_toamount").val(),
		'narration':$("input#txt_narration").val(),
	        });
	 return q;	
}

function insertVoucher()
{
	//$('#modalinsertedvoucher').modal();
	var q=formtoJSON();
	$.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: apiurl+'voucher.php/insertVoucher',
		dataType: "json",
		data:q,
		success: function(data){
			alert(JSON.stringify(data)); 
	        if(JSON.stringify(data) == '"-1"')
	        {
	        	/*document.getElementById("mtitle").innerHTML="Alert";
				document.getElementById("mbody").innerHTML="Try Again";
				document.getElementById("mfooter").innerHTML="<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";*/
				$('#modaltryagain').modal();
	        }
	        else
	        {
	        /*	
	        	document.getElementById("mtitle").innerHTML="Inserted Record";
				document.getElementById("mbody").innerHTML="Company Added Successfully";
				document.getElementById("mfooter").innerHTML="<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
				*/
				$('#modalprogress_inserting').modal('hide');
	        	$('#modalinsertedvoucher').modal();
	        	//$('#myModal1').modal();
	        	//alert('Inserted!');
	        	
	        	//$('#addcompany')[0].reset();
	        }
						   
		},
		error: function(jqXHR, textStatus, errorThrown){
				/*document.getElementById("mtitle").innerHTML="Error";
				document.getElementById("mbody").innerHTML=generalerror;
				document.getElementById("mfooter").innerHTML="<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
			//alert('addcompany error: ' + textStatus+errorThrown);*/
			$('#modalgeneralerror').modal();
		}
	});
}


function formCancel()
{
	$("#maindiv").load("entrypage.php");
}
</script>
