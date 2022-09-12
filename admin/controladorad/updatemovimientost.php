
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	 
	session_start();	 
	
	global $connect;
	
	
	
	 Guardar();
		
			
   }





function Guardar(){
	global $connect; 
	
	   $folio = $_POST["folio"]; 
	   $status = $_POST["Status"]; 
	    $index = 0; 
	 
		
	foreach($folio as $F){	 


			 
			  
				$query = "Update depositos set Status = '".$status[$index]."' where folio = '".$F."'";
				
				$result = mysqli_query($connect,$query);
				
				
				$index++;
				
			}
		
		if(($result)==1){ 
		 
	 //  Notificacion();
	   
	 
	   echo ' 
      <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
      <form method="post" action="../registrormovimientossolicitud.php" name="frm1"> 
      </form>
      </body>  ';
	     	
	  exit();
      }else{ 
		
	 
        echo '  
			   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
			   <form method="post" action="../registrormovimientossolicitud.php" name="frm1"> 
			   </form>
			   </body> ';
		 
                  	exit();
    }
		
	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
	
}



function Notificacion(){
	
	
	
	
require __DIR__ . '/vendor/autoload.php';

  $options = array(
    'cluster' => 'us3',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '2d121696457cd9fb762b',
    '38789528e9faed125322',
    '1018745',
    $options
  );
  $data['Mensaje'] = 'Se Actualizó un Pedido';
  $data['Usuario'] = $_SESSION['usuario'];

  $pusher->trigger('my-channel', 'my-event', $data);
}





?>
