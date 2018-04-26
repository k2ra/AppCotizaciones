<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="?view=cotizacionAdd&mode=dashboard"><img src="views/app/img/Icon-user.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['user'];?></h5>
              	  	
                  <li class="mt">
                      <a   href="?view=cotizacionAdd&mode=dashboard">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  
				  <li class="sub-menu">
                      <a  href="javascript:;" >
                          <i class="fa fa-file-text-o"></i>
                          <span>Cotizacion</span>
                      </a>
                      <ul class="sub">
                          <li><a href="?view=cotizacionAdd&mode=nueva">Nueva Cotizacion</a></li>
                          <li><a  href="?view=cotizacionAdd&mode=listcotizacion">Listado de Cotizaciones</a></li>
                      </ul>
                  </li>
				  
				  <li class="sub-menu">
                      <a  href="javascript:;">
                          <i class="fa fa-user"></i>
                          <span>Clientes</span>
                      </a>
					  <ul class="sub">
                          <li><a href="?view=cliente&mode=nuevo">Nuevo Cliente</a></li>
                          <li><a  href="?view=cliente&mode=buscar">Buscar Cliente</a></li>
                      </ul>
                  </li>
				  
				  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-archive"></i>
                          <span>Productos</span>
                      </a>
					  <ul class="sub">
                          <li><a href="?view=producto&mode=nuevo">Nuevo Producto</a></li>
                          <li><a  href="?view=producto&mode=buscar">Buscar Producto</a></li>
                      </ul>
                  </li>

                  

                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->