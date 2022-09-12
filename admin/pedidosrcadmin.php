
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
    
	<script src="scripts/push.js"></script>
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>

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

<!-- <div id="eNacional"><a href="http://www.energia.gob.mx/" target="_blank" title="Secretar&iacute;a de Energ&iacute;a">Secretar&iacute;a de Energ&iacute;a</a></div> -->  
<div id="PEMEX"></div> 



<div id="utils">  <ul id="nav2"> 	<li class="bar"><a href="InteresesMoratoriosad" class="baritem first">Intereses Moratorios</a></li>  	<li class="bar"><a href="Manual Competro Usuario.pdf" class="baritem first">Manual de Usuario</a></li>	<li class="bar"><a href="menu_cteadmin" class="baritem first">Inicio</a></li>
    <!-- mete codigo de comunicados, pizarrion de avisos y seleccione el cliente--> 
	
  		<li class="barlast"><span>&nbsp;</span></li>
	</ul>
</div>

<div id="cliente">
 
     <p class="textoEjecutivo" align="center" id="un">
    
  
 
 <script type="text/JavaScript">
            $("#un").load("controladorad/tpreporteei.php");
        </script>
        
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
	  echo "window.location.href='../index';";
				}  
				
				if (isset($_POST["fini"])) {
			}else{
				
	//  echo "window.location.href='pedidoscadmin.php';";
				}  
?>}
</script>

<!-- FIN DEL ENCABEZADO --> 


	


	


	<!--Ruteo de la página-->
	
		  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					 
							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;<a  href="#" > Reporte del programa de entregas de producto</a>
							
							
					  </div>

						
				</div>
			
	
			
	
	
 

 
	
	
	  
			
		
	<div id="maincontent" align="center"> 	
       <br><br>
       
       <form name="forma1" method="post" action="pedidosrcadmin.php">
       
       
       <?php
 
 
