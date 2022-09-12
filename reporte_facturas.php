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
$dompdf->setPaper('A3', 'landscape');
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
	

	
    <SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	<SCRIPT src="scripts/renderelements.js" type="text/javascript"></SCRIPT>
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>

	<script language="JavaScript" src="scripts/calendario.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>		
     
	     <link rel="stylesheet" href="styles/calendario.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="scripts/uijquery.js"></script>
    
    
    <?php 
	if(isset($_POST['fini'])){
		echo '<script> 
  $( function() {
    $("#dateDefaultj").datepicker();
	 $("#dateDefaultFinalj").datepicker();
 
  } );
  </script>';
		}else{
			echo '<script> 
  $( function() {
    $( "#dateDefault").datepicker();
	 $("#dateDefaultFinal").datepicker(); 
  } );
  </script>';
			}
	?>
    
    
    
    
<link rel="icon" href="img/favicon.ico"> </head>


<body class="body" onload="logout()">
	<div id="extra">&nbsp;</div>

<div id="page">

<div id="header">

<!-- <div id="eNacional"><a href="http://www.energia.gob.mx/" target="_blank" title="Secretar&iacute;a de Energ&iacute;a">Secretar&iacute;a de Energ&iacute;a</a></div> -->  
<div id="PEMEX"></div> 



<div id="utils">
  <ul id="nav2"> 
	<li class="bar"><a href="mcontratos" class="baritem first">Contratos</a></li>
	<li class="bar"><a href="Intereses Moratorios.pdf" class="baritem first">Intereses Moratorios</a></li>
  	<li class="bar"><a href="Manual Competro Usuario.pdf" class="baritem first">Manual de Usuario</a></li>
	<li class="bar"><a href="menu_cte" class="baritem first">Inicio</a></li>
	 
    <!-- mete codigo de comunicados, pizarrion de avisos y seleccione el cliente--> 
	
  		
	    
	 
	<li class="barlast"><span>&nbsp;</span></li>
	</ul>
</div>

<div id="cliente">

		<p class="textoEjecutivo" align="center"  id="un"> 
    
     
   
  
<script type="text/JavaScript">
            $("#un").load("controlador/tpfacturas.php");
        </script>
    </p> 
	
</div>
<div id="fecha"> 
<p class="fechapc" align="right">
	
	

	</p>
</div>

