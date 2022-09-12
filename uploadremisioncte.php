<?php
 require 'connector.php';
$uploaddir = 'comprobantes/';
$foliofactura = $_POST['foliofactura']."-";
    $uploadfile = $uploaddir . basename($foliofactura.$_FILES['file']['name']); 
	session_start();	
	global $connect;
 	
	$data = file_get_contents($_FILES['file']['tmp_name']); 
	
	$Factura =  $_FILES['file']['name'];
	$IdEmpresa = $_SESSION['idempresa'];
	
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) { 
	
	//guarda nombre del doc y la descripcion en una tabla  y postear back 


//	$query = "Insert into depositos (Comprobante, descripcion, IdEmpresa) values ('".$Factura."', '".$descripcion."', '".$IdEmpresa."')"; 
		$query = "update facturas set remision='".$uploadfile."' where folio = '".$_POST["foliofactura"]."'";
//		 echo $query;
		$result = mysqli_query($connect,$query);
		if($result==1){ 
			
			//  
			echo '
					 <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
					  
					   <form method="post" action="pedidosrprogramados.php" name="frm1"> 
						  <input type="hidden" name="mensaje" value="Remision Guardada Correctamente" /> 
						 
					   </form>
					</body>
					   
					   
					  '; 
			
		
		Notificacion($descripcion);
			//  
		}else{ 
				echo '
					  <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
					 
					   <form method="post" action="pedidosrprogramados.php" name="frm1"> 
						  <input type="hidden" name="mensaje" value="Error al subir remision 1601" /> 
						 
					   </form>
					</body>
					   
					   
					  '; 
			
			
		}
	
	
		

    } else {
        echo "";
    }
	
	
	

function Notificacion($string){
	
	
	
	
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
  $data['Mensaje'] = 'Se ha capturado una remisión '.$string.'';
  $data['Usuario'] = $_SESSION['usuario'];

  $pusher->trigger('my-channel', 'my-event', $data);
}
	
	
?>