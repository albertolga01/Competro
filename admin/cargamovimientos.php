<?php 
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
	
    <script src="scripts/push.js"></script>
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
    <link href="styles/menu.css" rel="stylesheet" type="text/css" />
    <link href="styles/sidebar.css" rel="stylesheet" type="text/css" />
    <link href="styles/content.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="iconion.ico">
    <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>

    <SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>
	
 <script type="text/JavaScript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
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
    
    
    
<link rel="icon" href="img/favicon.ico"> <?php 
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
</head>


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
            $("#un").load("controladorad/tpcargamovs.php");
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


	


	

  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					 
						<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Carga de movimientos</a>
					  </div>

						
				</div>
			
	
			
	 


<DIV id=maincontent>
<DIV class=left id=contentBasicoSeccionfiles>
		<DIV id=contentBox>
		
        
        <form name="forma1" method="POST" action="uploadmovimientos.php" enctype="multipart/form-data"> 
        
    <table   align="center" class="parametros">
    
    
			<tr>
<td align="left" class="color_blanco"><b>BANCOMER XSLX:</b></td><td align="left" class="color_blanco">
<input style="width:250px;"  type="file" name="file"></td><tr/>
<tr>
				<td class="color_blanco"><b>Fecha:</b></td>
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
<td align="left" class="color_blanco"><b>BANORTE CSV:</b></td><td align="left" class="color_blanco">
<input type="file"  style="width:250px;"  name="banorte"></td><tr/>
<tr>
<td align="left" class="color_blanco"><b>SANTANDER CSV:</b></td><td align="left" class="color_blanco"  >
<input type="file" style="width:250px;"  class="filee" id="f" name="santander"></td><tr/>

<tr>

<table align="center">
	    	<tr>
	    	<td align="center" class="color_blanco">
            <br>
            <input type="Submit" value="Aceptar" ></td>
	    	</tr>
	    	</table>	
	</table>
      </form>
      <br> <br> <br>
	  
 
 
 
 
	  <table align="center">
<tr>
<th height="24">Seleccionar</th> 
<th style="width: 80px;">Fecha</th>
<th>Concepto</th>
<th>Referencia</th> 
<th style="width: 100px;">Abono</th> 
<th style="width: 80px;">Cliente</th> 
</tr>
 
