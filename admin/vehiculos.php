
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
	<li class="bar"><a href="menu_graladmin.php" class="baritem">Consulta General</a>
	</li>

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
							 <a class=bold href="#">Vehiculos / Choferes</a>
							
					  </div>

						
				</div>
			
	
			
	
	
 




	<form method="post" action="controlador" name="forma">
		<input type="hidden" name="Destino" value="scpei004_01.jsp">
		<input type="hidden" name="ErrorParams" value="scpei004_01.jsp">
		
		<div id="maincontent"></div>		
	</form>
	
	
	  
			
		
	<div id="maincontent" align="center"> 	
       <br><br>
       
       <form name="forma1" method="post" action="pedidosr.php">
       
       	<table align="center" class="parametros">
			
			<tr>
				<td class="color_blanco"><b>Cliente:</b></td>
				<td class="color_blanco">
                <?php
 



    $result = $connect->query("select IdEmpresa, usuario from empresa where idempresa = '".$_POST['idempresa']."'");

    echo "<select name='idempresa' id='IdEmpresa'>";

    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['IdEmpresa'];
                  $name = $row['usuario']; 
                  echo '<option value="'.$id.'" name="idempresa" id="select">'.$name.'</option>';

}
    echo "</select>"; 
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
<th style="height:25px;">ID Empresa</th>
<th>ID Vehiculo</th>
<th>Vehiculo</th>
<th>Descripcion</th>
<th>Actualizar</th>
</tr>
<?php
 
// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
$sql = "SELECT IdEmpresa, IdVehiculo, Vehiculo, Descripcion FROM vehiculos where IdEmpresa = '".$_POST['idempresa']."'";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
<form name='forma' method='post' action='controladorad/updatevehiculo.php'> 
<input type='hidden' name='idempresa' value=".$row["IdEmpresa"].">
<input type='hidden' name='idvehiculo' value=".$row["IdVehiculo"].">
<td  style='height:25px;'>  <label>".$row["IdEmpresa"]."</label></td>
<td>  <label>".$row["IdVehiculo"]."</label></td>
<td>  <input type='text' name='vehiculo' value ='".$row["Vehiculo"]."' size='35'   ></td>
<td>  <input type='text' name='descripcion' value ='".$row["Descripcion"]."' size='35'   ></td>

<td><input name='update' type='Submit' value='Actualizar  '></td> 
</form>
</tr>";
}

echo "
<tr>
<form name='formaagregar' method='post' action='controladorad/postvehiculo.php'> 
<input type='hidden' name='idempresa' value=".$_POST['idempresa'].">
<td style='height:25px;'><label>".$_POST['idempresa']."</label></td>
<td><input type='text'  name='idvehiculo' value ='' size='4' readonly ></td>
<td><input type='text' name='vehiculo' value ='' size='35'   ></td>
<td><input type='text' name='descripcion' value ='' size='35'   ></td>
<td><input type='Submit' value=' Agregar    '></td>
</form>
</tr>


";


echo "</table>";
} else { echo "0 results";

echo "
<tr>
<form name='formaagregar' method='post' action='controladorad/postvehiculo.php'> 
<input type='hidden' name='idempresa' value=".$_POST['idempresa'].">
<td  style='height:25px;'><label>".$_POST['idempresa']."</label>
</td>
<td><input type='text' name='idvehiculo' value ='' size='4' readonly ></td>
<td><input type='text' name='vehiculo' value ='' size='35'   ></td>
<td><input type='text' name='descripcion' value ='' size='35'   ></td>
<td><input type='Submit' value=' Agregar    '></td>
</form>
</tr>


";
 } 
?>
</table>
    
    
		
            
            
            
            
            <br><br>
            
             <br><br>
       
       <form name="forma1" method="post" action="pedidosr.php">
       
       
        
            	 
    </form>
    
      
    
