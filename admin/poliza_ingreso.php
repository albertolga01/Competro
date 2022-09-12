
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

	<SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>
	

	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>

	<script language="JavaScript" src="scripts/calendario.js"></script> 
     
     <script src="Blob.js"></script>
     <script src="xlsx.core.js"></script>
     <script src="FileSaver.js"></script> 
<script src="tableexport.js"></script>
    
    
    
    

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

     <?php
   session_start();	
  
echo ' <p class="textoEjecutivo" align="center"> Bienvenido(a) '. $_SESSION["usuario"] .' - '.$_SESSION["rfc"].'</p>';
?>
   

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

<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->	
<!-- FIN DEL ENCABEZADO --> 


	


	


	<!--Ruteo de la página-->
		  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					 
							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Poliza de Ingresos</a>
							
					  </div>

						
				</div>
			
			
	
			
	
	
 




		<div id="maincontent"></div>		

	
	
	  
			
		
	<div id="maincontent" align="center">
     <form name="forma1" method="post" action="poliza_ingreso">
     <input type="hidden" name="uno" vlaue='1'>
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
			<td class="color_blanco" hidden="hidden"><B>Introduce la Fecha Final:</B></td>
			<td class="color_blanco" hidden="hidden">
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

 
?> </td>
				 
		  </tr>	
	
		
		<tr>
			  <!--<input type="radio" id="male" name="gender" value="male">
  <label for="male">Male</label><br>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label><br>
  <input type="radio" id="other" name="gender" value="other">
  <label for="other">Other</label>-->
		</tr>
		<tr>
			<td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
		</tr>
	</table>
    </form>
    
   <?php 
   $month = '';
   if(isset($_POST['fini'])){
   $mes = substr($_POST['fini'], 3, -5); 
   
   switch ($mes) {
   case '01':
         $month = 'ENERO';
         break;
   case '02':
         $month = 'FEBRERO';
         break;
   case '03':
         $month = 'MARZO';
         break;
   case '04':
         $month = 'ABRIL';
         break;
   case '05':
         $month = 'MAYO';
         break;
   case '06':
         $month = 'JUNIO';
         break;
   case '07':
         $month = 'JULIO';
         break;
   case '08':
         $month = 'AGOSTO';
         break;
   case '09':
         $month = 'SEPTIEMBRE';
         break;
   case '10':
         $month = 'OCTUBRE';
         break;
   case '11':
         $month = 'NOVIEMBRE';
         break;
   case '12':
         $month = 'DICIEMBRE';
         break;
}
   }
   ?>
     
<table align="center" >
 
<tr><br></tr>
	<tr><td class="color_blanco" colspan="2">Fecha: <?php echo "".$_POST['fini'].""; ?> 
