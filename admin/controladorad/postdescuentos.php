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
		$FechaFinal = $_POST["finial"];

		$Magna = $_POST["magna"];
		$Premium = $_POST["premium"];
		$Diesel = $_POST["diesel"]; 

		$Nmagna = $_POST["nivelmagna"];
		$Npremium = $_POST["nivelpremium"];
		$Ndiesel = $_POST["niveldiesel"];

		$mm = $_POST["nivelmagnam"];
		$mp = $_POST["nivelpremiumm"];
		$md = $_POST["niveldieselm"];


		$date = $_POST["fini"];
		$string = str_replace('/', '-', $date);
		$Fech =  date('Y-m-d', strtotime($string. ' + 0 days')); 

		$stringg = str_replace('/', '-', $_POST["finial"]);
		$Fechd =  date('Y-m-d', strtotime($stringg. ' + 0 days')); 


if($_POST["button"] == "Guardar descuento"){
	$query = "Insert into decuentovigente (Fecha, Fechad, Magna, Premium, Diesel, IdComercializadora ) 
	values ('".$Fech."', '".$Fechd."','".$Magna."','".$Premium."', '".$Diesel."', '1000' )"; 
	$result = mysqli_query($connect,$query); 

}else if ($_POST["button"] == "Guardar niveles"){
	
	$query = "Insert into decuentovigente (Fecha, Fechad,   IdComercializadora, nmagna, npremium, ndiesel, mm, mp, md) 
	values ('".$Fech."', '".$Fechd."',  '1000', '".$Nmagna."', '".$Npremium."', '".$Ndiesel."', '".$mm."', '".$mp."', '".$md."')";
	  
	$result = mysqli_query($connect,$query); 

}



 
	
	

 
						
						 
		if(($result)==1){
			
				 
 echo ' 
      <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
      <form method="post" action="../capturaprecios.php" name="frm1"> 
	  <input type="hidden" name="Mensaje" value="Guardado Correctamente">
      </form>
      </body>  ';
			
		
			exit();
		}else{
			
			 

// 
  echo ' 
     <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
      <form method="post" action="../capturaprecios.php" name="frm1"> 
	  <input type="hidden" name="Mensaje" value="Error al Guardar">
      </form>
      </body>  ';
		
			exit();
		}
						
					 
		
		
	 
		 

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
 
}
 
 
 
  




?>
