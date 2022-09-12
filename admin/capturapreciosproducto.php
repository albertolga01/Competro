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
    
	<SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>
	
    <script language="JavaScript" src="scripts/calendario.js"></script> 
    <link rel="stylesheet" href="styles/calendario.css">
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


<body class="body">
	<div id="extra">&nbsp;</div>

<div id="page">

<div id="header">

<script> 
        var usuario = '<?php echo $_SESSION['usuario']; ?>'; 
        var rfc = '<?php echo $_SESSION['rfc']; ?>'; 
        renderHeader(usuario, rfc);
    </script>
	
 <script type="text/JavaScript">
            $("#un").load("controladorad/tpcp.php");
        </script>
        
</div>



<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->
<!-- FIN DEL ENCABEZADO --> 

	<!--Ruteo de la página-->
	
		  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					 
							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Captura de precios</a>
							
					  </div>

						
				</div>

	  <label title="Cambiar Apariencia del Menú"  id="uno" style="float: right; width:40px;  padding-left:10px; padding-top: 3px;  height:15px;  font-size:13px;">Mostrar</label> 
			
		
	<div id="maincontent" align="center"> 	
       <br><br>
       
       
       <form name="forma1" method="post" action="controladorad/postprecios.php">
       
        <?php
echo '<input type="hidden" name="IdEmpresa" value="'. $_SESSION["idempresa"] .'">';
?>
       <input type="hidden" name="IdEmpresa" value="2510">
       	<table align="center" class="parametros">
			<tr>
				<td class="color_blanco"><b>Fecha Inicial:</b></td>
				<td class="color_blanco"><input type="text" name="fini" id="dateDefault" readonly>
                <a onClick="return calendario('forma1.fini');"></a>
				 </td>
                 	<td class="color_blanco"> </td>
			</tr>
           	<tr>
<td align="left" class="color_blanco"><b>Magna:</b></td><td align="left" class="color_blanco">
<input type="text" name="magna" required><tr/>
<tr>
<td align="left" class="color_blanco"><b>Premium:</b></td><td align="left" class="color_blanco">
<input type="text" name="premium" required> <tr/>
<tr>
<td align="left" class="color_blanco"><b>Diesel:</b></td><td align="left" class="color_blanco">
<input type="text" name="diesel" required> <tr/>
<td align="left" class="color_blanco"><b>Centro de Entrega</b></td><td align="left" class="color_blanco">        
    <select name="centroentrega">
  <option value="629-TAD MAZATLAN, SIN.">629-TAD MAZATLAN, SIN.</option>
  <option value="647-TAD CULIACAN, SIN.">647-TAD CULIACAN, SIN.</option>
  <option value="645-TAD TOPOLOBAMPO, SIN.">645-TAD TOPOLOBAMPO, SIN.</option>
  <option value="648-TAD GUAMUCHIL, SIN.">648-TAD GUAMUCHIL, SIN.</option>
  <option value="614-TAD DURANGO, DGO.">614-TAD DURANGO, DGO.</option>
  <option value="613-TAD GOMEZ PALACIO, DGO.">613-TAD GOMEZ PALACIO, DGO.</option>
  <option value="633-TAD TEPIC, NAY.">633-TAD TEPIC, NAY.</option>
  <option value="649-TAD LA PAZ, B.C.S.">649-TAD LA PAZ, B.C.S.</option>
</select> <tr/>

</td>			
		
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
    <br> 
 </div>
 
    
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
	
	
     </div>
	<?php
 
