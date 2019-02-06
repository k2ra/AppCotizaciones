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
              <div id ="msgBuscaProduct"></div>
                
                   <div class="panel panel-info">
                    <div class="panel-heading ">
                      <div class="row panel-head" >
                          <h3 class='col-md-6'>Buscar Producto</h3>
                      </div> 
                    </div>
                    <h3 class="page-header "><small><i class="fa fa-search"></i> Buscar Producto</small></h3>
                      <div class="panel-body">
                        
                        <div class="col-md-10 centered">
                          <form class="form-horizontal" id="productos_form">
                            <div class="row">
                              <div class="col-md-2 form-group">
                                <label class="control-label label-fontSize" for="txtBuscaProd">Nombre de Producto :</label>
                              </div>  
                              <div class="col-md-6 form-group">
                                <div class="controls input-group">
                                  <input class="form-control" name="txtBuscaProd" id="txtBuscaProd"  type="text" required>
                                  <span class="input-group-btn">
                                              <a id="btnSearchProd"  class="btn btn-primary"><i class="fa fa-search"></i></a>
                                  </span>
                                        
                                </div>
                              </div>
                            </div>

                            
                            <div class="row">
                            <div class="col-md-12">
                            
                              
                                            <div class="table-responsive">
                                              <table class="table table-condensed table-hover dataTable no-footer" name="tblProductSearch" id="tblProductSearch">
                                                      <thead class="bg-gray">
                                                          <tr>
                                                              <th style="width:10%; text-align:center">Id</th>
                                                              <th style="text-align:center">descripcion producto</th>
                                                              <th style="width:15%; text-align:center">Precio</th>
                                                              <th style="width:15%; text-align:center">Fecha de Alta</th>
                                                              <th id ="iborrado" ></th>
                                                          </tr>
                                                      </thead>
                                                      
                                                     
                                              </table>

                                        </div>
                                        <!-- /.table-responsive -->
                                      
                                    
                                    <!-- /.panel-body -->
                                 
                                </div>    
                            </div>


                                

                          </form>
                        </div>


                      </div>
                    </div>


                    <div class="container">
                        <!-- Modal -->
                        <div class="modal fade" id="editProd" role="dialog">
                          <div class="modal-dialog">
                          
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Editar Producto</h4>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="panel panel-primary">
                                      <div class="panel-body">
                                      <form id="formEditProd">
                                        <div class="row">
                                          <div class="col-md-3 form-group">
                                            <label class="control-label" for="txtIdProdEdit">Id_Producto *</label>
                                          </div>  
                                          <div class="col-md-7 form-group">
                                            <div class="controls input-group">
                                              <input class="form-control" name="txtIdProdEdit" id="txtIdProdEdit"  type="text" readonly required>
                                              <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                              </div>
                                            </div>
                                          </div>    
                                        </div>

                                        <div class="row">
                                          <div class="col-md-3 form-group">
                                            <label class="control-label" for="txtDescProdEdit">Descripcion *</label>
                                          </div>  
                                          <div class="col-md-7 form-group">
                                            <div class="controls input-group">
                                              <input class="form-control" name="txtDescProdEdit" id="txtDescProdEdit"  type="text" required>
                                              <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                              </div>
                                            </div>
                                          </div>    
                                        </div>

                                        <div class="row">
                                          <div class="col-md-3 form-group">
                                            <label class="control-label" for="txtPrecioProdEdit">Precio *</label>
                                          </div>  
                                          <div class="col-md-7 form-group">
                                            <div class="controls input-group">
                                              <input class="form-control" name="txtPrecioProdEdit" id="txtPrecioProdEdit"  type="text" required>
                                              <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                              </div>
                                            </div>
                                          </div>    
                                        </div>


                                        <div class="row">
                                          <div class="col-md-3 form-group">
                                            <label class="control-label" for="txtFechaProdEdit">Fecha *</label>
                                          </div>  
                                          <div class="col-md-7 form-group">
                                            <div class="controls input-group">
                                              <input class="form-control" name="txtFechaProdEdit" id="txtFechaProdEdit"  type="text" readonly required>
                                              <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                              </div>
                                            </div>
                                          </div>    
                                        </div>
                                    </form>

                                      </div>
                                    </div>     
                                  </div>
                                 </div>
                              <div class="modal-footer">
                              <button type="button" id="btnEditProducto" class="btn btn-success" data-dismiss="modal">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                              </div>
                            </div>
                            
                          </div>
                        </div>
                        
                      </div>


                      <div class="panel-footer">
                        
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
  <script src="views/assets/plugins/DataTables-1.10.12/media/js/jquery.dataTables.js"></script>
  <script src="views/assets/plugins/DataTables-1.10.12/media/js/dataTables.bootstrap.js"></script>  
  <script src="views/assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
       
	<script src="views/assets/js/zabuto_calendar.js"></script>	
    
    <script type="text/javascript" src="views/app/js/nuevoproducto.js"></script>
  
<script type="text/javascript" src="views/app/js/menu.js"></script>
   
	

	

  

  </body>
</html>
