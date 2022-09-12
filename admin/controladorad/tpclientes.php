<?php

//clientes
   session_start();	
   if (isset($_SESSION["usuario"])) {
	   require 'connector.php';
	   echo '<p class="textoEjecutivo" align="center"> Bienvenido(a) '. $_SESSION["usuario"] .' - '.$_SESSION["rfc"].'</p>';
	   
	   //$sqlpro = "SELECT tusuario FROM empresa where idempresa = '".$_SESSION["idempresa"]."'";
	   $sqlpro = "SELECT t2.tipousuario as tusuario FROM empresa t1 INNER JOIN usuarios t2 
	   ON t1.idempresa = t2.idempresa WHERE t1.idempresa = '".$_SESSION["idempresa"]."' AND t2.usuario = '".$_SESSION["usuario"]."'";
	    
					$resulttpro = $connect->query($sqlpro); 	
					
					if ($resulttpro->num_rows > 0) {
					while($rowp = $resulttpro->fetch_assoc()) {  
					//Exists take folio 
					$T = $rowp["tusuario"]; 
					}
					 //echo $T;
					 if($T == '2'){ }else{
						 echo "<script>alert('No Tiene Acceso Para Visualizar esta Pagina');</script>";
						 echo "<script>window.open('menu_cteadmin','_self');</script>";
						 }
					
					}
   }else{
	   session_unset();
				 session_destroy();
	  echo "<script>window.open('../index','_self');</script>";
	   } 
?>