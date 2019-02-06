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
          <div class="row separacionPanel">
            <div class="col-lg-12">
              <div id ="msgNewClie"></div>
                <div class="panel panel-info">
                      <div class="panel-heading ">
                          <div class="row panel-head" >
                              <h3 class='col-md-6'>Nuevo Cliente</h3>
                              
                          </div> 
                      </div>       
                      <div class="panel-body">
                      <h3 class="page-header"><small>Nuevo Cliente</small></h3>
                        <div class="col-md-9 col-xs-offset-3 centered">
                          <form class="form-horizontal" id="clientes_form">
                            <div class="row">
                              
                              <div class="col-md-2 form-group">
                                <label class="control-label label-fontSize" for="txtNombre">Nombre *</label>
                              </div>  
                              <div class="col-md-4 form-group">
                                <div class="controls input-group">
                                  <input class="form-control" name="txtNombre" id="txtNombre"  type="text" required>
                                  <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                  </div>
                                </div>
                              </div>    
                            </div>

                            <div class="row">
                              <div class="col-md-2 form-group">
                                <label class="control-label label-fontSize" for="txtEmpresa">Nombre Comercial *</label>
                              </div>  
                              <div class="col-md-4 form-group">
                                <div class="controls input-group">
                                  <input class="form-control" name="txtEmpresa" id="txtEmpresa"  type="text" required>
                                  <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                                        <div class="row">
                                          <div class="col-md-2 form-group">
                                            <label class="control-label label-fontSize" for="txtCedula">RUC o Cedula *</label>
                                          </div>  
                                          <div class="col-md-4 form-group">
                                            <div class="controls input-group">
                                              <input class="form-control" name="txtCedula" id="txtCedula"  type="text" required>
                                              <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                            <div class="row">
                              <div class="col-md-2 form-group">
                                <label class="control-label label-fontSize" for="txtCorreoClie">Correo *</label>
                              </div>  
                              <div class="col-md-4 form-group">
                                <div class="controls input-group">
                                  <input class="form-control" name="txtCorreoClie" id="txtCorreoClie"  type="email" required>
                                  <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2 form-group">
                                <label class="control-label label-fontSize" for="txtDireccion">Dirección</label>
                              </div>  
                              <div class="col-md-4 form-group">
                                <div class="controls input-group">
                                  <input class="form-control" name="txtDireccion" id="txtDireccion"  type="text" >
                                  <div class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                  </div>
                                </div>
                              </div>
                            </div>                        

                            <div class="row">
                              <div class="col-md-2 form-group">
                                <label class="control-label label-fontSize" for="txtTelefonoClie">Telefono *</label>
                              </div>  
                              <div class="col-md-4 form-group">
                                <div class="controls input-group">
                                  <input class="form-control" name="txtTelefonoClie" id="txtTelefonoClie"  type="tel" required>
                                  <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-4 form-group">
                                <label class="control-label" id="txtmsj" >* campos obligatorios</label>
                              </div>
                            </div>

                                      <div class="row">
                              <div class="col-md-3  form-group">  
                                <div class="controls">
                                  <a class="btn btn-success" name="btnNewClie" id="btnNewClie">Guardar</a>  
                                </div>
                              </div>
                              <div class="col-md-3  form-group">  
                                <div class="controls">
                                  <input class="btn btn-danger btn-md" name="btnCancelClie" id="btnCancelClie" type="button" value=" Cancelar" />
                                </div>
                              </div>  
        
                            </div>  
                          </form>
                        </div>      
                      </div>
                        

                        
                    </div>

            </div>
          </div>
				
                    
                    				

					
					
					
                 
                  
                  
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
       
	<script src="views/assets/js/zabuto_calendar.js"></script>	
    
    <script type="text/javascript" src="views/app/js/nuevocliente.js"></script>
    <script type="text/javascript" src="views/app/js/menu.js"></script>

   
	

	

  

  </body>
</html>
