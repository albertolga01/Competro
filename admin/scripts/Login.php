<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '../connector.php';
	Login();
}


function Login()
{
	
	
	
	global $connect;
	
	  
	
	if(($_POST["Usuario"]) !== null){	
		$Usuario = $_POST["Usuario"];
        $Contrasena = $_POST["Contrasena"]; 
       
	
		
		
	    $query = "Select t2.Usuario, t1.IdEmpresa, t2.nousuario, t2.TipoUsuario, t1.RzonSocial, t2.Activo 
		from empresa t1 inner join usuarios t2 on t1.IdEmpresa = t2.IdEmpresa where t2.Usuario = BINARY '".$Usuario."' and t2.Contrasena = BINARY '".$Contrasena."' limit 1 ";
 
		$result = mysqli_query($connect,$query);
		
		//$query = "Select Usuario, IdEmpresa, TipoUsuario as TUsuario, Descripcion as RzonSocial, Activo from usuarios where Usuario = BINARY '".$Usuario."' and Contrasena = BINARY '".$Contrasena."' limit 1 ";
 
		//$result = mysqli_query($connect,$query);
		
 
		
		if(mysqli_num_rows($result) == 1){
			 
			
			session_start();
 
			
			
			
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);	
            $name = $row['TipoUsuario'];
			 $act = $row['Activo'];
			 
			 
			 
			 // Storing session data
			$_SESSION["usuario"] = $row['Usuario'];
			$_SESSION["idempresa"] = $row['IdEmpresa'];
			$_SESSION["rfc"] = $row['RzonSocial'];
			$_SESSION["nousuario"] = $row['nousuario'];
			 
			if ($name==1 or $name == 8 or $name == 9 or $name == 10) { 
		/*	if($act == '0'){
				
				 echo '
		    <body onload="setTimeout(function() { document.frm1.submit() }, 300)">
		    <form method="post" action="../index" name="frm1">
		    <input type="hidden" name="mensaje" value="Esta cuenta no ha sido activada -código: 1701" /> 
	        </form>
		    </body> ';	
				 
			 }*/
			 
			 if($act == '1'){
				 
				 header("location: ../menu_cte");
			exit();
			 }else{
				 
				  echo '
		    <body onload="setTimeout(function() { document.frm1.submit() }, 300)">
		    <form method="post" action="../index" name="frm1">
		    <input type="hidden" name="mensaje" value="Esta cuenta no ha sido activada -código: 1701" /> 
	        </form>
		    </body> ';		
			 }
			
			
			
			
			
			
			
			}
			 
			 
			 
			if($name==2 or $name == 3 or $name == 4 or $name == 5 or $name == 6){
				header("location: ../admin/menu_cteadmin");
			exit();
			}
			 
			
			
		}else{ 
		  //<form method="post" action="../index.php" name="frm1">
		  
			 echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 300)">
		<form method="post" action="../index" name="frm1">
		   <input type="hidden" name="failed" value="failed" /> 
	       </form>
		   </body> ';	 
			exit();
		}
		
		
	}
	 
	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}

?>	