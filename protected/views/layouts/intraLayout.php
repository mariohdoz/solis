<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
  <head>
      <meta charset="UTF-8">
      <title>Intranet administrativo</title>
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
      <script type="text/javascript">$.widget.bridge('uibutton', $.ui.button);</script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/morris/morris.min.js" type="text/javascript"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/knob/jquery.knob.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/dist/js/app.min.js" type="text/javascript"></script>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/dist/js/demo.js" type="text/javascript"></script>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <?php echo CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/images/LogoV2.png" width="135px" height="45px" />', array('intra/index'),array('class'=>'logo')); ?>
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
                        ?> - Administrador
                      <small><?php echo date("j/ n/ Y");  ; ?></small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Configuración</a>
                    </div>
                    <div class="pull-right">
                      <?php echo CHtml::link('Cerrar sesión', array('Site/logout'),array('class'=>'btn btn-default btn-flat', 'confirm' => 'Are you sure?')); ?>
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
            <div class="pull-left info">
              <p><?php
                $nombre=Yii::app()->session['admin_nombre'];
                $ap=Yii::app()->session['admin_ape'];
                $primer=explode(" ", $nombre);
                echo $primer[0];
                echo " ";
                echo $ap;
              ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="header">PANEL DE NAVEGACIÓN</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-home"></i> <span>Propiedades</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/propiedad/index"><i class="fa fa-plus"></i> Ingresar nueva propiedad</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/propiedad/select"><i class="fa fa-exchange"></i> Modificar Propiedades</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/propiedad/eliminar"><i class="fa fa-close"></i> Eliminar Propiedad</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/propiedad/ver"><i class="fa fa-file-text-o"></i> Listado de Propiedades</a></li>
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
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/"><i class="fa fa-user-times"></i> Eliminar Clientes</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/"><i class="fa fa-file-text-o"></i> Listado de Clientes</a></li>
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
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-plus"></i> Agregar Funcionarios</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-exchange"></i> Modificar Funcionarios</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-close"></i> Eliminar Funcionarios</a></li>
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
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-plus"></i> Nuevo Arriendo</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-exchange"></i> Modificar Arriendo</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-close"></i> Eliminar Arriendo</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-eye"></i>Ver Arriendos</a></li>
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
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-plus"></i> Agregar Funcionarios</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-exchange"></i> Modificar Funcionarios</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-close"></i> Eliminar Funcionarios</a></li>
                </ul>
              </li>
            </ul>
            <ul class="sidebar-menu">
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-pencil-square-o"></i> <span>Ordenes de Trabajo</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-plus"></i> Crear Nueva OT</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-exchange"></i> Modificar OT</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-close"></i> Eliminar OT</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-close"></i> Crear reunion</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="sidebar-menu">
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-file-text-o"></i><span>Solicitud</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-eye"></i> Solicitudes pendientes </a></li>
                  </ul>
                </li>
              </ul>            <!-- 4-->
              <ul class="sidebar-menu">
                <li>
                  <a href="../widgets.html">
                    <i class="fa fa-credit-card"></i> <span>Pagos</span>
                  </a>
                </li>
              </ul>
              <ul class="sidebar-menu">
                <li>
                  <a href="../widgets.html">
                    <i class="fa fa-folder"></i> <span>Documentos</span>
                  </a>
                </li>
              </ul>
              <ul class="sidebar-menu">
                <li>
                  <a href="../widgets.html">
                    <i class="fa fa-print"></i> <span>Reportes</span>
                  </a>
                </li>
              </ul>
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
  </body>
</html>
<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect',
    '$(".info").animate({opacity: 1.0}, 3000).fadeOut("slow");',
    CClientScript::POS_READY
);
?>
