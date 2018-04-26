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
          <section class="wrapper site-min-height">
          <h3><i class="fa fa-dashboard"></i> Cuadro de Control</h3>
              <!-- page start-->
              <div id="morris">
                  <div class="row mt">
                      
                      <div class="col-lg-6">
                          <div class="content-panel">
                              <h4><i class="fa fa-angle-right"></i> Cotizaciones por Mes</h4>
                              <div class="panel-body">
                                  <div id="hero-bar" class="graph"></div>
                              </div>
                          </div>
                      </div>
                      <!--<div class="col-lg-6">
                          <div class="content-panel">
                              <h4><i class="fa fa-angle-right"></i> Chart Example 1</h4>
                              <div class="panel-body">
                                  <div id="hero-graph" class="graph"></div>
                              </div>
                          </div>
                      </div>-->
                  </div>
                 
              </div>
              <!-- page end-->
          </section>
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="morris.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
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

    <!--script for this page-->
    <script type="text/javascript" src="assets/js/chart-master/Chart.js"></script>
    <script src="views/assets/js/chartjs-conf.js"></script>
    
  <script>
      //custom select box

      $(function(){
         // $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
