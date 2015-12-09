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
			<div class="col-md-12">
				<?php if(($msgs=Yii::app()->user->getFlashes())!=null): ?>
				 <?php foreach($msgs as $type => $message):?>
					 <div class="alert alert-<?php echo $type;?>" style="margin-left: 10px; margin-right: 10px ">
						 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						 <strong><?php
							 if($type == 'danger'){
								 echo 'Error';
							 }elseif ($type == 'success'){
								 echo 'Éxito';
							 };
							?> !</strong> <?php echo $message;?>.
					 </div>
				 <?php endforeach;?>
			 <?php endif; ?>
			</div>
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
		<?php
		if($model->propiedad != null)
		{
		  foreach ($model->propiedad as $key => $value) {
		    echo '<div class="col-md-6">
		      <div class="box box-primary">
		        <div class="box-header with-border">
		          <h3 class="box-title">Propiedad </h3>
		        </div>
		        <div class="form">
		          <div class="box-body">
		            <div class="col-lg-12 col-md-12 col-xs-12">
		              <div class="form-group">';
									$this->widget('zii.widgets.CDetailView', array(
										'data'=>$value,
										'htmlOptions' => array('class' => 'table-striped table-condensed table-responsive table table-hover'),
										'attributes'=>array(
											array(
												'label'=>'Número de ficha',
												 'value' =>  CHtml::link($value->id_propiedad,array('/propiedad/view/', 'id'=>$value->id_propiedad)) ,
												 'type'=>'raw'
											),
											'servicio_propiedad',
											array('header' => 'Estado',
														'label' => 'Estado' ,
														'value' => $value->activo_propiedad? 'Disponible':'Ocupado' ),
											array('header' => 'direccion',
														'label' => 'Dirección' ,
														'value' => $value->direccion_propiedad.' '.$value->numero_propiedad, ),
											array('header'=>'Valor',
														'label'=>'Valor',
														'value'=>Yii::app()->numberFormatter->format("¤#,##0", $value->valor_propiedad, "$ "),
											),
										),
										));
		              echo '</div>
		            </div>
		          </div>
		          <div class="box-footer">
		          </div>
		        </div>
		      </div>
		    </div>';
		  }
		}
		?>
  </section>
</div>

<?php $this->endWidget(); ?>
