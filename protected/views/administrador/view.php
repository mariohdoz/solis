<?php
/* @var $this AdministradorController */
/* @var $model Administrador */

$this->breadcrumbs=array(
	'Administradors'=>array('index'),
	$model->rut_admin,
);

$this->menu=array(
	array('label'=>'List Administrador', 'url'=>array('index')),
	array('label'=>'Create Administrador', 'url'=>array('create')),
	array('label'=>'Update Administrador', 'url'=>array('update', 'id'=>$model->rut_admin)),
	array('label'=>'Delete Administrador', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rut_admin),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Administrador', 'url'=>array('admin')),
);
?>

<h1>View Administrador #<?php echo $model->rut_admin; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rut_admin',
		'nombres_admin',
		'apellidos_admin',
		'contrasena_admin',
		'correo_admin',
		'telefono_admin',
		'perfil_admin',
		'super_admin',
		'activo_admin',
	),
)); ?>
