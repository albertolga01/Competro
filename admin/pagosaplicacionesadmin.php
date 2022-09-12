

<?php 
require 'connector.php';
global $connect;
$inicial = ''; 
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
            $("#un").load("controladorad/tppagosaps.php");
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
?>}
</script>

	
<!-- FIN DEL ENCABEZADO --> 


	


	


	<!--Ruteo de la página-->
	  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					 
							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Consulta de Pagos y Aplicaciones</a>
							
					  </div>

						
				</div>
	
			
	
	
 



 
	
	  
			
		
	<div id="maincontent" align="center"> 	
      
       <form name="forma1" method="post" action="pagosaplicacionesadmin">
       
       
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

/*
    $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");

    echo "<select name='IdEmpresa' id='IdEmpresa' style='width:100%;'>";
	
	if (isset($_POST['IdEmpresa'])) {	
  
	$resultx = $connect->query("select IdEmpresa, usuario from empresa where       tusuario='1' and idempresa = '".$_POST['IdEmpresa']."'");
	
	 while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['IdEmpresa'];
                  $name = $row['usuario']; 
                  echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';

}
	
	  
	   
	   } 
	   
				

    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['IdEmpresa'];
                  $name = $row['usuario']; 
                  echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';

}
echo "<option value='TODOS'>TODOS</option>";
    echo "</select>"; */
?> 


