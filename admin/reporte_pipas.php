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
            $("#un").load("controladorad/tprp.php");
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
							 <a class=bold href="menu_reportes">Reportes Internos</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Reporte Pipas</a>
							
					  </div>

						
				</div>
			
			
	
			
	
	
 




		<div id="maincontent"></div>		

	
	
	  
			
		
	<div id="maincontent" align="center">
     <form name="forma1" method="post" action="reporte_pipas">
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
			<!-- <a onClick="return calendario('forma1.finial');"></a> --></td>
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

    echo "<select name='IdEmpresa' id='sel' onchange='doThisOnChange(this.value)'   style='width:100%;' required>
	<option selected>Seleccione</option>
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


echo"<option>TODOS</option>

</td>
</tr>	";
?> 
				 
		  
          
          
          
          <tr>
				<td class="color_blanco"><b>Seleccione Estación:</b></td>
				<td class="color_blanco">
                <select name="destino" id="destinoss" required="required" style="width:120px">
                </td>
                
                
                
                
                
				 
		  </tr>	
			
			
	
		
		 
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
$dash = '-';
$inicial = $_POST['fini'];  
$ano = substr($_POST['fini'], 6); $mes = substr($_POST['fini'], 3, -5); $dia = substr($_POST['fini'], 0, -8);  
$fechai = $ano.$dash.$mes.$dash.$dia;
//$uno = strtotime($fechai);

$final = $_POST['finial']; 
$anoo = substr($_POST['finial'], 6); $mess = substr($_POST['finial'], 3, -5); $diaa = substr($_POST['finial'], 0, -8);  
$fechaf = $anoo.$dash.$mess.$dash.$diaa;
//$dos = strtotime($fechai); 

$uno = new DateTime($fechai);
$dos = new DateTime($fechaf);

$diff = date_add($uno, date_interval_create_from_date_string('-1 days'))->diff($dos)->format("%a");  

if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
 

