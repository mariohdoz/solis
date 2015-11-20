<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Intranet
                <small>Administración</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="?r=intra/index"><i class="fa fa-home"></i> Inicio</a></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php
                  $criteria = new CDbCriteria;
                  $criteria->addCondition("activo_cliente=1");
                   echo Cliente::model()->count($criteria)?></h3>
                  <p>Clientes</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="?r=cliente/create" class="small-box-footer">Nuevos Clientes&nbsp<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php
                    $criteria = new CDbCriteria;
                    $criteria->addCondition("eliminado_propiedad=0");
                    echo Propiedad::model()->count($criteria)?></h3>
                  <p>Propiedades</p>
                </div>
                <div class="icon">
                  <i class="fa fa-home"></i>
                </div>
                <?php echo CHtml::link('Nuevas Propiedades&nbsp<i class="fa fa-arrow-circle-right"></i>', array('/propiedad/index/'),array('class'=>"small-box-footer")); ?>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>5</h3>
                  <p>Próximas Citas</p>
                </div>
                <div class="icon">
                  <i class="fa fa-calendar"></i>
                </div>
                <a href="#" class="small-box-footer">Ver Todas <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo Solicitud::model()->count()?></h3>
                  <p>Solicitudes</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-text-o"></i>
                </div>
                <a href="#" class="small-box-footer">Solicitudes pendientes &nbsp<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo CHtml::encode($atraso)?></h3>
                  <p>Arriendos atrasados</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-text-o"></i>
                </div>
                <a href="#" class="small-box-footer">Pagos de atrasados &nbsp<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo Arriendo::model()->count()?></h3>
                  <p>Arriendos</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-text-o"></i>
                </div>
                <?php echo CHtml::link('Arriendos actuales&nbsp<i class="fa fa-arrow-circle-right"></i>', array('/arriendo/select/'),array('class'=>"small-box-footer")); ?>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo CHtml::encode($proximo)?></h3>
                  <p>Próximos pagos</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-text-o"></i>
                </div>
                <a href="#" class="small-box-footer">Órdenes de trabajo pendientes &nbsp<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.
            <!-- Calendar -->
            <div class="box box-solid bg-green-gradient">
                <div class="box-header">
                    <i class="fa fa-calendar"></i>
                    <h3 class="box-title">Calendario</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <!-- button with a dropdown -->
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Agregar nuevo evento</a></li>
                                <li><a href="#">Eliminar eventos</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Ver calendario</a></li>
                            </ul>
                        </div>
                        <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <!--The calendar -->
                    <div id="calendar" style="width: 100%"></div>
                </div><!-- /.box-body -->
                <div class="box-footer text-black">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Progress bars -->
                            <div class="clearfix">
                                <span class="pull-left">Tarea n° 1</span>
                                <small class="pull-right">90%</small>
                            </div>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                            </div>

                            <div class="clearfix">
                                <span class="pull-left">Tarea n° 2</span>
                                <small class="pull-right">70%</small>
                            </div>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <div class="clearfix">
                                <span class="pull-left">Tarea n° 3</span>
                                <small class="pull-right">60%</small>
                            </div>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                            </div>
                            <div class="clearfix">
                                <span class="pull-left">Tarea n° 4</span>
                                <small class="pull-right">40%</small>
                            </div>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div><!-- /.box -->
        </section>
    </div><!-- /.content-wrapper -->
