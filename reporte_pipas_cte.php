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
	

	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>


    <SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	<SCRIPT src="scripts/renderelements.js" type="text/javascript"></SCRIPT>


    <SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	<SCRIPT src="scripts/renderelements.js" type="text/javascript"></SCRIPT>
	
	
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
            $("#un").load("controlador/tppipas.php");
        </script>
    </p> 
		

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
							 <a class=bold href="#">Reporte Compras</a>
							
					  </div>

						
				</div>
			
			
	
			
	
	
 




		<div id="maincontent"></div>		

	
	
	  
			
		
	<div id="maincontent" align="center">
     <form name="forma1" method="post" action="reporte_pipas_cte">
    <table align="center" class="parametros">
			<tr>
			<td class="color_blanco"><B>Introduce la Fecha de Inicio:</B></td>
            <td class="color_blanco">
		  <?php if(isset($_POST['fini'])){
					$fecha = $_POST['fini'];
					echo '<input type="text" value= "'. $_POST['fini'].'" name="fini" id="dateDefaultj">';
					}else {
					echo '<input type="text" value= "00/00/0000"  name="fini" id="dateDefault">';
					}
				
				   ?>
		 </td>
			</tr>		
			<tr>
			<td class="color_blanco"><B>Introduce la Fecha Final:</B></td>
			<td class="color_blanco">
            <?php if(isset($_POST['finial'])){
					echo '<input type="text" value= "'. $_POST['finial'].'" name="finial" id="dateDefaultfinalj">';
					}else{
						
						echo '<input type="text" value= "00/00/0000" name="finial" id="dateDefaultfinal">';
						}    ?>
			<a onClick="return calendario('forma1.finial');"></a></td>
			</tr>
	 
     <tr>
				<td class="color_blanco"><b>Seleccione estación:</b></td>
				<td class="color_blanco">
                
                <?php
	 
    $result = $connect->query("select Destino from destinos where IdEmpresa = '".$_SESSION['idempresa']."'");
	 

    echo "<select name='destino' id='sel'   style='width:100%;' required>
	<option selected>Seleccione</option>
	";
	

    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['Destino'];
                  $name = $row['Destino']; 
                  echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';

}  


echo"<option>TODOS</option>

</td>
</tr>	";
?> 
				 
		  
          
          
          
        
			
			
	
		
		 
		<tr>
			<td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
		</tr>
        
	</table>
    </form>
   <br><br>  
<table align="center" id="tabb"  style="font-size:12px;">
 
						<tr><td class="color_blanco">COMERCIALIZADORA PETROMAR - VENTA
