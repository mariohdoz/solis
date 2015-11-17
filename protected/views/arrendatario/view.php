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

<h1>View Arrendatario #<?php echo $model->rut_arrendatario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rut_arrendatario',
		'nombres_arrendatario',
		'apellidos_arrendatario',
		'estadocivil_arrendatario',
		'profesion_arrendatario',
		'correo_arrendatario',
		'telefonofijo_arrendatario',
		'telefonocelular_arrendatario',
		'nrocuenta_arrendatario',
		'banco_arrendatario',
		'nacionalidad_arrendatario',
		'empresa_arrendatario',
		'activo_arrendatario',
	),
)); ?>
