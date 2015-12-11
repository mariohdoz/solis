<?php
/* @var $this SolicitudController */
/* @var $solicitud Solicitud */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'solicitud-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Datos de la Solicitud  <?php echo $solicitud->isNewRecord? '': '<small>fecha de solicitud: '.date("d/m/Y", strtotime($solicitud->fecha_solicitud)) .'</small>'; ?></h3>
		</div>
		<div class="form">
			<div class="box-body">
				<div class="col-xs-12">
					<div class="form-group">
						<?php if($solicitud->rut_cliente!=''): ?>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'rut_cliente'); ?>
								<?php echo $form->textField( $solicitud, 'rut_cliente' , array('class'=>'form-control'  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $cliente, 'nombres_cliente'); ?>
								<?php echo $form->textField( $cliente, 'nombres_cliente' , array('class'=>'form-control'  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $cliente, 'apellidos_cliente'); ?>
								<?php echo $form->textField( $cliente, 'apellidos_cliente' , array('class'=>'form-control'  )); ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if($solicitud->rut_funcionario!=''): ?>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'rut_funcionario'); ?>
								<?php echo $form->textField( $solicitud, 'rut_funcionario' , array('class'=>'form-control'  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $funcionario, 'nombres_funcionario'); ?>
								<?php echo $form->textField( $funcionario, 'nombres_funcionario' , array('class'=>'form-control'  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $funcionario, 'apellidos_funcionario'); ?>
								<?php echo $form->textField( $funcionario, 'apellidos_funcionario' , array('class'=>'form-control'  )); ?>
							</div>
						</div>
					<?php endif; ?>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'nombres_solicitud'); ?>
								<?php echo $form->textField( $solicitud, 'nombres_solicitud' , array('class'=>'form-control'  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'apellidos_solicitud'); ?>
								<?php echo $form->textField( $solicitud, 'apellidos_solicitud' , array('class'=>'form-control'  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'telefono_solicitud'); ?>
								<?php echo $form->textField( $solicitud, 'telefono_solicitud' , array('class'=>'form-control'  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'correo_solicitud'); ?>
								<?php echo $form->textField( $solicitud, 'correo_solicitud' , array('class'=>'form-control'  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'servicio_solicitud'); ?>
								<?php echo $form->dropDownList($solicitud,'servicio_solicitud',
									array(
										'Venta' => 'Venta',
										'Arriendo' => 'Arriendo',
										'Tasación' => 'Tasación',
										'Estudio de título' => 'Estudio de título',
										'Ampliaciones menores' => 'Ampliaciones menores',
										'Aseo de propiedad' => 'Aseo de propiedad',
									),
									array("class"=>"form-control "),
									array('empty' => '(Seleccione tipo de servicio)')); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'fecha_solicitud'); ?>
								<?php echo $form->dateField( $solicitud, 'fecha_solicitud' , array('class'=>'form-control'  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'fechaejecucion_solicitud'); ?>
								<?php echo $form->dateField( $solicitud, 'fechaejecucion_solicitud' , array('class'=>'form-control','required'=>'required')); ?>
							</div>
						</div>
						<?php if (!$solicitud->isNewRecord): ?>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'estado_solicitud'); ?>
								<?php echo $form->dropDownList($solicitud,'estado_solicitud',
										array(
												'1' => 'Pendiente',
												'0' => 'Realizada',
										),
										array("class"=>"form-control select2")); ?>
							</div>
						</div>
					<?php endif ?>
						<div class="col-lg-12 col-md-12 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'descripcion_solicitud'); ?>
								<?php echo $form->textArea( $solicitud, 'descripcion_solicitud' , array('rows' => 4,'class'=>'form-control'  )); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<?php echo CHtml::submitButton($solicitud->isNewRecord ? 'Registrar solicitud' : 'Actualizar solicitud', array('class'=>'btn btn-primary' , 'tabindex'=>5)); ?>
			</div>
		</div>
	</div>
</div>



<?php $this->endWidget(); ?>
