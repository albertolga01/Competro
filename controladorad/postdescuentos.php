<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}

//Post back values 
function Login()
{ 
	global $connect; 
		$Fecha = $_POST["fini"];
	    $Magna = $_POST["magna"];
		$Premium = $_POST["premium"];
		$Diesel = $_POST["diesel"]; 
		
		$date = $_POST["fini"];
		$string = str_replace('/', '-', $date);
		$Fech =  date('Y-m-d', strtotime($string. ' + 0 days')); 
		

 
						
						   $query = "Insert into DecuentoVigente (Fecha, Magna, Premium, Diesel) 
		values ('".$Fech."', '".$Magna."','".$Premium."', '".$Diesel."')"; 
		$result = mysqli_query($connect,$query); 
		if(($result)==1){
			
				 
 echo ' 
      <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
      <form method="post" action="../capturaprecios.php" name="frm1"> 
	  <input type="hidden" name="Mensaje" value="Descuentos Guardados Correctamente">
      </form>
      </body>  ';
			
		
			exit();
		}else{
			
			 


  echo ' 
      <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
      <form method="post" action="../capturaprecios.php" name="frm1"> 
	  <input type="hidden" name="Mensaje" value="Error al Guardar Descuentos">
      </form>
      </body>  ';
		
			exit();
		}
						
					 
		
		
	 
		 

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}
 
 
 
 
 /*
 
//Check if exits
$sql = "SELECT folio FROM preciosproducto where Fecha = '".$Fech."'";
		
					$resultt = $connect->query($sql); 
					
					if ($resultt->num_rows > 0) {
					while($row = $resultt->fetch_assoc()) {  
					//Exists take folio 
					$folio = $row["folio"]; 
					}
					
					//Update 
					$UpdateQuery = "Update preciosproducto set Magna = '".$Magna."', Premium = '".$Premium."', Diesel = '".$Diesel."' where folio = '".$folio."'";
					$rr = $connect->query($UpdateQuery);
					if(($rr)==1){
			
				echo "<script>
alert('Descuentos Actualizados Correctamente');
window.location.href='../capturaprecios.php';
</script>";
			
		
			exit();
		}else{
			
			echo "<script>
alert('Error al Actualizar Descuentos');
window.location.href='../capturaprecios.php';
</script>";
		
			exit();
		}
					
 */




?>
