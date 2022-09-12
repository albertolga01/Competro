<?php 
require 'connector.php';

global $connect; 

require 'dompdf/autoload.inc.php';

session_start();	

use Dompdf\Options;

use Dompdf\Dompdf;
if(isset($_POST['text'])){

	$options = new Options();

$options->set('defaultFont', 'Courier'); 

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
    <script type="text/JavaScript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>	 
	<link rel="icon" href="img/favicon.ico"> </head>

<body class="body">
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
            $("#un").load("controladorad/tpclientes");
        </script>
   
    <p class="textoClienteSel" align="center">
	    
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
					<SPAN class="bullet">&nbsp;&nbsp;</SPAN> 
						<A class=pwNoLink href="/comercializadora/inicioadmin">Inicio</A> 
							<SPAN class="bullet">&nbsp;&nbsp;</SPAN> 
							 <a  href="#" >Clientes</a>&nbsp; 
					  </div>
						
				</div>
	
	<div id="maincontent" align="left"> 	
    <br><div style="width:1060px; Overflow-x:scroll;">
    
    <form method='post'>
<table align="center" id="tabb"  style="font-size:12px;">

 <p align="center">	
			  
<tr>
<th>ID Empresa</th>
<th>Razón Social</th>
<th>Representante</th>
<th>Domicilio</th>
<th>Correo</th>
<th>Teléfono</th>
<th>Contacto</th>
<th>RFC</th>
<th>Usuario</th>  
<th>Destinos</th> 
<th>Vehículos <br> Choferes </th>  
<th>Crédito <br> Comisión</th> 
<th>Condiciones Entrega</th>	
<th>Generar Acuse</th>	
<th>Usuarios</th>
<th>Información Fiscal</th>
<th>Referencias</th>	

</tr>


<?php 
// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
$sql = "SELECT IdEmpresa, RzonSocial, RLegal, Domicilio, Correo, Telefono, Contacto, Usuario, Contrasena, RFC, Color FROM empresa where tusuario = '1' and activo = '1'";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_array(MYSQLI_BOTH)) {
	$pass = substr_replace($row["Contrasena"], str_repeat('*', strlen($row["Contrasena"])), 0, strlen($row["Contrasena"]));
  
echo "<tr>
 
<!-- <form name='forma' method='post' action='controladorad/updatecliented.php'> -->

<input type='hidden' name='idempresa[".$row["IdEmpresa"]."]' value='".$row["IdEmpresa"]."'>
<td height='24'><div  align='center'><label>".$row["IdEmpresa"]." </label></div>
</td>
<td><input type='text' name='rzonsocial[".$row["IdEmpresa"]."]' value ='".$row["RzonSocial"]."'  ></td>
<td><input type='text' style='width:110px;'  name='rlegal[".$row["IdEmpresa"]."]' value ='".$row["RLegal"]."'     ></td>
<td><input type='text' name='domicilio[".$row["IdEmpresa"]."]' value ='".$row["Domicilio"]."'     ></td>
<td><input type='text' style='width:190px;'  name='correo[".$row["IdEmpresa"]."]' value ='".$row["Correo"]."'     ></td>
<td><input type='text' name='telefono[".$row["IdEmpresa"]."]'  style='width:80px;' value ='".$row["Telefono"]."'      ></td>
<td><input type='text' style='width:70px;'  name='contacto[".$row["IdEmpresa"]."]' value ='".$row["Contacto"]."'     ></td>
<td><input type='text' name='rfc[".$row["IdEmpresa"]."]' value ='".$row["RFC"]."' style='width:70px;'  ></td> 
<td><input type='text' name='usuario[".$row["IdEmpresa"]."]' value ='".$row["Usuario"]."' style='width:70px;'  ></td>





<form name='forma' method='post'> 
</form>


<form name='forma' method='post' action='destinos'> 
<input type='hidden' name='idempresa' value='".$row["IdEmpresa"]."'>     
<td><input style='width:70px;' type='Submit' name='Destinos' value='Destinos'></td> 
</form>
<form name='forma' method='post' action='vehiculos'> 
<input type='hidden' name='idempresa' value='".$row["IdEmpresa"]."'>     
<td><input style='width:70px;' type='Submit' name='Vehiculos' value='Vehículos'></td> 
</form>
<form name='forma' method='post' action='Credito'> 
<input type='hidden' name='idempresa' value='".$row["IdEmpresa"]."'>  
<td><input type='Submit' style='width:70px;' name='Credito' value='Crédito'></td>
</form>

<form name='forma' method='post' action='condiciones_entrega'> 
<input type='hidden' name='idempresa' value='".$row["IdEmpresa"]."'>     
<td ><input type='Submit'  style='width:70px;' name='Condiciones' value='Condiciones'></td>
</form>

<form name='forma' method='post' action='clientes'>      
<td ><input type='submit'  style='width:70px;' name='Acuse' value='".$row["IdEmpresa"]."'  onclick=''></td>
</form>
<form name='forma' method='post' action='usuarios'>      
<input type='hidden' name='idempresa' value='".$row["IdEmpresa"]."'>  
<td ><input type='submit'  style='width:70px;' name='Acuse' value='Usuarios'  onclick=''></td>
</form>

<form name='forma' method='post' action='informacionfiscal'>      
<input type='hidden' name='idempresa' value='".$row["IdEmpresa"]."'>  
<td ><input type='submit'  style='width:70px;' name='Acuse' value='Información'  onclick=''></td>
</form>

<form name='forma' method='post' action='referencia'>      
<input type='hidden' name='idempresa' value='".$row["IdEmpresa"]."'>  
<td ><input type='submit'  style='width:70px;' name='referencia' value='Referencia'  onclick=''></td>
</form>

</tr>";

}

