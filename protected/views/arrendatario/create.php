<?php
/* @var $this ArrendatarioController */
/* @var $model Arrendatario */

$this->breadcrumbs=array(
	'Arrendatarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Arrendatario', 'url'=>array('index')),
	array('label'=>'Manage Arrendatario', 'url'=>array('admin')),
);
?>

<h1>Create Arrendatario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>