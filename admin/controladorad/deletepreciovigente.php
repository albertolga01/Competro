<?php 
require "connector.php"; 
global $connect;

$ano = substr($_POST["fecha"], 6, 4);
$mes = substr($_POST["fecha"], 3, 2);
$dia = substr($_POST["fecha"], 0, 2); 
$date = $ano."-".$mes."-".$dia; 
 
$query = "DELETE FROM precioventavigente WHERE fecha = '".$date."'"; 
$result = mysqli_query($connect,$query);
//echo $query;

 
if(($result) ==  1){
// 

    echo '
<body onload="setTimeout(function() { document.frm1.submit() }, 500)">
   

        <form method="POST" action="../preciosvigentesadmin.php" name="frm1">

            <input type="hidden" name="mensaje" value="Eliminado Correctamente" />  
        </form>

        </body> 

    ';	

} else {
// 
    echo '

       <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

        <form method="POST" action="../reporte_fapreciosvigentesadmin.php" name="frm1">

            <input type="hidden" name="mensaje" value="Error al eliminar" />  

        </form>

        </body> 

    ';	

}

?>

  