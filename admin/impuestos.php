<?php 
require 'connector.php';
session_start();
global $connect; 




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
	
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>

	<script language="JavaScript" src="scripts/calendario.js"></script> 
     
	     
    
    
    

 <link rel="stylesheet" href="styles/calendario.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="scripts/uijquery.js"></script>
    
    
  <?php 
	if(isset($_POST['fini'])){
		echo '<script> 
  $( function() {
    $("#dateDefaultj").datepicker();
	 $("#dateDefaultfinalj").datepicker();
 
  } );
  </script>';
		}else{
			echo '<script> 
  $( function() {
    $( "#dateDefault").datepicker();
	 $("#dateDefaultfinal").datepicker(); 
  } );
  </script>';
			}

	?>
    
<link rel="icon" href="img/favicon.ico"> </head>


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
				$("#un").load("controladorad/tpcre.php");
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


function ActualizarIEPS(){
		//let fecha = '';
		//alert(fecha);
		let magna =  document.getElementById("magna_ieps").value;
		let premium =  document.getElementById("premium_ieps").value;
		let diesel =  document.getElementById("diesel_ieps").value;
		let iva =  document.getElementById("iva_ieps").value;
		let fechainicio = document.getElementById("fechainicio").value;
		let toSend = new FormData();
        toSend.append('magna', magna);
        toSend.append('premium', premium);
        toSend.append('diesel', diesel);
        toSend.append('iva', iva);
		toSend.append('fechainicio', fechainicio);
        toSend.append('tipo', "guardar");

		fetch("https://portal.competro.mx/admin/controladorad/impuestosQ.php", {
        method: "POST",
        mode: "cors",
        body: toSend,
    })
    .then(response => response.text())
    .catch(error => alert(error))
    .then((data) => {
			 
			document.getElementById("magna_ieps").value="";
			document.getElementById("premium_ieps").value="";
			document.getElementById("diesel_ieps").value="";
			document.getElementById("iva_ieps").value="";
			alert(data.trim());
			leer_impuestos();
			fechadehoy();
		

	});

	}

	function leer_impuestos(){
			 
			let toSend = new FormData();
         
        toSend.append('tipo', "leer");

		fetch("https://portal.competro.mx/admin/controladorad/impuestosQ.php", {
        method: "POST",
        mode: "cors",
        body: toSend,
    })
    .then(response => response.json())
    .catch(error => alert(error))
    .then((data) => {
			
			
		 //console.log(data);
		
		 	document.getElementById("iepsMagna").innerHTML="$"+data[0].IEPSmagna;
			document.getElementById("iepsPremium").innerHTML="$"+data[0].IEPSpremium;
			document.getElementById("iepsDiesel").innerHTML="$"+data[0].IEPSdiesel;
			document.getElementById("iepsIVA").innerHTML="%"+data[0].IVA;
			document.getElementById("IEPSfecha").innerHTML=formatFecha2(data[0].fecha);
			
	});

		

}

function fechadehoy(){
/*var currentTime = new Date();
var year = currentTime.getFullYear();
var month = currentTime.getMonth()+1;
var date = String(currentTime.getDate()).padStart(2,'0');
var fecha = year+'-'+month+'-'+date;
alert(date.toString());
*/
 
 
    
  var hoy =new Date(new Date().setDate(new Date().getDate() - 0)),
     
  d = hoy.getDate(),
  m = hoy.getMonth()+1, 
  y = hoy.getFullYear(),
  data1;

if(d < 10){
  d = "0"+d;
};
if(m < 10){
  m = "0"+m;
};

data1 = y+"-"+m+"-"+d;
 // alert(data1);

    document.getElementById("fechainicio").value = data1;
}
    
function CambioHorario(){
	let check = document.getElementById("HV");
	

	let toSend = new FormData();
	toSend.append("tipo","CambioHorario")
	
	if(check.checked==true){
		toSend.append("activo",1)
	}else{
		toSend.append("activo",0);
	}

	fetch("https://portal.competro.mx/admin/controladorad/impuestosQ.php", {
        method: "POST",
        mode: "cors",
        body: toSend,
    })
    .then(response => response.text())
    .catch(error => alert(error))
    .then((data) => {
		if(data.trim()=='1'){
			alert("Cambio realizadó");
			leer_horario();
		}else{
			alert("Error en el cambio")
		}



	})

	


}


function leer_horario(){

let toSend = new FormData();
toSend.append("tipo","LeerHorario")
fetch("https://portal.competro.mx/admin/controladorad/impuestosQ.php", {
method: "POST",
mode: "cors",
body: toSend,
})
.then(response => response.json())
.catch(error => alert(error))
.then((data) => {
data=data[0].HorarioVerano;
if(data=='1'){
	document.getElementById("HV").checked=true;
	document.getElementById("horarioV").innerHTML="&nbsp: Activo";
}else{
	document.getElementById("HV").checked=false;
	document.getElementById("horarioV").innerHTML="&nbsp: Inactivo";
}

})


}

