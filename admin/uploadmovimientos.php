<?php

require_once "scripts/simplexlsx.php"; 




//if todos son null, go back to cargamovimientos.php

$a = 0;
$b = 0;
$c = 0;




$Banco = '';
if(file_exists($_FILES['file']['tmp_name'])){
$uploaddir = '../uploads/';
    $uploadfile = $uploaddir . basename($_FILES['file']['name']); 

    echo "<p>";
	if ( $xlsx = SimpleXLSX::parse($_FILES['file']['tmp_name']) ) {
   // print_r( $xlsx->rows() );

 
$FechaIngresada = $_POST['fini']; 
$fecha['fec'] = array();
$concepto['con'] = array();
$referencia['ref'] = array();
$cargo['car'] = array();
$abono['abon'] = array();
$records = $xlsx->rows();
     foreach ($records as $i => $row) {
         if ($row[0] and $i > 0) {
			 $fecha['fec'][$i]= $records[$i][0];
			  $concepto['con'][$i]= $records[$i][1];
			   $referencia['ref'][$i]= $records[$i][2];
			    $cargo['car'][$i]= $records[$i][4];
			     $abono['abon'][$i]= $records[$i][5];
         }
     } 


    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {  
	$in = 0;
	$Banco = 'BBVA';
		echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">';
		    foreach ($records as $i => $row) {
            if ($row[0] and $i > 0) {
				echo '
		   <form method="post" action="cargamovimientos.php" name="frm1">
		   <input type="hidden" name="Fecha[]" value="'.$records[$i][0].'">
		   <input type="hidden" name="Concepto[]" value="'.$records[$i][1].'">
		   <input type="hidden" name="Referencia[]" value="'.$records[$i][3].'">
		   <input type="hidden" name="Cargo[]" value="'.$records[$i][4].'">
		   <input type="hidden" name="Abono[]" value="'.$records[$i][5].'">
		   <input type="hidden" name="fini" value="'.$FechaIngresada.'">
		   <input type="hidden" name="Banco" value="'.$Banco.'">
		   ';
			   }
			}
	       echo '
		   </form>
		   </body> ';	 
		

    } else {
        echo "hhh";
		
		
    }
	
	} else {
    echo SimpleXLSX::parseError();
	echo "uno";
	
		} 
		
}else{$a = 1;}
		
		if(file_exists($_FILES['banorte']['tmp_name'])){
			
		
		$fechac['fec'] = array();
$conceptoc['con'] = array();
$referenciac['ref'] = array(); 
$abonoc['abon'] = array();
	
	$Cuenta['cuenta'] = array();
	$file = fopen($_FILES['banorte']['tmp_name'], 'r');
	$index = 0;
	

$FechaIngresada = $_POST['fini'];  
$Banco = 'BANORTE';
		echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">';
		    while(($line = fgetcsv($file)) !== FALSE) {
		 
           
				echo '
		   <form method="post" action="cargamovimientos.php" name="frm1">
		   <input type="hidden" name="Fecha[]" value="'.$line[1].'">
		   <input type="hidden" name="Concepto[]" value="'.$line[4].'">
		   <input type="hidden" name="Referencia[]" value="'.$line[11].'">
		   <input type="hidden" name="Cargo[]" value="'.$line[8].'">
		   <input type="hidden" name="Abono[]" value="'.$line[7].'">
		   <input type="hidden" name="fini" value="'.$FechaIngresada.'">
		    <input type="hidden" name="Banco" value="'.$Banco.'">
		   ';
			  
			}
	       echo '
		   </form>
		   </body> ';	 
		


fclose($file);
	
	
		}else{$b = 1;}
	
	
	
	
	
	
	
	if(file_exists($_FILES['santander']['tmp_name'])){
		
	
		$fechac['fec'] = array();
$conceptoc['con'] = array();
$referenciac['ref'] = array(); 
$abonoc['abon'] = array();
	
	$Cuenta['cuenta'] = array();
	$file = fopen($_FILES['santander']['tmp_name'], 'r');
	$index = 0;
	

$FechaIngresada = $_POST['fini'];  
$Banco = 'SANTANDER'; 
		echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">';
		    while(($line = fgetcsv($file)) !== FALSE) { 
    
				echo '
		   <form method="post" action="cargamovimientos.php" name="frm1">
		   <input type="hidden" name="Fecha[]" value="'.$line[1].'">
		   <input type="hidden" name="Concepto[]" value="'.$line[4].'">
		   <input type="hidden" name="Referencia[]" value="'.$line[9].'">  
		   <input type="hidden" name="Cargo[]" value="'.$line[8].'">
		   <input type="hidden" name="Abono[]" value="'.$line[6].'">
		   <input type="hidden" name="Tipo[]" value="'.$line[5].'">
		   <input type="hidden" name="fini" value="'.$FechaIngresada.'">
		    <input type="hidden" name="Banco" value="'.$Banco.'">
		   ';
			  
			}
	       echo '
		   </form>
		   </body> ';	 
		


fclose($file);
	
	
		}else {$c = 1;}
		
		//echo $a; echo $b; echo $c; 
		
		
	/* para regresar si los tres son nulos 
	if($a == '1' and $b == '1' and $b == '1'){
		  echo "<script> 
window.location.href='cargamovimientos.php';
</script>";
		
			
		}*/
	
	
?>