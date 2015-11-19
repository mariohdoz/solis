<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Configuración
	    <small>Texto aquí.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Funcionario</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Eliminar</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="callout callout-danger">
          <h4>Está a punto de eliminar el funcionario <?php echo  CHtml::encode($model->rut_funcionario); ?>!</h4>
          <p>Si elimina el funcionario, también se eliminarán todos los servicios prestados por éste.</p>
        </div>
      </div>
      <!-- Inicio se container -->
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos del funcionario</h3>
          </div>
					<div class="form">
						<div class="box-body">
              <?php $form=$this->beginWidget('CActiveForm', array(
              	'id'=>'funcionario-form',
              	// Please note: When you enable ajax validation, make sure the corresponding
              	// controller action is handling ajax validation correctly.
              	// There is a call to performAjaxValidation() commented in generated controller code.
              	// See class documentation of CActiveForm for details on this.
              	'enableAjaxValidation'=>false,
              )); ?>
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
               <div class="col-xs-12 col-md-6 col-lg-4">
                 <div class="form-group">
                  <?php echo $form->labelEx($model,'cargo_funcionario'); ?>
                  <?php echo $form->textField($model,'cargo_funcionario',array('class'=>'form-control select2', 'placeholder'=>'Cargo del funcionario', 'disabled'=>true)); ?>
                 </div>
               </div>
					  </div>
            <div class="box-footer">
              <?php echo CHtml::link("Eliminar funcionario", '#', array(
                  'submit'=>array('/funcionario/delete', "id"=>$model->rut),
                  'class'=>'btn btn-danger',
                  'confirm' => '¿Está seguro de eliminar el funcionario?'
                  )
              );?>            </div>
            <?php $this->endWidget(); ?>

				  </div>
			  </div>
      </div>
      <!-- término se container -->
    </div>
  </section>
</div>
