/* DECLARACION DE VARIABLES */

var cdato=''

/* recojo en un array todos los elementos html que tengan esa clase */
const imagenes_facturas = document.getElementsByClassName("imagen_factura");

/* recorro todos los items, y con cada item hago un listener */
for(const imagen_factura of imagenes_facturas){
    /* el listener escucha el click en el elemento concreto donde se hace el click */
    imagen_factura.addEventListener("click", function(){
        console.log(imagen_factura.getAttribute('data-id'));
        cdato=imagen_factura.getAttribute('data-id');
        window.open(`./descargar_facturas.php?f=${cdato}`,"_blank"); 
                
    })
}

