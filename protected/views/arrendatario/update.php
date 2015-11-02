<?php
/* @var $this ArrendatarioController */
/* @var $model Arrendatario */

$this->breadcrumbs=array(
	'Arrendatarios'=>array('index'),
	$model->rut_arrendatario=>array('view','id'=>$model->rut_arrendatario),
	'Update',
);

$this->menu=array(
	array('label'=>'List Arrendatario', 'url'=>array('index')),
	array('label'=>'Create Arrendatario', 'url'=>array('create')),
	array('label'=>'View Arrendatario', 'url'=>array('view', 'id'=>$model->rut_arrendatario)),
	array('label'=>'Manage Arrendatario', 'url'=>array('admin')),
);
?>

<h1>Update Arrendatario <?php echo $model->rut_arrendatario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>