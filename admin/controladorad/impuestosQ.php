<?php 
require 'connector.php';
 
global $connect; 
$magna = $_POST['magna'];
$premium = $_POST['premium'];
$diesel = $_POST['diesel'];
$iva = $_POST['iva'];
$fechainicio = $_POST['fechainicio'];
// Check connection
 
		if($_POST["tipo"] == "guardar"){
		$Query = "INSERT INTO impuestos(IVA, IEPSmagna, IEPSpremium, IEPSdiesel, fecha, fecha_inicio)VALUES('".$iva."','".$magna."','".$premium."','".$diesel."',CURRENT_TIME,'".$fechainicio."')";


		if ($connect->query($Query)==true) {
			echo 'Guardado Correctamente';
		}else{
			echo 'Error al guardar';
		}
	}else if($_POST["tipo"] == "leer"){
		$ress = array();
		$Query = "SELECT * FROM impuestos ORDER BY fecha DESC LIMIT 1";

		$res = $connect->query($Query);

		if ($res->num_rows > 0) {
			// output data of each row
			while($row = $res->fetch_assoc()) {
				$ress[] = $row; 
			}
		}
		echo json_encode($ress); 
	}


	if($_POST["tipo"] == "CambioHorario"){
		$activo = $_POST["activo"];

		$Query = "UPDATE Comercializadora SET HorarioVerano = '".$activo."'";
		if($connect->query($Query)==true){
			echo '1';
		}else{
			echo '0';
		}

	}
	if($_POST["tipo"] == "LeerHorario"){
		$ress = array();
		$activo = $_POST["activo"];
		$Query = "SELECT HorarioVerano FROM Comercializadora";
		$res = $connect->query($Query);
		if ($res->num_rows > 0) {
			// output data of each row
			while($row = $res->fetch_assoc()) {
				$ress[] = $row; 
			}
		}
		echo json_encode($ress); 
		

	}
		//$connect->close();
?>
	