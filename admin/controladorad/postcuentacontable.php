<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

	require 'connector.php';

	Login();

}

function Login()

{

	global $connect;

		$idempresa = $_POST["idempresa"];

		$folio = $_POST["folio"];

        $cta = $_POST["cta"];

		$descripcion = $_POST["descripcion"];

        $tipo = $_POST["tipo"];

	    $query = "Insert into cuentascontables (idempresa, folio, cta, descripcion, tipo ) values ('".$idempresa."','".$folio."', '".$cta."','".$descripcion."','".$tipo."')";

		$result = mysqli_query($connect,$query);

		if(($result)==1){

echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

		   <form method="post" action="../clientes.php" name="frm1">

		   <input type="hidden" name="mensaje" value="Cuenta Contable Agregada Correctamente" /> 

	       </form>

		   </body> ';	

		//	header("location: NvoClienteGC.html");

			exit();


		}else{

echo '

		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">

		   <form method="post" action="../clientes.php" name="frm1">

		   <input type="hidden" name="mensaje" value="Error al Agregar Cuenta Contable" /> 

	       </form>

		   </body> ';	

			// header("location: NvoClienteError.html");

			exit();

		}

	mysqli_query($connect,$query) or die(mysqli_error($connect));

	mysqli_close($connect); 

}

?>