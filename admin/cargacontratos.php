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
        <script src="dw_sizerdx.js" type="text/javascript"></script>
        <SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Cache-Control" content="no-cache" />
        <link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
        <title>ComPetro</title>
        <script language="JavaScript" src="scripts/calendario.js"></script> 
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="scripts/uijquery.js"></script>
        <link rel="icon" href="img/favicon.ico"> 
        <link rel="stylesheet" href="styles/stylepdf.css" />
    </head>

    <body class="body" onload="logout()">
        <div id="extra">&nbsp;</div>
        <div id="page">
            <div id="header">
                    <!-- <div id="eNacional"><a href="http://www.energia.gob.mx/" target="_blank" title="Secretar&iacute;a de Energ&iacute;a">Secretar&iacute;a de Energ&iacute;a</a></div> -->  
                <div id="PEMEX"></div> 
                <div id="utils">
                    <ul id="nav2"> 
                        <li class="bar"><a href="cargacontratos" class="baritem first">Contratos</a></li>
                        <li class="bar"><a href="InteresesMoratoriosad" class="baritem first">Intereses Moratorios</a></li>
                        <li class="bar"><a href="Manual Competro Usuario.pdf" class="baritem first">Manual de Usuario</a></li>
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
                    <p class="fechapc" align="right">
                    </p>
                </div>

                <div id="mainmenu">
                    <ul id="nav">
                       
	<li class="bar"><a href="menu_cteadmin" class="baritem">Servicio a Clientes</a>
	</li>
	

 
