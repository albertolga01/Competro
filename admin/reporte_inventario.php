<?php 
require 'connector.php';
global $connect;  
global $connect2;  
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
							 <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Reporte Compras</a>
							
					  </div>

						
				</div>
			
			
	
			
	
	
 




		<div id="maincontent"></div>		

	
	
	  
			
		
	<div id="maincontent" align="center">
     <form name="forma1" method="post" action="reporte_inventario">
    <table align="center" class="parametros">
			<tr>
			<td class="color_blanco"><B>Introduce la Fecha de Inicio:</B></td>
            <td class="color_blanco">
		  <?php if(isset($_POST['fini'])){
					$fecha = $_POST['fini'];
					echo '<input type="text" value= "'. $_POST['fini'].'" name="fini" id="dateDefaultj">';
					}else {
					echo '<input type="text" value= "00/00/0000"  name="fini" id="dateDefault">';
					}
				
				   ?>
		 </td>
			</tr>		
    <!--
			<tr>
			<td class="color_blanco"><B>Introduce la Fecha Final:</B></td>
			<td class="color_blanco">
            <?php/* if(isset($_POST['finial'])){
					echo '<input type="text" value= "'. $_POST['finial'].'" name="finial" id="dateDefaultfinalj">';
					}else{
						
						echo '<input type="text" value= "00/00/0000" name="finial" id="dateDefaultfinal">';
						}    */?>
			<a onClick="return calendario('forma1.finial');"></a></td>
			</tr>
    -->
	
			
			
	
		
		
		 <tr>
				<td class="color_blanco"><b>Seleccione cliente:</b></td>
				<td class="color_blanco">
                
                <?php
    $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");

    echo "<select name='IdEmpresa' id='IdEmpresa' onchange='doThisOnChangeC(this.value)' style='width:100%;'>
	<option>Seleccione</option>
	";

    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['IdEmpresa'];
                  $name = $row['usuario']; 
                  echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';

} 
    echo "</select>"; 
?> </td></tr> 
		<tr>
			<td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
		</tr>
	</table>
    </form>
     
<table align="center">
<tr><br></tr>
						<tr><td class="color_blanco" colspan="3">COMERCIALIZADORA PETROMAR - SANTA FE
</td></tr>
						<tr>
						<th align="center" rowspan="2">Producto</th>
							<th  style='width:40px;' colspan="2">Inventario</th> <!-- inicial final -->
                            <th align="center" style='width:80px;colspan' colspan="2">Ventas</th><!-- teorico sistema -->
							<th align="center" rowspan="2">Compra</th>
							<th align="center" rowspan="2">Precio</th>
							<th align="center" rowspan="2">Precio Con Descuento</th>
							<th align="center" rowspan="2">OPE</th>
                            <th align="center" rowspan="2">Inventario Teorico</th>
                            <th align="center" rowspan="2">Diferencia</th>
                            <th align="center" rowspan="2">Flete</th>
				
						</tr>

                        <tr>
                            <th>Inicial</th>
                            <th>Final</th>
                            <th>Teorico</th>
                            <th>Sistema</th>
                        </tr>
						
    
    <?php 
	if (isset($_POST['fini'])) {
// Check connection 
$inicial = $_POST['fini'];   

$cont = 0; 
 $idempresa = $_POST["IdEmpresa"];


$productos = "SELECT  producto FROM inventarios WHERE idestacion = '1' GROUP BY producto";
 
 $resultf = mysqli_query($connect2, $productos);  
if ($resultf->num_rows > 0) { 
while($rf = $resultf->fetch_assoc()) {
 
 

  $sqld = "SELECT t1.folio, t1.producto,  t1.volumen, t1.fecha 
  FROM inventarios t1  WHERE DATE(t1.fecha) = STR_TO_DATE('".$_POST["fini"]."', '%d/%m/%Y') AND producto = '".$rf["producto"]."' and idestacion = '1' ORDER BY t1.fecha DESC LIMIT 1 ";
   
   
   
 $resultd = mysqli_query($connect2, $sqld);  
if ($resultd->num_rows > 0) { 
while($rowd = $resultd->fetch_assoc()) {  
	
  $diaanterior = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $rowd["fecha"]) ) ));
 
 $sqlda = "SELECT t1.folio, t1.producto,  t1.volumen, t1.fecha 
  FROM inventarios t1  WHERE DATE(t1.fecha) = '".$diaanterior."' AND producto = '".$rf["producto"]."' and idestacion = '1' ORDER BY t1.fecha DESC LIMIT 1 ";
 //hastaaqui vamos bien
 $resultda = mysqli_query($connect2, $sqlda);  
if ($resultda->num_rows > 0) { 
while($rowda = $resultda->fetch_assoc()) {
$volumenanterior = $rowda["volumen"];	
}
}


$sqlvolumensistema = "SELECT volm, volp, vold, fecha  FROM volsistema WHERE estacion = '1' ORDER BY folio DESC LIMIT 1";
 //hastaaqui vamos bien 
 $resultvols = mysqli_query($connect2, $sqlvolumensistema);  
if ($resultvols->num_rows > 0) { 
while($rowvs = $resultvols->fetch_assoc()) {
$volm = $rowvs["volm"];	
$volp = $rowvs["volp"];	
$vold = $rowvs["vold"];	
$fechavol = $rowvs["fecha"];	
}
}
 



if($rf["producto"] == "Pemex Magna"){$pro = "GASOLINA 87 OCT";
$volumensistema = $volm; 
}
if($rf["producto"] == "Pemex Premium"){$pro = "GASOLINA 91 OCT";
$volumensistema = $volp;
}
if($rf["producto"] == "Pemex Diesel"){$pro = "DIESEL";
$volumensistema = $vold;
} 
 
$sqlc = "SELECT SUM(cantidad) as volumen, Descuento, Importe, Flete, t1.total FROM facturas  t1 INNER JOIN pedido t2 ON t1.folio = t2.foliofactura WHERE
   DATE(t1.fecha) = STR_TO_DATE('".$_POST["fini"]."', '%d/%m/%Y') AND t2.Destino = '1-MAZATLAN, SIN.' AND t2.producto = '".$pro."' ";
    
 $resc = mysqli_query($connect, $sqlc);  
if ($resc->num_rows > 0) {  
while($fac = $resc->fetch_assoc()) {
$volcompra = $fac["volumen"];	
$Cantidad = $fac["volumen"];	
$Porcentaje = $fac["Porcentaje"]; 
$TOTAL = $fac["total"]; 
$Flete = $fac["Flete"]; 
$Importe = $fac["Importe"];
//$Cantidad = $fac["Cantidad"]; 
$ValorU = $fac["ValorUnitario"];
$Descuento = $fac["Descuento"];
$ff = $fac["folio"];
$IVA = $fac["Iva"];
$IVAR = $fac["IvaR"];
}
}

if($Flete > 0 ){
	$IvaFlete = $Flete * 0.16;
	$FleteI = $Flete * 1.16;
$IvaRetencion = $Flete * 0.04;
$SubT = $Importe + $Flete;
$Impuestos = (($TOTAL - ($SubT) + $Descuento)- $IvaFlete);
$Impuestos = $Impuestos + $IvaRetencion;
	}else{
		$IvaFlete = 0;
$IvaRetencion = 0;
$SubT = $Importe;
$Impuestos = (($TOTAL - $Importe) + $Descuento); 
$FleteI = '';
		}
 
 

$PCompra = ($Importe + $Impuestos) / $Cantidad; 
 
$PCompraSD = (($Importe + $Impuestos) - $Descuento) / $Cantidad;
$PrecioCom = $ValorU * 159;
	  $x = (($Descuento * 1.16) + $IVAR)/$Cantidad;
	 $PCompraCD = $PCompraSD + $x;
	 $inventariot  = ($volumenanterior + $volcompra) - $volumensistema;
	 if($volcompra > 0){$volcompra = number_format($volcompra,2);}else{$volcompra = "";}
	 if($PCompraCD > 0){$PCompraCD = "$".number_format($PCompraCD,2);}else{$PCompraCD = "";}
	 if($PCompraSD > 0){$PCompraSD = "$".number_format($PCompraSD,2);}else{$PCompraSD = "";}
	 if($FleteI > 0){$FleteI = "$".number_format($FleteI,2);}else{$FleteI = "";}
	
	$Diferencia = $rowd["volumen"] - $inventariot;
	
	
	echo "<tr>
 
<td><div align='center'><label>".$rf["producto"]."</label></div></td>
<td><div align='center'><label>".number_format($volumenanterior,2)."</label></div></td>
<td><div align='center'><label>".number_format($rowd["volumen"],2)."</label></div></td>
<td><div align='center'><label>".($volumenanterior - $rowd["volumen"])."</label></div></td>
<td><div align='center'><label>".$volumensistema."</label></div></td></td>
<td><div align='center'><label>".$volcompra."</label></div></td></td>
<td><div align='center' style='width:80px;'><label>".$PCompraCD."</label></div></td>
<td><div align='center' style='width:80px;'><label >".$PCompraSD."</label></div></td> 
<td><div align='center' style='width:80px;'><label ></label></div></td>   
<td><div align='center' style='width:80px;'><label >".$inventariot."</label></div></td>   
<td><div align='center' style='width:80px;'><label >".$Diferencia."</label></div></td>   
<td><div align='center' style='width:80px;'><label >".$FleteI."</label></div></td>   
</tr>";
	
 

						
						
						
	



}
 				
	 
}



}
}	



	}
	?>
    
	 </table>	
	 
	 <br><br>
	 
	    
