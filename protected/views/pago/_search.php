<?php
/* @var $this PagoController */
/* @var $model Pago */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_pago'); ?>
		<?php echo $form->textField($model,'id_pago'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_arriendo'); ?>
		<?php echo $form->textField($model,'id_arriendo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_pago'); ?>
		<?php echo $form->textField($model,'fecha_pago'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mes_pago'); ?>
		<?php echo $form->textField($model,'mes_pago'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'totalpagar_pago'); ?>
		<?php echo $form->textField($model,'totalpagar_pago'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'totalpagado_pago'); ?>
		<?php echo $form->textField($model,'totalpagado_pago'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->