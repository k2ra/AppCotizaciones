<?php include(HTML_DIR . 'component/header.php'); ?>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
       <?php include(HTML_DIR . 'component/topbar.php'); ?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
       <?php include(HTML_DIR . 'component/menu.php'); ?>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
        <section id="main-content">
            <section class="wrapper">

                    <div class="row separacionPanel" >
                    
                        <div class="col-lg-12">
                            <div id ="msg"></div>
                            
                                <div class="tab-content">
                                    <div class="tab-pane fade in active " id="factura">
                                        <form id="factura_form">
                                            
                                                        <div class="panel panel-info">
                                                            <div class="panel-heading ">
                                                                <div class="row panel-head" >
                                                                    <h3 class='col-md-6'>Nueva Factura</h3>
                                                                    <label class="control-label label-fontSize col-md-6 label-align-end" for="txtCliente" ><b><?php echo $numFactura?></b></label></span>
                                                                </div> 
                                                            </div>
                                                            <div class="panel-body">


                                                                    <fieldset>
                                                                        <div class="row">
                                                                            <div class="col-md-4 form-group">
                                                                                <label class="control-label label-fontSize" for="txtCliente">Cliente</label>
                                                                                
                                                                                <div class="controls ">
                                                                                <input class="form-control ingresoDato" name="txtCliente" id="txtCliente"  type="text" list="dlclient" required>
                                                                                    
                                                                                    
                                                                                </div>
                                                                                
                                                                                <div id="resultadoBusqueda" style="border-style: ridge; display:none;"></div>
                                                                            </div>
                                                                            <div class="col-md-2  form-group">
                                                                                <label class="control-label label-fontSize" for="txtNumcotiza"># Cotizacion</label>
                                                                                
                                                                                <div class="controls input-group">
                                                                                <input class="form-control ingresoDato" name="txtCotizacion" id="txtCotizacion"  type="text" >
                                                                                    
                                                                                    <span class="input-group-btn">
                                                                                        <a href="javascript:buscarCotizacion();" id="btnSearchClie"  class="btn btn-primary"><i class="fa fa-search"></i></a>
                                                                                    </span>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-4 form-group">
                                                                                <label class="control-label label-fontSize" for="txtEmpresa">Empresa </label>
                                                                            
                                                                                <div class="controls">
                                                                                <!-- <select class="form-control"  name="txtEmpresa" id="txtEmpresa" required>
                                                                                </select>-->
                                                                                <input class="form-control ingresoDato" name="txtEmpresa" id="txtEmpresa" type="text" >
                                                                                                
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 form-group">
                                                                                <label class="control-label label-fontSize" for="txtTelefono">Telefono</label>
                                                                                
                                                                                <div class="controls input-group">
                                                                                <input class="form-control ingresoDato" name="txtTelefono" id ="txtTelefono" type="tel" style="background-color : #FFFFFF; cursor: auto" placeholder="#telefono" data-toggle="popover" title="telefono no encontrado" data-content="Ir a la pestaña clientes y crear el cliente" data-placement="bottom"  required>
                                                                                    <div class="input-group-addon">
                                                                                        <i class="fa fa-phone"></i>
                                                                                    </div>	

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 form-group">
                                                                                <label class="control-label label-fontSize" for="txtCorreo">Correo</label>
                                                                                
                                                                                <div class="controls input-group">
                                                                                <input class="form-control ingresoDato" name="txtCorreo" id="txtCorreo" type="email"   placeholder="Email" >
                                                                                <div class="input-group-addon">
                                                                                        <i class="fa fa-envelope"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row  control">
                                                                                <input class="btn btn-success btn-md label-fontSize margenderecho" name="btnagregar" id="btnagregar" type="button" value=" + Agregar Producto"  />
                                                                                <a class="btn btn-primary btn-md label-fontSize" name="btnFacturar" id="btnFacturar" > <i class="fa fa-print"></i> Facturar</a> 
                                
                                                                        </div>

                                                                    </fieldset>
                                                            </div>
                                                        </div>
                                            

                                                            <div class="row">
                                                            <div class="col-md-12">
                                                            <div class="panel panel-primary">
                                                                <div class="nav nav-tabs panel-body">
                                                                    <?php include(HTML_DIR . 'component/listaTotalProductos.php'); ?>  		
                                                                </div>
                                                                <!-- /.panel-body -->
                                                            </div> 
                                                            </div>    
                                                            </div>
                                        </form>
                                    </div>


                                </div>	
                                <?php include(HTML_DIR . 'component/modalProduct.php'); ?>

                                <div class="container"  data-spy="scroll" >
                                    <!-- Modal -->
                                    <div class="modal fade" id="dobleValidacion" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                    
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Crear Factura</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        
                                                            

                                                                    <div class="row">
                                                                        <p><h4>Desea Crear la factura</h4></p>
                                                                    </div>
                                                                 
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id='enviarFactura'>Aceptar</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>				

            </div>
                </div><!-- /row -->
                        
                                        

                        
                        
                        
                    
                    
                    
        <!-- **********************************************************************************************************************************************************
        RIGHT SIDEBAR CONTENT
        *********************************************************************************************************************************************************** -->                  
                    
                    
                
            </section>
        </section>


      <!--main content end-->
 
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="views/assets/js/jquery.js"></script>
    <script src="views/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="views/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="views/assets/js/jquery.scrollTo.min.js"></script>
    <script src="views/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="views/assets/plugins/DataTables-1.10.12/media/js/jquery.dataTables.js"></script>
	<script src="views/assets/plugins/DataTables-1.10.12/media/js/sum().js"></script>
    <script src="views/assets/plugins/DataTables-1.10.12/media/js/dataTables.bootstrap.js"></script>

    <!--common script for all pages-->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="views/assets/js/common-scripts.js"></script>
    <script type="text/javascript" src="views/app/js/menu.js"></script>
    <script type="text/javascript" src="views/app/js/facturacion.js"></script>
    <script type="text/javascript" src="views/app/js/nuevacotizacion.js"></script>
    <script type="text/javascript" src="views/app/js/nuevoproducto.js"></script>
  </body>
</html>
