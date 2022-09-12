

<?php 
require 'connector.php';
global $connect;
session_start();
$inicial = ''; 
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
	
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>

	<script language="JavaScript" src="scripts/calendario.js"></script> 	
     
	     
    
    
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="icon" href="img/favicon.ico"> </head>


<body class="body" onload="logout()">
	<div id="extra">&nbsp;</div>

<div id="page">

<div id="header">

<!-- <div id="eNacional"><a href="http://www.energia.gob.mx/" target="_blank" title="Secretar&iacute;a de Energ&iacute;a">Secretar&iacute;a de Energ&iacute;a</a></div> -->  
<div id="PEMEX"></div> 



<div id="utils">
  <ul id="nav2"> 
	<li class="bar"><a href="mcontratos" class="baritem first">Contratos</a></li>
  	<li class="bar"><a href="InteresesMoratorios" class="baritem first">Intereses Moratorios</a></li>
	<li class="bar"><a href="#" class="baritem first">Manual de Usuario</a></li> 
	<li class="bar"><a href="menu_cte" class="baritem first">Inicio</a></li>
	 
    <!-- mete codigo de comunicados, pizarrion de avisos y seleccione el cliente--> 
	
  		<li class="barlast"><span>&nbsp;</span></li>
	</ul>
</div>

<div id="cliente">

	<p class="textoEjecutivo" align="center"  id="un"> 
    
     
   
  
<script type="text/JavaScript">
            $("#un").load("controlador/tpdatosc.php");
        </script>
    </p> 
	
	
	
	
</div>
<div id="fecha"> 
<p class="fechapc" align="right">
	
	

	</p>
</div>

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
?>
doThisOnChangeC();
}
</script>
	
<!-- FIN DEL ENCABEZADO --> 


	
    
    



	


	<!--Ruteo de la página-->
	  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cte" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Datos Generales del Cliente</a>
							
					  </div>

						
				</div>
	
			
	
	
 

 
	  
			
		
	<div id="maincontent" align="center"> 	
      
       
       
 <br>
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
    <table align="center" width="80%">
			<tr align="center">
				<th height="44" colspan="2">Datos generales del cliente	</th>
			</tr>

						<tr class="color_non"><td align="left"><b>Clave del cliente:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="IdEmpresa" readonly></td></tr><tr class="color_par"><td align="left"><b>Número de E.S.:</b></td> <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="noestacion" readonly></td></tr><tr class="color_non"><td align="left"><b>Razón social:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="RzonSocial" readonly></td></tr><tr class="color_non"><td align="left"><b>Porcentaje Comision:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="Porcentaje" readonly></td></tr><tr class="color_par"><td align="left"><b>Dirección:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="Domicilio" readonly></td> <tr class="color_par"><td align="left"><b>Responsable legal:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="RLegal" readonly></td></tr><tr class="color_non"><td align="left"><b>R.F.C.:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="RFC" readonly></td></tr><tr class="color_par"><td align="left"><b>Centro controlador:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="CentroEntrega" readonly></td></tr><tr class="color_non"><td align="left"><b>Forma de pago:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="FP" readonly></td></tr> 
						
						
							
								<!-- Para uso opcional -->
											
											<tr class="color_non">
												<td><b>Tel&eacute;fono:</b></td>
												<td><input style="width:100%; background:transparent; border: none;" id="Telefono" readonly></td>		
											</tr>				
													
											<tr class="color_non">
												<td><b>Correo electr&oacute;nico:</b></td>
												<td><input style="width:100%; background:transparent; border: none;" type="text" id="Correo" readonly></td>		
											</tr>
											
										</form>
												
							
											
							
							
								<!-- Para uso opcional -->
							
							
											
						
						

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
    
    
    
  <script>
  

doThisOnChangeC = function()
    {   
  var IdEmpresa = document.getElementById("IdEmpresa");
  var RzonSocial = document.getElementById("RzonSocial");
  var Porcentaje = document.getElementById("Porcentaje");
   var Domicilio = document.getElementById("Domicilio");
    var RLegal = document.getElementById("RLegal");
     var RFC = document.getElementById("RFC");
      var CentroEntrega = document.getElementById("CentroEntrega");
       var FP = document.getElementById("FP");
        var Telefono = document.getElementById("Telefono"); 
          var Correo = document.getElementById("Correo");
  var noestacion = document.getElementById("noestacion");
	var data = new FormData(); 
    var ajaxx = new XMLHttpRequest();
	ajaxx.open("GET", "data/DataClient.php",true);
	ajaxx.send();


    ajaxx.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            //console.log(data);

            var html = '';
            for(var a = 0; a < data.length; a++) {
	            IdEmpresa.value = data[a].IdEmpresa;
                RzonSocial.value = data[a].RzonSocial; 
                Porcentaje.value = "Magna: "+data[a].Porcentaje + "%  Premium: " + data[a].PorcentajePremium + "%  Diesel: " + data[a].PorcentajeDiesel;
                Domicilio.value = data[a].Domicilio; 
                RLegal.value = data[a].RLegal; 
                RFC.value = data[a].RFC; 
                CentroEntrega.value = data[a].CentroEntrega; 
                FP.value = data[a].FP;
                Telefono.value = data[a].Telefono;  
                Correo.value = data[a].Correo; 
				noestacion.value = data[a].noestacion;

            }
            document.getElementById("data").innerHTML += html;
        }
        
        
    };
}

</script>
    
<script language="JavaScript" src="scripts/datetime.js"></script> 