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
	

    <SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>

	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>

	<script language="JavaScript" src="scripts/calendario.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>		
     
	     
    
     <script type="text/JavaScript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    
    
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
            $("#un").load("controladorad/tpsala.php");
        </script>
        

</div>

<script  type="text/javascript" > 
     function logout(){<?php 
  
   
		if (($_SESSION["usuario"]) !== null) {
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
							 <a class=bold href="#">Saldo Analítico</a>
							
					  </div>

						
				</div>
			
			
	
			
	
	
 




 
		<div id="maincontent"></div>		
	 
	

			
		
	<div id="maincontent" align="center"> 	
     <form name="forma1" method="POST" action="detalle_saldo_analitico_admin.php" enctype="multipart/form-data"> 
    
    
    <table> 
   	 
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
    <table align="center" class="parametros">
			<tr class=""/><td align="left" class="color_blanco"><b>Encargado de cobro:</b></td><td align="left" class="color_blanco">MULTIBANCO</td>
            
            <td align="left" class="color_blanco"><b>Encargado de cobro:</b></td><td align="left" class="color_blanco">MULTIBANCO</td><tr/><tr class=""/>
<td align="left" class="color_blanco"><b>Forma de pago:</b>

</td><td align="left" class="color_blanco">
<input type="text" name="FP" id="FP" value="" readonly="readonly" style="width:80px; text-align:right; background:transparent; border: none;" />

</td><td align="left" class="color_blanco"><b>Estado de suspensión:</b></td><td align="left" class="color_blanco">NORMAL</td>
<tr/>
						
			
					
		<tr class=""><td align="left" class="color_blanco">
        <input type="text" name="SaldoDisplonibleLimite" id="SaldoDisponibleLimite" value="Saldo Disponible" readonly="readonly" style="width:90px; text-align:left; font-weight: 545; background:transparent; border: none;"  />
        
        </td><td align="left" class="color_blanco"><input type="text" name="SaldoDisponible" id="SaldoDisponible" value="$0.00" readonly="readonly" style="width:80px; text-align:right;background:transparent; border: none;" /></td></tr>
        
        <tr class=""><td align="left" class="color_blanco">
        <input type="text" name="SaldoSobrante" id="SaldoSobrante" value="Saldo contado" readonly="readonly" style="width:90px; text-align:left; font-weight: 545; background:transparent; border: none;"  />
        
        </td><td align="left" class="color_blanco"><input type="text" name="SaldoSobrantee" id="SaldoSobrantee" value="$0.00" readonly="readonly" style="width:80px; text-align:right;background:transparent; border: none;" /></td></tr>
			
			
			

			<tr><td class="color_blanco"><br></td></tr>
	</table>
    
    
	<table>			
		<tr align="center">	
			<th rowspan="2"> Tipo de cuenta </th>
			<th rowspan="2"> Moneda </th>
			<th colspan="4"> C L I E N T E </th> 
		</tr>
		<tr align="center">
			<th> Saldo a pagar </th>
			<th> Comprometido </th>
			<th> Intereses moratorios </th>
			<th> Total </th>
			
		</tr>
		
			
				<!-- Para uso opcional -->
				
			
				
					<tr class="color_non">
						<td align="left"><input type="text" name="FPP" id="FPP" value="" readonly style="text-align:right; background-color:#edf0ed; background:transparent; border: none;"></td>
						<td align="center">PESOS</td>
	
						<td align="right">
							<?php echo"<input type='text' id='Saldo' value='$0.00' style='width:90px; text-align:right; background-color:#edf0ed; background:transparent; border: none;'>"; ?>
						</td>
						<td align="right"> <input type="text" name="SC" id="SaldoComprometido" value="$0.00" readonly style="text-align:right; background-color:#edf0ed ;background:transparent; border: none;">
	                 	
						</td>
	
						<td align="right">$0.00</td>
						<td align="right"> <input type="text" name="Total" id="Total" value="$0.00" readonly style="width:80px; text-align:right; background-color:#edf0ed; background:transparent; border: none;"></td>
						
						
					</tr>
									
			
									
			
			
				<!-- Para uso opcional -->
			
			
							
				
		
		</table>
    
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
    
 <!--  
<table align="center">
<tr>
<th height="24">Folio</th>
<th>Centro Entrega</th>
<th>Producto</th>
<th>Destino</th>
<th>Fecha</th>
<th>Presentacion</th>
<th>Turno</th>
<th>Medio</th>
<th>Transportista</th>
<th>Capacidad</th> 
<th>EstadoAtencion</th>	
<th>Agregar</th>	
</tr>
 
<?php 
// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

$myDate = date('d/m/Y');

$sql = "SELECT folio, CentroEntrega, producto, destino, fecha, presentacion, turno, medio, Transportista, capacidad, EstadoAtencion FROM pedido where idempresa = '".$_SESSION["idempresa"]."' AND fecha = '".$myDate."' ";
$result = $connect->query($sql);
 

 
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
<form name='forma' method='post' action='controlador/updatepedidod.php'> 
 
<td> <input type='text' name='folio' value ='" . $row["folio"]."' size='4'  readonly ></td>
<td> <input type='text' name='centroentrega' value ='" . $row["CentroEntrega"] . "' size='22'   ></td>
<td> <input type='text' name='producto' value='".$row["producto"] . "' size='18'   ></td>
<td> <input type='text' name='destino' value ='". $row["destino"]. "' size='2'   ></td>
<td> <input type='text' name='fecha' value ='".$row["fecha"]. "' size='10'   > </td>
<td> <input type='text' name='presentacion' value ='" . $row["presentacion"] . "' size='6'  ></td>
<td> <input type='text' name='turno' value ='". $row["turno"]."' size='2'   ></td>
<td> <input type='text' name='medio' value ='". $row["medio"]."' size='12'   ></td>
<td> <input type='text' name='transportista' value='".$row["Transportista"]."' size='14'   ></td>
<td> <input type='text' name='capacidad' value ='". $row["capacidad"]. "' size='4'   ></td>
<td> <input type='text' name='estadoatencion' value ='". $row["EstadoAtencion"]. "' size='20'   ></td>
<td><input type='Submit' name='uno' value='Actualizar'></td>

 </form>
</tr>";
}

echo "
<tr>
<form name='formaagregar' method='post' action='controlador/postpedidod.php'> 

<input type='hidden' name='idempresa' value ='" . $_SESSION["idempresa"]."' size='4'  readonly >
<td><input type='text' name='folio' value ='' size='4' readonly ></td>
<td><input type='text' name='centroentrega' value ='' size='22'  ></td>
<td><input type='text' name='producto' value ='' size='18'   ></td>
<td><input type='text' name='destino' value ='' size='2'   ></td>
<td><input type='text' name='fecha' ' value ='' size='10' readonly  ></td>
<td><input type='text' name='presentacion' value ='' size='6'   ></td>
<td><input type='text' name='turno' value ='' size='2'   ></td>
<td><input type='text' name='medio' value ='' size='12'   ></td>
<td><input type='text' name='transportista' value ='' size='14'   ></td> 
<td><input type='text' name='capacidad' value ='' size='4'   ></td> 
<td><input type='text' name='estadoatencion' value ='' size='20' readonly  ></td> 
<td><input type='Submit' name='uno' value=' Agregar  '></td>
</form>
</tr>


";






echo "</table>";
} else { echo "0 results"; 



echo "
<tr>
<form name='formaagregard' method='post' action='postpedidod.php'> 
<input type='hidden' name='idempresa' value ='" . $_SESSION["idempresa"]."' size='4'  readonly >
<td><input type='text' name='folio' value ='' size='4' readonly ></td>
<td><input type='text' name='centroentrega' value ='' size='22'  ></td>
<td><input type='text' name='producto' value ='' size='18'   ></td>
<td><input type='text' name='destino' value ='' size='2'   ></td>
<td><input type='text' name='fecha'  value ='' size='10' readonly ></td>
<td><input type='text' name='presentacion' value ='' size='6'   ></td>
<td><input type='text' name='turno' value ='' size='2'   ></td>
<td><input type='text' name='medio' value ='' size='12'   ></td>
<td><input type='text' name='transportista' value ='' size='14'   ></td> 
<td><input type='text' name='capacidad' value ='' size='4'   ></td> 
<td><input type='text' name='estadoatencion' value ='' size='20'  readonly ></td> 
<td><input type='Submit' name='uno' value=' Agregar  '></td>
</form>
</tr>";



}
$connect->close();
?>
</table>
    
    
	-->  	
            
            
            
            
            <br><br>
            
		
			 
		
						
	
	 
	
	<div id="maincontent"> 
		<table align="center">
			<tr class="link" align="center">
				 
				<td colspan="4" align="center" class="color_blanco"> 
					<b><input type='submit' name='dos' value='Detalle Saldo'></b></td> 
			</tr>
		</table>
	</div> 
    
    
     </form>
     
      <table align="center">
			<tr class="link" align="center">
				 <form name="forma12" method="POST" action="detalle_saldo_comprometido.php" enctype="multipart/form-data"> 
                 <?php 
				echo "<input type='hidden' id='idem' name='idempresa'>";
				 ?>

				<td colspan="4" align="center" class="color_blanco"> 
					<b><input type='submit'  value='Detalle Comprometido'></b></td> 
                    </form>
			</tr>
		</table>
     
     
     
    
	


	
	



 
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
     
     





    
    
    	<script>
    doThisOnChangeC = function(value, optionIndex)
    {  
    var dataa = new FormData(); 
    var ajax = new XMLHttpRequest();  
     var Saldo = document.getElementById("Saldo");
      var FPl = document.getElementById("FP");
	  var idem = document.getElementById("idem");
	  idem.value = value;
	   var SaldoS = document.getElementById("SaldoSobrante");
      var SaldoSS = document.getElementById("SaldoSobrantee");
	  
       var FPLL = document.getElementById("FPP");
      var Total = document.getElementById("Total");
       var SaldoDisponible = document.getElementById("SaldoDisponible");
          var SaldoDisponibleLimite = document.getElementById("SaldoDisponibleLimite");
      var SaldoComprometido = document.getElementById("SaldoComprometido"); 
	ajax.open("GET", "data/datasaldoadmin.php?value="+value,true);
	ajax.send();
      
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);
            var fppp = '';
  
            var html = '';

            for(var a = 0; a < data.length; a++) {
            var saldo = data[a].saldo;
			var Sobrante = data[a].Sobrante;
            var formapago = data[a].FP; 
            var saldoComprometido = data[a].saldoComprometido;
            var saldoRestante = data[a].SaldoDisponible;
            var LimC = data[a].LimC;      
            var saldoDisponible = parseFloat(saldoRestante);
            Saldo.value = '$' + (parseFloat(saldo)).toLocaleString('en-US');			
                if(saldoComprometido > 0){ 
                    SaldoComprometido.value  = '$' +(parseFloat(saldoComprometido)).toLocaleString('en-US');
                } else {								 
                    SaldoComprometido.value  = "$0";			
                
                }  
            var saldoCredito = parseFloat(data[a].SaldoCredito);   
            var saldoContado = parseFloat(data[a].SaldoContado);   
            Tot =  (parseFloat(saldo) -  parseFloat(saldoComprometido)).toLocaleString('en-US'); 
            Total.value = '$' + Tot;
			FPl.value = formapago;
            FPLL.value = formapago;

            if(FPl.value == '0'){
                FPl.value = "CONTADO";
                FPLL.value = "CONTADO";
                SaldoS.value = "";
                SaldoSS.value = "";
                //Saldo.value = saldoContado;
                SaldoDisponibleLimite.value = "Saldo Disponible";
                SaldoDisponible.value = '$' + (saldoContado).toLocaleString('en-US');  
                
                if(saldoCredito > 0){				
                    Saldo.value = '$' + (saldoCredito).toLocaleString('en-US');                
                    Total.value = '$' + (saldoCredito).toLocaleString('en-US');				
                } else {				
                    Saldo.value = "$0";                
                    Total.value = "$0";			
                }             
                   
                //Tot = (parseFloat(saldoContado) -  parseFloat(saldoComprometido)).toLocaleString('en-US'); 
                //Total.value = '$' + Tot;
                //Saldo.value = '$' + (saldoContado).toLocaleString('en-US');
                //SaldoDisponible.value = '$' + (saldoContado).toLocaleString(); 
            }
            
            
            if(FPl.value == '1'){
                FPl.value = "CREDITO";
                FPLL.value = "CREDITO";
                SaldoS.value = "Saldo";
                SaldoSS.value = '$' +  parseFloat(Sobrante).toLocaleString('en-US');
                SaldoDisponibleLimite.value = "Credito Disponible";
            			
                if(saldoCredito > 0){
                    SaldoDisponible.value = '$' + (LimC - saldoCredito).toLocaleString('en-US');  
                } else {				
                    SaldoDisponible.value = '$' + (LimC).toLocaleString('en-US'); 			
                } if (saldoCredito > 0){				
                    Saldo.value = '$' + (saldoCredito).toLocaleString('en-US');                
                    Total.value = '$' + (saldoCredito).toLocaleString('en-US');				
                } else {				
                    Saldo.value = "$0";                
                    Total.value = "$0";			
                }                     
            }
            
            }
            document.getElementById("data").innerHTML += html;
        }
    };
 }
    </script>


<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->