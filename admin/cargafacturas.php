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
	
    <link href="styles/menu.css" rel="stylesheet" type="text/css" />
    <link href="styles/sidebar.css" rel="stylesheet" type="text/css" />
    <link href="styles/content.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="iconion.ico">

	<SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>

    <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
    <script src="scripts/push.js"></script>
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>

    
    <script type="text/JavaScript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	<link rel="canonical" href="https://css-tricks.com/examples/DragAndDropFileUploading/">
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link rel="stylesheet" href="main.css" />
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>

	<script language="JavaScript" src="scripts/calendario.js"></script> 
     
	    <link rel="canonical" href="https://css-tricks.com/examples/DragAndDropFileUploading/">
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link rel="stylesheet" href="main.css" />
 
 
    
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
					$("#un").load("controladorad/tpmenu_cteadmin");
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
							 <a class=bold href="#">Carga Facturas</a>
							
			   </div>

						
			</div>
			
			
	
			
	
	 
	
			
	
	
 


<DIV id=maincontent>
<DIV class=left id=contentBasicoSeccionff>
		<DIV id=contentBox>
		<!--
         <form name="forma1" method="POST" action="uploadfacturas.php" enctype="multipart/form-data"> 
    <table   align="center" class="parametros"  >
    
			<tr>
<td align="right" class="color_blanco"><b>Factura XML:</b></td><td   align="left" class="color_blanco">
<input type="file" name="file" required></td></tr>
<tr>
<td align="right" class="color_blanco"><b>Factura PDF:</b></td><td align="left" class="color_blanco">
<input type="file" name="filepdf" required> </td><tr/>
 



<table align="center">
	    	<tr>
	    	<td align="center" class="color_blanco">
            <br>
            <input type="Submit" value="Aceptar" ></td>
	    	</tr>
	    	</table>	
	</table>	
      </form> -->
      
    
      
      <form method="POST" action="uploadfacturas" enctype="multipart/form-data"><div align="center">
      <div id="dropContainer" href="_SELF" style=" width:80%;  border-radius: 10px;border:1px solid black;height:100px; background-image:url('img/gray.jpg'); background:"align="center"; > 
    <img src="img/lod.png" style="height:50px; width:80px; padding-top:20px;" > <br>
   Arrastre y suelte aquí
</div> 
  <input type="file" id="fileInput" name="files[]" multiple="multiple"/> 
      <table align="center"><tr><td class="color_blanco">
      <input type="submit" value="Cargar">
    	</td></tr></table></div>
      </form>
       
 
 
  <script> 
	  dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
  evt.preventDefault();
};

