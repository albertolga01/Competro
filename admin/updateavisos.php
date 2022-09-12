<?php
    require 'connector.php';
    global $connect;  
	
	$Folio = $_POST["folio"]; 
	$Activo = $_POST["checkactivo"]; 
 
 

	

	
	for($i = 0; $i < sizeof($Folio); $i ++){
 

            $queryinsert = "UPDATE avisosinicio set activo = '0' where folio = '".$Folio[$i]."'"; 
 
       
        $resultquery = $connect->query($queryinsert);
	    
	   
	   
	} 
    
 
	
	for($i = 0; $i < sizeof($Folio); $i ++){

        if (in_array($Activo[$i], $Folio)) { 
            $queryinsert = "UPDATE avisosinicio set activo = '1' where folio = '".$Activo[$i]."'";
        } 
 
       
        $resultquery = $connect->query($queryinsert);
	   
	  // echo $queryinsert."<br>";
	   
	   
	} 
 
        if($resultquery == 1){
            echo'
                <body onload="setTimeout(function() { document.back.submit() }, 1000)"> 
                    <form method="post" action="carga_avisoiniciosesion.php" name="back"> 
                        <input type="hidden" name="mensaje" value="Actualizado Correctamente"/> 		 
                    </form>
                </body>
            ';
        } else {
            echo'
                <body onload="setTimeout(function() { document.back.submit() }, 1000)"> 
                    <form method="post" action="carga_avisoiniciosesion.php" name="back"> 
                        <input type="hidden" name="mensaje" value="Error al Actualizar"/> 		 
                    </form>
                </body>
            ';
        }   
        
 
        $connect->close();
    
?>