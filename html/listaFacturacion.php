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
                    <div id ="msglistfac"></div>
                    <div class="panel panel-info"> 
                        <div class="panel-heading ">
                            <div class="row panel-head" >
                                <h3 class='col-md-6'>Lista de Facturas</h3>
                               
                            </div> 
                        </div>       
                        <div class="panel-body">
                                    
                        <div class="table-responsive">
                                    <table class="table table-condensed table-hover dataTable no-footer" name="listfactura" id="listfactura">
                                                <thead class="bg-gray">
                                                    <tr>
                                                        <th># Facturas</th>
                                                        <th>Cliente</th>
                                                        <th>Fecha de Facturacion</th>
                                                        <th>Monto</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if($resp!=false){
                                                            foreach ($resp as  $value) {
                                                                $a = $value['factura'];
                                                                echo'<tr><td>'.$value['factura'].'</td>';
                                                                echo'<td>'.$value['cliente'].'</td>';
                                                                echo'<td>'.$value['fecha'].'</td>';
                                                                echo'<td>'.$value['monto'].'</td>';
                                                                echo'<td><a class="btn btn-primary btn-md" href="?view=facturacion&mode=reporte&factura='.$value['factura'].'" id="'.$value['factura'].'"  target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td></tr>';
                                                                //.' '.'<a  class="btn btn-danger btn-md" onclick="eliminaFactura(id)" id="'.$value['factura'].'"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                                                            }

                                                        }
                                                    
                                                    ?>   
                                                </tbody>
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
<script src="views/assets/plugins/DataTables-1.10.12/media/js/jquery.dataTables.js"></script>
<script src="views/assets/plugins/DataTables-1.10.12/media/js/sum().js"></script>
<script src="views/assets/plugins/DataTables-1.10.12/media/js/dataTables.bootstrap.js"></script>

<!--common script for all pages-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="views/assets/js/common-scripts.js"></script>
<script type="text/javascript" src="views/app/js/menu.js"></script>
<script type="text/javascript" src="views/app/js/listafacturacion.js"></script>
</body>
</html>