</td><td class="color_blanco">  </td><td class="color_blanco"></td><td colspan="2" class="color_blanco">Concepto: DEPOSITOS RECIBIDOS </td></tr>
</table><table id="Depositos">
						<tr>
							<th >P</th> 
                            <th align="center"><?php if(isset($_POST['fini'])){ 
								$ano = substr($_POST['fini'], 6); 
								$mes = substr($_POST['fini'], 3, -5); 
								$dia = substr($_POST['fini'], 0, -8); 
								echo  $ano;  echo $mes; echo $dia;
								} ?></th> 
							<th align="center">1</th>
						    <th align="center"><?php echo $dia; ?></th>
							<th align="center">1</th>
							<th align="center">0</th>
                            <th align="center">DEPOSITOS RECIBIDOS <?php echo $dia; echo " "; echo $month; echo " "; echo $ano; ?></th>
                           <th align="center">11</th>   
                           <th align="center">0</th>
                           <th align="center">0</th>
						</tr>
						
    
    <?php 
	if (isset($_POST['fini'])) {
// Check connection 
$inicial = $_POST['fini'];  
$final = $_POST['finial'];
$Total = 0;

$cont = 0;
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

  $sqld = "select t1.folio, DATE_FORMAT(t1.fecha,'%d/%m/%Y')  as fecha from movimientos t1 inner join estadocuenta t2  on t1.IdEmpresa = t2.IdEmpresa where date(t1.fecha) = STR_TO_DATE('".$inicial."', '%d/%m/%Y') ";
  
   
   //and date(t1.fecha) <= STR_TO_DATE('".$final."', '%d/%m/%Y') 
 
$resultd = $connect->query($sqld);
if ($resultd->num_rows > 0) {
// output data of each row
while($rowd = $resultd->fetch_assoc()) {  
	
 
 

$sql = "SELECT '+' AS signo, '101002003001' AS Cuenta, t1.Folio, t1.Fecha, t1.Abono, t2.NombreCuenta FROM movimientos t1 INNER JOIN empresa t2 ON t1.IdEmpresa = t2.IdEmpresa WHERE folio  = '".$rowd['folio']."'
UNION ALL
SELECT '-' AS signo, t2.Cuenta, t1.Folio, t1.Fecha, t1.Abono, t2.NombreCuenta FROM movimientos t1 INNER JOIN empresa t2 ON t1.IdEmpresa = t2.IdEmpresa WHERE folio  = '".$rowd['folio']."'
";

 
  
   
$A = 0;
$result = $connect->query($sql); 
 

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) { 
	$cont = $cont + 1; 
	$cta = $row['Cuenta'];
	$Abono = $row['Abono'];
	$Cargo = $row['Abono'];
	$NombreCuenta = $row['NombreCuenta'];
	$Total = $Total + $row['Abono'];
	
	if($row['signo'] == '-'){$tipo = 0;}
	if($row['signo'] == '+'){$tipo = 1;}
	 

	
echo "<tr>  
<td><div align='center'><label>M1</label></div></td>
<td><div align='center'><label>".$cta."</label></div></td>
<td><div align='center'><label>".$rowd['fecha']."</label></div></td>
<td><div align='center'><label>".$tipo."</label></div></td>
<td><div align='center'><label>".number_format($Abono, 1, '.', '')."</label></div></td>
<td><div align='center'><label>0</label></div></td>
<td><div align='center'><label>".number_format($A, 1, '.', '')."</label></div></td> 
<td><div align='center'><label>".$NombreCuenta."</label></div></td>  
</tr>";
	
} 
}else { echo ""; } 

}
echo "</table>";	
echo '<table><tr>
<td class="color_blanco">Registros: '.$cont.'
</td>
<td class="color_blanco"></td><td class="color_blanco"></td><td class="color_blanco"></td><td class="color_blanco" align="right">Total poliza :</td>
<td class="color_blanco" align="center">'.$Total.'</td>
<td class="color_blanco" align="center">'.$Total.'</td>
</tr>
</table>
';					
	 
}







	}
	?>
    
	 
     
     
    <br>  
    <br>
  
 
     
     
     
     
     
     
     
     
   
     
     
     
     
     
     
				
                    <br><br>
                    <!--
                    
                    <form name="forma1" method="post" action="poliza_ingreso">
     <input type="hidden" name="dos" value='1'>
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
			 
		</tr>
		<tr>
			<td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
		</tr>
	</table>
    </form>
    -->	
                    
                    <table>
<tr><br></tr>
						<tr><td class="color_blanco" colspan="2">Fecha: <?php echo "".$_POST['fini'].""; ?> 
