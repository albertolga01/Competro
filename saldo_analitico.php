
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
    <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
	
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	<SCRIPT src="scripts/renderelements.js" type="text/javascript"></SCRIPT>
 

	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>

	<script language="JavaScript" src="scripts/calendario.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>		
     
	      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="scripts/uijquery.js"></script>
    
    
    
    
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
							 <a class=bold href="#">Saldo Analítico</a>
							
					  </div>

						
				</div>
			
			
	
			
	
	
 


 
	
	  
			
		
	<div id="maincontent" align="center"> 	
    
    <table align="center" class="parametros">
			<tr class=""/><td align="left" class="color_blanco"><b>Cliente:</b></td><td align="left" class="color_blanco"><?php
echo '<a href="" id="empr">'. $_SESSION["usuario"] .'</a>';
?></td><td align="left" class="color_blanco"><b>Encargado de cobro:</b></td><td align="left" class="color_blanco">MULTIBANCO</td><tr/><tr class=""/>
<td align="left" class="color_blanco"><b>Forma de pago:</b>

</td><td align="left" class="color_blanco">
<?php 
$resultt = $connect->query("select Credito from estadocuenta where idempresa= '".$_SESSION["idempresa"]."' ");

     
    while ($roww = $resultt->fetch_assoc()) {
		$FP = $roww['Credito']; 
		$FPP  = '';
		if($FP == '0'){
			$FPP = 'CONTADO';
			}
		else if ($FP == '1'){
			$FPP = 'CREDITO';
			}
		
echo"<label>".$FPP."</label>";





}





$resultt = $connect->query(" select t1.IdEmpresa, t1.Credito, sum(t2.Comprometido) as SaldoComprometido, t1.LimC, t1.SaldoCredito from estadocuenta t1 inner join pedido t2 on t1.IdEmpresa = t2.IdEmpresa where t1.idempresa = '".$_SESSION["idempresa"]."' and t2.estadoatencion != 'Facturado' and t2.estadoatencion != 'Cancelado'  ");

   
    while ($roww = $resultt->fetch_assoc()) {
		$Limite = $roww['LimC']; 
		$FP = $roww['Credito'];
		$SaldoComprometido = $roww['SaldoComprometido'];
		$FPP  = '';
		
	}

	if($FP == '0'){

		$TipoSaldo = "Saldo a favor: ";
		$Saldoafavor = "";
		$ImporteSaldoaFavor = "";
	}
	if($FP == '1'){
		
	$TipoSaldo = "Crédito disponible: ";
	$Saldoafavor = "Saldo a favor";
	$ImporteSaldoaFavor = "";
	}

 
?><?php   
echo '
</td><td align="left" class="color_blanco"><b>Estado de suspensión:</b></td><td align="left" class="color_blanco">NORMAL</td><tr/>
			
			<tr class=""><td align="left" class="color_blanco"><b>'.$TipoSaldo.'</b></td><td align="left" class="color_blanco">
';


 
if($FP == '0'){

	
				$Q = "select t1.IdEmpresa, sum(t2.Disponible) as Disponible from estadocuenta t1 inner join movimientos t2 on t1.IdEmpresa = t2.IdEmpresa  where t1.idempresa = '".$_SESSION['idempresa']."' GROUP by t1.IdEmpresa";
	$Query = $connect->query($Q); 	
						
		while ($r = $Query->fetch_assoc()) {
		$Disponible = $r['Disponible'];
		$disp = number_format($Disponible, 2, '.', ','); 
		

		
							
		
}  
			echo"<label>$".$disp." PESOS</label>";
			
			}
			
			
	 if ($FP == '1'){  
 

			$Query = $connect->query("select t1.IdEmpresa, t1.Credito, sum(t2.restante) as restante, t1.LimC from estadocuenta t1 inner join facturas t2 on t1.IdEmpresa = t2.IdEmpresa  where t1.idempresa = '".$_SESSION["idempresa"]."' GROUP by t1.IdEmpresa");
						
						
		while ($r = $Query->fetch_assoc()) {
		$SaldoCredito = $r['restante'];
		
}  
 
 
 $Sqll = "select t1.idempresa, t1.SaldoCredito, t1.LimC, sum(t2.Restante) as Restante from estadocuenta t1 inner join facturas t2 on t1.IdEmpresa = t2.IdEmpresa where t1.idempresa= '".$_SESSION["idempresa"]."' ";
 	 
	
$resultte = $connect->query($Sqll);
$Saldo = '';
 
     
    while ($rowwe = $resultte->fetch_assoc()) {
		
		$LimC = $rowwe['LimC'];
		$SaldoCredito = $rowwe['Restante'];
		$a = $LimC - $SaldoCredito;
		$dispp = number_format($a, 2, '.', ','); 
		
		
		 
}

 

 
 echo"<label>$".$dispp." PESOS</label>";
			}


            echo '
 </td></tr>
 <tr class=""/><td align="left" class="color_blanco"><b>'.$Saldoafavor.'</b></td><td align="left" class="color_blanco">
 ';
 ?> 
 <?php 
