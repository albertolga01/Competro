	
<?php 
session_start();	
require 'connector.php';
 
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
    <script src="scripts/push.js"></script>
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
    <link rel="icon" href="iconion.ico">

    <SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>
    
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
     
	      <script type="text/JavaScript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>	
    
    

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
    
    <style>
  .sticky{
    position: sticky;
    top: 0;
  }
  </style>
  <!-- 
    <style>
        .table-wrapper {
        width: 100%;
        height: 160px; /* Altura de tabla */
        overflow: auto;
        }

        .table-wrapper table {
        border-collapse: separate;
        border-spacing: 0;
        }

        .table-wrapper table thead {
        position: -webkit-sticky; /* Safari... */
        position: sticky;
        top: 0;
        left: 0;
        }
  </style>
    -->
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
            $("#un").load("controladorad/tppedidos.php");
        </script>
    </p> 
	
	
	

<
</div>



    <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('2d121696457cd9fb762b', {
      cluster: 'us3'
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      //alert(JSON.stringify(data));
	  
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
				
	//  echo "window.location.href='pedidoscnvotradmin';";
	  
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
							 <a class=bold href="#">Programa de entregas interactivo</a>
							
					  </div>

						
				</div>
			
	
			
	
	
 

 
		<div id="maincontent"></div>		
	 
	
	
	  
			
		
	<div id="maincontent" align="center"> 	
       
       
       <form name="forma1" method="post" action="pedidoscnvotradmin">
       
        
        
       	<table align="center" class="parametros">
			<tr>
				<td class="color_blanco"><b>Fecha de entrega:</b></td>
				<td class="color_blanco">
                <?php
				if (isset($_POST['fini'])) {
					 echo '<input type="text" name="fini" value="'.$_POST['fini'].'" id="dateDefaultj">';
				}else{
					 echo '<input type="text" name="fini" value="00/00/0000" id="dateDefault">';
					}
               
				?>
                
				 </td>
                 	
			</tr>
            
           <!-- 
            <tr>
				<td class="color_blanco"><b>Estado de Atención:</b></td>
				<td class="color_blanco">
                <?php
				
				
				
                  echo '<select name="EstadoA" style="width:100%;">';
			if (isset($_POST['EstadoA'])) {	  
	   echo ' <option selected >'.$_POST['EstadoA'].'</option> ';}
	   
				
               
      echo '
       <option value="CONFIRMADO CLIENTE">CONFIRMADO CLIENTE</option>  
	   <option>CONFIRMADO CLIENTE</option>  
      <option>CANCELADO</option>  
      <option>SURTIDO</option> '; 
?>

    </select>
				 </td>
                 
			</tr> -->
             <tr>
				<td class="color_blanco"><b>Seleccione cliente:</b></td>
				<td class="color_blanco">
                <?php
 
$W = "select IdEmpresa, usuario from empresa where tusuario='1'";
  
  
  
    $result = $connect->query($W);
 

    echo "<select name='IdEmpresa' id='IdEmpresa' style='width:100%;'>";
	
	
	if (!empty($_POST['IdEmpresa'])) {	  
	//get nombre cliente out of id 
	
	$resultx = $connect->query("select IdEmpresa, usuario from empresa where       tusuario='1' and idempresa = '".$_POST['IdEmpresa']."'");
	
	 while ($row = $resultx->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['IdEmpresa'];
                  $name = $row['usuario']; 
                  echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';

}
	
	  
	   
	   }else{}
	   
				

    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['IdEmpresa'];
                  $name = $row['usuario']; 
                  echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';

}
echo "<option value='TODOS'>TODOS</option>";
    echo "</select>"; 
?> </td>
			</tr>	
		
          
            
			
		</table>
       
 <br>
            	
            <table align="center">
	    	<tr>
	    	<td align="center" class="color_blanco">
            
            <input type="Submit" value="Continuar" ></td>
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
    
    <div style="width:1060px;">
<table align="center">
<?php 
if(isset($_POST['fini'])){
	
	// style="width:1060px; Overflow-x:scroll;
echo"
<tr><td class='color_blanco' colspan='3'>Fecha: ".$_POST['fini']."</td></tr>
";
}
?>
<tr >
<th class='sticky'height="24" >Folio</th>
<th class='sticky'>Cliente</th>
<th class='sticky'>Centro Entrega</th>
<th class='sticky'>Producto</th>
<th class='sticky'>Estación</th>
<th class='sticky'>Destino</th> 
<th class='sticky'>Fecha</th>
<th class='sticky'>P.</th>
<th class='sticky'>Turno</th>
<th class='sticky'>Medio</th>
<th class='sticky'>Transportista</th>
<th class='sticky'>Capacidad</th> 
<th class='sticky'>Entrega</th> 
<th class='sticky'>Vehiculo</th> 
<th class='sticky'>Chofer</th> 
<th class='sticky'>EstadoAtencion</th>	 
</tr>
 
<?php 
// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

$myDate = date('d/m/Y');		

 $sql="";
				if (isset($_POST['fini']) and isset($_POST['IdEmpresa'])) {
					
				
					
					
					
					if ($_POST['IdEmpresa'] === 'TODOS') { 
					
					$sql = "SELECT t1.folio, t1.IdEmpresa, t2.Nombre, t1.centroentrega, t1.producto, t1.destino, t1.fecha, t1.presentacion, t1.turno, t1.medio, IF(t1.entrega='LAB DESTINO','PEMEX LOGISTICA','COMERCIALIZADORA / FLETERA') as Transportista, t1.capacidad, t1.entrega, t1.vehiculo, t1.chofer, t1.EstadoAtencion FROM pedido t1 inner join destinos t2 on t1.destino = t2.destino where t1.idempresa is not null AND t1.fecha = '".$_POST['fini']."' and t1.EstadoAtencion != 'CALCULADO' group by t1.folio";
				}else {
					
						$sql = "SELECT t1.folio, t1.IdEmpresa, t2.Nombre, t1.centroentrega, t1.producto, t1.destino, t1.fecha, t1.presentacion, t1.turno, t1.medio, IF(t1.entrega='LAB DESTINO','PEMEX LOGISTICA','COMERCIALIZADORA / FLETERA') as Transportista, t1.capacidad, t1.entrega, t1.vehiculo, t1.chofer, t1.EstadoAtencion FROM pedido t1 inner join destinos t2 on t1.destino = t2.destino where t1.idempresa = '".$_POST["IdEmpresa"]."' AND t1.fecha = '".$_POST['fini']."' and t1.EstadoAtencion != 'CALCULADO'group by t1.folio ";
					}
					 
					  
				 

$result = $connect->query($sql);
                
$registros = 0; 

 
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$turno = $row['turno'];
	$registros = $registros + 1;
	$destino = $row['destino'];
echo "<tr> 
<form name='forma' method='post' action='controladorad/updatepedidodadmin.php'> 

 <input type='hidden' name='folio[]' value=".$row["folio"].">
 <input type='hidden' name='presentacion[]' value=".$row["presentacion"].">
 
 <input type='hidden'  name='medio[]' value=".$row["medio"].">
<td height='24'> <div  align='center'><label>".$row["folio"]." </label></div>
</td>
<td>
"; 

	

 

    $resultt = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");
	//get the name of the company out of the id
	$resulttt = $connect->query("select usuario, IdEmpresa from empresa where tusuario='1' and idempresa='".$row["IdEmpresa"]."'");

   
while ($rowwy = $resulttt->fetch_assoc()) {
	
	
	
	
	
	 if(isset($rowwy["IdEmpresa"])){
				  echo"
				  
				  <input type='hidden' name='idempresa[]' value='".$rowwy["IdEmpresa"]."'
				  <div  align='center'><label>".$rowwy["usuario"]."</label></div>
";}else{}
}
    



echo"
</td>
<td> 
 ";
  
 
echo "<select name='centroentrega[]' style='width:155px;'>";

   
	//get nombre cliente out of id 
	$resultx = $connect->query("select folio, centroentrega from centrosentrega where centroentrega != '".$row["centroentrega"]."'");
	echo '<option selected value="'.$row["centroentrega"].'">'.$row["centroentrega"].'</option>';
	 while ($rowi = $resultx->fetch_assoc()) {

                  unset($name); 
                  $name = $rowi['centroentrega']; 
                  echo '<option value="'.$name.'" name="empresa" id="select">'.$name.'</option>';

}
	
	   
    echo "</select>"; 
echo "
</td>
<td > 
 ";
  
 
echo "<select name='producto[]' >";

   
	//get nombre cliente out of id 
	$resultxp = $connect->query("select folio, producto from productos where producto != '".$row["producto"]."'");
	echo '<option selected value="'.$row["producto"].'">'.$row["producto"].'</option>';
	 while ($rowip = $resultxp->fetch_assoc()) {

                  unset($name); 
                  $namep = $rowip['producto']; 
                  echo '<option value="'.$namep.'" name="producto" id="select">'.$namep.'</option>';

}
	
	   
    echo "</select>"; 
echo "
</td>
<td height='24'> <div align='center'><label>".$row["Nombre"]." </label></div>
</td>
<td >";

 

    $resultt = $connect->query("select iddestino, destino from destinos where idempresa= '".$row["IdEmpresa"]."' and destino != '".$row["destino"]."'");

    echo "<select name='destino[]' id='IdEmpresa' style='width:125px;'>";
 echo '<option selected value="'.$row['destino'].'">'.$row["destino"].'</option>';
    while ($roww = $resultt->fetch_assoc()) {

                  unset($id, $name);
                  $id = $roww['iddestino'];
                  $name = $roww['destino']; 
				 
                  echo '<option value="'.$name.'" name="destino" id="select" >'.$name.'</option>';
} 
    echo "</select>"; 


echo "
</td>
<td><div  align='center'><input type='text' name='fecha[]'  style='width:70px;' value='".$row["fecha"]."'  ></div>
 </td>
<td > 
<div  align='center'><label>".$row["presentacion"]."</label></div>
</td>
<td> <select  name='turno[]' style='width:30px<;'>  
<option selected value=".$row['turno'].">Turno ".$row["turno"]."</option>
<option value='1'>Turno 1</option> <option value='2'>Turno 2</option>    </select></td>
<td> 

<div  align='center'><label>AT</label></div>

</td>
<td> 
<div  align='center'><label>".$row["Transportista"]." </label></div></td>
<td> 
<select name='capacidad[]'>
<option selected value=".$row["capacidad"].">".$row["capacidad"]."</option>
<option>40000</option> 
<option>32000</option> 
<option>31500</option>   
<option>30000</option>   
<option>25000</option> 
<option>20000</option>  
<option>15000</option>  
<option>10000</option> 
</select>
</td>
<td> 
<select name='entrega[]'>
<option selected>".$row["entrega"]."</option>
<option>LAB DESTINO</option>  
<option>LAB LLENADERAS</option>  
</select>
</td>
<td >";

if($row["entrega"]== 'LAB LLENADERAS'){

 
    $resultt = $connect->query("select idvehiculo, vehiculo from vehiculos where idempresa= '".$row["IdEmpresa"]."' ");

    echo "<select name='vehiculo[]' style='width:65px;'>";
 echo '<option selected value='.$row["vehiculo"].'>'.$row["vehiculo"].'</option>';
    while ($roww = $resultt->fetch_assoc()) {

                  unset($id, $name);
                  $id = $roww['idvehiculo'];
                  $name = $roww['vehiculo']; 
				 
                  echo '<option value="'.$name.'" >'.$name.'</option>';
} 
    echo "</select>"; 
}else{
	
	 echo '<input name="vehiculo[]" type="hidden" value=""></option>';
	}




echo "
</td>
<td style='width:180px;'>";
if($row["entrega"]== 'LAB LLENADERAS'){

 
    $resultt = $connect->query("select idchofer, nombre from choferes where idempresa= '".$row["IdEmpresa"]."' ");

    echo "<select name='chofer[]' id='choferlista' style='width:120px;' >";
 echo '<option selected value="'.$row["chofer"].'">'.$row["chofer"].'</option>';
    while ($roww = $resultt->fetch_assoc()) {

                  unset($id, $name);
                  $id = $roww['idchofer'];
                  $name = $roww['nombre']; 
				 
                  echo '<option value="'.$name.'" name="chofer" id="select" >'.$name.'</option>';
} 
    echo "</select>"; 

} else {
	 echo '<input name="chofer[]" type="hidden" value=""></option>';
	}
echo "
</td>


<td>
<select name='estadoatencion[]'>
<option selected >".$row["EstadoAtencion"]."</option>  
<option>PROGRAMADO</option>  
<option>CARGANDO</option>  
<option>FACTURADO</option>  
<option>CANCELADO</option>  
</select>
  

 
</tr>";
}

echo "

   <tr><td colspan='16'>
<input type='submit' name='dos' value='Actualizar'></td>
  
</form>
";


if (isset($_POST['fini'])) {
echo "
<tr>
<form name='formaagregar' method='post' action='pedidoscnvotrr'> 
<input type='hidden' name='fini' value ='".$_POST['fini']."' size='4' readonly > 
<td><input type='hidden' name='folio' value ='' size='4' readonly ></td>
<input type='hidden' name='medio' value ='AUTOTANQUE' size='4' readonly >

<td>";

 

    $resultt = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");

    echo "<select name='idempresa' id='sel' onchange='doThisOnChange(this.value)' style='width:100px;'>";
	//if ($_POST['IdEmpresa'] === '0') { 
 
//	}else {
		
		
		//}
    while ($roww = $resultt->fetch_assoc()) {

                  unset($id, $name);
                  $id = $roww['IdEmpresa'];
                  $name = $roww['usuario']; 
				
                  echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';
				    

} 
    echo "</select>"; 


echo"
</td>
<td> 
 ";
  
 
echo "<select name='CentroEntrega' style='width:155px;'>";

   
	//get nombre cliente out of id 
	$resultx = $connect->query("select folio, centroentrega from centrosentrega");
	
	 while ($rowi = $resultx->fetch_assoc()) {

                  unset($name); 
                  $name = $rowi['centroentrega']; 
                  echo '<option value="'.$name.'" name="empresa" id="select">'.$name.'</option>';

}
	
	   
    echo "</select>"; 
echo "
</td>
<td>
<select name='producto'   style='width:120px' hidden>
<option selected  value> Seleccione Producto 
      <option>GASOLINA 87 OCT</option> 
      <option>GASOLINA 91 OCT</option>
      <option>DIESEL</option>
    </select>
</td>
<td><input type='text' name='a' value='a' hidden></td>
<td>";
 
    $resultt = $connect->query("select iddestino, destino from destinos  ");

    echo "<select name='destino' id='destinoss' style='width:125px;' hidden>";
 echo '<option selected value='.$row['destino'].'>'.$row["destino"].'</option>';
 echo '<option selected> Seleccione </option>';
    while ($roww = $resultt->fetch_assoc()) {
                  unset($id, $name);
                  $id = $roww['iddestino'];
                  $name = $roww['destino']; 
				 
}  echo "</select>"; 
echo "
</td>
<td>
<input type='hidden' name='fechaa'  value='".$_POST['fini']."' >
<div  align='center '><label hidden>".$_POST['fini']." </label></div>
</td>
<td> 
<div  align='center'><label hidden>M3</label></div>
</td>
<td>
<select name='turno'   style='width:100%;' hidden>
<option selected  >  	
      <option>1</option> 
      <option>2</option> 
    </select>

</td>
<td>

</td>
<td>

</td> 
<td>
<select name='capacidad'  style='width:100%;' hidden>
<option selected  >     </option>
<option>32000</option> 
<option>31500</option>  
<option>30000</option>  
<option>25000</option>  
<option>20000</option>  
<option>15000</option>  
<option>10000</option> 	
    </select>
</td> 
<td> 
<select name='entrega' onchange='Entrega(this.value)' style='120px;' hidden>
<option selected> Seleccione </option>
<option>LAB DESTINO</option>  
<option>LAB LLENADERAS</option>  
</select>
</td>
<td>
<select hidden name='vehiculo'  id='vehiculos' style='width:65px;'>
</select>
</td>
<td style='width:180px;'>
<select hidden name='chofer' id='choferes' style='width:120px;'>
</select>
</td>

<td><input type='hidden' name='estadoatencion' value ='' size='20' readonly  >
</tr>
<tr>
</td> 
<td colspan='16'><input type='Submit' value=' Agregar  '></td>

</form>
</tr>


";
}

echo "
<tr>
<td class='color_blanco'>Registros: 
".$registros."
</td>
</tr>
";





echo "</table>";
} else { echo "0 results"; 



if (isset($_POST['fini'])) {
					
echo "
<tr>
<form name='formaagregar' method='post' action='pedidoscnvotrr'> 
<input type='hidden' name='fini' value ='".$_POST['fini']."' size='4' readonly > 
<input type='hidden' name='fecha' value ='".$_POST['fini']."' size='4' readonly >
<td><input type='hidden' name='folio' value ='' size='4' readonly ></td>
<input type='hidden' name='medio' value ='AUTOTANQUE' size='4' readonly >

<td>";

 
    $resultt = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");

    echo "<select name='idempresa' id='sel' onchange='doThisOnChange(this.value)' style='width:100px;'>";
	//if ($_POST['IdEmpresa'] === '0') { 
 
//	}else {
		
		
		//}
    while ($roww = $resultt->fetch_assoc()) {

                  unset($id, $name);
                  $id = $roww['IdEmpresa'];
                  $name = $roww['usuario']; 
				
                  echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';
				    

} 
    echo "</select>"; 


echo"
</td>
<td> 
 ";
  
 
echo "<select name='CentroEntrega'>";

   
	//get nombre cliente out of id 
	$resultx = $connect->query("select folio, centroentrega from centrosentrega");
	
	 while ($rowi = $resultx->fetch_assoc()) {

                  unset($name); 
                  $name = $rowi['centroentrega']; 
                  echo '<option value="'.$name.'" name="empresa" id="select">'.$name.'</option>';

}
	
	   
    echo "</select>"; 
echo "
</td>
<td>
<select name='producto' style='width:120px' hidden>
<option selected  value> Seleccione Producto 
      <option>GASOLINA 87 OCT</option> 
      <option>GASOLINA 91 OCT</option>
      <option>DIESEL</option>
    </select>
</td>
<td><input type='text' name='a' value='a' hidden></td>
<td>";

    $resultt = $connect->query("select iddestino, destino from destinos  ");

    echo "<select name='destino' id='destinoss' style='width:150px;' hidden>";
 echo '<option selected value='.$row['destino'].'>'.$row["destino"].'</option>';
 echo '<option selected> Seleccione </option>';
    while ($roww = $resultt->fetch_assoc()) {
                  unset($id, $name);
                  $id = $roww['iddestino'];
                  $name = $roww['destino']; 
				 
}  echo "</select>"; 
echo "
</td>
<td>
<input type='hidden' name='fecha' value='".$_POST['fini']."'>
<div  align='center'><label hidden>".$_POST['fini']." </label></div>
</td>
<td> 
<div  align='center'><label hidden>M3</label></div>
</td>
<td>
<select name='turno'  style='width:100%;' hidden>
<option selected  >  	
      <option>1</option> 
      <option>2</option> 
    </select>

</td>
<td>

</td>
<td>

</td> 
<td>
<select name='capacidad' style='width:100%;' hidden>
<option selected  >     </option>
<option>32000</option>  
<option>31500</option>  
<option>30000</option>   
<option>25000</option> 
<option>20000</option>  
<option>15000</option>  
<option>10000</option> 
    </select>
</td> 
<td> 
<select name='entrega' onchange='Entrega(this.value)' style='120px;' hidden>
<option selected> Seleccione </option>
<option>LAB DESTINO</option>  
<option>LAB LLENADERAS</option>  
</select>
</td>
<td>
<select hidden name='vehiculo'  id='vehiculos' style='width:65px;'>
</select>
</td>
<td style='width:180px;'>
<select hidden name='chofer' id='choferes' style='width:120px;'>
</select>
</td>

<td><input type='hidden' name='estadoatencion' value ='' size='20' readonly  ></td> 
<tr>
</td> 
<td colspan='16'><input type='Submit' value=' Agregar  '></td>

</form>
</tr>


";				}






}
				}
$connect->close();



?>
</table>
    </div>
    
		
            	
            
            
            
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
<!-- script destinos -->
  <script>
 doThisOnChange = function(value, optionIndex)
    { 
 var selectElement = document.getElementById("destinoss");
 while (selectElement.options.length > 0) {                
        selectElement.remove(0);
    }  
	var data = new FormData(); 
    var ajax = new XMLHttpRequest();  
	ajax.open("GET", "data/data.php?value="+value,true);
	ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            //console.log(data);

            var html = '';
            for(var a = 0; a < data.length; a++) {
                //var firstName = data[a].iddestino;
                var lastName = data[a].destino; 
                
                selectElement.add(new Option(lastName)); 

            }
            document.getElementById("data").innerHTML += html;
        }
        
        
       
    };
	 doThisOnChangeC(value);
		 doThisOnChangeV(value);
}



