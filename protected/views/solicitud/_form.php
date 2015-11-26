<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'solicitud-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
    'clientOptions'=>array(
      'validateOnSubmit'=>true,
     ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rut_cliente'); ?>
		<?php echo $form->textField($model,'rut_cliente',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rut_cliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rut_funcionario'); ?>
		<?php echo $form->textField($model,'rut_funcionario',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rut_funcionario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombres_solicitud'); ?>
		<?php echo $form->textField($model,'nombres_solicitud',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombres_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellidos_solicitud'); ?>
		<?php echo $form->textField($model,'apellidos_solicitud',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'apellidos_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'servicio_solicitud'); ?>
		<?php echo $form->textField($model,'servicio_solicitud',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'servicio_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_solicitud'); ?>
		<?php echo $form->textField($model,'fecha_solicitud'); ?>
		<?php echo $form->error($model,'fecha_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaejecucion_solicitud'); ?>
		<?php echo $form->textField($model,'fechaejecucion_solicitud'); ?>
		<?php echo $form->error($model,'fechaejecucion_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono_solicitud'); ?>
		<?php echo $form->textField($model,'telefono_solicitud',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'telefono_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_solicitud'); ?>
		<?php echo $form->textField($model,'estado_solicitud'); ?>
		<?php echo $form->error($model,'estado_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_solicitud'); ?>
		<?php echo $form->textArea($model,'descripcion_solicitud',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipopropiedad_solicitud'); ?>
		<?php echo $form->textField($model,'tipopropiedad_solicitud',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tipopropiedad_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correo_solicitud'); ?>
		<?php echo $form->textField($model,'correo_solicitud',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'correo_solicitud'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Enviar', array('class' =>'btn btn-buscar' , )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
