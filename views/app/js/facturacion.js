window.onload = function(){
  console.log( window.location.search.substring(1)) ;
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