</script>





<script>
  

 doThisOnChangeV = function(value)
    { 
 var selectElement = document.getElementById("vehiculos");
    
 
 
 
 while (selectElement.options.length > 0) {                
        selectElement.remove(0);
    }  


	var data = new FormData(); 
    var ajaxt = new XMLHttpRequest();
	  
	ajaxt.open("GET", "data/datavehiculo.php?value="+value,true);
	ajaxt.send();

    ajaxt.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);

            var html = '';
            for(var a = 0; a < data.length; a++) {
                //var firstName = data[a].iddestino;
                var lastName = data[a].vehiculo;  
                selectElement.add(new Option(lastName)); 

            }
            document.getElementById("data").innerHTML += html;
        }
        
        
    };
}

</script>
  

  
  
   <script>
  

 doThisOnChangeC = function(value)
    { 
 var selectElement = document.getElementById("choferes");
 while (selectElement.options.length > 0) {                
        selectElement.remove(0);
    }  
	var data = new FormData(); 
    var ajaxx = new XMLHttpRequest();
	ajaxx.open("GET", "data/datachofer.php?value="+value,true);
	ajaxx.send();


    ajaxx.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            //console.log(data);

            var html = '';
            for(var a = 0; a < data.length; a++) {
                //var firstName = data[a].iddestino;
                var lastName = data[a].nombre; 
                
                selectElement.add(new Option(lastName)); 

            }
            document.getElementById("data").innerHTML += html;
        }
        
        
    };
}

