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


    <style>
        
@-webkit-keyframes push-on-hover {
  50% {
    -webkit-transform: scale(0.8);
    transform: scale(0.8);
  }
  100% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}
@keyframes push-on-hover {
  50% {
    -webkit-transform: scale(0.8);
    transform: scale(0.8);
  }
  100% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}
.push-on-hover {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
}
.elemntri1:hover, .elemntri1:focus, .elemntri1:active,.elemntri2:hover, .elemntri2:focus, .elemntri2:active,.elemntri3:hover, .elemntri3:focus, .elemntri3:active,.elemntri4:hover, .elemntri5:focus, .elemntri5:active,.elemntri5:hover, .elemntri5:focus, .elemntri5:active,.elemntri6:hover, .elemntri6:focus, .elemntri6:active,.elemnt7:hover, .elemnt7:focus, .elemnt7:active,.elemnt8:hover, .elemnt8:focus, .elemnt8:active,.elemnt9:hover, .elemnt9:focus, .elemnt9:active,.elemnt10:hover, .elemnt10:focus, .elemnt10:active,.elemnt11:hover, .elemnt11:focus, .elemnt11:active,.elemnt51:hover, .elemnt51:focus, .elemnt51:active {
  -webkit-animation-name: push-on-hover;
  animation-name: push-on-hover;
  -webkit-animation-duration: 0.75s;
  animation-duration: 0.75s;
  -webkit-animation-timing-function: linear;
  animation-timing-function: linear;
  -webkit-animation-iteration-count: 1;
  animation-iteration-count: 1;
}
        </style>
</head>

<body class="body" onload="logout()">
	<div id="extra">&nbsp;</div>
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

         
            <!-- FIN DEL ENCABEZADO --> 

            <!--Ruteo de la página-->
            <div id="contentfull" align="left">
                <div class="margin">
                    <div id=pathway>
                        <SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
                        <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
                        <a class=bold href="#">Reportes Internos</a>
                    </div>
				</div>

                <div id="maincontent">
                    <DIV class=left id=contentBasicoSeccionfullnvomenu>
                        <DIV id=contentBox2>
                            <div class="elemntri1" id="unoo" style="height:200px; width:200px; background-size: cover;	background-image:url(../img/menu/ri1.jpg); border-radius: 15px; margin-left: 10px;">   </div>
                            <div class="elemntri2" id="doss" style="height:200px; width:200px; background-size: cover;	background-image:url(../img/menu/ri2.jpg); border-radius: 15px; margin-left: 10px;">    </div>
                            <div class="elemntri3" id="tress" style="height:200px; width:200px; background-size: cover;	background-image:url(../img/menu/ri3.jpg); border-radius: 15px; margin-left: 10px;">    </div>
                            
                            <div class="elemntri4" id="cuatroo" style="height:200px; width:200px; background-size: cover;	background-image:url(../img/menu/ri4.jpg); border-radius: 15px; margin-left: 10px;">    </div>
                            <div class="elemntri5" id="cincoo" style="height:200px; width:200px; background-size: cover;	background-image:url(../img/menu/ri5.jpg); border-radius: 15px; margin-left: 10px;">    </div>
                            <div class="elemntri6" id="seiss" style="height:200px; width:200px; background-size: cover;	background-image:url(../img/menu/ri6.jpg); border-radius: 15px; margin-left: 10px;">  </div> 
                        </DIV>
                    </div>
                    <br><br><br><br><br>

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

                    <span>.....</span> 
                </div>	

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
    

    <script>
        document.getElementById("unoo").setAttribute('onclick', 'location.href = "voldiario"'); 
        document.getElementById("doss").setAttribute('onclick', 'location.href = "concentrado"'); 
        document.getElementById("tress").setAttribute('onclick', 'location.href = "consumos"'); 
        document.getElementById("cuatroo").setAttribute('onclick', 'location.href = "reporte_pipas"'); 
        document.getElementById("cincoo").setAttribute('onclick', 'location.href = "minimosmaximos"'); 
        document.getElementById("seiss").setAttribute('onclick', 'location.href = "reporte_encuesta"'); 
    </script>
<script language="JavaScript" src="js/datetime.js"></script> 
    