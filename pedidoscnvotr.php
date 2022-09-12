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

	<p class="textoEjecutivo" align="center"  id="un"> 
    
     
   
  
<script type="text/JavaScript">
            $("#un").load("controlador/tppedidosu.php");
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
				
	  echo "window.location.href='pedidoscnvo.php';";
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
							 <a  href="menu_cte" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Programa de entregas interactivo</a>
							
					  </div>

						
				</div>
			
	
			
	
	
 



 
		
		<div id="maincontent"></div>		
	 
	
	  
			
		
	<div id="maincontent" align="center"> 	
     

       
       <form name="forma1" method="post" action="pedidoscnvotr" >
       
        <?php
echo '<input type="hidden" name="IdEmpresa" value="'. $_SESSION["idempresa"] .'">';

$f = $_POST['fini'];
	 $ingresada = str_replace('/', '-', $f);
	// $ingresada = strtotime($string);
	 
	 $date = date('Y-m-d',time());//date variable
	 $MinDate =  date('d-m-Y', strtotime($date. ' + 1 days')); 
	 $MaxDate =  date('d-m-Y', strtotime($date. ' + 10 days')); 


       ?> <input type="hidden" name="IdEmpresa" value="2510">
       	<table align="center" class="parametros"> 
      <?php echo ' <label id="lblCaptchaRequired"  class="error" style="color: red" hidden> La fecha debe de estar en el rango: '.$MinDate.' al '.$MaxDate.' </label>'; ?> <br><br>
			<tr>
				<td class="color_blanco"><b>Fecha de Entrega:</b></td>
				<td class="color_blanco">
                <?php
				if (isset($_POST['fini'])) {
					 echo '<input type="text" name="fini" value="'.$_POST['fini'].'" id="dateDefaultj">
					  
					 ';
				}
				else {
					 echo '<input type="text" name="fini" value="00/00/0000" id="dateDefault">';
				}
               
				?>
                
				 </td>
                 	
			</tr>
            <tr>
				<td class="color_blanco"><b>Centro de Entrega:</b></td>
				<td class="color_blanco">
                 <?php
 
echo '<select name="CentroEntrega">';

   
	//get nombre cliente out of id 
	$resultx = $connect->query("select folio, centroentrega from centrosentrega");
	echo '<option selected>'.$_POST['CentroEntrega'].'</option>';
	 while ($row = $resultx->fetch_assoc()) {

                  unset($name); 
                  $name = $row['centroentrega']; 
                  echo '<option value="'.$name.'" name="empresa" id="select">'.$name.'</option>';

}
	
	   
    echo "</select>"; 
