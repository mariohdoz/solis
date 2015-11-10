<?php
/* @var $this ArriendoController */
/* @var $model Arriendo */
/* @var $model2 Arrendatario */
/* @var $model3 Ppropiedad */

$this->breadcrumbs=array(
	'Arriendos'=>array('index'),
	$model->id_arriendo,
	$model2->rut_arrendatario,
	$model3->id_propiedad,
);

$this->menu=array(
	array('label'=>'List Arriendo', 'url'=>array('index')),
	array('label'=>'Create Arriendo', 'url'=>array('create')),
	array('label'=>'Update Arriendo', 'url'=>array('update', 'id'=>$model->id_arriendo)),
	array('label'=>'Delete Arriendo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_arriendo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Arriendo', 'url'=>array('admin')),
);
?>
<div class="content-wrapper">
	<section class="content-header">
	  <h1>
	    Configuración
	    <small>Vista de arriendo de la propiedad de la ficha número <?php echo $model->id_propiedad;?>.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Arriendo</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Registrar Propietario</li>
	  </ol>
	</section>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'arriendo-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>
	<section class="content">
		<div class="row">
			<?php if(($msgs=Yii::app()->user->getFlashes())!=null): ?>
				<?php foreach($msgs as $type => $message):?>
					<div class="callout callout-<?php echo $type;?>">
						<h4><?php
							if($type == 'danger'){
								echo 'Error';
							}elseif ($type == 'success'){
								echo 'Éxito';
							};
						 ?> !</h4>
						<p><?php echo $message;?></p>
					</div>
				<?php endforeach;?>
			<?php endif; ?>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos del arriendo</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<div class="col-xs-3">
									<div class="form-group">
										<?php echo $form->label($model,'fechapago_arriendo'); ?>
										<?php echo $form->textField($model,'fechapago_arriendo', array('class'=>'form-control', 'disabled'=>'true')); ?>
									</div>
							</div>
							<div class="col-xs-3">
									<div class="form-group">
										<?php echo $form->label($model,'inicio_arriendo'); ?>
										<?php echo $form->textField($model,'inicio_arriendo', array('class'=>'form-control', 'disabled'=>'true')); ?>
									</div>
							</div>
							<div class="col-xs-3">
									<div class="form-group">
										<?php echo $form->label($model,'termino_arriendo'); ?>
										<?php echo $form->textField($model,'termino_arriendo', array('class'=>'form-control', 'disabled'=>'true')); ?>
									</div>
							</div>
							<div class="col-xs-3">
									<div class="form-group">
										<?php echo $form->label($model,'valor_arriendo'); ?>
										<?php echo $form->textField($model,'valor_arriendo', array('class'=>'form-control', 'disabled'=>'true', 'data-inputmask'=>"'mask': 000.000.000.000.000'" )); ?>
									</div>
							</div>
						</div>
						<div class="box-footer">
							<?php echo CHtml::link('Términar', array('/intra/index'), array('class'=>'btn btn-primary')); ?>
							<?php echo CHtml::link('Actualizar arriendo', array('/arriendo/update/', 'id'=>$model->id_arriendo), array('class'=>'btn btn-info', 'confirm' => '¿Está seguro de actualizar el arriendo?')); ?>
							<?php echo CHtml::link("Eliminar arriendo", '#', array(
							    'submit'=>array('/arriendo/delete', "id"=>$model->id_arriendo),
									'class'=>'btn btn-danger',
							    'confirm' => '¿Está seguro de eliminar el arriendo?'
							    )
							);?>
						</div>
					</div>
				</div>
				<?php $this->endWidget(); ?>
			</div>
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos del arrendatario involucrado</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<?php $this->widget('zii.widgets.CDetailView', array(
								 'data'=>$model2,
								 'attributes'=>array(
										 'rut_arrendatario',
										 array(
											 'header'=>'Nombre completo',
											 'label'=>'Nombre completo',
											 'value'=>$model2->nombres_arrendatario.' '.$model2->apellidos_arrendatario,
										 ),
										 'telefonocelular_arrendatario',
										 'correo_arrendatario',
								 ),
								 )); ?>
						</div>
						<div class="box-footer">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos de la propiedad involucrada</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<?php $this->widget('zii.widgets.CDetailView', array(
								 'data'=>$model3,
								 'attributes'=>array(
										 'id_propiedad',
										 array('header' => 'Propiedatio',
													 'label' => 'Propietario' ,
													 'value' => $model3->rut_cliente, ),
										 array(
											 'header'=>'Nombre completo',
											 'label'=>'Nombre completo',
											 'value'=>$model3->direccion_propiedad.' '.$model3->numero_propiedad,
										 ),
										 'valor_propiedad',
								 ),
								 )); ?>
						</div>
						<div class="box-footer">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
