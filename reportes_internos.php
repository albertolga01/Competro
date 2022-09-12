<?php 
    require 'connector.php';
    global $connect;  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="styles/styles.css" rel="stylesheet" type="text/css" />
 
	
	<link href="styles/menu.css" rel="stylesheet" type="text/css" />
    <link href="styles/sidebar.css" rel="stylesheet" type="text/css" />
    <link href="styles/content.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="iconion.ico">
	        <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 


<link rel="shortcut icon" href="../favicon.ico">
		 
		 
     
	 
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	
	 
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>

	<script language="JavaScript" src="scripts/calendario.js"></script> 
<link rel="icon" href="img/favicon.ico"> 

<style>
/* Popup container */
.popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
}

/* The actual popup (appears on top) */
.popup .popuptext {
    visibility: hidden;
    width: 460px;
	height: 600px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

/* Toggle this class when clicking on the popup container (hide and show the popup) */
.popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}
</style>
</head>


<body class="body" onload="logout()">
	
	<div id="extra">&nbsp;</div>
    

<div id="page">

<div id="header">

<!-- <div id="eNacional"><a href="http://www.energia.gob.mx/" target="_blank" title="Secretar&iacute;a de Energ&iacute;a">Secretar&iacute;a de Energ&iacute;a</a></div> -->  
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
    <p class="textoClienteSel" align="center">
	    
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



    <li class="bar"><a href="contacto" class="baritem">Contacto</a>
   <?php 
if($_SESSION["idempresa"]== "2511")
{
    echo '<li class="bar"><a href="voldiario" class="baritem">Pipas</a></li>';
}
        
   ?> 
	<li class="bar"><a href="scripts/logout.php" class="baritem">Salir</a>
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
							 
							 <a class=bold href="#">Servicio a clientes</a>
                            
                             <img title="Cambiar Apariencia del Menú" id="icon" src="img/menuicon.png" width="20px" height="20px" style="float: right;">
                             <label title="Cambiar Apariencia del Menú"  id="uno" style="float: right; width:40px;  padding-left:10px; padding-top: 3px;  height:15px;  font-size:13px;">Menú</label> 
                             
                       
                          

						
				</div>
			
	
			
	
	
    
	
 


<DIV id=maincontent>
<DIV class=left id=contentBasicoSeccionfulllistmenu>
		<DIV id=contentBox>
        
        
        <img src="img/img.png" width="870" height="430">
         
         
       <DIV class=right id=sideBar>
		<DIV class=sidemenu>
			<DIV class=margin>
				<h4 align="center">Opciones a Consultar</h4>
				 
				 	
			
		<div style=" height:30px;">
	<a class='list' href='pedidoscnvo' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Programa de entregas</a></div>
     
 		

 
<div style=" height:30px; padding-top:4px;">
<a class='list' href='pedidosrprogramados' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Embarques programados</a></div>
 
<div style="  height:30px; padding-top:4px;">
<a class='list' href='saldo_analitico' style="height: 30px; text-align: center; height:auto; padding:9px 0;border-bottom:1px solid #CCCCCC; border-bottom:1px solid #CCCCCC;">Saldo anal&iacute;tico</a></div>
 
		
        <div style="  height:30px; padding-top:4px;">
        <a class='list' href='pagosaplicaciones' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Pagos y aplicaciones</a></div>
 

    
    <div style=" height:30px; padding-top:4px;">
<a class='list' href='precios' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Precios</a></div>
  
	
<div style=" height:30px; padding-top:4px;">
<a class='list' href='cargamovcte' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Carga movimiento</a></div>
 

<div style="  height:30px; padding-top:4px;">
<a class='list' href='preciosvigentes' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Precios de venta vigentes</a></div>
 

<div style=" height:30px; padding-top:4px;">
<a class='list' href='reporte_facturas' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">&nbsp;Facturaci&oacute;n electr&oacute;nica&nbsp;</a></div>
 
<div style=" height:30px; padding-top:4px;">
<a class='list' href='descuentos' onClick=' return documento("/portal",0);' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Condiciones comerciales</a></div>
 

	
 <div style=" height:30px; padding-top:4px;">
	<a class='list' href='reporte_pipas_cte' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Reporte de compras</a></div>
   
   
    
 <div style=" height:30px; padding-top:4px;">
	<a class='list' href='informacioncliente' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Datos generales del cliente</a></div>
 

			</div>  <!--del margen -->
		</div>	<!--del sidemenu -->
	</div> <!--del sidebar-->
			 
		</DIV>
	</DIV> <!--del content -->
    
    
    
