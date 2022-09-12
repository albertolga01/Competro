<?php

require 'connector.php';
global $connect;
$inicial = ''; 
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
    $dompdf->setPaper('A4', 'landscape'); 
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
        <li class="bar"><a href="cargacontratos" class="baritem first">Contratos</a></li>
        <li class="bar"><a href="InteresesMoratoriosad" class="baritem first">Intereses Moratorios</a></li>  	
        <li class="bar"><a href="Manual Competro Usuario.pdf" class="baritem first">Manual de Usuario</a></li>	
        <li class="bar"><a href="menu_cteadmin" class="baritem first">Inicio</a></li>
    <!-- mete codigo de comunicados, pizarrion de avisos y seleccione el cliente--> 
	
   
	 
	<li class="barlast"><span>&nbsp;</span></li>
	</ul>
</div>

<div id="cliente">

	<p class="textoEjecutivo" align="center" id="un">
    
  
 
 <script type="text/JavaScript">
            $("#un").load("controladorad/tppagosaps.php");
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
                             <a  href="cargamovimientos" >Carga de movimientos</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Historial de estado de cuenta</a>
							
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
			  <tr>
				<td class="color_blanco"><b>Seleccione cliente:</b></td>
				<td class="color_blanco">
                <?php
if(isset($_POST["IdEmpresa"]))

	{		

    $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1' and IdEmpresa != '".$_POST['IdEmpresa']."'");

	}else{

		

		 $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'  ");

		}



    echo "<select name='IdEmpresa' id='IdEmpresa'  style='width:100px;' required>

	

	";

	if(isset($_POST["IdEmpresa"]))

	{

		 $resulti = $connect->query("select IdEmpresa, usuario from empresa where IdEmpresa = '".$_POST['IdEmpresa']."'");

		 

		  while ($rowi = $resulti->fetch_assoc()) {



                  unset($idi, $namei);

                  $idi = $rowi['IdEmpresa'];

                  $namei = $rowi['usuario']; 

                  echo '<option value="'.$idi.'" name="empresa" id="select">'.$namei.'</option>';



} 

		  

	}else{echo "	 ";}





    while ($row = $result->fetch_assoc()) {



                  unset($id, $name);

                  $id = $row['IdEmpresa'];

                  $name = $row['usuario']; 

                  echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';



}  



if(($_POST["IdEmpresa"]) == 'TODOS'){

echo "<option selected>TODOS</option>";

} else{

	//echo "<option>TODOS</option>";

	}

/*
    $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");

    echo "<select name='IdEmpresa' id='IdEmpresa' style='width:100%;'>";
	
	if (isset($_POST['IdEmpresa'])) {	
  
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
    echo "</select>"; */
?> 


</td>
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
    
   <?php
   $q = "Select credito from estadocuenta where idempresa = '".$_POST["IdEmpresa"]."'";
   
   $rest = $connect->query($q);
   
   if ($rest->num_rows > 0) {  
   while($rowt = $rest->fetch_assoc()) {
        $t = $rowt["credito"];
    }
    }     
 
   
   ?>


        <br><br><br>

      
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
   
 if($_POST['IdEmpresa'] == 'TODOS'){         //QUERY DE LA TABLA
     $sqld = "SELECT  t2.usuario, t1.fechacaptura, t1.tipo,  t1.facturado, t1.saldo, t1.saldocontado, t1.importe,  t1.idempresa
             FROM historialec t1 INNER JOIN empresa t2 ON t1.idempresa = t2.idempresa  inner join estadocuenta t3 on t1.idempresa = t3.idempresa
             WHERE DATE(t1.fechacaptura) >= '".$inicial."' AND DATE(t1.fechacaptura) <= '".$final."'";   
 } else {
     $sqld = "SELECT  t2.usuario, t1.fechacaptura, t1.tipo,  t1.facturado, t1.saldo, t1.saldocontado, t1.importe, t1.idempresa
             FROM historialec t1 INNER JOIN empresa t2 ON t1.idempresa = t2.idempresa  inner join estadocuenta t3 on t1.idempresa = t3.idempresa
             WHERE DATE(t1.fechacaptura) >= '".$inicial."' AND DATE(t1.fechacaptura) <= '".$final."' 
             AND t1.IdEmpresa = '".$_POST['IdEmpresa']."'";
 } 
 
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

if($_POST['IdEmpresa'] == 'TODOS'){         //QUERY DE LA TABLA
$sqld = "SELECT t2.usuario, t3.limc, t1.fechacaptura, t1.tipo,  t1.facturado, t1.saldo, t1.saldocontado, t1.importe,  t1.idempresa
     FROM historialec t1 INNER JOIN empresa t2 ON t1.idempresa = t2.idempresa  inner join estadocuenta t3 on t1.idempresa = t3.idempresa
     WHERE DATE(t1.fechacaptura) >= '".$inicial."' AND DATE(t1.fechacaptura) <= '".$final."' order by fechacaptura asc";   
} else {
$sqld = "SELECT  t2.usuario, t3.limc, t1.fechacaptura, t1.tipo,  t1.facturado, t1.saldo, t1.saldocontado, t1.importe, t1.idempresa
     FROM historialec t1 INNER JOIN empresa t2 ON t1.idempresa = t2.idempresa  inner join estadocuenta t3 on t1.idempresa = t3.idempresa
     WHERE DATE(t1.fechacaptura) >= '".$inicial."' AND DATE(t1.fechacaptura) <= '".$final."' 
     AND t1.IdEmpresa = '".$_POST['IdEmpresa']."' order by fechacaptura asc";
} 

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
				 	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">
  