/*
echo"
<tr><td><input style='width:70px;' type='Submit' name='actualizar' value='Actualizar'></td></tr>
</form>";
*/
if(isset($_POST['actualizar']))
			{
				foreach ($_POST['idempresa'] as $ids) 
				{
          
					$editID=mysqli_real_escape_string($connect, $_POST['idempresa'][$ids]);
					$editRzon=mysqli_real_escape_string($connect, $_POST['rzonsocial'][$ids]);
					$editRle=mysqli_real_escape_string($connect, $_POST['rlegal'][$ids]);
					$editDom=mysqli_real_escape_string($connect, $_POST['domicilio'][$ids]);
          $editCor=mysqli_real_escape_string($connect, $_POST['correo'][$ids]);
          $editTel=mysqli_real_escape_string($connect, $_POST['telefono'][$ids]);
          $editCon=mysqli_real_escape_string($connect, $_POST['contacto'][$ids]);
          $editR=mysqli_real_escape_string($connect, $_POST['rfc'][$ids]);
          $editUsu=mysqli_real_escape_string($connect, $_POST['usuario'][$ids]);
          

					$actualizar=$connect->query("UPDATE empresa SET IdEmpresa='$editID', RzonSocial='$editRzon', Rlegal='$editRle', Domicilio='$editDom', Correo='$editCor', Telefono='$editTel', Contacto='$editCon', RFC='$editR', Usuario='$editUsu' WHERE IdEmpresa='$ids'");
				}

				if($actualizar==true)
				{
					echo '

		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

		   <form method="post" action="../admin/clientes" name="frm1">

		   <input type="hidden" name="mensaje" value="Clientes Actualizado Correctamente" /> 

	       </form>

		   </body> ';	

			exit();
				}

				else
				{
					echo '

		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

		   <form method="post" action="../admin/clientes" name="frm1">

		   <input type="hidden" name="mensaje" value="Error al Actualizar Clientes" /> 

	       </form>

		   </body> ';	

			exit();
				}
        mysqli_query($connect,$query) or die(mysqli_error($connect));

	mysqli_close($connect);
			}



echo "

<tr>
<form name='formaagregar' method='post' action='controladorad/postempresad.php'> 
<input type='hidden' name='idcomercializadora' value='1000'  readonly required>
<td height='24'><input type='hidden' name='idempresaa' value =''  readonly required></td>
<td><input type='text' name='RzonSocial' value =''   required></td>
<td><input type='text' style='width:110px;'  name='RLegal' value =''    required></td>
<td><input type='text' name='Domicilio' value =''   required></td>
<td><input type='text' style='width:190px;' name='Correo' value =''   required></td>
<td><input type='text' style='width:80px;'  name='Telefono' value =''    required></td>
<td><input type='text' style='width:70px;'  name='Contacto' value =''    required></td>
<td><input type='text' name='RFC' value ='' style='width:70px;'  required></td> 

<td><input type='text' name='Usuario' value ='' style='width:70px;'  required></td> 
<td><input type='Submit'  style='width:70px;' value=' Agregar  '></td>
 <td class='color_blanco'><input type='hidden' name='Contrasena' value =''  hidden></td> 

</form>
</tr>
";

