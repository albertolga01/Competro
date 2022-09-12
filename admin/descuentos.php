 	


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ComPetro</title>
<link href="styles/styles.css" rel="stylesheet" type="text/css"/>
<link href="styles/tables.css" rel="stylesheet" type="text/css" />
<link href="styles/sidebar.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="iconion.ico">
<link href="styles/menu.css" rel="stylesheet" type="text/css" />
<link href="styles/content.css" rel="stylesheet" type="text/css" />
 <link href="styles/flickity.css" rel="stylesheet" type="text/css"/>
<script language="JavaScript" src="styles/flickity.pkgd.js"></script>

<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />

<link rel="icon" href="img/favicon.ico"> </head>

 
     
 
<body class="body" onload="logout()">

 
	<div id="extra">&nbsp;</div>

<div id="page">

<div id="header">

<!-- <div id="eNacional"><a href="http://www.energia.gob.mx/" target="_blank" title="Secretar&iacute;a de Energ&iacute;a">Secretar&iacute;a de Energ&iacute;a</a></div> -->  
<div id="PEMEX"></div> 



<div id="utils">
  <ul id="nav2"> 
	<li class="bar"><a href="InteresesMoratorios" class="baritem first">Intereses Moratorios</a></li>
  	<li class="bar"><a href="Manual Competro Usuario.pdf" class="baritem first">Manual de Usuario</a></li>
	<li class="bar"><a href="menu_cte" class="baritem first">Inicio</a></li>
    <!-- mete codigo de comunicados, pizarrion de avisos y seleccione el cliente--> 
	
  		
	    
	 
	<li class="barlast"><span>&nbsp;</span></li>
	</ul>
</div>
   
<div id="cliente">

	<p class="textoEjecutivo" align="center">
    
   
   
   <?php
   session_start();	
  
echo ' <p class="textoEjecutivo" align="center"> Bienvenido(a) '. $_SESSION["usuario"] .' - '.$_SESSION["rfc"].'</p>';
?>
   
    <p class="textoClienteSel" align="center">
	    
    </p> 
	
	
	
</div>
<div id="fecha"> 
<p class="fechapc" align="right">
	
	Martes, 12 de mayo del 2020&nbsp;&nbsp;&nbsp;&nbsp;14:04&nbsp;&nbsp;&nbsp;
s
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
    
    				

 

<li class="barlast"><span>&nbsp;</span></li>
<!-- mete codigo de tipo de usuario--> 

</ul>


<ul id="navv">
  
</ul>
</div>
</div>


<script type="text/javascript">

    function updateClock() {
        var currentTime = new Date();
		
		
		var date = currentTime.getFullYear()+'/'+(currentTime.getMonth()+1)+'/'+currentTime.getDate();

        var currentHours = currentTime.getHours();
        var currentMinutes = currentTime.getMinutes();
        var currentSeconds = currentTime.getSeconds();

        // Pad the minutes and seconds with leading zeros, if required
        currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
        currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

        // Choose either "AM" or "PM" as appropriate
        var timeOfDay = (currentHours < 12) ? "AM" : "PM";

        // Convert the hours component to 12-hour format if needed
        currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;

        // Convert an hours component of "0" to "12"
        currentHours = (currentHours == 0) ? 12 : currentHours;

        // Compose the string for display
        var currentTimeString = date + "  " + currentHours + ":" + currentMinutes + ":" + currentSeconds+ " " + timeOfDay;

        // Update the time display
        document.getElementById("fecha").innerHTML = currentTimeString;
        setTimeout(updateClock, 1000);
    }
    updateClock();

    
</script>


<!-- FIN DEL ENCABEZADO --> 


	


	


	<!--Ruteo de la página-->
	
	
 



<!-- <script language="JavaScript" src="/portal/utils/menu_home.js"></script>  -->

<div id="maincontent" class="homebjg">

<div class="separabanner">
<div class="gallery js-flickity"
  data-flickity-options='{ "wrapAround": true }'>
  
  
   <div class="gallery-cell0"  > <img src='img/1.jpg' width='100%'  > </div>
  <div class="gallery-cell1"><img src='img/2.jpg' width='100%'></div>
  <div class="gallery-cell2"><img src='img/3.jpg' width='100%'></div>
  <div class="gallery-cell3"><img src='img/4.jpg' width='100%'></div>
  <div class="gallery-cell4"><img src='img/5.jpg' width='100%'></div>
  </div>

</a>


 
<div id="contentHome" class="left">
<div id="banners">


</div> 

