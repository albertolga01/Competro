

<?php



if($_SERVER["REQUEST_METHOD"]=="POST"){

	require 'connector.php';

	Login();

}





function Login()

{

	

	

	

	

	

	

	

	

	

	

	global $connect;

	

	

	

		$id= $_POST["id"];
  

		

		//echo $folio;

		

		

		

$query = "Update capacidadvehiculos set activo = '0' where id= '".$id."' ";

 

		$result = mysqli_query($connect,$query);

		

		if(($result)==1){ 

		 echo '     <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

					   <form method="post" action="../clientes.php" name="frm1"> 

						  <input type="hidden" name="mensaje" value="Actualizado Correctamente" />  

					   </form>

					</body> 

					  '; 

			exit();

		}else{ 

		

		

			 

echo '     <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

					   <form method="post" action="../clientes.php" name="frm1"> 

						  <input type="hidden" name="mensaje" value="Error al Actualizar" />  

					   </form>

					</body> 

					  '; 



			 

			exit();

		}

		

		



	mysqli_query($connect,$query) or die(mysqli_error($connect));

	mysqli_close($connect); 

}



?>

