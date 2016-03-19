function checkall(objForm){
	len = objForm.elements.length;
	var i=0;
	for( i=0 ; i<len ; i++) {
		if (objForm.elements[i].type=='checkbox') {
			objForm.elements[i].checked=objForm.check_all.checked;
		}
	}
}
function checkall_fn(objForm){
	len = objForm.elements.length;
	//alert(""+len);
	var i=0;
	for( i=0 ; i<len ; i++) {
		if (objForm.elements[i].type=='checkbox') {


			objForm.elements[i].checked=objForm.check_all.checked;
		}
	}

		//alert(document.getElementById('dispaly_button').value);
		if(document.getElementById("dispaly_button")!=''){
			if(objForm.check_all.checked==true){
			document.getElementById("dispaly_button").style.display="block";
			}else{
				document.getElementById("dispaly_button").style.display="none";
			}
		}


}

function confirm_submit(objForm) {
		return true;
}

function validcheck(name){
var chObj = document.getElementsByName(name);
var result	=	false;
for(var i=0;i<chObj.length;i++){

	if(chObj[i].checked){
	  result=true;
	  break;
	}
}
  if(!result){
    return false;
  }else{
	 return true;
  }
}
function deleteConfirmFromUser(name) {		
	////////alert("aaaaaa");
	if(validcheck(name)==true) {
		if(confirm("Are you sure you want to delete the record?")) {
			document.getElementById("changeStatus").value="delete";
			return true;  
		} else  {
			return false;  
		}
	}
	else if(validcheck(name)==false) {
		alert("Select at least one check box.");		
		return false;
	}
}

function deleteConfirmFromUser1(name) {		
	////////alert("aaaaaa");
	if(validcheck(name)==true) {
		if(confirm("Are you sure you want to delete the record?")) {
			document.getElementById("changeStatus").value="delete";
			return true;  
		} else  {
			return false;  
		}
	}
	else if(validcheck(name)==false) {
		alert("Select at least one check box.");		
		return false;
	}
}






function sendMessage(name,frm,actions) {		
	
	if(validcheck(name)==true) {
		
		var chObj = document.getElementsByName(name);
		var result	=	false;
		for(var i=0;i<chObj.length;i++){
		
			if(chObj[i].checked){
				
				var getvalue=chObj[i].value;
				chkactive="chkInactiveActive"+getvalue;
			
			if(document.getElementById(chkactive).value==0) {
	
				result=true;
				break;
			  
			}
		}
	}
		  if(result){
			 
			alert("Please uncheck in-active"); 
		    return false;
		    
		  }else{
			 
		document.getElementById(frm).action=actions;
		document.onSubmit();
		return true;
	}
		
}else if(validcheck(name)==false) {
		
		alert("Select at least one check box.");		
		return false;
	}
}

function activateConfirmFromUser(name)
{		
	
	if(validcheck(name)==true)
	{
		if(confirm("Are you sure you want to activate the record?"))
		{
				document.getElementById("changeStatus").value="active";
				
			return true;  
		}
		else 
		{
			return false;  
		}
	}
	else if(validcheck(name)==false)
	{
		alert("Select at least one check box.");		
		return false;
	}
}

function activateConfirmFromRadio(name)
{		
	
	if(validcheck(name)==true)
	{
		if(confirm("Are you sure you want to activate the record?"))
		{
				document.getElementById("changeStatus").value="active";
				
			return true;  
		}
		else 
		{
			return false;  
		}
	}
	else if(validcheck(name)==false)
	{
		alert("Please select a radio button.");		
		return false;
	}
}

function sendemailConfirmFromUser(name)
{		
	////////alert("aaaaaa");
	if(validcheck(name)==true)
	{
		if(confirm("Are you sure you want to send email to subscriber?"))
		{
			return true;  
		}
		else 
		{
			return false;  
		}
	}
	else if(validcheck(name)==false)
	{
		alert("Select at least one check box.");		
		return false;
	}
}

