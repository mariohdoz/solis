<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'arrendatario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Datos del arrendatario</h3>
		</div>
		<div class="form">
			<div class="col-md-12">
				<?php echo $form->errorSummary($model,'<strong>Es necesario arreglar los siguientes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="alert alert-danger">', '</div>'); ?>
			</div>
			<div class="box-body">
				<div class="col-xs-12 col-md-6 col-lg-4">
					 <div class="form-group">
						<?php echo $form->labelEx($model,'rut_arrendatario'); ?>
						<?php echo $form->textField($model,'rut_arrendatario', array("class"=>"form-control select2", $model->isNewRecord ? '' : 'disabled'=>true, 'placeholder'=>'Ejemplo: 12345678-9')); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="form-group">
						<?php echo $form->labelEx($model,'nombres_arrendatario'); ?>
						<?php echo $form->textField($model,'nombres_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Ingrese los nombres del arrendatario')); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="form-group">
						<?php echo $form->labelEx($model,'apellidos_arrendatario'); ?>
						<?php echo $form->textField($model,'apellidos_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Ingrese los apellidos del arrendatario')); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="form-group">
						<?php echo $form->labelEx($model,'estadocivil_arrendatario') ?>
						<?php echo $form->dropDownList($model,'estadocivil_arrendatario',array(
							'Soltero/a'=>'Soltero/a',
							'Casado/a'=>'Casado/a',
							'Viudo/a'=>'Viudo/a',
						),
						array("class"=>"form-control select2")) ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="form-group">
						<?php echo $form->labelEx($model,'profesion_arrendatario'); ?>
						<?php echo $form->textField($model,'profesion_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Profesión del arrendatario')); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="form-group">
						<?php echo $form->labelEx($model,'correo_arrendatario'); ?>
						<?php echo $form->emailField($model,'correo_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Correo del arrendatario')); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="form-group">
						<?php echo $form->labelEx($model,'telefonofijo_arrendatario'); ?>
						<?php echo $form->textField($model,'telefonofijo_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Ejemplo +5655123456 ')); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="form-group">
						<?php echo $form->labelEx($model,'telefonocelular_arrendatario'); ?>
						<?php echo $form->textField($model,'telefonocelular_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Ejemplo +56912345678')); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="form-group">
						<?php echo $form->labelEx($model,'nrocuenta_arrendatario'); ?>
				    <?php echo $form->textField($model,'nrocuenta_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Número de cuenta')); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="form-group">
						<?php echo $form->labelEx($model,'banco_arrendatario'); ?>
						<?php echo $form->textField($model,'banco_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Banco del arrendatario')); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="form-group">
						<?php echo $form->labelEx($model,'nacionalidad_arrendatario'); ?>
						<?php echo $form->textField($model,'nacionalidad_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Nacionalidad')); ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="form-group">
						<?php echo $form->labelEx($model,'empresa_arrendatario'); ?><br>
						<?php echo $form->checkBox($model,'empresa_arrendatario'); ?>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar arrendatario' : 'Actualizar arrendatario', array('class'=>'btn btn-primary', 'placeholder'=>'')); ?>
			</div>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>