<table align="center">
<tr><br></tr>
						<tr><td class="color_blanco" colspan="3">COMERCIALIZADORA PETROMAR - LEY
</td></tr>
						<tr>
						<th align="center" rowspan="2">Producto</th>
							<th  style='width:40px;' colspan="2">Inventario</th> <!-- inicial final -->
                            <th align="center" style='width:80px;colspan' colspan="2">Ventas</th><!-- teorico sistema -->
							<th align="center" rowspan="2">Compra</th>
							<th align="center" rowspan="2">Precio</th>
							<th align="center" rowspan="2">Precio Con Descuento</th>
							<th align="center" rowspan="2">OPE</th>
                            <th align="center" rowspan="2">Inventario Teorico</th>
                            <th align="center" rowspan="2">Diferencia</th>
                            <th align="center" rowspan="2">Flete</th>
				
						</tr>

                        <tr>
                            <th>Inicial</th>
                            <th>Final</th>
                            <th>Teorico</th>
                            <th>Sistema</th>
                        </tr>
						
    
    <?php 
	if (isset($_POST['fini'])) {
// Check connection 
$inicial = $_POST['fini'];   

$cont = 0; 
 $idempresa = $_POST["IdEmpresa"];


$productos = "SELECT  producto FROM inventarios WHERE idestacion = '2' GROUP BY producto";
 
 $resultf = mysqli_query($connect2, $productos);  
if ($resultf->num_rows > 0) { 
while($rf = $resultf->fetch_assoc()) {
 
 

  $sqld = "SELECT t1.folio, t1.producto,  t1.volumen, t1.fecha 
  FROM inventarios t1  WHERE DATE(t1.fecha) = STR_TO_DATE('".$_POST["fini"]."', '%d/%m/%Y') AND producto = '".$rf["producto"]."' and idestacion = '2' ORDER BY t1.fecha DESC LIMIT 1 ";
   
   
   
 $resultd = mysqli_query($connect2, $sqld);  
if ($resultd->num_rows > 0) { 
while($rowd = $resultd->fetch_assoc()) {  
	
  $diaanterior = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $rowd["fecha"]) ) ));
 
 $sqlda = "SELECT t1.folio, t1.producto,  t1.volumen, t1.fecha 
  FROM inventarios t1  WHERE DATE(t1.fecha) = '".$diaanterior."' AND producto = '".$rf["producto"]."' and idestacion = '2' ORDER BY t1.fecha DESC LIMIT 1 ";
 //hastaaqui vamos bien
 $resultda = mysqli_query($connect2, $sqlda);  
if ($resultda->num_rows > 0) { 
while($rowda = $resultda->fetch_assoc()) {
$volumenanterior = $rowda["volumen"];	
}
}


$sqlvolumensistema = "SELECT volm, volp, vold, fecha  FROM volsistema WHERE estacion = '2' ORDER BY folio DESC LIMIT 1";
 //hastaaqui vamos bien 
 $resultvols = mysqli_query($connect2, $sqlvolumensistema);  
if ($resultvols->num_rows > 0) { 
while($rowvs = $resultvols->fetch_assoc()) {
$volm = $rowvs["volm"];	
$volp = $rowvs["volp"];	
$vold = $rowvs["vold"];	
$fechavol = $rowvs["fecha"];	
}
}
 



if($rf["producto"] == "Pemex Magna"){$pro = "GASOLINA 87 OCT";
$volumensistema = $volm; 
}
if($rf["producto"] == "Pemex Premium"){$pro = "GASOLINA 91 OCT";
$volumensistema = $volp;
}
if($rf["producto"] == "Pemex Diesel"){$pro = "DIESEL";
$volumensistema = $vold;
} 
 
$sqlc = "SELECT SUM(cantidad) as volumen, Descuento, Importe, Flete, t1.total FROM facturas  t1 INNER JOIN pedido t2 ON t1.folio = t2.foliofactura WHERE
   DATE(t1.fecha) = STR_TO_DATE('".$_POST["fini"]."', '%d/%m/%Y') AND t2.Destino = '2-MAZATLAN, SIN.' AND t2.producto = '".$pro."' ";
    
 $resc = mysqli_query($connect, $sqlc);  
if ($resc->num_rows > 0) {  
while($fac = $resc->fetch_assoc()) {
$volcompra = $fac["volumen"];	
$Cantidad = $fac["volumen"];	
$Porcentaje = $fac["Porcentaje"]; 
$TOTAL = $fac["total"]; 
$Flete = $fac["Flete"]; 
$Importe = $fac["Importe"];
//$Cantidad = $fac["Cantidad"]; 
$ValorU = $fac["ValorUnitario"];
$Descuento = $fac["Descuento"];
$ff = $fac["folio"];
$IVA = $fac["Iva"];
$IVAR = $fac["IvaR"];
}
}

if($Flete > 0 ){
	$IvaFlete = $Flete * 0.16;
	$FleteI = $Flete * 1.16;
$IvaRetencion = $Flete * 0.04;
$SubT = $Importe + $Flete;
$Impuestos = (($TOTAL - ($SubT) + $Descuento)- $IvaFlete);
$Impuestos = $Impuestos + $IvaRetencion;
	}else{
		$IvaFlete = 0;
$IvaRetencion = 0;
$SubT = $Importe;
$Impuestos = (($TOTAL - $Importe) + $Descuento); 
$FleteI = '';
		}
 
 

$PCompra = ($Importe + $Impuestos) / $Cantidad; 
 
$PCompraSD = (($Importe + $Impuestos) - $Descuento) / $Cantidad;
$PrecioCom = $ValorU * 159;
	  $x = (($Descuento * 1.16) + $IVAR)/$Cantidad;
	 $PCompraCD = $PCompraSD + $x;
	 $inventariot  = ($volumenanterior + $volcompra) - $volumensistema;
	 if($volcompra > 0){$volcompra = number_format($volcompra,2);}else{$volcompra = "";}
	 if($PCompraCD > 0){$PCompraCD = "$".number_format($PCompraCD,2);}else{$PCompraCD = "";}
	 if($PCompraSD > 0){$PCompraSD = "$".number_format($PCompraSD,2);}else{$PCompraSD = "";}
	 if($FleteI > 0){$FleteI = "$".number_format($FleteI,2);}else{$FleteI = "";}
	
	$Diferencia = $rowd["volumen"] - $inventariot;
	
	
	echo "<tr>
 
<td><div align='center'><label>".$rf["producto"]."</label></div></td>
<td><div align='center'><label>".number_format($volumenanterior,2)."</label></div></td>
<td><div align='center'><label>".number_format($rowd["volumen"],2)."</label></div></td>
<td><div align='center'><label>".($volumenanterior - $rowd["volumen"])."</label></div></td>
<td><div align='center'><label>".$volumensistema."</label></div></td></td>
<td><div align='center'><label>".$volcompra."</label></div></td></td>
<td><div align='center' style='width:80px;'><label>".$PCompraCD."</label></div></td>
<td><div align='center' style='width:80px;'><label >".$PCompraSD."</label></div></td> 
<td><div align='center' style='width:80px;'><label ></label></div></td>   
<td><div align='center' style='width:80px;'><label >".$inventariot."</label></div></td>   
<td><div align='center' style='width:80px;'><label >".$Diferencia."</label></div></td>   
<td><div align='center' style='width:80px;'><label >".$FleteI."</label></div></td>   
</tr>";
	
 

						
						
						
	



}
 				
	 
}



}
}	



	}
	?>
    
	 </table>	
	 
	 <br><br>
	    
