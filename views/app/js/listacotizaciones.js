$(document).ready(function (){
	var valida="listcotizacion";
	




          	$.ajax({
					url: "?view=cotizacionAdd&mode=listcotizacion",
					type: "POST",
					data:  "val="+ valida,
					cache: false,
					crossDomain: false,
					success: function(data) {
						
						var pTable = $('#listcotizacion').dataTable({
								"bDestroy": true,
								"bProcessing": true,
								"bRetrieve": true,
								"bServerSide": false,
								//"bFilter": false,
								"bLengthChange" : false,
								"bSort": false,
								"bAutoWidth": false,
								"paging": true,
								//"dom": '<"top"f>rt<"bottom"p>'
						});
						pTable.fnClearTable();

						for(var i = 0; i < data.datos.length; i++) {

							pTable.fnAddData([
							data.datos[i].id,
							data.datos[i].cliente,
							data.datos[i].fecha,
							data.datos[i].monto,
							'<a class="btn btn-primary btn-md" href="./core/bin/pdf_cotizacion.php?num='+data.datos[i].id+'" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>'
							+' '+'<a class="btn btn-danger btn-md" onclick="eliminarCotizacion('+"'"+data.datos[i].id+"'"+')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
							
							
							]);										
						}
						
										
					},
					error: function() {
						// Fail message
					},
				})
  
});

function eliminarCotizacion(id){

	var valida="eliminarCotizacion";

	var cotTab = $('#listcotizacion').DataTable();
		cotTab.destroy();

	

	$("#listcotizacion tr").on('click', function(e){
		//$("#eliminarprod").modal();
		//$('#btneliminaProducto').on('click',function(){
			cotTab.row($(this).closest('tr'))
							.remove()
							.draw(false);
		//});
	});

	$.ajax({
				url: '?view=cotizacionAdd&mode=listcotizacion',//"./bin/controllers/productoController.php",
				type: "POST",
				data: "id="+id + "&val="+ valida,
				cache: false,
				crossDomain: false,
				success: function(data) {
					
					if (data == "1"){

							$("#msglistcot").html('<div class="alert alert-success"><b>Exito!</b> Cotizacion eliminada correctamente.</div>');
							$("#msglistcot").removeAttr("style");
							setTimeout(function() {
							$("#msglistcot").fadeOut(1500);
							},3000);

							//lista("buscaProductoXdesc");

							
					}
					else{
							$("#msglistcot").html('<div class="alert alert-danger"><b>Fallo!</b> Cotizacion no pudo ser eliminada.</div>');
							$("#msglistcot").removeAttr("style");
							setTimeout(function() {
							$("#msglistcot").fadeOut(1500);
							},3000);
					}

					
					
										
				},
				error: function() {
					// Fail message
				},
		})


}
