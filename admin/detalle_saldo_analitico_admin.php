 

<?php 
    $inicial = '';
    require 'connector.php';
    require 'crXml.php';
    global $connect; 
    require 'dompdf/autoload.inc.php';

    session_start();	

    use Dompdf\Options;
    use Dompdf\Dompdf;

    if(isset($_POST['text'])){
	    $options = new Options();
        $dompdf = new Dompdf($options); 
        $dompdf = new Dompdf(); 
        $dompdf->loadHtml($_POST['text']); 
        $dompdf->setPaper('A4', 'portrait'); 
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
	<script src="https://www.google.com/recaptcha/api.js"></script>		
     
	     
          <!-- For jsPDF -->
		  <script src="scripts/html2canvas.1.0.0-rc.7.js"></script>
        <script src="scripts/dompurify.2.2.0.min.js"></script>
        <script src="scripts/jspdf.2.1.1.umd.min.js"></script>
            <!-- PDF export methods I wrote using the libraries above -->
        <script src="scripts/pdfExportMethods.js"></script>

        <link rel="stylesheet" href="styles/calendario.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    
    
<link rel="icon" href="img/favicon.ico"> </head>


<body class="body" onload="logout()">
	<div id="extra">&nbsp;</div>

<div id="page">

<div id="header">

<!-- <div id="eNacional"><a href="http://www.energia.gob.mx/" target="_blank" title="Secretar&iacute;a de Energ&iacute;a">Secretar&iacute;a de Energ&iacute;a</a></div> -->  
<div id="PEMEX"></div> 



<div id="utils">  <ul id="nav2"> 	

    <li class="bar"><a href="cargacontratos" class="baritem first">Contratos</a></li>
    <li class="bar"><a href="InteresesMoratoriosad" class="baritem first">Intereses Moratorios</a></li>  	
    <li class="bar"><a href="Manual Competro Usuario.pdf" class="baritem first">Manual de Usuario</a></li>	
    <li class="bar"><a href="menu_cteadmin" class="baritem first">Inicio</a></li>
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




    </p> 
	
	
	
</div>
<div id="fecha"> 
<p class="fechapc" align="right">
	
	

	</p>
</div>

<div id="mainmenu">
<ul id="nav">
	 

	<li class="bar"><a href="menu_cteadmin" class="baritem">Servicio a Clientes</a>
	</li>

	

	<li class="bar"><a href="clientes" class="baritem">Clientes</a>
	</li> <li class="bar"><a href="pedidoscnvotradmin" class="baritem">Pedidos</a>
	</li> <li class="bar"><a href="scripts/logout.php" class="baritem">Salir</a>
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
	  echo "window.location.href='index';";
				}  
				
			if(isset($_POST["IdEmpresa"])){
	$IdEmpresa = $_POST["IdEmpresa"];
	}else{
			$IdEmpresa = '0';
			 echo "window.location.href='index';";
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
							 <a  href="saldo_analiticoadmin">Saldo Analítico</a>
                             &nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Detalle de Saldo Analítico</a>
							
							
					  </div>

						
				</div>
			
			
	
			
	
	
 



 
	
	  
			
		
	<div id="maincontent" align="center"> 	
    
   <table align="center" class="parametros">
			<tr class=""/><td align="left" class="color_blanco"><b>Cliente:</b></td><td align="left" class="color_blanco">
				
	<?php
	$sql = "SELECT usuario, t2.Credito, t2.LimC, IF(t2.Credito = '1', 'CREDITO', 'CONTADO') AS FP, t2.SaldoCredito, sum(t3.Restante) AS Restante
				, (Select sum(disponible) as Restante from movimientos where IdEmpresa = '{$IdEmpresa}') as SaldoContado 
			FROM empresa t1 
			INNER JOIN estadocuenta t2 ON t1.IdEmpresa = t2.IdEmpresa 
			INNER JOIN facturas t3 ON t2.IdEmpresa = t3.IdEmpresa 
			WHERE t1.idempresa= '{$IdEmpresa}' ";
		$res = $connect->query($sql);

     
    while ($row = $res->fetch_assoc()) {
		echo '<a href="" id="empr">'.$row['usuario'].'</a>';
		$FPP = $row['FP'];
		$Saldo = $row['Restante'];
		$Saldoo = number_format($Saldo, 2, '.', ',');
		$Limite = $row['LimC'];
		$SaldoDisp = $Limite - $Saldo;
		$SaldoDisponible= number_format($SaldoDisp, 2, '.', ',');
		$SaldoDispContado = $row['SaldoContado'];
	}
			
			

?></td>
	<td align="left" class="color_blanco"><b>Encargado de cobro:</b></td>
	<td align="left" class="color_blanco">MULTIBANCO</td><tr/>
<tr class=""/>
	<td align="left" class="color_blanco"><b>Forma de pago:</b></td>
	<td align="left" class="color_blanco">
		<?php 
		if(isset($FPP)){
			echo"<label>".$FPP."</label>"; 
		}
		?>
	</td>
	<td align="left" class="color_blanco"><b>Estado de suspensión:</b></td>
	<td align="left" class="color_blanco">NORMAL</td>
<tr/>		

<tr class="">
	<td align="left" class="color_blanco"><b>Saldo disponible de contado:</b></td>
	<td align="left" class="color_blanco">
	<?php 
		if(isset($SaldoDisponible)){
			if($FPP == 'CONTADO'){
				echo"<label>$".$SaldoDispContado." PESOS</label>";
			} else {
				echo"<label>$".$SaldoDisponible." PESOS</label>"; 
			}
		}
	?>
    </td>
</tr>

<tr>
	<td class="color_blanco"><br></td>
</tr>
</table> 
    <div id="tablediv">
	<table id="table">			
		<tr align="center">
        	<th> Folio </th>	
			<th> Numero de documento </th>
			<th> Fecha del documento </th>
			<th> Estado del documento </th>
            <th> Fecha de vencimiento </th>  
            <th> Fecha de pago moratorio </th>
			<th> Dias vencidos </th>
			<th> Importe </th>
            <th> Saldo </th> 
           	<th> Interes </th>
            <th> IVA del interes </th>
			<th> Total </th>
			<th> Estado de cobro </th>  
            <th> Estado </th>
		</tr>
		
			
				<!-- Para uso opcional -->
				
			
				
					<tr class="color_non">
						
						<?php 
	
$result = $connect->query("select folio, factura, fecha, fechavencimiento, total, restante from facturas where idempresa= '".$IdEmpresa."' and restante > 0.01");
 
     
    while ($row = $result->fetch_assoc()) { 
		if($row["restante"]<$row["total"]){$estado = 'PARCIAL PAGADO';}else{$estado = 'NORMAL';}
		$Total = number_format($row["total"], 2, '.', ',');
		$Restante = number_format($row["restante"], 2, '.', ',');
		$Fecha = $row["fecha"];
		$uno = strtotime($Fecha);
		$FechaV = $row["fechavencimiento"];
		$dos = strtotime($FechaV);
		 
	 
		$now = new DateTime();
		$later = new DateTime($FechaV);

		$diff = $later->diff($now)->format("%a"); 
		
		if($later > $now){
			$diasVencidos = $diff * -1;
			
			}else{
		$diasVencidos = $diff;}
		
		
		echo "
		<td> <label style=' align: center;'>".$row["folio"]."</label></td>
		<td> <label style=' align: center;'>".$row["factura"]."</label></td>
		<td> <label style=' align: center;'>".$row["fecha"]."</label></td>
		<td> <label style=' align: center;'>".$estado."</label></td>
		<td> <label style=' align: center;'>".$row["fechavencimiento"]."</label></td>
		<td> <label style=' align: center;'> </label></td>
		<td> <label style=' align: center;'>".$diasVencidos."</label></td>
		<td> <label style=' align: center;'>$".$Total."</label></td>
		<td> <label style=' align: center;'>$".$Restante."</label></td>
		<td> <label style=' align: center;'>$0.00</label></td>
		<td> <label style=' align: center;'>$0.00</label></td>
		<td> <label style=' align: center;'>$".$Total."</label></td>
		<td> <label style=' align: center;'>MULTIBANCO</label></td>
		<td> <label style=' align: center;'>NORMAL</label></td>
		</tr>";
} 



echo "<tr>

<td class='color_blanco'></td>
<td class='color_blanco'></td>
<td class='color_blanco'></td>
<td class='color_blanco'></td>
<td class='color_blanco'></td>
<td class='color_blanco'></td>
<td class='color_blanco'></td>
<td class='color_blanco'></td>
<td class='color_blanco'>$".$Saldoo."</td>

</tr>";
?>
	
						
						
						 
					
									
			
									
			
			
				<!-- Para uso opcional -->
			
			
							
				
		
		</table>
</div>
    
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
            
		 
	<button className="btn btn-outline-success btn-sm" onClick="imprimir()" >Imprimir </button> 
	</div> 	
		

	
	<script>
    function imprimir()
    { 

		html2canvas(document.getElementById('table'), {                
			 onrendered: function(canvas) {      
				 
				let imgWidth = 290;
                let imgHeight = canvas.height * imgWidth / canvas.width;
				 var img =canvas.toDataURL("image/png");                  
				    var pdf = new jsPDF('l');                     
					pdf.addImage(img, 'PNG', 10, 10);               
					 pdf.save('DetalleDeSaldoCompetro.pdf');                 
					}           
				  }); 


	 
    }
</script>

	<script>
    function downloadpdf()
    { 
		var pdf = new jsPDF('l', 'pt', 'letter');
			pdf.canvas.height = 72 * 11;
			pdf.canvas.width = 72 * 8.5; 
			var table = document.getElementById("table");
			pdf.canvas.orientation = 'landscape';
			pdf.fromHTML(table.outerHTML);

			pdf.save('test.pdf');
    }
</script>
	
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
     
     





    