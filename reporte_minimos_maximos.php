<?php 
require 'connector.php';
global $connect; 
session_start();
require 'dompdf/autoload.inc.php';
use Dompdf\Options;
use Dompdf\Dompdf;
if(isset($_POST['text'])){
	
	$options = new Options();
$options->set('defaultFont', 'Courier'); 
$dompdf = new Dompdf($options); 
$dompdf = new Dompdf();
$dompdf->loadHtml($_POST['text']); 
$dompdf->setPaper('A4', 'landscape'); 
$dompdf->render(); 
$dompdf->stream(); 
}
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
	

	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>
    <script language="JavaScript" src="scripts/calendario.js"></script> 
     
	     
    <SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	<SCRIPT src="scripts/renderelements.js" type="text/javascript"></SCRIPT>
    
    

     <link rel="stylesheet" href="styles/calendario.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="scripts/uijquery.js"></script>
        
    <?php 
	if(isset($_POST['fini'])){
		echo '<script> 
  $( function() {
    $("#dateDefaulttj").datepicker();
	 $("#dateDefaultfinalj").datepicker();
 
  } );
  </script>';
		}else{
			echo '<script> 
  $( function() {
    $( "#dateDefaultt").datepicker();
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

<!-- <div id="eNacional"><a href="http://www.energia.gob.mx/" target="_blank" title="Secretar&iacute;a de Energ&iacute;a">Secretar&iacute;a de Energ&iacute;a</a></div> -->  
<div id="PEMEX"></div> 



<div id="utils">
  <ul id="nav2"> 
	<li class="bar"><a href="mcontratos" class="baritem first">Contratos</a></li>
	<li class="bar"><a href="InteresesMoratorios" class="baritem first">Intereses Moratorios</a></li>
  	<li class="bar"><a href="Manual Competro Usuario.pdf" class="baritem first">Manual de Usuario</a></li>
	<li class="bar"><a href="menu_cte" class="baritem first">Inicio</a></li>
	 
 
	    
	 
	<li class="barlast"><span>&nbsp;</span></li>
	</ul>
</div>

<div id="cliente">

	<p class="textoEjecutivo" align="center"  id="un"> 
    
     
   
  
<script type="text/JavaScript">
            $("#un").load("controlador/tppipas.php");
        </script>
    </p> 
		
	
	
</div>
<div id="fecha"> 
<p class="fechapc" align="right">
	
	

	</p>
</div>

<div id="mainmenu">
<ul id="nav">
	<li class="bar"><a href="menu_cte" class="baritem">Servicio a Clientes</a>
	</li>


    <li class="bar"><a href="contacto" class="baritem">Contacto</a>
	</li><li class="bar"><a href="scripts/logout.php" class="baritem">Salir</a>
	</li>					


<li class="barlast"><span>&nbsp;</span></li>
<!-- mete codigo de tipo de usuario--> 

</ul>
</div>
</div>

<script  type="text/javascript" > 
     function logout(){<?php 
  
   
		if (isset($_SESSION["usuario"])) {
			}else{
				session_unset();
				 session_destroy();
	  echo "window.location.href='index.php';";
				}  
?>}
</script>


<!-- FIN DEL ENCABEZADO --> 


	


	


	<!--Ruteo de la página-->
		  <div id="contentfull" align="left">
			
			 <div class="margin">
				<DIV id=pathway>
					 
							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cte" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a  href="reportes_internos" >Reportes internos</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
						
                             <a class=bold href="#">Reporte Consumos</a>
							
					  </div>

						
				</div>
			
			
	
			
	
	
 




		<div id="maincontent"></div>		

	
	
	  
			
		
	<div id="maincontent" align="center">
      
		 
    <form name="forma1" method="post" action="reporte_minimos_maximos">
      
     <br>
    

     <table align="center" class="parametros">
                            <tr>
                                <td class="color_blanco"><B>Seleccione un mes:</B></td>
                                <td class="color_blanco">
                                    <?php 
                                    if(isset($_POST['fini'])){
                                        $fecha = $_POST['fini'];
                                        echo '<input type="text" value= "'. $_POST['fini'].'" name="fini" id="dateDefaulttj" readonly>';
                                    } else {
                                        echo '<input type="text" value= "00/00/0000"  name="fini" id="dateDefaultt" readonly>';
                                    }
                                    ?>
                                </td>
                            </tr>		

                            <tr></tr>

                          
                            <tr hidden>
                                <td class="color_blanco"><b>Tipo de consulta:</b></td>
                                 
                                <td class="color_blanco">
                                <fieldset id="group1" >
                                    <input hidden checked="checked" type="radio" value="1" name="type"> &nbsp; <label>Mensual</label> &nbsp;
                                    <input hidden type="radio" value="2" name="type"> &nbsp; <label>Anual</label>
                                </fieldset>
                                </td>
                            </tr>	

                            <tr>
                                <td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
                            </tr>
                        </table>
                    </form>
                    <br>
                    
                    
                        <style>
                            tr{
                                white-space: nowrap;
                            }
                        </style>
                    <table>
                        <tr>
                            <th>Destino</th>
                            <th>No. Estación</th>
                            <th>Producto</th>
                            <th>Min</th>
                            <th>Max</th>
                            <th>Vólumen</th>
                            <th>Diferencia</th>    
                        </tr>

                        <?php 
                        if(isset($_POST['fini'])){  

                            $type =  $_POST["type"];
                            $ano = substr($_POST['fini'], 6, 4);
                            $mes = substr($_POST['fini'], 3, 2);
 
                               
                            if($type == "1"){ 
                                $sql = "SELECT t3.iddestino, t3.noestacion, t2.destino, t2.producto, sum(t1.Cantidad) as cantidad FROM facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura inner join destinos t3 on t2.destino = t3.destino
                                WHERE t1.idempresa = '".$_SESSION['idempresa']."'  and year(t1.fecha) = '".$ano."' and month(t1.fecha) = '".$mes."' group by t2.destino ";
                                }else if($type == "2"){
                                    $sql = "SELECT t1.iddestino, t3.noestacion, t2.destino, t2.producto, sum(t1.Cantidad) as cantidad FROM facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura inner join destinos t3 on t2.destino = t3.destino
                                WHERE t1.idempresa = '".$_SESSION["idempresa"]."'  and year(t1.fecha) = '".$ano."' ";
                                }
                            
 
                                
                            //echo $sql;
                            $r = $connect->query($sql);
                           
                            if ($r->num_rows > 0) { 
                            while ($row = $r->fetch_assoc()) {
                                

                              

                                        $cantidad = "Select t3.iddestino, sum(t1.cantidad) as cantidad, t2.producto from facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura inner join destinos t3 on t2.destino = t3.destino where t2.destino = '".$row["destino"]."' and year(t1.fecha) = '".$ano."' and month(t1.fecha) = '".$mes."' group by t2.producto";
                                      
                                        $rc = $connect->query($cantidad);
                                        if ($rc->num_rows > 0) {
                                            $esa = "";$desa = "";
                                            while ($rowc = $rc->fetch_assoc()) {
                                                $minimo = "";
                                                $maximo = "";
                                                $producto = "";
                                                //producto
                                                if($rowc["producto"] == "DIESEL"){$p = "D"; $producto = "DIESEL";}
                                                if($rowc["producto"] == "GASOLINA 91 OCT"){$p = "p"; $producto = "PREMIUM";}
                                                if($rowc["producto"] == "GASOLINA 87 OCT"){$p = "m"; $producto = "MAGNA";}

                                                $selectmm = "Select minimo, maximo from minimosmaximos where producto = '".$p."' and iddestino = ".$rowc['iddestino']." order by id desc limit 1";
                                      
                                                $rr = $connect->query($selectmm);
                                                if ($rr->num_rows > 0) {
                                                    while ($rowr = $rr->fetch_assoc()) {
                                                        $minimo = $rowr["minimo"]; 
                                                        $maximo = $rowr["maximo"];
                                                    } 
                                                }
 


                                                $cantidad= $rowc["cantidad"] / 1000;
                                                echo"
                                                <tr style='height: 30px'>
                                                    "; 
                                                    if($row["destino"] != $desa){
                                                        echo "<td align='center'>".$row["destino"]."</td>";
                                                        }else{echo "<td></td>";}
                                                    
                                                    if($row["noestacion"] != $esa){
                                                    echo "<td align='center'>".$row["noestacion"]."</td>";
                                                    }else{echo "<td></td>";}

                                                if($rowc["producto"] == "DIESEL"){
                                                    echo "<td style='background-color: black; color: white;'>".$producto."</td>";
                                                    }else if($rowc["producto"] == "GASOLINA 87 OCT"){
                                                        echo "<td style='background-color: green; color: white;'>".$producto."</td>";
                                                    }else if($rowc["producto"] == "GASOLINA 91 OCT"){
                                                        echo "<td style='background-color: red; color: white;'>".$producto."</td>";
                                                    }

                                                    echo " 
                                                    <td>".$minimo."</td>
                                                    <td>".$maximo."</td>
                                                    <td>".($rowc["cantidad"]/1000)."</td>
                                                    ";
                                                    if((($cantidad) <= $maximo) AND (($cantidad) >= $minimo)){
                                                        echo "<td></td>";
                                                    }
                                                    if((($cantidad) > $maximo)){
                                                        echo "<td align='center'>+  ".($cantidad - $maximo)."</td>";
                                                    }
                                                    if((($cantidad) < $minimo)){
                                                        echo "<td align='center' style='background-color:red;color:white'>".round(($cantidad-$minimo),3)."</td>";
                                                    }
                
                                                    
                                                    echo " 
                                                </tr>
                                            ";  
                                            $esa = $row["noestacion"]; $desa = $row["destino"];  

                                            }
                                        }
                                  

                                  
                           
                            }  

                            echo "
                            <tr>
                                <td colspan='8' align='center' class='color_blanco' hidden><input type='submit' value='Guardar'></td>
                            </tr>
                            ";

                        }else{
                            
                        }
                           
                            
                        }
                        ?>
                    </table>




   
    
            
            
            
            
            <br><br>
            
		
			
	</div> 	
		
						
	 
	<form action="LoginServlet" method="post">
	</form>
	
	<div id="maincontent"> 
         



	</div> 
	


	 
	

    <script>
 doThisOnChange = function(value, optionIndex)
    { 
 
 var selectElement = document.getElementById("destinoss");
 while (selectElement.options.length > 0) {                
        selectElement.remove(0);
    }  
	var data = new FormData(); 
    var ajax = new XMLHttpRequest();  
	ajax.open("GET", "data/data.php?value="+value,true);
	ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            //console.log(data);

            var html = '';
            for(var a = 0; a < data.length; a++) {
                //var firstName = data[a].iddestino;
                var lastName = data[a].destino; 
                
                selectElement.add(new Option(lastName)); 

            }
			
			 selectElement.add(new Option('TODOS')); 
            document.getElementById("data").innerHTML += html;
        }
        
        
       
    };
	  
}



</script>




 
</div>



<br><br>


<script>
renderFooter();
</script>
</div> 




</body>
</html> 
    
    

 
     
    <script>
        function Print(){  
            $('#txtarea').html(document.getElementById('tabb').outerHTML)
        }
    </script>



<script>
    function setInputDate(_id){
        var _dat = document.querySelector(_id);
        var hoy = new Date(),
        d = (hoy.getDate()),
        m = hoy.getMonth(), 																																																																																																																																																
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
    setInputDate("#dateDefaulttj");  
    </script><script>
    function setInputDatee(_id){
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
    setInputDatee("#dateDefaultt");   
</script>

<script language="JavaScript" src="scripts/datetime.js"></script>
