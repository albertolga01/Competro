<?php 
require 'connector.php';
global $connect;
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



<div id="utils">
  <ul id="nav2"> 
	<li class="bar"><a href="mcontratos" class="baritem first">Contratos</a></li>
	<li class="bar"><a href="InteresesMoratorios" class="baritem first">Intereses Moratorios</a></li>
  	<li class="bar"><a href="Manual Competro Usuario.pdf" class="baritem first">Manual de Usuario</a></li>
	<li class="bar"><a href="menu_cte" class="baritem first">Inicio</a></li>
	 
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
				
				if (isset($_POST["fini"])) {
			}else{
				
	 // echo "window.location.href='pedidoscadmin.php';";
				}  
?>}
</script>

<!-- FIN DEL ENCABEZADO --> 


	


	


	<!--Ruteo de la página-->
	
		  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cte" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;</span>&nbsp;
							 <a  href="cargamovcte">Captura de Movimientos</a>&nbsp;<span class='bullet'>&nbsp;</span>&nbsp;
							 <a class=bold href="#">Historial de Movimientos</a>
							
					  </div>

						
				</div>
			
	
			
	
	
 

 
	
	  
			
		
	<div id="maincontent" align="center"> 	
       <br><br>
       
       <form name="forma1" method="post" action="registrormovimientoscte.php">
       
       
       <?php
 


echo '<input type="hidden" name="IdEmpresa" value="'. $_SESSION["idempresa"] .'">';
?>
       
       
       	<table align="center" class="parametros">
			<tr>
				<td class="color_blanco"><b>Fecha Inicial:</b></td>
				<td class="color_blanco">
                
                <?php 
				
				if(isset($_POST['fini'])){
					$fecha = $_POST['fini'];  echo '<input type="text" value= "'. $_POST['fini'].'" name="fini" id="dateDefaultj">';
					}else{
						 echo '<input type="text" value= "00/00/0000" name="fini" id="dateDefault">';
						}
				 ?>
                </td>
				<td class="color_blanco"></td>
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
				<td class="color_blanco"></td>
			</tr>
            
			
             <tr class="color_non"> 
           <td class="color_blanco"><b>Tipo Proceso:</b></td>		
				<td colspan="1" class="color_blanco">
					<select name="tipo">
                        <?php 
						if(isset($_POST['tipo'])){
		echo '<option  selected value= "'.$_POST['tipo'].'" > '.$_POST['tipo'].'</option>'; 
		echo '<option  value= "Semanal" >Semanal</option>
                         <option  value= "Diario" >Diario</option>';
							
							}else{
								echo '<option selected value= "Semanal" >Semanal</option>
                         <option  value= "Diario" >Diario</option>';
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
	echo '
<table align="center" id="table">
<td class="color_blanco">
<b style="align: left;"> Fecha: </b> 
<br>
<b>'.$_POST['fini'].'</b>
</td>
<tr>
<th style="height:25px;">Folio</th>
<th>ID Empresa</th>
<th>Fecha</th>
<th>Concepto</th>
<th>Referencia</th>
<th>Fecha Captura</th>
<th>Importe</th>

</tr>
';
$CapacidadFinal;

// Check connection
$IdEmpresa = $_POST['IdEmpresa']; 
$Fecha = $_POST['fini'];  
if ($connect->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$string = str_replace('/', '-', $Fecha); 
$stringg = date('Y-m-d', strtotime($string));
 
  $sql = "Select t1.Folio, t2.usuario, t1.Abono as Importe, t1.IdEmpresa, t1.Fecha, t1.Concepto, t1.Referencia, t1.FechaCaptura from movimientos t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa  where date(t1.FechaCaptura) = '".$stringg."' and t1.IdEmpresa = '".$_SESSION['idempresa']."'";
  $cont = 0;
  $ImTotal = 0;
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$cont = $cont + 1;
	$ImTotal = $ImTotal + $row["Importe"];
$importe = number_format($row["Importe"], 2, '.', ',');
echo "<tr>
<form name='forma' method='post' action='ActualizarPedido.php'> 
<td> <div align='center' style='height:20px; '> <label >".$row["Folio"]."</label> </div>
 </td>
 <td> <div align='center' style=''> <label>".$row["usuario"]."</label> </div>
 </td>
<td> <div align='center' style='width:65px;'><label >".$row["Fecha"]."</label>
 </div></td>
  
<td> <div align='center' style='width:140px;'> <label>".$row["Concepto"]."</label> </div></td>
<td> <div align='center' style='width:155px;'> <label >".$row["Referencia"]."</label> </div></td>
<td> <div align='center' style='width:110px;'> <label >".$row["FechaCaptura"]."</label> </div></td>
<td> <div align='center' style='width:70px;'> <label >$".$importe."</label> </div></td>


 </form></tr>"

;
}
echo '
 <tr>
 <td class="color_blanco" colspan="3">Total Registros: '.$cont.'</td> 
  <td class="color_blanco"></td> 
  <td class="color_blanco"></td> 
  <td class="color_blanco"></td>  
 <td  class="color_blanco" align="center"><div ><label>	$'. number_format($ImTotal, 2, '.', ',').'</label></div></td>
 <tr>

';
} else { echo "0 results"; }
$connect->close();
echo'
</table>


