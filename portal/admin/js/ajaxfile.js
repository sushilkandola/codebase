 function GetXmlHttpObject(handler){

			var objXMLHttp=null   

			if (window.XMLHttpRequest) 

			{       objXMLHttp=new XMLHttpRequest()  

			}

			else if (window.ActiveXObject)   {  

			objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")   

			} 

			return objXMLHttp

			}
 //xmlHttp11=GetXmlHttpObject() 
 function requestCustomerInfo(delRecodId,constname) {
	 
			//alert("----->>>");
		//var loadvalue='<font style="font-family:verdana; font-size:14px; font-weight:solid; color:red;">Loading.....</font>';
		//document.getElementById("loadingdisplay").innerHTML=loadvalue;
		//document.getElementById("loadingdisplay").style.visibility='visible';

            var sId = delRecodId;
            var  xmlHttp11=GetXmlHttpObject() ;

            xmlHttp11.open("get", "ajax/deleteRecord.php?id=" + sId+"&constValue="+constname, true);
            xmlHttp11.onreadystatechange = function () {
                if (xmlHttp11.readyState == 4) {
						//alert("-----aa->>>"+xmlHttp11.status);
                    if (xmlHttp11.status == 200) {
						
						//alert(xmlHttp11.responseText);
                        displayCustomerInfo(xmlHttp11.responseText);
                    } else {
                        displayCustomerInfo("An error occurred: " + xmlHttp11.statusText); //statusText is not always accurate
                    }
                }            
            };
            xmlHttp11.send(null);
        }
        
        function displayCustomerInfo(sText) {
				//document.getElementById("loadingdisplay").style.visibility='hidden';
            var divCustomerInfo = document.getElementById("deletemessage");
            divCustomerInfo.innerHTML = "Record has been deleted.";
        }

		 
			/*			
			 function showhide1(shovalue,delRecodId,constname){
			
				 document.getElementById(shovalue).style.display="none";
				 requestCustomerInfo(delRecodId,constname);
			 } */


			  function showhide1(shovalue,delRecodId,constname){
				if(confirm("Are you sure you want to delete record")){
				 document.getElementById(shovalue).style.display="none";
				 requestCustomerInfo(delRecodId,constname);
				}
			 }

//This is for delete all record  file.
	function confirm_delete(formvalue,divid) {
		
	
	if(confirm("Are you sure you want to delete -record")){
	
		//var chkId=document.getElementById("delemailid0").value;
		
		//alert("Totalval"+formvalue);
	var val=new Array(); 
	for (i = 0; i < formvalue; i++) {
		var chkId=document.getElementById(divid+''+i);
		//alert('chkIdchkIdchkId'+chkId);
		var chkId=document.getElementById(divid+''+i);
		var chkval=document.getElementById(divid+''+i).checked;

		//var chkId=document.getElementById("delemailid"+i);
		//var chkval=document.getElementById("delemailid"+i).checked;
		//alert("--formvalue--"+formvalue);
		var shovalue="emailid"+i;
		
		if(chkId.checked==true){
			//delId += chkId+",";
				//alert("checked val"+document.getElementById("delemailid"+i).value);
				//document.getElementById("delemailid"+i).bgColor='blue';
				val += chkId.value+",";

				//alert("tessval"+shovalue);
			showhideRecordall(shovalue);

				
		
		}
		
	}
	
	var newStr = val.substring(0, val.length-1);
	DelAllRecord(newStr,divid);

}	
	}


 function DelAllRecord(newStr,divid) {

			//alert("didividdividvid"+divid);
            var DelId = newStr;
            var oXmlHttp = zXmlHttp.createRequest();

            oXmlHttp.open("get", "ajax/delete_all_reg_user.php?id="+DelId+"&divid="+divid, true);
            oXmlHttp.onreadystatechange = function () {
                if (oXmlHttp.readyState == 4) {
						
                    if (oXmlHttp.status == 200) {
						
						//alert(oXmlHttp.responseText);
                        displayCustomerInfo(oXmlHttp.responseText);
                    } else {
                        displayCustomerInfo("An error occurred: " + oXmlHttp.statusText); //statusText is not always accurate
                    }
                }            
            };
            oXmlHttp.send(null);
        }


	 /***********************************************/
	//Paging By AJAX in show page  start here.
	/***********************************************/

			function stateChanged(){ 

			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")   
			{
				//alert("--->>"+document.getElementById("txtResult").innerHTML);
				//alert(xmlHttp.responseText )."--xmlHttp.responseText -->>>>";
				
				document.getElementById("txtResult").innerHTML=xmlHttp.responseText 
					$(document).ready;
				} 

			else {          
				//alert("responseText-->>"+xmlHttp.responseText); 
					
			 
			 }

		
	}



	function htmlData(url, qStr){
		
		var loadvalue='<a href="#"><img src="./resources/images/icons/ajax-loader.gif"/></a>';
		document.getElementById("txtResult").innerHTML=loadvalue;
		//alert("---qStr->>>>"+qStr);
		if (url.length==0)   { 
			
		document.getElementById("txtResult").innerHTML=""; 
		return;   
		}   
		xmlHttp=GetXmlHttpObject()  
		if (xmlHttp==null)   { 

		alert ("Browser does not support HTTP Request");      
		return;  

		} 

		url=url+"?"+qStr;  

		url=url;  
		//alert("----comurlurl>>>>"+url);

		//alert("----stateChanged>>>>"+stateChanged);


		xmlHttp.onreadystatechange=stateChanged;  
		
		xmlHttp.open("GET",url,true) ;   
		
		xmlHttp.send(null);

	}


	/***********************************************/
	//Paging By AJAX  page  End here.
	/***********************************************/

/* hide record in by one */
function showhideRecordall(shovalue){
			
				 document.getElementById(shovalue).style.display="none";
				// requestCustomerInfo(EmailId);
			 }
/* hide record in by one */




