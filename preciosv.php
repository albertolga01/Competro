 
<?php 
$inicial = '';
require 'connector.php';
global $connect; 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ComPetro</title>
<link href="styles/styles.css" rel="stylesheet" type="text/css"/>
<link href="styles/tables.css" rel="stylesheet" type="text/css" />
<link href="styles/sidebar.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="iconion.ico">
<link href="styles/menu.css" rel="stylesheet" type="text/css" />
<link href="styles/content.css" rel="stylesheet" type="text/css" />
 <link href="styles/flickity.css" rel="stylesheet" type="text/css"/>
<script language="JavaScript" src="styles/flickity.pkgd.js"></script>

<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />

<link rel="icon" href="img/favicon.ico"> </head>

<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
<SCRIPT src="scripts/renderelements.js" type="text/javascript"></SCRIPT>
     
 
<body class="body" onload="logout()">

 
	<div id="extra">&nbsp;</div>

<div id="page">

<div id="header">

<script> 
        var usuario = '<?php echo $_SESSION['usuario']; ?>'; 
        var rfc = '<?php echo $_SESSION['rfc']; ?>'; 
        renderHeader(usuario, rfc);
    </script>


   
<div id="cliente">

	<p class="textoEjecutivo" align="center">
    
   
   
   <?php
   
  
echo ' <p class="textoEjecutivo" align="center"> Bienvenido(a) '. $_SESSION["usuario"] .' - '.$_SESSION["rfc"].'</p>';
?>
  
    <p class="textoClienteSel" align="center">
	    
    </p> 
	
	
	
</div>
<div id="fecha"> 
<p class="fechapc" align="right">
	
	<!--Martes, 12 de mayo del 2020&nbsp;&nbsp;&nbsp;&nbsp;14:04&nbsp;&nbsp;&nbsp;s-->
	</p>
</div>

<div id="mainmenu">
<ul id="nav">
	
 
	<li class="bar"><a href="menu_cte" class="baritem">Servicio a Clientes</a>
	</li> 
    
    	<li class="bar"><a href="contacto" class="baritem">Contacto</a>
	</li><li class="bar"><a href="scripts/logout.php" class="baritem">Salir</a>
	</li>	
    
    
    
    
    
    
    
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
    
    				

 

<li class="barlast"><span>&nbsp;</span></li>
<!-- mete codigo de tipo de usuario--> 

</ul>


<ul id="navv">
  
</ul>
</div>
</div>





<!-- FIN DEL ENCABEZADO --> 


	


	


	<!--Ruteo de la página-->
	
	
 



<!-- <script language="JavaScript" src="/portal/utils/menu_home.js"></script>  -->

<div id="maincontent" class="homebjg">

<div class="separabanner">
<div class="gallery js-flickity"
  data-flickity-options='{ "wrapAround": true }'>
  
  
   <div class="gallery-cell0"  > <img src='img/1.jpg' width='100%'  > </div>
  <div class="gallery-cell1"><img src='img/2.jpg' width='100%'></div>
  <div class="gallery-cell2"><img src='img/3.jpg' width='100%'></div>
  <div class="gallery-cell3"><img src='img/4.jpg' width='100%'></div>
  <div class="gallery-cell4"><img src='img/5.jpg' width='100%'></div>
  </div>
  <br><br>
 

</a>

<!--<script type="text/JavaScript">
            $("#un").load("controladorad/tpcp.php");
        </script>	-->
		
<?php	




