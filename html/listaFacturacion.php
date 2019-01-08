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

                <div class="row">
                    <div class="col-lg-12">

                    <h3 class="page-header"> Lista de Facturas</h3>
                    </div>
                    <div class="col-lg-12">
                    <div id ="msglistfac"></div>
                    <div class="panel panel-primary">        
                        <div class="panel-body">
                                    
                        <div class="table-responsive">
                                    <table class="table table-condensed table-hover dataTable no-footer" name="listfactura" id="listfactura">
                                                <thead class="bg-gray">
                                                    <tr>
                                                        <th># Facturas</th>
                                                        <th>Cliente</th>
                                                        <th>Fecha de Facturacion</th>
                                                        <th>Monto</th>
                                                        <!--<th>Acciones</th>-->
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


<!--common script for all pages-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="views/assets/js/common-scripts.js"></script>
<script type="text/javascript" src="views/app/js/menu.js"></script>

</body>
</html>
