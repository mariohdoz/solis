<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cliente-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>false),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'RUTCLIENTE'); ?>
		<?php echo $form->textField($model,'RUTCLIENTE',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'RUTCLIENTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NOMBRESCLIENTE'); ?>
		<?php echo $form->textField($model,'NOMBRESCLIENTE',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'NOMBRESCLIENTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'APELLIDOSCLIENTE'); ?>
		<?php echo $form->textField($model,'APELLIDOSCLIENTE',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'APELLIDOSCLIENTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TELEFONOCLIENTE'); ?>
		<?php echo $form->textField($model,'TELEFONOCLIENTE',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'TELEFONOCLIENTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DIRECCIONCLIENTE'); ?>
		<?php echo $form->textField($model,'DIRECCIONCLIENTE',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'DIRECCIONCLIENTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correo_cliente'); ?>
		<?php echo $form->textField($model,'correo_cliente',array('size'=>60,'maxlength'=>100)); ?> ?>
		<?php echo $form->error($model,'correo_cliente');  ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'estadoCivil_cliente'); ?>
			<?php echo $form->textField($model,'estadoCivil_cliente',array('size'=>8,'maxlength'=>8)); ?>
			<?php echo $form->error($model,'estadoCivil_cliente'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'profesion_cliente'); ?>
		<?php echo $form->textField($model,'profesion_cliente'); ?>
		<?php echo $form->error($model,'profesion_cliente'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'telefonoCelular_cliente'); ?>
		<?php echo $form->textField($model,'telefonoCelular_cliente',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'telefonoCelular_cliente'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'nroCuenta_cliente'); ?>
		<?php echo $form->textField($model,'nroCuenta_cliente',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'nroCuenta_cliente'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'banco_cliente'); ?>
		<?php echo $form->textField($model,'banco_cliente',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'banco_cliente'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
