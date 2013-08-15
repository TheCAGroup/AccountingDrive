<?php 
$_SESSION['ca_userid']=1;
?>
<html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cloud Accounting</title>
<!-- test harini-->
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <!--link href="css/datepicker.css" rel="stylesheet"-->
    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="jquery_validation/dist/jquery.validate.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-modal.js"></script>
    <!-- Custom styles for this template -->
    <link href="bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
<link rel="stylesheet" type="text/css" href="./css/button.css">

<script type="text/javascript" src="bootstrap/js/dropdown.js"></script>
<script src="js/navigation.js"></script>
<script src="js/config.js"></script>
<script type="text/javascript" src="js/cookie.js"></script>

  </head>

  <body>

    <!-- Wrap all page content here -->
    <div id="wrap">

	    <!-- Fixed navbar -->
	    <div class="navbar navbar-fixed-top">
	      <div class="container">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#" onclick="gotoHomePage();">Cloud Accounting</a>
		<div class="nav-collapse collapse">
		  <ul class="nav navbar-nav">
		    <li class="dropdown">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Masters <b class="caret"></b></a>
		      <ul class="dropdown-menu">
		        <li class="nav-header"><b>&nbsp;&nbsp;Accounts Info</b></li>
		        <li><a href="#">Groups</a></li>
		        <li><a href="#">Ledgers</a></li>
			<ul><li class="divider"></li></ul>
			<li><a href="#">Voucher Types</a></li>
		        <li class="divider"></li>
		        <li class="nav-header"><b>&nbsp;&nbsp;Inventory Info</b></li>
		        <li><a href="#">Stock Groups</a></li>
		        <li><a onclick="gotocreatestockcategory();">Stock Categories</a></li>
			<li><a href="#">Stock Items</a></li>
			<ul><li class="divider"></li></ul>
			<li><a href="#">Units of Measure</a></li>
			<ul><li class="divider"></li></ul>
			<li><a href="#">Voucher Types</a></li>
		      </ul>
		    </li>
		    <li class="dropdown">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Quick Setup <b class="caret"></b></a>
		      <ul class="dropdown-menu">
		        <li><a href="#">Excise for Manufacturer</a></li>
		        <li><a href="#">Excise for Dealer</a></li>
			<li class="divider"></li>
		        <li><a href="#">Value Added Tax</a></li>
			<li class="divider"></li>
		        <li><a href="#">Tax Deducted at Source</a></li>
		        <li><a href="#">Tax Collected at Source</a></li>
			<li class="divider"></li>
		        <li><a href="#">Service Tax</a></li>
		      </ul>
		    </li>
		    <li class="dropdown">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transactions <b class="caret"></b></a>
		      <ul class="dropdown-menu">
		        <li><a href="#">Accounting Vouchers</a></li>
		        <li><a href="#">Inventory Vouchers</a></li>
		        <li><a href="#">Order Vouchers</a></li>
		      </ul>
		    </li>
		    <li class="dropdown">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Utilities <b class="caret"></b></a>
		      <ul class="dropdown-menu">
		        <li><a href="#">Import of Data</a></li>
		        <li><a href="#">Banking</a></li>
		      </ul>
		    </li>
		    <li class="dropdown">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <b class="caret"></b></a>
		      <ul class="dropdown-menu">
		        <li><a href="#">Balance Sheet</a></li>
		        <li><a href="#">Profit &amp; Loss A/c</a></li>
		        <li><a href="#">Stock Summary</a></li>
		        <li><a href="#">Ratio Analysis</a></li>
		      </ul>
		    </li>
		    <li class="dropdown">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Display <b class="caret"></b></a>
		      <ul class="dropdown-menu">
		        <li><a href="#">Trial Balance</a></li>
		        <li><a href="#">Day Book</a></li>
			<li class="divider"></li>
		        <li><a href="#">Accounts Book</a></li>
		        <li><a href="#">Statements of Accounts</a></li>
			<li class="divider"> </li>
			<li><a href="#">Inventory books</a></li>
		        <li><a href="#">Statements of Inventory</a></li>
			<li class="divider"> </li>
		        <li><a href="#">Cash/Funds Flow</a></li>
		        <li><a href="#">Receipts and Payments</a></li>
			<li class="divider"> </li>
		        <li><a href="#">List of Accounts</a></li>
		        <li><a href="#">Exception Reports</a></li>
		      </ul>
		    </li>
		  </ul>
		  <ul class="nav navbar-nav pull-right">
		    <li class="active"><a href="#">Login</a></li>
		  </ul>
		</div><!--/.nav-collapse -->
	      </div>
	    </div>
    <!--Container-->
    <div class="container" id="maindiv">

     </div> <!-- /container -->
</div><!--/Wrapper-->
<!----footer----->

<div id="footer">
      <div class="container">
        <p class="text-muted credit">Copyright © Cloud Solutions Pvt. Ltd.</p>
      </div>
    </div>

<!----footer----->

<script type="text/javascript">

        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
            $("#maindiv").load("entrypage.php");
        });

</script>
<!-- test --->  

</body></html>
