<?php
/* @var $this AdministradorController */
/* @var $model Administrador */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'administrador-form',
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
		<?php echo $form->labelEx($model,'nombres_admin'); ?>
		<?php echo $form->textField($model,'nombres_admin',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombres_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellidos_admin'); ?>
		<?php echo $form->textField($model,'apellidos_admin',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'apellidos_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contrasena_admin'); ?>
		<?php echo $form->textField($model,'contrasena_admin',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'contrasena_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correo_admin'); ?>
		<?php echo $form->textField($model,'correo_admin',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'correo_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono_admin'); ?>
		<?php echo $form->textField($model,'telefono_admin',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'telefono_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'perfil_admin'); ?>
		<?php echo $form->textField($model,'perfil_admin',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'perfil_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'super_admin'); ?>
		<?php echo $form->textField($model,'super_admin'); ?>
		<?php echo $form->error($model,'super_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo_admin'); ?>
		<?php echo $form->textField($model,'activo_admin'); ?>
		<?php echo $form->error($model,'activo_admin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->