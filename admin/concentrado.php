  <?php 
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

	  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>  
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script> 
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.4.0/dist/chartjs-plugin-datalabels.min.js"></script> 
     
	
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

<?php 
$Q= "SELECT usuario, color FROM empresa where idempresa != '2509' and idempresa != '2522'";
$result = mysqli_query($connect, $Q) or die("Error in Selecting " . mysqli_error($connect));
		 
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
 

echo '

  <div style="position: fixed; height:5vmax; width:100px; top:calc(15% - 60px);">

'; 
foreach($emparray as $a){
  echo "<div style='background-color:".$a["color"]."; color:#FFFF;' align='center'>".$a["usuario"]."</div><br>";

}

echo
 
'   </div>
  '  ;
  ?>
<div id="page">

  <div id="header">
    <div id="header2">

    <script> 
        var usuario = '<?php echo $_SESSION['usuario']; ?>'; 
        var rfc = '<?php echo $_SESSION['rfc']; ?>'; 
        renderHeader(usuario, rfc);
    </script>

          <script type="text/JavaScript">
            $("#un").load("controladorad/tprc.php");
        </script>
       
    </div>
  </div>




  <script  type="text/javascript" > 
     function logout(){<?php 
  
   
		if (($_SESSION["usuario"]) !== null) {
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
							 <a class=bold href="menu_reportes">Reportes Internos</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Concentrado y gráficas</a>
							
					  </div>

						
				</div>
			
			

			
	
	
 




		<div id="maincontent"></div>		

	
	
	  
			
		
	<div id="maincontent" align="center">
     <form name="forma1" method="post" action="concentrado">
    <table align="center" class="parametros">
			<tr>
			<td class="color_blanco"><B>Selecciona año:</B></td>
            <td class="color_blanco">
		  <?php if(isset($_POST['fini'])){

         
					$fecha = $_POST['fini'];
					echo '<select name="fini">
          <option selected>'.$_POST['fini'].'</option> 
          <option>2020</option>
          <option>2021</option>
          <option>2022</option>
          <option>2023</option>
          <option>2024</option>
          <option>2025</option>
          <option>2026</option>
          <option>2027</option>
          </select>';
					}else {
            echo '<select name="fini"> 
            <option>2020</option>
            <option>2021</option>
            <option>2022</option>
            <option>2023</option>
            <option>2024</option>
            <option>2025</option>
            <option>2026</option>
            <option>2027</option>
            </select>';
					}
				
				   ?>
		 </td>
			 
	
			
			
	
		
		
		<tr>
    <tr>
			<td class="color_blanco"><B>Seleccione mes:</B></td>
            <td class="color_blanco">
		  <?php if(isset($_POST['mes'])){
					$fecha = $_POST['mes'];

            switch($_POST["mes"]){
              case 1:
              $a = "Enero";
              break;
              case 2:
              $a = "Febrero";
              break;
              case 3:
              $a = "Marzo";
              break;
              case 4:
              $a = "Abril";
              break;
              case 5:
              $a = "Mayo";
              break;
              case 6:
              $a = "Junio";
              break;
              case 7:
              $a = "Julio";
              break;
              case 8:
              $a = "Agosto";
              break;
              case 9:
              $a = "Septiembre";
              break;
              case 10:
              $a = "Octubre";
              break;
              case 11:
              $a = "Noviembre";
              break;
              case 12:
              $a = "Diciembre";
              break;


            }

					echo '<select name="mes" style="width:90px;">
          <option selected value='.$fecha.'>'.$a.'</option> 
          <option value="1">Enero</option>
          <option value="2">Febrero</option>
          <option value="3">Marzo</option>
          <option value="4">Abril</option>
          <option value="5">Mayo</option>
          <option value="6">Junio</option>
          <option value="7">Julio</option>
          <option value="8">Agosto</option>
          <option value="9">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>
          </select>';
					}else {
            echo '<select name="mes" style="width:90px;"> 
            <option value="1">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
            </select>';
					}
				
				   ?>
		 </td> 
		</tr>
			 
		</tr>
		<tr>
			<td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
		</tr>
	</table>
    </form>
     <br>
 
						
    
    <?php 
	if (isset($_POST['fini'])) {
// Check connection 
$inicial = $_POST['fini'];  
$final = $_POST['finial'];

$cont = 0;
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
} 

  $sqld = " SELECT MONTH(fecha) as fecha FROM facturas WHERE YEAR(fecha) = '".$inicial."' and month(fecha) = '".$_POST["mes"]."' GROUP BY MONTH(fecha) ";
   
   
   
 
$resultd = $connect->query($sqld);
if ($resultd->num_rows > 0) {
// output data of each row
while($rowd = $resultd->fetch_assoc()) {  

  $producto = array();
  $saldom = array();
  $saldop = array();
  $saldod = array();

  switch($rowd["fecha"]){
    case 1:
    $mes = "Enero";
    break;
    case 2:
    $mes = "Febrero";
    break;
    case 3:
    $mes = "Marzo";
    break;
    case 4:
    $mes = "Abril";
    break;
    case 5:
    $mes = "Mayo";
    break;
    case 6:
    $mes = "Junio";
    break;
    case 7:
    $mes = "Julio";
    break;
    case 8:
    $mes = "Agosto";
    break;
    case 9:
    $mes = "Septiembre";
    break;
    case 10:
    $mes = "Octubre";
    break;
    case 11:
    $mes = "Noviembre";
    break;
    case 12:
    $mes = "Diciembre";
    break;

  }
	
 echo " </form>
 <br>
<table align='center'>
<tr><br></tr>
        <tr><td class='color_blanco' colspan='7' style='background-color:lightblue; text-align:center;' >".$mes."
</td></tr>
        <tr>
          <th  style='width:40px;'>Nivel</th>
          <th align='center' style='width:80px;'>Producto</th>
          <th align='center'>Total de pipas</th>
          <th align='center'>Total M/3</th>
          <th align='center'>Factor Pemex</th>
          <th align='center'>Nivel Optimo en M3</th>
          <th align='center'>Restante en M/3</th>
                        <th align='center' hidden>Restante en Pipas</th>
    
        </tr>
        ";

        $sqlcan = "SELECT t1.idempresa, t3.color, t3.usuario, SUM(t1.cantidad) as cantidad FROM facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura inner join empresa t3 on t1.idempresa = t3.idempresa
         WHERE YEAR(t1.fecha) = '".$inicial."'  AND MONTH(t1.fecha) = '".$rowd["fecha"]."' and t2.producto = 'GASOLINA 87 OCT' GROUP BY idempresa order by sum(t1.cantidad) desc
        ";  
        $resultc = $connect->query($sqlcan);  
        if ($resultc->num_rows > 0) {  
        while($rowc = $resultc->fetch_assoc()) {
        $saldom[] = $rowc;
         
        }
      }
      $sqlcan = "SELECT t1.idempresa, t3.color, t3.usuario, SUM(t1.cantidad) as cantidad FROM facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura inner join empresa t3 on t1.idempresa = t3.idempresa
      WHERE YEAR(t1.fecha) = '".$inicial."'  AND MONTH(t1.fecha) = '".$rowd["fecha"]."' and t2.producto = 'GASOLINA 91 OCT' GROUP BY idempresa  order by sum(t1.cantidad) desc
     "; 
     $resultc = $connect->query($sqlcan);  
     if ($resultc->num_rows > 0) {  
     while($rowc = $resultc->fetch_assoc()) {
     $saldop[] = $rowc;
      
     }
   }

   $sqlcan = "SELECT t1.idempresa, t3.color, t3.usuario, SUM(t1.cantidad) as cantidad FROM facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura inner join empresa t3 on t1.idempresa = t3.idempresa
   WHERE YEAR(t1.fecha) = '".$inicial."'  AND MONTH(t1.fecha) = '".$rowd["fecha"]."' and t2.producto = 'DIESEL' GROUP BY idempresa  order by sum(t1.cantidad) desc
  "; 
  $resultc = $connect->query($sqlcan);  
  if ($resultc->num_rows > 0) {  
  while($rowc = $resultc->fetch_assoc()) {
  $saldod[] = $rowc;
   
  }
}

 

        $sqlniveles = "SELECT magna as dm, premium as dp, diesel as dd, mm, mp, md from decuentovigente where mm is not null and year(fecha) = '".$inicial."' and month(fecha) = '".$rowd["fecha"]."';
        ";   
        $resultn = $connect->query($sqlniveles);  
        if ($resultn->num_rows > 0) { 
        while($rown = $resultn->fetch_assoc()) {
          $nm = $rown["dm"];
          $np = $rown["dp"];
          $nd = $rown["dd"];
          $mm = $rown["mm"];
          $mp = $rown["mp"];
          $md = $rown["md"];
        }
      }


      


$sql = "SELECT count(t1.folio) as nfacturas, t2.producto as producto, SUM(t1.cantidad) as cantidad FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2.foliofactura
WHERE YEAR(t1.fecha) = '".$inicial."' AND MONTH(t1.fecha) = '".$rowd["fecha"]."' GROUP BY t2.producto  
";
 
  
$result = $connect->query($sql);  
if ($result->num_rows > 0) { 
while($row = $result->fetch_assoc()) {
  $producto[] = $row;
 // 
if($row["producto"] == "GASOLINA 87 OCT"){
  $nivel = $nm;
  $niveloptimo = $mm;
  $bgc = "green";
}
if($row["producto"] == "GASOLINA 91 OCT"){
  $nivel = $np;
  $niveloptimo = $mp;
  $bgc = "red";
}
if($row["producto"] == "DIESEL"){
  $nivel = $nd;
  $niveloptimo = $md;
  $bgc = "black";
}

	$blanco = "#FFFF";
echo "<tr>
 
<td><div align='center'><label>".$nivel."</label></div></td>
<td style='background-color:".$bgc."; color:white;'  ><div align='center'><label style='background-color:".$bgc.";'>".$row["producto"]."</label></div></td>
<td><div align='center'><label>".$row["nfacturas"]."</label></div></td>
<td><div align='center'><label>".number_format(($row["cantidad"] / 1000))."</label></div></td></td>
<td><div align='center'><label>".number_format(((round(($row["cantidad"] / 1000)) / 30 ) * 30.5))."</label></div></td></td>
<td><div align='center'  ><label>".number_format($niveloptimo)."</label></div></td>
<td><div align='center'  ><label >".(($niveloptimo)-(round(((round(($row["cantidad"] / 1000)) / 30 ) * 30.5))))."</label></div></td> 
<td hidden><div align='center'  ><label >".number_format((((($niveloptimo)-((( ($row["cantidad"] / 1000) / 30 ) * 30.5))) * 1000) / 20000),2)."</label></div></td>   
</tr>";

$sumM3 += round($row["cantidad"] / 1000); /*  SUM M3 AND ECHOING IN LAST ROW  */
}
echo"
    <tr>
        <td colspan='3'></td>
        <td style='text-align: center;'>{$sumM3}</td>
        <td colspan='3'></td>
    </tr>
";
}else { echo ""; }

						
						
						
	



 
 	echo "	 </table>
    
   <div style='width:900px; height:550;'>
   <br><br> 
   <canvas id='line-chart".$mes."magna' width='900' height='550'></canvas>  
   </div>
   <div style='width:900px; height:550;'>
   <br><br> 
   <canvas id='line-chart".$mes."premium' width='900' height='550'></canvas>  
   </div>
   <div style='width:900px; height:550;'>
   <br><br> 
   <canvas id='line-chart".$mes."diesel' width='900' height='550'></canvas>  
   </div> 
	 	";	 
     foreach($saldom as $c){ 
      $col[] = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
      
   }
  

      echo '
      <script>
      var options = {
        legend:{
          display:false
        },
        tooltips: {
          enabled: true,
          mode: "single",
          callbacks: {
            label: function(tooltipItem, data) {
              var allData = data.datasets[tooltipItem.datasetIndex].data;
              var tooltipLabel = data.labels[tooltipItem.index];
              var tooltipData = allData[tooltipItem.index];
              return tooltipLabel + ": " + tooltipData.toLocaleString("en")
               ;
              
            }
          }
        },
        title: {
          display: true,
          text: "MAGNA"
        },
        plugins: {
          datalabels: {
            formatter: (value, ctx) => {
              let datasets = ctx.chart.data.datasets;
              if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
                let sum = datasets[0].data.reduce((a, b) => a + b, 0);
                let percentage = Math.round((value / sum) * 100) + "%" ;
                return percentage;
              } else {
                return percentage;
              }
            },
            color: "#ffff",
          }
        }
      };
      var optionsp = {
        legend:{
          display:false
        },
        tooltips: {
          enabled: true,
          mode: "single",
          callbacks: {
            label: function(tooltipItem, data) {
              var allData = data.datasets[tooltipItem.datasetIndex].data;
              var tooltipLabel = data.labels[tooltipItem.index];
              var tooltipData = allData[tooltipItem.index];
              return tooltipLabel + ": " + tooltipData.toLocaleString("en")
               ;
              
            }
          }
        },
        title: {
          display: true,
          text: "PREMIUM"
        },
        plugins: {
          datalabels: {
            formatter: (value, ctx) => {
              let datasets = ctx.chart.data.datasets;
              if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
                let sum = datasets[0].data.reduce((a, b) => a + b, 0);
                let percentage = Math.round((value / sum) * 100) + "%" ;
                return percentage;
              } else {
                return percentage;
              }
            },
            color: "#ffff",
          }
        }
      };
      var optionsd = {
        legend:{
          display:false
        },
        tooltips: {
          enabled: true,
          mode: "single",
          callbacks: {
            label: function(tooltipItem, data) {
              var allData = data.datasets[tooltipItem.datasetIndex].data;
              var tooltipLabel = data.labels[tooltipItem.index];
              var tooltipData = allData[tooltipItem.index];
              return tooltipLabel + ": " + tooltipData.toLocaleString("en")
               ;
              
            }
          }
        },
        title: {
          display: true,
          text: "DIESEL"
        },
        plugins: {
          datalabels: {
            formatter: (value, ctx) => {
              let datasets = ctx.chart.data.datasets;
              if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
                let sum = datasets[0].data.reduce((a, b) => a + b, 0);
                let percentage = Math.round((value / sum) * 100) + "%" ;
                return percentage;
              } else {
                return percentage;
              }
            },
            color: "#ffff",
          }
        }
      };

      var ctx = document.getElementById("line-chart'.$mes.'magna").getContext("2d");
      new Chart(ctx, {
          type: "pie",
          data: {
            labels: [ 
              '; 
              foreach ($saldom as  $t) {
                  echo " '".$t["usuario"]."'".",";
                } 
              echo ' 
          ],
            datasets: [{
              label: "Importes",
              backgroundColor: [
                   
                  ';
             
                  foreach ($saldom as  $t) {
                      echo "'"."   ".$t["color"]."   '".",";
                    }
                   
                  echo '
          ],
              data: [
                  ';
             
                  foreach ($saldom as  $t) {
                      echo $t["cantidad"].",";
                    }
                   
                  echo '

              ]
            }]
          },
          options: options
      });
       </script>
       <script>
       new Chart(document.getElementById("line-chart'.$mes.'premium"), {
           type: "pie",
           data: {
             labels: [ 
               '; 
               foreach ($saldop as  $t) {
                   echo "'".$t["usuario"]."'".",";
                 } 
               echo ' 
           ],
             datasets: [{
               label: "Importes",
               backgroundColor: [
                    
                   ';
              
                   foreach ($saldop as  $t) {
                       echo "'"."".$t["color"]."'".",";
                     }
                    
                   echo '
           ],
               data: [
                   ';
              
                   foreach ($saldop as  $t) {
                       echo $t["cantidad"].",";
                     }
                    
                   echo '
 
               ]
             }]
           },
           options:  optionsp
       });
        </script>
        <script>
        new Chart(document.getElementById("line-chart'.$mes.'diesel"), {
            type: "pie",
            data: {
              labels: [ 
                '; 
                foreach ($saldod as  $t) {
                    echo "'".$t["usuario"]."'".",";
                  } 
                echo ' 
            ],
              datasets: [{
                label: "Importes",
                backgroundColor: [
                     
                    ';
               
                    foreach ($saldod as  $t) {
                        echo "'"."".$t["color"]."'".",";
                      }
                     
                    echo '
            ],
                data: [
                    ';
               
                    foreach ($saldod as  $t) {
                        echo $t["cantidad"].",";
                      }
                     
                    echo '
  
                ]
              }]
            },
            options: optionsd
        });
         </script>
      ';
 
}
}






	}
	?>
     
				
    
           
    <script>
