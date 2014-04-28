function openCreateLicenseDialog()
{
        $("#modaldiv").load(home+"/License/create_license.html");
}
function openSelectPeriodDialog()
{
        $("#modaldiv").load(home+"/Company/select_period.html");
}
function gotoGroups()
{
   	$("#contentdiv").load(home+"/Masters/Groups/group.html");
}

function gotoLedgers()
{
   	$("#contentdiv").load(home+"/Masters/Ledger/ledger.html");
}

function gotoVoucherTypes()
{
   	$("#contentdiv").load(home+"/Masters/Voucher%20Types/vouchertype.html");
}

function gotoStockGroups()
{
   	$("#contentdiv").load(home+"/Masters/Stock%20Groups/stockgroup.html");
}

function gotoStockCategories()
{
   	$("#contentdiv").load(home+"/Masters/Stock%20Categories/stockcategory.html");
}

function gotoStockItems()
{
   	$("#contentdiv").load(home+"/Masters/Stock%20Items/stockitem.html");
}

function gotoUnitsOfMeasure()
{
   	$("#contentdiv").load(home+"/Masters/Units%20of%20Measurement/units.html");
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

function openCreateLedgerDialog()
{
        $("#modaldiv").load(home+"/Masters/Ledger/create_ledger.html");
}

function openCreateVoucherTypeDialog()
{
        $("#modaldiv").load(home+"/Masters/Voucher%20Types/create_vouchertype.html");
}

function openCreateStockGroupDialog()
{
        $("#modaldiv").load(home+"/Masters/Stock%20Groups/create_stockgroup.html");
}

function openCreateStockCategoryDialog()
{
        $("#modaldiv").load(home+"/Masters/Stock%20Categories/create_stockcategory.html");
}

function openCreateStockItemDialog()
{
        $("#modaldiv").load(home+"/Masters/Stock%20Items/create_stockitem.html");
}

function openCreateUnitDialog()
{
        $("#modaldiv").load(home+"/Masters/Units%20of%20Measurement/create_unit.html");
}

function openCreateGodownDialog()
{
        $("#modaldiv").load(home+"/Masters/Godown/create_godown.html");
}

function openAccountingFeaturesDialog()
{
        $("#modaldiv").load(home+"/Masters/accounting_features.html");
}

function openMasterConfigurationDialog()
{
        $("#modaldiv").load(home+"/Masters/master_configuration.html");
}


function openCreateCompanyDialog()
{
   	$("#modaldiv").load(home+"/Company/create_company.html");
}

function openEditCompanyDialog()
{
   	$("#modaldiv").load(home+"/Company/edit_company.html");
}

function openSelectCompanyDialog()
{
   	$("#modaldiv").load(home+"/Company/select_company.html");
}

function gotoupdatecompany(selcomp)
{
	$("#contentdiv").load(home+"/Company/create_company.html?ID="+selcomp+"&ISEDIT=TRUE");
}
function gotodisplaycompany(selcomp)
{
	$("#contentdiv").load(home+"/Company/create_company.html?ID="+selcomp);
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