if ($connect->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
////////////////////////////////////
	$cql = "SELECT Fecha FROM preciosproducto WHERE Centroentrega = '629-TAD MAZATLAN, SIN.' ORDER BY Fecha DESC LIMIT 1"; 
	$hoy = date("d/m/Y");
	$date = date("Y-m-d");
	$manana =  date('d/m/Y', strtotime($date. ' + 1 days')); 
	$dia =  date('N', strtotime($date)); 
	if($dia == "6"){
		$datedos =  date('Y-m-d', strtotime($date. ' + 2 days')); 
	}else{
		$datedos =  date('Y-m-d', strtotime($date. ' + 1 days')); 
	}
 
	
	

	echo '<br><br><table align="center"  >
<tr>
 <td class="color_blanco"></td><td style="" colspan="9" class="color_blanco" align="center"><h3><label id="fechaaa" style="font-size:16px; text-align:center;">Precios de venta en TAR aplicables a las gasolinas y el diesel en $/m³</label></h3></td>
</tr>
<tr>
<td class="color_blanco"></td>
<td style="background-color:green; color:white; font-weight:bold;" align="center" colspan="3">MAGNA</td>
<td style="background-color:red; color:white; font-weight:bold;" align="center" colspan="3">PREMIUM</td>
<td style="background-color:black; color:white; font-weight:bold;" align="center" colspan="3">DIESEL</td>
</tr>
<tr>
<td class="color_blanco"></td>
<td style="background-color:green; color:white; font-weight:bold;" align="center" >'.$hoy.'</td>
<td style="background-color:green; color:white; font-weight:bold;" align="center" >'.$manana.'</td>
<td style="background-color:green; color:white; font-weight:bold;" align="center" >Diferencia</td>
<td style="background-color:red; color:white; font-weight:bold;" align="center" >'.$hoy.'</td>
<td style="background-color:red; color:white; font-weight:bold;" align="center" >'.$manana.'</td>
<td style="background-color:red; color:white; font-weight:bold;" align="center" >Diferencia</td>
<td style="background-color:black; color:white; font-weight:bold;" align="center" >'.$hoy.'</td>
<td style="background-color:black; color:white; font-weight:bold;" align="center" >'.$manana.'</td>
<td style="background-color:black; color:white; font-weight:bold;" align="center" >Diferencia</td>
</tr>
';	
 
  
	$myDate = date('d/m/Y'); 
$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '629-TAD MAZATLAN, SIN.' and fecha = '".$date."' ORDER BY fecha DESC LIMIT 1"; 
 
$magna= "";
$premium = "";
$diesel = "";
$fecha = "";
$centroentrega = "";
$folio = ""; 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$magna = $row["Magna"];
	$premium = $row["Premium"];
	$diesel = $row["Diesel"];
	$fecha = $row["Fecha"];
	$centroentrega = $row["Centroentrega"];
	$folio = $row["Folio"]; 
}

$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '629-TAD MAZATLAN, SIN.' and fecha = '".$datedos."' ORDER BY fecha DESC LIMIT 1"; 
  
$magnax = "";
$premiumx = "";
$dieselx = "";
$folio2 = ""; 
$result = $connect->query($sql);
$bool = 0;
if ($result->num_rows > 0) {
// output data of each row
$bool = 1;
while($row = $result->fetch_assoc()) {
	$magnax = $row["Magna"];
	$premiumx = $row["Premium"];
	$dieselx = $row["Diesel"];
	$folio2 = $row["Folio"];
 
}
} 


if($bool == 0){
	echo '	<tr>
		<td style="border-bottom:1px solid black;" class="color_blanco">Mazatlan </td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"></td>
		<td style="background-color:green; color:white;" align="center"></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"></td>
		<td style="background-color:red; color:white;" align="center"></td>
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($diesel, 5, '.',',').'</label></td>
		<td style="background-color:black; color:white;" align="center"></td>
		<td style="background-color:black; color:white;" align="center"></td>
		';
	}else if($bool == 1){
		echo '<tr>
		<td style="border-bottom:1px solid black;" class="color_blanco">Mazatlan </td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magnax, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($magnax - $magna), 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premiumx, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($premiumx - $premium), 5, '.',',').'</label></td>
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($diesel, 5, '.',',').'</label></td> 
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($dieselx, 5, '.',',').'</label></td> 
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($dieselx - $diesel), 5, '.',',').'</label></td>';
	}

	if(($folio) != ""){
		echo '
		<td style="background-color: white;">
									<form method="POST" action="controladorad/borrarpreciocapturado.php">
										<input type="hidden" name="Folio" value="'.$folio.'">
										<input type="submit" value="Borrar precio">
									</form>
								</td>
		';
	}

