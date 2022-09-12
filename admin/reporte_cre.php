<?php 
require 'connector.php';
session_start();
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
    <link rel="icon" href="iconion.ico"> 
	
	
	<SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>

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

<script> 
        var usuario = '<?php echo $_SESSION['usuario']; ?>'; 
        var rfc = '<?php echo $_SESSION['rfc']; ?>'; 
        renderHeader(usuario, rfc);
    </script>
		<script type="text/JavaScript">
				$("#un").load("controladorad/tpcre.php");
			</script>
			
	
</div>

<script  type="text/javascript" > 
     function logout(){<?php 
  
   
		if (isset($_SESSION["usuario"])) {
			}else{
				session_unset();
				 session_destroy();
	  echo "window.location.href='../index';";
				}  
?>}
</script>

<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->
<!-- FIN DEL ENCABEZADO --> 


	


	


	<!--Ruteo de la página-->
		  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					 
							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Reporte CRE</a>
							
					  </div>

						
				</div>
			
			
	
			
	
	
 




		<div id="maincontent"></div>		

	
	
	  
			
		
	<div id="maincontent" align="center">
     <form name="forma1" method="post" action="reporte_cre.php">
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
			<tr>
			<td class="color_blanco"><B>Introduce la Fecha Final:</B></td>
			<td class="color_blanco">
            <?php if(isset($_POST['finial'])){
					echo '<input type="text" value= "'. $_POST['finial'].'" name="finial" id="dateDefaultfinalj">';
					}else{
						
						echo '<input type="text" value= "00/00/0000" name="finial" id="dateDefaultfinal">';
						}    ?>
			<a onClick="return calendario('forma1.finial');"></a></td>
			</tr>
	
			
			
	
		
		
		<tr>
			 
		</tr>
		<tr>
			<td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
		</tr>
	</table>
    </form>
     
<table align="center">
<tr><br></tr>
						<tr><td class="color_blanco" colspan="2">COMERCIALIZADORA PETROMAR - COMPRA
