	var fecha_actual = new Date();
	fecha_actual =fecha_actual.getDate()+ "/" + (fecha_actual.getMonth() +1) +"/"+fecha_actual.getFullYear();

$(document).ready(function(){


	$("#txtFechaProd").val(fecha_actual);


	$('#btnNewProd').on('click',function(){

		if ($('#txtDescProd').val()=="" || $('#txtPrecioProd').val()=="" ){
			
			$("#txtmsjprod").removeAttr("style");
			$("#txtmsjprod").css("color","red").html("* hay campos obligatorios vacios");
			//$("#txtmsj").css("color","red");
			//$("#txtmsj").removeAttr("style");
			setTimeout(function() {
								$("#txtmsjprod").fadeOut(1500);
								},3000);
			//$("#txtmsj").html("* campos obligatorio");

		}else{


			$.ajax({

					url: '?view=producto&mode=nuevo',//"./bin/controllers/productoController.php",
					type: "POST",
					data:  $('#productos_form').serialize() + "&val=newprod",
					success: function(data) {
					
						console.log(data);
						$("#msgNewProduct").html('<div class="alert alert-success"><b>:-)</b>'+" "+''+data+'.</div>');
						$("#msgNewProduct").removeAttr("style");
						setTimeout(function() {
								$("#msgNewProduct").fadeOut(1500);
								},3000);		



						$('#txtDescProd').removeAttr("value");
						$('#txtPrecioProd').removeAttr("value");
								
							
					},
					error: function() {
								// Fail message

					},


			})
		}
		
	});

	$('#btnSearchProd').on('click',function(){

		var valida="buscaProductoXdesc";
            if ($('#txtBuscaProd').val().length <= 3){
             	
             	$("#msgBuscaProduct").html('<div class="alert alert-info"><b>Verificar</b> No se encontraron registros con esa descripcion, favor escribir palabra completa para una busqueda mas eficiente.</div>');
				$("#msgBuscaProduct").removeAttr("style");
							
				setTimeout(function() {
				$("#msgBuscaProduct").fadeOut(1500);
				},3000);
				console.log($('#txtBuscaProd').val().length);

            } 
            else{

              	$("tbody tr").remove();
            	lista(valida);
                

            }
	});

	listaProductos();

});



function eliminarProducto(id){

	var valida="eliminarProducto";

	var prodTab = $('#tblProductSearch').DataTable();
		prodTab.destroy();

	

	$("#tblProductSearch tr").on('click', function(e){
		//$("#eliminarprod").modal();
		//$('#btneliminaProducto').on('click',function(){
			prodTab.row($(this).closest('tr'))
							.remove()
							.draw(false);
		//});
	});

	

		

		$.ajax({
				url: '?view=producto&mode=buscar',//"./bin/controllers/productoController.php",
				type: "POST",
				data: "id="+id + "&val="+ valida,
				cache: false,
				crossDomain: false,
				success: function(data) {
					
					if (data == "1"){

							$("#msgBuscaProduct").html('<div class="alert alert-success"><b>Exito!</b> Producto eliminado correctamente.</div>');
							$("#msgBuscaProduct").removeAttr("style");
							setTimeout(function() {
							$("#msgBuscaProduct").fadeOut(1500);
							},3000);

							//lista("buscaProductoXdesc");

							
					}
					else{
							$("#msgBuscaProduct").html('<div class="alert alert-danger"><b>Fallo!</b> producto no pudo ser eliminado.</div>');
							$("#msgBuscaProduct").removeAttr("style");
							setTimeout(function() {
							$("#msgBuscaProduct").fadeOut(1500);
							},3000);
					}

					
					
										
				},
				error: function() {
					// Fail message
				},
		})

	//});



}


function editarProducto(id,descripcion,precio,fecha){

		$('#txtIdProdEdit').val(id);
		$('#txtDescProdEdit').val(descripcion);
		$('#txtPrecioProdEdit').val(precio);
		$('#txtFechaProdEdit').val(fecha);

		$("#editProd").modal();


	$('#btnEditProducto').on('click',function(){
		
		$.post( "?view=producto&mode=buscar", $( "#formEditProd" ).serialize()+ "&val=updateProducto" )
			.done(function( data ) {
    		lista("buscaProductoXdesc");
    		console.log(data);
  		});

  		/*$.ajax({

  			url: "./bin/controllers/productoController.php",
				type: "POST",
				data: $( "#formEditProd" ).serialize()+ "&val=updateProducto",
				cache: false,
				crossDomain: false,
				success: function(data) {
					console.log(data)
				},
				error: function() {
					// Fail message
				},
  		})*/

	});		
}

