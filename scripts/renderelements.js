 function renderFooter() { 

          document.write(
            " <div id='footer'> <div class='footerLeft left'>Av. Camarón Sábalo No. 102 Col. Zona Dorada, Mazatlán, Sinaloa C.P. 82110</div> <div class='footerRight right'> <a href='https://portal.competro.mx/uploads/AVISO%20DE%20PRIVACIDAD%20COMPETRO.pdf' target='_blank'>Aviso de Privacidad<a></div></div>    "
          );

}


function renderHeader(usuario, rfc) { 
  var usuario = usuario;
  var rfc = rfc;
  document.write(
    ' <div id="PEMEX"></div>  <div id="utils"><ul id="nav2"><li class="bar"><a href="mcontratos" class="baritem first">Contratos</a></li><li class="bar"><a href="InteresesMoratorios" class="baritem first">Intereses Moratorios</a></li><li class="bar"><a href="Manual Competro Usuario.pdf" class="baritem first">Manual de Usuario</a></li> <li class="bar"><a href="menu_cte" class="baritem first">Inicio</a></li> <li class="barlast"><span>&nbsp;</span></li></ul></div><div id="cliente"><p class="textoEjecutivo" align="center"> Bienvenido(a) ' + usuario + ' - ' + rfc + ' </p></div> <div id="fecha">     <p class="fechapc" align="right"> 	Mi&eacute;rcoles, 13 de mayo del 2020&nbsp;&nbsp;&nbsp;&nbsp;10:42&nbsp;&nbsp;&nbsp; </p>   </div> <div id="mainmenu">      <ul id="nav"> <li class="bar"><a href="menu_cte" class="baritem">Servicio a Clientes</a></li> <li class="bar"><a href="contacto" class="baritem">Contacto</a></li> <li class="bar"><a href="scripts/logout.php" class="baritem">Salir</a> </li>					            <li class="barlast"><span>&nbsp;</span></li> </ul>   </div>  '
  );

}

