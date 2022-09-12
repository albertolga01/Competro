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

    <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>

	



	<script src="dw_sizerdx.js" type="text/javascript"></script>

	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>

	

	

	<meta http-equiv="Content-Style-Type" content="text/css" />

	<meta http-equiv="Pragma" content="no-cache" />

	<meta http-equiv="Cache-Control" content="no-cache" />

	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />

	<title>ComPetro</title>



	<script language="JavaScript" src="scripts/calendario.js"></script>

	<script src="https://www.google.com/recaptcha/api.js"></script>		

     

	     

    

    

    

    

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

	  echo "window.location.href='index';";

				}  

				

			if(isset($_POST["idempresa"])){

	$IdEmpresa = $_POST["idempresa"];

	}else{

			$IdEmpresa = '0';

			 echo "window.location.href='index';";

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

							 <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;

							 <a class=bold href="saldo_analiticoadmin">Saldo Analítico</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;

							 <a class=bold href="#">Detalle de Saldo Analítico</a>

							

							

					  </div>



						

				</div>

			

			

	

			

	

	

 







 

	

	  

			

		

	<div id="maincontent" align="center"> 	

    

   <table align="center" class="parametros">

			<tr class=""/><td align="left" class="color_blanco"><b>Cliente:</b></td><td align="left" class="color_blanco"><?php
$Q = "
select usuario, t2.Credito, t2.LimC, IF(t2.Credito = '1', 'CREDITO', 'CONTADO') as FP, t2.SaldoCredito, sum(t3.Restante) as Restante from empresa t1 inner join estadocuenta t2 on t1.IdEmpresa = t2.IdEmpresa inner join facturas t3 on t2.IdEmpresa = t3.IdEmpresa where t1.idempresa= '".$IdEmpresa."' 
";
			

			$res = $connect->query("select usuario, t2.Credito, t2.LimC, IF(t2.Credito = '1', 'CREDITO', 'CONTADO') as FP, t2.SaldoCredito, sum(t3.Restante) as Restante from empresa t1 inner join estadocuenta t2 on t1.IdEmpresa = t2.IdEmpresa inner join facturas t3 on t2.IdEmpresa = t3.IdEmpresa where t1.idempresa= '".$IdEmpresa."' ");

 
     

    while ($row = $res->fetch_assoc()) {

		echo '<a href="" id="empr">'.$row['usuario'].'</a>';

		$FPP = $row['FP'];

		$Saldo = $row['Restante'];

		$Saldoo = number_format($Saldo, 2, '.', ',');

		$Limite = $row['LimC'];

		$SaldoDisp = $Limite - $Saldo;

		$SaldoDisponible= number_format($SaldoDisp, 2, '.', ',');

			}

			

			



?></td><td align="left" class="color_blanco"><b>Encargado de cobro:</b></td><td align="left" class="color_blanco">MULTIBANCO</td><tr/><tr class=""/>

<td align="left" class="color_blanco"><b>Forma de pago:</b>



</td><td align="left" class="color_blanco">

<?php 



     

    if(isset($FPP)){

echo"<label>".$FPP."</label>"; }

?>

</td><td align="left" class="color_blanco"><b>Estado de suspensión:</b></td><td align="left" class="color_blanco">NORMAL</td><tr/>

			

			<tr class=""><td align="left" class="color_blanco"><b>Saldo disponible de contado:</b></td><td align="left" class="color_blanco">

<?php 

 

      

		if(isset($SaldoDisponible)){

		echo"<label>$".$SaldoDisponible." PESOS</label>"; 

		}

?>

            

 </td></tr>

		

			



			<tr><td class="color_blanco"><br></td></tr>

	</table> 

    <!-- 

	<table>			

		<tr align="center">

        	<th> Folio </th>	

			<th> Producto </th>

			<th> Fecha </th>

			<th> Destino </th>

            <th> Comprometido </th>  

            <th> Estado Atención </th>

		 

		</tr>

		

			 

				

			

				

					<tr class="color_non">

						

						<?php 

	 
$result = $connect->query("SELECT folio, producto, destino, fecha, estadoatencion, comprometido FROM pedido WHERE idempresa= '".$IdEmpresa."' AND comprometido > 0 ");

  
     $totall = 0;

    while ($row = $result->fetch_assoc()) { 

		   $totall = $totall + $row["comprometido"];

	 

		

		echo "

		<td> <label style=' align: center;'>".$row["folio"]."</label></td>

		<td> <label style=' align: center;'>".$row["producto"]."</label></td>

		<td> <label style=' align: center;'>".$row["fecha"]."</label></td> 

		<td> <label style=' align: center;'>".$row["destino"]."</label></td> 

		<td align='center'> <label style=' align: center;'>$".number_format($row["comprometido"], 0, '.', ',')."</label></td>

		<td align='center'> <label style=' align: center;'>".$row["estadoatencion"]."</label></td> 

		

		</tr>";

} 







echo "<tr>



<td class='color_blanco'></td>

<td class='color_blanco'></td> 

<td class='color_blanco'></td>

<td class='color_blanco'></td>

<td class='color_blanco' align='center'>$".number_format($totall, 0, '.', ',')."</td>



</tr>";

?>

	

						

						

						 

					

									

			

						  

			

							

				

		

		</table>

        -->

        

        

        

    

   

 

            

            

            

            <br><br>

            

      <?php      

            

            $IdEmpresa = $_POST['idempresa'];  



if ($connect->connect_error) {

die("Connection failed: " . $conn->connect_error);

} 

	 $sqld = "select fecha from pedido where idempresa = '".$IdEmpresa."' AND comprometido > 0  and estadoatencion != 'Facturado' and estadoatencion != 'Cancelado'  group by fecha";

	 
 


$resultd = $connect->query($sqld);



if ($resultd->num_rows > 0) {

// output data of each row

while($rowd = $resultd->fetch_assoc()) {

 

	 

	

	

	 





	echo '<div style="width:1060px; ">

<table align="center" id="table" style="font-size:12px;">

<tr align="center">

				<td class="color_blanco" align="left" colspan="3">Fecha: '.$rowd['fecha'].'</td> 		

			</tr>

<tr>



	<th> Folio </th>	

			<th> Producto </th>

			<th> Fecha </th>

			<th> Destino </th>

            <th> Comprometido </th>  

            <th> Estado Atención </th>

		 

</tr>

'; 



 

 

if ($connect->connect_error) {

die("Connection failed: " . $conn->connect_error);

}

 

	$sql = "SELECT folio, producto, destino, fecha, estadoatencion, comprometido FROM pedido WHERE idempresa= '".$IdEmpresa."' AND fecha = '".$rowd["fecha"]."' and estadoatencion != 'Facturado' and estadoatencion != 'Cancelado' ";

		

$contador = 0;

$Suma = 0;



 



//echo "".$_POST['centroorigen']." ";

$result = $connect->query($sql);

if ($result->num_rows > 0) {

// output data of each row

while($row = $result->fetch_assoc()) {

 $Suma = $Suma + $row["comprometido"];

echo "<tr>

<td> <label style=' align: center;'>".$row["folio"]."</label></td>

		<td> <label style=' align: center;'>".$row["producto"]."</label></td>

		<td> <label style=' align: center;'>".$row["fecha"]."</label></td> 

		<td> <label style=' align: center;'>".$row["destino"]."</label></td> 

		<td align='center'> <label style=' align: center;'>$".number_format($row["comprometido"], 0, '.', ',')."</label></td>

		<td align='center'> <label style=' align: center;'>".$row["estadoatencion"]."</label></td> 

		

 

</tr>"



;

}

 



 echo "<tr>



<td class='color_blanco'></td>

<td class='color_blanco'></td> 

<td class='color_blanco'></td>

<td class='color_blanco'></td>

<td class='color_blanco' align='center'>$".number_format($Suma, 0, '.', ',')."</td>



</tr>";

 

 



} else { echo "0 results"; }



echo'

</table>

  </div>

';







}

$connect->close();



	

	

	

	

	

}



?>

		

			

	</div> 	

		

						

	

	<form action="LoginServlet" method="post">

	</form>

	

	<div id="maincontent"> 

		<table align="center">

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









</body>

</html>

    

    <script>

function setInputDate(_id){

    var _dat = document.querySelector(_id);

    var hoy = new Date(),

        d = (hoy.getDate() +1),

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

     

     











    