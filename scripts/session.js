 function script() { 
    var ajax = new XMLHttpRequest();
	  
	ajax.open("GET", "logo.php",true);
	ajax.send();
	
	if(ajax.status == 0)
  dump(ajaz.responseText);


val = "<?php   if(isset($_SESSION['usuario'])) {} else {session_unset();  session_destroy(); echo 'window.location.href='index.php';';}  ?>";
alert(val);
    }