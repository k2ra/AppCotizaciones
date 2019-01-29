window.onload = function(){
    $.extend( $.fn.dataTable.defaults, {
         //searching: false,
         "lengthChange": false,
         ordering:  false,
         "info": false,
         
     } );
     $('#listfactura').DataTable();
    console.log(window.location.search.substring(1));

   

     
}

function muestraFactura(factura){

        fetch('?view=facturacion&mode=lista',{
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body:factura
        })
        .then(function(response){
            return response.text();
        })
        .then(function(texto){
            console.log(texto);
            //window.open(texto,"_blank","location=no, status=yes, top=10,left=20, width=800");
           
        }) 
       // window.open('?view=facturacion&mode=lista?num=COT_0010',"_blank","location=no, status=yes, top=10,left=20, width=800");

}

function eliminaFactura(factura){
    
    fetch('?view=facturacion&mode=lista',{
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body:factura
    })
    .then(function(response){
        return response.text();
    })
    .then(function(texto){
        console.log(texto);
    })
}