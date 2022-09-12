<?php 

require 'connector.php';

global $connect;



require 'dompdf/autoload.inc.php';

use Dompdf\Options;

use Dompdf\Dompdf;

if(isset($_POST['text'])){

	

	$options = new Options();

$options->set('defaultFont', 'Courier'); 

$dompdf = new Dompdf($options);

$dompdf = new Dompdf();

$dompdf->loadHtml($_POST['text']);

$dompdf->setPaper('A3', 'landscape');

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

				

				if (isset($_POST["fini"])) {

			}else{

				

	 // echo "window.location.href='pedidoscadmin.php';";

				}  

?>}

</script>



<!-- FIN DEL ENCABEZADO --> 





	





	





	<!--Ruteo de la página-->

	

		  <div id="contentfull" align="left">

			

			 <div class="margin">

				<DIV id=pathway>

					 

							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 

							 <a  href="menu_cteadmin" >Servicio a clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
                              <a  href="cargafacturas" >Carga Facturas</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
                               <a  href="cargafacturaspemex" >Carga Facturas Pemex</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
                             <a  href="#" >Historial de facturas</a>

					 

					  </div>



						

				</div>

			

	

			

	

	

 







	 

	

	

	  

			

		

	         <div id="maincontent" align="center"> 	

       <br><br>

       

       <form name="forma1" method="post" action="registrorfacturaspemex">

       

       

       <?php

 





echo '<input type="hidden" name="IdEmpresa" value="'. $_SESSION["idempresa"] .'">';

?>

       

       

       	<table align="center" class="parametros">

			<tr>

				<td class="color_blanco"><b>Fecha Inicial:</b></td>

				<td class="color_blanco">

                

                <?php 

				if(isset($_POST['fini'])){

					$fecha = $_POST['fini'];  echo '<input type="text" value= "'. $_POST['fini'].'" name="fini" id="dateDefaultj">';

					}else{

						 echo '<input type="text" value= "00/00/0000" name="fini" id="dateDefault">';

						}

				 ?>

                </td>

				<td class="color_blanco"></td>

			</tr>

          <tr>

				<td class="color_blanco"><b>Fecha Final:</b></td>

				<td class="color_blanco">

                

                <?php 

				if(isset($_POST['finial'])){

					$fecha = $_POST['finial'];  echo '<input type="text" value= "'. $_POST['finial'].'" name="finial" id="dateDefaultfinalj">';

					}else{

						  echo '<input type="text" value= "00/00/0000" name="finial" id="dateDefaultfinal">';

						}

				 ?>

                </td>

				<td class="color_blanco"></td>

			</tr>

            

			

             <tr class="color_non"> 

            

			

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

/*

if (isset($_POST['tipo'])) {



$tipo = $_POST['tipo'];		



if($tipo === 'Diario'){



$CapacidadFinal;



// Check connection

$IdEmpresa = $_POST['IdEmpresa']; 

$Fecha = $_POST['fini'];  

if ($connect->connect_error) {

die("Connection failed: " . $conn->connect_error);

}



$string = str_replace('/', '-', $Fecha); 

$stringg = date('Y-m-d', strtotime($string));

  $sql = "Select t2.RzonSocial, t1.NoPedido, t1.Folio, t2.usuario, t1.Factura, t1.Fecha, t1.Total from facturas t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa where date(Fecha) = '".$stringg."'";



$result = $connect->query($sql);

if ($result->num_rows > 0) {

		echo '

<table align="center" id="table">

<td class="color_blanco">

<b style="align: left;"> Fecha: </b> 

<br>

<b>'.$_POST['fini'].'</b>

</td>

<tr>

<th style="height:25px;">Folio</th>

<th style="height:25px;">No. Pedido</th>

<th>Empresa</th>

<th>Usuario</th>

<th>Factura</th>

<th>Fecha</th>

<th>Total</th>

</tr>

';

// output data of each row

while($row = $result->fetch_assoc()) {

$total = number_format($row['Total'], 2, '.', ','); 

echo "<tr>

<form name='forma' method='post' action='ActualizarPedido.php'> 

<td> <div align='center' style='width:60px;'> <label>".$row["Folio"]."</label> </div>

 </td>

 <td> <div align='center' style='width:60px;'> <label>".$row["NoPedido"]."</label> </div>

 </td>

 <td> <div align='center' style='width:120px;'> <label>".$row["RazonSocial"]."</label> </div>

 </td>

 <td> <div align='center' style='width:60px;'> <label>".$row["usuario"]."</label> </div>

 </td>

<td> <div align='center' style='width:240px;'><label >".$row["Factura"]."</label>

 </div></td>

  

<td> <div align='center' style='width:110px;'> <label>".$row["Fecha"]."</label> </div></td>

<td> <div align='center' style='width:85px;'> <label >$".$total."</label> </div></td>



   



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

	

	

	



  



   

	/*

	

	

// Check connection

$IdEmpresa = $_POST['IdEmpresa']; 

$Fecha = $_POST['fini']; 

$inicial = $_POST['fini'];

$final = $_POST['finial'];





if ($connect->connect_error) {

die("Connection failed: " . $connect->connect_error);

}



  $sqld = "select date(fecha) as fecha from facturas where date(fecha) >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and date(fecha) < STR_TO_DATE('".$final."', '%d/%m/%Y') group by date(fecha)";



	



$resultd = $connect->query($sqld);

if ($resultd->num_rows > 0) {

// output data of each row

while($rowd = $resultd->fetch_assoc()) { 

		echo '

<table align="center">

<td class="color_blanco">

<b style="align: left;"> Fecha: </b> 

<br>

<b>'.$inicial.'</b>

</td>



<tr>

<th style="height:25px;">Folio</th>

<th style="height:25px;">No. Pedido</th>

<th>Empresa</th>

<th>Usuario</th>

<th>Factura</th>

<th>Fecha</th>

<th>Total</th>

</tr>

';



// Check connection

$IdEmpresa = $_POST['IdEmpresa']; 

$Fecha = $_POST['fini'];  



if ($connect->connect_error) {

die("Connection failed: " . $connect->connect_error);

}



$connecto = mysqli_connect('localhost', 'root', '', 'comercializadora');



$string = str_replace('/', '-', $Fecha); 

$stringg = date('Y-m-d', strtotime($string));

  $sql = "Select t2.RzonSocial, t1.NoPedido, t1.Folio, t2.usuario, t1.Factura, t1.Fecha, t1.Total from facturas t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa where date(Fecha) = '".$rowd['fecha']."'";

$result = $connecto->query($sql);

if ($result->num_rows > 0) {

// output data of each row

while($row = $result->fetch_assoc()) {

	$total = number_format($row['Total'], 2, '.', ','); 

echo "<tr>

<form name='forma' method='post' action='ActualizarPedido.php'> 

<td> <div align='center' style='width:60px;'> <label>".$row["Folio"]."</label> </div>

 </td>

 <td> <div align='center' style='width:60px;'> <label>".$row["NoPedido"]."</label> </div>

 </td>

 <td> <div align='center' style='width:120px;'> <label>".$row["RzonSocial"]."</label> </div>

 </td>

 <td> <div align='center' style='width:60px;'> <label>".$row["usuario"]."</label> </div>

 </td>

<td> <div align='center' style='width:240px;'><label >".$row["Factura"]."</label>

 </div></td>

  

<td> <div align='center' style='width:110px;'> <label>".$row["Fecha"]."</label> </div></td>

<td> <div align='center' style='width:85px;'> <label >$".$total."</label> </div></td>



   



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

$connecto->close();

echo'

</table>







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



//



	}

	

	

				

}

*/







