<?php
/* @var $this VentaController */
/* @var $model Venta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'venta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_propiedad'); ?>
		<?php echo $form->textField($model,'id_propiedad'); ?>
		<?php echo $form->error($model,'id_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rut_admin'); ?>
		<?php echo $form->textField($model,'rut_admin',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rut_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombrescomprador_venta'); ?>
		<?php echo $form->textField($model,'nombrescomprador_venta',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombrescomprador_venta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellidoscomprador_venta'); ?>
		<?php echo $form->textField($model,'apellidoscomprador_venta',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'apellidoscomprador_venta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rutcomprador_venta'); ?>
		<?php echo $form->textField($model,'rutcomprador_venta',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rutcomprador_venta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comisioncomprador_venta'); ?>
		<?php echo $form->textField($model,'comisioncomprador_venta'); ?>
		<?php echo $form->error($model,'comisioncomprador_venta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comisioncliente_venta_'); ?>
		<?php echo $form->textField($model,'comisioncliente_venta_'); ?>
		<?php echo $form->error($model,'comisioncliente_venta_'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->