<table align="center">
<tr><br></tr>
						<tr><td class="color_blanco" colspan="3">COMERCIALIZADORA PETROMAR - LIBRAMIENTE
</td></tr>
						<tr>
						<th align="center" rowspan="2">Producto</th>
							<th  style='width:40px;' colspan="2">Inventario</th> <!-- inicial final -->
                            <th align="center" style='width:80px;colspan' colspan="2">Ventas</th><!-- teorico sistema -->
							<th align="center" rowspan="2">Compra</th>
							<th align="center" rowspan="2">Precio</th>
							<th align="center" rowspan="2">Precio Con Descuento</th>
							<th align="center" rowspan="2">OPE</th>
                            <th align="center" rowspan="2">Inventario Teorico</th>
                            <th align="center" rowspan="2">Diferencia</th>
                            <th align="center" rowspan="2">Flete</th>
				
						</tr>

                        <tr>
                            <th>Inicial</th>
                            <th>Final</th>
                            <th>Teorico</th>
                            <th>Sistema</th>
                        </tr>
						
    
    <?php 
	if (isset($_POST['fini'])) {
// Check connection 
$inicial = $_POST['fini'];   

$cont = 0; 
 $idempresa = $_POST["IdEmpresa"];


$productos = "SELECT  producto FROM inventarios WHERE idestacion = '3' GROUP BY producto";
 
 $resultf = mysqli_query($connect2, $productos);  
if ($resultf->num_rows > 0) { 
while($rf = $resultf->fetch_assoc()) {
 
 

  $sqld = "SELECT t1.folio, t1.producto,  t1.volumen, t1.fecha 
  FROM inventarios t1  WHERE DATE(t1.fecha) = STR_TO_DATE('".$_POST["fini"]."', '%d/%m/%Y') AND producto = '".$rf["producto"]."' and idestacion = '3' ORDER BY t1.fecha DESC LIMIT 1 ";
   
   
   
 $resultd = mysqli_query($connect2, $sqld);  
if ($resultd->num_rows > 0) { 
while($rowd = $resultd->fetch_assoc()) {  
	
  $diaanterior = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $rowd["fecha"]) ) ));
 
 $sqlda = "SELECT t1.folio, t1.producto,  t1.volumen, t1.fecha 
  FROM inventarios t1  WHERE DATE(t1.fecha) = '".$diaanterior."' AND producto = '".$rf["producto"]."' and idestacion = '3' ORDER BY t1.fecha DESC LIMIT 1 ";
 //hastaaqui vamos bien
 $resultda = mysqli_query($connect2, $sqlda);  
if ($resultda->num_rows > 0) { 
while($rowda = $resultda->fetch_assoc()) {
$volumenanterior = $rowda["volumen"];	
}
}


$sqlvolumensistema = "SELECT volm, volp, vold, fecha  FROM volsistema WHERE estacion = '3' ORDER BY folio DESC LIMIT 1";
 //hastaaqui vamos bien 
 $resultvols = mysqli_query($connect2, $sqlvolumensistema);  
if ($resultvols->num_rows > 0) { 
while($rowvs = $resultvols->fetch_assoc()) {
$volm = $rowvs["volm"];	
$volp = $rowvs["volp"];	
$vold = $rowvs["vold"];	
$fechavol = $rowvs["fecha"];	
}
}
 



if($rf["producto"] == "Pemex Magna"){$pro = "GASOLINA 87 OCT";
$volumensistema = $volm; 
}
if($rf["producto"] == "Pemex Premium"){$pro = "GASOLINA 91 OCT";
$volumensistema = $volp;
}
if($rf["producto"] == "Pemex Diesel"){$pro = "DIESEL";
$volumensistema = $vold;
} 
 
$sqlc = "SELECT SUM(cantidad) as volumen, Descuento, Importe, Flete, t1.total FROM facturas  t1 INNER JOIN pedido t2 ON t1.folio = t2.foliofactura WHERE
   DATE(t1.fecha) = STR_TO_DATE('".$_POST["fini"]."', '%d/%m/%Y') AND t2.Destino = '3-MAZATLAN, SIN.' AND t2.producto = '".$pro."' ";
    
 $resc = mysqli_query($connect, $sqlc);  
if ($resc->num_rows > 0) {  
while($fac = $resc->fetch_assoc()) {
$volcompra = $fac["volumen"];	
$Cantidad = $fac["volumen"];	
$Porcentaje = $fac["Porcentaje"]; 
$TOTAL = $fac["total"]; 
$Flete = $fac["Flete"]; 
$Importe = $fac["Importe"];
//$Cantidad = $fac["Cantidad"]; 
$ValorU = $fac["ValorUnitario"];
$Descuento = $fac["Descuento"];
$ff = $fac["folio"];
$IVA = $fac["Iva"];
$IVAR = $fac["IvaR"];
}
}

if($Flete > 0 ){
	$IvaFlete = $Flete * 0.16;
	$FleteI = $Flete * 1.16;
$IvaRetencion = $Flete * 0.04;
$SubT = $Importe + $Flete;
$Impuestos = (($TOTAL - ($SubT) + $Descuento)- $IvaFlete);
$Impuestos = $Impuestos + $IvaRetencion;
	}else{
		$IvaFlete = 0;
$IvaRetencion = 0;
$SubT = $Importe;
$Impuestos = (($TOTAL - $Importe) + $Descuento); 
$FleteI = '';
		}
 
 

$PCompra = ($Importe + $Impuestos) / $Cantidad; 
 
$PCompraSD = (($Importe + $Impuestos) - $Descuento) / $Cantidad;
$PrecioCom = $ValorU * 159;
	  $x = (($Descuento * 1.16) + $IVAR)/$Cantidad;
	 $PCompraCD = $PCompraSD + $x;
	 $inventariot  = ($volumenanterior + $volcompra) - $volumensistema;
	 if($volcompra > 0){$volcompra = number_format($volcompra,2);}else{$volcompra = "";}
	 if($PCompraCD > 0){$PCompraCD = "$".number_format($PCompraCD,2);}else{$PCompraCD = "";}
	 if($PCompraSD > 0){$PCompraSD = "$".number_format($PCompraSD,2);}else{$PCompraSD = "";}
	 if($FleteI > 0){$FleteI = "$".number_format($FleteI,2);}else{$FleteI = "";}
	
	$Diferencia = $rowd["volumen"] - $inventariot;
	
	
	echo "<tr>
 
<td><div align='center'><label>".$rf["producto"]."</label></div></td>
<td><div align='center'><label>".number_format($volumenanterior,2)."</label></div></td>
<td><div align='center'><label>".number_format($rowd["volumen"],2)."</label></div></td>
<td><div align='center'><label>".($volumenanterior - $rowd["volumen"])."</label></div></td>
<td><div align='center'><label>".$volumensistema."</label></div></td></td>
<td><div align='center'><label>".$volcompra."</label></div></td></td>
<td><div align='center' style='width:80px;'><label>".$PCompraCD."</label></div></td>
<td><div align='center' style='width:80px;'><label >".$PCompraSD."</label></div></td> 
<td><div align='center' style='width:80px;'><label ></label></div></td>   
<td><div align='center' style='width:80px;'><label >".$inventariot."</label></div></td>   
<td><div align='center' style='width:80px;'><label >".$Diferencia."</label></div></td>   
<td><div align='center' style='width:80px;'><label >".$FleteI."</label></div></td>   
</tr>";
	
 

						
						
						
	



}
 				
	 
}



}
}	



	}
	?>
    
	 </table>	
	 <br><br>
   
