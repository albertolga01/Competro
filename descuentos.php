<?php
   session_start();	
   
?>


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

<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
<SCRIPT src="scripts/renderelements.js" type="text/javascript"></SCRIPT>

	
<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />

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
  


  
 

<div id="maincontent" class="homebjg">
<div id="contentfull" align="left">
			
            <div class="margin">
               <DIV id=pathway>
                    
                           <SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
                            
                            <a class=bold href="menu_cte">Servicio a clientes</a>
                           
                            <img title="Cambiar Apariencia del Menú" id="icon" src="img/menuicon.png" width="20px" height="20px" style="float: right;">
                            <label title="Cambiar Apariencia del Menú"  id="uno" style="float: right; width:40px;  padding-left:10px; padding-top: 3px;  height:15px;  font-size:13px;">Menú</label> 
                            
                      
                         

                       
               </div>

<div class="separabanner">
                    <div class="gallery js-flickity"
                                        data-flickity-options='{ "wrapAround": true }'>
                                        
                                        
                                        <div class="gallery-cell0"><img src='img/1.jpg' width='100%'></div>
                                        <div class="gallery-cell1"><img src='img/2.jpg' width='100%'></div>
                                        <div class="gallery-cell2"><img src='img/3.jpg' width='100%'></div>
                                        <div class="gallery-cell3"><img src='img/4.jpg' width='100%'></div>
                                        <div class="gallery-cell4"><img src='img/5.jpg' width='100%'></div>
                    </div>
                    </div>

 


 
<div id="contentHome" class="left">
 

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
						   <!-- NIVEL OCULTO DESCOMENTAR LOS 3 LABEL Y VARIABLES ----nmagna/npremium/ndiesel.innerHTML---- -->
                           <!--<label id="nm" style="font-size:20px;">Nivel:-->
                         
                         
                    </div>
                    </div>
                    
                    
                    <div style="width 200px; margin-left:40px;"> 
                        <div class="cuadro-premium">
                          <h5 class="precios-titulo">PREMIUM</h5>
                          
                           <div class="" id="premium-v1" style="margin-left:-10px; margin-right:-10px; margin-top:0px; margin-bottom:0px; line-height:1;"></div>
                           <label id="premium" class="">.</label>
						   <!--<label id="np"style="font-size:20px;">Nivel:-->
                              
                             </label>
                           
                    </div>
                    </div>
                    
                    
                    <div style="width:200px; margin-left:10px;">
                    
                        <div class="cuadro-diesel">
                          <h5 class="precios-titulo text-white">DIESEL</h5>
                           
                          <div class="count d-inline-block font-weight-bold" id="diesel-v1" style="margin-left:-10px; margin-right:-10px; margin-top:0px; margin-bottom:0px; line-height:1;"></div>
                          <label id="diesel" class="d-inline-block font-weight-bold">.</label>
						  <!--<label id="nd" style="font-size:20px;">Nivel:-->
                              
                             </label>
                           
                    </div>
                      </div>
                      
                       
                       </div>
                       
                  
                </div>
     
     </div>

  
</div>
</div>
 

	
	
	





<br><br><br>


<script>
renderFooter();
</script>
 
	
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
			 
			Magna.innerHTML = '$' + ((magnaa * pm).toLocaleString('en-US')) + ' /M3';
            Premium.innerHTML = '$' + (premiumm * pp).toLocaleString('en-US') + ' /M3';
			Diesel.innerHTML = '$' + (diesell * pd).toLocaleString('en-US') + ' /M3';
			
			//nmagna.innerHTML = 'Nivel: '+nmm;
			//npremium.innerHTML = 'Nivel: '+npp;
			//ndiesel.innerHTML = 'Nivel: '+ndd;
           
            
          
            
            }
            document.getElementById("data").innerHTML += html;
        }
    }; 
    </script>
 
 
 <script language="JavaScript" src="scripts/datetime.js"></script>