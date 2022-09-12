
<?php 

require 'connector.php';
global $connect;
session_start();
require 'dompdf/autoload.inc.php';
	
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
   

	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	<SCRIPT src="scripts/renderelements.js" type="text/javascript"></SCRIPT>

    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
	<link href="styles/tables.css" rel="stylesheet" type="text/css" />
	
    <link href="styles/menu.css" rel="stylesheet" type="text/css" />
    <link href="styles/sidebar.css" rel="stylesheet" type="text/css" />
    <link href="styles/content.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="iconion.ico">
    <link rel="stylesheet" href="styles/calendario.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="scripts/uijquery.js"></script>
  <script type="text/javascript" src="https://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script>
    
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
	

	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>

	<script language="JavaScript" src="scripts/calendario.js"></script> 	
    
    
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

<!-- FIN DEL ENCABEZADO --> 


	

<script  type="text/javascript" > 
     function logout(){<?php 
  
   
		if (isset($_SESSION["usuario"])) {
			}else{
				session_unset();
				 session_destroy();
	  echo "window.location.href='index.php';";
				}  
				if (isset($_POST["fini"])) {
			}else{
				
	  
				}  
?>}
</script>
	


	<!--Ruteo de la página-->
	
		  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cte" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Programa de entregas interactivo</a>
							
					  </div>

						
				</div>
			
	
			
	
	
 



	 
	
	  
			
		
	<div id="maincontent" align="center"> 	
       
       
       <form name="forma1" method="post" action="pedidosrprogramados">
       
       
       <?php
 


echo '<input type="hidden" name="IdEmpresa" value="'. $_SESSION["idempresa"] .'">';
?>
       
       
       	<table align="center" class="parametros">
			 <tr>
				<td class="color_blanco"><b>Centro de origen:</b></td>
				<td class="color_blanco">
                <?php 
               if(isset($_POST['centroorigen'])){
				$C = $_POST['centroorigen'];
				}else{$C = 'Seleccione';}
              echo '<select name="centroorigen">';

    
	$resultx = $connect->query("select folio, centroentrega from centrosentrega");
	echo "<option selected>".$C."</option>";
	 while ($row = $resultx->fetch_assoc()) {

                  unset($name); 
                  $name = $row['centroentrega']; 
                  echo '<option value="'.$name.'" name="empresa" id="select">'.$name.'</option>';

}
	
	   
    echo "</select>";  echo '
               
               
				 </td>
                 	
                  
			</tr>
            
            <tr>
				<td class="color_blanco"><b>Fecha Inicial:</b></td>
				<td class="color_blanco">';
				 
              if(isset($_POST['fini'])){echo ' <input type="text" name="fini" id="dateDefaultj" value='.$_POST['fini'].' readonly>';}
				else{
					echo ' <input type="text" name="fini" id="dateDefault" value="" readonly 	>';}
               
                ?>
				  
                 </td>
                
			</tr>
             <tr><td class="color_blanco"><b>Fecha Final:</b></td><?php
           if(isset($_POST['finial'])){
			   echo '
			<td class="color_blanco"><input type="text" name="finial" id="dateDefaultfinalj" value='.$_POST['finial'].' readonly>';
			    
			   }else{echo '
			<td class="color_blanco"><input type="text" name="finial" id="dateDefaultfinal"  readonly>';
		   }
            ?>
            <a onClick="return calendario('forma1.finial');"></a></td> 
            
			</tr>
            <tr class="color_non"> 
           <td class="color_blanco"><b>Tipo Proceso:</b></td>		
				<td colspan="1" class="color_blanco">
					<select name="tipo">
                    
                    <?php 
					if(isset($_POST['tipo'])){
						echo '<option selected value= '.$_POST['tipo'].' >'.$_POST['tipo'].'</option>
						<option value= "Semanal" >Semanal</option>
                         <option  value= "Diario" >Diario</option>';
						}else{
							echo '
                       
						<option  value= "Semanal" >Semanal</option>
                         <option  value= "Diario" >Diario</option>
						 ';
							}
					?>
					</select>
				</td>
                </tr>
           
			<tr class="color_blanco"> 
           <td class="color_blanco" class="color_blanco"><b>Mostrar pedidos sugeridos: </b></td>	
           <td class="color_blanco"><input type="checkbox" name="mostar"></td>	
           </tr>
    	  </table>	
           <table align="center">
	    	<tr>
	    	<td align="center" class="color_blanco">
            
            <input type="Submit" value="Aceptar" ></td>
	    	</tr>
	    	</table>	
  
        <br>
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
    
