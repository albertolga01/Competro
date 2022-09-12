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
    
        
        <link href="styles/menu.css" rel="stylesheet" type="text/css" />
        <link href="styles/sidebar.css" rel="stylesheet" type="text/css" />
        <link href="styles/content.css" rel="stylesheet" type="text/css" />
        <link rel="icon" href="iconion.ico">
                <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 


    <link rel="shortcut icon" href="../favicon.ico">
            
            
        
        
        <SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
        <SCRIPT src="scripts/renderelements.js" type="text/javascript"></SCRIPT>
        
        
        
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Cache-Control" content="no-cache" />
        <link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
        <title>ComPetro</title>

        <script language="JavaScript" src="scripts/calendario.js"></script> 
    <link rel="icon" href="img/favicon.ico"> 

    <style>
    /* Popup container */
    .popup {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    /* The actual popup (appears on top) */
    .popup .popuptext {
        visibility: hidden;
        width: 460px;
        height: 600px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 8px 0;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -80px;
    }



    /* Popup arrow */
    .popup .popuptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }

    /* Toggle this class when clicking on the popup container (hide and show the popup) */
    .popup .show {
        visibility: visible;
        -webkit-animation: fadeIn 1s;
        animation: fadeIn 1s
    }

    .popup1 .popuptext1 {
        visibility: hidden;
        width: 460px;
        height: 600px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 8px 0;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -80px;
    }

    /* Popup arrow */
    .popup1 .popuptext1::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }

    /* Toggle this class when clicking on the popup container (hide and show the popup) */
    .popup1 .show {
        visibility: visible;
        -webkit-animation: fadeIn 1s;
        animation: fadeIn 1s
    }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
        from {opacity: 0;} 
        to {opacity: 1;}
    }

    @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity:1 ;}
    }
    </style>
    </head>


    <body class="body" onload="logout()">
        
        <div id="extra">&nbsp;</div>
        

    <div id="page">

        <!-- FUNCION QUE MUESTRA LA NOTIFICACION DE "encuesta_cte" -->
        <script>
            function notificacionEncuesta(){
                let notificacionEncuesta = document.createElement("div");
                notificacionEncuesta.style.position = "absolute";
                notificacionEncuesta.style.backgroundColor = "#ddd";
                notificacionEncuesta.style.border = "1px solid black";
                notificacionEncuesta.style.borderRadius = "3px";
                notificacionEncuesta.style.bottom = "10vh";
                notificacionEncuesta.style.right = "1vw";
                let notEnc_text = document.createElement("a");
                notEnc_text.innerHTML = "Encuesta de satisfaccion al cliente";
                notEnc_text.href = "./encuesta_cte.php";
                notificacionEncuesta.appendChild(notEnc_text);
                document.getElementsByTagName("body")[0].appendChild(notificacionEncuesta);
            }
        </script>

    <div id="header"> 
        <script> 
            var usuario = '<?php echo $_SESSION['usuario']; ?>'; 
            var rfc = '<?php echo $_SESSION['rfc']; ?>'; 
            renderHeader(usuario, rfc);
        </script>
    </div>
    <?php
                    
                    
        if($_SESSION['idempresa']!='2522'){
         /*   echo"
                <script>
                    notificacionEncuesta();
                </script>
            ";*/
        }

    ?>

    <script  type="text/javascript" > 
        function logout(){<?php 
    
    
            if (isset($_SESSION["usuario"])) {
                }else{
                    session_unset();
                    session_destroy();
        echo "window.location.href='index.php';";
                    }  
    ?>}
    </script>
    <!-- FIN DEL ENCABEZADO --> 


        


        


        <!--Ruteo de la página-->
        
            <div id="contentfull" align="left">
                
                <div class="margin">
                    <DIV id=pathway>
                        
                                <SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
                                
                                <a class=bold href="#">Servicio a clientes</a>
                                
                                <img title="Cambiar Apariencia del Menú" id="icon" src="img/menuicon.png" width="20px" height="20px" style="float: right;">
                                <label title="Cambiar Apariencia del Menú"  id="uno" style="float: right; width:40px;  padding-left:10px; padding-top: 3px;  height:15px;  font-size:13px;">Menú</label> 
                                
                        
                            

                            
                    </div>
                
        
                
        
        
        
        
    


    <DIV id=maincontent>
    <DIV class=left id=contentBasicoSeccionfulllistmenu>
            <DIV id=contentBox>
            
            
            <img src="img/img.png" width="870" height="430">
            
            
        <DIV class=right id=sideBar>
            <DIV class=sidemenu>
                <DIV class=margin>
                    <h4 align="center">Opciones a Consultar</h4>
                    
                        
                
            <div style=" height:30px;">
        <a class='list' href='pedidoscnvo' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Programa de entregas</a></div>
        
            

    
    <div style=" height:30px; padding-top:4px;">
    <a class='list' href='pedidosrprogramados' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Embarques programados</a></div>
    
    <div style="  height:30px; padding-top:4px;">
    <a class='list' href='saldo_analitico' style="height: 30px; text-align: center; height:auto; padding:9px 0;border-bottom:1px solid #CCCCCC; border-bottom:1px solid #CCCCCC;">Saldo anal&iacute;tico</a></div>
    
            
            <div style="  height:30px; padding-top:4px;">
            <a class='list' href='pagosaplicaciones' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Pagos y aplicaciones</a></div>
    

        
        <div style=" height:30px; padding-top:4px;">
    <a class='list' href='precios' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Precios</a></div>
    
        
    <div style=" height:30px; padding-top:4px;">
    <a class='list' href='cargamovcte' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Carga movimiento</a></div>
    

    <div style="  height:30px; padding-top:4px;">
    <a class='list' href='preciosvigentes' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Precios de venta vigentes</a></div>
    

    <div style=" height:30px; padding-top:4px;">
    <a class='list' href='reporte_facturas' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">&nbsp;Facturaci&oacute;n electr&oacute;nica&nbsp;</a></div>
    
    <div style=" height:30px; padding-top:4px;">
    <a class='list' href='descuentos' onClick=' return documento("/portal",0);' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Condiciones comerciales</a></div>
    

        
    <div style=" height:30px; padding-top:4px;">
        <a class='list' href='reportes_internos' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Reporte de compras</a></div>
        
        
    <div style=" height:30px; padding-top:4px;">
        <a class='list' href='informacioncliente' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Datos generales del cliente</a></div>

        <div style=" height:30px; padding-top:4px;">
        <a class='list' href='historial_estadocuenta' style="height: 30px; text-align: center; height:auto; padding:9px 0; border-bottom:1px solid #CCCCCC;">Historial estado de cuenta</a></div>
    

                </div>  <!--del margen -->
            </div>	<!--del sidemenu -->
        </div> <!--del sidebar-->
                
            </DIV>
        </DIV> <!--del content -->
        
        
        
    <DIV class=left id=contentBasicoSeccionfullnvomenu>
            <DIV id=contentBox2>
            
            <div class="elemnt" id="unoo"> 
            
            </div>
            
            <div class="elemnt3" id="tress"> 
            </div>
            
            <div class="elemnt4" id="cuatroo"> 
            </div>
            <div class="elemnt6" id="sietee"> 
            </div>
            <div class="elemnt5" id="cincoo"> 
            </div> 
            <div class="elemnt2" id="doss"> 
            
            </div>
            
            </DIV>
            
            <div style="height:100%;  margin-left: 10px; margin-top: 10px; margin-bottom: 7px;">
            <label style="font-size:20px;  font-weight: bold; padding-top:20px;">Consultas</label><br>
            </div>
                <DIV id=contentBox3>
                
            
            <div class="elemnt7" id="ochoo"> 
            </div>
            <div class="elemnt8" id="nuevee"> 
            </div>
            <div class="elemnt9" id="diess"> 
            </div>
            <div class="elemnt11" id="docee"> 
            </div>
            <div class="elemnt10" id="oncee"> 
            </div>
            <div class="elemnt51" id="seiss"> 
            </div> 

            </DIV>
            
            
    <?php 
    $selectact = "SELECT t1.folio, t1.aviso, t1.activo 
    from avisosinicio t1 inner join anunciosempresa t2 on t1.folio = t2.folioanuncio where t1.activo = '1' and t2.folioempresa = '".$_SESSION['idempresa']."'";
     
    $resultx = $connect->query($selectact);
                        if ($resultx->num_rows > 0) {
                            while($rowx = $resultx->fetch_assoc()) {
                                $dataAvisos[] = $rowx;
                            }
                        }
    $ruta = "";
    foreach($dataAvisos as $Aviso){
        
        $ruta = "https://portal.competro.mx/avisosinicio/".$Aviso['aviso']; 
        
        
    }
    echo '
        <div class="popup" onclick="myFunction()" style=" position:absolute; z-index: 1000; background-color:blue; width:780px;" align="center">
            <span class="popuptext" id="myPopup">
            <div style="display: flex;
            flex-direction: row;">    
            <img src="'.$ruta.'" style="width:450px; height:600px;"></img><img src="https://portal.competro.mx/img/close.png" style="width:50px; height:50px;"></img>
            </div>
            </span>
            
        </div>
        
        <div class="popup" style=" position:absolute; z-index: 1000; background-color:blue; width:780px;" align="center">
            <span class="popuptext" id="myPopup1">
            <div style="display: flex;
            flex-direction: row;">    
            <img onclick="abrirEncuesta()"   src="img/NotificacionencuestaclienteMayo.png" style="width:450px; height:600px;"></img><img onclick="myFunction1()" src="https://portal.competro.mx/img/close.png" style="width:50px; height:50px;"></img>
            </div>
            </span>
            
        </div>


                <!-- Video Pop up -->
        <div class="popup1" style=" position:absolute; z-index: 1000; background-color:blue; width:780px;" align="center">
            <span class="popuptext1" id="myPopup2">
            <div style="display: flex;
            flex-direction: row;">     
            <video  autoplay controls src="videos/vidLerma.mp4" width="460" height="600"  ></video> 
            <img onclick="myFunction2()" src="https://portal.competro.mx/img/close.png" style="width:30px; height:30px;"></img>
            </div>
            </span>
            
        </div>

        <!-- Notificacion Semana Santa -->
        <div class="popup" style=" position:absolute; z-index: 1000; background-color:blue; width:780px;" align="center">
            <span class="popuptext" id="myPopup3">
            <div style="display: flex;
            flex-direction: row;">    
            <img src="img/NotificacionSemanaSantaPEMEX.png" style="width:450px; height:600px;"></img><img onclick="myFunction3()" src="https://portal.competro.mx/img/close.png" style="width:50px; height:50px;"></img>
            </div>
            </span>
        
        </div>
        
        <div class="popup" style=" position:absolute; z-index: 1000; background-color:blue; width:780px;" align="center">
            <span class="popuptext" id="myPopup4">
            <div style="display: flex;
            flex-direction: row;">    
            <img src="img/NotificacionSemanaSantaPEMEXMaCelida.png" style="width:450px; height:600px;"></img><img onclick="myFunction4()" src="https://portal.competro.mx/img/close.png" style="width:50px; height:50px;"></img>
            </div>
            </span>
    
        </div>
    ';

    echo "
    ";
    //echo $ruta."<br>";

    ?>



    <script>
    // When the user clicks on <div>, open the popup
    function myFunction() {  
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }

    function myFunction1() {  
        var popup1 = document.getElementById("myPopup1");
        popup1.classList.toggle("show");
    }

    function myFunction2() {  
        var popup1 = document.getElementById("myPopup2");
        popup1.classList.toggle("show");
    }
    //Mensaje semana santa Todos
    function myFunction3() {  
        var popup1 = document.getElementById("myPopup3");
        popup1.classList.toggle("show");
    }
    //Mensake Semana Santa MaCelida
    function myFunction4() {  
        var popup1 = document.getElementById("myPopup4");
        popup1.classList.toggle("show");
    }



    function abrirEncuesta(){
        window.open(
        'https://portal.competro.mx/encuesta_cte.php',
        '_blank'
        );
            var popup1 = document.getElementById("myPopup1");
        popup1.classList.toggle("show");
        
    }
    </script>


    <?php 

    if($ruta != ""){
        echo "<script>myFunction();</script>";
        
    }
    /*
    if($_SESSION['idempresa'] != '2510' && $_SESSION['idempresa'] != '2511'){
        echo "<script>myFunction1();</script>";
        
    }

    if($_SESSION['idempresa'] == '2525' ){
        echo "<script>myFunction4();</script>";
    }

    if($_SESSION['idempresa'] != '2525'){
        echo "<script>myFunction3();</script>";
        
    }

    //Unicamente Para mostrar a usuario Manual

    if ($_SESSION['idempresa']=='2522'){  
        echo "<script>myFunction1();</script>";
    }*/

    //echo "<script>myFunction1();</script>"; 

    //video de aniversario
    if ($_SESSION['idempresa']=='2531'){  
        //echo "<script>myFunction2();</script>";
    }

    //Mensaje Semana Santa
    if($_SESSION['idempresa'] == '2525' ){
        //echo "<script>myFunction4();</script>";
    }

    if($_SESSION['idempresa'] != '2525' && $_SESSION['idempresa'] != '2522'){
        //echo "<script>myFunction3();</script>";
        
    }
    ?>

    
            
            
            
        </DIV> <!--del content -->
        
        
        
        
        <script>
        document.getElementById("unoo").setAttribute('onclick', 'location.href = "pedidoscnvo"'); 
        document.getElementById("doss").setAttribute('onclick', 'location.href = "preciosv"'); 
        document.getElementById("tress").setAttribute('onclick', 'location.href = "pedidosrprogramados"'); 
        document.getElementById("cuatroo").setAttribute('onclick', 'location.href = "saldo_analitico"'); 
        document.getElementById("cincoo").setAttribute('onclick', 'location.href = "pagosaplicaciones"'); 
        //document.getElementById("seiss").setAttribute('onclick', 'location.href = "registrornotascreditocte"'); 
        
        document.getElementById("sietee").setAttribute('onclick', 'location.href = "cargamovcte"'); 
        document.getElementById("ochoo").setAttribute('onclick', 'location.href = "preciosvigentes"'); 
        document.getElementById("nuevee").setAttribute('onclick', 'location.href = "reporte_facturas"'); 
        document.getElementById("diess").setAttribute('onclick', 'location.href = "descuentos"'); 
        document.getElementById("oncee").setAttribute('onclick', 'location.href = "informacioncliente"'); 
        document.getElementById("docee").setAttribute('onclick', 'location.href = "reportes_internos"'); 
        document.getElementById("seiss").setAttribute('onclick', 'location.href = "historial_estadocuenta"'); 
        </script>
        
        
        

            
    </div> <!--del maincontent del header-->



    
    </div>

    <br><br>
    <script>
    renderFooter();
    </script>
    

    </div> 
    
    </body>
    </html>














    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    var bool = true;
    $(document).ready(function(){
    $("#uno").click(function(){
    if(bool == true){
    $("#contentBasicoSeccionfulllistmenu").show(1000);
        $("#contentBasicoSeccionfullnvomenu").hide(1000);
        $("#icon").attr("src","img/menuiconnn.png");
        
        bool = false;
    }else{
    $("#contentBasicoSeccionfulllistmenu").hide(1000);
        $("#contentBasicoSeccionfullnvomenu").show(1000);
        $("#icon").attr("src","img/menuicon.png");
        
        bool = true;
    }
    
    }
    
    
    );
    
    
    
        $("#icon").click(function(){
    if(bool == true){
    $("#contentBasicoSeccionfulllistmenu").show(1000);
        $("#contentBasicoSeccionfullnvomenu").hide(1000);
        $("#icon").attr("src","img/menuiconnn.png");
        
        bool = false;
    }else{
    $("#contentBasicoSeccionfulllistmenu").hide(1000);
        $("#contentBasicoSeccionfullnvomenu").show(1000);
        $("#icon").attr("src","img/menuicon.png");
        
        bool = true;
    }
    
    }
    
    
    );
    
    
    });
    </script>
    <script language="JavaScript" src="scripts/datetime.js"></script>