</td></tr>
						<tr>
                        <th style="width:50px;">Cliente</th>
							<th >Estación</th>
							<th align="center">Producto</th>
                            <th align="center">Cantidad</th>
                            <th align="center">Litros</th>
                            <th align="center">M/3</th>
							<th align="center">Total</th>
							 
                           
						</tr>
						
    
    <?php 
	if (isset($_POST['fini'])) {
// Check connection 
$inicial = $_POST['fini'];  
$final = $_POST['finial'];
 
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
 

  
		
		
		if($_POST['destino'] == 'TODOS'){
				
		$sqld = "SELECT t3.rzonsocial as cliente, t1.destino, count(t1.Folio) as Cantidad, sum(t1.Folio) as TPipas, t1.Producto, sum(t2.Cantidad) as Litros, sum(t2.Total) as Total FROM pedido t1 inner join facturas t2 on t1.FolioFactura = t2.Folio inner join empresa t3 on t1.IdEmpresa = t3.IdEmpresa where STR_TO_DATE(t1.Fecha, '%d/%m/%Y') >= STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(t1.Fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y') and t1.facturado = '1' and t1.IdEmpresa = '".$_SESSION['idempresa']."' group by t1.Destino, t1.Producto";
		
			}else{
					
		$sqld = "SELECT t3.rzonsocial as cliente, t1.destino, count(t1.Folio) as Cantidad, sum(t1.Folio) as TPipas, t1.Producto, sum(t2.Cantidad) as Litros, sum(t2.Total) as Total FROM pedido t1 inner join facturas t2 on t1.FolioFactura = t2.Folio inner join empresa t3 on t1.IdEmpresa = t3.IdEmpresa where STR_TO_DATE(t1.Fecha, '%d/%m/%Y') >= STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(t1.Fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y') and t1.facturado = '1' and t1.IdEmpresa = '".$_SESSION['idempresa']."' and t1.destino = '".$_POST['destino']."' group by t1.Destino, t1.Producto";
		
				}
	
	 
 
    
   
  $TP = 0;
  $TL = 0;
  $TD = 0;
  
  $TMM = 0;
  $TPP = 0;
  $TDD = 0;
  
  $TMM3 = 0;
  $TPP3 = 0;
  $TDD3 = 0;
   
    
$resultd = $connect->query($sqld);
if ($resultd->num_rows > 0) {
// output data of each row
while($rowd = $resultd->fetch_assoc()) {  
 
$TP = $TP + $rowd["Cantidad"];
$TL = $TL + $rowd["Litros"];
$TD = $TD + $rowd["Total"];

if($rowd["Producto"] == 'GASOLINA 87 OCT'){
	$TMM = $TMM + $rowd["Litros"];
	$TMM3 = $TMM3 + $rowd["Litros"]/1000;
	}
	if($rowd["Producto"] == 'GASOLINA 91 OCT'){
	$TPP = $TPP + $rowd["Litros"];
	$TPP3 = $TPP3 + $rowd["Litros"]/1000;
	}if($rowd["Producto"] == 'DIESEL'){
	$TDD = $TDD + $rowd["Litros"];
	$TDD3 = $TDD3 + $rowd["Litros"]/1000;
	}

$M3 = $rowd["Litros"]/1000;
			 		
// Check connection  
 
			 
echo "<tr>
  <td><div align='center'><label>".$rowd["cliente"]."</label></div></td>
<td><div align='center'><label>".$rowd["destino"]."</label></div></td>
<td><div align='center'><label>".$rowd["Producto"]."</label></div></td>
<td><div align='center'><label>".$rowd["Cantidad"]."</label></div></td>
<td><div align='center'><label>".number_format($rowd["Litros"], 2, '.', ',')."</label></div></td>
<td><div align='center'><label>".number_format($M3, 3, '.', ',')."</label></div></td>
<td><div align='center'><label>$".number_format($rowd["Total"], 2, '.', ',')."</label></div></td></td>
 
 
 

</tr>";

}
$TM3 = $TL / 1000;
echo"
<tr>
<td class='color_blanco'></td>
<td class='color_blanco'></td>
<td class='color_blanco'></td>
<td class='color_blanco' style='text-align:center;'>".$TP."</td>
<td class='color_blanco' style='text-align:center;'>".number_format($TL, 2, '.', ',')."</td>
<td class='color_blanco' style='text-align:center;'>".number_format($TM3, 3, '.', ',')."</td>
<td class='color_blanco' style='text-align:center;'>$".number_format($TD, 2, '.', ',')."</td>
</tr>
<tr>
<td class='color_blanco'>Total Litros por Producto: </td>
<td class='color_blanco'>Total Litros por Producto M/3: </td>
</tr>

<tr>
<td class='color_blanco'>Magna: ".number_format($TMM, 2, '.', ',')."</td>
<td class='color_blanco'> Magna: ".number_format($TMM3, 3, '.', ',')."</td>
</tr>
<tr>
<td class='color_blanco'>Premium: ".number_format($TPP, 2, '.', ',')."</td>
<td class='color_blanco'> Premium: ".number_format($TPP3, 3, '.', ',')."</td>
</tr>
<tr>
<td class='color_blanco'>Diesel: ".number_format($TDD, 2, '.', ',')."</td>
<td class='color_blanco'> Diesel: ".number_format($TDD3, 3, '.', ',')."</td>
</tr>
";
	
}else { echo "0 results"; }

					
	  

	}
	?>
    				<table>
				 	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">
  
<textarea name="text" hidden cols="80" rows="2" id="txtarea"></textarea><br><br>
 
            
            <input type='submit' onclick='Print(this)' value='Exportar PDF'>