<!-- quité columna actualizar y botton --><!--
<?php

if (isset($_POST['fini'])) { 
$date = $_POST['fini'];
$string = str_replace('/', '-', $date);
$date = date('Y-m-d',time());//date variable
$ingresada = strtotime($string);

$hoy = strtotime($date);//fecha hoy 

if($ingresada <= $hoy){

	echo '
<table align="center" id="table">
<td class="color_blanco">
<b style="align: left;"> Fecha programada: </b> 
<br>
<b>'.$_POST['fini'].'</b>
</td>
<tr>

<th>Folio pedido</th>
<th>Centro de entrega</th>
<th>Destino</th>
<th>Producto</th>
<th>Presentación</th>
<th>Turno</th>
<th>Medio</th>
<th>Clave</th>
<th>Transportista</th>
<th>Tonel</th>
<th>Capacidad programada (Litros)</th> 
<th>Fecha y hora estimada</th> 
<th>Fecha y hora de facturación</th> 
<th>Estado de atención</th>

</tr>
';
$CapacidadFinal;
 
// Check connection
$IdEmpresa = $_SESSION['idempresa']; 
$Fecha = $_POST['fini'];  
$centro = $_POST['centroorigen'];  

$facturado = 0;
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

$sql = "SELECT folio, CentroEntrega, facturado, producto, destino, fecha, presentacion, turno, medio, Transportista, capacidad, tonel,  entrega, vehiculo, chofer, EstadoAtencion, (select sum(capacidad) as total from pedido where idEmpresa = '".$IdEmpresa."' and fecha = '".$Fecha."' ) as cap, (select count(folio) as totall from pedido where idEmpresa = '".$IdEmpresa."' and fecha = '".$Fecha."' ) as reg FROM pedido where idEmpresa = '".$IdEmpresa."' and fecha = '".$Fecha."' and CentroEntrega = '".$centro."'";

$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$facturado = $row["facturado"];
$CapacidadFinal = $row["cap"];
$registros = $row["reg"];
echo "<tr>
<form name='forma' method='post' action='cargaremision.php'> 
<td> <div align='center'> <label>".$row["folio"]."</label> </div></td>
<td> <label style='width:40px;
   height:25px;   align: center;'>".$row["CentroEntrega"]."</label></td>
<td> <div style= '> <label style='  
  height:25px;   align: center;'>".$row["destino"]."</label> </div></td>
<td> <label style='
   height:25px;   align: center;'>".$row["producto"]."</label></td>
<td> <div align='center'> <label style='
  display: inline-block; height:15px;   align: center;'>".$row["presentacion"].".</label> </div></td>
<td> <div style='height:12px; '><label style='
  display: inline-block; height:25px;   align: center;'>".$row["turno"]."</label></div> </td>

<td> <div align='center'><label>".$row["medio"]."</label></div></td>
  
<td> <div style='height:12px; '><label style='
  display: inline-block; height:25px;   align: center;'>".$row["vehiculo"]."</label></div></td>
<td> ";
if($row['entrega'] == 'LAB DESTINO'){
	echo "<div style='height:12px; '><label style='
  display: inline-block; height:25px;   align: center;'>PEMEX LOGISTICA</label></div>";
	
	}
	if($row['entrega'] == 'LAB LLENADERAS'){
		
		echo "<div style='height:12px; '><label style='
  display: inline-block; height:25px;   align: center;'>COMERCIALIZADORA / FLETERA</label></div>";
	}


 
 
echo "</td>
<td> <div align='center'><label style='
  height:25px;   align: center;'>".$row["tonel"]."</label> </div></td>
<td> <div align='center'><label style=' align: center;'>".$row["capacidad"]."</label></div></td>
<td> <label style=' align: center;'>".$row["fecha"]."</label></td>
<td> <a href='uploads/F0000000355 LIBRAMIENTO F-45432742 M.pdf'> <label style=' align: center;'>".$row["fecha"]."</label> </a></td>
<td> <label style=' align: center;'>".$row["EstadoAtencion"]."</label></td>

 </form>
</tr>"

;
}
echo '
<table>

<td class="color_blanco" style="background-color: white;"></td>

<td class="color_blanco"  style="background-color: white;">
<b id="val" 	style="align: left;">Total de registros: '.$registros.'</b> 

</td>

<td class="color_blanco" style="background-color: white;"><pre>                                                                                                                                                             </pre></td>

</table>

';
} else { echo "0 results"; }
 
