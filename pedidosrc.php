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
	<script src="https://www.google.com/recaptcha/api.js"></script>		
    
    
<link rel="icon" href="img/favicon.ico"> <link rel="stylesheet" href="styles/calendario.css">
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
</head>


<body class="body" onload="logout()">
	<div id="extra">&nbsp;</div>

<div id="page">

<div id="header">

<!-- <div id="eNacional"><a href="http://www.energia.gob.mx/" target="_blank" title="Secretar&iacute;a de Energ&iacute;a">Secretar&iacute;a de Energ&iacute;a</a></div> -->  
<div id="PEMEX"></div> 



<div id="utils">
  <ul id="nav2">
	<li class="bar"><a href="menu_cte" class="baritem first">Inicio</a></li>
    <!-- mete codigo de comunicados, pizarrion de avisos y seleccione el cliente--> 
	
  		<li class="barlast"><span>&nbsp;</span></li>
	</ul>
</div>

<div id="cliente">

<p class="textoEjecutivo" align="center"  id="un"> 
    
     
   
  
<script type="text/JavaScript">
            $("#un").load("controlador/tpreportepe.php");
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
				
	//  echo "window.location.href='pedidoscnvo.php';";
				}  
?>}
</script>
	


	<!--Ruteo de la página-->
	
		 	  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="#" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Reporte Programa de Entregas Interactivo</a>
							
					  </div>

						
				</div>

	<div id="maincontent" align="center"> 	
       
       
       <form name="forma1" method="post" action="pedidosrc.php"> 
       	<table align="center" class="parametros">
			<tr>
				<td class="color_blanco"><b align="right">Fecha Inicial:</b></td>
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
				<td  class="color_blanco"><b>Fecha Final:</b></td>
				<td class="color_blanco">
                
                <?php if(isset($_POST['finial'])){
					echo '<input type="text" value= "'. $_POST['finial'].'" name="finial" id="dateDefaultfinalj" >';
					}else{
						
						echo '<input type="text" value= "00/00/0000" name="finial" id="dateDefaultfinal">';
						}    ?>
               </td>
			</tr>
			
			
             <tr class="color_non"> 
           <td class="color_blanco"><b>Tipo Proceso:</b></td>		
				<td colspan="1" class="color_blanco">
					<select name="tipo">
                        <?php
						if(isset($_POST['tipo'])){
							echo '<option selected value= "'.$_POST['tipo'].'" >'; 
				   echo ''.$_POST['tipo'].'';
						}else{
							echo '<option selected value= "Diario" >'; 
				   echo 'Diario';
							}
						 ?> 
						<option value= "Semanal" >Semanal</option>
                         <option  value= "Diario" >Diario</option>
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
	echo '
	<div style="width:1060px; Overflow-x:scroll;">
<table align="center" id="table" >
<td class="color_blanco">
<b style="align: left;"> Fecha programada: </b> 
<br>
<b>'.$_POST['fini'].'</b>
</td>
<tr>
 <th style="height:30px;">Centro Entrega</th>
<th>Folio pedido</th>
<th>Producto</th>
<th>Presentacion</th>
<th>Destino</th> 
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
 
// Check connection
$IdEmpresa = $_SESSION['idempresa']; 
$Fecha = $_POST['fini'];  
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

if ($IdEmpresa == 'TODOS') { 
  $sql = "Select folio, CentroEntrega, producto, destino, fecha,  presentacion, turno, medio, Transportista, capacidad, EstadoAtencion from pedido where fecha = '".$Fecha."' order by destino";
}else{
	
$sql = "SELECT folio, CentroEntrega, producto, destino, fecha, presentacion, turno, vehiculo, tonel,  medio, Transportista, capacidad, vehiculo, entrega, EstadoAtencion,  (select sum(capacidad) as total from pedido where idEmpresa = '".$IdEmpresa."' and fecha = '".$Fecha."' ) as cap, (select count(folio) as totall from pedido where idEmpresa = '".$IdEmpresa."' and fecha = '".$Fecha."' ) as reg FROM pedido where idEmpresa = '".$IdEmpresa."' and fecha = '".$Fecha."' order by destino ";
}
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$CapacidadFinal = $row["cap"];
$registros = $row["reg"];
echo "<tr>
<form name='forma' method='post' action='ActualizarPedido.php'> 
<td> <div style='height:16px; '> <label style='width:130px;
  display: inline-block; height:25px;   align: center;'>".$row["CentroEntrega"]."</label> </div></td>
<td> <div align='center'> <label>".$row["folio"]."</label></div></td>
<td> <div style='height:16px; '> <label style='width:110px; display: inline-block; 
  height:25px;   align: center;'>".$row["producto"]."</label> </div></td>
<td> <div align='center'> <label>".$row["presentacion"].".</label></div></td>
<td> <div style='height:16px; '> <label style='width:120px;
  display: inline-block; height:25px;   align: center;'>".$row["destino"]."</label> </div></td>
<td> <div align='center'> <label>".$row["turno"]."</label></div></td>
  <td><div style='height:16px; '><label style='width:60px;
  display: inline-block; height:25px;   align: center;'>".$row["vehiculo"]."</label></div></td>
  <td> <div align='center'> <label>".$row["tonel"]."</label></div></td> 
<td> <div style='height:16px; '><label style='width:100px;
  display: inline-block; height:25px;   align: center;'>".$row["medio"]."</label></div></td>
<td> <div style='height:16px;'><label style='width:120px;
  display: inline-block; height:25px;   width:140px; align: center;'>".$row["Transportista"]."</label> </div></td>
<td> <div align='center'> <label>".number_format($row["capacidad"], 0, '.', ',')."</label></div></td>
  <td> <div style='height:16px;'><label style='width:90px;
  display: inline-block; height:25px;   align: center;'>".$row["entrega"]."</label></div></td>
