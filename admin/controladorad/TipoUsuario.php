 <?php
   session_start();	
   
	   require 'connector.php';
	   echo '<p class="textoEjecutivo" align="center"> Bienvenido(a) '. $_SESSION["usuario"] .' - '.$_SESSION["rfc"].'</p>';
	   
	   $sqlpro = "SELECT tusuario FROM empresa where idempresa = '".$_SESSION["idempresa"]."'";
		
					$resulttpro = $connect->query($sqlpro); 
					
					if ($resulttpro->num_rows > 0) {
					while($rowp = $resulttpro->fetch_assoc()) {  
					//Exists take folio 
					$T = $rowp["tusuario"]; 
					}
					 
					 if($T == '2' or $T == '3' or $T =='4'){ echo '';}else{
						 echo "<script>alert('No Tiene Acceso Para Visualizar esta Pagina');</script>";
						 echo "<script>window.open('../index.php','_self');</script>";
						 }
					
					}
 
?>