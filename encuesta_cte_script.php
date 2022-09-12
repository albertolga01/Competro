<?php 
//echo "si jala";
    require 'connector.php';
    global $connect;
    session_start();

    // $Query = "SELECT * FROM ip";
    // $res = $connect->query($Query);
    // if($res->num_rows > 0){
    //     while($row = $res->fetch_object()) {  
    //         print_r($row);
    //     }
    // } 

    if(isset($_POST)){

        $empresa = $_POST["empresa"];
        $puesto = $_POST["puesto"];
        $pr1 = $_POST["r1"];
        $pr2 = $_POST["r2"];
        $pr3 = $_POST["r3"];
        $pr4 = $_POST["r4"];
        $pr5 = $_POST["r5"];
        $pr6 = $_POST["r6"];
        $pr7 = $_POST["r7"];
        $pr8 = $_POST["r8"];
        $pr9 = $_POST["r9"];
        $pr10 = $_POST["r10"];

        $Query = "INSERT INTO encuesta_cte(empresa, puesto, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10, fecha)
            VALUES('{$empresa}', '{$puesto}', '{$pr1}', '{$pr2}', '{$pr3}', '{$pr4}', '{$pr5}', '{$pr6}', '{$pr7}', '{$pr8}', '{$pr9}', '{$pr10}', CURRENT_TIMESTAMP)";
        if($connect->query($Query)){
            echo "Datos Recibidos, Gracias";
        } else {
            echo "Error al recibir los datos";
         
        }

    }

    
?>

