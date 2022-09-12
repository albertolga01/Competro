<?php 

require 'connector.php';
global $connect; 
session_start();
require 'dompdf/autoload.inc.php';
use Dompdf\Options;
use Dompdf\Dompdf;

if(isset($_POST['text'])){
    $options = new Options();
    $options->set('defaultFont', 'Courier'); 
    $dompdf = new Dompdf($options); 
    $dompdf = new Dompdf();
    $dompdf->loadHtml($_POST['text']); 
    $dompdf->setPaper('A4', 'landscape'); 
    $dompdf->render(); 
    $dompdf->stream(); 
}

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
    
    <?php 
	    if(isset($_POST['fini'])){
		    echo '<script> 
                    $( function() {
                    $("#dateDefaultj").datepicker();
                    $("#dateDefaultfinalj").datepicker();
                    } );
                </script>';
		} else {
			echo '<script> 
                    $( function() {
                    $( "#dateDefault").datepicker();
                    $("#dateDefaultfinal").datepicker(); 
                    } );
                </script>';
        }
	?>
    
    <link rel="icon" href="img/favicon.ico"> 
</head>

<body class="body" onload="logout()">
	<div id="extra">&nbsp;
    </div>
    
    <div id="page">
            <div id="header">
                <div id="PEMEX"></div> 
                
                <div id="utils">
                    <ul id="nav2"> 
                        <li class="bar"><a href="cargacontratos" class="baritem first">Contratos</a></li>
                        <li class="bar"><a href="InteresesMoratoriosad" class="baritem first">Intereses Moratorios</a></li>
                        <li class="bar"><a href="Manual Competro Usuario.pdf" class="baritem first">Manual de Usuario</a></li>
                        <li class="bar"><a href="menu_cteadmin" class="baritem first">Inicio</a></li>
                        <li class="barlast"><span>&nbsp;</span></li>
                    </ul>
                </div>

                <div id="cliente">
                    <p class="textoEjecutivo" align="center" id="un">
                        <script type="text/JavaScript">
                            $("#un").load("controladorad/tprp.php");
                        </script>
                    </p> 
                </div>
                
                <div id="fecha"> 
                    <p class="fechapc" align="right"></p>
                </div>

                <div id="mainmenu">
                    <ul id="nav">
                        <li class="bar"><a href="menu_cteadmin" class="baritem">Servicio a Clientes</a></li>
                        <li class="bar"><a href="clientes" class="baritem">Clientes</a></li> 
                        <li class="bar"><a href="pedidoscnvotradmin" class="baritem">Pedidos</a></li> 
                        <li class="bar"><a href="scripts/logout.php" class="baritem">Salir</a></li>		
                        <li class="barlast"><span>&nbsp;</span></li>
                        <!-- mete codigo de tipo de usuario--> 
                    </ul>
                </div>
            </div>

            <script  type="text/javascript" > 
                function logout(){
                    <?php 
                    if (isset($_SESSION["usuario"])) {}
                    else {
                        session_unset();
                        session_destroy();
                        echo "window.location.href='../index';";
                    }  
                    ?>
                }
            </script>

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
                        <SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
                        <a href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
                        <a class=bold href="menu_reportes">Reportes Internos</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
                        <a class=bold href="#">Reporte de minimos y máximos</a>
                    </div>
				</div>

                <div id="maincontent">
                <br><br><br><br><br>

                    <div id="filters" style="display: flex; flex-direction: column; width: 25vw; margin: auto; margin-bottom: 3vmax;">
                        <select name="select_empresa" id="select_empresa" style="margin-bottom: 1vmax;">
                            <option value="" disabled selected>Empresa</option>
                        </select>

                        <select name="select_estacion" id="select_estacion" style="margin-bottom: 1vmax;">Estación
                            <option value="" disabled selected>Estación</option>
                        </select>

                        <input type="month"></input>
                    </div>

                    <table id="tbl_minmax">
                        <tr>
                            <th>Destino</th>
                            <th>No. estación</th>
                            <th>Producto</th>
                            <th>Máximo</th>
                            <th>Mínimo</th>
                            <th>Volumen del mes</th>
                            <th>Diferencia</th>
                        </tr>
                    </table>
                </div>		

                <!-- <div id="maincontent" align="center">
                <br><br>

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
            </div> 	 -->

            <!-- <form action="LoginServlet" method="post">
            </form> -->
	
            <!-- <div id="maincontent"> 
                <table align="center">
                    <tr class="link" align="center">
                        <td colspan="4" align="center" class="color_blanco"> 
                            <b>.....</b> 
                        </td> 
                    </tr>
                </table>
            </div>  -->

            <script>
                doThisOnChange = function(value, optionIndex) {
                    var selectElement = document.getElementById("destinoss");
                    while (selectElement.options.length > 0) {                
                        selectElement.remove(0);
                    }  

                    var data = new FormData(); 
                    var ajax = new XMLHttpRequest();  
                    ajax.open("GET", "data/data.php?value="+value,true);
                    ajax.send();
                    ajax.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var data = JSON.parse(this.responseText);
                            var html = '';
                            for(var a = 0; a < data.length; a++) {
                                //var firstName = data[a].iddestino;
                                var lastName = data[a].destino; 
                                selectElement.add(new Option(lastName)); 
                            }
                            selectElement.add(new Option('TODOS')); 
                            document.getElementById("data").innerHTML += html;
                        }
                    };
                }
            </script>
        </div>
        <br><br>

        <div id="footer">
            <div class="footerLeft left">Av. Camarón Sábalo No. 102 Col. Zona Dorada, Mazatlán, Sinaloa C.P. 82110</div>
            <div class="footerRight right"> <a href="https://portal.competro.mx/uploads/AVISO%20DE%20PRIVACIDAD%20COMPETRO.pdf" target="_blank">Aviso de Privacidad<a></div>
            <div class="spacer clear">&nbsp;</div>	
        </div>
    </div>
</body>

</html>
    
    <script>
        function setInputDate(_id){
            var _dat = document.querySelector(_id);
            var hoy =new Date(new Date().setDate(new Date().getDate() - 30)),
            d = (hoy.getDate() ),
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
        function setInputDate(_id){
            var _dat = document.querySelector(_id);
            var hoy =new Date(new Date().setDate(new Date().getDate())),
            d = (hoy.getDate() ),
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

        setInputDate("#dateDefaultfinal");   
    </script>
    
    <script>
        function Print(){
            $('#txtarea').html(document.getElementById('tabb').outerHTML)
        }
    </script>