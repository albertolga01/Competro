		<?php



if($_SERVER["REQUEST_METHOD"]=="POST"){

	require 'connector.php';

	Login();

}





function Login()

{

	

	

	

	global $connect;

	

	

	  

		$IdEMpresa = $_POST["idempresa"];

		$Direccion = $_POST["direccion"];

		$Cp = $_POST["cp"];

		$Regimen = $_POST["regimen"];

		$regimenf = $_POST["regimenf"];

		$rzonsocialf = $_POST["rzonsocialf"];

		

		

	    $query = "Insert into informacionfiscal (idempresa, direccion, cp, regimen, regimenf, rzonsocialf) 

		values ('".$IdEMpresa."','".$Direccion."', '".$Cp."','".$Regimen."', '".$regimenf."', '".$rzonsocialf."')";
 

		$result = mysqli_query($connect,$query);

		

		if(($result)==1){

			

			

					 





echo '

		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

		   <form method="post" action="../clientes" name="frm1">

		   <input type="hidden" name="mensaje" value="Información Agregada Correctamente" /> 

	       </form>

		   </body> ';	

		

			

		//	header("location: NvoClienteGC.html");

			exit();

		}else{

			

			 



echo '

		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

		   <form method="post" action="../clientes" name="frm1">

		   <input type="hidden" name="mensaje" value="Error al Agregar Información" /> 

	       </form>

		   </body> ';	

			

			// header("location: NvoClienteError.html");

			exit();

		}

		

		



	mysqli_query($connect,$query) or die(mysqli_error($connect));

	mysqli_close($connect); 

}



?>

