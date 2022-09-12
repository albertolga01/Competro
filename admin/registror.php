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
    
    <SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>
	

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

    <script> 
        var usuario = '<?php echo $_SESSION['usuario']; ?>'; 
        var rfc = '<?php echo $_SESSION['rfc']; ?>'; 
        renderHeader(usuario, rfc);
    </script>
 
    <script type="text/JavaScript">
            $("#un").load("controladorad/tpregistror.php");
    </script>
        
	
	
	

</div>

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
				
	  //echo "window.location.href='pedidoscadmin.php';";
				}  
?>}
</script>

<!-- FIN DEL ENCABEZADO --> 


	


	


	<!--Ruteo de la página-->
	
		  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					 
							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="#" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;<a  href="#" >Registro de operaciones</a>&nbsp;
							
					  </div>

						
				</div>
			
	
			
	
	
 

 
	
	  
			
		
	<div id="maincontent" align="center"> 	
       <br><br>
       
       <form name="forma1" method="post" action="registror">
       
       
     
       
       
       	<table align="center" class="parametros">
			<tr>
				<td class="color_blanco"><b>Fecha Inicial:</b></td>
				<td class="color_blanco">
                
                <?php 
				
				if(isset($_POST['fini'])){
				$fecha = $_POST['fini'];  echo '<input type="text" value= "'. $_POST['fini'].'" name="fini" id="dateDefaultj">'; }
				else{
					echo '<input type="text" value= "" name="fini" id="dateDefault">';
					}
				?>
                </td>
				 
			</tr>
          <tr>
				<td class="color_blanco"><b>Fecha Final:</b></td>
				<td class="color_blanco">
                
                <?php 
				if(isset($_POST['finial'])){
				$fecha = $_POST['finial'];  echo '<input type="text" value= "'. $_POST['finial'].'" name="finial" id="dateDefaultfinalj">'; }
				else{
					echo '<input type="text" value= "" name="finial" id="dateDefaultfinal">';
					}?>
                </td>
				 
			</tr>
            
			
             <tr class="color_non"> 
           <td class="color_blanco"><b>Tipo Proceso:</b></td>		
				<td colspan="1" class="color_blanco">
					<select name="tipo">
                        <?php 
					if(isset($_POST['tipo'])){
						echo '<option selected value= "'.$_POST['tipo'].'" >'; 
						
						}else{
							}	
						
				   echo ''.$_POST['tipo'].'';?> 
						<option value= "Semanal" >Semanal</option>
                         <option  value= "Diario" >Diario</option>
					</select>
				</td>
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
	echo "<option>TODOS</option>";
	}
?> </td>
				 
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
 
      <script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->

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

';
$CapacidadFinal;

// Check connection 
$Fecha = $_POST['fini'];  
if ($connect->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$string = str_replace('/', '-', $Fecha); 
$stringg = date('Y-m-d', strtotime($string));

 if($_POST["IdEmpresa"] == 'TODOS')
	{		
  	$sql = "Select IdRegistro, NoPedido, IdEmpresa, Fecha, Usuario, Descripcion from registro where date(fecha) = '".$stringg."'";
	}else  { 
	
		 $sql = "Select IdRegistro, NoPedido, IdEmpresa, Fecha, Usuario, Descripcion from registro where date(fecha) = '".$stringg."' and IdEmpresa = '".$_POST['IdEmpresa']."'";
		}
		
		 
  

$result = $connect->query($sql);
if ($result->num_rows > 0) {
	echo '<table align="center" id="table">
<td class="color_blanco">
<b style="align: left;"> Fecha: </b> 
<br>
<b>'.$_POST['fini'].'</b>
</td>
<tr>
<th style="height:25px;">ID Registro</th>
<th>ID Empresa</th>
<th>Fecha</th>
<th>Folio Pedido</th>
<th>Usuario</th>
<th>Descripcion</th>
</tr>';
// output data of each row
while($row = $result->fetch_assoc()) {

echo "<tr>
<form name='forma' method='post' action='ActualizarPedido.php'> 
<td> <div style='height:25px; '> <label style='width:40px;
  display: inline-block; height:25px;   align: center;'>".$row["IdRegistro"]."</label> </div>
 </td>
 <td> <div align='center' style='width:60px;'> <label>".$row["IdEmpresa"]."</label> </div>
 </td>
<td> <div align='center' style='width:130px;'><label >".$row["Fecha"]."</label>
 </div></td>
  
  <td> <div align='center' style='width:70px;'><label >".$row["NoPedido"]."</label>
 </div></td>
<td> <div align='center' style='width:110px;'> <label>".$row["Usuario"]."</label> </div></td>
<td> <div align='center' style='width:110px;'> <label >".$row["Descripcion"]."</label> </div></td>

   

 </form></tr>"

;
}
echo '
<table>

<td class="color_blanco" style="background-color: white;"></td>

<td class="color_blanco"  style="background-color: white;">

</td>
<td class="color_blanco" style="background-color: white;"><pre>                                                                                                                                       </pre></td>

<td class="color_blanco"  style="background-color: white;">


</td>
</table>

';
} else { echo "0 results"; }
$connect->close();
echo'
</table>


';
}




