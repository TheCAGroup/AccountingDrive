function gotogroups()
{
   	$("#maindiv").load(home+"/Masters/Groups/group.html");
}

function openCreateSingleGroupDialog()
{
        $("#modaldiv").load(home+"/Masters/Groups/create_single_group.html");
}

function openCreateMultipleGroupDialog()
{
        $("#modaldiv").load(home+"/Masters/Groups/create_multiple_group.html");
}
function gotocreatecompany()
{
   	$("#maindiv").load(home+"/create_company.html");
}

function gotoselectcompany()
{
   	$("#maindiv").load(home+"/company/select_company.html");
}

function gotoupdatecompany(selcomp)
{
	$("#maindiv").load(home+"/company/create_company.html?ID="+selcomp+"&ISEDIT=TRUE");
}
function gotodisplaycompany(selcomp)
{
	$("#maindiv").load(home+"/company/create_company.html?ID="+selcomp);
}   
function gotoHomePage()
{
   	$("#maindiv").load(home+"/entrypage.html");
}
   
function gotocreatestockcategory()
{
	$("#maindiv").load(home+"/stockcategory/create_stockcategory.html");
}
function gotovoucherentry()
{
	$("#maindiv").load(home+"/voucher_entry/voucherentry.html");
}
function gotostockjournal()
{
	$("#maindiv").load(home+"/voucher/stock_journal.html");
}