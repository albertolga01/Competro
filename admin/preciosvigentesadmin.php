<?php 
$inicial = '';
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
    
    <SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>

	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	
    <link rel="stylesheet" href="styles/calendario.css">
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title> 
	<script language="JavaScript" src="scripts/calendario.js"></script> 
	      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="scripts/uijquery.js"></script> 
    
  <?php 
	 
			echo '<script> 
  $( function() {
    $( "#dateDefault").datepicker(); 
  } );
  </script>';
		 
	?>
    

    <?php 
	 
			echo '<script> 
  $( function() {
    $( "#dateDefaultt").datepicker(); 
  } );
  </script>';
		 
	?>
    
    
<link rel="icon" href="img/favicon.ico"> </head>


<body class="body">
	<div id="extra">&nbsp;</div>

<div id="page">

<div id="header">
    
<script> 
        var usuario = '<?php echo $_SESSION['usuario']; ?>'; 
        var rfc = '<?php echo $_SESSION['rfc']; ?>'; 
        renderHeader(usuario, rfc);
    </script>
 
 <script type="text/JavaScript">
            $("#un").load("controladorad/tppvig.php");
        </script>
        

</div>




<!-- FIN DEL ENCABEZADO --> 


	


	


	<!--Ruteo de la página-->
	
		  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cte" >Servicio a clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;<a  href="#" >Precios Vigentes</a>
					  </div>

						
				</div>
			
	
			
	
	
 




	 
	
	
	  
			
		
	         <div id="maincontent" align="center"> 	
       <br><br>
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


setInputDatee("#dateDefault");  
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
<form name="forma1" method="POST" action="preciosvigentesadmin" enctype="multipart/form-data"> 
 <table> 

 <tr>
				<td class="color_blanco"><b>Seleccionar fecha:</b></td>
				<td class="color_blanco">
                 
 <input type="text" value= "00/00/0000" name="fecha" id="dateDefaultt" style="width:75px;"> 
					 
 
                </td>
				<td class="color_blanco"></td>
			</tr>

   	 
     <tr>
				<td class="color_blanco"><b>Seleccione cliente:</b></td>
				<td class="color_blanco">
                
                <?php
    $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");

    echo "<select name='IdEmpresa' id='IdEmpresa' onchange='doThisOnChangeC(this.value)' style='width:100%;'>
	<option>Seleccione</option>
	";

    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['IdEmpresa'];
                  $name = $row['usuario']; 
                  echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';

} 
echo "<option value='TODOS' name='empresa' id='select;'>TODOS</option>";
    echo "</select>"; 
?> </td></tr> 
				
				 
   
    </table>
    
    <table>
    <tr>
    <td class="color_blanco"> <input type='submit' name='dos' value='Aceptar'></td> 
    </tr>
    </table>
    </form>
<br><br>



<form name="forma1" method="POST" action="controladorad/deletepreciovigente" enctype="multipart/form-data">
    <table>
    <tr>
				<td class="color_blanco"><b>Eliminar para el día:</b></td>
				<td class="color_blanco">
                 
 <input type="text" value= "00/00/0000" name="fecha" id="dateDefault" style="width:75px;"> 
					 
 
                </td>
				<td class="color_blanco"></td>
			</tr>

            <tr>
    <td class="color_blanco" colspan="2" align="center"> <input type='submit' name='dos' value='Eliminar'></td> 
    </tr>
            
