
	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="styles/styles.css" rel="stylesheet" type="text/css" />
	<link href="styles/tables.css" rel="stylesheet" type="text/css" />
	
	<link href="styles/menu.css" rel="stylesheet" type="text/css" />
    <link href="styles/sidebar.css" rel="stylesheet" type="text/css" />
    <link href="styles/content.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="iconion.ico" />
 <link href="styles/flaticon.css" rel="stylesheet" />
	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>

	<script language="JavaScript" src="scripts/calendario.js"></script> 
<link rel="icon" href="img/favicon.ico" /> </head>


<body class="body" onload="logout()">
	<div id="extra">&nbsp;</div>

<div id="page">

<div id="header">
 
<div id="PEMEX"></div> 

 
	
<div id="utils">
  <ul id="nav2"> 
	<li class="bar"><a href="mcontratos" class="baritem first">Contratos</a></li>
  	<li class="bar"><a href="InteresesMoratorios" class="baritem first">Intereses Moratorios</a></li>
  	<li class="bar"><a href="Manual Competro Usuario.pdf" class="baritem first">Manual de Usuario</a></li>
	<li class="bar"><a href="menu_cte" class="baritem first">Inicio</a></li>
 
    <!-- mete codigo de comunicados, pizarrion de avisos y seleccione el cliente--> 
	
  		<li class="barlast"><span>&nbsp;</span></li>
	</ul>
</div>

<div id="cliente">


<p class="textoEjecutivo" align="center">
    
   
   
   <?php
   session_start();	
  
echo ' <p class="textoEjecutivo" align="center"> Bienvenido(a) '. $_SESSION["usuario"] .' - '.$_SESSION["rfc"].'</p>';
?>
    </p><p class="textoClienteSel" align="center">
	    
    </p> 
	
	
	
	
</div>
<div id="fecha"> 
<p class="fechapc" align="right">
	
	Mi&eacute;rcoles, 13 de mayo del 2020&nbsp;&nbsp;&nbsp;&nbsp;10:42&nbsp;&nbsp;&nbsp;

	</p>
</div>

<div id="mainmenu">
<ul id="nav">

	<li class="bar"><a href="menu_cte" class="baritem">Servicio a Clientes</a>
	</li>
    
    <li class="bar"><a href="#" class="baritem">Contacto</a>
	</li><li class="bar"><a href="scripts/logout.php" class="baritem">Salir</a>
	</li>					


<li class="barlast"><span>&nbsp;</span></li>
<!-- mete codigo de tipo de usuario--> 

</ul>
</div>
</div>

<script type="text/javascript">

    function updateClock() {
        var currentTime = new Date();
		
		
		var date = currentTime.getFullYear()+'/'+(currentTime.getMonth()+1)+'/'+currentTime.getDate();

        var currentHours = currentTime.getHours();
        var currentMinutes = currentTime.getMinutes();
        var currentSeconds = currentTime.getSeconds();

        // Pad the minutes and seconds with leading zeros, if required
        currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
        currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

        // Choose either "AM" or "PM" as appropriate
        var timeOfDay = (currentHours < 12) ? "AM" : "PM";

        // Convert the hours component to 12-hour format if needed
        currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;

        // Convert an hours component of "0" to "12"
        currentHours = (currentHours == 0) ? 12 : currentHours;

        // Compose the string for display
        var currentTimeString = date + "  " + currentHours + ":" + currentMinutes + ":" + currentSeconds+ " " + timeOfDay;

        // Update the time display
        document.getElementById("fecha").innerHTML = currentTimeString;
        setTimeout(updateClock, 1000);
    }
    updateClock();

    
</script>

<script  type="text/javascript" > 
     function logout(){<?php 
  
   
		if (isset($_SESSION["usuario"])) {
			}else{
				session_unset();
				 session_destroy();
	  echo "window.location.href='index.php';";
				}  
?>}
</script>
<!-- FIN DEL ENCABEZADO --> 


	


	


	<!--Ruteo de la página-->
	
		  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					 
							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 
							 <a class=bold href="#">Contacto</a>
							
					  </div>

						
				</div>
			
	
			
	
	
    


<DIV id=maincontentdos>

 
<DIV class=left id=contentBasicoSeccionfullCONTACTO>

