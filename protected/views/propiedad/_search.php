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
		<?php echo $form->label($model,'IDPROP'); ?>
		<?php echo $form->textField($model,'IDPROP'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RUTCLIENTE'); ?>
		<?php echo $form->textField($model,'RUTCLIENTE',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DIRECCION'); ?>
		<?php echo $form->textField($model,'DIRECCION',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CANTPIEZA'); ?>
		<?php echo $form->textField($model,'CANTPIEZA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CANTBANO'); ?>
		<?php echo $form->textField($model,'CANTBANO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TERRENO'); ?>
		<?php echo $form->textField($model,'TERRENO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TERRENOCONSTRUIDO'); ?>
		<?php echo $form->textField($model,'TERRENOCONSTRUIDO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIPO'); ?>
		<?php echo $form->textField($model,'TIPO',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SERVICIO'); ?>
		<?php echo $form->textField($model,'SERVICIO',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESTADO'); ?>
		<?php echo $form->textField($model,'ESTADO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DESCRIPCION'); ?>
		<?php echo $form->textField($model,'DESCRIPCION',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COMUNAPROPIEDAD'); ?>
		<?php echo $form->textField($model,'COMUNAPROPIEDAD',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->