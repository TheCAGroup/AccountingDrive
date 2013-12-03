
var isSelected = false;
var valuepresent;
var mylist;
var flag=0;
var finalamt = 0;


var confarray=new Array();
function makeconfobject(name,length,coltype,data,divid,fowardformula,backwardformula,allowempty)
	{
	column=new Object();
	column.name=name;
	column.length=length;
	column.coltype=coltype;
	column.data=data;
	column.divid=divid;
	column.fowardformula=fowardformula;
	column.backwardformula=backwardformula;
	column.allowempty=allowempty;
	confarray.push(column);
	}
	
function starthere(inlist)
{
	createOption(inlist,"");
	mylist=inlist;
	createCell("mysource",1,1);
}


function createCell(tblname, rowno, colno)
{
	var table = document.getElementById(tblname);
	
	if(document.getElementById("div"+tblname+"[" + (rowno) + "]["+(colno)+"]") == null)
	{
		//console.log("Inside if");
		//NO DIV
		//check if row exists
		if(table.rows[rowno] == null)
		{//row does not exist
			//create row & columns
			var row=table.insertRow(-1);
			var colCount = table.rows[0].cells.length;
			for(i=0;i<colCount;i++)
				row.insertCell(-1);
		}
		var dyndiv = document.createElement("div");
		var rowCount = table.rows.length;
		var cell = table.rows[rowCount-1].cells[colno-1];
		dyndiv.id = "div"+tblname+"[" + (rowCount-1) + "]["+(colno)+"]";

		dyndiv.innerHTML=maketextbox(tblname,rowno,colno);
										
		cell.appendChild(dyndiv);
		$('#txtbx').focus();	
	}
	else
	{//div exist - change label to textbox(make cell editable)
		lblToTb(tblname,rowno,colno);
		
	}
	

}
			
