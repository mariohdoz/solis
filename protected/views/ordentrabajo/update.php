<?php
/* @var $this OrdentrabajoController */
/* @var $model Ordentrabajo */

$this->breadcrumbs=array(
	'Ordentrabajos'=>array('index'),
	$model->id_ot=>array('view','id'=>$model->id_ot),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ordentrabajo', 'url'=>array('index')),
	array('label'=>'Create Ordentrabajo', 'url'=>array('create')),
	array('label'=>'View Ordentrabajo', 'url'=>array('view', 'id'=>$model->id_ot)),
	array('label'=>'Manage Ordentrabajo', 'url'=>array('admin')),
);
?>

<h1>Update Ordentrabajo <?php echo $model->id_ot; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>