echo"
<tr><td class='color_blanco'><input style='width:70px;' type='Submit' name='actualizar' value='Actualizar'></td></tr>
</form>";
echo "</table>
"
;

} else { 
echo "
<tr>
<form name='formaagregar' method='post' action='controladorad/postempresad.php'> 
<input type='hidden' name='idcomercializadora' value='1000'  readonly required>
<td height='24'><input type='hidden' name='idempresaa' value =''  readonly required></td>
<td><input type='text' name='RzonSocial' value =''  required></td>
<td><input type='text' style='width:110px;'  name='RLegal' value ='' size='20'   required></td>
<td><input type='text' name='Domicilio' value =''    required></td>
<td><input type='text' style='width:190px;' name='Correo' value =''   required></td>
<td><input type='text' name='Telefono' style='width:80px;'  value =''    required></td>
<td><input type='text' style='width:70px;'  name='Contacto' value =''    required></td>
<td><input type='text' name='RFC' value =''    required></td> 
 <td><input type='text' name='Usuario' value ='' style='width:70px;'  required></td> 
  
<td><input type='Submit' style='width:70px;' value='Agregar'></td>
<td class='color_blanco'><input type='hidden' name='Contrasena' value =''  hidden></td>

</form>
</tr>
";

 }


 
?>



</table>





</div> 
		
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">
  
<textarea name="text" hidden  cols="80" rows="2" id="txtarea"></textarea><br><br>
            
            <input type='submit' onclick='Print(this)' value='Exportar PDF'>
</form>

  <br><br><br><br>
            
<form method="post" id="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">
  
<textarea name="text" hidden  cols="80" rows="2" id="txtareaAcuse"></textarea><br><br>
     
            <input id='uu'   hidden  type='submit' onclick='PrintA(this)' value='Exportar PDF Acuse'>

            
</form>	

            <br><br><br><br>
		
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

<div align="center" id="AcuseFinal"  hidden >   <h3> COMERCIALIZADORA PETROMAR SA DE CV </h3> <br>
         <label style="font-size:12px">Av. Camaron Sabalo No. 102 local 11. Lomas de Mazatlán CP 82010, Mazatlán Sinaloa</label><br>
         <label style="font-size:12px">Cel: 6691103030</label>
         <br>
         <br>
         <h3>REGISTRO EXITOSO DEL CLIENTE</h3><br> 
              
         <?php 
		 $sql = "SELECT RzonSocial, RFC, RLegal, Domicilio, Correo, Contacto, Telefono,Usuario ,Color FROM empresa where IdEmpresa = '".$_POST['Acuse']."'";
		 
		 $result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	 echo"
	 <div align='left'>
         <label style='font-weight:bold;'>Razón Social: </label>  ".$row['RzonSocial']."<br>
		  <label style='font-weight:bold;'> Representante Legal:</label> ".$row['RLegal']."  <br>
           <label style='font-weight:bold;'>RFC: </label>".$row['RFC']." <br> 
		   <label style='font-weight:bold;'> Contacto: </label>".$row['Contacto']." <br>
            <label style='font-weight:bold;'>Domicilio: </label>".$row['Domicilio']." <br>
			 <label style='font-weight:bold;'> Telefono:</label> ".$row['Telefono']."  <br>
             <label style='font-weight:bold;'>Correo: </label>".$row['Correo']." <br>
			  <label style='font-weight:bold;'> Usuario:</label> ".$row['Usuario']." <br></div>
             ";
}
}

			 ?>
			 <br><br>
             	<br> <br><br>
                             <table align="center"  id="tabuno" class="border">
             <tr >
             <th >Activo</th><th>Limite</th><th>Plazo</th><th>Comisión M</th><th>Comisión P</th><th>Comisión D</th>
             </tr>
                  <?php 
			 if($_POST["Acuse"] != null){
				 
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
$sql = "SELECT idempresa, Credito, LimC, Plazo, Porcentaje, PorcentajePremium, PorcentajeDiesel FROM estadocuenta where IdEmpresa = '".$_POST['Acuse']."'";
 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>  
<td> <div align='center'> ";
$Activo = $row["Credito"];
if($Activo == 0){
	echo "
<input type='checkbox' name='Credito' >";
}
if($Activo == 1){
	echo "
<input type='checkbox' name='Credito'  checked>";
}
echo "
</div></td>
<td >  <div align='center'><label>".$row["LimC"]." </label></div></td>
<td>  <div align='center'><label>".$row["Plazo"]." </label></div></td>
<td> <div align='center'> <label>".$row["Porcentaje"]." %</label></div></td>
<td> <div align='center'><label>".$row["PorcentajePremium"]." %</label></div></td>
<td> <div align='center'> <label>".$row["PorcentajeDiesel"]." %</label></div></td>
 
</tr>";
}