function itemKeydown(tblname,rowno,colno)
{
	//window.isSelected = false;
	//Validation
	if (colno == 2 || colno == 4 || colno == 5)
	{
		//190 - Dot, 35 - End, 27 - Esc. 8 - Backspace
		if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 ) && event.keyCode != 8 && event.keyCode != 35 && event.keyCode != 27 && event.keyCode != 190) {
            event.preventDefault(); 
        }  
	}
	//End Validation
	
	
	
	var table = document.getElementById(tblname);
	
	if((event.keyCode == 13)||(event.keyCode == 9))//13 is enter key, 9 is tab, 
	{
		//check if end of list reached
		if (colno == 1 ) 
		{
			if ($('#txtbx').val().trim().length == 0)
			{
				if (document.getElementById("div"+tblname+"["+rowno+"]["+(colno+1)+"]")==null)
				{
					tbToLbl(tblname,rowno,colno);
					
					//window.isEndOfList = "true";
					if (tblname == "mysource")
					{
						window.mysource_lastrow = rowno;
						window.mysource_lastcol = colno;
						createCell("mydest",1,1);
					}
					else
					{
						//Accept - Yes or no dialog
						//confirm('Are you sure');
						//$('#modalacceptchange').modal();
						//var php_var = "<?php echo $callbackvalue; ?>";
						//document.getElementById("lbl"+tblname+"["+rowno+"]["+colno+"]").innerText=php_var;
						
						/*
						for (i=1; i<=rowno; i++)
						{
							for(j=1; j<=5; j++)
							{
								alert(document.getElementById("lbl"+tblname+"["+i+"]["+j+"]").innerText);
								
							}
						}*/
						
						
						var data = [];
						var val;
						for (var i=1; i<=rowno; i++)
						{
							for(var j=1; j<=5; j++)
							{
								val = document.getElementById("lbl"+tblname+"["+i+"]["+j+"]").innerText;
								if (j==1 & val=="")
								break;
								data.push({value: val});
								
							}
						}
						
						
						
						
						var enddata = [];
						for (var i=0;i<data.length-4;i=i+5)
						{
							enddata.push({"name":data[i].value,"qty":data[i+1].value,"units":data[i+2].value,"rate":data[i+3].value,"amt":data[i+4].value});
						}
						
						var finaldata = [];
						finaldata.push({"result":enddata});
						
						//halfway
						var a=JSON.stringify(finaldata);
						//alert(a);
						//alert(enddata.length);
						addjournalentry(a);
						
					}
					return;
				}
				else
				{
					$('#txtbx').focus();
					return;
				}
			}
			else
			{
				if(!window.valuepresent)
				{
					alert("Spelling Error !!!");
					return;
				}
			}
			
		}
		
		
		//if amount is not entered do nothing
		if ((colno == 5 ) && ($('#txtbx').val().trim().length == 0))
		{
			return;
		}
		//Do the processing	
		tbToLbl(tblname,rowno,colno);
		if (colno >= table.rows[0].cells.length)
		{
			createCell(tblname,rowno+1,1);
		}
		else
		{
			createCell(tblname,rowno,colno+1);
		}
		
		//Rate entered

		if (colno == 4)
		{
			var qty = document.getElementById("lbl"+tblname+"["+rowno+"]["+(colno-2)+"]");
			var rate = document.getElementById("lbl"+tblname+"["+rowno+"]["+colno+"]");
			
			if((qty.innerText!="") && (rate.innerText!=""))
				$('#txtbx').val(parseInt(qty.innerText)*parseInt(rate.innerText));
		}
		
		//Amount entered
		if (colno == 5)
		{
			var qty = document.getElementById("lbl"+tblname+"["+rowno+"]["+(colno-3)+"]");
			var rate = document.getElementById("lbl"+tblname+"["+rowno+"]["+(colno-1)+"]");
			var amt = document.getElementById("lbl"+tblname+"["+rowno+"]["+colno+"]");
			
			
			if((qty.innerText!="") && (amt.innerText!=""))
				rate.innerText=(parseInt(amt.innerText)/parseInt(qty.innerText)).toFixed(2);
			if((rate.innerText!="") && (amt.innerText!=""))
				qty.innerText=(parseInt(amt.innerText)/parseInt(rate.innerText)).toFixed(2);
		}
		
		if (colno == 2)
		{
			var qty = document.getElementById("lbl"+tblname+"["+rowno+"]["+(colno)+"]");
			var rate = document.getElementById("lbl"+tblname+"["+rowno+"]["+(colno+2)+"]");
			var amt = document.getElementById("lbl"+tblname+"["+rowno+"]["+(colno+3)+"]");
			
			if((rate!=null))
			{
				if((qty.innerText!="") && (rate.innerText!=""))
				amt.innerText=(parseInt(qty.innerText)*parseInt(rate.innerText)).toFixed(2);
			}
			
		}
		
	}
	
	else if(((event.keyCode == 8) && ($('#txtbx').val().trim().length == 0)) || ((event.keyCode == 8) && (window.isSelected))) // 8 - backspace
	{
		//alert("Inside prevent default");
		//if($('#txtbx').val().trim().length<=0)
		 event.preventDefault();
		 
		//check if first column
			//if so, check if first row
				//if so, do nothing
			//else move to prev row
		//if not, move to prev col
		
		//alert (colno + "," + rowno);
		//if(document.getElementById('txtbx').value!="")
			//z	return;
			
		
		if (tblname == "mydest" && rowno == 1 && colno == 1)
		{
			tbToLbl(tblname,rowno,colno);
			createCell("mysource",window.mysource_lastrow,window.mysource_lastcol); 
		}
		else if (colno == 1)
		{ 
			if(rowno != 1)
			{
				tbToLbl(tblname,rowno,colno);
				colLength = table.rows[0].cells.length;
				createCell(tblname,rowno-1,colLength);
			}
		}
		else
		{
			tbToLbl(tblname,rowno,colno);
			createCell(tblname,rowno,colno-1);
		}
	}
	else if ((event.keyCode == 27) && (window.isSelected)) // 27 - ESC
	{
		$('#txtbx').val("");
		window.isSelected=false;
	}
	else if(((event.keyCode == 38) || (event.keyCode == 40)) && (colno==1)) //38 - Up arrow, 40 - Down arrow
	{
		event.preventDefault();
		$('#selectbasic').focus();
		$('#selectbasic').prop("selectedIndex",0);
		
	}
	else if (event.keyCode == 35)
	{
		window.isSelected = false;
	}
	else
	{
		//if(event.keyCode!=8)
		//	window.isSelected=false;
		//alert("1");
		
		//		console.log(event.keyCode);
		if(colno==1)
		{
			if((event.keyCode>=48 && event.keyCode<=57) || (event.keyCode>=65 && event.keyCode<=90) || (event.keyCode>=97 && event.keyCode<=122) || event.keyCode==8)
			{
				
				var searchpattern="";
				if(event.keyCode==8 && $('#txtbx').val().trim().length>0)//8 - bsp
					searchpattern=$('#txtbx').val().substring(0,$('#txtbx').val().length-1);
				else
					if(!window.isSelected)
						searchpattern=$('#txtbx').val()+String.fromCharCode(event.keyCode);
					else
						searchpattern=String.fromCharCode(event.keyCode);
					 
				//alert(searchpattern);
				var filteredlist=getfilteredlist(window.mylist,searchpattern);
				//alert(filteredlist.length);
				
				if ((filteredlist.length==0) && (event.keyCode!=8))
				{		
					event.preventDefault();
					if(!window.isSelected)
					{
						searchpattern=searchpattern.substring(0,searchpattern.length-1);
						filteredlist=getfilteredlist(window.mylist,searchpattern);
					}
						
				}
				else
				{
					createOption(filteredlist,"");
				}
				
				//alert(event.isDefaultPrevented());
				//Check if the item entered in textbox is present in the list
				if(isValuePresent(filteredlist,searchpattern))
				{
					window.valuepresent=true; 
				}
				else
				{
					window.valuepresent=false;
				}
				//End
			}
			else
			{
				event.preventDefault();
			}
		}
	}
	//$('#txtbx').focus();
	
}
function tbToLbl(tblname,rowno,colno)
{
	var txt_val = document.getElementById('txtbx').value;
	var divid = "div"+tblname+"[" + (rowno) + "]["+(colno)+"]";
	currentdiv = document.getElementById(divid);
	currentdiv.innerHTML="<label id='lbl"+tblname+"["+rowno+"]["+colno+"]'><font size='3px'>"+txt_val+"</font></label>";
}
function lblToTb(tblname,rowno,colno)
{
	var lbl_val = document.getElementById("lbl"+tblname+"["+rowno+"]["+colno+"]").innerText;
	var divid = "div"+tblname+"[" + rowno + "]["+ colno +"]";
	currentdiv = document.getElementById(divid);
	currentdiv.innerHTML=maketextbox(tblname,rowno,colno);
	$('#txtbx').focus();
	$('#txtbx').val(lbl_val);
	$('#txtbx').select();
	window.isSelected = true;
	
	
	if (colno!=1)
	{
		loadSideLink();
	}
}

