<?php 
require 'connector.php';
global $connect; 
 
require 'dompdf/autoload.inc.php';
use Dompdf\Options;
use Dompdf\Dompdf;
if(isset($_POST['text'])){
	
	$options = new Options();
$options->set('defaultFont', 'Courier'); 
$dompdf = new Dompdf($options);
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($_POST['text']);

 
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A3', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
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
      <script type="text/JavaScript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>	 
    
    
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


     <?php
   session_start();	
  
echo ' <p class="textoEjecutivo" align="center"> Bienvenido(a) '. $_SESSION["usuario"] .' - '.$_SESSION["rfc"].'</p>';
?>

	

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
		  <div id="contentfull" >
			
			 <div class="margin">
				<DIV id=pathway>
					 
							<SPAN class=bullet>&nbsp;&nbsp;</SPAN> 
							 <a  href="menu_cteadmin" >Servicio a Clientes</a>&nbsp;<span class='bullet'>&nbsp;&nbsp;&nbsp;</span>&nbsp;
							 <a class=bold href="#">Tabulador</a>
							
					  </div>

						
				</div>
			
			
	
			
	
	
 




		   
		
	<div id="maincont"  >
    <br>
<table align="center" style="width:90%;" id="tab">  
<tr>
<td colspan="2" class="color_blanco"></td>
<td colspan="2" class="color_blanco" align="right" >VIGENCIA CONTRATO</td>
</tr>
<tr>
<td colspan="3" class="color_blanco"></td><td class="color_blanco" style="height:20px;"><input type="text" value="1" id="Vigencia" style="text-align:right;"></td>
</tr>
						<tr>
						  <th style="height:25px;  font-size:13px; font-weight: bold;" align="center" colspan="4">BENEFICIO ACTUAL <br> CLUSTER IV</th></tr>
						<tr style="height:10px; font-weight: bold;">
							 
							<th style="width:25%;">  </th>
							<th style="width:25%;" align="center">MAGNA</th>
							<th style="width:25%;" align="center">PREMIUM</th>
							<th style="width:25%;" align="center">DIESEL</th> 
						</tr>
                        <tr style="height:10px; font-weight: bold;">
                        <td align="right">VOL. TOTAL</td>
                        <td style="height:20px;"><input type="text" id="M"  ></td>
                        <td><input type="text" id="P"></td>
                        <td><input type="text" id="D"></td>
                        </tr>
                         <tr>
                        <td align="right">NIVEL</td>
                        <td><input type="text" id="NiM"  style="text-align:right; background:transparent; border: none;" readonly /></td>
                        <td><input type="text" id="NiP"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        <td><input type="text" id="NiD"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        </tr>
                         <tr>
                        <td align="right">BENEFICIO</td>
                        <td style="border-bottom: 1px solid black;"><input type="text" id="BM"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        <td style="border-bottom: 1px solid black;"><input type="text" id="BP"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        <td style="border-bottom: 1px solid black;"><input type="text" id="BD"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        </tr>
                         <tr>
                        <td>	</td>
                        <td><input type="text" id="TMC"  style="text-align:right; background:transparent; border: none;" readonly ></td>
                        <td><input type="text" id="TPC"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        <td><input type="text" id="TDC"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        </tr>
                        <tr>
                        <td class="color_blanco"></td>
                        <td class="color_blanco"></td>
                        <td class="color_blanco"></td> 
                        <td class="color_blanco">.</td>
                        </tr>
                         <tr>
                        <td class="color_blanco"></td> 
                        <td class="color_blanco"></td>
                        <td class="color_blanco"> </td>
                        <td class="color_blanco">.</td>
                        </tr>
						 
                            <tr>
                        <td class="color_blanco"> </td>
                        <td>DESC. MENSUAL ACTUAL</td>
                        <td ><input type="text" id="dtMC"  style="text-align:right; background:transparent; border: none;" readonly></td>
                       
        </tr>
                       
        <tr>
                        <td class="color_blanco"></td>  
                        <td >DESCUENTO ANUAL ACTUAL</td>
                        <td><input type="text" id="dtAC"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        
                        
                        </tr>
                   
						
    
						  <tr>
                        <td colspan="4" class="color_blanco">.</td>
                        </tr>
    
   
    
	 </table>	 
			</div>	 <div id="maincontt"><br> 
     <table    align="center" style="width:90%;" id="tabd"> 
     <tr>
<td colspan="2" class="color_blanco"></td>
<td colspan="2" class="color_blanco" align="right">VIGENCIA CONTRATO</td>
</tr>
<tr>
<td colspan="3" class="color_blanco"></td><td class="color_blanco" style="height:20px;"><input type="text" value="3"  id="VigenciaC" style="text-align:right; " ></td>
</tr>
						<tr><th align="center" colspan="4" style="height:25px;  font-size:13px; font-weight: bold;">BENEFICIO COMERCIALIZADORA <br> CLUSTER IV</th></tr>
						<tr style="height:10px; font-weight: bold;">
						 
							<th style="width:25%;">  </th>
							<th style="width:25%;" align="center">MAGNA</th>
							<th style="width:25%;" align="center">PREMIUM</th>
							<th style="width:25%;" align="center">DIESEL</th> 
						</tr>
                        <tr>
                        <td align="right" style="height:20px;">VOL. TOTAL</td>
                        <td><input type="text" id="MCC" style="text-align:right; background:transparent; border: none;" readonly></td>
                        <td><input type="text" id="PCC" style="text-align:right; background:transparent; border: none;" readonly></td>
                        <td><input type="text" id="DCC" style="text-align:right; background:transparent; border: none;" readonly></td>
                        </tr>
                         <tr>
                        <td align="right">NIVEL</td>
                        <td><input type="text"  id="NMCC"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        <td><input type="text"  id="NPCC"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        <td><input type="text"  id="NDCC"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        </tr>
                         <tr>
                        <td align="right">&nbsp; </td>
                        <td style="border-bottom: 1px solid black;"><input type="text" id="BMCC" value=""  style="text-align:right; background:transparent; border: none;" hidden><input type="text"  value=""  id="BMCCC" style="text-align:right; background:transparent; border: none;" readonly></td>
                        <td style="border-bottom: 1px solid black;"><input type="text" id="BPCC" value=""  style="text-align:right; background:transparent; border: none;" hidden><input type="text"  value="" id="BPCCC"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        <td style="border-bottom: 1px solid black;"><input type="text" id="BDCC" value=""  style="text-align:right; background:transparent; border: none;" hidden><input type="text"  value=""  id="BDCCC" style="text-align:right; background:transparent; border: none;" readonly></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><input type="text" id="TMCC"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        <td><input type="text" id="TPCC"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        <td><input type="text" id="TDCC"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        </tr>
                        <tr>
                        <td class="color_blanco"></td>
                        <td class="color_blanco"></td>
                        <td class="color_blanco"></td> 
                        <td class="color_blanco">.</td>
                        </tr>
                         <tr>
                        <td class="color_blanco"></td>
                        <td class="color_blanco"></td> 
                        <td class="color_blanco"> </td>
                        <td class="color_blanco">.</td>
                        </tr>
                            <tr>
                        <td class="color_blanco"></td>  
                        <td >DESC. MENSUAL COMP.</td>
                        <td ><input type="text" id="dtMCC"  style="text-align:right; background:transparent; border: none;" readonly></td>
                       
                        </tr>
                         <tr>
                        <td class="color_blanco"></td> 
                        <td>DESC. ANUAL COMPETRO</td>
                        <td><input type="text" id="dtACC"  style="text-align:right; background:transparent; border: none;" readonly></td>
                        
                        </tr>
                        <tr>
                        <td colspan="4" class="color_blanco">.</td>
                        </tr>
   
    
	 </table>	 

 
			 </div>
             
              
            
     
             
             </div>
   
    
            
       
					
	 
</div>
 <table align="center" id="tabt" >
     <tr><th style="font-size:13px;">PLAZO</th>
     <th style="font-size:13px;">DESCUENTO TOTAL</th>
     </tr>
     <tr> <td align="right" style=" font-size: 12px; font-weight: bold; width:140px; text-align:left;" >MENSUAL</td>
                        <td style=""><input type="text" id="tMCCC"  style="text-align:right;   font-weight: bold; background:transparent; border: none; " readonly	></td>
</tr>
<tr>
<td align="right" style=" font-weight: bold; font-size: 12px; text-align:left; ">ANUAL</td>
                        <td><input type="text" value="" id="tACCC"  style="text-align:right;  font-weight: bold; background:transparent; border: none;" readonly></td>
</tr>
<tr><td colspan="2" align="center" class="color_blanco"><button align="center" type="button" onclick="Calcula()" >Calcular</button></td></tr>
    
    
     <tr><td colspan="2" align="center" class="color_blanco">
     <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_blank">
  
<textarea name="text"  hidden  cols="80" rows="2" id="txtarea"></textarea><br><br>
 
            
            <input  type="submit" hidden  onclick='Print(this)' value='Exportar PDF'>
</form>
</td>
</tr>
     </table> 
     
     <table>
     
</table>

     
      <div id="parameters">
      
      <br><br><br><br><br>
            <br><br><br><br><br>
                  <br><br><br><br><br>
                  <br><br><br><br><br>
                  <button id="bttn">+</button>
                  <table hidden id="tablecom">
                 <tr> <td>Comisión</td>
            <td> <input type="text" id="com" value="15"   style="text-align:right; background:transparent; border: none;  "></td></tr>
            <tr> <td>Magna</td>
               <td><input type="text" id="GM" value=""   style="text-align:right; background:transparent; border: none;  "></td></tr>
              <tr>  <td>Premium</td>
                 <td><input type="text" id="GP" value=""   style="text-align:right; background:transparent; border: none;  "></td></tr>
                 <tr> <td>Diésel</td>
                   <td><input type="text" id="GD" value=""   style="text-align:right; background:transparent; border: none;  "></td></tr>
                 <tr>   <td>Total</td>
                   <td> <input type="text" id="TG" value=""   style="text-align:right; background:transparent; border: none;  "></td></tr>
             </table>
             </div>
  
	  
<script>

     var uum = 324;  var udm = 364;  var utm = 405;
	 var dum = 368;  var ddm = 414;  var dtm = 460;
	 var tum = 420;  var tdm = 472;  var ttm = 524;
	 var cum = 464;  var cdm = 522;  var ctm = 580;
	 var cium = 626; var cidm = 704; var citm = 782;
	 var sum = 681;  var sdm = 766;  var stm = 851;
	 var sium = 699; var sidm = 787; var sitm = 874;
	 var oum = 714;  var odm = 803;  var otm = 892;
	 var num = 736;  var ndm = 828;  var ntm = 920;
	 
	 var uup = 116;  var udp = 130;  var utp = 145;
	 var dup = 125;  var ddp = 141;  var dtp = 156;
	 var tup = 138;  var tdp = 149;  var ttp = 166;
	 var cup = 153;  var cdp = 172;  var ctp = 191;
	 var ciup = 190; var cidp = 214; var citp = 238;
	 var supp = 227;  var sdp = 256; var stp = 284;
	 var siup = 301; var sidp = 339; var sitp = 377;
	 var oup = 311;  var odp = 349;  var otp = 388;
	 var nup = 464;  var ndp = 522;  var ntp = 580;
	 
	 var uud = 475;  var udd = 534;  var utd = 594;
	 var dud = 538;  var ddd = 605;  var dtd = 672;
	 var tud = 582;  var tdd = 655;  var ttd = 728;
	 var cud = 627;  var cdd = 706;  var ctd = 784;
	 var ciud = 780; var cidd = 877; var citd = 974;
	 var sud = 833;  var sdd = 937;  var std = 1042;
	 var siud = 860; var sidd = 968; var sitd = 1075;
	 var oud = 878;  var odd = 988;  var otd = 1098;
	 var nud = 896;  var ndd = 1008;  var ntd = 1120;
	 
	

function Calcula(){
  
  
 var MMC =  2399;
 var PPC = 1899.;
 var DDC = 579;
 
  
  
	  var VV = $('#Vigencia').val();  var MM = $('#M').val(); var PP = $('#P').val();var DD = $('#D').val();
	  var NM; var NP; var ND;
	  var NMc; var NPc; var NDc;
	   var VVC = $('#VigenciaC').val();



 MMC = MMC + Number($('#M').val());
 PPC = PPC + Number($('#P').val());
 DDC = DDC + Number($('#D').val());
 
  
   
  
  	   
	   	 	  if(MM > 1 && MM <= 221 ){
			  NM = 1; 
			  if(VV == 1){$("#BM").val(uum);}
			  if(VV == 2){$("#BM").val(udm);}
			  if(VV == 3){$("#BM").val(utm);}
			  }else if(MM >= 222 && MM <= 332){
			  NM= 2;
			  if(VV == 1){$("#BM").val(dum);}
			  if(VV == 2){$("#BM").val(ddm);}
			  if(VV == 3){$("#BM").val(dtm);}
			  }else if(MM >= 333 && MM <= 497){
			  NM= 3;
			  if(VV == 1){$("#BM").val(tum);}
			  if(VV == 2){$("#BM").val(tdm);}
			  if(VV == 3){$("#BM").val(ttm);}
			  }else if(MM >= 498 && MM <= 741){
			  NM= 4;
			  if(VV == 1){$("#BM").val(cum);}
			  if(VV == 2){$("#BM").val(cdm);}
			  if(VV == 3){$("#BM").val(ctm);}
			  }else if(MM >= 742 && MM <= 2029){
			  NM= 5;
			  if(VV == 1){$("#BM").val(cium);}
			  if(VV == 2){$("#BM").val(cidm);}
			  if(VV == 3){$("#BM").val(citm);}
			  }else if(MM >= 2030 && MM <= 2378){
			  NM= 6;
			   if(VV == 1){$("#BM").val(sum);}
			  if(VV == 2){$("#BM").val(sdm);}
			  if(VV == 3){$("#BM").val(stm);}
			  }else if(MM >= 2379 && MM <= 3829){
			  NM= 7;
			   if(VV == 1){$("#BM").val(sium);}
			  if(VV == 2){$("#BM").val(sidm);}
			  if(VV == 3){$("#BM").val(sitm);}
			  }else if(MM >= 3830 && MM <= 4753){
			  NM= 8;
			   if(VV == 1){$("#BM").val(oum);}
			  if(VV == 2){$("#BM").val(odm);}
			  if(VV == 3){$("#BM").val(otm);}
			  }else if(MM >= 4754){
			  NM= 9;
			   if(VV == 1){$("#BM").val(num);}
			  if(VV == 2){$("#BM").val(ndm);}
			  if(VV == 3){$("#BM").val(ntm);}
			  } 
			  
			  $("#NiM").val(NM);
			  
			  if(PP > 1 && PP <= 67 ){
			  NP = 1;
			   if(VV == 1){$("#BP").val(uup);}
			  if(VV == 2){$("#BP").val(udp);}
			  if(VV == 3){$("#BP").val(utp);}
			  }else if(PP >= 68 && PP <= 87){
			  NP= 2;
			  if(VV == 1){$("#BP").val(dup);}
			  if(VV == 2){$("#BP").val(ddp);}
			  if(VV == 3){$("#BP").val(dtp);}
			  }else if(PP >= 88 && PP <= 148){
			  NP= 3;
			   if(VV == 1){$("#BP").val(tup);}
			  if(VV == 2){$("#BP").val(tdp);}
			  if(VV == 3){$("#BP").val(ttp);}
			  }else if(PP >= 149 && PP <= 266){
			  NP= 4;
			   if(VV == 1){$("#BP").val(cup);}
			  if(VV == 2){$("#BP").val(cdp);}
			  if(VV == 3){$("#BP").val(ctp);}
			  }else if(PP >= 267 && PP <=  511){
			  NP= 5;
			   if(VV == 1){$("#BP").val(ciup);}
			  if(VV == 2){$("#BP").val(cidp);}
			  if(VV == 3){$("#BP").val(citp);}
			  }else if(PP >= 512 && PP <= 1387){
			  NP= 6;
			   if(VV == 1){$("#BP").val(supp);}
			  if(VV == 2){$("#BP").val(sdp);}
			  if(VV == 3){$("#BP").val(stp);}
			  }else if(PP >= 1388 && PP <= 2187){
			  NP= 7;
			   if(VV == 1){$("#BP").val(siup);}
			  if(VV == 2){$("#BP").val(sidp);}
			  if(VV == 3){$("#BP").val(sitp);}
			  }else if(PP >= 2188 && PP <= 2308){
			  NP= 8;
			   if(VV == 1){$("#BP").val(oup);}
			  if(VV == 2){$("#BP").val(odp);}
			  if(VV == 3){$("#BP").val(otp);}
			  }else if(PP >= 2309){
			  NP= 9;
			   if(VV == 1){$("#BP").val(nup);}
			  if(VV == 2){$("#BP").val(ndp);}
			  if(VV == 3){$("#BP").val(ntp);}
			  } 
			    $("#NiP").val(NP);
				
			  if(DD >= 1 && DD <= 220 ){
			  ND = 1;
			  if(VV == 1){$("#BD").val(uud);}
			  if(VV == 2){$("#BD").val(udd);}
			  if(VV == 3){$("#BD").val(utd);}
			  }else if(DD >= 221 && DD <= 258){
			  ND= 2;
			  if(VV == 1){$("#BD").val(dud);}
			  if(VV == 2){$("#BD").val(ddd);}
			  if(VV == 3){$("#BD").val(dtd);} 
			  }else if(DD >= 259 && DD <= 372){
			  ND= 3;
			  if(VV == 1){$("#BD").val(tud);}
			  if(VV == 2){$("#BD").val(tdd);}
			  if(VV == 3){$("#BD").val(ttd);} 
			  }else if(DD >= 373 && DD <= 932){
			  ND= 4;
			  if(VV == 1){$("#BD").val(cud);}
			  if(VV == 2){$("#BD").val(cdd);}
			  if(VV == 3){$("#BD").val(ctd);} 
			  }else if(DD >= 933 && DD <= 1195){
			  ND= 5;
			  if(VV == 1){$("#BD").val(ciud);}
			  if(VV == 2){$("#BD").val(cidd);}
			  if(VV == 3){$("#BD").val(citd);} 
			  }else if(DD >= 1196 && DD <= 2151){
			  ND= 6;
			  if(VV == 1){$("#BD").val(sud);}
			  if(VV == 2){$("#BD").val(sdd);}
			  if(VV == 3){$("#BD").val(std);} 
			  }else if(DD >= 2152  && DD <= 6474){
			  ND= 7;
			  if(VV == 1){$("#BD").val(siud);}
			  if(VV == 2){$("#BD").val(sidd);}
			  if(VV == 3){$("#BD").val(sitd);} 
			  }else if(DD >= 6475 && DD <= 15187){
			  ND= 8;
			  if(VV == 1){$("#BD").val(oud);}
			  if(VV == 2){$("#BD").val(odd);}
			  if(VV == 3){$("#BD").val(otd);} 
			  }else if(DD >= 15188){
			  ND= 9;
			  if(VV == 1){$("#BD").val(nud);}
			  if(VV == 2){$("#BD").val(ndd);}
			  if(VV == 3){$("#BD").val(ntd);} 
			  }  
  				$("#NiD").val( ND);
   
   
    if(MMC > 1 && MMC <= 221 ){
			  NMc = 1; 
			  if(VVC == 1){$("#BMCC").val(uum);}
			  if(VVC == 2){$("#BMCC").val(udm);}
			  if(VVC == 3){$("#BMCC").val(utm);}
			  }else if(MMC >= 222 && MMC <= 332){
			  NMc= 2;
			  if(VVC == 1){$("#BMCC").val(dum);}
			  if(VVC == 2){$("#BMCC").val(ddm);}
			  if(VVC == 3){$("#BMCC").val(dtm);}
			  }else if(MMC >= 333 && MMC <= 497){
			  NMc= 3;
			  if(VVC == 1){$("#BMCC").val(tum);}
			  if(VVC == 2){$("#BMCC").val(tdm);}
			  if(VVC == 3){$("#BMCC").val(ttm);}
			  }else if(MMC >= 498 && MMC <= 741){
			  NMc= 4;
			  if(VVC == 1){$("#BMCC").val(cum);}
			  if(VVC == 2){$("#BMCC").val(cdm);}
			  if(VVC == 3){$("#BMCC").val(ctm);}
			  }else if(MMC >= 742 && MMC <= 2029){
			  NMc= 5;
			  if(VVC == 1){$("#BMCC").val(cium);}
			  if(VVC == 2){$("#BMCC").val(cidm);}
			  if(VVC == 3){$("#BMCC").val(citm);}
			  }else if(MMC >= 2030 && MMC <= 2378){
			  NMc= 6;
			   if(VVC == 1){$("#BMCC").val(sum);}
			  if(VVC == 2){$("#BMCC").val(sdm);}
			  if(VVC == 3){$("#BMCC").val(stm);}
			  }else if(MMC >= 2379 && MMC <= 3829){
			  NMc= 7;
			   if(VVC == 1){$("#BMCC").val(sium);}
			  if(VVC == 2){$("#BMCC").val(sidm);}
			  if(VVC == 3){$("#BMCC").val(sitm);}
			  }else if(MMC >= 3830 && MMC <= 4753){
			  NMc= 8;
			   if(VVC == 1){$("#BMCC").val(oum);}
			  if(VVC == 2){$("#BMCC").val(odm);}
			  if(VVC == 3){$("#BMCC").val(otm);}
			  }else if(MMC >= 4754){
			  NMc= 9;
			   if(VVC == 1){$("#BMCC").val(num);}
			  if(VVC == 2){$("#BMCC").val(ndm);}
			  if(VVC == 3){$("#BMCC").val(ntm);}
			  } 
			  
			  $("#NMCC").val(NMc);
			  
			  if(PPC > 1 && PPC <= 67 ){
			  NPc = 1;
			   if(VVC == 1){$("#BPCC").val(uup);}
			  if(VVC == 2){$("#BPCC").val(udp);}
			  if(VVC == 3){$("#BPCC").val(utp);}
			  }else if(PPC >= 68 && PPC <= 87){
			  NPc= 2;
			  if(VVC == 1){$("#BPCC").val(dup);}
			  if(VVC == 2){$("#BPCC").val(ddp);}
			  if(VVC == 3){$("#BPCC").val(dtp);}
			  }else if(PPC >= 88 && PPC <= 148){
			  NPc= 3;
			   if(VVC == 1){$("#BPCC").val(tup);}
			  if(VVC == 2){$("#BPCC").val(tdp);}
			  if(VVC == 3){$("#BPCC").val(ttp);}
			  }else if(PPC >= 149 && PPC <= 266){
			  NPc= 4;
			   if(VVC == 1){$("#BPCC").val(cup);}
			  if(VVC == 2){$("#BPCC").val(cdp);}
			  if(VVC == 3){$("#BPCC").val(ctp);}
			  }else if(PPC >= 267 && PPC <= 511){
			  NPc= 5;
			   if(VVC == 1){$("#BPCC").val(ciup);}
			  if(VVC == 2){$("#BPCC").val(cidp);}
			  if(VVC == 3){$("#BPCC").val(citp);}
			  }else if(PPC >= 512 && PPC <= 1387){
			  NPc= 6;
			   if(VVC == 1){$("#BPCC").val(supp);}
			  if(VVC == 2){$("#BPCC").val(sdp);}
			  if(VVC == 3){$("#BPCC").val(stp);}
			  }else if(PPC >= 1388 && PPC <= 2187){
			  NPc= 7;
			   if(VVC == 1){$("#BPCC").val(siup);}
			  if(VVC == 2){$("#BPCC").val(sidp);}
			  if(VVC == 3){$("#BPCC").val(sitp);}
			  }else if(PPC >= 2188 && PPC <= 2308){
			  NPc= 8;
			   if(VVC == 1){$("#BPCC").val(oup);}
			  if(VVC == 2){$("#BPCC").val(odp);}
			  if(VVC == 3){$("#BPCC").val(otp);}
			  }else if(PPC >= 2309){
			  NPc= 9;
			   if(VVC == 1){$("#BPCC").val(nup);}
			  if(VVC == 2){$("#BPCC").val(ndp);}
			  if(VVC == 3){$("#BPCC").val(ntp);}
			  } 
			    $("#NPCC").val(NPc);
				 
				
			  if(DDC >= 1 && DDC <= 220 ){
			  NDc = 1;
			  if(VVC == 1){$("#BDCC").val(uud);}
			  if(VVC == 2){$("#BDCC").val(udd);}
			  if(VVC == 3){$("#BDCC").val(utd);}
			  }else if(DDC >= 221 && DDC <= 258){
			  NDc= 2;
			  if(VVC == 1){$("#BDCC").val(dud);}
			  if(VVC == 2){$("#BDCC").val(ddd);}
			  if(VVC == 3){$("#BDCC").val(dtd);} 
			  }else if(DDC >= 259 && DDC <= 372){
			  NDc= 3;
			  if(VVC == 1){$("#BDCC").val(tud);}
			  if(VVC == 2){$("#BDCC").val(tdd);}
			  if(VVC == 3){$("#BDCC").val(ttd);} 
			  }else if(DDC >= 373 && DDC <= 932){
			  NDc= 4;
			  if(VVC == 1){$("#BDCC").val(cud);}
			  if(VVC == 2){$("#BDCC").val(cdd);}
			  if(VVC == 3){$("#BDCC").val(ctd);} 
			  }else if(DDC >= 933 && DDC <= 1195){
			  NDc= 5;
			  if(VVC == 1){$("#BDCC").val(ciud);}
			  if(VVC == 2){$("#BDCC").val(cidd);}
			  if(VVC == 3){$("#BDCC").val(citd);} 
			  }else if(DDC >= 1196 && DDC <= 2151){
			  NDc= 6;
			  if(VVC == 1){$("#BDCC").val(sud);}
			  if(VVC == 2){$("#BDCC").val(sdd);}
			  if(VVC == 3){$("#BDCC").val(std);} 
			  }else if(DDC >= 2152 && DDC <= 6474){
			  NDc= 7;
			  if(VVC == 1){$("#BDCC").val(siud);}
			  if(VVC == 2){$("#BDCC").val(sidd);}
			  if(VVC == 3){$("#BDCC").val(sitd);} 
			  }else if(DDC >= 6475 && DDC <= 15187){
			  NDc= 8;
			  if(VVC == 1){$("#BDCC").val(oud);}
			  if(VVC == 2){$("#BDCC").val(odd);}
			  if(VVC == 3){$("#BDCC").val(otd);} 
			  }else if(DDC >= 15188){
			  NDc= 9;
			  if(VVC == 1){$("#BDCC").val(nud);}
			  if(VVC == 2){$("#BDCC").val(ndd);}
			  if(VVC == 3){$("#BDCC").val(ntd);} 
			  } 
			  
			  
  				$("#NDCC").val(NDc);
				 var COM = $('#com').val();
				  COM = 1 - (COM / 100); 
	  $("#BMCCC").val('$ ' + (Number($('#BMCC').val()) * COM).toFixed(2));
	  $("#BPCCC").val('$ ' + (Number($('#BPCC').val()) * COM).toFixed(2));
	  $("#BDCCC").val('$ ' + (Number($('#BDCC').val()) * COM).toFixed(2));
	
	 //total por producto 
	  $("#TMC").val(MM * $('#BM').val());
	  $("#TPC").val(PP * $('#BP').val());
	  $("#TDC").val(DD * $('#BD').val());
	  
	  
	  
	 //total mensual
	 $("#dtMC").val( Number($('#TMC').val()) + Number($('#TPC').val()) + Number($('#TDC').val()));
	 $("#dtAC").val( Number($('#dtMC').val()) * 12  );
	 
	 
	  $("#vtAC").val( Number($('#M').val()) + Number($('#P').val()) + Number($('#D').val()));
	  
	  $("#vtDC").val( Number($('#vtAC').val()) / 30);
	  
	 $("#MCC").val( Number($('#M').val()));
	 $("#PCC").val( Number($('#P').val()));
	 $("#DCC").val( Number($('#D').val()));
	
	
	
	
	 
	 
	 //si el beneficio del cliente es menor al de clientes 
	 
	  
		  
		 
		  
		   
	 
	 
	  if(($("#Vigencia").val() ==  $("#VigenciaC").val()) && ($("#NiM").val() ==  $("#NMCC").val())){
		  
		    $("#TMCC").val( (Number($('#BMCC').val()) *  Number($('#M').val())));
	  }else{
		  $("#TMCC").val( (Number($('#BMCC').val()) *  Number($('#M').val())) * COM );
		  $("#GM").val((((Number($('#BMCC').val()) *  Number($('#M').val()))) - ((Number($('#BMCC').val()) *  Number($('#M').val())) * COM)).toFixed(2) );
		  }
	
	
	
	
	if(($("#Vigencia").val() ==  $("#VigenciaC").val()) && ($("#NiP").val() ==  $("#NPCC").val())){
		  
		    $("#TPCC").val( (Number($('#BPCC').val()) *  Number($('#P').val())));
	  }else{
		  $("#TPCC").val( (Number($('#BPCC').val()) *  Number($('#P').val())) * COM );
		   $("#GP").val((((Number($('#BPCC').val()) *  Number($('#P').val()))) - ((Number($('#BPCC').val()) *  Number($('#P').val())) * COM)).toFixed(2) );
		  }
		  
		  
		  
		  
		  if(($("#Vigencia").val() ==  $("#VigenciaC").val()) && ($("#NiD").val() ==  $("#NDCC").val())){
		  
		    $("#TDCC").val( (Number($('#BDCC').val()) *  Number($('#D').val())));
	  }else{
		  $("#TDCC").val( (Number($('#BDCC').val()) *  Number($('#D').val())) * COM );
		   $("#GD").val( (((Number($('#BDCC').val()) *  Number($('#D').val()))) - ((Number($('#BDCC').val()) *  Number($('#D').val())) * COM)).toFixed(2) );
		  }
	
	
	  $("#TG").val('$ ' +  (Number($('#GM').val()) +  Number($('#GP').val()) + Number($('#GD').val())).toFixed(2) );
	  
	   $("#GM").val('$ ' + Number($("#GM").val()));
	    $("#GP").val('$ ' + Number($("#GP").val()));
		 $("#GD").val('$ ' + Number($("#GD").val()));
	 
	 
	
	 $("#dtMCC").val( Number($('#TMCC').val()) + Number($('#TPCC').val()) + Number($('#TDCC').val()));
	  $("#dtACC").val( Number($('#dtMCC').val()) * 12  );
	  
	  
	   $("#tMCCC").val(  Number($('#dtMCC').val()) - Number($('#dtMC').val()) );
	    $("#tACCC").val( Number($('#dtACC').val()) - Number($('#dtAC').val())  );
		
	if($('#M').val() == 0){ 
		 document.getElementById("NMCC").value = '';
		 document.getElementById("BMCC").value = '';
		 document.getElementById("BMCCC").value = '';
}
if($('#P').val() == 0){ 
		 document.getElementById("NPCC").value = '';
		 document.getElementById("BPCC").value = '';
		 document.getElementById("BPCCC").value = '';
}	
if($('#D').val() == 0){ 
		 document.getElementById("NDCC").value = '';
		 document.getElementById("BDCC").value = '';
		 document.getElementById("BDCCC").value = '';
}


		document.getElementById("TMCC").value = '$ ' + parseFloat(document.getElementById("TMCC").value).toLocaleString('en-US');
		document.getElementById("TPCC").value = '$ ' + parseFloat(document.getElementById("TPCC").value).toLocaleString('en-US');
		document.getElementById("TDCC").value = '$ ' + parseFloat(document.getElementById("TDCC").value).toLocaleString('en-US');
		
		document.getElementById("dtMCC").value = '$ ' + parseFloat(document.getElementById("dtMCC").value).toLocaleString('en-US');
		document.getElementById("dtACC").value = '$ ' + parseFloat(document.getElementById("dtACC").value).toLocaleString('en-US'); 
	
		document.getElementById("tMCCC").value = '$ ' + parseFloat(document.getElementById("tMCCC").value).toLocaleString('en-US');
		document.getElementById("tACCC").value = '$ ' + parseFloat(document.getElementById("tACCC").value).toLocaleString('en-US'); 
		
		
		
		document.getElementById("TMC").value = '$ ' + parseFloat(document.getElementById("TMC").value).toLocaleString('en-US');
		document.getElementById("TPC").value = '$ ' + parseFloat(document.getElementById("TPC").value).toLocaleString('en-US');
		document.getElementById("TDC").value = '$ ' + parseFloat(document.getElementById("TDC").value).toLocaleString('en-US');
		
		document.getElementById("dtMC").value = '$ ' +  parseFloat(document.getElementById("dtMC").value).toLocaleString('en-US');
		document.getElementById("dtAC").value = '$ ' + parseFloat(document.getElementById("dtAC").value).toLocaleString('en-US'); 
	
		document.getElementById("vtAC").value = parseFloat(document.getElementById("vtAC").value).toLocaleString('en-US');
		
		
		document.getElementById("vtDC").value = parseFloat(document.getElementById("vtDC").value).toLocaleString('en-US'); 
		
	}
	

</script>


 



<br><br>

<script>
renderFooter();
</script>


</div>




</body>
</html>
    
   
     

 <script>
         function Print(){ 
 $('#txtarea').html(document.getElementById('tab').outerHTML + "<br>" + 
                    document.getElementById('tabd').outerHTML + "<br>" +
					document.getElementById('tabt').outerHTML + "<br>"
 );
 }
 </script>
 
 
 
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
var bool = true;
  $(document).ready(function(){
    $("#bttn").click(function(){
  if(bool == true){
   $("#tablecom").show(1000); 
   $("#bttn").html('-');
    
    bool = false;
  }else{
   $("#tablecom").hide(1000); 
        $("#bttn").html('+');
    bool = true;
  }
   
  }
   
  
   );
   
   
});
</script>

 

<script language="JavaScript" src="js/datetime.js"></script> <!-- Hora para admin-->