<div id="seccionesHome" class="left">
	<div class="seccion">
		<h3><label id="fechaaa">ComPetro</label></h3>
		 
        <br>
		<div class="sectext right"> 
			 
			  
		    
			 
    
   <div style="width:200px; margin-left:180px;">
    
                     
                        <div class="cuadro-magna">
                           <h4 class="precios-titulo">MAGNA </h4>
                           
                           <div class="count d-inline-block font-weight-bold" id="magna-v1" style="margin-left:-10px; margin-right:-10px; margin-top:0px; margin-bottom:0px; line-height:1;"></div>
                           <label id="magna" class="d-inline-block font-weight-bold">.</label>
						   <label id="nm" style="font-size:20px;">Nivel:
                             
                         
                         
                    </div>
                    </div>
                    
                    
                    <div style="width 200px; margin-left:40px;"> 
                        <div class="cuadro-premium">
                          <h5 class="precios-titulo">PREMIUM</h5>
                          
                           <div class="" id="premium-v1" style="margin-left:-10px; margin-right:-10px; margin-top:0px; margin-bottom:0px; line-height:1;"></div>
                           <label id="premium" class="">.</label>
						   <label id="np"style="font-size:20px;">Nivel:
                              
                             </label>
                           
                    </div>
                    </div>
                    
                    
                    <div style="width:200px; margin-left:10px;">
                    
                        <div class="cuadro-diesel">
                          <h5 class="precios-titulo text-white">DIESEL</h5>
                           
                          <div class="count d-inline-block font-weight-bold" id="diesel-v1" style="margin-left:-10px; margin-right:-10px; margin-top:0px; margin-bottom:0px; line-height:1;"></div>
                          <label id="diesel" class="d-inline-block font-weight-bold">.</label>
						  <label id="nd" style="font-size:20px;">Nivel:
                              
                             </label>
                           
                    </div>
                      </div>
                      
                       
                       </div>
                       
                  
                </div>
     
     </div>


<!-- 
<div id="saladeprensa" class="right">
    <div class="innerPR">
    	<h3 style="border-bottom:1px solid #CCCCCC;">Acceso a Clientes </h3> 
		
			<div class="seccion" align="center">	
		 		<p class="textoBienvenida"> Bienvenido(a) </p><br>
		 		<p class="letra_1">
				   
<?php 
				
				 echo '<label>'. $_SESSION["usuario"] .'</label> - <label>'. $_SESSION["rfc"] .'</label>';
				
				?>
		 		</p>
		 		<P align="right">&nbsp;</P>		
				<p align= "center">
					
				</p>
				<P align="right">&nbsp;</P>
				 
					<p align= "center">
						<!-- <a href="/portal/scgli006/controlador?Destino=scgli006_01.jsp" id="send" >Buzón</a>
						
					</p>
					<p align= "center"><br>
						<a href="contacto" ><img src="img/QuejaySuge.png" width="55" height="55" border="0" title="Atención de Quejas y Reclamos"></a> 
					</p>
				
		 	</div>	
		
    </div>
</div>-->
<div class="clear">&nbsp;</div>
</div>

<div class="clear spacer">&nbsp;</div>
</div>


	
	
	





<br><br><br>


<div id="footer">
	<div class="footerLeft left">
	Av. Camarón Sábalo No. 102
Col. Zona Dorada, Mazatlán, Sinaloa C.P. 82110</div>

	
	<div class="footerRight right"> <a href="https://portal.competro.mx/uploads/AVISO%20DE%20PRIVACIDAD%20COMPETRO.pdf" target="_blank">Aviso de Privacidad<a></div>
	<div class="spacer clear">&nbsp;</div>
	
</div>

</div>


	
		
			
	 
</body>
 
 
</html> 

<script>
 
    var dataa = new FormData(); 
    var ajax = new XMLHttpRequest();  
    var Fecha = document.getElementById("fechaaa");
    var Magna = document.getElementById("magna");
    var Premium = document.getElementById("premium");
	var Diesel = document.getElementById("diesel");
	var nmagna = document.getElementById("nm"); 
	var npremium = document.getElementById("np"); 
	var ndiesel = document.getElementById("nd"); 
	var value = 0;
	ajax.open("GET", "data/dataproductoss",true);
	ajax.send();
      
    ajax.onreadystatechange = function() {  
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);
             
    
            var html = '';
            for(var a = 0; a < data.length; a++) {
            
                var fechaa = data[a].fecha;
                var magnaa = data[a].magna; 
                var premiumm = data[a].premium; 
				var diesell = data[a].diesel;
				var nmm = data[a].nm;
				var npp = data[a].np;
				var ndd = data[a].nd;
				
				var pm = 1 - (data[a].porcentaje / 100); 
                var pp = 1 - (parseFloat(data[a].porcentajepremium) / 100); 
			    var pd = 1 - (parseFloat(data[a].porcentajediesel) / 100); 
				
            Fecha.innerHTML = "Descuentos aplicables para el día " + fechaa;
			 
			Magna.innerHTML = '$' + (magnaa * pm).toFixed(2) + '/M3';
            Premium.innerHTML = '$' + (premiumm * pp).toFixed(2) + '/M3';
			Diesel.innerHTML = '$' + (diesell * pd).toFixed(2) + '/M3';
			
			nmagna.innerHTML = 'Nivel: '+nmm;
			npremium.innerHTML = 'Nivel: '+npp;
			ndiesel.innerHTML = 'Nivel: '+ndd;
           
            
          
            
            }
            document.getElementById("data").innerHTML += html;
        }
    }; 
    </script>
 
 