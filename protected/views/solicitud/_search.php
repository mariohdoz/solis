<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_solicitud'); ?>
		<?php echo $form->textField($model,'id_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rut_cliente'); ?>
		<?php echo $form->textField($model,'rut_cliente',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rut_funcionario'); ?>
		<?php echo $form->textField($model,'rut_funcionario',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombres_solicitud'); ?>
		<?php echo $form->textField($model,'nombres_solicitud',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apellidos_solicitud'); ?>
		<?php echo $form->textField($model,'apellidos_solicitud',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'servicio_solicitud'); ?>
		<?php echo $form->textField($model,'servicio_solicitud',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_solicitud'); ?>
		<?php echo $form->textField($model,'fecha_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaejecucion_solicitud'); ?>
		<?php echo $form->textField($model,'fechaejecucion_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono_solicitud'); ?>
		<?php echo $form->textField($model,'telefono_solicitud',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado_solicitud'); ?>
		<?php echo $form->textField($model,'estado_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_solicitud'); ?>
		<?php echo $form->textArea($model,'descripcion_solicitud',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipopropiedad_solicitud'); ?>
		<?php echo $form->textField($model,'tipopropiedad_solicitud',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'correo_solicitud'); ?>
		<?php echo $form->textField($model,'correo_solicitud',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->