<?php


//Agregar la fecha en los descuentos que guarda la Ximena 

 
require 'connector.php';
 
    if($_SERVER["REQUEST_METHOD"]=="POST")
    { 
        Uno();
    }

    function Uno()
    { 
//   
        echo ' 
        <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
     <form method="post" action="../cancelar_factura.php" name="frm1"> ';
 

        global $connect; 
        //Get UUID from facturas 
		 $folio = $_POST["foliofactura"]; 
         $UUID = "Select t1.uuid, t1.fp, t1.idempresa,t1.factura, t1.total, t1.fecha,   t1.restante, t2.rzonsocial from facturas t1 inner join empresa t2 on t1.idempresa = t2.idempresa inner join estadocuenta t3 on t1.idempresa = t3.idempresa where t1.folio = '".$folio."'";
         $resF = $connect->query($UUID); 
         if ($resF->num_rows > 0) {
             while($rocF = $resF->fetch_assoc()) {  
                 $Uuid = $rocF['uuid'];  
                 $idempresa = $rocF['idempresa'];   
                 $restante = $rocF['restante'];  
                 $rzonsocial = $rocF['rzonsocial'];  
                 $factura = $rocF['factura'];  
                 $total = $rocF['total'];  
                 $fecha = $rocF['fecha'];  
                 $tipop = $rocF["fp"];  
            

                
             }
        } 
    

        //Get Pagos Aplicaciones -> Set Baja
        $Q = "SELECT t1.folio, t1.fechacaptura, t1.abono, t1.inactivo, t1.documento, t1.foliopago  FROM cargosaplicaciones t1 INNER JOIN facturas t2 ON t1.factura = t2.factura
        WHERE t2.folio = '".$folio."'";
     
        $resF = $connect->query($Q); 
        if ($resF->num_rows > 0) {
            while($rocF = $resF->fetch_assoc()) {  
                $QUpdate  = "Update cargosaplicaciones set inactivo = '1' where folio = '".$rocF["folio"]."'";
               // $resU= $connect->query($QUpdate);
                 echo '<input type="hidden" name="folio[]" value="'.$rocF["folio"].'">';
                 echo '<input type="hidden" name="fechacaptura[]" value="'.$rocF["fechacaptura"].'">';
                 echo '<input type="hidden" name="abono[]" value="'.$rocF["abono"].'">';
                 echo '<input type="hidden" name="inactivo[]" value="'.$rocF["inactivo"].'">';
                 echo '<input type="hidden" name="documento[]" value="'.$rocF["documento"].'">';
                 echo '<input type="hidden" name="foliopago[]" value="'.$rocF["foliopago"].'">';
              
               
            }
       } 


       
//Update factura -> set Baja 
        $QUpdateF  = "Update cargosaplicaciones set inactivo = '1' where folio = '".$rocF["folio"]."'";
        // $resF= $connect->query($QUpdateF);
 

 
        echo '   
        <input type="hidden" name="UUID" value="'.$Uuid.'"> 
        <input type="hidden" name="factura" value="'.$factura.'"> 
        <input type="hidden" name="fecha" value="'.$fecha.'"> 
        <input type="hidden" name="tipop" value="'.$tipop.'"> 
        <input type="hidden" name="total" value="'.$total.'"> 
        <input type="hidden" name="rzonsocial" value="'.$rzonsocial.'"> 
        <input type="hidden" name="estado" value="'.$estado.'"> 
        <input type="hidden" name="restante" value="'.$restante.'"> 
        <input type="hidden" name="idempresa" value="'.$idempresa.'">   
        <input type="hidden" name="foliofactura" value="'.$_POST["foliofactura"].'"> 
     </form>
     </body>  '; 
 

    }


    
    function CancelarTimbre()
    { 
        
    }


    function Credito()
    { 
    }

    function Contado()
    {  
    }
 

   

?>