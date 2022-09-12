<?php 
require 'connector.php';
global $connect; 
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

    <SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	  <SCRIPT src="scripts/renderelements.js" type="text/javascript"></SCRIPT>
	

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
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>  
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

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

<div id="cliente">

	<p class="textoEjecutivo" align="center"  id="un"> 
    
     
   
  
<script type="text/JavaScript">
            $("#un").load("controlador/tppipas.php");
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
?>}
</script>


<!-- FIN DEL ENCABEZADO --> 

	<!--Ruteo de la página-->
		  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
              
							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cte" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a  href="reportes_internos" >Reportes internos</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
						
                             <a class=bold href="#">Reporte Consumos</a>
							
					  </div>

						
				</div>
			

		<div id="maincontent"></div>		

	<div id="maincontent" align="center">
      
		 
    <form name="forma1" method="post" action="reporte_consumo_cte">
    <table align="center" class="parametros"> 
    <tr>
			<td class="color_blanco"><B>Seleccione año:</B></td>
            <td class="color_blanco">
		  <?php if(isset($_POST['fini'])){
					$fecha = $_POST['fini'];
					echo '<select name="fini" style="width:90px;">
          <option selected>'.$_POST['fini'].'</option> 
          <option>2020</option>
          <option>2021</option>
          <option>2022</option>
          <option>2023</option>
          <option>2024</option>
          <option>2025</option>
          <option>2026</option>
          <option>2027</option>
          </select>';
					}else {
            echo '<select name="fini" style="width:90px;"> 
            <option>2020</option>
            <option>2021</option>
            <option>2022</option>
            <option>2023</option>
            <option>2024</option>
            <option>2025</option>
            <option>2026</option>
            <option>2027</option>
            </select>';
					}
				
				   ?>
		 </td> 
		</tr>
     
                  </tr>
	
			
			
	
      
		
		<tr>
			 
		</tr>
		<tr>
			<td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
		</tr>
	</table>
    </form>
     <br>
    

    <?php 
	if (isset($_POST['fini'])) {
       
// Check connection 
$inicial = $_POST['fini'];  
$final = $_POST['finial'];
$mes =  substr($inicial, 3, 2);
$mesd =  substr($inicial, 3, 2);
$ano =  $_POST["fini"];
$idempresa = $_SESSION["idempresa"];
$meses = array();
$mesesn = array();
$magna = array();
$premium = array();
$diesel = array();

if($idempresa != "TODOS"){
$empresa = "SELECT rzonsocial from empresa where idempresa = '".$idempresa."';
"; 
$em = $connect->query($empresa);
if ($em->num_rows > 0) {

while($emp = $em->fetch_assoc()) {  
   $rzonsocial = $emp["rzonsocial"];
}
} 
}else{
  $rzonsocial = "COMPETRO";
}

if($idempresa != "TODOS"){
$sqld = " SELECT MONTH(fecha) as fecha FROM facturas WHERE YEAR(fecha) = '".$ano."' and idempresa = '".$idempresa."' GROUP BY MONTH(fecha) ";
}else{
  $sqld = " SELECT MONTH(fecha) as fecha FROM facturas WHERE YEAR(fecha) = '".$ano."'  GROUP BY MONTH(fecha) ";

}
$resultd = $connect->query($sqld);
if ($resultd->num_rows > 0) {

while($rowd = $resultd->fetch_assoc()) {  
$meses[] = $rowd;
}
}
echo " 
<br>
<table align='center'>
<tr><br></tr>
       <tr><td class='color_blanco' colspan='8' style='background-color:lightblue; text-align:center;' >".$rzonsocial."
</td></tr>
       <tr>
         <th  style='width:40px;'>Producto</th> 
   ";
foreach ($meses as $m){ 
  switch($m["fecha"]){
    case 1:
    $mes = "Enero";
    break;
    case 2:
    $mes = "Febrero";
    break;
    case 3:
    $mes = "Marzo";
    break;
    case 4:
    $mes = "Abril";
    break;
    case 5:
    $mes = "Mayo";
    break;
    case 6:
    $mes = "Junio";
    break;
    case 7:
    $mes = "Julio";
    break;
    case 8:
    $mes = "Agosto";
    break;
    case 9:
    $mes = "Septiembre";
    break;
    case 10:
    $mes = "Octubre";
    break;
    case 11:
    $mes = "Noviembre";
    break;
    case 12:
    $mes = "Diciembre";
    break;

  }$mesesn[] = $mes;
  echo "<th>".$mes."</th>";
}
   echo "
       </tr>  
<tr>
<td>MAGNA</td>
";

foreach($meses as $md){
  if($idempresa != "TODOS"){
$cant = "SELECT t2.producto, SUM(t1.cantidad) AS cantidad FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2. foliofactura 
WHERE YEAR(t1.fecha) = '".$ano."'  AND MONTH(t1.fecha) = '".$md["fecha"]."' AND t1.idempresa = '".$idempresa."' and t2.producto  = 'GASOLINA 87 OCT' GROUP BY t2.producto
"; 
  }else{
    $cant = "SELECT t2.producto, SUM(t1.cantidad) AS cantidad FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2. foliofactura 
WHERE YEAR(t1.fecha) = '".$ano."'  AND MONTH(t1.fecha) = '".$md["fecha"]."'   and t2.producto  = 'GASOLINA 87 OCT' GROUP BY t2.producto
"; 
  }
$resc = $connect->query($cant);
if ($resc->num_rows > 0) {

while($rowc = $resc->fetch_assoc()) {  
  $magna[] = $rowc;
 echo "<td>".number_format(($rowc["cantidad"]/1000),2)."</td>"; 
}
}
  }  
echo "
</tr>


<td>PREMIUM</td>
";

foreach($meses as $md){
  if($idempresa != "TODOS"){
$cant = "SELECT t2.producto, SUM(t1.cantidad) AS cantidad FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2. foliofactura 
WHERE YEAR(t1.fecha) = '".$ano."'  AND MONTH(t1.fecha) = '".$md["fecha"]."' AND t1.idempresa = '".$idempresa."' and t2.producto  = 'GASOLINA 91 OCT' GROUP BY t2.producto
";  
  }else{
    $cant = "SELECT t2.producto, SUM(t1.cantidad) AS cantidad FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2. foliofactura 
WHERE YEAR(t1.fecha) = '".$ano."'  AND MONTH(t1.fecha) = '".$md["fecha"]."'  and t2.producto  = 'GASOLINA 91 OCT' GROUP BY t2.producto
";  
  }
$resc = $connect->query($cant);
if ($resc->num_rows > 0) {

while($rowc = $resc->fetch_assoc()) { 
  $premium[] = $rowc; 
 echo "<td>".number_format(($rowc["cantidad"] / 1000),2)."</td>"; 
}
}
  }  
echo "
</tr>


<td>DIESEL</td>
";

foreach($meses as $md){
  if($idempresa != "TODOS"){
$cant = "SELECT t2.producto, SUM(t1.cantidad) AS cantidad FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2. foliofactura 
WHERE YEAR(t1.fecha) = '".$ano."'  AND MONTH(t1.fecha) = '".$md["fecha"]."' AND t1.idempresa = '".$idempresa."' and t2.producto  = 'DIESEL' GROUP BY t2.producto
"; 
  }else{
    $cant = "SELECT t2.producto, SUM(t1.cantidad) AS cantidad FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2. foliofactura 
    WHERE YEAR(t1.fecha) = '".$ano."'  AND MONTH(t1.fecha) = '".$md["fecha"]."'  and t2.producto  = 'DIESEL' GROUP BY t2.producto
    ";  
  }
$resc = $connect->query($cant);
if ($resc->num_rows > 0) {

while($rowc = $resc->fetch_assoc()) {  
  $diesel[] = $rowc;
 echo "<td>".number_format(($rowc["cantidad"]/1000),2)."</td>"; 
}
}
  }  
echo "
</tr>




       ";
 
}else { echo ""; }

						 
	
 

 
 	echo "	 </table>
   <div  >
   
   <div style='width:800px; height:550;'>
   <br><br> 
   <canvas id='line' width='400' height='250'></canvas>  
   </div> 
   </div>
	 	";	 
     foreach($saldom as $c){ 
      $col[] = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
      
   }
              
      echo '