if(($folio2) != ""){

	echo '
	<td style="background-color: white;">
		<form method="POST" action="controladorad/borrarpreciocapturado.php">
			<input type="hidden" name="Folio" value="'.$folio2.'">
			<input type="submit" value="Borrar precio">
		</form>
	</td>';
}

}  
//*********************************************************************************************************************************************************

 
////////////////////////////////////
$myDate = date('d/m/Y');
$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '647-TAD CULIACAN, SIN.' and fecha = '".$date."' ORDER BY fecha DESC LIMIT 1"; 
 
$magna= "";
$premium = "";
$diesel = "";
$folio = ""; 
$fecha = "";
$centroentrega = "";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$magna = $row["Magna"];
	$premium = $row["Premium"];
	$diesel = $row["Diesel"];
	$fecha = $row["Fecha"];
	$centroentrega = $row["Centroentrega"];
	$folio = $row["Folio"];
 
}
$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '647-TAD CULIACAN, SIN.' and fecha = '".$datedos."' ORDER BY fecha DESC LIMIT 1"; 
  
$magnax= "";
$premiumx = "";
$dieselx = ""; 
$bool = 0;
$folio2 = ""; 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
$bool = 1;
while($row = $result->fetch_assoc()) {
	$magnax = $row["Magna"];
	$premiumx = $row["Premium"];
	$dieselx = $row["Diesel"];  
	$folio2 = $row["Folio"];
 
}
} 


if($bool == 0){
echo '	<tr>
	<td style="border-bottom:1px solid black;" class="color_blanco">Culiacan </td>
	<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
	<td style="background-color:green; color:white;" align="center"></td>
	<td style="background-color:green; color:white;" align="center"></td>
	<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
	<td style="background-color:red; color:white;" align="center"></td>
	<td style="background-color:red; color:white;" align="center"></td>
	<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($diesel, 5, '.',',').'</label></td>
	<td style="background-color:black; color:white;" align="center"></td>
	<td style="background-color:black; color:white;" align="center"></td>
	';
}else if($bool == 1){
	echo '<tr>
	<td style="border-bottom:1px solid black;" class="color_blanco">Culiacan </td>
	<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
	<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magnax, 5, '.',',').'</label></td>
	<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($magnax - $magna), 5, '.',',').'</label></td>
	<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
	<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premiumx, 5, '.',',').'</label></td>
	<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($premiumx - $premium), 5, '.',',').'</label></td>
	<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($diesel, 5, '.',',').'</label></td> 
	<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($dieselx, 5, '.',',').'</label></td> 
	<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($dieselx - $diesel), 5, '.',',').'</label></td>';
}

if(($folio) != ""){
	echo '
	<td style="background-color: white;">
								<form method="POST" action="controladorad/borrarpreciocapturado.php">
									<input type="hidden" name="Folio" value="'.$folio.'">
									<input type="submit" value="Borrar precio">
								</form>
							</td>
	';
}

if(($folio2) != ""){

echo '
<td style="background-color: white;">
	<form method="POST" action="controladorad/borrarpreciocapturado.php">
		<input type="hidden" name="Folio" value="'.$folio2.'">
		<input type="submit" value="Borrar precio">
	</form>
</td>';
}
}  
//*********************************************************************************************************************************************************
//*********************************************************************************************************************************************************
////////////////////////////////////
$myDate = date('d/m/Y');
$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '645-TAD TOPOLOBAMPO, SIN.' and fecha = '".$date."' ORDER BY fecha DESC LIMIT 1"; 
 
$magna= "";
$premium = "";
$diesel = "";
$fecha = "";
$folio = ""; 
$centroentrega = "";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$magna = $row["Magna"];
	$premium = $row["Premium"];
	$diesel = $row["Diesel"];
	$fecha = $row["Fecha"];
	$centroentrega = $row["Centroentrega"];
	$folio = $row["Folio"]; 
}


$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '645-TAD TOPOLOBAMPO, SIN.' and fecha = '".$datedos."' ORDER BY fecha DESC LIMIT 1"; 
  
