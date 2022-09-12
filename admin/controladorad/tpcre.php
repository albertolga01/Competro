<?php

//CRE
   session_start();	
   if (($_SESSION["usuario"]) !== null) {
	   require 'connector.php';
	   echo '<p class="textoEjecutivo" align="center"> Bienvenido(a) '. $_SESSION["usuario"] .' - '.$_SESSION["rfc"].'</p>';
	   
	   $sqlpro = "SELECT tipousuario as tusuario FROM usuarios where nousuario = '".$_SESSION["nousuario"]."'";
		
					$resulttpro = $connect->query($sqlpro); 
					
					if ($resulttpro->num_rows > 0) {
					while($rowp = $resulttpro->fetch_assoc()) {  
					//Exists take folio 
					$T = $rowp["tusuario"]; 
					}
					 
					 if($T == '2' or $T == '6'){ }else{
						 echo "<script>alert('No Tiene Acceso Para Visualizar esta Pagina');</script>";
						 echo "<script>window.open('menu_cteadmin','_self');</script>";
						 }
					
					}
   }else{
	   session_unset();
				 session_destroy();
	  echo "<script>window.open('../index,'_self');</script>";
	   } 
?>