dropContainer.ondrop = function(evt) {
  // pretty simple -- but not for IE :(
  fileInput.files = evt.dataTransfer.files;
 
  // If you want to use some of the dropped files
  const dT = new DataTransfer();
  //for(i = 0; i<= f)
  dT.items.add(evt.dataTransfer(files));
  //dT.items.add(evt.dataTransfer.files[1]);
  fileInput.files = dT.files;

  evt.preventDefault();
};</script>
         
        
        
        <form name="forma11" method="POST" action="controladorad/postfactura.php" enctype="multipart/form-data"> 
    <table align="center" class="parametros">
    
    <?php   
	if(isset($_POST['Folio'])){
		 $num = count($_POST['Folio']);
 
 for ($i = 0; $i < $num; $i++) {  
 
   
$cantidad = number_format($_POST['Cantidad'][$i], 2, '.', ','); 
$descuento = number_format($_POST['Descuento'][$i], 2, '.', ',');
$total = number_format($_POST['Total'][$i], 2, '.', ','); 
$Importee = number_format($_POST['Importee'][$i], 2, '.', ','); 
$impuestos = number_format($_POST['ImpuestosTrasladados'][$i], 2, '.', ','); 
$impuestosretenidos = $_POST['ImpuestosRetenidos'][$i]; 


$NoPedidoo = substr($_POST['Concepto'][$i], -4);
if(isset($_POST['F'])){
	$flete = number_format($_POST['F'][$i], 2, '.', ','); 
	}else{
		$flete = '';
		}

	echo '
	<input type="hidden" name="folio[]" readonly 	value="'.$_POST['Folio'][$i].'">
	<input type="hidden" name="idempresa[]" readonly value="'.$_POST['idempresa'][$i].'">
	<input type="hidden" name="factura[]" readonly value="'.$_POST['Factura'][$i].'">
	<input type="hidden" name="importe[]" readonly value="'.$_POST['Importee'][$i].'">
	<input type="hidden" name="fecha[]" readonly value="'.$_POST['Fecha'][$i].'">
	<input type="hidden" name="total[]" readonly value="'.$_POST['Total'][$i].'">
	<input type="hidden" name="pdf[]" readonly value="'.$_POST['PDF'][$i].'" >
	<input type="hidden" name="flete[]" readonly value="'.$_POST['F'][$i].'" >
	<input type="hidden" name="concepto[]" readonly value="'.$_POST['Concepto'][$i].'" >
	<input type="hidden" name="rfc[]" readonly value="'.$_POST['Rfc'][$i].'">
	<input type="hidden" name="valorunitario[]" readonly value="'.$_POST['ValorUnitario'][$i].'">
	<input type="hidden" name="descuento[]" readonly value="'.$_POST['Descuento'][$i].'">
	<input type="hidden" name="cantidad[]" readonly value="'.$_POST['Cantidad'][$i].'" >
	<input type="hidden" name="impuestostrasladados[]" readonly value="'.$_POST['ImpuestosTrasladados'][$i].'" >
	<input type="hidden" name="impuestosretenidos[]" readonly value="'.$_POST['ImpuestosRetenidos'][$i].'" >
	
	 	<tr><td colspan="2">**************************************************************************************</td></tr>
	<tr>
	

	<td align="left" class="color_blanco"><b>No. Pedido:</b></td>
	<td class="color_blanco">
	<input type="text" name="nopedido[]" value="'.$NoPedidoo.'"required="required">
	</td>
	</tr>
    <tr class=""/>
	
	
	
	<td align="left" class="color_blanco"><b>Folio:</b></td><td align="left" class="color_blanco"><label>'.$_POST['Folio'][$i].'</label> </td></tr>
			<tr><td align="left" class="color_blanco"><b>Empresa:</b></td><td align="left" class="color_blanco">
<label>'.$_POST['Cliente'][$i].'</label>  <tr/>
<tr><td align="left" class="color_blanco"><b>RFC:</b></td><td align="left" class="color_blanco">
<label>'.$_POST['Rfc'][$i].'</label>  <tr/>

			<tr class=""/><td align="left" class="color_blanco"><b>Cliente:</b></td>
			<td align="left" class="color_blanco"><label>'.$_POST['idempresa'][$i].'</label> </td>
			</tr>
			    <tr>
<td align="left" class="color_blanco"><b>Fecha:</b></td>
<td align="left" class="color_blanco">
<label>'.$_POST['Fecha'][$i].'</label> <tr/>
			
			<tr class=""/><td align="left" class="color_blanco"><b>Factura:</b></td>
			<td align="left" class="color_blanco"><label>'.$_POST['Factura'][$i].'</label> </td>
			</tr>
			<tr>
<td align="left" class="color_blanco"><b>PDF:</b></td><td align="left" class="color_blanco">
<label>'.$_POST['PDF'][$i].'</label> <tr/>
<tr>
<td align="left" class="color_blanco"><b>Concepto:</b></td><td align="left" class="color_blanco">
<label>'.$_POST['Concepto'][$i].'</label> <tr/>

<tr>
<td align="left" class="color_blanco"><b>Cantidad:</b></td><td align="left" class="color_blanco">
<label>'.$cantidad.'</label>  <tr/><tr>

<tr>
<td align="left" class="color_blanco"><b>Flete:</b></td><td align="left" class="color_blanco">
<label>$'.$flete.'</label>  <tr/><tr>

<td align="left" class="color_blanco"><b>Valor Unitario:</b></td><td align="left" class="color_blanco">
<label>$'.$_POST['ValorUnitario'][$i].'</label>  <tr/><tr>

<td align="left" class="color_blanco"><b>Importe:</b></td><td align="left" class="color_blanco">
<label>$'.$Importee.'</label>  <tr/><tr>
<tr>
<td align="left" class="color_blanco"><b>Impuestos y traslados:</b></td><td align="left" class="color_blanco">
<label>$'.$impuestos.'</label>  <tr/>
<tr>
<td align="left" class="color_blanco"><b>Retención IVA:</b></td><td align="left" class="color_blanco">
<label>$'.$impuestosretenidos.'</label>  <tr/>


<td align="left" class="color_blanco"><b>Descuento:</b></td><td align="left" class="color_blanco">
<label>$'.$descuento.'</label>  <tr/>

<tr>
<td align="left" class="color_blanco"><b>Total:</b></td><td align="left" class="color_blanco">
<label>$'.$total.'</label>  <tr/>

 

 

	
	';
	}
	
	echo '<table align="center">
	    	<tr>
	    	<td align="center" class="color_blanco">
            <br>
            <input type="Submit" value="Guardar" ></td>
	    	</tr>
	    	</table>	 ';
	}
?></table>
      </form> 
        <div class="container" role="main">
        <nav role="navigation"> 
</nav>
        
<br><br><br><br> 
</div>
 
		</DIV>
	</DIV> <!--del content -->

		<DIV class=right id=sideBar>
		<DIV class=sidemenu>
			<DIV class=margin>
				<h5>Opciones a Consultar</h5>
				<div class="separadorsp">&nbsp;</div>
				<br>
	<div style=" height:30px;"> 
<a class='list' href='registrorfacturas' style="height: 30px; text-align: left; height:auto; padding:9px 0;">Historial de facturas</a></div>
<img src="img/line.png" width="175px" height="2px">
<div style=" height:30px;">
<a class='list' href='carganotacredito' style="height: 30px; text-align: left; height:auto; padding:2px 0;">Cargar nota de credito (bono)</a></div>
<img src="img/line.png" width="175px" height="2px">
<div style=" height:30px;">
<a class='list' href='cargafacturaspemex' style="height: 30px; text-align: left; height:auto; padding:2px 0;">Cargar facturas pemex</a></div>
<img src="img/line.png" width="175px" height="2px">
<div style=" height:30px;">
<a class='list' href='cargacontratos' style="height: 30px; text-align: left; height:auto; padding:2px 0;">Cargar contratos</a></div>
<img src="img/line.png" width="175px" height="2px">
<a class='list' href='carga_avisoiniciosesion' style="height: 30px; text-align: left; height:auto; padding:2px 0;">Cargar notificaciones</a></div>
<br>


	
	
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


  
  <script language=“JavaScript”>
  
function LoadValue() {
forma11.file.value=‘C:\location\of\file.gif’;
} 
</script>
 

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
      	<?php 
	 
	 if(isset($_POST["mensaje"]))
	 {
		echo "<script>window.alert('".$_POST['mensaje']."');</script>";
		 }else{  }
		 
		 
		 ?>
		 
         
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
   $(document).on({
    dragover: function() {
        return false;
    },
    drop: function() {
        return false;
    }
});
   </script>
  
  
  <script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->