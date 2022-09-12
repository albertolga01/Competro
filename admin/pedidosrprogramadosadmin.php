<?php 

require 'connector.php';
global $connect; 
session_start();	
require 'dompdf/autoload.inc.php';
use Dompdf\Options;
use Dompdf\Dompdf;

if(isset($_POST['text'])){
	ob_start();
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

	<SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>

    <script src="scripts/push.js"></script>
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	<link rel="canonical" href="https://css-tricks.com/examples/DragAndDropFileUploading/">
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>
	<script language="JavaScript" src="scripts/calendario.js"></script> <link rel="stylesheet" href="styles/calendario.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="scripts/uijquery.js"></script>
	<script type="text/javascript" src="https://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script>
    
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

            $("#un").load("controladorad/tpembarques.php");

        </script>


</div>



<!-- FIN DEL ENCABEZADO --> 





	



<script  type="text/javascript" > 

     function logout(){<?php 

  

   

		if (isset($_SESSION["usuario"])) {

			}else{

				session_unset();

				 session_destroy();

	  echo "window.location.href='../../index';";

				}  

				

?>}

</script>

	





	<!--Ruteo de la página-->

	

		  <div id="contentfull" align="left">

			

			 <div class="margin">

				<DIV id=pathway>

					 

							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 

							 <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;<a  href="#" >Información de embarques programados</a>

							

					  </div>



						

				</div>

			

	

			

	

	 

	

	  

			

		

	<div id="maincontent" align="center"> 	

       <br><br>

       

       <form name="forma1" method="post" action="pedidosrprogramadosadmin.php">

       

       

       <?php

 





echo '<input type="hidden" name="IdEmpresa" value="'. $_SESSION["idempresa"] .'">';

?>

       

       

       	<table align="center" class="parametros">

			 <tr>

				<td class="color_blanco"><b>Centro de origen:</b></td>

				<td class="color_blanco">

                <?php 

				

				echo '<select name="centroorigen">';



				if(isset($_POST['centroorigen'])){

				$C = $_POST['centroorigen'];

				echo "<option selected>".$C."</option>";

				}else{$C = 'Seleccione';}

              

             

			 

    

	$resultx = $connect->query("select folio, centroentrega from centrosentrega  where centroentrega != '".$C."'");

	

	 while ($row = $resultx->fetch_assoc()) {



                  unset($name); 

                  $name = $row['centroentrega']; 

                  echo '<option value="'.$name.'" name="empresa" id="select">'.$name.'</option>';



}

	

	   

    echo "</select>"; 

			 

			 

                echo ' 

				 </td>

                 	

                  

			</tr>

            

            <tr>

				<td class="color_blanco"><b>Fecha Inicial:</b></td>

				<td class="color_blanco">';

				if(isset($_POST['fini'])){echo ' <input type="text" name="fini" style="width:100px;" id="dateDefaultj" value='.$_POST['fini'].' readonly >';}

				else{

					echo ' <input type="text" name="fini" id="dateDefault" value="" readonly style="width:100px;">';}

               

                

                ?>

				 

                 </td>

                

			</tr>

            <tr><td class="color_blanco"><b>Fecha Final:</b></td><?php

           if(isset($_POST['finial'])){

			   echo '

			<td class="color_blanco"><input type="text" name="finial" id="dateDefaultfinalj" value='.$_POST['finial'].' readonly style="width:100px;">';

			    

			   }else{echo '

			<td class="color_blanco"><input type="text" name="finial" id="dateDefaultfinal"  readonly style="width:100px;">';

		   }

            ?>

            <a onClick="return calendario('forma1.finial');"></a></td>

			</tr>

             <tr class="color_non"> 

           <td class="color_blanco"><b>Tipo Proceso:</b></td>		

				<td colspan="1" class="color_blanco">

					<select name="tipo" style="width:100px;">

                    

                    <?php 

					if(isset($_POST['tipo'])){

						echo '<option selected value= '.$_POST['tipo'].' >'.$_POST['tipo'].'</option>

						<option value= "Semanal" >Semanal</option>

                         <option  value= "Diario" >Diario</option>';

						}else{

							echo '

                       

						<option  value= "Semanal" >Semanal</option>

                         <option  value= "Diario" >Diario</option>

						 ';

							}

					?>

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

	    	<tr>

	    	<td align="center" class="color_blanco">

            

            <input type="Submit" value="Aceptar" ></td>

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

    

<!-- quité columna actualizar y botton -->

<?php
if (isset($_POST['tipo'])) {
	$tipo = $_POST['tipo'];		
	if($tipo === 'Diario'){
		if (isset($_POST['fini'])) {
			$date = $_POST['fini'];
			$string = str_replace('/', '-', $date);
			$date = date('Y-m-d',time());//date variable
			$ingresada = strtotime($string);
			$hoy = strtotime($date);//fecha hoy 
			$idtable = "pedidos".substr($rowd['fecha'], 0, 2);
	echo '<div style="width:1060px; Overflow-x:scroll;">

<table align="center" id="'.$idtable.'" style="font-size:12px;">

<tr align="center">

				<td class="color_blanco" align="left" colspan="3">Fecha: '.$_POST['fini'].'</td> 		

			</tr>

<tr>



<th style="width:25px;">Folio</th> 

<th>Cliente</th>

<th>Centro de entrega</th>

<th>Nombre destino</th>

<th>Destino</th>

<th>Producto</th>

<th>P.</th>

<th>Turno</th>

<th>Medio</th>

<th>Clave</th>

<th>Transportista</th> 

<th>Litros</th> 

<th>Fecha y hora estimada</th> 

<th>Fecha y hora de facturación</th> 

<th>Estado de atención</th>

<th>Programado</th>

<th>Comprometido</th>

<th>Facturar</th>

</tr>

';

$CapacidadFinal;

$contador = 0;
$contadorpedidos = 0;



 



$Fecha = $_POST['fini'];  

if ($connect->connect_error) {

die("Connection failed: " . $connect->connect_error);

}

  



if($_POST['IdEmpresa'] == 'TODOS'){

	$sql = "SELECT t1.folio, (SELECT sum(disponible) FROM movimientos WHERE IdEmpresa = t1.IdEmpresa) AS SaldoPagos, (SELECT Sobrante from estadocuenta where IdEmpresa = t1.IdEmpresa) as Sobrante, (SELECT Credito from estadocuenta where IdEmpresa = t1.IdEmpresa) as FormaPago,  (SELECT SUM(Restante) from facturas where IdEmpresa = t1.IdEmpresa) as Restante, (SELECT LimC from estadocuenta where IdEmpresa = t1.IdEmpresa) as Credito, t1.idcondicion, t1.IdEmpresa, t1.Programado, t1.Comprometido, t1.CentroEntrega, t1.producto, t2.Nombre, t1.destino, t1.fecha, t1.presentacion, t1.turno, t1.medio, t1.Transportista, t1.capacidad, t1.facturado, t1.tonel,  t1.entrega, t1.vehiculo, t1.chofer, t1.EstadoAtencion, (select sum(capacidad) as total from pedido where fecha = '".$Fecha."' ) as cap, (select count(folio) as totall from pedido where  fecha = '".$Fecha."' ) as reg FROM pedido t1 inner join destinos t2 on t1.destino = t2.destino  where t1.fecha = '".$Fecha."' and t1.centroentrega = '".$_POST["centroorigen"]."' and EstadoAtencion != 'CALCULADO' order by t2.iddestino ASC";}else{

		$sql = "SELECT t1.folio, (SELECT sum(disponible) FROM movimientos WHERE IdEmpresa = t1.IdEmpresa) AS SaldoPagos, (SELECT Sobrante from estadocuenta where IdEmpresa = t1.IdEmpresa) as Sobrante, (SELECT Credito from estadocuenta where IdEmpresa = t1.IdEmpresa) as FormaPago, (SELECT SUM(Restante) from facturas where IdEmpresa = t1.IdEmpresa) as Restante, (SELECT LimC from estadocuenta where IdEmpresa = t1.IdEmpresa) as Credito,  t1.idcondicion, t1.IdEmpresa, t1.Programado, t1.Comprometido, t1.CentroEntrega, t1.producto, t2.Nombre, t1.destino, t1.fecha, t1.presentacion, t1.turno, t1.medio, t1.Transportista, t1.capacidad, t1.facturado, t1.tonel,  t1.entrega, t1.vehiculo, t1.chofer, t1.EstadoAtencion, (select sum(capacidad) as total from pedido where fecha = '".$Fecha."' and IdEmpresa = '".$_POST["IdEmpresa"]."') as cap, (select count(folio) as totall from pedido where  fecha = '".$Fecha."' and IdEmpresa = '".$_POST["IdEmpresa"]."') as reg FROM pedido t1 inner join destinos t2 on t1.destino = t2.destino  where t1.fecha = '".$Fecha."' and t1.centroentrega = '".$_POST["centroorigen"]."' and t1.IdEmpresa = '".$_POST["IdEmpresa"]." ' and EstadoAtencion != 'CALCULADO' order by t2.iddestino ASC";

		

		} 



 



  

//echo "".$_POST['centroorigen']." ";

$result = $connect->query($sql);

if ($result->num_rows > 0) {

// output data of each row

$restante  = 0;

while($row = $result->fetch_assoc()) {

	$contador = $contador + 1;



$CapacidadFinal = $row["cap"];

$registros = $row["reg"];


$restante = $row["Restante"];  
$credito = $row["Credito"];  
$sobrante = $row["Sobrante"];  
$saldopagos = $row["SaldoPagos"];  
$color = '';

$txtcolor = '';

if($row["FormaPago"] == "1"){
	$FormaPago = "Credito";
	if($sobrante > 0){
		$saldo = $sobrante;
		$gno = "+";
	}else{
		$saldo = $credito - $restante;
		$gno = "-";
		if($saldo < 1000000){

	$color = 'red';

	$txtcolor = 'white';

	}else{

		$color = '';

			$txtcolor = '';

		}
	}
	
	

	
}else{
	$FormaPago = "Contado";
	$saldo = $saldopagos;
	$gno = "+";
	if($saldo < 300000){

	$color = 'red';

	$txtcolor = 'white';

	}else{

		$color = '';

			$txtcolor = '';

		}
	
}


 
$folio = $row["folio"];
echo "<tr style=''>

<form name='forma' method='post' action='controladorad/updatepedidost.php'>   

<input type='hidden' name='folio[]' value=".$row["folio"]."> 

<input type='hidden' name='fecha' value=".$_POST["fini"]."> 

<input type='hidden' name='fechafinal' value=".$_POST["finial"]."> 

<input type='hidden' name='idcondicion[]' value='".$row["idcondicion"]."'> 

<input type='hidden' name='centroorigen[]' value='".$row["CentroEntrega"]."'> 

<input type='hidden' name='producto[]' value='".$row["producto"]."'> 

<input type='hidden' name='capacidad[]' value='".$row["capacidad"]."'> 

<input type='hidden' name='destino[]' value='".$row["destino"]."'>  

<td> <div > <label>".$row["folio"]."</label> </div></td>

 

<td>

"; 



         

    $resultt = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");

	//get the name of the company out of the id

	$resulttt = $connect->query("select RzonSocial as usuario, IdEmpresa from empresa where tusuario='1' and idempresa='".$row["IdEmpresa"]."'");



   

while ($rowwy = $resulttt->fetch_assoc()) {

	

	

	 if(isset($rowwy["IdEmpresa"])){
$IdEmpresa = $rowwy["IdEmpresa"];
				  echo"

				  

				  <input type='hidden' name='idempresa[]' value='".$rowwy["IdEmpresa"]."'>

				  <div ><label>".$rowwy["usuario"]."</label></div>

";}else{}

}

    







echo"

</td>

<td> <label style='width:40px;

   height:25px;   align: center;'>".$row["CentroEntrega"]."</label></td>

   <td> <div > <label style='  

  height:25px;   align: center;  color:".$color.";'>".$row["Nombre"]." ".$FormaPago." ".$gno." $".number_format($saldo, 2, '.', ',')."</label></div></td>

<td> <div style= '> <label style='  

  height:25px;   align: center;'>".$row["destino"]."</label></div></td>

<td> <label style='

   height:25px;   align: center;'>".$row["producto"]."</label></td>

<td> <div style='height:12px;' align='center' > <label style='

  display: inline-block; height:25px;   align: center;'>".$row["presentacion"].".</label> </div></td>

<td> <div style='height:12px;' align='center'><label style='

  display: inline-block; height:25px;   align: center;'>".$row["turno"]."</label></div> </td>



<td> <label style='

  height:25px;   align: center;'>AT</label></td>

  

<td> <div style='height:12px; '><label style='

  display: inline-block; height:25px;   align: center;'>".$row["vehiculo"]."</label></div></td>

<td> ";

if($row['entrega'] == 'LAB DESTINO'){

	echo "<div style='height:12px; '><label style='

  display: inline-block; height:25px;   align: center;'>PEMEX LOGISTICA</label></div>";

	

	}

	if($row['entrega'] == 'LAB LLENADERAS'){

		

		echo "<div style='height:12px; '><label style='

  display: inline-block; height:25px;   align: center;'>COMERCIALIZADORA</label></div>";

	}





 

 

echo "</td>

 

<td> <label style=' align: center;'>".$row["capacidad"]."</label></td>

<td> <label style=' align: center;'>".$row["fecha"]."</label></td>





<td> 

"; 



           

 

	//get the name of the company out of the id

	$resultttd = $connect->query("select pdf, fecha from facturas where Nopedido = '".$row["folio"]."' and idempresa='".$row["IdEmpresa"]."'");



   

while ($rowwyd = $resultttd->fetch_assoc()) {

	

	

	 if(isset($rowwyd["pdf"])){

				  echo"

				  <a href='../uploads/".$rowwyd["pdf"]."'> <label style=' align: center;'>".$rowwyd["fecha"]."</label> </a>



";}else{ echo "<label style=' align: center;'>hh</label>";}

}









echo "

</td>

 



";
$estado = $row["EstadoAtencion"];
if($row["EstadoAtencion"] == 'CANCELADO'){

echo "<td> <label>".$row["EstadoAtencion"]."</label> <input type='text' name='estadoatencion[]' value='CANCELADO' hidden></td>



";



}

else if($row["EstadoAtencion"] == 'FACTURADO'){
$contadorpedidos +=1;
echo "<td> <label>".$row["EstadoAtencion"]."</label> <input type='text' name='estadoatencion[]' value='FACTURADO' hidden></td>



";



}

else{


	$contadorpedidos +=1;




echo "

<td> 

<select name='estadoatencion[]'>

<option selected value='".$row["EstadoAtencion"]."'>".$row["EstadoAtencion"]."</option>

<option>PROGRAMADO</option>  

<option>CARGANDO</option>  

<option>FACTURADO</option>  

<option>CANCELADO</option>  

</select>



</td>";}

echo "

<td><div align='center'>";

if($row["Programado"]== 1 or $row["facturado"]){echo "<label>PROGRAMADO</label>

<input type='checkbox' name='sel[]'  id=".$row["folio"]."  value=".$row["folio"]." hidden>";

	}else{
if($row["EstadoAtencion"] == "CANCELADO"){}else{
		echo "
 
<input type='checkbox' name='sel[]'  id=".$row["folio"]."  value=".$row["folio"].">

";
}
		}

		

		 

		

		

		echo "

</div>

</td>

<td><div align='center'>";

if($row["Comprometido"]>0){$importe = number_format($row["Comprometido"], 2, '.', ',');echo "<label>$ ".$importe."</label>";

echo "<input type='text' name='Comprometido[]' value=".$row["Comprometido"]." hidden>";

}

else{

echo "<input type='text' name='Comprometido[]' hidden>";

}

echo "

</td>


<td>
";
if(($estado == "FACTURADO") ){
	
}else{
	if(($estado == "CANCELADO") ){
	
	}else{
		
	echo "<button onclick='Submit(this.value, event)' name='foliofactura' value=".$row["folio"]." >Generar</button>";
	}
	}
   
echo "</td>
 

</tr>"



;

}

echo '

<td class="color_blanco" colspan="2" style="background-color: white;">

<b id="val" 	style="align: left;">Registros: '.$contador.'</b> 

</td>
<td class="color_blanco" colspan="2" style="background-color: white;">

<b id="val" 	style="align: left;">Pedidos: '.$contadorpedidos.'</b> 

</td>



<table>  <tr><td class="color_blanco"><input type="submit" name="uno" value="Actualizar"></td></tr> 

<tr><td class="color_blanco"></td></tr> 

<tr> <td class="color_blanco"><input type="submit" name="dos" value="Reprogramar"></td></tr>

</table>





</form>

<tr>
<td colspan="16" class="color_blanco"> <button onClick="PdfDownload('.$idtable.')">Exportar a PDF</button>
</td>
</tr>

  



';

} else { echo "0 results"; }

$connect->close();







}





echo'

</table>

</div>

';



	

	

	

}

if($tipo === 'Semanal'){
	
// Check connection

$IdEmpresa = $_POST['IdEmpresa']; 

$Fecha = $_POST['fini']; 

$inicial = $_POST['fini'];

$final = $_POST['finial'];





if ($connect->connect_error) {

die("Connection failed: " . $conn->connect_error);

}

if($_POST['IdEmpresa'] == 'TODOS'){

	

	 $sqld = "select fecha from pedido where STR_TO_DATE(fecha, '%d/%m/%Y') >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y')  and EstadoAtencion != 'CALCULADO' and centroentrega = '".$_POST["centroorigen"]."'  group by  str_to_date(fecha,'%d/%m/%Y')";

	 

	}else{

		  $sqld = "select fecha from pedido where STR_TO_DATE(fecha, '%d/%m/%Y') >=  STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y') and IdEmpresa = '".$IdEmpresa."'   and EstadoAtencion != 'CALCULADO' and centroentrega = '".$_POST["centroorigen"]."' group by str_to_date(fecha,'%d/%m/%Y')  ";

		

		}

 

	



$resultd = $connect->query($sqld);



if ($resultd->num_rows > 0) {

// output data of each row

while($rowd = $resultd->fetch_assoc()) {

 

	

if (isset($_POST['fini'])) {

	

	

	

	

$date = $_POST['fini'];

$string = str_replace('/', '-', $date);

$date = date('Y-m-d',time());//date variable

$ingresada = strtotime($string);



$hoy = strtotime($date);//fecha hoy 
$idtable = "pedidos".substr($rowd['fecha'], 0, 2);




	echo '<div style="width:1060px; Overflow-x:scroll;">

<table align="center" id="'.$idtable.'" style="font-size:12px;">

<tr align="center">

				<td class="color_blanco" align="left" colspan="3">Fecha: '.$rowd['fecha'].'</td> 		

			</tr>

<tr>



<th>Folio</th> 

<th>Cliente</th>

<th>Centro de entrega</th>

<th>Nombre destino</th>

<th>Destino</th>

<th>Producto</th>

<th>P.</th>

<th>Turno</th>

<th>Medio</th>

<th>Clave</th>

<th>Transportista</th> 

<th>Litros</th> 

<th>Fecha y hora estimada</th> 

<th>Fecha y hora de facturación</th> 

<th>Estado de atención</th>

<th>Programado</th>

<th>Comprometido</th>

<th>Facturar</th>
</tr>

';

$CapacidadFinal;



 



$Fecha = $_POST['fini'];  

if ($connect->connect_error) {

die("Connection failed: " . $conn->connect_error);

}





if($_POST['IdEmpresa'] == 'TODOS'){

	$sql = "SELECT t1.canceladocte, t1.folio, (SELECT sum(disponible) FROM movimientos WHERE IdEmpresa = t1.IdEmpresa) AS SaldoPagos, (SELECT Sobrante from estadocuenta where IdEmpresa = t1.IdEmpresa) as Sobrante, (SELECT Credito from estadocuenta where IdEmpresa = t1.IdEmpresa) as FormaPago, (SELECT SUM(Restante) from facturas where IdEmpresa = t1.IdEmpresa) as Restante, (SELECT LimC from estadocuenta where IdEmpresa = t1.IdEmpresa) as Credito, t1.idcondicion, t1.IdEmpresa, t1.Programado, t1.Comprometido, t1.CentroEntrega, t1.producto, t2.Nombre, t1.destino, t1.fecha, t1.presentacion, t1.turno, t1.medio, t1.Transportista, t1.capacidad, t1.facturado, t1.tonel,  t1.entrega, t1.vehiculo, t1.chofer, t1.EstadoAtencion, (select sum(capacidad) as total from pedido where fecha = '".$rowd["fecha"]."' ) as cap, (select count(folio) as totall from pedido where  fecha = '".$rowd["fecha"]."' ) as reg FROM pedido t1 inner join destinos t2 on t1.destino = t2.destino where t1.fecha = '".$rowd["fecha"]."' and t1.centroentrega = '".$_POST["centroorigen"]."' and EstadoAtencion != 'CALCULADO' order by t2.iddestino ASC";}else{

		$sql = "SELECT t1.canceladocte, t1.folio, (SELECT sum(disponible) FROM movimientos WHERE IdEmpresa = t1.IdEmpresa) AS SaldoPagos, (SELECT Sobrante from estadocuenta where IdEmpresa = t1.IdEmpresa) as Sobrante, (SELECT Credito from estadocuenta where IdEmpresa = t1.IdEmpresa) as FormaPago, (SELECT SUM(Restante) from facturas where IdEmpresa = t1.IdEmpresa) as Restante, (SELECT LimC from estadocuenta where IdEmpresa = t1.IdEmpresa) as Credito, t1.idcondicion, t1.IdEmpresa, t1.Programado, t1.Comprometido, t1.CentroEntrega, t1.producto, t2.Nombre, t1.destino, t1.fecha, t1.presentacion, t1.turno, t1.medio, t1.Transportista, t1.capacidad, t1.facturado, t1.tonel,  t1.entrega, t1.vehiculo, t1.chofer, t1.EstadoAtencion, (select sum(capacidad) as total from pedido where fecha = '".$rowd["fecha"]."' and IdEmpresa = '".$_POST["IdEmpresa"]."' ) as cap, (select count(folio) as totall from pedido where  fecha = '".$rowd["fecha"]."' and IdEmpresa = '".$_POST["IdEmpresa"]."') as reg FROM pedido t1 inner join destinos t2 on t1.destino = t2.destino where t1.fecha = '".$rowd["fecha"]."' and t1.centroentrega = '".$_POST["centroorigen"]."' and t1.IdEmpresa = '".$_POST["IdEmpresa"]."' and EstadoAtencion != 'CALCULADO' order by t2.iddestino ASC";

		

		} 
		 
$contador = 0;
$contadorpedidos = 0;

 
//echo "".$_POST['centroorigen']." ";

$result = $connect->query($sql);

if ($result->num_rows > 0) {

// output data of each row

while($row = $result->fetch_assoc()) {
	 
$CapacidadFinal = $row["cap"];

$registros = $row["reg"]; 

$contador = $contador + 1;

$restante = $row["Restante"];  
$credito = $row["Credito"];  
$sobrante = $row["Sobrante"];  
$saldopagos = $row["SaldoPagos"];  
$color = '';

$txtcolor = '';
if($row["FormaPago"] == "1"){
	$FormaPago = "Credito";
	if($sobrante > 0){
		$saldo = $sobrante;
		$gno = "+";
	}else{
		$saldo = $credito - $restante;
		$gno = "-";
		if($saldo < 1000000){

	$color = 'red';

	$txtcolor = 'white';

	}else{

		$color = '';

			$txtcolor = '';

		}
	}
	
}else{
	$FormaPago = "Contado";
	$saldo = $saldopagos;
	$gno = "+";
	if($saldo < 300000){

	$color = 'red';

	$txtcolor = 'white';

	}else{

		$color = '';

			$txtcolor = '';

		}
	
}




 

echo "<tr>
 
<form name='forma' method='post' action='controladorad/updatepedidost.php'> 

<input type='hidden' name='folio[]' value=".$row["folio"]."> 

<input type='hidden' name='fecha' value=".$rowd["fecha"]."> 

<input type='hidden' name='fechafinal' value=".$_POST["finial"]."> 

<input type='hidden' name='centroorigen[]' value='".$row["CentroEntrega"]."'> 

<input type='hidden' name='idcondicion[]' value='".$row["idcondicion"]."'> 

<input type='hidden' name='producto[]' value='".$row["producto"]."'> 

<input type='hidden' name='capacidad[]' value='".$row["capacidad"]."'> 

<input type='hidden' name='destino[]' value='".$row["destino"]."'> 

<td> <div style='align: center;'> <label>".$row["folio"]."</label> </div></td>

 

<td>

"; 



                

 



    $resultt = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");

	//get the name of the company out of the id

	$resulttt = $connect->query("select RzonSocial as usuario, IdEmpresa from empresa where tusuario='1' and idempresa='".$row["IdEmpresa"]."'");



   

while ($rowwy = $resulttt->fetch_assoc()) {

	

	

	 if(isset($rowwy["IdEmpresa"])){

				  echo"

				  

				  <input type='hidden' name='idempresa[]' value='".$rowwy["IdEmpresa"]."'

				  <div  align='center'><label>".$rowwy["usuario"]."</label></div>

";}else{}

}

    







echo"

</td>

<td> <label style='width:40px;

   height:25px;   align: center;'>".$row["CentroEntrega"]."</label></td>

   <td> <div style= '> <label style='  

  height:25px;   align: center;  color:".$color.";'>".$row["Nombre"]." ".$FormaPago." ".$gno." $".number_format($saldo, 2, '.', ',')."</label></div></td>

<td> <div style= '> <label style='  

  height:25px;   align: center;'>".$row["destino"]."</label> </div></td>

<td> <label style='

   height:25px;   align: center;'>".$row["producto"]."</label></td>

<td> <div style='height:12px; '  align='center'> <label style='

  display: inline-block; height:25px;   align: center;'>".$row["presentacion"].".</label> </div></td>

<td> <div style='height:12px; ' align='center'><label style='

  display: inline-block; height:25px;   align: center;'>".$row["turno"]."</label></div> </td>



<td> <label style='

  height:25px;   align: center;'>AT</label></td>

  

<td> <div style='height:12px; '><label style='

  display: inline-block; height:25px;   align: center;'>".$row["vehiculo"]."</label></div></td>

<td> ";

if($row['entrega'] == 'LAB DESTINO'){

	echo "<div style='height:12px; '><label style='

  display: inline-block; height:25px;   align: center;'>PEMEX LOGISTICA</label></div>";

	

	}

	if($row['entrega'] == 'LAB LLENADERAS'){

		

		echo "<div style='height:12px; '><label style='

  display: inline-block; height:25px;   align: center;'>COMERCIALIZADORA</label></div>";

	}





 

 

echo "</td>

 

<td> <label style=' align: center;'>".$row["capacidad"]."</label></td>



<td> <a href='#'> <label style=' align: center;'>".$row["fecha"]."</label> </a>

</td>



<td> 

"; 



           



 

	//get the name of the company out of the id

	$resultttd = $connect->query("select pdf, fecha from facturas where Nopedido = '".$row["folio"]."' and idempresa='".$row["IdEmpresa"]."'");



   

while ($rowwyd = $resultttd->fetch_assoc()) {

	

	

	 if(isset($rowwyd["pdf"])){

				  echo"

				  <a href='../uploads/".$rowwyd["pdf"]."'> <label style=' align: center;'>".$rowwyd["fecha"]."</label> </a>



";}else{ echo "<label style=' align: center;'>hh</label>";}

}









echo "

</td>







";
$estado = $row["EstadoAtencion"];
if($row["EstadoAtencion"] == 'CANCELADO'){
	if($row["canceladocte"] == "1"){
		echo "<td> <label>".$row["EstadoAtencion"]." (cliente)</label> <input type='text' name='estadoatencion[]' value='CANCELADO' hidden></td>";

	}else{
		echo "<td> <label>".$row["EstadoAtencion"]." (administrador)</label> <input type='text' name='estadoatencion[]' value='CANCELADO' hidden></td>";

	}



}


else if($row["EstadoAtencion"] == 'FACTURADO' ){
$contadorpedidos +=1;
echo "<td> <label>".$row["EstadoAtencion"]."</label> <input type='text' name='estadoatencion[]' value='FACTURADO' hidden></td>



";



}

else{

	$contadorpedidos +=1;





echo "

<td> 

<select name='estadoatencion[]'>

<option selected value='".$row["EstadoAtencion"]."'>".$row["EstadoAtencion"]."</option>

<option>PROGRAMADO</option>  

<option>CARGANDO</option>  

<option>FACTURADO</option>  

<option>CANCELADO</option>  

</select>



</td>";}

echo "

<td><div align='center'>";

if($row["Programado"]== 1 or $row["facturado"] == 1){echo "<label>PROGRAMADO</label>

<input type='checkbox' name='sel[]'  id=".$row["folio"]."  value=".$row["folio"]." hidden>";



	}else{
if($row["EstadoAtencion"] == "CANCELADO"){}else{
		echo "



<input type='checkbox' name='sel[]'  id=".$row["folio"]."  value=".$row["folio"].">

";

		}} echo "

</div>

</td>

<td><div align='center'>";

if($row["Comprometido"]>0){$importe = number_format($row["Comprometido"], 2, '.', ',');

echo "<label>$ ".$importe."</label>";

echo "<input type='text' name='Comprometido[]' value=".$row["Comprometido"]." hidden>";

}

else{

echo "<input type='text' name='Comprometido[]' hidden>";

}

echo "

</td> 
<td>
";
 
if(($estado == "FACTURADO") ){
	
}else{
	if(($estado == "CANCELADO") ){
	
	}else{	echo "<button onclick='Submit(this.value, event)' name='foliofactura' value=".$row["folio"]." >Generar</button>";
	}	
	 
	}
	



echo "</td>
</tr>"



;

}

echo '



<td class="color_blanco"  colspan="2" style="background-color: white;">

<b id="val" 	style="align: left;">Registros: '.$contador.'</b> 



</td>
<td class="color_blanco" colspan="2" style="background-color: white;">

<b id="val" 	style="align: left;">Pedidos: '.$contadorpedidos.'</b> 

</td>





<table>  <tr><td class="color_blanco"><input type="submit" name="uno" value="Actualizar"></td></tr> <tr><td class="color_blanco"></td></tr> <tr> <td class="color_blanco"><input type="submit" name="dos" value="Reprogramar"></td></tr>

</table>



 </form>
 <tr>
 <td colspan="16" class="color_blanco"> <button onClick="PdfDownload('.$idtable.')">Exportar a PDF</button>
 </td>
 </tr>
<table>



<td class="color_blanco" style="background-color: white;"></td>



<td class="color_blanco"  style="background-color: white;"> 



</td>

<td class="color_blanco" style="background-color: white;"><pre>                                                                                                                                                             </pre></td>



</table>



';

} else { echo "0 results"; }



echo'

</table>

  </div>

';





}



}

$connect->close();

}

	

	

	

	

	

}











}







?>

   

		

            <table>

				 	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">

  

<textarea name="text" hidden cols="80" rows="2" id="txtarea"></textarea><br><br>

 

            

            <input type='submit' onclick='Print(this)' value='Exportar PDF' hidden>

</form>		 	

</table> 

            

            

            

            <br><br>

            

		

			

	</div> 	

		

						

	

	 

	

	<div id="maincontent"> 

		<table align="center">

			<tr class="link" align="center">		

		

				<td colspan="4" align="center" class="color_blanco"> 

					</td> 

			</tr>

		</table>

        

        

        

        

        

	</div> 

	





	

	







 

</div>
 <form action='facturacion' id='formfac' method="post">
<input type='hidden' id='folioo' name='folio' value=''>
<input type='hidden' id='facturar' name='facturar' value='1'>
</form> 







<br><br>





 



</div>




<script>
renderFooter();
</script>


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
 

 

  <script>
  function Submit(value, e) {
	  
	    
            e.preventDefault() ;
          
       
	  
	  document.getElementById('folioo').value=value;
                 document.getElementById("formfac").submit();
			 return confirmation ;	 
 
           }
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

     

     

     

     	<?php 

	 

	 if(isset($_POST["mensaje"]))

	 {

		echo "<script>window.alert('".$_POST['mensaje']."');</script>";

		 }else{  }

		 

		 

		 ?>



<script>

         function Print(){

          

 $('#txtarea').html(document.getElementById('table').outerHTML)

 }

 </script>
 
 <script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->


 <script>
	function PdfDownload(filename){ 
    kendo.drawing.drawDOM($("#" + filename.getAttribute("id")))
    .then(function(group){
           return kendo.drawing.exportPDF(
               group,{
                   paperSize:"auto",
                   margin:{
                       left:"1.5cm",
                       right:"1cm",
                       top: "1.5cm",
                       bottom:"2cm"
                   }
               }
           );
    })
    .done(function(data){
       kendo.saveAs({
           dataURI:data,
           fileName:filename.getAttribute("id")
       });
    });
}
	</script>