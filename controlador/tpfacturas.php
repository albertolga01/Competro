<?php

   session_start();	
   if (isset($_SESSION["usuario"])) {
	   require 'connector.php';
	   echo '<p class="textoEjecutivo" align="center"> Bienvenido(a) '. $_SESSION["usuario"] .' - '.$_SESSION["rfc"].'</p>';
	   
	   $sqlpro = "SELECT tipousuario as tusuario FROM usuarios where nousuario = '".$_SESSION["nousuario"]."'";
		
					$resulttpro = $connect->query($sqlpro); 
					
					if ($resulttpro->num_rows > 0) {
					while($rowp = $resulttpro->fetch_assoc()) {  
					//Exists take folio 
					$T = $rowp["tusuario"]; 
					}
					 
					 if( $T == '1' or $T == '8' or $T == '9' or $T == '10'){ }else{
						 echo "<script>alert('No Tiene Acceso Para Visualizar esta Pagina');</script>";
						 echo "<script>window.open('menu_cte','_self');</script>";
						 }
					
					}
   }else{
	   session_unset();
				 session_destroy();
	  echo "<script>window.open('index','_self');</script>";
	   } 
?>