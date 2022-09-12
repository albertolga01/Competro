<?php

require 'connector.php';

if(isset($_POST)){
	$empresa = $_POST["IdEmpresa"];
		$destino = $_POST["destino"]; 
		$ano = substr($_POST["fini"], 6, 4);
		$mes = substr($_POST["fini"], 3, 2);
		$dia = substr($_POST["fini"], 0, 2);

		$fecha = $ano."-".$mes."-".$dia;

		/**  GUARDAR MAGNA  **/
	if($_POST['minmagna'] != null && $_POST['maxmagna'] != null){
		$min_magna = $_POST["minmagna"];
		$max_magna = $_POST["maxmagna"];

		$sql = "INSERT INTO minimosmaximos(IdEmpresa, IdDestino, Producto, Fecha, Minimo, Maximo) 
				VALUES ('{$empresa}', '{$destino}', 'M', '{$fecha}', '{$min_magna}', '{$max_magna}')";

		$result = $connect->query($sql);
		if($result){
		//	echo "Datos guardados - Magna";
		} else {
			echo "Error al guardar - Magna";
		}
	}

		/**  GUARDAR PREMIUM  **/
	if($_POST['minpremium'] != null && $_POST['maxpremium'] != null){
		$min_premium = $_POST["minpremium"];
		$max_premium = $_POST["maxpremium"];

		$sql = "INSERT INTO minimosmaximos(IdEmpresa, IdDestino, Producto, Fecha, Minimo, Maximo) 
				VALUES ('{$empresa}', '{$destino}', 'P', '{$fecha}', '{$min_premium}', '{$max_premium}')";

		$result = $connect->query($sql);
		if($result){
		//	echo "Datos guardados - Premium";
		} else {
			echo "Error al guardar - Premium";
		}
	}

		/**  GUARDAR DIESEL  **/
	if($_POST['mindiesel'] != null && $_POST['maxdiesel'] != null){
		$min_diesel = $_POST["mindiesel"];
		$max_diesel = $_POST["maxdiesel"];

		$sql = "INSERT INTO minimosmaximos(IdEmpresa, IdDestino, Producto, Fecha, Minimo, Maximo) 
				VALUES ('{$empresa}', '{$destino}', 'D', '{$fecha}', '{$min_diesel}', '{$max_diesel}')";

		$result = $connect->query($sql);
		if($result){
		//	echo "Datos guardados - Diesel";
		} else {
			echo "Error al guardar - Diesel";
		}
	}





	
echo '
<body onload="setTimeout(function() { document.frm1.submit() }, 500)">
<form method="post" action="../minimosmaximos.php" name="frm1">
<input type="hidden" name="mensaje" value="Guardado Correctamente" /> 
</form>
</body> ';	

} else {
	echo "No se han enviado datos";
}


?>