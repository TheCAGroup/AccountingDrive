function openCreateLicenseDialog()
{
        $("#modaldiv").load(home+"/License/create_license.html");
}

function gotogroups()
{
   	$("#contentdiv").load(home+"/Masters/Groups/group.html");
}

function gotoUserCompanyMapping()
{
        $("#maindiv-content").load(home+"/AdminIndex/user_company_mapping.html");
}
function gotoUserRights()
{
        $("#maindiv-content").load(home+"/AdminIndex/user_rights.html");
}
function gotoUserLicense()
{
        $("#maindiv-content").load(home+"/AdminIndex/user_license.html");
}
function gotoCompanyLicense()
{
        $("#maindiv-content").load(home+"/AdminIndex/company_license.html");
}
function openCreateGroupDialog()
{
        $("#modaldiv").load(home+"/Masters/Groups/create_group.html");
}

function openCreateCompanyDialog()
{
   	$("#modaldiv").load(home+"/company/create_company.html");
}

function gotoselectcompany()
{
   	$("#contentdiv").load(home+"/company/select_company.html");
}

function gotoupdatecompany(selcomp)
{
	$("#contentdiv").load(home+"/company/create_company.html?ID="+selcomp+"&ISEDIT=TRUE");
}
function gotodisplaycompany(selcomp)
{
	$("#contentdiv").load(home+"/company/create_company.html?ID="+selcomp);
}   
function gotoHomePage()
{
   	$("#contentdiv").load(home+"/License/license.html");
}
   
function gotocreatestockcategory()
{
	$("#contentdiv").load(home+"/stockcategory/create_stockcategory.html");
}
function gotovoucherentry()
{
	$("#contentdiv").load(home+"/voucher_entry/voucherentry.html");
}
function gotostockjournal()
{
	$("#contentdiv").load(home+"/voucher/stock_journal.html");
}