<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ordentrabajo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Configuración
	    <small>Visualización de la orden de trabajo n° <?php echo CHtml::encode($model->id_ot); ?>.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Orden de trabajo</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Listado histórico</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->

			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos de la orden de trabajo emitido por <?php echo CHtml::encode($model->rut_admin); ?></h3>
          </div>
					<div class="form">
						<div class="box-body">
							<div class="col-lg-3 col-md-6 col-xs-12">
								<div class="form-group">
									<?php echo $form->labelEx($model,'fechaemision_ot'); ?>
									<?php echo $form->textField($model,'fechaemision_ot', array('class'=>'form-control', 'required'=>'required', 'disabled'=>'true')); ?>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-xs-12">
								<div class="form-group">
									<?php echo $form->labelEx($model,'inicio_ot'); ?>
									<?php echo $form->dateField($model,'inicio_ot', array('class'=>'form-control', 'required'=>'required', 'disabled'=>'true')); ?>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-xs-12">
								<div class="form-group">
									<?php echo $form->labelEx($model,'fechaejecucion_ot'); ?>
									<?php echo $form->dateField($model,'fechaejecucion_ot', array('class'=>'form-control', 'required'=>'required', 'disabled'=>'true')); ?>
								</div>
							</div>
							<?php if(!$model->isNewRecord):?>
							<div class="col-lg-3 col-md-6 col-xs-12">
								<div class="form-group">
									<?php echo $form->labelEx($model,'estado_ot'); ?>

									<input class="form-control" required="required" name="Ordentrabajo[estado_ot]" id="Ordentrabajo_estado_ot" type="text" value="<?php if ($model->estado_ot) {
										echo 'Pendiente';
									}else {
										echo 'Terminado';
									} ?>" disabled>

								</div>
							</div>
						<?php endif; ?>
							<div class="col-lg-4 col-md-6 col-xs-12">
								<div class="form-group">
									<?php echo $form->labelEx($model,'servicio_ot'); ?>
									<?php echo $form->textField($model,'servicio_ot', array('class'=>'form-control', 'disabled'=>'true'  )); ?>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-xs-12">
								<div class="form-group">
									<?php echo $form->labelEx($model,'totalpagar_ot'); ?>
									<?php echo $form->textField($model,'totalpagar_ot', array('class'=>'form-control', 'required'=>'required', 'disabled'=>'true')); ?>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-xs-12">
								<div class="form-group">
									<?php echo $form->labelEx($model,'formapago_ot'); ?>
									<?php echo $form->textField($model,'formapago_ot', array('class'=>'form-control', 'required'=>'required', 'disabled'=>'true')); ?>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-xs-12">
								<div class="form-group">
									<?php echo $form->labelEx($model,'descripcion_ot'); ?>
									<?php echo $form->textArea($model,'descripcion_ot',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'disabled'=>'true')); ?>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-xs-12">
								<div class="form-group">
									<?php echo $form->labelEx($model,'observacion_ot'); ?>
									<?php echo $form->textArea($model,'observacion_ot',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'disabled'=>'true')); ?>
								</div>
							</div>
					  </div>
            <div class="box-footer">

            </div>
				  </div>
			  </div>
      </div>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos del funcionario</h3>
          </div>
					<div class="form">
						<div class="box-body">

							<div class="col-xs-12 col-md-6 col-lg-4">
								 <div class="form-group">
									<?php echo $form->labelEx($funcionario,'rut_funcionario'); ?>
									<?php echo $form->textField($funcionario,'rut_funcionario', array("class"=>"form-control select2", $funcionario->isNewRecord ? '' : 'disabled'=>true, 'placeholder'=>'Ejemplo: 12345678-9')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
								<div class="form-group">
									<?php echo $form->labelEx($funcionario,'nombres_funcionario'); ?>
									<?php echo $form->textField($funcionario,'nombres_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Ingrese los nombres del funcionario', 'disabled'=>true)); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
								<div class="form-group">
									<?php echo $form->labelEx($funcionario,'apellidos_funcionario'); ?>
									<?php echo $form->textField($funcionario,'apellidos_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Ingrese los apellidos del funcionario', 'disabled'=>true)); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
 							 <div class="form-group">
 								 <?php echo $form->labelEx($funcionario,'telefonocelular_funcionario'); ?>
 								 <?php echo $form->textField($funcionario,'telefonocelular_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Ejemplo +56912345678', 'disabled'=>true)); ?>
 							 </div>
 						 </div>
						 <div class="col-xs-12 col-md-6 col-lg-4">
		 					 <div class="form-group">
								 <?php echo $form->labelEx($funcionario,'correo_funcionario'); ?>
						 		<?php echo $form->textField($funcionario,'correo_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Correo del funcionario', 'disabled'=>true)); ?>
		 					 </div>
		 				 </div>
						 <div class="col-xs-12 col-md-6 col-lg-4">
							 <div class="form-group">
								<?php echo $form->labelEx($funcionario,'cargo_funcionario'); ?>
								<?php echo $form->textField($funcionario,'cargo_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Cargo del funcionario', 'disabled'=>true)); ?>
							 </div>
						 </div>

					  </div>
            <div class="box-footer">

            </div>
				  </div>
			  </div>
      </div>

      <!-- término se container -->
    </div>
  </section>
</div>
<?php $this->endWidget(); ?>
