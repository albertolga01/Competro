<?php 
require 'connector.php';
global $connect;
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
    
    
<link rel="icon" href="img/favicon.ico"> </head>


<body class="body" onload="logout()">
	<div id="extra">&nbsp;</div>

<div id="page">

<div id="header">

<!-- <div id="eNacional"><a href="http://www.energia.gob.mx/" target="_blank" title="Secretar&iacute;a de Energ&iacute;a">Secretar&iacute;a de Energ&iacute;a</a></div> -->  
<div id="PEMEX"></div> 



<div id="utils">  <ul id="nav2"> 	<li class="bar"><a href="InteresesMoratoriosad" class="baritem first">Intereses Moratorios</a></li>  	<li class="bar"><a href="Manual Competro Usuario.pdf" class="baritem first">Manual de Usuario</a></li>	<li class="bar"><a href="menu_cteadmin" class="baritem first">Inicio</a></li>
    <!-- mete codigo de comunicados, pizarrion de avisos y seleccione el cliente--> 
	
  		<li class="bar"><a href="#" class="baritem">Comunicados</a></li>
	    <li class="bar"><a href=""  class="baritem">Pizarrón de Avisos</a></li>
	    
	 
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
	  echo "window.location.href='../index';";
				}  
				
				if (isset($_POST["idempresa"])) {
			}else{
				
	  echo "window.location.href='clientes';";
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
						<A class=pwNoLink href="inicioadmin.php">Inicio</A> 
							<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="clientes">Clientes</a>
                             <span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Condiciones</a>
							
					  </div>
						
				</div>
			
	
			
	
	
 



 
	
	
	  
			
		
	<div id="maincontent" align="center"> 	
       <br><br>
       
       <form name="forma1" method="post" action="pedidosr.php">
       
       	<table align="center" class="parametros">
			
			<tr>
				<td class="color_blanco"><b>Cliente:</b></td>
				<td class="color_blanco">
                <?php 
				if(isset($_POST['idempresa'])){
 



    $result = $connect->query("select IdEmpresa, usuario from empresa where idempresa = '".$_POST['idempresa']."'");

    echo "<select name='idempresa' id='IdEmpresa'>";

    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['IdEmpresa'];
                  $name = $row['usuario']; 
                  echo '<option value="'.$id.'" name="idempresa" id="select">'.$name.'</option>';

}
    echo "</select>"; 
	}
?> </td>
			</tr>
			
			
		</table>
       
 <br>
            	
     <br>
    </form>
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
    
    
<table align="center">
<tr>
<th height="24">ID Empresa</th>
<th>No. Condición</th>
<th>Centro de Entrega</th>
<th>Producto</th>
<th>Destino</th>
<th>Moneda</th>
<th>Medio Transporte</th> 
<th>Tipo Medio</th>
<th>Entrega</th>
<th>Agregar</th>
</tr>
<?php 
// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
if (isset($_POST['idempresa'])) {
$sql = "SELECT t1.IdEmpresa, t1.IdCondicion, t1.CentroEntrega, t1.Producto, t1.Destino, t1.Moneda, t1.MedioT, t1.TipoM, t1.Entrega FROM condiciones t1 where t1.IdEmpresa = '".$_POST['idempresa']."'";
$id = $_POST['idempresa'];
}else{$sql = "select IdEmpresa, IdDestino, Destino, Direccion from destinos";

}
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
<form name='forma' method='post' action='controladorad/updatecondicion.php'> 
<input type='hidden' name='idempresa' value=".$row["IdEmpresa"].">
<input type='hidden' name='idcondicion' value=".$row["IdCondicion"].">
<td height='24'> <label >".$row["IdEmpresa"]."</label> </td>
<td> <label>".$row["IdCondicion"]."</label></td>

 <td>
 ";
  
 
echo "<select name='centroentrega'>";

   
	//get nombre cliente out of id 
	$resultx = $connect->query("select folio, centroentrega from centrosentrega where centroentrega  != '".$row["CentroEntrega"]."'");
	
	echo '<option selected value="'.$row["CentroEntrega"].'">'.$row["CentroEntrega"].'</option>';
	 while ($rowi = $resultx->fetch_assoc()) {

                  unset($name); 
                  $name = $rowi['centroentrega']; 
                  echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';

}
	
	   
    echo "</select>";  
echo "

</td>

<td> 
 ";
  

echo "<select name='producto'>";

   
	//get nombre cliente out of id 
	$resultxp = $connect->query("select folio, producto from productos where producto != '".$row["Producto"]."'");
	echo '<option selected value="'.$row["Producto"].'">'.$row["Producto"].'</option>';
	 while ($rowip = $resultxp->fetch_assoc()) {

                  unset($name); 
                  $namep = $rowip['producto']; 
                  echo '<option value="'.$namep.'" name="producto" id="select">'.$namep.'</option>';

}
	
	   
    echo "</select>"; 
echo "
</td>
<td>"; 
    $resultt = $connect->query("select iddestino, destino from destinos where idempresa= ".$_POST['idempresa']." and destino != '".$row['Destino']."'");

    echo "<select name='destino' id='destinoss' style='width:175px;'>";

 	echo '<option selected value="'.$row["Destino"].'">'.$row["Destino"].' </option>';
    while ($roww = $resultt->fetch_assoc()) {
                  unset($id, $name);
                  $id = $roww['iddestino'];
                  $name = $roww['destino']; 
				 echo '<option value="'.$name.'" name="destino" id="select" >'.$name.'</option>';
}  echo "</select>"; 
echo "
</td>
<td><div align='center'><label>NACIONAL</label></div>

