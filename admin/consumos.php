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
	<SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>

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
    <link rel="icon" href="img/favicon.ico"> 
    <?php 
		if(isset($_POST['fini'])){
			echo '
			<script> 
				$( function() {
				$("#dateDefaultj").datepicker();
				$("#dateDefaultfinalj").datepicker();
				} );
			</script>';
		} else {
			echo '
			<script> 
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

		 
		<!-- FIN DEL ENCABEZADO --> 

		<!--Ruteo de la página-->
		<div id="contentfull" align="left">	
			<div class="margin">
				<DIV id=pathway>
					<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
					<a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
					<a class=bold href="menu_reportes">Reporters Internos</a>
					&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
					<a class=bold href="#">Reporte Consumos</a>
				</div>
			</div>

			<div id="maincontent"></div>		

			<div id="maincontent" align="center">
				<form name="forma1" method="post" action="consumos">
					<table align="center" class="parametros"> 
						<tr>
							<td class="color_blanco">
								<B>Fecha inicial:</B>
							</td>
							<td class="color_blanco">
								<input type="date" name="date-start" id="date-start">
							</td>
						</tr>

						<tr>
							<td class="color_blanco">
								<B>Fecha final:</B>
							</td>
							<td class="color_blanco">
								<input type="date" name="date-end" id="date-end">
							</td>
						</tr>

						<tr>
							<td class="color_blanco">
								<B>Año completo:</B>
							</td>
							<td class="color_blanco">
								<select name="date-yearonly" id="date-yearonly">
									<option>2018</option>
									<option>2019</option>
									<option>2020</option>
									<option>2021</option>
									<option>2022</option>
									<option>2023</option>
									<option>2024</option>
									<option>2025</option>
								</select>
							</td>
						</tr>

						<tr>
							<td class="color_blanco"><b>Seleccione cliente:</b></td>
							<td class="color_blanco">
								<?php 
									if(isset($_POST["IdEmpresa"])){		
										$result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1' and IdEmpresa != '".$_POST['IdEmpresa']."'");
									} else {
										$result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'  ");
									}

									echo "
										<select name='IdEmpresa' id='IdEmpresa'  style='width:100px;' required>
									";

									if(isset($_POST["IdEmpresa"])){
										$resulti = $connect->query("select IdEmpresa, usuario from empresa where IdEmpresa = '".$_POST['IdEmpresa']."'");
										while ($rowi = $resulti->fetch_assoc()) {
											unset($idi, $namei);
											$idi = $rowi['IdEmpresa'];
											$namei = $rowi['usuario']; 
											echo '<option value="'.$idi.'" name="empresa" id="select">'.$namei.'</option>';
										} 
									} else {echo "	 ";}

									while($row = $result->fetch_assoc()) {
										unset($id, $name);
										$id = $row['IdEmpresa'];
										$name = $row['usuario']; 
										echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';
									}  

									if(($_POST["IdEmpresa"]) == 'TODOS'){
										echo "<option selected>TODOS</option>";
									} else {
										echo "<option>TODOS</option>";
									}
								?> 
							</td>
						</tr>
						
						<tr></tr>
						
						<tr>
							<td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
						</tr>
					</table>
				</form>
     <br>
 
	 
		
    <?php 
	if (isset($_POST['date-start']) && isset($_POST['date-end'])) {

		$yearonlydata = substr($_POST['date-start'], 0, 4);
		echo"
		<script>
			document.getElementById('date-yearonly').value = '{$yearonlydata}';
			document.getElementById('date-start').value = '{$_POST['date-start']}';
			document.getElementById('date-end').value = '{$_POST['date-end']}';
		</script>
		";

// Check connection 
$inicial = $_POST['fini'];  
$final = $_POST['finial'];
$mes =  substr($inicial, 3, 2);
$mesd =  substr($inicial, 3, 2);
$ano =  $_POST["fini"];

$fechaInicial = $_POST['date-start'];
$fechaFinal = $_POST['date-end'];
// $yearInicial = substr($_POST['month-start'], 0, 4);
// $monthInicial = substr($_POST['month-start'], 5, 2);
// $yearFinal = substr($_POST['month-end'], 0, 4);
// $monthFinal = substr($_POST['month-end'], 5, 2);
$idempresa = $_POST["IdEmpresa"];
$meses = array();
$mesesn = array();
$magna = array();
$premium = array();
$diesel = array();

if($idempresa != "TODOS"){
	$empresa = "SELECT rzonsocial from empresa where idempresa = '".$idempresa."';"; 
	$em = $connect->query($empresa);
	
	if ($em->num_rows > 0) {
		while($emp = $em->fetch_assoc()) {  
			$rzonsocial = $emp["rzonsocial"];
		}
	} 
} else {
	$rzonsocial = "COMPETRO";
}

if($idempresa != "TODOS"){
	//$sqld = " SELECT MONTH(fecha) as fecha FROM facturas WHERE YEAR(fecha) = '".$ano."' and idempresa = '".$idempresa."' GROUP BY MONTH(fecha) ";
	$sqld = "SELECT MONTH(fecha) AS mes, YEAR(fecha) AS ano 
			FROM facturas 
			WHERE idempresa = '{$idempresa}'
			AND DATE(fecha) >= '{$fechaInicial}' AND DATE(fecha) <= '{$fechaFinal}' 
			GROUP BY MONTH(fecha)
			ORDER BY fecha ASC
	";
} else {
  	//$sqld = " SELECT MONTH(fecha) as fecha FROM facturas WHERE YEAR(fecha) = '".$ano."'  GROUP BY MONTH(fecha) ";
	$sqld = "SELECT MONTH(fecha) AS mes, YEAR(fecha) AS ano
			FROM facturas 
			WHERE DATE(fecha) >= '{$fechaInicial}' AND DATE(fecha) <= '{$fechaFinal}' 
			GROUP BY MONTH(fecha)
			ORDER BY fecha ASC
	";
}

$resultd = $connect->query($sqld);
if ($resultd->num_rows > 0) {
	while($rowd = $resultd->fetch_assoc()) {  
		$meses[] = array(
			"mes" => $rowd['mes'],
			"ano" => $rowd['ano']
		);
		
	}
}

echo " 
<br>
<table align='center'>
<tr><br></tr>
       <tr><td class='color_blanco' colspan='13' style='background-color:lightblue; text-align:center;' >".$rzonsocial."
</td></tr>
       <tr>
         <th  style='width:40px;'>Producto</th> 
   ";
foreach ($meses as $m){ 
  switch($m["mes"]){
    case 1:
    $mes = "Enero";
    break;
    case 2:
    $mes = "Febrero";
    break;
    case 3:
    $mes = "Marzo";
    break;
    case 4:
    $mes = "Abril";
    break;
    case 5:
    $mes = "Mayo";
    break;
    case 6:
    $mes = "Junio";
    break;
    case 7:
    $mes = "Julio";
    break;
    case 8:
    $mes = "Agosto";
    break;
    case 9:
    $mes = "Septiembre";
    break;
    case 10:
    $mes = "Octubre";
    break;
    case 11:
    $mes = "Noviembre";
    break;
    case 12:
    $mes = "Diciembre";
    break;

  }$mesesn[] = $mes;
  echo "<th>".$mes."</th>";
}
   echo "
       </tr>  
<tr>
<td>MAGNA</td>
";

foreach($meses as $md){
  if($idempresa != "TODOS"){
$cant = "SELECT t2.producto, SUM(t1.cantidad) AS cantidad FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2. foliofactura 
WHERE YEAR(t1.fecha) = '".$md['ano']."'  AND MONTH(t1.fecha) = '".$md["mes"]."' AND t1.idempresa = '".$idempresa."' and t2.producto  = 'GASOLINA 87 OCT' GROUP BY t2.producto
"; 
  }else{
    $cant = "SELECT t2.producto, SUM(t1.cantidad) AS cantidad FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2. foliofactura 
WHERE YEAR(t1.fecha) = '".$md['ano']."'  AND MONTH(t1.fecha) = '".$md["mes"]."'   and t2.producto  = 'GASOLINA 87 OCT' GROUP BY t2.producto
"; 
  }
$resc = $connect->query($cant);

if ($resc->num_rows > 0) {

while($rowc = $resc->fetch_assoc()) {  
  $magna[] = $rowc;
 echo "<td>".number_format(($rowc["cantidad"]/1000),2)."</td>"; 
}
} else {
  echo "<td> - </td>";
  $magna[] = array("producto" => "MAGNA", 
  "cantidad" => '0');
}
  }  
echo "
</tr>


<td>PREMIUM</td>
";

foreach($meses as $md){
  if($idempresa != "TODOS"){
$cant = "SELECT t2.producto, SUM(t1.cantidad) AS cantidad FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2. foliofactura 
WHERE YEAR(t1.fecha) = '".$md['ano']."'  AND MONTH(t1.fecha) = '".$md["mes"]."' AND t1.idempresa = '".$idempresa."' and t2.producto  = 'GASOLINA 91 OCT' GROUP BY t2.producto
";  
  }else{
    $cant = "SELECT t2.producto, SUM(t1.cantidad) AS cantidad FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2. foliofactura 
WHERE YEAR(t1.fecha) = '".$md['ano']."'  AND MONTH(t1.fecha) = '".$md["mes"]."'  and t2.producto  = 'GASOLINA 91 OCT' GROUP BY t2.producto
";  
  }
$resc = $connect->query($cant);
if ($resc->num_rows > 0) {

while($rowc = $resc->fetch_assoc()) { 
  $premium[] = $rowc; 
 echo "<td>".number_format(($rowc["cantidad"] / 1000),2)."</td>"; 
}
} else {
  echo "<td> - </td>";
  $premium[] = array("producto" => "PREMIUM", 
  "cantidad" => '0');
}
  }  
echo "
</tr>


<td>DIESEL</td>
";

foreach($meses as $md){
  if($idempresa != "TODOS"){
$cant = "SELECT t2.producto, SUM(t1.cantidad) AS cantidad FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2. foliofactura 
WHERE YEAR(t1.fecha) = '".$md['ano']."'  AND MONTH(t1.fecha) = '".$md["mes"]."' AND t1.idempresa = '".$idempresa."' and t2.producto  = 'DIESEL' GROUP BY t2.producto
"; 
  }else{
    $cant = "SELECT t2.producto, SUM(t1.cantidad) AS cantidad FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2. foliofactura 
    WHERE YEAR(t1.fecha) = '".$md['ano']."'  AND MONTH(t1.fecha) = '".$md["mes"]."'  and t2.producto  = 'DIESEL' GROUP BY t2.producto
    ";  
  }
$resc = $connect->query($cant);
if ($resc->num_rows > 0) {

while($rowc = $resc->fetch_assoc()) {  
  $diesel[] = $rowc;
 echo "<td>".number_format(($rowc["cantidad"]/1000),2)."</td>"; 
}
} else {
  echo "<td> - </td>";
  $diesel[] = array("producto" => "DIESEL", 
  "cantidad" => '0');
  
}
  }   
echo "
</tr>




       ";
 
}else { echo ""; }

						 
	
 

 
 	echo "	 </table>
   <div  >
   
   <div style='width:800px; height:550;'>
   <br><br> 
   <canvas id='line' width='400' height='250'></canvas>  
   </div> 
   </div>
	 	";	 
     foreach($saldom as $c){ 
      $col[] = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
      
   }
              
      echo '
<script>
      new Chart(document.getElementById("line"), {
        type: "line",
        data: {
          labels: [
            ';
             
            foreach ($mesesn as  $t) {
                echo "'".$t."'".",";
              }
             
            echo '

          ],
          datasets: [{ 
              data: [
                ';
             
                foreach ($magna as  $m) {
                    echo $m["cantidad"].",";
                  }
                 
                echo '

              ],
              label: "Magna",
              borderColor: "green",
              fill: false
            }, { 
              data: [
                ';
             
                foreach ($premium as  $p) {
                    echo $p["cantidad"].",";
                  }
                 
                echo '

              ],
              label: "Premium",
              borderColor: "red",
              fill: false
            }, { 
              data: [
                ';
             
                foreach ($diesel as  $d) {
                    echo $d["cantidad"].",";
                  }
                 
                echo '

              ],
              label: "Diesel",
              borderColor: "black",
              fill: false
            } 
          ]
        },
        options: {
          title: {
            display: true,
            text: "Consumo de Combustible '.$rzonsocial.'"
          }
        }
      });
       </script>
       
      ';
 
 
    
 
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
 
setInputDate("#dateDefaultfinal");   
     </script>
     
	 
	  <script>
function setInputDate(_id){
    var _dat = document.querySelector(_id);
      var hoy =new Date(new Date().setDate(new Date().getDate() -0)),
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
     
<script>
	document.getElementById('date-yearonly').addEventListener('change', ()=>{
		let year = document.getElementById('date-yearonly').value;
		document.getElementById('date-start').value = year+'-01-01';
		document.getElementById('date-end').value = year+'-12-31';
	});
</script>





    