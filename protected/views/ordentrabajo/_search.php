<?php
/* @var $this OrdentrabajoController */
/* @var $model Ordentrabajo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_ot'); ?>
		<?php echo $form->textField($model,'id_ot'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rut_admin'); ?>
		<?php echo $form->textField($model,'rut_admin',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_ot'); ?>
		<?php echo $form->textArea($model,'descripcion_ot',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaemision_ot'); ?>
		<?php echo $form->textField($model,'fechaemision_ot'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaejecucion_ot'); ?>
		<?php echo $form->textField($model,'fechaejecucion_ot'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado_ot'); ?>
		<?php echo $form->textField($model,'estado_ot'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inicio_ot'); ?>
		<?php echo $form->textField($model,'inicio_ot'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'servicio_ot'); ?>
		<?php echo $form->textField($model,'servicio_ot',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observacion_ot'); ?>
		<?php echo $form->textArea($model,'observacion_ot',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'totalpagar_ot'); ?>
		<?php echo $form->textField($model,'totalpagar_ot'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'formapago_ot'); ?>
		<?php echo $form->textField($model,'formapago_ot'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->