<?php 

require 'connector.php';

global $connect; 

require 'dompdf/autoload.inc.php';

use Dompdf\Options;

use Dompdf\Dompdf;

 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>ComPetro</title>

<script language="JavaScript" src="styles/flickity.pkgd.js"></script>



<link href="styles/styles.css" rel="stylesheet" type="text/css"/>

<link href="styles/tables.css" rel="stylesheet" type="text/css" />

<link href="styles/sidebar.css" rel="stylesheet" type="text/css" />

<link rel="icon" href="img/favicon.ico"> <link href="styles/menu.css" rel="stylesheet" type="text/css"/>

<link href="styles/flickity.css" rel="stylesheet" type="text/css"/>



<link href="styles/content.css" rel="stylesheet" type="text/css" /> 

<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" /> 

 <link rel="icon" href="img/favicon.ico"> </head>

	 <script type="text/JavaScript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>	 

 



<body class="body" onload=""> 

 <div id="extra">&nbsp;</div>

  

    <div id="page">    

    



<div id="header">



<!-- <div id="eNacional"><a href="http://www.energia.gob.mx/" target="_blank" title="Secretar&iacute;a de Energ&iacute;a">Secretar&iacute;a de Energ&iacute;a</a></div> -->  

<div id="PEMEX"></div> 



 

<div id="utils">

  <ul id="nav2">

	<li class="bar"><a href="index" class="baritem first">Inicio</a></li>

    <!-- mete codigo de comunicados, pizarrion de avisos y seleccione el cliente--> 

	

	<li class="barlast"><span>&nbsp;</span></li>

	</ul>

</div>



<div id="cliente">

	   



	

	

</div>

<div id="fecha" > 

<p class="fechapc" align="right" >

	

	Lunes, 11 de mayo del 2020&nbsp;&nbsp;&nbsp;&nbsp;13:04&nbsp;&nbsp;&nbsp;



	</p>

</div>



 