<script>
      new Chart(document.getElementById("line"), {
        type: "line",
        data: {
          labels: [
            ';
             
            foreach ($mesesn as  $t) {
                echo "'".$t."'".",";
              }
             
            echo '

          ],
          datasets: [{ 
              data: [
                ';
             
                foreach ($magna as  $m) {
                    echo $m["cantidad"].",";
                  }
                 
                echo '

              ],
              label: "Magna",
              borderColor: "green",
              fill: false
            }, { 
              data: [
                ';
             
                foreach ($premium as  $p) {
                    echo $p["cantidad"].",";
                  }
                 
                echo '

              ],
              label: "Premium",
              borderColor: "red",
              fill: false
            }, { 
              data: [
                ';
             
                foreach ($diesel as  $d) {
                    echo $d["cantidad"].",";
                  }
                 
                echo '

              ],
              label: "Diesel",
              borderColor: "black",
              fill: false
            } 
          ]
        },
        options: {
          title: {
            display: true,
            text: "Consumo de Combustible '.$rzonsocial.'"
          }
        }
      });
       </script>
       
      ';
 
 
 
	?>





    
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
    
            
            
            
            
            <br><br>
            
		
			
	</div> 	
		
						
	 
	<form action="LoginServlet" method="post">
	</form>
	
	<div id="maincontent"> 
         



	</div> 
	


	 
	

    <script>
 doThisOnChange = function(value, optionIndex)
    { 
 
 var selectElement = document.getElementById("destinoss");
 while (selectElement.options.length > 0) {                
        selectElement.remove(0);
    }  
	var data = new FormData(); 
    var ajax = new XMLHttpRequest();  
	ajax.open("GET", "data/data.php?value="+value,true);
	ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            //console.log(data);

            var html = '';
            for(var a = 0; a < data.length; a++) {
                //var firstName = data[a].iddestino;
                var lastName = data[a].destino; 
                
                selectElement.add(new Option(lastName)); 

            }
			
			 selectElement.add(new Option('TODOS')); 
            document.getElementById("data").innerHTML += html;
        }
        
        
       
    };
	  
}



</script>




 
</div>



<br><br>

<script>
renderFooter();
</script>

</div>




</body>
</html>
    
    

    <script>
        function setInputDateStart(_id){
            var _dat = document.querySelector(_id);
             var hoy =new Date(new Date().setDate(new Date().getDate() - 7)),
		d = (hoy.getDate()),
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
        setInputDateStart("#dateDefault");  

        function setInputDate(_id){
            var _dat = document.querySelector(_id);
            var hoy = new Date(),
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
        setInputDate("#dateDefaultfinal");   
    </script>
     
    <script>
        function Print(){  
            $('#txtarea').html(document.getElementById('tabb').outerHTML)
        }
    </script>

<script language="JavaScript" src="scripts/datetime.js"></script> 