$magnax= "";
$premiumx = "";
$dieselx = ""; 
$bool = 0;
$folio2 = ""; 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
$bool = 1;
while($row = $result->fetch_assoc()) {
	$magnax = $row["Magna"];
	$premiumx = $row["Premium"];
	$dieselx = $row["Diesel"];  
	$folio2 = $row["Folio"]; 
}
} 
if($bool == 0){
	echo '	<tr>
		<td style="border-bottom:1px solid black;" class="color_blanco">Topolobampo </td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"></td>
		<td style="background-color:green; color:white;" align="center"></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"></td>
		<td style="background-color:red; color:white;" align="center"></td>
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($diesel, 5, '.',',').'</label></td>
		<td style="background-color:black; color:white;" align="center"></td>
		<td style="background-color:black; color:white;" align="center"></td>
		';
	}
	 if($bool == 1){
		echo '<tr>
		<td style="border-bottom:1px solid black;" class="color_blanco">Topolobampo </td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magnax, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($magnax - $magna), 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premiumx, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($premiumx - $premium), 5, '.',',').'</label></td>
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($diesel, 5, '.',',').'</label></td> 
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($dieselx, 5, '.',',').'</label></td> 
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($dieselx - $diesel), 5, '.',',').'</label></td>';
	}

	if(($folio) != ""){
		echo '
		<td style="background-color: white;">
									<form method="POST" action="controladorad/borrarpreciocapturado.php">
										<input type="hidden" name="Folio" value="'.$folio.'">
										<input type="submit" value="Borrar precio">
									</form>
								</td>
		';
	}

if(($folio2) != ""){

	echo '
	<td style="background-color: white;">
		<form method="POST" action="controladorad/borrarpreciocapturado.php">
			<input type="hidden" name="Folio" value="'.$folio2.'">
			<input type="submit" value="Borrar precio">
		</form>
	</td>';
}
}  
//*********************************************************************************************************************************************************
////////////////////////////////////
$myDate = date('d/m/Y');
$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '648-TAD GUAMUCHIL, SIN.' and fecha = '".$date."' ORDER BY fecha DESC LIMIT 1"; 
 
$magna= "";
$premium = "";
$diesel = "";
$fecha = "";
$centroentrega = "";
$folio = ""; 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$magna = $row["Magna"];
	$premium = $row["Premium"];
	$diesel = $row["Diesel"];
	$fecha = $row["Fecha"];
	$centroentrega = $row["Centroentrega"];
	$folio = $row["Folio"]; 
}


$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '648-TAD GUAMUCHIL, SIN.' and fecha = '".$datedos."' ORDER BY fecha DESC LIMIT 1"; 
   
$magnax= "";
$premiumx = "";
$dieselx = ""; 
$bool = 0;
$folio2 = ""; 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
	 
// output data of each row
$bool = 1;
while($row = $result->fetch_assoc()) {
	$magnax = $row["Magna"];
	$premiumx = $row["Premium"];
	$dieselx = $row["Diesel"];  
	$folio2 = $row["Folio"]; 
}
} 

if($bool == 0){
	echo '	<tr>
		<td style="border-bottom:1px solid black;" class="color_blanco">Guamuchil </td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"></td>
		<td style="background-color:green; color:white;" align="center"></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"></td>
		<td style="background-color:red; color:white;" align="center"></td>
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($diesel, 5, '.',',').'</label></td>
		<td style="background-color:black; color:white;" align="center"></td>
		<td style="background-color:black; color:white;" align="center"></td>
		';
	}
	 if($bool == 1){
		echo '<tr>
		<td style="border-bottom:1px solid black;" class="color_blanco">Guamuchil </td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magnax, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($magnax - $magna), 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premiumx, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($premiumx - $premium), 5, '.',',').'</label></td>
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($diesel, 5, '.',',').'</label></td> 
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($dieselx, 5, '.',',').'</label></td> 
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($dieselx - $diesel), 5, '.',',').'</label></td>';
	}
	
	if(($folio) != ""){
		echo '
		<td style="background-color: white;">
									<form method="POST" action="controladorad/borrarpreciocapturado.php">
										<input type="hidden" name="Folio" value="'.$folio.'">
										<input type="submit" value="Borrar precio">
									</form>
								</td>
		';
	}

