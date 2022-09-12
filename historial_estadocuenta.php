<?php 
$inicial = '';
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
    
	
 
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>

	<script language="JavaScript" src="scripts/calendario.js"></script> 
    

 <link rel="stylesheet" href="styles/calendario.css"> 
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="scripts/uijquery.js"></script>
</head>
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
<body class="body">
	<div id="extra">&nbsp;
    </div>
    <div id="page">
        <div id="header">
<!-- <div id="eNacional"><a href="http://www.energia.gob.mx/" target="_blank" title="Secretar&iacute;a de Energ&iacute;a">Secretar&iacute;a de Energ&iacute;a</a></div> -->  
            <div id="PEMEX">
            </div> 
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
           <?php
   session_start();	
  
echo ' <p class="textoEjecutivo" align="center"> Bienvenido(a) '. $_SESSION["usuario"] .' - '.$_SESSION["rfc"].'</p>';
?>
                </p> 
            </div>
            <div id="fecha"> 
                <p class="fechapc" align="right"></p>
            </div>
            <div id="mainmenu">
                <ul id="nav">
                <li class="bar"><a href="menu_cte" class="baritem">Servicio a Clientes</a>
                </li> 
                <li class="bar"><a href="contacto" class="baritem">Contacto</a></li>
                <li class="bar"><a href="scripts/logout.php" class="baritem">Salir</a></li>	
                <li class="barlast"><span>&nbsp;</span></li>
                <!-- mete codigo de tipo de usuario--> 
                </ul>
            </div>
        </div>

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
					<span class=bullet>&nbsp;&nbsp;</span> 
						<a href="menu_cte" >Servicio a clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;<a  href="#" >Historial de estado de cuenta</a>
				</div>
			</div>
	    <div id="maincontent" align="center"> 
    
    
   
<form name="forma1" method="post" action="historial_estadocuenta">
       
       
       <input type="hidden" name="IdEmpresa" value="2510">
       	<table align="center" class="parametros">
			<tr>
				<td class="color_blanco"><b>Fecha Inicial:</b></td>
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
				<td class="color_blanco"><b>Fecha Final:</b></td>
				<td class="color_blanco">
                   <?php if(isset($_POST['finial'])){
					echo '<input type="text" value= "'. $_POST['finial'].'" name="finial" id="dateDefaultfinalj">';
					}else{
						
						echo '<input type="text" value= "00/00/0000" name="finial" id="dateDefaultfinal">';
						}    ?>
				<a onClick="return calendario('forma1.finial');"></a></td>
                  
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
    <br>
    <?php
   $q = "Select credito from estadocuenta where idempresa = '".$_SESSION["idempresa"]."'";
 
   $rest = $connect->query($q);
   
   if ($rest->num_rows > 0) {  
   while($rowt = $rest->fetch_assoc()) {
        $t = $rowt["credito"];
    }
    }     
 
   
   ?>
    <?php 

        if(isset($_POST['fini'])){
            if($t == "0"){
            
			echo '
            <table align="center" id="tabb" style="font-size:11px;">
            <tr>
                <th colspan="8">CONTADO</th>
            </tr>
                <tr align="center">
                    <th>Empresa</th>
                    <th>Fecha</th>
                    <th>Tipo de pago</th>
                    <th>Facturado</th>
                    <th>Saldo</th> 
                    <th>Cargo</th> 
                    <th>Abono</th> 
                    <th>Saldo final</th> 																	
                </tr>
            ';
			
            if ($connect->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }
 
 $myDate = date('d/m/Y');
 $Fecha = $_POST['fini']; 
 $inicial = $_POST['fini'];
  
 $Fecho = str_replace('/', '-', $inicial); 
 $inicial = date('Y-m-d', strtotime($Fecho. ' 0 days'));  
  
 $final = $_POST['finial']; 
 $Fechoo = str_replace('/', '-', $final); 
 $final = date('Y-m-d', strtotime($Fechoo. ' 0 days')); 
 
 $contador = 0;
 $sum = 0;
   
  
     $sqld = "SELECT  t2.usuario, t1.fechacaptura, t1.tipo,  t1.facturado, t1.saldo, t1.saldocontado, t1.importe, t1.idempresa
             FROM historialec t1 INNER JOIN empresa t2 ON t1.idempresa = t2.idempresa  inner join estadocuenta t3 on t1.idempresa = t3.idempresa
             WHERE DATE(t1.fechacaptura) >= '".$inicial."' AND DATE(t1.fechacaptura) <= '".$final."' 
             AND t1.IdEmpresa = '".$_SESSION["idempresa"]."'";
   
 
 $resultd = $connect->query($sqld);
   
 if ($resultd->num_rows > 0) {  
 while($row = $resultd->fetch_assoc()) {
 
    

 
         //CONTADOR DE FILAS
     $contador = $contador + 1;
     
 echo "<tr>
 <td> <label style='width:100px; height:25px; align:center;'>".$row['usuario']."</label></td>
 <td> <label style='width:100px; height:25px; align:center;'>".$row['fechacaptura']."</label></td>
 <td> <label style='width:40px; height:25px; align: center;'> ".$row['tipo']." </label></td> 
 <td> <label style='width:40px; height:25px; align: center;'>$ ".number_format($row["facturado"], 2, '.', ',')."</label></td>  
 <td> <label style='width:40px; height:25px; align: center;'>$".number_format($row["saldo"], 2, '.', ',')."</label></td>
 ";
 if($row["tipo"] == "CARGO"){
     $total = $row["saldo"] - ($row["facturado"] + $row["importe"]);
echo "
<td> <label style='width:40px; height:25px; align: center;'>$".number_format($row["importe"], 2, '.', ',')."</label></td>
<td> <label style='width:40px; height:25px; align: center;'>$0.00</label></td>
";
 }else{
    $total = ($row["saldo"] + $row["importe"]) - ($row["facturado"]);
    echo "
    <td> <label style='width:40px; height:25px; align: center;'>$0.00</label></td>
    <td> <label style='width:40px; height:25px; align: center;'>$".number_format($row["importe"], 2, '.', ',')."</label></td>
    ";
 }
 
 echo"
 <td> <label style='width:40px; height:25px; align: center;'>$".number_format($total, 2, '.', ',')."</label></td>
 
 </tr>";$saldoi= $cierre;
 }
 echo "
 <tr>
 <td class='color_blanco'>Registros: 
 ".$contador."
 </td>
 <td class='color_blanco'></td>
 <td class='color_blanco'></td>
 <td class='color_blanco'></td>
 <td class='color_blanco'></td> 
 <td class='color_blanco'></td>
 </tr>
 ";
  
 } else { echo "0 results"; } 
 echo '</table>';
}
 }else{}
 ?>
 
        



