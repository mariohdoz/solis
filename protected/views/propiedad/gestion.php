<?php
if(!yii::app()->session['activo'])
    $this->redirect('?r=site/index');;
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Configuración
                <small>Registrar propiedad </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="?r=intra/index">
                        <i class="fa fa-dashboard"></i>Inicio</a></li>
                <li class="active">Propiedades</li>

                <li><a href="?r=intra/index">Gestión</a></li>
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
                                <?php echo $form->labelEx($model,'RUTCLIENTE'); ?>
                                <?php echo $form->dropDownList($model,'RUTCLIENTE', CHtml::listData(Cliente::model()->findAll(array('order' => 'RUTCLIENTE')),'RUTCLIENTE','fullname'), array("class"=>"form-control select2"),
                                    array('empty' => '(Seleccione tipo de servicio)'));?>
                                <?php echo $form->error($model,'RUTCLIENTE'); ?>
                                <div class="center-block">
                                    <a  href="?r=cliente/create" class="boton">Registrar Nuevo propietario</a>
                                </div>
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->
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
                    <?php echo $form->errorSummary($model); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'SERVICIO'); ?>
                                <?php echo $form->dropDownList($model,'SERVICIO',
                                    array(
                                        'Venta' => 'Venta',
                                        'Arriendo' => 'Arriendo',
                                        'Arriendo amoblado' => 'Arriendo amoblado',
                                    ),
                                    array("class"=>"form-control select2"),
                                    array('empty' => '(Seleccione tipo de servicio)')); ?>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'TIPO'); ?>
                                <?php echo $form->dropDownList($model,'TIPO',
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
                              <?php echo $form->labelEx($model,'COMUNAPROPIEDAD'); ?>
                              <?php echo $form->dropDownList($model,'COMUNAPROPIEDAD',
                                  array(
                                      'Antofagasta' => 'Antofagasta',
                                      'Calama' => 'Calama',
                                      'Iquique' => 'Iquique'
                                      ),
                                  array("class"=>"form-control select2"),
                                  array('empty' => '(Seleccione la comuna)')); ?>
                          </div><!-- /.form-group -->

                              <div class="form-group">
                                  <?php echo $form->labelEx($model,'DIRECCION'); ?>
                                  <?php echo $form->textField($model,'DIRECCION', array("class"=>"form-control select2")); ?>
                              </div>
                        </div><!-- /.col -->
                        <div class="col-md-6">
                          <div class="form-group">
                              <?php echo $form->labelEx($model,'CANTPIEZA'); ?>
                              <?php echo $form->dropDownList($model,'CANTPIEZA',
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
                            <?php echo $form->labelEx($model,'CANTBANO'); ?>
                            <?php echo $form->dropDownList($model,'CANTBANO',
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
                                <?php echo $form->labelEx($model,'TERRENO'); ?>
                                <?php echo $form->textField($model,'TERRENO', array("class"=>"form-control select2")); ?>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'TERRENOCONSTRUIDO'); ?>
                                <?php echo $form->textField($model,'TERRENOCONSTRUIDO', array("class"=>"form-control select2")); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <?php echo $form->labelEx($model, 'VALORPROPIEDAD');?>
                            <?php echo $form->textField($model, 'VALORPROPIEDAD', array("class"=>"form-control select2"));?>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <?php echo $form->labelEx($model, 'AMOBLADO');?><br>
                            <?php echo $form->checkBox($model, 'AMOBLADO');?>
                          </div>
                        </div>
                    </div>
                    <?php echo $form->labelEx($model,'DESCRIPCION'); ?>
                    <?php echo $form->textarea($model,'DESCRIPCION', array('rows' => 4, 'class'=> 'form-control description-text ', 'cols'=> 50 )); ?>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right">
                        <div class="row buttons" style="margin-right: 10px ">
                            <?php echo CHtml::submitButton('Guardar', array('class'=>'boton2')); ?>
                            <?php $this->widget('application.ext.data.EBackButtonWidget'); ?>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div><!-- /.box -->
        </section><!-- termina la segunda seccion -->
    </div>
