$(document).ready(function (){
	
$.extend( $.fn.dataTable.defaults, {
   // searching: false,
    ordering:  false
} );

cotizacion();
		var subtotal=0;
		var impuesto=0;
		var total=0;
					$('#txtsubtotal').val("");
					$('#txtitbms').val("");
					$('#txttotal').val("");





var tab = $('#dataTables1').DataTable();
		tab.destroy();


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

		


		/*$("#cotiza_form").find("input,textarea,select").jqBootstrapValidation({
			preventSubmit: true,
			submitError: function($form, event, errors) {
				// Here I do nothing, but you could do something like display 
				// the error messages to the user, log, etc.
			},
			submitSuccess: function($form, event) {
				event.preventDefault();
				//addRows();
				*/
			$("#btnenvio").click(function(){
				var numcotiza =$("#txtNumcotiza").val();
				var table = $('#dataTables1 tr:has(td)').map(function(i, v) {
					    								var $td =  $('td', this);
													        return {
													                 id: ++i,
													                 cantidad: $td.eq(0).text(),
													                 descripcion: $td.eq(1).text(),
													                 precio: $td.eq(2).text()               
													               }
														}).get();
				table = JSON.stringify(table);

				var tableval = $('#dataTables1').DataTable();
				tableval.destroy();
				
				if ( ! tableval.data().count() ) {
					$("#msg").html('<div class="alert alert-info"><b>Ups!</b> es necesario agregar productos a la cotizacion.</div>');
					$("#msg").removeAttr("style");
					setTimeout(function() {
								$("#msg").fadeOut(1500);
								},3000);
								//$("#msg").fadeOut(1500);
				}
				else if ($('#txtNumcotiza').val()=="" || $('#txtCliente').val()=="" || $('#txtTelefono').val()=="" /*|| $('#txtCorreo').val()==""*/ ){

					$("#msg").html('<div class="alert alert-info"><b>Atencion!</b> Ingrese los datos del cliente.</div>');
					$("#msg").removeAttr("style");
					setTimeout(function() {
								$("#msg").fadeOut(1500);
								},3000);
				}	
				else{
				//console.log(form,table);
					console.log($('#cotiza_form').serialize() + "&table=" + table);
					$.ajax({
						url: "?view=cotizacionAdd&mode=nueva",
						type: "POST",
						data:  $('#cotiza_form').serialize() + "&table=" + table + "&val=insertaCot" ,
						cache: false,
						crossDomain: false,
						//dataType:  	"json",
						success: function(data) {
						
							console.log(data);
								
							$('#txtsubtotal').val("");
							console.log("vamos bien");

							console.log(numcotiza);	
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
					
				}
				
			});	
				



});

	function addRows(id,subtotal,impuesto,total){
		var subtotal=0;
		var impuesto=0;
		var total=0;
		var cantidad=document.getElementById('cantidad_'+id).value;
		var descripcion=document.getElementById('desc_'+id).innerHTML;
		var precio=document.getElementById('precio_'+id).value;
		var sum=0;

		var table = $('#dataTables1').DataTable({
			"paging" : false, 
			"bLengthChange" : false, 
			"bFilter": false,
			"bInfo": false, 
			"language": {
            "decimal": ".",
            "thousands": ","
			
        	},
			
		});
		table.destroy();


			table.row.add([
				cantidad,
				descripcion,
				(precio*cantidad).toPrecision(3),
				'<a id="delete" href="#" onclick="deleteRows()" ><i class="fa fa-times" aria-hidden="true"></i></a>'
			]).draw(false);

			
			 var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
//event.preventDefault();
			subtotal = table
				    .column(2)
				    .data()
				    .reduce( function ( a, b ) {


				        return intVal(a) + intVal(b);
				    } );

				sum = totalprecio();

				    if(table === 0 ){
			//$('#dataTables1').DataTable();//.destroy();

    					//$( table.column().footer() ).html("Total: $0.00");	

					}
					else{
						console.log("addrow");
					/*$( table.column().footer() ).html("Total: $" + parseFloat(Math.round(sum * 100) / 100).toFixed(2) );
					$( 'tr:eq(2)',table.column().footer() ).html("Total: $" + parseFloat(Math.round(sum * 100) / 100).toFixed(2) );*/

					//console.log(id,res);
					}


			impuesto = (subtotal * 0.07);
			total = (subtotal+impuesto);

			$('#txtsubtotal').val(parseFloat(Math.round(subtotal * 100) / 100).toFixed(2));
			$('#txtitbms').val(parseFloat(Math.round(impuesto * 100) / 100).toFixed(2));
			$('#txttotal').val(parseFloat(subtotal)+impuesto);
			//console.log(subtotal);
		//return subtotal;
		$('td').css("text-align","center");
	}
	
	function cotizacion(){
		
		$.ajax({
			url: "./core/bin/numCotiza.php",
			type: "POST",
			cache: false,
			crossDomain: false,
			success: function(data) {
			//console.log(data.info);
				//window.location.href = data.info;
					//clear all fields
				$('#txtNumcotiza').val(data);	
					console.log(data);				
			},
			error: function() {
				// Fail message
			},
		})
	}

	
function deleteRows(){
	var tab = $('#dataTables1').DataTable();
		tab.destroy();
		
	var sum=0;
	var subtotal=0;
	var impuesto=0;
	var total=0;

 var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

	console.log(this);
	$("#dataTables1 tr").on('click', function(e){
		var ressubtotal;

	e.stopPropagation();

		
			ressubtotal = tab
				    .row(this)
				    .data();
				    
//console.log(ressubtotal[2]);

/* var column = tab.column( 2 );
 
				var tot =	$( column.footer() ).html(
					    column.data().sum()

					);*/
	//console.log(tot);

		var res = tab.row($(this).closest('tr'))
							.remove()
							.draw(false);


		sum= totalprecio();

		subtotal = sum;

		impuesto = (subtotal * 0.07);
		total = (subtotal+impuesto);

		console.log(sum+" 2do");

		var valempty =tab.page.info().recordsDisplay;

		if(valempty === 0 ){
			
			$("tbody tr").remove();
    		$('#txtsubtotal').val("");
    		$('#txtitbms').val("");
    		$('#txttotal').val("");

		}
		else
		{
			
			impuesto = (subtotal * 0.07);
			total = (subtotal+impuesto);

			$('#txtsubtotal').val(parseFloat(Math.round(subtotal * 100) / 100).toFixed(2));
			$('#txtitbms').val(parseFloat(Math.round(impuesto * 100) / 100).toFixed(2));
			$('#txttotal').val(parseFloat(Math.round(total * 100) / 100).toFixed(2));


		/*$( tab.column().footer(1) ).html("Total: $" + parseFloat(Math.round(sum * 100) / 100).toFixed(2) );
		console.log($( tab.column(2)));*/
		}
	});

		//console.log(this);

	}

	function totalprecio(){
		var sum=0;

		$("#dataTables1 tbody tr").each(function (index) 
        {
            var campo1;
            $(this).children("td").eq(2).each(function (index2) 
            {
                switch (index2) 
                {
                    case 0: campo1 = $(this).text();
                            break;
                    
                }
                //$(this).css("background-color", "#ECF8E0");
            })
            sum = sum + parseInt(campo1);
            
        });

		return sum;
	}

	