</td></tr>
						<tr>
							<th >Fecha</th>
							<th align="center">Producto</th>
							<th align="center">Subproducto</th>
							<th align="center">Tipo Proveedor</th>
							<th align="center">No de permiso proveedor</th>
                            <th align="center">No de permiso refineria</th>
                            <th align="center">Volumen comprado</th>
                            <th align="center">Precio de compra</th> 
                            <th align="center">¿Pagó de flete?</th>
                            <th align="center">Costo de flete</th>
                            <th align="center">No permiso transportista</th>
                            <th align="center">¿Recibió descuento?</th>
                            <th align="center">Tipo de descuento</th>
                            <th align="center">Precio con descuento</th>
                            <th align="center">Otro descuento</th>
						</tr>
						
    
    <?php 
	if (isset($_POST['fini'])) {
// Check connection 
$inicial = $_POST['fini'];  
$final = $_POST['finial'];

$cont = 0;
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

  $sqld = "select t1.folio, date(t1.fecha) as fecha, t1.total,  t1.NoPedido, t1.Cantidad, t1.ValorUnitario, t1.Flete, t1.Descuento, t2.Porcentaje, t2.PorcentajePremium, t2.PorcentajeDiesel from facturas t1 inner join estadocuenta t2  on t1.IdEmpresa = t2.IdEmpresa where date(t1.fecha) >= STR_TO_DATE('".$inicial."', '%d/%m/%Y') and date(t1.fecha) <= STR_TO_DATE('".$final."', '%d/%m/%Y') ORDER BY t1.folio ASC";
  
   
 
$resultd = $connect->query($sqld);
if ($resultd->num_rows > 0) {
// output data of each row
while($rowd = $resultd->fetch_assoc()) {  
	
 
 

$sql = "Select Folio, Fecha,  Producto, Producto as Subproducto, Capacidad from pedido where folio  = '".$rowd['NoPedido']."'";
$result = $connect->query($sql); 















if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$Producto = $row["Producto"]; 
	if($Producto == 'GASOLINA 91 OCT'){
		$Pro = 'Gasolinas';
		$SubPro = 'Premium (con un índice de octano ([RON+MON]/2) mínimo de 91)';
		$Porcentaje = $rowd["PorcentajePremium"];
		}
		
		if($Producto == 'GASOLINA 87 OCT'){
		$Pro = 'Gasolinas';
			$SubPro = 'Regular (con un índice de octano ([RON+MON]/2) mínimo de 87)';
			$Porcentaje = $rowd["Porcentaje"];
		}
		
	if($Producto == 'DIESEL'){
		$Pro = 'Diésel';
			$SubPro = 'Diésel Automotriz [contenido mayor de azufre a 15 mg/kg y contenido máximo de azufre de 500 mg/kg]';
			$Porcentaje = $rowd["PorcentajeDiesel"];
		}
	
	
	
$Comision = 100 - $Porcentaje;	
$TOTAL = $rowd["total"]; 
$Flete = $rowd["Flete"]; 
$Cantidad = $rowd["Cantidad"]; 
$ValorU = $rowd["ValorUnitario"];
$Descuento = $rowd["Descuento"] * 1.16;
$ff = $rowd["folio"];

if($Porcentaje > 0){
$NvoDescuento = ($Descuento * 100) / $Comision;
}else{
	$NvoDescuento = $Descuento;
	}

$dif = $NvoDescuento - $Descuento;
	
	
	
	$cont = $cont + 1;
	$Vol = $Cantidad/159;
	$PrecioCom = $ValorU * 159;
	if($Flete>0){
		$PagoFlete = 'Sí';  
		$NoPermisoTransportista = 'PL/10536/TRA/OM/2015'; 
		$FleteIVA = $Flete * 1.16;
		
		}else{
		$PagoFlete = 'No';  	
		$NoPermisoTransportista = ''; 
		$FleteIVA = 0;
	
		}
			
	
	
	$IVARetencion = $Flete * 0.04;
	$FleteFinal = $FleteIVA - $IVARetencion;
	 
	
	 
	
	$ToCD = (((($TOTAL - $FleteFinal)) / $Cantidad) * 159); 
		$ToCD =  $ToCD - (($dif / $Cantidad) * 159);	  
  
	 
	 $DescBarril = (($NvoDescuento / $Cantidad) * 159);
	   
if($Descuento>0){	
	$RecibeDescuento = 'Sí'; 
	}else{		
	$RecibeDescuento = 'No'; 
	}
		 
		if($FleteFinal != null){
		 }else{$FleteFinal = "";}
		 
	
echo "<tr>
<input type='text' name='fecha' value='".$rowd["fecha"]."' hidden>
<input type='text' name='producto' value='".$Pro."' hidden>
<input type='text' name='subproducto' value='".$SubPro."' hidden>
<input type='text' name='tipoproveedor' value='Permisionario CRE' hidden>
<input type='text' name='NoPermiso' value='H/9857/COM/2015' hidden>
<input type='text' name='VolumenBarriles' value='".$Vol."' hidden>
<input type='text' name='PrecioCompra' value='".($ToCD + $DescBarril)."' hidden>
<input type='text' name='PagoFlete' value='".$PagoFlete."' hidden>
<input type='text' name='CostoFlete' value='".$FleteFinal."' hidden>
<input type='text' name='NoPermisoTransportista' value='".$NoPermisoTransportista."' hidden>
<input type='text' name='RecibeDescuento' value='".$RecibeDescuento."' hidden>
<input type='text' name='PrecioConDescuento' value='' hidden>

<td><div align='center'><label>".$rowd["fecha"]."</label></div></td>
<td><div align='center'><label>".$Pro."</label></div></td></td>
<td><div align='center' style='width:180px;'><label>".$SubPro."</label></div></td>
<td><div align='center'><label>Permisionario CRE</label></div></td>
<td><div align='center'><label>H/9857/COM/2015</label></div></td>
<td><input type='text' name='NoPermisoRefineria' value='' hidden></td>
<td><div align='center'><label>".$Vol."</label></div></td>
<td><div align='center'><label>".($ToCD + $DescBarril)."</label></div></td>
<td><div align='center'><label>".$PagoFlete."</label></div></td>
<td><div align='center'><label>".$FleteFinal."</label></div></td>
<td><div align='center'><label>".$NoPermisoTransportista."</label></div></td>
<td><div align='center'><label>".$RecibeDescuento."</label></div></td>
<td><div align='center'><label>Volumen</label></div></td>
<td><div align='center'><label>".$ToCD."</label></div></td>
<td><div align='center'><label></label></div></td></div> </div></td></div>
</td>   
</tr>";
	
}

}else { echo ""; }

						
						
						
	



}
echo '<tr>
<td class="color_blanco">Registros: '.$cont.'
</td>
</tr>
';					
	
}







	}
	?>
    
	 </table>	
				
                    <br><br>
                  
