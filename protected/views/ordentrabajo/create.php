<?php
/* @var $this OrdentrabajoController */
/* @var $model Ordentrabajo */

$this->breadcrumbs=array(
	'Ordentrabajos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ordentrabajo', 'url'=>array('index')),
	array('label'=>'Manage Ordentrabajo', 'url'=>array('admin')),
);
?>

<h1>Create Ordentrabajo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>