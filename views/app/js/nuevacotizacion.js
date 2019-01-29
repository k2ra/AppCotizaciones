$(document).ready(function (){
	
$.extend( $.fn.dataTable.defaults, {
   // searching: false,
    ordering:  false
} );

cotizacion();
		var subtotal=0;
		var impuesto=0;
		var total=0;
					$('#txtsubtotal').text("");
					$('#txtitbms').text("");
					$('#txttotal').text("");





var tab = $('#listaTotalProductos').DataTable();
		tab.destroy();

			$("#btnenvio").click(function(){
				var numcotiza =$("#txtNumcotiza").val();
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
				
					console.log($('#cotiza_form').serialize() + "&table=" + table);
					$.ajax({
						url: "?view=cotizacionAdd&mode=nueva",
						type: "POST",
						data:  $('#cotiza_form').serialize() + "&table=" + table + "&txtsubtotal="+$('#txtsubtotal').text()+"&txtitbms="+$('#txtitbms').text()+"&txttotal="+$('#txttotal').text()+"&val=insertaCot" ,
						cache: false,
						crossDomain: false,
						//dataType:  	"json",
						success: function(data) {
								
							$('#txtsubtotal').val("");
							
							window.open("?view=cotizacionAdd&mode=reporte&num="+numcotiza,"_blank","location=no, status=yes, top=10,left=20, width=800");
									
								
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

		var table = $('#listaTotalProductos').DataTable({
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
				(precio*cantidad).toFixed(2),
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
			//$('#listaTotalProductos').DataTable();//.destroy();

    					//$( table.column().footer() ).html("Total: $0.00");	

					}
					else{
						
					/*$( table.column().footer() ).html("Total: $" + parseFloat(Math.round(sum * 100) / 100).toFixed(2) );
					$( 'tr:eq(2)',table.column().footer() ).html("Total: $" + parseFloat(Math.round(sum * 100) / 100).toFixed(2) );*/

					//console.log(id,res);
					}


			impuesto = (subtotal * 0.07);
			total = (subtotal+impuesto);

			$('#txtsubtotal').text(parseFloat(Math.round(subtotal * 100) / 100).toFixed(2));
			$('#txtitbms').text(parseFloat(Math.round(impuesto * 100) / 100).toFixed(2));
			$('#txttotal').text(parseFloat(subtotal)+impuesto);
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
								
			},
			error: function() {
				// Fail message
			},
		})
	}

	
function deleteRows(){
	var tab = $('#listaTotalProductos').DataTable();
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
	$("#listaTotalProductos tr").on('click', function(e){
		var ressubtotal;

	e.stopPropagation();

		
			ressubtotal = tab
				    .row(this)
				    .data();
				    

		var res = tab.row($(this).closest('tr'))
							.remove()
							.draw(false);


		sum= totalprecio();

		subtotal = sum;

		impuesto = (subtotal * 0.07);
		total = (subtotal+impuesto);

		

		var valempty =tab.page.info().recordsDisplay;

		if(valempty === 0 ){
			
			$("tbody tr").remove();
    		$('#txtsubtotal').text("");
    		$('#txtitbms').text("");
    		$('#txttotal').text("");

		}
		else
		{
			
			impuesto = (subtotal * 0.07);
			total = (subtotal+impuesto);

			$('#txtsubtotal').text(parseFloat(Math.round(subtotal * 100) / 100).toFixed(2));
			$('#txtitbms').text(parseFloat(Math.round(impuesto * 100) / 100).toFixed(2));
			$('#txttotal').text(parseFloat(Math.round(total * 100) / 100).toFixed(2));


		/*$( tab.column().footer(1) ).html("Total: $" + parseFloat(Math.round(sum * 100) / 100).toFixed(2) );
		console.log($( tab.column(2)));*/
		}
	});

		//console.log(this);

	}

	function totalprecio(){
		var sum=0;

		$("#listaTotalProductos tbody tr").each(function (index) 
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

	