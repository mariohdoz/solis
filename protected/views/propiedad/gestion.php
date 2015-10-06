
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Configuración
                <small>Registrar propiedad </small>
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard">&nbsp;</i><?php echo CHtml::link('Inicio', array('intra/index')) ?></li>
                <li class="active"><?php echo CHtml::link('Propiedades', array('/propiedad/ver')) ?></li>
                <li class="active">Registrar propiedad</li>
            </ol>
        </section>
        <!-- Main content  -->
        <section class="content">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'propiedad-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation'=>false,
            )); ?>
            <!-- Seleccion de propietario -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Selección del propietario</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php $ruta = Yii::app()->request->pathInfo; ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'rut_cliente'); ?>
                                <?php
                                $criteria = new CDbCriteria();
                                $criteria->addCondition('activo_cliente = 1');
                                echo $form->dropDownList($model,'rut_cliente', CHtml::listData(Cliente::model()->findAll($criteria, array('order' => 'rut_cliente')),'rut_cliente','fullname'), array("class"=>"form-control select2"),
                                    array('empty' => '(Seleccione tipo de servicio)'));?>
                                <?php echo $form->error($model,'rut_cliente'); ?>

                            </div><!-- /.form-group -->
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="center-block">
                            <?php echo CHtml::Link('Registrar nuevo propietario', array('/cliente/create'), array('class'=>'btn btn-info')); ?>
                        </div>
                      </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right">
                    </div>
                </div>
            </div><!-- /.box -->
            <!-- Termino de agregar prop -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Agregar Propiedad</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <?php echo $form->errorSummary($model,'<strong>Es necesario arreglar los siguientes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="alert alert-danger">', '</div>'); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'servicio_propiedad'); ?>
                                <?php echo $form->dropDownList($model,'servicio_propiedad',
                                    array(
                                        'Venta' => 'Venta',
                                        'Arriendo' => 'Arriendo',
                                        'Arriendo amoblado' => 'Arriendo amoblado',
                                    ),
                                    array("class"=>"form-control select2"),
                                    array('empty' => '(Seleccione tipo de servicio)')); ?>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'tipo_propiedad'); ?>
                                <?php echo $form->dropDownList($model,'tipo_propiedad',
                                    array(
                                        'Casa' => 'Casa',
                                        'Departamento Habitación' => 'Departamento Habitación',
                                        'Local' => 'Local',
                                        'Oficina Casa' => 'Oficina Casa',
                                        'Galpón' => 'Galpón',
                                        'Oficina Departamento' => 'Oficina Departamento',
                                        'Sitio Comercial' => 'Sitio Comercial',
                                        'Sitio Recidencial' => 'Sitio Recidencial',
                                        'Propiedad de inversión' => 'Propiedad de inversión',
                                        'Terreno' => 'Terreno'
                                    ),
                                    array("class"=>"form-control select2"),
                                    array('empty' => '(Tipo de propiedad)')); ?>
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->
                        <div class="col-md-6">
                          <div class="form-group">
                              <?php echo $form->labelEx($model,'comuna_propiedad'); ?>
                              <?php echo $form->dropDownList($model,'comuna_propiedad',
                                  array(
                                      'Antofagasta' => 'Antofagasta',
                                      'Calama' => 'Calama',
                                      'Iquique' => 'Iquique'
                                      ),
                                  array("class"=>"form-control select2"),
                                  array('empty' => '(Seleccione la comuna)')); ?>
                          </div><!-- /.form-group -->

                              <div class="form-group">
                                  <?php echo $form->labelEx($model,'direccion_propiedad'); ?>
                                  <?php echo $form->textField($model,'direccion_propiedad', array("class"=>"form-control select2")); ?>
                              </div>
                        </div><!-- /.col -->
                        <div class="col-md-6">
                          <div class="form-group">
                              <?php echo $form->labelEx($model,'habitacion_propiedad'); ?>
                              <?php echo $form->dropDownList($model,'habitacion_propiedad',
                                  array(
                                      '1' => '1',
                                      '2' => '2',
                                      '3' => '3',
                                      '4' => '4',
                                      '5' => '5',
                                      '6' => '6',
                                      '7' => '7',
                                      '8' => '8',
                                      '9' => '9'
                                  ),
                                  array("class"=>"form-control select2"),
                                  array('empty' => '(Seleccione la cantidad de Habitaciones)')); ?>
                           </div>
                          <div class="form-group">
                            <?php echo $form->labelEx($model,'bano_propiedad'); ?>
                            <?php echo $form->dropDownList($model,'bano_propiedad',
                                array(
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                    '7' => '7',
                                    '8' => '8',
                                    '9' => '9'
                                ),
                                array("class"=>"form-control select2"),
                                array('empty' => '(Seleccione la cantidad de baños)')); ?>
                          </div>

                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                                <?php echo $form->labelEx($model,'terreno_propiedad'); ?>
                                <?php echo $form->textField($model,'terreno_propiedad', array("class"=>"form-control select2")); ?>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'construido_propiedad'); ?>
                                <?php echo $form->textField($model,'construido_propiedad', array("class"=>"form-control select2")); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <?php echo $form->labelEx($model, 'valor_propiedad');?>
                            <?php echo $form->textField($model, 'valor_propiedad', array("class"=>"form-control select2"));?>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <?php echo $form->labelEx($model, 'amoblado_propiedad');?><br>
                            <?php echo $form->checkBox($model, 'amoblado_propiedad');?>
                          </div>
                        </div>
                    </div>
                    <?php echo $form->labelEx($model,'descripcion_propiedad'); ?>
                    <?php echo $form->textarea($model,'descripcion_propiedad', array('rows' => 4, 'class'=> 'form-control description-text ', 'cols'=> 50 )); ?>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-left">
                        <div class="row buttons" style="margin-left: 10px ">
                            <?php echo CHtml::submitButton('Guardar', array('class'=>'btn btn-success'), array('confirm' => 'Está seguro de ingresar la propiedad?')); ?>
                            &nbsp;&nbsp;
                            <?php $this->widget('application.extensions.data.EBackButtonWidget'); ?>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div><!-- /.box -->
        </section><!-- termina la segunda seccion -->
    </div>
