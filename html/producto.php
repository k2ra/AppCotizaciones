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
              <div id ="msgNewProduct"></div>
                <div id ="msgprod"></div>
                    <div class="panel panel-info">
                      <div class="panel-heading ">
                          <div class="row panel-head" >
                              <h3 class='col-md-6'>Nuevo Producto</h3>
                          </div> 
                      </div>
                      <div class="panel-body">
                        <h3 class="page-header"><small>Nuevo Producto</small></h3>
                        <div class="col-md-10 col-md-offset-2 centered">
                          <form class="form-horizontal" id="productos_form">
                            <div class="row">
                              <div class="col-md-2 form-group">
                                <label class="control-label label-fontSize" for="txtDescProd">Descripcion *</label>
                              </div>  
                              <div class="col-md-4 form-group">
                                <div class="controls input-group">
                                  <input class="form-control" name="txtDescProd" id="txtDescProd"  type="text" required>
                                  <div class="input-group-addon">
                                    <i class="fa fa-pencil" ></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2 form-group">
                                <label class="control-label label-fontSize" for="txtFechaProd">Fecha de creacion </label>
                              </div>  
                              <div class="col-md-4 form-group">
                                <div class="controls input-group">
                                  <input class="form-control" name="txtFechaProd" id="txtFechaProd"  type="text" readonly="true" required>
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2 form-group">
                                <label class="control-label label-fontSize" for="txtPrecioProd">Precio *</label>
                              </div>  
                              <div class="col-md-4 form-group">
                                <div class="controls input-group">
                                  <input class="form-control" name="txtPrecioProd" id="txtPrecioProd"  type="text" required>
                                  <div class="input-group-addon">
                                    <i class="fa fa-usd"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-4 form-group">
                                <label class="control-label" id="txtmsjprod" >* campos obligatorios</label>
                              </div>
                            </div>

                                      <div class="row">
                              <div class="col-md-3  form-group">  
                                <div class="controls">
                                  <a class="btn btn-success" name="btnNewProd" id="btnNewProd">Guardar</a>  
                                </div>
                              </div>
                              <div class="col-md-3  form-group">  
                                <div class="controls">
                                  <input class="btn btn-danger btn-md" name="btnCancelProd" id="btnCancelProd" type="button" value=" Cancelar" />
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
    
    <script type="text/javascript" src="views/app/js/nuevoproducto.js"></script>
  
<script type="text/javascript" src="views/app/js/menu.js"></script>
   
	

	

  

  </body>
</html>