<table align="center">
  <tr><br></tr>
						<tr><td class="color_blanco" colspan="2">COMERCIALIZADORA PETROMAR - VENTA
</td></tr>
                     <tr>
							<th align="center">Fecha</th>
							<th align="center">Producto</th>
							<th align="center" >Subproducto</th>
							<th align="center">Tipo de cliente</th>
							<th align="center">No. de permiso CRE cliente</th>
                            <th align="center">Razón social cliente</th>
                            <th align="center">RFC del cliente</th>
                            <th align="center">Sector ecónomico</th>
                            <th align="center">Entidad Federativa</th>
                            <th align="center">Municipio destino</th>
                            <th align="center">Volumen vendido en barriles</th>
                            <th align="center">Precio de venta</th>
                            <th align="center">¿Cobró servicio de flete?</th>
							<th align="center">Costo Flete</th>
                            <th align="center">No. permiso CRE del transportista</th>
						</tr>
	
                    
                    
        <?php 
	if (isset($_POST['fini'])) {
// Check connection 
$inicial = $_POST['fini'];  
$final = $_POST['finial'];

$contt = 0;
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

  $sqld = "select t1.folio, date(t1.fecha) as fecha, t1.NoPedido, t1.Cantidad, t1.ValorUnitario, t1.Flete, t1.total, t1.Descuento from facturas t1 where date(fecha) >= STR_TO_DATE('".$inicial."', '%d/%m/%Y') and date(fecha) <= STR_TO_DATE('".$final."', '%d/%m/%Y')  ORDER BY t1.folio ASC";
 

$resultd = $connect->query($sqld);

if ($resultd->num_rows > 0) {
	
// output data of each row
while($rowd = $resultd->fetch_assoc()) {   

						
						
// Check connection  
 

$sql = "Select idempresa, Folio, Fecha, Producto, Producto as Subproducto, Capacidad, destino from pedido where folio  = '".$rowd['NoPedido']."'";
$result = $connect->query($sql);




if($Porcentaje > 0){
$NvoDescuento = ($Descuento * 100) / $Comision;
}else{
	$NvoDescuento = $Descuento;
	}

$dif = $NvoDescuento - $Descuento;



if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	 $contt = $contt + 1;
	 
	 $Fecha = $row["Fecha"];
	 
	
	
	
	
	
	$Cantidad = $rowd["Cantidad"];
	$Vol = $rowd["Cantidad"] / 159;
	$NoPermiso = '';
	$TotalV = $rowd["total"];
	$Flete = $rowd["Flete"];
	$ValorU = $rowd["ValorUnitario"];
	$NoPermiso = 'PL/10536/TRA/OM/2015';
	$desc = $rowd["Descuento"];
	$foliof = $rowd["folio"];
	

	
	
	$PrecioBarril = $ValorU * 159;
	
	if($Flete > 0){
		$FleteIVA = $Flete * 1.16;
		$IVARetencion = $Flete * 0.04;
		$FleteFinal = $FleteIVA - $IVARetencion; 
		$CobroFlete = 'Sí';  
		
			$To = ((($TotalV - $FleteFinal)/$Cantidad) * 159); 
		}else{
			$CobroFlete = 'No';  
			$NoPermiso = '';
			$FleteFinal = "";
				$To = ((($TotalV)/$Cantidad) * 159); 
				$FleteIVA = 0;
			} 
			
		 
   
	
	if($row["Producto"] == 'GASOLINA 91 OCT'){
		$Pro = 'Gasolinas';
		$SubPro = 'Premium (con un índice de octano ([RON+MON]/2) mínimo de 91)';
		}
		
		if($row["Producto"] == 'GASOLINA 87 OCT'){
		$Pro = 'Gasolinas';
			$SubPro = 'Regular (con un índice de octano ([RON+MON]/2) mínimo de 87)';
		}
		
	if($row["Producto"] == 'DIESEL'){
		$Pro = 'Diésel';
			$SubPro = 'Diésel Automotriz [contenido mayor de azufre a 15 mg/kg y contenido máximo de azufre de 500 mg/kg]';
		}
	  
echo "<tr> 
<input type='text' name='fecha' value='".$Fecha."' hidden>
<input type='text' name='producto' value='".$Pro."' hidden>
<input type='text' name='subproducto' value='".$SubPro."' hidden>
<input type='text' name='tipoproveedor' value='Permisionario CRE' hidden>
<input type='text' name='NoPermiso' value='H/9857/COM/2015' hidden>
<input type='text' name='VolumenBarriles' value='".$Vol."' hidden>
<input type='text' name='PrecioCompra' value='".$PrecioCom."' hidden>
<input type='text' name='PagoFlete' value='".$PagoFlete."' hidden>
<input type='text' name='CostoFlete' value='".$FleteFinal."' hidden>
<input type='text' name='NoPermisoTransportista' value='".$NoPermisoTransportista."' hidden>
<input type='text' name='RecibeDescuento' value='".$RecibeDescuento."' hidden>
<input type='text' name='PrecioConDescuento' value='' hidden>

<td><div align='center'><label>".$Fecha."</label></div></td>
<td><div align='center'><label>".$Pro."</label></div></td></td>
<td><div align='center' style='width:180px;'><label>".$SubPro."</label></div></td>
<td><div align='center'><label>Permisionario CRE</label></div></td>
<td><div align='center'><label>"; 
$querypermiso = "select permiso from destinos where destino = '".$row["destino"]."'";
$result = $connect->query($querypermiso);
if ($result->num_rows > 0) {
// output data of each row
while($rowd = $result->fetch_assoc()) {
	echo "".$rowd["permiso"]."";
}
}
echo"</label></div></td>
<td><div><label>
"; /*
$querypermiso = "select RzonSocial from empresa where IdEmpresa = '".$row["idempresa"]."'";
$result = $connecto->query($querypermiso);
if ($result->num_rows > 0) {
// output data of each row
while($rowrz = $result->fetch_assoc()) {
	echo "".$rowrz["RzonSocial"]."";
}
}*/
echo"
</label></div></td>
<td><div align='center'><label>
"; /*
$querypermiso = "select RFC from empresa where IdEmpresa = '".$row["idempresa"]."'";
$result = $connecto->query($querypermiso);
if ($result->num_rows > 0) {
// output data of each row
while($rowrfc = $result->fetch_assoc()) {
	echo "".$rowrfc["RFC"]."";
}
}*/
echo"
</label></div></td>
<td><div align='center'><label></label></div></td>
<td><div align='center'><label></label></div></td>
<td><div align='center'><label></label></div></td>
<td><div align='center'><label>".$Vol."</label></div></td>
<td><div align='center'><label>".$To."</label></div></td>
<td><div align='center'><label>".$CobroFlete."</label></div></td>
<td><div align='center'><label>".$FleteFinal."</label></div></td>
<td><div align='center'><label>".$NoPermiso."</label></div></td>    
   
</tr>";
	
}
}else { echo " "; }
 
						
						
						
						
	



}echo '<tr>
<td class="color_blanco">Registros: '.$contt.'
</td>
</tr>
';					
	 $connect->close(); 
}







	}
	?>             
        </table>            
                    
                    
                    <table align="center">
                  
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
    
 <!--  