if(isset($_POST['fini'])){

	

		

// Check connection 

$Fecha = $_POST['fini']; 

$inicial = $_POST['fini'];

$final = $_POST['finial'];

 

if ($connect->connect_error) {

die("Connection failed: " . $connect->connect_error);

}



 

	$sqld = "select date(t1.fecha) as fecha, t1.fecha as fech,  t1.folio from facturaspemex t1  where DATE(t1.Fecha) >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and DATE(t1.Fecha) <= STR_TO_DATE('".$final."', '%d/%m/%Y')  ";

 
 
 

	 

  

  $Totall = 0;

  $cont = 0;



$resultd = $connect->query($sqld);

if ($resultd->num_rows > 0) {

// output data of each row

echo '

<table align="center" id="table">

					 

						<tr><td class="color_blanco" colspan="3">COMERCIALIZADORA PETROMAR

</td></tr> 

						<tr>


 
 
 

<th>Fecha Pedido</th>

<th style="height:25px; align:center;">Folio Factura</th>

<th width="50">Factura</th>

<th>Fecha Emisión</th>

<th>Importe</th>
<th>Xml</th>
<th>Pdf</th>

</tr>

						

					 

					 

						 

					 	';		



while($rowd = $resultd->fetch_assoc()) {    



 

$sql = "Select  t1.folio as fff,   t1.Fecha, t1.Factura, t1.Concepto, t1.Total, t1.PDF, t1.Factura from facturaspemex t1 where t1.folio  = '".$rowd["folio"]."' ";
 

 

$result = $connect->query($sql);

if ($result->num_rows > 0) {

// output data of each row

while($row = $result->fetch_assoc()) { 

$cont = $cont +1;

$Totall = $Totall + $row["Total"];

$ImporteTotal = number_format($row["Total"], 2, '.', ',');

$FF = substr($row["Factura"], 0, -4);

echo"

<tr>

 

<td><label  >".$rowd["fech"]."</label></td>

<td> <div align='center'    '> <label>".$row["fff"]."</label> </div>

 </td>

<td> <div align='center' style='width:160px;'><label >".$FF."</label>

<td><label  >".$row["Fecha"]."</label></td> 

 </div></td>

<td><div align='center'><label>$".$ImporteTotal."</label></div></td>

 <td><a href='../uploads/".$row["Factura"]."' target='_blank'>Disponible</a></td>

<td><a href='../uploads/".$row["PDF"]."' target='_blank'>Disponible</a></td>



</tr>

";

}

}



}





echo "

<tr>

<td class='color_blanco'>Registros: ".$cont."</td>

<td class='color_blanco'></td>

<td class='color_blanco'></td>

<td class='color_blanco'></td>
 
 
 

<td class='color_blanco'>$".number_format($Totall, 2, '.', ',')."

</td>

</tr>

</table>";

}



	}



?>

    

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">

  

<textarea name="text"  hidden cols="80" rows="2" id="txtarea"></textarea><br><br>

 

            

            <input type='submit' onclick='Print(this)' value='Exportar PDF'>

</form>  	

  <script>

         function Print(){

          

 $('#txtarea').html(document.getElementById('table').outerHTML)

 }

 </script>

            

		

            

            

            

            

            <br>

            

		

			

	</div> 	

		

						

	

	<form action="LoginServlet" method="post">

	</form>

	

	<div id="maincontent"> 

		<table align="center">

			<tr class="link" align="center">		

		

				<td colspan="4" align="center" class="color_blanco"> 

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

setInputDate("#dateDefaultfinal");   

     </script>

     