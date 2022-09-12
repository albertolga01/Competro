<?php



require "connector.php";

global $connect;



$query = "UPDATE facturas set remision = null WHERE Folio = '".$_POST['folio']."'"; 
$result = mysqli_query($connect,$query);



if(($result) ==  1){

    echo '

    <body onload="setTimeout(function() { document.frm1.submit() }, 500)">


        <form method="POST" action="../reporte_facturas_admin.php" name="frm1">

            <input type="hidden" name="mensaje" value="Eliminado Correctamente" /> 
            <input type="hidden" name="finial" value="'.$_POST["finial"].'" /> 
            <input type="hidden" name="fini" value="'.$_POST["fini"].'" /> 
            <input type="hidden" name="IdEmpresa" value="'.$_POST["IdEmpresa"].'" /> 
        </form>

        </body> 

    ';	

} else {
// 
    echo '

       <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

        <form method="POST" action="../reporte_facturas_admin.php" name="frm1">

            <input type="hidden" name="mensaje" value="Error al eliminar" /> 
            <input type="hidden" name="finial" value="'.$_POST["finial"].'" /> 
            <input type="hidden" name="fini" value="'.$_POST["fini"].'" /> 
            <input type="hidden" name="IdEmpresa" value="'.$_POST["IdEmpresa"].'" /> 

        </form>

        </body> 

    ';	

}

?>

  