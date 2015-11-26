<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */

$this->breadcrumbs=array(
	'Solicituds'=>array('index'),
	$model->id_solicitud,
);

$this->menu=array(
	array('label'=>'List Solicitud', 'url'=>array('index')),
	array('label'=>'Create Solicitud', 'url'=>array('create')),
	array('label'=>'Update Solicitud', 'url'=>array('update', 'id'=>$model->id_solicitud)),
	array('label'=>'Delete Solicitud', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_solicitud),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Solicitud', 'url'=>array('admin')),
);
?>

<h1>View Solicitud #<?php echo $model->id_solicitud; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_solicitud',
		'rut_cliente',
		'rut_funcionario',
		'nombres_solicitud',
		'apellidos_solicitud',
		'servicio_solicitud',
		'fecha_solicitud',
		'fechaejecucion_solicitud',
		'telefono_solicitud',
		'estado_solicitud',
		'descripcion_solicitud',
		'tipopropiedad_solicitud',
		'correo_solicitud',
	),
)); ?>