<table align="center">
<tr>
<th height="24">Folio</th>
<th>Centro Entrega</th>
<th>Producto</th>
<th>Destino</th>
<th>Fecha</th>
<th>Presentacion</th>
<th>Turno</th>
<th>Medio</th>
<th>Transportista</th>
<th>Capacidad</th> 
<th>EstadoAtencion</th>	
<th>Agregar</th>	
</tr>
 
<?php 
// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

$myDate = date('d/m/Y');

$sql = "SELECT folio, CentroEntrega, producto, destino, fecha, presentacion, turno, medio, Transportista, capacidad, EstadoAtencion FROM pedido where idempresa = '".$_SESSION["idempresa"]."' AND fecha = '".$myDate."' ";
$result = $connect->query($sql);
 

 
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
<form name='forma' method='post' action='controlador/updatepedidod.php'> 
 
<td> <input type='text' name='folio' value ='" . $row["folio"]."' size='4'  readonly ></td>
<td> <input type='text' name='centroentrega' value ='" . $row["CentroEntrega"] . "' size='22'   ></td>
<td> <input type='text' name='producto' value='".$row["producto"] . "' size='18'   ></td>
<td> <input type='text' name='destino' value ='". $row["destino"]. "' size='2'   ></td>
<td> <input type='text' name='fecha' value ='".$row["fecha"]. "' size='10'   > </td>
<td> <input type='text' name='presentacion' value ='" . $row["presentacion"] . "' size='6'  ></td>
<td> <input type='text' name='turno' value ='". $row["turno"]."' size='2'   ></td>
<td> <input type='text' name='medio' value ='". $row["medio"]."' size='12'   ></td>
<td> <input type='text' name='transportista' value='".$row["Transportista"]."' size='14'   ></td>
<td> <input type='text' name='capacidad' value ='". $row["capacidad"]. "' size='4'   ></td>
<td> <input type='text' name='estadoatencion' value ='". $row["EstadoAtencion"]. "' size='20'   ></td>
<td><input type='Submit' name='uno' value='Actualizar'></td>

 </form>
