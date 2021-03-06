<?php
/* @var $this ArrendatarioController */
/* @var $model Arrendatario */

$this->breadcrumbs=array(
	'Arrendatarios'=>array('index'),
	$model->rut_arrendatario,
);

$this->menu=array(
	array('label'=>'List Arrendatario', 'url'=>array('index')),
	array('label'=>'Create Arrendatario', 'url'=>array('create')),
	array('label'=>'Update Arrendatario', 'url'=>array('update', 'id'=>$model->rut_arrendatario)),
	array('label'=>'Delete Arrendatario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rut_arrendatario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Arrendatario', 'url'=>array('admin')),
);
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Visualizar arrendatario
	    <small>vizualización del arrendatario <?php echo CHtml::encode($model->rut_arrendatario); ?>.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Arrendatario</li>
			<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/intra/index">Gestión</a></li>
			<li class="active">Vista</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="callout callout-danger">
          <h4>Está a punto de eliminar el arrendatario <?php echo  CHtml::encode($model->rut_arrendatario); ?>!</h4>
          <p>Si elimina el arrendatario, también se eliminarán los arriendos en los cuales se encuentre participante.</p>
        </div>
      </div>
      <!-- Inicio se container -->
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
						<h3 class="box-title">Documento</h3>
					</div>
					<div class="form">
						<div class="box-body">
							<?php
								if($model->documento != null)
								{
									foreach ($model->documento as $key => $value) {
										$data = explode('.', $value->url_documento);
										echo '<div class="col-xs-12 col-md-6 col-lg-4"">';
											echo '<ul class="nav nav-pills nav-stacked">';
												echo '<li>'.CHtml::link('<i class="fa fa-home"></i>'.$value->url_documento,array('arrendatario/download', 'type'=>$value->url_documento)).'</li>';
											echo '</ul>';
										echo '</div>';
									}
								}else {
									echo '<div class="col-xs-12 col-md-12 col-lg-12"">';
										echo '<h3>No tiene ningún documento ingresado</h3>';
									echo '</div>';
									echo '<div class="col-xs-12 col-md-6 col-lg-4"">';
									echo '</div>';
								}
							?>
						</div>
						<div class="box-footer">
						</div>
					</div>
				</div>
			</div>
      <div class="col-md-12">
  			<div class="box box-primary">
  				<div class="box-header with-border">
  					<h3 class="box-title">Arriendos enlazados</h3>
  				</div>
  				<div class="form">
  					<div class="box-body">
  						<?php
  						if($model->arriendo != null)
  						{
  							foreach ($model->arriendo as $key => $value) {
  								echo '<div class="col-xs-12 col-md-6 col-lg-4"">';
  									echo '<ul class="nav nav-pills nav-stacked">';
  										echo '<li>'.CHtml::link('<i class="fa fa-home"></i>Número de ficha del arriendo '.$value->id_propiedad, array('arriendo/view/', 'id'=>$value->id_arriendo)).'</li>';
  									echo '</ul>';
  								echo '</div>';
  							}
  						}else {
  							echo '<div class="col-xs-12 col-md-12 col-lg-12"">';
  								echo '<h3>No tiene ningún arriendo activo</h3>';
  							echo '</div>';
  							echo '<div class="col-xs-12 col-md-6 col-lg-4"">';
  								echo 	CHtml::link('Registrar arriendo', array('/arriendo/create'), array('class'=>'btn btn-primary'));
  							echo '</div>';
  						}
  						 ?>
  					</div>
  					<div class="box-footer">
  					</div>
  				</div>
  			</div>
  		</div>
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos del arrendatario</h3>
          </div>
					<div class="form">
						<div class="box-body">
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
										<?php echo $form->textField($model,'nombres_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Ingrese los nombres del arrendatario','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'apellidos_arrendatario'); ?>
										<?php echo $form->textField($model,'apellidos_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Ingrese los apellidos del arrendatario','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'estadocivil_arrendatario') ?>
										<?php echo $form->textField($model,'estadocivil_arrendatario', array("class"=>"form-control select2",'disabled'=>true)) ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'profesion_arrendatario'); ?>
										<?php echo $form->textField($model,'profesion_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Profesión del arrendatario','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'correo_arrendatario'); ?>
										<?php echo $form->emailField($model,'correo_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Correo del arrendatario','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'telefonofijo_arrendatario'); ?>
										<?php echo $form->textField($model,'telefonofijo_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Ejemplo +5655123456 ','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'telefonocelular_arrendatario'); ?>
										<?php echo $form->textField($model,'telefonocelular_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Ejemplo +56912345678','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'nrocuenta_arrendatario'); ?>
										<?php echo $form->textField($model,'nrocuenta_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Número de cuenta','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'banco_arrendatario'); ?>
										<?php echo $form->textField($model,'banco_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Banco del arrendatario','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'nacionalidad_arrendatario'); ?>
										<?php echo $form->textField($model,'nacionalidad_arrendatario',array('class'=>'form-control select2', 'placeholder'=>'Nacionalidad','disabled'=>true)); ?>
									</div>
								</div>
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group">
										<?php echo $form->labelEx($model,'empresa_arrendatario'); ?><br>
										<?php echo $form->checkBox($model,'empresa_arrendatario',array('disabled'=>true)); ?>
									</div>
								</div>
					  </div>
            <div class="box-footer">
							<?php echo CHtml::link('Eliminar arrendatario', array('#'), array( 'submit'=>array('/arrendatario/delete/', "id"=>$model->rut), 'class'=>'btn btn-danger', 'confirm' => '¿Está seguro de eliminar el arrendatario?')); ?>

            </div>
				  </div>
			  </div>
      </div>
      <!-- término se container -->
    </div>

  </section>
</div>
<?php $this->endWidget(); ?>