</td><td class="color_blanco">  </td><td class="color_blanco"></td><td colspan="4" class="color_blanco">Concepto: APLICACIÓN DE ANTICIPO </td></tr>
</table>
<table align="center"  id="Anticipos">
						<tr>
							<th >P</th>
							<th align="center"><?php if(isset($_POST['fini'])){ 
								$ano = substr($_POST['fini'], 6); 
								$mes = substr($_POST['fini'], 3, -5); 
								$dia = substr($_POST['fini'], 0, -8); 
								echo  $ano;  echo $mes; echo $dia;
								} ?></th>
							<th align="center">3</th>
                            <th align="center"><?php echo $dia; ?></th>
                            <th align="center">1</th> 
							<th align="center">0</th>
                            <th align="center">APLICACIÓN DE ANTICIPO PETROMAR DEL PACIFICO SA DE CV</th>
                            <th align="center">11</th>
                            <th align="center">0</th>
                            <th align="center">0</th>
                                  
						</tr>
						
    
    <?php 
	if (isset($_POST['fini'])) {
// Check connection 
$inicial = $_POST['fini'];  
$final = $_POST['finial'];
$Total = 0;

$cont = 0;
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

  $sqld = "select t2.RzonSocial, t1.folio, DATE_FORMAT(t1.fecha,'%d/%m/%Y')  as fecha from facturas t1 inner join empresa t2  on t1.IdEmpresa = t2.IdEmpresa where date(t1.fecha) = STR_TO_DATE('".$inicial."', '%d/%m/%Y') and t1.IdEmpresa = '".$_POST['IdEmpresa']."' ";
  
   //and date(t1.fecha) <= STR_TO_DATE('".$final."', '%d/%m/%Y')
   $TU = 0;
 
$resultd = $connect->query($sqld);
if ($resultd->num_rows > 0) {
// output data of each row
while($rowd = $resultd->fetch_assoc()) {  
	
 
  $RSU = $rowd['RzonSocial'];

$sql = "Select '+' as signo, t2.Cuenta, t1.Folio, t1.Fecha, t1.Total as Abono, t2.RzonSocial from facturas t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa where folio  = '".$rowd['folio']."' and t1.IdEmpresa = '".$_POST['IdEmpresa']."'
 
";
 
 
  


$result = $connect->query($sql); 
 

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) { 
	$cont = $cont + 1; 
	$cta = $row['Cuenta'];
	$Abono = $row['Abono'];
	$Cargo = $row['Abono'];
	$RzonSocial = $row['RzonSocial'];
	$Total = $Total + $row['Abono'];
	 
  $TU =  $TU + $row['Abono'];
	
echo "<tr> 

<td><div align='center'><label>M1</label></div></td>
<td><div align='center'><label>".$cta."</label></div></td>
<td><div align='center'><label>".$row['Folio']."</label></div></td></td>
<td><div align='center'><label>0</label></div></td></td>
<td><div align='center'><label>".$Abono."</label></div></td>  
<td><div align='center'><label>0</label></div></td>  
<td><div align='center'><label>0</label></div></td>  
<td><div align='center'><label>".$RzonSocial."</label></div></td>
 
 
</tr>";


	
}

 

}else { echo ""; }
 
						
			
			
			
						
					
	



}
 	
	 
}



 $sqld = "select t2.RzonSocial, t1.folio, DATE_FORMAT(t1.fecha,'%d/%m/%Y')  as fecha from facturas t1 inner join empresa t2  on t1.IdEmpresa = t2.IdEmpresa where date(t1.fecha) = STR_TO_DATE('".$inicial."', '%d/%m/%Y') and t1.IdEmpresa = '".$_POST['IdEmpresa']."' ";
  
   
   //and date(t1.fecha) <= STR_TO_DATE('".$final."', '%d/%m/%Y')
 $TD = 0;