if(($folio2) != ""){

	echo '
	<td style="background-color: white;">
		<form method="POST" action="controladorad/borrarpreciocapturado.php">
			<input type="hidden" name="Folio" value="'.$folio2.'">
			<input type="submit" value="Borrar precio">
		</form>
	</td>';
}
}  
//*********************************************************************************************************************************************************
////////////////////////////////////
$myDate = date('d/m/Y');
$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '614-TAD DURANGO, DGO.' and fecha = '".$date."' ORDER BY fecha DESC LIMIT 1"; 
 
$magna= "";
$premium = "";
$diesel = "";
$fecha = "";
$centroentrega = "";
$folio = ""; 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$magna = $row["Magna"];
	$premium = $row["Premium"];
	$diesel = $row["Diesel"];
	$fecha = $row["Fecha"];
	$centroentrega = $row["Centroentrega"];
	$folio = $row["Folio"]; 
} 


$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '614-TAD DURANGO, DGO.' and fecha = '".$datedos."' ORDER BY fecha DESC LIMIT 1"; 
  
$magnax= "";
$premiumx = "";
$dieselx = ""; 
$bool = 0;
$folio2 = ""; 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
$bool = 1;
while($row = $result->fetch_assoc()) {
	$magnax = $row["Magna"];
	$premiumx = $row["Premium"];
	$dieselx = $row["Diesel"];  
	$folio2 = $row["Folio"]; 
}
} 
if($bool == 0){
	echo '	<tr>
		<td style="border-bottom:1px solid black;" class="color_blanco">Durango </td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"></td>
		<td style="background-color:green; color:white;" align="center"></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"></td>
		<td style="background-color:red; color:white;" align="center"></td>
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($diesel, 5, '.',',').'</label></td>
		<td style="background-color:black; color:white;" align="center"></td>
		<td style="background-color:black; color:white;" align="center"></td>
		';
	}
	 if($bool == 1){
		echo '<tr>
		<td style="border-bottom:1px solid black;" class="color_blanco">Durango </td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magnax, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($magnax - $magna), 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premiumx, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($premiumx - $premium), 5, '.',',').'</label></td>
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($diesel, 5, '.',',').'</label></td> 
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($dieselx, 5, '.',',').'</label></td> 
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($dieselx - $diesel), 5, '.',',').'</label></td>';
	}
	
	if(($folio) != ""){
		echo '
		<td style="background-color: white;">
									<form method="POST" action="controladorad/borrarpreciocapturado.php">
										<input type="hidden" name="Folio" value="'.$folio.'">
										<input type="submit" value="Borrar precio">
									</form>
								</td>
		';
	}

if(($folio2) != ""){

	echo '
	<td style="background-color: white;">
		<form method="POST" action="controladorad/borrarpreciocapturado.php">
			<input type="hidden" name="Folio" value="'.$folio2.'">
			<input type="submit" value="Borrar precio">
		</form>
	</td>';
}
}
//*********************************************************************************************************************************************************
////////////////////////////////////
$myDate = date('d/m/Y');
$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '613-TAD GOMEZ PALACIO, DGO.' and fecha = '".$date."' ORDER BY fecha DESC LIMIT 1"; 
 
$magna= "";
$premium = "";
$diesel = "";
$fecha = "";
$centroentrega = "";
$folio = ""; 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$magna = $row["Magna"];
	$premium = $row["Premium"];
	$diesel = $row["Diesel"];
	$fecha = $row["Fecha"];
	$centroentrega = $row["Centroentrega"];
	$folio = $row["Folio"]; 
}

$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '613-TAD GOMEZ PALACIO, DGO.' and fecha = '".$datedos."' ORDER BY fecha DESC LIMIT 1"; 
  
