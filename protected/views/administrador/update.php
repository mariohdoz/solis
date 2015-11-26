<?php
/* @var $this AdministradorController */
/* @var $model Administrador */

$this->breadcrumbs=array(
	'Administradors'=>array('index'),
	$model->rut_admin=>array('view','id'=>$model->rut_admin),
	'Update',
);

$this->menu=array(
	array('label'=>'List Administrador', 'url'=>array('index')),
	array('label'=>'Create Administrador', 'url'=>array('create')),
	array('label'=>'View Administrador', 'url'=>array('view', 'id'=>$model->rut_admin)),
	array('label'=>'Manage Administrador', 'url'=>array('admin')),
);
?>

<h1>Update Administrador <?php echo $model->rut_admin; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>