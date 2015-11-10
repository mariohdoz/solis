<?php
/* @var $this VentaController */
/* @var $model Venta */

$this->breadcrumbs=array(
	'Ventas'=>array('index'),
	$model->id_venta,
);

$this->menu=array(
	array('label'=>'List Venta', 'url'=>array('index')),
	array('label'=>'Create Venta', 'url'=>array('create')),
	array('label'=>'Update Venta', 'url'=>array('update', 'id'=>$model->id_venta)),
	array('label'=>'Delete Venta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_venta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Venta', 'url'=>array('admin')),
);
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
	    Eliminar
	    <small>Vista de la venta de la propiedad de la ficha número <?php echo $model->id_propiedad;?>.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="?r=intra/index">
			<i class="fa fa-dashboard"></i>Inicio</a></li>
			<li class="active">Venta</li>
			<li><a href="?r=intra/index">Gestión</a></li>
			<li class="active">Eliminar venta</li>
	  </ol>
  </section>
  <section class="content">
    <div class="row">
      <!-- Inicio se container -->
			<div class="col-md-12">
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
			</div>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'arriendo-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			)); ?>
      <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
            <h3 class="box-title">Datos de la venta</h3>
          </div>
					<div class="form">
						<div class="box-body">
							<div class="col-xs-3">
									<div class="form-group">
										<?php echo $form->label($model,'id_propiedad'); ?>
										<?php echo $form->textField($model,'id_propiedad', array('class'=>'form-control', 'disabled'=>'true')); ?>
									</div>
							</div>
							<div class="col-xs-3">
									<div class="form-group">
										<?php echo $form->label($model,'comisioncliente_venta'); ?>
										<?php echo $form->textField($model,'comisioncliente_venta', array('class'=>'form-control', 'disabled'=>'true' )); ?>
									</div>
							</div>
							<div class="col-xs-3">
									<div class="form-group">
										<?php echo $form->label($model,'comisioncomprador_venta'); ?>
										<?php echo $form->textField($model,'comisioncomprador_venta', array('class'=>'form-control', 'disabled'=>'true' )); ?>
									</div>
							</div>
							<div class="col-xs-3">
									<div class="form-group">
										<?php echo $form->label($model,'ganancia_venta'); ?>
										<?php echo $form->textField($model,'ganancia_venta', array('class'=>'form-control', 'disabled'=>'true' )); ?>
									</div>
							</div>
							<div class="col-xs-3">
									<div class="form-group">
										<?php echo $form->label($model,'rutcomprador_venta'); ?>
										<?php echo $form->textField($model,'rutcomprador_venta', array('class'=>'form-control', 'disabled'=>'true' )); ?>
									</div>
							</div>
							<div class="col-xs-3">
									<div class="form-group">
										<?php echo $form->label($model,'rutcomprador_venta'); ?>
										<?php echo $form->textField($model,'rutcomprador_venta', array('class'=>'form-control', 'disabled'=>'true' )); ?>
									</div>
							</div>
							<div class="col-xs-3">
									<div class="form-group">
										<?php echo $form->label($model,'nombrescomprador_venta'); ?>
										<?php echo $form->textField($model,'nombrescomprador_venta', array('class'=>'form-control', 'disabled'=>'true')); ?>
									</div>
							</div>
							<div class="col-xs-3">
									<div class="form-group">
										<?php echo $form->label($model,'apellidoscomprador_venta'); ?>
										<?php echo $form->textField($model,'apellidoscomprador_venta', array('class'=>'form-control', 'disabled'=>'true')); ?>
									</div>
							</div>

						</div>
					  </div>
            <div class="box-footer">
							<?php echo CHtml::link("Eliminar venta", '#', array(
									'submit'=>array('/venta/delete', "id"=>$model->id_venta),
									'class'=>'btn btn-danger',
									'confirm' => '¿Está seguro de eliminar la venta?'
									)
							);?>
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
			<?php $this->endWidget(); ?>
      <!-- término se container -->
  </section>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.formatCurrency-1.4.0.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/i18n/jquery.formatCurrency.es-CL.js" type="text/javascript"></script>
<script >
	var a = $('#Venta_comisioncomprador_venta').val();
	var b = $('#Venta_comisioncliente_venta').val();
	$('#Venta_comisioncomprador_venta').val($('#Venta_comisioncomprador_venta').val()+'%');
	$('#Venta_comisioncliente_venta').val($('#Venta_comisioncliente_venta').val()+'%');
	$('#Venta_ganancia_venta').formatCurrency({region: 'es-CL'
		, roundToDecimalPlace: -1});
</script>
