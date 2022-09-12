<?php 
require 'connector.php';
global $connect; 
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
	<link href="styles/tables.css" rel="stylesheet" type="text/css" />
	
    <link href="styles/menu.css" rel="stylesheet" type="text/css" />
    <link href="styles/sidebar.css" rel="stylesheet" type="text/css" />
    <link href="styles/content.css" rel="stylesheet" type="text/css" />
    
	  <script type="text/JavaScript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script> 
	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT> 
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title> 
	<script language="JavaScript" src="scripts/calendario.js"></script>  
	        <link rel="canonical" href="https://css-tricks.com/examples/DragAndDropFileUploading/">
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link rel="stylesheet" href="main.css" />
     
<link rel="icon" href="img/favicon.ico"> </head>


<body class="body" onload="logout()">
	<div id="extra">&nbsp;</div>

<div id="page">

<div id="header">
 
<div id="PEMEX"></div> 



<div id="utils">
  <ul id="nav2"> 
    <li class="bar"><a href="cargacontratos" class="baritem first">Contratos</a></li>
	<li class="bar"><a href="InteresesMoratoriosad" class="baritem first">Intereses Moratorios</a></li>
  	<li class="bar"><a href="Manual Competro Usuario.pdf" class="baritem first">Manual de Usuario</a></li>
	<li class="bar"><a href="menu_cteadmin" class="baritem first">Inicio</a></li>
 
	    
	 
	<li class="barlast"><span>&nbsp;</span></li>
	</ul>
</div>

<div id="cliente">

	<p class="textoEjecutivo" align="center"> 
    
    
     <?php
   session_start();	
  
echo ' <p class="textoEjecutivo" align="center"> Bienvenido(a) '. $_SESSION["usuario"] .' - '.$_SESSION["rfc"].'</p>';
?>
    </p> 
	
	
	
</div>
<div id="fecha"> 
<p class="fechapc" align="right">
	
	

	</p>
</div>	

<div id="mainmenu">
<ul id="nav">


	<li class="bar"><a href="menu_cteadmin" class="baritem">Servicio a Clientes</a>
	</li>
				


<li class="bar"><a href="clientes" class="baritem">Clientes</a>
	</li> <li class="bar"><a href="pedidoscnvotradmin" class="baritem">Pedidos</a>
	</li> <li class="bar"><a href="index" class="baritem">Salir</a>
	</li>					


<li class="barlast"><span>&nbsp;</span></li>
<!-- mete codigo de tipo de usuario--> 

</ul>
</div>
</div>

<script  type="text/javascript" > 
     function logout(){<?php 
  
   
		if (isset($_SESSION["usuario"])) {
			}else{
				session_unset();
				 session_destroy();
	  echo "window.location.href='index';";
				}  
?>}
</script>

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
<!-- FIN DEL ENCABEZADO --> 


	


	


	<!--Ruteo de la página-->
		  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					 
							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="cargafacturas">Carga facturas</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Carga notas de crédito</a>
							
			   </div>

						
			</div>
			
			
	
			
	
	 
	
			
	
	
 


<DIV id=maincontent>
<DIV class=left id=contentBasicoSeccionff>
		<DIV id=contentBox>
		 <!--
         <form name="forma1" method="POST" action="uploadnotascredito" enctype="multipart/form-data"> 
    <table align="center" class="parametros">
    
			<tr>
<td align="left" class="color_blanco"><b>Nota de Credito XML:</b></td><td align="left" class="color_blanco">
<input type="file" name="file" required><tr/>
<tr>
<td align="left" class="color_blanco"><b>Nota de Credito PDF:</b></td><td align="left" class="color_blanco">
<input type="file" name="filepdf" required> <tr/>

