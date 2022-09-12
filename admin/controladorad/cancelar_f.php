<?php


//Agregar la fecha en los descuentos que guarda la Ximena 

 
require 'connector.php';
 
    if($_SERVER["REQUEST_METHOD"]=="POST")
    { 
        Uno();
    }

    function Uno()
    { 
//    <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
        echo ' 
       
     <form method="post" action="../cancelar_factura.php" name="frm1"> ';


  global $connect; 
  $foliop = $_POST["foliopago"];
  foreach($foliop as $f){
    if($f == "1"){
 echo $f;
 //Update estado cuenta
     }else{
//Update movimientos 

     }
     
  }

  //update pedido 
  facturado = '0'
  foliofactura = 'null'


  //Update factura 
  //estado
   

  //Cancelar el timbre 
  
 

        
 
        echo '    
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