function lista(valida){

	$.ajax({
					url: '?view=producto&mode=buscar',//"./bin/controllers/productoController.php",
					type: "POST",
					data: $('#productos_form').serialize() + "&val="+ valida,
					cache: false,
					crossDomain: false,
					success: function(data) {
						
						if (data == 0){
							$("#msgBuscaProduct").html('<div class="alert alert-info"><b>Verificar</b> No se encontraron registros con esa descripcion.</div>');
							$("#msgBuscaProduct").removeAttr("style");
							setTimeout(function() {
							$("#msgBuscaProduct").fadeOut(1500);
							},3000);
							

						}
						else{
							var pTable = $('#tblProductSearch').dataTable({
									"bDestroy": true,
									"bProcessing": true,
									"bRetrieve": true,
									"bSearch": false,
									"bServerSide": false,
									//"bFilter": false,
									"bLengthChange" : false,
									"bSort": false,
									"bAutoWidth": false,
									"paging": true,
									"dom": '<"top"f>rt<"bottom"p>'
							});
							pTable.fnClearTable();

							for(var i = 0; i < data.datos.length; i++) {

								pTable.fnAddData([
								data.datos[i].id,
								data.datos[i].descripcion,
								data.datos[i].precio,
								data.datos[i].fecha_de_alta,
								//data.datos[i].id,
								'<a class="btn btn-primary btn-xs" onclick="editarProducto('+"'"+data.datos[i].id+"',"+"'"+data.datos[i].descripcion+"',"+"'"+data.datos[i].precio+"',"+"'"+fecha_actual+"'"+')"><i class="fa fa-pencil" aria-hidden="true"></i></a>'+" "+'<a class="btn btn-danger btn-xs" onclick="eliminarProducto('+"'"+data.datos[i].id+"'"+')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>',

								]);										
							}
							
						}
							console.log(data);				
					},
					error: function() {
						// Fail message
					},
				})
}

function listaProductos(){
	var subtotal=0;
	var impuesto=0;
	var total=0;
	$("#btnagregar").click(function(){
		var valida="buscaproduct";
		   

			$.ajax({
				url: "?view=cotizacionAdd&mode=nueva",
				type: "POST",
				data:  "val="+ valida,
				cache: false,
				crossDomain: false,
				success: function(data) {
					
					var pTable = $('#tblproductos').dataTable({
							"bDestroy": true,
							"bProcessing": true,
							"bRetrieve": true,
							"bServerSide": false,
							//"bFilter": false,
							"bLengthChange" : false,
							"bSort": false,
							"bAutoWidth": false,
							"paging": true,
							"dom": '<"top"f>rt<"bottom"p>'
					});
					pTable.fnClearTable();

					for(var i = 0; i < data.datos.length; i++) {

						pTable.fnAddData([
						data.datos[i].id,
						'<label  name ="'+data.datos[i].id+'desc" id="desc_'+data.datos[i].id+'">'+data.datos[i].descripcion+'</label>',
						'<input class="form-control"  name="'+data.datos[i].id+'precio" id="precio_'+data.datos[i].id+'" type="text" value='+data.datos[i].precio+'>',
						'<input class="form-control"  name="'+data.datos[i].id+'cantidad" id="cantidad_'+data.datos[i].id+'" type="number" min="1" value="1">',
						//'<input class="form-control"  name="'+data.datos[i].id+'cantidad" id="cantidad_'+data.datos[i].id+'" type="number" min="1" value="1">'
						'<button class="btn btn-link" onclick="addRows('+data.datos[i].id+","+subtotal+","+impuesto+","+total+')"><i class="fa fa-plus" aria-hidden="true"></i></button>'
						]);										
					}
					
						console.log(data);				
				},
				error: function() {
					// Fail message
				},
			})


		 $("#despliegaProducto").modal();


	});
}