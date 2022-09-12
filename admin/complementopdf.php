<?php 
    $inicial = '';
    require 'connector.php';
    require 'crXml.php';
    global $connect; 
    require 'dompdf/autoload.inc.php';

    session_start();	

    use Dompdf\Options;
    use Dompdf\Dompdf;

    if(isset($_POST['text'])){
	    $options = new Options();
        $dompdf = new Dompdf($options); 
        $dompdf = new Dompdf(); 
        $dompdf->loadHtml($_POST['text']); 
        $dompdf->setPaper('A4', 'portrait'); 
        $dompdf->render(); 
        $dompdf->stream(); 
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="styles/styles.css" rel="stylesheet" type="text/css" />
        <link href="styles/content.css" rel="stylesheet" type="text/css" />
        <link href="styles/menu.css" rel="stylesheet" type="text/css" />
        <link href="styles/sidebar.css" rel="stylesheet" type="text/css" />
        <link href="styles/content2.css" rel="stylesheet" type="text/css" />
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
        <script src="js/Blob.js"></script>
        <script src="js/xlsx.core.js"></script>
        <script src="js/FileSaver.js"></script> 
        <script src="js/tableexport.js"></script> 
            <!-- For DocRaptor -->
        <script src="scripts/docraptor.1.0.0.js"></script>
            <!-- For pdfmake -->
        <script src="scripts/pdfmake.0.1.68.min.js"></script>
        <script src="scripts/pdfmake.vfs_fonts.0.1.68.min.js"></script>
            <!-- For jsPDF -->
        <script src="scripts/html2canvas.1.0.0-rc.7.js"></script>
        <script src="scripts/dompurify.2.2.0.min.js"></script>
        <script src="scripts/jspdf.2.1.1.umd.min.js"></script>
            <!-- PDF export methods I wrote using the libraries above -->
        <script src="scripts/pdfExportMethods.js"></script>

        <link rel="stylesheet" href="styles/calendario.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        
        <style>
            body,
            html {
                margin: 0;
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            }

            html {
                padding: 0;
                font-size: 16px;
            }

            body {
                padding: 2rem;
                font-size: 100%;
            }

            h1 {
                margin-top: 0;
            }

            .buttonContainer {
                margin: 2rem 0;
            }

            .btn {
                padding: 0.5rem 0.75rem;
                font-size: 1rem;
                font-family: inherit;
                font-weight: normal;
                border: none;
                border-radius: 0.5rem;
                background: #0f4871;
                color: #fff;
                cursor: pointer;
                position: relative;
                max-width: 18rem;
                word-break: break-word;
                word-wrap: break-word;
                transition: all 0.5s;
                margin-right: 1rem;
            }

            .btn:focus,
            .btn:hover {
                outline: none;
            }

            .btn:focus::before,
            .btn:hover::before {
                box-shadow: #0f4871 0 0 0 0.0625rem;
                content: '';
                height: calc(100% + 0.25rem);
                left: 0;
                margin-left: -0.25rem;
                margin-top: -0.25rem;
                pointer-events: none;
                position: absolute;
                top: 0;
                width: calc(100% + 0.25rem);
                border-radius: inherit;
                padding: 0.125rem;
            }


            @media print {
                header,
                .buttonContainer {
                display: none;
                }
            }

            @page {
                margin-top: 80px;
                margin-bottom: 80px;
                @top {
                content: "MLB World Series Winners"
                }
                @bottom {
                /* footer with counter functions to insert page counters */
                content: "Page " counter(page) " of " counter(pages)
                }
            }
        </style>

        <script src="scripts/uijquery.js"></script>

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

        <link rel="icon" href="img/favicon.ico"> 
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
                    <p class="fechapc" align="right"></p>
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

                <!-- FIN DEL ENCABEZADO --> 
                <!--Ruteo de la página-->
            <div id="contentfull" align="left">
                <div class="margin">
                    <DIV id=pathway>
                        <SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
                        <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;<a  href="pedidosrprogramadosadmin" >Pagos y aplicaciones</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;<a  href="#" >Complemento de pago</a>
                    </div>   
                </div>

                <div id="maincontent" align="center">
                    <form name="forma1" method="post" action="controladorad/postprecios.php">       <!--AWAS CON ESTA MADRE TAMBIEN-->
                        <p>
                            <br>
                        </p>

                        <p>
                            <br>                                
                            <script>
                                function setInputDate(_id)
                                {
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

                                function setInputDatee(_id)
                                {
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
                </div> 	
          		
                   
                <?php
                    $strtimbrado = '../uploads/'.$_POST['json'];
                    
                    if (file_exists($strtimbrado)) 
                    {
                        //CHEKAR QUE HACE ESTA MADRE
                        //$querytimbrado = "INSERT INTO timbrado (folio) VALUES ('".$_POST['nvofolio']."')";
                        //$r= mysqli_query($connect, $querytimbrado);
                        $crxml=new crXml();
                        
                        $data = file_get_contents($strtimbrado);  
                        $crxml->loadXML($data); 
                        $a = 'cfdi:Comprobante';
                        $b = 'cfdi:Receptor';
                        $c = 'cfdi:Conceptos';
                        $d = 'cfdi:Concepto';
                        //$e = 'cfdi:Impuestos';
                        //$f = 'cfdi:Traslados';
                        //$g = 'cfdi:Traslado'; 
                        $h = 'cfdi:Complemento';
                      //  $h1 = 'pago10:Pagos';
                        $h1 = 'pago20:Pagos';
                        //$h2 = 'pago10:Pago';
                        $h2 = 'pago20:Pago';
                        //$h3 = 'pago10:DoctoRelacionado';
                        $h3 = 'pago20:DoctoRelacionado';
                        $i = 'tfd:TimbreFiscalDigital';
                        $Receptor = $crxml->$a->$b; 
						 
                        $Concepto = $crxml->$a->$c->$d;  
                        
                        $Pago = $crxml->$a->$h->$h1->$h2;   
                        $DoctoAnterior = $crxml->$a->$h->$h1->$h2->$h3;  
						
                        $TimbreFiscalDigital = $crxml->$a->$h->$i;	 
                        $Cliente[] = $Receptor['Nombre'];  
                        $Rfc[] = $Receptor['Rfc'];  
                        $TipoDeComprobante = $crxml->$a['TipoDeComprobante'];
                        $LugarExpedicion = $crxml->$a['LugarExpedicion'];
                        $Folio = $crxml->$a['Folio'];
                        $FormaPago = $crxml->$a['FormaPago'];
                        $MetodoPago = $crxml->$a['MetodoPago'];
                        $Moneda = $crxml->$a['Moneda'];
                        $FP = $crxml->$a['Fecha'];
                        $FechaComplemento = substr($FP, 0, 4).'/'.substr($FP, 5, 2).'/'.substr($FP, 8, 2).' '.substr($FP, 11);
                        $Cliente = $Receptor['Nombre'];
                        $RFCCliente = $Receptor['Rfc'];
                        $UsocfdiCliente = $Receptor['UsoCFDI'];
                        $RegimenFiscalReceptor = $Receptor['RegimenFiscalReceptor'];
                        $Domicilio = $_POST['domicilio'];
                        $DireccionEntrega = $_POST['direccion'];
	                     
						 
						 
						 
                        $UUID = $TimbreFiscalDigital['UUID'];
                        $SerieCertSat = $TimbreFiscalDigital['NoCertificadoSAT'];
                        $FechaTimbrado = $TimbreFiscalDigital['FechaTimbrado'];
						 
			 
                            $ClaveProducto[] = $Concepto['ClaveProdServ']; 
                            $Importee[] = $Concepto['Importe'];  
                            $Conceptos[] = $Concepto['Descripcion'];  
                            $ValorUnitario[] = $Concepto['ValorUnitario'];  
                            $Cantidad[] = $Concepto['Cantidad'];  
                            $NoIdentificacion[] = $Concepto['NoIdentificacion'];  
                            $ClaveUnidad[] = $Concepto['ClaveUnidad']; 
                            $Unidad[] = $Concepto['Unidad'];  
                            $Descripcion[] = $Concepto['Descripcion'];  
							/////////////////////////////////////////////////////////////////
							$SaldoAnterior = $DoctoAnterior['ImpSaldoAnt']; //echo $ImportePagado; 
							$ImportePagado = $DoctoAnterior['ImpPagado']; //echo $ImportePagado; 
							$SaldoInsoluto = $DoctoAnterior['ImpSaldoInsoluto']; //echo $SaldoInsoluto; 
							$FolioDctoAnterior = $DoctoAnterior['Folio'];
							$UuidDctoAnterior = $DoctoAnterior['IdDocumento'];
							$NoParcialidad = $DoctoAnterior['NumParcialidad'];
							/////////////////////////////////////////////////////////////////
							$FechaPago = $Pago['FechaPago']; 
							/////////////////////////////////////////////////////////////////
							 

                            /////////////////////////////////////////////////////////////////
                                $QueryDatosDcto = "SELECT importe, impuestostraslados, total FROM facturas WHERE UUID = '".$UuidDctoAnterior."'";
                                $resultdx = $connect->query($QueryDatosDcto);
                                if ($resultdx->num_rows > 0) { 
                                while($rowdx = $resultdx->fetch_assoc()) {   
                                    $subtotalf = $rowdx["importe"];
                                    $ivaf = $rowdx["impuestostraslados"];
                                    $totalf = $rowdx["total"]; 
                                }
                                } 
 
                            /////////////////////////////////////////////////////////////////
							
                        $TotalesSubtotal = $crxml->$a['SubTotal'];
                        $TotalesDescuento = $crxml->$a['Descuento'];
                        //$TotalesImpuestosTras = $ImpuestosT['TotalImpuestosTrasladados'];
                        //$TotalesIVAFlete = $ImpuestosT['TotalImpuestosRetenidos'];
                        $TotalesTotal = $crxml->$a['Total'];
                        $fmt = new NumberFormatter( 'es_MX', NumberFormatter::SPELLOUT );
                        $TotalLetra = $fmt->format(round($TotalesTotal, 0));
                        $TotalLetra = strtoupper($TotalLetra);
                        $TotalLetraCentavos = substr($TotalesTotal, -2);
                        $SerieCerEmisor = $crxml->$a['NoCertificado'];
                        $FolioFiscal = $crxml->$a->$h->$i['UUID'];
                        $SerieCerSat = $crxml->$a->$h->$i['NoCertificadoSAT'];
                        $FechaCer = $crxml->$a->$h->$i['FechaTimbrado'];
                        $QRxml = substr($_POST['json'], 0, -4);
                        $SellodigitalCFDI = $crxml->$a['Sello'];
                        $SelloSat = $TimbreFiscalDigital['SelloSAT'];
                        $CadenaCompCertSAT = "||".$TimbreFiscalDigital['Version']."|".$TimbreFiscalDigital['UUID']."|".$TimbreFiscalDigital['FechaTimbrado']."|".
                        $TimbreFiscalDigital['RfcProvCertif']."|".$TimbreFiscalDigital['SelloCFD']."|".$TimbreFiscalDigital['NoCertificadoSAT']."||" ;
                        $Flete = $crxml->$a->$c->{'cfdi:Concepto'}[1];

                        echo '
                            <div id="styledTable"> 
                                <div class=WordSection1>
                                    <head>
                                        <style>
                                            label {
                                                font-size: 14px;
                                                font-family: Arial, Helvetica, sans-serif;
                                            }

                                            img {
                                                width: 250px;
                                                padding-left: 50px;
                                            }

                                            .detpago {
                                                display: inline-block;
                                                width: 130px;
                                                background-color: #d9d9d9;
                                                color: #0082b7;
                                            }

                                            .toptable {
                                                border-left: 1px solid;
                                                border-right: 1px solid;
                                                border-top: 1px solid;
                                            }

                                            .toptable div {
                                                border-bottom: 1px solid;
                                                border-width: 1px;
                                            }

                                            table {
                                                border-collapse: collapse;
                                                border: black;       
                                            }

                                            .tt2, .tt3, .tt4, .tt5 {
                                                border-right: 1px solid;
                                                display: inline-block;
                                                width: 70px;
                                                background-color: lightgray;
                                            }

                                            .rfcvalue {
                                                display: inline-block;
                                                width: 200px;
                                            }

                                            .detailstable {
                                                width: 100%;
                                                font-size: 14px;
                                                font-family: Arial, Helvetica, sans-serif;
                                                border: 1px solid black;
                                                border-collapse: collapse;
                                            }

                                            #idignore {
                                                padding: 0px;
                                            }

                                            th {
                                                border: 1px solid black;
                                            }
                                            
                                            .dt1 {
                                                white-space: nowrap;
                                                border: 1px solid black;
                                                color: #0082b7;
                                                text-align: center;
                                            }

                                            .dt2 {
                                                border: 1px solid black;
                                                font-weight: 300;
                                                text-align: center;
                                            }

                                            .total1 {
                                                display: inline-block;
                                                width: 100%;
                                                background-color: #d9d9d9;
                                                color: #0082b7;
                                            }

                                            .total2 {
                                                width: 100%;
                                            }

                                            .qrdetails {
                                                display: inline-block;
                                                width: 225px;
                                                background-color: #d9d9d9;
                                                color: #0082b7;
                                            }

                                            .bottomtable {
                                                border-collapse: collapse;
                                                width: 100%;
                                            }

                                            .bottomtable td {
                                                border: 1px solid black;
                                            }

                                            .bt3 {
                                                width: auto;
                                            }
                                        </style>
                                    </head>
                                    <div style="width: 755px;">
                                        <div style="display: flex; flex-direction: row;">
                                            <div>
                                                <img src="/admin/img/logopdf.png" alt="Competro" />
                                            </div>

                                            <div style="display: flex; flex-direction: column; margin-left: auto; background-color: #d9d9d9; color: #0082b7;">
                                                <label><center>Versión: 4.0</center></label>
                                                <label><center>COMERCIALIZADORA PETROMAR SA DE CV</center></label>
                                                <label><center>RFC: CPE190207226</center></label>
                                                <label>Tipo de comprobante: '.$TipoDeComprobante.'</label>
                                                <label>Lugar de Expedición: 82110</label>
                                                <label>Régimen Fiscal:601 - General de Ley Personas Morales</label>
                                            </div>            
                                        </div>
                                        <br>

                                        <div style="display: flex; flex-direction: row; ">
                                            <div style="margin-right: 10px;">
                                                <div>
                                                    <label class="detpago">Forma de pago</label>
                                                    <label>03</label>
                                                </div>
                                                <div>
                                                    <label class="detpago">Método de pago</label>
                                                    <label>PPD</label>
                                                </div>
                                                <div>
                                                    <label class="detpago">Moneda</label>
                                                    <label>'.$Moneda.'</label>
                                                </div>
                                            </div>

                                            <div style="margin-left: auto;">
                                                <div>
                                                    <label class="detpago">Folio:</label>
                                                    <label>'.$Folio.'</label>
                                                </div>
                                                <div>
                                                    <label class="detpago">Fecha:</label>
                                                    <label>'.$FechaComplemento.'</label>
                                                </div>
                                            </div>

                                        </div>

                                        <label style="font-size: 11px;">
                                            NÚMERO DE PERMISO DE COMERCIALIZACIÓN OTORGADO POR LA COMISIÓN REGULADORA DE ENERGÍA H/22957/COM/2019
                                        </label>  

                                        <div class="toptable" style="display: flex; flex-direction: column;">
                                            <label style="background-color: #d9d9d9; color: #0082b7;">Datos del cliente</label>

                                            <div style="flex-direction: row;">
                                            <label class="tt2">Cliente:</label>
                                            <label>'.$Cliente.'</label>
                                            </div>

                                            <div style="flex-direction: row;">
                                            <label class="tt3">R.F.C:</label>
                                            <label class="rfcvalue">'.$RFCCliente.'</label>
                                            <label class="tt3" style="border-left: 1px solid;">Uso CFDI:</label>
                                            <label>'.$UsocfdiCliente.'</label>
                                            </div>

                                            <div style="flex-direction: row;">
                                            <label class="tt4">Domicilio:</label>
                                            <label>'.$Domicilio.'</label>
                                            </div>
                                            <div style="flex-direction: row;">
                                            <label class="tt5">Regimen Fiscal:</label>
                                            <label>'.$RegimenFiscalReceptor.' - '.$_POST["regimenrnombre"].'</label>
                                            </div>   
                                            <!--
                                            <div style="flex-direction: row;">
                                            <label class="tt5">Lugar de entrega:</label>
                                            <label>'.$DireccionEntrega.'</label>
                                            </div>
                                            -->          
                                        </div>
                                        <br>

                                        <div class="detailsdiv">
                                            <table id="ignore" class="detailstable" class="color_blanco">
                                                <tr style="background-color: #d9d9d9;">
                                                    <td class="dt1">Cantidad</td>
                                                    <td class="dt1">Unidad</td>
                                                    <td class="dt1">Clave<br>Unidad SAT</td>
                                                    <td class="dt1">Clave Producto<br>/Servicio</td>
                                                    <td class="dt1">Concepto<br>/Descripcion</td>
                                                    <td class="dt1">Valor<br>Unitario</td>
                                                    <td class="dt1">Descuentos</td>
                                                    <td class="dt1">Objeto<br>Impuesto</td>
                                                    <td class="dt1">Impuestos</td>
                                                    <td class="dt1">Importe</td>
                                                </tr>

                        ';
		
		                    $num = count($Cantidad); 
							
				            for($i = 0; $i < $num; $i ++){
					            if(isset($Descuento[$i])){
						            $desc = $Descuento[$i];
						        } else {
							        $desc = 0;
							    }

					            $f = $Descuento[0] - ($Descuento[0] * $Comision);
                                echo '
                                    <tr>
                                        <td class="dt2"><label for="cantidad1">'.$Cantidad[$i].'</label></td>
                                        <td class="dt2"><label for="unidad11">'.$Unidad[$i].'</label></td>
                                        <td class="dt2"><label for="cusat1">'.$ClaveUnidad[$i].'</label></td>
                                        <td class="dt2"><label for="cps1">'.$ClaveProducto[$i].'</label></td>
                                        <td class="dt2" style="text-align: left;"><label for="condes1">'.$Descripcion[$i].'</label></td>
                                        <td class="dt2"><label for="vunitario1">'.$ValorUnitario[$i].'</label></td> 
                                        <td class="dt2"><label for="descuentos1">0</label></td>
                                        <td class="dt2"><label for="objetoimpuesto1">01</label></td>
                                        <td class="dt2"><label for="impuestos1">'.$TImporte[$i].'</label></td>
                                        <td class="dt2"><label for="importe1">'.$Importee[$i].'</label></td>
                                    </tr>
                                ';
					        }
                  
				            $subtotal = 0;
				            foreach($_POST['Importe'] as $value)
					        {
					            $subtotal += $value;	 
					        }   
		
		                echo '
                                            </table>
                                        </div>
                                        <br> 
                                        <table width="755" border="1">
                                    <tr>
                                        <td width="15%"><label class="total1">Moneda</label></td>
                                        <td width="35%"><label class="total2">MXN</label></td>
                                        <td width="25%"><label class="total1">Subtotal</label></td>
                                        <td width="25%"><label class="total2">'.number_format($Subtotal, 2).'  </label></td> 
                                    </tr>
                                    <tr>
                                        <td width="15%"> </td>  
                                        <td width="35%"> </td>  
                                        <td width="25%"><label class="total1">Total</label></td>
                                        <td width="25%"><label class="total2">'.number_format($Total, 2).'  </label></td>                         
                                    </tr>
                                </table>

                                <br> 

                                <table width="755" border="1">
                                    <caption> Información del pago </caption>
                                        <tr>
                                            <td width="15%"><label class="total1">Forma de pago:</label></td>
                                            <td width="35%"><label class="total2">Transferencia electrónica de fondos</label></td>
                                            <td width="25%"><label class="total1">Fecha de pago:</label></td>
                                            <td width="25%"><label class="total2">'.$FechaPago.'</label></td>
                                        </tr>
                                        <tr>
                                            <td><label class="total1">Moneda de pago:</label></td>
                                            <td><label class="total2">Peso Mexicano</label></td>
                                            <td><label class="total1">Monto:</label></td>
                                            <td><label class="total2" for="descuentost">'.number_format($_POST['Descuento'][0] - ($_POST['Descuento'][0] * $Comision), 2).'</label></td>
                                        </tr>
                                        
                                </table>
                                    <br> 
                                <table width="755" border="1">
                                    <caption> Documento relacionado </caption>
                                        <tr>
                                            <td style="width: 15%;"><label style="padding-top: 8px; padding-bottom: 8px;" class="total1"> Id documento: </label></td>
                                            <td style="width: 35%;"><label class="total2"> '.$UuidDctoAnterior.'</label></td>
                                            <td style="width: 25%;"><label class="total1"> Moneda del documento relacionado: </label></td>
                                            <td style="width: 25%;"><label class="total2">Peso Mexicano</label></td>
                                        </tr>
                                        <tr>
                                            <td> <label style="padding-top: 8px; padding-bottom: 8px;" class="total1">Folio: </label> </td>
                                            <td> <label class="total2">'.$FolioDctoAnterior.'</label></td>
                                            <td> <label class="total1">Método de pago del documento relacionado:</label></td>
                                            <td> <label class="total2">Pago en parcialidades o diferido</label> </td>
                                        </tr>
                                        <tr>
                                            <td><label class="total1">No. parcialidad:</label></td>
                                            <td><label class="total2">'.$NoParcialidad.'</label>  </td>
                                            <td><label class="total1"> Importe de saldo anterior:</label></td>
                                            <td><label class="total2" for="ISA">'.number_format($SaldoAnterior, 2).'</label></td>
                                        </tr>
                                        <tr>
                                            <td><label class="total1">Subtotal</label></td>
                                            <td><label class="total2">'.number_format($subtotalf, 2).'</label></td>
                                            <td> <label class="total1">Importe pagado:</label></td>
                                            <td><label class="total2" for="IP">'.number_format($ImportePagado, 2).'</label></td>
                                        </tr>
                                        <tr> 
                                            <td><label class="total1">IVA</label></td>
                                            <td><label class="total2">'.number_format($ivaf, 2).'</label></td>
                                            <td> <label class="total1">Importe de saldo insoluto:</label></td>
                                            <td><label class="total2" for="ISI">'.number_format($SaldoInsoluto, 2).'</label></td>
                                        </tr>
                                        <tr>
                                            <td><label class="total1">Total</label></td>
                                            <td><label class="total2">'.number_format($totalf, 2).'</label></td>
                                            <td><label class="total1">Objeto Impuesto</label></td>
                                            <td><label class="total2">02</label></td>
                                    </tr> 
                                </table>

                                        <br><br>
  
                                        <div style="display: flex;">
                                            <div>
                                                <img src="../uploads/'.$QRxml.'.png" alt="QR" style="width: 150px;"/>
                                            </div>

                                            <div style="display: flex; flex-direction: column; margin-left: auto;">
                                                <div style="display: flex; flex-direction: column;">
                                                    <div>
                                                        <label class="qrdetails">Serie del Certificado del emisor</label>
                                                        <label class="qrdetails2">'.$SerieCerEmisor.'</label>
                                                    </div>
                                                    <div>
                                                        <label class="qrdetails">Folio fiscal</label>
                                                        <label class="qrdetails2">'.$UUID.'</label>
                                                    </div>
                                                    <div>
                                                        <label class="qrdetails">No. de Serie del Certificado de SAT</label>
                                                        <label class="qrdetails2">'.$SerieCertSat.'</label>
                                                    </div>
                                                    <div>
                                                        <label class="qrdetails">Fecha y hora de certificación</label>
                                                        <label class="qrdetails2">'.$FechaTimbrado.'</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Este documento es una representación impresa de un CFDI</label>
                                        <br>

                                        <!--
                                        <div class="bottomdiv">
                                            <table class="bottomtable">
                                                <tr>
                                                    <td colspan="3">'.$_POST['sellos'].'</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">Sellos/Vehiculos/Placas</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">'.$_POST['certificados'].'</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">CERT/Compañia de transporte/Operador</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">/'.$_POST['datosoperativos'].'/</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">Datos Operativos/Boletas</td>
                                                </tr>
                                                <tr>
                                                    <td class="bt2">Cantidad natural: '.$_POST['cantidadn'].'</td>
                                                    <td class="bt2">Cantidad a 20 grados: '.$_POST['cantidada'].'</td>
                                                    <td class="bt2">Temperatura C: '.$_POST['temperatura'].'</td>
                                                </tr>
                                                <tr>
                                                    <td class="bt3">No. orden: '.$_POST['noorden'].'</td>
                                                    <td class="bt3" colspan="2">Fecha orden: '.$_POST['fechaorden'].'</td>
                                                </tr>
                                                <td colspan="3"  ><textarea name="observaciones" rows="8" cols="5"  style = " height:98%; width: 99%;  border: none; overflow:hidden;   resize: none;" readonly>'.$_POST['observaciones'].'</textarea> 
                                            
                                                </td>
                                            </table>
                                        </div>     
                                        -->
                                        <br><br> 

                                        <div style="display: flex; flex-direction: column;">
                                            <label style="color: #0082b7; background-color: #d9d9d9;">Sello digital del CFDI</label>
                                            <label style="font-size: 10px; word-wrap: break-word;">'.$SellodigitalCFDI.'</label>
                                            <label style="color: #0082b7; background-color: #d9d9d9;">Sello del SAT</label>
                                            <label style="font-size: 10px; word-wrap: break-word;">'.$SelloSat.'</label>
                                            <label style="color: #0082b7; background-color: #d9d9d9;">Cadena original del complemento de certificación digital del SAT</label>
                                            <label style="font-size: 10px; word-wrap: break-word;">'.$CadenaCompCertSAT.'</label>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        ';

                        echo '
                            <body onload="setTimeout(function() { document.frmpost.submit() }, 5000)">
                                <form method="post" action="controladorad/postcomplementos.php" name="frmpost"> 
                                    <input type="hidden" name="idempresa" value="'.$_POST['idempresa'].'"/>  
                                    <input type="hidden" name="folio" value="'.$Folio.'"/>
                                    <input type="hidden" name="fechapago" value="'.$FechaPago.'"/>
                                    <input type="hidden" name="uuidfactura" value="'.$UuidDctoAnterior.'"/>
                                    <input type="hidden" name="nombrecomplemento" value="'.substr($_POST['json'], 0, -4).'.pdf"/>
                                    <input type="hidden" name="foliocargo" value="'.$_POST['foliocargo'].'"/>
                                    <input type="hidden" name="importe" value="'.$ImportePagado.'">
                                    <br>
                                    <input type="submit" value="Enviar">
                                </form> 
                            </body> 
                        ';	
  
                    } else {
                        print_r('error');
                    }
                ?>
            </div>
        </div>
       
        <table id="tab">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">
            </form>		 	
        </table>  

        <button style="visibility: hidden;" class="btn" id="docRaptor">Export PDF with DocRaptor</button>
        <button style="visibility: hidden;" class="btn" id="pdfmake">Export PDF with pdfmake</button>
        <button class="btn" id="jsPDF" style="height: 1px; width: 1px; background: #ffffff;" name="<?php echo"".substr($_POST['archivoconruta'], 0, -4)."";?>"><?php echo substr($_POST['archivoconruta'], 0, -4);?></button>
        <button style="visibility: hidden;" class="btn" id="browserPrint">Export PDF with browser print</button>
        <br>

        <?php  
        // 
        echo '
        <a href="../uploads/'.substr($_POST['archivoconruta'], 0, -4).'.xml" download id="download" hidden></a>
        ';
        ?>

        <div id="footer">
            <div class="footerLeft left" style="font-size: 10px;">
                Av. Camarón Sábalo No. 102
                Col. Zona Dorada, Mazatlán, Sinaloa C.P. 82110
            </div>
          
            <div class="footerRight right"> 
                <a href="https://portal.competro.mx/uploads/AVISO%20DE%20PRIVACIDAD%20COMPETRO.pdf" target="_blank" style="font-size: 10px;">Aviso de Privacidad<a>
            </div>
            <div class="spacer clear">&nbsp;
            </div>
        </div>
        </div>
    </body>
</html>

<script type="text/javascript" src="js/jquery.table2csv.js"></script>
<script type="text/javascript"> 
    $("#pdfb").click(function(e)
    { 		 
        $("#pdf").table2CSV({
            type: "csv", 
            buttonContent: "Exportar",
            fileName: "pólizas "
        });

        alert("ff");
    }); 		 
</script>

<script>
    $(document).on(
    {
        dragover: function() {
            return false;
        },
        drop: function() {
            return false;
        }
    });
</script>

<script>
    function Print()
    {
        $('#txtarea').html(document.getElementById('pdf').outerHTML);
    }
</script>
 
<script src="scripts/pdfExportMethods.js"></script>

    <!--para el autoclick del pdf-->
<script>
    window.onload=function()
    {
        $("#jsPDF").click();
        var name = "../uploads/F0000003377 BEGCAL F-48069629 M.xml"; 
        document.getElementById('download').click();
    }
</script>
