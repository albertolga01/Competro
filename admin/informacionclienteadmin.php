

<?php 
require 'connector.php';
global $connect;
$inicial = ''; 
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

	 <script type="text/JavaScript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>

	<script language="JavaScript" src="scripts/calendario.js"></script> 	
     
	     
    
    
    
    
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
                $("#un").load("controladorad/tpdatoscte.php");
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
?>

}
</script>

	
<!-- FIN DEL ENCABEZADO --> 


	
    
    



	


	<!--Ruteo de la página-->
	  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Información clientes</a>
							
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
    
     <table align="center"> 
   	 
     <tr>
				<td class="color_blanco"><b>Seleccione cliente:</b></td>
				<td class="color_blanco">
                <?php
    $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");

    echo "<select name='IdEmpresa' id='IdEmpresa' onchange='doThisOnChangeC(this.value)' style='width:100%;'>
	<option>Seleccione</option>
	";

    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['IdEmpresa'];
                  $name = $row['usuario']; 
                  echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';

} 
    echo "</select>"; 
?> </td>
				<td class="color_blanco">&nbsp; </td></td>
			</tr>	
   
    </table>
    
    <br><br>
    
    
    <table align="center" width="80%">
			<tr align="center">
				<th height="44" colspan="2">Datos generales del cliente	</th>
			</tr>

						<tr class="color_non"><td align="left"><b>Clave del cliente:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="Id" readonly></td></tr><tr class="color_par"><td align="left"><b>Número de E.S.:</b></td><td><input style="width:100%; background:transparent; border: none;" type="text" id="noestacion" readonly></td></tr><tr class="color_non"><td align="left"><b>Razón social:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="RzonSocial" readonly></td></tr><tr class="color_non"><td align="left"><b>Porcentaje Comision:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="Porcentaje" readonly></td></tr><tr class="color_par"><td align="left"><b>Calle:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="Domicilio" readonly></td></tr><tr class="color_par"><td align="left"><b>Responsable legal:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="RLegal" readonly></td></tr><tr class="color_non"><td align="left"><b>R.F.C.:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="RFC" readonly></td></tr><tr class="color_par"><td align="left"><b>Centro controlador:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="CentroEntrega" readonly></td></tr><tr class="color_non"><td align="left"><b>Forma de pago:</b></td>
                        <td align="left"><input style="width:100%; background:transparent; border: none;" type="text" id="FP" readonly></td>
						
						
							
								<!-- Para uso opcional -->
											
											<tr class="color_non">
												<td><b>Tel&eacute;fono:</b></td>
												<td><input style="width:100%; background:transparent; border: none;" id="Telefono" readonly></td>		
											</tr>				
											 			
											<tr class="color_non">
												<td><b>Correo electr&oacute;nico:</b></td>
												<td><input style="width:100%; background:transparent; border: none;" type="text" id="Correo" readonly></td>		
											</tr>
											 
												
							
											
							
							
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
  

doThisOnChangeC = function(value, optionIndex)
    {   
  var Id = document.getElementById("Id");
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
	ajaxx.open("GET", "data/DataClientadmin.php?value="+value,true);
	ajaxx.send();


    ajaxx.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            //console.log(data);

            var html = '';
            for(var a = 0; a < data.length; a++) {
	            Id.value = data[a].IdEmpresa;
                RzonSocial.value = data[a].RzonSocial; 
                 Porcentaje.value = "Magna: " + data[a].Porcentaje + "%  Premium: " + data[a].PorcentajePremium + "%  Diesel: " + data[a].PorcentajeDiesel + "%"; ;
                Domicilio.value = data[a].Domicilio; 
                RLegal.value = data[a].RLegal; 
                RFC.value = data[a].RFC; 
				noestacion.value = data[a].noestacion; 
                CentroEntrega.value = data[a].CentroEntrega; 
                FP.value = data[a].FP;
                Telefono.value = data[a].Telefono;  
                Correo.value = data[a].Correo; 

            }
            document.getElementById("data").innerHTML += html;
        }
        
        
    };
}

</script>
    
<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->