echo'
</table>




';

}else{
	echo '<b> No se encontró información </b>';
	
	}




}


?>
    
    
	-->	
            
            
            
       


 <?php

if (isset($_POST['tipo'])) {

$tipo = $_POST['tipo'];		

if($tipo === 'Diario'){
	

if (isset($_POST['fini'])) {
	
	
	$idempresa = $_SESSION["idempresa"];
	$lit = 0;
$date = $_POST['fini'];
$string = str_replace('/', '-', $date);
$date = date('Y-m-d',time());//date variable
$ingresada = strtotime($string);

$hoy = strtotime($date);//fecha hoy 
$idtable = "pedidos".substr($rowd['fecha'], 0, 2);


	echo '
	<div style="width:1060px; Overflow-x:scroll;">
<table align="center" id="'.$idtable.'">
<td class="color_blanco" colspan="3">
<b style="align: left;"> Fecha programada: </b> 
<br>
<b>'.$_POST['fini'].'</b>
</td>
<tr>

<th>Folio pedido</th> 
<th>Centro de entrega</th>
<th>Destino</th>
<th>Producto</th>
<th>Presentación</th>
<th>Turno</th>
<th>Medio</th>
<th>Clave</th>
<th>Transportista</th>
<th>Tonel</th>
<th>Capacidad programada (Litros)</th> 
<th>Fecha y hora estimada</th> 
<th>Fecha y hora de facturación</th> 
<th>Estado de atención</th> 
<th>Comprometido</th>
<th>Remisión</th>
</tr>
';
$CapacidadFinal;
 
// Check connection

$Fecha = $_POST['fini'];  
if ($connect->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
 
if(isset($_POST['mostrar'])){
	$sql = "SELECT folio, IdEmpresa, Programado, Comprometido, CentroEntrega, producto, destino, fecha, presentacion, turno, medio, Transportista, capacidad, tonel,  entrega, vehiculo, chofer, EstadoAtencion, (select sum(capacidad) as total from pedido where fecha = '".$Fecha."' ) as cap, (select count(folio) as totall from pedido where  fecha = '".$Fecha."' ) as reg FROM pedido where fecha = '".$Fecha."' and centroentrega = '".$_POST["centroorigen"]."' and idempresa = '".$idempresa."' order by destino";
	}else{
		$sql = "SELECT folio, IdEmpresa, Programado, Comprometido, CentroEntrega, producto, destino, fecha, presentacion, turno, medio, Transportista, capacidad, tonel,  entrega, vehiculo, chofer, EstadoAtencion, (select sum(capacidad) as total from pedido where fecha = '".$Fecha."' ) as cap, (select count(folio) as totall from pedido where  fecha = '".$Fecha."' ) as reg FROM pedido where fecha = '".$Fecha."' and centroentrega = '".$_POST["centroorigen"]."' and EstadoAtencion != 'CALCULADO' and idempresa = '".$idempresa."' order by destino";
		}


//echo "".$_POST['centroorigen']." ";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$lit = $lit + $row["capacidad"];
$CapacidadFinal = $row["cap"];
$registros += 1;

echo "<tr>
<form name='forma' method='post' action='cargaremision.php'>   
<input type='hidden' name='folio[]' value=".$row["folio"]."> 
<input type='hidden' name='fecha' value=".$_POST["fini"]."> 
<input type='hidden' name='fechafinal' value=".$_POST["finial"]."> 
<input type='hidden' name='centroorigen' value='".$_POST["centroorigen"]."'> 
<input type='hidden' name='producto[]' value='".$row["producto"]."'> 
<input type='hidden' name='capacidad[]' value='".$row["capacidad"]."'> 
<input type='hidden' name='destino[]' value='".$row["destino"]."'> 
<input type='hidden' name='Comprometido[]'>
<td> <div style='align:center;'> <label>".$row["folio"]."</label> </div></td>

<td> <label style='width:40px;
   height:25px;   align: center;'>".$row["CentroEntrega"]."</label></td>
<td> <div style= '> <label style='  
  height:25px;   align: center;'>".$row["destino"]."</label></div></td>
<td> <label style='
   height:25px;   align: center;'>".$row["producto"]."</label></td>
<td> <div style='height:12px;' align='center' > <label style='
  display: inline-block; height:25px;   align: center;'>".$row["presentacion"].".</label> </div></td>
<td> <div style='height:12px;' align='center'><label style='
  display: inline-block; height:25px;   align: center;'>".$row["turno"]."</label></div> </td>

<td> <label style='
  height:25px;   align: center;'>".$row["medio"]."</label></td>
  
<td> <div style='height:12px; '><label style='
  display: inline-block; height:25px;   align: center;'>".$row["vehiculo"]."</label></div></td>
<td> ";
if($row['entrega'] == 'LAB DESTINO'){
	echo "<div style='height:12px; '><label style='
  display: inline-block; height:25px;   align: center;'>PEMEX LOGISTICA</label></div>";
	
	}
	if($row['entrega'] == 'LAB LLENADERAS'){
		
		echo "<div style='height:12px; '><label style='
  display: inline-block; height:25px;   align: center;'>COMERCIALIZADORA</label></div>";
	}


 
 
echo "</td>
<td> <div align='center'><label style='
  height:25px;   align: center;'>".$row["tonel"]."</label></div></td>
<td> <label style=' align: center;'>".number_format($row['capacidad'], 0, '.', ',')."</label></td>
<td> <label style=' align: center;'>".$row["fecha"]."</label></td>
<td>

"; 

           

 $remision = "";
	//get the name of the company out of the id
	$resultttd = "select pdf, fecha, folio, remision from facturas where Nopedido = '".$row["folio"]."' and idempresa='".$row["IdEmpresa"]."'";
 
   $resultx = $connect->query($resultttd);
if ($resultx->num_rows > 0) { 
while($rowwyd = $resultx->fetch_assoc()) {
	$foliof = $rowwyd["folio"];
	$remision = $rowwyd["remision"];
	echo"
				  <a href='uploads/".$rowwyd["pdf"]."'> <label style=' align: center;'>".$rowwyd["fecha"]."</label> </a>

";
}
}else{
	$foliof=0;
}
 


if($row["EstadoAtencion"] != "CANCELADO"){
	$contadorpedidos += 1;
}


echo "
 
</td>
<td> <label style=' align: center;'>".$row["EstadoAtencion"]."</label></td>
<td><div align='center'>";
if($row["Comprometido"]>0){$importe = number_format($row["Comprometido"], 2, '.', ',');echo "<label>$ ".$importe."</label>";
echo "<input type='hidden' name='Comprometido[]' value=".$row["Comprometido"]." >";
}
else{
echo "";
}
echo "
</td>
 <td>
";
if($facturado == 1){
	
	if($remision != ""){
		echo "<a href='".$remision."'><label>Ver</label></a>";
	}else{
		echo "<input type='submit' value='Cargar'>";
	}
	
}else{
 
	
}

echo "
</td>


<input type='hidden' name='foliofactura' value='".$foliof."'>


 </form>
</tr>"

;
}
echo '
<tr>
<td class="color_blanco" colspan="2">Registros: '.$registros.'</td>
<td class="color_blanco">Pedidos: '.$contadorpedidos.'</td> 
<td class="color_blanco"></td><td class="color_blanco"></td><td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco">'.number_format($lit, 0, '.', ',').'
</td>
</tr>
<tr>
<td colspan="16" class="color_blanco"> <button onClick="PdfDownload('.$idtable.')">Exportar a PDF</button>
</td>
</tr>
 
 

';
} else { echo "0 results"; }
 
echo'
</table>	
</div>
';



}

	
	
	
}
if($tipo === 'Semanal'){
 
// Check connection
$IdEmpresa = $_SESSION['idempresa']; 
$Fecha = $_POST['fini']; 
$inicial = $_POST['fini'];
$final = $_POST['finial'];


if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

if(isset($_POST['mostrar'])){
	  $sqld = "select fecha from pedido where idempresa = '".$IdEmpresa."' and STR_TO_DATE(fecha, '%d/%m/%Y') >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y') and centroentrega = '".$_POST["centroorigen"]."' group by fecha";

	}else{
		  $sqld = "select fecha from pedido where idempresa = '".$IdEmpresa."' and STR_TO_DATE(fecha, '%d/%m/%Y') >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y') and centroentrega = '".$_POST["centroorigen"]."' and EstadoAtencion != 'CALCULADO' group by fecha";

		}

	

$resultd = $connect->query($sqld);

if ($resultd->num_rows > 0) {
// output data of each row
while($rowd = $resultd->fetch_assoc()) {
	
	
	
if (isset($_POST['fini'])) {
	
	
	
	$lit = 0;
$date = $_POST['fini'];
$string = str_replace('/', '-', $date);
$date = date('Y-m-d',time());//date variable
$ingresada = strtotime($string);
$contador = 0;

$hoy = strtotime($date);//fecha hoy 
$idtable = "pedidos".substr($rowd['fecha'], 0, 2);

	echo '<div style="width:1060px; Overflow-x:scroll;">
<table align="center" id="'.$idtable.'">
<td class="color_blanco" colspan="3">
<b style="align: left;"> Fecha programada: </b> 
<br>
<b>'.$rowd['fecha'].'</b>
</td>
<tr>

<th>Folio pedido</th> 
<th>Centro de entrega</th>
<th>Destino</th>
<th>Producto</th>
<th>Presentación</th>
<th>Turno</th>
<th>Medio</th>
<th>Clave</th>
<th>Transportista</th>
<th>Tonel</th>
<th>Capacidad programada (Litros)</th> 
<th>Fecha y hora estimada</th> 
<th>Fecha y hora de facturación</th> 
<th>Estado de atención</th> 
<th>Comprometido</th> 
<th>Remisión</th>
</tr>
';
$CapacidadFinal;

 
// Check connection

$Fecha = $_POST['fini'];  
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
$facturado = 0;
if(isset($_POST['mostar'])){
	$sql = "SELECT folio, IdEmpresa, facturado, Comprometido, Programado, CentroEntrega, producto, destino, fecha, presentacion, turno, medio, Transportista, capacidad, tonel,  entrega, vehiculo, chofer, EstadoAtencion, (select sum(capacidad) as total from pedido where fecha = '".$rowd['fecha']."' ) as cap, (select count(folio) as totall from pedido where  fecha = '".$rowd['fecha']."' ) as reg FROM pedido where idempresa = '".$IdEmpresa."' and fecha = '".$rowd['fecha']."' and centroentrega = '".$_POST["centroorigen"]."' order by destino";
	}else{
		$sql = "SELECT folio, IdEmpresa, facturado, Comprometido, Programado, CentroEntrega, producto, destino, fecha, presentacion, turno, medio, Transportista, capacidad, tonel,  entrega, vehiculo, chofer, EstadoAtencion, (select sum(capacidad) as total from pedido where fecha = '".$rowd['fecha']."' ) as cap, (select count(folio) as totall from pedido where  fecha = '".$rowd['fecha']."' ) as reg FROM pedido where idempresa = '".$IdEmpresa."' and fecha = '".$rowd['fecha']."' and centroentrega = '".$_POST["centroorigen"]."' and EstadoAtencion != 'CALCULADO' order by destino";
	}


//echo "".$_POST['centroorigen']." ";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$facturado = $row["facturado"];
	$contador = $contador + 1;
$CapacidadFinal = $row["cap"];
$registros = $row["reg"]; 
$lit = $lit + $row["capacidad"];
echo "<tr>
<form name='forma' method='post' action='cargaremision.php'> 
<input type='hidden' name='folio[]' value=".$row["folio"]."> 
<input type='hidden' name='fecha' value=".$_POST["fini"]."> 
<input type='hidden' name='Comprometido[]'>
<input type='hidden' name='fechafinal' value=".$_POST["finial"]."> 
<input type='hidden' name='centroorigen' value='".$_POST["centroorigen"]."'> 
<input type='hidden' name='producto[]' value='".$row["producto"]."'> 
<input type='hidden' name='capacidad[]' value='".$row["capacidad"]."'> 
<input type='hidden' name='destino[]' value='".$row["destino"]."'> 
<td> <div style='align:center;'> <label>".$row["folio"]."</label> </div></td>

<td> <label style='width:40px;
   height:25px;   align: center;'>".$row["CentroEntrega"]."</label></td>
<td> <div style= '> <label style='  
  height:25px;   align: center;'>".$row["destino"]."</label> </div></td>
<td> <label style='
   height:25px;   align: center;'>".$row["producto"]."</label></td>
<td> <div style='height:12px; '  align='center'> <label style='
  display: inline-block; height:25px;   align: center;'>".$row["presentacion"].".</label> </div></td>
<td> <div style='height:12px; ' align='center'><label style='
  display: inline-block; height:25px;   align: center;'>".$row["turno"]."</label></div> </td>

<td> <label style='
  height:25px;   align: center;'>".$row["medio"]."</label></td>
  
<td> <div style='height:12px; '><label style='
  display: inline-block; height:25px;   align: center;'>".$row["vehiculo"]."</label></div></td>
<td> ";
if($row['entrega'] == 'LAB DESTINO'){
	echo "<div style='height:12px; '><label style='
  display: inline-block; height:25px;   align: center;'>PEMEX LOGISTICA</label></div>";
	
	}
	if($row['entrega'] == 'LAB LLENADERAS'){
		
		echo "<div style='height:12px; '><label style='
  display: inline-block; height:25px;   align: center;'>COMERCIALIZADORA</label></div>";
	}


 
 
echo "</td>
<td> <div  align='center'><label style='
  height:25px;   align: center;'>".$row["tonel"]."</label></div></td>
<td> <label style=' align: center;'>".number_format($row["capacidad"], 0, '.', ',')."</label></td>

<td> <a href='#'> <label style=' align: center;'>".$row["fecha"]."</label> </a>
</td>

<td> 
"; 

           

 $remision = "";
	//get the name of the company out of the id
	$resultttd = "select pdf, fecha, folio, remision from facturas where Nopedido = '".$row["folio"]."' and idempresa='".$row["IdEmpresa"]."'";
 
   $resultx = $connect->query($resultttd);
if ($resultx->num_rows > 0) { 
while($rowwyd = $resultx->fetch_assoc()) {
	$foliof = $rowwyd["folio"];
	$remision = $rowwyd["remision"];
	echo"
				  <a href='uploads/".$rowwyd["pdf"]."'> <label style=' align: center;'>".$rowwyd["fecha"]."</label> </a>

";
}
}else{
	$foliof=0;
}
 


if($row["EstadoAtencion"] != "CANCELADO"){
	$contadorpedidos += 1;
}



echo "
<td> <label style=' align: center;'>".$row["EstadoAtencion"]."</label></td>


<td><div align='center'>";
if($row["Comprometido"]>0){$importe = number_format($row["Comprometido"], 2, '.', ',');
echo "<label>$".$importe."</label>";
echo "<input type='hidden' name='Comprometido[]' value=".$row["Comprometido"]." >";
}
else{
echo " ";
}
echo "
</td>
 </td>

<td>";
if($facturado == 1){
	
	if($remision != ""){
		echo "<a href=".str_replace(" ", "%20", $remision)."><label>Ver</label></a>";
	}else{
		echo "<input type='submit' value='Cargar'>
		<input type='hidden' name='foliofactura' value='".$foliof."'>
		";
		
	}
	
}else{
 
	
}

echo "</td>
 </form>
</tr>"

;
}
echo '
<tr>
<td class="color_blanco" colspan="2">Registros: '.$contador.'</td>
<td class="color_blanco">Pedidos: '.$contadorpedidos.'</td>
<td class="color_blanco"></td><td class="color_blanco"></td><td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco">'.number_format($lit, 0, '.', ',').'
</td>
</tr>

<tr>
<td colspan="16" class="color_blanco"> <button onClick="PdfDownload('.$idtable.')">Exportar a PDF</button>
</td>
</tr>


 <br>


';
} else { echo "0 results"; }

echo'
</table>
</div>
';


}
}
}
	
	
	
	
	
}





}



