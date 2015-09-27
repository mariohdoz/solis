<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
if(!Yii::app()->session['activo'])
    $this->redirect('?r=site/index');;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Intranet administrativo</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="/nuevo/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="/nuevo/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="/nuevo/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="/nuevo/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="/nuevo/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="/nuevo/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="/nuevo/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="/nuevo/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="/nuevo/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="?r=intra/index" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <img class="logo-mini" src="/Solycobre/images/LogoLite.png" width="50px" height="50px" />
            <!-- logo for regular state and mobile devices -->
            <img src="/nuevo/images/LogoV2.png" width="135px" height="45px" />
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">


                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/nuevo/<?php echo Yii::app()->session['admin_img']; ?>" class="user-image" alt="User Image" />
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
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/nuevo/<?php echo Yii::app()->session['admin_img']; ?>" class="img-circle" alt="User Image" />
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
                            <!-- Menuma Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Configuración</a>
                                </div>
                                <div class="pull-right">
                                    <a href="?r=access/logout" class="btn btn-default btn-flat">Cerrar Sesión</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/nuevo/<?php echo Yii::app()->session['admin_img']; ?>" class="img-circle" alt="User Image" />
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
            <!-- search form -->

            <!-- /.search form -->
            <!-- menu de navegacion-->
            <!-- 1-->
            <ul class="sidebar-menu">
                <li class="header">PANEL DE NAVEGACIÓN</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-home"></i> <span>Propiedades</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="?r=propiedad/index"><i class="fa fa-plus"></i> Ingresar nueva propiedad</a></li>
                        <li><a href="?r=propiedad/select"><i class="fa fa-exchange"></i> Modificar Propiedades</a></li>
                        <li><a href="?r=propiedad/eliminar"><i class="fa fa-close"></i> Eliminar Propiedad</a></li>
                        <li><a href="?r=propiedad/ver"><i class="fa fa-file-text-o"></i> Listado de Propiedades</a></li>
                    </ul>
                </li>
            </ul>
            <!-- 2-->

            <ul class="sidebar-menu">
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Clientes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-plus"></i> Agregar Clientes</a></li>
                        <li><a href="?r=propiedad/ver"><i class="fa fa-exchange"></i> Modificar Clientes</a></li>
                        <li><a href="#"><i class="fa fa-close"></i> Eliminar Clientes</a></li>
                        <li><a href="#"><i class="fa fa-file-text-o"></i> Listado de Clientes</a></li>
                    </ul>
                </li>
            </ul>
            <!-- 3-->
            <ul class="sidebar-menu">
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Funcionarios</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-plus"></i> Agregar Funcionarios</a></li>
                        <li><a href="#"><i class="fa fa-exchange"></i> Modificar Funcionarios</a></li>
                        <li><a href="#"><i class="fa fa-close"></i> Eliminar Funcionarios</a></li>
                    </ul>
                </li>
            </ul>
            <!-- 4-->
            <ul class="sidebar-menu">
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pencil-square-o"></i> <span>Ordenes de Trabajo</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-plus"></i> Crear Nueva OT</a></li>
                        <li><a href="#"><i class="fa fa-exchange"></i> Modificar OT</a></li>
                        <li><a href="#"><i class="fa fa-close"></i> Eliminar OT</a></li>
                        <li><a href="#"><i class="fa fa-close"></i> Crear reunion</a></li>
                    </ul>
                </li>
            </ul>
            <!-- 4-->
            <ul class="sidebar-menu">
                <li>
                    <a href="../widgets.html">
                        <i class="fa fa-credit-card"></i> <span>Pagos</span>
                    </a>
                </li>
            </ul>
            <!-- 5-->
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
        <!-- /.sidebar -->
    </aside>

<?php echo $content; ?>
    <!-- /.Footer -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="?r=site/index">Propiedades Sol y cobre</a>.</strong> Todos los derechos reservados.
    </footer>



</div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="/nuevo/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script type="text/javascript">
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.2 JS -->
<script src="/nuevo/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/nuevo/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="/nuevo/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="/nuevo/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="/nuevo/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="/nuevo/plugins/knob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
<script src="/nuevo/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="/nuevo/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/nuevo/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- Slimscroll -->
<script src="/nuevo/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="/nuevo/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="/nuevo/dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/nuevo/dist/js/pages/dashboard.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="/nuevo/dist/js/demo.js" type="text/javascript"></script>

</body>
</html>

<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect',
    '$(".info").animate({opacity: 1.0}, 3000).fadeOut("slow");',
    CClientScript::POS_READY
);
?>