if ($connect->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

  
$cql = "SELECT CentroEntrega FROM condiciones WHERE idempresa = '".$_SESSION["idempresa"]."' GROUP BY centroentrega ";
$centroe = "";
$res = $connect ->query($cql);
if ($res->num_rows > 0) {
// output data of each row
while($ros = $res->fetch_assoc()) {
	$centroe = $ros["CentroEntrega"];
	
	$cql = "SELECT Fecha FROM preciosproducto WHERE Centroentrega = '".$centroe."' ORDER BY Fecha DESC LIMIT 1"; 
$res = $connect ->query($cql);
if ($res->num_rows > 0) {
// output data of each row
while($ros = $res->fetch_assoc()) {
	$ultimafecha = $ros["Fecha"];
}
} 
	$hoy =  date("Y-m-d");
	/*echo'
<br><br>
<table align="center" style="border:hidden" >
	<center><h3><label id="fechaaa" style="font-size:27px;"> Precios de venta en TAR aplicables a las gasolinas y el diesel en $/m³  para el '.$ultimafecha.'</label></h3></center>
<br><br>
	<div class="sectext right"> 
';*/

	if($ultimafecha > $hoy){
		
		$cql = "SELECT Fecha FROM preciosproducto WHERE Centroentrega = '".$centroe."' and fecha < '".$ultimafecha."' ORDER BY Fecha DESC LIMIT 1"; 
$res = $connect ->query($cql);
if ($res->num_rows > 0) {
// output data of each row
while($ros = $res->fetch_assoc()) {
	$fechaanterior = $ros["Fecha"];
}
}
		
		
	$myDate = date('d/m/Y');
$sql = " SELECT Fecha, Magna, Premium, Diesel, Centroentrega FROM preciosproducto WHERE Centroentrega = '".$centroe."' and fecha = '".$fechaanterior."' ORDER BY Fecha DESC LIMIT 1"; 
$magna= ""; 	
$premium = "";
$diesel = "";
$fecha = "";
$centroentrega = "";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$magna = $row["Magna"];
	$magnaayer = $row["Magna"];
	$premium = $row["Premium"];
	$premiumayer = $row["Premium"];
	$diesel = $row["Diesel"];
	$dieselayer = $row["Diesel"];
	$fecha = $row["Fecha"];
	$fechama =  date('Y-m-d', strtotime($fecha. ' + 1 days'));
	$centroentrega = $row["Centroentrega"];
echo ' 

<div class="seccion">
 
<table align="center"  >
<tr>
<td class="color_blanco">  </td align="center"><td style="" colspan="3" class="color_blanco"><h3><label id="fechaaa" style="font-size:16px; text-align:center;">Precios de venta en TAR aplicables a las gasolinas y el diesel en <br> $/m³  para el '.date("d/m/Y", strtotime($fecha)).' - '.$centroentrega.'</label></h3></td>
</tr>
<tr>
<td class="color_blanco"></td>
<td style="background-color:green; color:white; font-weight:bold;" align="center">MAGNA</td>
<td style="background-color:red; color:white; font-weight:bold;" align="center">PREMIUM</td>
<td style="background-color:black; color:white; font-weight:bold;" align="center">DIESEL</td>
</tr>
<tr>
<td style="border-bottom:1px solid black;" class="color_blanco">'.date("d/m/Y", strtotime($fecha)).'</td>
<td style="background-color:green; color:white;" align="center">$'.number_format($magna, 5, '.',',').'</td>
<td style="background-color:red; color:white;" align="center">$'.number_format($premium, 5, '.',',').'</td>
<td style="background-color:black; color:white;" align="center">$'.number_format($diesel, 5, '.',',').'</td>
</tr>
 
';
 } 
 
  
	$myDate = date('d/m/Y');
$sql = " SELECT Fecha, Magna, Premium, Diesel, Centroentrega FROM preciosproducto WHERE Centroentrega = '".$centroe."' and fecha = '".$ultimafecha."' LIMIT 1"; 
 
$magna= "";
$premium = ""; 
$diesel = ""; 
$fecha = "";
$centroentrega = "";
$result = $connect->query($sql);
 if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$magna = $row["Magna"];
	$premium = $row["Premium"];
	$diesel = $row["Diesel"];
	$fecha = $row["Fecha"];
	$fechama =  date('Y-m-d', strtotime($fecha. ' + 1 days'));
	$centroentrega = $row["Centroentrega"];
	echo ' 
 
<tr> 
<td style="border-bottom:1px solid black;" class="color_blanco">'.date("d/m/Y", strtotime($fecha)).'</td>
<td style="background-color:green; color:white;" align="center">$'.number_format($magna, 5, '.',',').'</td>
<td style="background-color:red; color:white;" align="center">$'.number_format($premium, 5, '.',',').'</td>
<td style="background-color:black; color:white;" align="center">$'.number_format($diesel, 5, '.',',').'</td>
</tr>
<tr><td class="color_blanco" style="height:40px; colspan="4"></td></tr>
<tr>
<td colspan="4" class="color_blanco" style="text-align:center;">DIFERENCIA DE PRECIOS</td>
</tr>
<tr>
<td style="border-bottom:1px solid black;" class="color_blanco" align="center">M3</td>
<td style="background-color:green; color:white;" align="center">$'.number_format((($magna - $magnaayer)), 5, '.',',').'</td>
<td style="background-color:red; color:white;" align="center">$'.number_format((($premium - $premiumayer)), 5, '.',',').'</td>
<td style="background-color:black; color:white;" align="center">$'.number_format((($diesel - $dieselayer)	), 5, '.',',').'</td>
</tr>
<tr>
<td style="border-bottom:1px solid black;" class="color_blanco" align="center">Lt</td>
<td style="background-color:green; color:white;" align="center">$'.number_format((($magna - $magnaayer) / 1000), 5, '.',',').'</td>
<td style="background-color:red; color:white;" align="center">$'.number_format((($premium - $premiumayer) / 1000), 5, '.',',').'</td>
<td style="background-color:black; color:white;" align="center">$'.number_format((($diesel - $dieselayer) / 1000), 5, '.',',').'</td>
</tr>
	  	 
					 </table> 
                  
	</div>   
	   <br>

';
}
 }
 
 
 
} else { echo "0 results"; } 
		}else{
		///////////////
		
		$sql = " SELECT Fecha, Magna, Premium, Diesel, Centroentrega FROM preciosproducto WHERE Centroentrega = '".$centroe."'  ORDER BY Fecha DESC LIMIT 1"; 
 
$magna= ""; 	
$premium = "";
$diesel = "";
$fecha = "";
$centroentrega = "";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$magna = $row["Magna"];
	$premium = $row["Premium"];
	$diesel = $row["Diesel"];
	$fecha = $row["Fecha"];
	$fechama =  date('Y-m-d', strtotime($fecha. ' + 1 days'));
	$centroentrega = $row["Centroentrega"];
echo ' 

<div class="seccion">
<br><br> 
<table align="center" >
<tr>
<td class="color_blanco">  </td align="center"><td style="" colspan="3" class="color_blanco"><h3><label id="fechaaa" style="font-size:16px; text-align:center;">Precios de venta en TAR aplicables a las gasolinas y el diesel en <br> $/m³  para el '.date("d/m/Y", strtotime($fecha)).' - '.$centroentrega.'</label></h3></td>
</tr>
<tr>
<td class="color_blanco"></td>
<td style="background-color:green; color:white; font-weight:bold;" align="center">MAGNA</td>
<td style="background-color:red; color:white; font-weight:bold;" align="center">PREMIUM</td>
<td style="background-color:black; color:white; font-weight:bold;" align="center">DIESEL</td>
</tr>
<tr>
<td style="border-bottom:1px solid black;" class="color_blanco">'.date("d/m/Y", strtotime($fecha)).'</td>
<td style="background-color:green; color:white;" align="center">$'.number_format($magna, 5, '.',',').'</td>
<td style="background-color:red; color:white;" align="center">$'.number_format($premium, 5, '.',',').'</td>
<td style="background-color:black; color:white;" align="center">$'.number_format($diesel, 5, '.',',').'</td>
</tr>
 	 
						
					 
</table> 
              
	   <br>

';
 } 
}
		
		
		
		
		
		
		
		///////////////////77
		}
	
}
}

$connect->close();
		?>	 
<div class="clear">&nbsp;</div>
</div>

<div class="clear spacer">&nbsp;</div>
</div>


	
	
	





<br><br><br>

<script>
renderFooter();
</script>
 

</div>


	
		
			
	 
</body>
 
 
</html> 
 
<script language="JavaScript" src="scripts/datetime.js"></script> 