<?php 
if(isset($_POST['Fecha'])){
$numRows = sizeof($_POST['Fecha']);  
 // Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}
	
	
	$TT = 0;
	$TAbono = 0;
	   $numRows --;
 $contador = 1;
if ($numRows > 0) {
// output data of each row
while($contador <= $numRows) {
//	echo $_POST['Abono'][$contador];
//	$TAbono = $TAbono + $_POST['Abono'][$contador];
	
$datee = $_POST['Fecha'][$contador];
$Fecho = str_replace('/', '-', $datee); 
$Fech = date('Y-m-d', strtotime($Fecho. ' 0 days')); 	

$date = $_POST['fini'];
$string = str_replace('/', '-', $date); 
$Fechdos = date('Y-m-d', strtotime($string. ' 0 days'));
if($_POST['Banco']=='BBVA'){
if($Fech == $Fechdos){
	$abo = $_POST['Abono'][$contador];
if ($abo > 0){
	$TT = $TT + $_POST["Abono"][$contador];
$importe = number_format($_POST['Abono'][$contador], 2, '.', ',');
echo "<tr> 
<form name='forma' method='post' action='controladorad/guardamovs.php'> 
<input type='hidden' name='Banco[]' value='BBVA'> 
<input type='hidden' name='Fecha[]' value='".$_POST['Fecha'][$contador]."'>
<input type='hidden'  name='Concepto[]' value='".$_POST['Concepto'][$contador]."'>
<input type='hidden' name='Referencia[]' value='".$_POST['Referencia'][$contador]."'> 
<input type='hidden' name='Abono[]' value='".$_POST['Abono'][$contador]."'>

<td height='20'> <div align='center'> <input type='checkbox' name='sel[]' onclick='Count(this)' id='sel[]' value='".$_POST['Abono'][$contador]."'> </div></td>
<td> <div align='center'> <label> ".$Fech." </label> </div></td>
<td> <div align='center'> <label> ".$_POST['Concepto'][$contador]." </label> </div></td>
<td> <div align='center'> <label> ".$_POST['Referencia'][$contador]." </label> </div></td> 
<td> <div align='center'> <label>$ ".$importe." </label> </div></td> 
<td> ";
    $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");
    echo "<select name='IdEmpresa[]' style='width:100%;'>";
    while ($row = $result->fetch_assoc()) {
                  unset($id, $name);
                  $id = $row['IdEmpresa'];
                  $name = $row['usuario']; 
                  echo '<option value='.$id.'>'.$name.'</option>';
}
    echo "</select>"; 
echo "
</td>

</tr>";
}

 
}
}
 if($_POST['Banco'] == 'BANORTE'){
	 
$abo = $_POST['Abono'][$contador];
$a = $string = str_replace('$', '', $abo);  
$b = (int)str_replace(',', '', $a); 
$importe = number_format($b, 2, '.', ',');
if ($abo != '-'){
echo "<tr> 
<form name='forma' method='post' action='controladorad/guardamovs.php'> 
<input type='hidden' name='Banco[]' value='BANORTE'> 
<input type='hidden' name='Fecha[]' value='".$Fech."'>
<input type='hidden' name='Concepto[]' value='".$_POST['Concepto'][$contador]."'>
<input type='hidden' name='Referencia[]' value='".$_POST['Referencia'][$contador]."'> 
<input type='hidden' name='Abono[]' value='".$b."'>

<td height='20'> <div align='center'> <input type='checkbox' name='sel[]'  onclick='Count(this)' id='sel[]' value='".$b."'> </div></td>
<td> <div align='center'> <label> ".$Fech." </label> </div></td>
<td> <div align='center'> <label> ".$_POST['Concepto'][$contador]." </label> </div></td>
<td> <div align='center'> <label> ".$_POST['Referencia'][$contador]." </label> </div></td> 
<td> <div align='center'> <label>$ ".$importe." </label> </div></td> 
<td> ";
    $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");
    echo "<select name='IdEmpresa[]'  style='width:100%;'>";
	// echo '<option value="" selected="selected">0</option>';
    while ($row = $result->fetch_assoc()) {
                  unset($id, $name);
				  
                  $id = $row['IdEmpresa'];
                  $name = $row['usuario']; 
				 
                  echo '<option value='.$id.'>'.$name.'</option>';
}
    echo "</select>"; 
echo "



</td>
</tr>";
}else {
	
	
	
	} 

}
  
 
 if($_POST['Banco'] == 'SANTANDER'){ 
 
 
  $FechS = str_replace("'", "", $_POST['Fecha'][$contador]); 


$year = substr($FechS, 4, 7);  
$month = substr($FechS, 2, 2);  
$day = substr($FechS, 0, 2);  
$dash = '-';
$Fech = $year.$dash.$month.$dash.$day; 
$importe = number_format($_POST['Abono'][$contador], 2, '.', ',');
//echo $Fech;
//echo "<br>";

if($_POST['Tipo'][$contador] == '+'){

echo "<tr> 
<form name='forma' method='post' action='controladorad/guardamovs.php'> 
<input type='hidden' name='Banco[]' value='SANTANDER'> 
<input type='hidden' name='Fecha[]' value='".$Fech."'>
<input type='hidden' name='Concepto[]' value='".$_POST['Concepto'][$contador]."'>
<input type='hidden' name='Referencia[]' value='".$_POST['Referencia'][$contador]."'> 
<input type='hidden' name='Abono[]' value='".$_POST['Abono'][$contador]."'>

<td height='20'> <div align='center'> <input type='checkbox' name='sel[]'  onclick='Count(this)' id='sel[]' value='".$_POST['Abono'][$contador]."'> </div></td>
<td> <div align='center'> <label> ".$Fech." </label> </div></td>
<td> <div align='center'> <label> ".$_POST['Concepto'][$contador]." </label> </div></td>
<td> <div align='center'> <label> ".$_POST['Referencia'][$contador]." </label> </div></td> 
<td> <div align='center'> <label>$ ".$importe." </label> </div></td> 
<td> ";
    $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");
    echo "<select name='IdEmpresa[]' style='width:100%;'>";
    while ($row = $result->fetch_assoc()) {
                  unset($id, $name);
                  $id = $row['IdEmpresa'];
                  $name = $row['usuario']; 
                  echo '<option value='.$id.'>'.$name.'</option>';
}
    echo "</select>"; 
echo "
</td>

</tr>";

}

}

if($_POST['Banco'] == 'BBVA'){
	
	$a = str_replace(' ', '0', $_POST["Abono"][$contador]); 
	
	 
	
	if(isset($_POST["Abono"][$contador])){
		
		}
 
	 
	}else if($_POST['Banco'] == 'SANTANDER'){
		 
		 if($_POST['Tipo'][$contador] == '+'){
			 $a = str_replace('$', '', $_POST["Abono"][$contador]); 
 
 $b = str_replace(',', '', $a); 
 $c = str_replace('-', '0', $b); 
 
$TT = $TT + $c;
			 }
		 
		 
		}else{
			$a = str_replace('$', '', $_POST["Abono"][$contador]); 
 $b = str_replace(',', '', $a); 
 $c = str_replace('-', '0', $b); 
 
$TT = $TT + $c;
			}
  



$contador ++;
}echo"
 
 <tr>
 <td class='color_blanco'><label id ='label_id'></label></td>
  <td class='color_blanco'></td>
   <td class='color_blanco'></td>
    <td class='color_blanco'></td>
 <td class='color_blanco' align='center'>
 $".number_format($TT, 2, '.', ',')."
 </td>
 </tr>



 
 
<div class='uno' align='center'>
</table>
<table align='center'><td class='color_blanco'></td><tr><td class='color_blanco'></td><tr>
<td class='color_blanco'></td><tr><td class='color_blanco'></td><tr><td class='color_blanco'><input type='submit' name='dos' value='Guardar'></td>
</table>
</form>
</div>
	";
}
}
	
