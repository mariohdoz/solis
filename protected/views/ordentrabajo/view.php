<?php
/* @var $this OrdentrabajoController */
/* @var $model Ordentrabajo */

$this->breadcrumbs=array(
	'Ordentrabajos'=>array('index'),
	$model->id_ot,
);

$this->menu=array(
	array('label'=>'List Ordentrabajo', 'url'=>array('index')),
	array('label'=>'Create Ordentrabajo', 'url'=>array('create')),
	array('label'=>'Update Ordentrabajo', 'url'=>array('update', 'id'=>$model->id_ot)),
	array('label'=>'Delete Ordentrabajo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ot),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ordentrabajo', 'url'=>array('admin')),
);
?>

<h1>View Ordentrabajo #<?php echo $model->id_ot; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_ot',
		'rut_admin',
		'descripcion_ot',
		'fechaemision_ot',
		'fechaejecucion_ot',
		'estado_ot',
		'inicio_ot',
		'servicio_ot',
		'observacion_ot',
		'totalpagar_ot',
		'formapago_ot',
	),
)); ?>