document.getElementById('dropbutton').onclick = function() {
    if (Calc.Input.value == '' || Calc.Input.value == '0') {
         window.alert("Please enter a number");
    } else {
        document.getElementById('dropbutton').value=' Justera längd ';
        document.getElementById('length').innerHTML = Calc.Input.value;
        document.getElementById('dropbutton').style.backgroundColor = '#FFF6B3';
    }
    return false;
}
</script>
    
 <!--  
<table align="center">
<tr>
<th height="24">Folio</th>
<th>Centro Entrega</th>
<th>Producto</th>
<th>Destino</th>
<th>Fecha</th>
<th>Presentacion</th>
<th>Turno</th>
<th>Medio</th>
<th>Transportista</th>
<th>Capacidad</th> 
<th>EstadoAtencion</th>	
<th>Agregar</th>	
</tr>
 
<?php 
// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

$myDate = date('d/m/Y');

$sql = "SELECT folio, CentroEntrega, producto, destino, fecha, presentacion, turno, medio, Transportista, capacidad, EstadoAtencion FROM pedido where idempresa = '".$_SESSION["idempresa"]."' AND fecha = '".$myDate."' ";
$result = $connect->query($sql);
 

 
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
<form name='forma' method='post' action='controlador/updatepedidod.php'> 
 
