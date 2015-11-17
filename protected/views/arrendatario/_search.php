<?php
/* @var $this ArrendatarioController */
/* @var $model Arrendatario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'rut_arrendatario'); ?>
		<?php echo $form->textField($model,'rut_arrendatario',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombres_arrendatario'); ?>
		<?php echo $form->textField($model,'nombres_arrendatario',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apellidos_arrendatario'); ?>
		<?php echo $form->textField($model,'apellidos_arrendatario',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estadocivil_arrendatario'); ?>
		<?php echo $form->textField($model,'estadocivil_arrendatario',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profesion_arrendatario'); ?>
		<?php echo $form->textField($model,'profesion_arrendatario',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'correo_arrendatario'); ?>
		<?php echo $form->textField($model,'correo_arrendatario',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefonofijo_arrendatario'); ?>
		<?php echo $form->textField($model,'telefonofijo_arrendatario',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefonocelular_arrendatario'); ?>
		<?php echo $form->textField($model,'telefonocelular_arrendatario',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nrocuenta_arrendatario'); ?>
		<?php echo $form->textField($model,'nrocuenta_arrendatario',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'banco_arrendatario'); ?>
		<?php echo $form->textField($model,'banco_arrendatario',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nacionalidad_arrendatario'); ?>
		<?php echo $form->textField($model,'nacionalidad_arrendatario',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'empresa_arrendatario'); ?>
		<?php echo $form->textField($model,'empresa_arrendatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activo_arrendatario'); ?>
		<?php echo $form->textField($model,'activo_arrendatario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->