<?php
/* @var $this FuncionarioController */
/* @var $model Funcionario */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'funcionario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Datos del funcionario</h3>
		</div>
		<div class="form">
			<div class="col-md-12">
				<?php echo $form->errorSummary($model,'<strong>Es necesario arreglar los siguientes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="alert alert-danger">', '</div>'); ?>
			</div>
			<div class="box-body">
				<div class="col-xs-12 col-md-6 col-lg-4">
					 <div class="form-group">
						<?php echo $form->labelEx($model,'rut_funcionario'); ?>
						<?php echo $form->textField($model,'rut_funcionario', array("class"=>"form-control select2", $model->isNewRecord ? '' : 'disabled'=>true, 'placeholder'=>'Ejemplo: 12345678-9')); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="form-group">
						<?php echo $form->labelEx($model,'nombres_funcionario'); ?>
						<?php echo $form->textField($model,'nombres_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Ingrese los nombres del funcionario')); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="form-group">
						<?php echo $form->labelEx($model,'apellidos_funcionario'); ?>
						<?php echo $form->textField($model,'apellidos_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Ingrese los apellidos del funcionario')); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
				 <div class="form-group">
					 <?php echo $form->labelEx($model,'telefonofijo_funcionario'); ?>
					 <?php echo $form->textField($model,'telefonofijo_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Ejemplo +5655123456 ')); ?>
				 </div>
			 </div>
			 <div class="col-xs-12 col-md-6 col-lg-4">
				 <div class="form-group">
					 <?php echo $form->labelEx($model,'telefonocelular_funcionario'); ?>
					 <?php echo $form->textField($model,'telefonocelular_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Ejemplo +56912345678')); ?>
				 </div>
			 </div>
			 <div class="col-xs-12 col-md-6 col-lg-4">
				 <div class="form-group">
					 <?php echo $form->labelEx($model,'domicilio_funcionario'); ?>
					<?php echo $form->textField($model,'domicilio_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Dirección del domicilio')); ?>
				 </div>
			 </div>
			 <div class="col-xs-12 col-md-6 col-lg-4">
				 <div class="form-group">
				 	<?php echo $form->labelEx($model,'correo_funcionario'); ?>
			 		<?php echo $form->textField($model,'correo_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Correo del funcionario')); ?>
				 </div>
			 </div>
			 <?php if($model->isNewRecord): ?>
			 <div class="col-xs-12 col-md-6 col-lg-4">
				 <div class="form-group">
				 	<?php echo $form->labelEx($model,'contrasena_funcionario'); ?>
			 		<?php echo $form->passwordField($model,'contrasena_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Constraseña del funcionario', $model->isNewRecord ? '' : 'disabled'=>true,)); ?>
				 </div>
			 </div>
			 <div class="col-xs-12 col-md-6 col-lg-4">
				 <div class="form-group" id="box">
				 	<?php echo $form->labelEx($model,'repeat_pass'); ?>
			 		<?php echo $form->passwordField($model,'repeat_pass',array('class'=>'form-control select2', 'placeholder'=>'Repetir contraseña', $model->isNewRecord ? '' : 'disabled'=>true, )); ?>
				 </div>
			 </div>
			 <?php endIf; ?>
			</div>
			<div class="box-footer">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar funcionario' : 'Actualizar funcionario', array('class'=>'btn btn-primary', 'placeholder'=>'')); ?>
			</div>
		</div>
	</div>
</div>


<?php $this->endWidget(); ?>
