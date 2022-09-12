function show_doc(ctx,nombre_docto) {
//alert("INVOCA JAVA "+ ctx + " " + nombre_docto);
   if (navigator.appName == "Netscape") {
      mimetype = navigator.mimeTypes["application/pdf"]
      if (mimetype) {
         plugin = mimetype.enabledPlugin;
         if (plugin) {
            pagina= ctx + "/sccgi001/controlador?Destino=verDocum&doctoID=" + nombre_docto;
			   docWindow = window.open(pagina,'','toolbar=no,resizable=yes,location=no,menubar=yes,status=no,titledoc="doc",personalbar=no,directories=no');
			   return false;
         } else {
              pagina= ctx + "/sccgi001/controlador?Destino=sccgi001_01.jsp";
              docWindow = window.open(pagina,'','toolbar=no,resizable=yes,location=no,menubar=yes,status=no,titledoc="doc",personalbar=no,directories=no');
              return false;
         }
      } else {
           pagina= ctx + "/sccgi001/controlador?Destino=sccgi001_01.jsp";
           docWindow = window.open(pagina,'','toolbar=no,resizable=yes,location=no,menubar=yes,status=no,titledoc="doc",personalbar=no,directories=no');
           return false;
      }
   } else {
        pagina= ctx + "/sccgi001/controlador?Destino=verDocum&doctoID=" + nombre_docto;
        docWindow = window.open(pagina,'','toolbar=no,resizable=yes,location=no,menubar=yes,status=no,titledoc="doc",personalbar=no,directories=no');
        return false;
   }
   return false;
}
