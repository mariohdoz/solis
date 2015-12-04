<?php
/* @var $this OrdentrabajoController */
/* @var $model Ordentrabajo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ordentrabajo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rut_admin'); ?>
		<?php echo $form->textField($model,'rut_admin',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rut_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_ot'); ?>
		<?php echo $form->textArea($model,'descripcion_ot',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion_ot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaemision_ot'); ?>
		<?php echo $form->textField($model,'fechaemision_ot'); ?>
		<?php echo $form->error($model,'fechaemision_ot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaejecucion_ot'); ?>
		<?php echo $form->textField($model,'fechaejecucion_ot'); ?>
		<?php echo $form->error($model,'fechaejecucion_ot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_ot'); ?>
		<?php echo $form->textField($model,'estado_ot'); ?>
		<?php echo $form->error($model,'estado_ot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inicio_ot'); ?>
		<?php echo $form->textField($model,'inicio_ot'); ?>
		<?php echo $form->error($model,'inicio_ot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'servicio_ot'); ?>
		<?php echo $form->textField($model,'servicio_ot',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'servicio_ot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observacion_ot'); ?>
		<?php echo $form->textArea($model,'observacion_ot',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observacion_ot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'totalpagar_ot'); ?>
		<?php echo $form->textField($model,'totalpagar_ot'); ?>
		<?php echo $form->error($model,'totalpagar_ot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'formapago_ot'); ?>
		<?php echo $form->textField($model,'formapago_ot'); ?>
		<?php echo $form->error($model,'formapago_ot'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->