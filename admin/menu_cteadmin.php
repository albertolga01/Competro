	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="styles/styles.css" rel="stylesheet" type="text/css" />
	<link href="styles/tables.css" rel="stylesheet" type="text/css" />
	
	<link href="styles/menu.css" rel="stylesheet" type="text/css" />
    <link href="styles/sidebar.css" rel="stylesheet" type="text/css" />
    <script src="scripts/push.js"></script>
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
    <link href="styles/content.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="iconion.ico">
	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	<meta http-equiv="Expires" content="0">

  <SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>

<meta http-equiv="Last-Modified" content="0">
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>

	<script language="JavaScript" src="scripts/calendario.js"></script> 
     <script type="text/JavaScript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
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


</div>
<script type="text/JavaScript">

            $("#un").load("controladorad/tpmenu_cteadmin");

        </script> 

<!-- FIN DEL ENCABEZADO --> 
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('2d121696457cd9fb762b', {
      cluster: 'us3'
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      //alert(JSON.stringify(data));
	  
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


	


	


	<!--Ruteo de la página-->
	
		  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					 
							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 
							 <a class=bold href="#">Servicio a clientes</a>
							
			   </div>

						
			</div>
			
	
			
	
	
 


<DIV id=maincontent><!--del content -->
<DIV class=left id=contentBasicoSeccionfullnvomenu>
		<DIV id=contentBox2>
         
        <div class="elemnt" id="unoo"> 
        
        </div>
         <div class="elemnt2" id="doss"> 
         
         </div>
         <div class="elemnt3" id="tress"> 
         </div>
         
         <div class="elemnt4" id="cuatroo"> 
         </div>
         <div class="elemnt6" id="sietee"> 
         </div>
         <div class="elemnt5" id="cincoo"> 
         </div> 
          
		</DIV>
        
        <div style="background-color:; height:100%;  margin-left: 10px; margin-top: 10px; margin-bottom: 7px;">
        <label style="font-size:20px;  font-weight: bold; padding-top:20px;">Consultas</label><br>
        </div>
        	<DIV id=contentBox3>
            
        <div class="elemnt20" id="veinte"></div>  
        
         <div class="elemnt8" id="nuevee"> 
         </div>
         <div class="elemnt9" id="diess"> 
         </div>
          <div class="elemnt10" id="oncee"> 
         </div>
          <div class="elemnt11" id="docee"> 
         </div>
          <div class="elemnt13" id="trecee"> 
        
        </div>
        
        
         

		</DIV>
        
        <br><br>
        
        
         <DIV id=contentBox2>
         
        <div class="elemnt14" id="catorcee">  
        </div>
         <div class="elemnt15" id="quincee"> 
         
         </div>
         <div class="elemnt16" id="diesiseiss"> 
         </div>
         
         <div class="elemnt17" id="diesisietee"> 
         </div>
         <div class="elemnt18" id="diesiochoo"> 
         </div>
         <div class="elemnt19" id="diesinueve" style="width:200px; height:200px;"> 
         </div> 
          
		</DIV>
          <DIV id=contentBox2>
         
        
         <div class="elemnt7" id="ochoo" hidden> 
         </div>
        
        </DIV>
        
        </DIV>
         
        .
        
       
         
        
        
       
        
        

		<!--<DIV class=right id=sideBar>
		<DIV class=sidemenu>
			<DIV class=margin>
				<h5>&nbsp;</h5>
				<div class="separadorsp">&nbsp;</div>
			 
 <div style=" height:30px;  padding-top:4px;">
<a class='list' href='pedidoscnvotradmin' style="height: 30px; text-align: left; height:auto; padding:2px 0; border-bottom:1px solid #CCCCCC;">Programa de entregas interactivo</a></div>
 <div style=" height:30px;  padding-top:4px;">
<a class='list' href='pedidosrcadmin' style="height: 30px; text-align: left; height:auto; padding:2px 0; border-bottom:1px solid #CCCCCC;">Reporte del programa de entregas Interactivo</a></div>
 <div style=" height:30px;  padding-top:4px;">
<a class='list' href='pagosaplicacionesadmin' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Pagos y aplicaciones</a></div>
 
<div style=" height:30px;  padding-top:4px;">
<a class='list' href='reporte_facturas_admin' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">&nbsp;Facturaci&oacute;n Electr&oacute;nica&nbsp;</a></div>
 <div style=" height:30px;  padding-top:4px;">
<a class='list' href='cargacondiciones' onClick=' return documento("/portal",0);' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Condiciones Comerciales</a></div>
 
<div style=" height:30px;  padding-top:4px;">
<a class='list' href='reporte_cre' onClick=' return documento("/portal",0);' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Reporte Semanal CRE</a></div>

<div style=" height:30px;  padding-top:4px;">
<a class='list' href='capturapreciosproducto' onClick=' return documento("/portal",0);' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Captura Precios</a></div>
  
  
  <div style=" height:30px;  padding-top:4px;">
<a class='list' href='menu_reportes' onClick=' return documento("/portal",0);' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Reporte Pipas</a></div>


 <div style=" height:30px;  padding-top:4px;">
<a class='list' href='poliza_ingreso' onClick=' return documento("/portal",0);' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Reporte</a></div>

   
 

	
	
			</div>   
		</div>
	</div> 
   
   
    
    
    	<DIV class=right id=sideBar>
        
		<DIV class=sidemenu>
			<DIV class=margin>
				<h5>Opciones a Consultar</h5>
				<div class="separadorsp">&nbsp;</div>
			 
<div style=" height:30px;  padding-top:4px;">
	<a class='list' href='cargafacturas' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Cargar facturas</a></div>
 <div style=" height:30px; padding-top:4px;"> 
<a class='list' href='cargamovimientos' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Cargar movimientos</a></div>
 <div style=" height:30px;  padding-top:4px;">
    <a class='list' href='registror' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Registro operaciones</a></div>
 <div style=" height:30px;  padding-top:4px;">
<a class='list' href='pedidosrprogramadosadmin' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Embarques programados</a></div>
 <div style=" height:30px;  padding-top:4px;">
<a class='list' href='informacionclienteadmin' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;" >Datos generales del cliente</a></div>
 <div style=" height:30px;  padding-top:4px;">
<a class='list' href='saldo_analiticoadmin' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Saldo anal&iacute;tico</a></div>  

  <div style=" height:30px;  padding-top:4px;">
<a class='list' href='preciosvigentesadmin' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Precios de venta vigentes</a></div>
 <div style=" height:30px;  padding-top:4px;">
<a class='list' href='capturaprecios' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Captura descuento vigente</a></div>
<div style=" height:30px;  padding-top:4px;">
<a class='list' href='Tabulador' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Cotizador</a></div>
<div style=" height:30px;  padding-top:4px;">
<a class='list' href='reporte_compras' style="height: 30px; text-align: left; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Reporte Compras</a></div>
 
 
 
 

	
	
			</div>  
		</div>	 
	</div> 
    
     -->
    
    
    <!--del sidebar-->
</div> <!--del maincontent del header-->
 

<br><br><br>
 
</div>
</div>


<script>
renderFooter();
</script>

</div>
 



</body>
</html>




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
	document.getElementById("unoo").setAttribute('onclick', 'location.href = "pedidoscnvotradmin"'); 
	document.getElementById("doss").setAttribute('onclick', 'location.href = "cargafacturas"'); 
	document.getElementById("tress").setAttribute('onclick', 'location.href = "pedidosrprogramadosadmin"'); 
	document.getElementById("cuatroo").setAttribute('onclick', 'location.href = "saldo_analiticoadmin"'); 
	document.getElementById("sietee").setAttribute('onclick', 'location.href = "cargamovimientos"'); 
	document.getElementById("cincoo").setAttribute('onclick', 'location.href = "reporte_facturas_admin"'); 
	
	
	
	document.getElementById("ochoo").setAttribute('onclick', 'location.href = "pedidosrcadmin"');  
	document.getElementById("nuevee").setAttribute('onclick', 'location.href = "preciosvigentesadmin"'); 
	document.getElementById("diess").setAttribute('onclick', 'location.href = "pagosaplicacionesadmin"'); 
	document.getElementById("oncee").setAttribute('onclick', 'location.href = "reporte_compras"'); 
	document.getElementById("docee").setAttribute('onclick', 'location.href = "menu_reportes"'); 
	document.getElementById("trecee").setAttribute('onclick', 'location.href = "informacionclienteadmin"'); 
	
	
	
	
	
	 
	document.getElementById("catorcee").setAttribute('onclick', 'location.href = "capturapreciosproducto"'); 
	document.getElementById("quincee").setAttribute('onclick', 'location.href = "registror"'); 
	document.getElementById("diesiseiss").setAttribute('onclick', 'location.href = "reporte_cre"'); 
	document.getElementById("diesisietee").setAttribute('onclick', 'location.href = "Tabulador"'); 
	document.getElementById("diesiochoo").setAttribute('onclick', 'location.href = "poliza_ingreso"'); 
	
	//document.getElementById("diesinueve").setAttribute('onclick', 'location.href = "descuentos"'); 
	
	document.getElementById("veinte").setAttribute('onclick', 'location.href = "capturaprecios"'); 
	
	</script>
  
  
<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->