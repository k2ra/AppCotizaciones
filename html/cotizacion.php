<?php include(HTML_DIR . 'component/header.php'); ?>
<link rel="stylesheet" type="text/css" href="views/app/css/adicional.css">
  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <?php include(HTML_DIR . 'component/topbar.php'); ?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <?php include(HTML_DIR . 'component/menu.php'); ?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

				<div class="row">
				<div class="col-lg-12">
                     <h3 class="page-header">Nueva Cotizacion</h3>
                </div>
                  	<div class="col-lg-12">
                  		<div id ="msg"></div>
                  		
							<div class="tab-content">
                        		<div class="tab-pane fade in active " id="fcotizacion">
			                      	<form id="cotiza_form">
													<div class="panel panel-primary">
														<div class="panel-body">


																<fieldset>
																	<div class="row">
																		<div class="col-md-4 form-group">
																			<label class="control-label label-fontSize" for="txtCliente">Cliente</label>
																			
																			<div class="controls input-group">
																			  <input class="form-control" name="txtCliente" id="txtCliente"  type="text" list="dlclient" required>
																				
																				<span class="input-group-btn">
        																			<a id="btnSearchClie"  class="btn btn-primary"><i class="fa fa-search"></i></a>
      																			</span>
																				
																			</div>
																			
																			<div id="resultadoBusqueda" style="border-style: ridge; display:none;"></div>
																		</div>
																	  	<div class="col-md-2 col-md-offset-6 form-group">
																			<label class="control-label label-fontSize" for="txtNumcotiza"># Cotizacion </label>
																			
																			<div class="controls">
																			  <input class="form-control" name="txtNumcotiza" id="txtNumcotiza" type="text" readonly="true" required>									 
																			</div>
																	  	</div>
																	</div>

																	<div class="row">
										                              	<div class="col-md-4 form-group">
										                                	<label class="control-label label-fontSize" for="txtEmpresa">Empresa </label>
										                                
										                               		<div class="controls">
										                                	<!-- <select class="form-control"  name="txtEmpresa" id="txtEmpresa" required>
										                                 	</select>-->
										                                  	<input class="form-control" name="txtEmpresa" id="txtEmpresa" type="text" required>
										                                                     
										                                	</div>
									                              		</div>
																		<div class="col-md-4 form-group">
																			<label class="control-label label-fontSize" for="txtTelefono">Tel</label>
																			
																			<div class="controls input-group">
																			  <input class="form-control" name="txtTelefono" id ="txtTelefono" type="tel" style="background-color : #FFFFFF; cursor: auto" placeholder="#telefono" data-toggle="popover" title="telefono no encontrado" data-content="Ir a la pestaña clientes y crear el cliente" data-placement="bottom"  required>
																			  	<div class="input-group-addon">
																					<i class="fa fa-phone"></i>
																				</div>	

																			</div>
																		</div>
																		<div class="col-md-4 form-group">
																			<label class="control-label label-fontSize" for="txtCorreo">Correo</label>
																			
																			<div class="controls input-group">
																			  <input class="form-control" name="txtCorreo" id="txtCorreo" type="email"   placeholder="Email" required>
																			  <div class="input-group-addon">
																					<i class="fa fa-envelope"></i>
																				</div>
																			</div>
																		</div>
			                           	 							</div>
			                            							<div class="row">
																		<div class="col-md-4  form-group">	
																			<div class="controls">
																			  <input class="btn btn-success btn-md" name="btnagregar" id="btnagregar" type="button" value=" + Agregar Producto"  />
																			</div>
																		</div>
																		<div class="col-md-4  form-group">	
																			<div class="controls">
																			  <a class="btn btn-primary btn-md" name="btnenvio" id="btnenvio" > <i class="fa fa-print"></i> Imprimir</a> 
																			</div>
																		</div>  
							
																	</div>

																</fieldset>
														</div>
													</div>
										

														<div class="row">
														<div class="col-md-12">
														<div class="panel panel-primary">
															<div class="nav nav-tabs panel-body">
			                        							<div class="table-responsive">
											                        <table class="table table-condensed table-hover dataTable no-footer" name="table1" id="dataTables1">
									                                    <thead class="bg-gray">
									                                        <tr>
									                                            <th style="width:10%; text-align:center">Cantidad</th>
									                                            <th style="text-align:center">Producto</th>
									                                            <th style="width:15%; text-align:center">Precio</th>
									                                            <th id ="iborrado" style="width:1%"></th>
									                                        </tr>
									                                    </thead>
									                                    
									                                   
											                        </table>

												                </div>
												                <!-- /.table-responsive -->
												             
												           		<div id="totales">
												           			<div class="row">
												           			<div class="col-md-offset-8 form-horizontal" >

												                         <!--<div class="col-md-4 form-group">-->
												                              <label class="control-label col-sm-2 col-md-offset-3">SUBTOTAL</label>
												                              <div class="col-sm-5 col-md-offset-1">
												                                  <label  class="form-control label-fontSize"  id="txtsubtotal"></label>
												                              </div>
												                          <!--</div>-->
																	</div>
																	</div>
																	<div class="row">
																		<div class="col-md-offset-8 form-horizontal">
																			<label class="control-label col-sm-2 col-md-offset-3">ITBMS</label>
																			
																			<div class="col-sm-5 col-md-offset-1">
																			  <label class="form-control label-fontSize" id="txtitbms"></label>									 
																			</div>
																	  	</div>
																	</div>	
																	<div class="row">
																		<div class="col-md-offset-8 form-horizontal">
																			<label class="control-label  col-sm-2 col-md-offset-3" for="txtNumcotiza">TOTAL </label>
																			
																			<div class="col-sm-5 col-md-offset-1">
																			  <label class="form-control label-fontSize" id="txttotal"></label>									 
																			</div>
																	  	</div>
																	</div>
																</div>		
												            </div>
												            <!-- /.panel-body -->
												        </div> 
												        </div>    
														</div>
									</form>
								</div>


							</div>	


							<div class="container"  data-spy="scroll" >
								<!-- Modal -->
								<div class="modal fade" id="despliegaProducto" role="dialog">
							    	<div class="modal-dialog modal-lg">
							    
							    		<!-- Modal content-->
							    		<div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title">Agregar Productos</h4>
									        </div>
									        <div class="modal-body">
									        	<div class="row">
										            <div class="col-md-12">
										              
										             	<div class="panel panel-primary">
											                <div class="panel-body">

											                    <div class="table-responsive-md">
											                        <table class="table table-hover dataTable no-footer" id="tblproductos">
										                                <thead class="bg-gray">
										                                    <tr>
										                                        <th class="hidden-sm" style="width:10%; text-align:center">Codigo</th>
										                                        <th style="text-align:center">Descripcion</th>
										                                        <th style="width:15%; text-align:center">Precio</th>
										                                        <th style="width:15%; text-align:center">Cantidad</th>
										                                        <th class="agregar"></th>
										                                    </tr>
										                                </thead>
											                        </table>
											                    </div>
											                          <!-- /.table-responsive -->
											                          <div class="row">
											                      </div>
											                      <!-- /.panel-body -->
											                </div> 
										                </div>    
										            </div>
									        	</div>
										        <div class="modal-footer">
										        
										          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

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
      <!--footer start-->
     <!-- <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>-->
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="views/assets/js/jquery.js"></script>
    <script src="views/assets/js/jquery-1.8.3.min.js"></script>
    <script src="views/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="views/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="views/assets/js/jquery.scrollTo.min.js"></script>
    <script src="views/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="views/assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="views/assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="views/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="views/assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="views/assets/js/sparkline-chart.js"></script>    
	<script src="views/assets/js/zabuto_calendar.js"></script>
	<script src="views/assets/plugins/DataTables-1.10.12/media/js/jquery.dataTables.js"></script>
	<script src="views/assets/plugins/DataTables-1.10.12/media/js/sum().js"></script>
    <script src="views/assets/plugins/DataTables-1.10.12/media/js/dataTables.bootstrap.js"></script>	
	<script src="views/assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
	<script src="views/assets/js/jqBootstrapValidation.js"></script>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/locales/bootstrap-datepicker.es.min.js"></script>-->
  	<script type="text/javascript" src="views/app/js/nuevacotizacion.js"></script>
  	<script type="text/javascript" src="views/app/js/nuevocliente.js"></script>
  	<script type="text/javascript" src="views/app/js/nuevoproducto.js"></script>
  	<script type="text/javascript" src="views/app/js/menu.js"></script>

  </body>
</html>