</td>
<td>
<div align='center'><label>AT</label></div>
</td>
<td>
<div align='center'><label>1</label></div>
</td>
<td>  
<select name='entrega' required='required' style=''>
<option selected  value='".$row["Entrega"]."'>".$row["Entrega"]."	
      <option>LAB DESTINO</option> 
	  <option>LAB LLENADERAS</option>  
    </select>
</td>
<td> </td> 
<input type='hidden' name='moneda' value='NACIONAL'>
<input type='hidden' name='mediot' value='AT'>
<input type='hidden' name='tipom' value='1'>
</form>
</tr>";
}

echo "
<tr>
<form name='formaagregar' method='post' action='controladorad/postcondicion.php'> 
<input type='hidden' name='idempresa' value='".$_POST['idempresa']."'>
<input type='hidden' name='moneda' value='NACIONAL'>
<input type='hidden' name='mediot' value='AT'>
<input type='hidden' name='tipom' value='1'>
<td height='24'><label>".$_POST['idempresa']."</label></td>
<td><input type='hidden' name='idcondicion' value =''  size='4'  readonly></td>
 <td>
 ";
  
 
echo "<select name='centroentrega'>";

   
	//get nombre cliente out of id 
	$resultx = $connect->query("select folio, centroentrega from centrosentrega");
	echo ' 
	<option selected value>-----    Seleccione      centro    ----</option> 
	';
	 while ($rowi = $resultx->fetch_assoc()) {

                  unset($name); 
                  $name = $rowi['centroentrega']; 
                  echo '<option value="'.$name.'" name="empresa" id="select">'.$name.'</option>';

}
	
	   
    echo "</select>"; 
echo "
</td>
<td> 
 ";
  
 
echo "<select name='producto'>";

   
	//get nombre cliente out of id 
	$resultxp = $connect->query("select folio, producto from productos where producto != '".$row["producto"]."'");
	echo '<option selected value>    Seleccione      producto  </option> ';
	 while ($rowip = $resultxp->fetch_assoc()) {

                  unset($name); 
                  $namep = $rowip['producto']; 
                  echo '<option value="'.$namep.'" name="producto" id="select">'.$namep.'</option>';

}
	
	   
    echo "</select>"; 
echo "
</td>
<td>"; 
    $resultt = $connect->query("select iddestino, destino from destinos where idempresa= ".$_POST['idempresa']."");

    echo "<select name='destino' id='destinoss' style='width:175px;' required='required'>";
 echo '<option selected> Seleccione </option>';
    while ($roww = $resultt->fetch_assoc()) {
                  unset($id, $name);
                  $id = $roww['iddestino'];
                  $name = $roww['destino']; 
				 echo '<option value="'.$name.'" name="destino" id="select">'.$name.'</option>';
}  echo "</select>"; 
echo "
</td>
<td><div align='center'><label>NACIONAL</label></div>

</td>
<td>
<div align='center'><label>AT</label></div>
</td>
<td>
<div align='center'><label>1</label></div>
</td>
<td>
<select name='entrega' required='required' style=''>
<option selected  value> Seleccione
      <option>LAB DESTINO</option> 
	  <option>LAB LLENADERAS</option>  
    </select>
</td>
<td><input type='Submit' value=' Agregar    '></td>
</form>
</tr>


";


echo "</table>";
} else { echo "0 results";

echo "
<tr>
<form name='formaagregar' method='post' action='controladorad/postcondicion.php'> 
<input type='hidden' name='idempresa' value=".$id.">
<input type='hidden' name='moneda' value='NACIONAL'>
<input type='hidden' name='mediot' value='AT'>
<input type='hidden' name='tipom' value='1'>
<td height='24'><label>".$id."</label></td>
<td><input type='hidden' name='idcondicion' value =''  size='4'  readonly></td>
<td>
<select name='centroentrega' required='required'>     
      <option selected value>-----    Seleccione      centro    ----</option>  
	    <option>629-TAD MAZATLAN, SIN.</option>  
		<option>633-TAD TEPIC NAYARIT.</option>
        <option>613-TAD Gomez Palacio, Dgo.</option>
        <option>614-TAD Durango, Dgo.</option>
    </select>
</td>

<td>
<select name='producto' required='required' style='width:120px'>
<option selected  value> Seleccione Producto 
      <option>GASOLINA 87 OCT</option> 
      <option>GASOLINA 91 OCT</option>
      <option>DIESEL</option>
    </select>
</td>
<td>"; 
    $resultt = $connect->query("select iddestino, destino from destinos where idempresa= ".$_POST['idempresa']."");

    echo "<select name='destino' id='destinoss' style='width:150px;' required='required'>";
 echo '<option selected> Seleccione </option>';
    while ($roww = $resultt->fetch_assoc()) {
                  unset($id, $name);
                  $id = $roww['iddestino'];
                  $name = $roww['destino']; 
				 echo '<option value="'.$name.'" name="destino" id="select" >'.$name.'</option>';
}  echo "</select>"; 
echo "
</td>
<td>
<div align='center'><label>NACIONAL</label></div>
</td>
<td>
<div align='center'><label>AT</label></div>
</td>
<td>
<div align='center'><label>1</label></div>
</td>
<td>
<select name='entrega' required='required' style=''>
<option selected  value> Seleccione
      <option>LAB DESTINO</option> 
	  <option>LAB LLENADERAS</option>  
    </select>
</td>
<td><input type='Submit' value=' Agregar    '></td>
</form>
</tr>


";
 }
$connect->close();
?>
</table>
    
    
		
            
            
            
            
            <br><br>
            
		
			
	</div> 	
		
						
	
	<form action="LoginServlet" method="post">
	</form>
	
	<div id="maincontent"> 
	
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