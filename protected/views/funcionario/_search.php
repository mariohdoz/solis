<?php
/* @var $this FuncionarioController */
/* @var $model Funcionario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'rut_funcionario'); ?>
		<?php echo $form->textField($model,'rut_funcionario',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombres_funcionario'); ?>
		<?php echo $form->textField($model,'nombres_funcionario',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apellidos_funcionario'); ?>
		<?php echo $form->textField($model,'apellidos_funcionario',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefonofijo_funcionario'); ?>
		<?php echo $form->textField($model,'telefonofijo_funcionario',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefonocelular_funcionario'); ?>
		<?php echo $form->textField($model,'telefonocelular_funcionario',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'domicilio_funcionario'); ?>
		<?php echo $form->textField($model,'domicilio_funcionario',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'correo_funcionario'); ?>
		<?php echo $form->textField($model,'correo_funcionario',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->