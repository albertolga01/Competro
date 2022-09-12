<?php 
require 'connector.php';
global $connect; 
session_start();	
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
    <link rel="icon" href="iconion.ico"> 
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>  
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>

	<script language="JavaScript" src="scripts/calendario.js"></script> 
     
	     
    
    
    

 <link rel="stylesheet" href="styles/calendario.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="scripts/uijquery.js"></script>
    
    
    <?php 
	if(isset($_POST['fini'])){
		echo '<script> 
  $( function() {
    $("#dateDefaultj").datepicker();
	 $("#dateDefaultfinalj").datepicker();
 
  } );
  </script>';
		}else{
			echo '<script> 
  $( function() {
    $( "#dateDefault").datepicker();
	 $("#dateDefaultfinal").datepicker(); 
  } );
  </script>';
			}
	?>
    
<link rel="icon" href="img/favicon.ico"> </head>


<body class="body" onload="logout()">
	<div id="extra">&nbsp;</div>

<div id="page">
  <div id="header">
    <div id="header2">
      <!-- <div id="eNacional"><a href="http://www.energia.gob.mx/" target="_blank" title="Secretar&iacute;a de Energ&iacute;a">Secretar&iacute;a de Energ&iacute;a</a></div> -->
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
        <p class="textoEjecutivo" align="center" id="un">
          <script type="text/JavaScript">
            $("#un").load("controladorad/tprc.php");
        </script>
        </p>
      </div>
      <div id="fecha">
        <p class="fechapc" align="right"></p>
      </div>
      <div id="mainmenu">
        <ul id="nav">
          <li class="bar"><a href="menu_cteadmin" class="baritem">Servicio a Clientes</a> </li>
          <li class="bar"><a href="clientes" class="baritem">Clientes</a> </li>
          <li class="bar"><a href="pedidoscnvotradmin" class="baritem">Pedidos</a> </li>
          <li class="bar"><a href="scripts/logout.php" class="baritem">Salir</a> </li>
          <li class="barlast"><span>&nbsp;</span></li>
          <!-- mete codigo de tipo de usuario-->
        </ul>
      </div>
    </div>
  </div>
  <script  type="text/javascript" > 
     function logout(){<?php 
  
   
		if (($_SESSION["usuario"]) !== null) {
			}else{
				session_unset();
				 session_destroy();
	  echo "window.location.href='../index';";
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
							 <a  href="menu_cteadmin" >Servicio a Clientes</a> 
               &nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Cancelar Factura</a>
							
					  </div>

						
				</div>
			
			
	
			
	
	
 




		<div id="maincontent"></div>		

	
	
	  
			
		
	<div id="maincontent" align="center">
     <form name="forma1" method="post" action="controladorad/cancelar_factura">
    <table align="center" class="parametros">
    <tr>
			<td class="color_blanco"><B>Ingrese Folio:</B></td>
      <td>
        <?php 
        echo '<Input  name="foliofactura" type="text" value="'.$_POST["foliofactura"].'"/>';
        ?>
      </td>
            
		</tr>
   
 
	
    	 
		<tr>
			<td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
		</tr>
	</table>
    </form>
     <br>
 
						
    
    <?php 
  if(isset($_POST["UUID"])){
 
 
$folios = $_POST["folio"];   
if($_POST["tipop"] =="1"){
$tp = "Crédito";
}else{
  $tp = "Contado";
}

echo '
<table>
<tr>
<th>Folio Factura</th>
<th>Empresa</th>
<th>Factura</th>
<th>Importe Total</th>
<th>Restante</th>
<th>Fecha</th>
<th>Tipo de pago</th> 
<th>Estado</th> 

</tr>
<tr>
<td align="center"><label>'.$_POST["foliofactura"].'</label></td>
<td><label>'.$_POST["rzonsocial"].'</label></td>
<td><label>'.$_POST["factura"].'</label></td>
<td align="right"><label>$'.number_format($_POST["total"],2).'</label></td>
<td align="right"><label>$'.number_format($_POST["restante"],2).'</label></td> 
<td><label>'.$_POST["fecha"].'</label></td>
<td align="right"><label>'.$tp.'</label></td>
<td align="right"><label>'.$tp.'</label></td>
</tr>
</table>
<br><br>
';
 


echo '
<form name="forma1" method="post" action="controladorad/cancelar_f.php"> 
<table>
<th>Folio Cargo</th>  
<th>Folio Pago</th>  
<th>Fecha</th> 
<th>Importe</th> 
<th>Referencia</th> 
<th>Estado</th>
';
$i = 0;
$total = 0;
foreach($folios as $folio){
  if($_POST["inactivo"][$i] == "0"){
    $estado = "Confirmado";
  }else{$estado = "Cancelado";}

  $total = $total + $_POST["abono"][$i];
echo "<tr>
<input name='foliopago[]' value='".$_POST["foliopago"][$i]."' hidden/> 
<input name='foliofactura' value='".$_POST["foliofactura"]."' hidden/> 
<td align='center'><label>".$folio."</label></td>
"; 
if($_POST["foliopago"][$i] == "1"){
  echo "<td align='center'><label>Contado</label></td>";
}else{
  echo "<td align='center'><label>".$_POST["foliopago"][$i]."</label></td>";
}
echo " 
<td align='center'><label>".$_POST["fechacaptura"][$i]."</label></td>
<td align='right'><label>$".number_format($_POST["abono"][$i],2)."</label></td>
<td align='center'><label>".$_POST["documento"][$i]."</label></td>
<td align='center'><label>".$estado."</label></td>
</tr>";
$i++;
}

echo "<tr>
<td class='color_blanco'></td>
<td class='color_blanco'></td>
<td class='color_blanco'></td>
<td class='color_blanco' align='center'><label>$".number_format($total,2)."</label></td>
</tr>";




echo ' 
<tr><td colspan="6" align="center" class="color_blanco"><input type="submit" value="Cancelar"/></td></tr>
</table>
</form>
';


  }
        
	?>
    

				
    
                    
                    
    
    <script>
document.getElementById('dropbutton').onclick = function() {
    if (Calc.Input.value == '' || Calc.Input.value == '0') {
         window.alert("Please enter a number");
    } else {
        document.getElementById('dropbutton').value=' Justera längd ';
        document.getElementById('length').innerHTML = Calc.Input.value;
        document.getElementById('dropbutton').style.backgroundColor = '#FFF6B3';
    }
    return false;
}
</script>
 
            
            
            
            
            <br><br>
            
		
			
	</div> 	
		
						
	
	<form action="LoginServlet" method="post">
	</form>
	
	<div id="maincontent"> 
		<table align="center">
			<tr class="link" align="center">
				 
				<td colspan="4" align="center" class="color_blanco"> 
					<b>.....</b> 
				</td> 
			</tr>
		</table>
	</div> 
	


	
	



 
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
function setInputDate(_id){
    var _dat = document.querySelector(_id);
    var hoy = new Date(),
        d = (hoy.getDate() ),
        m = hoy.getMonth()+1, 																																																																																																																																																
        y = hoy.getFullYear(),
        data;

    if(d < 10){
        d = "0"+d;
    };
    if(m < 10){ 
        m = "0"+m;
    };

    data = d+"/"+m+"/"+y;
    console.log(data);
    _dat.value = data;
};
 
setInputDate("#dateDefaultfinal");   
     </script>
     
	 
	  <script>
function setInputDate(_id){
    var _dat = document.querySelector(_id);
      var hoy =new Date(new Date().setDate(new Date().getDate() - 0)),
        d = (hoy.getDate() ),
        m = hoy.getMonth()+1, 																																																																																																																																																
        y = hoy.getFullYear(),
        data;

    if(d < 10){
        d = "0"+d;
    };
    if(m < 10){ 
        m = "0"+m;
    };

    data = d+"/"+m+"/"+y;
    console.log(data);
    _dat.value = data;
};

setInputDate("#dateDefault");   
     </script>
     
     





    