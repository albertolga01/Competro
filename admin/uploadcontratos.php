<?php
    require 'connector.php';
    global $connect; 
    session_start();
    $uploaddir = '../comprobantes/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) { 
        $queryinsert = 'INSERT INTO contratos(IdEmpresa, Contrato) VALUES ('.$_POST['empresa'].', "'.$_FILES['userfile']['name'].'")';
        $resultclientes = $connect->query($queryinsert);

        if($resultclientes === TRUE){
            echo'
                <body onload="setTimeout(function() { document.back.submit() }, 1000)"> 
                    <form method="post" action="cargacontratos.php" name="back"> 
                        <input type="hidden" name="mensaje" value="Contrato Guardado Correctamente"/> 		 
                    </form>
                </body>
            ';
        } else {
            echo'
                <body onload="setTimeout(function() { document.back.submit() }, 1000)"> 
                    <form method="post" action="cargacontratos.php" name="back"> 
                        <input type="hidden" name="mensaje" value="Error al agregar contrato"/> 		 
                    </form>
                </body>
            ';
        }

        $connect->close();
    } else {
        echo"No hay archivo";
    }
?>