</table>
</form>
<br><br>

    <?php 
	
	if(isset($_POST["IdEmpresa"])){
	
    $ano = substr($_POST["fecha"], 6,4);
    $mes = substr($_POST["fecha"], 3,2);
    $dia = substr($_POST["fecha"], 0,2);
    $fecha =  $ano."-".$mes."-".$dia; 
	echo'
   
	
	
	
<table align="center">
<tr> 
<th height="25">Fecha</th>
<th>Centro Entrega</th>
<th>Destino</th>
<th>Producto</th>
<th>Presentación</th>
<th>Moneda</th>
<th>Precio de facturación</th>
<th>Precio de PEMEX</th>
<th>Comisión</th>
<th>Unidades</th> 
</tr> ';
 
 
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

$myDate = date('d/m/Y');
if($_POST["IdEmpresa"] != "TODOS"){
$sql = "SELECT t1.Fecha, 
if(t1.producto = 'Magna',(SELECT Magna from decuentovigente where Magna is not null and fecha <= '".$fecha."' order by Fecha desc limit 1), 
if(t1.producto = 'Premium',(SELECT Premium from decuentovigente where Premium is not null and fecha <= '".$fecha."' order by Fecha desc limit 1), 
(SELECT Diesel from decuentovigente where Diesel is not null and fecha <= '".$fecha."' order by Fecha desc limit 1))) as descuento, 
t1.CentroEntrega as CentroEntrega, t1.Destino as Destino, t1.producto as Producto, t1.Precio as Precio,  t3.porcentaje, t3.porcentajepremium, t3.porcentajediesel  
from precioventavigente t1 INNER JOIN destinos t2  on t1.Destino = t2.Destino  inner join estadocuenta t3 on t2.IdEmpresa  = t3.IdEmpresa WHERE 
t1.Fecha = '".$fecha."' and t2.IdEmpresa = '".$_POST["IdEmpresa"]."' order by fecha desc ";
}else{
    $sql = "SELECT t1.Fecha, 
    if(t1.producto = 'Magna',(SELECT Magna from decuentovigente where Magna is not null and fecha <= '".$fecha."' order by Fecha desc limit 1), 
    if(t1.producto = 'Premium',(SELECT Premium from decuentovigente where Premium is not null and fecha <= '".$fecha."' order by Fecha desc limit 1), 
    (SELECT Diesel from decuentovigente where Diesel is not null and fecha <= '".$fecha."' order by Fecha desc limit 1))) as descuento, 
    t1.CentroEntrega as CentroEntrega, t1.Destino as Destino, t1.producto as Producto, t1.Precio as Precio,  t3.porcentaje, t3.porcentajepremium, t3.porcentajediesel  
    from precioventavigente t1 INNER JOIN destinos t2  on t1.Destino = t2.Destino  inner join estadocuenta t3 on t2.IdEmpresa  = t3.IdEmpresa WHERE 
    t1.Fecha = '".$fecha."'  order by fecha desc ";
   
}


$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	
$porcentaje = 0;
	
	if($row["Producto"] == 'Magna'){
		$Pro = '32025-GASOLINA 87 OCT';
		$porcentaje = $row["porcentaje"];
		}	if($row["Producto"] == 'Premium'){
		$Pro = '32026-GASOLINA 91 OCT';
		$porcentaje = $row["porcentajepremium"];
		}	if($row["Producto"] == 'Diesel'){
		$Pro = '34015-DIESEL AUTOM';
		$porcentaje = $row["porcentajediesel"];
		}
	$precioo = ($row["Precio"] * 1000) + 50;

	$com = 1 - ($porcentaje/100);	
	$desc2 = ($row["descuento"] + 100) * 1.16;
	$precio2 = $desc2 + ($row["Precio"] * 1000);
    $concoTradicional = ((($row["descuento"] + 50) * $com) * 1.16);

	$descr = ($row["descuento"] + 50) * $com;
	$dif = ($row["descuento"] + 50) - $descr;
	$precioo = ($precioo + ($dif));
	$precioo = number_format($precioo, 2, '.', ','); 
    $preciofinal = $precio2 - $concoTradicional; 
 /*
 <td>  <div style=' text-align:right;'><a>$".($row["descuento"] + 50)."</a></div></td>
<td>  <div style=' text-align:right;'><a>$".($precio2)."</a></div></td>
<td>  <div style=' text-align:right;'><a>$".($concoTradicional)."</a></div></td>
<td>  <div style=' text-align:right;'><a>$".($row["descuento"])."</a></div></td>
<td>  <div style=' text-align:right;'><a>$".($preciofinal)."</a></div></td>
 */
echo "<tr> 
<td> <label style='
   height:25px;   align: center;'>".$row["Fecha"]."</label></td>
   <td> <label style='
   height:25px;   align: center;'>".$row["CentroEntrega"]."</label></td>
   <td> <label style='
   height:25px;   align: center;'>".$row["Destino"]."</label></td>
   <td> <label style='
   height:25px;   align: center;'>".$Pro."</label></td>
    <td> <div style=' text-align:center;'><label> M3.</label></div></td>
    <td> <label style='
   height:25px;   align: center;'>PESOS</label></td>
<td>  <div style=' text-align:right;'><a>$".number_format($preciofinal,2)."</a></div></td>
<td>  <div style=' text-align:right;'><a>$".number_format(($row["Precio"] * 1000),2)."</a></div></td>
<td>  <div style=' text-align:right;'><a>$".number_format($dif, 2)."</a></div></td>


    <td>  <div style=' text-align:center;'><label>$/M3.</label></div></td>
	 

 
</tr>";
}
echo "</table>";
} else { echo "0 results"; }
$connect->close();


}else{}
?>
</table>
    
    
		
            
            
            
            
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
var hoy =new Date(new Date().setDate(new Date().getDate() )),
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
setInputDate("#dateDefaultt");   
     </script>

<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->

<?php 
	 
	 if(isset($_POST["mensaje"]))
	 {
		echo "<script>window.alert('".$_POST['mensaje']."');</script>";
		 }else{  }
		 
		 
		 ?>