';
}




if($tipo === 'Semanal'){
	
// Check connection
$IdEmpresa = $_POST['IdEmpresa']; 
$Fecha = $_POST['fini']; 
$inicial = $_POST['fini'];
$final = $_POST['finial'];

 $cont = 0;
  $ImTotal = 0;
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

  $sqld = "select date(fechacaptura) as fecha from movimientos where date(fechacaptura) >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and date(fechacaptura) <= STR_TO_DATE('".$final."', '%d/%m/%Y')  and IdEmpresa = '".$_SESSION['idempresa']."' group by date(fechacaptura)";


$resultd = $connect->query($sqld);
if ($resultd->num_rows > 0) {
// output data of each row
while($rowd = $resultd->fetch_assoc()) { 
	
		echo '
<table align="center" id="table">
<td class="color_blanco">
<b style="align: left;"> Fecha: </b> 
<br>
<b>'.$rowd["fecha"].'</b>
</td>

<tr>
<th style="height:25px;">Folio</th>
<th>ID Empresa</th>
<th>Fecha</th>
<th>Concepto</th>
<th>Referencia</th>
<th>Fecha Captura</th>
<th>Importe</th>
</tr>
';

// Check connection
$IdEmpresa = $_POST['IdEmpresa']; 
$Fecha = $_POST['fini'];  

if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

 

$string = str_replace('/', '-', $Fecha); 
$stringg = date('Y-m-d', strtotime($string));
   $sql = "Select t1.Folio, t2.usuario, t1.Fecha, t1.Concepto, t1.Referencia, t1.FechaCaptura, t1.Abono as Importe from movimientos t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa  where date(FechaCaptura) = '".$rowd['fecha']."'  and t1.IdEmpresa = '".$_SESSION['idempresa']."' ";

$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$cont = $cont + 1;
	$ImTotal = $ImTotal + $row["Importe"];
$importe = number_format($row["Importe"], 2, '.', ',');
echo "<tr>
<form name='forma' method='post' action='ActualizarPedido.php'> 
<td> <div align='center' style='height:20px; '> <label >".$row["Folio"]."</label> </div>
 </td>
 <td> <div align='center' style=''> <label>".$row["usuario"]."</label> </div>
 </td>
<td> <div align='center' style='width:65px;'><label >".$row["Fecha"]."</label>
 </div></td>
  
<td> <div align='center' style='width:140px;'> <label>".$row["Concepto"]."</label> </div></td>
<td> <div align='center' style='width:155px;'> <label >".$row["Referencia"]."</label> </div></td>
<td> <div align='center' style='width:110px;'> <label >".$row["FechaCaptura"]."</label> </div></td>
<td> <div align='center' style='width:70px;'> <label >$".$importe."</label> </div></td>

   

 </form></tr>";
}
echo ' 
 <tr>
 <td class="color_blanco" colspan="3">Total Registros: '.$cont.'</td> 
  <td class="color_blanco"></td> 
  <td class="color_blanco"></td> 
  <td class="color_blanco"></td>  
 <td  class="color_blanco" align="center"><div ><label>	$'. number_format($ImTotal, 2, '.', ',').'</label></div></td>
 <tr>


';
} else { echo "0 results"; }
 
echo' 

<br><br><br>

';


	
	
}		


echo ' 

</table>';


} else { echo "0 results"; }
try {
	//$connect->close();
} catch (Exception $e) {
    
}

//

	}
	
	
					
}


?>
    
    
		
            
             <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">
  
<textarea name="text"  hidden cols="80" rows="2" id="txtarea"></textarea><br><br>
 
            
            <input type='submit' onclick='Print(this)' value='Exportar PDF'>
</form>  	

               <script>
         function Print(){
          
 $('#txtarea').html(document.getElementById('table').outerHTML)
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
     
    