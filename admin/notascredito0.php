<?php 
    $inicial = '';
    require 'connector.php';
    global $connect; 
    session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Cache-Control" content="no-cache" />
        <link href="styles/styles.css" rel="stylesheet" type="text/css" />
        <link href="styles/tables.css" rel="stylesheet" type="text/css" />
        <link href="styles/content.css" rel="stylesheet" type="text/css" />
        <link href="styles/menu.css" rel="stylesheet" type="text/css" />
        <link href="styles/sidebar.css" rel="stylesheet" type="text/css" />
        <link href="styles/content2.css" rel="stylesheet" type="text/css" />
        <link rel="icon" href="iconion.ico">
        <link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="styles/calendario.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="icon" href="img/favicon.ico">
        <script src="dw_sizerdx.js" type="text/javascript"></script>
        <script src="scripts/textsize.js" type="text/javascript"></script>
        <script language="JavaScript" src="scripts/calendario.js"></script> 
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="scripts/uijquery.js"></script>
        <title>ComPetro</title>
      
        <?php 
            if(isset($_POST['fini'])){
                echo '
                    <script> 
                    $( function() {
                    $("#dateDefaultj").datepicker();
                    $("#dateDefaultfinalj").datepicker();
                    } );
                    </script>
                ';
            } else {
                echo '
                    <script> 
                    $( function() {
                    $( "#dateDefault").datepicker();
                    $("#dateDefaultfinal").datepicker(); 
                    } );
                    </script>
                ';
            }
        ?>
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
                    <li class="bar"><a href="menu_cteadmin" class="baritem first">Inicio</a></li>
                    <!-- mete codigo de comunicados, pizarrion de avisos y seleccione el cliente--> 
                    <li class="barlast"><span>&nbsp;</span></li>
                </ul>
                </div>

                <div id="cliente">
                <p class="textoEjecutivo" align="center" id="un">     
                    <script type="text/JavaScript">
                    $("#un").load("controladorad/tpcp.php");
                    </script>                
                </p> 
                </div>

                <div id="fecha"> 
                <p class="fechapc" align="right">
                </p>
                </div>

                <div id="mainmenu">
                <ul id="nav">
                    <li class="bar"><a href="menu_cteadmin" class="baritem">Servicio a Clientes</a></li>        
                    <li class="bar"><a href="clientes" class="baritem">Clientes</a></li> 
                    <li class="bar"><a href="pedidoscnvotradmin" class="baritem">Pedidos</a></li> 
                    <li class="bar"><a href="scripts/logout.php" class="baritem">Salir</a></li>					
                    <li class="barlast"><span>&nbsp;</span></li>
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

            <script>/*
                function cargaforma(){ 
                    var counter = 3;
                    var interval = setInterval(function() {
                        counter--;
                        if (counter == 0) {
                            redirect();
                            clearInterval(interval);
                        }
                    }, 500);
                };

                function redirect() {
                    document.formatimbrado.submit();
                } */
            </script>

            <!-- FIN DEL ENCABEZADO --> 
            <!--Ruteo de la página-->
        <div id="contentfull" align="left">
            <div class="margin">
                <DIV id=pathway>
                  <SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
                  <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;<a  href="pedidosrprogramadosadmin" >Carga Facturas</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;<a  href="#" >Notas de crédito</a>
                </div>   
            </div>

            <div id="maincontent" align="center">
                <form name="forma1" method="post" action="controladorad/postprecios.php">
                    <p><br>
                    </p>

                    <p><br>                                
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
                    </p>
                </form>

                <form method="post" name="formatimbrado" id="formatimbrado" action="sw/timbrarNotasCredito">
                <?php
                    if(isset($_POST['xml'])){
                        echo '<script>cargaforma()</script>';
					    $NoPedido = $_POST['folio'];
                        $pedidoQuery = "SELECT idempresa, rzonsocial, rfc, domicilio FROM empresa WHERE IdEmpresa = ".$_POST['IdEmpresa'].""; 
                        
                        $resultdx = $connect->query($pedidoQuery);

                        if($resultdx->num_rows > 0) { 
                            while($rowdx = $resultdx->fetch_assoc()) {   
                                $idempresa = $rowdx['idempresa'];
                                $rzonsocial = $rowdx['rzonsocial'];
                                $rfc = $rowdx['rfc'];
                                $domicilio = $rowdx['domicilio'];
                                
                            }							 
 
                          
                        } 
				  
                        $Query = "Select Nombre from usuarios where NoUsuario = '".$_SESSION['nousuario']."'";
                        $resultf = $connect->query($Query);

                        if ($resultf->num_rows > 0) { 
                            while($rowf = $resultf->fetch_assoc()) {   
                                $elaboro = $rowf['Nombre']; 
                            }
                        }
                    
                        $Queryf = "Select folionotac from timbrado order by folionotac desc limit 1";
                        $resultfx = $connect->query($Queryf);

                        if ($resultfx->num_rows > 0) { 
                            while($rowfx = $resultfx->fetch_assoc()) {   
                                $fol = $rowfx['folionotac']; 
                            }
                            $folio = $fol + 1;
                        }

                       
                        //$resultcliente = $connect->mysqli_query($QueryCliente);

                    
                        $timporte = $_POST['TImporte'];  
                        $base = $_POST['Importe']; 
						 
                        $baseImpuestos = $_POST['TBase']; 
                        $claveprodserv = $_POST['ClaveProducto']; 
                        $noidentificacion = $_POST['NoIdentificacion']; 
                        $noidentificacion[1] = "FLE01";
                        $cantidad = $_POST['Cantidad']; 
                        $claveunidad = $_POST['ClaveUnidad']; 
                        $unidad = $_POST['Unidad']; 
                        $descripcion = $_POST['Descripcion']; 
                        $valorunitario = $_POST['ValorUnitario']; 
                        $desc = round($_POST['Descuento'][0] - ($_POST['Descuento'][0] * $Comision), 2); 
                        $descuento[] = $desc;
                        $descuento[] = "0.00";
                        $importe = $_POST['Importe'];  
                        
                        foreach($base as $value) { 
                            echo '<input type="hidden" name="base[]" value="'.$value.'">';
                        }
                        foreach($timporte as $value) {
                            echo '<input type="hidden" name="timporte[]" value="'.$value.'">';
                        }
                        foreach($claveprodserv as $value) {
                            echo '<input type="hidden" name="claveprodserv[]" value="'.$value.'">';
                        }
                        foreach($noidentificacion as $value) { 
                            echo '<input type="hidden" name="noidentificacion[]" value="'.$value.'">';
                        }
                        foreach($cantidad as $value) {
                            echo '<input type="hidden" name="cantidad[]" value="'.$value.'">';
                        }
                        foreach($claveunidad as $value) {
                            echo '<input type="hidden" name="claveunidad[]" value="'.$value.'">';
                        }
                        foreach($unidad as $value) {
                            echo '<input type="hidden" name="unidad[]" value="'.$value.'">';
                        }
                        foreach($descripcion as $value) {
                            echo '<input type="hidden" name="descripcion[]" value="'.$value.'">';
                        }
                        foreach($valorunitario as $value) {
                            echo '<input type="hidden" name="valorunitario[]" value="'.$value.'">';
                        }
                        foreach($importe as $value) {
                            echo '<input type="hidden" name="importe[]" value="'.$value.'">';
                        }

                        $ii = 0;
                        foreach($baseImpuestos as $value) {
                            if($ii == 0 ){$a = $value + $difdesc; }else{$a = $value;}
                                echo '<input type="hidden" name="baseimpuestos[]" value="'.$a.'">';
                            $ii ++;
                        }
    
                        foreach($descuento as $value) {
                            echo '<input type="hidden" name="descuento[]" value="'.$value.'">';
                        }
                        $descuento = $_POST['Descuento'][0];
                
                        echo '
                            <input type="hidden" name="retenidos" value="'.$_POST['ImpuestosRetenidos'].'">
                            <input type="hidden" name="foliopemex" value="'.$_POST['foliopemex'].'">
                            <input type="hidden" name="nvofolio" value="'.$folio.'">
                            <input type="hidden" name="nopedido" value="'.$NoPedido.'">
                            <input type="hidden" name="idempresa" value="'.$idempresa.'">
                            <input type="hidden" name="rfcreceptor" value="'.$rfc.'">
                            <input type="hidden" name="rzonsocialreceptor" value="'.$rzonsocial.'">
                            <input type="hidden" name="domicilio" value="'.$domicilio.'">
                            <input type="hidden" name="direccion" value="'.$direccion.'">
                            <input type="hidden" name="descuentofinal" value="'.round($descuento - ($descuento * $Comision), 2).'">                                                                                                                       
                            <input type="hidden" name="estacion" value="'.$Estacion.'">
                            <input type="hidden" name="letraprod" value="'.$LetraProd.'">
                            <input type="hidden" name="fecha" value="'.$_POST['Fecha'].'">
                            <input type="hidden" name="nombre" value="NOTA CRÉDITO">
					<input type="submit" name="submitfac" value="Enviar">
                            
                            <table width="774" height="120" border="2">
                                <caption>
                                <label><br/>
                                COMERCIALIZADORA PETROMAR SA DE CV</label></caption>
                                <tr>
                                    <td width="299" rowspan="4"><img src="img/f.jpeg" width="295" height="87"  alt="Competro" /></td>
                                    <td height="30" colspan="4"><label><center>RFC: CPE190207226</center></label></td>
                                </tr>
                                <tr>
                                    <td width="123" height="26"><label>Tipo de comprobante:</label></td>
                                    <td width="330"><label for="tcomprobante">E - Egreso</label></td>
                                </tr>
                                <tr>
                                    <td height="26"><label>Lugar de Expedición:</label></td>
                                    <td colspan="3"><label for="lexp">82110</label></td>
                                </tr>
                                <tr>
                                    <td height="26"><label>Régimen Fiscal:</label></td>
                                    <td colspan="3" input type="text" name="lentrega"><label for="rfiscal">601 - General de Ley Personas Morales</label></td>
                                </tr>            
                            </table>

                            <table width="773" height="93" border="2">
                                <tr>
                                    <td width="105"><label>Forma de pago:</label></td>
                                    <td width="254"><label for="fpago">99 - Por definir</label></td>
                                    <td width="56"><label>Folio:</label></td>
                                    <td width="330"><label for="folio">'.$folio.'</label></td>
                                </tr>

                                <tr>
                                    <td><label>Método de pago:</label></td>
                                    <td width="254"><label for="mpago">PUE - Pago en una sola exhibición</label></td>
                                    <td width="56"><label>Fecha:</label></td>
                                    <td width="330"><label for="fecha">'.$_POST['Fecha'].'</label></td>
                                </tr>

                                <tr>
                                    <td><label>Moneda:</label></td>
                                    <td width="254"><label for="moneda">MXN - Peso Mexicano</label></td>
                                    <td width="56">&nbsp;</td>
                                    <td width="330">&nbsp;</td>
                                </tr>
                                <td  bgcolor="white" colspan="4" >NÚMERO DE PERMISO DE COMERCIALIZACIÓN OTORGADO POR LA COMISIÓN REGULADORA DE ENERGÍA H/22957/COM/2019</td>          
                            </table>

                            <table width="773" height="93" border="2">
                                <caption><label>Datos del cliente</label></caption>
                                <tr>
                                    <td width="105"><label>Cliente:</label></td>
                                    <td colspan="3"><label for="cliente">'.$rzonsocial.'</label></td>
                                </tr>
                                <tr>
                                    <td><label>R.F.C:</label></td>
                                    <td width="254"><label for="rfc">'.$rfc.'</label></td>
                                    <td width="56"><label>Uso CFDI:</label></td>
                                    <td width="330"><label for="cfdi">G01 - Adquisición de mercancias</label></td>
                                </tr>
                                <tr>
                                    <td><label>Domicilio:</label></td>
                                    <td colspan="3"><label for="idomicilio">'.$domicilio.'</label></td>
                                </tr>
                                <!--<tr>            QUITAR DOMICILIO DE ENTREGA --------------------------------------------
                                    <td><label>Lugar de entrega:</label></td>
                                    <td colspan="3"><label for="lentrega">'.$direccion.'</label></td>
                                </tr>  -->          
                            </table>
							<br>
                            <table width="775" border="1">
                                <tr>
                                    <td width="60">Cantidad</td>
                                    <td width="48">Unidad</td>
                                    <td width="117">Clave Unidad SAT</td>
                                    <td width="148">Clave Producto/Servicio</td>
                                    <td width="89">Concepto / Descripcion</td>
                                    <td width="80">Valor Unitario</td>
                                    <td width="51">Descuentos</td>
                                    <td width="69">Impuestos</td>
                                    <td width="55">Importe</td>
                                </tr>
                        ';

                        $num = count($_POST['Cantidad']);
                        $impuestostrasladados = 0;

                        for($i = 0; $i < $num; $i ++){
                            if(isset($_POST['Descuento'][$i])){
                                $desc = $_POST['Descuento'][$i];
                            } else {
                                $desc = 0;
                            }
                            $f = $_POST['Descuento'][0] - ($_POST['Descuento'][0] * $Comision);
                        
                                $IVA = $_POST['TImporte'][$i];
                                echo '
                                    <tr>
                                        <td><label for="cantidad1">'.number_format($_POST['Cantidad'][$i], 2).'</label></td>
                                        <td><label for="unidad11"></label></td>
                                        <td><label for="cusat1">ACT - Actividad</label></td>
                                        <td><label for="cps1">'.$_POST['ClaveProducto'][$i].' - Servicios de facturación</label></td>
                                        <td><label for="condes1">'.$_POST['Concepto'][$i].'</label></td>
                                        <td><label for="vunitario1">'.$_POST['ValorUnitario'][$i].'</label></td> 
                                        <td><label for="descuentos1">'.number_format($desc - ($desc * $Comision), 2).'</label></td>
                                        <td><label for="impuestos1">'.$_POST['TImporte'][$i].'</label></td>
                                        <td><label for="importe1">'.number_format($_POST['Importe'][$i], 2).'</label></td>
                                    </tr>
                                ';

                            $impuestostrasladados = $impuestostrasladados + $IVA;
                        }
                    
                        $subtotal = 0;
                        foreach($_POST['Importe'] as $value) {
                            $subtotal += $value;	 
                        }   
                    
                        //SUMA DEL TOTAL
                        $d = $_POST['Descuento'][0] - ($_POST['Descuento'][0] * $Comision);
                        $total = (($subtotal - $d) + $impuestostrasladados) - $_POST['ImpuestosRetenidos'];

                        echo ' 
                            </table>
                            <br>

                            <table width="774" border="1">
                                <tr>
                                    <td width="403">Importe con letra:</td>
                                    <td width="179">&nbsp;</td>
                                    <td width="170">&nbsp;</td>
                                </tr>
								 <tr>
                                    <td width="403">UUID Dcto. Relacionado: '.$_POST["uuid"].' <input type="text" name="uuid" hidden value="'.$_POST["uuid"].'" style="width:300px;">	</td>
                                    <td width="179">&nbsp;</td>
                                    <td width="170">&nbsp;</td>
                                </tr>
                                <tr>
                                <td width="403">Periodo: <input type="text" name="periodo"  style="width:150px;">	</td>
                                <td width="179">&nbsp;</td>
                                <td width="170">&nbsp;</td>
                            </tr>
                                <tr>
                                    <td rowspan="6"><label for="icletra">&nbsp;</label></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Subtotal</td>
                                    <td><label for="subtotalt">'.number_format($subtotal, 2).'</label></td>
                                </tr>
                                <!--            QUITAR DESCUENTOS--------------------------------------------------
                                <tr>
                                    <td>Descuentos</td>
                                    <td><label for="descuentost">'.number_format($_POST['Descuento'][0] - ($_POST['Descuento'][0] * $Comision), 2).'</label></td>
                                </tr>
                                -->
                                <tr>
                                    <td>Impuestos Traslados</td>
                                    <td><label for="itt">'.number_format($IVA, 2).'</label></td>
                                </tr>
                                <!--            QUITAR RETENCION FLETE---------------------------------------------
                                <tr>
                                    <td>I.V.A. Retención Flete</td>
                                    <td><label for="ivat">'.$_POST['ImpuestosRetenidos'].'</label></td>
                                </tr>
                                -->
                                <tr>
                                    <td>Total</td>
                                    <td><label for="totalt">'.number_format($total, 2).'</label></td>
                                </tr>
                            </table>
                            <br>

                            <table width="770" border="1">
                                <tr>
                                    <td width="109">CFDI Relacionado:</td>
                                    <td width="645">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Tipo Relación: -</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>CFDI Relacionado:</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                            <br>
                            <br>
                        
                            <table width="614" border="1">
                                <tr>
                                    <td width="120" rowspan="4"><p>QR</p></td>
                                    <td width="110">Serie del Certificado del emisor</td>
                                    <td width="362"><label for="sce">00001000000503244740</label></td>
                                </tr>
                                <tr>
                                    <td>Folio fiscal</td>
                                    <td><label for="foliofiscal"></label></td>
                                </tr>
                                <tr>
                                    <td>No. de Serie del Certificado de SAT</td>
                                    <td><label for="nscsat">00001000000505142236</label></td>
                                </tr>
                                <tr>
                                    <td>Fecha y hora de certificación</td>
                                    <td><label for="fhcer"></label></td>
                                </tr>
                                <tr>
                                    <td width="120" bgcolor="#FFFFFF">&nbsp;</td>
                                    <td colspan="2" class="center">Este documento es una representación impresa de un CFDI</td>
                                </tr>
                            </table>
                            <br>

                            <!--
                            <table width="773" height="356" border="1" style="margin-bottom: 40px;">
                                <tr>
                                    <td height="22" colspan="3"><input type="text" name="sellos">  /  <input type="text" name="vehiculo">  /  <input type="text" name="placas"></td>
                                </tr>
                                <tr>
                                    <td height="22" colspan="3"><label>Sellos/Vehiculos/Placas</label></label></td>
                                </tr>
                                <tr>
                                    <td height="22" colspan="3"><input type="text" name="cert">  /  <input type="text" name="compania">  /  <input type="text" name="operador"></td></td>
                                </tr>
                                <tr>
                                    <td height="22" colspan="3"><label>CERT/Compañia de transporte/Operador</label></td>
                                </tr>
                                <tr>
                                    <td height="22" colspan="3"><input type="text" name="datosoperativos" style="width:200px;">  </td>
                                </tr>
                                <tr>
                                    <td height="22" colspan="3"><label>Datos Operativos/Boletas</label></td>
                                </tr>
                                <tr>
                                    <td width="230" height="22"><label>Cantidad natural: </label><input style = "float: right;" name="cantidadn" > </td>
                                    <td width="240"><label>Cantidad a 20 grados: </label><input style = "float: right;" name="cantidada"> </td>
                                    <td width="auto"><label>Temperatura C: </label><input style = "float: right;" name="temperatura">  </td>
                                </tr>
                                <tr>
                                    <td height="22"><label>No. orden: </label><input style = "float: right;" name="noorden"></input></td>
                                    <td><label>Fecha orden: </label><input style = "float: right;" name="fechaorden"></input></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td height="158" colspan="3">
                                    <label style = "float: left; padding-bottom: 5px;">Antecedentes/observaciones:</label>
                                    <br>
                                    <textarea name="observaciones" rows="8" cols="5"  style = " height:85%; width: 98%;   resize: none;">Antecedentes / observaciones: ELABORO: '.$elaboro.'</textarea></td>
                                </tr>
                            </table>
                            -->

                            <br>
                            <table>
                                <tr>
                                    <td></td>
                                </tr>
                            </table>
                            <br>
                            <br>
                            <br>    
						
                        ';
                    }

			        
                ?>
                </form>
            </div> 

            <?php
                if(isset($_POST['facturar'])) {
                    echo '<form method="POST" action="uploadXmlNotasCredito" enctype="multipart/form-data">
					<input type="hidden" name="IdEmpresa" value="'.$_POST['idempresa'].'">
					<input type="hidden" name="uuid" value="'.$_POST["uuid"].'">
                    <table align = "center">
                        <tr>
                        <td class="color_blanco"><b>Seleccione cliente:</b></td>
                        <td class="color_blanco">';
                 if(isset($_POST['idempresa'])){

    $result = $connect->query("select IdEmpresa, usuario from empresa where idempresa = '".$_POST['idempresa']."'");

    echo "<select name='idempresa' id='IdEmpresa'>";

    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['IdEmpresa'];
                  $name = $row['usuario']; 
                  echo '<option value="'.$id.'" name="idempresa" id="select">'.$name.'</option>';

}
    echo "</select>"; 
	} 

