<?php 
$inicial = '';
require 'connector.php';
global $connect; 
session_start();

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
	<link href="styles/tables.css" rel="stylesheet" type="text/css" />
	
    <link href="styles/menu.css" rel="stylesheet" type="text/css" />
    <link href="styles/sidebar.css" rel="stylesheet" type="text/css" />
    <link href="styles/content.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="iconion.ico">
    
	<SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>

	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	
    <link rel="stylesheet" href="styles/calendario.css">
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title> 
	<script language="JavaScript" src="scripts/calendario.js"></script> 
	      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="scripts/uijquery.js"></script> 
    
  <?php 
	 
			echo '<script> 
  $( function() {
    $( "#dateDefault").datepicker(); 
  } );
  </script>';
		 
	?>
    
    
    
<link rel="icon" href="img/favicon.ico"> 
</head>


<body class="body" onload="logout()">
	<div id="extra">&nbsp;</div>

<div id="page">

<div id="header">

<script> 
        var usuario = '<?php echo $_SESSION['usuario']; ?>'; 
        var rfc = '<?php echo $_SESSION['rfc']; ?>'; 
        renderHeader(usuario, rfc);
    </script>
    
 <script type="text/JavaScript">
            $("#un").load("controladorad/tpcd.php");
        </script>
        

</div>

<script  type="text/javascript" > 
     function logout(){<?php 
  
   
		if (isset($_SESSION["usuario"])) {
			}else{
				session_unset();
				 session_destroy();
	  echo "window.location.href='../index';";
				}  
?>}
</script>


<!-- FIN DEL ENCABEZADO --> 


	 


	


	<!--Ruteo de la página-->
		  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					 
							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Captura descuento vigente</a>
							
					  </div>

						
				</div>
			 

 <label title="Cambiar Apariencia del Menú"  id="uno" style="float: right; width:40px;  padding-left:10px; padding-top: 3px;  height:15px;  font-size:13px;">Mostrar</label> 
 
	<div id="maincontent" align="center"> 	
   
	    <form name="forma1" method="post" action="controladorad/postdescuentos.php" >
	
     
    <table align="center" class="parametros">
    <tr>
				<td class="color_blanco"><b>Fecha:</b></td>
				<td class="color_blanco"><input type="date" value= "00/00/0000" name="fini" id="dateDefault"   > </td>
                <td class="color_blanco"><input type="date" value="00/00/0000" name="finial" id="dateDefaultt"  hidden> </td>
				
			</tr>
    
		<tr>
<td align="left" class="color_blanco"><b>Magna M/3:</b></td><td align="left" class="color_blanco">
<input type="text" name="magna" >
<td align="left" class="color_blanco"><b>Nivel Magna:</b></td><td align="left" class="color_blanco">
<input type="text" name="nivelmagna" >
<td align="left" class="color_blanco"><b>Nivel Optimo M/3 Magna:</b></td><td align="left" class="color_blanco">
<input type="text" name="nivelmagnam" >
<tr/>
<tr>
<td align="left" class="color_blanco"><b>Premium M/3:</b></td><td align="left" class="color_blanco">
<input type="text" name="premium" >
<td align="left" class="color_blanco"><b>Nivel Premium:</b></td><td align="left" class="color_blanco">
<input type="text" name="nivelpremium" >
<td align="left" class="color_blanco"><b>Nivel Optimo M/3 Premium:</b></td><td align="left" class="color_blanco">
<input type="text" name="nivelpremiumm" >
<tr/>
<tr>
<td align="left" class="color_blanco"><b>Disel M/3:</b></td><td align="left" class="color_blanco">
<input type="text" name="diesel" >
<td align="left" class="color_blanco"><b>Nivel Diesel:</b></td><td align="left" class="color_blanco">
<input type="text" name="niveldiesel" >
<td align="left" class="color_blanco"><b>Nivel Optimo M/3 Diesel:</b></td><td align="left" class="color_blanco">
<input type="text" name="niveldieselm" >
<tr/>
  


