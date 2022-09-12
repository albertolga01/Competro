<?php



//checar si ya se ha capturado esa condicion de envio ese dia if not continue to posting pedido

if($_SERVER["REQUEST_METHOD"]=="POST"){

	require 'connector.php';

	Login();

}



function Exists(){



}



function Login(){

	if(empty($_POST['sel'])){ 		

	echo $_POST["centroentrega"];

			echo '



        <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

        <form method="post" action="../pedidoscnvotrr.php" name="frm1">

        <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />

	    <input type="hidden" name="message" value="Seleccione almenos una una condicion" />

		<input type="hidden" name="CentroEntrega" value="'.$_POST["centroentrega"].'" />

	    <input type="hidden" name="EstadoA" value="CONFIRMADO CLIENTE" /> 

        </form></body> ';

	    } else {

	global $connect;

	session_start();	

		if(isset($_POST['medio'])=='AT'){

			$Medio = 'AUTOTANQUE'; 

		}



		$date = $_POST["fecha"];

		$string = str_replace('/', '-', $date);

		$date = date('Y-m-d',time());//date variable

		$ingresada = strtotime($string);		

		$hoy = strtotime($date);

		$MaxDate =  date('Y-m-d', strtotime($date. ' + 10 days')); 



		if($ingresada>$hoy and $ingresada < strtotime($date. ' + 10 days')   ){

			//Se Realiza Alta de Pedido verifica la hora tambien mas tardar 9 am 

			if($ingresada == strtotime($date .' + 1 day') ){

				Guardar();

				$now = new DateTime();

				$twoPm = new DateTime();

				$twoPm->setTime(8,0); // 9:00 AM

				if ( $now > $twoPm ){ // such comparison exists in PHP >= 5.2.2

				//no guardar   <form method="post" action="../pedidoscnvotr.php" name="frm1">

				echo $_POST['centroentrega'];

				echo'	<script> alert("Pedido No Capturado - Verifique la Fecha y Horak"); </script>

       	<body onload="setTimeout(function() { document.frm1.submit() }, 500)">

        <input type="hidden" name="fini" value="'.$_POST['fecha'].'" /> 

		<input type="hidden" name="CentroEntrega" value="'.$_POST['centroentrega'].'" />

	    <input type="hidden" name="Autot" value="AUTOTANQUE" />

	    </form>';

				}else{

				Guardar();

				}

			}else{

				Guardar();

			}

		}



		else if($ingresada===$hoy){

			//No Se Realiza Alta de Pedido, Establecer Parametros Hora(Plitica de cambios y cancelaciones)		

		echo'	<script> alert("Pedido No Capturado - Verifique la Fecha"); </script>

        <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

        <form method="post" action="../pedidoscnvotr.php" name="frm1">

        <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />

		<input type="hidden" name="CentroEntrega" value="'.$_POST['centroentrega'].'" />

	    <input type="hidden" name="Autot" value="AUTOTANQUE" />

	    </form>';

		}else {

			//No se Permite Realizar el pedido para el pasado	

			echo'	<script> alert("Pedido No Capturado - Verifique la Fecha"); </script>

       	<body onload="setTimeout(function() { document.frm1.submit() }, 500)">

        <form method="post" action="../pedidoscnvotr.php" name="frm1">

        <input type="hidden" name="fini" value="'.$_POST['fecha'].'" /> 

		<input type="hidden" name="CentroEntrega" value="'.$_POST['centroentrega'].'" />

	    <input type="hidden" name="Autot" value="AUTOTANQUE" />

	    </form>';

		}

			}  

}



function Guardar(){



	



	global $connect;



	$id = $_SESSION["idempresa"]; 



		$Usuario = $_SESSION["usuario"]; 



		$Fecha = $_POST["fecha"]; 



		$Producto = $_POST["producto"];



		$Destino = $_POST["destino"];  



		$Presentacion = $_POST["presentacion"];



		$CentroEntrega = $_POST["centroentrega"];



		$Medio = $_POST["medio"]; 



		$Entrega = $_POST["entrega"]; 



		$sel = $_POST["sel"];



		



		$index = 0;



	



	



	foreach($Destino as $Destino)  {		



				



				if((isset($_POST['sel'][$index]))==$_POST['idcondicion'][$index]){



					



					//if no exist {



				//		$sqldos = "select IdCondicion where IdCondicion = '".$_POST['idcondicion']."' and fecha	='".$_POST['fecha']."' limit 1"



				//		$resultt = $connect->query($sqldos);



				//		if ($resultt->num_rows > 0) {



					// output data of each row



				//	while($row = $result->fetch_assoc()) {  



				//		}



				//		}else{



							



							



			//			}



			



			



				 



					



					



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



				$result = mysqli_query($connect,$query);



				}



				$index++;



				



				



				//}



                }



				



				



				



			



		



		



		if(($result)==1){ 



		



		 if (isset($_POST['dos'])) {	



		 



		 Notificacion();



			echo '



		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">



		   <form method="post" action="../pedidoscnvotr.php" name="frm1">



		   <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />



		   <input type="hidden" name="Autot" value="AUTOTANQUE" />



		   <input type="hidden" name="CentroEntrega" value="'.$_POST['centroentrega'].'" />



	       </form>



		   </body> ';	 



		} else {



		    //no button pressed



			}



			exit();



		}else{ 



		 if (isset($_POST['dos'])) {



            echo "<script>



            alert('Error al Guardar Pedido');



            </script>";



		} else {



        //no button pressed



        }



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