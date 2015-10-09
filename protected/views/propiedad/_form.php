<?php
   /* @var $this PropiedadController */
   /* @var $model Propiedad */
   /* @var $form CActiveForm */
   ?>
<div class="form">
   <?php $form=$this->beginWidget('CActiveForm', array(
      'id'=>'propiedad-form',
      'action'=>Yii::app()->createUrl('/propiedad/update/'.$model->id_propiedad),
      // Please note: When you enable ajax validation, make sure the corresponding
      // controller action is handling ajax validation correctly.
      // There is a call to performAjaxValidation() commented in generated controller code.
      // See class documentation of CActiveForm for details on this.
      'enableAjaxValidation'=>false,
      )); ?>
   <?php $ruta = Yii::app()->request->pathInfo; ?>

   <!-- /.row -->
<!-- /.box-body -->

</div><!-- /.box -->
<!-- Término de agregar prop -->
<div class="box box-default">
	<div class="box-header with-border">
			<h3 class="box-title">Modificar propiedad</h3>
			<h5>Se encuentra disponible <?php echo $form->checkBox($model, 'estado_propiedad'); ?></h5>
	</div><!-- /.box-header -->
<!-- /.box-header -->
	<div class="box-body">
	   <?php echo $form->errorSummary($model); ?>
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
	         </div>
	         <!-- /.form-group -->
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
	         </div>
	         <!-- /.form-group -->
	      </div>
	      <!-- /.col -->
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
	         </div>
	         <!-- /.form-group -->
	         <div class="form-group">
	            <?php echo $form->labelEx($model,'direccion_propiedad'); ?>
	            <?php echo $form->textField($model,'direccion_propiedad', array("class"=>"form-control select2")); ?>
	         </div>
	      </div>
	      <!-- /.col -->
	      <div class="col-md-6">
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
	</div>
	<div class="box-footer">
			<div class="pull-right">
					<div class="row buttons" style="margin-right: 10px ">
							<?php echo CHtml::submitButton('Guardar', array('class'=>'boton')); ?>
							<?php echo CHtml::link('Terminar', array('intra/index'), array('class'=>'boton')); ?>
					</div>
			</div>
	</div>
	<?php $this->endWidget(); ?>

</div>
<!-- form -->
