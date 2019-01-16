window.onload = function(){
    $.extend( $.fn.dataTable.defaults, {
        // searching: false,
         ordering:  false
     } );
  console.log( window.location.search.substring(1)) ;
  facturar();
};

function buscarCotizacion(){
    var numCotiza = document.getElementById('txtCotizacion').value;
    fetch('./ajax.php?'+window.location.search.substring(1)+'&data='+numCotiza,{
        method: "GET",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        
    })
    .then(function(response){
        return response.text();
    })
    .then(function(texto){
        limpiaTabla = document.getElementById("cuerpo");
        while (limpiaTabla.hasChildNodes()) {   
            limpiaTabla.removeChild(limpiaTabla.firstChild);
        }
        var data = JSON.parse(texto);
        //console.log(data)
        if(data){

            document.getElementById('txtCliente').value=data[0][1];
            document.getElementById('txtEmpresa').value=data[0][2];
            document.getElementById('txtTelefono').value=data[0][3];
            document.getElementById('txtCorreo').value=data[0][4];
            document.getElementById('txtsubtotal').innerHTML =data[0][6];
            document.getElementById('txtitbms').innerHTML =data[0][5];
            document.getElementById('txttotal').innerHTML =data[0][6];
    
            data.forEach(element => {
                
                document.getElementById('cuerpo').innerHTML+= '<td>'+element['cantidad']+'</td><td>'+element['producto']+'</td><td>'+element['precio']+'</td><td></td>'
            });

        }

        
    })
}

function facturar(){
    const segundaValidacion = document.getElementById('btnFacturar');
    const facturar = document.getElementById('enviarFactura');
     
    //pop-up revalidar la decision de facturar
    segundaValidacion.addEventListener('click', function(){
         $('#dobleValidacion').modal();
    });
    //evento que realiza el envio de los datos a la BD
    facturar.addEventListener('click',function(){
        var numcotiza =document.getElementById('txtCotizacion');
        var table = $('#listaTotalProductos tr:has(td)').map(function(i, v) {
                                                var $td =  $('td', this);
                                                    return {
                                                                id: ++i,
                                                                cantidad: $td.eq(0).text(),
                                                                descripcion: $td.eq(1).text(),
                                                                precio: $td.eq(2).text()               
                                                            }
                                                }).get();
        table = JSON.stringify(table);

        var tableval = $('#listaTotalProductos').DataTable();
        tableval.destroy();
        
        if ( ! tableval.data().count() ) {
            element('msg').innerHTML='<div class="alert alert-warning"><b>Ups!</b> No hay Servicios que facturar</div>';
            element('msg').removeAttribute("style");
            setTimeout(function() {
                        $("#msg").fadeOut(1500);
                        },3000);
                       
        }
        else if ( element('txtCliente').value=="" || element('txtTelefono').value==""  ){

            element('msg').innerHTML='<div class="alert alert-warning"><b>Atencion!</b> Ingrese los datos del cliente.</div>';
            element('msg').removeAttribute("style");
            setTimeout(function() {
                        $("#msg").fadeOut(1500);
                        },3000);
        }	
        else{
        
            console.log($('#factura_form').serialize() + "&table=" + table);
          /* $.ajax({
                url: "?view=cotizacionAdd&mode=nueva",
                type: "POST",
                data:  $('#cotiza_form').serialize() + "&table=" + table + "&txtsubtotal="+$('#txtsubtotal').text()+"&txtitbms="+$('#txtitbms').text()+"&txttotal="+$('#txttotal').text()+"&val=insertaCot" ,
                cache: false,
                crossDomain: false,
                //dataType:  	"json",
                success: function(data) {
                        
                    $('#txtsubtotal').val("");
                    
                    window.open("./core/bin/pdf_cotizacion.php?num="+numcotiza,"_blank","location=no, status=yes, top=10,left=20, width=800");
                            
                        
                },
                error: function() {
                    // Fail message
                },

            })
            
            $('#txtsubtotal').val("");
            $('#txtitbms').val("");
            $('#txttotal').val("");

            setTimeout(function() {
                        location.reload();
                        },2000);
            */
        }
        
    });
    			
}

function element(id){
    return document.getElementById(id);
}