?>
       
       
       	<table align="center" class="parametros">
			<tr>
				<td class="color_blanco"><b>Fecha Inicial:</b></td>
				<td class="color_blanco">
                
                <?php 
				if(isset($_POST['fini'])){
					 echo '<input type="text" value= "'. $_POST['fini'].'" name="fini" id="dateDefaultj">';
					}else{
						 echo '<input type="text" value= "00/00/0000" name="fini" id="dateDefault">';
						}
				 ?>
                </td>
				 
			</tr>
          <tr>
				<td class="color_blanco"><b>Fecha Final:</b></td>
				<td class="color_blanco">
                
                <?php 
				if(isset($_POST['finial'])){
					$fecha = $_POST['finial'];  echo '<input type="text" value= "'. $_POST['finial'].'" name="finial" id="dateDefaultfinalj">'; 
					}else{
					  echo '<input type="text" value= "00/00/0000" name="finial" id="dateDefaultfinal">'; 
						}
				?>
                </td>
				 
			</tr>
            
            <tr>
				<td class="color_blanco"><b>Seleccione cliente:</b></td>
				<td class="color_blanco">
                <?php


    $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");

    echo "<select name='IdEmpresa' id='IdEmpresa' style='width:100%;'>";
	
	if (isset($_POST['IdEmpresa'])) {	  
	//get nombre cliente out of id 
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
    echo "</select>"; 
?> 


</td>
			</tr>
			
			
             <tr class="color_non"> 
           <td class="color_blanco"><b>Tipo Proceso:</b></td>		
				<td colspan="1" class="color_blanco">
					<select name="tipo">
                        <?php echo '<option selected value= "'.$_POST['tipo'].'" >'; 
						if(isset($_POST['Semana'])){
							echo ''.$_POST['tipo'].'';
							echo '
								<option    value= "Semanal" >Semanal</option>
                         <option  value= "Diario" >Diario</option>
								';
							}else{
								echo '
								<option   selected value= "Semanal" >Semanal</option>
                         <option  value= "Diario" >Diario</option>
								';
								}
				   ?> 
						
					</select>
				</td>
                </tr>
			
		</table>
       
       
        <table align="center">
        <br> 
    	  <tr >
	    	<td align="center"class="color_blanco">
            
            <input type="Submit" value="Continuar" ></td>
    	  </tr>
    	  </table>	
  
        <br>
      </form>
 
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
    
<!-- quité columna actualizar y botton -->
<?php

if (isset($_POST['tipo'])) {

$tipo = $_POST['tipo'];		

if($tipo === 'Diario'){
	echo '<div style="width:1060px; Overflow-x:scroll;">
<table align="center" id="table">
<td class="color_blanco">
<b style="align: left;"> Fecha programada: </b> 
<br>
<b>'.$_POST['fini'].'</b>
</td>
<tr>
<th style="height:25px;">Centro Entrega</th>
<th>Empresa</th>
<th>Folio</th>
<th>Producto</th>
<th>Presentacion</th>
<th>Estación</th>
<th>Destino</th>
<th>Fecha</th>
<th >Turno</th>
<th >Vehículo</th>
<th >Tonel</th>
<th>Medio</th>
<th>Transportista</th>
<th>Capacidad</th>
<th>Entrega</th>
<th>EstadoAtencion</th>

</tr>
';
$CapacidadFinal;

 
$IdEmpresa = $_POST['IdEmpresa']; 
$Fecha = $_POST['fini'];  
if ($connect->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if ($IdEmpresa == 'TODOS') {
  $sql = "Select t1.folio,  t2.usuario as idempresa, t1.CentroEntrega, t1.producto, t3.Nombre, t1.destino, t1.fecha, t1.presentacion, t1.turno, t1.medio, t1.Transportista, t1.capacidad, t1.entrega, t1.vehiculo, t1.tonel,  t1.EstadoAtencion, (select sum(capacidad) as total from pedido where   fecha = '".$Fecha."' ) as cap, (select count(folio) as totall from pedido where  fecha = '".$Fecha."' ) as reg from pedido t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa inner join destinos t3 on t1.destino = t3.destino  where fecha = '".$Fecha."' and EstadoAtencion != 'CALCULADO' order by destino";
}else{
	
$sql = "SELECT t1.folio,  t2.usuario as idempresa, t1.CentroEntrega, t1.producto, t3.Nombre,  t1.destino, t1.fecha, t1.presentacion, t1.turno, t1.medio, t1.Transportista, t1.capacidad, t1.tonel,  t1.entrega, t1.vehiculo, t1.chofer, t1.EstadoAtencion, (select sum(capacidad) as total from pedido where idEmpresa = '".$IdEmpresa."' and fecha = '".$Fecha."' ) as cap, (select count(folio) as totall from pedido where idEmpresa = '".$IdEmpresa."' and fecha = '".$Fecha."' ) as reg FROM pedido  t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa inner join destinos t3 on t1.destino = t3.destino where t1.idEmpresa = '".$IdEmpresa."' and fecha = '".$Fecha."'  and EstadoAtencion != 'CALCULADO' order by destino";
}


$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$capp = $row["cap"];
$CapacidadFinal = number_format($capp, 2, '.', ',');
$registros = $row["reg"];
$capacidad = number_format($row["capacidad"], 2, '.', ',');
echo "<tr>
<form name='forma' method='post' action='ActualizarPedido.php'> 
<td> <div style='height:12px; '> <label style='width:130px;
  display: inline-block; height:25px;   align: center;'>".$row["CentroEntrega"]."</label> </div></td>
   <td> <label style='width:40px;
   height:25px;   align: center;'>".$row['idempresa']."</label></td>
<td> <label style='width:40px;
   height:25px;   align: center;'>".$row["folio"]."</label></td>
  
<td> <div style='height:12px; '> <label style='width:110px; display: inline-block; 
  height:25px;   align: center;'>".$row["producto"]."</label> </div></td>
<td> <div align='center'><label>".$row["presentacion"]."</label></div></td>
<td> <div style='height:12px; '> <label style='width:80px;
  display: inline-block; height:25px;   align: center;'>".$row["Nombre"]."</label> </div></td>
<td> <div style='height:12px; '> <label style='width:120px;
  display: inline-block; height:25px;   align: center;'>".$row["destino"]."</label> </div></td>
<td> <div style='height:12px; '><label style='
  display: inline-block; height:25px;   align: center;'>".$row["fecha"]."</label></div> </td>

<td> <label style='
  height:25px;   align: center;'>".$row["turno"]."</label></td>
  <td><div style='height:12px; '><label style='width:60px;
  display: inline-block; height:25px;   align: center;'>".$row["vehiculo"]."</label></div></td>
  <td> <label style='
  height:25px;   align: center;'>".$row["tonel"]."</label></td> 
<td> <div style='height:12px; '><label style='width:100px;
  display: inline-block; height:25px;   align: center;'>".$row["medio"]."</label></div></td>
<td>";

if($row["entrega"] === 'LAB DESTINO' ){
	echo " <div style='height:12px; '><label style='width:127px;
  display: inline-block; height:25px;   align: center;'>PEMEX</label></div> ";
	}
	
	if($row["entrega"] == 'LAB LLENADERAS' ){
	echo " <div style='height:12px; '><label style='width:100px;
  display: inline-block; height:25px;   align: center;'>COMERCIALIZADORA</label></div> ";
	}

  echo"</td>
<td> <label style='
  height:25px;   align: center;'>".$capacidad."</label></td>
  <td> <div style='height:12px;'><label style='width:90px;
  display: inline-block; height:25px;   align: center;'>".$row["entrega"]."</label></div></td>
<td> <label style='width:130px;
  display: inline-block; height:25px;   align: center;'>".$row["EstadoAtencion"]."</label></td>


 </form></tr>"

;
}
echo '

<td class="color_blanco"  style="background-color: white;">
<b id="val" 	style="align: left;">Registros: '.$registros.'</b>  
</td>

<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"  style="background-color: white;">
<b id="val" 	style="align: left;">'.$CapacidadFinal.'</b> 

</td>
 

';
} else { echo "0 results"; }
$connect->close();
echo'
</table>
</div>

';
}




if($tipo === 'Semanal'){
	 
$IdEmpresa = $_POST['IdEmpresa']; 
$Fecha = $_POST['fini']; 
$inicial = $_POST['fini'];
$final = $_POST['finial'];


if ($connect->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 
if($IdEmpresa== 'TODOS'){ 
	$sqld = "select fecha, count(folio) as tred, sum(capacidad) as tcap from pedido where STR_TO_DATE(fecha, '%d/%m/%Y') >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y') and EstadoAtencion != 'CALCULADO' group by fecha ";

 $sqldos = "select fecha, count(folio) as tred, sum(capacidad) as tcap from pedido where STR_TO_DATE(fecha, '%d/%m/%Y') >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y') and EstadoAtencion != 'CALCULADO'";
		 
  $resultdos = $connect->query($sqldos);
if ($resultdos->num_rows > 0) {
// output data of each row
while($rowdos = $resultdos->fetch_assoc()) {
$TREG = $rowdos["tred"];
$TCAP =  $rowdos["tcap"]; 
}
}


	}else{
		
		$sqld = "select fecha, count(folio) as tred, sum(capacidad) as tcap from pedido where STR_TO_DATE(fecha, '%d/%m/%Y') >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y') and IdEmpresa = '".$IdEmpresa."' and EstadoAtencion != 'CALCULADO' group by fecha order by STR_TO_DATE(fecha, '%d/%m/%Y') asc";
		
		$sqldos = "select fecha, count(folio) as tred, sum(capacidad) as tcap from pedido where STR_TO_DATE(fecha, '%d/%m/%Y') >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y')and EstadoAtencion != 'CALCULADO' and IdEmpresa = '".$IdEmpresa."' group by fecha order by STR_TO_DATE(fecha, '%d/%m/%Y') asc";
		
		
		 
  $resultdos = $connect->query($sqldos);
if ($resultdos->num_rows > 0) {
// output data of each row
while($rowdos = $resultdos->fetch_assoc()) {
$TREG = $rowdos["tred"];
$TCAPP =  $rowdos["tcap"]; 
$TCAP = number_format($TCAPP, 2, '.', ',');
}
}

		}
		
		
	

$resultd = $connect->query($sqld);
if ($resultd->num_rows > 0) {
// output data of each row
while($rowd = $resultd->fetch_assoc()) {
	 
	
	
	
	//Get count and then a cycle
	
	//table 
		echo '<div style="width:1060px; Overflow-x:scroll;">
<table align="center">
<td class="color_blanco">
<b style="align: left;"> Fecha programada: </b> 
<br>
<b>'.$rowd["fecha"].'</b>
</td>

<tr>
<th style="height:25px;">Centro Entrega</th>
<th>ID Empresa</th>
<th>Folio</th>
<th>Producto</th>
<th>Presentacion</th>
<th>Estación</th>
<th>Destino</th>
<th>Fecha</th>
<th >Turno</th>
<th >Vehículo</th>
<th >Tonel</th>
<th>Medio</th>
<th>Transportista</th>
<th>Capacidad</th>
<th>Entrega</th>
<th>EstadoAtencion</th>

</tr>
';
 
$IdEmpresa = $_POST['IdEmpresa']; 
$Fecha = $_POST['fini'];  

if ($connect->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if ($IdEmpresa == 'TODOS') {
  $sql = "SELECT t1.folio, t2.usuario as idempresa, t1.CentroEntrega, t1.producto, t3.Nombre, t1.destino, t1.fecha, t1.presentacion, t1.turno, t1.vehiculo, t1.tonel,  t1.medio, t1.Transportista, t1.capacidad, t1.vehiculo, t1.entrega, t1.EstadoAtencion,  (select sum(capacidad) as total from pedido where  fecha = '".$rowd["fecha"]."' ) as cap, (select count(folio) as totall from pedido where   fecha = '".$rowd["fecha"]."' ) as reg FROM pedido t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa  inner join destinos t3 on t1.destino = t3.destino where  fecha = '".$rowd["fecha"]."'  and EstadoAtencion != 'CALCULADO'  order by destino ";
}else{
	
$sql = "SELECT t1.folio, t2.usuario as idempresa, t1.CentroEntrega, t1.producto, t3.Nombre, t1.destino, t1.fecha, t1.presentacion, t1.turno, t1.vehiculo, t1.tonel,  t1.medio, t1.Transportista, t1.capacidad, t1.vehiculo, t1.entrega, t1.EstadoAtencion,  (select sum(capacidad) as total from pedido where idEmpresa = '".$IdEmpresa."' and fecha = '".$rowd["fecha"]."' ) as cap, (select count(folio) as totall from pedido where idEmpresa = '".$IdEmpresa."' and fecha = '".$rowd["fecha"]."' ) as reg FROM pedido t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa  inner join destinos t3 on t1.destino = t3.destino where t1.idEmpresa = '".$IdEmpresa."' and fecha = '".$rowd["fecha"]."' and EstadoAtencion != 'CALCULADO'  order by destino";
}
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$CapacidadFinal = $row["cap"];
$capa = number_format($CapacidadFinal, 2, '.', ',');
$registros = $row["reg"];
$capacidad = number_format($row["capacidad"], 2, '.', ',');
echo "<tr>
<form name='forma' method='post' action='ActualizarPedido.php'> 
<td> <div style='height:12px; '> <label style='width:130px;
  display: inline-block; height:25px;   align: center;'>".$row["CentroEntrega"]."</label> </div></td>
   <td> <label style='width:40px;
   height:25px;   align: center;'>".$row["idempresa"]."</label></td>
<td> <label style='width:40px;
   height:25px;   align: center;'>".$row["folio"]."</label></td>
  
<td> <div style='height:12px; '> <label style='width:110px; display: inline-block; 
  height:25px;   align: center;'>".$row["producto"]."</label> </div></td>
<td><div align='center'> <label>".$row["presentacion"]."</label></div></td>
<td> <div style='height:12px; '> <label style='width:80px;
  display: inline-block; height:25px;   align: center;'>".$row["Nombre"]."</label> </div></td>
<td> <div style='height:12px; '> <label style='width:120px;
  display: inline-block; height:25px;   align: center;'>".$row["destino"]."</label> </div></td>
<td> <div style='height:12px; '><label style='
  display: inline-block; height:25px;   align: center;'>".$row["fecha"]."</label></div> </td>

<td> <label style='
  height:25px;   align: center;'>".$row["turno"]."</label></td>
  <td><div style='height:12px; '><label style='width:60px;
  display: inline-block; height:25px;   align: center;'>".$row["vehiculo"]."</label></div></td>
  <td> <label style='
  height:25px;   align: center;'>".$row["tonel"]."</label></td> 
<td> <div style='height:12px; '><label style='width:100px;
  display: inline-block; height:25px;   align: center;'>".$row["medio"]."</label></div></td>
<td>";

if($row["entrega"] === 'LAB DESTINO' ){
	echo " <div style='height:12px; '><label style='width:127px;
  display: inline-block; height:25px;   align: center;'>PEMEX</label></div> ";
	}
	
	if($row["entrega"] == 'LAB LLENADERAS' ){
	echo " <div style='height:12px; '><label style='width:100px;
  display: inline-block; height:25px;   align: center;'>COMERCIALIZADORA</label></div> ";
	}

  echo"</td>
<td> <label style='
  height:25px;   align: center;'>".$capacidad."</label></td>
  <td> <div style='height:12px;'><label style='width:90px;
  display: inline-block; height:25px;   align: center;'>".$row["entrega"]."</label></div></td>
<td> <label style='width:130px;
  display: inline-block; height:25px;   align: center;'>".$row["EstadoAtencion"]."</label></td>


 </form>
</tr>


"
;
}
echo "
<tr>

<td class='color_blanco'  style='background-color: white;'>
<b id='val' 	style='align: left;'>Registros: ".$registros."</b> 

</td>

<td class='color_blanco' style='background-color: white;'></td>
<td class='color_blanco' style='background-color: white;'></td>
<td class='color_blanco' style='background-color: white;'></td>
<td class='color_blanco' style='background-color: white;'></td>
<td class='color_blanco' style='background-color: white;'></td>
<td class='color_blanco' style='background-color: white;'></td>
<td class='color_blanco' style='background-color: white;'></td>
<td class='color_blanco' style='background-color: white;'></td>
<td class='color_blanco' style='background-color: white;'></td>
<td class='color_blanco' style='background-color: white;'></td>
<td class='color_blanco' style='background-color: white;'></td>
<td class='color_blanco' style='background-color: white;'></td>
<td class='color_blanco'  style='background-color: white;'>
<b id='val' 	style='align: left;'>".$capa."</b> 

</td>
</tr>
</table>

";
} else { echo "0 results"; }

echo'
</table>
</div>
<br><br><br>

';


	
	
}		


echo '
</table>
<table>
<td class="color_blanco"  style="background-color: white; font-weight: bold;"
<b id="val" 	style="align: left;"> Total Registros: '.$TREG.      '    </b> 
</td>
<td class="color_blanco"  style="background-color: white; font-weight: bold;"
<b id="val" 	style="align: left;"> Total Litros: '.$TCAP.'</b> 
</td>
</table>';


} else { echo "0 results"; }
$connect->close();

	}
	
	
					
}


?>
    
                                                                                              
            <br><br>
            
		
			
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


 <br> <br>
	</body>
</html>
    
    
    <script>
            function Hola(){
            var table = document.getElementById("table"), sumVal = 0;
            
            for(var i = 2; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseInt(table.rows[i].cells[10].innerHTML);
                alert(parseInt(table.rows[i].cells[10].innerHTML).value);
                
                if(cls[i].className == "capacidad"){
                sumVal += isNaN(cls[i].innerHTML) ? 0 : parseInt(cls[i].innerHTML);
    }
            }
            
            document.getElementById("val").innerHTML = "Sum = " + sumVal;
            console.log(sumVal);
            }
            
        </script>
        
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
    var pusher = new Pusher('2d121696457cd9fb762b', {
      cluster: 'us3'
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
	  var a = data.Mensaje;
	  var b = data.Usuario;
	  Push.create("Notificación: ", {
    body: a + " Cliente: " + b,
    icon: 'img/icon.png',
    timeout: 5000,
    onClick: function () {
        window.focus();
        this.close();
    }
});
    });
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
setInputDate("#dateDefaultfinal");   
     </script>
     