</script>



<script>

Entrega = function(value, optionIndex){
	 
  if(value == "LAB LLENADERAS" ){ 
  
 
   
    document.getElementById('vehiculos').style.display = 'block';
       document.getElementById('choferes').style.display = 'block';

    
    }
    if(value == "LAB DESTINO"){
   
   document.getElementById('vehiculos').style.display = 'none';
       document.getElementById('choferes').style.display = 'none';
    }
    
	}
</script>
  
  
  
  
  <!--
  <script>
  

 doThisOnChangeV = function(value, optionIndex)
    { 
    
     var selectElementv = document.getElementById("vehiculos");
     
     
    if(value == "LAB LLENADERAS" ){ 
   
    document.getElementById('vehiculos').style.display = 'block';
       document.getElementById('choferes').style.display = 'block';

    
    }
    if(value == "LAB DESTINO"){
   
   document.getElementById('vehiculos').style.display = 'none';
       document.getElementById('choferes').style.display = 'none';
    }
    
   
        while (selectElementv.options.length > 0) {                
        selectElementv.remove(0);
    }  
   var data = new FormData(); 
    var ajax = new XMLHttpRequest();
	  
	ajax.open("GET", "data/datavehiculo.php?value="+value,true);
	ajax.send();


    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);

            var html = '';
            for(var av = 0; av < data.length; av++) { 	
                var lastNamev = data[av].vehiculo; 
                
                selectElementv.add(new Option(lastNamev)); 

            }
            document.getElementById("data").innerHTML += html;
        }
    };
}

</script>
  
  
  
    script choferes -->
 <!-- <script>
 doThisOnChangeC = function(value, optionIndex)
    { 
 var selectElement = document.getElementById("choferes");
 while (selectElement.options.length > 0) {                
        selectElement.remove(0);
    }  


	var dataa = new FormData(); 
    var ajax = new XMLHttpRequest();
	  
	ajax.open("GET", "data/datachofer.php?value="+value,true);
	ajax.send();


    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
         
			alert(data.length);

            var html = '';
            for(var a = 0; a < data.length; a++) { 
                var lastName = data[a].nombre; 
                alert(a);
                selectElement.add(new Option(lastName)); 
				
            }
            document.getElementById("data").innerHTML += html;
        }
    };
}

</script> -->
 
  

<br><br>


<script>
renderFooter();
</script>

</div>

<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-1023102-17");
pageTracker._trackPageview();
} catch(err) {}</script>


<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>

</body>
</html>

<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->
    
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
setInputDate("#k");    
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
  </script>	<?php 
	 
	 if(isset($_POST["mensaje"]))
	 {
		echo "<script>window.alert('".$_POST['mensaje']."');</script>";
		 }else{  }
		 
		 
		 ?>
