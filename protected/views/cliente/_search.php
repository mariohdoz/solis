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
		<?php echo $form->label($model,'RUTCLIENTE'); ?>
		<?php echo $form->textField($model,'RUTCLIENTE',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRESCLIENTE'); ?>
		<?php echo $form->textField($model,'NOMBRESCLIENTE',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'APELLIDOSCLIENTE'); ?>
		<?php echo $form->textField($model,'APELLIDOSCLIENTE',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TELEFONOCLIENTE'); ?>
		<?php echo $form->textField($model,'TELEFONOCLIENTE',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DIRECCIONCLIENTE'); ?>
		<?php echo $form->textField($model,'DIRECCIONCLIENTE',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CORREOCLIENTE'); ?>
		<?php echo $form->textField($model,'CORREOCLIENTE',array('size'=>60,'maxlength'=>75)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->