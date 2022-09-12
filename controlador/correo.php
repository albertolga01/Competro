<?php 
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
Uno();
 	
	 

 function Uno(){
require 'vendor/autoload.php';
$recipient = $_POST['email'];
 
$mail = new PHPMailer(true);
$mail->SetLanguage("es", 'includes/phpMailer/language/');

try {
   
$mail->IsMail(); 
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "ssl";
$mail->Port       = 465;
$mail->Host       = "mail.grupopetromar.com";
$mail->Username   = "desarrollosistemas@grupopetromar.com";
$mail->Password   = "nAUZ3N4zMw&E";
 
    $mail->setFrom($_POST['email'], 'Comercializadora Pretromar'); //$_POST['nombre'] usuario del cliente 
    $mail->addAddress('logistica@competro.mx', 'Comercializadora');     // Add a recipient
    
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contacto Comercializadora';
    $mail->Body    = '

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../styles/styles.css" rel="stylesheet" type="text/css" />
	<link href="../styles/tables.css" rel="stylesheet" type="text/css" /> 
    <link href="../styles/content.css" rel="stylesheet" type="text/css" /> 
	<title>ComPetro</title>
</head>


<body class="body">
	 
<div id="header">  
<div style="padding-top:80px;">
<img src="img/LogoTenemosLaEnergia.png"  > 
</div>  
</div>

<!-- FIN DEL ENCABEZADO --> 


	


	


	<!--Ruteo de la página-->
	
		  <div id="contentfull" align="left">
		 
			
	 
<DIV id=maincontentdos>




<DIV class=left id=contentBasicoSeccion>
  <DIV id=contentBox>
		<H1>Contacto </H1><br>
        
        
        <p>-Correo: '.$_POST['email'].'.       <br> 
		Nombre: '.$_POST['nombre'].'      <br> 
		Mensaje: '.$_POST['message'].'</p>
        <div>
        
         
 
</div>     
	  </DIV>
	</DIV> <!--del content -->

		
</div> <!--del maincontent del header-->



 
</div>
 
 
</div> 

</body> 
</html>

	
	';
    $mail->AltBody = '';

    $mail->send();
    echo '
 
   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
   <form method="post" action="../contacto.php" name="frm1">
	  <input type="hidden" name="enviado" value="1" /> 
   </form>
</body>
   
  ';
		
} catch (Exception $e) {
     echo '
 
   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
   <form method="post" action="../contacto.php" name="frm1"> 
	  <input type="hidden" name="enviado" value="0" /> 
	   <input type="hidden" name="mensaje" value="'.$e.'" /> 
   </form>
</body>
   
  ';
		
	
}

 }
	
	 
     
?>