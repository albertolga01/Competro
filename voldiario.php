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
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>  
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

	<script src="dw_sizerdx.js" type="text/javascript"></script>
	<SCRIPT src="scripts/textsize.js" type="text/javascript"></SCRIPT>
	<SCRIPT src="scripts/renderelements.js" type="text/javascript"></SCRIPT>
        
        
	
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link href="styles/Portal_SIIC.css" rel="stylesheet" type="text/css" />
	<title>ComPetro</title>
 
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="scripts/uijquery.js"></script>
    
     
<link rel="icon" href="img/favicon.ico"> 
<style>
  .sticky{
    position: sticky;
    top: 0;
  }
  </style>
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
							 <a  href="menu_cte" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="reportes_internos">Reportes Internos</a>
               &nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Volumenes Diario</a>
							
					  </div>

						
				</div>
			
			
	
			
	
	
 




		<div id="maincontent"></div>		

	
	
	  
			
		
	<div id="maincontent" align="center">
     <form name="forma1" method="post" action="voldiario">
    <table align="center" class="parametros">
    <tr>
			<td class="color_blanco"><B>Seleccione año:</B></td>
            <td class="color_blanco">
		  <?php if(isset($_POST['fini'])){
					$fecha = $_POST['fini'];
					echo '<select name="fini" style="width:90px;">
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
            echo '<select name="fini" style="width:90px;"> 
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
		</tr>
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

   
    	 
		<tr>
			<td colspan=2 align="center" class="color_blanco"> <input type="submit" value="Aceptar"></td>
		</tr>
	</table>
    </form>
     <br>
 
						
    
    <?php 
	if (isset($_POST['fini'])) {
// Check connection  
$inicial = $_POST["fini"]; 

$mes =  $_POST["mes"];
$mesd =  $_POST["mes"];
$ano = $_POST["fini"];

$cont = 0;
if ($connect->connect_error) {

die("Connection failed: " . $connect->connect_error);
}   
$productos =  array();  
$productos[] = "GASOLINA 87 OCT";
$productos[] = "GASOLINA 91 OCT";
$productos[] = "DIESEL";
$int = 32;   


$id =  $_SESSION["idempresa"];  
  $sqld = "SELECT MONTH(fecha) as fecha FROM facturas WHERE YEAR(fecha) = '".$inicial."' and idempresa = '".$id."' GROUP BY MONTH(fecha)";
 
   
  

  $producto = array();
  $empresas= array();

  $saldop = array();
  $saldod = array(); 
  switch($mesd){
    case 1:
    $mesd = "Enero";
    break;
    case 2:
    $mesd = "Febrero";
    break;
    case 3:
    $mesd = "Marzo";
    break;
    case 4:
    $mesd = "Abril";
    break;
    case 5:
    $mesd = "Mayo";
    break;
    case 6:
    $mesd = "Junio";
    break;
    case 7:
    $mesd = "Julio";
    break;
    case 8:
    $mesd = "Agosto";
    break;
    case 9:
    $mesd = "Septiembre";
    break;
    case 10:
    $mesd = "Octubre";
    break;
    case 11:
    $mesd = "Noviembre";
    break;
    case 12:
    $mesd = "Diciembre";
    break;

  }
	
 echo " </form>
 <br>
<table align='center' style=' position: relative;
border-collapse: collapse; '>


<tr><br></tr>
        <tr><td class='color_blanco' colspan='48' style='background-color:lightblue; text-align:center;' >".$mesd."
</td></tr >


        <tr>
          <th class='sticky' style='width:40px; '>Empresa</th>  
                        <th class='sticky' align='center'>Producto</th>
          "; 
          
          for($i = 1; $i<$int ; $i ++){
          echo "<th class='sticky' align='center' style='width:20px;'>".$i."</th>";

          }


          echo "
          <th>Total</th>
        </tr>
        ";

        
          //echo $sqlbeneficiod;
  
  
        
     

        if(isset($id)){
          $sqlempresas = "SELECT t1.idempresa, t2.rzonsocial, t2.color from facturas t1 inner join empresa t2 on t1.idempresa = t2.idempresa where year(t1.fecha)= '".$ano."' and month(t1.fecha) = '".$mes."' and t1.idempresa = '".$id."' group by t1.idempresa "; 

        }
       
         
        $resultc = $connect->query($sqlempresas);  
        if ($resultc->num_rows > 0) {  
        while($rowc = $resultc->fetch_assoc()) {
        $empresas[] = $rowc;
         
        }
      } 
       

 
 $c = 1;
   foreach($empresas as $a){
   

    echo "<tr  > 
    <td rowspan='3'  style='border-left: 3px solid ".$a["color"].";'><div align='center' style='width:150px;' ><label>".$a["rzonsocial"]."</label></div></td> 
    <td style='height:20px;'>Magna</td>  ";
    $arraym = array();
    $arrayp = array();
    $arrayd = array();

    $magna = " SELECT DAY(t1.fecha) as f, COUNT(t1.folio) as c FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2.foliofactura
    WHERE YEAR(t1.fecha) = '".$ano."' AND MONTH(t1.fecha) = '".$mes."' 
   AND t1.idempresa = '".$a["idempresa"]."' AND t2.producto = 'GASOLINA 87 OCT' GROUP BY DAY(t1.fecha)";  

 
    $resultm = $connect->query($magna);  
              if ($resultm->num_rows > 0) {  
              while($rowm = $resultm->fetch_assoc()) {
              $arraym[] = $rowm;
              
              }
            } 


            $premium = " SELECT DAY(t1.fecha) as f, COUNT(t1.folio) as c FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2.foliofactura
            WHERE YEAR(t1.fecha) = '".$ano."' AND MONTH(t1.fecha) = '".$mes."' 
           AND t1.idempresa = '".$a["idempresa"]."' AND t2.producto = 'GASOLINA 91 OCT' GROUP BY DAY(t1.fecha)";  
        
         
            $resultp = $connect->query($premium);  
                      if ($resultp->num_rows > 0) {  
                      while($rowp = $resultp->fetch_assoc()) {
                      $arrayp[] = $rowp;
                      
                      }
                    } 


                    $diesel = " SELECT DAY(t1.fecha) as f, COUNT(t1.folio) as c FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2.foliofactura
                    WHERE YEAR(t1.fecha) = '".$ano."' AND MONTH(t1.fecha) = '".$mes."' 
                   AND t1.idempresa = '".$a["idempresa"]."' AND t2.producto = 'DIESEL' GROUP BY DAY(t1.fecha)";  
                
                 
                    $resultd = $connect->query($diesel);  
                              if ($resultd->num_rows > 0) {  
                              while($rowd = $resultd->fetch_assoc()) {
                              $arrayd[] = $rowd;
                              
                              }
                            } 
 
$co = 1;
$d = 0;
$cm = 0;
  for($i = 0; $i < ($int-1); $i++){

   
    if($arraym[$d]["f"] == $co){
      echo "<td align='center'>".$arraym[$d]["c"]."</td>"; 
   $cm += $arraym[$d]["c"];
    }else{  
      echo "<td></td>";
      $d--;
    }
   $co ++;
 
$d ++;
}





    
    
    echo "
    <td align='center'>".$cm."</td>
     
    ";
 
 
echo "
 
</tr>
      
     <tr> 
     <td style='height:20px;'>Premium</td>";
     
     $co = 1;
     $d = 0;
     $cp = 0;
       for($i = 0; $i < ($int-1); $i++){
     
        
         if($arrayp[$d]["f"] == $co){
           echo "<td align='center'>".$arrayp[$d]["c"]."</td>"; 
           $cp += $arrayp[$d]["c"];
         }else{  
           echo "<td></td>";
           $d--;
         }
        $co ++;
      
     $d ++;
     }

     echo" 
     <td align='center'>".$cp."</td> 
     
    
      ";
 



 
echo "
 
     </tr>
     <tr style='border-bottom: 6px solid ".$a["color"]."'> 
     <td style='height:20px;'>Diesel</td>";
     $co = 1;
     $d = 0;
     $cd = 0;
       for($i = 0; $i < ($int-1); $i++){
     
        
         if($arrayd[$d]["f"] == $co){
           echo "<td align='center'>".$arrayd[$d]["c"]."</td>"; 
           $cd += $arrayd[$d]["c"];
         }else{  
           echo "<td></td>";
           $d--;
         }
        $co ++;
      
     $d ++;
     }
     echo" 
     <td align='center'>".$cd."</td> 
    
     ";
 
 
 

echo "
 
  
</tr>
 



    ";
                
     $c ++;
   }
 
	

						
						
	



 
 	echo "	 </table> 
	 	";	 
      
       
	}
	?>
    

				
    
   
            
            
            
            <br><br>
            
		
			
	</div> 	
		 
	
	



 
</div>



<br><br>
<br><br>
<br><br>
<br><br> 
<br><br>


<script>
renderFooter();
</script>

</div>




</body>
</html>
     
	  
     

     <script language="JavaScript" src="scripts/datetime.js"></script>
 


    