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
        <SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Cache-Control" content="no-cache" />
        <link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
        <title>ComPetro</title> 
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="scripts/uijquery.js"></script>
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
                        <a href="cargafacturas">Avisos de inicio de sesión</a>
                    </div>	
                </div>		
        
                <div id="maincontent" align="center"> 	
                    <form name="forma1" method="POST" action="controladorad/uploadavisos.php" enctype="multipart/form-data"> 

                        <table style="display: flex; justify-content: center;" class="parametros">
                            <br>
                            <tr style="display: flex; justify-content: center;">
                                
                            </tr> 
                            
                            <tr style="display: flex; justify-content: center;">
                                <td align="left" class="color_blanco">
                                    <b>Contrato:</b>
                                </td>
                                <td align="left" class="color_blanco">	
                                    <input type="file" name="userfile" required>
                                </td>
                            </tr><br>
                            <tr><td>
                            <?php 
                            $getClientes = "Select idempresa, rzonsocial from empresa";
                            $result = $connect->query($getClientes);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                             echo "<input name='empresa[]' type='checkbox' value='".$row['idempresa']."' />".$row['rzonsocial']."<br>";
                                }
                            }
                            ?>
                            </td>
                            </tr>
                            <tr style="display: flex; justify-content: center;">
                                <td class="color_blanco">
                                    <input type="Submit" value="Aceptar">
                                </td>
                            </tr>	
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
                        <!--
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
                        -->

                    <!-- BOTONES DEL DISPLAY-->
                    <div class="pagecontrols" style="padding-left: 500px;">
                        <button class="btn" id="prev-page" onClick='showPrevPag()'>
                        <i class="fas fa-arrow-circle-left" ></i> Anterior
                        </button>
                        <button class="btn" id="next-page" onClick='showNextPage()'>
                        Siguiente <i class="fas fa-arrow-circle-right"></i>
                        </button>
                        <span class="page-info">
                        Página <span id="page-num"></span> de <span id="page-count"></span>
                        </span>
                    </div>

                    <!-- DISPLAY DEL ARCHIVO-->
                    <script type="text/javascript">
                        function reply_click(value){ 
                            var url = '../avisosinicio/'+value; 
                            var imagedisplay = document.getElementById("imagedisplay");
                            imagedisplay.setAttribute("src", url);
                        }
                    </script>
					
				

                    <div id="gridAnddisplay" style="display: flex; flex-direction: row-reverse;">    
                        <div id="filedisplay" style="width: 877px; background-color: #f6f6f6; border: 2px solid #f6f6f6;">
                            <img id="imagedisplay" src="../avisosinicio/AvisoPrueba.jpeg">
                        </div>
                        <form  method='POST' name='updatee' action='eliminaraviso.php'>
                                    <table> 
                                    <tr>
                                    <td> 	<input type='text' name='folioe' style="width:40px;"> </td> <td><input type='submit' value='Eliminar'></td>
                                    </tr>
                                    </table>
                                    </form>
                        <?php 
                            echo'
                            
                                <br><br><br>
                                <form name="update" method="POST"   action="updateavisos.php">
                                <table id="filegrid">
                                    <tr> 
                                        <th>Folio</th>
                                        <th>Aviso</th>
                                        <th>Ver</th> 
                                        <th>Activar</th>  
                                    </tr> 
                            ';
                
                            if ($connect->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 

                            $sql = "SELECT * FROM avisosinicio";

                            $result = $connect->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "
                                        <tr>
                                            <input type='hidden' name='folio[]' value='".$row['folio']."'/> 
                                            <td style='text-align: center;'> ".$row['folio']." </td>
                                            <td> <a href='../avisosinicio/".$row["aviso"]."'><label style='word-break: break-word;'>".$row["aviso"]."</label></a></td>
                                            <td> <label onClick='reply_click(this.id)' id='".$row["aviso"]."'>Ver</label></td>  
                                            
                                            ";

                                            if($row["activo"] ==1){
                                                echo "<td style='text-align: center;'> <input type='checkbox' name='checkactivo[]' value='".$row["folio"]."' checked> </td>";
                                            }else{
                                                    echo "<td style='text-align: center;'> <input type='checkbox' name='checkactivo[]' value='".$row["folio"]."' > </td>";
                                            }
											
											
											echo "
											 
											
										
                                            </tr>
											";
                                            

                                    
                                }
                                
                                echo "
                                        <tr>
                                            <td class='color_blanco' colspan='4' style='text-align: center;'> <input type='submit' Value='Actualizar'> </td>
                                        </tr>   

                                    </table></form>
<br><br><br>
                                   
                                 ";
                            } else { echo "0 results"; }

                           //$conn->close();
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
		echo "<script>alert('".$_POST["mensaje"]."');</script>";
	}
?>

