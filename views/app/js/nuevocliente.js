$(document).ready(function(){



	$('#btnNewClie').on('click',function(){

		if ($('#txtNombre').val()=="" || $('#txtApellido').val()=="" || $('#txtCedula').val()=="" || $('#txtCorreoClie').val()=="" || $('#txtTelefonoClie').val()==""){
			
			$("#txtmsj").removeAttr("style");
			$("#txtmsj").css("color","red").html("* hay campos obligatorios vacios");
			//$("#txtmsj").css("color","red");
			//$("#txtmsj").removeAttr("style");
			setTimeout(function() {
								$("#txtmsj").fadeOut(1500);
								},3000);
			//$("#txtmsj").html("* campos obligatorio");

		}else{


			$.ajax({

					url: '?view=cliente&mode=nuevo',//"./bin/controllers/clienteController.php",
					type: "POST",
					data:  $('#clientes_form').serialize() + "&val=new",
					success: function(data) {
					
						if (data == "1"){

								$("#msgNewClie").html('<div class="alert alert-success"><b>Exito!</b> Cliente creado correctamente.</div>');
								$("#msgNewClie").removeAttr("style");
								setTimeout(function() {
								$("#msgNewClie").fadeOut(1500);
								},3000);
								
								
						}
						else{
								$("#msgNewClie").html('<div class="alert alert-danger"><b>Fallo!</b> Cliente no pudo ser creado verifique los datos ingresados.</div>');
								$("#msgNewClie").removeAttr("style");
								setTimeout(function() {
								$("#msgNewClie").fadeOut(1500);
								},3000);
						}

							
						$('#txtNombre').removeAttr("value");
						$('#txtEmpresa').removeAttr("value");
						$('#txtCedula').removeAttr("value");
						$('#txtCorreoClie').removeAttr("value");
						$('#txtDireccion').removeAttr("value");
						$('#txtTelefonoClie').removeAttr("value");
						
						

								
							
					},
					error: function() {
								// Fail message

								alert("No es posible insertar los datos, contacte al administrador de sistemas");
					},


			})
		}
		
	});

	$("#btnSearchClie").on('click',function(){
if ($('#txtCliente').val().length <= 3){
             	$("#msg").html('<div class="alert alert-info"><b>Verificar</b> No se encontraron registros con esa descripcion, favor escribir palabra completa para una busqueda mas eficiente.</div>');
				$("#msg").removeAttr("style");
							
				setTimeout(function() {
				$("#msg").fadeOut(1500);
				},3000);
				

        }else{
				$.ajax({

					url: "?view=cotizacionAdd&mode=nueva",
					type: "POST",
					data:  "txtBuscaCliente="+ $("#txtCliente").val() + "&val=search",
					success: function(data) {
					console.log(data);
						var strfy = JSON.stringify(data);
						var parse =JSON.parse(strfy);
						console.log(parse.datos);
						
						if (data == "0" || parse.datos =="" ){

							$("#txtCliente").popover('show');
							setTimeout(function(){$('.popover').popover('hide')}, 3000);
							$("#resultadoBusqueda").hide();
						}else{
							$("#resultadoBusqueda").show();
							$("#resultadoBusqueda").html("");
							jQuery.each(parse.datos, function( i, val ) {
				 // $( "#" + i ).append( document.createTextNode( " - " + val ) );
							 console.log(parse.datos[i].nombre);
							  //$("#resultadoBusqueda").html(mensaje.datos[i].nombre +"<br>");
							  $("#dlclient").append("<option>"+parse.datos[i].nombre+"</option");

							  $("#resultadoBusqueda").append("<a class='clientes' id="+i+">"+parse.datos[i].nombre+"</a><br>");


							});

							$(".clientes").on('click', function(){
								var indice=0;
								console.log($(this).attr("id"));
								indice=$(this).attr("id");
								console.log(parse.datos[parseInt($(this).attr("id"))].correo);
								$("#txtCliente").val(parse.datos[parseInt($(this).attr("id"))].nombre);
								$("#txtEmpresa").val(parse.datos[parseInt($(this).attr("id"))].empresa);
								$("#txtCorreo").val(parse.datos[parseInt($(this).attr("id"))].correo);
								$("#txtTelefono").val(parse.datos[parseInt($(this).attr("id"))].telefono);
								$("#resultadoBusqueda").hide();
							});
							
							/*$("#txtCliente").val(parse.datos[0].nombre);
							$("#txtCorreo").val(parse.datos[0].correo);
							$("#txtTelefono").val(parse.datos[0].telefono);*/
						}	
					
								
							
					},
					error: function() {
								// Fail message

								alert("no es posible insertar");
					},


				})

			}



	});

	$('#btnSearchClieII').on('click',function(){
		console.log("hola");
		if ($('#txtClienteSearch').val().length <= 3){
             	console.log($('#txtClienteSearch').val().length);
             	$("#msgNewCliesearch").html('<div class="alert alert-info"><b>Verificar</b> No se encontraron registros con esa descripcion, favor escribir palabra completa para una busqueda mas eficiente.</div>');
				$("#msgNewCliesearch").removeAttr("style");
							
				setTimeout(function() {
				$("#msgNewCliesearch").fadeOut(1500);
				},3000);
				

        }else{ 
		var valida="buscarCliente";
		$("tbody tr").remove();
		obtenerDatos(valida);
		}

	});



});

