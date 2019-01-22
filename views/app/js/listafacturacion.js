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
           
        })
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