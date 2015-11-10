<?php
/* @var $this VentaController */
/* @var $model Venta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_venta'); ?>
		<?php echo $form->textField($model,'id_venta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_propiedad'); ?>
		<?php echo $form->textField($model,'id_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rut_admin'); ?>
		<?php echo $form->textField($model,'rut_admin',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombrescomprador_venta'); ?>
		<?php echo $form->textField($model,'nombrescomprador_venta',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apellidoscomprador_venta'); ?>
		<?php echo $form->textField($model,'apellidoscomprador_venta',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rutcomprador_venta'); ?>
		<?php echo $form->textField($model,'rutcomprador_venta',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comisioncomprador_venta'); ?>
		<?php echo $form->textField($model,'comisioncomprador_venta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comisioncliente_venta'); ?>
		<?php echo $form->textField($model,'comisioncliente_venta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ganancia_venta'); ?>
		<?php echo $form->textField($model,'ganancia_venta',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->