if($_POST['IdEmpresa'] == 'TODOS'){
	$sqld = "SELECT   t3.rzonsocial as cliente, t1.destino, count(t1.Folio) as Cantidad, sum(t1.Folio) as TPipas, t1.Producto, sum(t2.Cantidad) as Litros, sum(t2.Total) as Total FROM pedido t1 inner join facturas t2 on t1.FolioFactura = t2.Folio inner join empresa t3 on t1.IdEmpresa = t3.IdEmpresa where STR_TO_DATE(t1.Fecha, '%d/%m/%Y') >= STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(t1.Fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y') and t1.facturado = '1'   group by t1.Destino, t1.Producto";
	 
	}else{ 
		
		
		if($_POST['destino'] == 'TODOS'){
				
		$sqld = "SELECT t3.rzonsocial as cliente, t1.destino, count(t1.Folio) as Cantidad, sum(t1.Folio) as TPipas, t1.Producto, sum(t2.Cantidad) as Litros, sum(t2.Total) as Total FROM pedido t1 inner join facturas t2 on t1.FolioFactura = t2.Folio inner join empresa t3 on t1.IdEmpresa = t3.IdEmpresa where STR_TO_DATE(t1.Fecha, '%d/%m/%Y') >= STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(t1.Fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y') and t1.facturado = '1' and t1.IdEmpresa = '".$_POST['IdEmpresa']."' group by t1.Destino, t1.Producto";
		
			}else{
					
		$sqld = "SELECT t3.rzonsocial as cliente, t1.destino, count(t1.Folio) as Cantidad, sum(t1.Folio) as TPipas, t1.Producto, sum(t2.Cantidad) as Litros, sum(t2.Total) as Total FROM pedido t1 inner join facturas t2 on t1.FolioFactura = t2.Folio inner join empresa t3 on t1.IdEmpresa = t3.IdEmpresa where STR_TO_DATE(t1.Fecha, '%d/%m/%Y') >= STR_TO_DATE('".$inicial."', '%d/%m/%Y') and STR_TO_DATE(t1.Fecha, '%d/%m/%Y') <= STR_TO_DATE('".$final."', '%d/%m/%Y') and t1.facturado = '1' and t1.IdEmpresa = '".$_POST['IdEmpresa']."' and t1.destino = '".$_POST['destino']."' group by t1.Destino, t1.Producto";
		
				}
	
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
<td class='color_blanco'></td>
</tr>
<tr>
<th>Total Litros / Producto: </th>
<th>Total Producto / M/3: </th>
 
</tr>

<tr>
<td >Magna: ".number_format($TMM, 2, '.', ',')."</td>
<td> Magna: ".number_format($TMM3, 3, '.', ',')."</td>
<td class='color_blanco' id='rm' colspan='1' align='right'><input type='text' id='rmm'  style='text-align:right; background:transparent; border: none; width:80px; ' readonly></td> 
<td class='color_blanco' colspan='1' align='right'><input type='text' id='rmr'  style='text-align:right; background:transparent; border: none;width:80px;' readonly></td> 
<td class='color_blanco' colspan='1' align='left'><input type='text' id='nivelm'  style='text-align:right; background:transparent; border: none;width:30px;' readonly></td> 
<td class='color_blanco' id='rm' colspan='1' align='right'><input type='text' id='rrmm'  style='text-align:right; background:transparent; border: none; width:80px; ' readonly></td>
<td class='color_blanco' id='rm' colspan='1' align='right'><input type='text' id='emr'  style='text-align:right; background:transparent; border: none; width:80px; ' readonly></td>
<td class='color_blanco' colspan='1' align='left'><input type='text' id='nim'  style='text-align:right; background:transparent; border: none;width:30px;' readonly></td>   
</tr>
<tr>
<td >Premium: ".number_format($TPP, 2, '.', ',')."</td>
<td > Premium: ".number_format($TPP3, 3, '.', ',')."</td>
<td class='color_blanco' colspan='1' align='right'><input type='text' id='rpp'  style='text-align:right; background:transparent; border: none;width:80px;' readonly></td> 
<td class='color_blanco' colspan='1' align='right'><input type='text' id='rpr'  style='text-align:right; background:transparent; border: none;width:80px;' readonly></td> 
<td class='color_blanco' colspan='1' align='left'><input type='text' id='nivelp'  style='text-align:right; background:transparent; border: none;width:30px;' readonly></td> 
<td class='color_blanco' colspan='1' align='right'><input type='text' id='rrpp'  style='text-align:right; background:transparent; border: none;width:80px;' readonly></td> 
<td class='color_blanco' id='rm' colspan='1' align='right'><input type='text' id='epr'  style='text-align:right; background:transparent; border: none; width:80px; ' readonly></td> 
<td class='color_blanco' colspan='1' align='left'><input type='text' id='nip'  style='text-align:right; background:transparent; border: none;width:30px;' readonly></td> 
</tr>
<tr>
<td >Diesel: ".number_format($TDD, 2, '.', ',')."</td>
<td > Diesel: ".number_format($TDD3, 3, '.', ',')."</td>
<td class='color_blanco' id='rd' colspan='1' align='right'><input type='text' id='rdd'  style='text-align:right; background:transparent; border: none;width:80px;' readonly></td> 
<td class='color_blanco' colspan='1' align='right'><input type='text' id='rdr'  style='text-align:right; background:transparent; border: none;width:80px;' readonly></td> 
<td class='color_blanco' colspan='1' align='left'><input type='text' id='niveld'  style='text-align:right; background:transparent; border: none;width:30px;' readonly></td> 
<td class='color_blanco' id='rd' colspan='1' align='right'><input type='text' id='rrdd'  style='text-align:right; background:transparent; border: none;width:80px;' readonly></td> 
<td class='color_blanco' id='rm' colspan='1' align='right'><input type='text' id='edr'  style='text-align:right; background:transparent; border: none; width:80px; ' readonly></td> 
<td class='color_blanco' colspan='1' align='left'><input type='text' id='nid'  style='text-align:right; background:transparent; border: none;width:30px;' readonly></td> 
</tr>
 ";
	
}else { echo "0 results"; }
$connect->close();
					
	  

	}
	?> 
   

