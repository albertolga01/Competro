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
        <link href="styles/styles.css" rel="stylesheet" type="text/css" />
        <link href="styles/tables.css" rel="stylesheet" type="text/css" />
        <link href="styles/menu.css" rel="stylesheet" type="text/css" />
        <link href="styles/sidebar.css" rel="stylesheet" type="text/css" />
        <link href="styles/content.css" rel="stylesheet" type="text/css" />
        <link rel="icon" href="iconion.ico">

        <SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>

        <script src="dw_sizerdx.js" type="text/javascript"></script>
        <SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
        <link rel="stylesheet" href="styles/calendario.css">
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Cache-Control" content="no-cache" />
        <link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
        <title>ComPetro</title> 
        <script language="JavaScript" src="scripts/calendario.js"></script> 
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="scripts/uijquery.js"></script>
        <!-- 
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
            <script src="scripts/html2canvas.1.0.0-rc.7.js"></script> 
            <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.7/dist/html2canvas.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
        -->
        <script src="scripts/jspdf.2.1.1.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.min.js"></script>

        <link rel="icon" href="img/favicon.ico">

        <?php 
            echo '<script> 
                $( function() {
                $( "#dateDefault").datepicker(); 
                $( "#dateDefaultt").datepicker(); 
                $( "#dateDefaulttj").datepicker(); 
                } );
            </script>';
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


            <script type="text/JavaScript">
                $("#un").load("controladorad/tpcd.php");
            </script>
                  
            </div>

            <script>
                function jspdf_PDF(){
                    var toExport = document.getElementsByTagName("table")[3];
                    /*  'html2canvas' IMPLEMENTATION, CHANGED FOR 'domtoimage'
                        html2canvas(toExport, {
                            scale: 2,
                            onrendered: function(canvas) {
                            var img = canvas.toDataURL("image/jpeg", 2);
                            var doc = new jsPDF('p', 'px');
                            doc.addImage(img, 'JPEG', 5, 5);
                            doc.save('maximosminimos.pdf');
                            }
                        });
                    */
                    /*  TO SAVE TABLE AS IMAGE, FOR TESTING (UNCOMMENT 'FileSaver.min.js' SCRIPT)
                        domtoimage.toBlob(toExport).then(function (blob) {
                            window.saveAs(blob, "my-node.png");
                        });
                    */
                    var options = {
                        quality: 1
                    };

                    domtoimage.toPng(toExport, options).then( function(dataUrl){
                        var doc = new jsPDF('p', 'px');
                        doc.addImage(dataUrl, 'JPEG', 0, 0);
                        doc.save('maximosminimos.pdf');
                    })
                }
            </script>

            <script>
                function sheetjs_XLS(){
                    var toExport = document.getElementsByTagName("table")[3];
                    var xls = XLSX.utils.table_to_book(toExport);
                    XLSX.writeFile(xls, 'out.xls');
                }
            </script>

            <script  type="text/javascript" > 
                function logout(){
                    <?php 
                        if (isset($_SESSION["usuario"])){} else {
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
                    <DIV id=pathway>
                        <SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
                        <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
                        <a href="menu_reportes">Reportes Internos</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
                        <a class=bold href="#">Máximos y mínimos</a>
                    </div>
                </div>

                <label title="Cambiar Apariencia del Menú"  id="uno" style="float: right; width:40px;  padding-left:10px; padding-top: 3px;  height:15px;  font-size:13px;">Mostrar</label> 
                
                <div id="maincontent" align="center"> 	
                    <form name="forma1" method="POST" action="controladorad/post_minimosmaximos.php">
                        <table align="center" class="parametros">
                            <tr>
                                <td class="color_blanco"><b>Fecha:</b></td>
                                <td class="color_blanco"><input type="text" value= "00/00/0000" name="fini" id="dateDefault"> </td>
                            </tr>

                            <tr>
                                <td class="color_blanco"><b>Cliente:</b></td>
                                <td class="color_blanco">
                                    <?php
                                    $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'");
                                    echo "<select name='IdEmpresa' id='IdEmpresa' onchange='doThisOnChange2(this.value)' style='width:100%;'>
                                        <option>Seleccione</option>
                                    ";

                                    while ($row = $result->fetch_assoc()) {
                                        unset($id, $name);
                                        $id = $row['IdEmpresa'];
                                        $name = $row['usuario']; 
                                        echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';
                                    } 
                                    
                                    echo "</select>"; 
                                    ?> 
                                </td>
                            </tr>

                            <tr>
                                <td class="color_blanco"><b>Destino:</b></td>
                                
                                <td class="color_blanco">
                                    <select name="destino" id="destinoss2" required="required" style="width:120px">
                                </td>
                            </tr>

                            <tr>
                                <td style="background-color: green; color: white; font-weight: bold; font-size:13px" colspan="5" align="center">Magna</td>
                            </tr>
                            
                            <tr>
                                <td align="left" class="color_blanco"><b>Minimo:</b></td>
                                <td align="left" class="color_blanco">
                                    <input type="text" name="minmagna">
                                </td>

                                <td align="left" class="color_blanco"><b>Maximo:</b></td>
                                <td align="left" class="color_blanco">
                                    <input type="text" name="maxmagna" >
                                </td> 
                            </tr>

                            <tr>
                                <td style="background-color: red; color: white; font-weight: bold; font-size:13px" colspan="5" align="center">Premium</td>
                            </tr>

                            <tr>
                                <td align="left" class="color_blanco"><b>Minimo:</b></td>
                                <td align="left" class="color_blanco">
                                    <input type="text" name="minpremium" >
                                </td>

                                <td align="left" class="color_blanco"><b>Maximo:</b></td>
                                <td align="left" class="color_blanco">
                                    <input type="text" name="maxpremium" > 
                                </td>
                            </tr>

                            <tr>
                                <td style="background-color: black; color: white; font-weight: bold; font-size:13px" colspan="5" align="center">Diesel</td>
                            </tr>

                            <tr>
                                <td align="left" class="color_blanco"><b>Minimo:</b></td>
                                <td align="left" class="color_blanco">
                                    <input type="text" name="mindiesel" >
                                </td>

                                <td align="left" class="color_blanco"><b>Maximo:</b></td>
                                <td align="left" class="color_blanco">
                                    <input type="text" name="maxdiesel" > 
                                </td>
                            </tr>

                            <table align="center">
                                <tr>
                                    <!-- 
                                    <td align="center" class="color_blanco">
                                        <br>
                                        <input type="Submit" name="button" value="Guardar descuento" >
                                    </td> 
                                    -->
                
                                    <td align="center" class="color_blanco">
                                        <br>
                                        <input type="Submit">
                                    </td>
                                </tr>
                            </table>	
                        </table> 
                    </form>  	
                </div> 	

                <h3><label id="fechaaa" style="font-size:20px;">ComPetro - <?php echo $fecha; ?></label></h3>

                <div style="width:100%;" align="center">
                    <!-- OPCIONES DE CONSULTA-->
                    <form name="forma1" method="post" action="minimosmaximos">
                        <table align="center" class="parametros">
                            <tr>
                                <td class="color_blanco"><B>Introduce la Fecha de Inicio:</B></td>
                                <td class="color_blanco">
                                    <?php 
                                    if(isset($_POST['fini'])){
                                        $fecha = $_POST['fini'];
                                        echo '<input type="text" value= "'. $_POST['fini'].'" name="fini" id="dateDefaulttj" readonly>';
                                    } else {
                                        echo '<input type="text" value= "00/00/0000"  name="fini" id="dateDefaultt" readonly>';
                                    }
                                    ?>
                                </td>
                            </tr>		

                            <tr></tr>

                            <tr>
                                <td class="color_blanco"><b>Seleccione cliente:</b></td>
                                <td class="color_blanco">
                                    <?php
                                    if(isset($_POST["IdEmpresa"])){		
                                        $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1' and IdEmpresa != '".$_POST['IdEmpresa']."'");
                                    } else {		
                                        $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'  ");
                                    }

                                    echo "<select name='IdEmpresa' id='sel2' onchange='doThisOnChange(this.value)'   style='width:100%;' required>
                                        <option selected>Seleccione</option>
                                    ";

                                    if(isset($_POST["IdEmpresa"])){
                                        $resulti = $connect->query("select IdEmpresa, usuario from empresa where IdEmpresa = '".$_POST['IdEmpresa']."'");
                                        while ($rowi = $resulti->fetch_assoc()) {
                                            unset($idi, $namei);
                                            $idi = $rowi['IdEmpresa'];
                                            $namei = $rowi['usuario']; 
                                            echo '<option value="'.$idi.'" name="empresa" id="select">'.$namei.'</option>';
                                        } 
                                    } else {echo "	 ";}

                                    while ($row = $result->fetch_assoc()) {
                                        unset($id, $name);
                                        $id = $row['IdEmpresa'];
                                        $name = $row['usuario']; 
                                        echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';
                                    }  
                                    
                                    echo"<option>TODOS</option>
                                        </td>
                                        </tr>	
                                    ";
                                    ?> 
                            <tr>
                                <td class="color_blanco"><b>Seleccione Estación:</b></td>

                                <td class="color_blanco">
                                    <select name="destino" id="destinoss" required="required" style="width:120px">
                                </td>
                            </tr>	

                            <tr hidden>
                                <td class="color_blanco"><b>Tipo de consulta:</b></td>
                                 
                                <td class="color_blanco">
                                <fieldset id="group1" >
                                    <input hidden checked="checked" type="radio" value="1" name="type"> &nbsp; <label>Mensual</label> &nbsp;
                                    <input hidden type="radio" value="2" name="type"> &nbsp; <label>Anual</label>
                                </fieldset>
                                </td>
                            </tr>	

                            <tr>
                                <td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
                            </tr>
                        </table>
                    </form>
                    <br>
                    
                    
                        <style>
                            tr{
                                white-space: nowrap;
                            }
                        </style>
                    <table>
                        <tr>
                            <th>Destino</th>
                            <th>No. Estación</th>
                            <th>Producto</th>
                            <th>Min</th>
                            <th>Max</th>
                            <th>Vólumen</th>
                            <th>Diferencia</th>    
                        </tr>

                        <?php 
                        if(isset($_POST['fini'])){  

                            $type =  $_POST["type"];
                            $ano = substr($_POST['fini'], 6, 4);
                            $mes = substr($_POST['fini'], 3, 2);
 
                             
                            if($_POST["IdEmpresa"] != "TODOS")
                            {
                            if($type == "1"){
                                $sql = "SELECT t3.iddestino, t3.noestacion, t2.destino, t2.producto, sum(t1.Cantidad) as cantidad FROM facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura inner join destinos t3 on t2.destino = t3.destino
                                WHERE t1.idempresa = '".$_POST['IdEmpresa']."' and t2.destino = '".$_POST['destino']."' and year(t1.fecha) = '".$ano."' and month(t1.fecha) = '".$mes."' ";
                                }else if($type == "2"){
                                    $sql = "SELECT t1.iddestino, t3.noestacion, t2.destino, t2.producto, sum(t1.Cantidad) as cantidad FROM facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura inner join destinos t3 on t2.destino = t3.destino
                                WHERE t1.idempresa = '".$_POST['IdEmpresa']."' and t2.destino = '".$_POST['destino']."' and year(t1.fecha) = '".$ano."' ";
                                }
                            }else
                            {
                                if($type == "1"){
                                $sql = "SELECT t3.iddestino, t3.noestacion, t2.destino, t2.producto from pedido t2 inner join destinos t3 on t2.destino = t3.destino
                                 group by t3.noestacion order by t3.iddestino asc";
                                }else if($type == "2"){
                                    $sql = "SELECT t1.iddestino, t3.noestacion, t2.destino, t2.producto, sum(t1.Cantidad) as cantidad FROM facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura inner join destinos t3 on t2.destino = t3.destino
                                WHERE  year(t1.fecha) = '".$ano."'  group by t2.producto";
                                } 
                            }
                                
                            //echo $sql;
                            $r = $connect->query($sql);
                           
                            if ($r->num_rows > 0) {
                            while ($row = $r->fetch_assoc()) {
                               
                                

                              

                                        $cantidad = "Select t3.iddestino, sum(t1.cantidad) as cantidad, t2.producto from facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura inner join destinos t3 on t2.destino = t3.destino where t2.destino = '".$row["destino"]."' and year(t1.fecha) = '".$ano."' and month(t1.fecha) = '".$mes."' group by t2.producto";
                                            
                                        $rc = $connect->query($cantidad);
                                        if ($rc->num_rows > 0) {
                                            $esa = "";$desa = "";
                                            while ($rowc = $rc->fetch_assoc()) {
                                                $minimo = "";
                                                $maximo = "";
                                                $producto = "";
                                                //producto
                                                if($rowc["producto"] == "DIESEL"){$p = "D"; $producto = "DIESEL";}
                                                if($rowc["producto"] == "GASOLINA 91 OCT"){$p = "p"; $producto = "PREMIUM";}
                                                if($rowc["producto"] == "GASOLINA 87 OCT"){$p = "m"; $producto = "MAGNA";}

                                                $selectmm = "Select minimo, maximo from minimosmaximos where producto = '".$p."' and iddestino = ".$rowc['iddestino']." order by id desc limit 1";
                                      
                                                $rr = $connect->query($selectmm);
                                                if ($rr->num_rows > 0) {
                                                    while ($rowr = $rr->fetch_assoc()) {
                                                        $minimo = $rowr["minimo"]; 
                                                        $maximo = $rowr["maximo"];
                                                    } 
                                                }
 


                                                $cantidad= $rowc["cantidad"] / 1000;
                                                echo"
                                                <tr style='height: 30px'>
                                                    "; 
                                                    if($row["destino"] != $desa){
                                                        echo "<td align='center'>".$row["destino"]."</td>";
                                                        }else{echo "<td></td>";}
                                                    
                                                    if($row["noestacion"] != $esa){
                                                    echo "<td align='center'>".$row["noestacion"]."</td>";
                                                    }else{echo "<td></td>";}

                                                if($rowc["producto"] == "DIESEL"){
                                                    echo "<td style='background-color: black; color: white;'>".$producto."</td>";
                                                    }else if($rowc["producto"] == "GASOLINA 87 OCT"){
                                                        echo "<td style='background-color: green; color: white;'>".$producto."</td>";
                                                    }else if($rowc["producto"] == "GASOLINA 91 OCT"){
                                                        echo "<td style='background-color: red; color: white;'>".$producto."</td>";
                                                    }

                                                    echo " 
                                                    <td>".$minimo."</td>
                                                    <td>".$maximo."</td>
                                                    <td>".($rowc["cantidad"]/1000)."</td>
                                                    ";
                                                    if((($cantidad) <= $maximo) AND (($cantidad) >= $minimo)){
                                                        echo "<td></td>";
                                                    }
                                                    if((($cantidad) > $maximo)){
                                                        echo "<td align='center'>+  ".($cantidad - $maximo)."</td>";
                                                    }
                                                    if((($cantidad) < $minimo)){
                                                        echo "<td align='center' style='background-color:red;color:white'>".round(($cantidad-$minimo),3)."</td>";
                                                    }
                
                                                    
                                                    echo " 
                                                </tr>
                                            ";  
                                            $esa = $row["noestacion"]; $desa = $row["destino"];  

                                            }
                                        }
                                  

                                  
                           
                            }  

                            echo "
                            <tr>
                                <td colspan='8' align='center' class='color_blanco' hidden><input type='submit' value='Guardar'></td>
                            </tr>
                            ";

                        }else{
                            
                        }
                           
                            
                        }
                        ?>
                    </table>
                </div>		    
                <div style="width:100%; padding-top: 50px;" align="center">
                <button style="width:150px" onclick="jspdf_PDF()">Exportar a PDF</button><br><br>
                <button style="width:150px" onclick="sheetjs_XLS()">Exportar a Excel</button>
                </div>
                <br><br>
                <br><br> 
                <div id="contentHome" class="left">
                    <form action="LoginServlet" method="post">
                    </form>
        
                    <div id="maincontent"> 
                        <table align="center">
                            <tr class="link" align="center">
                                
                                <td colspan="4" align="center" class="color_blanco"> 
                                    <b>.....</b> 
                                </td> 
                            </tr>
                        </table>
                    </div> 
                </div>

                <script>
                    renderFooter();
                </script>
            </div>
        </div>
    </body>

    <script>
        function handleSubmit_MinMax(){
            var IdEmpresa = document.getElementById("IdEmpresa").value;
            var IdDestino = document.getElementById("IdDestino").value;
            var fini = document.getElementById("fini").value;
            var minmagna = document.getElementById("minmagna").value;
            var maxmagna = document.getElementById("maxmagna").value;
            var minpremium = document.getElementById("minpremium").value;
            var maxpremium = document.getElementById("maxpremium").value;
            var mindiesel = document.getElementById("mindiesel").value;
            var maxdiesel = document.getElementById("maxdiesel").value;

            let body = new FormData();
                body.append("IdEmpresa", IdEmpresa);
                body.append("IdDestino", IdDestino);
                body.append("fini", fini);
                body.append("minmagna", minmagna);
                body.append("maxmagna", maxmagna);
                body.append("minpremium", minpremium);
                body.append("maxpremium", maxpremium);
                body.append("mindiesel", mindiesel);
                body.append("maxdiesel", maxdiesel);

            fetch('controladorad/post_minimosmaximos.php', {
                method: "POST",
                headers: {'Content-Type': 'multipart/form-data'},
                body: body
            })
            .then(function(data){
                alert(data);
            })
        }
    </script>

</html>

<script>
    function setInputDate(_id){
        var _dat = document.querySelector(_id);
        var hoy = new Date(),
        d = (hoy.getDate()),
        m = hoy.getMonth(), 																																																																																																																																																
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
        var _dat = document.querySelector(_id);
        var hoy = new Date(),
            d = (hoy.getDate()),
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
    setInputDatee("#dateDefaultt");   
</script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<script>
    $("#maincontent").hide();
</script>

<script>
    var bool = true;
    $(document).ready(function(){
        $("#uno").click(function(){
            if(bool == true){
                $("#maincontent").show(1000); 
                bool = false;
            } else {
                $("#maincontent").hide(1000); 
                bool = true;
            }
        });

        $("#icon").click(function(){
            if(bool == true){
                $("#contentBasicoSeccionfulllistmenu").show(1000);
                $("#contentBasicoSeccionfullnvomenu").hide(1000);
                $("#icon").attr("src","img/menuiconnn.png");
                bool = false;
            } else {
                $("#contentBasicoSeccionfulllistmenu").hide(1000);
                $("#contentBasicoSeccionfullnvomenu").show(1000);
                $("#icon").attr("src","img/menuicon.png");
                bool = true;
            }
        });
    });
</script>

<?php 
    if(isset($_POST["Mensaje"])){
		echo "<script>window.alert('".$_POST['Mensaje']."');</script>";
    }
?>

<script>
    doThisOnChange = function(value, optionIndex){ 
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
                //console.log(data);
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

<script>
    doThisOnChange2 = function(value, optionIndex){ 
        var selectElement = document.getElementById("destinoss2");
        
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
                //console.log(data);
                var html = '';
                for(var a = 0; a < data.length; a++) {
                    //var firstName = data[a].iddestino;
                    var lastName = data[a].destino; 


                    var option = document.createElement( 'option' );
                    option.value = data[a].iddestino;
                    option.text = data[a].destino;
                    selectElement.add(option); 
                }
                selectElement.add(new Option('TODOS')); 
                document.getElementById("data").innerHTML += html;
            }
        };
    }
</script>

<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->

<?php 
    if(isset($_POST["mensaje"])){
		echo "<script>window.alert('".$_POST['mensaje']."');</script>";
    }
?>