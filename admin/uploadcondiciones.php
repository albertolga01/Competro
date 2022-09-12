<?php
 
$uploaddir = '../Condiciones/';
    $uploadfile = $uploaddir . basename($_FILES['file']['name']); 

 	
	$data = file_get_contents($_FILES['file']['tmp_name']); 

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) { 
	
	
		 
		echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="cargacondiciones.php" name="frm1">
		   <input type="hidden" name="mensaje" value="Agregado Correctamente" /> 
	       </form>
		   </body> ';	

    } else {
        echo "";
    }
	
	
	
	
	
?>