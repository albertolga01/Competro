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
							 <a class=bold href="#">
Consulta de pagos y aplicaciones</a>
							
					  </div>

						
				</div>
	
			
	
	
 


 
	
	  
			
		
	<div id="maincontent" align="center"> 	
      
       <form name="forma1" method="post" action="pagosaplicaciones">
       
        <?php
echo '<input type="hidden" name="IdEmpresa" value="'. $_SESSION["idempresa"] .'">';
?>
       <input type="hidden" name="IdEmpresa" value="2510">
       	<table align="center" class="parametros">
			<tr>
				<td class="color_blanco"><b>Fecha Inicial:</b></td>
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
				<td class="color_blanco"><b>Fecha Final:</b></td>
				<td class="color_blanco">
                   <?php if(isset($_POST['finial'])){
					echo '<input type="text" value= "'. $_POST['finial'].'" name="finial" id="dateDefaultfinalj">';
					}else{
						
						echo '<input type="text" value= "00/00/0000" name="finial" id="dateDefaultfinal">';
						}    ?>
				<a onClick="return calendario('forma1.finial');"></a></td>
                  
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
   

    <br><br>
    
    
    
   
	 
            <?php
			
		 
	if(isset($_POST['fini'])){	
$Id = $_SESSION["idempresa"];
 
			
          
$Fol = '';
$NoP = '';
$myDate = date('d/m/Y');
$Fecha = $_POST['fini']; 
$inicial = $_POST['fini'];
 
$Fecho = str_replace('/', '-', $inicial); 
$inicial = date('Y-m-d', strtotime($Fecho. ' 0 days'));  

$final = $_POST['finial']; 
$Fechoo = str_replace('/', '-', $final); 
$final = date('Y-m-d', strtotime($Fechoo. ' 0 days'));   
$sql = "SELECT folio, factura, importe, fp, moneda, fechav, tipopago, tadbanco, documento, fecha, abono, intereses, iva FROM cargosaplicaciones where date(fecha) >= '".$inicial."' and date(fecha) <= '".$final."' and idempresa = '".$Id."'";

 
 $contador = 0;
$sum = 0;
$result = $connect->query($sql);
if ($result->num_rows > 0) {  
echo '

<div style="width:1060px; Overflow-x:scroll;">
 <table align="center" id="tab">
			<tr ><th colspan="7">Documento de Cobro</th>
			<th colspan="7">Documento de Pago</th>
			</tr>
			
			<tr >
          		<th>Folio</th>
				<th>Documento</th>
                <th>NoPedido</th>
				<th>Importe</th>
				<th>Forma de pago</th>
				<th>Moneda</th>
				<th>Fecha vencimiento</th>
				<th>Tipo</th>				
				<th>T.A.D. o Banco</th>
				<th>Documento</th>
				<th>Fecha</th>
				<th>Importe</th>
				<th>Interes moratorio</th>								
				<th>IVA interes moratorio</th>												
		  </tr>';

// output data of each row
while($row = $result->fetch_assoc()) {
	
	
	$contador = $contador + 1;
	$sum = $sum + $row["abono"];
	$QQ = "SELECT NoPedido, Folio from facturas where factura = '".$row["factura"]."'";
	$resultQQ = $connect->query($QQ);
if ($resultQQ->num_rows > 0) {
while($rowQ = $resultQQ->fetch_assoc()) {
	$NoP = $rowQ["NoPedido"];
	$Fol = $rowQ["Folio"];
}
}
	
	
	$importef = number_format($row["importe"], 2, '.', ','); 
	$abono = number_format($row["abono"], 2, '.', ','); 
echo "<tr>
<td> <label style='width:40px;
   height:25px;   align: center;'>".$Fol."</label></td>
<td> <label style='width:40px;
   height:25px;   align: center;'>".$row["factura"]."</label></td>
   <td> <label style='width:40px;
   height:25px;   align: center;'>".$NoP."</label></td>
   <td> <label style='width:40px;
   height:25px;   align: center;'>$".$importef."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>".$row["fp"]."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>".$row["moneda"]."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>".$row["fechav"]."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>".$row["tipopago"]."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>".$row["tadbanco"]."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>".$row["documento"]."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>".$row["fecha"]."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>$".$abono."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>$".$row["intereses"]."</label></td>
   <td> <label style='width:40px;
   height:25px;   align: center;'>$".$row["iva"]."</label></td>


 </form>
</tr>";
}
echo "<tr>
<td class='color_blanco'>Registros: 
".$contador."
</td>
<td class='color_blanco'></td>
<td class='color_blanco'></td>
<td class='color_blanco'></td>
<td class='color_blanco'></td>
 <td class='color_blanco'></td>
<td class='color_blanco'></td>
 <td class='color_blanco'></td>
<td class='color_blanco'></td>
 <td class='color_blanco'></td> 
 <td class='color_blanco'></td> 
 
 
<td class='color_blanco' align='center'>$".number_format($sum, 2, '.', ',')."</td>
</tr>

</table>	
        </div>	";
} else { 
 
}
 
	}
?>
           
		
        
        
         </form>
     <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">
  
<textarea name="text"   hidden  cols="80" rows="5" id="txtarea"></textarea><br><br>
 
         <input type='submit' onclick='Print(this)' value='Exportar PDF'>  
           
</form>  
  
 
     <script>
         function Print(){
         
 $('#txtarea').html(document.getElementById('tab').outerHTML)
 }
 </script>
    <script>
function setInputDate(_id){
    var _dat = document.querySelector(_id);
var hoy =new Date(new Date().setDate(new Date().getDate() - 7)),
     
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
   var hoye =new Date(),
   
     
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
   
    
    
		
           
            
            
            
            <br><br>
            
		
			
	</div> 	
		
						
	
	<form action="LoginServlet" method="post">
	</form>
	
	  
	


	
	



 
</div>
 


<br><br>

<script>
renderFooter();
</script>

</div>




</body>
</html>


     
<script language="JavaScript" src="scripts/datetime.js"></script>     