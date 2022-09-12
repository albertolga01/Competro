/* SCRIPTS! */
<!--BUSCADOR -->
function SearchPemex(){
  	if (document.SearchWebsite.criteria.value == ''){
	  alert('Escriba la(s) palabra(s) que desea buscar.');
	  document.SearchWebsite.criteria.focus();
	 return //false;
	}
	else{
	//return true
	document.SearchWebsite.submit();
	}
  }
//-->
<!--VALIDACION  BUZON-->
function no_error()
{ return true; }
window.onerror=no_error;
function emailCheck (emailStr) {
	var emailPat=/^(.+)@(.+)$/
	var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"
	var validChars="\[^\\s" + specialChars + "\]"
	var quotedUser="(\"[^\"]*\")"
	var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
	var atom=validChars + '+'
	var word="(" + atom + "|" + quotedUser + ")"
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
	var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
	var matchArray=emailStr.match(emailPat)
	if (matchArray==null) {
		return false
	}

	var user=matchArray[1]
	var domain=matchArray[2]

	if (user.match(userPat)==null) {
	    return false
	}

	var IPArray=domain.match(ipDomainPat)
	if (IPArray!=null) {
		  for (var i=1;i<=4;i++) {
		    if (IPArray[i]>255) {
			return false
		    }
	      }
		  return true
	}

	var domainArray=domain.match(domainPat)
	if (domainArray==null) {
	    return false
	}

	var atomPat=new RegExp(atom,"g")
	var domArr=domain.match(atomPat)
	var len=domArr.length

	if (domArr[domArr.length-1].length<2 || 
	    domArr[domArr.length-1].length>3) {
	   return false
	}

	if (len<2) {
	   return false
	}

	return true;
}
function CheckForm(){
	if (document.Add.MailBoxTypeId.value == 0){
	  alert('El tipo de mensaje es requerido');
	  document.Add.MailBoxTypeId.focus();
	  return;
	}	
	if (document.Add.Name.value == ''){
	  alert('El nombre es requerido');
	  document.Add.Name.focus();
	  return;
	}
	if (document.Add.Ocupation.value == ''){
	  alert('El Organismo es requerido');
	  document.Add.Ocupation.focus();
	  return;
	}
	if (document.Add.Message.value == ''){
	  alert('El mensaje es requerido');
	  document.Add.Message.focus();
	  return;
	}	
	if (document.Add.Email.value == ''){
	  alert('El email es requerido');
	  document.Add.Email.focus();
	  return;
	}	
	if (document.Add.Email.value != ''){
		if (!emailCheck(document.Add.Email.value)){
	  	alert('Escriba una dirección de email válida.');
	  	document.Add.Email.focus();
	  	return;
		}
	}	
	if (document.Add.Message.value != '')
	if (document.Add.Message.value.length > 3999){
	  alert('El mensaje debe ser menor de 3999 caractares');
	  document.Add.Message.focus();
	  return;
	}
  document.Add.submit();
}
<!-- EMAIL-->
function CheckFormEmail(){
	if (document.Add.Name.value == ''){
	  alert('El nombre es requerido');
	  document.Add.Name.focus();
	  return;
	}
	if (document.Add.Email.value == ''){
	  alert('El email de origen es requerido');
	  document.Add.Email.focus();
	  return;
	}	
	if (document.Add.Email.value != ''){
		if (!emailCheck(document.Add.Email.value)){
	  	alert('Escriba una dirección de email válida.');
	  	document.Add.Email.focus();
	  	return;
		}
	}
	if (document.Add.EmailDest.value == ''){
	  alert('El email destino es requerido');
	  document.Add.EmailDest.focus();
	  return;
	}	
	if (document.Add.EmailDest.value != ''){
		if (!emailCheck(document.Add.EmailDest.value)){
	  	alert('Escriba una dirección de email válida.');
	  	document.Add.EmailDest.focus();
	  	return;
		}
	}	
	if (document.Add.Message.value != '')
	if (document.Add.Message.value.length > 3999){
	  alert('El mensaje debe ser menor de 3999 caractares');
	  document.Add.Message.focus();
	  return;
	}
  document.Add.submit();
}	
//-->
/*******************************************
PARA LOS MENUS Y TABLAS CON ROLLOVER
Utiliza los scripts Sons of SuckerFish
http://www.htmldog.com/articles/suckerfish/
Por Patrick Griffiths y Dan Webb
*******************************************/
<!--//--><![CDATA[//><!--
sfHover = function() {
	var sfEls = document.getElementById("nav").getElementsByTagName("li");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
sfHover2 = function() {
	var sfEls = document.getElementById("nav2").getElementsByTagName("li");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
sfHover3 = function() {
	var sfEls = document.getElementById("nav3").getElementsByTagName("li");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
/*sfHover3 = function() {
	var sfEls = document.getElementById("content").getElementsByTagName("TR");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}*/
if (window.attachEvent) window.attachEvent("onload", sfHover);
if (window.attachEvent) window.attachEvent("onload", sfHover2);
if (window.attachEvent) window.attachEvent("onload", sfHover3);
//--><!]]>
/*************************************************************************
    This code is from Dynamic Web Coding at dyn-web.com
    Copyright 2004-5 by Sharon Paine 
    See Terms of Use at www.dyn-web.com/bus/terms.html
    regarding conditions under which you may use this code.
    This notice must be retained in the code as is!
*************************************************************************/
    dw_fontSizerDX.setDefaults("px", 11, 10, 14, ['.mainContent p']);
    dw_fontSizerDX.init();
// Correctly handle PNG transparency in Win IE 5.5 or higher.
// http://homepage.ntlworld.com/bobosola. Updated 02-March-2004