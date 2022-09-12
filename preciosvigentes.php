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
    
	

	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>

    <SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	<SCRIPT src="scripts/renderelements.js" type="text/javascript"></SCRIPT>
	
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>

	<script language="JavaScript" src="scripts/calendario.js"></script> 
	     
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    
    
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

<div id="cliente">

	<p class="textoEjecutivo" align="center"  id="un"> 
    
     
   
  
<script type="text/JavaScript">
            $("#un").load("controlador/tppreciosv.php");
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


setInputDatee("#dateDefaultfinal");  
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





    <?php 
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
<th>Unidades</th> 
</tr> ';
 

 
// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

$myDate = date('d/m/Y');

$sql = "SELECT t1.Fecha as Fecha, if(t1.producto = 'Magna',(SELECT Magna from decuentovigente where Magna is not null order by Fecha desc limit 1), if(t1.producto = 'Premium',(SELECT Premium from decuentovigente where Premium is not null order by Fecha desc limit 1), (SELECT Diesel from decuentovigente where Diesel is not null order by Fecha desc limit 1))) as descuento, t1.CentroEntrega as CentroEntrega, t1.Destino as Destino, t1.producto as Producto, t1.Precio, t3.porcentaje, t3.porcentajepremium, t3.porcentajediesel from precioventavigente t1 INNER JOIN destinos t2  on t1.Destino = t2.Destino inner join estadocuenta t3 on t2.IdEmpresa  = t3.IdEmpresa  WHERE t1.Fecha = (SELECT MAX(Fecha) from precioventavigente tr INNER JOIN destinos tf ON tf.Destino = tr.Destino WHERE tf.idempresa = '".$_SESSION["idempresa"]."') and t2.IdEmpresa  = '".$_SESSION['idempresa']."'";
 //echo $sql;
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
		//echo $porcentaje;
		}
	$precioo = $row["Precio"] * 1000;
	
	
	$com = 1 - ($porcentaje/100);
    $desc2 = ($row["descuento"] + 100) * 1.16;
	$precio2 = $desc2 + ($row["Precio"] * 1000);
    $concoTradicional = ((($row["descuento"] + 50) * $com) * 1.16);
    $preciofinal = $precio2 - $concoTradicional; 
	$descr = $row["descuento"] * $com;
	$dif = $row["descuento"] - $descr; 
	$precioo = ($precioo + $dif);
	 
	//$precioo = number_format($precioo, 3, '.', ','); 
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
   <td>  <div style=' text-align:right;'><a>$".number_format($preciofinal, 2, '.', ',')."</a></div></td>
    <td>  <div style=' text-align:center;'><label>$/M3.</label></div></td>
	 
 
</tr>";
}
echo "</table>";
} else { echo "0 results"; }
$connect->close();
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


<script>
renderFooter();
</script>
</div>




</body>
</html>

<script language="JavaScript" src="scripts/datetime.js"></script> 
