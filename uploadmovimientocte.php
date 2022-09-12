<?php
 require 'connector.php';
$uploaddir = 'comprobantes/';
    $uploadfile = $uploaddir . basename($_FILES['file']['name']); 
	session_start();	
	global $connect;
 	
	$data = file_get_contents($_FILES['file']['tmp_name']); 
	$descripcion = $_POST['descripcion'];
	$Factura =  $_FILES['file']['name'];
	$IdEmpresa = $_SESSION['idempresa'];
	
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) { 
	
	//guarda nombre del doc y la descripcion en una tabla  y postear back 

	$query = "Insert into depositos (Comprobante, descripcion, IdEmpresa) values ('".$Factura."', '".$descripcion."', '".$IdEmpresa."')"; 
		$result = mysqli_query($connect,$query); 
		if($result==1){
			
			
			echo '
					  
					   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
					   <form method="post" action="cargamovcte.php" name="frm1"> 
						  <input type="hidden" name="mensaje" value="Movimiento Guardado Correctamente" />
						  <input type="hidden" name="EstadoA" value="CONFIRMADO CLIENTE" />
						 
					   </form>
					</body>
					   
					   
					  '; 
			
		
		Notificacion($descripcion);
			
		}else{
				echo '
					  
					   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
					   <form method="post" action="cargamovcte.php" name="frm1"> 
						  <input type="hidden" name="mensaje" value="Error al subir movimiento 1601" />
						  <input type="hidden" name="EstadoA" value="CONFIRMADO CLIENTE" />
						 
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
  $data['Mensaje'] = 'Se capturó un comprobante de pago: '.$string.'';
  $data['Usuario'] = $_SESSION['usuario'];

  $pusher->trigger('my-channel', 'my-event', $data);
}
	
	
?>