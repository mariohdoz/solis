<?php
/* @var $this ArriendoController */
/* @var $model Arriendo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'arriendo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'id_propiedad'); ?>
		<?php echo $form->textField($model,'id_propiedad'); ?>
		<?php echo $form->error($model,'id_propiedad'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'rut_admin'); ?>
		<?php echo $form->textField($model,'rut_admin',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rut_admin'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'rut_arrendatario'); ?>
		<?php echo $form->textField($model,'rut_arrendatario',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rut_arrendatario'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'inscripcion_arriendo'); ?>
		<?php echo $form->textField($model,'inscripcion_arriendo'); ?>
		<?php echo $form->error($model,'inscripcion_arriendo'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fechapago_arriendo'); ?>
		<?php echo $form->textField($model,'fechapago_arriendo'); ?>
		<?php echo $form->error($model,'fechapago_arriendo'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'inicio_arriendo'); ?>
		<?php echo $form->textField($model,'inicio_arriendo'); ?>
		<?php echo $form->error($model,'inicio_arriendo'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'termino_arriendo'); ?>
		<?php echo $form->textField($model,'termino_arriendo'); ?>
		<?php echo $form->error($model,'termino_arriendo'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'valor_arriendo'); ?>
		<?php echo $form->textField($model,'valor_arriendo'); ?>
		<?php echo $form->error($model,'valor_arriendo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
