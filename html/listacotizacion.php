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

		<div class="row separacionPanel">
         
          <div class="col-lg-12">
          <div id ="msglistcot"></div>
          <div class="panel panel-info"> 
            <div class="panel-heading ">
                <div class="row panel-head" >
                    <h3 class='col-md-6'>Lista Cotización</h3>
                </div> 
            </div>       
            <div class="panel-body">
                        
              <div class="table-responsive">
                        <table class="table table-condensed table-hover dataTable no-footer" name="listcotizacion" id="listcotizacion">
                                    <thead class="bg-gray">
                                        <tr>
                                            <th># Cotizacion</th>
                                            <th>Cliente</th>
                                            <th>Fecha de Cotizacion</th>
                                            <th>Monto</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot></tfoot>
                        </table>
                            </div>
                            <!-- /.table-responsive -->
                    
            </div>
            <!-- /.panel-body -->          	
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
    <script src="views/assets/plugins/DataTables-1.10.12/media/js/jquery.dataTables.js"></script>
    <script src="views/assets/plugins/DataTables-1.10.12/media/js/dataTables.bootstrap.js"></script> 
    <script type="text/javascript" src="views/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="views/assets/js/gritter-conf.js"></script>
    <script type="text/javascript" src="views/app/js/menu.js"></script>
    <!--script for this page-->
    <script src="views/assets/js/sparkline-chart.js"></script>    
  <script src="views/assets/js/zabuto_calendar.js"></script>  
    <script type="text/javascript" src="views/app/js/listacotizaciones.js"></script>
	</body>
</html>
