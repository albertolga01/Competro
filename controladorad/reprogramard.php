<?php



//checar si ya se ha capturado esa condicion de envio ese dia if not continue to posting pedido





if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


 

function Login()
{
 
	
	
	
	
		 
	 
		
			
			 
				Reprogramar();
				
				 
					
		 
			
			
				
	  
}


function Reprogramar(){
	
	global $connect;

	session_start();	
	
	
	
		
	
	
		if(isset($_POST['medio'])=='AT'){
			$Medio = 'AUTOTANQUE'; 
		}
		
		
	
	global $connect;
	$id = $_SESSION["idempresa"]; 
		$Usuario = $_SESSION["usuario"]; 
		$Fecha = $_POST["fecha"];     
		$Folio = $_POST["folio"];     
		 
	  
		
		$index = 0;
	
	
	foreach($Folio as $F)  {		
				
				 
					
				 
			echo $_POST["idcondicion"][$index];
				 
					
					
		      	$sql = "SELECT IdCondicion, CentroEntrega, producto, destino, mediot, tipom, entrega FROM condiciones where idcondicion = '".$_POST["sel"][$index]."'";
		
					$result = $connect->query($sql);
 
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {  

					//echo $row["IdCondicion"];
					$CEntrega = $row["CentroEntrega"];
					$Product = $row["producto"];
					$Dest = $row["destino"];
					$Medio = $row["mediot"];
					$Tipo = $row["tipom"];
					$Entregaa = $row["entrega"];
					
					}
					 
					}
					
					$query = "Insert into pedido (Fecha, Producto, Destino,  Presentacion, CentroEntrega, Medio, IdEmpresa, Entrega, Usuario, IdCondicion) 
					values ('".$_POST['fecha']."','".$Product."', '".$Dest."', '".$_POST['presentacion'][$index]."', '".$CEntrega."','AUTOTANQUE',  '".$_SESSION['idempresa']."' , '".$Entregaa."', '".$_SESSION['usuario']."',  '".$_POST["sel"][$index]."'  )";	
				//$result = mysqli_query($connect,$query);
				
				
				
				
				
				$index++;
				
				
	 
                }
				
				
				
			
		
		
		if(($result)==1){ 
		
		 
	 
			echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../pedidoscnvotr.php" name="frm1">
		   <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
		   <input type="hidden" name="Autot" value="AUTOTANQUE" />
		   <input type="hidden" name="CentroEntrega" value="'.$_POST['centroentrega'].'" />
	       </form>
		   </body> ';	 
	 
			exit();
		}else{ 
		 
            echo "<script>
            alert('Error al Guardar Pedido');
            </script>";
		 
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
  $data['Mensaje'] = 'Se Agregó un Nuevo Pedido';
  $data['Usuario'] = $_SESSION['usuario'];

  $pusher->trigger('my-channel', 'my-event', $data);
}

?>