<table align="center">
<tr>
<th style="height:25px;">ID Empresa</th>
<th>No. Chofer</th>
<th>Nombre</th>
<th>Actualizar</th>
</tr>
<?php 
// Check connection
 
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
$sqlt = "SELECT idempresa, IdChofer, Nombre FROM choferes where IdEmpresa = '".$_POST['idempresa']."'";
$resultt = $connect->query($sqlt);
if ($resultt->num_rows > 0) {
// output data of each row
while($rowt = $resultt->fetch_assoc()) {
echo "<tr>
<form name='forma' method='post' action='controladorad/updatechofer.php'> 
<input type='hidden' name='idempresa' value=".$rowt["idempresa"].">
<input type='hidden' name='idchofer' value=".$rowt["IdChofer"].">
<td  style='height:25px;'>   <label>".$rowt["idempresa"]."</label></td>
<td>   <label>".$rowt["IdChofer"]."</label></td>
<td>  <input type='text' name='nombre' value ='".$rowt["Nombre"]."' size='35'   ></td>
<td><input name='update' type='Submit' value='Actualizar  '></td> 
</form>
</tr>";
}

echo "
<tr>
<form name='formaagregar' method='post' action='controladorad/postchofer.php'> 
<input type='hidden' name='idempresa' value=".$_POST['idempresa'].">
<td  style='height:25px;'><label>".$_POST['idempresa']."</label></td>
<td><input type='text' name='idchofer' value ='' size='4'  readonly></td>
<td><input type='text' name='nombre' value ='' size='35'   ></td>
<td><input type='Submit' value=' Agregar    '></td>
</form>
</tr>


";


echo "</table>";
} else { echo "0 results";

echo "
<tr>
<form name='formaagregar' method='post' action='controladorad/postchofer.php'> 
<input type='hidden' name='idempresa' value=".$_POST['idempresa'].">
<td  style='height:25px;'><label>".$_POST['idempresa']."</label></td>
<td><input type='text' name='idchofer' value ='' size='4' readonly ></td>
<td><input type='text' name='nombre' value ='' size='35'   ></td>
<td><input type='Submit' value=' Agregar    '></td>
</form>
</tr>


";
 }
 
?>
</table>
          


<br>
<br>
<br>



<table align="center">
<tr>
<th style="height:25px;">ID Empresa</th>
<th>Capacidad</th>
<th>Descripción</th>
<th>Actualizar</th>
</tr>
<?php 
// Check connection
 
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
$sqlt = "SELECT t1.idempresa, t1.id, t2.capacidad, t2.descripcion, t1.activo from capacidadvehiculos t1 inner join capacidad t2 on t1.id_capacidad = t2.id where IdEmpresa = '".$_POST['idempresa']."' and t1.activo = '1'";
 
$resultt = $connect->query($sqlt);
if ($resultt->num_rows > 0) {
// output data of each row
while($rowt = $resultt->fetch_assoc()) {
echo "<tr>
<form name='forma' method='post' action='controladorad/updatecapacidad.php'> 
<input type='hidden' name='idempresa' value=".$rowt["idempresa"].">
<input type='hidden' name='idcapacidad' value=".$rowt["idcapacidad"].">
<input type='id' name='id' value=".$rowt["id"]." hidden>
<td  style='height:25px;'>   <label>".$rowt["idempresa"]."</label></td>
<td>   <label>".$rowt["capacidad"]."</label></td>
<td> <label>".$rowt["descripcion"]."</label></td>
<td><input name='update' type='Submit' value='Eliminar  '></td> 
</form>
</tr>";
}
$Capcidad = "SELECT id, capacidad, descripcion from capacidad";
$resultc = $connect->query($Capcidad);
$arraycap  = array();
$i = 0;
if ($resultc->num_rows > 0) { 
    while($rowc = $resultc->fetch_assoc()) {
        $arraycap[$i] = array(
            "capacidad" => $rowc['capacidad'],
            "descripcion" => $rowc['descripcion'],
            "id" => $rowc['id']
        );
        $i++;
    }
} 
echo "

<tr>
<form name='formaagregar' method='post' action='controladorad/postcapacidad.php'> 
<input type='hidden' name='idempresa' value=".$_POST['idempresa'].">
<td  style='height:25px;'><label>".$_POST['idempresa']."</label></td>
<td><select   name='idcapacidad' >
";
foreach($arraycap as $c){
    echo '<option value='.$c['id'].'>'.$c['descripcion'].'</option>';
}
echo "
</select>
</td>
<td> </td>
<td><input type='Submit' value=' Agregar    '></td>
</form>
</tr>


";


echo "</table>";
} else { echo "0 results";
$Capcidad = "SELECT id, capacidad, descripcion from capacidad";
$resultc = $connect->query($Capcidad);
$arraycap  = array();
$i = 0;
if ($resultc->num_rows > 0) { 
    while($rowc = $resultc->fetch_assoc()) {
        $arraycap[$i] = array(
            "capacidad" => $rowc['capacidad'],
            "descripcion" => $rowc['descripcion'],
            "id" => $rowc['id']
        );
        $i++;
    }
} 
echo "
<tr>
<form name='formaagregar' method='post' action='controladorad/postcapacidad.php'> 
<input type='hidden' name='idempresa' value=".$_POST['idempresa'].">
<td  style='height:25px;'><label>".$_POST['idempresa']."</label></td>
<td><select   name='idcapacidad' >
";
foreach($arraycap as $c){
    echo '<option value='.$c['id'].'>'.$c['descripcion'].'</option>';
}
echo "
</select>
</td>
<td> </td>
<td><input type='Submit' value=' Agregar    '></td>
</form>
</tr>


";
 }
$connect->close();
?>
</table>
            
		
		
			
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
  
  <?php 
	 
	 if(isset($_POST["mensaje"]))
	 {
		echo "<script>window.alert('".$_POST['mensaje']."');</script>";
		 }else{  }
		 
		 
		 ?>