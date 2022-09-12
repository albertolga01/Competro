<?php



if($_SERVER["REQUEST_METHOD"]=="POST"){

	require 'connector.php';

	Login();

}





function Login()

{

	

	

	

	global $connect;

	

	

	  

		$IdEMpresa = $_POST["idempresa"];

		$idcapacidad = $_POST["idcapacidad"];
 

		

		

	    $query = "Insert into capacidadvehiculos (idempresa, id_capacidad) values ('".$IdEMpresa."','".$idcapacidad."')";
 

		$result = mysqli_query($connect,$query);

		

		if(($result)==1){

			

			

				 



echo '

		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

		   <form method="post" action="../clientes.php" name="frm1">

		   <input type="hidden" name="mensaje" value="Información Agregada Correctamente" /> 

	       </form>

		   </body> ';	

		

			

		//	header("location: NvoClienteGC.html");

			exit();

		}else{

			

			 



echo '

<body onload="setTimeout(function() { document.frm1.submit() }, 500)">


		   <form method="post" action="../clientes.php" name="frm1">

		   <input type="hidden" name="mensaje" value="Error al Agregar Infomación" /> 

	       </form>

		   </body> ';	

			

			// header("location: NvoClienteError.html");

			exit();

		}

		

		



	mysqli_query($connect,$query) or die(mysqli_error($connect));

	mysqli_close($connect); 

}



?>

