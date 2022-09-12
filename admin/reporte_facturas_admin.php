<?php 
	require 'connector.php';
	global $connect; 
	require 'dompdf/autoload.inc.php';
	session_start();	
	use Dompdf\Options;
	use Dompdf\Dompdf;

	if(isset($_POST['text'])){
		$options = new Options();
		$options->set('defaultFont', 'Courier'); 
		$dompdf = new Dompdf($options); 
		$dompdf = new Dompdf();
		$dompdf->loadHtml($_POST['text']); 
		$dompdf->setPaper('A4', 'landscape'); 
		$dompdf->render(); 
		$dompdf->stream(); 
	}
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
		<script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
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
					$("#dateDefaultFinalj").datepicker();		
					} );
					</script>
				';
			} else {
				echo '<script> 
					$( function() {
					$( "#dateDefault").datepicker();
					$("#dateDefaultFinal").datepicker(); 
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
					<!-- <div id="eNacional"><a href="http://www.energia.gob.mx/" target="_blank" title="Secretar&iacute;a de Energ&iacute;a">Secretar&iacute;a de Energ&iacute;a</a></div> -->  
					<div id="PEMEX">
					</div> 
					
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
								$("#un").load("controladorad/tpfacturas.php");
							</script>
    					</p> 
					</div>
					
					<div id="fecha"> 
						<p class="fechapc" align="right">
						</p>
					</div>

					<div id="mainmenu">			
						<ul id="nav">
							<li class="bar"><a href="menu_cteadmin" class="baritem">Servicio a Clientes</a></li>
							<li class="bar"><a href="clientes" class="baritem">Clientes</a></li> 
							<li class="bar"><a href="pedidoscnvotradmin" class="baritem">Pedidos</a></li> 
							<li class="bar"><a href="cancelar_factura" class="baritem">Cancelar Factura</a></li> 
							<li class="bar"><a href="../index" class="baritem">Salir</a></li>					
							<li class="barlast"><span>&nbsp;</span></li>
								<!-- mete codigo de tipo de usuario--> 
						</ul>
					</div>
				</div>
				
				<script  type="text/javascript" > 
     				function logout(){
						<?php 
							if (isset($_SESSION["usuario"])) {
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
							<a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							<a class=bold href="#">Facturas</a>		
						</div>		
					</div>

					<div id="maincontent">
					</div>		

					<div id="maincontent" align="center">
     					<form name="forma1" method="post" action="reporte_facturas_admin.php">
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
												echo '<input type="text" value= "'. $_POST['finial'].'" name="finial" id="dateDefaultFinalj">';
											} else {
												echo '<input type="text" value= "00/00/0000" name="finial" id="dateDefaultFinal">';
											}    
										?>
										<a onClick="return calendario('forma1.finial');"></a>
									</td>
								</tr>
								<tr>
									<td class="color_blanco"><B>Tipo de documento:</B></td>
									<td class="color_blanco">
										<select name="tipo" id="drop" onchange="dropValueChange()">
											<?php
											if(isset($_POST["tipo"])){
												echo '
                                                    <option value="'.$_POST["tipo"].'">'.$_POST["tipo"].'</option>
                                                    <option value="Facturas de producto">Facturas de producto</option>
                                                    <option value="Complementos">Complementos</option>
                                                    <option value="Notas de crédito">Notas de crédito</option>
                                                ';
											}else{
											echo '
                                                <option value="Facturas de producto">Facturas de producto</option>
                                                <option value="Complementos">Complementos</option>
                                                <option value="Notas de crédito">Notas de crédito</option>
											';
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td class="color_blanco"><B>Estado del CFD:</B></td>
									<td class="color_blanco">
										<select name="estado">
											<option value="L" selected>Liberado					
										</select>
									</td>
								</tr>
								<tr>
									<td class="color_blanco"><b>Seleccione cliente:</b></td>
									<td class="color_blanco">
										<?php
										if(isset($_POST["IdEmpresa"]))

	{		

    $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1' and IdEmpresa != '".$_POST['IdEmpresa']."'");

	}else{

		

		 $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'  ");

		}



    echo "<select name='IdEmpresa' id='IdEmpresa'  style='width:100px;' required>

	

	";

	if(isset($_POST["IdEmpresa"]))

	{

		 $resulti = $connect->query("select IdEmpresa, usuario from empresa where IdEmpresa = '".$_POST['IdEmpresa']."'");

		 

		  while ($rowi = $resulti->fetch_assoc()) {



                  unset($idi, $namei);

                  $idi = $rowi['IdEmpresa'];

                  $namei = $rowi['usuario']; 

                  echo '<option value="'.$idi.'" name="empresa" id="select">'.$namei.'</option>';



} 

		  

	}else{echo "	 ";}





    while ($row = $result->fetch_assoc()) {



                  unset($id, $name);

                  $id = $row['IdEmpresa'];

                  $name = $row['usuario']; 

                  echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';



}  



if(($_POST["IdEmpresa"]) == 'TODOS'){

echo "<option selected>TODOS</option>";

} else{

	echo "<option>TODOS</option>";

	}

										
											/*$result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");
											echo "<select name='IdEmpresa' id='IdEmpresa' style='width:100%;'>";
											if (isset($_POST['IdEmpresa'])) {	
												$resultx = $connect->query("select IdEmpresa, usuario from empresa where       tusuario='1' and idempresa = '".$_POST['IdEmpresa']."'");
	 											while ($row = $result->fetch_assoc()) {
													unset($id, $name);
													$id = $row['IdEmpresa'];
													$name = $row['usuario']; 
													echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';
												}
	   										} 
    										while ($row = $result->fetch_assoc()) {
												unset($id, $name);
												$id = $row['IdEmpresa'];
												$name = $row['usuario']; 
												echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';
											}
											echo "<option value='TODOS'>TODOS</option>";
											echo "</select>"; */
										?> 
									</td>
								</tr>
								<tr>
									<td class="color_blanco"><input type="hidden" name="ejecuta_consulta" value="true"></TD>
								</tr>
								<tr>
									<td class="color_blanco"><B>Buscar folio:</B></td>
									<td class="color_blanco"><input name="buscarfolio"></input></td>
										</tr>
								<tr>
									<td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
								</tr>
							</table>
    					</form>
    					<br><br>
 
						
    						
							<?php 
							
								if(isset($_POST['fini'])){
							if($_POST["tipo"] == "Facturas de producto"){
							echo '
									
						<table align="center" id="tabb" style="font-size:11px;">
										<tr>
								<td class="color_blanco">COMERCIALIZADORA PETROMAR
								</td>
							</tr>
							<tr>
								<th rowspan="2" align="center" width="15">Empresa</th>
								<th rowspan="2" align="center" width="15">Usuario</th>
								<th rowspan="2" align="center" width="15">Destino</th>
								<th rowspan="2" align="center" width="15">Folio Pedido</th>
								<th rowspan="2" align="center" width="30">Fecha Pedido</th>
								<th rowspan="2" align="center" width="30">Fecha Emisión</th>						
								<th rowspan="2" align="center">Factura</th>
								<th rowspan="2" align="center">Remisión</th>
								<th rowspan="2" align="center">Concepto</th>
								<th rowspan="2" align="center">Importe</th>
								<th colspan="2" align="center">Comprobante Fiscal Digital</th>
								<th rowspan="2" align="center">Nota Crédito</th>
							</tr>
							<tr>
								<th align="center">XML</th>
								<th align="center">PDF</th>			 	
							</tr>	
							<tr>
								<td><br></td>
								<td><br></td>
								<td><br></td>
								<td><br></td>
								<td><br></td>
								<td><br></td>
								<td><br></td>
								<td align="right"></td>
								<td align="right"></td>
								<td align="right"></td>
								<td align="right"></td>
								<td align="right"></td> 
								<td align="right"></td> 
							</tr>
									';
									// Check connection 
									$Fecha = $_POST['fini']; 
									$inicial = $_POST['fini'];
									$final = $_POST['finial'];
									
									if ($connect->connect_error) {
										die("Connection failed: " . $connect->connect_error);
									}
									//echo $_POST["tipo"]; echo "<br>"; 
										if($_POST['IdEmpresa'] == 'TODOS'){
											$sqld = "select date(t1.fecha) as fecha, t2.fecha as fech,  t1.folio from facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura where STR_TO_DATE(t2.Fecha, '%d/%m/%Y') >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(t2.Fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y')  ";
										} else if($_POST['buscarfolio'] != ""){
											$sqld = "select date(t1.fecha) as fecha, t2.fecha as fech,  t1.folio from facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura where t1.folio = '".$_POST["buscarfolio"]."'";
										}else {
											$sqld = "select date(t1.fecha) as fecha, t2.fecha as fech,  t1.folio from facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura where STR_TO_DATE(t2.Fecha, '%d/%m/%Y') >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(t2.Fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y') and t1.IdEmpresa = '".$_POST['IdEmpresa']."' ";
										}								
									 
									 							
									//echo $sqld;
				
									$Totall = 0;
									$cont = 0;
									$resultd = $connect->query($sqld);
									if ($resultd->num_rows > 0) {
										// output data of each row
										echo '';		
										while($rowd = $resultd->fetch_assoc()) {    
											 
											$sql = "Select t1.uuid, t1.idempresa, t3.destino, t1.Remision, t3.folio as fol, t2.RzonSocial, t2.usuario, t1.Fecha, t1.Factura, t1.Concepto, t1.Total, t1.PDF from facturas t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa inner join pedido t3 on t1.folio = t3.foliofactura where t1.folio  = '".$rowd["folio"]."' ";
										 
										 
											$result = $connect->query($sql);
											if ($result->num_rows > 0) {
												// output data of each row
												while($row = $result->fetch_assoc()) { 
													$cont = $cont +1;
													$Totall = $Totall + $row["Total"];
													$ImporteTotal = number_format($row["Total"], 2, '.', ',');
													$Remision = $row['Remision'];
													$FF = substr($row["Factura"], 0, -4);
													echo"
														<tr>
														<td><label>".$row["RzonSocial"]."</label></td>
														<td><label>".$row["usuario"]."</label></td>
														<td><label>".$row["destino"]."</label></td>
														<td><label>".$row["fol"]."</label></td>
														<td><label  >".$rowd["fech"]."</label></td>
														<td><label  >".$row["Fecha"]."</label></td> 
														<td><label>".$FF."</label></td>
													";

													if(isset($Remision)){
														echo"<td><a href = '../".$Remision."'><label>".$row['Concepto']."</label></a></td>";
													} else {
														echo"<td><label>No capturado</label></td>";
													}
						
														echo"
												<td><label>".$row["Concepto"]."</label></td>
														<td><label>$".$ImporteTotal."</label></td> 
														<td><a href='../uploads/".$row["Factura"]."' download>Disponible</a></td>
														<td><a href='../uploads/".$row["PDF"]."' target='_blank'>Disponible</a></td>
														<td>
														";
									/*$notacredito = "Select folio, fecha, pdf  from notascredito where uuidfactura = '".$row["uuid"]."'";
									 
									$resultx = $connect->query($notacredito);
									if ($resultx->num_rows > 0) {
										while($rowx = $resultx->fetch_assoc()) { 
											echo "<a href='../uploads/".$rowx["pdf"]."'>".$rowx["fecha"]."</label>";
										}
									}else{
										echo "			
											<form method='POST' name='activarnotascredito' action='notascredito0.php'>
												<input type='hidden' class='post' name='facturar' value='1'>
												<input type='submit' value='Generar'>
												<input type='hidden' name='uuid' value='".$row["uuid"]."'>
												<input type='hidden' name='idempresa' value='".$row["idempresa"]."'>
											</form>
											";
									}
*/
echo "			
											<form method='POST' name='activarnotascredito' action='notascredito0.php'>
												<input type='hidden' class='post' name='facturar' value='1'>
												<input type='submit' value='Generar'>
												<input type='hidden' name='uuid' value='".$row["uuid"]."'>
												<input type='hidden' name='idempresa' value='".$row["idempresa"]."'>
											</form>
											";

									echo "
									</td>
									
									";
									
									if(isset($Remision)){
										echo "
										<td>
										<form method='POST' name='activarnotascredito' action='controladorad/deleteremision.php'>
										<input type='hidden' class='post' name='facturar' value='1'>
										<input type='submit' value='Eliminar'>
										<input type='hidden' name='folio' value='".$rowd["folio"]."'>
										<input type='hidden' name='IdEmpresa' value='".$_POST["IdEmpresa"]."'>
										<input type='hidden' name='fini' value='".$_POST["fini"]."'>
										<input type='hidden' name='finial' value='".$_POST["finial"]."'>
									</form> 
										  </td>";
									
									} else {
									 
									}

									echo "					</tr>
													";
												}
											}
										}

										echo "
											<tr>
											<td class='color_blanco'>Registros: ".$cont."</td>
											<td class='color_blanco'></td>
											<td class='color_blanco'></td>
											<td class='color_blanco'></td>
											<td class='color_blanco'></td>
											<td class='color_blanco'></td>	
											<td class='color_blanco'></td>
											<td class='color_blanco'></td>
											<td class='color_blanco' >$".number_format($Totall, 2, '.', ',')."
											</td>
											<td class='color_blanco'></td>
											</tr>
											</table>
										";
									}	
								}
								}
							?>
     							
						
									
							<?php 
						/////////////////////////////////////////////////////////////////////////////////////////////////////////	
								if(isset($_POST['fini'])){
							if($_POST["tipo"] == "Complementos"){
							echo '
									
						<table align="center" id="tabb" style="font-size:11px;">
										<tr>
								<td class="color_blanco">COMERCIALIZADORA PETROMAR
								</td>
							</tr>
							<tr>
								<th rowspan="2" align="center" width="15">Empresa</th>
								<th rowspan="2" align="center" width="15">Usuario</th> 
								<th rowspan="2" align="center" width="30">Fecha Emisión</th>						
								<th rowspan="2" align="center">Factura</th>
								<th rowspan="2" align="center">Remisión</th>
								<th rowspan="2" align="center">Concepto</th>
								<th rowspan="2" align="center">Importe</th>
								<th colspan="3" align="center">Comprobante Fiscal Digital</th>
							</tr>
							<tr>
								<th align="center">XML</th>
								<th align="center">PDF</th>				
							</tr>	
							<tr>
								<td><br></td>
								<td><br></td> 
								<td><br></td>
								<td><br></td>
								<td align="right"></td>
								<td align="right"></td>
								<td align="right"></td>
								<td align="right"></td>
								<td align="right"></td> 
							</tr>
									';
									// Check connection 
									$Fecha = $_POST['fini']; 
									$inicial = $_POST['fini'];
									$final = $_POST['finial'];
									
									if ($connect->connect_error) {
										die("Connection failed: " . $connect->connect_error);
									}
									//echo $_POST["tipo"]; echo "<br>";
								  
										if($_POST['IdEmpresa'] == 'TODOS'){
											$sqld = "select date(t1.fechagenerado) as fecha, t1.NombreComplemento,  '-' as fech, t2.RzonSocial, t1.folio, t1.uuidfactura from complementos t1 INNER JOIN empresa t2 ON t1.idempresa = t2.idempresa where DATE(t2.Fechagenerado) >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and DATE(t1.Fechagenerado) <= STR_TO_DATE('".$final."', '%d/%m/%Y')  ";
										} else {
											$sqld = "select date(t1.fechagenerado) as fecha, t1.NombreComplemento,   '-' as fech, t2.RzonSocial, t1.folio, t1.uuidfactura from complementos t1 INNER JOIN empresa t2 ON t1.idempresa = t2.idempresa where DATE(t1.Fechagenerado) >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and DATE(t1.Fechagenerado) <= STR_TO_DATE('".$final."', '%d/%m/%Y') and t1.IdEmpresa = '".$_POST['IdEmpresa']."' ";
										}	
									 			 
				
									$Totall = 0;
									$cont = 0;
									$resultd = $connect->query($sqld);
									if ($resultd->num_rows > 0) {
										// output data of each row
										echo '';		
										while($rowd = $resultd->fetch_assoc()) {    
											  
												$sql = "Select t3.folio as fol, t2.RzonSocial, t2.usuario, t1.Fecha, t1.Factura, t1.Concepto, t1.Total, t1.PDF from facturas t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa inner join pedido t3 on t1.folio = t3.foliofactura where t1.uuid  = '".$rowd["uuidfactura"]."' ";
											 
										 
											$result = $connect->query($sql);
											if ($result->num_rows > 0) {
												// output data of each row
												while($row = $result->fetch_assoc()) { 
													$cont = $cont +1;
													$Totall = $Totall + $row["Total"];
													$ImporteTotal = number_format($row["Total"], 2, '.', ',');
													$FF = substr($row["Factura"], 0, -4);
													echo"
														<tr> 
														<td><label>".$row["RzonSocial"]."</label></td>
														<td><label>".$row["usuario"]."</label></td>
														 
														<td><label  >".$row["Fecha"]."</label></td> 
														<td><label>".$FF."</label></td>
														<td><label>NO DISPONIBLE</label></td>
														<td><label>PAGO</label></td>
														<td><label>$".$ImporteTotal."</label></td> 
														<td><a href='../uploads/".substr($rowd["NombreComplemento"], 0,  -3)."xml' target='_blank'>Disponible</a></td>
														<td><a href='../uploads/".$rowd["NombreComplemento"]."' target='_blank'>Disponible</a></td>
														</tr>
													";
												}
											}
										}

										echo "
											<tr>
											<td class='color_blanco'>Registros: ".$cont."</td>
											<td class='color_blanco'></td>
											<td class='color_blanco'></td>
											<td class='color_blanco'></td>
											<td class='color_blanco'></td>
											<td class='color_blanco'></td>	
											<td class='color_blanco'></td>
											<td class='color_blanco'></td>
											<td class='color_blanco' >$".number_format($Totall, 2, '.', ',')."
											</td>
											</tr>
											</table>
										";
									}	
								}
								}
							?>
     							
                                <?php 
                                    if(isset($_POST['fini'])){
                                        if($_POST["tipo"] == "Notas de crédito"){
                                            $fechaPicker = $_POST['fini'];
                                            $fechaPickerfinal = $_POST['finial'];
                                            $string = str_replace('/', '-', $fechaPicker); 
                                            $stringg = date('Y-m-d', strtotime($string));
                                            $stringfinal = str_replace('/', '-', $fechaPickerfinal); 
                                            $stringgfinal = date('Y-m-d', strtotime($stringfinal));
											if($_POST['IdEmpresa'] == 'TODOS'){
												$sql = "SELECT t1.Folio, t1.empresa, t1.idempresa, t1.pdf, t1.concepto, t2.usuario, t1.NotaCredito, t1.Fecha, t1.Total FROM notascredito t1 INNER JOIN empresa t2 ON t1.IdEmpresa = t2.IdEmpresa WHERE DATE(Fecha) >= '".$stringg."' AND DATE(Fecha) <= '".$stringgfinal."'";
											} else {
												$sql = "SELECT t1.Folio, t1.empresa, t1.idempresa, t1.pdf, t1.concepto, t2.usuario, t1.NotaCredito, t1.Fecha, t1.Total FROM notascredito t1 INNER JOIN empresa t2 ON t1.IdEmpresa = t2.IdEmpresa WHERE DATE(Fecha) >= '".$stringg."' AND DATE(Fecha) <= '".$stringgfinal."' AND t2.idempresa = '".$_POST['IdEmpresa']."'";
											}	
                                            $Totall = 0;
	                                        $cont = 0;
                                            $result = $connect->query($sql);
                                            
                                            if ($result->num_rows > 0) {
		                                        echo '
                                                    <table align="center" id="table">
                                                    <td class="color_blanco">
                                                    <b style="align: left;"> Fecha: </b> 
                                                    <br>
                                                    <b>'.$_POST['fini'].'</b>
                                                    </td>
                                                    <tr>
                                                    <th style="height:25px;">Folio</th>
                                                    <th>Empresa</th>
                                                    <th>Fecha</th>
                                                    <th>Nota Credito</th>
                                                    <th>Concepto</th>
                                                    <th>Total</th>
                                                    <th>XML</th>
                                                    <th>PDF</th>
                                                    </tr>
                                                ';
                                                    // output data of each row
                                                    
                                                while($row = $result->fetch_assoc()) {
	                                                $cont = $cont + 1; 
                                                    $Totall = $Totall + $row["Total"];
                                                    $total = number_format($row['Total'], 2, '.', ','); 
                                                    echo "<tr>
                                                        <form name='forma' method='post' action='ActualizarPedido.php'> 
                                                        <td> <div align='center' style='width:60px;'> <label>".$row["Folio"]."</label> </div>
                                                        </td>
                                                        <td> <div align='center' style='width:80px;'> <label>".$row["empresa"]."</label> </div>
                                                        </td>
                                                        <td> <div align='center' style='width:110px;'> <label>".$row["Fecha"]."</label> </div></td>
                                                        <td> <div align='center' style='width:120px;'><label >".$row["NotaCredito"]."</label>
                                                        </div></td>
                                                        <td> <div align='center' style='width:300px;'><label >".$row["concepto"]."</label>
                                                        </div></td>
                                                        <td> <div align='center' style='width:85px;'> <label >$".$total."</label> </div></td>
                                                        <td> <div align='center' style='width:50px;'><a href='../uploads/".$row["NotaCredito"]."'>XML</label>
                                                        </div></td>
                                                        <td> <div align='center' style='width:50px;'><a href='../uploads/".$row["pdf"]."'>PDF</a>
                                                        </div></td>
                                                        </form></tr>
                                                    ";
                                                }
                                                
                                                echo "
                                                    <tr>
                                                    <td class='color_blanco'>Registros: ".$cont."</td>
                                                    <td class='color_blanco'></td>
                                                    <td class='color_blanco'></td>
                                                    <td class='color_blanco'></td> 
                                                    <td class='color_blanco'></td> 
                                                    <td class='color_blanco' align='center'>$".number_format($Totall, 2, '.', ',')."
                                                    </td>
                                                    </tr>
                                                ";

                                                echo '
                                                    <table>
                                                    <td class="color_blanco" style="background-color: white;"></td>
                                                    <td class="color_blanco"  style="background-color: white;">
                                                    </td>
                                                    <td class="color_blanco" style="background-color: white;"><pre>                                                                                                                                       </pre></td>
                                                    <td class="color_blanco"  style="background-color: white;">
                                                    </td>
                                                    </table>
                                                ';
                                            } else { echo "0 results"; }
                                            
                                            $connect->close();
                                            echo'
                                                </table>
                                            ';
                                        }
                                    }
                                ?>
							
								<script>								
									var dropmenu = document.getElementById("drop");
									var dropval = dropmenu.options[dropmenu.selectedIndex].text;
									 
										
									function dropValueChange(){
										if(dropval=="complementos"){
											var tablefacts = document.getElementById("tabb");
											tablefacts.hidden;
											 
										}
									}
								</script>
										

							<table>
				 				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">
									<textarea name="text" hidden cols="80" rows="2" id="txtarea"></textarea><br><br>
            						<input type='submit' onclick='Print(this)' value='Exportar PDF'>
								</form>		 	
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
						Col. Zona Dorada, Mazatlán, Sinaloa C.P. 82110
					</div>

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

	 
	setInputDate("#dateDefaultFinal");   
</script>

<script>
	function setInputDate(_id){
    	var _dat = document.querySelector(_id);
    	 var hoy =new Date(new Date().setDate(new Date().getDate() - 7)),
        d = (hoy.getDate()),
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
    
<script>
    function Print(){      
 		$('#txtarea').html(document.getElementById('tabb').outerHTML)
 	}
</script>