<table align="center">
	    	<tr>
	    	<td align="center" class="color_blanco">
            <br>
            <input type="Submit" name="button" value="Guardar descuento" ></td>
            <td align="center" class="color_blanco">
            <br>
            <input type="Submit" name="button" value="Guardar niveles" ></td>
	    	</tr>
	    	</table>	
	</table> 
      <div id="maincontent"></div>	
      
      
      
    </table>
    
    
    </form>  	

    <?php 
	
	 
	
	echo'
   
	
	
	
<table align="center">
<tr> 
<th height="25">Fecha</th>
<th height="25">Fecha Final</th>
<th>Magna</th>
<th>Premium</th>
<th>Diesel</th> 
<th>Nivel Magna</th> 
<th>Nivel Premium</th> 
<th>Nivel Diesel</th> 
</tr> ';
 
 
if ($connect->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$myDate = date('d/m/Y');
$fecha = "";
$magna = "";
$premium = "";
$diesel = "";
$nm = "";
$np = "";
$nd = "";
$sql = "SELECT Fecha, Fechad, Magna, Premium, Diesel from decuentovigente where Magna is not null order by date(fecha) desc limit 1"; 
 
$result = $connect->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$fecha = $row["Fecha"];
		$magna = $row["Magna"];
			$premium = $row["Premium"];
				$diesel = $row["Diesel"];
 
                $dat = date("d/m/Y", strtotime($row["Fecha"]));
                if($row["Fechad"] != ""){
                $datd = date("d/m/Y", strtotime($row["Fechad"]));
                }
                else{$datd = "";}
}

} else { echo "0 results"; }


$sql = "SELECT Fecha, Fechad, nmagna, npremium, ndiesel from decuentovigente where nmagna  is not null order by date(fecha) desc limit 1"; 
$result = $connect->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	  
				$nm = $row["nmagna"];
				$np = $row["npremium"];
				$nd = $row["ndiesel"];

            
}

} else { echo "0 results"; }



echo "<tr> 
<td> <label style='
   height:25px;   align: center;'>".$dat."</label></td>
   <td> <label style='
   height:25px;   align: center;'>".$datd."</label></td>
   <td align='center'> <label style='
   height:25px;   align: center;'>$".$magna."</label></td>
   <td align='center'> <label style='
   height:25px;   align: center;'>$".$premium."</label></td>
   <td align='center'> <label style='
   height:25px;   align: center;'>$".$diesel."</label></td>
    <td align='center'> <label style='
   height:25px;   align: center;'>".$nm."</label></td>
    <td align='center'> <label style='
   height:25px;   align: center;'>".$np."</label></td>
    <td align='center'> <label style='
   height:25px;   align: center;'>".$nd."</label></td>
    

 
</tr>";





echo "</table>";


$connect->close();


 
?>
</table>
    
   
            
             
            
		
			
	</div> 	
		<div id="contentHome" class="left">
<div id="banners">


</div> 

				<div id="seccionesHome" class="left">
	<div class="seccion">
		<h3><label id="fechaaa" style="font-size:20px;">ComPetro - <?php echo $fecha; ?></label></h3>
		 
        <br>
		<div class="sectext right"> 
			 
			  
		    
			 
    
   <div style="width:200px; margin-left:180px;">
    
                     
                        <div class="cuadro-magna">
                           <h4 class="precios-titulo">MAGNA </h4>
                           
                           <div class="count d-inline-block font-weight-bold" id="magna-v1" style="margin-left:-10px; margin-right:-10px; margin-top:0px; margin-bottom:0px; line-height:1;"></div>
                           <label id="magna" class="d-inline-block font-weight-bold"><?php echo '$'.number_format($magna, 2).'/M3'; ?></label> <br>
                            <label style="font-size:20px;">Nivel:
                             <?php echo $nm; ?> 
                             </label>
                         
                         
                    </div>
                    </div>
                    
                    
                    <div style="width: 200px; margin-left:40px;"> 
                        <div class="cuadro-premium">
                          <h5 class="precios-titulo">PREMIUM</h5>
                          
                           <div class="" id="premium-v1" style="margin-left:-10px; margin-right:-10px; margin-top:0px; margin-bottom:0px; line-height:1;"></div>
                           <label id="premium" class=""><?php echo '$'.number_format($premium, 2).'/M3'; ?></label><br>
                            <label style="font-size:20px;">Nivel:
                             <?php echo $np; ?> 
                             </label>
                           
                    </div>
                    </div>
                    
                    
                    <div style="width:200px; margin-left:10px;">
                    
                        <div class="cuadro-diesel">
                          <h5 class="precios-titulo text-white">DIESEL</h5>
                           
                          <div class="count d-inline-block font-weight-bold" id="diesel-v1" style="margin-left:-10px; margin-right:-10px; margin-top:0px; margin-bottom:0px; line-height:1;"></div>
                          <label id="diesel" class="d-inline-block font-weight-bold"><?php echo '$'.number_format($diesel, 2).'/M3'; ?></label>
                          <br>
                            <label style="font-size:20px;">Nivel:
                             <?php echo $nd; ?> 
                             </label>
                           
                    </div>
                      </div>
                      
                       
                       </div>
                       
                  
                </div>
     
     </div>
     </div>		
	
	<form action="LoginServlet" method="post">
	</form>
	
	<div id="maincontent"> 
		<table align="center">
			<tr class="link" align="center">
				 
				<td colspan="4" align="center" class="color_blanco"> 
					<b>.....</b> 
				</td> 
			</tr>
		</table>
	</div> 
	


	
	



 
