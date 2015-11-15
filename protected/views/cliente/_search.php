<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'rut_cliente'); ?>
		<?php echo $form->textField($model,'rut_cliente',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombres_cliente'); ?>
		<?php echo $form->textField($model,'nombres_cliente',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apellidos_cliente'); ?>
		<?php echo $form->textField($model,'apellidos_cliente',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estadocivil_cliente'); ?>
		<?php echo $form->textField($model,'estadocivil_cliente',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profesion_cliente'); ?>
		<?php echo $form->textField($model,'profesion_cliente',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'domicilio_cliente'); ?>
		<?php echo $form->textField($model,'domicilio_cliente',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'correo_cliente'); ?>
		<?php echo $form->textField($model,'correo_cliente',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefonofijo_cliente'); ?>
		<?php echo $form->textField($model,'telefonofijo_cliente',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefonocelular_cliente'); ?>
		<?php echo $form->textField($model,'telefonocelular_cliente',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nrocuenta_cliente'); ?>
		<?php echo $form->textField($model,'nrocuenta_cliente',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'banco_cliente'); ?>
		<?php echo $form->textField($model,'banco_cliente',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipocuenta_cliente'); ?>
		<?php echo $form->textField($model,'tipocuenta_cliente',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activo_cliente'); ?>
		<?php echo $form->textField($model,'activo_cliente'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->