<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

	require 'connector.php';

	Login();

}

function Login()

{

	global $connect;

		$IdEMpresa = $_POST["idempresa"];

		$IdReferencia = $_POST["idreferencia"];

		$Referencia = $_POST["referencia"];

        $Banco = $_POST["banco"];

		$Descripcion = $_POST["descripcion"];

	    $query = "Insert into referencias (idempresa, idreferencia, referencia, banco, descripcion) values ('".$IdEMpresa."','".$IdReferencia."', '".$Referencia."','".$Banco."','".$Descripcion."')";

		$result = mysqli_query($connect,$query);

		if(($result)==1){

echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

		   <form method="post" action="../clientes.php" name="frm1">

		   <input type="hidden" name="mensaje" value="Referencia Agregada Correctamente" /> 

	       </form>

		   </body> ';	

		//	header("location: NvoClienteGC.html");

			exit();


		}else{

echo '

		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

		   <form method="post" action="../clientes.php" name="frm1">

		   <input type="hidden" name="mensaje" value="Error al Agregar Referencia" /> 

	       </form>

		   </body> ';	

			// header("location: NvoClienteError.html");

			exit();

		}

	mysqli_query($connect,$query) or die(mysqli_error($connect));

	mysqli_close($connect); 

}

?>