<table align="center">
<tr><br></tr>
						<tr><td class="color_blanco" colspan="3">COMERCIALIZADORA PETROMAR - MUNICH
</td></tr>
						<tr>
						<th align="center" rowspan="2">Producto</th>
							<th  style='width:40px;' colspan="2">Inventario</th> <!-- inicial final -->
                            <th align="center" style='width:80px;colspan' colspan="2">Ventas</th><!-- teorico sistema -->
							<th align="center" rowspan="2">Compra</th>
							<th align="center" rowspan="2">Precio</th>
							<th align="center" rowspan="2">Precio Con Descuento</th>
							<th align="center" rowspan="2">OPE</th>
                            <th align="center" rowspan="2">Inventario Teorico</th>
                            <th align="center" rowspan="2">Diferencia</th>
                            <th align="center" rowspan="2">Flete</th>
				
						</tr>

                        <tr>
                            <th>Inicial</th>
                            <th>Final</th>
                            <th>Teorico</th>
                            <th>Sistema</th>
                        </tr>
						
    
    <?php 
	if (isset($_POST['fini'])) {
// Check connection 
$inicial = $_POST['fini'];   

$cont = 0; 
 $idempresa = $_POST["IdEmpresa"];


$productos = "SELECT  producto FROM inventarios WHERE idestacion = '4' GROUP BY producto";
 
 $resultf = mysqli_query($connect2, $productos);  
if ($resultf->num_rows > 0) { 
while($rf = $resultf->fetch_assoc()) {
 
 

  $sqld = "SELECT t1.folio, t1.producto,  t1.volumen, t1.fecha 
  FROM inventarios t1  WHERE DATE(t1.fecha) = STR_TO_DATE('".$_POST["fini"]."', '%d/%m/%Y') AND producto = '".$rf["producto"]."' and idestacion = '4' ORDER BY t1.fecha DESC LIMIT 1 ";
   
   
   
 $resultd = mysqli_query($connect2, $sqld);  
if ($resultd->num_rows > 0) { 
while($rowd = $resultd->fetch_assoc()) {  
	
  $diaanterior = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $rowd["fecha"]) ) ));
 
 $sqlda = "SELECT t1.folio, t1.producto,  t1.volumen, t1.fecha 
  FROM inventarios t1  WHERE DATE(t1.fecha) = '".$diaanterior."' AND producto = '".$rf["producto"]."' and idestacion = '4' ORDER BY t1.fecha DESC LIMIT 1 ";
 //hastaaqui vamos bien
 $resultda = mysqli_query($connect2, $sqlda);  
if ($resultda->num_rows > 0) { 
while($rowda = $resultda->fetch_assoc()) {
$volumenanterior = $rowda["volumen"];	
}
}


$sqlvolumensistema = "SELECT volm, volp, vold, fecha  FROM volsistema WHERE estacion = '4' ORDER BY folio DESC LIMIT 1";
 //hastaaqui vamos bien 
 $resultvols = mysqli_query($connect2, $sqlvolumensistema);  
if ($resultvols->num_rows > 0) { 
while($rowvs = $resultvols->fetch_assoc()) {
$volm = $rowvs["volm"];	
$volp = $rowvs["volp"];	
$vold = $rowvs["vold"];	
$fechavol = $rowvs["fecha"];	
}
}
 



if($rf["producto"] == "Pemex Magna"){$pro = "GASOLINA 87 OCT";
$volumensistema = $volm; 
}
if($rf["producto"] == "Pemex Premium"){$pro = "GASOLINA 91 OCT";
$volumensistema = $volp;
}
if($rf["producto"] == "Pemex Diesel"){$pro = "DIESEL";
$volumensistema = $vold;
} 
 
$sqlc = "SELECT SUM(cantidad) as volumen, Descuento, Importe, Flete, t1.total FROM facturas  t1 INNER JOIN pedido t2 ON t1.folio = t2.foliofactura WHERE
   DATE(t1.fecha) = STR_TO_DATE('".$_POST["fini"]."', '%d/%m/%Y') AND t2.Destino = '4-MAZATLAN, SIN.' AND t2.producto = '".$pro."' ";
    
 $resc = mysqli_query($connect, $sqlc);  
if ($resc->num_rows > 0) {  
while($fac = $resc->fetch_assoc()) {
$volcompra = $fac["volumen"];	
$Cantidad = $fac["volumen"];	
$Porcentaje = $fac["Porcentaje"]; 
$TOTAL = $fac["total"]; 
$Flete = $fac["Flete"]; 
$Importe = $fac["Importe"];
//$Cantidad = $fac["Cantidad"]; 
$ValorU = $fac["ValorUnitario"];
$Descuento = $fac["Descuento"];
$ff = $fac["folio"];
$IVA = $fac["Iva"];
$IVAR = $fac["IvaR"];
}
}

if($Flete > 0 ){
	$IvaFlete = $Flete * 0.16;
	$FleteI = $Flete * 1.16;
$IvaRetencion = $Flete * 0.04;
$SubT = $Importe + $Flete;
$Impuestos = (($TOTAL - ($SubT) + $Descuento)- $IvaFlete);
$Impuestos = $Impuestos + $IvaRetencion;
	}else{
		$IvaFlete = 0;
$IvaRetencion = 0;
$SubT = $Importe;
$Impuestos = (($TOTAL - $Importe) + $Descuento); 
$FleteI = '';
		}
 
 

$PCompra = ($Importe + $Impuestos) / $Cantidad; 
 
$PCompraSD = (($Importe + $Impuestos) - $Descuento) / $Cantidad;
$PrecioCom = $ValorU * 159;
	  $x = (($Descuento * 1.16) + $IVAR)/$Cantidad;
	 $PCompraCD = $PCompraSD + $x;
	 $inventariot  = ($volumenanterior + $volcompra) - $volumensistema;
	 if($volcompra > 0){$volcompra = number_format($volcompra,2);}else{$volcompra = "";}
	 if($PCompraCD > 0){$PCompraCD = "$".number_format($PCompraCD,2);}else{$PCompraCD = "";}
	 if($PCompraSD > 0){$PCompraSD = "$".number_format($PCompraSD,2);}else{$PCompraSD = "";}
	 if($FleteI > 0){$FleteI = "$".number_format($FleteI,2);}else{$FleteI = "";}
	
	$Diferencia = $rowd["volumen"] - $inventariot;
	
	
	echo "<tr>
 
<td><div align='center'><label>".$rf["producto"]."</label></div></td>
<td><div align='center'><label>".number_format($volumenanterior,2)."</label></div></td>
<td><div align='center'><label>".number_format($rowd["volumen"],2)."</label></div></td>
<td><div align='center'><label>".($volumenanterior - $rowd["volumen"])."</label></div></td>
<td><div align='center'><label>".$volumensistema."</label></div></td></td>
<td><div align='center'><label>".$volcompra."</label></div></td></td>
<td><div align='center' style='width:80px;'><label>".$PCompraCD."</label></div></td>
<td><div align='center' style='width:80px;'><label >".$PCompraSD."</label></div></td> 
<td><div align='center' style='width:80px;'><label ></label></div></td>   
<td><div align='center' style='width:80px;'><label >".$inventariot."</label></div></td>   
<td><div align='center' style='width:80px;'><label >".$Diferencia."</label></div></td>   
<td><div align='center' style='width:80px;'><label >".$FleteI."</label></div></td>   
</tr>";
	
 

						
						
						
	



}
 				
	 
}



}
}	



	}
	?>
    
	 </table>	