function calcTotal()
{
	if((colno==5)&&(tblname == "mysource")&&(window.isSelected == false))
		{
			if(action=="+")
			{
				var amt = document.getElementById("lbl"+tblname+"["+rowno+"]["+colno+"]").innerText;
				window.finalamt	= window.finalamt + parseInt(amt);
				document.getElementById("tblfinalamt").innerText = window.finalamt;
			}
			else if (action=="-")
			{
				
			}
			
		}
}

function maketextbox(tblname,rowno,colno)
{ 
	return "<input type='text' id='txtbx' onkeydown=\"itemKeydown('"+tblname+"',"+rowno+","+colno+");\" class='form-control' style='width:100%;' />";
}

function makeselectbox()
{
	return "<select id='selectbasic' size='30' onkeypress='getSelectedValue(event); ' style='width:100%;' class='form-control'></select>";
}

function getSelectedValue(event)
{
	var chCode = ('charCode' in event) ? event.charCode : event.keyCode;
	if(chCode == 13) //13- Enter Key
	{
		$('#txtbx').val($('#selectbasic').find(':selected').text());
		window.valuepresent = true;
		$('#txtbx').focus();
		loadSideLink();
	}
	else
	{
		$('#txtbx').focus();
		$('#txtbx').val($('#txtbx').val()+String.fromCharCode(chCode));
		createOption(window.mylist,$('#txtbx').val());
	}
}