<table align="center">
	    	<tr>
	    	<td align="center" class="color_blanco">
            <br>
            <input type="Submit" value="Aceptar" ></td>
	    	</tr>
	    	</table>	
	</table>
      </form>
      -->  
           
      <form method="POST" action="uploadnotascredito" enctype="multipart/form-data"><div align="center">
      <div id="dropContainer" href="_SELF" style=" width:80%;  border-radius: 10px;border:1px solid black;height:100px; background-image:url('img/gray.jpg'); background:"align="center"; > 
    <img src="img/lod.png" style="height:50px; width:80px; padding-top:20px;" > <br>
   Arrastre y suelte aquí
</div> 
  <input type="file" id="fileInput" name="files[]" multiple="multiple"/> 
      <table align="center"><tr><td class="color_blanco">
      <input type="submit" value="Cargar">
    	</td></tr></table></div>
      </form>
        
        
  <script> 
	  dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
  evt.preventDefault();
}; 
dropContainer.ondrop = function(evt) {
  // pretty simple -- but not for IE :(
  fileInput.files = evt.dataTransfer.files; 
  // If you want to use some of the dropped files
  const dT = new DataTransfer();
  //for(i = 0; i<= f)
  dT.items.add(evt.dataTransfer(files));
  //dT.items.add(evt.dataTransfer.files[1]);
  fileInput.files = dT.files; 
  evt.preventDefault();
};</script>
        
         
        <form name="forma1" method="POST" action="controladorad/postnotacredito.php" enctype="multipart/form-data"> 
    <table align="center" class="parametros">
    
    <?php   
	if(isset($_POST['Folio'])){
		
			 $num = count($_POST['Folio']);
 
 for ($i = 0; $i < $num; $i++) {   
 
$cantidad = number_format($_POST['Cantidad'][$i], 2, '.', ','); 
 
$total = number_format($_POST['Total'][$i], 2, '.', ','); 
$Importee = number_format($_POST['Importee'][$i], 2, '.', ','); 
if(isset($_POST['F'][$i])){
	$flete = number_format($_POST['F'][$i], 2, '.', ','); 
	}else{
		$flete = '';
		}

	echo '
	
	<input type="hidden" name="folio[]" readonly value="'.$_POST['Folio'][$i].'">
	 
	<input type="hidden" name="idempresa[]" readonly value="'.$_POST['idempresa'][$i].'">
	<input type="hidden" name="empresa[]" readonly value="'.$_POST['Cliente'][$i].'">
	<input type="hidden" name="notacredito[]" readonly value="'.$_POST['Factura'][$i].'">
	<input type="hidden" name="importe[]" readonly value="'.$_POST['Importee'][$i].'">
	<input type="hidden" name="fecha[]" readonly value="'.$_POST['Fecha'][$i].'">
	<input type="hidden" name="total[]" readonly value="'.$_POST['Total'][$i].'">
	<input type="hidden" name="pdf[]" readonly value="'.$_POST['PDF'][$i].'" >
	<input type="hidden" name="cantidad[]" readonly value="'.$cantidad.'" > 
	 <input type="hidden" name="referencia[]" readonly value="'.$_POST['Referencia'][$i].'" > 
	<input type="hidden" name="concepto[]" readonly value="'.$_POST['Concepto'][$i].'" >
	<input type="hidden" name="rfc[]" readonly value="'.$_POST['Rfc'][$i].'">
	<input type="hidden" name="valorunitario[]" readonly value="'.$_POST['ValorUnitario'][$i].'"> 
	<input type="hidden" name="cantidad[]" readonly value="'.$_POST['Cantidad'][$i].'" > 
		<tr><td colspan="2">***********************************************************************************************</td></tr> 
    <tr class=""/> 
	<td align="left" class="color_blanco"><b>Folio:</b></td><td align="left" class="color_blanco"><label>'.$_POST['Folio'][$i].'</label> </td></tr>
			<tr><td align="left" class="color_blanco"><b>Empresa:</b></td><td align="left" class="color_blanco">
<label>'.$_POST['Cliente'][$i].'</label>  <tr/>
<tr><td align="left" class="color_blanco"><b>RFC:</b></td><td align="left" class="color_blanco">
<label>'.$_POST['Rfc'][$i].'</label>  <tr/>

			<tr class=""/><td align="left" class="color_blanco"><b>Cliente:</b></td>
			<td align="left" class="color_blanco"><label>'.$_POST['idempresa'][$i].'</label> </td>
			</tr>
			    <tr>
<td align="left" class="color_blanco"><b>Fecha:</b></td>
<td align="left" class="color_blanco">
<label>'.$_POST['Fecha'][$i].'</label> <tr/>
			
			<tr class=""/><td align="left" class="color_blanco"><b>Nota Credito:</b></td>
			<td align="left" class="color_blanco"><label>'.$_POST['Factura'][$i].'</label> </td>
			</tr>
			<tr>
<td align="left" class="color_blanco"><b>PDF:</b></td><td align="left" class="color_blanco">
<label>'.$_POST['PDF'][$i].'</label> <tr/>
<tr>
<td align="left" class="color_blanco"><b>Concepto:</b></td><td align="left" class="color_blanco"  width:"100">
<label style="display: block; width:300px;">'.$_POST['Concepto'][$i].'</label> <tr/>
<tr>
<td align="left" class="color_blanco"><b>Referencia:</b></td><td align="left" class="color_blanco">
<label>'.$_POST['Referencia'][$i].'</label> <tr/> 
<tr>
<td align="left" class="color_blanco"><b>Cantidad:</b></td><td align="left" class="color_blanco">
<label>'.$cantidad.'</label>  <tr/><tr>
 <tr> 
<td align="left" class="color_blanco"><b>Valor Unitario:</b></td><td align="left" class="color_blanco">
<label>$'.$_POST['ValorUnitario'][$i].'</label>  <tr/><tr> 
<td align="left" class="color_blanco"><b>Importe:</b></td><td align="left" class="color_blanco">
<label>$'.$Importee.'</label>  <tr/>  
<tr>
<td align="left" class="color_blanco"><b>Total:</b></td><td align="left" class="color_blanco">
<label>$'.$total.'</label>  <tr/>
	';
 }
 echo '
<table align="center">
	    	<tr>
	    	<td align="center" class="color_blanco">
            <br>
            <input type="Submit" value="Guardar" ></td>
	    	</tr>
	    	</table>	
	'; 
	}