?>


                
                </td>
			     
                 	
			</tr>
            
            <tr>
				<td class="color_blanco"><b>Medio de Transporte	:</b></td>
				<td class="color_blanco">
                <?php
				
				
				
                  echo '<select name="Autot" style="width:100%;" hidden>';
			if (isset($_POST['fini'])) {	  
	   echo ' <option selected >'.$_POST['Autot'].'</option>
	   </select> ';}	
               
?>

    
     <input type="text" disabled="disabled" value="AUTOTANQUE">
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
<th height="24">Folio</th> 
<th>Producto</th>
<th>Presentacion</th>
<th>Destino</th>
<th>Fecha</th>
<th>Turno</th>
<th>Tonel</th>
<th>Medio</th> 
<th>Transportista</th> 
<th>Capacidad</th> 
<th>Entrega</th> 
<th>Vehiculo</th> 
<th>Chofer</th> 
<th>EstadoAtencion</th>	 
</tr>
 
<?php 
 // Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

$myDate = date('d/m/Y');		

 $sql="";
 
 if(isset($_POST['fini'])){
	  
	 $f = $_POST['fini'];
	 $ingresada = str_replace('/', '-', $f);
	// $ingresada = strtotime($string);
	 
	 $date = date('d-m-Y',time());//date variable
	 $ingresada = date('d-m-Y', strtotime($ingresada. '+ 0 days'));
	 $MinDate =  date('d-m-Y', strtotime($date. ' + 1 days')); 
	 $MaxDate =  date('d-m-Y', strtotime($date. ' + 10 days')); 
	 
	 $Min = strtotime($MinDate);
	 $Max = strtotime($MaxDate);
	 $Ing = strtotime($ingresada);
	 
	  
	 if(($Ing >= $Min) && ($Ing <= $Max)){
	
		 
			 echo '<script>document.getElementById("lblCaptchaRequired").hidden = true;
			 document.getElementById("agg").hidden = false;
		 
		 </script>';

if (isset($_POST['fini'])) {
					$sql = "SELECT folio, CentroEntrega, producto, destino, fecha, presentacion, turno, tonel,  medio, IF(entrega='LAB DESTINO','PEMEX LOGISTICA','COMERCIALIZADORA / FLETERA') as Transportista, capacidad, entrega, vehiculo, chofer, EstadoAtencion FROM pedido where idempresa = '".$_SESSION["idempresa"]."' AND fecha = '".$_POST['fini']."' order by destino";
				}else{				
					$sql = "Select * from pedido where turno = '1'";
					}
					 
$result = $connect->query($sql);
 $cont = 0;
if ($result->num_rows >0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$turno = $row['turno'];
	$destino = $row['destino'];
	$cont = $cont + 1;
echo "<tr> 
<form name='forma' method='post' action='controlador/updatepedidod.php'> 
<input type='hidden' name='folio[]' value=".$row["folio"].">
<input type='hidden' name='producto[]' value='".$row["producto"]."'>
<input type='hidden' name='fecha' value=".$row["fecha"].">
<input type='hidden' name='medio[]' value=".$row["medio"].">
<input type='hidden' name='CentroEntrega' value='".$row["CentroEntrega"]."'>
<input type='hidden' name='destino[]' value=".$row["destino"].">
<input type='hidden' name='entrega[]' value='".$row["entrega"]."'> 
<input type='hidden' name='presentacion[]' value=".$row["presentacion"].">
<td height='24' > <div style='width:40px;' align='center'> <label  >".$row["folio"]." </label> </div></td>

<td> 
 <div  align='center'><label>".$row["producto"]." </label></div> 
</td>
<td > 
<div  align='center'><label>".$row["presentacion"]." </label></div>
</td>
<td>
<div  align='center'><label>".$row["destino"]." </label></div>
</td>
<td><div  align='center'><label>".$row["fecha"]. "</label></div> </td>
<td> <select  name='turno[]' style='width:62px;'>  
<option selected value=".$row['turno'].">Turno ".$row["turno"]."</option>
<option value='1'>Turno 1</option> 
";
if($_SESSION["idempresa"] != '2532'){
echo "<option value='2'>Turno 2</option>";
}
echo "
</select></td>
<td > 
<div  align='center'><label>".$row["tonel"]." </label></div>
</td>
<td> 
<div  align='center'><label>".$row["medio"]." </label></div>

</td>
<td>
<div  align='center'><label>".$row["Transportista"]." </label></div>

</td>
<td> 
<select name='capacidad[]'>
<option selected value=".$row["capacidad"].">".$row["capacidad"]."</option>
"; 
$select = "SELECT t1.idempresa, t2.capacidad from capacidadvehiculos t1 inner join capacidad t2 on t1.id_capacidad = t2.id where t1.activo = '1' and t1.idempresa = '".$_SESSION['idempresa']."'";
	echo $select;
	$resultc = $connect->query($select); 
		if ($resultc->num_rows >0) {
		// output data of each row
		while($rowc = $resultc->fetch_assoc()) {
			echo "<option>".$rowc['capacidad']."</option>";
		}
	}
/*
if($_SESSION["idempresa"] == '2534'){
echo "<option>40000</option>";
}else if($_SESSION["idempresa"] == '2531'){
	echo "<option>31500</option>";
}else if($_SESSION["idempresa"] == '2527'){
	echo "<option>31500</option>";
}else if($_SESSION["idempresa"] == '2533'){
	echo "<option>31500</option>";
}else if ($_SESSION["idempresa"] == '2522'){
	
}else{
echo "";
}
  
*/
echo "
";

 
echo "
</select>
</td>
<td> 
<div  align='center'><label>".$row["entrega"]."</label></div>
</td>
<td >";

if($row["entrega"]== 'LAB LLENADERAS'){

 
    $resultt = $connect->query("select idvehiculo, vehiculo from vehiculos where idempresa= '".$_SESSION["idempresa"]."' ");

    echo "<select name='vehiculo[]' id='vehiculolista' style='width:75px;'>";
 echo '<option selected value='.$row["vehiculo"].'>'.$row['vehiculo'].'</option>';
    while ($roww = $resultt->fetch_assoc()) {

                  unset($id, $name);
                  $id = $roww['idvehiculo'];
                  $name = $roww["vehiculo"]; 
				 
              echo '<option value="'.$name.'" name="vehiculo" id="selectt" >'.$name.'</option>';
} 
    echo "</select>"; 
}else{
	echo"<input type='hidden' name='vehiculo[]' value=''>";
	if($row['capacidad'] == 20000){
		
		echo "<div  align='center'><label><option>PMX20000</label></div>";
		}
		if($row['capacidad'] == 15000){
		echo "<div  align='center'><label>PMX15000</label></div>";
		}if($row['capacidad'] == 30000){
		echo "<div  align='center'><label>PMX30000</label></div>";
		}if($row['capacidad'] == 10000){
			echo "<div  align='center'><label>PMX10000</label></div>";
		}
	}


echo "
</td>
<td style='width:180px;'>";
if($row["entrega"]== 'LAB LLENADERAS'){
 
    $resultt = $connect->query("select idchofer, nombre from choferes where idempresa= '".$_SESSION["idempresa"]."' ");

    echo "<select name='chofer[]' id='choferlista' style='width:180px;' >";
 echo '<option selected value="'.$row["chofer"].'">'.$row['chofer'].'</option>';
    while ($roww = $resultt->fetch_assoc()) {

                  unset($id, $name);
                  $id = $roww['idchofer'];
                  $name = $roww["nombre"]; 
				 
                  echo '<option value="'.$name.'" name="chofer" id="select" >'.$name.'</option>';
} 
    echo "</select>"; 

} else {
	echo"<input type='hidden' name='chofer[]' value=''>";
	}
echo "
</td>

<td>
<select name='estadoatencion[]'  onchange='choice1(this);'>
<option selected >".$row["EstadoAtencion"]."</option> 
<option>CONFIRMADO CLIENTE</option> 
<option>CANCELADO</option>   
</select>
 </td>

</tr>";
}


if (isset($_POST['fini'])) {

}


 

echo " 


<tr>
<td class='color_blanco'>Registros: ".$cont."</td>
<td class='color_blanco'></td>
<td class='color_blanco'></td> 
</tr>
 <table><td class='color_blanco'></td><tr><td class='color_blanco'></td><tr>
<td class='color_blanco'></td><tr><td class='color_blanco'></td><tr><td class='color_blanco'><input type='submit' name='dos' value='Actualizar'></td>
</table>


		
	
	

 </form>
</table>";
} else { echo "<b>No existen embarques programados.</b>"; 







}
	
echo"
</div> 	
		
						
	
	<form action='LoginServlet' method='post'>
	</form>
	
	<div id='maincontent'> 
		<table align='center' ><form name='forma' method='post' action='pedidoscnvotrr'>
        <td class='color_blanco'> ";
        if (isset($_POST['fini'])) {	
        echo "
        <input type='hidden' name='fini' value=".$_POST['fini']." >		  
	    <input type='hidden' name='Autot' value=".$_POST['Autot']." >	
		<input type='hidden' name='CentroEntrega' value='".$_POST['CentroEntrega']."' >		
		";		
		}            
		echo "
        <input type='Submit'  value='Agregar' ></td>
        </form>
			<tr class='link' align='center'>
				
				<td colspan='4' align='center' class='color_blanco'> 
					<b>.....</b> 
				</td> 
			</tr>
		</table>  
        
	</div> 
";
	 
		 }
	
	 
	 else{ 
		 
 
 	
		 echo '<script>document.getElementById("lblCaptchaRequired").hidden = false;
		 
		 </script>';
 
				
	 }
 }
