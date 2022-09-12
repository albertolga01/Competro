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
    <SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	<SCRIPT src="scripts/renderelements.js" type="text/javascript"></SCRIPT>
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>
	<script language="JavaScript" src="scripts/calendario.js"></script> 	
    <link rel="stylesheet" href="styles/calendario.css"> 
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="scripts/uijquery.js"></script>
    <link rel="icon" href="img/favicon.ico">
    
  
</head>

<body class="body" onload="logout()">
	<div id="extra">&nbsp;</div>
    <div id="page" >
        <div id="header">
            <div id="PEMEX"></div> 

            <div id="utils">
                <ul id="nav2"> 
                    <li class="bar"><a href="mcontratos" class="baritem first">Contratos</a></li>
                    <li class="bar"><a href="InteresesMoratorios" class="baritem first">Intereses Moratorios</a></li>
                    <li class="bar"><a href="Manual Competro Usuario.pdf" class="baritem first">Manual de Usuario</a></li>
                    <li class="bar"><a href="menu_cte" class="baritem first">Inicio</a></li>
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
                <p class="fechapc" align="right"></p>
            </div>

            <div id="mainmenu">
                <ul id="nav">
                    <li class="bar"><a href="menu_cte" class="baritem">Servicio a Clientes</a></li>
                    <li class="bar"><a href="contacto" class="baritem">Contacto</a></li>
                    <li class="bar"><a href="scripts/logout.php" class="baritem">Salir</a></li>					
                    <li class="barlast"><span>&nbsp;</span></li>
                </ul>
            </div>
        </div>

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

            h2,h3{

                color: black;
            }
            /*.fondoCompetro{
            background-image: url("img/COMPETROWatermark.png"); 
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            position: relative;
            }*/
            
            label{
                font-size: 1.5em;
                color: rgb(0, 0, 0);
               
            }
            input[type=checkbox]{
                display:contents;
                opacity: 0;
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
                height: 20px;
                margin-right: 15px;
                text-align: center;
                vertical-align:middle;
                width: 20px;
                
	            
            }


            input[type=checkbox]:checked + label:before {
                content: url("data:image/svg+xml,%0A%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 10 10'%3E%3Cg class='nc-icon-wrapper' stroke-width='1' fill='%23555555'%3E%3Cpath fill='none' stroke='%23FFFFFF' stroke-linecap='round' stroke-linejoin='round' stroke-miterlimit='10' data-cap='butt' d='M2.83 4.72l1.58 1.58 2.83-2.83'/%3E%3C/g%3E%3C/svg%3E");
                font-size: 15px;
                color: #008445;
                font-family: "Times New Roman";
            }
            
            input[type=checkbox]:checked + label:before {
            background-color: #0171CE;
            border-color: #0171CE;
            color: #fff;
            }

            input[type=text]{
                width:80%;
                height: 30px;
                border-radius: 4px
                margin: 8px 0;
                outline none;
                padding 8px;
                transition: .3s;
                font-size: 15px;
                font-family: helvetica;
            }

            #textarea{
                font-size: 15px;
                font-family: helvetica;
            }

            #SugTextarea{
                font-size: 15px;
                font-family: helvetica;
            }

            #inconveniente{
                width:75%;
                height: 30px;
                border-radius: 4px;
                margin: 8px 0;
                outline none;
                padding 8px;
                transition: .3s;
                font-size: 15px;
            }

            #maincontentEncuesta{
                align-items: right;
                padding: 50px 20px;
                /*margin: calc(15% + 10px);*/
                margin: calc(5% + 155px);
                margin-top: 10px;
                padding-top: 28px;
                margin-bottom: 20px;

            }

            #contentfull{
                background-image: url("./img/COMPETROWatermark50.png");
                background-size: 50%;

                background-repeat: no-repeat;
                background-position: center center;
                background-attachment: fixed; 
                
            }


            html{
                background-image: url("./img/COMPETROWatermark.png");
                background-size: 50%;

                background-repeat: no-repeat;
                background-position: center center;
                background-attachment: fixed; 
            }

           

                .custom-radio input{
                    display:none;
                    opacity: 0;
                }

                #radio-custom{
                    content: '';
                width: 16px;
                height: 16px;
                border-radius: 70%;
                background-color: white;
                border: 1px solid gray;
                display: inline-block;
                vertical-align: middle;
                margin-right: 8px;
                margin-bottom: 3px;
                
                
                }

                .custom-radio input + label:before {
                content: '';
                width: 16px;
                height: 16px;
                border-radius: 70%;
                background-color: white;
                border: 1px solid gray;
                display: inline-block;
                vertical-align: middle;
                margin-right: 8px;
                margin-bottom: 3px;
                }

                .custom-radio input:checked + label:before {
                background-color: white;
                box-sizing: border-box;
                border: 5px solid #0171CE;
                padding: 4px;
                }

            
        </style>

         
    <script>
       
        </script>

        <div id="contentfull" align="left" class="fondoCompetro">
       
			<div class="margin">
				<DIV id=pathway>
					<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
                    <a  href="menu_cte" >Servicio a Clientes</a>&nbsp;
                </div>
            </div>
            <div id="maincontenthead">
            <H1>  ENCUESTA DE CALIDAD </H1>
            </div>
            
            <!-- CONTENT -->
            <div id="maincontentEncuesta" align="left" > 
             
                                <H2>Puesto que desempeña: </H2>
                                <input  type="text" name="Puesto" id="Puesto" ><br>
                            
                                <br><form>
                                <H3>1. ¿Cómo calificarías el servicio de Logística?</H3>
                                <p><input type="checkbox" name="Pr1" id="Pr1_1" onclick="oneCheckPerName(this, 'Pr1')" value="Malo" >
                                <label for="Pr1_1">Malo</label></p>
                                <p><input type="checkbox" name="Pr1" id="Pr1_2" onclick="oneCheckPerName(this, 'Pr1')" value="Regular" >
                                <label for="Pr1_2">Regular</label></p>
                                <p><input type="checkbox" name="Pr1" id="Pr1_3" onclick="oneCheckPerName(this, 'Pr1')" value="Bueno" >
                                <label for="Pr1_3">Bueno</label></p>
                                <p><input type="checkbox" name="Pr1" id="Pr1_4" onclick="oneCheckPerName(this, 'Pr1')" value="Muy bueno" >
                                <label for="Pr1_4">Muy bueno</label></p>
                                <p><input type="checkbox" name="Pr1" id="Pr1_5" onclick="oneCheckPerName(this, 'Pr1')" value="Excelente" >
                                <label for="Pr1_5">Excelente</label></p>
                                
                                <br>
                                <H3>2. ¿Cómo calificarías el servicio administrativo?</H3>
                                <p><input type="checkbox" name="Pr2" id="Pr2_1" onclick="oneCheckPerName(this, 'Pr2')" value="Malo" >
                                <label for="Pr2_1">Malo</label>
                                <p><input type="checkbox" name="Pr2" id="Pr2_2" onclick="oneCheckPerName(this, 'Pr2')" value="Regular" >
                                <label for="Pr2_2">Regular</label>
                                <p><input type="checkbox" name="Pr2" id="Pr2_3" onclick="oneCheckPerName(this, 'Pr2')" value="Bueno" >
                                <label for="Pr2_3">Bueno</label>
                                <p><input type="checkbox" name="Pr2" id="Pr2_4" onclick="oneCheckPerName(this, 'Pr2')" value="Muy bueno" >
                                <label for="Pr2_4">Muy bueno</label>
                                <p><input type="checkbox" name="Pr2" id="Pr2_5" onclick="oneCheckPerName(this, 'Pr2')" value="Excelente" >
                                <label for="Pr2_5">Excelente</label>
                                    
                                    <br>
                                <H3>3. Del 1 al 10, ¿Qué tan bueno consideras el servicio al cliente?</H3>
                                
                                <div class="custom-radio">

                                        <input type="radio" name="rbtn3" id="Rbtn3_1" onclick="oneCheckPerName(this, 'rbtn3')" value="Uno" >
                                        <label for="Rbtn3_1">1</label>

                                        <input type="radio"  name="rbtn3" id="Rbtn3_2" onclick="oneCheckPerName(this, 'rbtn3')" value="Dos" >
                                        <label for="Rbtn3_2">2</label>

                                        <input type="radio"  name="rbtn3" id="Rbtn3_3" onclick="oneCheckPerName(this, 'rbtn3')" value="Tres" >
                                        <label for="Rbtn3_3">3</label>

                                        <input type="radio"  name="rbtn3" id="Rbtn3_4" onclick="oneCheckPerName(this, 'rbtn3')" value="Cuatro" >
                                        <label for="Rbtn3_4">4</label>

                                        <input type="radio"  name="rbtn3" id="Rbtn3_5" onclick="oneCheckPerName(this, 'rbtn3')" value="Cinco" >
                                        <label for="Rbtn3_5">5</label>

                                        <input type="radio"  name="rbtn3" id="Rbtn3_6" onclick="oneCheckPerName(this, 'rbtn3')" value="Seis" >
                                        <label for="Rbtn3_6">6</label>

                                        <input type="radio"  name="rbtn3" id="Rbtn3_7" onclick="oneCheckPerName(this, 'rbtn3')" value="Siete" >
                                        <label for="Rbtn3_7">7</label>

                                        <input type="radio"  name="rbtn3" id="Rbtn3_8" onclick="oneCheckPerName(this, 'rbtn3')" value="Ocho" >
                                        <label for="Rbtn3_8">8</label>

                                        <input type="radio"  name="rbtn3" id="Rbtn3_9" onclick="oneCheckPerName(this, 'rbtn3')" value="Nueve" >
                                        <label for="Rbtn3_9">9</label>

                                        <input type="radio"  name="rbtn3" id="Rbtn3_10" onclick="oneCheckPerName(this, 'rbtn3')" value="Diez" >
                                        <label for="Rbtn3_10">10</label>


                                </div> 

                                    <br>
                                <H3>4. Del 1 al 10, ¿Qué tan eficiente considera nuestro tiempo de respuesta?</H3>
                                <div class="custom-radio">

                                        <input type="radio" name="rbtn4" id="Rbtn4_1" onclick="oneCheckPerName(this, 'rbtn4')" value="Uno" >
                                        <label for="Rbtn4_1">1</label>

                                        <input type="radio"  name="rbtn4" id="Rbtn4_2" onclick="oneCheckPerName(this, 'rbtn4')" value="Dos" >
                                        <label for="Rbtn4_2">2</label>

                                        <input type="radio"  name="rbtn4" id="Rbtn4_3" onclick="oneCheckPerName(this, 'rbtn4')" value="Tres" >
                                        <label for="Rbtn4_3">3</label>

                                        <input type="radio"  name="rbtn4" id="Rbtn4_4" onclick="oneCheckPerName(this, 'rbtn4')" value="Cuatro" >
                                        <label for="Rbtn4_4">4</label>

                                        <input type="radio"  name="rbtn4" id="Rbtn4_5" onclick="oneCheckPerName(this, 'rbtn4')" value="Cinco" >
                                        <label for="Rbtn4_5">5</label>

                                        <input type="radio"  name="rbtn4" id="Rbtn4_6" onclick="oneCheckPerName(this, 'rbtn4')" value="Seis" >
                                        <label for="Rbtn4_6">6</label>

                                        <input type="radio"  name="rbtn4" id="Rbtn4_7" onclick="oneCheckPerName(this, 'rbtn4')" value="Siete" >
                                        <label for="Rbtn4_7">7</label>

                                        <input type="radio"  name="rbtn4" id="Rbtn4_8" onclick="oneCheckPerName(this, 'rbtn4')" value="Ocho" >
                                        <label for="Rbtn4_8">8</label>

                                        <input type="radio"  name="rbtn4" id="Rbtn4_9" onclick="oneCheckPerName(this, 'rbtn4')" value="Nueve" >
                                        <label for="Rbtn4_9">9</label>

                                        <input type="radio"  name="rbtn4" id="Rbtn4_10" onclick="oneCheckPerName(this, 'rbtn4')" value="Diez" >
                                        <label for="Rbtn4_10">10</label>
                                        </div> 
                            
                                <br>
                                <H3>5. ¿Qué tan satisfactorio consideras la solución de parte de Comercializadora?</H3>
                                <p><input type="checkbox" name="Pr5" id="Pr5_1" onclick="oneCheckPerName(this, 'Pr5')" value="Malo" >
                                <label for="Pr5_1">Malo</label>
                                <p><input type="checkbox" name="Pr5" id="Pr5_2" onclick="oneCheckPerName(this, 'Pr5')" value="Regular" >
                                <label for="Pr5_2">Regular</label>
                                <p><input type="checkbox" name="Pr5" id="Pr5_3" onclick="oneCheckPerName(this, 'Pr5')" value="Bueno" >
                                <label for="Pr5_3">Bueno</label>
                                <p><input type="checkbox" name="Pr5" id="Pr5_4" onclick="oneCheckPerName(this, 'Pr5')" value="Muy bueno" >
                                <label for="Pr5_4">Muy bueno</label>
                                <p><input type="checkbox" name="Pr5" id="Pr5_5" onclick="oneCheckPerName(this, 'Pr5')" value="Excelente" >
                                <label for="Pr5_5">Excelente</label>
                                
                                <br>
                                <H3>6. ¿Alguna vez no pudimos resolver algún incoveniente?¿Cuál?</H3>
                            
                                <p><input name="Pr6" type="checkbox" id="Pr6_si" onclick="oneCheckPerName(this, 'Pr6')" onchange="comprobar(); " value="Si" >
                                <label for="Pr6_si">Sí</label>
                                <input name="text" id="inconveniente" disabled/><br>
                                <!--<textarea type="text" name="inconveniente" id="inconveniente" rows="2" cols="75" disabled></textarea><br>-->
                                <p><input type="checkbox" name="Pr6" id="Pr6_no"  onclick="oneCheckPerName(this, 'Pr6')" onchange="comprobar()" value="No" checked >
                                <label for="Pr6_no">No</label>
                                
                                <br>
                                <H3>7. Del 1 al 10, ¿Qué tan practico considera el portal comercial ComPetro?</H3>

                                <div class="custom-radio">

                                        <input type="radio" name="rbtn7" id="Rbtn7_1" onclick="oneCheckPerName(this, 'rbtn7')" value="Uno" >
                                        <label for="Rbtn7_1">1</label>

                                        <input type="radio"  name="rbtn7" id="Rbtn7_2" onclick="oneCheckPerName(this, 'rbtn7')" value="Dos" >
                                        <label for="Rbtn7_2">2</label>

                                        <input type="radio"  name="rbtn7" id="Rbtn7_3" onclick="oneCheckPerName(this, 'rbtn7')" value="Tres">
                                        <label for="Rbtn7_3">3</label>

                                        <input type="radio"  name="rbtn7" id="Rbtn7_4" onclick="oneCheckPerName(this, 'rbtn7')" value="Cuatro" >
                                        <label for="Rbtn7_4">4</label>

                                        <input type="radio"  name="rbtn7" id="Rbtn7_5" onclick="oneCheckPerName(this, 'rbtn7')" value="Cinco" >
                                        <label for="Rbtn7_5">5</label>

                                        <input type="radio"  name="rbtn7" id="Rbtn7_6" onclick="oneCheckPerName(this, 'rbtn7')" value="Seis" >
                                        <label for="Rbtn7_6">6</label>

                                        <input type="radio"  name="rbtn7" id="Rbtn7_7" onclick="oneCheckPerName(this, 'rbtn7')" value="Siete" >
                                        <label for="Rbtn7_7">7</label>

                                        <input type="radio"  name="rbtn7" id="Rbtn7_8" onclick="oneCheckPerName(this, 'rbtn7')" value="Ocho" >
                                        <label for="Rbtn7_8">8</label>

                                        <input type="radio"  name="rbtn7" id="Rbtn7_9" onclick="oneCheckPerName(this, 'rbtn7')" value="Nueve" >
                                        <label for="Rbtn7_9">9</label>

                                        <input type="radio"  name="rbtn7" id="Rbtn7_10" onclick="oneCheckPerName(this, 'rbtn7')" value="Diez" >
                                        <label for="Rbtn7_10">10</label>
                                </div>
                            
                                <br>
                                <H3>8. ¿Qué mejoraría de la Comercializadora si pudiera?</H3>
                                <!--<input type="text" name="Feedback" id="textarea" ><br>-->
                                <textarea  type="text" name="Feedback" id="textarea" rows="5" cols="75"></textarea ><br>
                            
                                
                                <br>
                                <H3>9. ¿Cuál es la probabilidad de que nos recomiende con otras estaciones?</H3>
                            
                            
                                <p><input type="checkbox" name="Pr9" id="Pr9_1" onclick="oneCheckPerName(this, 'Pr9')" value="Recomiendo" >
                                <label for="Pr9_1">Ya los recomiendo</label>
                                <p><input type="checkbox" name="Pr9" id="Pr9_2" onclick="oneCheckPerName(this, 'Pr9')" value="MuyProbable" >
                                <label for="Pr9_2">Es muy probable</label>
                                <p><input type="checkbox" name="Pr9" id="Pr9_3" onclick="oneCheckPerName(this, 'Pr9')" value="Probable" >
                                <label for="Pr9_3">Es probable</label>
                                <p><input type="checkbox" name="Pr9" id="Pr9_4" onclick="oneCheckPerName(this, 'Pr9')" value="PocoProbable" > 
                                <label for="Pr9_4">Es poco probable</label><p>
                                

                                <br>
                                <H3>10. Sugerencia para mejorar nuestros servicios como Comercializadora y/o en el Portal Comercial ComPetro</H3>
                                <textarea type="text" name="Sugerencia" id="SugTextarea" rows="5" cols="75" ></textarea>
                                <!--<input type="text" name="Sugerencia" id="Sug"><br>-->
                                
                                <p>
                                <button    style='width:70px; height:35px' onclick="Guardar()"> Guardar </button>
                                

                                
                              
                  
            </div>
        </div>
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
        var value = "";
        for(let iterator of checks){
            if(iterator.checked == true){
                value =  iterator.value;
            }
        }
        return value;
    }

     
    function Guardar(){
   
   var puesto = document.getElementById("Puesto").value;
   

   var response1 = getCheckBoxResponse("Pr1"); 
   var response2 = getCheckBoxResponse("Pr2");
   var response3 = getCheckBoxResponse("rbtn3");
   var response4 = getCheckBoxResponse("rbtn4");
   var response5 = getCheckBoxResponse("Pr5");
   var response6 = getCheckBoxResponse("Pr6");
      
   if(response6 == "Si"){ 
       var response6 = document.getElementById("inconveniente").value;
   }else{
       var response6 = "No";
   } 
   var response7 = getCheckBoxResponse("rbtn7");
 
   var response8 = document.getElementById("textarea").value;
   var response9 = getCheckBoxResponse("Pr9");
 
   var response10 = document.getElementById("SugTextarea").value; 
   
   var valid = validate(puesto, response1, response2, response3, response4, response5, response6, response7, response8, response9, response10);
   
                if(valid){
                       let tosend = new FormData();
                       tosend.append("empresa", "<?php echo $_SESSION["idempresa"] ?>");
                       tosend.append("puesto", puesto);
                       tosend.append("r1", response1); 
                       tosend.append("r2", response2);
                       tosend.append("r3", response3);
                       tosend.append("r4", response4);
                       tosend.append("r5", response5);
                       tosend.append("r6", response6);
                       tosend.append("r7", response7);
                       tosend.append("r8", response8);
                       tosend.append("r9", response9);
                       tosend.append("r10", response10);

                           fetch("./encuesta_cte_script.php",{method:"POST",body:tosend}
                           ).then(function(response) {
                               console.log("Ok");
                               alert("Datos Recibidos, Gracias");
                               
                           }).catch(function(error) {
                               console.log("ERROR");
                                   alert("Error al recibir los datos");
                           });
               }
   }



    function comprobar(){
        let textbox = document.getElementById("inconveniente").disabled;

        if(textbox){
            document.getElementById("inconveniente").disabled = false;
        } else {
            document.getElementById("inconveniente").disabled = true;
        }
    }



    function validate (puesto, response1, response2, response3, response4, response5, response6, response7, response8, response9, response10){

        if(puesto == ""){
            alert("Ingrese el puesto");
            return false; 
        }else if(response1 == ""){
            alert("Seleccione una opción correcta pregunta 1");
            return false;
        }else if(response2 == ""){
            alert("Seleccione una opción correcta pregunta 2");
            return false;
        }else if(response3 == ""){
            alert("Seleccione una opción correcta pregunta 3");
            return false;
        }else if(response4 == ""){
            alert("Seleccione una opción correcta pregunta 4");
            return false;
        }else if(response5 == ""){
            alert("Seleccione una opción correcta pregunta 5");
            return false;
        }else if(response6 == ""){
            alert("Seleccione una opción correcta pregunta 6");
            return false;
        }else if(response7 == ""){
            alert("Seleccione una opción correcta pregunta 7");
            return false;
        }else if(response8 == ""){
            alert("Ingrese una respuesta pregunta 8");
            return false;
        }else if(response9 == ""){
            alert("Seleccione una opcion correcta pregunta 9");
            return false;
        }else if(response10 == ""){
            alert("Ingrese una respuesta pregunta 10");
            return false;
        }else{
            return true;
        }
 

    }
 
    
  
    
    </script>
</body>

</html>

<script language="JavaScript" src="scripts/datetime.js"></script>