?>
        
        

	
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">
  
<textarea name="text" hidden cols="80" rows="2" id="txtarea"></textarea><br><br>
 
            
            <input type='submit' onclick='Print(this)' value='Exportar PDF' hidden>
</form>

	
	     
            <br><br>
            
		
			
	</div> 	
		
						
	
	<form action="LoginServlet" method="post">
	</form>
	
	<div id="maincontent"> 
		<table align="center">
			<tr class="link" align="center">		
		
				<td colspan="4" align="center" class="color_blanco"> 
					</td> 
			</tr>
		</table>
        
        
        <br><br>
        
	</div> 



 
</div>



<br><br>


<script>
renderFooter();
</script>

</div>


 <br> <br>
</body>
</html>

  
        <script> 
        
    valoruno = document.getElementById('spTotal').innerHTML;
    valordos = document.getElementById('spTotal').innerHTML;
	
    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
    total = (total == null || total == undefined || total == "") ? 0 : total;
	
    /* Esta es la suma. */
    total = (parseInt(total) + parseInt(valor));
	
    // Colocar el resultado de la suma en el control "span".
    document.getElementById('spTotal').innerHTML = total;
        </script>
        
            <script>
function setInputDate(_id){
    var _dat = document.querySelector(_id);
    var hoy = new Date(),
     
        d = hoy.getDate(),
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


function setInputDatee(_id){
   var _date = document.querySelector(_id);
   var hoye =new Date(new Date().setDate(new Date().getDate() + 7)),
   
     
        de = hoye.getDate() ,
        me = hoye.getMonth()+1,  
        ye = hoye.getFullYear(),
        datae;

    if(de < 10){
        de = "0"+de;
    };
    if(me < 10){
        me = "0"+me;
    };

    datae = de+"/"+me+"/"+ye;
    console.log(datae);
    _date.value = datae;
};


setInputDatee("#dateDefaultfinal");  
     </script>
     
     
     
       <script>
         function Print(){
          
 $('#txtarea').html(document.getElementById('table').outerHTML)
 }
 </script>

<script language="JavaScript" src="scripts/datetime.js"></script>



<script>
	function PdfDownload(filename){ 
    kendo.drawing.drawDOM($("#" + filename.getAttribute("id")))
    .then(function(group){
           return kendo.drawing.exportPDF(
               group,{
                   paperSize:"auto",
                   margin:{
                       left:"1.5cm",
                       right:"1cm",
                       top: "1.5cm",
                       bottom:"2cm"
                   }
               }
           );
    })
    .done(function(data){
       kendo.saveAs({
           dataURI:data,
           fileName:filename.getAttribute("id")
       });
    });
}
	</script>