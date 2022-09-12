<?php

  $archivoconruta = $_POST['archivoconruta'];

	if(isset($_FILES["pdf"]["tmp_name"])){
	$moved = move_uploaded_file($_FILES["pdf"]["tmp_name"], "../../uploads/".$archivoconruta.".pdf" );

if( $moved ) {
    
} else {
   
}
	}
	else{
		 
	}
?>