<td> <label style='width:130px;
  display: inline-block; height:25px;   align: center;'>".$row["EstadoAtencion"]."</label></td>


 </form>
</tr>"

;
}
echo '
 

<td class="color_blanco"  style="background-color: white;">
<b id="val" 	style="align: left;">Registros: '.$registros.'</b> 

</td>


<td class="color_blanco" style="background-color: white;"></td>

<td class="color_blanco" style="background-color: white;"></td>

<td class="color_blanco" style="background-color: white;"></td>

<td class="color_blanco" style="background-color: white;"></td>

<td class="color_blanco" style="background-color: white;"></td>

<td class="color_blanco" style="background-color: white;"></td>

<td class="color_blanco" style="background-color: white;"></td>

<td class="color_blanco" style="background-color: white;"></td>
<td class="color_blanco" style="background-color: white;"> </td>

<td class="color_blanco"  style="background-color: white;">
<div align="center"> <label id="val">'.number_format($CapacidadFinal, 0, '.', ',').'</label></div>

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
 
// Check connection
$IdEmpresa = $_SESSION['idempresa']; 
$Fecha = $_POST['fini']; 
$inicial = $_POST['fini'];
$final = $_POST['finial']; 

if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

  $sqld = "select fecha    from pedido where STR_TO_DATE(fecha, '%d/%m/%Y') >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y') and IdEmpresa = '".$IdEmpresa."' group by fecha order by STR_TO_DATE(fecha, '%d/%m/%Y') asc ";
  
  

$TCAP = 0;
$TREG = 0;
	

$resultd = $connect->query($sqld);
if ($resultd->num_rows > 0) {
// output data of each row
while($rowd = $resultd->fetch_assoc()) { 

	
	
	
	//Get count and then a cycle
	
	//table 
		echo '
		<div style="width:1060px; Overflow-x:scroll;">
<table align="center" id="table">
<td class="color_blanco">
<b style="align: left;"> Fecha programada: </b> 
<br>
<b>'.$rowd["fecha"].'</b>
</td>

<tr>
<th style="height:25px;">Centro Entrega</th>
<th>Folio pedido</th>
<th>Producto</th>
<th>Presentacion</th>
<th>Destino</th> 
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
 
// Check connection
$IdEmpresa = $_SESSION['idempresa']; 
$Fecha = $_POST['fini'];  
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

 
	
$sql = "SELECT folio, CentroEntrega, producto, destino, fecha, presentacion, turno, vehiculo, tonel,  medio, Transportista, capacidad, vehiculo, entrega, EstadoAtencion FROM pedido where idEmpresa = '".$IdEmpresa."' and fecha = '".$rowd["fecha"]."' order by destino ";
 
 
$reg = 0;
$cap = 0;

$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$cap = $cap + $row["capacidad"]; 
$reg = $reg + 1;
$TREG = $TREG + 1;
$TCAP = $TCAP + $row["capacidad"];
echo "<tr>
<form name='forma' method='post' action='ActualizarPedido.php'> 
<td> <div style='height:16px; '> <label style='width:130px;
  display: inline-block; height:25px;   align: center;'>".$row["CentroEntrega"]."</label> </div></td>
<td> <div align='center'>  <label>".$row["folio"]."</label></div></td>
<td> <div style='height:16px; '> <label style='width:110px; display: inline-block; 
  height:25px;   align: center;'>".$row["producto"]."</label> </div></td>
<td> <div align='center'>  <label>".$row["presentacion"].".</label> </div></td>
<td> <div style='height:16px; '> <label style='width:120px;
  display: inline-block; height:25px;   align: center;'>".$row["destino"]."</label> </div></td>
<td> <div align='center'>  <label>".$row["turno"]."</label> </div></td>
  <td><div style='height:16px;' align='center' ><label style='width:60px;
  display: inline-block; height:25px;   align: center;'>".$row["vehiculo"]."</label></div></td>
  <td> <div align='center'> <label>".$row["tonel"]."</label> </div></td> 
<td> <div style='height:16px; '><label style='width:100px;
  display: inline-block; height:25px;   align: center;'>".$row["medio"]."</label></div></td>
<td> ";
if($row['entrega'] == 'LAB DESTINO'){
	echo "<div style='height:16px; '><label style='
  display: inline-block; height:25px;   align: center; width:140px;'>PEMEX LOGISTICA</label></div>";
	
	}
	if($row['entrega'] == 'LAB LLENADERAS'){
		
		echo "<div style='height:16px; '><label style='
  display: inline-block; height:25px;   align: center; width:140px;'>COMERCIALIZADORA / FLETERA</label></div>";
	}


 
 
echo "</td>
<td> <div align='center'> <label>".number_format($row["capacidad"], 0, '.', ',')."</label></div></td>
  <td> <div style='height:16px;'><label style='width:90px;
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
<b id='val' 	style='align: left;'>Registros: ".$reg."</b> 

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

<td class='color_blanco'  style='background-color: white;'>
<div align='center'>
<label'>".number_format($cap, 0, '.', ',')."</label> 
</div>
</td>
<tr>

</table>
</div>
";
} else { echo "0 results"; }
 
echo'



</td> 



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
<b id="val" 	style="align: left;"> Total Litros: '.number_format($TCAP, 0, '.', ',').'</b> 
</td>
</table>

';


} else { echo "0 results"; }
 

	}
	
	
					
}

?>
    
    
		
            
            
		
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">
  
<textarea name="text" hidden cols="80" rows="2" id="txtarea"></textarea><br><br>
 
            
            <input type='submit' onclick='Print(this)' value='Exportar PDF'>
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