$resultd = $connect->query($sqld);
if ($resultd->num_rows > 0) {
// output data of each row
while($rowd = $resultd->fetch_assoc()) {  
	
 $RSD = $rowd['RzonSocial'];
 

$sql = "Select '+' as signo, '103001004001' as Cuenta, t1.Folio, t1.Fecha, t1.Total as Abono, t2.RzonSocial from facturas t1 inner join empresa t2 on t1.IdEmpresa = t2.IdEmpresa where folio  = '".$rowd['folio']."'  and t1.IdEmpresa = '".$_POST['IdEmpresa']."'
 
";

 



$result = $connect->query($sql); 
 

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) { 
	$cont = $cont + 1; 
	$cta = $row['Cuenta'];
	$Abono = $row['Abono'];
	$Cargo = $row['Abono'];
	$RzonSocial = $row['RzonSocial'];
	$Total = $Total + $row['Abono'];
	   $TD = $TD + $row['Abono'];
	
echo "<tr> 

<td><div align='center'><label>M1</label></div></td>
<td><div align='center'><label>".$cta."</label></div></td>
<td><div align='center'><label>".$row['Folio']."</label></div></td></td> 
<td><div align='center'><label>1</label></div></td></td>
<td><div align='center'><label>".$Abono."</label></div></td>  
<td><div align='center'><label>0</label></div></td>  
<td><div align='center'><label>0</label></div></td>  
<td><div align='center'><label>".$RzonSocial."</label></div></td> 
 
</tr>";


	
}

 

}else { echo ""; }
 
						
			
			
			
						
					
	



}

echo "<tr>
<td><div align='center'><label>M1</label></div></td>
<td><div align='center'><label>206002000001</label></div></td>
<td><div align='center'><label>".$_POST['fini']."</label></div></td>
<td><div align='center'><label>0</label></div></td>
<td><div align='center'><label>".$TU."</label></div></td>
<td><div align='center'><label>0</label></div></td>
<td><div align='center'><label>0</label></div></td>
<td><div align='center'><label>".$RSU."</label></div></td> 
</tr>
<tr>
<td><div align='center'><label>M1</label></div></td>
<td><div align='center'><label>206001000001</label></div></td>
<td><div align='center'><label>".$_POST['fini']."</label></div></td>
<td><div align='center'><label>1</label></div></td>
<td><div align='center'><label>".$TD."</label></div></td>
<td><div align='center'><label>0</label></div></td>
<td><div align='center'><label>0</label></div></td>
<td><div align='center'><label>".$RSD."</label></div></td> 
</tr>

";	

echo '
</table>
<table>
<tr>
<td class="color_blanco">Registros: '.$cont.'
</td>
<td class="color_blanco"></td><td class="color_blanco"></td><td class="color_blanco">
</tr>
</table>
';					
	 
}


//</td><td class="color_blanco" align="right">Total poliza :</td> 
//<td class="color_blanco" align="center">'.$Total.'</td>
//<td class="color_blanco" align="center">'.$Total.'</td>


	}
	?>
    
	 </table>	
     
     <br><br>
     <!--
       <form name="forma1" method="post" action="poliza_ingreso">
     <input type="hidden" name="tres" value='1'>
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
			 
		</tr>
		<tr>
			<td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
		</tr>
	</table>
    </form>
      -->
    <table>
   
<tr><br></tr>
						<tr><td class="color_blanco" colspan="2">Fecha: <?php echo "".$_POST['fini'].""; ?>  