function formatFecha2(date){
    //console.log(date)
    date = JSON.stringify(date);
    //console.log(date)
    //let index = date.search(" ");
    date = date.substring(1, 11);
    //console.log(date)
    date = date.split("-");
    let formatedDate = date[2] +"/"+ date[1] +"/"+ date[0];
    return(formatedDate);
}

</script>


<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->
<!-- FIN DEL ENCABEZADO --> 


	


	


	<!--Ruteo de la página-->
		  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					 
							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Impuestos</a>
							
					  </div>

						
				</div>
			
			
	
			
	
	
 




		<div id="maincontent"></div>		

	
	
		<?php 


// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

$myDate = date('d/m/Y');

$sql = "SELECT folio, CentroEntrega, producto, destino, fecha, presentacion, turno, medio, Transportista, capacidad, EstadoAtencion FROM pedido where idempresa = '".$_SESSION["idempresa"]."' AND fecha = '".$myDate."' ";
$result = $connect->query($sql);

 
$connect->close();
?>
			
		
	<div id="maincontent" align="center">
    
    <table align="center" class="parametros">
			<H2>Cambio de precio IEPS</H2>
	</table>
			<br>
			<div style="width: 50%; background: white;">
				
		
				<div class="formcontainer-3">
					<label for=""><b>IEPS MAGNA</b></label>
					<div class="formcontainer-2" style="margin-left: 23%">
					<div style="width:30%; margin-top: 15px;"><label id="iepsMagna" style=" margin-top: 15px;">$<?php echo $magna ?></label></div>
						<input style="width: 120px; margin-left: 7px; margin-top: 13px;" type="number" id="magna_ieps" placeholder="$ 0.00">
					</div>
					<br>
					<label for=""><b>IEPS PREMIUM</b></label>
					<div class="formcontainer-2" style="margin-left: 23%">
					<div style="width:30%; margin-top: 15px;"><label id="iepsPremium" style=" margin-top: 15px;">$<?php echo $premium ?></label></div>
						<input style="width: 120px; margin-left: 7px; margin-top: 13px;" type="number" id="premium_ieps" placeholder="$ 0.00">
					</div>
					<br>
					<label for=""><b>IEPS DIESEL</b></label>
					<div class="formcontainer-2" style="margin-left: 23%">
					<div style="width:30%; margin-top: 15px;"><label id="iepsDiesel" style=" margin-top: 15px;">$<?php echo $diesel ?></label></div>
						
						<input style="width: 120px; margin-left: 7px; margin-top: 13px;" type="number" id="diesel_ieps" placeholder="$ 0.00">
					</div>
					<br>
					<label for=""><b>IVA</b></label>
					<div class="formcontainer-2" style="margin-left: 23%">
					<div style="width:30%; margin-top: 15px;"><label id="iepsIVA" style=" margin-top: 15px;">%<?php echo $iva ?></label></div>
						<input style="width: 120px; margin-left: 7px; margin-top: 13px;" type="number" id="iva_ieps" placeholder="% 0">
					</div>
					<br>
					<label for=""><b>FECHA</b></label>
					<div class="formcontainer-2" style="margin-left: 23%">
					<div style="width:30%; margin-top: 15px;"><label id="iepsIVA" style=" margin-top: 15px;">Fecha de inicio</label></div>
					<input type="date"    style="width: 120px; margin-left: 7px; margin-top: 13px;" id="fechainicio" >
					<!-- if(isset($_POST['fini'])){
					$fecha = $_POST['fini'];
					echo '<input type="text" value= "'. $_POST['fini'].'" name="fini" id="dateDefaultj" style="width: 120px; margin-left: 7px; margin-top: 13px;" ';
					}else {
					echo '<input type="text" value= "00/00/0000"  name="fini" id="dateDefault" style="width: 120px; margin-left: 7px; margin-top: 13px;" >';
					}
				
				   ?>--></div>
					<br>
					<button onclick="ActualizarIEPS()" style="margin-left: 42%; width: 100px; height: 30px; background-color: gray; color: white; border-radius: 6px">Guardar</button>
					<br>
				</div>
					<div class="formcontainer-2" style="margin-left: 34%"> 
					<div><label for=""><b>Última actualización: &nbsp</b></label></div>
					<div><b><label id="IEPSfecha" style="color:darkgray;">Aquí va la última fecha</label></b></div>
					</div>
					<br>
			</div>
	<div class="formcontainer-2"> 
		<div><label for=""><b>Horario de verano &nbsp</b></label></div>
		<div><input type="checkbox" id="HV" onchange="CambioHorario()"></div>
		<div><b><label id="horarioV" style="color:darkgray;">&nbsp Aquí va el estado en gris</label></b></div>
	</div>
     
    

	
            
            
            
            
            <br><br>
            
		
			
	</div> 	
		
						
	
	<form action="LoginServlet" method="post">
	</form>
	
	<div id="maincontent"> 
		<table align="center">
			<tr class="link" align="center">
				 
				<td colspan="4" align="center" class="color_blanco"> 
					<b></b> 
				</td> 
			</tr>
		</table>
	</div> 
	


	
	



 
</div>



<br><br>


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
setInputDate("#dateDefaultfinal");   
     </script>


<script>leer_impuestos();</script>
<script>leer_horario();</script>
<script>fechadehoy();</script>