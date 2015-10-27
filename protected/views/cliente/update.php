<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->rut_cliente=>array('view','id'=>$model->rut_cliente),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cliente', 'url'=>array('index')),
	array('label'=>'Create Cliente', 'url'=>array('create')),
	array('label'=>'View Cliente', 'url'=>array('view', 'id'=>$model->rut_cliente)),
	array('label'=>'Manage Cliente', 'url'=>array('admin')),
);
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Configuración<small>Modificar Cliente</small></h1>
        <ol class="breadcrumb">
            <li><a href="?r=intra/index">
            <i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Clientes</li>
            <li><a href="?r=intra/index">Gestión</a></li>
            <li class="active">Modificar cliente</li>
        </ol>
    </section>
    <section class="content">
			<?php
			$data = explode('-',$model->rut_cliente);
			$form=$this->beginWidget('CActiveForm', array(
			            'id'=>'update-form',
									'action'=>Yii::app()->createUrl('/cliente/update/'.$data[0]),
			            // Please note: When you enable ajax validation, make sure the corresponding
			            // controller action is handling ajax validation correctly.
			            // There is a call to performAjaxValidation() commented in generated controller code.
			            // See class documentation of CActiveForm for details on this.
			            'enableAjaxValidation'=>false,
			        )); ?>
			<div class="box box-default">
			    <div class="box-header with-border">
			        <h3 class="box-title">Registro de propietario</h3>
			    </div><!-- /.box-header -->
			    <div class="box-body">
			        <?php echo $form->errorSummary($model,'<strong>Es necesario arreglar los siguientes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="alert alert-danger">', '</div>'); ?>
			        <?php $ruta = Yii::app()->request->pathInfo; ?>
			        <div class="row">
			            <div class="col-md-6"> <!-- se trabaja de dos -->
			                <div class="form-group">
			                    <?php echo $form->labelEx($model,'rut_cliente'); ?>
			                    <?php echo $form->textField($model,'rut_cliente', array("class"=>"form-control select2", 'disabled'=>'true')); ?>
			                </div>
			                <div class="form-group">
			                    <?php echo $form->labelEx($model,'apellidos_cliente'); ?>
			                    <?php echo $form->textField($model,'apellidos_cliente', array("class"=>"form-control select2")); ?>
			                </div>
			            </div>

			            <div class="col-md-6">
			                <div class="form-group">
			                    <?php echo $form->labelEx($model,'nombres_cliente'); ?>
			                    <?php echo $form->textField($model,'nombres_cliente', array("class"=>"form-control select2")); ?>
			                </div>
			                <div class="form-group">
			                    <?php echo $form->labelEx($model,'telefonofijo_cliente'); ?>
			                    <?php echo $form->textField($model,'telefonofijo_cliente', array("class"=>"form-control select2")); ?>
			                </div>
			            </div>

			            <div class="col-md-6">
			                <div class="form-group">
			                    <?php echo $form->labelEx($model,'domicilio_cliente'); ?>
			                    <?php echo $form->textField($model,'domicilio_cliente', array("class"=>"form-control select2")); ?>
			                </div>
			                <div class="form-group">
			                  <?php echo $form->labelEx($model,'correo_cliente'); ?>
			                  <?php echo $form->textField($model,'correo_cliente',array("class"=>"form-control select2")); ?>
			                </div>
			            </div>

			            <div class="col-md-6">
			              <div class="form-group">
			                <?php echo $form->labelEx($model,'telefonocelular_cliente'); ?>
			                <?php echo $form->textField($model,'telefonocelular_cliente',array("class"=>"form-control select2")); ?>
			              </div>
			                <div class="form-group">
			                  <?php echo $form->labelEx($model,'profesion_cliente'); ?>
			              		<?php echo $form->textField($model,'profesion_cliente',array("class"=>"form-control select2")); ?>
			                </div>
			            </div>
			            <div class="col-md-6">

			              <div class="form-group">
			                  <?php echo $form->labelEx($model,'nrocuenta_cliente'); ?>
			              		<?php echo $form->textField($model,'nrocuenta_cliente',array("class"=>"form-control select2")); ?>
			                </div>
			                <div class="form-group">
			                  <?php echo $form->labelEx($model,'estadocivil_cliente') ?>
			                  <?php echo $form->dropDownList($model,'estadocivil_cliente',array(
			                    'Soltero/a'=>'Soltero/a',
			                    'Casado/a'=>'Casado/a',
			                    'Viudo/a'=>'Viudo/a',
			                  ),
			                  array("class"=>"form-control select2")) ?>
			                  </div>
			            </div>
			            <div class="col-md-6">
			              <div class="form-group">
			                <?php echo $form->labelEx($model,'banco_cliente'); ?>
			                <?php echo $form->textField($model,'banco_cliente',array("class"=>"form-control select2")); ?>
			              </div>
										<div class="form-group">
			                <?php echo $form->labelEx($model,'tipocuenta_cliente') ?>
			                <?php echo $form->dropDownList($model,'tipocuenta_cliente',array(
			                  'Soltero/a'=>'Soltero/a',
			                  'Casado/a'=>'Casado/a',
			                  'Viudo/a'=>'Viudo/a',
			                ),
			                array("class"=>"form-control select2")) ?>
			              </div>
			            </div>
			        </div><!-- /.box-body -->
			        <div class="box-footer">
			            <div class="pull-left">
			              <div class="row buttons" style="margin-left: 10px ">
			                  <?php echo CHtml::submitButton('Guardar', array('confirm'=>'¿Está seguro de guardar las modificaciones?','class'=>'btn btn-success')); ?>
			                  &nbsp;&nbsp;
			                  <?php $this->widget('application.extensions.data.EBackButtonWidget'); ?>
			                </div>
			                <?php $this->endWidget(); ?>
			            </div>
			        </div>
			    	</div>
			</div><!-- /.box -->
		</section>
</div>