</div>

 


<script>
renderFooter();
</script>

</div>




</body>
</html>
    
    <script>
function setInputDate(_id){
    var _dat = document.querySelector(_id);
    var hoy = new Date(),
        d = (hoy.getDate()),
        m = hoy.getMonth()+1, 																																																																																																																																																
        y = hoy.getFullYear(),
        data;

    if(d < 10){
        d = "0"+d;
    };
    if(m < 10){ 
        m = "0"+m;
    };

    data = d+"/"+m+"/"+y;
    console.log(data);
    _dat.value = data;
};

setInputDate("#dateDefault");  
function setInputDatee(_id){
    var _dat = document.querySelector(_id);
    var hoy = new Date(),
        d = (hoy.getDate()),
        m = hoy.getMonth()+2, 																																																																																																																																																
        y = hoy.getFullYear(),
        data;

    if(d < 10){
        d = "0"+d;
    };
    if(m < 10){ 
        m = "0"+m;
    };

    data = d+"/"+m+"/"+y;
    console.log(data);
    _dat.value = data;
};

 
setInputDatee("#dateDefaultt");   
     </script>
     
     

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 $("#maincontent").hide();
</script>
<script>
var bool = true;
$(document).ready(function(){
  $("#uno").click(function(){
  if(bool == true){
   $("#maincontent").show(1000); 
    bool = false;
  }else{
   $("#maincontent").hide(1000); 
    bool = true;
  }
   
  }
   
  
   );
   
   
   
    $("#icon").click(function(){
  if(bool == true){
   $("#contentBasicoSeccionfulllistmenu").show(1000);
    $("#contentBasicoSeccionfullnvomenu").hide(1000);
	$("#icon").attr("src","img/menuiconnn.png");
    
    bool = false;
  }else{
   $("#contentBasicoSeccionfulllistmenu").hide(1000);
    $("#contentBasicoSeccionfullnvomenu").show(1000);
	$("#icon").attr("src","img/menuicon.png");
       
    bool = true;
  }
   
  }
   
  
   );
   
   
});
</script>



    
    <?php 
	 
	 if(isset($_POST["Mensaje"]))
	 {
		echo "<script>window.alert('".$_POST['Mensaje']."');</script>";
		 }else{  }
		 
		 
		 ?>

         
<script>
function setInputDate(_id){
    var _dat = document.querySelector(_id);
var hoy =new Date(new Date().setDate(new Date().getDate() )),
        d = (hoy.getDate() ),
        m = hoy.getMonth()+1, 																																																																																																																																																
        y = hoy.getFullYear(),
        data;

    if(d < 10){
        d = "0"+d;
    };
    if(m < 10){ 
        m = "0"+m;
    };

    data = d+"/"+m+"/"+y;
    console.log(data);
    _dat.value = data;
};

setInputDate("#dateDefault");   
     </script>

<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->