<div>
  <DIV id=contentBox >
		<H1>Contacto </H1
		><div>
         <?php 
		 if(isset($_POST['enviado'])){
		 if($_POST['enviado'] == 1){
		 echo ' <label id="lblCaptchaRequired"  class="error" style="color: green" > Correo Enviado Correctamente </label>'; 
		 }else{
			  echo ' <label id="lblCaptchaRequired"  class="error" style="color: red" > Error al enviar correo </label>'; 
			 }
		 }?>
         
<form action="controlador/correo.php" method="post">

<ul class="form-style-1">
  <li>Correo: <input type="text" name="email" class="field-long" required /><br /></li>
  <li>Nombre: <input type="text" name="nombre"  class="field-long" required /><br /></li>
  <li>Mensaje: <textarea rows="5" name="message" cols="5" class="field-textarea" required></textarea><br /></li>
  <li><input type="submit" name="submit" value="Enviar" /></li>

</ul>
</form>
</div>     
		</DIV>
	</DIV> <!--del content -->
</div>
  
<div style="top-padding:200px;">
 <img src="img/contacto.png" />                   
    </div>  
    <div class="whatsapp"></div>
           <a href="https://wa.me/526691103030?text=Hola!%20Buen%20día" class="whatsapp" target="_blank"><i class="fa fa-whatsapp whatsapp-icon"></i></a>                       
		
</div> <!--del maincontent del header-->



 
</div>
 


<div id="footer">
	<div class="footerLeft left">
	Av. Camarón Sábalo No. 102
Col. Zona Dorada, Mazatlán, Sinaloa C.P. 82110</div>

	
	<div class="footerRight right">Fecha de &uacute;ltima actualizaci&oacute;n: 03/Mayo/2020</div>
	<div class="spacer clear">&nbsp;</div>
	
</div>

</div>




</body>



<style type="text/css">
.form-style-1 {
	margin:5px auto;
	max-width: 400px;
	padding: 5px 12px 5px 10px;
	font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.form-style-1 li {
	padding: 0;
	display: block;
	list-style: none;
	margin: 10px 0 0 0;
}
.form-style-1 label{
	margin:0 0 3px 0;
	padding:0px;
	display:block;
	font-weight: bold;
}
.form-style-1 input[type=text], 
.form-style-1 input[type=date],
.form-style-1 input[type=datetime],
.form-style-1 input[type=number],
.form-style-1 input[type=search],
.form-style-1 input[type=time],
.form-style-1 input[type=url],
.form-style-1 input[type=email],
textarea, 
select{
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	border:1px solid #BEBEBE;
	padding: 5px;
	margin:0px;
	-webkit-transition: all 0.30s ease-in-out;
	-moz-transition: all 0.30s ease-in-out;
	-ms-transition: all 0.30s ease-in-out;
	-o-transition: all 0.30s ease-in-out;
	outline: none;	
}
.form-style-1 input[type=text]:focus, 
.form-style-1 input[type=date]:focus,
.form-style-1 input[type=datetime]:focus,
.form-style-1 input[type=number]:focus,
.form-style-1 input[type=search]:focus,
.form-style-1 input[type=time]:focus,
.form-style-1 input[type=url]:focus,
.form-style-1 input[type=email]:focus,
.form-style-1 textarea:focus, 
.form-style-1 select:focus{
	-moz-box-shadow: 0 0 8px #88D5E9;
	-webkit-box-shadow: 0 0 8px #88D5E9;
	box-shadow: 0 0 8px #88D5E9;
	border: 1px solid #88D5E9;
}
.form-style-1 .field-divided{
	width: 49%;
}

.form-style-1 .field-long{
	width: 100%;
}
.form-style-1 .field-select{
	width: 100%;
}
.form-style-1 .field-textarea{
	height: 175px;
	width: 100%;
}
.form-style-1 input[type=submit], .form-style-1 input[type=button]{
	background: #4B99AD;
	padding: 8px 15px 8px 15px;
	border: none;
	color: #fff;
}
.form-style-1 input[type=submit]:hover, .form-style-1 input[type=button]:hover{
	background: #4691A4;
	box-shadow:none;
	-moz-box-shadow:none;
	-webkit-box-shadow:none;
}
.form-style-1 .required{
	color:red;
}
</style>


	
 


</html>



   
  





