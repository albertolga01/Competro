<?php
    require 'connector.php';
    global $connect;  
	
	$Folio = $_POST["folioe"]; 
 
		$queryinsert = "DELETE from avisosinicio where folio = '".$Folio."'";  
        $resultquery = $connect->query($queryinsert);
	

 
  
	
	 
        if($resultquery == "1"){
            echo'
                <body onload="setTimeout(function() { document.back.submit() }, 1000)"> 
                    <form method="post" action="carga_avisoiniciosesion.php" name="back"> 
                        <input type="hidden" name="mensaje" value="Eliminado Correctamente"/> 		 
                    </form>
                </body>
            ';
        } else {
            echo'
                <body onload="setTimeout(function() { document.back.submit() }, 1000)"> 
                    <form method="post" action="carga_avisoiniciosesion.php" name="back"> 
                        <input type="hidden" name="mensaje" value="Error al Eliminar"/> 		 
                    </form>
                </body>
            ';
        }   
  
 
        $connect->close();
    
?>