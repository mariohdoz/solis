<?php
/* @var $this ArrendatarioController */
/* @var $model Arrendatario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'arrendatario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rut_arrendatario'); ?>
		<?php echo $form->textField($model,'rut_arrendatario',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rut_arrendatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombres_arrendatario'); ?>
		<?php echo $form->textField($model,'nombres_arrendatario',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombres_arrendatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellidos_arrendatario'); ?>
		<?php echo $form->textField($model,'apellidos_arrendatario',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'apellidos_arrendatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadocivil_arrendatario'); ?>
		<?php echo $form->textField($model,'estadocivil_arrendatario',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'estadocivil_arrendatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profesion_arrendatario'); ?>
		<?php echo $form->textField($model,'profesion_arrendatario',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'profesion_arrendatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correo_arrendatario'); ?>
		<?php echo $form->textField($model,'correo_arrendatario',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'correo_arrendatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefonofijo_arrendatario'); ?>
		<?php echo $form->textField($model,'telefonofijo_arrendatario',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'telefonofijo_arrendatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefonocelular_arrendatario'); ?>
		<?php echo $form->textField($model,'telefonocelular_arrendatario',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'telefonocelular_arrendatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nrocuenta_arrendatario'); ?>
		<?php echo $form->textField($model,'nrocuenta_arrendatario',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'nrocuenta_arrendatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'banco_arrendatario'); ?>
		<?php echo $form->textField($model,'banco_arrendatario',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'banco_arrendatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nacionalidad_arrendatario'); ?>
		<?php echo $form->textField($model,'nacionalidad_arrendatario',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nacionalidad_arrendatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'empresa_arrendatario'); ?>
		<?php echo $form->textField($model,'empresa_arrendatario'); ?>
		<?php echo $form->error($model,'empresa_arrendatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo_arrendatario'); ?>
		<?php echo $form->textField($model,'activo_arrendatario'); ?>
		<?php echo $form->error($model,'activo_arrendatario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->