function loadSideLink()
{
	document.getElementById("divlist").innerHTML = "";
}

/*
function changeSideBar(colno)
{
	if (colno == 1)
	{
		//Display listbox
		document.getElementById("divlist").innerHTML = makeselectbox();
		var searchvalue=document.getElementById('txtbx').value;
		createOption(window.mylist,searchvalue)
	
		
	}
	else
	{
		loadSideLink();
	}
}
"<div class='alert'><strong>Warning!</strong><br><br> Spelling Error !!!</div>"
	*/
function createOption(list,searchvalue)
{
	
	var filteredlist;
	if(searchvalue=="")
	{
		filteredlist = list.slice(0);
		document.getElementById("divlist").innerHTML = makeselectbox(); //Create select box
	}
		
	else
	{
		filteredlist = getfilteredlist(list,searchvalue);
	}
		
	/*
	var result=true;
	if(filteredlist.length<1)
	{	//wrong entry
		filteredlist = getfilteredlist(list,searchvalue.substring(0,searchvalue.length-1));//list.slice(0);
		result=false;
	}*/
		
	var combo = document.getElementById("selectbasic");
	combo.options.length = 0; // Clear selectbox
    $.each(filteredlist, function(i, option) {
		var myoption = document.createElement("option");
	    myoption.text = option.name;
	    myoption.value = option.id;
	    try {
	        combo.add(myoption, null); //Standard 
	    }catch(error) {
	        combo.add(myoption); // IE only
		}	
	 });
	 //return result;
	 return true;
}





function getfilteredlist(fulllist,searchpattern)
{
	//alert("filterdata: "+searchpattern);
	var result = fulllist.slice(0);
	var index=0;					
	var removed=0;
	$.each(fulllist, function(i, option) {
		var str = option.name;
		var l_str = str.toLowerCase();
		var l_searchpattern = searchpattern.toLowerCase();
		if(l_str.indexOf(l_searchpattern)==-1 || l_str.indexOf(l_searchpattern)>=1)//not matched - Search for strings that doesn't start with the search pattern 
		{
			result.splice( index-removed , 1 );
			removed++;
		}
		index=index+1;	
	 });
	return result;	
}

function isValuePresent(list,searchpattern)
{
	var result=false;
	$.each(list, function(i, option) {
		var str = option.name;
		var l_str = str.toLowerCase();
		var l_searchpattern = searchpattern.toLowerCase();
		if (l_str == l_searchpattern)
		{
			result = true;
		}
	});
	return result;
}

function addjournalentry(jdata)
{
	$.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: apiurl+'stockjournal.php/addjournalentry',
		dataType: "json",
		data:jdata,
		success: function(data){
			
			//console.log(data);
			alert(JSON.stringify(data));
			
			/*
	        if(JSON.stringify(data) == '"-1"')
	        {
	        	$('#modaltryagain').modal();
	        }
	        else
	        {
	        
				$('#modalprogress_inserting').modal('hide');
	        	$('#modalinsertedrecord').modal();
	        	
	        	$('#addcompany')[0].reset();
	        }
			*/			   
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert("Error");
			//$('#modalgeneralerror').modal();
		}
	});
}
