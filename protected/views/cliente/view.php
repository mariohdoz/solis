<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->rut_cliente,
);

$this->menu=array(
	array('label'=>'List Cliente', 'url'=>array('index')),
	array('label'=>'Create Cliente', 'url'=>array('create')),
	array('label'=>'Update Cliente', 'url'=>array('update', 'id'=>$model->rut_cliente)),
	array('label'=>'Delete Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rut_cliente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cliente', 'url'=>array('admin')),
);
?>
<div class="content-wrapper">
  <section class="content-header">
		<h1>
	    Visualizar Cliente
	    <small>Visualización del cliente <?php echo CHtml::encode($model->rut_cliente); ?>.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Cliente</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Visualización</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->

      <!-- término se container -->
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'cliente-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			)); ?>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos del cliente</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<div class="col-xs-12 col-md-6 col-lg-4">
								 <div class="form-group">
									<?php echo $form->labelEx($model,'rut_cliente'); ?>
									<?php echo $form->textField($model,'rut_cliente', array("class"=>"form-control select2", 'disabled'=>'true')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
								 <div class="form-group">
										<?php echo $form->labelEx($model,'nombres_cliente'); ?>
										<?php echo $form->textField($model,'nombres_cliente', array("class"=>"form-control select2", 'disabled'=>'true')); ?>
									</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
								 <div class="form-group">
									<?php echo $form->labelEx($model,'apellidos_cliente'); ?>
									<?php echo $form->textField($model,'apellidos_cliente', array("class"=>"form-control select2", 'disabled'=>'true')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
								 <div class="form-group">
										<?php echo $form->labelEx($model,'telefonofijo_cliente'); ?>
										 <?php echo $form->textField($model,'telefonofijo_cliente', array("class"=>"form-control select2", 'disabled'=>'true')); ?>
									</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
								 <div class="form-group">
									 <?php echo $form->labelEx($model,'telefonocelular_cliente'); ?>
										<?php echo $form->textField($model,'telefonocelular_cliente',array("class"=>"form-control select2", 'disabled'=>'true')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
								 <div class="form-group">
									 <?php echo $form->labelEx($model,'correo_cliente'); ?>
										 <?php echo $form->emailField($model,'correo_cliente',array("class"=>"form-control select2", 'disabled'=>'true')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
								<div class="form-group">
									<?php echo $form->labelEx($model,'domicilio_cliente'); ?>
									<?php echo $form->textField($model,'domicilio_cliente', array("class"=>"form-control select2", 'disabled'=>'true')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
								 <div class="form-group">
									 <?php echo $form->labelEx($model,'profesion_cliente'); ?>
											<?php echo $form->textField($model,'profesion_cliente',array("class"=>"form-control select2", 'disabled'=>'true')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
							 <div class="form-group">
								 <?php echo $form->labelEx($model,'nrocuenta_cliente'); ?>
									<?php echo $form->textField($model,'nrocuenta_cliente',array("class"=>"form-control select2", 'disabled'=>'true')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
								 <div class="form-group">
											<?php echo $form->labelEx($model,'estadocivil_cliente') ?>
											<?php echo $form->dropDownList($model,'estadocivil_cliente',array(
												'Soltero/a'=>'Soltero/a',
												'Casado/a'=>'Casado/a',
												'Viudo/a'=>'Viudo/a',
											),
											array("class"=>"form-control select2", 'disabled'=>'true')) ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
								 <div class="form-group">
									 <?php echo $form->labelEx($model,'banco_cliente'); ?>
										<?php echo $form->textField($model,'banco_cliente',array("class"=>"form-control select2", 'disabled'=>'true')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-lg-4">
								 <div class="form-group">
									 <?php echo $form->labelEx($model,'tipocuenta_cliente') ?>
									 <?php echo $form->textField($model,'tipocuenta_cliente',array("class"=>"form-control select2", 'disabled'=>'true')); ?>
							</div>
					  </div>

				  </div>
					<div class="box-footer">
						<?php echo CHtml::link("Generar Ficha", '#', array(
								'submit'=>array('/cliente/generarpdf', "id"=>$model->rut),
								'class'=>'btn btn-info',
							)
						);?>
						<?php echo CHtml::link('Actualizar cliente', array('/cliente/update/', 'id'=>$model->rut), array('class'=>'btn btn-info', 'confirm' => '¿Está seguro de actualizar el cliente?')); ?>
						<?php echo CHtml::link("Eliminar cliente", '#', array(
								'submit'=>array('/cliente/delete', "id"=>$model->rut),
								'class'=>'btn btn-danger',
								'confirm' => '¿Está seguro de eliminar el cliente?'
								)
						);?>
					</div>
			  </div>
      </div>
    </div>
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Propiedades</h3>
				</div>
				<div class="form">
					<div class="box-body">
						<?php
							if ($model->propiedad != null) {
								foreach ($model->propiedad as $key => $value) {
									echo '<div class="col-xs-12 col-md-6 col-lg-4"">';
										echo '<ul class="nav nav-pills nav-stacked">';
											echo '<li>'.CHtml::link('<i class="fa fa-home"></i>Número de ficha de la propiedad '.$value->id_propiedad, array('propiedad/view/', 'id'=>$value->id_propiedad)).'</li>';
										echo '</ul>';
									echo '</div>';
								}
							}else{
								echo '<div class="col-xs-12 col-md-6 col-lg-4"">';
									echo '<h3>No posee ninguna propiedad</h3>';
								echo '</div>';
							}
						 ?>
					 </ul>

					</div>
					<div class="box-footer">
					</div>
				</div>
			</div>
		</div>
  </section>
</div>

<?php $this->endWidget(); ?>
