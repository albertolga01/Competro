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

  <SCRIPT src="js/renderelements.js" type="text/javascript"></SCRIPT>
	
    <link href="styles/menu.css" rel="stylesheet" type="text/css" />
    <link href="styles/sidebar.css" rel="stylesheet" type="text/css" />
    <link href="styles/content.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="iconion.ico"> 
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>  
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

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
    
<link rel="icon" href="img/favicon.ico"> 
<style>
  .sticky{
    position: sticky;
    top: 0;
  }
  .sticky1{
    position: sticky;
    left: 0;
  }
  </style>
</head>


<body class="body" onload="logout()">
	<div id="extra">&nbsp;</div>

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
							 <a class=bold href="menu_reportes">Reportes Internos</a>
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
     <td class="color_blanco"><b>Seleccione cliente:</b></td>
									<td class="color_blanco">
										<?php
										if(isset($_POST["IdEmpresa"]))

	{		

    $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1' and IdEmpresa != '".$_POST['IdEmpresa']."'");

	}else{

		

		 $result = $connect->query("select IdEmpresa, usuario from empresa where tusuario='1'  ");

		}



    echo "<select name='IdEmpresa' id='IdEmpresa'  style='width:100px;' required>

	

	";

	if(isset($_POST["IdEmpresa"]))

	{

		 $resulti = $connect->query("select IdEmpresa, usuario from empresa where IdEmpresa = '".$_POST['IdEmpresa']."'");

		 

		  while ($rowi = $resulti->fetch_assoc()) {



                  unset($idi, $namei);

                  $idi = $rowi['IdEmpresa'];

                  $namei = $rowi['usuario']; 

                  echo '<option value="'.$idi.'" name="empresa" id="select">'.$namei.'</option>';



} 

		  

	}else{echo "	 ";}





    while ($row = $result->fetch_assoc()) {



                  unset($id, $name);

                  $id = $row['IdEmpresa'];

                  $name = $row['usuario']; 

                  echo '<option value="'.$id.'" name="empresa" id="select">'.$name.'</option>';



}  