?></table>

<br>
<br>
<br>      </form>    

        
		</DIV>
	</DIV> <!--del content -->

		<DIV class=right id=sideBar>
		<DIV class=sidemenu>
			<DIV class=margin>
				<h5>Opciones a Consultar</h5>
				<div class="separadorsp">&nbsp;</div>
				<br>
	
<a class='list' href='registrornotascredito'>Historial de notas de credito</a>
<br> 
<br> 
	
			</div>  <!--del margen -->
		</div>	<!--del sidemenu -->
	</div> <!--del sidebar-->
</div> <!--del maincontent del header-->



 
</div>



	



<br><br>


<div id="footer">
	<div class="footerLeft left">
	Av. Camarón Sábalo No. 102
Col. Zona Dorada, Mazatlán, Sinaloa C.P. 82110</div>

	
	<div class="footerRight right"> <a href="https://portal.competro.mx/uploads/AVISO%20DE%20PRIVACIDAD%20COMPETRO.pdf" target="_blank">Aviso de Privacidad<a></div>
	<div class="spacer clear">&nbsp;</div>
	
</div>

</div>




</body>
</html>
 
    
     
     



  <script>
   $(document).on({
    dragover: function() {
        return false;
    },
    drop: function() {
        return false;
    }
});
   </script>
  

     

 <?php 
	 
	 if(isset($_POST["mensaje"]))
	 {
		echo "<script>window.alert('".$_POST['mensaje']."');</script>";
		 }else{  }
		 
		 
		 ?>
		 
          
  
  