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
        <link rel="icon" href="img/favicon.ico"> 
        
        <?php 
            if(isset($_POST['fini'])){
                echo '<script> 
                    $( function() {
                    $("#dateDefaultj").datepicker();
                    $("#dateDefaultfinalj").datepicker();
                    } );
                </script>
                ';
            } else {
                echo '<script> 
                    $( function() {
                    $( "#dateDefault").datepicker();
                    $("#dateDefaultfinal").datepicker(); 
                    } );
                    </script>
                ';
            }
        ?>
    </head>

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
                    function logout(){
                        <?php 
		                    if (($_SESSION["usuario"]) !== null) {
			                } else {
                                session_unset();
                                session_destroy();
                                echo "window.location.href='../index';";
				            }  
                        ?>
                    }
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
				        <div id=pathway>
							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							<a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							<a class=bold href="#">Reporte Compras</a>
					    </div>
				    </div>

		            <div id="maincontent"></div>		
	                    <div id="maincontent" align="center">
                            <form name="forma1" method="post" action="reporte_compras">
                                <table align="center" class="parametros">
			                        <tr>
                                        <td class="color_blanco"><B>Introduce la Fecha de Inicio:</B></td>
                                        <td class="color_blanco">
                                            <?php 
                                                if(isset($_POST['fini'])){
                                                    $fecha = $_POST['fini'];
                                                    echo '
                                                        <input type="text" value= "'. $_POST['fini'].'" name="fini" id="dateDefaultj">
                                                    ';
                                                } else {
                                                    echo '
                                                        <input type="text" value= "00/00/0000"  name="fini" id="dateDefault">
                                                    ';
                                                }
                                            ?>
		                                </td>
			                        </tr>		
			                        <tr>
			                            <td class="color_blanco"><B>Introduce la Fecha Final:</B></td>
			                            <td class="color_blanco">
                                            <?php 
                                                if(isset($_POST['finial'])){
					                                echo '
                                                        <input type="text" value= "'. $_POST['finial'].'" name="finial" id="dateDefaultfinalj">
                                                    ';
					                            } else {
						                            echo '
                                                        <input type="text" value= "00/00/0000" name="finial" id="dateDefaultfinal">
                                                    ';
						                        }    
                                            ?>
			                                <a onClick="return calendario('forma1.finial');"></a>
                                        </td>
			                        </tr>
		                            <tr>
		                            </tr>
                                    <tr>
                                        <td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
                                    </tr>
	                            </table>
                            </form>
     
                            <table>
                            <tr><br></tr>
						    <tr>
                                <td class="color_blanco" colspan="3">COMERCIALIZADORA PETROMAR - COMPRA</td>
                            </tr>
                            <tr>
                                <th style='width:40px;'>No.</th>
                                <th style='width:80px;'>Referencia</th>
                                <th>Cuenta</th>
                                <th>Concepto</th>
                                <th>Cargos</th>
                                <th>Abonos</th>   
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

  $sqld = "select t1.folio, date(t1.fecha) as fecha, t1.Importe, t1.total,  t1.NoPedido, t1.Cantidad, t1.ValorUnitario, t1.Flete, t1.Descuento, t2.Porcentaje from facturas t1 inner join estadocuenta t2  on t1.IdEmpresa = t2.IdEmpresa where date(t1.fecha) >= STR_TO_DATE('".$inicial."', '%d/%m/%Y') and date(t1.fecha) <= STR_TO_DATE('".$final."', '%d/%m/%Y') ";
  
   
   
   
 
$resultd = $connect->query($sqld);
if ($resultd->num_rows > 0) {
// output data of each row
while($rowd = $resultd->fetch_assoc()) {  
	
 
 

$sql = "Select t1.Folio, t1.Fecha,  t1.Producto,  t1.Producto as Subproducto, t1.Capacidad, t1.Destino, t2.Nombre from pedido t1 inner join destinos t2 on t1.destino = t2.destino where folio  = '".$rowd['NoPedido']."'";
 
$result = $connect->query($sql); 

$Porcentaje = $rowd["Porcentaje"]; 
$TOTAL = $rowd["total"]; 
$Flete = $rowd["Flete"]; 
$Importe = $rowd["Importe"];
$Cantidad = $rowd["Cantidad"]; 
$ValorU = $rowd["ValorUnitario"];
$Descuento = $rowd["Descuento"];
$ff = $rowd["folio"];


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



if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$Producto = $row["Producto"]; 
	$cont = $cont + 1;
	$Vol = $Cantidad/159;
	$PrecioCom = $ValorU * 159;
	  
	 
	 
	
echo "<tr>
 
<td><div align='center'><label>".$rowd["folio"]."</label></div></td>
<td><div align='center'><label>".$rowd["fecha"]."</label></div></td>
<td><div align='center'><label>".$row["Nombre"]."</label></div></td>
<td><div align='center'><label>".$Producto."</label></div></td></td>
<td><div align='center'><label>".$Cantidad."</label></div></td></td>
<td><div align='center' style='width:80px;'><label>".substr($PCompra, 0, 5)."</label></div></td>
<td><div align='center' style='width:80px;'><label >".substr($PCompraSD, 0, 5)."</label></div></td> 
<td><div align='center' style='width:80px;'><label >".substr($FleteI, 0, 7)."</label></div></td>  
</tr>";
	
}

}else { echo ""; }

						
						
						
	



}
echo '<tr>
<td class="color_blanco">Registros: '.$cont.'
</td>
</tr>
';					
	 $connect->close();
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


<div id="footer">
	<div class="footerLeft left">
	Av. Camarón Sábalo No. 102
Col. Zona Dorada, Mazatlán, Sinaloa C.P. 82110</div>

	
	<div class="footerRight right"> <a href="https://onedrive.live.com/view.aspx?resid=CFD8E6282C9D8BB8!991&ithint=file%2cdocx&authkey=!ABYahzaSmo_8Tzo" target="_blank">Aviso de Privacidad<a></div>
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

setInputDate("#dateDefault");  
setInputDate("#dateDefaultfinal");   
     </script>
     
     





    