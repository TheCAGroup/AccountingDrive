function gotocreatecompany()
{
   	$("#maindiv").load(home+"/company/create_company.php");
}

function gotoselectcompany()
{
   	$("#maindiv").load(home+"/company/select_company.php");
}

function gotoupdatecompany(selcomp)
{
	//$("#maindiv").load(home+"/company/create_company.php");
	$("#maindiv").load(home+"/company/create_company.php?ID="+selcomp+"&ISEDIT=TRUE");
	//alert("Loaded");
}
   
function gotoHomePage()
{
   	$("#maindiv").load(home+"/entrypage.php");
}
   
function gotocreatestockcategory()
{
	$("#maindiv").load(home+"/stockcategory/create_stockcategory.php");
}
