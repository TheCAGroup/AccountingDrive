<?php 
include 'breadcrumb.php'; 
?>
	<html>
	<body>
		<div>
	<!--row-->
	<div class="row show-grid">
  		<div class="col-lg-8">
		<!-- Main component for a primary marketing message or call to action -->
   		<div class="jumbotron">
        		<h1>Cloud Accounting</h1>
        		<p>Organize all your business finances in one place.</p>
        		<p>
          		<a class="btn btn-large btn-primary" href="#">Start Now »</a>
        		</p>
      		</div>
  		</div>
	 	<div class="col-lg-4">
			<div class="span3 sb-fixed">
		   		<div class="well sidebar-nav">
					<ul class="nav nav-pills nav-stacked">
			 		 	<li><a href="#" onclick="gotoselectcompany();">Select Company</a></li>
			 		 	<?php
			 		 	$perm=$_SESSION["ca_permissions"];
			 		 	if($perm['company'][0]=='1')
						{
			 		 	?>
			 		 	<li><a href="#" onclick="gotocreatecompany();">Create Company</a></li>
			 		 	<?php
						}?>
			 		 	<li><a href="#">Select Period</a></li>
			 		 	<li><a href="#" onclick="gotocompanyinfo();">User Profile</a></li>
			 		 	<li><a href="#">Features</a></li>
			 		 	<li><a href="#">Configure</a></li>
					</ul>   
				</div>
			</div>

	  	</div>
	</div><!--/row-->
	</div>
	</body>	
	</html>