$connect->close();
?>
</table>
    
    
		
            
            
            
		
	


	
	



 
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


<?php

if (isset($_SESSION["idempresa"]) == "2535"){
	//print_r($_POST);
}
?> 



</body>
</html>
    
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
   var datav = new FormData(); 
    var ajaxv = new XMLHttpRequest();
    
	  
	ajaxv.open("GET", "datavehiculodos.php?value="+value,true);
	ajaxv.send();

 doThisOnChangeC();
    ajaxv.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var datav = JSON.parse(this.responseText);
            console.log(datav);

            var html = '';
            for(var av = 0; av < datav.length; av++) {
                var firstNamev = datav[av].idvehiculo;
                var lastNamev = datav[av].vehiculo; 
                
                selectElementv.add(new Option(lastNamev)); 

            }
         //   document.getElementById("data").innerHTML += html;
        }
        
       
    };
}

</script>
  
  
  
   <!-- script choferes -->
  <script>
  

 doThisOnChangeC = function(value, optionIndex)
    { 
 var selectElement = document.getElementById("choferes");
 while (selectElement.options.length > 0) {                
        selectElement.remove(0);
    }  


	var dataa = new FormData(); 
    var ajax = new XMLHttpRequest();
    
	  
	ajax.open("GET", "datachoferdos.php?value="+value,true);
	ajax.send();


    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);

            var html = '';
            for(var a = 0; a < data.length; a++) {
                var firstName = data[a].idchofer;
                var lastName = data[a].nombre; 
                
                selectElement.add(new Option(lastName)); 

            }
            document.getElementById("data").innerHTML += html;
        }
    };
}

</script>


<script>


function choice1(select) {

if(select.options[select.selectedIndex].text == 'CANCELADO'){
alert("Si cancelado un pedido, es posible que este pedido no pueda ser reprogramado");
}

}


</script>


  <?php
  
if(isset($_POST['cancelado'])){
	
	echo '<script>alert("'.$_POST['cancelado'].'");</script>';
	}
?>
    
    
    <?php 
	 
	 if(isset($_POST["mensaje"]))
	 {
		echo "<script>window.alert('".$_POST['mensaje']."');</script>";
		 }else{  }
		 
		 
		 ?>