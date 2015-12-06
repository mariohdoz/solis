<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ordentrabajo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Seleccione el funcionario</h3>
		</div>
		<div class="form">
			<div class="box-body">
				<div class="col-xs-6">
					<div class="form-group">
						<?php echo $form->labelEx($model,'rut_funcionario'); ?>
						<?php echo $form->textField($model,'rut_funcionario',array('size'=>10,'maxlength'=>10, 'class'=>'form-control', 'placeholder'=>'Ingrese el RUT del arrendatario o seleccione uno.', 'required'=>'required')); ?>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<?php echo $form->label($funcionario,'cargo_funcionario'); ?>
						<?php echo $form->textField($funcionario,'cargo_funcionario', array('class'=>'form-control', 'disabled'=>'true')); ?>
						<?php echo $form->error($funcionario,'cargo_funcionario'); ?>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<?php echo $form->label($funcionario,'nombres_funcionario'); ?>
						<?php echo $form->textField($funcionario,'nombres_funcionario', array('class'=>'form-control', 'disabled'=>'true')); ?>
						<?php echo $form->error($funcionario,'nombres_funcionario'); ?>
					</div>
				</div>
				<div class="col-xs-6">
					<?php echo $form->label($funcionario,'apellidos_funcionario'); ?>
					<?php echo $form->textField($funcionario,'apellidos_funcionario', array('class'=>'form-control', 'disabled'=>'true')); ?>
					<?php echo $form->error($funcionario,'apellidos_funcionario'); ?>
				</div>
			</div>
			<div class="box-footer">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#funcionario">Cargar arrendatario</button>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Datos de la orden de trabajo</h3>
		</div>
		<div class="form">
			<div class="box-body">
				<div class="col-xs-12">
					<div class="form-group">
						<?php echo $form->errorSummary($model); ?>
					</div>
				</div>

				<div class="<?php echo $model->isNewRecord? 'col-lg-4 col-md-6 col-xs-12':'col-lg-3 col-md-6 col-xs-12'; ?>">
					<div class="form-group">
						<?php echo $form->labelEx($model,'fechaemision_ot'); ?>
						<?php echo $form->dateField($model,'fechaemision_ot', array('class'=>'form-control', 'required'=>'required', 'disabled'=>'true')); ?>
					</div>
				</div>
				<div class="<?php echo $model->isNewRecord? 'col-lg-4 col-md-6 col-xs-12':'col-lg-3 col-md-6 col-xs-12'; ?>">
					<div class="form-group">
						<?php echo $form->labelEx($model,'inicio_ot'); ?>
						<?php echo $form->dateField($model,'inicio_ot', array('class'=>'form-control', 'required'=>'required')); ?>
					</div>
				</div>
				<div class="<?php echo $model->isNewRecord? 'col-lg-4 col-md-6 col-xs-12':'col-lg-3 col-md-6 col-xs-12'; ?>">
					<div class="form-group">
						<?php echo $form->labelEx($model,'fechaejecucion_ot'); ?>
						<?php echo $form->dateField($model,'fechaejecucion_ot', array('class'=>'form-control', 'required'=>'required')); ?>
					</div>
				</div>
				<?php if(!$model->isNewRecord):?>
				<div class="<?php echo $model->isNewRecord? 'col-lg-4 col-md-6 col-xs-12':'col-lg-3 col-md-6 col-xs-12'; ?>">
					<div class="form-group">
						<?php echo $form->labelEx($model,'estado_ot'); ?>
						<?php echo $form->dropDownList($model,'formapago_ot',
							array(
								'1' => 'Pendiente',
								'0' => 'Terminado',
							),
							array("class"=>"form-control"))?>

					</div>
				</div>
			<?php endif; ?>
				<div class="col-lg-4 col-md-6 col-xs-12">
					<div class="form-group">
						<?php echo $form->labelEx($model,'servicio_ot'); ?>
						<?php echo $form->dropDownList($model,'servicio_ot',
							array(
								'Inspección' => 'Inspección',
								'Inventariado' => 'Inventariado',
								'Tasación' => 'Tasación',
								'Estudio de título' => 'Estudio de título',
								'Ampliaciones menores' => 'Ampliaciones menores',
								'Aseo de propiedad' => 'Aseo de propiedad',
							),
							array("class"=>"form-control"))?>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-xs-12">
					<div class="form-group">
						<?php echo $form->labelEx($model,'totalpagar_ot'); ?>
						<?php echo $form->textField($model,'totalpagar_ot', array('class'=>'form-control', 'required'=>'required')); ?>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-xs-12">
					<div class="form-group">
						<?php echo $form->labelEx($model,'formapago_ot'); ?>
						<?php echo $form->dropDownList($model,'formapago_ot',
							array(
								'Efectivo' => 'Efectivo',
								'Cheque' => 'Cheque',
								'Transferencia' => 'Transferencia',
								'Depósito' => 'Depósito',
							),
							array("class"=>"form-control"))?>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 col-xs-12">
					<div class="form-group">
						<?php echo $form->labelEx($model,'descripcion_ot'); ?>
						<?php echo $form->textArea($model,'descripcion_ot',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 col-xs-12">
					<div class="form-group">
						<?php echo $form->labelEx($model,'observacion_ot'); ?>
						<?php echo $form->textArea($model,'observacion_ot',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
					</div>
				</div>
			</div>
			<div class="box-footer">
					<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar orden de trabajo' : 'Actualizar orden de trabajo',array('class'=>'btn btn-primary' , 'tabindex'=>5)); ?>
			</div>
		</div>
	</div>
</div>


<?php $this->endWidget(); ?>
