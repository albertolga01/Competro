

<?php



if($_SERVER["REQUEST_METHOD"]=="POST"){

	require 'connector.php';

	Login();

}





function Login()

{

	global $connect;

	

	

		$IdEmpresa = $_POST["idempresa"];

	    $Direccion = $_POST["direccion"]; 

		$Cp = $_POST["cp"];

		$Regimen = $_POST["regimen"]; 
		
		$Color = $_POST["color"];

		$rzonsocialdos = $_POST["rzonsocialdos"];

		$regimenf  = $_POST["regimenf"];
		
		$rzonsocialf  = $_POST["rzonsocialf"];

$query = "Update informacionfiscal set Direccion = '".$Direccion."', Cp = '".$Cp."', Regimen = '".$Regimen."', regimenf = '".$regimenf."', rzonsocialf = '".$rzonsocialf."' where IdEmpresa= '".$IdEmpresa."' and IdEmpresa = '".$IdEmpresa."' ";

 

		$result = mysqli_query($connect,$query);

		

		if(($result)==1){ 


			$query1 = "Update empresa set  Rzonsocialdos = '".$rzonsocialdos."', Color = '".$Color."' where IdEmpresa= '".$IdEmpresa."' ";

 

		$result1 = mysqli_query($connect,$query1);

		

		if(($result1)==1){ 

	 



echo ' 

					   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

					   <form method="post" action="../clientes" name="frm1"> 

						  <input type="hidden" name="mensaje" value="Información Actualizada Correctamente" />  

					   </form>

					</body>

					    

					  '; 

		

		

		 

			exit();
		}

		}else{ 

		//

		

		 

echo ' 

					   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

					   <form method="post" action="../clientes" name="frm1"> 

						  <input type="hidden" name="mensaje" value="Error al Actualizar Información" />  

					   </form>

					</body>

					    

					  '; 

			//header("location:destinos.php");

			exit();

		}

		

		



	mysqli_query($connect,$query) or die(mysqli_error($connect));

	mysqli_close($connect); 

}



?>