$resultt = $connect->query("select Sobrante from estadocuenta where idempresa= '".$_SESSION["idempresa"]."' ");

     
    while ($roww = $resultt->fetch_assoc()) {
		$Sob = $roww['Sobrante']; 
		  }
		  if($FP == '1'){
echo"<label>$".number_format($Sob, 2, '.', ',')."</label>";
		  }


?>
 
  </td>
 
 </tr>
		
			

			<tr><td class="color_blanco"><br></td></tr>
	</table>
    
    
	<table>			
		<tr align="center">	
			<th rowspan="2"> Tipo de cuenta </th>
			<th rowspan="2"> Moneda </th>
			<th colspan="4"> C L I E N T E </th> 
		</tr>
		<tr align="center">
			<th> Saldo a pagar</th>
			<th> Comprometido </th>
			<th> Intereses moratorios </th>
			<th> Total </th> 
		</tr>
		
			
				<!-- Para uso opcional -->
				
			
				
					<tr class="color_non">
						<td align="left">
                        <?php 
						
						
						
						
						

		if($FP == '0'){
			$FPP = 'CONTADO';
			}
		else if ($FP == '1'){
			$FPP = 'CREDITO';
			}
		
echo"<label>".$FPP."</label>"; 
?>

                        </td>
						<td align="center">PESOS</td>
	
						<td align="right">
	                 	 
									<?php 
									if($FP == '0'){
										if( isset($Disponible) ){
											$QueryCreditoSobrante = "SELECT (SELECT sum(restante) AS Restante FROM facturas WHERE IdEmpresa = '{$_SESSION["idempresa"]}') AS SaldoCredito";
											$resultCreditoSobrante = $connect->query($QueryCreditoSobrante); 	
																
											if ($resultCreditoSobrante->num_rows > 0) {
												while($row = $resultCreditoSobrante->fetch_assoc()) {
													$CreditoSobrante = $row["SaldoCredito"];
												}
											}
											$dd = number_format($CreditoSobrante, 2, '.', ',');

										} else { 
											$dd = 0.00;
										}
									} else { 
										if(isset($SaldoCredito)){
											$dd = number_format($SaldoCredito, 2, '.', ',');
										} else {
											$dd = 0.00;
										}
									}
									if($disp > 0){
										echo"<a href='detalle_saldo_analitico'><label>$0.00</label></a>"; 
									}else{
										echo"<a href='detalle_saldo_analitico'><label>$".$dd."</label></a>";  
									}
									?>
								
	                 	
						</td>
						<td align="right">
	                 	
	                 		<?php 
							$comp = number_format($SaldoComprometido, 2, '.', ','); 
							echo"<label>$".$comp."</label>"; 
							?>
	                 	
						</td>
	
						<td align="right">$0.00</td>
                        
						<td align="right"><?php 
						if($FP == '0'){

							
							if(isset($dis)){
							$dis = number_format($Disponible - $SaldoComprometido, 2, '.', ',');}else{$dis = 0.00;}
							}else{
								if(isset($SaldoCredito)){
							$dis = number_format($SaldoCredito, 2, '.', ',');}else{$dis = 0.00;} 
							}
						
						  echo"<label>$".$dis."</label>"; ?></td>
						
						 
					</tr>
                    <tr><td colspan="6" height="40" class="color_blanco"></td></tr>
                    <tr><td colspan="6" align="center" class="color_blanco"><a href='detalle_saldo_analitico'><label>Detalle Saldo Analítico</label></a></td></tr>
                     <tr><td colspan="6" align="center" class="color_blanco"><a href='detalle_saldo_comprometido'><label>Detalle Saldo Comprometido</label></a></td></tr>
									
			
									
			
			
				<!-- Para uso opcional -->
			
			
							
				
		
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
        d = (hoy.getDate() +1),
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
     
     

<script language="JavaScript" src="scripts/datetime.js"></script>



    