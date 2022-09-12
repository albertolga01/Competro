<?php 
require 'connector.php';
global $connect; 
session_start();	
?>
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
        $dompdf->setPaper('A3', 'landscape');
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

    <SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>

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
    <link rel="icon" href="img/favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>  
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
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
</head>

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

        <script type="text/JavaScript">

            $("#un").load("controladorad/tpmenu_cteadmin");

        </script> 


        <script type="text/javascript" > 
            function logout(){<?php 
                if (isset($_SESSION["usuario"])) {
                } else {
                    session_unset();
                    session_destroy();
                    echo "window.location.href='index.php';";
                }  
            ?>}
        </script>


        <style>
            h1 {
                margin-bottom: 20px;
                text-align: center;
                
            }
            label{
                font-size: 1.5em;
                color: rgb(0, 0, 0);
               
            }
            input[type=checkbox]{
                display:contents;
              

            }
            input[type=checkbox] + label {
                cursor: pointer;
               
                
            }
            label:before {
                content: "";
                background: transparent;
                border: 2px solid #0171CE;
                /*text-shadow: 4px -2px 3px gray;*/
                border-radius: 5px;
                display: inline-block;
                height: 15px;
                margin-right: 15px ;
                text-align: center;
                vertical-align:middle;
                width: 15px;
                
	            
            }
            input[type=checkbox]:checked + label:before {
                content: '✓';
                font-size: 10px;
                color: #008445;
                font-family: "Times New Roman";
            }

            #maincontent{
                align-items: right;
                padding: 50px 20px;
                margin: calc(15% + 10px);
                margin-top: 10px;
                padding-top: 28px;
                margin-bottom: 20px;

            }
           
            
        </style>

        <div id="contentfull" align="left">
			<div class="margin">
				<DIV id=pathway>
					<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
                    <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;
                </div>
            </div>
            
            
            <!-- CONTENT -->
           
        <br><br>
        <br><br>


        <table align="center">
            <form method="POST" action="reporte_encuesta">
            <tr>
                <td class="color_blanco">Seleccione pregunta: </td>
                <td class="color_blanco"><select name="nopregunta">
                    <option value="0">Puesto</option>
                    <option value="1">Pregunta 1</option>
                    <option value="2">Pregunta 2</option>
                    <option value="3">Pregunta 3</option>
                    <option value="4">Pregunta 4</option>
                    <option value="5">Pregunta 5</option>
                    <option value="6">Pregunta 6</option>
                    <option value="7">Pregunta 7</option>
                    <option value="8">Pregunta 8</option>
                    <option value="9">Pregunta 9</option>
                    <option value="10">Pregunta 10</option>
                </select></td>
            </tr>
            <tr>
                <td class="color_blanco" colspan="2" align="center"><input type="submit" value="Enviar"/></td>
            </tr>
            </form>
        </table>


        
        <br><br>
        <br><br>
        <?php 
        if(isset($_POST["nopregunta"])){
        $p = $_POST["nopregunta"];
         /*
        1) Malo '.number_format((($cinco / $total) * 100),2).'%<br>
        2) Regular '.number_format((($cuatro / $total) * 100),2).'%  <br>
        3) Bueno '.number_format((($tres / $total) * 100),2).'%  <br>
        4) Muy bueno '.number_format((($dos / $total) * 100),2).'%  <br>
        5) Excelente '.number_format((($uno / $total) * 100),2).'%  <br> 
        */
        echo '<div style="width:1000px; height:550;">
       
        
        </div>'; 
            if($p == "0"){
                echo "<table align='center'>
                <th>Empresa</th>
                <th>Puesto</th>
                "; 
                $Query = "SELECT t2.rzonsocial, t1.puesto from encuesta_cte t1 inner join empresa t2 on t1.empresa = t2.idempresa"; 
                $res = $connect->query($Query);
                while($row = mysqli_fetch_array($res)){
                    echo "
                    <tr>
                        <td>".$row['rzonsocial']."</td>
                        <td>".$row['puesto']."</td>
                    </tr>";
                } 
                echo "</table>"; 
            }
            if($p == "1"){ 
               
                $Query = "SELECT t2.rzonsocial, t1.r1 as calificacion from encuesta_cte t1 inner join empresa t2 on t1.empresa = t2.idempresa ";  
                $res = $connect->query($Query);
                $respuesta = array();
                $total = 0; 
                $uno = 0;$dos = 0;$tres = 0;$cuatro = 0;$cinco = 0;
                while($row = mysqli_fetch_array($res)){
                    $val = 0; 
                    if($row["calificacion"] == "Excelente"){
                        $val = 5;
                        $uno++;
                    }
                    if($row["calificacion"] == "Muy bueno"){
                        $val = 4;
                        $dos++;
                    }
                    if($row["calificacion"] == "Bueno"){
                        $val = 3;
                        $tres++;
                    }
                    if($row["calificacion"] == "Regular"){
                        $val = 2;
                        $cuatro++;
                    }
                    if($row["calificacion"] == "Malo"){
                        $val = 1;
                        $cinco++;
                    }
                    $respuesta[] = array(
                        "rzonsocial" => $row['rzonsocial'], 
                        "calificacion" => $val
                    ); 
                    //$total = $total + $row["numero"];
                    $total++;
                } 
    
                $h = max(array_column($respuesta, 'numero')); 



                echo '<br>
                <table align="center">
                
                <tr><td>1) Malo '.number_format((($cinco / $total) * 100),2).'%</td></tr>
                <tr><td>2) Regular '.number_format((($cuatro / $total) * 100),2).'%</td></tr>
                <tr><td>3) Bueno '.number_format((($tres / $total) * 100),2).'%</td></tr>
                <tr><td>4) Muy bueno '.number_format((($dos / $total) * 100),2).'%</td></tr>
                <tr><td>5) Excelente '.number_format((($uno / $total) * 100),2).'%</td></tr>
                </table>
                <br> 
                <canvas id="line" width="400" height="250"></canvas>  ';
 /*
  1) Malo '.number_format((($cinco / $total) * 100),2).'%<br>
                2) Regular '.number_format((($cuatro / $total) * 100),2).'%  <br>
                3) Bueno '.number_format((($tres / $total) * 100),2).'%  <br>
                4) Muy bueno '.number_format((($dos / $total) * 100),2).'%  <br>
                5) Excelente '.number_format((($uno / $total) * 100),2).'%  <br> 
  */
                echo ' 
                <span>
               
                </span>
                <script> 
                        var densityCanvas = document.getElementById("line");
 
                            //Chart.defaults.global.defaultFontSize = 18; 

                            var densityData = {
                            label: "1. ¿Cómo calificarías el servicio de Logística?  ",
                            borderColor: "black",
                            backgroundColor: "#006eb5",
                            fill: true,
                            data: [
                                '; 
                                foreach ($respuesta as  $t) {
                                    echo "'".$t['calificacion']."'".",";
                                } 
                                echo '
                            ]
                            };

                            var barChart = new Chart(densityCanvas, {
                            type: "bar",
                            data: {
                                labels: [ 
                                    '; 
                                    foreach ($respuesta as  $t) {
                                        echo "'".$t['rzonsocial']."',";
                                    } 
                                    echo '
                                ],
                                datasets: [densityData]
                            }, 
                            options: {
                                responsive: true,
                                legend: {
                                    position: "top",
                                },
                                hover: {
                                    mode: "label"
                                },
                                scales: { 
                                    yAxes: [{
                                            display: true,
                                            ticks: {
                                                beginAtZero: true,
                                                steps: 10,
                                                stepValue: 5
                                            }
                                        }]
                                } 
                            }
                            }); 
                    </script>
                       
                      ';

            }


            if($p == "2"){ 
             
                $Query = "SELECT t2.rzonsocial, t1.r2 as calificacion from encuesta_cte t1 inner join empresa t2 on t1.empresa = t2.idempresa ";  
                $res = $connect->query($Query);
                $respuesta = array();
                $total = 0; 
                $uno = 0;$dos = 0;$tres = 0;$cuatro = 0;$cinco = 0;
                while($row = mysqli_fetch_array($res)){
                    $val = 0; 
                    if($row["calificacion"] == "Excelente"){
                        $val = 5;
                        $uno++;
                    }
                    if($row["calificacion"] == "Muy bueno"){
                        $val = 4;
                        $dos++;
                    }
                    if($row["calificacion"] == "Bueno"){
                        $val = 3;
                        $tres++;
                    }
                    if($row["calificacion"] == "Regular"){
                        $val = 2;
                        $cuatro++;
                    }
                    if($row["calificacion"] == "Malo"){
                        $val = 1;
                        $cinco++;
                    }
                    $respuesta[] = array(
                        "rzonsocial" => $row['rzonsocial'], 
                        "calificacion" => $val
                    ); 
                    //$total = $total + $row["numero"];
                    $total++;
                } 
    
                $h = max(array_column($respuesta, 'numero')); 
                echo '<br>
                <table align="center">
                
                <tr><td>1) Malo  '.number_format((($cinco / $total) * 100),2).'%</td></tr>
                <tr><td>2) Regular '.number_format((($cuatro / $total) * 100),2).'%</td></tr>
                <tr><td>3) Bueno '.number_format((($tres / $total) * 100),2).'%</td></tr>
                <tr><td>4) Muy bueno '.number_format((($dos / $total) * 100),2).'%</td></tr>
                <tr><td>5) Excelente '.number_format((($uno / $total) * 100),2).'%</td></tr>
                </table>
                <br> 
                <canvas id="line" width="400" height="250"></canvas>  ';
                echo ' 
                <span>
               
                </span>
                <script> 
                        var densityCanvas = document.getElementById("line");
 
                            //Chart.defaults.global.defaultFontSize = 18; 

                            var densityData = {
                            label: "2. ¿Cómo calificarías el servicio administrativo?",
                            borderColor: "black",
                            backgroundColor: "#006eb5",
                            fill: true,
                            data: [
                                '; 
                                foreach ($respuesta as  $t) {
                                    echo "'".$t['calificacion']."'".",";
                                } 
                                echo '
                            ]
                            };

                            var barChart = new Chart(densityCanvas, {
                            type: "bar",
                            data: {
                                labels: [ 
                                    '; 
                                    foreach ($respuesta as  $t) {
                                        echo "'".$t['rzonsocial']."',";
                                    } 
                                    echo '
                                ],
                                datasets: [densityData]
                            }, 
                            options: {
                                responsive: true,
                                legend: {
                                    position: "top",
                                },
                                hover: {
                                    mode: "label"
                                },
                                scales: { 
                                    yAxes: [{
                                            display: true,
                                            ticks: {
                                                beginAtZero: true,
                                                steps: 10,
                                                stepValue: 5
                                            }
                                        }]
                                } 
                            }
                            }); 
                    </script>
                       
                      ';

            }


            if($p == "3"){ 
              
                $Query = "SELECT t2.rzonsocial, t1.r3 as calificacion from encuesta_cte t1 inner join empresa t2 on t1.empresa = t2.idempresa ";  
                $res = $connect->query($Query);
                $respuesta = array();
                $total = 0; 
                $uno = 0;$dos = 0;$tres = 0;$cuatro = 0; $cinco = 0; $seis = 0; $siete = 0; $ocho = 0; $nueve = 0; $diez = 0;
                while($row = mysqli_fetch_array($res)){
                    $val = 0; 
                    if($row["calificacion"] == "Diez"){
                        $val = 10;
                        $diez++;
                    }
                    if($row["calificacion"] == "Nueve"){
                        $val = 9;
                        $nueve++;
                    }
                    if($row["calificacion"] == "Ocho"){
                        $val = 8;
                        $ocho++;
                    }
                    if($row["calificacion"] == "Siete"){
                        $val = 7;
                        $siete++;
                    }
                    if($row["calificacion"] == "Seis"){
                        $val = 6;
                        $seis++;
                    }
                    if($row["calificacion"] == "Cinco"){
                        $val = 5;
                        $cinco++;
                    }
                    if($row["calificacion"] == "Cuatro"){
                        $val = 4;
                        $cuatro++;
                    }
                    if($row["calificacion"] == "Tres"){
                        $val = 3;
                        $tres++;
                    }
                    if($row["calificacion"] == "Dos"){
                        $val = 2;
                        $dos++;
                    }
                    if($row["calificacion"] == "Uno"){
                        $val = 1;
                        $uno++;
                    }
                    $respuesta[] = array(
                        "rzonsocial" => $row['rzonsocial'], 
                        "calificacion" => $val
                    ); 
                    //$total = $total + $row["numero"];
                    $total++;
                } 
    
                $h = max(array_column($respuesta, 'numero')); 
                echo '<br>
                <table align="center"> 
                <tr><td>1) Uno '.number_format((($uno / $total) * 100),2).'%</td></tr>
                <tr><td>2) Dos '.number_format((($dos / $total) * 100),2).'%</td></tr>
                <tr><td>3) Tres '.number_format((($tres / $total) * 100),2).'%</td></tr>
                <tr><td>4) Cuatro '.number_format((($cuatro / $total) * 100),2).'%</td></tr>
                <tr><td>5) Cinco '.number_format((($cinco / $total) * 100),2).'%</td></tr>
                <tr><td>6) Seis '.number_format((($seis / $total) * 100),2).'%</td></tr>
                <tr><td>7) Siete '.number_format((($siete / $total) * 100),2).'%</td></tr>
                <tr><td>8) Ocho '.number_format((($ocho / $total) * 100),2).'%</td></tr>
                <tr><td>9) Nueve '.number_format((($nueve / $total) * 100),2).'%</td></tr>
                <tr><td>10) Diez '.number_format((($diez / $total) * 100),2).'%</td></tr>
                </table>
                <br> 
                <canvas id="line" width="400" height="250"></canvas>  ';
                echo ' 
                <span>
               
                </span>
                <script> 
                        var densityCanvas = document.getElementById("line");
 
                            //Chart.defaults.global.defaultFontSize = 18; 

                            var densityData = {
                            label: "3. Del 1 al 10, ¿Qué tan bueno consideras el servicio al cliente?",
                            borderColor: "black",
                            backgroundColor: "#006eb5",
                            fill: true,
                            data: [
                                '; 
                                foreach ($respuesta as  $t) {
                                    echo "'".$t['calificacion']."'".",";
                                } 
                                echo '
                            ]
                            };

                            var barChart = new Chart(densityCanvas, {
                            type: "bar",
                            data: {
                                labels: [ 
                                    '; 
                                    foreach ($respuesta as  $t) {
                                        echo "'".$t['rzonsocial']."',";
                                    } 
                                    echo '
                                ],
                                datasets: [densityData]
                            }, 
                            options: {
                                responsive: true,
                                legend: {
                                    position: "top",
                                },
                                hover: {
                                    mode: "label"
                                },
                                scales: { 
                                    yAxes: [{
                                            display: true,
                                            ticks: {
                                                beginAtZero: true,
                                                steps: 10,
                                                stepValue: 5
                                            }
                                        }]
                                } 
                            }
                            }); 
                    </script>
                       
                      ';

            }

            


            if($p == "4"){ 
                
                $Query = "SELECT t2.rzonsocial, t1.r4 as calificacion from encuesta_cte t1 inner join empresa t2 on t1.empresa = t2.idempresa ";  
                $res = $connect->query($Query);
                $respuesta = array();
                $total = 0; 
                $uno = 0;$dos = 0;$tres = 0;$cuatro = 0; $cinco = 0; $seis = 0; $siete = 0; $ocho = 0; $nueve = 0; $diez = 0;
                while($row = mysqli_fetch_array($res)){
                    $val = 0; 
                    if($row["calificacion"] == "Diez"){
                        $val = 10;
                        $diez++;
                    }
                    if($row["calificacion"] == "Nueve"){
                        $val = 9;
                        $nueve++;
                    }
                    if($row["calificacion"] == "Ocho"){
                        $val = 8;
                        $ocho++;
                    }
                    if($row["calificacion"] == "Siete"){
                        $val = 7;
                        $siete++;
                    }
                    if($row["calificacion"] == "Seis"){
                        $val = 6;
                        $seis++;
                    }
                    if($row["calificacion"] == "Cinco"){
                        $val = 5;
                        $cinco++;
                    }
                    if($row["calificacion"] == "Cuatro"){
                        $val = 4;
                        $cuatro++;
                    }
                    if($row["calificacion"] == "Tres"){
                        $val = 3;
                        $tres++;
                    }
                    if($row["calificacion"] == "Dos"){
                        $val = 2;
                        $dos++;
                    }
                    if($row["calificacion"] == "Uno"){
                        $val = 1;
                        $uno++;
                    }
                    $respuesta[] = array(
                        "rzonsocial" => $row['rzonsocial'], 
                        "calificacion" => $val
                    ); 
                    //$total = $total + $row["numero"];
                    $total++;
                } 
    
                $h = max(array_column($respuesta, 'numero')); 
                echo '<br>
                <table align="center"> 
                <tr><td>1) Uno '.number_format((($uno / $total) * 100),2).'%</td></tr>
                <tr><td>2) Dos '.number_format((($dos / $total) * 100),2).'%</td></tr>
                <tr><td>3) Tres '.number_format((($tres / $total) * 100),2).'%</td></tr>
                <tr><td>4) Cuatro '.number_format((($cuatro / $total) * 100),2).'%</td></tr>
                <tr><td>5) Cinco '.number_format((($cinco / $total) * 100),2).'%</td></tr>
                <tr><td>6) Seis '.number_format((($seis / $total) * 100),2).'%</td></tr>
                <tr><td>7) Siete '.number_format((($siete / $total) * 100),2).'%</td></tr>
                <tr><td>8) Ocho '.number_format((($ocho / $total) * 100),2).'%</td></tr>
                <tr><td>9) Nueve '.number_format((($nueve / $total) * 100),2).'%</td></tr>
                <tr><td>10) Diez '.number_format((($diez / $total) * 100),2).'%</td></tr>
                </table>
                <br> 
                <canvas id="line" width="400" height="250"></canvas>  ';
                echo ' 
                <span>
               
                </span>
                <script> 
                        var densityCanvas = document.getElementById("line");
 
                            //Chart.defaults.global.defaultFontSize = 18; 

                            var densityData = {
                            label: "4. Del 1 al 10, ¿Qué tan eficiente considera nuestro tiempo de respuesta?",
                            borderColor: "black",
                            backgroundColor: "#006eb5",
                            fill: true,
                            data: [
                                '; 
                                foreach ($respuesta as  $t) {
                                    echo "'".$t['calificacion']."'".",";
                                } 
                                echo '
                            ]
                            };

                            var barChart = new Chart(densityCanvas, {
                            type: "bar",
                            data: {
                                labels: [ 
                                    '; 
                                    foreach ($respuesta as  $t) {
                                        echo "'".$t['rzonsocial']."',";
                                    } 
                                    echo '
                                ],
                                datasets: [densityData]
                            }, 
                            options: {
                                responsive: true,
                                legend: {
                                    position: "top",
                                },
                                hover: {
                                    mode: "label"
                                },
                                scales: { 
                                    yAxes: [{
                                            display: true,
                                            ticks: {
                                                beginAtZero: true,
                                                steps: 10,
                                                stepValue: 5
                                            }
                                        }]
                                } 
                            }
                            }); 
                    </script>
                       
                      ';

            }



            
            if($p == "5"){ 
             
                $Query = "SELECT t2.rzonsocial, t1.r5 as calificacion from encuesta_cte t1 inner join empresa t2 on t1.empresa = t2.idempresa ";  
                $res = $connect->query($Query);
                $respuesta = array();
                $total = 0; 
                $uno = 0;$dos = 0;$tres = 0;$cuatro = 0;$cinco = 0;
                while($row = mysqli_fetch_array($res)){
                    $val = 0; 
                    if($row["calificacion"] == "Excelente"){
                        $val = 5;
                        $uno++;
                    }
                    if($row["calificacion"] == "Muy bueno"){
                        $val = 4;
                        $dos++;
                    }
                    if($row["calificacion"] == "Bueno"){
                        $val = 3;
                        $tres++;
                    }
                    if($row["calificacion"] == "Regular"){
                        $val = 2;
                        $cuatro++;
                    }
                    if($row["calificacion"] == "Malo"){
                        $val = 1;
                        $cinco++;
                    }
                    $respuesta[] = array(
                        "rzonsocial" => $row['rzonsocial'], 
                        "calificacion" => $val
                    ); 
                    //$total = $total + $row["numero"];
                    $total++;
                } 
    
                $h = max(array_column($respuesta, 'numero')); 
                echo '<br>
                <table align="center">
                <tr><td>1) Malo  '.number_format((($cinco / $total) * 100),2).'%</td></tr>
                <tr><td>2) Regular '.number_format((($cuatro / $total) * 100),2).'%</td></tr>
                <tr><td>3) Bueno '.number_format((($tres / $total) * 100),2).'%</td></tr>
                <tr><td>4) Muy bueno '.number_format((($dos / $total) * 100),2).'%</td></tr>
                <tr><td>5) Excelente '.number_format((($uno / $total) * 100),2).'%</td></tr>
                 
                </table>
                <br> 
                <canvas id="line" width="400" height="250"></canvas>  ';
                echo ' 
                <span>
               
                </span>
                <script> 
                        var densityCanvas = document.getElementById("line");
 
                            //Chart.defaults.global.defaultFontSize = 18; 

                            var densityData = {
                            label: "5. ¿Qué tan satisfactorio consideras la solución de parte de Comercializadora?",
                            borderColor: "black",
                            backgroundColor: "#006eb5",
                            fill: true,
                            data: [
                                '; 
                                foreach ($respuesta as  $t) {
                                    echo "'".$t['calificacion']."'".",";
                                } 
                                echo '
                            ]
                            };

                            var barChart = new Chart(densityCanvas, {
                            type: "bar",
                            data: {
                                labels: [ 
                                    '; 
                                    foreach ($respuesta as  $t) {
                                        echo "'".$t['rzonsocial']."',";
                                    } 
                                    echo '
                                ],
                                datasets: [densityData]
                            }, 
                            options: {
                                responsive: true,
                                legend: {
                                    position: "top",
                                },
                                hover: {
                                    mode: "label"
                                },
                                scales: { 
                                    yAxes: [{
                                            display: true,
                                            ticks: {
                                                beginAtZero: true,
                                                steps: 10,
                                                stepValue: 5
                                            }
                                        }]
                                } 
                            }
                            }); 
                    </script>
                       
                      ';

            }
            if($p == "6"){
                echo "<table align='center'>
                <th>Empresa</th>
                <th>6. ¿Alguna vez no pudimos resolver algún incoveniente?¿Cuál?</th>
                "; 
                $Query = "SELECT t2.rzonsocial, t1.r6 from encuesta_cte t1 inner join empresa t2 on t1.empresa = t2.idempresa"; 
                $res = $connect->query($Query);
                while($row = mysqli_fetch_array($res)){
                    echo "
                    <tr>
                        <td>".$row['rzonsocial']."</td>
                        <td>".$row['r6']."</td>
                    </tr>";
                } 
                echo "</table>"; 
            }




            if($p == "7"){ 
                
                $Query = "SELECT t2.rzonsocial, t1.r7 as calificacion from encuesta_cte t1 inner join empresa t2 on t1.empresa = t2.idempresa ";  
                $res = $connect->query($Query);
                $respuesta = array();
                $total = 0; 
                $uno = 0;$dos = 0;$tres = 0;$cuatro = 0; $cinco = 0; $seis = 0; $siete = 0; $ocho = 0; $nueve = 0; $diez = 0;
                while($row = mysqli_fetch_array($res)){
                    $val = 0; 
                    if($row["calificacion"] == "Diez"){
                        $val = 10;
                        $diez++;
                    }
                    if($row["calificacion"] == "Nueve"){
                        $val = 9;
                        $nueve++;
                    }
                    if($row["calificacion"] == "Ocho"){
                        $val = 8;
                        $ocho++;
                    }
                    if($row["calificacion"] == "Siete"){
                        $val = 7;
                        $siete++;
                    }
                    if($row["calificacion"] == "Seis"){
                        $val = 6;
                        $seis++;
                    }
                    if($row["calificacion"] == "Cinco"){
                        $val = 5;
                        $cinco++;
                    }
                    if($row["calificacion"] == "Cuatro"){
                        $val = 4;
                        $cuatro++;
                    }
                    if($row["calificacion"] == "Tres"){
                        $val = 3;
                        $tres++;
                    }
                    if($row["calificacion"] == "Dos"){
                        $val = 2;
                        $dos++;
                    }
                    if($row["calificacion"] == "Uno"){
                        $val = 1;
                        $uno++;
                    }
                    $respuesta[] = array(
                        "rzonsocial" => $row['rzonsocial'], 
                        "calificacion" => $val
                    ); 
                    //$total = $total + $row["numero"];
                    $total++;
                } 
    
                $h = max(array_column($respuesta, 'numero')); 
                echo '<br>
                <table align="center"> 
                <tr><td>1) Uno '.number_format((($uno / $total) * 100),2).'%</td></tr>
                <tr><td>2) Dos '.number_format((($dos / $total) * 100),2).'%</td></tr>
                <tr><td>3) Tres '.number_format((($tres / $total) * 100),2).'%</td></tr>
                <tr><td>4) Cuatro '.number_format((($cuatro / $total) * 100),2).'%</td></tr>
                <tr><td>5) Cinco '.number_format((($cinco / $total) * 100),2).'%</td></tr>
                <tr><td>6) Seis '.number_format((($seis / $total) * 100),2).'%</td></tr>
                <tr><td>7) Siete '.number_format((($siete / $total) * 100),2).'%</td></tr>
                <tr><td>8) Ocho '.number_format((($ocho / $total) * 100),2).'%</td></tr>
                <tr><td>9) Nueve '.number_format((($nueve / $total) * 100),2).'%</td></tr>
                <tr><td>10) Diez '.number_format((($diez / $total) * 100),2).'%</td></tr>
                </table>
                <br> 
                <canvas id="line" width="400" height="250"></canvas>  ';
                echo ' 
                <span>
               
                </span>
                <script> 
                        var densityCanvas = document.getElementById("line");
 
                            //Chart.defaults.global.defaultFontSize = 18; 

                            var densityData = {
                            label: "7. Del 1 al 10, ¿Qué tan practico considera el portal comercial ComPetro?",
                            borderColor: "black",
                            backgroundColor: "#006eb5",
                            fill: true,
                            data: [
                                '; 
                                foreach ($respuesta as  $t) {
                                    echo "'".$t['calificacion']."'".",";
                                } 
                                echo '
                            ]
                            };

                            var barChart = new Chart(densityCanvas, {
                            type: "bar",
                            data: {
                                labels: [ 
                                    '; 
                                    foreach ($respuesta as  $t) {
                                        echo "'".$t['rzonsocial']."',";
                                    } 
                                    echo '
                                ],
                                datasets: [densityData]
                            }, 
                            options: {
                                responsive: true,
                                legend: {
                                    position: "top",
                                },
                                hover: {
                                    mode: "label"
                                },
                                scales: { 
                                    yAxes: [{
                                            display: true,
                                            ticks: {
                                                beginAtZero: true,
                                                steps: 10,
                                                stepValue: 5
                                            }
                                        }]
                                } 
                            }
                            }); 
                    </script>
                       
                      ';

            }
            if($p == "8"){
                echo "<table align='center'>
                <th>Empresa</th>
                <th>¿Qué mejoraría?</th>
                "; 
                $Query = "SELECT t2.rzonsocial, t1.r8 from encuesta_cte t1 inner join empresa t2 on t1.empresa = t2.idempresa"; 
                $res = $connect->query($Query);
                while($row = mysqli_fetch_array($res)){
                    echo "
                    <tr>
                        <td>".$row['rzonsocial']."</td>
                        <td>".$row['r8']."</td>
                    </tr>";
                } 
                echo "</table>"; 
            }



            if($p == "9"){ 
              
                $Query = "SELECT t2.rzonsocial, t1.r9 as calificacion from encuesta_cte t1 inner join empresa t2 on t1.empresa = t2.idempresa ";  
                $res = $connect->query($Query);
                $respuesta = array();
                $total = 0; 
                $uno = 0;$dos = 0;$tres = 0;$cuatro = 0;$cinco = 0;
                while($row = mysqli_fetch_array($res)){
                    $val = 0; 
                    if($row["calificacion"] == "Recomiendo"){
                        $val = 4;
                        $uno++;
                    }
                    if($row["calificacion"] == "MuyProbable"){
                        $val = 3;
                        $dos++;
                    }
                    if($row["calificacion"] == "Es probable"){
                        $val = 2;
                        $tres++;
                    }
                    if($row["calificacion"] == "Es poco probable"){
                        $val = 1;
                        $cuatro++;
                    }
                   /* if($row["calificacion"] == "Malo"){
                        $val = 1;
                        $cinco++;
                    }*/
                    $respuesta[] = array(
                        "rzonsocial" => $row['rzonsocial'], 
                        "calificacion" => $val
                    ); 
                    //$total = $total + $row["numero"];
                    $total++;
                } 
    
                $h = max(array_column($respuesta, 'numero')); 
                echo '<br>
                <table align="center">
                
                <tr><td>4) Ya los recomiendo '.number_format((($uno / $total) * 100),2).'%</td></tr>
                <tr><td>3) Es muy probable '.number_format((($dos / $total) * 100),2).'%</td></tr>
                <tr><td>2) Es probable '.number_format((($tres / $total) * 100),2).'%</td></tr>
                <tr><td>1) Es poco probable '.number_format((($cuatro / $total) * 100),2).'%</td></tr> 
                </table>
                <br> 
                <canvas id="line" width="400" height="250"></canvas>  ';
                echo ' 
                <span>
               
                </span>
                <script> 
                        var densityCanvas = document.getElementById("line");
 
                            //Chart.defaults.global.defaultFontSize = 18; 

                            var densityData = {
                            label: "9. ¿Cuál es la probabilidad de que nos recomiende con otras estaciones?",
                            borderColor: "black",
                            backgroundColor: "#006eb5",
                            fill: true,
                            data: [
                                '; 
                                foreach ($respuesta as  $t) {
                                    echo "'".$t['calificacion']."'".",";
                                } 
                                echo '
                            ]
                            };

                            var barChart = new Chart(densityCanvas, {
                            type: "bar",
                            data: {
                                labels: [ 
                                    '; 
                                    foreach ($respuesta as  $t) {
                                        echo "'".$t['rzonsocial']."',";
                                    } 
                                    echo '
                                ],
                                datasets: [densityData]
                            }, 
                            options: {
                                responsive: true,
                                legend: {
                                    position: "top",
                                },
                                hover: {
                                    mode: "label"
                                },
                                scales: { 
                                    yAxes: [{
                                            display: true,
                                            ticks: {
                                                beginAtZero: true,
                                                steps: 10,
                                                stepValue: 5
                                            }
                                        }]
                                } 
                            }
                            }); 
                    </script>
                       
                      ';

            }
            


            if($p == "10"){
                echo "<table align='center'>
                <th>Empresa</th>
                <th>10. Sugerencia para mejorar nuestros servicios como Comercializadora y/o en el Portal Comercial ComPetro</th>
                "; 
                $Query = "SELECT t2.rzonsocial, t1.r10 from encuesta_cte t1 inner join empresa t2 on t1.empresa = t2.idempresa"; 
                $res = $connect->query($Query);
                while($row = mysqli_fetch_array($res)){
                    echo "
                    <tr>
                        <td>".$row['rzonsocial']."</td>
                        <td>".$row['r10']."</td>
                    </tr>";
                } 
                echo "</table>"; 
            }

        }
        
        
        ?>