<td> <input type='text' name='folio' value ='" . $row["folio"]."' size='4'  readonly ></td>
<td> <input type='text' name='centroentrega' value ='" . $row["CentroEntrega"] . "' size='22'   ></td>
<td> <input type='text' name='producto' value='".$row["producto"] . "' size='18'   ></td>
<td> <input type='text' name='destino' value ='". $row["destino"]. "' size='2'   ></td>
<td> <input type='text' name='fecha' value ='".$row["fecha"]. "' size='10'   > </td>
<td> <input type='text' name='presentacion' value ='" . $row["presentacion"] . "' size='6'  ></td>
<td> <input type='text' name='turno' value ='". $row["turno"]."' size='2'   ></td>
<td> <input type='text' name='medio' value ='". $row["medio"]."' size='12'   ></td>
<td> <input type='text' name='transportista' value='".$row["Transportista"]."' size='14'   ></td>
<td> <input type='text' name='capacidad' value ='". $row["capacidad"]. "' size='4'   ></td>
<td> <input type='text' name='estadoatencion' value ='". $row["EstadoAtencion"]. "' size='20'   ></td>
<td><input type='Submit' name='uno' value='Actualizar'></td>

 </form>
</tr>";
}

echo "
<tr>
<form name='formaagregar' method='post' action='controlador/postpedidod.php'> 