echo"

		
						
	
	<form action='LoginServlet' method='post'>
	</form>
	
	
";
	 
		 
 
$connect->close();
?>
</table>
<br>
<br>
 
 
<br>
<br>



<table align="center">
         
				   
			       <tr>
				<td  align="center" class="color_blanco"> 
					 
                    <form name='forma' method='post' action='cargamovimientosmanual.php'> 
<table>
<tr>
<td class='color_blanco'>
<input type='submit' name='dos' value='Ingreso Manual '>
</td>
<tr>
  
</table>
</form>	  
				</td> 
			</tr>
		</table>
        
        
        
        
        
		</DIV>
	</DIV> <!--del content -->

		<DIV class=right id=sideBar>
		<DIV class=sidemenu>
			<DIV class=margin>
				<h5>Opciones a Consultar</h5>
				<div class="separadorsp">&nbsp;</div>
	 	
<br>
	<div style=" height:30px;">
<a class='list' href='registrormovimientos'  style="height: 30px; text-align: left; height:auto; padding:9px 0;">Historial de movimientos</a></div>
<img src="img/line.png" width="175px" height="2px">
<div style=" height:30px;">
<a class='list' href='cargamovimientosmanual'  style="height: 30px; text-align: left; height:auto; padding:2px 0;">Ingreso de movimiento manual</a></div>
<img src="img/line.png" width="175px" height="2px">
<div style=" height:30px;">
<a class='list' href='registrormovimientossolicitud'  style="height: 30px; text-align: left; height:auto; padding:2px 0;">Solicitudes de movimiento clientes</a></div>
<img src="img/line.png" width="175px" height="2px">
<div style=" height:30px;">
<a class='list' href='historial_estadocuenta'  style="height: 30px; text-align: left; height:auto; padding:2px 0;">Historial de estados de cuenta</a></div>
<img src="img/line.png" width="175px" height="2px">


			</div>  <!--del margen -->
		</div>	<!--del sidemenu -->
	</div> <!--del sidebar-->
</div> <!--del maincontent del header-->



 
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
    var hoy = new Date(),
        d = (hoy.getDate()),
        m = hoy.getMonth() +1, 																																																																																																																																																
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

 
	 
	 function Count() { 
	  
 $("#label_id").html("Seleccionado: " + $("input[name='sel[]']:checked").length);
 
 }
 


</script>
 
<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->