</td><td class="color_blanco">  </td><td class="color_blanco"></td><td colspan="2" class="color_blanco">Concepto: INGRESO POR VENTA </td></tr>
</tablr>
 <table align="center" id="Ventas">
						<tr>
							<th >P</th> 
							<th align="center"><?php if(isset($_POST['fini'])){ 
								$ano = substr($_POST['fini'], 6); 
								$mes = substr($_POST['fini'], 3, -5); 
								$dia = substr($_POST['fini'], 0, -8); 
								echo  $ano;  echo $mes; echo $dia;
								} ?></th>
							<th align="center">3</th>
                            <th align="center"><?php echo $dia; ?></th>
                            <th align="center">1</th>
                            <th align="center">0</th>
                            <th align="center">INGRESO POR VENTA DEL DIA <?php echo $dia; echo " "; echo $month; echo " "; echo $ano; ?></th>
							<th align="center">7</th> 
                            <th align="center">0</th>
                            <th align="center">0</th>
						</tr>
						
    
    <?php 
	if (isset($_POST['fini'])) {
// Check connection 
$inicial = $_POST['fini'];  
$final = $_POST['finial'];
$Total = 0;

$cont = 0;
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

  $sqld = "select idempresa, folio, date(fecha) as fecha from facturas  where date(fecha) = STR_TO_DATE('".$inicial."', '%d/%m/%Y')";
    // and date(fecha) = STR_TO_DATE('".$final."', '%d/%m/%Y')
$resultx = $connect->query($sqld);
if ($resultx->num_rows > 0) {
// output data of each row

   
while($rowd = $resultx->fetch_assoc()) {  
	 $IDEMPRESA = $rowd['idempresa'];
if($rowd['idempresa'] == '2510'){
	$cta = '103-001-004-001';
	}
	if($rowd['idempresa'] == '2511'){
	$cta = '103-001-004-002';
	}
 

 $sql = "SELECT 'total' as t, t3.descripcion, t1.Cantidad as Nombre, t3.Producto, t4.cta as cta,  Concepto, t1.Folio, t1.Total as cargo, '-' as signo  FROM facturas t1 inner join pedido t2 on t1.Folio = t2.FolioFactura inner join condiciones t3 on t2.IdCondicion = t3.IdCondicion inner join cuentascontables t4 on t1.idempresa = t4.idempresa where t1.folio = '".$rowd['folio']."' and t4.idempresa = '".$IDEMPRESA."'
UNION ALL
SELECT 'impuestost' as t, t3.descripcion, t1.Cantidad as Nombre,t3.Producto, '206002000001' as cta, Concepto,t1.Folio, ImpuestosTraslados, '+' as signo FROM facturas t1 inner join pedido t2 on t1.Folio = t2.FolioFactura inner join condiciones t3 on t2.IdCondicion = t3.IdCondicion  where t1.folio = '".$rowd['folio']."'
UNION ALL
SELECT  'importe' as t, t3.descripcion,  t1.Cantidad as Nombre,t3.Producto, if(t3.Producto = 'GASOLINA 87 OCT',  '401001001001', if( t3.Producto = 'GASOLINA 91 OCT', '401001001002', '401001001003')) as cta, Concepto,t1.Folio, Importe, '+' as signo  FROM facturas  t1 inner join pedido t2 on t1.Folio = t2.FolioFactura inner join condiciones t3 on t2.IdCondicion = t3.IdCondicion where t1.folio = '".$rowd['folio']."'
UNION ALL
SELECT 'flete' as t, t3.descripcion,t1.Cantidad as Nombre,t3.Producto, '401001009000' as cta, Concepto,t1.Folio, Flete, '+' as signo FROM facturas t1 inner join pedido t2 on t1.Folio = t2.FolioFactura inner join condiciones t3 on t2.IdCondicion = t3.IdCondicion where t1.folio = '".$rowd['folio']."'
UNION ALL
SELECT  'cantidad' as t, t3.descripcion, t1.Cantidad as Nombre,t3.Producto, '206001000003' as cta, Concepto,t1.Folio, (Cantidad) as Cantidad, '+' as signo FROM facturas t1 inner join pedido t2 on t1.Folio = t2.FolioFactura  inner join condiciones t3 on t2.IdCondicion = t3.IdCondicion where t1.folio = '".$rowd['folio']."' 
UNION ALL 
SELECT 'impuestosr' as t, t3.descripcion,t1.Cantidad as Nombre,t3.Producto, '106003000005' as cta, Concepto,t1.Folio, ImpuestosRetencion, '-' as signo FROM facturas  t1 inner join pedido t2  on t1.Folio = t2.FolioFactura inner join condiciones t3 on t2.IdCondicion = t3.IdCondicion  where t1.folio = '".$rowd['folio']."' 
UNION ALL 
SELECT 'descuento' as t, t3.descripcion, t1.Cantidad as Nombre,t3.Producto, '401004000000' as cta, Concepto,t1.Folio, Descuento, '-' as signo FROM facturas  t1 inner join pedido t2 on t1.Folio = t2.FolioFactura inner join condiciones t3 on t2.IdCondicion = t3.IdCondicion where t1.folio = '".$rowd['folio']."'   
";
 

$resultt = $connect->query($sql); 
  


if ($resultt->num_rows > 0) {
// output data of each row
while($row = $resultt->fetch_assoc()) { 
	$cont = $cont + 1; 
 $Total = $Total + $row['cargo'];
 $Tipo = 0;
 
 if($row['signo'] == '-'){$Tipo = 0;}
 if($row['signo'] == '+'){$Tipo = 1;} 
  if($row['Producto'] == 'GASOLINA 87 OCT' ){
	  $IEPS = 0.484720; //0.451449;
	  $cta= "401001001001";
	  
	  }
	   if($row['Producto'] == 'GASOLINA 91 OCT' ){
	  $IEPS = 0.591449; //0.550852;
	  $cta= "401001001002";
	  }
	   if($row['Producto'] == 'DIESEL' ){
	  
	  $IEPS = 0.402288; //0.374675;
	  $cta= "401001001003";
	  }
 
 if($row['t'] == 'cantidad'){
	 $cargo = $row['cargo'] * $IEPS;
	 }else{
		 $cargo = $row['cargo'];
		 }
		 
		 if($row['t'] == 'importe'){
	 $cargo = $row['cargo'] - ($row['Nombre'] * $IEPS);
	 }
 
 
 
 
 
	if($row['cargo'] > 0){
echo "<tr> 

<td><div align='center'><label>M1</label></div></td>
<td><div align='center'><label>".$row['cta']."</label></div></td></td>
<td><div align='center'><label>".$row['Folio']."</label></div></td>
<td><div align='center'><label>".$Tipo."</label></div></td>
<td><div align='center'><label>".$cargo."</label></div></td> 
<td><div align='center'><label>0</label></div></td>
<td><div align='center'><label>0</label></div></td> 
  <td><div align='center'><label>".$row['Nombre']." ".$row['descripcion']."</label></div></td>
  
</tr>";
	}else{}
}

 

}else { echo ""; } 
						
						
						
	



}
echo '
</table>
<table>
<tr>
<td class="color_blanco">Registros: '.$cont.'
</td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco"></td>
<td class="color_blanco" align="center">'.$Total.'</td>
<td class="color_blanco" align="center">'.$Total.'</td>
</tr>
</table>
';					
	 
}







	}
	?>
    
	 </table>	
                    
                  <br><br>  <br><br>  <br><br>  <br><br>  
       
       
     
    
      
            
            
            
			
	</div> 	
		
						
	 
	 
	


	
	



 