<br><br>	
   
<table align="center">
<tr><br></tr>
						<tr><td class="color_blanco" colspan="3">COMERCIALIZADORA PETROMAR - INSURGENTES
</td></tr>
						<tr>
						<th align="center" rowspan="2">Producto</th>
							<th  style='width:40px;' colspan="2">Inventario</th> <!-- inicial final -->
                            <th align="center" style='width:80px;colspan' colspan="2">Ventas</th><!-- teorico sistema -->
							<th align="center" rowspan="2">Compra</th>
							<th align="center" rowspan="2">Precio</th>
							<th align="center" rowspan="2">Precio Con Descuento</th>
							<th align="center" rowspan="2">OPE</th>
                            <th align="center" rowspan="2">Inventario Teorico</th>
                            <th align="center" rowspan="2">Diferencia</th>
                            <th align="center" rowspan="2">Flete</th>
				
						</tr>

                        <tr>
                            <th>Inicial</th>
                            <th>Final</th>
                            <th>Teorico</th>
                            <th>Sistema</th>
                        </tr>
						
    
    <?php 
	if (isset($_POST['fini'])) {
// Check connection 
$inicial = $_POST['fini'];   

$cont = 0; 
 $idempresa = $_POST["IdEmpresa"];


$productos = "SELECT  producto FROM inventarios WHERE idestacion = '5' GROUP BY producto";
 
 $resultf = mysqli_query($connect2, $productos);  
if ($resultf->num_rows > 0) { 
while($rf = $resultf->fetch_assoc()) {
 
 

  $sqld = "SELECT t1.folio, t1.producto,  t1.volumen, t1.fecha 
  FROM inventarios t1  WHERE DATE(t1.fecha) = STR_TO_DATE('".$_POST["fini"]."', '%d/%m/%Y') AND producto = '".$rf["producto"]."' and idestacion = '5' ORDER BY t1.fecha DESC LIMIT 1 ";
   
   
   
 $resultd = mysqli_query($connect2, $sqld);  
if ($resultd->num_rows > 0) { 
while($rowd = $resultd->fetch_assoc()) {  
	
  $diaanterior = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $rowd["fecha"]) ) ));
 
 $sqlda = "SELECT t1.folio, t1.producto,  t1.volumen, t1.fecha 
  FROM inventarios t1  WHERE DATE(t1.fecha) = '".$diaanterior."' AND producto = '".$rf["producto"]."' and idestacion = '5' ORDER BY t1.fecha DESC LIMIT 1 ";
 //hastaaqui vamos bien
 $resultda = mysqli_query($connect2, $sqlda);  
if ($resultda->num_rows > 0) { 
while($rowda = $resultda->fetch_assoc()) {
$volumenanterior = $rowda["volumen"];	
}
}


$sqlvolumensistema = "SELECT volm, volp, vold, fecha  FROM volsistema WHERE estacion = '5' ORDER BY folio DESC LIMIT 1";
 //hastaaqui vamos bien 
 $resultvols = mysqli_query($connect2, $sqlvolumensistema);  
if ($resultvols->num_rows > 0) { 
while($rowvs = $resultvols->fetch_assoc()) {
$volm = $rowvs["volm"];	
$volp = $rowvs["volp"];	
$vold = $rowvs["vold"];	
$fechavol = $rowvs["fecha"];	
}
}
 



if($rf["producto"] == "Pemex Magna"){$pro = "GASOLINA 87 OCT";
$volumensistema = $volm; 
}
if($rf["producto"] == "Pemex Premium"){$pro = "GASOLINA 91 OCT";
$volumensistema = $volp;
}
if($rf["producto"] == "Pemex Diesel"){$pro = "DIESEL";
$volumensistema = $vold;
} 
 
$sqlc = "SELECT SUM(cantidad) as volumen, Descuento, Importe, Flete, t1.total FROM facturas  t1 INNER JOIN pedido t2 ON t1.folio = t2.foliofactura WHERE
   DATE(t1.fecha) = STR_TO_DATE('".$_POST["fini"]."', '%d/%m/%Y') AND t2.Destino = '5-MAZATLAN, SIN.' AND t2.producto = '".$pro."' ";
    
 $resc = mysqli_query($connect, $sqlc);  
if ($resc->num_rows > 0) {  
while($fac = $resc->fetch_assoc()) {
$volcompra = $fac["volumen"];	
$Cantidad = $fac["volumen"];	
$Porcentaje = $fac["Porcentaje"]; 
$TOTAL = $fac["total"]; 
$Flete = $fac["Flete"]; 
$Importe = $fac["Importe"];
//$Cantidad = $fac["Cantidad"]; 
$ValorU = $fac["ValorUnitario"];
$Descuento = $fac["Descuento"];
$ff = $fac["folio"];
$IVA = $fac["Iva"];
$IVAR = $fac["IvaR"];
}
}

if($Flete > 0 ){
	$IvaFlete = $Flete * 0.16;
	$FleteI = $Flete * 1.16;
$IvaRetencion = $Flete * 0.04;
$SubT = $Importe + $Flete;
$Impuestos = (($TOTAL - ($SubT) + $Descuento)- $IvaFlete);
$Impuestos = $Impuestos + $IvaRetencion;
	}else{
		$IvaFlete = 0;
$IvaRetencion = 0;
$SubT = $Importe;
$Impuestos = (($TOTAL - $Importe) + $Descuento); 
$FleteI = '';
		}
 
 

$PCompra = ($Importe + $Impuestos) / $Cantidad; 
 
$PCompraSD = (($Importe + $Impuestos) - $Descuento) / $Cantidad;
$PrecioCom = $ValorU * 159;
	  $x = (($Descuento * 1.16) + $IVAR)/$Cantidad;
	 $PCompraCD = $PCompraSD + $x;
	 $inventariot  = ($volumenanterior + $volcompra) - $volumensistema;
	 if($volcompra > 0){$volcompra = number_format($volcompra,2);}else{$volcompra = "";}
	 if($PCompraCD > 0){$PCompraCD = "$".number_format($PCompraCD,2);}else{$PCompraCD = "";}
	 if($PCompraSD > 0){$PCompraSD = "$".number_format($PCompraSD,2);}else{$PCompraSD = "";}
	 if($FleteI > 0){$FleteI = "$".number_format($FleteI,2);}else{$FleteI = "";}
	
	$Diferencia = $rowd["volumen"] - $inventariot;
	
	
	echo "<tr>
 
<td><div align='center'><label>".$rf["producto"]."</label></div></td>
<td><div align='center'><label>".number_format($volumenanterior,2)."</label></div></td>
<td><div align='center'><label>".number_format($rowd["volumen"],2)."</label></div></td>
<td><div align='center'><label>".($volumenanterior - $rowd["volumen"])."</label></div></td>
<td><div align='center'><label>".$volumensistema."</label></div></td></td>
<td><div align='center'><label>".$volcompra."</label></div></td></td>
<td><div align='center' style='width:80px;'><label>".$PCompraCD."</label></div></td>
<td><div align='center' style='width:80px;'><label >".$PCompraSD."</label></div></td> 
<td><div align='center' style='width:80px;'><label ></label></div></td>   
<td><div align='center' style='width:80px;'><label >".$inventariot."</label></div></td>   
<td><div align='center' style='width:80px;'><label >".$Diferencia."</label></div></td>   
<td><div align='center' style='width:80px;'><label >".$FleteI."</label></div></td>   
</tr>";
	
 

						
						
						
	



}
 				
	 
}



}
}	



	}
	?>
    
	 </table>	
