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

	<SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>

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

	<script src="scripts/jquery.table2excel.js"></script>
    
	<link rel="icon" href="img/favicon.ico"> 
    
    <?php 
		if(isset($_POST['fini'])){
			echo '<script> 
			$( function() {
			$("#dateDefaultj").datepicker();
			$("#dateDefaultfinalj").datepicker();
			} );
			</script>';
		} else {
			echo '<script> 
			$( function() {
				$( "#dateDefault").datepicker();
				$("#dateDefaultfinal").datepicker(); 
			} );
			</script>';
		}
	?>
</head>

<body class="body" onload="logout()">
	<div id="extra">&nbsp;</div>
	<div id="page">
		<div id="header">
			<div id="header2">
					<script> 
						var usuario = '<?php echo $_SESSION['usuario']; ?>'; 
						var rfc = '<?php echo $_SESSION['rfc']; ?>'; 
						renderHeader(usuario, rfc);
					</script>
					<script type="text/JavaScript">
						$("#un").load("controladorad/tprc.php");
					</script>
					
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
				<form name="forma1" method="post" action="reporte_compras">
					<table align="center" class="parametros">
					<tr>
						<td class="color_blanco"><B>Introduce la Fecha de Inicio:</B></td>
						<td class="color_blanco">
						<?php 
							if(isset($_POST['fini'])){
								$fecha = $_POST['fini'];
								echo '<input type="text" value= "'. $_POST['fini'].'" name="fini" id="dateDefaultj">';
							} else {
								echo '<input type="text" value= "00/00/0000"  name="fini" id="dateDefault">';
							}
						?>
						</td>
					</tr>		

					<tr>
						<td class="color_blanco"><B>Introduce la Fecha Final:</B></td>
						<td class="color_blanco">
							<?php 
								if(isset($_POST['finial'])){
									echo '<input type="text" value= "'. $_POST['finial'].'" name="finial" id="dateDefaultfinalj">';
								} else {						
									echo '<input type="text" value= "00/00/0000" name="finial" id="dateDefaultfinal">';
								}    
							?>
							<a onClick="return calendario('forma1.finial');"></a></td>
					</tr>
	
					<tr></tr>
					<tr>
						<td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
					</tr>
					</table>
				</form>

				<table align="center" id="tbl">
					<tr><br></tr>
					<tr>
						<td class="color_blanco" colspan="3">COMERCIALIZADORA PETROMAR - COMPRA</td>
					</tr>

					<tr>
						<th  style='width:40px;'>Folio</th>
						<th align="center" style='width:80px;'>Fecha</th>
						<th align="center">Destino</th>
						<th align="center">Vehículo</th>
						<th align="center">Producto (pedido)</th>
						<th align="center">Producto (factura)</th>
						<th align="center">Cantidad a 20°</th>
						<th align="center">Cantidad natural</th>
						<th align="center">Precio Compra</th>
						<th align="center">Precio Con Desc.</th>
						<th align="center">Flete</th>
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

							$sqld = "select t1.concepto as productofactura, t1.folio, t3.Vehiculo, date(t1.fecha) as fecha, t1.Importe, t1.ImpuestosTraslados as Iva, t1.ImpuestosRetencion as IvaR, t1.total,  t1.NoPedido, t1.Cantidad, t1.cantidadnatural, t1.ValorUnitario, t1.Flete, t1.Descuento, t2.Porcentaje 
							from facturas t1 inner join estadocuenta t2  on t1.IdEmpresa = t2.IdEmpresa inner join pedido t3 on t1.folio = t3.foliofactura where date(t1.fecha) >= STR_TO_DATE('".$inicial."', '%d/%m/%Y') and date(t1.fecha) <= STR_TO_DATE('".$final."', '%d/%m/%Y') ";
				 
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
									$CantidadNatural = $rowd["cantidadnatural"]; 
									$ValorU = $rowd["ValorUnitario"];
									$Descuento = $rowd["Descuento"];
									$productofactura = $rowd["productofactura"];
									$ff = $rowd["folio"];
									$IVA = $rowd["Iva"];
									$IVAR = $rowd["IvaR"]; 

									if($Flete > 0 ){
										$IvaFlete = $Flete * 0.16;
										$FleteI = $Flete * 1.16;
										$IvaRetencion = $Flete * 0.04;
										$SubT = $Importe + $Flete;
										$Impuestos = (($TOTAL - ($SubT) + $Descuento)- $IvaFlete);
										$Impuestos = $Impuestos + $IvaRetencion;
									} else {
										$IvaFlete = 0;
										$IvaRetencion = 0;
										$SubT = $Importe;
										$Impuestos = (($TOTAL - $Importe) + $Descuento); 
										$FleteI = '';
									}

									$PCompra = ($Importe + $Impuestos) / $Cantidad;

									$PCompraSD = (($Importe + $Impuestos) - $Descuento) / $Cantidad;
									//echo "Importe: ".$Importe. " Impuestos: ". $Impuestos." Descuento: ".$Descuento. " Cantidad: ".$Cantidad."<br>";
									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
											$Producto = $row["Producto"]; 
											$cont = $cont + 1;
											$Vol = $Cantidad/159;
											$PrecioCom = $ValorU * 159;
											$x = (($Descuento * 1.16) + $IVAR)/$Cantidad;
											// echo $x."<br>";
											$PCompraCD = $PCompraSD + $x;
											echo "
												<tr>
													<td><div align='center'><label>".$rowd["folio"]."</label></div></td>
													<td><div align='center'><label>".$rowd["fecha"]."</label></div></td>
													<td><div align='center'><label>".$row["Nombre"]."</label></div></td>
													<td><div align='center'><label>".$rowd["Vehiculo"]."</label></div></td>
													<td><div align='center'><label>".$Producto."</label></div></td></td>
													<td><div align='center'><label>".$productofactura."</label></div></td></td>
													<td><div align='center'><label>".$Cantidad."</label></div></td></td>
													<td><div align='center'><label>".$CantidadNatural."</label></div></td></td>
													<td><div align='center' style='width:80px;'><label>".round($PCompraCD, 2)."</label></div></td>
													<td><div align='center' style='width:80px;'><label >".round($PCompraSD, 2)."</label></div></td> 
													<td><div align='center' style='width:80px;'><label >".substr($FleteI, 0, 7)."</label></div></td>   
												</tr>
											";
										}
									} else {
										echo ""; 
									}
								}

								echo '
									<tr>
										<td class="color_blanco">Registros: '.$cont.'</td>
									</tr>
								';					
								
								$connect->close();
							}
						}
					?>
				</table>	

				<button onClick="excelExport()">Exportar</button>
				<script>
					function excelExport(){

						var d = new Date();
$("#tbl").table2excel({
	 name: "Compras " + d.toLocaleString(),
	filename: "Compras " + d.toLocaleString(),
	sheetname: "Compras " + d.toLocaleString(), //do not include extension
	fileext: ".xls" // file extension
});  
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

	setInputDate("#dateDefaultfinal");   
</script>

<script>
	function setInputDate(_id){
		var _dat = document.querySelector(_id);
		var hoy =new Date(new Date().setDate(new Date().getDate() - 30)),
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

<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->