<div id="mainmenu">
<ul id="nav">

	<li class="bar"><a href="menu_cte" class="baritem">Servicio a Clientes</a>
	</li>
    <li class="bar"><a href="contacto" class="baritem">Contacto</a>
	</li><li class="bar"><a href="scripts/logout.php" class="baritem">Salir</a>
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
							 <a  href="menu_cte" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Facturas</a>
							
					  </div>

						
				</div>
			
			
	
			
	
	
 




		<div id="maincontent"></div>		

	
	
	  
			
		
	<div id="maincontent" align="center">
     <form name="forma1" method="post" action="reporte_facturas">
    <table align="center" class="parametros">
			<tr>
			<td class="color_blanco"><B>Fecha Inicial:</B></td>
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
			<td class="color_blanco"><B>Fecha Final:</B></td>
			<td class="color_blanco">
            <?php if(isset($_POST['finial'])){
					echo '<input type="text" value= "'. $_POST['finial'].'" name="finial" id="dateDefaultFinalj">';
					}else{
						
						echo '<input type="text" value= "00/00/0000" name="finial" id="dateDefaultFinal">';
						}    ?>
			 </td>
			</tr>
	
			
			<tr>
				<td class="color_blanco"><B>Tipo de documento:</B></td>
			<td class="color_blanco">
			 
					<select name="tipo" id="drop">
						<!-- <input type="text" value="Facturas de producto" selected disabled="disabled"> -->
						<option value="Facturas de producto">Facturas de producto</option>
						<option value="Complementos">Complementos</option>
                        <option value="Notas de credito">Notas de crédito</option>
					</select>
			</td>
		</tr>
	
		<tr>
			<td class="color_blanco"><B>Estado del CFD:</B></td>
			<td class="color_blanco">
				<input type="text" value="Liberado" selected disabled="disabled">
			</td>
		</tr>
		
		<tr>
			<td class="color_blanco"> </TD>
		</tr>
		<tr>
			<td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
		</tr>
	</table>
    </form>
    
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
						
						//QUERY PARA TABLA, FALTA PONERLE EL IDEMPRESA BIEN
						$sqld = "select date(t1.fecha) as fecha, t2.fecha as fech,  t1.folio from facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura where STR_TO_DATE(t2.Fecha, '%d/%m/%Y') >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(t2.Fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y') and t1.IdEmpresa = '".$_SESSION["idempresa"]."' ";
														
					 
												 
					//echo $sqld;

					$Totall = 0;
					$cont = 0;
					$resultd = $connect->query($sqld);
					if ($resultd->num_rows > 0) {
						// output data of each row
						echo '';		
						while($rowd = $resultd->fetch_assoc()) {    
							 
							$sql = "Select t3.folio as fol, t3.destino,  t2.RzonSocial, t2.usuario, t1.Fecha, t1.Factura, t1.Concepto, t1.Total, t1.PDF from facturas t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa inner join pedido t3 on t1.folio = t3.foliofactura where t1.folio  = '".$rowd["folio"]."' ";
						 
						 
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
										<td><label>".$row["destino"]."</label></td>
										<td><label>".$row["fol"]."</label></td>
										<td><label  >".$rowd["fech"]."</label></td>
										<td><label  >".$row["Fecha"]."</label></td> 
										<td><label>".$FF."</label></td>
										<td><label>".$row["Concepto"]."</label></td>
								<td><label>".$row["Concepto"]."</label></td>
										<td><label>$".$ImporteTotal."</label></td> 
										<td><a href='../uploads/".$row["Factura"]."' download>Disponible</a></td>
										<td><a href='../uploads/".$row["PDF"]."' target='_blank'>Disponible</a></td>
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
						  
									//QUERY PARA TABLA, FALTA PONERLE EL IDEMPRESA BIEN
									$sqld = "select date(t1.fechagenerado) as fecha, t1.NombreComplemento,   '-' as fech, t2.RzonSocial, t1.folio, t1.uuidfactura from complementos t1 INNER JOIN empresa t2 ON t1.idempresa = t2.idempresa where DATE(t1.Fechagenerado) >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and DATE(t1.Fechagenerado) <= STR_TO_DATE('".$final."', '%d/%m/%Y') and t1.IdEmpresa = '".$_SESSION["idempresa"]."' ";
									
															 
							//echo $sqld;
		
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

                        if(isset($_POST['fini'])){
                            if($_POST["tipo"] == "Notas de credito"){  
                               
                                $IdEmpresa = $_POST['IdEmpresa']; 
$Fecha = $_POST['fini']; 
$inicial = $_POST['fini'];
$final = $_POST['finial'];
$cont = 0;
	$contImporte = 0;

 
  $sqld = "select date(fecha) as fecha from notascredito where date(fecha) >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and date(fecha) <= STR_TO_DATE('".$final."', '%d/%m/%Y') and IdEmpresa = '".$_SESSION['idempresa']."' group by date(fecha) ";

	

$resultd = $connect->query($sqld);
if ($resultd->num_rows > 0) {
// output data of each row
while($rowd = $resultd->fetch_assoc()) { 
		echo '
<table align="center" id="table">
<td class="color_blanco">
<b style="align: left;"> Fecha: </b> 
<br>
<b>'.$rowd['fecha'].'</b>
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
';// Check connection
$IdEmpresa = $_POST['IdEmpresa']; 
$Fecha = $_POST['fini'];  

 $Id = $_SESSION["idempresa"]; 

 
$string = str_replace('/', '-', $Fecha); 
 
$stringg = date('Y-m-d', strtotime($string));
  $sql = "Select t1.Folio, t2.usuario, t1.NotaCredito, t1.empresa, t1.idempresa, t1.pdf, t1.concepto,  t1.Fecha, t1.Total from notascredito t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa where date(Fecha) = '".$rowd['fecha']."' and t1.IdEmpresa = '".$Id."'";
 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
 
while($row = $result->fetch_assoc()) {
	$cont = $cont + 1;
	$contImporte = $contImporte + $row["Total"];
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
 <td> <div align='center' style='width:50px;'><a href='uploads/".$row["NotaCredito"]."'>XML</label>
 </div></td>
 <td> <div align='center' style='width:50px;'><a href='uploads/".$row["pdf"]."'>PDF</a>
 </div></td>

   

 </form></tr>";
}
echo '
<tr>
 <td class="color_blanco" colspan="3">Total Registros: '.$cont.'</td>  
 <td class="color_blanco" colspan="2"></td> 
 <td class="color_blanco" colspan="1" align="center">
 $'.number_format($contImporte, 2, '.', ',').'</td> 
 <tr>



</table>
 

';
} else { echo "0 results"; }
 
echo'
</table>



';  

 
	
	 
	
	
                            }
                        }
						}}

}



	
	?></table>
    
	 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">
  
<textarea name="text"  hidden cols="80" rows="2" id="txtarea"></textarea><br><br>
 
            
            <input type='submit' onclick='Print(this)' value='Exportar PDF'>
</form>
    
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
setInputDate("#dateDefaultFinal");   
     </script>
     
     





    
    
    
    
       <script>
         function Print(){
          
 $('#txtarea').html(document.getElementById('tabb').outerHTML)
 }
 </script>

<script language="JavaScript" src="scripts/datetime.js"></script> 