</div>



 <script  type="text/javascript" > 



    function script() {

	 

      <?php  

	  



			session_unset();

session_destroy();



	    ?> </script>

<script type="text/javascript">



    function updateClock() {

        var currentTime = new Date();

		

		

		var date = currentTime.getFullYear()+'/'+(currentTime.getMonth()+1)+'/'+currentTime.getDate();



        var currentHours = currentTime.getHours();

        var currentMinutes = currentTime.getMinutes();

        var currentSeconds = currentTime.getSeconds();



        // Pad the minutes and seconds with leading zeros, if required

        currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;

        currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;



        // Choose either "AM" or "PM" as appropriate

        var timeOfDay = (currentHours < 12) ? "AM" : "PM";



        // Convert the hours component to 12-hour format if needed

        currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;



        // Convert an hours component of "0" to "12"

        currentHours = (currentHours == 0) ? 12 : currentHours;



        // Compose the string for display

        var currentTimeString = date + "  " + currentHours + ":" + currentMinutes + ":" + currentSeconds+ " " + timeOfDay;



        // Update the time display

        document.getElementById("fecha").innerHTML = currentTimeString;

        setTimeout(updateClock, 1000);

    }

    updateClock();



    

</script>



<!-- FIN DEL ENCABEZADO --> 

 <div id="maincontent" class="homebeg">



<div class="separabanner">

<div class="gallery js-flickity"

  data-flickity-options='{ "wrapAround": true }'>

  

  

  <div class="gallery-cell0"  > <img src='img/1.jpg' width='100%'  > </div>

  <div class="gallery-cell1"><img src='img/2.jpg' width='100%'></div>

  <div class="gallery-cell2"><img src='img/3.jpg' width='100%'></div>

  <div class="gallery-cell3"><img src='img/4.jpg' width='100%'></div>

  <div class="gallery-cell4"><img src='img/5.jpg' width='100%'></div>

  </div>







</a>





 

<div id="contentHome" class="left" >

 



   

      

     <br>

  <div class="formd" align="center">

    <div class="separadorsp"></div>

    

    <div class="separadorsp"></div>

  <p class="titulo" align="center">Activar cuenta</p>

      	  

        <br>

			<P class="notasdelogin"  id="loginfailed" Align="center" hidden>

				<b>La clave de usuario es incorrecta</b>

			</P>	
      
      <script>
      function verificar(){
  
        var label = document.getElementById("lbl");
        var nvacontra = document.getElementById("nvacontra");
        var nvacontra2 = document.getElementById("nvacontra2");
        
        if(nvacontra2.value != ""){
        if(nvacontra.value != nvacontra2.value){
          label.innerHTML = "Las contraseñas no coinciden";
          label.style.color = "red";
        }else{
          label.innerHTML = "Correcto";
          label.style.color = "green";
        }
        }

       
        //alert("verificar");
      
      }

      function dos(){
        var label = document.getElementById("lbl");
        var nvacontra = document.getElementById("nvacontra");
        
        if((nvacontra.value.length) < 8){ 
          label.innerHTML = "Ingrese al menos 8 caracteres";
          label.style.color = "red";
        }else{
          label.innerHTML = "";
          label.style.color = "red";
          
        }

      }
      </script>
     

    <form  method="post"  class="login-form" action="activacion.php">

      <input type="hidden"  name="activar" value='1' />

      <input type="text" placeholder="Usuario" name="Usuario" required="required"/>

      <input type="text" placeholder="Contraseña" name="Contrasena" required="required"/>

      <input type="text" placeholder="Nueva Contraseña" name="NvaContrasena" onkeyup="dos();" id="nvacontra" required="required"/>

      <input type="text" placeholder="Nueva Contraseña" name="CC" onkeyup="verificar();" id="nvacontra2" required="required"/><br>
      <label id="lbl"></label><br>

      

   

      <div>

      <button name="botonEntrar">Activar</button>

      </div>

      <br><br><br>

        <td><b>La contraseña debe contener mínimo 8 y máximo 12 caracteres</b></td>

       

    </form>

  </div> 

   

    

</div>

  

 

</div>









  

</div>

     

     </div>

     </div>

      

      <br><br>

       <br><br>

        <br><br>

         <br><br>

          <br><br>

           <br><br>

            <br><br>

             <br><br>

              <br><br>

               <br><br>

                <br><br>

                 <br><br>

                 

                



                 <div align="center" id="AcuseFinal" > 

                  <?php 

		 if(isset($_POST['activar'])){
 $QActivo = "Select Activo, nousuario from usuarios where Usuario = BINARY '".$_POST['Usuario']."' and Contrasena = BINARY '".$_POST['Contrasena']."' limit 1 ";
			$resA = mysqli_query($connect,$QActivo);
		 
		if(mysqli_num_rows($resA) == 1){ 
		 echo '

                   <h3> COMERCIALIZADORA PETROMAR SA DE CV </h3>

         <label style="font-size:12px">Av. Camaron Sabalo No. 102 local 11. Lomas de Mazatlán CP 82010, Mazatlán Sinaloa</label><br>

         <label style="font-size:12px">Cel: 6691103030</label>

         <br>

         <br>

         <h3>CONFIRMAR DATOS</h3>

         <br>

         ';

		 

		 $GetIdEmpresa = "SELECT IdEmpresa from usuarios where usuario = '".$_POST['Usuario']."' and Contrasena = '".$_POST['Contrasena']."'";

		 $Id = '';

		  $resultG = $connect->query($GetIdEmpresa);

		  

		if ($resultG->num_rows > 0) { 

while($rowG = $resultG->fetch_assoc()) {



$Id = $rowG["IdEmpresa"];

}

}

		 

        

		 $sql = "SELECT RzonSocial, RFC, RLegal, Domicilio, Correo, Contacto, Telefono,Usuario  FROM empresa where IdEmpresa = '".$Id."'";

		 

		 $result = $connect->query($sql);

if ($result->num_rows > 0) {

// output data of each row

while($row = $result->fetch_assoc()) {

	 echo"

	  <form  method='post'  class='login-form' action='scripts/activar.php'>

	 <div align='left' style='padding-left:250px'>

	 <input type='hidden' value='".$_POST['Usuario']."' name='Usuario'>

	 <input type='hidden' value='".$_POST['Contrasena']."' name='Contrasena'>

	 <input type='hidden' value='".$_POST['NvaContrasena']."' name='NvaContrasena'>

	 <input type='hidden' value='".$_POST['CC']."' name='CC'>
	 
	 <input type='hidden' value='".$row['Correo']."' name='correo'>
	 <input type='hidden' value='".$row['RLegal']."' name='nombre'>

	 

         <label style='font-weight:bold;'>Razón Social: </label>  ".$row['RzonSocial']."<br>

		  <label style='font-weight:bold;'> Representante Legal:</label> ".$row['RLegal']."  <br>

           <label style='font-weight:bold;'>RFC: </label>".$row['RFC']." <br> 

		   <label style='font-weight:bold;'> Contacto: </label>".$row['Contacto']." <br>

            <label style='font-weight:bold;'>Domicilio: </label>".$row['Domicilio']." <br>

			 <label style='font-weight:bold;'> Telefono:</label> ".$row['Telefono']."  <br>

             <label style='font-weight:bold;'>Correo: </label>".$row['Correo']." <br>

			  <label style='font-weight:bold;'> Usuario:</label> ".$_POST['Usuario']." <br>

			  <br><br>

			  </div>

			  <input type='submit' value='Confirmar'>

			  </form>

			  

             ";

}

}









 $date = date('Y/m/d H:i:s');

           echo"  <br><br> <label>*Generado ".$date." por el sistema Competro*</label> <br><br> <br><br> <br><br>";

		}else{
			echo "<script>window.alert('Usuario y/o contraseña incorrectos -código: 1803');</script>";
			
			}
			
		}

		

		

			 ?>

             

			

             	<?php  
	 

	 if($_POST["mensaje"]  != null)

	 {

		echo "<script>window.alert('".$_POST['mensaje']."');</script>";

		 }else{  }

		 

		 

		 ?>


             <br>

             <br>

             <?php 

			

		 

         ?>

         

         

         </div>



      

 

     

  <div id="footer">

	<div class="footerLeft left">

	Av. Camarón Sábalo No. 102

Col. Zona Dorada, Mazatlán, Sinaloa C.P. 82110</div>



	

	<div class="footerRight right"> <a href="https://portal.competro.mx/uploads/AVISO%20DE%20PRIVACIDAD%20COMPETRO.pdf" target="_blank">Aviso de Privacidad<a></div>

	<div class="spacer clear">&nbsp;</div>

	

</div>



 

     

</body>











</html>





 




 