$magnax= "";
$premiumx = "";
$dieselx = ""; 
$bool = 0;
$folio2 = ""; 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
$bool = 0;
while($row = $result->fetch_assoc()) {
	$magnax = $row["Magna"];
	$premiumx = $row["Premium"];
	$dieselx = $row["Diesel"];  
	$folio2 = $row["Folio"]; 
}
} 
if($bool == 0){
	echo '	<tr>
		<td style="border-bottom:1px solid black;" class="color_blanco">Gomez Palacio </td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"></td>
		<td style="background-color:green; color:white;" align="center"></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"></td>
		<td style="background-color:red; color:white;" align="center"></td>
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($diesel, 5, '.',',').'</label></td>
		<td style="background-color:black; color:white;" align="center"></td>
		<td style="background-color:black; color:white;" align="center"></td>
		';
	}
	 if($bool == 1){
		echo '<tr>
		<td style="border-bottom:1px solid black;" class="color_blanco">Gomez Palacio </td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magnax, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($magnax - $magna), 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premiumx, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($premiumx - $premium), 5, '.',',').'</label></td>
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($diesel, 5, '.',',').'</label></td> 
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($dieselx, 5, '.',',').'</label></td> 
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($dieselx - $diesel), 5, '.',',').'</label></td>';
	}
	
	if(($folio) != ""){
		echo '
		<td style="background-color: white;">
									<form method="POST" action="controladorad/borrarpreciocapturado.php">
										<input type="hidden" name="Folio" value="'.$folio.'">
										<input type="submit" value="Borrar precio">
									</form>
								</td>
		';
	}

if(($folio2) != ""){

	echo '
	<td style="background-color: white;">
		<form method="POST" action="controladorad/borrarpreciocapturado.php">
			<input type="hidden" name="Folio" value="'.$folio2.'">
			<input type="submit" value="Borrar precio">
		</form>
	</td>';
}
}  
//*********************************************************************************************************************************************************
////////////////////////////////////
$myDate = date('d/m/Y');
$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '633-TAD TEPIC, NAY.' and fecha = '".$date."' ORDER BY fecha DESC LIMIT 1"; 
 
$magna= "";
$premium = "";
$diesel = "";
$fecha = "";
$centroentrega = "";
$folio = ""; 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$magna = $row["Magna"];
	$premium = $row["Premium"];
	$diesel = $row["Diesel"];
	$fecha = $row["Fecha"];
	$centroentrega = $row["Centroentrega"];
	$folio = $row["Folio"]; 
}

$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '633-TAD TEPIC, NAY.' and fecha = '".$datedos."' ORDER BY fecha DESC LIMIT 1"; 
  
$magnax= "";
$premiumx = "";
$dieselx = ""; 
$bool = 0;
$folio2 = ""; 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
$bool = 1;
while($row = $result->fetch_assoc()) {
	$magnax = $row["Magna"];
	$premiumx = $row["Premium"];
	$dieselx = $row["Diesel"];  
	$folio2 = $row["Folio"]; 
	
}
} 
if($bool == 0){
	echo '	<tr>
		<td style="border-bottom:1px solid black;" class="color_blanco">Tepic</td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"></td>
		<td style="background-color:green; color:white;" align="center"></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"></td>
		<td style="background-color:red; color:white;" align="center"></td>
		<td style="background-color:black; color:white;" align="center">$'.number_format($diesel, 5, '.',',').'</label></td>
		<td style="background-color:black; color:white;" align="center"></td>
		<td style="background-color:black; color:white;" align="center"></td>
		';
	}
	if($bool == 1){
		echo '<tr>
		<td style="border-bottom:1px solid black;" class="color_blanco">Tepic</td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magnax, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($magnax - $magna), 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premiumx, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($premiumx - $premium), 5, '.',',').'</label></td>
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($diesel, 5, '.',',').'</label></td> 
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($dieselx, 5, '.',',').'</label></td> 
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($dieselx - $diesel), 5, '.',',').'</label></td>';
	}
	
	if(($folio) != ""){
		echo '
		<td style="background-color: white;">
									<form method="POST" action="controladorad/borrarpreciocapturado.php">
										<input type="hidden" name="Folio" value="'.$folio.'">
										<input type="submit" value="Borrar precio">
									</form>
								</td>
		';
	}

