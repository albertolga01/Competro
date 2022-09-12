<?php
    require 'connector.php';
    global $connect; 
    session_start();
    $uploaddir = '../../avisosinicio/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) { 
        $queryinsert = 'INSERT INTO avisosinicio (aviso, activo) VALUES ("'.$_FILES['userfile']['name'].'", 1)';
        $resultquery = $connect->query($queryinsert);



        $lastfolioanuncio = "SELECT folio from avisosinicio order by folio desc limit 1";
        $result = $connect->query($lastfolioanuncio);
        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) {
                $folioanuncio = $row['folio'];
            }
        }

        $empresas = $_POST['empresa'];

        foreach($empresas as $empresa){
            $queryinsert = 'INSERT INTO anunciosempresa (folioanuncio, folioempresa) VALUES ("'.$folioanuncio.'", "'.$empresa.'")';
            $resultquery = $connect->query($queryinsert);
    
        }

        if($resultquery === TRUE){
            echo'
                <body onload="setTimeout(function() { document.back.submit() }, 1000)"> 
                    <form method="post" action="../carga_avisoiniciosesion.php" name="back"> 
                        <input type="hidden" name="mensaje" value="Notificación Guardada Correctamente"/> 		 
                    </form>
                </body>
            ';
        } else {
            echo'
                <body onload="setTimeout(function() { document.back.submit() }, 1000)"> 
                    <form method="post" action="../carga_avisoiniciosesion.php" name="back"> 
                        <input type="hidden" name="mensaje" value="Error al agregar Notificación"/> 		 
                    </form>
                </body>
            ';
        }

        $connect->close();
    } else {
        echo"No hay archivo";
    }
?>