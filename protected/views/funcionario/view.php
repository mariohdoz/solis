<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Visualizar funcionario
	    <small>Visualización del funcionario <?php echo CHtml::encode($model->rut_funcionario); ?>.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">algo</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">acción</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
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
									<?php echo $form->textField($model,'nombres_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Ingrese los nombres del funcionario', 'disabled'=>true)); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
								<div class="form-group">
									<?php echo $form->labelEx($model,'apellidos_funcionario'); ?>
									<?php echo $form->textField($model,'apellidos_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Ingrese los apellidos del funcionario', 'disabled'=>true)); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
							 <div class="form-group">
								 <?php echo $form->labelEx($model,'telefonofijo_funcionario'); ?>
								 <?php echo $form->textField($model,'telefonofijo_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Ejemplo +5655123456 ', 'disabled'=>true)); ?>
							 </div>
						 </div>
						 <div class="col-xs-12 col-md-6 col-lg-4">
							 <div class="form-group">
								 <?php echo $form->labelEx($model,'telefonocelular_funcionario'); ?>
								 <?php echo $form->textField($model,'telefonocelular_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Ejemplo +56912345678', 'disabled'=>true)); ?>
							 </div>
						 </div>
							 <div class="col-xs-12 col-md-6 col-lg-4">
			 					 <div class="form-group">
									 <?php echo $form->labelEx($model,'correo_funcionario'); ?>
							 		<?php echo $form->textField($model,'correo_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Correo del funcionario', 'disabled'=>true)); ?>
			 					 </div>
			 				 </div>
							 <div class="col-xs-12 col-md-6 col-lg-4">
			 					 <div class="form-group">
									 <?php echo $form->labelEx($model,'domicilio_funcionario'); ?>
							 		<?php echo $form->textField($model,'domicilio_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Dirección del domicilio', 'disabled'=>true)); ?>
			 					 </div>
			 				 </div>
						</div>
						<div class="box-footer">
							<?php echo CHtml::link('Generar ficha de funcionario', array('/intra/index'), array('class'=>'btn btn-primary')); ?>
							<?php echo CHtml::link('Actualizar funcionario', array('/funcionario/update/', 'id'=>$model->rut), array('class'=>'btn btn-info', 'confirm' => '¿Está seguro de actualizar el funcionario?')); ?>
							<?php echo CHtml::link("Eliminar funcionario", '#', array(
									'submit'=>array('/funcionario/eliminar', "id"=>$model->rut),
									'class'=>'btn btn-danger',
									'confirm' => '¿Está seguro de eliminar el funcionario?'
									)
							);?>						</div>
					</div>
				</div>
			</div>
			<?php $this->endWidget(); ?>
      <!-- término se container -->
    </div>
  </section>
</div>
