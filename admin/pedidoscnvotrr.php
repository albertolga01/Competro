
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
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
	
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
    
			<script> 
  $( function() {
    $( "#dateDefault").datepicker(); 
  } );
  </script>
			
	 
    
    
    
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
				
	  echo "window.location.href='pedidoscnvotradmin.php';";
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
							 <a  href="#" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Programa de entregas interactivo</a>
							
					  </div>

						
				</div>
			
	
			
	
	
 




	 
	
	
	  
			
		
	         <div id="maincontent" align="center"> 	
       
       
       <form name="forma1" method="post" action="pedidoscnvotradmin">
       
        <?php
echo '<input type="hidden" name="IdEmpresa" value="'. $_SESSION["idempresa"] .'">';
?>
       <input type="hidden" name="IdEmpresa" value="2510">
       	<table align="center" class="parametros">
			<tr>
				<td class="color_blanco"><b>Fecha de Entrega:</b></td>
				<td class="color_blanco">
                <?php
				if (isset($_POST['fini'])) {
					 echo '<input type="text" id="dateDefault" name="fini" value="'.$_POST['fini'].'" >';
				}
				else {
					 echo '<input type="text" id="dateDefault" name="fini" value="00/00/0000" >';
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
				<td class="color_blanco"><b>Medio de Transporte:</b></td>
				<td class="color_blanco">
                
                 <select name="Autot" style="width:100%;" hidden>
     
      <option selected>AUTOTANQUE</option>   


    </select>
    
    <input type="text" disabled="disabled" value="AUTOTANQUE">
	
				 </td>
                 
			</tr>
		
          
            
			
		</table>
       
 <br>
            	
            <table align="center">
	    	<tr>
	    	<td align="center" class="color_blanco">
            
            <input type="Submit" value="Regresar" ></td>
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
<th height="24">Seleciona Condicion</th>
<th>Producto</th>
<th>Presentacion</th>
<th>Destino</th>
<th>Moneda</th>
<th>Medio transporte</th>
<th>Tipo medio</th>
<th>Fecha</th>
<th>Condición de entrega</th>  
</tr>

<?php

 
// Check connection


if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

$myDate = date('d/m/Y');		

 $sql="";
				if (isset($_POST['fini'])) {
					$sql = "SELECT t1.idempresa, t1.IdCondicion, t1.CentroEntrega, t1.producto, t1.destino, t1.mediot, t1.tipom, t1.entrega FROM condiciones t1   where IdEmpresa = '".$_POST['idempresa']."' and CentroEntrega = '".$_POST['CentroEntrega']."'"; 
				} 

 
$result = $connect->query($sql);
 
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {  
echo "<tr> 
<form name='forma' method='post' action='controladorad/postpedidodd.php'> 
<input type='hidden' name='idempresa' value=".$row['idempresa'].">
<input type='hidden' name='fecha' value=".$_POST['fini'].">
<input type='hidden' name='centroentrega' value='".$_POST["CentroEntrega"]."'> 
<input type='hidden' name='producto[]'  id='".$row["IdCondicion"]."'  value='".$row["IdCondicion"]."'>
<input type='hidden' name='destino[]' id='".$row["destino"]."' value='".$row["destino"]."'>
<input type='hidden' name='entrega[]' value='".$row["entrega"]."'>
<input type='hidden' name='medio[]' value='".$row["mediot"]."'>
<input type='hidden' name='idcondicion[]' id='".$row["IdCondicion"]."' value='".$row["IdCondicion"]."'>
<input type='hidden' name='presentacion[]' value='M3'>

 

<td> <div align='center'> <input type='checkbox' name='sel[]' onclick='Count(this)' id=".$row["IdCondicion"]."  value=".$row["IdCondicion"]."></div></td>
<td>
<label>".$row["producto"]."</label>
</td>
<td> <div align='center'>
<label>M3</label> </div>
</td>
<td>
<label>".$row["destino"]."</label>
</td>
<td>
<label>MONEDA NACIONAL</label>
</td>
<td> <div align='center'>
<label>".$row["mediot"]."</label> </div>
</td>
<td> <div align='center'>
<label>".$row["tipom"]."</label> </div>
</td>
<td>
<label id='label'>".$_POST['fini']."</label>
</td>
<td><div align='center'>
<label>".$row["entrega"]."</label> </div>
</td>




</tr>

";
}
echo "
<tr>
<td class='color_blanco'><label id ='label_id'></label></td>
<td class='color_blanco'></td>
<td class='color_blanco'></td> 
</tr>
";
if (isset($_POST['fini'])) {
echo "
<table><td class='color_blanco'></td><tr><td class='color_blanco'></td><tr>
<td class='color_blanco'></td><tr><td class='color_blanco'></td><tr><td class='color_blanco'>
<input type='submit' name='dos' value='Agregar'></td>
</table>
</form>
";
}

echo "</table> <br><br><br> <td> "
  ;
} else { echo "0 results"; 








}
$connect->close();
?>
</table>
    
    
		
            
            
            
            
            <br><br>
            
		
			
	</div> 	
		
						
	
	<form action="LoginServlet" method="post">
	</form>
	
	<div id="maincontent"> 
		<table align="center" >
			<tr class="link" align="center">
				
				<td colspan="4" align="center" class="color_blanco"> 
					<b>.....</b> 
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



       <?php 

if(isset($_POST['message'])){
echo "<script>alert('".$_POST['message']."');</script>";

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
 
setInputDate("#label");    
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

 
	 
	 function Count() { 
	 
 
  

 $("#label_id").html("Seleccionado: " + $("input[name='sel[]']:checked").length);

  

 }
 


</script>
 
 
 