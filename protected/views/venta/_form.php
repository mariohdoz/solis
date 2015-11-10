<?php
/* @var $this VentaController */
/* @var $model Venta */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'venta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Selección de la propiedad.</h3>
					</div><!-- /.box-header -->
					<div class="form">
						<div class="box-body">
							<div class="col-xs-6">
								<div class="form-group">
									<?php echo $form->labelEx($model,'id_propiedad'); ?>
									<?php echo $form->textField($model,'id_propiedad',array('class'=>'form-control', 'placeholder'=>'Ingrese el número de ficha de la propiedad o seleccione una.')); ?>
									<?php echo $form->error($model,'id_propiedad'); ?>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<?php echo $form->labelEx($model3,'rut_cliente'); ?>
									<?php echo $form->textField($model3,'rut_cliente',array('class'=>'form-control','disabled'=>'true', 'placeholder'=>'RUT del propietario.')); ?>
									<?php echo $form->error($model3,'rut_cliente'); ?>
								</div>
							</div>
							<div class="col-xs-8">
								<div class="form-group">
									<?php echo $form->label($model3,'direccion_propiedad'); ?>
									<?php echo $form->textField($model3,'direccion_propiedad', array('class'=>'form-control', 'disabled'=>'true')); ?>
									<?php echo $form->error($model3,'direccion_propiedad'); ?>
								</div>
							</div>
							<div class="col-xs-4">
								<?php echo $form->label($model3,'valor_propiedad'); ?>
								<?php echo $form->textField($model3,'valor_propiedad', array('class'=>'form-control', 'disabled'=>'true', 'onchange'=>"applyFormatCurrency(document.getElementById('Propiedad_valor_propiedad'));"));?>
								<?php echo $form->error($model3,'valor_propiedad'); ?>
							</div>
						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#propiedad">Cargar propiedad</button>
						</div>
					</div>
				</div>
			</div>
<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Título</h3>
		</div>
		<div class="form">
			<div class="box-body">

				<h1>Create Venta</h1>

				<p class="note">Fields with <span class="required">*</span> are required.</p>

				<?php echo $form->errorSummary($model); ?>

				<div class="row">
					<?php echo $form->labelEx($model,'id_propiedad'); ?>
					<?php echo $form->textField($model,'id_propiedad'); ?>
					<?php echo $form->error($model,'id_propiedad'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'rut_admin'); ?>
					<?php echo $form->textField($model,'rut_admin',array('size'=>10,'maxlength'=>10)); ?>
					<?php echo $form->error($model,'rut_admin'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'nombrescomprador_venta'); ?>
					<?php echo $form->textField($model,'nombrescomprador_venta',array('size'=>60,'maxlength'=>100)); ?>
					<?php echo $form->error($model,'nombrescomprador_venta'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'apellidoscomprador_venta'); ?>
					<?php echo $form->textField($model,'apellidoscomprador_venta',array('size'=>60,'maxlength'=>100)); ?>
					<?php echo $form->error($model,'apellidoscomprador_venta'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'rutcomprador_venta'); ?>
					<?php echo $form->textField($model,'rutcomprador_venta',array('size'=>10,'maxlength'=>10)); ?>
					<?php echo $form->error($model,'rutcomprador_venta'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'comisioncomprador_venta'); ?>
					<?php echo $form->textField($model,'comisioncomprador_venta'); ?>
					<?php echo $form->error($model,'comisioncomprador_venta'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'comisioncliente_venta'); ?>
					<?php echo $form->textField($model,'comisioncliente_venta'); ?>
					<?php echo $form->error($model,'comisioncliente_venta'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'ganancia_venta'); ?>
					<?php echo $form->textField($model,'ganancia_venta',array('size'=>50,'maxlength'=>50)); ?>
					<?php echo $form->error($model,'ganancia_venta'); ?>
				</div>

				<div class="row buttons">
					<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
				</div>

			<?php $this->endWidget(); ?>

			</div>
			<div class="box-footer">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#arrendatario">Boton</button>
			</div>
		</div>
	</div>
</div>