</tr>";
}

echo "
<tr>
<form name='formaagregar' method='post' action='controlador/postpedidod.php'> 

<input type='hidden' name='idempresa' value ='" . $_SESSION["idempresa"]."' size='4'  readonly >
<td><input type='text' name='folio' value ='' size='4' readonly ></td>
<td><input type='text' name='centroentrega' value ='' size='22'  ></td>
<td><input type='text' name='producto' value ='' size='18'   ></td>
<td><input type='text' name='destino' value ='' size='2'   ></td>
<td><input type='text' name='fecha' ' value ='' size='10' readonly  ></td>
<td><input type='text' name='presentacion' value ='' size='6'   ></td>
<td><input type='text' name='turno' value ='' size='2'   ></td>
<td><input type='text' name='medio' value ='' size='12'   ></td>
<td><input type='text' name='transportista' value ='' size='14'   ></td> 
<td><input type='text' name='capacidad' value ='' size='4'   ></td> 
<td><input type='text' name='estadoatencion' value ='' size='20' readonly  ></td> 
<td><input type='Submit' name='uno' value=' Agregar  '></td>
</form>
</tr>


";






echo "</table>";
} else { echo "0 results"; 



echo "
<tr>
<form name='formaagregard' method='post' action='postpedidod.php'> 
<input type='hidden' name='idempresa' value ='" . $_SESSION["idempresa"]."' size='4'  readonly >
<td><input type='text' name='folio' value ='' size='4' readonly ></td>
<td><input type='text' name='centroentrega' value ='' size='22'  ></td>
<td><input type='text' name='producto' value ='' size='18'   ></td>
<td><input type='text' name='destino' value ='' size='2'   ></td>
<td><input type='text' name='fecha'  value ='' size='10' readonly ></td>
<td><input type='text' name='presentacion' value ='' size='6'   ></td>
<td><input type='text' name='turno' value ='' size='2'   ></td>
<td><input type='text' name='medio' value ='' size='12'   ></td>
<td><input type='text' name='transportista' value ='' size='14'   ></td> 
<td><input type='text' name='capacidad' value ='' size='4'   ></td> 
<td><input type='text' name='estadoatencion' value ='' size='20'  readonly ></td> 
<td><input type='Submit' name='uno' value=' Agregar  '></td>
</form>
</tr>";



}
$connect->close();
?>
</table>
    
    
	-->  	
            
            
            
            
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


<script>
renderFooter();
</script>

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

setInputDate("#dateDefault");  
setInputDate("#dateDefaultfinal");   
     </script>
     
     





    