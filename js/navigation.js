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
	$("#maindiv").load(home+"/company/create_company.php?ID="+selcomp+"&ISEDIT=TRUE");
}
function gotodisplaycompany(selcomp)
{
	$("#maindiv").load(home+"/company/create_company.php?ID="+selcomp);
}   
function gotoHomePage()
{
   	$("#maindiv").load(home+"/entrypage.php");
}
   
function gotocreatestockcategory()
{
	$("#maindiv").load(home+"/stockcategory/create_stockcategory.php");
}

function gotostockjournal()
{
	$("#maindiv").load(home+"/voucher/stock_journal.php");
}
