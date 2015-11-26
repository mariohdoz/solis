<?php
/* @var $this AdministradorController */
/* @var $model Administrador */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'rut_admin'); ?>
		<?php echo $form->textField($model,'rut_admin',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombres_admin'); ?>
		<?php echo $form->textField($model,'nombres_admin',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apellidos_admin'); ?>
		<?php echo $form->textField($model,'apellidos_admin',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contrasena_admin'); ?>
		<?php echo $form->textField($model,'contrasena_admin',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'correo_admin'); ?>
		<?php echo $form->textField($model,'correo_admin',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono_admin'); ?>
		<?php echo $form->textField($model,'telefono_admin',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'perfil_admin'); ?>
		<?php echo $form->textField($model,'perfil_admin',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'super_admin'); ?>
		<?php echo $form->textField($model,'super_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activo_admin'); ?>
		<?php echo $form->textField($model,'activo_admin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->