</form>		 	
</table>
	 </table>	
				
                    <br><br>
                    
                    
                    <table align="center">
                  
                    </table>
    
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
        <table align="center">
            <?php 
                if($_SESSION['idempresa'] == "2510" || $_SESSION['idempresa'] == "2511"){
                    echo'
                        <tr><br></tr>
                        <tr>
                            <td class="color_blanco" colspan="3">COMERCIALIZADORA PETROMAR - COMPRA</td>
                        </tr>
                        <tr>
                            <th style="width:40px;">Folio</th>
                            <th align="center" style="width:80px;">Fecha</th>
                            <th align="center">Destino</th>
                            <th align="center">Producto</th><th align="center">Cantidad</th>
                            <th align="center">Precio Compra</th>
                            <th align="center">Precio Con Desc.</th>
                            <th align="center">Flete</th>
                        </tr>
                    ';
                    if (isset($_POST['fini'])) {
                        // Check connection 
                        $inicial = $_POST['fini'];  
                        $final = $_POST['finial'];
                        $cont = 0;
                        
                        if ($connect->connect_error) {
                            die("Connection failed: " . $connect->connect_error);
                        }

                        $sqld = "select t1.folio, date(t1.fecha) as fecha, t1.Importe, t1.ImpuestosTraslados as Iva, t1.ImpuestosRetencion as IvaR, t1.total,  t1.NoPedido, t1.Cantidad, t1.ValorUnitario, t1.Flete, t1.Descuento, t2.Porcentaje from facturas t1 inner join estadocuenta t2  on t1.IdEmpresa = t2.IdEmpresa where date(t1.fecha) >= STR_TO_DATE('".$inicial."', '%d/%m/%Y') and date(t1.fecha) <= STR_TO_DATE('".$final."', '%d/%m/%Y') and t1.idempresa = '".$_SESSION['idempresa']."'";
                        $resultd = $connect->query($sqld);
                        if ($resultd->num_rows > 0) {
                            // output data of each row
                            while($rowd = $resultd->fetch_assoc()) {  
                                $sql = "Select t1.Folio, t1.Fecha,  t1.Producto,  t1.Producto as Subproducto, t1.Capacidad, t1.Destino, t2.Nombre from pedido t1 inner join destinos t2 on t1.destino = t2.destino where folio  = '".$rowd['NoPedido']."'";
                                $result = $connect->query($sql); 
                                $Porcentaje = $rowd["Porcentaje"]; 
                                $TOTAL = $rowd["total"]; 
                                $Flete = $rowd["Flete"]; 
                                $Importe = $rowd["Importe"];
                                $Cantidad = $rowd["Cantidad"]; 
                                $ValorU = $rowd["ValorUnitario"];
                                $Descuento = $rowd["Descuento"];
                                $ff = $rowd["folio"];
                                $IVA = $rowd["Iva"];
                                $IVAR = $rowd["IvaR"];
                                
                                if($Flete > 0 ){
                                    $IvaFlete = $Flete * 0.16;
                                    $FleteI = $Flete * 1.16;
                                    $IvaRetencion = $Flete * 0.04;
                                    $SubT = $Importe + $Flete;
                                    $Impuestos = (($TOTAL - ($SubT) + $Descuento)- $IvaFlete);
                                    $Impuestos = $Impuestos + $IvaRetencion;
                                } else {
                                    $IvaFlete = 0;
                                    $IvaRetencion = 0;
                                    $SubT = $Importe;
                                    $Impuestos = (($TOTAL - $Importe) + $Descuento); 
                                    $FleteI = '';
                                }

                                $PCompra = ($Importe + $Impuestos) / $Cantidad;
                                $PCompraSD = (($Importe + $Impuestos) - $Descuento) / $Cantidad;
                                
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $Producto = $row["Producto"]; 
                                        $cont = $cont + 1;
                                        $Vol = $Cantidad/159;
                                        $PrecioCom = $ValorU * 159;
                                        $x = (($Descuento * 1.16) + $IVAR)/$Cantidad;
                                        $PCompraCD = $PCompraSD + $x;	
                                        
                                        echo "
                                            <tr>
                                                <td><div align='center'><label>".$rowd["folio"]."</label></div></td>
                                                <td><div align='center'><label>".$rowd["fecha"]."</label></div></td>
                                                <td><div align='center'><label>".$row["Nombre"]."</label></div></td>
                                                <td><div align='center'><label>".$Producto."</label></div></td></td>
                                                <td><div align='center'><label>".$Cantidad."</label></div></td></td>
                                                <td><div align='center' style='width:80px;'><label>".round($PCompraCD, 2)."</label></div></td>
                                                <td><div align='center' style='width:80px;'><label >".round($PCompraSD, 2)."</label></div></td> 
                                                <td><div align='center' style='width:80px;'><label >".substr($FleteI, 0, 7)."</label></div></td>   
                                            </tr>
                                        ";
                                    }
                                } else { 
                                    echo ""; 
                                }
                            }

                            echo '<tr>
                                    <td class="color_blanco">Registros: '.$cont.'</td>
                                </tr>
                            ';					
                            
                            $connect->close();
                        }
                    }
                }
            ?>
        </table>
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