<li class="bar"><a href="clientes" class="baritem">Clientes</a>
	</li> <li class="bar"><a href="pedidoscnvotradmin" class="baritem">Pedidos</a>
	</li> <li class="bar"><a href="../index" class="baritem">Salir</a>
	</li>					

                        <li class="barlast"><span>&nbsp;</span></li>
                            <!-- mete codigo de tipo de usuario--> 
                    </ul>
                </div>
            </div>

            <script  type="text/javascript" > 
                function logout(){
                    <?php 
                        if (isset($_SESSION["usuario"])) {
                            } else {
                                session_unset();
                                session_destroy();
                                echo "window.location.href='index.php';";
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
                        <span class=bullet>&nbsp;&nbsp;</span> 
                        <a href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;
                        <span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
                        <a href="cargafacturas">Carga facturas</a>
                        <span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
                        <a class=bold href="#">Carga Contrato</a>	
                    </div>	
                </div>		
        
                <div id="maincontent" align="center"> 	
                    <form name="forma1" method="POST" action="uploadcontratos.php" enctype="multipart/form-data"> 

                        <table align="center" class="parametros">
                            <br>
                            <tr>
                                <select name='empresa' id='IdEmpresa' style='width:100px;' required>
                                    <?php
                                        $id = null;
                                        $contrato = null;
                                        $queryclientes = 'SELECT IdEmpresa, Usuario FROM empresa WHERE IdEmpresa != "2509"' ;
                                        $resultclientes = $connect->query($queryclientes);

                                        if($resultclientes->num_rows > 0){
                                            while($row = $resultclientes->fetch_assoc()){
                                                echo'
                                                    <option value = "'.$row['IdEmpresa'].'" name = "empresa">'.$row['Usuario'].'</option>
                                                ';
                                            }
                                        }
                                    ?>

                                    <!--    <option value = "TODOS" name = "empresa">TODOS</option>     -->
                                </select>
                            </tr>
                            <br><br>
                            
                            <tr>
                                <td align="left" class="color_blanco"><b>Contrato:</b>
                                </td>
                                <td align="left" class="color_blanco">	
                                <input type="file" name="userfile" required>
                                </td>
                            </tr>
                            
                            <table align="center">
                                <tr>
                                    <td align="center" class="color_blanco">
                                        <br>
                                        <input type="Submit" value="Aceptar">
                                    </td>
                                </tr>
                            </table>	
                        </table>

                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="contrato" value="<?php echo $_POST['Id'];?>">
                    </form>
                    <br><br><br>

                        <!--
                    <form name="forma1" method="POST" action="controladorad/postfactura.php" enctype="multipart/form-data"> 
                        <table align="center" class="parametros">
                    </form>
                        -->
                        
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
                    
                    <div class="pagecontrols" style="padding-left: 500px;">
                        <button class="btn" id="prev-page" onClick='showPrevPag()'> <!-- CHECAR LAS FUNCIONES -->
                        <i class="fas fa-arrow-circle-left" ></i> Anterior
                        </button>
                        <button class="btn" id="next-page" onClick='showNextPage()'>
                        Siguiente <i class="fas fa-arrow-circle-right"></i>
                        </button>
                        <span class="page-info">
                        Página <span id="page-num"></span> de <span id="page-count"></span>
                        </span>
                    </div>

                    <div id="gridAnddisplay" style="display: flex; flex-direction: row-reverse;">    
                        <div id="filedisplay" style="width: 877px; background-color: #f6f6f6; border: 2px solid #f6f6f6;">
                            <canvas id="pdf-render"></canvas>
                            <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
                        </div>
                    
                        <script type="text/javascript">
                            function reply_click(value){ 
                                    // Get Document     <script src="scripts/main.js">
                                var url = '../comprobantes/'+value; 
                                let pdfDoc = null,
                                pageNum = 1,
                                pageIsRendering = false,
                                pageNumIsPending = null;
                                var scale = 1.0,
                                canvas = document.querySelector('#pdf-render'),
                                ctx = canvas.getContext('2d');
                                    // Get Document
                                pdfjsLib
                                .getDocument(url)
                                .promise.then(pdfDoc_ => {
                                    pdfDoc = pdfDoc_;
                                    document.querySelector('#page-count').textContent = pdfDoc.numPages;
                                    renderPage(pageNum); 
                                })

                                .catch(err => {
                                    // Display error
                                    var div = document.createElement('div');
                                    div.className = 'error';
                                    div.appendChild(document.createTextNode(err.message));
                                    document.querySelector('body').insertBefore(div, canvas);
                                    // Remove top bar
                                    document.querySelector('.top-bar').style.display = 'none';
                                });

                                // Render the page
                                var renderPage = num => {
                                    pageIsRendering = true;
                                    // Get page
                                    pdfDoc.getPage(num).then(page => {
                                        // Set scale
                                        var viewport = page.getViewport({ scale });
                                        canvas.height = viewport.height;
                                        canvas.width = viewport.width;
                                        var renderCtx = {
                                            canvasContext: ctx,
                                            viewport
                                        };

                                        page.render(renderCtx).promise.then(() => {
                                        pageIsRendering = false;
                                            if (pageNumIsPending !== null) {
                                                renderPage(pageNumIsPending);
                                                pageNumIsPending = null;
                                            }
                                        });

                                        // Output current page
                                        document.querySelector('#page-num').textContent = num;
                                    });
                                };

                                // Check for pages rendering
                                var queueRenderPage = num => {
                                    if (pageIsRendering) {
                                        pageNumIsPending = num;
                                    } else {
                                        renderPage(num);
                                    }
                                };

                                // Show Prev Page
                                const showPrevPage = () => {
                                    var uno = document.querySelector('#page-num').textContent;
                                    if (uno <= 1) {
                                        return;
                                    }
                                    pageNum--;
                                    queueRenderPage(pageNum);
                                };
                                            
                                // Show Next Page 
                                const showNextPage = () => {
                                    var uno = document.querySelector('#page-num').textContent;
                                    var dos = document.querySelector('#page-count').textContent; 
                                    if (uno >= dos) {
                                        return;
                                    }
                                    pageNum++;
                                    queueRenderPage(pageNum);
                                };

                                // Button Events
                                document.querySelector('#prev-page').addEventListener('click', showPrevPage);
                                document.querySelector('#next-page').addEventListener('click', showNextPage);
                            }
                        </script>
                        
                        <?php 
                            echo'
                                <br><br><br>
                                <table id="filegrid">
                                    <tr> 
                                        <th>Fecha</th>
                                        <th>Contrato</th>
                                        <th>Ver</th> 
                                        <th>Cliente</th> 
                                    </tr> 
                            ';
                
                            // Check connection
                            if ($connect->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 

                            $sql = "SELECT T1.folio, T1.fecha, T1.contrato, T2.RzonSocial FROM contratos T1 INNER JOIN empresa T2 ON T1.IdEmpresa = T2.IdEmpresa";

                            $result = $connect->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "
                                        <tr> 
                                            <td> <label>".$row["fecha"]."</label></td>
                                            <td> <label style='word-break: break-word;'>".$row["RzonSocial"]."</label> </td>
                                            <td> <a href='../comprobantes/".$row["contrato"]."'><label style='word-break: break-word;'>".$row["contrato"]."</label></a></td>
                                            <td> <button onClick='reply_click(this.id)' id='".$row["contrato"]."'>Ver</button></td>  
                                        </tr>
                                    ";
                                }
                                
                                echo "</table>";
                            } else { echo "0 results"; }

                            $conn->close();
                        ?>
                    </div>

                </div> 	
            </div>
            <br><br>

            <div id="footer">
                <div class="footerLeft left">
                    Av. Camarón Sábalo No. 102
                    Col. Zona Dorada, Mazatlán, Sinaloa C.P. 82110
                </div>
            
                <div class="footerRight right"> 
                    <a href="https://portal.competro.mx/uploads/AVISO%20DE%20PRIVACIDAD%20COMPETRO.pdf" target="_blank">Aviso de Privacidad<a>
                </div>
                
                <div class="spacer clear">&nbsp;
                </div>
            </div>
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

<?php 	 
	if(isset($_POST["mensaje"])) {
		echo "<script>window.alert('Capturado Correctamente');</script>";
	}
?>

    