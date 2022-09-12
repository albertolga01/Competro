<?php

require "connector.php";
global $connect;

$query = "DELETE FROM preciosproducto WHERE Folio = '".$_POST['Folio']."'";
$result = mysqli_query($connect,$query);

if(($result) ==  1){
    echo '
        <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
        <form method="POST" action="../capturapreciosproducto.php" name="frm1">
            <input type="hidden" name="mensaje" value="Eliminada Correctamente" /> 
        </form>
        </body> 
    ';	
} else {
    echo '
        <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
        <form method="POST" action="../capturapreciosproducto.php" name="frm1">
            <input type="hidden" name="mensaje" value="Error al eliminar" /> 
        </form>
        </body> 
    ';	
}
?>
  