if(($_POST["IdEmpresa"]) == 'TODOS'){

echo "<option selected>TODOS</option>";

} else{

	echo "<option>TODOS</option>";

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
$descuentos =  array(); 
$productos[] = "GASOLINA 87 OCT";
$productos[] = "GASOLINA 91 OCT";
$productos[] = "DIESEL";
$int = 32;  

$id =  $_POST["IdEmpresa"]; 
if(isset($id)){
  $sqld = "SELECT MONTH(fecha) as fecha FROM facturas WHERE YEAR(fecha) = '".$inicial."' and idempresa = '".$id."' GROUP BY MONTH(fecha)";
}
if($id == "TODOS"){ 
  $sqld = "SELECT MONTH(fecha) as fecha FROM facturas WHERE YEAR(fecha) = '".$inicial."' GROUP BY MONTH(fecha)";
}
   
  

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
        <tr><td class='color_blanco' colspan='49' style='background-color:lightblue; text-align:center;' >".$mesd."
</td></tr >


        <tr>
          <th class='sticky' style='width:40px; '>Empresa</th>  
                        <th class='sticky' align='center'>Producto</th>
          "; 
          
          for($i = 1; $i<$int ; $i ++){
          echo "<th class='sticky' align='center' style='width:20px;'>".$i."</th>";

          }


          echo "
          <th class='sticky'>TOTAL</th>
          <th class='sticky'> - </th> 
          <th class='sticky'>Total M3 Competro</th>
          <th class='sticky'>1</th>
          <th class='sticky'>2</th>
          <th class='sticky'>Beneficio 1</th>
          <th class='sticky'>Beneficio 2</th>
          <th class='sticky'>Beneficio 3</th>
          <th class='sticky'>Beneficio 4</th> 
          <th class='sticky'>Conco 2 (1)</th> 
          <th class='sticky'>Conco 2 (2)</th> 
          <th class='sticky'>Comision</th>
          <th class='sticky'>Beneficio Total</th>
          <th class='sticky'>Beneficio Competro</th>
          <th class='sticky'>Beneficio Competro (conco 2)</th>
          <th class='sticky'>Beneficio Cliente</th>
        </tr>
        ";

        if(isset($id)){
        $sqlbeneficio = "SELECT Magna as descuentomagna, Premium as descuentopremium, Diesel as descuentodiesel 
        from decuentovigente where magna is not null and  year(fecha) = '".$ano."' and month(fecha) = '".$mes."' "; 
        }
        if($id == "TODOS"){
          $sqlbeneficio = "SELECT Magna as descuentomagna, Premium as descuentopremium, Diesel as descuentodiesel 
          from decuentovigente where magna is not null and year(fecha) = '".$ano."' and month(fecha) = '".$mes."'  "; 

        }

 
        
        if(isset($id)){
          $sqlbeneficiod = "SELECT Magna as descuentomagna, Premium as descuentopremium, Diesel as descuentodiesel 
          from decuentovigente where magna is not null and  year(fecha) = '".$ano."' and month(fecha) = '".($mes-1)."'  "; 
          }
          if($id == "TODOS"){
            $sqlbeneficiod = "SELECT Magna as descuentomagna, Premium as descuentopremium, Diesel as descuentodiesel 
            from decuentovigente where magna is not null and year(fecha) = '".$ano."' and month(fecha) = '".($mes-1)."'  "; 
  
          }

          //echo $sqlbeneficiod;
  
  
        
        $resultb = $connect->query($sqlbeneficio);  
        if ($resultb->num_rows > 0) {    
              while($rowb = $resultb->fetch_assoc()) {
            $descuentos[] = $rowb;
              
              }
        }  

      $resultbd = $connect->query($sqlbeneficiod);  
        if ($resultbd->num_rows > 0) {    
            while($rowbd = $resultbd->fetch_assoc()) {
          $descuentosd[] = $rowbd;
            
            }
        }  



$descuentomagna =  $descuentos[0]["descuentomagna"];
$descuentopremium =  $descuentos[0]["descuentopremium"];
$descuentodiesel =  $descuentos[0]["descuentodiesel"];


$descuentomagnados =  $descuentosd[0]["descuentomagna"];
$descuentopremiumdos =  $descuentosd[0]["descuentopremium"];
$descuentodieseldos =  $descuentosd[0]["descuentodiesel"];




        if(isset($id)){
          $sqlempresas = "SELECT t1.idempresa, t2.rzonsocial, t2.color from facturas t1 inner join empresa t2 on t1.idempresa = t2.idempresa where year(t1.fecha)= '".$ano."' and month(t1.fecha) = '".$mes."' and t1.idempresa = '".$id."' group by t1.idempresa "; 

        }
        if($id == "TODOS"){
          $sqlempresas = "SELECT t1.idempresa, t2.rzonsocial, t2.color from facturas t1 inner join empresa t2 on t1.idempresa = t2.idempresa where year(t1.fecha)= '".$ano."' and month(t1.fecha) = '".$mes."' group by t1.idempresa "; 

        }
         
        $resultc = $connect->query($sqlempresas);  
        if ($resultc->num_rows > 0) {  
        while($rowc = $resultc->fetch_assoc()) {
        $empresas[] = $rowc;
         
        }
      } 
       

$sql = "SELECT t2.producto as producto, SUM(t1.cantidad) as cantidad FROM facturas t1 INNER JOIN pedido t2 ON t1.folio = t2.foliofactura
WHERE YEAR(t1.fecha) = '".$inicial."' AND MONTH(t1.fecha) = '".$rowd["fecha"]."' GROUP BY t2.producto  
";
 $c = 1;
   foreach($empresas as $a){
    $beneficiocliente = 0;
        $Q  = "SELECT Porcentaje, PorcentajePremium, PorcentajeDiesel  FROM estadocuenta where idempresa = '".$a["idempresa"]."'";
        $res = $connect->query($Q);  
        if ($res->num_rows > 0) {  
        while($rw = $res->fetch_assoc()) {
          $comm = $rw["Porcentaje"];
          $comp = $rw["PorcentajePremium"];
          $comd = $rw["PorcentajeDiesel"];
        }
      }
      $ctotalcompetro = 0;
      $beneficiototal = 0;
      $beneficiocompetro = 0;
      $beneficiocompetro2 = 0;
      $benecifiocliente = 0;
      $beneficioConco2total = 0;

    echo "<tr  > 
    <td rowspan='3'  style='border-left: 3px solid ".$a["color"].";' class='sticky1' ><div align='center' style='width:150px;' ><label>".$a["rzonsocial"]."</label></div></td> 
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
    <td></td>
   
    ";
$sqlm = "Select sum(t1.cantidad) as cantidad from facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura where t1.idempresa = '".$a["idempresa"]."' and t2.producto = 'GASOLINA 87 OCT'  and year(t1.fecha) = '".$ano."' and month(t1.fecha)  = '".$mes."' AND DAY(t1.fecha) >  '15'";
 
$resultdm = $connect->query($sqlm);  
if ($resultdm->num_rows > 0) {  
while($rowdm = $resultdm->fetch_assoc()) {
  $ctotalcompetro = $ctotalcompetro + ($rowdm["cantidad"]/1000);

$ac = ($rowdm["cantidad"] / 1000);
}
}


$sqlmd = "Select sum(t1.cantidad) as cantidad from facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura where t1.idempresa = '".$a["idempresa"]."' and t2.producto = 'GASOLINA 87 OCT'  and year(t1.fecha) = '".$ano."' and month(t1.fecha)  = '".$mes."' AND DAY(t1.fecha) <  '16'";
  
$resultdmd = $connect->query($sqlmd);  
if ($resultdmd->num_rows > 0) {  
while($rowdmd = $resultdmd->fetch_assoc()) {
  $ctotalcompetro = $ctotalcompetro + ($rowdmd["cantidad"]/1000);


$acd = ($rowdmd["cantidad"] / 1000);
}
} 
 
echo "<td>".number_format((($ac) + ($acd)), 3, ".", ",")."</td>";





$buno = (($acd * $descuentomagnados)+($ac * $descuentomagna)) + (($ac + $acd)*50);
$bdos = (((($acd * $descuentomagnados) + ($ac * $descuentomagna))) * ($comm/100)) + ((($ac + $acd) * 50 ) * ($comm/100));
$conco2magna = $ac * 50;
$beneficiototal = $beneficiototal + ($buno+$conco2magna);
$beneficiocompetro = $beneficiocompetro + ($bdos); 
$beneficiocliente = $beneficiocliente + (abs($buno - $bdos));
$beneficioConco2total1 += $acd* 50;
$beneficioConco2total += $ac* 50;

$beneficiocompetro2 = $beneficiocompetro2 + ($bdos + $conco2magna);
echo "
<td align='center'>".$acd."</td>
<td align='center'>".$ac."</td>

<td align='center'>$".number_format($descuentomagnados, 2)."</td>
<td align='center'>$".number_format($descuentomagna, 2)."</td>

<td align='center'>$50.00</td> 
<td align='center'>$50.00</td>
<td align='center'>$".number_format((($acd * 50)),2)."</td>  
<td align='center'>$".number_format((($conco2magna)),2)."</td>  
<td align='center'>%".$comm."</td> 
<td align='center'>$".number_format((($buno+$conco2magna)), 3, ".", ",")."</td> <!--Beneficio total-->
<td align='center'>$".number_format(($bdos ), 3, ".", ",")."</td>
<td align='center'>$".number_format(($bdos +$conco2magna), 3, ".", ",")."</td>
<td align='center'>$".number_format(abs(($buno - $bdos)), 3, ".", ",")."</td>
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
      <td align='center'></td>
     
    
      ";
$sqlp = "Select sum(t1.cantidad) as cantidad from facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura where t1.idempresa = '".$a["idempresa"]."' and t2.producto = 'GASOLINA 91 OCT'  and year(t1.fecha) = '".$ano."' and month(t1.fecha)  = '".$mes."' AND DAY(t1.fecha) >  '15'";
$resultdp = $connect->query($sqlp);  
if ($resultdp->num_rows > 0) {  
while($rowdp = $resultdp->fetch_assoc()) {
  $ctotalcompetro = $ctotalcompetro + ($rowdp["cantidad"]/1000);

$b = ($rowdp["cantidad"] / 1000);
}
}


$sqlpd = "Select sum(t1.cantidad) as cantidad from facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura where t1.idempresa = '".$a["idempresa"]."' and t2.producto = 'GASOLINA 91 OCT'  and year(t1.fecha) = '".$ano."' and month(t1.fecha)  = '".$mes."' AND DAY(t1.fecha) <  '16'";
$resultdpd = $connect->query($sqlpd);  
if ($resultdpd->num_rows > 0) {  
while($rowdpd = $resultdpd->fetch_assoc()) {
  $ctotalcompetro = $ctotalcompetro + ($rowdpd["cantidad"]/1000);

$bd= ($rowdpd["cantidad"] / 1000);
}
} 
echo "<td>".number_format(($b + $bd), 3, ".", ",")."</td>";





$puno = (($bd * $descuentopremiumdos)+($b * $descuentopremium)) + (($b + $bd)*50);
$pdos = (((($bd * $descuentopremiumdos) + ($b * $descuentopremium))) * ($comp/100)) + ((($b + $bd) * 50 ) * ($comp/100));
$conco2premium = $b * 50;
$beneficiototal = $beneficiototal + ($puno+$conco2premium);
$beneficiocompetro = $beneficiocompetro + ($pdos);
$beneficiocliente = $beneficiocliente + (abs($puno - $pdos));
$beneficioConco2total1 += $bd * 50;
$beneficioConco2total += $b * 50;

$beneficiocompetro2 = $beneficiocompetro2 + ($pdos + $conco2premium);
echo "
<td align='center'>".$bd."</td>
<td align='center'>".$b."</td>

<td align='center'>$".number_format($descuentopremiumdos, 2)."</td>
<td align='center'>$".number_format($descuentopremium, 2)."</td>
<td align='center'>$50.00</td> 
<td align='center'>$50.00</td> 
<td align='center'>$".number_format((($bd * 50)),2)."</td> 
<td align='center'>$".number_format((($conco2premium)),2)."</td> 
<td align='center'>%".$comp."</td>
<td align='center'>$".number_format((($puno+$conco2premium)), 3, ".", ",")."</td> <!--Beneficio total-->
<td align='center'>$".number_format(($pdos ), 3, ".", ",")."</td>
<td align='center'>$".number_format(($pdos +$conco2premium), 3, ".", ",")."</td>
<td align='center'>$".number_format(abs(($puno - $pdos)), 3, ".", ",")."</td>
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
     <td></td>
    
     ";
$sqld = "Select sum(t1.cantidad) as cantidad from facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura where t1.idempresa = '".$a["idempresa"]."' and t2.producto = 'DIESEL'  and year(t1.fecha) = '".$ano."' and month(t1.fecha)  = '".$mes."' AND day(t1.fecha) >  '15'";
$resultdd = $connect->query($sqld);  
if ($resultdd->num_rows > 0) {  
while($rowdd = $resultdd->fetch_assoc()) {
  $ctotalcompetro = $ctotalcompetro + ($rowdd["cantidad"]/1000);
$c = ($rowdd["cantidad"] / 1000);
}
}

$sqldd = "Select sum(t1.cantidad) as cantidad from facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura where t1.idempresa = '".$a["idempresa"]."' and t2.producto = 'DIESEL'  and year(t1.fecha) = '".$ano."' and month(t1.fecha)  = '".$mes."' AND day(t1.fecha) <  '16'";
$resultddd = $connect->query($sqldd);  
if ($resultddd->num_rows > 0) {  
while($rowddd = $resultddd->fetch_assoc()) {
  $ctotalcompetro = $ctotalcompetro + ($rowddd["cantidad"]/1000);

$cdd = ($rowddd["cantidad"] / 1000);
}
} 

echo "<td>".number_format(($c + $cdd), 3, ".", ",")."</td>";

$duno = (($cdd * $descuentodieseldos)+($c * $descuentodiesel)) + (($c + $cdd)*50);
$ddos = (((($cdd * $descuentodieseldos) + ($c * $descuentodiesel))) * ($comd/100)) + ((($c + $cdd) * 50 ) * ($comd/100));
$conco2diesel = $c * 50;
$beneficiototal = $beneficiototal + ($duno+$conco2diesel);
$beneficiocompetro = $beneficiocompetro + ($ddos);
$beneficiocliente = $beneficiocliente + (abs($duno - $ddos));
$beneficioConco2total1 += $cdd * 50;
$beneficioConco2total += $c * 50;

$beneficiocompetro2 = $beneficiocompetro2 + ($ddos + $conco2diesel);
echo "
<td align='center'>".$cdd."</td>
<td align='center'>".$c."</td>

<td align='center'>$".number_format($descuentodieseldos, 2)."</td>
<td align='center'>$".number_format($descuentodiesel, 2)."</td>
<td align='center'>$50.00</td> 
<td align='center'>$50.00</td> 
<td align='center'>$".number_format((($cdd * 50)),2)."</td> 
<td align='center'>$".number_format((($conco2diesel)),2)."</td> 
<td align='center'>%".$comd."</td>
<td align='center'>$".number_format((($duno+$conco2diesel)), 3, ".", ",")."</td> <!--Beneficio total-->
<td align='center'>$".number_format(($ddos ), 3, ".", ",")."</td>
<td align='center'>$".number_format(($ddos+$conco2diesel ), 3, ".", ",")."</td>
<td align='center'>$".number_format(abs(($duno - $ddos)), 3, ".", ",")."</td>
  
</tr>

<tr ><td class='color_blanco' colspan='35'></td>
<td ><b style='font-size:13px;'>".number_format($ctotalcompetro, 3, ".", ",")."</b></td>
<td></td>
<td></td>
<td></td> 
<td></td> 
<td></td> 
<td></td> 
<td><b style='font-size:13px;'>$".number_format($beneficioConco2total1, 2)."<b></td> 
<td><b style='font-size:13px;'>$".number_format($beneficioConco2total, 2)."<b></td> 
<td></td> 
<td><b style='font-size:13px;'>$".number_format($beneficiototal, 3, ".", ",")."</b></td>
<td><b style='font-size:13px;'>$".number_format($beneficiocompetro, 3, ".", ",")."</b></td>
<td><b style='font-size:13px;'>$".number_format($beneficiocompetro2, 3, ".", ",")."</b></td> 
<td><b style='font-size:13px;'>$".number_format($beneficiocliente, 3, ".", ",")."</b></td>
</tr>



    ";
        $totalTotalLitros += $ctotalcompetro;      
        $totalbeneficioConco2total1 += $beneficioConco2total1;      
        $totalbeneficioConco2total += $beneficioConco2total;      
        $totalbeneficiototal += $beneficiototal;      
        $totalbeneficiocompetro += $beneficiocompetro;      
        $totalbeneficiocompetro2 += $beneficiocompetro2;      
        $totalbeneficiocliente += $beneficiocliente;      
     $c ++;
   }
 
	echo "<tr ><td class='color_blanco' colspan='35'></td>
  <td ><b style='font-size:13px;'>".number_format($totalTotalLitros, 3, ".", ",")."</b></td>
  <td></td>
  <td></td>
  <td></td> 
  <td></td> 
  <td></td> 
  <td></td> 
  <td><b style='font-size:13px;'>$".number_format($totalbeneficioConco2total1, 2)."<b></td> 
  <td><b style='font-size:13px;'>$".number_format($totalbeneficioConco2total, 2)."<b></td> 
  <td></td> 
  <td><b style='font-size:13px;'>$".number_format($totalbeneficiototal, 3, ".", ",")."</b></td>
  <td><b style='font-size:13px;'>$".number_format($totalbeneficiocompetro, 3, ".", ",")."</b></td>
  <td><b style='font-size:13px;'>$".number_format($totalbeneficiocompetro2, 3, ".", ",")."</b></td> 
  <td><b style='font-size:13px;'>$".number_format($totalbeneficiocliente, 3, ".", ",")."</b></td>
  </tr>
  ";

						
						
	



 
 	echo "	 </table> 
	 	";	 
      
       
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
<br><br>
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
      var hoy =new Date(new Date().setDate(new Date().getDate() - 0)),
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


    