<DIV class=left id=contentBasicoSeccionfullnvomenu>
		<DIV id=contentBox2>
         
        <div class="cteinterno1" id="unoo"> 
        </div>
        
        <div class="cteinterno2" id="tress"> 
        </div>
        
        <div class="cteinterno3" id="cuatroo"> 
        </div>
        
         <div class="elemnt6" id="sietee" style="opacity:0;" > 
         </div>
         <div class="elemnt5" id="cincoo" style="opacity:0;" > 
         </div> 
         <div class="elemnt2" id="doss" style="opacity:0;" > 
         
         </div>
          
		</DIV>
         
<?php

$selectact = "Select folio, aviso, activo from avisosinicio where activo = '1'";
//echo $selectact;
$resultx = $connect->query($selectact);
                    if ($resultx->num_rows > 0) {
                        while($rowx = $resultx->fetch_assoc()) {
                            $dataAvisos[] = $rowx;
                        }
                    }
 $ruta = "";
foreach($dataAvisos as $Aviso){
	 
	 $ruta = "https://portal.competro.mx/avisosinicio/".$Aviso['aviso']; 
	
	
}
echo '
<div class="popup" onclick="myFunction()" style=" position:absolute; z-index: 1000; background-color:blue; width:780px;" align="center">
  <span class="popuptext" id="myPopup"><img src="'.$ruta.'" style="width:450px; height:600px;"></img></span>
</div>
';
echo "



";
 //echo $ruta."<br>";

?>



<script>
// When the user clicks on <div>, open the popup
function myFunction() {  
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>


<?php 

if($ruta != ""){
	echo "<script>myFunction();</script>";
	
}

?>

 
        
        
        
	</DIV> <!--del content -->
	
	
	
    
    <script>
	document.getElementById("unoo").setAttribute('onclick', 'location.href = "reporte_pipas_cte"'); 
	document.getElementById("tress").setAttribute('onclick', 'location.href = "reporte_consumo_cte"');  
    document.getElementById("cuatroo").setAttribute('onclick', 'location.href = "reporte_minimos_maximos"');  
	</script>
    
     
    

		
</div> <!--del maincontent del header-->



 
</div>

<br><br>


<div id="footer">
	<div class="footerLeft left">
	Av. Camarón Sábalo No. 102
Col. Zona Dorada, Mazatlán, Sinaloa C.P. 82110</div>

	
	<div class="footerRight right"> <a href="https://portal.competro.mx/uploads/AVISO%20DE%20PRIVACIDAD%20COMPETRO.pdf" target="_blank">Aviso de Privacidad<a></div>
	 
	
</div>

</div>
 
 

 
</body>
</html>









<script type="text/javascript"> 
    function updateClock() {
        var currentTime = new Date(); 
		var date = currentTime.getFullYear()+'/'+(currentTime.getMonth()+1)+'/'+currentTime.getDate(); 
        var currentHours = currentTime.getHours();
        var currentMinutes = currentTime.getMinutes();
        var currentSeconds = currentTime.getSeconds(); 
        currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
        currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;
        var timeOfDay = (currentHours < 12) ? "AM" : "PM";
        currentHours = (currentHours > 12) ? currentHours - 12 : currentHours; 
        currentHours = (currentHours == 0) ? 12 : currentHours; 
        var currentTimeString = date + "  " + currentHours + ":" + currentMinutes + ":" + currentSeconds+ " " + timeOfDay; 
        document.getElementById("fecha").innerHTML = currentTimeString;
        setTimeout(updateClock, 1000);
    }
    updateClock();
 
</script>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
var bool = true;
$(document).ready(function(){
  $("#uno").click(function(){
  if(bool == true){
   $("#contentBasicoSeccionfulllistmenu").show(1000);
    $("#contentBasicoSeccionfullnvomenu").hide(1000);
	$("#icon").attr("src","img/menuiconnn.png");
    
    bool = false;
  }else{
   $("#contentBasicoSeccionfulllistmenu").hide(1000);
    $("#contentBasicoSeccionfullnvomenu").show(1000);
	$("#icon").attr("src","img/menuicon.png");
       
    bool = true;
  }
   
  }
   
  
   );
   
   
   
    $("#icon").click(function(){
  if(bool == true){
   $("#contentBasicoSeccionfulllistmenu").show(1000);
    $("#contentBasicoSeccionfullnvomenu").hide(1000);
	$("#icon").attr("src","img/menuiconnn.png");
    
    bool = false;
  }else{
   $("#contentBasicoSeccionfulllistmenu").hide(1000);
    $("#contentBasicoSeccionfullnvomenu").show(1000);
	$("#icon").attr("src","img/menuicon.png");
       
    bool = true;
  }
   
  }
   
  
   );
   
   
});
</script>








