<?php
/* @var $this ArriendoController */
/* @var $model Arriendo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_arriendo'); ?>
		<?php echo $form->textField($model,'id_arriendo'); ?>
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
		<?php echo $form->label($model,'rut_arrendatario'); ?>
		<?php echo $form->textField($model,'rut_arrendatario',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inscripcion_arriendo'); ?>
		<?php echo $form->textField($model,'inscripcion_arriendo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechapago_arriendo'); ?>
		<?php echo $form->textField($model,'fechapago_arriendo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inicio_arriendo'); ?>
		<?php echo $form->textField($model,'inicio_arriendo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'termino_arriendo'); ?>
		<?php echo $form->textField($model,'termino_arriendo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valor_arriendo'); ?>
		<?php echo $form->textField($model,'valor_arriendo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->