if(($folio2) != ""){

	echo '
	<td style="background-color: white;">
		<form method="POST" action="controladorad/borrarpreciocapturado.php">
			<input type="hidden" name="Folio" value="'.$folio2.'">
			<input type="submit" value="Borrar precio">
		</form>
	</td>';
}
} 
//*********************************************************************************************************************************************************
////////////////////////////////////
$myDate = date('d/m/Y');
$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '649-TAD LA PAZ, B.C.S.' and fecha = '".$date."' ORDER BY fecha DESC LIMIT 1"; 
 
$magna= "";
$premium = "";
$diesel = "";
$fecha = "";
$centroentrega = "";
$folio = ""; 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$magna = $row["Magna"];
	$premium = $row["Premium"];
	$diesel = $row["Diesel"];
	$fecha = $row["Fecha"];
	$centroentrega = $row["Centroentrega"];
	$folio = $row["Folio"]; 
}

$sql = " SELECT * FROM preciosproducto WHERE centroentrega = '649-TAD LA PAZ, B.C.S.' and fecha = '".$datedos."' ORDER BY fecha DESC LIMIT 1"; 
  
$magnax= "";
$premiumx = "";
$dieselx = ""; 
$bool = 0;
$folio2 = ""; 
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
$bool = 1;
while($row = $result->fetch_assoc()) {
	$magnax = $row["Magna"];
	$premiumx = $row["Premium"];
	$dieselx = $row["Diesel"];  
	$folio2 = $row["Folio"]; 
}
} 
if($bool == 0){
	echo '	<tr>
		<td style="border-bottom:1px solid black;" class="color_blanco">La Paz</td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"></td>
		<td style="background-color:green; color:white;" align="center"></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"></td>
		<td style="background-color:red; color:white;" align="center"></td>
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($diesel, 5, '.',',').'</label></td>
		<td style="background-color:black; color:white;" align="center"></td>
		<td style="background-color:black; color:white;" align="center"></td>
		';
	}
	if($bool == 1){
		echo '<tr>
		<td style="border-bottom:1px solid black;" class="color_blanco">La Paz</td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magna, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format($magnax, 5, '.',',').'</label></td>
		<td style="background-color:green; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($magnax - $magna), 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premium, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format($premiumx, 5, '.',',').'</label></td>
		<td style="background-color:red; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($premiumx - $premium), 5, '.',',').'</label></td>
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($diesel, 5, '.',',').'</label></td> 
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format($dieselx, 5, '.',',').'</label></td> 
		<td style="background-color:black; color:white;" align="center"><label style="font-size:13px;">$'.number_format(($dieselx - $diesel), 5, '.',',').'</label></td>';
	}
	
	if(($folio) != ""){
		echo '
		<td style="background-color: white;">
									<form method="POST" action="controladorad/borrarpreciocapturado.php">
										<input type="hidden" name="Folio" value="'.$folio.'">
										<input type="submit" value="Borrar precio">
									</form>
								</td>
		';
	}

if(($folio2) != ""){

	echo '
	<td style="background-color: white;">
		<form method="POST" action="controladorad/borrarpreciocapturado.php">
			<input type="hidden" name="Folio" value="'.$folio2.'">
			<input type="submit" value="Borrar precio">
		</form>
	</td>';
}
				


}  
//*********************************************************************************************************************************************************

 
		?>		

		
	

	
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
 
<script>
 $("#maincontent").hide();
</script>
<script>
var bool = true;
$(document).ready(function(){
  $("#uno").click(function(){
  if(bool == true){
   $("#maincontent").show(1000); 
    bool = false;
  }else{
   $("#maincontent").hide(1000); 
    bool = true;
  }
   
  }
   
  
   );
    
   
});
</script>

<?php

if(isset($_POST["mensaje"])){
	echo"
		<script>
			window.alert('".$_POST['mensaje']."');
		</script>
	";
}

?>