let ancho = screen.width;
let alto = screen.height;
 
var rese = axios.get('https://portal.competro.mx/admin/facturacion/?Ancho='+ancho+'&Alto='+alto);
//console.log(rese.data); 