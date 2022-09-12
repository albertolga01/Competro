<?php 
$inicial = '';
require '../connector.php';
global $connect; 
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../styles/styles.css" rel="stylesheet" type="text/css" />
	<link href="../styles/tables.css" rel="stylesheet" type="text/css" />
    <link href="../styles/menu.css" rel="stylesheet" type="text/css" />
    <link href="../styles/sidebar.css" rel="stylesheet" type="text/css" />
    <link href="../styles/content.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="../iconion.ico">
	<script src="../dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="../scripts/textsize.js" type="text/javascript"></SCRIPT>
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="../styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>
	<script language="JavaScript" src="../scripts/calendario.js"></script> 
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="icon" href="../img/favicon.ico"> 
</head>

<body class="body">
	<div id="extra">&nbsp;
    </div>
    <div id="page">
        <div id="header">
<!-- <div id="eNacional"><a href="http://www.energia.gob.mx/" target="_blank" title="Secretar&iacute;a de Energ&iacute;a">Secretar&iacute;a de Energ&iacute;a</a></div> -->  
            <div id="PEMEX">
            </div> 
            <div id="utils">
                <ul id="nav2"> 
                    <li class="bar"><a href="cargacontratos" class="baritem first">Contratos</a></li>
                    <li class="bar"><a href="#" class="baritem first">Intereses Moratorios</a></li>
                    <li class="bar"><a href="../Manual Competro Usuario.pdf" class="baritem first">Manual de Usuario</a></li>
                    <li class="bar"><a href="menu_cteadmin" class="baritem first">Inicio</a></li>
                <!-- mete codigo de comunicados, pizarrion de avisos y seleccione el cliente--> 
                <li class="barlast"><span>&nbsp;</span></li>
                </ul>
            </div>
            <div id="cliente">
                <p class="textoEjecutivo" align="center"  id="un"> 
                 
 <script type="text/JavaScript">
            $("#un").load("controladorad/tpmenu_cteadmin");
        </script>
                </p> 
            </div>
            <div id="fecha"> 
                <p class="fechapc" align="right"></p>
            </div>
            <div id="mainmenu">
                <ul id="nav">
               <li class="bar"><a href="menu_cteadmin" class="baritem">Servicio a Clientes</a>
	</li>
	

 
<li class="bar"><a href="clientes" class="baritem">Clientes</a>
	</li> <li class="bar"><a href="pedidoscnvotradmin" class="baritem">Pedidos</a>
	</li> <li class="bar"><a href="../index" class="baritem">Salir</a>
	</li>					

                <!-- mete codigo de tipo de usuario--> 
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
		<div id="contentfull" align="left">
			<div class="margin">
			    <div id=pathway>
					<span class=bullet>&nbsp;&nbsp;</span> 
						<a href="menu_cteadmin" >Servicio a clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;<a  href="#" >Interés Vigente</a>
				</div>
			</div>
	    <div id="maincontent" align="center"> 
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

    <table>
        <tr>
            <td class="color_blanco">
                <label>Tipo de Tasa: </label>
            </td>
            <td class="color_blanco">
                <label><input type="text" value="MORATORIO" disabled></label>
            </td>
        </tr>
        <tr>
            <td class="color_blanco">
            <label>Tipo de Moneda: </label>
            </td>
            <td class="color_blanco">
            <label><input type="text" value="MONEDA NACIONAL" disabled></label>
            </td>
        </tr>
    </table>
    <br>

    <?php 
	echo'
<table align="center">
<tr> 
<th height="25">Fecha inicial de vigencia</th>
<th>Fecha final de vigencia</th>
<th>Tasa (%)</th>
</tr> ';
 
// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

$myDate = date('d/m/Y');

$sql = "SELECT fechainicial, fechafinal, tasa FROM interesesmoratorios";
 
$result = $connect->query($sql);
$cont = 0;

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$cont = $cont + 1;
    echo "<tr> 
            <td align='center' height='15'> <label>".$row["fechainicial"]."</label></td>
            <td align='center'> <label>".$row["fechafinal"]."</label></td>
            <td align='center'> <label>".$row["tasa"]."</label></td>
    </tr>";
}

echo "<tr>
        <td class='color_blanco' colspan=2>
            <label>Total de registros: ".$cont."</label>
        </td>
    </tr>";
echo "</table>";
} else { echo "0 results"; }
$connect->close();
?>
</table> 
            <br><br>
	</div> 	
	<form action="../LoginServlet" method="post">
	</form>
	<div id="maincontent"> 
		<table align="center">
			<tr class="link" align="center"> 
			</tr>
		</table>
	</div> 
</div>
<br><br>
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