<br><br>
        <br><br>

<div style="width: 100%;left: 42%;">
                    <h1 style="margin-bottom:5px;" >Reporte Encuesta</h1>
                    </div>
            <table align="center" style="width: 100%">
               
                <tr>
                    <th>Folio</th>
                    <th>Cliente</th>
                    <th>Puesto</th>
                    <th>Servicio de Logística</th>
                    <th>Servicio Administrativo</th>
                    <th>Servicio al cliente</th>
                    <th>Tiempo de respuesta</th>
                    <th>Satisfacción en Solución de Comercializadora</th>
                    <th>Resolución de Incoveniente</th>
                    <th>Practicidad del Portal</th>
                    <th>¿Qué mejoraría?</th>
                    <th>Recomendación con Estaciones</th>
                    <th>Sugerencia en Mejora de Nuestros servicios</th>
                    <th>Fecha</th>
                </tr>
                   <?php 
                    $Query = "SELECT t1.*, t2.RzonSocial FROM encuesta_cte t1 inner join empresa t2 on t1.empresa=t2.IdEmpresa";
                    
                    $res = $connect->query($Query);
                    while($mostrar = mysqli_fetch_array($res)){
                        
                    ?>

                        <tr>
                            <td><?php echo $mostrar['folio'] ?></td>
                            <td><?php echo $mostrar['RzonSocial'] ?></td>
                            <td><?php echo $mostrar['puesto'] ?></td>
                            <td><?php echo $mostrar['r1'] ?></td>
                            <td><?php echo $mostrar['r2'] ?></td>
                            <td><?php echo $mostrar['r3'] ?></td>
                            <td><?php echo $mostrar['r4'] ?></td>
                            <td><?php echo $mostrar['r5'] ?></td>
                            <td><?php echo $mostrar['r6'] ?></td>
                            <td><?php echo $mostrar['r7'] ?></td>
                            <td><?php echo $mostrar['r8'] ?></td>
                            <td><?php echo $mostrar['r9'] ?></td>
                            <td><?php echo $mostrar['r10'] ?></td>
                            <td><?php $date = new DateTime($mostrar['fecha']);
                                        echo $date->format('d/m/Y H:i:s');?>
                                        </td>
                        </tr>

                    <?php
                    }
                    ?>
            </table>







            <!--------------->
            
        </div>
        <br><br>
        <br><br>

        <script>
        renderFooter();
        </script>


    </div>
    <script>
    function oneCheckPerName(toCheck, name){
        let checks = document.getElementsByName(name);
        
        for(let iterator of checks){
            iterator.checked = false;
            
        }

        toCheck.checked = true;
    }

    function getCheckBoxResponse(name){
        let checks = document.getElementsByName(name);

        for(let iterator of checks){
            if(iterator.checked == true){
                return iterator.value;
            }
        }
    }

    function EnviarRespuesta(){

       

        let tosend = new FormData();
        tosend.append("r1", getCheckBoxResponse("Pr1"));
     

        tosend.append("r2", getCheckBoxResponse("Pr2"));
     
        
        tosend.append("r3", document.querySelector("input[name=Rbtn3]:checked").value );

        tosend.append("r4", document.querySelector("input[name=Rbtn4]:checked").value );

        tosend.append("r5", getCheckBoxResponse("Pr5"));

        if(getCheckBoxResponse("Pr6")=="Si"){
            
            tosend.append("r6", document.getElementById("inconveniente").value );
        
        }else{
            tosend.append("r6", "");
        }

        tosend.append("r7", document.querySelector("input[name=Rbtn7]:checked").value );

        tosend.append("r8", document.getElementById("FeedBox").value );

        tosend.append("r9", getCheckBoxResponse("Pr9"));

        tosend.append("r10", document.getElementById("Sug").value );

        fetch("./encuesta_cte_script.php",{method:"POST",body:tosend})
        
    }

    function comprobar(){
        let textbox = document.getElementById("inconveniente").disabled;

        if(textbox){
            document.getElementById("inconveniente").disabled = false;
        } else {
            document.getElementById("inconveniente").disabled = true;
        }
    }
    </script>
</body>

</html>

<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->