<textarea name="text" hidden cols="80" rows="2" id="txtarea"></textarea><br><br>
 
            <!--
            <input type='submit' onclick='Print(this)' value='Exportar PDF'>
            -->
</form>		 	
</table>
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
    
   
   
    
        
            <br><br>
            
		
			
	</div> 	
		
						
	
	<form action="LoginServlet" method="post">
	</form>
	<!--
        <div id="maincontent"> 
            <table align="center">
                <tr class="link" align="center">
                            
                
                    <td colspan="4" align="center" class="color_blanco"> 
                        <b><a href="" onClick="return documento('/portal','0')">.....</a></b> 
                    </td> 
                </tr>
            </table>
        </div> 
    -->
	


	
	



 
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

<?php
    if (isset($_POST['mensaje'])){
        echo "
            <script>alert('".$_POST['mensaje']."');</script>
        ";
    } else {}
?>

    
    
      <script>
         function Print(){
          
 $('#txtarea').html(document.getElementById('tabb').outerHTML)
 }
 </script>




            <?php
			/*
            <br><br>
    <table align="center" id="tabb" style="font-size:11px;">
			<tr align="center">
                <th>Empresa</th>
				<th>Fecha</th>
				<th>Tipo de pago</th>
                <th>Saldo inicial</th>
                <th>Cargo / Saldo a pagar</th>
				<th>Cargo</th>
				<th>Abono</th>
				<th>Saldo final</th>																						
			</tr>
			 
			if(isset($_POST['fini'])){
			
			
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
  
if($_POST['IdEmpresa'] == 'TODOS'){         //QUERY DE LA TABLA
    $sql = "SELECT t1.fecha, t1.credito AS tipo, t1.saldocontado, t1.saldosobrante, t1.saldocredito, t1.cargo, t1.pago AS abono, t2.usuario, t3.limc
            FROM historialsaldos t1 INNER JOIN empresa t2 ON t1.idempresa = t2.idempresa  inner join estadocuenta t3 on t1.idempresa = t3.idempresa
            WHERE DATE(t1.fecha) >= '".$inicial."' AND DATE(t1.fecha) <= '".$final."'";   
} else {
	$sql = "SELECT t1.fecha, t1.credito AS tipo, t1.saldocontado, t1.saldosobrante, t1.saldocredito, t1.cargo, t1.pago AS abono, t2.usuario, t3.limc
            FROM historialsaldos t1 INNER JOIN empresa t2 ON t1.idempresa = t2.idempresa  inner join estadocuenta t3 on t1.idempresa = t3.idempresa
            WHERE DATE(t1.fecha) >= '".$inicial."' AND DATE(t1.fecha) <= '".$final."' 
            AND t1.IdEmpresa = '".$_POST['IdEmpresa']."'";
}

$result = $connect->query($sql);
  
if ($result->num_rows > 0) { 
while($row = $result->fetch_assoc()) {
	$fecha = $row['fecha'];
	$saldocontado = '$ '.number_format($row['saldocontado'], 2, '.', ',');
    $saldocredito = '$ '.number_format($row['saldocredito'], 2, '.', ','); 
    $abono = '$ '.number_format($row['abono'], 2, '.', ',');
    $cargo = '$ '.number_format($row['cargo'], 2, '.', ',');
    $saldosobrante = 0;
    $saldo = 0;
    $saldoInicial = '$ '.number_format($row['saldocredito'] + $row['limc'], 2, '.', ',');

        //DEFINE TIPO DE PAGO Y SALDO
    if($row['tipo']==1){
        $tipo = 'Crédito';
        
        if(isset($abono)){
            $saldo = $row['saldocredito'] - $row['abono'];
        } else if(isset($cargo)) {
		$saldo = ($row['saldocredito']) + $row['cargo'];
        }
    } else {
        $tipo = 'Contado';

        if($abono > 0){
            $saldo = $row['saldocontado'] + $row['abono'];
        } else {
            $saldo = $row['saldocontado'] - $row['cargo'];
        }
    }

    if($row['abono'] > $row['saldocredito']){
        $saldosobrante = '$ '.number_format(($row['abono'] - $row['saldocredito']), 2, '.', ',');
    }

    if($tipo=='Crédito'){
		
        $saldo2 = $row['saldocredito'] - $row['cargo'];
		$saldo2 = '$ '.number_format($saldo2, 2, '.', ',');
		$cierre = ($row['limc'] - $saldo); //+ $saldocontado;
		$dif = $saldoi - $cierre;  
		$dif = $dif - $row["cargo"];
		if($dif > 0){$cierre = $cierre + $dif;}
      
		 
    } else {
		//contado    
		
        $saldo2 = $saldocontado;
		$cierre = $saldoi + $saldo;
    }

        //CONTADOR DE FILAS
	$contador = $contador + 1;
	
echo "<tr>
<td> <label style='width:100px; height:25px; align:center;'>".$row['usuario']."</label></td>
<td> <label style='width:100px; height:25px; align:center;'>".$fecha."</label></td>
<td> <label style='width:40px; height:25px; align: center;'>".$tipo."</label></td> 
<td> <label style='width:40px; height:25px; align: center;'>$ ".number_format($saldoi, 2, '.', ',')."</label></td>  
<td> <label style='width:40px; height:25px; align: center;'>".$saldo2."</label></td>
<td> <label style='width:40px; height:25px; align: center;'>".$cargo."</label></td>
<td> <label style='width:40px; height:25px; align: center;'>".$abono."</label></td>
<td> <label style='width:40px; height:25px; align: center;'>$ ".number_format($cierre, 2, '.',',')."</label></td>
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
 

}else{}
</table>
*/
?>
           
		