<input type='hidden' name='idempresa' value ='" . $_SESSION["idempresa"]."' size='4'  readonly >
<td><input type='text' name='folio' value ='' size='4' readonly ></td>
<td><input type='text' name='centroentrega' value ='' size='22'  ></td>
<td><input type='text' name='producto' value ='' size='18'   ></td>
<td><input type='text' name='destino' value ='' size='2'   ></td>
<td><input type='text' name='fecha' ' value ='' size='10' readonly  ></td>
<td><input type='text' name='presentacion' value ='' size='6'   ></td>
<td><input type='text' name='turno' value ='' size='2'   ></td>
<td><input type='text' name='medio' value ='' size='12'   ></td>
<td><input type='text' name='transportista' value ='' size='14'   ></td> 
<td><input type='text' name='capacidad' value ='' size='4'   ></td> 
<td><input type='text' name='estadoatencion' value ='' size='20' readonly  ></td> 
<td><input type='Submit' name='uno' value=' Agregar  '></td>
</form>
</tr>


";






echo "</table>";
} else { echo "0 results"; 



echo "
<tr>
<form name='formaagregard' method='post' action='postpedidod.php'> 
<input type='hidden' name='idempresa' value ='" . $_SESSION["idempresa"]."' size='4'  readonly >
<td><input type='text' name='folio' value ='' size='4' readonly ></td>
<td><input type='text' name='centroentrega' value ='' size='22'  ></td>
<td><input type='text' name='producto' value ='' size='18'   ></td>
<td><input type='text' name='destino' value ='' size='2'   ></td>
<td><input type='text' name='fecha'  value ='' size='10' readonly ></td>
<td><input type='text' name='presentacion' value ='' size='6'   ></td>
<td><input type='text' name='turno' value ='' size='2'   ></td>
<td><input type='text' name='medio' value ='' size='12'   ></td>
<td><input type='text' name='transportista' value ='' size='14'   ></td> 
<td><input type='text' name='capacidad' value ='' size='4'   ></td> 
<td><input type='text' name='estadoatencion' value ='' size='20'  readonly ></td> 
<td><input type='Submit' name='uno' value=' Agregar  '></td>
</form>
</tr>";



}
$connect->close();
?>
</table>
    
    
	-->  	
            
            
            
            
            <br><br>
            
		
			
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
 
setInputDate("#dateDefaultfinal");   
     </script>
     
	 
	  <script>
function setInputDate(_id){
    var _dat = document.querySelector(_id);
      var hoy =new Date(new Date().setDate(new Date().getDate() - 30)),
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




    