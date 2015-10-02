<?php
   /* @var $this PropiedadController */
   /* @var $model Propiedad */
   /* @var $form CActiveForm */
   ?>
<div class="form">
   <?php $form=$this->beginWidget('CActiveForm', array(
      'id'=>'propiedad-form',
      'action'=>Yii::app()->createUrl('/propiedad/update/'.$model->IDPROP),
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
			<h5>Se encuentra disponible <?php echo $form->checkBox($model, 'ESTADO'); ?></h5>
	</div><!-- /.box-header -->
<!-- /.box-header -->
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
	         </div>
	         <!-- /.form-group -->
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
	         </div>
	         <!-- /.form-group -->
	      </div>
	      <!-- /.col -->
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
	         </div>
	         <!-- /.form-group -->
	         <div class="form-group">
	            <?php echo $form->labelEx($model,'DIRECCION'); ?>
	            <?php echo $form->textField($model,'DIRECCION', array("class"=>"form-control select2")); ?>
	         </div>
	      </div>
	      <!-- /.col -->
	      <div class="col-md-6">
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