<br><br>
   
<table align="center">
<tr><br></tr>
						<tr><td class="color_blanco" colspan="3">COMERCIALIZADORA PETROMAR - LOPEZ SAENZ
</td></tr>
						<tr>
						<th align="center" rowspan="2">Producto</th>
							<th  style='width:40px;' colspan="2">Inventario</th> <!-- inicial final -->
                            <th align="center" style='width:80px;colspan' colspan="2">Ventas</th><!-- teorico sistema -->
							<th align="center" rowspan="2">Compra</th>
							<th align="center" rowspan="2">Precio</th>
							<th align="center" rowspan="2">Precio Con Descuento</th>
							<th align="center" rowspan="2">OPE</th>
                            <th align="center" rowspan="2">Inventario Teorico</th>
                            <th align="center" rowspan="2">Diferencia</th>
                            <th align="center" rowspan="2">Flete</th>
				
						</tr>

                        <tr>
                            <th>Inicial</th>
                            <th>Final</th>
                            <th>Teorico</th>
                            <th>Sistema</th>
                        </tr>
						
    
    <?php 
	if (isset($_POST['fini'])) {
// Check connection 
$inicial = $_POST['fini'];   

$cont = 0; 
 $idempresa = $_POST["IdEmpresa"];


$productos = "SELECT  producto FROM inventarios WHERE idestacion = '6' GROUP BY producto";
 
 $resultf = mysqli_query($connect2, $productos);  
if ($resultf->num_rows > 0) { 
while($rf = $resultf->fetch_assoc()) {
 
 

  $sqld = "SELECT t1.folio, t1.producto,  t1.volumen, t1.fecha 
  FROM inventarios t1  WHERE DATE(t1.fecha) = STR_TO_DATE('".$_POST["fini"]."', '%d/%m/%Y') AND producto = '".$rf["producto"]."' and idestacion = '6' ORDER BY t1.fecha DESC LIMIT 1 ";
   
   
   
 $resultd = mysqli_query($connect2, $sqld);  
if ($resultd->num_rows > 0) { 
while($rowd = $resultd->fetch_assoc()) {  
	
  $diaanterior = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $rowd["fecha"]) ) ));
 
 $sqlda = "SELECT t1.folio, t1.producto,  t1.volumen, t1.fecha 
  FROM inventarios t1  WHERE DATE(t1.fecha) = '".$diaanterior."' AND producto = '".$rf["producto"]."' and idestacion = '6' ORDER BY t1.fecha DESC LIMIT 1 ";
 //hastaaqui vamos bien
 $resultda = mysqli_query($connect2, $sqlda);  
if ($resultda->num_rows > 0) { 
while($rowda = $resultda->fetch_assoc()) {
$volumenanterior = $rowda["volumen"];	
}
}


$sqlvolumensistema = "SELECT volm, volp, vold, fecha  FROM volsistema WHERE estacion = '6' ORDER BY folio DESC LIMIT 1";
 //hastaaqui vamos bien 
 $resultvols = mysqli_query($connect2, $sqlvolumensistema);  
if ($resultvols->num_rows > 0) { 
while($rowvs = $resultvols->fetch_assoc()) {
$volm = $rowvs["volm"];	
$volp = $rowvs["volp"];	
$vold = $rowvs["vold"];	
$fechavol = $rowvs["fecha"];	
}
}
 



if($rf["producto"] == "Pemex Magna"){$pro = "GASOLINA 87 OCT";
$volumensistema = $volm; 
}
if($rf["producto"] == "Pemex Premium"){$pro = "GASOLINA 91 OCT";
$volumensistema = $volp;
}
if($rf["producto"] == "Pemex Diesel"){$pro = "DIESEL";
$volumensistema = $vold;
} 
 
$sqlc = "SELECT SUM(cantidad) as volumen, Descuento, Importe, Flete, t1.total FROM facturas  t1 INNER JOIN pedido t2 ON t1.folio = t2.foliofactura WHERE
   DATE(t1.fecha) = STR_TO_DATE('".$_POST["fini"]."', '%d/%m/%Y') AND t2.Destino = '6-MAZATLAN, SIN.' AND t2.producto = '".$pro."' ";
    
 $resc = mysqli_query($connect, $sqlc);  
if ($resc->num_rows > 0) {  
while($fac = $resc->fetch_assoc()) {
$volcompra = $fac["volumen"];	
$Cantidad = $fac["volumen"];	
$Porcentaje = $fac["Porcentaje"]; 
$TOTAL = $fac["total"]; 
$Flete = $fac["Flete"]; 
$Importe = $fac["Importe"];
//$Cantidad = $fac["Cantidad"]; 
$ValorU = $fac["ValorUnitario"];
$Descuento = $fac["Descuento"];
$ff = $fac["folio"];
$IVA = $fac["Iva"];
$IVAR = $fac["IvaR"];
}
}

if($Flete > 0 ){
	$IvaFlete = $Flete * 0.16;
	$FleteI = $Flete * 1.16;
$IvaRetencion = $Flete * 0.04;
$SubT = $Importe + $Flete;
$Impuestos = (($TOTAL - ($SubT) + $Descuento)- $IvaFlete);
$Impuestos = $Impuestos + $IvaRetencion;
	}else{
		$IvaFlete = 0;
$IvaRetencion = 0;
$SubT = $Importe;
$Impuestos = (($TOTAL - $Importe) + $Descuento); 
$FleteI = '';
		}
 
 

$PCompra = ($Importe + $Impuestos) / $Cantidad; 
 
$PCompraSD = (($Importe + $Impuestos) - $Descuento) / $Cantidad;
$PrecioCom = $ValorU * 159;
	  $x = (($Descuento * 1.16) + $IVAR)/$Cantidad;
	 $PCompraCD = $PCompraSD + $x;
	 $inventariot  = ($volumenanterior + $volcompra) - $volumensistema;
	 if($volcompra > 0){$volcompra = number_format($volcompra,2);}else{$volcompra = "";}
	 if($PCompraCD > 0){$PCompraCD = "$".number_format($PCompraCD,2);}else{$PCompraCD = "";}
	 if($PCompraSD > 0){$PCompraSD = "$".number_format($PCompraSD,2);}else{$PCompraSD = "";}
	 if($FleteI > 0){$FleteI = "$".number_format($FleteI,2);}else{$FleteI = "";}
	
	$Diferencia = $rowd["volumen"] - $inventariot;
	
	
	echo "<tr>
 
<td><div align='center'><label>".$rf["producto"]."</label></div></td>
<td><div align='center'><label>".number_format($volumenanterior,2)."</label></div></td>
<td><div align='center'><label>".number_format($rowd["volumen"],2)."</label></div></td>
<td><div align='center'><label>".($volumenanterior - $rowd["volumen"])."</label></div></td>
<td><div align='center'><label>".$volumensistema."</label></div></td></td>
<td><div align='center'><label>".$volcompra."</label></div></td></td>
<td><div align='center' style='width:80px;'><label>".$PCompraCD."</label></div></td>
<td><div align='center' style='width:80px;'><label >".$PCompraSD."</label></div></td> 
<td><div align='center' style='width:80px;'><label ></label></div></td>   
<td><div align='center' style='width:80px;'><label >".$inventariot."</label></div></td>   
<td><div align='center' style='width:80px;'><label >".$Diferencia."</label></div></td>   
<td><div align='center' style='width:80px;'><label >".$FleteI."</label></div></td>   
</tr>";
	
 

						
						
						
	



}
 				
	 
}



}
}	



	}
	?>
    
	 </table>	
