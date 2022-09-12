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
    <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>

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
     
	     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="scripts/uijquery.js"></script>
    
    
    
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
							 <a class=bold href="#">Carga Movimientos</a>
							
					  </div>

						
				</div>
			
			
	
			
	
	
 




	 
		<div id="maincontent">
        
        
        <DIV class=right id=sideBar>
		<DIV class=sidemenu>
			<DIV class=margin>
				<h5>Opciones a Consultar</h5>
				<div class="separadorsp">&nbsp;</div>
	 	<br>
        
        <a class='list' href='registrormovimientossolicitudcte'>Historial de solicitud de movimientos</a>
<!--<br>	
<a class='list' href='registrormovimientoscteacreditados.php'>Historial de movimientos solicitados verificados</a> -->
<br>	
<a class='list' href='registrormovimientoscte'>Historial de movimientos verificados</a>
<br>							
	

			</div>  <!--del margen -->
		</div>	<!--del sidemenu -->
	</div> <!--del sidebar-->
        </div>		
	 
	
	
	  
			
		
	<div id="maincontent" align="center"> 	
     <form name="forma1" method="POST" action="uploadmovimientocte.php" enctype="multipart/form-data"> 
    <table align="center" class="parametros">
    
    
			<tr>
<td align="left" class="color_blanco"><b>Comprobante:</b></td><td align="left" class="color_blanco">	
<input type="file" name="file" required><tr/>
<tr>
<td align="left" class="color_blanco"><b>Descripcion:</b></td><td align="left" class="color_blanco">
<input type="text" name="descripcion" required> <tr/>

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
<form name="forma1" method="POST" action="controladorad/postfactura.php" enctype="multipart/form-data"> 
    <table align="center" class="parametros">
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
    
 
            
            
            
            
            <br><br>
            
		
			
	</div> 	
		
						
	 
	
	 


	
	



 
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
     
     






 </script>	
 <?php 
	 
	 if(isset($_POST["mensaje"]))
	 {
		echo "<script>window.alert('Capturado Correctamente');</script>";
		 }else{  }
		 
		 
		 ?>

<script language="JavaScript" src="scripts/datetime.js"></script>