function eliminarCliente(id){
	var valida="eliminarCliente";
var clienTab = $('#tblClientSearch').DataTable();
clienTab.destroy();

$("#tblClientSearch tr").on('click', function(e){

	clienTab.row($(this).closest('tr'))
							.remove()
							.draw(false);
});


	   $.ajax({
					url: "?view=cliente&mode=buscar",
					type: "POST",
					data: "id="+id + "&val="+ valida,
					cache: false,
					crossDomain: false,
					success: function(data) {
						
						if (data == "1"){

								$("#msgNewCliesearch").html('<div class="alert alert-success"><b>Exito!</b> Cliente eliminado correctamente.</div>');
								$("#msgNewCliesearch").removeAttr("style");
								setTimeout(function() {
								$("#msgNewCliesearch").fadeOut(1500);
								},3000);
								
								
						}
						else{
								$("#msgNewCliesearch").html('<div class="alert alert-danger"><b>Fallo!</b> Cliente no pudo ser eliminado.</div>');
								$("#msgNewCliesearch").removeAttr("style");
								setTimeout(function() {
								$("#msgNewCliesearch").fadeOut(1500);
								},3000);
						}

						
						
							console.log($(this).closest('tr'));				
					},
					error: function() {
						// Fail message
					},
		})
}



function editarCliente(id,nombre,empresa,ruc,correo,telefono,direccion){
	var valida="eliminarCliente";

		$('#txtIdEdit').val(id);
		$('#txtNombreEdit').val(nombre);
		$('#txtEmpresaEdit').val(empresa);
		$('#txtCedulaEdit').val(ruc);
		$('#txtCorreoClieEdit').val(correo);
		$('#txtDireccionEdit').val(direccion);
		$('#txtTelefonoClieEdit').val(telefono);

	   $("#editarCliente").modal();


	   $('#btnEditCliente').on('click',function(){
		
		$.post( "?view=cliente&mode=buscar", $( "#formEditCliente" ).serialize()+ "&val=updateCliente" )
			.done(function( data ) {
    		obtenerDatos("buscarCliente");
    		
  			});  		

		});		
}

function obtenerDatos(valida){


		   $.ajax({
					url: '?view=cliente&mode=buscar',//"./bin/controllers/clienteController.php",
					type: "POST",
					data: $('#clientes_form').serialize() + "&val="+ valida,
					cache: false,
					crossDomain: false,
					success: function(data) {
						if (data == 0){
							$("#msgNewCliesearch").html('<div class="alert alert-info"><b>Verificar</b> No se encontraron registros con esa descripcion.</div>');
							$("#msgNewCliesearch").removeAttr("style");
							setTimeout(function() {
							$("#msgNewCliesearch").fadeOut(1500);
							},3000);

						}
						else{
							var clienTable = $('#tblClientSearch').dataTable({
									"bDestroy": true,
									"bProcessing": true,
									"bRetrieve": true,
									"bFilter": false,
									"bSearchable": false,
									"bLengthChange" : false,
									"bSort": false,
									"bAutoWidth": false,
									"paging": true,
									"dom": '<"top"f>rt<"bottom"p>'
							});
							clienTable.fnClearTable();

							for(var i = 0; i < data.datos.length; i++) {

								clienTable.fnAddData([
								data.datos[i].nombre,
								data.datos[i].empresa,
								data.datos[i].correo,
								data.datos[i].telefono,
								'<a class="btn btn-primary btn-xs" onclick="editarCliente('+"'"+data.datos[i].id+"',"+"'"+data.datos[i].nombre+"',"+"'"+data.datos[i].empresa+"',"+ "'"+data.datos[i].ruc+"',"+"'"+data.datos[i].correo+"',"+"'"+data.datos[i].telefono+"',"+"'"+data.datos[i].direccion+"'"+')"><i class="fa fa-pencil"></i></a>'+" "+'<a class=" btn btn-danger btn-xs"  onclick="eliminarCliente('+"'"+data.datos[i].id+"'"+')"><i class="fa fa-trash-o" ></i></a>',

								]);		
															
							}
						}
							
									
					},
					error: function() {
						// Fail message
					},
				})

}