echo '
        </td>
                        <td class="color_blanco">&nbsp; </td></td>
                    </tr>	
                    </table>
                    <br>
                        <div align="center">
                         
                        <div id="dropContainer" href="_SELF" style=" width:80%;  border-radius: 10px;border:1px solid black;height:100px; background-image:url(';echo "'img/gray.jpg'"; echo '); background:"align="center"; > 
                        <img src="img/lod.png" style="height:50px; width:80px; padding-top:20px;" > <br>
                        Arrastre y suelte aquí
                        </div> 
                        <input type="file" id="fileInput" name="files[]" multiple="multiple"/> 
                        <table align="center"><tr><td class="color_blanco">
                        <input type="submit" value="Cargar">
                        </td></tr></table></div>
                        </form>
                    ';
                }
            ?>
        
            <script> 
                dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
                    evt.preventDefault();
                };

                dropContainer.ondrop = function(evt) {
                    // pretty simple -- but not for IE :(
                    fileInput.files = evt.dataTransfer.files;
                    // If you want to use some of the dropped files
                    const dT = new DataTransfer();
                    //for(i = 0; i<= f)
                    dT.items.add(evt.dataTransfer(files));
                    //dT.items.add(evt.dataTransfer.files[1]);
                    fileInput.files = dT.files;
                    evt.preventDefault();
                };
            </script>        
            <br>
            <br>

            <div id="footer">
                <div class="footerLeft left" style="font-size: 10px;">
                    Av. Camarón Sábalo No. 102
                    Col. Zona Dorada, Mazatlán, Sinaloa C.P. 82110
                </div>

                <div class="footerRight right"> 
                    <a href="https://portal.competro.mx/uploads/AVISO%20DE%20PRIVACIDAD%20COMPETRO.pdf" target="_blank" style="font-size: 10px;">Aviso de Privacidad<a>
                </div>
                
                <div class="spacer clear">
                    &nbsp;
                </div>
            </div>
        </div>

    </body>
</html>

<script>
    $(document).on({
        dragover: function() {
            return false;
        },
        
        drop: function() {
            return false;
        }
    });
</script>