</td>
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
    </form>
    
    <br><br>
    <table align="center" id="tabb" style="font-size:11px;">
			<tr align="center">
				<th colspan="8">Documento de cargo</th>
				<th colspan="10">Documento de pago</th>			
			</tr>
			
			<tr align="center">
				<th>Empresa</th>
				<th>Folio</th>
                <th>Documento</th>
				<th>No. Pedido</th>
				<th>Importe</th>
				<th>Forma de pago</th>
				<th>Moneda</th>
				<th>Fecha vencimiento</th>
				<th>Tipo</th>				
				<th>T.A.D. o Banco</th>
				<th>Documento</th>
				<th>Fecha</th>
				<th>Importe</th>
				<th>Folio pago</th>
				<th>Interes moratorio</th>								
				<th>IVA interes moratorio</th> 
				<th>Restante</th>	
                <th>Complementos</th>																								
               																							
			</tr>
			 
            <?php
			
			if(isset($_POST['fini'])){
			
			
           if ($connect->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$myDate = date('d/m/Y');
$Fecha = $_POST['fini']; 
$inicial = $_POST['fini'];
 
$Fecho = str_replace('/', '-', $inicial); 
$inicial = date('Y-m-d', strtotime($Fecho. ' 0 days'));  

$final = $_POST['finial']; 
$Fechoo = str_replace('/', '-', $final); 
$final = date('Y-m-d', strtotime($Fechoo. ' 0 days')); 

$contador = 0;
$sum = 0;
  
if($_POST['IdEmpresa'] == 'TODOS'){
$sql = "Select t2.RzonSocial as usuario, t1.folio, t1.factura, t1.importe, t1.fp, t1.moneda, t1.fechav, t1.tipopago, t1.tadbanco, t1.documento, t1.fecha, t1.abono, t1.intereses, t1.iva, t1.fechacaptura, t1.generado, t1.foliopago FROM cargosaplicaciones t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa where date(t1.fechacaptura) >= '".$inicial."' and date(t1.fechacaptura) <= '".$final."' AND t1.inactivo = '0'";
   
}else{
	$sql = "Select t2.RzonSocial as usuario, t1.folio, t1.factura, t1.importe, t1.fp, t1.moneda, t1.fechav, t1.tipopago, t1.tadbanco, t1.documento, t1.fecha, t1.abono, t1.intereses, t1.iva, t1.fechacaptura, t1.generado, t1.foliopago FROM cargosaplicaciones t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa where date(t1.fechacaptura) >= '".$inicial."' and date(t1.fechacaptura) <= '".$final."' and t1.IdEmpresa = '".$_POST['IdEmpresa']."' AND t1.inactivo = '0'";
	}
  
//NO FUNCIONA EL TODOS

$result = $connect->query($sql);
 

if ($result->num_rows > 0) { 
while($row = $result->fetch_assoc()) {
	$Folc = $row['folio'];
	$generado = $row['generado'];
	$QQ = "SELECT NoPedido, Folio, FP from facturas  where factura = '".$row["factura"]."'";
	$resultQQ = $connect->query($QQ);
if ($resultQQ->num_rows > 0) {
while($rowQ = $resultQQ->fetch_assoc()) {
	$NoP = $rowQ["NoPedido"];
	$Folf = $rowQ["Folio"];
    $FP = $rowQ["FP"];
    
}
} 
	$fechacaptura = $row['fechacaptura'];
	$importef = number_format($row["importe"], 2, '.', ',');
	$abono = number_format($row["abono"], 2, '.', ','); 
	
	$contador = $contador + 1;
	$sum = $sum + $row["abono"];
	if($FP == "1") {
        $TP = "CREDITO";
    } else {
        $TP = "CONTADO";
    }
    if($abono >= 0.01){
echo "<tr>
<td> <label style='width:100px;
   height:25px;   align: center;'>".$row["usuario"]."</label></td>
   <td> <label style='width:40px;
   height:25px;   align: center;'>".$Folc."</label></td>
   
<td> <label style='width:40px;
   height:25px;   align: center;'>".$row["factura"]."</label></td>
   <td> <label style='width:40px;
   height:25px;   align: center;'>".$NoP."</label></td>
   <td> <label style='width:40px;
   height:25px;   align: center;'>$".$importef."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>".$TP."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>".$row["moneda"]."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>".$row["fechav"]."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>".$row["tipopago"]."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>".$row["tadbanco"]."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>".$row["documento"]."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>".$row["fecha"]."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>$".$abono."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>".$row["foliopago"]."</label></td><td> <label style='width:40px;
   height:25px;   align: center;'>$".$row["intereses"]."</label></td>
   <td> <label style='width:40px;
   height:25px;   align: center;'>$".$row["iva"]."</label></td>


   <form name='forma' method='post' action='cargacomplementos'>  
   <input type='hidden' name='folio' value='".$Folf."'>
   <input type='hidden' name='usuario' value='".$row["usuario"]."'>
   <input type='hidden' name='foliof' value='".$Folf."'>
   <input type='hidden' name='factura' value='".$row["factura"]."'>
   <input type='hidden' name='importef' value='".$importef."'>
   <input type='hidden' name='fp' value='".$row["fp"]."'>
   <input type='hidden' name='moneda' value='".$row["moneda"]."'>
   <input type='hidden' name='fechav' value='".$row["fechav"]."'>
   <input type='hidden' name='tipopago' value='".$row["tipopago"]."'>
   <input type='hidden' name='tadbanco' value='".$row["tadbanco"]."'>
   <input type='hidden' name='documento' value='".$row["documento"]."'>
   <input type='hidden' name='fecha' value='".$row["fecha"]."'>
   <input type='hidden' name='abono' value='".$abono."'>
   <input type='hidden' name='intereses' value='".$row["intereses"]."'>
   <input type='hidden' name='iva' value='".$row["iva"]."'>
   <input type='hidden' name='fechapago' value='".$row["fechacaptura"]."'>
   <input type='hidden' name='foliocargo' value='".$Folc."'>

  
   <input type='hidden' name='importepago' value='".$row['abono']."'>
   <input type='hidden' name='xml' value='1'>
   <td>
   ";
$QRes = "select sum(t1.Abono) as restante, t1.importe, count(t1.abono) as noparcialidades from cargosaplicaciones t1 inner join facturas t2 on t1.factura = t2.factura where t2.folio = '".$Folf."' and t1.folio < '".$Folc."' and inactivo = '0'";
 
    $resultQQx = $connect->query($QRes);
    if ($resultQQx->num_rows > 0) {
        while($rowx = $resultQQx->fetch_assoc()) {
			$abonado = $rowx['restante'];
			$total = $row['importe'];
			$noparcialidad = $rowx['noparcialidades'];
			$restante = $total - $abonado;  
		echo "<label style='width:40px;
   height:25px;   align: center;'>$".number_format($restante, 2, '.', ',')."</label>  ";
		echo " <input type='hidden' name='saldoanterior' value='".$restante."'>";
		echo " <input type='hidden' name='noparcialidad' value='".$noparcialidad."'>";
        }
    }

    echo "</td> <td align='center'>";
    if($FP=="1" && $generado=="0") {
    echo "
   <input type='submit'  style='width:70px;' name='complemento' value='Generar' onclick=''>
    ";
   
    }else if ($FP == "1"){echo "<label>Generado</label>";}else{} echo "</td>
    </form></tr>";
}
}
echo "
<tr>
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
 <td class='color_blanco'></td>  
<td class='color_blanco' aling='center'>$".number_format($sum, 2, '.', ',')."</td>
</tr>
";
 
} else { echo "0 results"; }
$connect->close();

}else{}
?>
           
		</table>		
        
        <table>
				 	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">
  
<textarea name="text" hidden cols="80" rows="2" id="txtarea"></textarea><br><br>
 
            
            <input type='submit' onclick='Print(this)' value='Exportar PDF'>
</form>		 	
</table>
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
	
	<div id="maincontent"> 
		<table align="center">
			<tr class="link" align="center">
				 		
			 
				<td colspan="4" align="center" class="color_blanco"> 
					<b><a href="" onClick="return documento('/portal','0')">.....</a></b> 
				</td> 
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

<?php
    if (isset($_POST['mensaje'])){
        echo "
            <script>alert('".$_POST['mensaje']."');</script>
        ";
    } else {}
?>

    
    
      <script>
         function Print(){
          
 $('#txtarea').html(document.getElementById('tabb').outerHTML)
 }
 </script>

<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->