<br><br><br>

     <?php
if(isset($_POST['fini'])){
    
    if($t == "1"){
    echo '
    <table align="center" id="tabb" style="font-size:11px;">
    <tr>
                <th colspan="9">CRÉDITO</th>
            </tr>
        <tr align="center">
            <th>Empresa</th>
            <th>Fecha</th>
            <th>Tipo de pago</th>
            <th>Facturado</th> 
            <th>SaldoContado</th>
            <th>Cargo</th> 
            <th>Abono</th>
            <th>Saldo final</th>  																
        </tr>';
    
    if ($connect->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$myDate = date('d/m/Y');
$Fecha = $_POST['fini']; 
$inicial = $_POST['fini'];

$Fecho = str_replace('/', '-', $inicial); 
$inicial = date('Y-m-d', strtotime($Fecho. ' 0 days'));  

$final = $_POST['finial']; 
$Fechoo = str_replace('/', '-', $final); 
$final = date('Y-m-d', strtotime($Fechoo. ' 0 days')); 

$contador = 0;
$sum = 0;
 
$sqld = "SELECT  t2.usuario, t3.limc, t1.fechacaptura, t1.tipo,  t1.facturado, t1.saldo, t1.saldocontado, t1.importe, t1.idempresa
     FROM historialec t1 INNER JOIN empresa t2 ON t1.idempresa = t2.idempresa  inner join estadocuenta t3 on t1.idempresa = t3.idempresa
     WHERE DATE(t1.fechacaptura) >= '".$inicial."' AND DATE(t1.fechacaptura) <= '".$final."' 
     AND t1.IdEmpresa = '".$_SESSION["idempresa"]."' order by fechacaptura asc";
 

$resultd = $connect->query($sqld);

if ($resultd->num_rows > 0) {  
while($row = $resultd->fetch_assoc()) {

$total = 0;
 //CONTADOR DE FILAS
$contador = $contador + 1;

echo "<tr>
<td> <label style='width:100px; height:25px; align:center;'>".$row['usuario']."</label></td>
<td> <label style='width:100px; height:25px; align:center;'>".$row['fechacaptura']."</label></td>
<td> <label style='width:40px; height:25px; align: center;'> ".$row['tipo']." </label></td> 
<td> <label style='width:40px; height:25px; align: center;'>$ ".number_format($row["facturado"], 2, '.', ',')."</label></td>  
 <td> <label style='width:40px; height:25px; align: center;'>$".number_format($row["saldocontado"], 2, '.', ',')."</label></td>
";

if($row["tipo"] == "CARGO"){
    $total =  $row["saldocontado"] - ($row["facturado"] + $row["importe"]) ;
    
    if($total > 0){
        $total = $total + $row["limc"];
    }else{ 
        $total =  $row["limc"] + $total;
        
    }

echo "
<td> <label style='width:40px; height:25px; align: center;'>$".number_format($row["importe"], 2, '.', ',')."</label></td>
<td> <label style='width:40px; height:25px; align: center;'>$0.00</label></td>
";
}else{
    $total =  $row["saldocontado"] - ($row["facturado"] - $row["importe"]) ;
    if($total > 0){
        $total = $total + $row["limc"];
       
    }else{
        
        $total =  $row["limc"] + $total;
    }
   echo "
   <td> <label style='width:40px; height:25px; align: center;'>$0.00</label></td>
   <td> <label style='width:40px; height:25px; align: center;'>$".number_format($row["importe"], 2, '.', ',')."</label></td>
   ";
}
echo "
<td> <label style='width:40px; height:25px; align: center;'>$".number_format($total, 2, '.', ',')."</label></td> 
</tr>";$saldoi= $cierre;
}
echo "
<tr>
<td class='color_blanco'>Registros: 
".$contador."
</td>
<td class='color_blanco'></td>
<td class='color_blanco'></td>
<td class='color_blanco'></td>
<td class='color_blanco'></td> 
<td class='color_blanco'></td>
</tr>
";

} else { echo "0 results"; }
$connect->close();


echo '</table>';
}
}else{}


?>




        <table>




            <br><br>
	</div> 	
	<form action="LoginServlet" method="post">
	</form>
	<div id="maincontent"> 
		<table align="center">
			<tr class="link" align="center"> 
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
  var hoy =new Date(new Date().setDate(new Date().getDate() - 7)),
     
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
   var hoye =new Date(),
      
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
    