function deactivateConfirmFromUser(name)
{		
	////////alert("aaaaaa");
	if(validcheck(name)==true)
	{
		if(confirm("Are you sure you want to deactivate the record?"))
		{	document.getElementById("changeStatus").value="inactive";
			return true;  
		}
		else 
		{
			return false;  
		}
	}
	else if(validcheck(name)==false)
	{
		alert("Select at least one check box.");		
		return false;
	}
}
function featuredConfirmFromUser(name)
{		
	////////alert("aaaaaa");
	if(validcheck(name)==true)
	{
		if(confirm("Are you sure you want to Featured the record?"))
		{
			return true;  
		}
		else 
		{
			return false;  
		}
	}
	else if(validcheck(name)==false)
	{
		alert("Select at least one check box.");		
		return false;
	}
}
function UnfeaturedConfirmFromUser(name)
{		
	////////alert("aaaaaa");
	if(validcheck(name)==true)
	{
		if(confirm("Are you sure you want to Unfeatured the record?"))
		{
			return true;  
		}
		else 
		{
			return false;  
		}
	}
	else if(validcheck(name)==false)
	{
		alert("Select at least one check box.");		
		return false;
	}
}

function emailConfirmFromUser(name){		
 	if(validcheck(name)==true){
		if(confirm("Are you sure you want to send email ?")){
			return true;  
		} else {
			return false;  
		}
	} else if(validcheck(name)==false){
		alert("Select at least one check box.");		
		return false;
	}
}


function urlConfirmFromUser(name){		
 	if(validcheck(name)==true){
		return true; 
 	} else if(validcheck(name)==false){
		alert("Select at least one check box.");		
		return false;
	}
}


function redirectotherPage(section_id){

	window.location.href='showTemplates.php?section_id='+section_id;

}

function actionPerform(actions,propId,hiddenAtribute,frm) 
{

	document.getElementById(hiddenAtribute).value=propId;
	document.frm.action =actions;
	document.frm.submit();
	
	return true;
}

function actionPerform2(actions,propId,hiddenAtribute,propId1,hiddenAtribute1,frm) 
{

	document.getElementById(hiddenAtribute).value=propId;
	document.getElementById(hiddenAtribute1).value=propId1;
	document.frm.action =actions;
	document.frm.submit();
	
	return true;
}

function InitialSpace(textfieldId)
	{
		var val=document.getElementById(textfieldId).value;
		var InitialSpaceValue = /(^\s)/;
		if(!val.match(InitialSpaceValue))
			{
				return true;
			}
		else
			{
			  return false;
			}
    }
	
function isSpclChar(textfieldId)
{
	var val=document.getElementById(textfieldId).value;
	var iChars = "!@#$%^&*()+=-[]\\;./{}|\":<>,?";
	var ret_val;
   for (var i = 0; i < val.length; i++) 
	  {
		 if (iChars.indexOf(val.charAt(i))!= -1) 
		  {
	           ret_val = false;
          }
	  }
    if(ret_val==false)
	   {
	    return false;
	   }
	  else
	   {
		 return true;   
	   }
}

function isBlank(textfieldId)
{
	var val=document.getElementById(textfieldId).value;
	if(val=="")
	 {
	   return false;
	 }
	else
	 {
	  return true;
	 }
}

function selectbox(textfieldId)
{
	var val=document.getElementById(textfieldId).value;
	if(val==-1)
	 {
	   return false;
	 }
	else
	 {
	  return true;
	 }
}
function setFocus(textfieldId)
{
	document.getElementById(textfieldId).focus();
}

function emailValidator(textfieldId){
	//var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	var val=document.getElementById(textfieldId).value;
	
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\-]+\.(?:[A-Z]{2}|com|in|co.in|org|co.uk|net|edu|gov|mil|biz|info|mobi|name|aero|asia|jobs|museum)$/;
if(val.match(emailExp))
	{
		return true;
	}
	else
	{
		return false;
	}
}
function countlength(textfieldId,leng)
{
	var val=document.getElementById(textfieldId).value;
    
	if(val.length > leng)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function countlength_limit(textfieldId,leng)
{
	var val=document.getElementById(textfieldId).value;
    
	if(val.length <= leng)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function isNumeric(textfieldId)
{
	var val=document.getElementById(textfieldId).value;
	var numericExpression = /^[0-9]+$/;
	if(val.match(numericExpression))
	{
		return true;
	}
	else
	{
		return false;
	}
}