echo "</table>";
} else { echo "0 results";

 }
			 }
?>
             </table>
                         
             <br> <br><br>
                           
               <table align="center">
             <tr>
             <th>Nombre</th><th>Destino</th><th>Dirección</th><th>Permiso</th>
             </tr>
             <?php 
			 if($_POST["Acuse"] != null){
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
$sql = "SELECT IdEmpresa, IdDestino, Nombre, Destino, Direccion, Permiso FROM destinos where IdEmpresa = '".$_POST['Acuse']."'";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>  
<td> <label>".$row["Nombre"]."</label></td>
<td> <label>".$row["Destino"]."</label></td>
<td style='width:240px;'> <label>".$row["Direccion"]."</label></td>
<td > <label>".$row["Permiso"]."</label></td>
</tr>";
}
} else { echo "0 results";
 }
			 }
?>
             </table>
             <br><br><br>
             
               <table align="center">
             <tr> <th>Nombre de Choferes</th> 
             </tr>
             <?php 
			 if($_POST["Acuse"] != null){
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
$sql = "SELECT idempresa, IdChofer, Nombre FROM choferes where IdEmpresa = '".$_POST['Acuse']."'";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>   
<td>  <label>".$row["Nombre"]."</label></td>
 
</tr>";
}
} else { echo "0 results";
 }
			 }
?>
             </table>
             <br><br><br>
             
               <table align="center">
             <tr>
             <th>Vehiculo</th><th>Descripción</th> 
             </tr>
             <?php 
			 if($_POST["Acuse"] != null){
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
$sql = "SELECT IdEmpresa, IdVehiculo, Vehiculo, Descripcion FROM vehiculos where IdEmpresa = '".$_POST['Acuse']."'";
 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr> 
<td> <label>".$row["Vehiculo"]."</label></td>
<td> <label>".$row["Descripcion"]."</label></td>
  
</tr>";
}
} else { echo "0 results";
 }
			 }
?>
             </table>
             <br><br><br>
             
               <table align="center">
             <tr>
             <th>Centro de Entrega</th><th>Producto</th><th>Destino</th><th>Medio Transporte</th><th>Entrega</th>
             </tr>
            <?php 
			 if($_POST["Acuse"] != null){
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
$sql = "SELECT t1.IdEmpresa, t1.IdCondicion, t1.CentroEntrega, t1.Producto, t1.Destino, t1.Moneda, t1.MedioT, t1.TipoM, t1.Entrega FROM condiciones t1 where t1.IdEmpresa = '".$_POST['Acuse']."'";
 $id = $_POST['Acuse'];
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>

 <td>
 <label>".$row["CentroEntrega"]."</label> 

</td>

<td> 
 <label>".$row["Producto"]."</label>
 
</td>
<td>
 <label>".$row["Destino"]."</label>

</td>
 
<td>
<div align='center'><label>AT</label></div>
</td>
 
<td>  
 <label>".$row["Entrega"]."</label>
 
</td> 
</tr>";
}
} else { echo "0 results";
 }
			 }
?>
             </table>
             
             <br>
             <br>
             
             <br>
             <br>
             <?php 
			 $date = date('Y/m/d H:i:s');
           echo"  <label>*Generado ".$date." por el sistema Competro*</label>";
         ?>
         
         </div>
                  
         <br><br>
</body>
</html>
     
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

<?php 
	 
	 if(isset($_POST["mensaje"]))
	 {
		echo "<script>window.alert('".$_POST['mensaje']."');</script>";
		 }else{  }
		 		 
		 ?>
		         
         <script>
         function Print(value){
          
 $('#txtarea').html(document.getElementById('tabb').outerHTML)
 }
 </script>
 
 <script>
         function PrintA(value){
          
 $('#txtareaAcuse').html(document.getElementById('AcuseFinal').outerHTML)
 }
 </script>

 <script>
 PrintAcuse = function(value){
     var DataClient = "";
      alert(value);
      
       alert(value);
  
          $('#txtareaAcuse').html("FF");
         
 }
 </script>

 <script>
          function formSubmit()
{
PrintA(this);
    document.getElementById("myForm").submit();
	 
}
          </script>

 <?php 
 
 if($_POST['Acuse'] != null)
{
	 
	echo "<script>formSubmit();</script>";

}
 
 ?>    