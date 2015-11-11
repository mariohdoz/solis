<?php
/* @var $this PropiedadController */
/* @var $model Propiedad */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'propiedad-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rut_cliente'); ?>
		<?php echo $form->textField($model,'rut_cliente',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rut_cliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion_propiedad'); ?>
		<?php echo $form->textField($model,'direccion_propiedad',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'direccion_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero_propiedad'); ?>
		<?php echo $form->textField($model,'numero_propiedad'); ?>
		<?php echo $form->error($model,'numero_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'habitacion_propiedad'); ?>
		<?php echo $form->textField($model,'habitacion_propiedad'); ?>
		<?php echo $form->error($model,'habitacion_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bano_propiedad'); ?>
		<?php echo $form->textField($model,'bano_propiedad'); ?>
		<?php echo $form->error($model,'bano_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'terreno_propiedad'); ?>
		<?php echo $form->textField($model,'terreno_propiedad',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'terreno_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'construido_propiedad'); ?>
		<?php echo $form->textField($model,'construido_propiedad',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'construido_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_propiedad'); ?>
		<?php echo $form->textField($model,'tipo_propiedad',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'tipo_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'servicio_propiedad'); ?>
		<?php echo $form->textField($model,'servicio_propiedad',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'servicio_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_propiedad'); ?>
		<?php echo $form->textField($model,'estado_propiedad'); ?>
		<?php echo $form->error($model,'estado_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_propiedad'); ?>
		<?php echo $form->textArea($model,'descripcion_propiedad',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comuna_propiedad'); ?>
		<?php echo $form->textField($model,'comuna_propiedad',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'comuna_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amoblado_propiedad'); ?>
		<?php echo $form->textField($model,'amoblado_propiedad'); ?>
		<?php echo $form->error($model,'amoblado_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor_propiedad'); ?>
		<?php echo $form->textField($model,'valor_propiedad'); ?>
		<?php echo $form->error($model,'valor_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo_propiedad'); ?>
		<?php echo $form->textField($model,'activo_propiedad'); ?>
		<?php echo $form->error($model,'activo_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eliminado_propiedad'); ?>
		<?php echo $form->textField($model,'eliminado_propiedad'); ?>
		<?php echo $form->error($model,'eliminado_propiedad'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->