<script>
function myFunction() { 
  var MM = <?php echo $TMM ?>;
  MM = MM  / 1000;
	var PP = <?php echo $TPP ?>;
	PP = PP /1000;
	var DD = <?php echo $TDD ?>;
	DD = DD /1000;
	var mmu = 1, mmd=222, mmt=333, mmc=498, mmcc=742, mms=2030, mmss=2379, mmo=3830, mmn=4754;
	var mu = 221, md=332, mt=497, mc=741, mcc=2029, ms=2378, mss=3829, mo=4753, mn=4754;
	var mrestante = 0;  var msobrante = 0; var mrestanter = 0; var msobranter = 0;
	var nm = 0;	var np = 0;
	var nd = 0;	
	var divisor = <?php echo $diff ?>;
	 
	
	
    		  if(MM > 1 && MM <= 221 ){
			  mrestante = mu-MM;
			  mrestanter = (mu-((MM/divisor) * 30.5));
			  nm = 1;
			  msobrante = MM-mmu;
			  msobranter = (((MM/divisor) * 30.5))-mmu;
			  }else if(MM >= 222 && MM <= 332){
			  mrestante = md-MM;
			   mrestanter = (md-((MM/divisor) * 30.5));
			  nm = 2;
			  msobrante = MM-mmd;
			  msobranter = (((MM/divisor) * 30.5))-mmd;
			  }else if(MM >= 333 && MM <= 497){
			  mrestante = mt-MM;
			   mrestanter = (mt-((MM/divisor) * 30.5));
			  nm = 3;
			  msobrante = MM-mmt;
			  msobranter = (((MM/divisor) * 30.5))-mmt;
			  }else if(MM >= 498 && MM <= 741){
			  mrestante = mc-MM;
			   mrestanter = (mc-((MM/divisor) * 30.5));
			  nm = 4;
			  msobrante = MM-mmc;
			  msobranter = (((MM/divisor) * 30.5))-mmc;
			  }else if(MM >= 742 && MM <= 2029){
			  mrestante = mcc-MM;
			   mrestanter = (mcc-((MM/divisor) * 30.5));
			  nm = 5; 
			  msobrante = MM-mmcc;
			  msobranter = (((MM/divisor) * 30.5))-mmcc;
			  }else if(MM >= 2030 && MM <= 2378){
			  mrestante = ms-MM;
			   mrestanter = (ms-((MM/divisor) * 30.5));
			  nm = 6;
			  msobrante = MM-mms;
			  msobranter = (((MM/divisor) * 30.5))-mms;
			  }else if(MM >= 2379 && MM <= 3829){
			  mrestante = mss-MM;
			   mrestanter = (mss-((MM/divisor) * 30.5));
			  nm = 7; 
			  msobrante = MM-mmss;
			  msobranter = (((MM/divisor) * 30.5))-mmss;
			  }else if(MM >= 3830 && MM <= 4753){
			  mrestante = mo-MM;
			   mrestanter = (mo-((MM/divisor) * 30.5)); 
			  nm = 8;
			  msobrante = MM-mmo;
			  msobranter = (((MM/divisor) * 30.5))-mmo;
			  }else if(MM >= 4754){
			  mrestante = mn-MM;
			   mrestanter = (mn-((MM/divisor) * 30.5));
			  nm = 9;
			  msobrante = MM-mmn;
			  msobranter = (((MM/divisor) * 30.5))-mmn;
			  } 
			   
			   $("#rmm").val((mrestante).toFixed(2) + ' M/3'); 
			    $("#rmr").val((mrestanter).toFixed(2)  + ' M/3'); 
				$("#nivelm").val(nm + 1); 
			    $("#rrmm").val((msobrante).toFixed(2)+ ' M/3'); 
				$("#emr").val((msobranter).toFixed(2)  + ' M/3'); 
				$("#nim").val(nm); 
   var ppu = 1, ppd=68, ppt=88, ppc=149, ppcc=267, pps=512, ppss=1388, ppo=2188, ppn=2309;
	var pu = 221, pd=332, pt=497, pc=741, pcc=2029, ps=2378, pss=3829, po=4753, pn=4754;
	var prestante = 0;
	var psobrante = 0;
	var prestanter = 0;
	var psobranter = 0;

			  if(PP > 1 && PP <= 67 ){
			  prestante = pu-PP;
			  prestanter = (pu-((PP/divisor) * 30.5));
			  np = 1;
			  psobrante = PP-ppu;
			  psobranter = (((PP/divisor) * 30.5))-ppu;
			  }else if(PP >= 68 && PP <= 87){
			  prestante = pd-PP;
			   prestanter = (pd-((PP/divisor) * 30.5));
			  np = 2;
			  psobrante = PP-ppd;
			  psobranter = (((PP/divisor) * 30.5))-ppd;
			  }else if(PP >= 88 && PP <= 148){
			  prestante = pt-PP; 
			   prestanter = (pt-((PP/divisor) * 30.5));
			  np = 3;
			  psobrante = PP-ppt;
			  psobranter = (((PP/divisor) * 30.5))-ppt;
			  }else if(PP >= 149 && PP <= 266){
			  prestante = pc-PP; 
			   prestanter = (pc-((PP/divisor) * 30.5));
			  np = 4;
			  psobrante = PP-ppc;
			  psobranter = (((PP/divisor) * 30.5))-ppc;
			  }else if(PP >= 267 && PP <=  511){
			  prestante = pcc-PP;
			   prestanter = (pcc-((PP/divisor) * 30.5));
			  np = 5;
			  psobrante = PP-ppcc;
			  psobranter = (((PP/divisor) * 30.5))-ppcc;
			  }else if(PP >= 512 && PP <= 1387){
			  prestante = ps-PP;
			   prestanter = (ps-((PP/divisor) * 30.5));
			  np = 6;
			  psobrante = PP-pps;
			  psobranter = (((PP/divisor) * 30.5))-pps;
			  }else if(PP >= 1388 && PP <= 2187){
			  prestante = pss-PP; 
			   prestanter = (pss-((PP/divisor) * 30.5));
			  np = 7;
			  psobrante = PP-ppss;
			  psobranter = (((PP/divisor) * 30.5))-ppss;
			  }else if(PP >= 2188 && PP <= 2308){
			  prestante = po-PP; 
			   prestanter = (po-((PP/divisor) * 30.5));
			  np = 8;
			  psobrante = PP-ppo;
			  psobranter = (((PP/divisor) * 30.5))-ppo;
			  }else if(PP >= 2309){
			  prestante = pn-PP; 
			   prestanter = (pn-((PP/divisor) * 30.5));
			  np = 9;
			  psobrante = PP-ppn;
			  psobranter = (((PP/divisor) * 30.5))-ppn;
			  } 
			  			$("#rpp").val((prestante).toFixed(2) + ' M/3'); 
						$("#rpr").val((prestanter).toFixed(2) + ' M/3');
						$("#nivelp").val(np + 1);  
						$("#rrpp").val((psobrante).toFixed(2)+ ' M/3'); 
						$("#epr").val((psobranter).toFixed(2)  + ' M/3'); 
						$("#nip").val(np); 
						
var ddu = 1, ddd=221, ddt=259, ddc=373, ddcc=933, dds=1196, ddss=2152, ddoo=6475, ddn=15188;					  
	var du = 221, dd=332, dt=497, dc=741, dcc=2029, ds=2378, dss=3829, doo=4753, dn=4754;
	var drestante = 0;var dsobrante = 0; var drestanter = 0;  var  dsobranter = 0;
			  if(DD >= 1 && DD <= 220 ){
			  drestante = du-DD;
			   drestanter = (du-((DD/divisor) * 30.5));
			  nd = 1;
			  dsobrante = DD-ddu;
			  dsobranter = (((DD/divisor) * 30.5))-ddu;
			  }else if(DD >= 221 && DD <= 258){
			  drestante = dd-DD; 
			  drestanter = (dd-((DD/divisor) * 30.5));
			  nd = 2;
			  dsobrante = DD-ddd;
			  dsobranter = (((DD/divisor) * 30.5))-ddd;
			  }else if(DD >= 259 && DD <= 372){
			  drestante = dt-DD;
			  drestanter = (dt-((DD/divisor) * 30.5));
			  nd = 3;
			  dsobrante = DD-ddt;
			  			  dsobranter = (((DD/divisor) * 30.5))-ddt;
			  }else if(DD >= 373 && DD <= 932){
			  drestante = dc-DD; 
			  drestanter = (dc-((DD/divisor) * 30.5));
			  nd = 4;
			  dsobrante = DD-ddc;
			  			  dsobranter = (((DD/divisor) * 30.5))-ddc;
			  }else if(DD >= 933 && DD <= 1195){
			  drestante = dcc-DD;
			  drestanter = (dcc-((DD/divisor) * 30.5));
			  nd = 5; 
			  dsobrante = DD-ddcc;
			  			  dsobranter = (((DD/divisor) * 30.5))-ddcc;
			  }else if(DD >= 1196 && DD <= 2151){
			  drestante = ds-DD;
			  drestanter = (ds-((DD/divisor) * 30.5));
			  nd = 6;
			  dsobrante = DD-dds;
			  			  dsobranter = (((DD/divisor) * 30.5))-dds;
			  }else if(DD >= 2152  && DD <= 6474){
			  drestante = dss-DD;
			  drestanter = (dss-((DD/divisor) * 30.5));
			  nd = 7;
			  dsobrante = DD-ddss;
			  			  dsobranter = (((DD/divisor) * 30.5))-ddss;
			  }else if(DD >= 6475 && DD <= 15187){
			  drestante = ddo-DD; 
			  drestanter = (ddo-((DD/divisor) * 30.5));
			  nd = 8;
			  dsobrante = DD-doo;
			  			  dsobranter = (((DD/divisor) * 30.5))-doo;
			  }else if(DD >= 15188){
			  drestante = dn-DD; 
			  drestanter = (dn-((DD/divisor) * 30.5));
			  nd = 9;
			  dsobrante = DD-ddn;
			  dsobranter = (((DD/divisor) * 30.5))-ddn;
			  }  
			  
			  			 $("#rdd").val((drestante).toFixed(2) + ' M/3'); 
						 $("#rdr").val((drestanter).toFixed(2) + ' M/3'); 
						 $("#niveld").val(nd + 1); 
						  $("#rrdd").val((dsobrante).toFixed(2) + ' M/3'); 
						  $("#edr").val((dsobranter).toFixed(2)  + ' M/3'); 
						  $("#nid").val(nd); 
	
}
</script>
    
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
			<tr class="link" align="center">
				 
				<td colspan="4" align="center" class="color_blanco"> 
					<b>.....</b> 
				</td> 
			</tr>
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
function setInputDate(_id){
    var _dat = document.querySelector(_id);
     var hoy =new Date(new Date().setDate(new Date().getDate() - 30)),
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
     </script>
	 
	   <script>
function setInputDate(_id){
    var _dat = document.querySelector(_id);
     var hoy =new Date(new Date().setDate(new Date().getDate())),
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

   
<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->