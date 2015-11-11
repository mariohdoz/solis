<?php
/* @var $this PropiedadController */
/* @var $model Propiedad */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_propiedad'); ?>
		<?php echo $form->textField($model,'id_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rut_cliente'); ?>
		<?php echo $form->textField($model,'rut_cliente',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'direccion_propiedad'); ?>
		<?php echo $form->textField($model,'direccion_propiedad',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero_propiedad'); ?>
		<?php echo $form->textField($model,'numero_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'habitacion_propiedad'); ?>
		<?php echo $form->textField($model,'habitacion_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bano_propiedad'); ?>
		<?php echo $form->textField($model,'bano_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'terreno_propiedad'); ?>
		<?php echo $form->textField($model,'terreno_propiedad',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'construido_propiedad'); ?>
		<?php echo $form->textField($model,'construido_propiedad',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_propiedad'); ?>
		<?php echo $form->textField($model,'tipo_propiedad',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'servicio_propiedad'); ?>
		<?php echo $form->textField($model,'servicio_propiedad',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado_propiedad'); ?>
		<?php echo $form->textField($model,'estado_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_propiedad'); ?>
		<?php echo $form->textArea($model,'descripcion_propiedad',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comuna_propiedad'); ?>
		<?php echo $form->textField($model,'comuna_propiedad',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amoblado_propiedad'); ?>
		<?php echo $form->textField($model,'amoblado_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valor_propiedad'); ?>
		<?php echo $form->textField($model,'valor_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activo_propiedad'); ?>
		<?php echo $form->textField($model,'activo_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eliminado_propiedad'); ?>
		<?php echo $form->textField($model,'eliminado_propiedad'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->