if($tipo === 'Semanal'){
	
// Check connection
 
$Fecha = $_POST['fini']; 
$inicial = $_POST['fini'];
$final = $_POST['finial'];


if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

  $sqld = "select date(fecha) as fecha from registro where date(fecha) >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and date(fecha) <= STR_TO_DATE('".$final."', '%d/%m/%Y') group by date(fecha)";

	

$resultd = $connect->query($sqld);
if ($resultd->num_rows > 0) {
// output data of each row
while($rowd = $resultd->fetch_assoc()) {
		echo '
<table align="center">
<td class="color_blanco">
<b style="align: left;"> Fecha: </b> 
<br>
<b>'.$rowd["fecha"].'</b>
</td>

<tr>
<th style="height:25px;">ID Registro</th>
<th>ID Empresa</th>
<th>Fecha</th>
<th>Folio Pedido</th>
<th>Usuario</th>
<th>Descripcion</th>
</tr>
';

// Check connection
 
$Fecha = $_POST['fini'];  

if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
 
$string = str_replace('/', '-', $Fecha); 
$stringg = date('Y-m-d', strtotime($string));
   if($_POST["IdEmpresa"] == 'TODOS')
	{		
  	$sql = "Select IdRegistro, NoPedido, IdEmpresa, Fecha, Usuario, Descripcion from registro where date(fecha) = '".$stringg."'";
	}else  {
		
	
		 $sql = "Select IdRegistro, NoPedido, IdEmpresa, Fecha, Usuario, Descripcion from registro where date(fecha) = '".$stringg."' and IdEmpresa = '".$_POST['IdEmpresa']."'";
		} 
		 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
<form name='forma' method='post' action='ActualizarPedido.php'> 
<td> <div style='height:25px; '> <label style='width:40px;
  display: inline-block; height:25px;   align: center;'>".$row["IdRegistro"]."</label> </div>
 </td>
 <td> <div align='center' style='width:60px;'> <label>".$row["IdEmpresa"]."</label> </div>
 </td>
<td> <div align='center' style='width:130px;'><label >".$row["Fecha"]."</label>
 </div></td>
 <td> <div align='center' style='width:70px;'><label >".$row["NoPedido"]."</label>
 </div></td>
  
<td> <div align='center' style='width:110px;'> <label>".$row["Usuario"]."</label> </div></td>
<td> <div align='center' style='width:110px;'> <label >".$row["Descripcion"]."</label> </div></td>

   

 </form></tr>";
}
echo "</table>
<table>

<td class='color_blanco' style='background-color: white;'></td>

<td class='color_blanco'  style='background-color: white;'>

</td>
<td class='color_blanco' style='background-color: white;'><pre>                                                                                                                                                    </pre></td>

<td class='color_blanco'  style='background-color: white;'>

</td>
</table>

";
} else { echo "0 results"; }

echo'
</table>

<br><br><br>

';


	
	
}		




echo '
</table>
<table>

</table>';


} else { echo "0 results"; }
try {
	//$connect->close();
} catch (Exception $e) {
    
}

$connect->close();

	}
	
	
					
}


?>
    
    
		
            
            
            
            
            <br><br>
            
		
			
	</div> 	
		
						
	
	 
	 
        
        
        
        
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