<br><br>
   
<table align="center">
<tr><br></tr>
						<tr><td class="color_blanco" colspan="3">COMERCIALIZADORA PETROMAR - RIO
</td></tr>
						<tr>
						<th align="center" rowspan="2">Producto</th>
							<th  style='width:40px;' colspan="2">Inventario</th> <!-- inicial final -->
                            <th align="center" style='width:80px;colspan' colspan="2">Ventas</th><!-- teorico sistema -->
							<th align="center" rowspan="2">Compra</th>
							<th align="center" rowspan="2">Precio</th>
							<th align="center" rowspan="2">Precio Con Descuento</th>
							<th align="center" rowspan="2">OPE</th>
                            <th align="center" rowspan="2">Inventario Teorico</th>
                            <th align="center" rowspan="2">Diferencia</th>
                            <th align="center" rowspan="2">Flete</th>
				
						</tr>

                        <tr>
                            <th>Inicial</th>
                            <th>Final</th>
                            <th>Teorico</th>
                            <th>Sistema</th>
                        </tr>
						
    
    <?php 
	if (isset($_POST['fini'])) {
// Check connection 
$inicial = $_POST['fini'];   

$cont = 0; 
 $idempresa = $_POST["IdEmpresa"];


$productos = "SELECT  producto FROM inventarios WHERE idestacion = '7' GROUP BY producto";
 
 $resultf = mysqli_query($connect2, $productos);  
if ($resultf->num_rows > 0) { 
while($rf = $resultf->fetch_assoc()) {
 
 

  $sqld = "SELECT t1.folio, t1.producto,  t1.volumen, t1.fecha 
  FROM inventarios t1  WHERE DATE(t1.fecha) = STR_TO_DATE('".$_POST["fini"]."', '%d/%m/%Y') AND producto = '".$rf["producto"]."' and idestacion = '7' ORDER BY t1.fecha DESC LIMIT 1 ";
   
   
   
 $resultd = mysqli_query($connect2, $sqld);  
if ($resultd->num_rows > 0) { 
while($rowd = $resultd->fetch_assoc()) {  
	
  $diaanterior = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $rowd["fecha"]) ) ));
 
 $sqlda = "SELECT t1.folio, t1.producto,  t1.volumen, t1.fecha 
  FROM inventarios t1  WHERE DATE(t1.fecha) = '".$diaanterior."' AND producto = '".$rf["producto"]."' and idestacion = '7' ORDER BY t1.fecha DESC LIMIT 1 ";
 //hastaaqui vamos bien
 $resultda = mysqli_query($connect2, $sqlda);  
if ($resultda->num_rows > 0) { 
while($rowda = $resultda->fetch_assoc()) {
$volumenanterior = $rowda["volumen"];	
}
}


$sqlvolumensistema = "SELECT volm, volp, vold, fecha  FROM volsistema WHERE estacion = '7' ORDER BY folio DESC LIMIT 1";
 //hastaaqui vamos bien 
 $resultvols = mysqli_query($connect2, $sqlvolumensistema);  
if ($resultvols->num_rows > 0) { 
while($rowvs = $resultvols->fetch_assoc()) {
$volm = $rowvs["volm"];	
$volp = $rowvs["volp"];	
$vold = $rowvs["vold"];	
$fechavol = $rowvs["fecha"];	
}
}
 



if($rf["producto"] == "Pemex Magna"){$pro = "GASOLINA 87 OCT";
$volumensistema = $volm; 
}
if($rf["producto"] == "Pemex Premium"){$pro = "GASOLINA 91 OCT";
$volumensistema = $volp;
}
if($rf["producto"] == "Pemex Diesel"){$pro = "DIESEL";
$volumensistema = $vold;
} 
 
$sqlc = "SELECT SUM(cantidad) as volumen, Descuento, Importe, Flete, t1.total FROM facturas  t1 INNER JOIN pedido t2 ON t1.folio = t2.foliofactura WHERE
   DATE(t1.fecha) = STR_TO_DATE('".$_POST["fini"]."', '%d/%m/%Y') AND t2.Destino = '7-MAZATLAN, SIN.' AND t2.producto = '".$pro."' ";
    
 $resc = mysqli_query($connect, $sqlc);  
if ($resc->num_rows > 0) {  
while($fac = $resc->fetch_assoc()) {
$volcompra = $fac["volumen"];	
$Cantidad = $fac["volumen"];	
$Porcentaje = $fac["Porcentaje"]; 
$TOTAL = $fac["total"]; 
$Flete = $fac["Flete"]; 
$Importe = $fac["Importe"];
//$Cantidad = $fac["Cantidad"]; 
$ValorU = $fac["ValorUnitario"];
$Descuento = $fac["Descuento"];
$ff = $fac["folio"];
$IVA = $fac["Iva"];
$IVAR = $fac["IvaR"];
}
}

if($Flete > 0 ){
	$IvaFlete = $Flete * 0.16;
	$FleteI = $Flete * 1.16;
$IvaRetencion = $Flete * 0.04;
$SubT = $Importe + $Flete;
$Impuestos = (($TOTAL - ($SubT) + $Descuento)- $IvaFlete);
$Impuestos = $Impuestos + $IvaRetencion;
	}else{
		$IvaFlete = 0;
$IvaRetencion = 0;
$SubT = $Importe;
$Impuestos = (($TOTAL - $Importe) + $Descuento); 
$FleteI = '';
		}
 
 

$PCompra = ($Importe + $Impuestos) / $Cantidad; 
 
$PCompraSD = (($Importe + $Impuestos) - $Descuento) / $Cantidad;
$PrecioCom = $ValorU * 159;
	  $x = (($Descuento * 1.16) + $IVAR)/$Cantidad;
	 $PCompraCD = $PCompraSD + $x;
	 $inventariot  = ($volumenanterior + $volcompra) - $volumensistema;
	 if($volcompra > 0){$volcompra = number_format($volcompra,2);}else{$volcompra = "";}
	 if($PCompraCD > 0){$PCompraCD = "$".number_format($PCompraCD,2);}else{$PCompraCD = "";}
	 if($PCompraSD > 0){$PCompraSD = "$".number_format($PCompraSD,2);}else{$PCompraSD = "";}
	 if($FleteI > 0){$FleteI = "$".number_format($FleteI,2);}else{$FleteI = "";}
	
	$Diferencia = $rowd["volumen"] - $inventariot;
	
	
	echo "<tr>
 
<td><div align='center'><label>".$rf["producto"]."</label></div></td>
<td><div align='center'><label>".number_format($volumenanterior,2)."</label></div></td>
<td><div align='center'><label>".number_format($rowd["volumen"],2)."</label></div></td>
<td><div align='center'><label>".($volumenanterior - $rowd["volumen"])."</label></div></td>
<td><div align='center'><label>".$volumensistema."</label></div></td></td>
<td><div align='center'><label>".$volcompra."</label></div></td></td>
<td><div align='center' style='width:80px;'><label>".$PCompraCD."</label></div></td>
<td><div align='center' style='width:80px;'><label >".$PCompraSD."</label></div></td> 
<td><div align='center' style='width:80px;'><label ></label></div></td>   
<td><div align='center' style='width:80px;'><label >".$inventariot."</label></div></td>   
<td><div align='center' style='width:80px;'><label >".$Diferencia."</label></div></td>   
<td><div align='center' style='width:80px;'><label >".$FleteI."</label></div></td>   
</tr>";
	
 

						
						
						
	



}
 				
	 
}



}
}	



	}
	?>
    
	 </table>	
	 
    
                    
                    
    
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

setInputDate("#dateDefault");   
     </script>
     
     





    