</div>



<br><br>

<script>
renderFooter();
</script>


</div>
 
 
<script type="text/javascript" src="js/jquery.table2csv.js"></script>

<script>
    $(function () {
		  var  fechai = "<?php echo $dia?>"; 
      //   $("#pdf").click(function(e){ 
        $("#Depositos").table2CSV({
            type: "csv", 
			buttonContent: "Exportar",
            fileName: "pólizas " + fechai
        }); 
		// });
		
    });
</script>

<script>
    $(function () {
		  var  fecha16 = "<?php echo $dia?>"; 
      //   $("#pdf").click(function(e){ 
        $("#Anticipos").table2CSV({
            type: "csv", 
			buttonContent: "Exportar",
            fileName: "pólizas " + fecha16
        }); 
		// });
		
    });
</script>

<script>
    $(function () {
      //   $("#pdf").click(function(e){ 
	  var  fecha18 = "<?php echo $dia?>"; 
        $("#Ventas").table2CSV({
            type: "csv", 
			buttonContent: "Exportar",
            fileName: "pólizas " + fecha18
        }); 
		// });
		
    });
</script>


</body>
</html>


    
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
     
    
 <script type="text/javascript">
	 $(document).ready(function(e){
		 $("#pdf").click(function(e){ 
			$("tablex").tableExport(); 
			  alert("ff"); 
			$("#tablex").tableExport({type:'pdf'
                          });
				
		    });
		 
		 
				
				
		 }); 
	 </script>



 
    