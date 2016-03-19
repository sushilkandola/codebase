 function sendRequest() {
	//var loadvalue='<font style="font-family:verdana; font-size:14px; font-weight:solid; color:red;">Loading.....</font>';
		//document.getElementById("divStatus").innerHTML=loadvalue;
//alert("----->>>");
		 document.getElementById("divStatus").innerHTML="Loading-------";
			//alert("----->>>");
            var oForm = document.forms[0];
			
            var sBody = getRequestBody(oForm);
        // create object
            var oXmlHttp = zXmlHttp.createRequest();
		// send  request to url 
            oXmlHttp.open("post", oForm.action, true);
            oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
           
            oXmlHttp.onreadystatechange = function () {

                if (oXmlHttp.readyState == 4) {
					 if (oXmlHttp.status == 200) {
						//alert(oXmlHttp.responseText);
						   saveResult(oXmlHttp.responseText);

                    } else {
						saveResult(oXmlHttp.statusText);
                    }
                }            
            };
            oXmlHttp.send(sBody);        
        }
        
        function getRequestBody(oForm) {
            var aParams = new Array();
            
            for (var i=0 ; i < oForm.elements.length; i++) {
                var sParam = encodeURIComponent(oForm.elements[i].name);
                sParam += "=";
                sParam += encodeURIComponent(oForm.elements[i].value);
                aParams.push(sParam);
            } 
            
            return aParams.join("&");        
        }
        
        function saveResult(sMessage) {
            var divStatus = document.getElementById("divStatus");
            //divStatus.innerHTML = "Request completed: " + sMessage;   
			divStatus.innerHTML = sMessage;            
        }

/***********************************************/
	// show Templaes  start here. 
/***********************************************/
 function Inint_AJAX() {
try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
alert("XMLHttpRequest not supported");
return null;
};

function tempName(){

				
	if(document.getElementById("sectionid").value=="-1"){
					alert("Please select option  value.");
					document.getElementById("sectionid").focus();
				return false;
				}
		
				if(document.getElementById("sectionid").value!="-1"){
					//alert("--->>");
					document.getElementById("showAjaxVlue").style.display="none";
					
				
				} 
				
var loadvalue='<a href="#"><img src="./resources/images/icons/ajax-loader.gif"/></a>';
		document.getElementById("showtemplates").innerHTML=loadvalue;

	var CatId1= document.getElementById("sectionid").value;
	
	 var sId = CatId1;
	//var value = showsubplace;
var req_http = Inint_AJAX();
req_http.open("GET", "./ajax/showtempComboAjax.php?id=" + sId,true); //make connection
req_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1"); // set Header
req_http.onreadystatechange = function () {

 if (req_http.readyState==4) {
	      if (req_http.status==200) {
		  	  var divCustomerInfo = document.getElementById("showtemplates");
			  
            divCustomerInfo.innerHTML = req_http.responseText;
          }
 }
};


req_http.send(null); //send value


	

}



/***********************************************/
	//  show Templaes end here.
/***********************************************/