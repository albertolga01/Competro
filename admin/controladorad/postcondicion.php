<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    require 'connector.php';
    Login();
}

function Login(){
    global $connect;
    $IdEMpresa = $_POST["idempresa"];
    $IdCondicion = $_POST["idcondicion"];
    $CentroEntrega = $_POST["centroentrega"];
    $Producto = $_POST["producto"]; 
    $Destino = $_POST["destino"]; 
    $Moneda = $_POST["moneda"]; 
    $MedioT = $_POST["mediot"]; 
    $TipoM = $_POST["tipom"]; 
    $Entrega = $_POST["entrega"]; 
    $Descripcion = $_POST['descripcion'];
    $query = "INSERT INTO condiciones (idempresa, idcondicion, centroentrega, producto, destino, moneda, mediot, tipom, entrega, Descripcion) 
        VALUES ('".$IdEMpresa."','".$IdCondicion."', '".$CentroEntrega."','".$Producto."','".$Destino."','".$Moneda."','".$MedioT."','".$TipoM."','".$Entrega."','".$Descripcion."')";
    $result = mysqli_query($connect,$query);
    
    if(($result)==1){
        echo '
        <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
        <form method="post" action="../clientes.php" name="frm1">
        <input type="hidden" name="mensaje" value="Condición Agregada Correctamente" /> 
        </form>
        </body> ';	
        exit();
    }else{
        echo '
        <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
        <form method="post" action="../clientes.php" name="frm1">
        <input type="hidden" name="mensaje" value="Error al Agregar Condición" /> 
        </form>
        </body> ';	
        exit();
    }
    
    mysqli_query($connect,$query) or die(mysqli_error($connect));
    mysqli_close($connect); 
}

?>