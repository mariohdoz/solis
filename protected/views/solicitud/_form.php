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
	'enableAjaxValidation'=>false,
)); ?>

<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Datos de la Solicitud</h3>
		</div>
		<div class="form">
			<div class="box-body">
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="form-group">
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'rut_cliente'); ?>
								<?php echo $form->textField( $solicitud, 'rut_cliente' , array('class'=>'form-control','disabled' => true  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $cliente, 'nombres_cliente'); ?>
								<?php echo $form->textField( $cliente, 'nombres_cliente' , array('class'=>'form-control','disabled' => true  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $cliente, 'apellidos_cliente'); ?>
								<?php echo $form->textField( $cliente, 'apellidos_cliente' , array('class'=>'form-control','disabled' => true  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'rut_funcionario'); ?>
								<?php echo $form->textField( $solicitud, 'rut_funcionario' , array('class'=>'form-control','disabled' => true  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $funcionario, 'nombres_funcionario'); ?>
								<?php echo $form->textField( $funcionario, 'nombres_funcionario' , array('class'=>'form-control','disabled' => true  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $funcionario, 'apellidos_funcionario'); ?>
								<?php echo $form->textField( $funcionario, 'apellidos_funcionario' , array('class'=>'form-control','disabled' => true  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'nombres_solicitud'); ?>
								<?php echo $form->textField( $solicitud, 'nombres_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'apellidos_solicitud'); ?>
								<?php echo $form->textField( $solicitud, 'apellidos_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'telefono_solicitud'); ?>
								<?php echo $form->textField( $solicitud, 'telefono_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'correo_solicitud'); ?>
								<?php echo $form->textField( $solicitud, 'correo_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'servicio_solicitud'); ?>
								<?php echo $form->textField( $solicitud, 'servicio_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
							</div>
						</div>

						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'fecha_solicitud'); ?>
								<?php echo $form->textField( $solicitud, 'fecha_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'fechaejecucion_solicitud'); ?>
								<?php echo $form->textField( $solicitud, 'fechaejecucion_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'estado_solicitud'); ?>
								<?php echo $form->textField( $solicitud, 'estado_solicitud' , array('class'=>'form-control','disabled' => true, 'value'=>$solicitud->estado_solicitud? 'Pendiente':'Terminada', )); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'tipopropiedad_solicitud'); ?>
								<?php echo $form->textField( $solicitud, 'tipopropiedad_solicitud' , array('class'=>'form-control','disabled' => true  )); ?>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-xs-12">
							<div class="form-group">
								<?php echo $form->label(  $solicitud, 'descripcion_solicitud'); ?>
								<?php echo $form->textArea( $solicitud, 'descripcion_solicitud' , array('rows' => 4,'class'=>'form-control','disabled' => true  )); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#arrendatario">Boton</button>
			</div>
		</div>
	</div>
</div>



<?php $this->endWidget(); ?>
