function countCharacter(PId,ShowId,maxchar) {
var char=document.getElementById(PId).value;
var showdata=document.getElementById(PId).value;
var charleng=char.length;
	if (charleng > maxchar) {

		document.getElementById(PId).value = document.getElementById(PId).value.substring(0, maxchar);
	
	}
	if(maxchar-charleng>=0) {
	
	document.getElementById(ShowId).value=maxchar-charleng;

}else{

	document.getElementById(ShowId).value=0;

}
}