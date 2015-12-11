<?php
if(!Yii::app()->session['activo'])
    $this->redirect(Yii::app()->request->baseUrl.'/site/index');;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="UTF-8">
      <title>Intranet administrativo</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.4 -->
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <!-- FontAwesome 4.3.0
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href='<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico'/>

      <!-- Ionicons 2.0.0 -->
      <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
      <!-- Theme style -->

      <link href="<?php echo Yii::app()->request->baseUrl; ?>/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />

      <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
      <!-- iCheck -->
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
      <!-- Morris chart -->
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
      <!-- jvectormap -->
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
      <!-- Date Picker -->
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
      <!-- Daterange picker -->
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
      <!-- bootstrap wysihtml5 - text editor -->
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    </meta>
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/intra/index" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/LogoLite.png" width="50px" height="50px"></span>
          <span class="logo-lg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/LogoV2.png" width="135px" height="45px"></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo Yii::app()->session['admin_img']; ?>" class="user-image" alt="User Image" />
                  <span class="hidden-xs"><?php
                    $nombre=Yii::app()->session['admin_nombre'];
                    $ap=Yii::app()->session['admin_ape'];
                    $primer=explode(" ", $nombre);
                    $appe=explode(" ", $ap);
                    echo $primer[0];
                    echo " ";
                    echo $appe[0];
                    echo " ";
                    echo $appe[1];
                  ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo Yii::app()->session['admin_img']; ?>" class="img-circle" alt="User Image" />
                    <p>
                        <?php
                          $nombre=Yii::app()->session['admin_nombre'];
                          $ap=Yii::app()->session['admin_ape'];
                          $primer=explode(" ", $nombre);
                          $appe=explode(" ", $ap);
                          echo $primer[0];
                          echo " ";
                          echo $appe[0];
                          echo " ";
                          echo $appe[1];
                        ?> - <?php echo Yii::app()->session['funcionario']? 'Funcionario':'Administrador' ?>
                      <small><?php echo date("j/ n/ Y");  ; ?></small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <?php
                      $data = explode('-', Yii::app()->session['admin_rut']);
                       echo CHtml::link('Configuración', array('/administrador/view/', 'id'=>$data[0]), array('class'=>"btn btn-default btn-flat")); ?>
                    </div>
                    <div class="pull-right">
                      <?php echo CHtml::link('Cerrar sesión', array('Site/logout'),array('class'=>'btn btn-default btn-flat', 'confirm' => '¿Está seguro  de cerrar la sesión?')); ?>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo Yii::app()->session['admin_img']; ?>" class="img-circle" alt="User Image" />
            </div>
            <div id='pull_left_info' class="pull-left info">
              <p><?php
                $nombre=Yii::app()->session['admin_nombre'];
                $ap=Yii::app()->session['admin_ape'];
                $appe=explode(" ", $ap);
                $primer=explode(" ", $nombre);
                echo $primer[0];
                echo " ";
                echo $appe[0];
              ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
            </div>
          </div><br>
          <ul class="sidebar-menu">
            <li class="header">PANEL DE NAVEGACIÓN</li>
            <?php if (!Yii::app()->session['funcionario']) : ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-home"></i> <span>Propiedades</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/propiedad/create"><i class="fa fa-plus"></i> Ingresar nueva propiedad</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/propiedad/select"><i class="fa fa-exchange"></i> Modificar Propiedades</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/propiedad/select2"><i class="fa fa-close"></i> Eliminar Propiedad</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/propiedad/index"><i class="fa fa-file-text-o"></i> Listado de Propiedades</a></li>
              </ul>
            </li>
          </ul>
          <ul class="sidebar-menu">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pencil-square-o"></i> <span>Arriendos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/arriendo/create"><i class="fa fa-plus"></i> Nuevo Arriendo</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/arriendo/Select"><i class="fa fa-exchange"></i> Modificar Arriendo</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/arriendo/Select2"><i class="fa fa-close"></i> Eliminar Arriendo</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/arriendo/index"><i class="fa fa-eye"></i>Ver Arriendos</a></li>
              </ul>
            </li>
          </ul>
          <ul class="sidebar-menu">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-money "></i> <span>Ventas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/venta/create"><i class="fa fa-plus"></i> Nueva venta</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/venta/Select"><i class="fa fa-exchange"></i> Modificar venta</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/venta/Select2"><i class="fa fa-close"></i> Eliminar venta</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/venta/index"><i class="fa fa-eye"></i>Ver ventas</a></li>
              </ul>
            </li>
          </ul>
          <ul class="sidebar-menu">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-credit-card"></i> <span>Pagos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/pago/select"><i class="fa fa-money"></i> Administrar pagos </a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/pago/atrasado"><i class="fa fa-money"></i> arriendos atrasados</a></li>
              </ul>
            </li>
          </ul>
          <ul class="sidebar-menu">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Clientes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/cliente/create"><i class="fa fa-user-plus"></i> Agregar Clientes</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/cliente/select"><i class="fa fa-exchange"></i> Modificar Clientes</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/cliente/select2"><i class="fa fa-user-times"></i> Eliminar Clientes</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/cliente/index"><i class="fa fa-file-text-o"></i> Listado de Clientes</a></li>
                </ul>
              </li>
            </ul>
            <ul class="sidebar-menu">
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-male"></i> <span>Arrendatarios</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/arrendatario/create"><i class="fa fa-user-plus"></i> Agregar arrendatario</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/arrendatario/select"><i class="fa fa-exchange"></i> Modificar arrendatario</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/arrendatario/select2"><i class="fa fa-user-times"></i> Eliminar arrendatario</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/arrendatario/index"><i class="fa fa-file-text-o"></i> Listado de arrendatario</a></li>
                </ul>
              </li>
            </ul>

            <ul class="sidebar-menu">
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-users"></i> <span>Funcionarios</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/funcionario/create"><i class="fa fa-user-plus"></i> Agregar funcionario</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/funcionario/select"><i class="fa fa-exchange"></i> Modificar funcionario</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/funcionario/select2"><i class="fa fa-user-times"></i> Eliminar funcionario</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/funcionario/index"><i class="fa fa-file-text-o"></i> Listado de funcionario</a></li>
                </ul>
              </li>
            </ul>
            <ul class="sidebar-menu">
            <?php endif; ?>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-file-text-o"></i><span>Solicitud</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/solicitud/index"><i class="fa fa-eye"></i> Solicitudes pendientes </a></li>
                </ul>
              </li>
            </ul>            <!-- 4-->
            <ul class="sidebar-menu">
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-pencil-square-o"></i> <span>Ordenes de Trabajo</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/Ordentrabajo/create"><i class="fa fa-plus"></i> Crear Nueva OT</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/Ordentrabajo/select"><i class="fa fa-exchange"></i> Modificar OT</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/Ordentrabajo/select2"><i class="fa fa-close"></i> Eliminar OT</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/Ordentrabajo/index"><i class="fa fa-close"></i> Crear reunion</a></li>
                  </ul>
                </li>
              </ul>
              <?php if (!Yii::app()->session['funcionario']) : ?>
              <ul class="sidebar-menu">
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-pencil-square-o"></i> <span>Reportes</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/reporte/index"><i class="fa fa-plus"></i> Cotización</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/reporte/ganancia"><i class="fa fa-exchange"></i> Ganancias</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/reporte/ganancia2"><i class="fa fa-exchange"></i> Ganancias</a></li>

                  </ul>
                </li>
              </ul>
            <?php endif; ?>
            </section>
          </aside>
          <?php echo $content; ?>
          <footer class="main-footer">
            <div class="pull-right hidden-xs">
            </div>
            <strong>Copyright &copy; 2014-2015 <a href="?r=site/index">Propiedades Sol y cobre</a>.</strong> Todos los derechos reservados.
          </footer>
        </div>
      </aside>
     <div class="control-sidebar-bg"></div>
    </div>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script type="text/javascript">
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/morris/morris.min.js" type="text/javascript"></script>
  <!-- Sparkline -->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
  <!-- jvectormap -->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/knob/jquery.knob.js" type="text/javascript"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
  <!-- datepicker -->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
  <!-- Slimscroll -->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <!-- FastClick -->
  <!-- AdminLTE App -->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/dist/js/app.min.js" type="text/javascript"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/dist/js/pages/dashboard.js" type="text/javascript"></script>
  <!-- AdminLTE for demo purposes -->
  </body>
</html>
